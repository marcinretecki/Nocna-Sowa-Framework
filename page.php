<?php
//
// Page template
// used as a general wrapper for course pages
//



global $post;
$id = $post->ID;



//
//  Ścieżki
//
//  /
//    - komentarze
//  /przewodnik/
//    - nagranie-text
//    - chat
//  /wyzwanie/
//    - chat
//    - liczby
//    - inne rodzaje ćwiczeń



//
//  Function routing different course parts
//
function las_course_router() {

  if ( get_query_var( 'przewodnik' ) ) {
    //  Route przewodnik pages

    if ( has_tag('przewodnik-chat') ) {
      //  Chat
      include( 'includes/chat.php' );

    }
    else {
      //  Normal przewodnik
      echo 'przewodnik normal';
      las_normal_page();
    }

  }
  elseif ( get_query_var( 'wyzwanie' ) ) {
    //  Route wyzwanie pages

    if ( has_tag('wyzwanie-chat') ) {
      //  Chat
      include( 'includes/chat.php' );

    }
    else {
      //  Normal wyzwanie page
      echo 'wyzwanie normal';
      las_normal_page();
    }

  }
  else {
    //  Show comment section

    las_show_comment_section();

  }

}



//
//  Display normal page
//
function las_normal_page() {
  echo '<div class="section-content">';
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
  echo '<div class="section-content">';
  echo '<h1>';
    the_title();
  echo '</h1>';

  echo '<h2>Pytania i odpowiedzi</h2>';

  comments_template('', true);

  echo '</div>';
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