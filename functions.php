<?php
/*
  Functions
*/


//
// Change css and js source for development
//
function las_admin_dev_mode() {
  if ( current_user_can( 'delete_users' ) )  {
    return false;
  }
  else {
    return false;
  }
}

function las_autover_live($url){
  $path = pathinfo($url);
  $ver = '.' . filemtime('/nocnasowa/live' . $url).'.';
  echo 'http://nocnasowa.pl' . $path['dirname'] . '/' . str_replace( '.', $ver, $path['basename'] );
}

function las_autover_livecopy($url){
  $path = pathinfo($url);
  $ver = '.' . filemtime('/nocnasowa/livecopy' . $url).'.';
  echo 'http://livecopy.nocnasowa.pl' . $path['dirname'] . '/' . str_replace( '.', $ver, $path['basename'] );
}

function autoVer($url) {
  $dev_mode = las_admin_dev_mode();

  if ( $dev_mode ) {
    return las_autover_livecopy($url);
  }
  else {
    return las_autover_live($url);
  }
}



//
// Get source url for development
//
function las_get_source_url() {
  if ( $dev_mode ) {
    return '/nocnasowa/livecopy/wp-content/themes/nocnasowa_theme/';
  }
  else {
    return '/nocnasowa/live/wp-content/themes/nocnasowa_theme/';
  }
}
$source_url = las_get_source_url();