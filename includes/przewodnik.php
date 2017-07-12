<?php
//
//  Includes - Przewodnik
//

//  @przewodnik comes from page.php
?>


<section id="przewodnik-wrapper" class="section-trans wrapper group preload--hidden" style="background-image: url('/las/c/i/las_test_9.jpg');">

  <h1 class="przewodnik-h1">Przewodnik</h1>

  <div id="przewodnik" class="przewodnik">

    <div class="przewodnik__section">

      <div class="main-column przewodnik__main-column">

        <h2 class="h1 przewodnik__section-h"><?php echo $heading; ?></h2>

        <?php

          //  check if there is custom Przewodnik file

          if ( $przewodnik ) {

            include( $przewodnik );

          }
          else {

            the_content();

          }

        ?>



      </div>





    </div>

    <?php

      //  tu można zrobić funkcję, która sprawdza, czy jest wyzwanie
      //  jeśli nie ma to dajemy link do następnego zagadnienia
      //  jeśli jest, to link do wyzwania

    ?>

    <a href="../wyzwanie/" class="przewodnik__action-btn">Przejdź do Wyzwania &raquo;</a>
  </div>
</div>


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