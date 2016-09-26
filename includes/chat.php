<?php
//
// Includes - Chat
//

echo '<div style="position:absolute;right:0;z-index:100">';
echo '<h1>Chat!</h1>';
echo '</div>';

//
//  Get the chat data
//  @file is taken from router in page.php
//
function las_get_chat_data( $file ) {

  if ( $file ) {
    echo '<div id="chat-bot" class="wrapper"></div>';
    echo '<script>';
    echo "
    var lasChat = new LasChat();
    window.addEventListener('load', function() {

      lasChat.init();

      //lasChat.test();

    }, false);"
    ;
    echo '</script>';
  }
  else {
    echo '<p>Nie znaleźliśmy pliku z chatem.</p>';
  }

}

las_get_chat_data( $file );