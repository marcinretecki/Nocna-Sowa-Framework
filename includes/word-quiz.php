<?php
//
//  Includes - Word Quiz
//  Extends Audio Quiz
//


$globals = stream_resolve_include_path( __DIR__ . '/globals.php' );

if ( $globals ) {
  include( $globals );
}
?>


<section class="section-trans wrapper <?php echo $b_wyzwanie_class; ?>">

  <div class="section-content audio-test-section">
    <div id="audio-test" class="main-column center">

      <div id="audio-pause-timer"class="audio-pause-timer">
        <button id="audio-skip-pause" class="audio-pause-timer__btn btn btn-white btn-nav">
          <svg width="80" height="80" viewBox="0 0 80 80" style="display:block;margin:0 auto;position:absolute;left:0;top:0;">
            <defs>
              <mask id="cutout">
                <circle cx="50%" cy="50%" r="40" fill="#fff" />
                <circle cx="50%" cy="50%" r="35" fill="#000" />
              </mask>
            </defs>

            <g mask="url(#cutout)">
              <path id="circle" transform="translate(40,40)" style="fill:#60B3B3;" d="M 0 0 v -40 A 40 40 1 1 1 -0.025132739575065628 -39.99999210431674 z"/>
            </g>
          </svg>
        </button>
      </div>


      <div id="audio-test-answers" class="audio-test-answers section-green">

        <div id="audio-test-msg" class="audio-test-msg">
          <div id="audio-test-msg-main" class="audio-test-msg__main"></div>
          <div id="audio-test-msg-trans" class="audio-test-msg__trans"></div>
        </div>


        <div>
          <button id="answer-0" class="audio-test-answers__answer" role="button">&nbsp;</button>
          <button id="answer-1" class="audio-test-answers__answer" role="button">&nbsp;</button>
          <button id="answer-2" class="audio-test-answers__answer" role="button">&nbsp;</button>
          <button id="answer-3" class="audio-test-answers__answer" role="button">&nbsp;</button>
        </div>


        <div id="audio-controls" class="audio-controls">
          <button id="audio-more"   class="audio-controls__btn audio-controls__btn--more"></button>
          <button id="audio-rewind" class="audio-controls__btn audio-controls__btn--rewind"></button>
          <button id="audio-next"   class="audio-controls__btn audio-controls__btn--next"></button>
        </div>

      </div>


      <div id="audio-spinner" class="wave-pulse-sync audio-spinner">
        <div></div><div></div><div></div>
      </div>

    </div>
  </div>


  <div id="wq-blink" class="wq-blink" style="position:absolute;left:0;top:0;height:100%;width:100%;background-color:#fff;opacity:0;"></div>
</section>


<?php

//  get the audio file
include( stream_resolve_include_path( __DIR__ . '/get-audio-file.php' ) );

?>

<script>
var las = new LasWordQuiz();

<?php
$wyzwanie_helpers = stream_resolve_include_path( __DIR__ . '/wyzwanie-js-helpers.php' );

if ( $wyzwanie_helpers ) {
   include( $wyzwanie_helpers );
}
?>


//  init las on load
window.addEventListener('load', function() {

  las.init();


}, false);

</script>



