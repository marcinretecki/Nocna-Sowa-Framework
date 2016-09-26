<?php
//
// Includes - Audio Test
//



echo '<div style="position:absolute;right:0;z-index:100">';
echo '<h1>Audio Test!</h1>';
echo '</div>';


//
//  Get the audio test data
//  @file is taken from router in page.php
//
function las_get_audio_test_data( $file ) {

  if ( $file ) {
    echo '<div id="audio-test" class="wrapper"></div>';
    echo '<script>';
    echo "
    var lasAudioTest = new LasAudioTest();
    window.addEventListener('load', function() {

      lasAudioTest.init();

      //lasAudioTest.test();

    }, false);"
    ;
    echo '</script>';
  }
  else {
    echo '<p>Nie znaleźliśmy pliku audio.</p>';
  }

}

las_get_audio_test_data( $file );