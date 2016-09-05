<?php
//
// Page template
// used as a general wrapper for course pages
//



global $post;
$id = $post->ID;



//
//  Display normal page
//
function las_show_normal_page() {
  global $post;

  echo '<div class="section-content">';
  echo 'normal page';
  echo '<h1>';
  the_title();
  echo '</h1>';

  the_content();

  echo '<a href="';
  the_permalink();
  echo '">Pytania i odpowiedzi</a>';
  echo '</div>';
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
//  Ścieżki
//
//  /
//    - komentarze
//  /przewodnik/
//    - -przewodnik-audio
//    - -przewodnik-chat
//    - -przewodnik-video
//  /wyzwanie/
//    - wyzwanie-audio
//    - wyzwanie-chat
//    - wyzwanie-liczby
//    - wyzwanie-quiz
//    - wyzwanie-setninger
//



//
//  Function routing different course parts
//
function las_course_router() {

  if ( ( get_query_var( 'przewodnik' ) || get_query_var( 'wyzwanie' ) ) && !has_tag() ) {
    //  Has no tags, normal page then
    //  cokolwiek by to nie było....

    las_show_normal_page();

  }
  elseif ( !get_query_var( 'przewodnik' ) && !get_query_var( 'wyzwanie' ) ) {
    //  It is a QA part
    //  Show comment section

    las_show_comment_section();

  }
  else {
    //  It must be one of the types

    $type = false;

    if ( get_query_var( 'przewodnik' ) ) {
      $type = 'przewodnik';
    }
    elseif ( get_query_var( 'wyzwanie' ) ) {
      $type = 'wyzwanie';
    }

    if ( !$type ) {
      //  If there is no type, don't bother
      return;
    }

    //  Get data file
    $file = stream_resolve_include_path( __DIR__ . '/data/' . $post->post_name . '-' . $type . '.php' );

    if ( $file ) {
      include( $file );
    }

    //
    //  Route page types
    //
    if ( has_tag( $type . '-audio' ) ) {
      //  Audio

      include( 'includes/audio.php' );

    }
    elseif ( has_tag( $type . '-chat' ) ) {
      //  Chat

      include( 'includes/chat.php' );

    }
    elseif ( has_tag( $type . '-liczby' ) ) {
      //  Liczby

      include( 'includes/liczby.php' );

    }
    elseif ( has_tag( $type . '-quiz' ) ) {
      //  Quiz

      include( 'includes/quiz.php' );

    }
    elseif ( has_tag( $type . '-setninger') ) {
      //  Setninger

      include( 'includes/setninger.php' );

    }
    else {
      //  All other types
      //  including Video

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