<?php
//
//  User Progress Functions
//



//
//  Cookie usage
//
//  ! Cookie progress is in base3
//
//  - cookie is filled in by js
//  - it uses data passed from the server in the helper
//
//  - when user decides to leave wyzwanie (by any anchor on the page)
//  - or when she finishes wyzwanie
//  - we save progress from a private var into the cookie and send it to the server
//  - php checks if the cookie is correct
//  - is the number of correct answers not exceeding 20?
//


//
//  Example cookie
//  array(1) {
//    [1501354191] => array(4) {
//      ["id"] =>         string(3) "213"
//      ["type"] =>       string(8) "wyzwanie"
//      ["chapter"] =>    string(4) "test"
//      ["progress"] =>   array(7) {
//        ["exp"] =>        string(3) "222"
//        ["wrong"] =>      string(1) "2"
//        ["correct"] =>    string(2) "10"
//        ["repeat"] =>     string(1) "2"
//        ["ex"] =>         string(2) "10"
//        ["more"] =>       string(1) "1"
//        ["t"] =>          string(3) "221"
//      }
//    }
//  }


//  cookie should look like this:
//  cookie[serverAccess][id]        (integer)
//  cookie[serverAccess][type]      (string)
//  cookie[serverAccess][chapter]   (string)
//  cookie[serverAccess][progress]  (object)

//  each of those will be saved by js
//  even if empty


//
//  Get user cookie progress (previous page access)
//  @return progress object
//
function las_get_user_progress_from_cookie() {

  return json_decode( stripslashes( $_COOKIE["lasChallangeProgress"] ), true );

}


function las_remove_access_time_from_cookie( $user_progress_from_cookie, $access_time_from_cookie ) {

  unset( $user_progress_from_cookie[ $access_time_from_cookie ] );

  return $user_progress_from_cookie;

}


//
//  Set new cookie for the current page
//
function las_set_new_progress_cookie( $user_progress_from_cookie ) {

  if ( $user_progress_from_cookie ) {

    $new_cookie_data = json_encode( $user_progress_from_cookie );

  }
  else {
    $new_cookie_data = json_encode( [] );
  }

  setcookie( "lasChallangeProgress", $new_cookie_data, $current_time + 10000, "/las/" );

}


//
//  Sanitize progress from cookie for database saving
//  convert base3 into integers
//  @return array( access_time, id, type, chapter, progress )
//  or false
//
function las_sanitize_progress_from_cookie( $user_progress_from_cookie ) {

  //  if cookie is not an array
  if ( !is_array( $user_progress_from_cookie ) ) {
    return false;
  }

  //  sort the array by access times
  ksort( $user_progress_from_cookie );

  //  reset pointer
  reset( $user_progress_from_cookie );

  //  get the first key
  $firstKey = key( $user_progress_from_cookie );

  //  if the key is not an integer, cookie is not correct
  if ( !is_integer( $firstKey ) ) {
    return false;
  }

  //  prepare sanitized array
  $sanitized_progress_from_cookie = [];

  //  prepare data
  $oldestServerAccessData = $user_progress_from_cookie[ $firstKey ];

  //  if it is not an array
  if ( !is_array( $oldestServerAccessData ) ) {
    return false;
  }

  //  sanitize access time
  $sanitized_progress_from_cookie[ 'access_time' ] = intval( $firstKey );

  //  sanitize id
  if ( $oldestServerAccessData[ 'id' ] ) {
    $sanitized_progress_from_cookie[ 'id' ] = intval( $oldestServerAccessData[ 'id' ] );
  }
  else {
    return false;
  }

  //  sanitize type
  if ( $oldestServerAccessData[ 'type' ] ) {
    $sanitized_progress_from_cookie[ 'type' ] = sanitize_file_name( $oldestServerAccessData[ 'type' ] );
  }
  else {
    return false;
  }

  //  sanitize chapter
  if ( $oldestServerAccessData[ 'chapter' ] ) {
    $sanitized_progress_from_cookie[ 'chapter' ] = sanitize_file_name( $oldestServerAccessData[ 'chapter' ] );
  }
  else {
    return false;
  }

  //  sanitize progress
  if ( is_array( $oldestServerAccessData[ 'progress' ] ) ) {

    $sanitized_progress_from_cookie[ 'progress' ] = [];

    foreach ( $oldestServerAccessData[ 'progress' ] as $progress_type => $value ) {

      //  convert all progress type values into integers
      //  values should be in base3
      $sanitized_progress_from_cookie[ 'progress' ][ $progress_type ] =  intval( $value, 3 );

    }

  }
  else {
    return false;
  }

  return $sanitized_progress_from_cookie;

}






//
//  Wszystko poniżej jest do przerobienia
//


//  //
//  //  Get user cookie progress (previous page access)
//  //  sanitize all input
//  //  @return array [previous page progress, access time, chapter name, progress type]
//  //  or false
//  //
//  function las_get_user_cookie_progress() {

//    $user_cookie_progress = json_decode( stripslashes( $_COOKIE["lasChallangeProgress"] ), true );

//    //echo '<pre>';
//    //print_r($user_cookie_progress);
//    //echo '</pre>';

//    //  no cookie
//    //  or cookie is null
//    //  or it is not an array
//    if (    !$user_cookie_progress
//         || ( $user_cookie_progress === NULL )
//         || !is_array( $user_cookie_progress ) ) {
//      return false;
//    }

//    //  just in case, reset array pointer
//    reset( $user_cookie_progress );

//    //  get name of the first key of user_cookie_progress
//    $chapter = sanitize_file_name( key( $user_cookie_progress ) );

//    //  if chapter is not an array
//    if ( !is_array( $user_cookie_progress[ $chapter ] ) ) {
//      return false;
//    }

//    //  get name of the first key of chapter
//    $progress_type = sanitize_file_name( key( $user_cookie_progress[ $chapter ] ) );

//    //  if chapter is not an array
//    if ( !is_array( $user_cookie_progress[ $chapter ][ $progress_type ] ) ) {
//      return false;
//    }

//    //  get name of the first key of progress_type
//    $access = key( $user_cookie_progress[ $chapter ][ $progress_type ] );

//    //  if access is not a number
//    if ( !is_integer( $access ) ) {
//      return false;
//    }

//    $progress = $user_cookie_progress[ $chapter ][ $progress_type ][ $access ];

//    //  if progress is not an array
//    if ( !is_array( $progress ) ) {
//      return false;
//    }

//    //  check values
//    foreach ( $progress as $value ) {

//      //  if any of the values in progress are not integrs
//      if ( !is_integer( $value ) ) {
//        return false;
//      }

//    }

//    $id = $user_cookie_progress[ $chapter ][ 'id' ];

//    //  if id is not integer
//    if ( !is_integer( $id ) ) {
//      return false;
//    }

//    return  array(
//                'progress'        =>  $progress,
//                'access'          =>  $access,
//                'chapter'         =>  $chapter,
//                'progress_type'   =>  $progress_type,
//                'id'              =>  $id
//            );

//  }





