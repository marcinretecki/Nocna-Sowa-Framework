<?php
//
//  Includes - Results
//


  //
  //  TODO
  //  jeśli było dużo błędów, albo ćwiczenie nie było zrobione całe, pytamy, czy chce spróbować jeszcze raz, albo wrócić do przewodnika
  //  jeśli nie było błędów, to sugestia, żeby wrócić na szlak
  //  animacja, która odkryje nastepny chapter
  //

  //
  //  zeby zrobić animację levelu
  //  mamy dostę do exp zarobionego na ćwiczeniu, więc wystarczy obliczyć
  //

  //  jeśli jest wyższy level
  //  zamiast animować do drugiego procenta
  //  animacja do 100%
  //  błysk i ikonka +1 (jeśli tylko o jeden level...)
  //  ustawienie nowego procentu


  $wyzwanie_link = get_permalink( $last_wyzwanie_result['id'] ) . 'wyzwanie/';
  $wyzwanie_title = las_get_clean_title( get_the_title( $last_wyzwanie_result['id'] ) );

  //  user exp before the chapter
  $user_exp_before = $user_exp - $last_wyzwanie_result['exp'];


  //  $user_level;
  $level_before_array = las_get_user_level_array( $user_exp_before );

  $level_percent_now = las_get_level_percent( $user_exp, $level_array );
  $level_percent_before = las_get_level_percent( $user_exp_before, $level_before_array );

  //  jeśli nowy jest mniejszy od starego, to znaczy, zeby był level up

?>

<div id="szlak-result" class="szlak-post-popup section-trans group profile-back wrapper preload--hidden" style="display:block;background-image: url('/las/c/i/las_test.jpg');">

  <div id="szlak-result-content" class="section-content section-4-2">

    <div class="main-column center section-dark rounded section-2-2">

      <div class="group">

          <img class="szlak-result-header__img rightened" style="display: inline-block; width: 4rem; margin-right: 1rem; border: 3px solid #fff; border-radius: 50%; overflow: hidden;" src="<?php echo $user_img_url; ?>" />

        <div>
          <h2 class="h1 space-half size-4"><?php echo $user_nick; ?></h2>

          <p><i><?php echo las_get_user_char_type( $user_char ); ?></i></p>
        </div>

      </div>


      <div id="results-level" class="profile-level section-green space">
        <div id="results-level__line" class="profile-level__line"
              style="width: <?php echo $level_percent_before; ?>"
              data-percent-before="<?php echo $level_percent_before; ?>"
              data-percent-now="<?php echo $level_percent_now; ?>"
        ></div>
        <span id="results-level__no" class="relative profile-level__no"
              data-level-before="<?php echo $level_before_array[0]; ?>"
              data-level-now="<?php echo $user_level; ?>"
        >Rang <?php echo $level_before_array[0]; ?></span>
        <div id="results-level__highlight" class="results-level__highlight"></div>
      </div>

      <span id="results-added-exp" data-added-exp="<?php echo $last_wyzwanie_result['exp']; ?>" class="btn section-green" style="display:inline-block;">+0</span>


      <h2 class="size-3"><?php echo $wyzwanie_title; ?></h2>

      <ul>
        <li>Erfaring for utfordringen: <?php echo $last_wyzwanie_result['exp']; ?></li>

        <li>Erfaring til sammen: <?php echo $user_exp; ?></li>

        <li>Neste rang: <?php echo $exp_for_next; ?></li>

        <?php
          if ( $last_wyzwanie_result['t'] > 5 ) {
        ?>
          <li>Czas: <?php echo las_format_t( $last_wyzwanie_result['t'] ); ?></li>
          <li>Przykłady: <?php echo $last_wyzwanie_result['ex']; ?></li>
        <?php
          }

          if ( $last_wyzwanie_result['wrong'] > 0 ) {
        ?>
          <li>Błędy: <?php echo $last_wyzwanie_result['wrong']; ?></li>
        <?php
          }
        ?>
      </ul>

      <?php
        //  if there is no time
        //  user has not finished the chapter
        if ( ( !$last_wyzwanie_result['t'] && $last_wyzwanie_result['first_time'] ) ) {
      ?>
          <p>Nie zrobiłeś wszystkich przykładów. Może spróbujesz jeszcze raz? Jeśli były za trudne, wróć do przewodnika albo do poprzednich wyzwań. Jeśli nie zrobiłeś wyzwania, bo wydawało Ci się nudne, daj nam o tym znać.</p>
      <?php
        }
        //  no exp
        //  maybe make it low exp instead?
        elseif ( !$last_wyzwanie_result['exp'] ) {
      ?>
          <p>Czy ćwiczenie było za trudne? Miałes problem z zagadnieniem? Wróć do przewodnika.</p>
      <?php
        }

        //  Na swojej ścieżce napotkałeś 27 nowych słów, 15 gatunków roślin i 3 zwierzęta.
      ?>

      <div class="group">

        <a style=" display: inline-block; padding: 2rem; margin: 0px; border: 0px none rgb(96, 179, 179); border-width: 1px 0px 0px;" href="<?php echo $wyzwanie_link; ?>" class="btn btn-green">Powtórz Wyzwanie</a></li>

        <button style="display: inline-block; padding: 2rem; margin: 0px; border: 0px none rgb(96, 179, 179); border-width: 1px 0px 0px;" id="close-result" role="button" class="btn btn-gree">Wróć na Szlak</button>

      </div>


      <?php

        //  link do dyskusji???

      ?>


    </div>

  </div>

</div>