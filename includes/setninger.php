<?php
//
// Includes - Setninger
//

//  GLOBALS
$globals = stream_resolve_include_path( __DIR__ . '/includes/globals.php' );

if ( $globals ) {
  include( $globals );
}


?>


<section class="section-trans wrapper <?php echo $b_wyzwanie_class; ?>">

  <div id="setninger-words-b" class="setninger-words-b"></div>

  <div id="setninger" class="setninger">

    <div id="setninger-words" class="setninger-words"></div>

    <div id="setninger-msg" class="setninger-msg"></div>

    <div id="setninger-trans" class="setninger-trans"></div>

    <div id="setninger-controls" class="setninger-controls">
      <div id="setninger-controls__next" class="btn btn-white setninger-controls__next">Next</div>
      <div id="setninger-controls__trans" class="btn btn-white setninger-controls__trans">Trans</div>
    </div>

  </div>

</section>



<?php

//  get the audio file
include( stream_resolve_include_path( __DIR__ . '/get-audio-file.php' ) );

?>

<script>
var las = new LasSetninger();

<?php

$wyzwanie_helpers = stream_resolve_include_path( __DIR__ . '/wyzwanie-js-helpers.php' );

if ( $wyzwanie_helpers ) {
   include( $wyzwanie_helpers );
}

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