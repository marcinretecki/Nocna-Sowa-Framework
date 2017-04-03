(function() {

  //
  //  Private functions
  //
  function getCookie() {

    var cookie = Cookies.getJSON( 'lasChallangeProgress' );

    //  if there was no cookie for this key
    if ( !cookie ) {

      return false;

    }

    return cookie;
  }

  function setCookie(value) {
    Cookies.set( 'lasChallangeProgress', value, { expires: 365, path: '/las/' } );
  }

  function cleanCookie() {
    Cookies.remove( 'lasChallangeProgress', { path: '/las/' } );
  }


  LasHelper.prototype.cookiePlusOne = function( prop ) {

    var chapter = this.helper.chapter;
    var type = this.helper.type;
    var cookie = getCookie( chapter );


    //  if there is no proper meta
    if ( !cookie[ chapter ] ) {
      cookie[ chapter ] = [];
    }

    if ( !cookie[ chapter ][ type ] ) {
      cookie[ chapter ][ type ] = [];
    }

    if ( !cookie[ chapter ][ type ][0] ) {
      cookie[ chapter ][ type ][0] = [];
    }

    if ( !cookie[ chapter ][ type ][0][ prop ] ) {
      cookie[ chapter ][ type ][0][ prop ] = 0;
    }

    //  add +1 to the prop of interaction
    cookie[ chapter ][ type ][0][ prop ] += 1;

    //  set the new cookie
    setCookie(cookie);

  };


  LasHelper.prototype.cookieSetT = function() {

    var beginT = this.helper.beginT;
    var chapter = this.helper.chapter;
    var type = this.helper.type;
    var cookie = getCookie( chapter );

    Date.now = Date.now || function() { return +new Date; };

    var endT = Math.floor( Date.now() / 1000 );
    var t = endT - beginT;

    console.log('Elapsed T: ' + t);
    cookie[ chapter ][ type ][0].t = t;

    //  set the new cookie
    setCookie(cookie);


  };


})();