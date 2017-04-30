//
//  COOKIES
//
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

    Date.now = Date.now || function() { return +new Date; };

    var endT = Math.floor( Date.now() / 1000 );
    var t = endT - beginT;

    console.log('Elapsed T: ' + t);
    cookie[ chapter ][ type ][ access ].t = t;

    //  set the new cookie
    setCookie(cookie);


  };


})();