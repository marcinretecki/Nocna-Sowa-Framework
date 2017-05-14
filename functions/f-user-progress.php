<?php
//
//  Functions User Progress
//


//
//  User Progress Structure
//
//  las_progress
//
//  Array
//  [
//    'chapter-1' => [                  //  chapter
//      'przewodnik' => [                 //  progress_type
//        '1490692099',                     //  access time, UNIX seconds
//        '1490658658',
//        ...
//      ],
//      'wyzwanie' => [
//        '1490692099' => [               //  props
//          'ex'        => 16,            //  ilość przykładów
//          't'         => 544,           //  w sekundach
//                                        //  jeśli t==0 to znaczy, że nie skończył danego ćwiczenia
//          'repeat'    => 23,            //  ilośc powtórzeń na głos
//          'more'      => 3,             //  ilośc dopowiedzeń
//          'wrong'     => 17,            //  ilość błędnych odpowiedzi
//          'trans'     => 12             //  ilość tłumaczeń
//        ],
//        '1490693000' => [
//          ...
//        ],
//        ...
//      ],
//      'wyzwanie-suma-ex' =>  44
//    ],
//    'chapter-2' => [
//      ...
//    ],
//    'totals'  =>  [
//      'ex'              =>  345,
//      'repeat'          =>  222,
//      'wrong'           =>  100,
//      'trans'           =>  92,
//      'more'            =>  8
//      'przewodnik'      =>  10,
//      'wyzwanie'        =>  13,
//      't'               =>  16789,
//      'dates'           =>  [2017-03-19, 2017-03-22, ...],
//      'exp'             =>  1952
//    ],
//    'last' => [chapter, type, access],
//  ]



//
//  Get user progress
//  @return array or false
//
function las_get_user_progress( $id = 0 ) {

  if ( $id === 0 ) {
    $current_user = wp_get_current_user();
    $id = $current_user->ID;
  }


  $user_meta = get_user_meta( $id, 'las_progress' );

  //  if there is any meta
  if ( $user_meta && is_array( $user_meta[0] ) ) {

    return $user_meta[0];

  }
  //  if there is no meta, we need to create it
  else {

    $user_meta = las_create_user_meta();
    return $user_meta;

  }

}



//
//  Get results from last wyzwanie
//  @return last_wyzwanie_result array
//
function las_get_last_wyzwanie_result( $user_progress ) {

  //  if the last is empty, don't show anything
  if ( count( $user_progress[ 'last' ] ) === 0 ) {
    return false;
  }

  //  these should be in this order
  $last_chapter = $user_progress[ 'last' ][0];
  $last_type    = $user_progress[ 'last' ][1];
  $last_access  = $user_progress[ 'last' ][2];
  $first_time   = $user_progress[ 'last' ][3];

  $last_wyzwanie_result = $user_progress[ $last_chapter ][ $last_type ][ $last_access ];
  $last_wyzwanie_result[ 'id' ] = $user_progress[ $last_chapter ][ 'id' ];

  if ( $first_time ) {
    $last_wyzwanie_result[ 'first_time' ] = true;
  }

  return $last_wyzwanie_result;

}



//
//  Get user cookie progress (previous page access)
//  sanitize all input
//  @return array [previous page progress, access time, chapter name, progress type]
//  or false
//
//  Example cookie
//  array(5) {
//    ["progress"]=>
//    array(2) {
//      ["exp"]=>
//      int(0)
//      ["ex"]=>
//      int(2)
//    }
//    ["access"]=>
//    int(1493363680)
//    ["chapter"]=>
//    string(4) "test"
//    ["progress_type"]=>
//    string(8) "wyzwanie"
//    ["id"]=>
//    int(213)
//  }
function las_get_user_cookie_progress() {

  $user_cookie_progress = json_decode( stripslashes( $_COOKIE["lasChallangeProgress"] ), true );

  //  no cookie
  //  or cookie is null
  //  or it is not an array
  if (    !$user_cookie_progress
       || ( $user_cookie_progress === NULL )
       || !is_array( $user_cookie_progress ) ) {
    return false;
  }

  //  just in case, reset array pointer
  reset( $user_cookie_progress );

  //  get name of the first key of user_cookie_progress
  $chapter = sanitize_file_name( key( $user_cookie_progress ) );

  //  if chapter is not an array
  if ( !is_array( $user_cookie_progress[ $chapter ] ) ) {
    return false;
  }

  //  get name of the first key of chapter
  $progress_type = sanitize_file_name( key( $user_cookie_progress[ $chapter ] ) );

  //  if chapter is not an array
  if ( !is_array( $user_cookie_progress[ $chapter ][ $progress_type ] ) ) {
    return false;
  }

  //  get name of the first key of progress_type
  $access = key( $user_cookie_progress[ $chapter ][ $progress_type ] );

  //  if access is not a number
  if ( !is_integer( $access ) ) {
    return false;
  }

  $progress = $user_cookie_progress[ $chapter ][ $progress_type ][ $access ];

  //  if progress is not an array
  if ( !is_array( $progress ) ) {
    return false;
  }

  //  check values
  foreach ( $progress as $value ) {

    //  if any of the values in progress are not integrs
    if ( !is_integer( $value ) ) {
      return false;
    }

  }

  $id = $user_cookie_progress[ $chapter ][ 'id' ];

  //  if id is not integer
  if ( !is_integer( $id ) ) {
    return false;
  }

  return  array(
              'progress'        =>  $progress,
              'access'          =>  $access,
              'chapter'         =>  $chapter,
              'progress_type'   =>  $progress_type,
              'id'              =>  $id
          );

}



//
//  Update user meta
//  Called on template_redirect
//  At this moment there is access to both user and cookie
//
function las_update_user_meta() {

  global $post;
  $current_chapter = $post->post_name;
  $current_chapter_id = $post->ID;

  //  if it is front or szlak-test, don't do anything
  if (    ( $current_chapter === 'front' )
       || ( $current_chapter === 'szlak-test' )
     ) {
    return;
  }


  $current_user = wp_get_current_user();
  $user_progress = las_get_user_progress();
  $current_time = time();
  $current_progress_type = las_get_current_progress_type();


  //  get array of user progress values, chapter, progress type
  $user_cookie_progress = las_get_user_cookie_progress();


  //  set new cookie
  las_set_new_progress_cookie( $current_chapter, $current_progress_type, $current_time, $current_chapter_id );


  //  if user has no current progress in cookie, don't execute the rest
  if ( !$user_cookie_progress  ) {
    return;
  }


  //  create user progress struct
  $user_progress = las_create_user_progress_struct( $user_progress, $user_cookie_progress );


  //  assign for legibility below
  $cookie_progress        = $user_cookie_progress[ 'progress' ];
  $cookie_access          = $user_cookie_progress[ 'access' ];
  $cookie_chapter         = $user_cookie_progress[ 'chapter' ];
  $cookie_progress_type   = $user_cookie_progress[ 'progress_type' ];
  $cookie_chapter_id      = $user_cookie_progress[ 'id' ];


  //  add user meta according to cookies
  //  set number of examples, mistakes, times etc.
  $user_progress[ $cookie_chapter ][ $cookie_progress_type ][ $cookie_access ] = $cookie_progress;


  //  if there is ex number
  //  add it to the totals
  if ( $cookie_progress['ex'] ) {

    //  add to the sum of ex
    if ( $user_progress[ $cookie_chapter ][ 'wyzwanie-suma-ex' ] ) {
      $user_progress[ $cookie_chapter ][ 'wyzwanie-suma-ex' ] += $cookie_progress['ex'];
    }
    //  create the sum of ex
    else {
      $user_progress[ $cookie_chapter ][ 'wyzwanie-suma-ex' ] = $cookie_progress['ex'];
    }

  }


  //  add totals
  $user_progress = las_add_totals( $user_progress, $user_cookie_progress );


  //  add exp
  //  must be after add totals
  $user_progress = las_add_exp( $user_progress, $user_cookie_progress );


  //  mark the last wyzwanie
  $user_progress = las_mark_last_wyzwanie( $user_progress, $user_cookie_progress );


  //  update meta
  //  think about sanitization
  update_user_meta( $current_user->ID, 'las_progress', $user_progress );

}
add_action('template_redirect', 'las_update_user_meta');



//
//  Create user progress struct
//  @return user_progress
//
function las_create_user_progress_struct( $user_progress, $user_cookie_progress ) {

  $cookie_progress        = $user_cookie_progress[ 'progress' ];
  $cookie_access          = $user_cookie_progress[ 'access' ];
  $cookie_chapter         = $user_cookie_progress[ 'chapter' ];
  $cookie_progress_type   = $user_cookie_progress[ 'progress_type' ];
  $cookie_chapter_id      = $user_cookie_progress[ 'id' ];

  //  user had no progress, create array
  if ( !$user_progress ) {
    $user_progress = [];
  }

  //  there was no chapter progress, create it
  if ( !$user_progress[ $cookie_chapter ] ) {
    $user_progress[ $cookie_chapter ] = [];
  }

  //  there was no progress type, create it
  if ( !$user_progress[ $cookie_chapter ][ $cookie_progress_type ] ) {
    $user_progress[ $cookie_chapter ][ $cookie_progress_type ] = [];
  }

  //  there was no progress on this access time
  if ( !$user_progress[ $cookie_chapter ][ $cookie_progress_type ][ $cookie_access ] ) {
    $user_progress[ $cookie_chapter ][ $cookie_progress_type ][ $cookie_access ] = [];
  }

  //  set the id of the current page
  if ( !$user_progress[ $cookie_chapter ][ 'id' ] ) {
    $user_progress[ $cookie_chapter ][ 'id' ] = $cookie_chapter_id;
  }

  return $user_progress;

}



//
//  Add all totals
//  pass args to avoid additional calls to same function
//  @return updated $user_progress
//
function las_add_totals( $user_progress, $user_cookie_progress ) {

  $cookie_progress        = $user_cookie_progress[ 'progress' ];
  $cookie_progress_type   = $user_cookie_progress[ 'progress_type' ];

  //  first add current date
  $user_progress = las_add_totals_date( $user_progress );

  //  add +1 to wisited pages
  $user_progress[ 'totals' ][ $cookie_progress_type ] += 1;

  //  if wyzwanie
  if ( $cookie_progress_type === 'wyzwanie' ) {

    //  add all other totals
    foreach ( $cookie_progress as $prop_name => $prop ) {

      $user_progress[ 'totals' ][ $prop_name ] += $prop;

    }

  }


  return $user_progress;

}



//
//  Add to user streak
//  pass user_progress to avoid additional calls to same function
//  @return updated $user_progress
//
function las_add_totals_date( $user_progress ) {

  //  get current date
  $today = date( 'Y-m-d' );

  //  check if totals exists
  if ( !$user_progress[ 'totals' ] ) {
    $user_progress[ 'totals' ] = [];
  }

  //  check if dates array exists
  if ( !$user_progress[ 'totals' ][ 'dates' ] ) {
    $user_progress[ 'totals' ][ 'dates' ] = [];
  }

  //  check if current day is already saved
  //  if not, add it
  if ( !in_array( $today, $user_progress[ 'totals' ][ 'dates' ] ) ) {

    $user_progress[ 'totals' ][ 'dates' ][] = $today;

  }

  return $user_progress;

}



//
//  Mark the last wyzwanie
//  This way it is easier to show the results page without looping through everything again
//  @return updated user_progress
//
function las_mark_last_wyzwanie( $user_progress, $user_cookie_progress ) {

  $cookie_access          = $user_cookie_progress[ 'access' ];
  $cookie_chapter         = $user_cookie_progress[ 'chapter' ];
  $cookie_progress_type   = $user_cookie_progress[ 'progress_type' ];

  //  make an array that shows the last wyzwanie
  if ( $cookie_progress_type === 'wyzwanie' ) {
    $user_progress[ 'last' ] = [ $cookie_chapter, $cookie_progress_type, $cookie_access ];
  }

  if ( count( $user_progress[ $last_chapter ][ $last_type ] ) === 1 ) {
    $user_progress[ 'last' ][3] = 'true';
  }

  return $user_progress;

}



//
//  Reset las wyzwanie from user meta
//  saves to the database
//
function las_reset_last_wyzwanie_user_meta() {

  $current_user = wp_get_current_user();
  $user_progress = las_get_user_progress();

  $user_progress[ 'last' ] = [];

  update_user_meta( $current_user->ID, 'las_progress', $user_progress );

}



//
//  Create user meta if they are missing
//  @return new meta
//
function las_create_user_meta() {


  $new_meta = [

      'totals'  =>  [
        'dates'           =>  [ date('Y-m-d') ]
      ]

  ];

  return $new_meta;

}



//
//  Get current progress type
//  @return current_progress_type
//
function las_get_current_progress_type() {

  if ( get_query_var( 'przewodnik' ) ) {
    $current_progress_type = 'przewodnik';
  }
  elseif ( get_query_var( 'wyzwanie' ) ) {
    $current_progress_type = 'wyzwanie';
  }
  else {
    $current_progress_type = 'page';
  }

  return $current_progress_type;

}



//
//  Set new cookie for the current page
//
function las_set_new_progress_cookie( $current_chapter, $current_progress_type, $current_time, $current_chapter_id ) {

  //  it is szlak
  //  or profile
  //  or other page that we don;t want ot measure directly
  if ( ( $current_chapter === 'profil' ) || ( $current_chapter === 'szlak' ) ) {
    setcookie( "lasChallangeProgress", json_encode( [] ), $current_time - 1, "/las/" );
    return;
  }

  //  dlaczego jest od razu exp?
  //  bo inaczej w JS nie będzie object, tylko array

  $new_cookie = json_encode( [
                  $current_chapter => [
                    $current_progress_type => [ $current_time => [ 'exp' => 0 ] ],
                    'id' => $current_chapter_id
                  ]
                ] );

  setcookie( "lasChallangeProgress", $new_cookie, $current_time + 10000, "/las/" );

}



//
//  Reset user progress
//  @return true or false
//
function las_reset_user_meta() {

  $current_user = wp_get_current_user();

  $is_deleted = delete_user_meta( $current_user->ID, 'las_progress' );

  return $is_deleted;

}
//las_reset_user_meta();




//
//  Leveling system
//



//  TODO
//  check if ex number is the same as real number of ex in chapter
//  before adding exp to the user


//
//  Leveling system multiplicators
//  @return array
//
function las_get_leveling_system_multi() {

  $multi = [
    'chapter' =>  200,
    'ex'      =>   10,
    'repeat'  =>    2,
    'trans'   =>    2,
    'more'    =>    5,
    'wrong'   =>   -5
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

  //  Ex
  if ( $cookie_progress['ex'] > 0 ) {

    $exp += $cookie_progress['ex'] * $multi['ex'];

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

  //  Wrong
  if ( $cookie_progress['wrong'] > 0 ) {

    $exp += $cookie_progress['wrong'] * $multi['wrong'];

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
//  Get level percent for the next
//
function las_get_level_percent( $user_exp, $level_array ) {

  $prev_level = $level_array[2];
  $next_level = $level_array[1];

  $exp_diff = $next_level - $prev_level;
  $exp_needed = $next_level - $user_exp;

  $percent = floor( ( ( $exp_diff - $exp_needed ) / $exp_diff ) * 100) . '%';

  return $percent;
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

    $exp = $multi[ 'chapter' ];

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