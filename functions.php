<?php
/*
  Functions
*/

//
// Change css and js source for development
//
function las_admin_dev_mode() {
  if ( current_user_can( 'delete_users' ) )  {
    return true;
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
  if ( las_admin_dev_mode() ) {
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
  if ( las_admin_dev_mode() ) {
    return '/nocnasowa/livecopy/wp-content/themes/nocnasowa_theme/';
  }
  else {
    return '/nocnasowa/live/wp-content/themes/nocnasowa_theme/';
  }
}
$source_url = las_get_source_url();




//
// Dev redirect
//
if ( ( $_SERVER['REQUEST_URI'] !== '/' ) && !las_admin_dev_mode() ) {
  header('Location: http://las.nocnasowa.pl/');
  exit;
}

//
// Add categories to pages
//
function las_add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'las_add_taxonomies_to_pages' );