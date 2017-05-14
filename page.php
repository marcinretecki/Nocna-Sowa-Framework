<?php
//
//  Page template
//  used as a general wrapper for course pages
//


//  GLOBALS
global $post;
$id = $post->ID;
include( stream_resolve_include_path( __DIR__ . '/includes/globals.php' ) );



//
//  Display normal page
//
function las_show_normal_page() {
  global $post;

  //  Get przewodnik
  include( stream_resolve_include_path( __DIR__ . '/includes/przewodnik.php' ) );
}



//
//  Show comment section
//
function las_show_comment_section() {
  global $post;

  echo '<div class="section-content">';
  echo '<h1>';
    the_title();
  echo '</h1>';

  echo '<h2>Pytania i odpowiedzi</h2>';

  comments_template('', true);

  echo '</div>';
}



//
//  Function routing different course parts
//
function las_course_router() {
  global $post;

  //  Has no categories, normal page then
  //  cokolwiek by to nie było....
  if ( ( get_query_var( 'przewodnik' ) || get_query_var( 'wyzwanie' ) ) && !has_category() ) {

    //  show normal page
    las_show_normal_page();

  }
  //  It is a QA part
  elseif ( !get_query_var( 'przewodnik' ) && !get_query_var( 'wyzwanie' ) && !get_query_var( 'testmode' ) ) {

    //  Show comment section
    las_show_comment_section();

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

    //  Get data file
    if ( has_category( 'wyzwanie-liczby' ) ) {
      $file = stream_resolve_include_path( __DIR__ . '/data/' . $type . '/liczby.php' );
    }
    else {
      $file = stream_resolve_include_path( __DIR__ . '/data/' . $type . '/' . $post->post_name . '.php' );
    }


    if ( $file ) {
      include( $file );
    }

    //
    //  Route page types
    //
    if ( $type === 'wyzwanie' ) {

      if ( has_category( 'wyzwanie-audio' ) ) {
        //  Audio Test

        include( 'includes/audio-test.php' );

      }
      elseif ( has_category( 'wyzwanie-chat' ) ) {
        //  Chat

        include( 'includes/chat.php' );

      }
      elseif ( has_category( 'wyzwanie-liczby' ) ) {
        //  Liczby

        include( 'includes/liczby.php' );

      }
      elseif ( has_category( 'wyzwanie-quiz' ) ) {
        //  Quiz

        include( 'includes/quiz.php' );

      }
      elseif ( has_category( 'wyzwanie-setninger') ) {
        //  Setninger

        include( 'includes/setninger.php' );

      }

      //  if it is wyzwanie and testmode
      if ( get_query_var( 'testmode' ) ) {

        include( stream_resolve_include_path( __DIR__ . '/includes/testmode.php' ) );
      }
    }
    //  if it is not wyzwanie
    else {

      las_show_normal_page();

    }

  }

}



//
// Begin HTML
//

include( 'includes/head.php' );

//
// Loop
//
if ( have_posts() ) : while ( have_posts() ) : the_post();

  las_course_router();

endwhile; endif;


include( 'includes/footer.php' );