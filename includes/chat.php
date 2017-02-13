<?php
//
// Includes - Chat
//

?>

<section class="section-trans wrapper" style="background-image: url('/las/c/i/las_test_6.jpg');">
  <div id="chat-bot" class="wrapper"></div>
</section>

<?php

//  get the audio file
include( stream_resolve_include_path( __DIR__ . '/get-audio-file.php' ) );


//  @file is taken from router in page.php
if ( $file ) {
?>

  <script>
  var las = new LasChat();
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
<?php
}
else {
  echo '<p>Nie znaleźliśmy pliku z ćwiczeniem.</p>';
}
