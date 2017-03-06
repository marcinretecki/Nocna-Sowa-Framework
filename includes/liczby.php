<?php
//
// Includes - Liczby
//
?>


<section class="section-trans wrapper" style="background-image: url('/las/c/i/las_test_9.jpg');">

  <div class="section-content section-4-2">
    <div id="audio-test" class="col-10 center">

      <div id="audio-pause-timer" style="position:fixed;left:0px;top:40%;z-index:1000;width:100%;opacity:0;display:none;" class="">
        <button id="audio-skip-pause" class="btn btn-white btn-nav" style="display:block;margin:0px auto;width:4rem;height:4rem;padding:0;border-radius:50%;background-image:url('/las/c/i/icon_next.png');background-size:26px auto;background-position:center center;background-repeat:no-repeat;box-shadow:0px 1px 3px rgba(0, 0, 0, 0.12), 0px 1px 2px rgba(0, 0, 0, 0.24);">
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


      <div id="audio-score" class="section-green" style="display:none;position:fixed;left:50%;top:50%;width:8rem;height:8rem;z-index:1000;opacity:0;transform:translate(-50%, -40%);box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);border-radius:50%;">
        <div id="audio-score-number" style="position:absolute;left:0;top:-4px;width:100%;height:100%;font-family:bariol_lightlight;font-size:4.2rem;text-align:center;line-height:8rem;">1</div>
      </div>


      <div id="audio-test-answers" class="audio-test-answers section-green" style="border-radius:3px;position:relative;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.24);">

        <div id="audio-msg-wrapper" class="centered pad-2 section-dark" style="border-radius:3px 3px 0 0;cursor:pointer;">
          <p id="audio-msg" class="space-0 size-2"></p>

          <p id="audio-trans" class="space-0" style="display:none;padding-top:0.5rem;"></p>
        </div>


        <div>
          <button id="answer-one" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0;border:0;border-radius:3px 3px 0 0;">&nbsp;</button>

          <button id="answer-two" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0;border:0;border-top:1px solid #60B3B3;">&nbsp;</button>

          <button id="answer-three" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0;border:0;border-top:1px solid #60B3B3;">&nbsp;</button>

          <button id="answer-four" class="btn btn-green btn-audio-test-answer" role="button" style="width:100%;display:none;padding:2rem;margin:0;border-radius:0 0 3px 3px;border:0;border-top:1px solid #60B3B3;">&nbsp;</button>
        </div>


        <div id="audio-controls" class="section-dark" style="display:none;height:2rem;border-radius:0 0 3px 3px;">
          <button id="audio-more" class="btn btn-white btn-nav" style="display:none;width:4rem;height:4rem;padding:0;box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);position:absolute;bottom:-2rem;left:25%;border-radius:50%;background-image:url(/las/c/i/icon_more.png);background-size:26px auto;background-position:center;background-repeat:no-repeat;margin-left:-3rem;margin-bottom:1px;"></button>


          <button id="audio-rewind" class="btn btn-white btn-nav" style="display:none;width:4rem;height:4rem;padding:0;box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);position:absolute;bottom:-2rem;left:50%;border-radius:50%;background-image:url(/las/c/i/icon_rewind.png);background-size:26px auto;background-position:center;background-repeat:no-repeat;margin-left:-2rem;margin-bottom:1px;"></button>


          <button id="audio-next" class="btn btn-white btn-nav" style="display:none;width:4rem;height:4rem;padding:0;box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);position:absolute;bottom:-2rem;right:25%;border-radius:50%;background-image:url(/las/c/i/icon_next.png);background-size:26px auto;background-position:center;background-repeat:no-repeat;margin-right:-3rem;margin-bottom:1px;"></button>
        </div>

      </div>


      <div id="audio-spinner" class="wave-pulse-sync" style="position:fixed;left:50%;transform:translateX(-50%);bottom:2rem;display:none;opacity:0;">
        <div></div><div></div><div></div>
      </div>

    </div>
  </div>
</section>

<?php

//  get the audio file
include( stream_resolve_include_path( __DIR__ . '/get-audio-file.php' ) );


//  @file is defined in page.php
if ( $file ) {
?>
  <script>
  var las = new LasLiczby();
  las.helper.chapter = "<?php echo $post->post_name; ?>";

  <?php
  //  there is no audio file
  //  @audio_file_xxx is defined in get-audio-file
  if ( !$audio_file_m4a && !$audio_file_opus ) {
    echo 'las.audioFile = false;';
  }
  ?>

  window.addEventListener('load', function() {
    las.init();
  }, false);

  </script>
<?php }
else {
  echo '<p>Nie znaleźliśmy pliku z ćwiczeniem.</p>';
}