<?php
//
//  Header 2018
//

//
// Add classes to navigation links
//
function mainNavClassAdd( $el ) {

  $headerAbsPageArr = array(
    'warsztaty-pisania',
    'Warsztaty Pisania',
    'open',
    'kurs-norweskiego-oslo',
    'kurs-norweskiego-oslo-v2016',
    'natt-1',
    'newsletter',
    'krok-3',
    'ordbok',
    'pytania',
    'treningi'
  );

  if ( ( $el === 'header-top' ) && ( is_page( $headerAbsPageArr ) ) ) {
    echo 'header-top--absolute';
  }
  elseif ( $el === 'header-top' ) {
    echo 'header-top--fixed';
  }

  if ( ( $el === 'logo' ) && ( is_front_page() ) ) {
    echo 'btn-black--active';
  }

  if ( ( $el === 'blog' ) && ( is_home() || is_archive() || is_single() ) ) {
    echo 'btn-black--active';
  }

  if ( ( $el === 'warsztaty' ) && ( is_page( array( 'warsztaty-pisania', 'Warsztaty Pisania', 'kurs-norweskiego-oslo', 'kurs-norweskiego-oslo-2' ) ) ) ) {
    echo 'btn-black--active';
  }

  if ( ( $el === 'o-nas' ) && ( is_page( array(18, 'o-nas') ) ) ) {
    echo 'btn-black--active';
  }

  if ( ( $el === 'search' ) && ( is_search() ) ) {
    echo 'btn-black--active';
  }

}

?>

<header class="header-top <?php mainNavClassAdd('header-top'); ?> section-black">
  <div class="section-nav">
    <a class="btn btn-black btn-nav navbar-logo navbar-logo--ns <?php mainNavClassAdd('logo'); ?>" href="/" title="Strona Główna" data-ga-category="Header Nav" data-ga-action="Logo"><span class="navbar-logo__blue">Nocna</span> Sowa</a><?php // remove whitespace

  ?><button class="btn btn-black btn-nav section-nav__toggle js-open-nav" data-open-target="navMain" data-ga-category="Header Nav" data-ga-action="Nav Open">Menu</button><?php

  ?><button id="header-search-btn" class="btn btn-black btn-nav section-nav__search alignright <?php mainNavClassAdd('search'); ?>" data-ga-category="Header Nav" data-ga-action="Toggle Search" onClick="sectionToggle('search'); return false;"></button><?php


  ?><nav id="navMain" class="navbar section-black" aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
      <ul class="navbar__list">
                 <li><a href="/blog/" class="btn btn-black btn-nav <?php mainNavClassAdd('blog'); ?>" title="Artykuły i ćwiczenia z norweskiego" data-ga-category="Header Nav" data-ga-action="Blog">Blog
        </a></li><li><a class="btn btn-black btn-nav <?php mainNavClassAdd('warsztaty'); ?>" href="#warsztatyNav" data-ga-category="Header Nav" data-ga-action="Warsztaty">Warsztaty <span class="caret"></span>
        </a></li><li><a href="/o-nas/" class="btn btn-black btn-nav <?php mainNavClassAdd('o-nas'); ?>" title="O Nocnej Sowie i nauce norweskiego" data-ga-category="Header Nav" data-ga-action="O Nas">O Nas
        </a></li>
      </ul>
    </nav>

  </div>
</header>


<div id="search" class="section-search section-white section-moving">
  <div class="section-content section-8-6">

    <div class="row">
      <div class="main-column">
        <form id="search-form" method="get" class="group search-form" action="/">
          <input class="s" type="text" value="<?php the_search_query(); ?>" placeholder="Czego chcesz się dziś nauczyć?" name="s" id="s" /><button type="submit" class="btn btn-blue btn-search" data-ga-category="Submit" data-ga-action="Szukaj" data-target="spinner">Szukaj<span class="raquo"></span></button>
        </form>
      </div>

      <div class="main-column">
        <div class="row">
          <div class="col-8 space-x4">
            <h4>Najczęściej wyszukiwane:</h4>
            <p class="size-0 space-0">
              <?php
                $wyszukiwane = array(
                  array( 'title' => 'Czas przeszły i odmiana czasownika', 'link' => '/preteritum-norweski-czas-przeszly/' ),
                  array( 'title' => 'Budowa zdania', 'link' => '/najprostsze-norweskie-zdania/' ),
                  array( 'title' => 'Czas teraźniejszy', 'link' => '/norweski-czas-terazniejszy/' ),
                  array( 'title' => 'Perfektum', 'link' => '/mieszkalem-i-mieszkam-czas-perfektum/' ),
                  array( 'title' => 'Jak używać "å bli"', 'link' => '/bli/' ),
                  array( 'title' => 'Czasowniki modalne', 'link' => '/czasowniki-modalne-w-jezyku-norweskim/' )
                );
                shuffle($wyszukiwane);

                for ($i = 0; $i < 5; $i++) {
                  echo '<a href="';
                  echo $wyszukiwane[$i]['link'] . '">';
                  echo $wyszukiwane[$i]['title'];
                  echo '</a><br />';
                }
              ?>
            </p>
          </div>
          <div class="col-8 space-x4">
            <h4>Najbardziej odjechane:</h4>
            <p class="size-0 space-0">
              <?php
                $odjechane = array(
                  //array( 'title' => 'Odkryj wszystkie historie', 'link'  => '/odkryj-wszystkie-historie/' ),
                  array( 'title' => 'Ekstremalna radość', 'link' => '/ekstremalna-radosc/' ),
                  array( 'title' => 'Mnich i nowe technologie', 'link' => '/o-mnichu-ktory-odkrywa-nowetechnologie/' ),
                  array( 'title' => 'Ida i jej pracownia', 'link' => '/ida-i-jej-pracownia/' ),
                  array( 'title' => 'Norweska sztuka: Thomas Fearnley', 'link' => '/thomas-fearnley/' ),
                  array( 'title' => 'Oto film – Tørt og kjølig', 'link' => '/tort-og-kjolig/' ),
                  array( 'title' => 'Sowo, zdradź słowa', 'link' => '/sowo-zdradz-slowa/' ),
                  array( 'title' => 'Postmann Pat', 'link' => '/postmann-pat/' ),
                  array( 'title' => 'Dopisz swoje trzy zdania', 'link' => '/dopisz-swoje-trzy-zdania/' ),
                  array( 'title' => 'Opakowanie czekolady', 'link' => '/opakowanie-czekolady/' ),
                  array( 'title' => 'Film, który warto opisać', 'link' => '/film-ktory-warto-opisac/' ),
                  array( 'title' => 'Hvor skal du gå?', 'link' => '/hvor-skal-du-ga/' ),
                  array( 'title' => 'Nauczyciel to nie magik', 'link' => '/nauczyciel-to-nie-magik/' ),
                  array( 'title' => 'Kortspillerne – opis obrazu', 'link' => '/kortspillerne-opis-obrazu/' ),
                  array( 'title' => 'Ikke noen sykkel', 'link' => '/ikke-noen-noe-uzycie/' ),
                  array( 'title' => 'Zaginiony długopis', 'link' => '/zaginiony-dlugopis/' )
                );
                shuffle($odjechane);

                for ($i = 0; $i < 5; $i++) {
                  echo '<a href="';
                  echo $odjechane[$i]['link'] . '">';
                  echo $odjechane[$i]['title'];
                  echo '</a><br />';
                }
              ?>
            </p>
          </div>

        </div>
      </div>

      <div class="main-column centered">
        Kategorie:
        <a href="/kategoria/zaczynam/" title="Poziom podstawowy">Zaczynam</a>,
        <a href="/kategoria/ucze-sie/" title="Poziom średnio-zaawansowany">Uczę się</a>,
        <a href="/kategoria/rozwijam/" title="Poziom zaawansowany">Rozwijam</a>,
        <a href="/kategoria/artykuly/" title="Jak się uczyć">Artykuły</a>
      </div>

    </div>


  </div>
</div>