<?php
//
// Includes - Chat
//

$globals = stream_resolve_include_path( __DIR__ . '/globals.php' );

if ( $globals ) {
  include( $globals );
}
?>

<section class="section-trans wrapper <?php echo $b_wyzwanie_class; ?>">
  <div id="chat-bot" class="wrapper"></div>
</section>

<?php

//  get the audio file
include( stream_resolve_include_path( __DIR__ . '/get-audio-file.php' ) );


?>

<script>
var las = new LasChat();

<?php

$wyzwanie_helpers = stream_resolve_include_path( __DIR__ . '/wyzwanie-js-helpers.php' );

if ( $wyzwanie_helpers ) {
   include( $wyzwanie_helpers );
}

?>

window.addEventListener('load', function() {

  las.init();

  <?php
  //  there is no file
  //  @audio_file_xxx is defined in get-audio-file
  if ( !$audio_file_m4a && !$audio_file_opus ) {
    echo 'las.audioFile = false;';
  }
  ?>


}, false);

</script>
