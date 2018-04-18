<?php
//
//  Includes – Globals
//

//  testing
$test_time_start = microtime(true);


global $post;
global $access_time;
$id = $post->ID;


if ( is_user_logged_in() ) {

  //  progress
  $user_progress = las_get_user_progress();
  $user_exp = las_get_user_exp( $user_progress );
  $level_array = las_get_user_level_array( $user_exp );
  $user_level = $level_array[0];
  $exp_for_next = $level_array[1];


  //  char
  $user_char = las_get_user_char();
  $user_img_url = las_get_user_profile_img( $user_char );
  $user_nick = las_get_user_char_full_name( $user_char );

}