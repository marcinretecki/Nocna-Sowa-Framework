//
//  COOKIES
//


/*!
 * JavaScript Cookie v2.1.2
 * https://github.com/js-cookie/js-cookie
 *
 * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
 * Released under the MIT license
 */
;(function (factory) {
  if (typeof define === 'function' && define.amd) {
    define(factory);
  } else if (typeof exports === 'object') {
    module.exports = factory();
  } else {
    var OldCookies = window.Cookies;
    var api = window.Cookies = factory();
    api.noConflict = function () {
      window.Cookies = OldCookies;
      return api;
    };
  }
}(function () {
  function extend () {
    var i = 0;
    var result = {};
    for (; i < arguments.length; i++) {
      var attributes = arguments[ i ];
      for (var key in attributes) {
        result[key] = attributes[key];
      }
    }
    return result;
  }

  function init (converter) {
    function api (key, value, attributes) {
      var result;
      if (typeof document === 'undefined') {
        return;
      }

      // Write

      if (arguments.length > 1) {
        attributes = extend({
          path: '/'
        }, api.defaults, attributes);

        if (typeof attributes.expires === 'number') {
          var expires = new Date();
          expires.setMilliseconds(expires.getMilliseconds() + attributes.expires * 864e+5);
          attributes.expires = expires;
        }

        try {
          result = JSON.stringify(value);
          if (/^[\{\[]/.test(result)) {
            value = result;
          }
        } catch (e) {}

        if (!converter.write) {
          value = encodeURIComponent(String(value))
            .replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent);
        } else {
          value = converter.write(value, key);
        }

        key = encodeURIComponent(String(key));
        key = key.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent);
        key = key.replace(/[\(\)]/g, escape);

        return (document.cookie = [
          key, '=', value,
          attributes.expires && '; expires=' + attributes.expires.toUTCString(), // use expires attribute, max-age is not supported by IE
          attributes.path    && '; path=' + attributes.path,
          attributes.domain  && '; domain=' + attributes.domain,
          attributes.secure ? '; secure' : ''
        ].join(''));
      }

      // Read

      if (!key) {
        result = {};
      }

      // To prevent the for loop in the first place assign an empty array
      // in case there are no cookies at all. Also prevents odd result when
      // calling "get()"
      var cookies = document.cookie ? document.cookie.split('; ') : [];
      var rdecode = /(%[0-9A-Z]{2})+/g;
      var i = 0;

      for (; i < cookies.length; i++) {
        var parts = cookies[i].split('=');
        var cookie = parts.slice(1).join('=');

        if (cookie.charAt(0) === '"') {
          cookie = cookie.slice(1, -1);
        }

        try {
          var name = parts[0].replace(rdecode, decodeURIComponent);
          cookie = converter.read ?
            converter.read(cookie, name) : converter(cookie, name) ||
            cookie.replace(rdecode, decodeURIComponent);

          if (this.json) {
            try {
              cookie = JSON.parse(cookie);
            } catch (e) {}
          }

          if (key === name) {
            result = cookie;
            break;
          }

          if (!key) {
            result[name] = cookie;
          }
        } catch (e) {}
      }

      return result;
    }

    api.set = api;
    api.get = function (key) {
      return api(key);
    };
    api.getJSON = function () {
      return api.apply({
        json: true
      }, [].slice.call(arguments));
    };
    api.defaults = {};

    api.remove = function (key, attributes) {
      api(key, '', extend(attributes, {
        expires: -1
      }));
    };

    api.withConverter = init;

    return api;
  }

  return init(function () {});
}));



//
//  Ideas
//  - czy cookiePlusOne powinien dodawać się, przed podaniem poprawnej odpowiedzi?
//  - popupz pytaniem, czy odświerzyć stronę
//


(function() {

  //
  //  Private functions
  //
  function getCookie() {

    var cookie = Cookies.getJSON( 'lasChallangeProgress' );

    //  if there was no cookie for this key
    if ( !cookie ) {

      //  w tym miejscu można zrobić popup z pytaniem
      //  nie możemy zapisać Twojego progresu, czy chcesz kontynuować
      //  czy odświerzyć stronę
      window.location.reload( false );
    }

    return cookie;
  }


  function setCookie(value) {
    Cookies.set( 'lasChallangeProgress', value, { expires: 365, path: '/las/' } );
  }


  function cleanCookie() {
    Cookies.remove( 'lasChallangeProgress', { path: '/las/' } );
  }


  //
  //  Public functions
  //

  //
  //  Add one to the prop
  //  ex, wrong, more, repeat etc.
  //
  LasHelper.prototype.cookiePlusOne = function( prop ) {

    var chapter = this.helper.chapter;
    var type = this.helper.type;
    var cookie = getCookie( chapter );
    var access;
    var property;

    //  there is no cookie for this chapter and type
    //  user is not accepting cookies
    if ( !cookie[ chapter ] || !cookie[ chapter ][ type ] ) {
      window.console.log('user is not accepting cookies');
      window.console.log('or they have two exercises open at once');


      //
      //  think about resolving the problem with multiple exercises
      //  maybe cookie saving and cleaning should be only on non-ex pages
      //  if the open another ex, php would simply add one more chapter to the array in cookie?
      //

      return;
    }

    //  if the access time is not yet set
    if ( !this.helper.access ) {
      //  get access time from the name of the first property
      for ( property in cookie[ chapter ][ type ] ) {

        if ( cookie[ chapter ][ type ].hasOwnProperty(property) ) {
          this.helper.access = property;
          break;
        }

      }
    }
    access = this.helper.access;

    if ( !cookie[ chapter ][ type ][ access ][ prop ] ) {
      cookie[ chapter ][ type ][ access ][ prop ] = 0;
    }

    //  add +1 to the prop of interaction
    cookie[ chapter ][ type ][ access ][ prop ] += 1;

    //  set the new cookie
    setCookie(cookie);

  };


  //
  //  Set the elapsed time on wyzwanie
  //
  LasHelper.prototype.cookieSetT = function() {

    var beginT = this.helper.beginT;
    var chapter = this.helper.chapter;
    var access = this.helper.access;
    var type = this.helper.type;
    var cookie = getCookie( chapter );

    if ( !cookie[ chapter ] ) {
      return;
    }

    Date.now = Date.now || function() { return +new Date; };

    var endT = Math.floor( Date.now() / 1000 );
    var t = endT - beginT;

    console.log('Elapsed T: ' + t);
    cookie[ chapter ][ type ][ access ].t = t;

    //  set the new cookie
    setCookie(cookie);


  };


})();