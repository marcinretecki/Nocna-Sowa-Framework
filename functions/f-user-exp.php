<?php
//
//  Leveling system
//  Experience functions
//



//
//  Leveling system multiplicators
//  @return array
//
function las_get_leveling_system_multi() {

  //  cookie has additional @ex prop, which counts number of examples done
  //  don't use it for experience counting

  $multi = [
    'first_time' =>   100,
    'correct' =>       10,
    'wrong'   =>       -5,
    'repeat'  =>        2,
    'trans'   =>        2,
    'more'    =>        2
  ];

  return $multi;

}


//
//  Get new exp
//  pass user_progress to avoid additional calls to same function
//  @return exp
//
function las_get_exp_from_progress( $user_cookie_progress ) {

  $exp              = 0;
  $multi            = las_get_leveling_system_multi();
  $cookie_progress  = $user_cookie_progress[ 'progress' ];

  //  Correct
  if ( $cookie_progress['correct'] > 0 ) {

    $exp += $cookie_progress['correct'] * $multi['correct'];

  }

  //  Wrong
  if ( $cookie_progress['wrong'] > 0 ) {

    $exp += $cookie_progress['wrong'] * $multi['wrong'];

  }

  //  Repeat
  if ( $cookie_progress['repeat'] > 0 ) {

    $exp += $cookie_progress['repeat'] * $multi['repeat'];

  }

  //  More
  if ( $cookie_progress['more'] > 0 ) {

    $exp += $cookie_progress['more'] * $multi['more'];

  }

  //  Trans
  if ( $cookie_progress['trans'] > 0 ) {

    $exp += $cookie_progress['trans'] * $multi['trans'];

  }


  //  user can't recive minus exp, so return 0
  if ( $exp < 0 ) {
    $exp = 0;
  }

  return $exp;
}



//
//  Get user's experience
//  pass args to avoid additional calls to same function
//  @return integer
//
function las_get_user_exp( $user_progress ) {

  if ( $user_progress['totals']['exp'] ) {
    return $user_progress['totals']['exp'];
  }
  else {
    return 0;
  }

}



//
//  Add exp
//  @return updated $user_progress
//
function las_add_exp( $user_progress, $user_cookie_progress ) {

  $cookie_progress        = $user_cookie_progress[ 'progress' ];
  $cookie_chapter         = $user_cookie_progress[ 'chapter' ];
  $cookie_progress_type   = $user_cookie_progress[ 'progress_type' ];
  $cookie_access          = $user_cookie_progress[ 'access' ];

  $multi = las_get_leveling_system_multi();

  //  first visit on this przewodnik
  if ( ( $cookie_progress_type === 'przewodnik' ) && ( count( $user_progress[ $cookie_chapter ][ $cookie_progress_type ] ) === 1 ) ) {

    $exp = $multi[ 'first_time' ];

  }
  //  wyzwanie
  elseif ( $cookie_progress_type === 'wyzwanie' ) {

    $exp = las_get_exp_from_progress( $user_cookie_progress );

  }
  else {

    $exp = 0;

  }


  //  assign exp
  $user_progress[ $cookie_chapter ][ $cookie_progress_type ][ $cookie_access ][ 'exp' ] = $exp;


  //  if user had previous exp, add it
  if ( $user_progress[ 'totals' ][ 'exp' ] > 0 ) {
    $user_progress[ 'totals' ][ 'exp' ] += $exp;
  }
  //  if they had no exp, assign
  else {
    $user_progress[ 'totals' ][ 'exp' ] = $exp;
  }

  return $user_progress;

}



//
//  Get user level
//  @return array(level, exp for next level)
//
function las_get_user_level_array( $user_exp ) {

  //  create array of levels
  //  and check if the new value is higher, than the last
  $levels_exp_array = [];

  //  begin with 2, because 1 doesn't need any exp
  $levels_i = 2;
  $levels_max = 50;
  $levels_add = 600;
  $levels_multiplier = 1.1;
  $user_level = 0;
  $exp_for_next = 0;
  $exp_for_previous = 0;

  for ( ; $levels_i <= $levels_max; $levels_i++ ) {

    $levels_exp_array[$levels_i] = round( ( ( $levels_exp_array[$levels_i - 1] * $levels_multiplier ) + $levels_add ), 0 );

    $exp_for_next = $levels_exp_array[ $levels_i ];

    if ( $exp_for_next > $user_exp ) {

      $user_level = $levels_i - 1;
      $exp_for_previous = $levels_exp_array[ $levels_i -1 ];
      break;

    }

  }

  return array( $user_level, $exp_for_next, $exp_for_previous );

}



//
//  Get level percent for the next
//  @return xx%
//
function las_get_level_percent( $user_exp, $level_array ) {

  $prev_level = $level_array[2];
  $next_level = $level_array[1];

  $exp_diff = $next_level - $prev_level;
  $exp_needed = $next_level - $user_exp;

  $percent = floor( ( ( $exp_diff - $exp_needed ) / $exp_diff ) * 100) . '%';

  return $percent;
}


