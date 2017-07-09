<?php
//
//  Includes - Create Char
//

//  - show the screen with character selection
//  - after selection show fields for name, przydomek etc
//  - save new character to user metadata
//  - redirect to first chapter



function las_show_chars() {

  $chars = las_get_chars_data();


  //  Desc One
  $chars[ 1 ][ 'desc' ] .= '<p class="space-0">Noe som vikingene kunne se med egne øyne eller noe som de største norske forfatterne skrev om.</p>';
  $chars[ 1 ][ 'desc' ] .= '<p class="char-trans">Takiego, co na własne oczy mogli zobaczyć Wikingowie albo o czym pisali najwięksi norwescy pisarze.</p>';

  $chars[ 1 ][ 'desc' ] .= '<p class="space-0">Vi ville føle norsk stemning som har forblitt urørt i årevis.</p>';
  $chars[ 1 ][ 'desc' ] .= '<p class="char-trans">Chcieliśmy poczuć klimat Norwegii, który pozostał nietknięty od lat.</p>';

  $chars[ 1 ][ 'desc' ] .= '<p class="space-0">Og da tenkte vi på Geirangerfjorden.</p>';
  $chars[ 1 ][ 'desc' ] .= '<p class="char-trans">I wtedy pomyśleliśmy o Geirangerfjorden.</p>';

  $chars[ 1 ][ 'desc' ] .= '<p class="space-0">Men er det ikke et for populært sted blant turister? Finner vi en stund til å nyte naturen i ro og mak?</p>';
  $chars[ 1 ][ 'desc' ] .= '<p class="char-trans">Tylko czy nie jest to miejsce zbyt popularne wśród turystów? Czy znajdziemy tam chwilę, by w spokoju cieszyć się naturą?</p>';


  //  Desc Two
  $chars[ 2 ][ 'desc' ] .= '<p class="space-0">Vi ville føle norsk stemning som har forblitt urørt i årevis.</p>';
  $chars[ 2 ][ 'desc' ] .= '<p class="char-trans">Chcieliśmy poczuć klimat Norwegii, który pozostał nietknięty od lat.</p>';

  $chars[ 2 ][ 'desc' ] .= '<p class="space-0">Men er det ikke et for populært sted blant turister? Finner vi en stund til å nyte naturen i ro og mak?</p>';
  $chars[ 2 ][ 'desc' ] .= '<p class="char-trans">Tylko czy nie jest to miejsce zbyt popularne wśród turystów? Czy znajdziemy tam chwilę, by w spokoju cieszyć się naturą?</p>';


  //  Desc Three
  $chars[ 3 ][ 'desc' ] .= '<p class="space-0">Vi hadde en liten redsel, men det eneste alternativet var å sjekke det personlig.</p>';
  $chars[ 3 ][ 'desc' ] .= '<p class="char-trans">Mieliśmy małe obawy, ale jedyną opcją było sprawdzenie tego osobiście.</p>';

  $chars[ 3 ][ 'desc' ] .= '<p class="space-0">Vi ville føle norsk stemning som har forblitt urørt i årevis.</p>';
  $chars[ 3 ][ 'desc' ] .= '<p class="char-trans">Chcieliśmy poczuć klimat Norwegii, który pozostał nietknięty od lat.</p>';


  // Desc Four
  $chars[ 4 ][ 'desc' ] .= '<p class="space-0">Men er det ikke et for populært sted blant turister? Finner vi en stund til å nyte naturen i ro og mak?</p>';
  $chars[ 4 ][ 'desc' ] .= '<p class="char-trans">Tylko czy nie jest to miejsce zbyt popularne wśród turystów? Czy znajdziemy tam chwilę, by w spokoju cieszyć się naturą?</p>';

  $chars[ 4 ][ 'desc' ] .= '<p class="space-0">Vi hadde en liten redsel, men det eneste alternativet var å sjekke det personlig.</p>';
  $chars[ 4 ][ 'desc' ] .= '<p class="char-trans">Mieliśmy małe obawy, ale jedyną opcją było sprawdzenie tego osobiście.</p>';



  $charsL = count( $chars );
  $i = 1;

  //
  for ( ; $i < $charsL; $i++ ) {

    $html .= '<div id="char-' . $i . '" class="char-item">';

      $html .= '<button id="char-btn-' . $i . '" class="char-item__btn space-2" type="button">';

      $html .= '<img class="char-item__img" src="' . $chars[ $i ][ 'img' ] . '" />';
      $html .= '<div class="char-item__title">' . $chars[ $i ][ 'name' ] . '</div>';

      $html .= '</button>';

      $html .= '<div class="char-item__desc section-white">';

        $html .= '<h2 class="h1 centered space-half">';
          $html .= $chars[ $i ][ 'name' ];
        $html .= '</h2>';

        $html .= '<p class="centered color-gray">';
          $html .= $chars[ $i ][ 'nameT' ];
        $html .= '</p>';

        $html .= $chars[ $i ][ 'desc' ];

      $html .= '</div>';

    $html .= '</div>';

  }

  echo $html;

}


?>


<section id="wrapper" class="section-trans wrapper" style="background-image:url('/las/c/i/las_test.jpg');">

  <div id="char-back-1" style="position:fixed;left:0;top:0;right:0;bottom:0;background-image:url('/las/c/i/las_test.jpg');opacity:0;" class="section-trans"></div>
  <div id="char-back-2" style="position:fixed;left:0;top:0;right:0;bottom:0;background-image:url('/las/c/i/las_test_8.jpg');opacity:0;" class="section-trans"></div>
  <div id="char-back-3" style="position:fixed;left:0;top:0;right:0;bottom:0;background-image:url('/las/c/i/las_test_9.jpg');opacity:0;" class="section-trans"></div>
  <div id="char-back-4" style="position:fixed;left:0;top:0;right:0;bottom:0;background-image:url('/las/c/i/las_test_4.jpg');opacity:0;" class="section-trans"></div>

  <div id="chars-wrapper" class="char-selection section-content section-6-4" style="">

    <div class="row">
      <div class="main-column center centered">

        <h1 class="chars-title size-5 space-half">Wybierz bohatera</h1>
        <p class="chars-title space-2">Jakieś lekkie wytłumaczenie co to i dlaczego.</p>

      </div>
    </div>

    <div id="chars-row" class="main-column center relative group" style="padding:0;">

      <?php

        las_show_chars();

      ?>


    </div>

    <div id="char-form" class="main-column center" style="padding:0;display:none;">

      <form class="char-form section-white centered" action="" method="post" name="char-form">

        <h3 class="h1 size-3 centered space-half">Nazwij swojego bohatera</h3>

        <p class="centered size-0 space-2">Możesz podać tylko imię, a my dodamy mu przydomek.</p>

        <div class="hidden-input">
          <input id="char-type" type="hidden" name="CHAR" value="" />
        </div>

        <div class="char-form__names group space-2">
          <input id="char-fname" class="char-form__text" type="text" value="" name="FNAME" required="" placeholder="Wpisz imię" autocomplete="off" inputmode="latin-name" autocorrect="off" />

          <input id="char-nick" class="char-form__text char-form__text--hidden" type="text" readonly="" value="" name="NICK"  autocomplete="off" autocorrect="off" />

          <div id="char-blocker" class="char-form__blocker"></div>
        </div>

        <div style="display:none;">
                   <button id="char-form-submit" class="btn btn-green" style="min-width: 40%;" type="submit">Stwórz bohatera
          </button><button id="char-nick-btn" class="btn btn-dark" style="min-width: 40%;" type="button">Inny przydomek
          </button>
        </div>

      </form>

    </div>

  </div>

</section>


<script>
//  init Las
var las = new LasCreateProfile();
las.init();
</script>