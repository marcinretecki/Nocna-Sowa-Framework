<?php
//
//  Includes - Ratownik, comment section
//

//
//  Ratownik uses the same js as przewodnik
//

?>

<section id="przewodnik-wrapper" class="section-trans wrapper group preload--hidden b-przewodnik">

  <div class="przewodnik-ratownik-header">
    <h2 class="przewodnik-ratownik-header__h">Ratownik</h2>
    <p>Ratownik to miejsca na Twoje pytania do wyzwania.</p>
  </div>

  <div id="przewodnik" class="przewodnik">

    <div class="przewodnik__section">

      <div class="section-content">

        <div class="main-column main-column--back">

          <h1 class="przewodnik__section-h h2"><?php echo $heading; ?></h1>

          <?php

            //  Comments
            //  must be in seperate file for wp to work
            comments_template('', true);

          ?>

        </div>

      </div>

    </div>

    <p>tu jakieś menu?</p>
  </div>
</section>


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