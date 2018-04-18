//
//  JS Debug functions
//

function showDebugMsg( msg ) {
  if ( window.location.href.split('livecopy').length > 1 ) {
    window.console.log( msg );
  }
}