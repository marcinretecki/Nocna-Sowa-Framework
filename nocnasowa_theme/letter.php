<?php
/*
Template Name: Letter Style
*/


// ID
global $post;
$id = $post->ID;

// Title
$title = ns_get_clean_title();
?>
<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/Article">
<head>
  <title><?php if ( '' != $title ) { echo $title; } else { wp_title('', true, 'right'); }; ?> | Nocna Sowa</title>

  <?php include( 'includes/header-meta.php' ); ?>

  <?php $robots = get_post_meta($id, 'robots', true); ?>
  <?php if ( 'noindex' == $robots ) { ?><meta name="robots" content="noindex, follow"><?php }; ?>

  <link href="<?php the_permalink(); ?>" rel="canonical" />
</head>

<body>

<?php include( 'includes/header.php' ); ?>


  <section class="section-beige section-6-4">

    <?php if ( 'krok-3' == $post->post_name ) { ?>
      <h2 class="centered no-margin">Warsztaty pisania</h2>
      <p class="space-x2 centered"><i>Zadanie #3</i></p>
    <?php } ?>

    <div class="section-content white l-stamped">

      <article class="col-10 center">
        <?php
          if ( have_posts() ) : while ( have_posts() ) : the_post();

            if ( 'newsletter' != $post->post_name ) {
              echo '<h1 class="section-h-thin">';
              the_title();
              echo '</h1>';
            }

          the_content();

          endwhile; endif;
        ?>
      </article>

    </div>

    <?php if ( 'newsletter' != $post->post_name ) { ?>

      <div class="section-content">

        <div class="col-10 center">
          <p>Z Nocną Sową na <a href="http://www.facebook.com/NocnaSowaPL" target="_blank">Facebooku</a> zawsze raźniej:</p>
          <?php include( 'includes/footer-fb.php' ); ?>
        </div>

      </div>
    <?php } ?>

  </section>

<?php include( 'includes/footer.php' ); ?>
</body>
</html>