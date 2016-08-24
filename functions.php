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
// it is actually redirecting all not logged in users, so it can be used for restricting content
//
function las_dev_redirect() {
  if ( ( $_SERVER['REQUEST_URI'] !== '/' ) && !is_user_logged_in() ) {
    header('Location: http://las.nocnasowa.pl/');
    exit;
  }
}
add_action('init', 'las_dev_redirect');


//
// Redirect non-editors or non-admins from admin area
//
function las_login_redirect(){
  if ( !current_user_can( 'edit_posts' ) ) {
    wp_redirect( 'http://las.nocnasowa.pl/' );
    exit;
  }
}
add_action( 'admin_init', 'las_login_redirect' );



//
// Rewrite author's page base
//
function las_rewrite_init() {
  global $wp_rewrite;
  $wp_rewrite->author_base = 'u';
  $wp_rewrite->author_structure = '/' . $wp_rewrite->author_base . '/%author%';
}
add_action('init', 'las_rewrite_init');


//
// Add categories to pages
//
function las_add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'las_add_taxonomies_to_pages' );


//
// Usuń Title z automatycznie generowanych linków
//
function remove_title_attributes( $input ) {
  return preg_replace('/\s*title\s*=\s*(["\']).*?\1/', '', $input);
};
add_filter( 'wp_list_pages', 'remove_title_attributes' );
add_filter( 'wp_list_categories', 'remove_title_attributes' );


//
// Usuń Admin Bar
//
add_filter('show_admin_bar', '__return_false');



//
// Remove archive pages
//
add_action('template_redirect', 'remove_archives');
function remove_archives() {
  global $wp_query, $post;

  if ( is_day() || is_month() || is_year() || is_tag() ) {
    $wp_query->set_404();
  }

  if ( is_feed() ) {
    $day    = get_query_var('day');
    $month  = get_query_var('month');
    $year   = get_query_var('year');

    if ( !empty( $day ) || !empty( $month ) || !empty( $year ) ) {
      $wp_query->set_404();
      $wp_query->is_feed = false;
    }
  }
}



//
// Add new roles
//
function las_add_roles() {
  add_role(
      'basic_user',
      __( 'Basic User' ),
      array(
          'read' => true,
      )
  );

  add_role(
      'advanced_user',
      __( 'Advanced User' ),
      array(
          'read' => true,
      )
  );
}
//las_add_roles(); // we do it only once!