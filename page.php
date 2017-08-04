<?php
//
//  Page template
//  used as a general wrapper for course pages
//


//  GLOBALS
$globals = stream_resolve_include_path( __DIR__ . '/includes/globals.php' );

if ( $globals ) {
  include( $globals );
}


//
//  If user has not created char, redirect her
//
las_redirect_to_create_user_char( $user_char );


$heading = las_get_heading();


//
//  Show normal page
//
function las_show_normal_page() {
  global $post;
  global $heading;

  the_content();

}



//
//  Show ratownik - comment section
//
function las_show_ratownik() {
  global $post;
  global $heading;

  //  Get ratownik
  $ratownik = stream_resolve_include_path( __DIR__ . '/includes/ratownik.php' );

  if ( $ratownik ) {
    include( $ratownik );
  }
}



//
//  Function routing different course parts
//
function las_course_router() {
  global $post;
  global $heading;

  $parent_id = $post->post_parent;
  $parent_name = get_post( $parent_id )->post_name;

  $b_wyzwanie_class = 'b-wyzwanie-' . $parent_name;

  //  Has no categories, normal page then
  //  cokolwiek by to nie było....
  if ( !has_category() ) {

    //  show normal page
    las_show_normal_page();

  }
  //  It is a QA part
  elseif ( !get_query_var( 'przewodnik' ) && !get_query_var( 'wyzwanie' ) && !get_query_var( 'testmode' ) ) {

    //  Show ratownik - comment section
    las_show_ratownik();

  }
  //  It must be one of the types
  else {

    $type = false;

    //  Set the type
    if ( get_query_var( 'przewodnik' ) ) {
      $type = 'przewodnik';
    }
    elseif ( get_query_var( 'wyzwanie' ) || get_query_var( 'testmode' ) ) {
      $type = 'wyzwanie';
    }

    if ( !$type ) {
      //  If there is no type, don't bother
      return;
    }

    //
    //  Get data file
    //
    if ( has_category( 'wyzwanie-liczby' ) && ( $type === 'wyzwanie' ) ) {
      $data_file = stream_resolve_include_path( __DIR__ . '/data/' . $type . '/' . $parent_name . '/liczby.php' );
    }
    else {
      $data_file = stream_resolve_include_path( __DIR__ . '/data/' . $type . '/' . $parent_name . '/' . $post->post_name . '.php' );
    }

    //
    //  Route page types
    //
    if ( $type === 'wyzwanie' ) {

      if ( $data_file ) {
        include( $data_file );
      }
      else {
        echo '<p>Nie znaleźlismy pliku z wyzwaniem.';

        return;
      }


      if ( has_category( 'wyzwanie-audio' ) || has_category( 'wyzwanie-liczby' ) ) {
        //  Audio Test

        include( stream_resolve_include_path( __DIR__ . '/includes/audio-test.php' ) );

      }
      elseif ( has_category( 'wyzwanie-chat' ) ) {
        //  Chat

        include( stream_resolve_include_path( __DIR__ . '/includes/chat.php' ) );

      }
      elseif ( has_category( 'wyzwanie-quiz' ) ) {
        //  Quiz

        include( stream_resolve_include_path( __DIR__ . '/includes/quiz.php' ) );

      }
      elseif ( has_category( 'wyzwanie-setninger') ) {
        //  Setninger

        include( stream_resolve_include_path( __DIR__ . '/includes/setninger.php' ) );

      }

      //  if it is wyzwanie and testmode
      if ( get_query_var( 'testmode' ) ) {

        include( stream_resolve_include_path( __DIR__ . '/includes/testmode.php' ) );
      }

    }
    //  if it is not wyzwanie
    //  it should be przewodnik
    else if ( $type === 'przewodnik' ) {

      //  @data_file is included in przewodnik.php

      //  include przewodnik page
      $przewodnik = stream_resolve_include_path( __DIR__ . '/includes/przewodnik.php' );

      if ( $przewodnik ) {
        include( $przewodnik );
      }

    }

  }

}



//
//  Begin HTML
//

include( 'includes/head.php' );

//
//  Loop
//
if ( have_posts() ) : while ( have_posts() ) : the_post();

  las_course_router();

endwhile; endif;


include( 'includes/footer.php' );