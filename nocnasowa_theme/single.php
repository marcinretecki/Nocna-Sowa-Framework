<?php
/*
Single
*/


// ID
global $post;
$id = $post->ID;
$permalink = get_permalink( $id );
$fb_link = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($permalink);


// Title
$title = ns_get_clean_title();
$heading = ns_get_heading();

// if comes from Newsletter, set cookie
include( 'includes/set-cookie.php' );


// Cookie of visited posts
if ( isset( $_COOKIE['nocnasowa_czytales'] ) ) {
  $czytales_cookie = $_COOKIE['nocnasowa_czytales'];
}

if ( !empty( $czytales_cookie ) ) {
  $czytales_ids = json_decode( $czytales_cookie, true );

  if ( !in_array( $id, $czytales_ids ) ) {
    array_unshift( $czytales_ids, $id );
  } else {
    $czytales_key = array_search($id, $czytales_ids);
    unset( $czytales_ids[$czytales_key] );
    array_unshift( $czytales_ids, $id );
  }
}
else {
  $czytales_ids = array($id);
}

$czytales_json = json_encode( $czytales_ids );
setcookie( 'nocnasowa_czytales', $czytales_json, time()+60*60*24*365, '/', 'nocnasowa.pl' );


?>
<!DOCTYPE html>
<html id="top" lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/Article">
<head>
  <title itemprop="headline"><?php echo $title; ?> | Nocna Sowa</title>

  <?php include( 'includes/header-meta.php' ); ?>

  <link href="<?php echo $permalink; ?>" rel="canonical" />

  <meta property="og:type" content="article" />
  <?php
    $description = get_post_meta($id, 'description', true);
    if ( '' != $description ) { ?>
      <meta name="description" itemprop="description" content="<?php echo $description; ?>" />
  <?php }; ?>

  <?php // Facebook og: ?>
  <meta property="og:title" content="<?php echo $title; ?>" />

</head>

<body>

<?php include( 'includes/header.php' ); ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" data-title="<?php echo $title; ?>">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php
    // tu trzeba zrobić funkcję, która asygnuje classy do rzeczy poniżej

    ?>

    <section role="main" itemprop="articleBody">

      <div class="<?php
            if ( in_category( 'zaczynam' ) ) { echo 'section-green'; }
            elseif ( in_category( 'ucze-sie' ) ) { echo 'section-orange'; }
            elseif ( in_category( 'rozwijam' ) ) { echo 'section-red'; }
            elseif ( in_category( 'artykuly' ) )   { echo 'section-dark'; }
            else { echo 'section-dark'; }
        ?>">

        <header class="section-content section-8-2 centered">
          <h1 class="entry-title" itemprop="name"><?php echo $heading; ?></h1>

          <meta itemprop="alternativeHeadline" content="<?php echo strip_tags( get_the_excerpt() ); ?>" />

          <div>
            <?php show_tag_img(); ?>
            <small>Kategoria:
            <?php
              if ( in_category( 'zaczynam' ) ) { echo '<a href="/kategoria/zaczynam/">Zaczynam</a>'; }
              elseif ( in_category( 'ucze-sie' ) ) { echo '<a href="/kategoria/ucze-sie/">Uczę się</a>'; }
              elseif ( in_category( 'rozwijam' ) ) { echo '<a href="/kategoria/rozwijam/">Rozwijam</a>'; }
              elseif ( in_category( 'artykuly' ) )   { echo '<a href="/kategoria/artykuly/">Artykuły</a>'; }

              $comments_num = get_comments_number();
              echo ' | Komentarze: <a class="" href="';
              the_permalink();
              echo '#comments">' . $comments_num . '</a>';
            ?>
            </small>
            <?php
              echo '<meta itemprop="interactionCount" content="UserComments:' . $comments_num . '"/>';

              echo '<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">';
                if ( has_post_thumbnail() ) {
                  $thumb_id = get_post_thumbnail_id();
                  $thumb = wp_get_attachment_image_src( $thumb_id, 'full' );
                  echo '<meta itemprop="url" content="' . $thumb[0] . '" />';
                  echo '<meta itemprop="width" content="' . $thumb[1] . '" />';
                  echo '<meta itemprop="height" content="' . $thumb[2] . '" />';
                } else {
                  echo '<meta itemprop="url" content="http://nocnasowa.pl/c/i/sowa_fb_thumb.jpg" />';
                  echo '<meta itemprop="width" content="400" />';
                  echo '<meta itemprop="height" content="400" />';
                };
              echo '</div>';
            ?>
          </div>

        </header>

      </div>

      <div class="section-content section-2-2 section-entry"><?php // .section-entry jest do wywalenia, trzeba posprawdzac, jak z object, iframe, img etc ?>
        <div class="row">
          <div class="p-10 p-center ">

            <?php

              //
              // Content
              //
              the_content();

              //
              // Assets
              //
              if ( has_tag( 'asset' ) ) {
                include( $_SERVER['DOCUMENT_ROOT'] . '/c/w/themes/nocnasowa_theme/assets/asset-' . $post->post_name . '.php' );
              }
            ?>

          </div>
        </div>
      </div>

      <footer class="section-content footer-author section-0-2">
        <div class="row">
          <div class="main-column">

            <hr />


            <?php /* Tu możemy zrobić eksperyment z innymi przyciskami: drukuj / wyślij mailem */ ?>

            <a href="<?php echo $fb_link; ?>" class="btn btn-fb alignright btn-small" target="_blank" data-ga-action="Udostępnij (obok autora)">
              <div class="i-fb i-fb--small">Udostępnij</div>
            </a>

            <p class="space-x2 relative">
              <?php echo get_avatar( get_the_author_meta('ID'), '32', 'http://nocnasowa.pl/c/i/avatar_v2.png' ); ?>
              Autor: <span itemprop="author"><?php the_author(); ?></span></p>

            <?php
              $sources = get_post_meta($id, 'sources', true);
              if ( '' != $sources ) {
                echo '<h4 class="h4-sources">Źródła:</h4>';
                echo '<ol class="ol-sources">';
                echo $sources;
                echo '</ol>';
              };
            ?>


            <?php

            if ( !( is_single( 'podstawy-jezyka-norweskiego' ) ) ) {
              $related_cats = get_the_category( $id );
              $related_cat = $related_cats[0]->slug;

              $related = get_post_meta( $id, 'related', true );

              if ( '' != $related ) {
                $related_array = explode(",", $related);

                $related_args = array(
                  'post_name__in' => $related_array,
                  'orderby' => 'rand',
                );
              }
              else {
                $related_args = array(
                  'category_name' => $related_cat,
                  'orderby' => 'rand',
                  'post__not_in' => array( $id ),
                  'numberposts' => '1'
                );
              }

              if ( ( 'metody' == $related_cat ) && ( '' == $related ) ) {
                $related_posts = null;
              } else {
                $related_posts = get_posts( $related_args );
              };

              if ( count($related_posts) > 0 ) {
                echo '<p>Jeśli podobał Ci się ten artykuł, sprawdź jeszcze:';
                foreach( $related_posts as $post ) :
                  $related_title = strip_tags( get_the_title() );
                  echo '<br /><a href="';
                  the_permalink();
                  echo '" data-ga-action="' . $related_title . '" data-ga-category="Related"><b>';
                  echo $related_title;
                  echo '</b></a>';
                endforeach;
                wp_reset_query();
                wp_reset_postdata();
                echo '</p>';
              }
            }

            ?>
          </div>
        </div>
      </footer>

    </section>


    <?php include( 'includes/sidebar-bottom.php' ); ?>


    <section id="comments" class="section-content section-comments">
      <div class="row">
        <div class="main-column space-x4">

          <?php
            $fbresponse = get_post_meta($id, 'facebook', true);
            if ( '' != $fbresponse ) {
              echo '<p>Cenne uwagi z Facebooka:</p>';
              echo '<blockquote class="long space-x4">';
              echo $fbresponse;
              echo '</blockquote>';
            }
          ?>
          <?php comments_template('', true); ?>

        </div>

        <?php if (10 <= $post->comment_count) { ?>
          <div class="main-column centered space-x8"><a class="btn btn-green btn-s-4" href="#comments" data-ga-action="Dołącz do dyskusji">Dołącz do dyskusji &uarr;</a></div>
        <?php }; ?>

        <div class="like main-column">
          <p>Z Nocną Sową na <a href="http://www.facebook.com/NocnaSowaPL" target="_blank">Facebooku</a> zawsze raźniej:</p>
          <?php include( 'includes/footer-fb.php' ); ?>
        </div>

      </div>
    </section>


  <?php endwhile; endif; ?>

</article>

<?php include( 'includes/footer.php' ); ?>

</body>
</html>