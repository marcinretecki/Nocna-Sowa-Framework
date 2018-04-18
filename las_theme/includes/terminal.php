<?php
//
//  Includes - Terminal
//  Extends Chat
//

$globals = stream_resolve_include_path( __DIR__ . '/globals.php' );

if ( $globals ) {
  include( $globals );
}
?>

<section class="section-trans wrapper <?php echo $b_wyzwanie_class; ?>">
  <div id="chat-bot" class="wrapper">
    <div id="chat-wrapper" class="chat-wrapper">
      <div id="chat-window" class="section-content chat-window">
        <ul id="chat-flow" class="main-column main-column--back chat-flow nodots group">
        </ul>
      </div>
    </div>
  </div>
</section>

<?php

//  get the audio file
include( stream_resolve_include_path( __DIR__ . '/get-audio-file.php' ) );


?>

<script>
var las = new LasTerminal();

<?php

$wyzwanie_helpers = stream_resolve_include_path( __DIR__ . '/wyzwanie-js-helpers.php' );

if ( $wyzwanie_helpers ) {
   include( $wyzwanie_helpers );
}

?>

window.addEventListener('load', function() {

  las.init();

}, false);

</script>
