<?php
//
//  Includes - Display Char
//

//  we have access to:
//    $user_progress
//    $exp
//    $level_array
//    user_char
?>

<section class="wrapper">

  <div class="section-trans group" style="background-image: url('/las/c/i/las_test_8.jpg');">

    <div class="section-content section-6-4">

      <img src="<?php echo las_get_user_profile_img(); ?>" style="width:8rem !important;height:8rem !important;border-radius:50%;overflow:hidden;display:block;box-shadow:0 0px 20px 10px rgba(0,0,0,0.5);" class="center" />

      <p class="size-2 centered">Harald Hårfagre</p>

    </div>


  </div>


  <div class="section-content">

    <div class="row">
      <div class="col-10 center">
        <?php

          echo 'Ile przykładów: ' . $user_progress['totals']['ex'];
          echo '<br />';
          echo 'Ile błędów: ' . $user_progress['totals']['wrong'];
          echo '<br />';
          echo 'Ile powtórek nagrań: ' . $user_progress['totals']['repeat'];
          echo '<br />';
          echo 'Ile wyświetleń tłumaczeń: ' . $user_progress['totals']['trans'];
          echo '<br />';
          echo 'Ile wysłuchań more: ' . $user_progress['totals']['more'];
          echo '<br />';
          echo 'Ile dni: ' . count($user_progress['totals']['dates']);
          echo '<br />';
          echo 'Ile czasu w sumie na ćwiczeniach: ' . $user_progress['totals']['t'] . 's';
          echo '<br />';
          echo 'Ile wejść na przewodniki: ' . $user_progress['totals']['przewodnik'];
          echo '<br />';
          echo 'Ile wejść na wyzwania: ' . $user_progress['totals']['wyzwanie'];
          echo '<br />';
          echo 'Ile wejść na inne strony: ' . $user_progress['totals']['page'];
          echo '<br />';
          echo 'Ile wyzwań: ' . ( count($user_progress) - 2 );

        ?>


        <h3>Obliczenie levelu z funkcji</h3>

        <p>
          <?php
            echo 'Level: ' . $level_array[0];
            echo '<br />';
            echo 'Exp: ' . $exp;
            echo '<br />';
            echo 'Next level: ' . $level_array[1];
          ?>
        </p>

      </div>
    </div>

  </div>


</section>