//
//  COOKIES
//
//  Attaches to @LasHelper prototype
//


(function() {


  //
  //  Private store of user progress
  //  cookie[ chapter ][ type ][ access ] = progress
  //  chapter, type and access are stored in helper
  //  here we stroee
  //
  var cookieStore = {
    //  use this to count time
    jsAccess:       0,
    //  here goes all progress props
    //  ex, correct, wrong,
    progress:       {}
  };



  //
  //  Private functions
  //

  //
  //  Get time and adjust it to match php format
  //
  function getJsTime() {
    Date.now = Date.now || function() { return +new Date; };
    return Math.floor( Date.now() / 1000 );
  }

  //
  //  Get progress cookie in json
  //
  function getCookie() {
    var cookie = Cookies.getJSON( 'lasChallangeProgress' );
    return cookie;
  }

  //
  //  Save data to progress cookie
  //
  function setCookie(value) {
    Cookies.set( 'lasChallangeProgress', value, { expires: 365, path: '/las/' } );
  }

  //
  //  Remove progress cookie
  //
  function cleanCookie() {
    Cookies.remove( 'lasChallangeProgress', { path: '/las/' } );
  }



  //
  //  Public functions
  //

  //
  //  Prepare cookie store
  //
  LasHelper.prototype.prepareCookieStore = function() {

    //  check if we have all needed info
    if ( !las.helper.chapter || !las.helper.type || !las.helper.chapterId || !las.helper.serverAccess ) {
      window.console.log('server did not set helper correctly');

      cookieStore = false;

      return;
    }

    window.console.log( 'prepareCookieStore' );

    //  set access time to count elapsed later
    cookieStore.jsAccess = getJsTime();


  };


  //
  //  Add one to the prop in progress
  //  ex, correct, wrong, more, repeat etc.
  //
  LasHelper.prototype.addOneToProgress = function( prop ) {

    //  if there was wrong data from the server, store is set to false
    if ( !cookieStore ) {
      window.console.log('cookie store is false');
      return;
    }

    //  if such prop was not set before
    if ( !cookieStore.progress[ prop ] ) {
      cookieStore.progress[ prop ] = 0;
    }

    //  add +1 to the prop
    cookieStore.progress[ prop ] += 1;

  };


  //
  //  Add new exp to progress store
  //  @prop comes from log.js
  //  @countExpFromMultiFn comes from log.js
  //
  LasHelper.prototype.addExpToProgress = function( exp ) {

    //  if there was wrong data from the server, store is set to false
    if ( !cookieStore ) {
      window.console.log('cookie store is false');
      return;
    }

    //  if there is no exp, ignore
    if ( exp === 0 ) {
      return;
    }

    //  if exp was not set before
    if ( !cookieStore.progress[ 'exp' ] ) {
      cookieStore.progress[ 'exp' ] = 0;
    }

    //  add exp
    cookieStore.progress[ 'exp' ] += exp;

  };


  //
  //  Save progress to cookie
  //
  LasHelper.prototype.saveProgressToCookie = function() {

    if ( !cookieStore ) {
      window.console.log('cookie store is false');
      return;
    }


    var timeNow = getJsTime();
    var progress = cookieStore.progress;
    var cookie = {};
    var property;

    //  store elapsed time
    cookieStore.progress[ 't' ] = timeNow - cookieStore.jsAccess;

    //  cookie should look like this
    //  cookie[chapter][type][serverAccess][progress]
    //  cookie[chapter][id]
    //  progress has additionaly t (time elapsed) and finished (integer)

    //  create chapter object
    cookie[ this.helper.chapter ] = {};

    //  set id
    cookie[ this.helper.chapter ][ 'id' ] = this.helper.chapterId;

    //  create type object
    cookie[ this.helper.chapter ][ this.helper.type ] = {};

    //  create serverTime object
    cookie[ this.helper.chapter ][ this.helper.type ][ this.helper.serverAccess ] = {};

    //  loop over all progress props and add them to type object
    for ( property in progress ) {

      // if it is own property
      if ( progress.hasOwnProperty( property ) ) {

        //  obfuscate
        cookie[ this.helper.chapter ][ this.helper.type ][ this.helper.serverAccess ][ property ] = progress[ property ].toString(3);

      }
    }

    window.console.log( cookie );

    //  set the cookie
    setCookie( cookie );

  };



  //  //
  //  //  Set the finished prop to cookie
  //  //
  //  LasHelper.prototype.cookieSetFinished = function() {

  //    var chapter = this.helper.chapter;
  //    var access = this.helper.access;
  //    var type = this.helper.type;
  //    var cookie = getCookie( chapter );

  //    if ( !cookie[ chapter ] ) {
  //      return;
  //    }

  //    cookie[ chapter ][ type ][ access ][ 'finished' ] = 1;

  //    //  set the new cookie
  //    setCookie(cookie);

  //  };



  //  //
  //  //  Set the elapsed time on wyzwanie
  //  //
  //  LasHelper.prototype.cookieSetT = function() {

  //    var beginT = this.helper.beginT;
  //    var chapter = this.helper.chapter;
  //    var access = this.helper.access;
  //    var type = this.helper.type;
  //    var cookie = getCookie( chapter );

  //    if ( !cookie[ chapter ] ) {
  //      return false;
  //    }

  //    Date.now = Date.now || function() { return +new Date; };

  //    var endT = Math.floor( Date.now() / 1000 );
  //    var t = endT - beginT;

  //    if ( t > 1 ) {
  //      console.log('Elapsed T: ' + t);
  //      cookie[ chapter ][ type ][ access ]['t'] = t;

  //    //  set the new cookie
  //    setCookie(cookie);

  //    }
  //    else {
  //      return false;
  //    }

  //  };



})();




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