<?php
/*
Template Name: Newsletter
*/


// Mailchimp list number of members
include($_SERVER['DOCUMENT_ROOT'].'/api/list.php');

// ID
global $post;
$id = $post->ID;

// Title
$title = ns_get_clean_title();

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

	<div class="section-trans img-skog">

		<header class="section-content section-8-6 centered">
			<h1 itemprop="name">
				<span class="space block">Newsletter</span>
				<span class="h2 size-1 block">Naturalna droga do opanowania norweskiego.</span>
			</h1>
		</header>

	</div>

	<div class="section-content">
		<div class="row">
			<div class="p-10 p-center">
				<p class="intro centered">Maile, które Cię zmotywują i dadzą <span class="no-break">radość z odkrywania</span> norweskiego.</p>

				<p>W Newsletterze pokazujemy ciekawe metody uczenia się języków, <span class="no-break">bo chcemy</span> żebyś czerpał przyjemność <span class="no-break">z nauki</span> norweskiego, utrzymał dużą motywację <span class="no-break">i rozwijał</span> siebie.</p>

				<p class="space-x2" id="form-newsletter">Dołącz do ponad <?php echo get_round_no(); ?> kreatywnych osób <span class="no-break">i otrzymuj</span> najlepsze ćwiczenia i artykuły prosto na swojego maila.</p>

				<form class="form-100 main-column max-24" action="http://nocnasowa.us5.list-manage2.com/subscribe/post?u=22ba8148ec2af7aa74a3d7151&amp;id=5fe255c367" method="post" name="mc-embedded-subscribe-form" target="_blank">
					<label for="mce-TEXT">Twoje imię:</label>
					<input id="mce-TEXT" type="text" value="" name="FNAME" required>
					<label for="mce-EMAIL">Adres email:</label>
					<input id="mce-EMAIL" type="email" value="" name="EMAIL" required autocapitalize="off" autocorrect="off">
					<div class="hidden-input">
				    <input type="hidden" value="Newsletter" name="FORM">
				    <input type="checkbox" value="1" name="group[17321][4]" checked="">
				    <?php /* Bot protection: */ ?>
				    <input type="text" name="b_22ba8148ec2af7aa74a3d7151_5fe255c367" tabindex="-1" value="">
				  </div>
					<button type="submit" class="btn btn-blue btn-s-2" name="subscribe" data-ga-category="Submit" data-ga-action="Dołącz za darmo">Dołącz za darmo</button>

					<span class="note">Nie spamujemy. Twój email jest bezpieczny.</span>
				</form>


				<h2 class="size-3">Czego możesz się spodziewać?</h2>

				<p>Na dobry początek podzielimy się z Tobą naszą pasją do norweskiego <span class="no-break">i pokażemy</span> Ci nowoczesne metody nauki języka. Dzięki nim będziesz mógł świadomie zdecydować, co jest dla Ciebie najlepsze.</p>

				<p>Razem szybko przejdziemy przez podstawy, które pomogą Ci <span class="no-break">w swobodnym</span> rozwijaniu kolejnych zagadnień. Wszystkie ćwiczenia tłumaczymy w klarowny i przystępny sposób, a w komentarzach pomagamy sobie nawzajem ze wszystkimi wątpliwościami.</p>

				<p>Na Nocnej Sowie nie zatrzymujemy się na podstawach. Omawiamy kłopotliwe zagadnienia gramatyczne, przeprowadzamy wywiady <span class="no-break">z pasjonującymi</span> Norwegami, dzielimy się filmami i książkami. Możemy Ci towarzyszyć przez cały proces nauki norweskiego.</p>


				<h2 class="size-3">Czy to coś kosztuje?</h2>

				<p>Newsletter piszemy i udostępniamy za darmo. To nie znaczy, że stworzenie go nic nie kosztowało. Przeznaczyliśmy setki godzin, żeby napisać artykuły i przygotować ćwiczenia.</p>

				<p>Zamiast pieniędzy prosimy Cię jednak o coś innego. Wierzymy <span class="no-break">w wolny</span> dostęp do wiedzy, dlatego nie skrywaj Nocnej Sowy tylko dla siebie. Podziel się tą stroną ze znajomymi, którzy uczą się języków (nie tylko norweskiego) – będą Ci wdzięczni.</p>

				<p>Więcej: <a href="/dlaczego-za-darmo/" title="Dlaczego Nocna Sowa jest za darmo?">Dlaczego Nocna Sowa jest za darmo?</a></p>


				<h2 class="size-3">Czy nie zasypiecie mnie spamem?</h2>

				<p>Twój adres email jest bezpieczny. Jak pisaliśmy w naszej Polityce Prywatności, nigdy nikomu nie udostępnimy Twoich danych.</p>


				<h2 class="size-3">A co, jeśli mi się nie spodoba?</h2>

				<p>W każdej chwili możesz zrezygnować. Usuniemy Twój adres <span class="no-break">z naszej</span> listy i nie otrzymasz więcej maili. Jednak wierzymy, że będzie Ci się <span class="no-break">u nas</span> podobało.</p>

				<figure class="figure-quote">
					<blockquote>
						<p>Jeśli chcesz gdzieś dojść, najlepiej znajdź kogoś, kto już tam doszedł.</p>
					</blockquote>
					<figcaption>Robert Kiyosaki</figcaption>
				</figure>

				<div class="centered space-x4">
					<label for="mce-TEXT" class="btn btn-green btn-s-4" onClick="smoothScrollTo('form-newsletter');">Dołącz teraz &uarr;</label>
				</div>


			</div>
		</div>
	</div>

</main>

<a id="bottom"></a>

<?php include( 'includes/footer.php' ); ?>

<script>
window.addEventListener('load', function() {
function bottomEvent() {
  var bottom = document.getElementById('bottom');
  if( isScrolledIntoView( bottom ) ) {
    //_gaq.push(['_trackEvent', 'Scroll', 'Content Bottom', '<?php wp_title('', true, 'right'); ?>']);
    console.log('Comments');
    window.removeEventListener('scroll', commentsEvent, false);
  }
}
window.addEventListener('scroll', bottomEvent, false);
}, false);
</script>
</body>
</html>