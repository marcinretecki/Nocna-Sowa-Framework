<?php
//
//  User Progress Functions
//


//
//  User Progress Structure
//
//  las_progress[chapter][type][access_time] => [progress array]
//
//
//  Array
//  [
//    'chapter-name' => [                 //  chapter
//      'id' => 23,                       //  chapter id in database
//      'przewodnik' => [                 //  progress_type
//        '1490692099' => [],               //  access time, UNIX seconds
//        '1490658658' => [],
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
//      'exp'             =>  1952,
//      'ex'              =>  345,
//      'correct'         =>  100,
//      'wrong'           =>  100,
//      'repeat'          =>  222,
//      'trans'           =>  92,
//      'more'            =>  8,
//      'przewodnik'      =>  10,
//      'wyzwanie'        =>  13,
//      't'               =>  16789,
//      'dates'           =>  [ '2017-03-19', '2017-03-22', ... ]
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
//  @return last_wyzwanie_result array( id, progress, first_time )
//
function las_get_last_wyzwanie_result( $user_progress ) {

  //  if the last is empty, don't show anything
  if ( count( $user_progress[ 'last' ] ) === 0 ) {
    return false;
  }

  //  these should be in this order
  $last_chapter = $user_progress[ 'last' ][ 'chapter' ];
  $last_type    = $user_progress[ 'last' ][ 'type' ];
  $last_access  = $user_progress[ 'last' ][ 'access_time' ];
  $first_time   = $user_progress[ 'last' ][ 'first_time' ];

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
//  Update user meta
//  Called on template_redirect
//  At this moment there is access to both user and cookie
//
function las_update_user_meta() {

  global $post;

  //  if it is front or szlak-test, don't do anything
  if ( ( $post->post_name === 'front' ) || ( $post->post_name === 'szlak-test' ) || ( $post->post_name === 'tests' ) ) {
    return;
  }

  //  get the user
  $current_user = wp_get_current_user();

  //  if no user logged in
  if ( !$current_user ) {
    return;
  }

  //  get the former progress
  $user_progress = las_get_user_progress();

  //  get progress object from the cookie
  $user_progress_from_cookie = las_get_user_progress_from_cookie();

  $user_progress = las_mutate_user_meta( $user_progress, $user_progress_from_cookie );

  update_user_meta( $current_user->ID, 'las_progress', $user_progress );
}
add_action('template_redirect', 'las_update_user_meta');




//
//  Mutate user meta
//  Add data from cookie
//  Add new struct for currect page
//
function las_mutate_user_meta( $user_progress, $user_progress_from_cookie ) {

  global $post;
  global $access_time;


  //  COOKIE

  //  sanitize cookie and convert values
  $sanitized_progress_from_cookie = las_sanitize_progress_from_cookie( $user_progress_from_cookie );

  //  check if sanitization returned an array
  //  it can return false if something is wrong
  if ( is_array( $sanitized_progress_from_cookie ) ) {

    //  access time
    //  use it to check if data is correct
    $access_time_from_cookie = $sanitized_progress_from_cookie[ 'access_time' ];

    //  id
    //  use it to check if data is correct
    $id_from_cookie = $sanitized_progress_from_cookie[ 'id' ];

    //  type
    $type_from_cookie = $sanitized_progress_from_cookie[ 'type' ];

    //  chapter
    $chapter_from_cookie = $sanitized_progress_from_cookie[ 'chapter' ];

    //  progress
    $progress_from_cookie = $sanitized_progress_from_cookie[ 'progress' ];

    //  check id between cookie and database
    if ( intval( $user_progress[ $chapter_from_cookie ][ 'id' ] ) === intval( $id_from_cookie ) ) {

      //  check if access time exists in database
      if ( isset( $user_progress[ $chapter_from_cookie ][ $type_from_cookie ][ $access_time_from_cookie ] ) ) {

        //  now we can add data to user progress
        $user_progress[ $chapter_from_cookie ][ $type_from_cookie ][ $access_time_from_cookie ] = $progress_from_cookie;

        //  here we can think about something more subtle than overwrite
        //  but for now it should work

      }

    }

    //  add totals
    $user_progress = las_add_totals( $user_progress, $sanitized_progress_from_cookie );

    //  mark last wyzwanie
    $user_progress = las_mark_last_wyzwanie( $user_progress, $sanitized_progress_from_cookie );

    //  clean the cookie from the old data
    $user_progress_from_cookie = las_remove_access_time_from_cookie( $user_progress_from_cookie, $access_time_from_cookie );

    //  end if sanitized_progress_from_cookie
  }


  //  save back the cookie
  //  modified or not
  las_set_new_progress_cookie( $user_progress_from_cookie );



  //  NEW PAGE PROGRESS

  $current_chapter = $post->post_name;
  $current_chapter_id = $post->ID;
  $current_progress_type = las_get_current_progress_type();

  //  create new progress struct
  $current_page_data = [
    $current_chapter,
    $current_progress_type,
    $access_time,
    $current_chapter_id
  ];

  //  add the struct to the database
  $user_progress = las_create_new_access_struct( $user_progress, $current_page_data );

  return $user_progress;

}






//
//  Create user progress struct
//
//  @$user_progress
//
//  @current_page_data = [
//    0 => $current_chapter,
//    1 => $current_progress_type,
//    2 => $access_time,
//    3 => $current_chapter_id
//  ];
//
//  @return user_progress
//
function las_create_new_access_struct( $user_progress, $current_page_data ) {

  $current_page_chapter         = $current_page_data[ 0 ];
  $current_page_progress_type   = $current_page_data[ 1 ];
  $current_page_access_time     = $current_page_data[ 2 ];
  $current_page_chapter_id      = $current_page_data[ 3 ];

  //  user had no progress, create an array
  if ( !$user_progress ) {
    $user_progress = [];
  }

  //  there was no chapter progress, create it
  if ( !$user_progress[ $current_page_chapter ] ) {
    $user_progress[ $current_page_chapter ] = [];
  }

  //  there was no progress type, create it
  if ( !$user_progress[ $current_page_chapter ][ $current_page_progress_type ] ) {
    $user_progress[ $current_page_chapter ][ $current_page_progress_type ] = [];
  }

  //  there was no progress on this access time
  if ( !$user_progress[ $current_page_chapter ][ $current_page_progress_type ][ $current_page_access_time ] ) {
    $user_progress[ $current_page_chapter ][ $current_page_progress_type ][ $current_page_access_time ] = [];
  }

  //  set the id of the current page
  if ( !$user_progress[ $current_page_chapter ][ 'id' ] ) {
    $user_progress[ $current_page_chapter ][ 'id' ] = $current_page_chapter_id;
  }

  return $user_progress;

}


//  //
//  //  Create user progress struct
//  //  @return user_progress
//  //
//  function las_create_user_progress_struct( $user_progress, $user_cookie_progress ) {





//    return $user_progress;

//  }



//
//  Add all totals
//  @sanitized_progress_from_cookie is an array( access_time, id, type, chapter, progress )
//  @return updated $user_progress
//
function las_add_totals( $user_progress, $sanitized_progress_from_cookie ) {

  $cookie_progress              = $sanitized_progress_from_cookie[ 'progress' ];
  $cookie_progress_type         = $sanitized_progress_from_cookie[ 'type' ];
  $cookie_progress_first_time   = $sanitized_progress_from_cookie[ 'first_time' ];

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


      //  here we need to check if numbers are nor exceeding our maximums
      //  count correct (max 20)
      //  count exp (max correct * multi(correct))
      //  check if first time to add extra 100

      $user_progress[ 'totals' ][ $prop_name ] += $prop;

    }

  }

  if ( $cookie_progress_first_time ) {

    $multi = las_get_leveling_system_multi();

    $first_time_exp = $multi[ 'first_time' ];

    if ( $first_time_exp ) {

      $user_progress[ 'totals' ][ 'exp' ] += $first_time_exp;

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
//
//  @sanitized_progress_from_cookie is an array( access_time, id, type, chapter, progress )
//  @return updated user_progress
//
function las_mark_last_wyzwanie( $user_progress, $sanitized_progress_from_cookie ) {

  $cookie_access          = $sanitized_progress_from_cookie[ 'access_time' ];
  $cookie_chapter         = $sanitized_progress_from_cookie[ 'chapter' ];
  $cookie_type            = $sanitized_progress_from_cookie[ 'type' ];
  $first_time             = false;

  //  if there was only one access of this type in chapter
  if ( count( $user_progress[ $cookie_chapter ][ $cookie_type ] ) === 1 ) {
    $first_time = 'true';
  }

  $user_progress[ 'last' ] = [
    'chapter'       => $cookie_chapter,
    'type'          => $cookie_type,
    'access_time'   => $cookie_access,
    'first_time'    => $first_time
  ];

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
//  Reset user progress
//  @return true or false
//
function las_reset_user_meta() {

  $current_user = wp_get_current_user();

  $is_deleted = delete_user_meta( $current_user->ID, 'las_progress' );

  return $is_deleted;

}
//las_reset_user_meta();