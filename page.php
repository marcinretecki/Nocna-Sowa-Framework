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

$heading = las_get_heading();


//
//  Display normal page
//
function las_show_normal_page() {
  global $post;
  global $heading;

  $type = 'przewodnik';

  //  Get data
  $przewodnik_data = stream_resolve_include_path( __DIR__ . '/data/przewodnik/' . $post->post_name . '.php' );

  //  Get przewodnik
  $przewodnik = stream_resolve_include_path( __DIR__ . '/includes/przewodnik.php' );

  if ( $przewodnik ) {
    include( $przewodnik );
  }
}



//
//  Show comment section
//
function las_show_comment_section() {
  global $post;
  global $heading;

  echo '<div class="section-content">';
  echo '<h1>';
  echo $heading;
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

    //
    //  Route page types
    //
    if ( $type === 'wyzwanie' ) {

      //  Get data for wyzwanie
      if ( has_category( 'wyzwanie-liczby' ) ) {
        $wyzwanie_data = stream_resolve_include_path( __DIR__ . '/data/wyzwanie/liczby.php' );
      }
      elseif ( has_category( 'misja' ) ) {
        $wyzwanie_data = stream_resolve_include_path( __DIR__ . '/data/misja/' . $post->post_name . '.php' );
      }
      else {
        $wyzwanie_data = stream_resolve_include_path( __DIR__ . '/data/wyzwanie/' . $post->post_name . '.php' );
      }


      if ( $wyzwanie_data ) {
        include( $wyzwanie_data );
      }
      else {
        echo '<p>Nie znaleźlismy pliku z wyzwaniem.';

        return;
      }


      if ( has_category( 'wyzwanie-audio' ) || has_category( 'wyzwanie-liczby' ) ) {
        //  Audio Test

        include( 'includes/audio-test.php' );

      }
      elseif ( has_category( 'wyzwanie-chat' ) ) {
        //  Chat

        include( 'includes/chat.php' );

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