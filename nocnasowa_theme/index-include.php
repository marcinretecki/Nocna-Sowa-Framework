<?php
/*
Template Name: Index Include
*/


// Tu jest bałagan!!!!
// przecież mamy singla osobno, po ch... te wszystkie singlowe rzeczy?
//
//




global $post;
$id = $post->ID;


// if comes from Newsletter, set cookie
include( 'includes/set-cookie.php' );

?>
<!DOCTYPE html>
<html id="top" lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/Blog">
<head>
  <title itemprop="name"><?php
    if ( is_paged() ) {
      echo 'Strona ' . $wp_query->query_vars['paged'] . ' | ';
    };

    if ( is_category() ) {
      $cat_desc = category_description();
      $search_desc = array( '<p>','</p>' );
      $strip_cat_desc = str_replace( $search_desc, '', $cat_desc );
      echo $strip_cat_desc;
    }
    else {
      wp_title('', true, 'right');
    };
  ?> | Nocna Sowa</title>

  <?php include( 'includes/header-meta.php' ); ?>

  <?php
  if ( is_search() || is_404() ) {
    echo '<meta name="robots" content="noindex,noarchive,follow" />';
  }
  ?>

  <link href="<?php echo get_permalink( $id ); ?>" rel="canonical" />

  <?php if ( is_home() ) { ?>
    <meta property="og:type" content="blog" />
    <meta name="description" itemprop="description" content="Darmowe ćwiczenia z języka norweskiego na wszystkich poziomach trudności oraz artykuły o kreatywnych i skutecznych metodach nauki języków" />

    <link href="http://nocnasowa.pl/blog/" rel="canonical" />
  <?php } ?>

  <?php
  if ( is_home() || is_category() ) {
    $next_link = explode( '"', get_next_posts_link() );

    if ( isset( $prev_link[1] ) ) {
      $next_url = $next_link[1];
      echo '<link rel="next" href="' . $next_url . '" />';
    }

    $prev_link = explode( '"', get_previous_posts_link() );
    if ( isset( $prev_link[1] ) ) {
      $prev_url = $prev_link[1];
      echo '<link rel="prev" href="' . $prev_url . '" />';
    }
  }

  ?>

  <?php // Facebook og: ?>
  <meta property="og:title" content="<?php if ( '' != $title ) { echo $title; } else { wp_title('', true, 'right'); }; ?>" />
  <meta property="og:image" content="http://nocnasowa.pl/c/i/sowa_fb_thumb.jpg" />
  <meta property="og:site_name" content="Twój wieczorny kurs języka norweskiego | Nocna Sowa" />

</head>

<body>

<?php

include( 'includes/header.php' );

if ( is_category() ) {

  $index_header_color = 'section-beige';
  $index_header = '<h1>Inne</h1>';
  $post_categories = '<div class="section-1-1 centered"><small>Kategorie: <a href="/kategoria/zaczynam/" title="Poziom podstawowy">Zaczynam</a>, <a href="/kategoria/ucze-sie/" title="Poziom średnio-zaawansowany">Uczę się</a>, <a href="/kategoria/rozwijam/" title="Poziom zaawansowany">Rozwijam</a>, <a href="/kategoria/artykuly/" title="Jak się uczyć">Artykuły</a>.</small></div>';

  if ( is_category( 'zaczynam' ) ) {
    $index_header_color = 'section-green';
    $index_header = '
      <h1 class="centered">Zaczynam</h1>
      <div class="main-column max-24">
        <p class="size-0">Miejsce dla wszystkich początkujących w nauce języka norweskiego.</p>
        <p class="size-0">Znajdziesz tu zagadnienia najważniejsze na start, ale też ćwiczenia, które mogą odrobinę wychodzić poza zakres słownictwa, które poznałeś do tej pory.</p>
        <p class="space-0 size-0">Żeby Ci ułatwić naukę, zdania po norwesku tłumaczymy na język polski.</p>
      </div>
    ';
    $post_categories = '<div class="section-1-1 centered"><small>Inne kategorie: <a href="/kategoria/ucze-sie/" title="Poziom średnio-zaawansowany">Uczę się</a>, <a href="/kategoria/rozwijam/" title="Poziom zaawansowany">Rozwijam</a>, <a href="/kategoria/artykuly/" title="Jak się uczyć">Artykuły</a>.</small></div>';
  }
  elseif ( is_category( 'ucze-sie' ) ) {
    $index_header_color = 'section-orange';
    $index_header = '
      <h1 class="centered">Uczę się</h1>
      <div class="main-column max-24">
        <p class="size-0">Ćwiczenia dla osób, które znają już podstawy języka norweskiego, ale zmagają się z czasem przeszłym lub szykiem prostym zdania.</p>
        <p class="space-0 size-0">Na tym etapie chcemy zachęcić Cię do kreatywnej nauki, intensywnej nauki słownictwa oraz bycia otwartym na próbowanie nowych metod.</p>
      </div>
    ';
    $post_categories = '<div class="section-1-1 centered"><small>Inne kategorie: <a href="/kategoria/zaczynam/" title="Poziom podstawowy">Zaczynam</a>, <a href="/kategoria/rozwijam/" title="Poziom zaawansowany">Rozwijam</a>, <a href="/kategoria/artykuly/" title="Jak się uczyć">Artykuły</a>.</small></div>';
  }
  elseif ( is_category( 'rozwijam' ) ) {
    $index_header_color = 'section-red';
    $index_header = '
      <h1 class="centered">Rozwijam</h1>
      <div class="main-column max-24">
        <p class="size-0">To miejsce pomagające zrozumieć i przetrenować norweskie niuanse gramatyczne oraz zanurzyć się w języku.</p>
        <p class="space-0 size-0">Przygotowaliśmy tu wywiady z interesującymi Norwegami, które pomogą Ci rozwinąć słownictwo i otworzyć się na różnorodność języka, jakiego używają na codzień.</p>
      </div>
    ';
    $post_categories = '<div class="section-1-1 centered"><small>Inne kategorie: <a href="/kategoria/zaczynam/" title="Poziom podstawowy">Zaczynam</a>, <a href="/kategoria/ucze-sie/" title="Poziom średnio-zaawansowany">Uczę się</a>, <a href="/kategoria/artykuly/" title="Jak się uczyć">Artykuły</a>.</small></div>';
  }
  elseif ( is_category( 'artykuly' ) ) {
    $index_header_color = 'section-dark';
    $index_header = '
      <h1 class="centered">Artykuły</h1>
    ';
    $post_categories = '<div class="section-1-1 centered"><small>Inne kategorie: <a href="/kategoria/zaczynam/" title="Poziom podstawowy">Zaczynam</a>, <a href="/kategoria/ucze-sie/" title="Poziom średnio-zaawansowany">Uczę się</a>, <a href="/kategoria/rozwijam/" title="Poziom zaawansowany">Rozwijam</a>.</small></div>';
  }

} elseif ( is_tag() ) {

  $index_header_color = 'section-dark';
  $index_header = '<h1 class="centered">' . single_tag_title('', false) . '</h1>';


} else {
  $index_header_color = 'section-dark';
  $index_header = '
    <h1 class="centered">Artykuły i&nbsp;ćwiczenia</h1>
    <p class="main-column max-24 centered space-0 size-0">Na blogu znajdziesz ćwiczenia z norweskiego oraz artykuły <span class="no-break">o kreatywnych</span> <span class="no-break">i skutecznych</span> metodach nauki języków.</p>
  ';
}
?>


<div class="<?php echo $index_header_color; ?>">
  <div class="section-content section-6-4">

    <div class="row">
      <div class="main-column">
        <?php echo $index_header; ?>
      </div>
    </div>
  </div>
</div>

<?php
if ( !is_category() ) {
  include( 'includes/blog-submenu.php' );
}
?>

<?php if ( is_category() ) { ?>
<div class="<?php echo $index_header_color; ?>">
<?php } ?>

  <div class="section-content">
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
              echo ns_get_heading();
              echo '</a></h2>';
            ?>

            <?php if ( !(is_category()) ) { ?>
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

                if ( !empty( $is_popular ) ) {
                  comments_number( '', 'Komentarze: 1', 'Komentarze: %' );
                }
              ?>
            </footer>
            <?php } ?>

            <?php if ( empty( $is_czytales ) && empty( $is_wybrane ) ) { ?>
              <?php the_excerpt(); ?>
              <a <?php if ( is_category() ) { echo 'class="a-white"'; } ?> href="<?php the_permalink(); ?>">Przeczytaj artykuł &rarr;</a>
            <?php } ?>

            <hr />
          </article>

        <?php endwhile; else : ?>
          <div class="entry-404">
            <h2>Uuhóóó!</h2>
            <p>Udało Ci się przeczytać wszystkie nasze artykuły. :)</p>
            <p>Już niedługo pojawią się tu kolejne, bądź czujny!</p>
          </div>
        <?php endif; // end the loop ?>

        <?php if ( !( is_single() ) || empty( $is_czytales ) || empty( $is_wybrane ) ) { ?>
          <footer class="pagination group">
            <div class="alignleft"><?php previous_posts_link('&laquo; Nowsze artykuły'); ?></div>
            <div class="alignright"><?php next_posts_link('Starsze artykuły &raquo;'); ?></div>
          </footer>
        <?php }; ?>

        <?php
        if ( is_category() ) {
          echo $post_categories;
        }
        ?>
      </div>

    </div>
  </div>

<?php

if ( is_category() ) {
  // close section-color
  echo '</div>';
}

include( 'includes/sidebar-bottom.php' );

include( 'includes/footer.php' );


// wp_footer(); jeśli potrzebny
// echo '<!-->' . get_num_queries() . ' in '; echo timer_stop(1) . '<!-->'

?>
</body>
</html>