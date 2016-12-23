<?php
//
// Includes - Audio Test
//
?>


<div style="position:absolute;right:0;opacity:0.5">
  <h1>Audio Test!</h1>
</div>


<div class="section-content section-6-2">
  <div id="audio-test" class="col-10 center">

    <audio id="audio-file" src="/s/<?php echo $post->post_name . '-' . $type; ?>.m4a" preload="auto">
      Your browser does not support the <code>audio</code> element.
    </audio>

    <div id="audio-score" style="display:none;position:fixed;left:50%;right:0;top:10rem;bottom:0;width:10rem;height:10rem;z-index:0;background:url('https://cdn2.iconfinder.com/data/icons/social-productivity-line-art-2/128/thumbs-up-2-512.png') no-repeat center center;background-size:contain;opacity:0;transform:translate(-50%, 0);"></div>

    <div id="audio-test-answers" class="audio-test-answers section-green space-x2" style="border-radius:3px;position:relative;">
      <p id="audio-msg" class="centered space-0 pad-2 size-2" style="border-radius:3px 3px;padding:2rem 1rem;background-color:#0f6666;"></p>

      <button id="answer-one" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0;border:0;border-radius:3px;">&nbsp;</button>

      <button id="answer-two" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0;border:0;border-top:1px solid rgba(255,255,255,0);border-radius:0 0 3px 3px;">&nbsp;</button>

      <button id="answer-three" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0;border:0;border-top:1px solid rgba(255,255,255,0);border-radius:0 0 3px 3px;">&nbsp;</button>

      <button id="answer-four" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0;border:0;border-top:1px solid rgba(255,255,255,0);border-radius:0 0 3px 3px;">&nbsp;</button>
    </div>

    <div id="audio-controls">
      <div class="centered">
        <button id="audio-rewind" class="btn btn-green" style="width:4rem;height:4rem;margin:1rem;padding:0;border-radius:50%">Powtórz</button>
        <button id="audio-more" class="btn btn-green" style="width:4rem;height:4rem;margin:1rem;padding:0;border-radius:50%">???</button>
      </div>

      <div class="centered">
        <button id="audio-next" class="btn btn-green" style="width:4rem;height:4rem;margin:1rem;padding:0;border-radius:50%">&raquo;</button>
      </div>
    </div>

  </div>
</div>


<div id="loader" class="las-loader" style="position:fixed;left:0;top:0;right:0;bottom:0;background:#000;z-index:1000"></div>


<script>
var lasAudioTest = new LasAudioTest(),
lasAudioFile = document.getElementById('audio-file');

lasAudioFile.addEventListener('loadeddata', function() {

  lasAudioTest.init();

  //lasAudioTest.test();

}, false);
</script>




<?php
//
//  Get the audio test data
//  @file is taken from router in page.php
//
function las_get_audio_test_data( $file ) {

}

las_get_audio_test_data( $file );