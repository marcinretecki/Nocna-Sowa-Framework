<?php
/*
Template Name: Profile
*/



//  tu będzie potrzebny pełny profil łącznie z opcjami:
//  - reset progress
//  - stop payments
//  - etc



//
//  for now only reset data
//
//print_r( las_reset_user_meta() );


$user_progress = las_get_user_progress();





//
//  Begin HTML
//

include( 'includes/head.php' );

?>

<section class="wrapper">

  <div class="section-trans group" style="background-image: url('/las/c/i/las_test_8.jpg');">

    <div class="section-content section-6-4">

      <img src="http://ecowallpapers.net/wp-content/uploads/1041_hearthstone:_rexxar.jpg" style="width:8rem !important;height:8rem !important;border-radius:50%;overflow:hidden;display:block;box-shadow:0 0px 20px 10px rgba(0,0,0,0.5);" class="center" />

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


        <h3>Przykładowe obliczania exp.</h3>

        <p>
          Przykład: *10<br />
          Błąd: *-5 (zliczane w ramach ćwiczenia, żeby nie można było być na minusie)<br />
          Powtórka nagrania: *1<br />
          Trans: *1<br />
          More: *2<br />
          Pierwsze wejscie na przewodnik: *100<br />
          Każdy dzień nauki: *50<br />
        </p>

        <p>
          <?php
            $sum1 = $user_progress['totals']['ex'] * 10;
            $sum1 -= $user_progress['totals']['wrong'] * 5;
            $sum1 += $user_progress['totals']['repeat'];
            $sum1 += $user_progress['totals']['trans'];
            $sum1 += $user_progress['totals']['more'] * 2;
            $sum1 += count($user_progress['totals']['dates']) * 50;
            $sum1 += ( count($user_progress) - 2 ) * 100;

            echo $sum1;
          ?>
        </p>

        <h3>Obliczenie levelu z funkcji</h3>

        <p>
          <?php
            $exp = las_get_user_exp( $user_progress );

            $level_array = las_get_user_level_array( $exp );

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


<script>
//  init Szlak
var las = new LasHelper();
las.getBasicElements();
las.hideLoader();
</script>


<?php

include( 'includes/footer.php' );