<?php
//
//  User Character Functions
//



//
//  User Character Structure
//
//  las_char
//
//  Array
//  [
//    'char'          =>  'type'
//    'name'          =>  'Marcin'
//    'nick'          =>  'Hårfagre'
//  ]



//  here we need a struct for payment
//  payment info
//  payments history
//  current plan
//  money paid




//
//  Redirect to profile, if no char
//
function las_redirect_to_create_user_char( $user_char ) {

  if ( !is_page('profil') && !las_is_developer() ) {

    if ( !$user_char || !is_array( $user_char[0] ) ) {

      wp_redirect( '/las/profil/' );
      exit;

    }

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
//  Get char full name
//  @return Name Nick
//
function las_get_user_char_name_nick( $user_char ) {

  return $user_char[ 'name' ] . ' ' . $user_char[ 'nick' ];

}


//
//  Get char type
//  @return Name Nick
//
function las_get_user_char_type( $user_char ) {

  $no = $user_char[ 'char' ];

  if ( !$no || ( $no === 0 ) ) {
    return false;
  }

  $chars_data = las_get_chars_data();

  return $chars_data[ $no ][ 'name' ];

}


//
//  Get char image
//  @return url
//
function las_get_user_profile_img( $user_char ) {

  $no = $user_char[ 'char' ];

  if ( !$no || ( $no === 0 ) ) {
    return false;
  }

  $chars_data = las_get_chars_data();

  return $chars_data[ $no ][ 'img' ];

}



//
//  Get user background image for profile
//
function las_get_user_profile_back( $user_char ) {

  $no = $user_char[ 'char' ];

  if ( !$no || ( $no === 0 ) ) {
    return false;
  }

  $chars_data = las_get_chars_data();

  return $chars_data[ $no ][ 'back' ];

}


//
//  Chars Data
//
function las_get_chars_data() {

  $chars = [

    [],

    [
      'name'  => 'Vedhugger',
      'nameT' => 'Drwal',
      'img'   => '/las/c/i/chars/char_1.jpg',
      'back'  => '/las/c/i/las_test.jpg',
      'desc'  => ''
    ],

    [
      'name'  => 'Forsker',
      'nameT' => 'Naukowiec',
      'img'   => '/las/c/i/chars/char_2.jpg',
      'back'  => '/las/c/i/las_test_8.jpg',
      'desc'  => ''
    ],

    [
      'name'  => 'Fiskejente',
      'nameT' => 'Rybaczka',
      'img'   => '/las/c/i/chars/char_3.jpg',
      'back'  => '/las/c/i/las_test_9.jpg',
      'desc'  => ''
    ],

    [
      'name'  => 'Noaide',
      'nameT' => 'Szaman, Sjaman, Gandfinn',
      'img'   => '/las/c/i/chars/char_4.jpg',
      'back'  => '/las/c/i/las_test_4.jpg',
      'desc'  => ''
    ]

  ];

  return $chars;

}


//
//  Create user character if they are missing
//  @struct is [NAME, NICK, CHAR]
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
  $clean_struct[ 'name' ] = sanitize_text_field( $_POST["FNAME"] );
  $clean_struct[ 'nick' ] = sanitize_text_field( $_POST["NICK"] );
  $clean_struct[ 'char' ] = sanitize_text_field( $_POST["CHAR"] );

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