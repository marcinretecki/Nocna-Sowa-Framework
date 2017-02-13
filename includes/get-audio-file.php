<?php

$audio_file_m4a = stream_resolve_include_path( '/las/c/s/wyzwanie/' . $post->post_name . '.m4a' );
$audio_file_opus = stream_resolve_include_path( '/las/c/s/wyzwanie/' . $post->post_name . '.opus' );

?>


<audio id="audio-file" preload="auto">
  <?php

    if ( $audio_file_m4a ) {
      echo '<source src="';
      ns_auto_ver( $audio_file_m4a );
      echo '" type="audio/mpeg">';
    }

    if ( $audio_file_opus ) {
      echo '<source src="';
      ns_auto_ver( $audio_file_opus );
      echo '" type="audio/ogg">';
    }

  ?>

  Twoja przeglądarka jest za stara na to ćwiczenie.
</audio>