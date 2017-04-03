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
//        [                               //  props
//          'access'    => 1490692099     //  UNIX seconds
//          'ex'        => 16,
//          't'         => 544,           //  w sekundach
//          'repeat'    => 23,
//          'more'      => 3,
//          'wrong'     => 17,
//          'trans'     => 12
//        ],
//        [
//          'access'    => 1490692099,
//          ...
//        ],
//        ...
//      ],
//      'wyzwanie-suma' =>  44
//    ],
//    'liczby' => [
//      ...
//    ]
//  ]





//
// Check if user visits course's "przewodnik"
// if yes, then update his meta
//
function las_update_user_meta() {
  global $post;
  $current_user = wp_get_current_user();
  $user_progress = las_get_user_progress();
  $current_time = time();
  $chapter = $post->post_name;

  $cookieProgress = json_decode( stripslashes($_COOKIE["lasChallangeProgress"] ), true );

  // which page is it?
  if ( get_query_var( 'przewodnik' ) ) {
    $progress_type = 'przewodnik';
  }
  elseif ( get_query_var( 'wyzwanie' ) ) {
    $progress_type = 'wyzwanie';
  }
  else {
    $progress_type = 'page';
  }


  //
  //  przewodnik and wyzwanie timestamps are set on access
  //

  //  don't do it on every page
  if (    ( $chapter !== 'szlak-test' )
       && ( $chapter !== 'profil' )
       && ( $chapter !== 'szlak' )
       && ( $chapter !== 'front' )
     ) {

    //  user had no progress, create array
    if ( !$user_progress ) {
      $user_progress = [];
    }

    //  there was no chapter progress, create it
    if ( !$user_progress[$chapter] ) {
      $user_progress = [$chapter];
    }

    //  there was no progress type, create it
    if ( !$user_progress[$chapter][$progress_type] ) {
      $user_progress[$chapter] = [ $progress_type => [] ];
    }

    //  if przewodnik, set current time as new meta
    if ( $progress_type === 'przewodnik' ) {
      $user_progress[$chapter][$progress_type][] = $current_time;
    }
    //  if wyzwanie, create new array with time as a key
    else {
      $user_progress[$chapter][$progress_type][$current_time] = [];
    }




    //
    //  update user meta according to cookies
    //  set number of examples, mistakes, times etc.
    //  this is usally only the previous visited page or wyzwanie
    //
    if ( $cookieProgress && ( $cookieProgress !== NULL ) && ( is_array($cookieProgress) ) ) {

      //  Loop all items in the cookie array and save them
      //  At any given time there should only be one item in the array, so there should't be any performance overhead here
      //


      //  ????
      //  reset($someArray);
      //  echo key($someArray);
      //
      //



      foreach ($cookieProgress as $chapter_key => $progress_array) {

        //  jsut in case, get to the beginning of the array
        reset($progress_array);
        $progress_type = key($progress_array);


        $user_progress[$chapter_key][$progress_type][] = $progress_array[$progress_type][0];


      }

      //  destroy variables from the loop
      unset($chapter_key);
      unset($progress_array);
      unset($progress_type);

    }

  }

  //  update meta
  //  think about sanitization
  update_user_meta( $current_user->ID, 'las_progress', $user_progress );

  //  set new cookie
  //  chapter: time of access
  //  this way we can assiociate access with results
  $new_cookie = json_encode( [ $chapter => [ $progress_type => [ [ 'access' => $current_time ] ] ] ] );



  setcookie("lasChallangeProgress", $new_cookie, $current_time + 10000, "/las/");


}
add_action('template_redirect', 'las_update_user_meta');



//
//  Reset user progress
//  @return true or false
//
function las_reset_user_meta() {

  $current_user = wp_get_current_user();

  $is_deleted = delete_user_meta( $current_user->ID, 'las_progress' );

  return $is_deleted;

}



//
//  Get user progress
//  @return array or false
//
function las_get_user_progress() {

  $current_user = wp_get_current_user();

  $user_meta = get_user_meta( $current_user->ID, 'las_progress' );

  if ( $user_meta && is_array($user_meta[0]) ) {
    return $user_meta[0];

  }
  else {
    return false;
  }

}