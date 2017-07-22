<?php
//
//  Includes - Results
//


//  @last_wyzwanie_result

  //
  //  TODO
  //  jeśli było dużo błędów, albo ćwiczenie nie było zrobione całe, pytamy, czy chce spróbować jeszcze raz, albo wrócić do przewodnika
  //  jeśli nie było błędów, to sugestia, żeby wrócić na szlak
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
  $sos_link = get_permalink( $last_wyzwanie_result['id'] ) . '/';
  $wyzwanie_title = las_get_clean_title( get_the_title( $last_wyzwanie_result['id'] ) );

  //  user exp before the chapter
  $user_exp_before = $user_exp - $last_wyzwanie_result['exp'];


  //  $user_level;
  $level_before_array = las_get_user_level_array( $user_exp_before );

  $level_percent_now = las_get_level_percent( $user_exp, $level_array );
  $level_percent_before = las_get_level_percent( $user_exp_before, $level_before_array );

  //  jeśli nowy jest mniejszy od starego, to znaczy, zeby był level up
  //  choć nie koniecznie bo można było mieć 50%, a potem 51% w następnym levelu

?>

<div id="results-wrapper" class="szlak-post-popup section-trans group profile-back wrapper preload--hidden" style="display:block;background-image: url('/las/c/i/las_test.jpg');">

  <div id="results" class="section-content section-8-2">

    <div class="main-column main-column--back">

      <div class="results__section">

        <div class="results-header">
          <img class="result-header__img" src="<?php echo $user_img_url; ?>" />

          <h2 class="results-header__name h1 space-half size-4 centered"><?php echo $user_nick; ?></h2>

          <p class="results-header__user-char centered space-2"><i><?php echo las_get_user_char_type( $user_char ); ?></i></p>
        </div>


        <div id="results-level" class="profile-level section-green space-2">
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


        <div class="group">

          <table style="width: 100%;" class="centered space-x2">
            <tr>
              <td>
                <i class="size-0">Eksempler:</i><br />
                <span class="bariol-thin size-3">
                  <?php echo $last_wyzwanie_result['ex']; ?>
                </span>
              </td>

              <td>
                <i class="size-0">Tid:</i><br />
                <span class="bariol-thin size-3">
                  <?php echo las_format_t_short( $last_wyzwanie_result['t'] ); ?>
                </span>
              </td>

              <td>
                <i class="size-0">Erfering:</i><br />
                <span id="results-added-exp" class="bariol-thin size-3" data-added-exp="<?php echo $last_wyzwanie_result['exp']; ?>">0</span>

              </td>
            </tr>
          </table>

        </div>


        <h2 class="size-2 centered"><?php echo $wyzwanie_title; ?></h2>


        <p>Wyzwanie wykonane! sukces albo inne info</p>

        <p>jeśli zywanie nie było wykonane, to inna wiadomość (niżej w kodzie już jest)</p>



        <ul>
          <li>Erfaring for utfordringen: <?php echo $last_wyzwanie_result['exp']; ?></li>

          <li>Erfaring til sammen: <?php echo $user_exp; ?></li>

          <li>Neste rang: <?php echo $exp_for_next; ?></li>

          <?php
            //  jeśli był czas dłuższy od 5 sekund
            //  to może być pomocne w ustaleniu, czy ktoś w ogóle zrobił wyzwanie
            if ( $last_wyzwanie_result['t'] > 5 ) {
          ?>
          <?php
            }

            //  jeśli były błędy
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


      </div>


      <button class="results__action-btn space-4" id="close-result" role="button">Wróć na szlak &raquo;</button>


      <div class="centered">

        <a class="btn btn-dark" href="<?php echo $wyzwanie_link; ?>" class="btn btn-white">Powtórz wyzwanie</a>

        <a class="btn btn-dark" href="<?php echo $sos_link; ?>" class="btn btn-white">Dołącz do dyskusji</a>

      </div>

    </div>

  </div>

</div>