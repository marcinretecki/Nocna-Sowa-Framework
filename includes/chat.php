<?php
//
// Includes - Chat
//



echo '<div style="position:absolute;right:0;z-index:100">';
echo '<h1>Chat!</h1>';
echo '</div>';

//
// Get the chat data
//
function las_get_chat_data() {
  global $post;

  $file_przewodnik = $post->post_name . '-przewodnik.php';
  $file_wyzwanie = $post->post_name . '-wyzwanie.php';;

  if ( get_query_var( 'przewodnik' ) ) {
    $file = stream_resolve_include_path( dirname(__DIR__) . '/chat-data/' . $file_przewodnik );
  }
  else {
    $file = stream_resolve_include_path( dirname(__DIR__) . '/chat-data/' . $file_wyzwanie );
  }

  if ( $file ) {
    include( $file );
    echo '<div id="chat-bot" class="wrapper"></div>';
    echo '<script src="http://livecopy.nocnasowa.pl/c/j-las-chat-min.js"></script>';
  }
  else {
    echo '<p>Nie znaleźliśmy pliku z chatem.</p>';
  }

}

las_get_chat_data();