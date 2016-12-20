<?php
//
// Includes - Audio Test
//
?>


<div style="position:absolute;right:0;z-index:100;opacity:0.5">
  <h1>Audio Test!</h1>
</div>


<div class="section-content section-6-2">
  <div id="audio-test" class="col-10 center">

    <audio id="audio-file" src="/s/<?php echo $post->post_name . '-' . $type; ?>.m4a?1" preload="auto"></audio>

    <div id="audio-score" style="display:none;position:fixed;left:0;right:0;top:0;bottom:0;z-index:0;background:url('http://www.wnd.com/files/2014/08/OBAMA-SMILE.jpg') no-repeat center center;opacity:0;"></div>

    <p id="audio-msg" class="centered space-x2"></p>

    <div id="audio-test-answers" class="audio-test-answers">
      <button id="answer-one" class="btn btn-blue btn-audio-test-answer" role="button" style="width:100%;display:block;padding:2rem;margin:0;opacity:0;border-radius:0;border-bottom:1px solid #fff;">&nbsp;</button>

      <button id="answer-two" class="btn btn-blue btn-audio-test-answer" role="button" style="width:100%;display:block;padding:2rem;margin:0;opacity:0;border-radius:0;border-bottom:1px solid #fff;">&nbsp;</button>

      <button id="answer-three" class="btn btn-blue btn-audio-test-answer" role="button" style="width:100%;display:block;padding:2rem;margin:0;opacity:0;border-radius:0;border-bottom:1px solid #fff;">&nbsp;</button>

      <button id="answer-four" class="btn btn-blue btn-audio-test-answer" role="button" style="width:100%;display:block;padding:2rem;margin:0;opacity:0;border-radius:0;border-bottom:1px solid #fff;">&nbsp;</button>
    </div>

    <div id="audio-controls" style="display:none;opacity:0;">
      <div class="centered">
        <button id="audio-rewind" class="btn btn-blue" style="display:none;opacity:0;width:6rem;height:6rem;margin:1rem;padding:0;border-radius:50%">Powtórz</button>
        <button id="audio-more" class="btn btn-blue" style="display:none;opacity:0;width:6rem;height:6rem;margin:1rem;padding:0;border-radius:50%">???</button>
      </div>

      <div class="centered">
        <button id="audio-next" class="btn btn-blue" style="display:none;opacity:0;width:6rem;height:6rem;margin:1rem;padding:0;border-radius:50%">&raquo;</button>
      </div>
    </div>
  </div>
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
    echo '<p style="position:relative;z-index:1000">Nie znaleźliśmy pliku audio.</p>';
  }

}

las_get_audio_test_data( $file );