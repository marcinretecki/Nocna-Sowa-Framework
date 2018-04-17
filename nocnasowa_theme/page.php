<?php
/*
Page
*/


// ID
global $post;
$id = $post->ID;


// Title
$title = ns_get_clean_title();


// if comes from Newsletter, set cookie
include( 'includes/set-cookie.php' );

?>
<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/Article">
<head>
	<?php  ?>
	<title><?php if ( '' != $title ) { echo $title; } else { wp_title('', true, 'right'); }; ?> | Nocna Sowa</title>

	<?php include( 'includes/header-meta.php' ); ?>

	<link href="<?php echo get_permalink( $id ); ?>" rel="canonical" />

	<meta property="og:type" content="article" />
	<?php
		$description = get_post_meta($id, 'description', true);
		if ( '' != $description ) { ?>
			<meta name="description" itemprop="description" content="<?php echo $description; ?>" />
	<?php }; ?>

	<?php // Facebook og: ?>
	<meta property="og:title" content="<?php if ( '' != $title ) { echo $title; } else { wp_title('', true, 'right'); }; ?>" />
	<meta property="og:site_name" content="Twój wieczorny kurs języka norweskiego | Nocna Sowa" />

	<?php
		$robots = get_post_meta($id, 'robots', true);
		if ( 'noindex' == $robots ) { ?>
			<meta name="robots" content="noindex, follow">
	<?php }; ?>
</head>

<body>

<?php include( 'includes/header.php' ); ?>

<article>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<section role="main" itemprop="articleBody">

			<div class="section-blue">
				<header class="section-content section-8-6 centered">
					<h1 itemprop="name" class="no-margin"><?php the_title(); ?></h1>
				</header>
			</div>

			<div class="section-content section-2-2">
				<div class="row">
					<div class="p-10 p-center">
						<?php the_content(); ?>
					</div>
				</div>
		</section>

	<?php endwhile; endif; ?>

	<?php include( 'includes/sidebar-bottom.php' ); ?>

</article>

<?php include( 'includes/footer.php' ); ?>
</body>
</html>