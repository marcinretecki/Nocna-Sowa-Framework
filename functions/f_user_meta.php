<?php
//
//  Functions User Metadata
//


//
//  User Meta Structure
//
//  Array
//  [
//    'test' => [                         //  chapter
//      'przewodnik' => [                 //  progress_type
//        '1490692099',                   //  access time, UNIX seconds
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
//    'liczby' => [
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
//      'dates'           => [2017-03-19, 2017-03-22, ...]
//    ],
//    last => [chapter, type, access]
//  ]


//
//  Get user progress
//  @return array or false
//
function las_get_user_progress() {

  $current_user = wp_get_current_user();

  $user_meta = get_user_meta( $current_user->ID, 'las_progress' );

  //  if there is any meta
  if ( $user_meta && is_array($user_meta[0]) ) {
    return $user_meta[0];

  }
  //  if there is no meta, we need to create it
  else {
    $user_meta = las_create_user_meta();
    return $user_meta;
  }

}



//
//  Get user cookie progress (previous page access)
//  @return array [previous page progress, access time, chapter name, progress type]
//  or false
//
function las_get_cookie_progress() {

  $cookie_progress = json_decode( stripslashes($_COOKIE["lasChallangeProgress"] ), true );

  if ( !$cookie_progress || ( $cookie_progress === NULL ) || !is_array($cookie_progress) ) {
    return false;
  }

  //  just in case, reset array pointer
  reset( $cookie_progress );

  //  get name of the first key of cookie_progress
  $chapter = key( $cookie_progress );

  //  get name of the first key of chapter
  $progress_type = key( $cookie_progress[ $chapter ] );

  //  get name of the first key of progress_type
  $access = key( $cookie_progress[ $chapter ][ $progress_type ] );

  $progress = $cookie_progress[ $chapter ][ $progress_type ][ $access ];

  return  array(
              'progress'        =>  $progress,
              'access'          =>  $access,
              'chapter'         =>  $chapter,
              'progress_type'   =>  $progress_type,
              'id'              =>  $cookie_progress[ $chapter ][ 'id' ]
          );

}




//
//  Update user meta
//  It is called on template_redirect
//  At this moment there is access to both user and cookie
//
function las_update_user_meta() {

  global $post;
  $current_chapter = $post->post_name;
  $current_chapter_id = $post->ID;

  //  if it is front, don't do anything
  if ( ( $current_chapter === 'front' ) || ( $current_chapter === 'szlak-test' ) ) {
    return;
  }


  $current_user = wp_get_current_user();
  $user_progress = las_get_user_progress();
  $current_time = time();
  $current_progress_type = las_get_current_progress_type();


  //  get array of user progress values, chapter, progress type
  $user_cookie_progress = las_get_cookie_progress();


  //  set new cookie
  las_set_new_progress_cookie( $current_chapter, $current_progress_type, $current_time, $current_chapter_id );


  //  if user has no current progress in cookie, don't execute the rest
  if ( !$user_cookie_progress ) {
    return;
  }

  //  assign for legibility below
  $cookie_progress        = $user_cookie_progress['progress'];
  $cookie_access          = $user_cookie_progress['access'];
  $cookie_chapter         = $user_cookie_progress['chapter'];
  $cookie_progress_type   = $user_cookie_progress['progress_type'];
  $cookie_chapter_id      = $user_cookie_progress['id'];


  //  create user progres struct
  $user_progress = las_create_user_progress_struct( $user_progress, $cookie_progress, $cookie_access, $cookie_chapter, $cookie_progress_type, $cookie_chapter_id );


  //  add user meta according to cookies
  //  set number of examples, mistakes, times etc.
  $user_progress[ $cookie_chapter ][ $cookie_progress_type ][ $cookie_access ] = $cookie_progress;


  //  if there is ex number
  //  add it to the totals
  if ( $cookie_progress['ex'] ) {

    //  create the sum of ex
    if ( !$user_progress[ $cookie_chapter ][ 'wyzwanie-suma-ex' ] ) {
      $user_progress[ $cookie_chapter ][ 'wyzwanie-suma-ex' ] = $cookie_progress['ex'];
    }
    //  add to the sum of ex
    else {
      $user_progress[ $cookie_chapter ][ 'wyzwanie-suma-ex' ] += $cookie_progress['ex'];
    }

  }


  //  add totals
  $user_progress = las_add_totals( $user_progress, $cookie_progress, $cookie_progress_type );


  //  mark the last wyzwanie
  $user_progress = las_mark_last_wyzwanie( $user_progress, $cookie_chapter, $cookie_progress_type, $cookie_access );


  //  update meta
  //  think about sanitization
  update_user_meta( $current_user->ID, 'las_progress', $user_progress );

}
add_action('template_redirect', 'las_update_user_meta');



//
//  Create user progress struct
//  @return user_progress
//
function las_create_user_progress_struct( $user_progress, $cookie_progress, $cookie_access, $cookie_chapter, $cookie_progress_type, $cookie_chapter_id ) {

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
function las_add_totals( $user_progress, $cookie_progress, $cookie_progress_type ) {

  //  first add current date
  $user_progress = las_add_totals_date( $user_progress );

  //  add +1 to wizited pages
  $user_progress['totals'][$cookie_progress_type] += 1;

  //  if wyzwanie
  if ( $cookie_progress_type === 'wyzwanie' ) {

    //  add all other totals
    foreach ( $cookie_progress as $prop_name => $prop ) {

      $user_progress['totals'][$prop_name] += $prop;

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
  $today = date('Y-m-d');

  //  check if totals exists
  if ( !$user_progress['totals'] ) {
    $user_progress['totals'] = [];
  }

  //  check if dates array exists
  if ( !$user_progress['totals']['dates'] ) {
    $user_progress['totals']['dates'] = [];
  }

  //  check if current day is already saved
  //  if not, add it
  if ( !in_array( $today, $user_progress['totals']['dates'] ) ) {

    $user_progress['totals']['dates'][] = $today;

  }

  return $user_progress;

}



//
//  Mark the last wyzwanie
//  This way it is easier to show the results page without looping through everything again
//  @return updated user_progress
//
function las_mark_last_wyzwanie( $user_progress, $cookie_chapter, $cookie_progress_type, $cookie_access ) {

  //  make an array that shows the last wyzwanie
  if ( $cookie_progress_type === 'wyzwanie' ) {
    $user_progress['last'] = [ $cookie_chapter, $cookie_progress_type, $cookie_access ];
  }

  if ( count( $user_progress[$last_chapter][$last_type] ) === 1 ) {
    $user_progress['last'][3] = 'true';
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

  $user_progress['last'] = [];

  update_user_meta( $current_user->ID, 'las_progress', $user_progress );

}



//
//  Create user meta if they are missing
//  @return new meta
//
function las_create_user_meta() {


  $new_meta = [

      'totals'  =>  [
        'dates'           =>  [date('Y-m-d')]
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

  $new_cookie = json_encode( [
                  $current_chapter => [
                    $current_progress_type => [ $current_time => [ 't' => 0 ] ],
                    'id' => $current_chapter_id
                  ]
                ] );
  setcookie("lasChallangeProgress", $new_cookie, $current_time + 10000, "/las/");

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