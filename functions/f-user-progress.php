<?php
//
//  User Progress Functions
//


//
//  User Progress Structure
//
//  las_progress
//
//  Array
//  [
//    'chapter-1' => [                  //  chapter
//      'id' => 23,                       //  chapter id in database
//      'przewodnik' => [                 //  progress_type
//        '1490692099',                     //  access time, UNIX seconds
//        '1490658658',
//        ...
//      ],
//      'wyzwanie' => [
//        '1490692099' => [                 //  props
//          'exp'         => 240,           //  experience for chapter
//          'ex'          => 16,            //  ilość przykładów albo segmentów
//          'correct'     => 10,            //  ilość poprawnych odpowiedzi
//          'wrong'       => 17,            //  ilość błędnych odpowiedzi
//          'repeat'      => 23,            //  ilośc powtórzeń na głos
//          'trans'       => 12,            //  ilość tłumaczeń
//          'more'        => 3,             //  ilośc dopowiedzeń
//          't'           => 544,           //  w sekundach (t==0 - nie skończył wyzwania)
//          'finished'    => 0              //  czy skończył ćwiczenie
//        ],
//        '1490693000' => [
//          ...
//        ],
//        ...
//      ]
//    ],
//    'chapter-2' => [
//      ...
//    ],
//    'totals'  =>  [
//      'ex'              =>  345,
//      'correct'         =>  100,
//      'wrong'           =>  100,
//      'repeat'          =>  222,
//      'trans'           =>  92,
//      'more'            =>  8
//      'przewodnik'      =>  10,
//      'wyzwanie'        =>  13,
//      't'               =>  16789,
//      'dates'           =>  [ '2017-03-19', '2017-03-22', ... ],
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

  $last_wyzwanie_result = [];

  $last_wyzwanie_result[ 'progress' ] = $user_progress[ $last_chapter ][ $last_type ][ $last_access ];
  $last_wyzwanie_result[ 'id' ] = $user_progress[ $last_chapter ][ 'id' ];

  if ( $first_time ) {
    $last_wyzwanie_result[ 'first_time' ] = true;
  }

  return $last_wyzwanie_result;

}


//
//  Calculate correct sum
//  @user_progress
//  @slug of the chapter
//
//  it is used by szlak.php to show all correct answers in the chapter
//
function las_get_wyzwanie_correct_sum( $user_progress, $slug ) {

  $correct_sum = 0;

  //  if nothing to show, return 0;
  if ( !$user_progress[ $slug ] || !$user_progress[ $slug ][ 'wyzwanie' ]  ) {
    return $correct_sum;
  }

  //
  $wyzwanie_dates = $user_progress[ $slug ][ 'wyzwanie' ];

  foreach ( $wyzwanie_dates as $date => $wyzwanie ) {

    $correct_sum += $wyzwanie[ 'correct' ];

  }

  return ( $correct_sum );
}



//
//  Get the sum of finished attempts of a wyzwanie
//  @user_progress
//  @slug of the chapter
//
//  it is used by wyzwanie-js-helper.php
//
function las_get_wyzwanie_finished_sum( $user_progress, $slug ) {

  $finished_no = 0;

  //  if nothing to show, return 0;
  if ( !$user_progress[ $slug ] || !$user_progress[ $slug ][ 'wyzwanie' ]  ) {
    return $finished_no;
  }

  $wyzwanie_dates = $user_progress[ $slug ][ 'wyzwanie' ];

  foreach ( $wyzwanie_dates as $date => $wyzwanie ) {

    if ( $wyzwanie[ 'finished' ] && ( $wyzwanie[ 'finished' ] > 0 ) ) {

      $finished_no += 1;

    }

  }

  return ( $finished_no );

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
  if ( ( $current_chapter === 'front' ) || ( $current_chapter === 'szlak-test' ) ) {
    return;
  }


  $current_user = wp_get_current_user();
  $user_progress = las_get_user_progress();
  $current_progress_type = las_get_current_progress_type();


  //  get array of user progress values, chapter, progress type
  $user_cookie_progress = las_get_user_cookie_progress();


  //  set new cookie
  //las_set_new_progress_cookie( $current_chapter, $current_progress_type, $current_chapter_id );


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

  //  if there is progress type
  //  add +1 to visited pages
  if ( $cookie_progress_type ) {
    $user_progress[ 'totals' ][ $cookie_progress_type ] += 1;
  }

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
//  Reset last wyzwanie from user meta
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

    'totals'  => [
      'dates' =>    [ date('Y-m-d') ]
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
//  Reset user progress
//  @return true or false
//
function las_reset_user_meta() {

  $current_user = wp_get_current_user();

  $is_deleted = delete_user_meta( $current_user->ID, 'las_progress' );

  return $is_deleted;

}
//las_reset_user_meta();