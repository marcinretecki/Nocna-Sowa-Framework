<?php
/*
Search
*/


global $wp_query;
if ($wp_query->query_vars['paged'] > 1) {
  $page_no = $wp_query->query_vars['paged'];
} else {
  $page_no = 1;
}
$last_page_no = $wp_query->max_num_pages;
?>
<!DOCTYPE html>
<html id="top" lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/SearchResultsPage">
<head>
  <title><?php if ( $wp_query->query_vars['s'] ) { echo 'Wyniki wyszukania: ' . $wp_query->query_vars['s']; } ?> | Nocna Sowa</title>

  <?php include( 'includes/header-meta.php' ); ?>

  <meta name="robots" content="noindex,noarchive,follow" />
</head>

<body>

<?php include( 'includes/header.php' ); ?>

<div id="search" class="section-search section-white">
  <div class="section-content section-8-6">

    <div class="row">
      <div class="main-column">
        <form id="search-form" method="get" class="group search-form" action="/">
          <div class="space">
            <input class="s" type="text" value="<?php the_search_query(); ?>" placeholder="Czego chcesz się dziś nauczyć?" name="s" id="s" /><button type="submit" class="btn btn-blue btn-search" data-ga-category="Submit" data-ga-action="Szukaj" data-target="spinner">Szukaj<span class="raquo"></span></button>
          </div>
          <p class="size-0 no-margin"><?php if ($last_page_no > 1) { ?>Strona <?php echo $page_no; ?> z <?php echo $last_page_no; } ?></p>
        </form>
      </div>
    </div>


    <div class="row">
      <div role="main" class="main-column">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <article <?php post_class('post-index'); ?> id="post-<?php the_ID(); ?>">
            <?php
              if ( is_category() ) {
                echo '<h2 class="index-h index-h-white">';
              } else {
                echo '<h2 class="index-h">';
              }

              echo '<a href="';
              the_permalink();
              echo '" title="">';
              the_title();
              echo '</a></h2>';
            ?>

            <?php if ( !is_category() ) { ?>
            <footer class="space">
              <?php
                if ( has_tag( 'film' ) ) {
                  echo '<a class="btn btn-beige btn-icon"><div class="icon i-film"></div></a>';
                } elseif ( has_tag( 'cwiczenie' ) ) {
                  echo '<a class="btn btn-beige btn-icon"><div class="icon i-ex"></div></a>';
                } elseif ( has_tag( 'dialog' ) ) {
                  echo '<a class="btn btn-beige btn-icon"><div class="icon i-talk"></div></a>';
                } else {
                  echo '<a class="btn btn-beige btn-icon"><div class="icon i-ark"></div></a>';
                }
              ?>

              <?php
                echo '<small>';
                if ( in_category( 'zaczynam' ) ) {     echo 'Kategoria: <a href="/kategoria/zaczynam/">Zaczynam</a>'; }
                elseif ( in_category( 'ucze-sie' ) ) { echo 'Kategoria: <a href="/kategoria/ucze-sie/">Uczę się</a>'; }
                elseif ( in_category( 'rozwijam' ) ) { echo 'Kategoria: <a href="/kategoria/rozwijam/">Rozwijam</a>'; }
                elseif ( in_category( 'artykuly' ) ) {   echo 'Kategoria: <a href="/kategoria/artykuly/">Artykuły</a>'; }
                echo '</small>';
              ?>
            </footer>
            <?php } ?>

            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>">Przeczytaj artykuł &rarr;</a>

            <hr />
          </article>

        <?php endwhile; else : ?>
          <div class="entry-404 space-x4">
            <h3>Nie znaleźlimyśmy żadnego artykułu z tą frazą.</h3>
            <p>Spróbuj wyszukać innych słów.</p>
          </div>

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

        <?php endif; // end the loop ?>

        <footer class="pagination group">
          <div class="alignleft"><?php previous_posts_link('&laquo; Poprzednia strona'); ?></div>
          <div class="alignright"><?php next_posts_link('Następna strona &raquo;'); ?></div>
        </footer>
      </div>

    </div>
  </div>
</div>

<?php
include( 'includes/sidebar-bottom.php' );
include( 'includes/footer.php' );
?>
</body>
</html>