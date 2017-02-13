<?php
//
// Includes - Liczby
//
?>


<section class="section-trans wrapper" style="background-image: url('/las/c/i/las_test_6.jpg');">


  <div class="section-content section-4-2">
    <div id="liczby" class="col-10 center">


      <div id="audio-test-answers" class="audio-test-answers section-green" style="border-radius:3px;position:relative;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.24);">

        <div id="audio-msg-wrapper" class="centered pad-2 section-dark" style="border-radius:3px 3px 0 0;cursor:pointer;">
          <p id="audio-msg" class="space-0 size-2"></p>
          <div id="number"></div>
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
  //  there is no file
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