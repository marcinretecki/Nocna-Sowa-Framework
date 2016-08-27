<?php
//
// Template Name: Chat
//

global $post;
$id = $post->ID;


include( 'includes/head.php' );


echo '<div style="position:absolute;right:0;z-index:100">';
echo '<h1>Chat!</h1>';

if ( get_query_var( 'przewodnik' ) ) {
  echo 'przewodnik';
}
elseif ( get_query_var( 'wyzwanie' ) ) {
  echo 'wyzwanie';
}
else {
  comments_template('', true);
}


echo '</div>';

//
// Get the chat data
//
function las_get_chat_data( $post ) {

  $file_przewodnik =
  $file_trening =

  $file = stream_resolve_include_path( 'chat-data/' . $post->post_name . '.php' );

  if ( $file ) {
    include( $file );
    echo '<div id="chat-bot" class="wrapper"></div>';
    echo '<script src="http://livecopy.nocnasowa.pl/c/j-las-chat-min.js"></script>';
  }
  else {
    echo '<p>Nie znaleźliśmy pliku z chatem.</p>';
  }

}

las_get_chat_data( $post );



include( 'includes/footer.php' );