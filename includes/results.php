<?php
//
//  Includes - Results
//

//  @last_wyzwanie_result = array(
//    'progress'
//    'id'
//    'first_time'
//  )

//
//  TODO
//  jeśli było dużo błędów, albo ćwiczenie nie było zrobione całe, pytamy, czy chce spróbować jeszcze raz, albo wrócić do przewodnika
//  jeśli nie było błędów, to sugestia, żeby wrócić na szlak
//


$last_wyzwanie_result_progress = $last_wyzwanie_result[ 'progress' ];

$wyzwanie_permalink = get_permalink( $last_wyzwanie_result['id'] );
$wyzwanie_link = $last_wyzwanie_permalink . 'wyzwanie/';
$sos_link = $last_wyzwanie_permalink . '/';
$wyzwanie_title = las_get_clean_title( get_the_title( $last_wyzwanie_result['id'] ) );

//  user exp before the chapter
$user_exp_before = $user_exp - $last_wyzwanie_result_progress['exp'];


//  $user_level;
$level_before_array = las_get_user_level_array( $user_exp_before );

//  Prepare data
$level_percent_now = las_get_level_percent( $user_exp );
$level_percent_before = las_get_level_percent( $user_exp_before );
$exp_added = $last_wyzwanie_result_progress['exp'];
$level_before = $level_before_array[0];

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
          <div id="results-level__line" class="profile-level__line" style="width: <?php echo $level_percent_before; ?>"></div>
          <span id="results-level__no" class="relative profile-level__no">Rang <?php echo $level_before; ?></span>
          <div id="results-level__highlight" class="results-level__highlight"></div>
        </div>


        <div class="group">

          <table style="width: 100%;" class="centered space-x2">
            <tr>
              <td>
                <i class="size-0">Riktig:</i><br />
                <span class="bariol-thin size-3">
                  <?php echo $last_wyzwanie_result_progress['correct']; ?>
                </span>
              </td>
              <td>
                <i class="size-0">Feil:</i><br />
                <span class="bariol-thin size-3">
                  <?php echo $last_wyzwanie_result_progress['wrong']; ?>
                </span>
              </td>

              <td>
                <i class="size-0">Tid:</i><br />
                <span class="bariol-thin size-3">
                  <?php echo las_format_t_short( $last_wyzwanie_result_progress['t'] ); ?>
                </span>
              </td>

              <td>
                <i class="size-0">Erfering:</i><br />
                <span id="results-added-exp" class="bariol-thin size-3">0</span>

              </td>
            </tr>
          </table>

        </div>


        <h2 class="size-2 centered"><?php echo $wyzwanie_title; ?></h2>


        <?php

          //  if finished
          //    if some or none wrong
          //      było prawie idealnie, zawsze możesz wrócić do tego ćwiczenia, żeby utrwalić materiał
          //    if many wrong
          //      może potrzebujesz przećwiczyć to zagadnienie jeszcze raz?
          //      Czy ćwiczenie było za trudne? Miałes problem z zagadnieniem? Wróć do przewodnika.
          //  if not finished
          //     Nie zrobiłeś wszystkich przykładów. Może spróbujesz jeszcze raz? Jeśli były za trudne, wróć do przewodnika albo do poprzednich wyzwań. Jeśli nie zrobiłeś wyzwania, bo wydawało Ci się nudne, daj nam o tym znać.




        ?>


        <p>Wyzwanie wykonane! sukces albo inne info</p>

        <p>jeśli zywanie nie było wykonane, to inna wiadomość (niżej w kodzie już jest)</p>



        <ul>
          <li>Erfaring for utfordringen: <?php echo $last_wyzwanie_result_progress['exp']; ?></li>

          <li>Erfaring til sammen: <?php echo $user_exp; ?></li>

          <li>Neste rang: <?php echo $exp_for_next; ?></li>

          <?php
            //  jeśli był czas dłuższy od 5 sekund
            //  to może być pomocne w ustaleniu, czy ktoś w ogóle zrobił wyzwanie
            if ( $last_wyzwanie_result_progress['t'] > 5 ) {
          ?>
          <?php
            }

            //  jeśli były błędy
            if ( $last_wyzwanie_result_progress['wrong'] > 0 ) {
          ?>
            <li>Błędy: <?php echo $last_wyzwanie_result_progress['wrong']; ?></li>
          <?php
            }
          ?>
        </ul>

        <?php
          //  if there is no time
          //  user has not finished the chapter
          if ( ( !$last_wyzwanie_result_progress['t'] && $last_wyzwanie_result_progress['first_time'] ) ) {
        ?>
            <p>Nie zrobiłeś wszystkich przykładów. Może spróbujesz jeszcze raz? Jeśli były za trudne, wróć do przewodnika albo do poprzednich wyzwań. Jeśli nie zrobiłeś wyzwania, bo wydawało Ci się nudne, daj nam o tym znać.</p>
        <?php
          }
          //  no exp
          //  maybe make it low exp instead?
          elseif ( !$last_wyzwanie_result_progress['exp'] ) {
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


<script>
<?php

  //  if there is progress and user received exp
  if ( $last_wyzwanie_result && $last_wyzwanie_result['progress']['exp'] ) {

    echo 'las.state.results = true;' . "\r\n";
    echo 'las.results.expAdded = '           . $exp_added .  ';' . "\r\n";
    echo 'las.results.levelPercentBefore = "' . $level_percent_before .  '";' . "\r\n";
    echo 'las.results.levelPercentNow = "'    . $level_percent_now .  '";' . "\r\n";
    echo 'las.results.levelBefore = '        . $level_before .  ';' . "\r\n";
    echo 'las.results.levelNow = '           . $user_level .  ';' . "\r\n";

  }

  //  if it was first time, we can highlight the new chapter
  if ( $last_wyzwanie_result && $last_wyzwanie_result[ 'first_time' ] ) {

    $ids = $all_sections_array[2];

    $next_id_key = array_search( 'chapter-' . $last_wyzwanie_result['id'], $ids ) + 1;

    $next_id = $ids[ $next_id_key ];

    echo 'las.helper.chapterToHighlight = \'' . $next_id . '\'; ' . "\r\n";
  }

?>
</script>