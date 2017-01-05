<?php
//
// Includes - Chat
//

?>

<section class="section-trans wrapper" style="background-image: url('/i/las_test_6.jpg');">

<?php
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