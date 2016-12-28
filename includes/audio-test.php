<?php
//
// Includes - Audio Test
//
?>


<div style="position:absolute;right:0;opacity:0.5">
  <h1>Audio Test!</h1>
</div>


<div class="section-content section-4-2">
  <div id="audio-test" class="col-10 center">

    <div id="audio-pause-timer" style="position:fixed;left:0px;top:40%;z-index:1000;width:100%;opacity:0;display:none;" class="">
      <button id="audio-skip-pause" class="btn btn-white btn-nav" style="display:block;margin:0px auto;width:4rem;height:4rem;padding:0;border-radius:50%;background-image:url('/i/icon_next.png');background-size:26px auto;background-position:center center;background-repeat:no-repeat;box-shadow:0px 1px 3px rgba(0, 0, 0, 0.12), 0px 1px 2px rgba(0, 0, 0, 0.24);">
        <svg width="80" height="80" viewBox="0 0 80 80" style="display:block;margin:0 auto;position:aboslute;left:0;top:0;">
          <defs>
            <mask id="cutout">
              <circle cx="50%" cy="50%" r="40" fill="#fff"/>
              <circle cx="50%" cy="50%" r="35" fill="#000"/>
            </mask>
          </defs>

          <g mask="url(#cutout)">
            <path id="circle" transform="translate(40,40)" style="fill:#60B3B3;" d="M 0 0 v -40 A 40 40 1 1 1 -0.025132739575065628 -39.99999210431674 z"/>
          </g>
        </svg>
      </button>
    </div>

    <audio id="audio-file" src="<?php las_autover('/s/' . $post->post_name . '-wyzwanie.m4a'); ?>" preload="auto">
      Your browser does not support the <code>audio</code> element.
    </audio>

    <div id="audio-score" style="display:none;position:fixed;left:50%;right:0;top:10rem;bottom:0;width:10rem;height:10rem;z-index:0;background:url('https://cdn2.iconfinder.com/data/icons/social-productivity-line-art-2/128/thumbs-up-2-512.png') no-repeat center center;background-size:contain;opacity:0;transform:translate(-50%, 0);"></div>

    <div id="audio-test-answers" class="audio-test-answers section-green" style="border-radius:3px;position:relative;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.24);">

      <p id="audio-msg" class="centered space-0 pad-2 size-2 section-dark" style="border-radius:3px 3px 0 0;padding:2rem 1rem;"></p>

      <div>
        <button id="answer-one" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0;border:0;border-radius:3px 3px 0 0;">&nbsp;</button>

        <button id="answer-two" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0;border:0;border-top:1px solid #60B3B3;">&nbsp;</button>

        <button id="answer-three" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0;border:0;border-top:1px solid #60B3B3;">&nbsp;</button>

        <button id="answer-four" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0 0 3px 3px;border:0;border-top:1px solid #60B3B3;">&nbsp;</button>
      </div>

      <div id="audio-controls" class="section-dark" style="display:none;height:2rem;border-radius:0 0 3px 3px;">
        <button id="audio-more" class="btn btn-white btn-nav" style="display:none;width:4rem;height:4rem;padding:0;box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);position:absolute;bottom:-2rem;left:25%;border-radius:50%;background-image:url(/i/icon_more.png);background-size:26px auto;background-position:center;background-repeat:no-repeat;margin-left:-3rem;margin-bottom:1px;"></button>

        <button id="audio-rewind" class="btn btn-white btn-nav" style="display:none;width:4rem;height:4rem;padding:0;box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);position:absolute;bottom:-2rem;left:50%;border-radius:50%;background-image:url(/i/icon_rewind.png);background-size:26px auto;background-position:center;background-repeat:no-repeat;margin-left:-2rem;margin-bottom:1px;"></button>


        <button id="audio-next" class="btn btn-white btn-nav" style="display:none;width:4rem;height:4rem;padding:0;box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);position:absolute;bottom:-2rem;right:25%;border-radius:50%;background-image:url(/i/icon_next.png);background-size:26px auto;background-position:center;background-repeat:no-repeat;margin-right:-3rem;margin-bottom:1px;"></button>
      </div>

    </div>

    <div id="audio-spinner" class="wave-pulse-sync" style="position:fixed;left:50%;transform:translateX(-50%);bottom:2rem;display:none;opacity:0;">
      <div></div><div></div><div></div>
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