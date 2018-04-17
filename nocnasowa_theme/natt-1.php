<?php
/*
Template Name: Natt 1
*/


// Mailchimp list number of members
include($_SERVER['DOCUMENT_ROOT'].'/api/list.php');

// ID
global $post;
$id = $post->ID;

// Title
$title = ns_get_clean_title();

// if comes from Newsletter, set cookie
include( 'includes/set-cookie.php' );

?>
<!DOCTYPE html>
<html id="top" lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/Article">
<head>
	<title><?php echo $title; ?> | Nocna Sowa</title>

	<?php include( 'includes/header-meta.php' ); ?>

	<link href="<?php echo get_permalink( $id ); ?>" rel="canonical" />

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

<main role="main" <?php post_class("group"); ?> id="post-<?php the_ID(); ?>">

	<div class="section-trans img-natt">

		<header class="section-content section-8-6 centered">
			<h1 itemprop="name" class="size-6 space-x2">
				<span class="space block">Natt 1</span>
				<span class="size-3 block">Interaktywny podręcznik do nauki norweskiego.</span>
			</h1>
		</header>

	</div>

	<div class="section-content">
		<div class="row">
			<div class="p-10 p-center">

				<?php /* <h2 class="size-3">Start już za <span id="clock"></span>.</h2> */ ?>

				<p class="intro centered">Pracujemy nad nowym projektem.</p>

				<p>Chcemy stworzyć podręcznik na miarę naszych czasów: nowoczesny, dynamiczny i skuteczny. Gdzie nie będziesz biernym czytelnikiem. Gdzie będziesz miał wpływ na przebieg akcji, historie bohaterów i&nbsp;z&nbsp;przyjemnością odkrywał piękno języka norweskiego.</p>


				<p class="space-x2">To dopiero początek. Jeśli chcesz być na bieżąco z projektem, dołącz do listy <abbr title="Very Important Person">VIP</abbr>ów:</p>

				<form class="form-100 col-6 centered" action="//nocnasowa.us5.list-manage.com/subscribe/post?u=22ba8148ec2af7aa74a3d7151&amp;id=1512c830fd" method="post" name="mc-embedded-subscribe-form" target="_blank">
					<label for="mce-TEXT">Twoje imię:</label>
					<input id="mce-TEXT" type="text" value="" name="FNAME" required autocorrect="off">
					<label for="mce-EMAIL">Adres email:</label>
					<input id="mce-EMAIL" type="email" value="" name="EMAIL" required autocapitalize="off" autocorrect="off">
					<div class="hidden-input">
				    <input type="hidden" value="Natt 1" name="FORM">
				    <?php /* Bot protection: */ ?>
				    <input type="text" name="b_22ba8148ec2af7aa74a3d7151_1512c830fd" tabindex="-1" value="">
				  </div>
					<button type="submit" class="btn btn-blue btn-s-2" name="subscribe" onClick="ga('send', 'event', 'Submit', 'Dowiedz się pierwszy o starcie', 'Natt 1');">Dowiedz się pierwszy o starcie</button>

					<span class="note">(Obiecujemy wysyłać tylko super przydatne maile.)</span>
				</form>

				<p>Co otrzymasz?</p>

				<ul>
					<li>Poinformujemy Cię o przebiegu prac i starcie <i>Natt 1</i>.</li>
					<li>Będziesz miał wpływ na tworzenie fabuły i dobór ćwiczeń.</li>
					<li>Tylko zapisane osoby będą miały możliwość otrzymania wczesnego dostępu i testowania podręcznika w wersji beta.</li>
				</ul>

			</div>
		</div>
	</div>

</main>

<?php include( 'includes/footer.php' ); ?>
</body>
</html>