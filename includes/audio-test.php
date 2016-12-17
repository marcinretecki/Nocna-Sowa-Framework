<?php
//
// Includes - Audio Test
//

/*
    struktura danych
    - ładujemy i włączamy pierwszy plik dźwiękowy
    - user słucha, może zapałzować lub cofnąć
    - na koniec nagrania, pojawiają się możlie odpowiedzi
    - każda z odpowiedzi prowadzi do innego nagrania
    - wszystkie możliwe nagrania są ładowane w tle
    - na koniec dizękujemy i user może wrócić do innych ćwiczeń

  */
?>


<div style="position:absolute;right:0;z-index:100">
  <h1>Audio Test!</h1>
</div>


<div id="audio-test" class="section-content section-6-2" style="overflow:hidden;">
  <div style="position:absolute;left:0;top:2rem;right:0;z-index:100;" class="centered white">
    <button id="audio-rewind" class="btn btn btn-link btn-s-2">&laquo;-15s</button>
    <button id="audio-play" class="btn btn btn-link btn-s-2">Play / Pause</button>
  </div>

  <p id="audio-msg" class="centered"></p>

  <audio id="audio-file" src="/s/<?php echo $post->post_name . '-' . $type; ?>.m4a?1" preload="auto"></audio>

  <div id="audio-score" style="position:fixed;left:0;right:0;top:0;bottom:0;z-index:0;background:#fff;opacity:0;"></div>

</div>


<div id="loader" class="las-loader" style="position:fixed;left:0;top:0;right:0;bottom:0;background:#000;z-index:1000"></div>


<?php
//
//  Get the audio test data
//  @file is taken from router in page.php
//
function las_get_audio_test_data( $file ) {

  if ( $file ) {
    echo '<script>';
    echo "
    var lasAudioTest = new LasAudioTest(),
        lasAudioFile = document.getElementById('audio-file');

    lasAudioFile.addEventListener('loadeddata', function() {

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