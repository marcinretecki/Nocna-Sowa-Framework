<?php
/*
Template Name: Opinie Single
*/


global $post;
$id = $post->ID;

$args = array(
  'post_type' => 'attachment',
  'numberposts' => -1,
  'post_status' => null,
  'post_parent' => $post->ID,
  'orderby' => 'menu_order',
  'order' => 'ASC'
);
$attachments = get_posts( $args );
?>
<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/Review">
<head>
  <?php $title = get_post_meta($id, 'title', true); ?>
	<title itemprop="name"><?php if ( '' != $title ) { echo $title . ' '; } else { wp_title('', true, 'right'); }; ?>– Opinie uczestników warsztatów</title>

	<link href="<?php echo get_permalink( $post->ID ); ?>" rel="canonical" />

  <?php include( 'includes/header-meta.php' ); ?>

	<?php
    $description = get_post_meta($id, 'description', true);
    if ( '' != $description ) { ?>
      <meta name="description" itemprop="description" content="<?php echo $description; ?>" />
  <?php }; ?>

	<meta itemprop="image" content="<?php
  if ( $attachments ) {
    foreach ( $attachments as $attachment ) {
      $att = wp_get_attachment_image_src( $attachment->ID, 'full' );
      echo esc_html( $att[0] );
      break;
    }
  }
  ?>">

	<?php // Facebook og: ?>
	<meta property="og:site_name" content="Nocna Sowa" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="<?php
  if ( $attachments ) {
    foreach ( $attachments as $attachment ) {
      $att = wp_get_attachment_image_src( $attachment->ID, 'full' );
      echo esc_html( $att[0] );
      break;
    }
  }
  ?>">
</head>

<body>

<?php include( 'includes/header.php' ); ?>

<article>

  <section class="section-beige">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="section-content section-6-4">
      <div class="recommends-single">

        <h2 class="section-h-thin centered space-x2">Co mówią o Warsztatach?</h2>

        <div class="row">
          <div class="alignleft">
            <?php
              if ( $attachments ) {
                foreach ( $attachments as $attachment ) {
                  $att = wp_get_attachment_image_src( $attachment->ID, 'full' );
                  echo '<img class="recommends-single-img" src="' . esc_html( $att[0] ) . '" />';
                }
              }
            ?>
          </div>

          <div class="recommends-single_text">
            <h1 class="centered recommends-h" itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?php the_title(); ?></span></h1>
            <blockquote itemprop="reviewBody" class="recommends-quote space-x2"><?php the_content(); ?></blockquote>

            <div class="centered"><a href="/opinie/">&laquo; Przeczytaj inne opinie</a></div>
          </div>


        </div>

      </div>
    </div>

    <?php endwhile; endif; // end the loop ?>
  </section>

</article>

<?php include( 'includes/footer.php' ); ?>

</body>
</html>