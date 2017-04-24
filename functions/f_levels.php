<?php

//
//  Leveling system
//
//  TYPE          VALUE
//  Chapter       200
//  Ex            10
//  Repeat        2
//  More          5
//  Trans         2
//  Wrong        -5
//
//


//  Get user's experience
//  pass args to avoid additional calls to same function
//  @return integer
function las_get_user_exp( $user_progress ) {

  //  return for testing
  return 1953;

  if ( $user_progress['totals']['exp'] ) {
    return $user_progress['totals']['exp'];
  }
  else {
    return 0;
  }

}


//  Get user level
//  return array(level, exp for next level)
function las_get_user_level_array( $user_exp ) {

  //  no experience, so user is on 1 level
  if ( !$user_exp || ( $user_exp === 0 ) ) {
    return 1;
  }

  //  create array of levels
  //  and check if the new value is higher, than the last
  $levels_exp_array = [];

  //  begin with 2, because 1 doesn't need any exp
  $levels_i = 2;
  $levels_max = 50;
  $levels_add = 600;
  $levels_multiplier = 1.1;
  $user_level = 50;
  $exp_for_next = 0;

  for ( ; $levels_i <= $levels_max; $levels_i++ ) {

    $levels_exp_array[$levels_i] = ( $levels_exp_array[$levels_i - 1] * $levels_multiplier ) + $levels_add;

    if ( $levels_exp_array[$levels_i] > $user_exp ) {

      $user_level = $levels_i - 1;
      $exp_for_next = $levels_exp_array[$levels_i];
      break;

    }

  }

  return array( $user_level, $exp_for_next );

}

