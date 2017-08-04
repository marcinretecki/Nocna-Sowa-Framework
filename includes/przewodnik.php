<?php
//
//  Includes - Przewodnik
//

//  @data_file comes from page.php


function las_przewodnik_get_media( $post_name ) {

  $media_array = [

    'test' =>     '<iframe src="https://player.vimeo.com/video/122803133?title=0&byline=0&portrait=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'

  ];

  return $media_array[ $post_name ];

}


//  show video, audio or other media assiociated with przewodnik
function las_przewodnik_show_media() {
  global $post;

  $media = las_przewodnik_get_media( $post->post_name );

  if ( $media ) {

    echo '<div class="przewodnik__media">';
      echo '<div class="przewodnik__media-content">';

        echo '<div class="przewodnik__video">';
          echo $media;
        echo '</div>';

      echo '</div>';
    echo '</div>';

  }

}


?>


<section id="przewodnik-wrapper" class="section-trans wrapper group preload--hidden b-przewodnik">

  <div id="przewodnik" class="przewodnik">

    <?php

      //  show video, audio or other media assiociated with przewodnik
      las_przewodnik_show_media();

    ?>

    <div class="przewodnik__section">

      <div class="section-content">

        <h1 class="h1 przewodnik__section-h"><?php echo $heading; ?></h1>

        <div class="main-column main-column--back">

          <?php

            //  check if there is custom Przewodnik file

            if ( $data_file ) {

              include( $data_file );

            }
            else {

              echo '<p>Coś poszło nie tak.</p>';
              echo '<p>Nie mamy pliku z przewodnikiem.</p>';

            }

          ?>

        </div>

      </div>

    </div>

    <?php

      //  tu można zrobić funkcję, która sprawdza, czy jest wyzwanie
      //  jeśli nie ma to dajemy link do następnego zagadnienia
      //  jeśli jest, to link do wyzwania

    ?>

    <a href="../wyzwanie/" class="przewodnik__action-btn">Przejdź do wyzwania &raquo;</a>
  </div>
</section>


<?php

  //  get the audio file
  include( stream_resolve_include_path( __DIR__ . '/get-audio-file.php' ) );

?>



<script>
  var las = new LasPrzewodnik();

  <?php
  //  there is no file
  //  @audio_file_xxx is defined in get-audio-file
  if ( !$audio_file_m4a && !$audio_file_opus ) {
    echo 'las.audioFile = false;';
  }
  ?>

  //  init las on load
  window.addEventListener('load', function() {

    las.init();

  }, false);


</script>