<?php
/*
Template Name: Profile
*/

//  GLOBALS
include( stream_resolve_include_path( __DIR__ . '/includes/globals.php' ) );


//  there was no user
//  and there is post data
if ( !$user_char && isset( $_POST["FNAME"] ) && isset( $_POST["NICK"] ) && isset( $_POST["CHAR"] ) )  {

  //  create new user
  $create_new_char = las_create_user_char( [ $_POST["FNAME"], $_POST["NICK"], $_POST["CHAR"] ] );

  if ( $created_new_char ) {
    wp_redirect( '/las/szlak/' );
    exit;
  }

}



//
//  Begin HTML
//

include( 'includes/head.php' );


//
//  Check if there is char
//  if not, create it
//
if ( $user_char ) {

  include( stream_resolve_include_path( __DIR__ . '/includes/char-display.php' ) );

}
else {

  include( stream_resolve_include_path( __DIR__ . '/data/las-nicknames.php' ) );
  include( stream_resolve_include_path( __DIR__ . '/includes/char-create.php' ) );

}




include( 'includes/footer.php' );