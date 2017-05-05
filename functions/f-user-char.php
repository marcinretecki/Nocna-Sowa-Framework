<?php
//
//  Functions User Character
//



//
//  User Character Structure
//
//  las_char
//
//  Array
//  [
//    'character'     =>  'type'
//    'name'          =>  'Marcin'
//    'title'         =>  'Hårfagre'
//  ]



//  here we need a struct for payment
//  payment info
//  payments history
//  current plan
//  money paid


//
//  Check user char
//  Called on template_redirect
//
function las_check_user_char() {

  $current_user = wp_get_current_user();
  $user_char = get_user_meta( $current_user->ID, 'las_char' );

  if ( !$user_char || !is_array( $user_char[0] ) ) {
    las_redirect_to_create_user_char();
  }

}
add_action('template_redirect', 'las_check_user_char');



//
//  Redirect to profile, if no char
//
function las_redirect_to_create_user_char() {

  if ( !is_page('profil') && !las_is_developer() ) {

    wp_redirect( '/las/profil/' );
    exit;

  }

}


//
//  Get user progress
//  @return array or false
//
function las_get_user_char() {

  $current_user = wp_get_current_user();

  $user_char = get_user_meta( $current_user->ID, 'las_char' );

  //  if there is any meta
  if ( $user_char && is_array( $user_char[0] ) ) {

    return $user_char[0];

  }
  //  if there is no char
  else {

    return false;

  }

}




//
//  Create user character if they are missing
//  @return true or false
//
function las_create_user_char( $struct ) {

  $current_user = wp_get_current_user();

  //  struct needs to be an array
  if ( !is_array( $struct ) ) {
    return false;
  }

  $clean_struct = [];

  //  sanitize all input
  foreach ( $struct as $key => $value ) {

    $clean_struct[ $key ] = sanitize_text_field( $value );

  }

  //  update meta
  $update = update_user_meta( $current_user->ID, 'las_char', $clean_struct );

  return $update;
}



//
//  Reset user char
//  @return true or false
//
function las_reset_user_char() {

  $current_user = wp_get_current_user();

  $is_deleted = delete_user_meta( $current_user->ID, 'las_char' );

  return $is_deleted;

}
//las_reset_user_char();