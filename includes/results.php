<?php
//
//  Includes - Results
//

//  @last_wyzwanie_result = array(
//    'progress'
//    'id'
//    'first_time'
//  )


$last_wyzwanie_result_progress = $last_wyzwanie_result[ 'progress' ];

$chapter_permalink = get_permalink( $last_wyzwanie_result['id'] );
$wyzwanie_link = $chapter_permalink . 'wyzwanie/';
$przewodnik_link = $chapter_permalink . 'przewodnik/';
$ratownik_link = $chapter_permalink;
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

$last_wyzwanie_result_progress['wrong'] = $last_wyzwanie_result_progress['wrong'] ?: 0;

$wrong_percent = floor( 100 * $last_wyzwanie_result_progress['wrong'] / ( $last_wyzwanie_result_progress['wrong'] + $last_wyzwanie_result_progress['correct'] ) );


//  if user finished wyzwanie
//  wrong percent is lower than 20
$finished_well = ( ( $last_wyzwanie_result_progress[ 'finished' ] > 0 ) && ( $wrong_percent < 20 ) );


//  if user finished wyzwanie
//  but wrong percent is higher than or equal 20
$finished_so_so = ( ( $last_wyzwanie_result_progress[ 'finished' ] > 0 ) && ( $wrong_percent >= 20 ) );

//  if user has not finished wyzwanie
//  she could just click back button
//  or on nav
//  or closed browser tab
$not_finished = ( !$last_wyzwanie_result_progress[ 'finished' ] || ( $last_wyzwanie_result_progress[ 'finished' ] === 0 ) );

?>

<div id="results-wrapper" class="szlak-post-popup section-trans group profile-back wrapper preload--hidden" style="display:block;background-image: url('/las/c/i/las_test.jpg');">

  <div id="results" class="section-content section-8-2">

    <div class="main-column main-column--back">

      <div class="results__section">

        <div class="results-header space-2">
          <img class="result-header__img" src="<?php echo $user_img_url; ?>" />

          <h2 class="results-header__name h1 space-half size-4"><?php echo $user_nick; ?></h2>

          <p class="results-header__user-char"><i><?php echo las_get_user_char_type( $user_char ); ?></i></p>
        </div>


        <?php
          //  if user has finsihed wyzwanie
          //  show her exp animation
          if ( !$not_finished ) {
        ?>

        <div id="results-level" class="profile-level section-green space-2">
          <div id="results-level__line" class="profile-level__line" style="width: <?php echo $level_percent_before; ?>"></div>
          <span id="results-level__no" class="relative profile-level__no">Rang <?php echo $level_before; ?></span>
          <div id="results-level__highlight" class="results-level__highlight"></div>
        </div>


        <div class="results-numbers row">

          <div class="results-numbers__col">
            <i class="size-0">Riktig:</i><br />
            <span class="bariol-thin size-3">
              <?php echo $last_wyzwanie_result_progress['correct']; ?>
            </span>
          </div>

          <div class="results-numbers__col">
            <i class="size-0">Feil:</i><br />
            <span class="bariol-thin size-3">
              <?php echo $last_wyzwanie_result_progress['wrong']; ?>
            </span>
          </div>

          <div class="results-numbers__col">
            <i class="size-0">Erfering:</i><br />
            <span id="results-added-exp" class="bariol-thin size-3">0</span>

          </div>

        </div>

        <?php
          }
        ?>

        <div class="results-msg">

          <?php

            $result_msg = '';


            if ( $finished_well ) {

              $result_msg .= '<p class="size-2">Twój bohater jest gotowy do nastepnego <span class="no-break">etapu wędrówki</span>.</p>';
              $result_msg .= '<p>Zawsze możesz tu wrócić, bo nawet ta sama droga, przynosi <span class="no-break">za każdym</span> razem <span class="no-break">inne doświadczenia</span>.</p>';

            }
            elseif ( $finished_so_so ) {

              $result_msg .= '<p class="size-2">Twój bohater napotkał trudności na tym <span class="no-break">etapie szlaku</span>.</p>';
              $result_msg .= '<p>Powtórz wyzwanie, żeby nabrał <span class="no-break">więcej doświadczenia</span>.</p>';

            }
            elseif ( $not_finished ) {

              $result_msg .= '<p class="size-2">Twój bohater nieoczekiwanie zszedł <span class="no-break">ze szlaku</span>.</p>';
              $result_msg .= '<p>Ale nic się nie martw. Zawsze możesz tu wrócić i pomóc mu <span class="no-break">w zdobyciu doświadczenia</span>.</p>';

            }

            //  Msg
            echo $result_msg;

            //  Idea:
            //  Na swojej ścieżce napotkałeś 27 nowych słów, 15 gatunków roślin i 3 zwierzęta.
          ?>

        </div>

      </div>

      <?php

        $result_btns = '';

        if ( $finished_well ) {

         $result_btns .= '<button class="results__action-btn results__action-btn--last space-4" id="close-result" role="button">Twój szlak &raquo;</button>';

          $result_btns .= '<div>';

            $result_btns .= '<a class="results__action-secondary results__action-btn--first" href="' . $wyzwanie_link . '" class="btn btn-white">Powtórz wyzwanie</a>';

            $result_btns .= '<a class="results__action-secondary" href="' .  $przewodnik_link . '" class="btn btn-white">Wróć do przewodnika</a>';

            $result_btns .= '<a class="results__action-secondary results__action-btn--last" href="' . $ratownik_link . '" class="btn btn-white">Ratownik</a>';

          $result_btns .= '</div>';

        }
        elseif ( $finished_so_so || $not_finished ) {

          $result_btns .= '<a class="results__action-btn results__action-btn--negative space-4" href="' . $wyzwanie_link . '" class="btn btn-white">Powtórz wyzwanie &raquo;</a>';

          $result_btns .= '<div>';

            $result_btns .= '<a class="results__action-secondary results__action-btn--first" href="' .  $przewodnik_link . '" class="btn btn-white">Wróć do przewodnika</a>';

            $result_btns .= '<a class="results__action-secondary" href="' . $ratownik_link . '" class="btn btn-white">Ratownik</a>';

            $result_btns .= '<button class="results__action-secondary results__action-btn--last" id="close-result" role="button">Twój szlak</button>';

          $result_btns .= '</div>';

        }

        //  Btns
        echo $result_btns;

      ?>

    </div>

  </div>

</div>


<script>
//  we have results
las.state.results = true;

<?php

  //  if there is progress and user finished wyzwanie
  //  if she has not finished, we are not showing the exp count
  if ( $last_wyzwanie_result && ( $finished_well || $finished_so_so) ) {

    echo 'las.results.expAdded = '           . $exp_added .  ';' . "\r\n";
    echo 'las.results.levelPercentBefore = "' . $level_percent_before .  '";' . "\r\n";
    echo 'las.results.levelPercentNow = "'    . $level_percent_now .  '";' . "\r\n";
    echo 'las.results.levelBefore = '        . $level_before .  ';' . "\r\n";
    echo 'las.results.levelNow = '           . $user_level .  ';' . "\r\n";

  }

  //  if it was first time, we can highlight the new chapter
  //  but only if she finished it
  //  otherwise we will not do any animation
  //  she did not care, we do no care
  if ( $last_wyzwanie_result && $last_wyzwanie_result[ 'first_time' ] && $last_wyzwanie_result[ 'finished' ] ) {

    $ids = $all_sections_array[2];

    $next_id_key = array_search( 'chapter-' . $last_wyzwanie_result['id'], $ids ) + 1;

    $next_id = $ids[ $next_id_key ];

    echo 'las.helper.chapterToHighlight = \'' . $next_id . '\'; ' . "\r\n";
  }

?>
</script>