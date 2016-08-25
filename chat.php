<?php
/*
  Template Name: Chat
*/

global $post;
$id = $post->ID;


include( 'includes/head.php' );





echo '<h1>' . the_title() . '</h1>';


//
// Function routing different course parts
//

function las_get_chat_data( $post ) {

  $file = stream_resolve_include_path( 'chat-data/' . $post->post_name . '.php' );

  if ( $file ) {
    include( $file );
  }
  else {
    echo 'Nie znaleźliśmy ćwiczenia.';
  }

}

las_get_chat_data( $post );

if ( get_query_var( 'przewodnik' ) ) {
  echo 'przewodnik';
}

if ( get_query_var( 'wyzwanie' ) ) {
  echo 'wyzwanie';
}


include( 'includes/footer.php' );