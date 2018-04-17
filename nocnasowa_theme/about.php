<?php
/*
Template Name: About
*/


// ID
global $post;
$id = $post->ID;

// Title
$title = 'O Nocnej Sowie';

?>
<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/AboutPage">
<head>
	<title itemprop="name"><?php echo $title; ?></title>

	<?php include( 'includes/header-meta.php' ); ?>

	<link href="<?php the_permalink(); ?>" rel="canonical" />

	<?php
		$description = get_post_meta($id, 'description', true);
		if ( '' != $description ) { ?>
			<meta name="description" itemprop="description" content="<?php echo $description; ?>" />
	<?php }; ?>

	<?php // Facebook og: ?>
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:site_name" content="Twój wieczorny kurs języka norweskiego | Nocna Sowa" />
	<meta property="og:image" content="http://nocnasowa.pl/c/i/sowa_fb_thumb.jpg" />
</head>

<body>

<?php include( 'includes/header.php' ); ?>



<main role="main">

	<header class="section-content section-8-4">
		<h1 class="centered space-x2">Czy jesteś gotowy<br />na norweską przygodę?</h1>

		<div class="row">
			<p class="col-11 center centered no-margin">Stworzyliśmy Nocną Sowę dla osób, które cenią skandynawski spokój, czerpią radość z nauki norweskiego i są otwarte na nowe wyzwania.</p>
		</div>
	</header>


	<section class="section-content">

		<h2 class="size-3 centered space-x2">Kim jesteśmy?</h2>

		<figure class="row space-x4">

			<div class="col col-8">
				<img class="block" src="/c/i/about_marcin.jpg" />
				<div>
					<figcaption class="centered space">
						<small class="size-1">Marcin</small><br />
						&#109;&#97;&#114;&#99;&#105;&#110;&#64;&#110;&#111;&#99;&#110;&#97;&#115;&#111;&#119;&#97;&#46;&#112;&#108;
					</figcaption>
				</div>
			</div>

			<div class="col-8">
				<blockquote class="long">
					<p>Jestem filologiem norweskim. Zaraz po studiach zajmowałem się tłumaczeniami ustnymi i pisemnymi <span class="no-break">w branży</span> elektro&shy;energetycznej. Później studiowałem literaturę norweską na Uniwersytecie w Oslo. Chociaż na co dzień już się tym nie zajmuję, to mogę śmiało powiedzieć, że <span class="no-break">te studia</span> były miejscem ogromnej inspiracji i jednym <span class="no-break">z ciekawszych</span> doświadczeń w moim życiu.</p>
					<p>Przez te kilka lat zajmowałem się także nauczaniem norweskiego. Wystarczająco długo, by stwierdzić, że każdy może nauczyć się tego języka, jeśli tylko znajdzie czas <span class="no-break">i chęci</span>.</p>
					<p>Kiedy tylko mam wolną chwilę programuję aplikacje internetowe <span class="no-break">i uczę</span> się kolejnych języków programowania. Uwielbiam dobry, funkcjonalny design, fotografię oraz sushi.</p>
				</blockquote>
			</div>
		</figure>

		<figure class="row no-margin">
			<div class="col col-8">
				<img class="block" src="/c/i/about_marta.jpg" />
				<div>
					<figcaption class="centered space">
						<small class="size-1">Marta</small><br />
						&#109;&#97;&#114;&#116;&#97;&#64;&#110;&#111;&#99;&#110;&#97;&#115;&#111;&#119;&#97;&#46;&#112;&#108;
					</figcaption>
				</div>
			</div>


			<div class="col-8">
				<blockquote class="long">
					<p>Skończyłam Inżynierię Środowiska, ale zamiast specja&shy;lizować się w projektowaniu, zapragnęłam na chwilę bardziej kreatywnych rzeczy – i tak już zostało. </p>
					<p>Kilka lat poświęciłam na koordynację projektów edukacyjnych. Wiele z nich tworzyłam od podstaw, inne kontrolowałam. Prowadziłam szkolenia i warsztaty dotyczące aktywnych metod edukacji. Byłam doradcą, ale jednocześnie sporo czasu poświęcałam na rozwijanie siebie, w tym języka norweskiego.</p>
					<p>Cenię ludzi z pasją, szczególnie tych szczerych <span class="no-break">i ambitnych</span>. Uwielbiam Taiji, spacery po Oslo o każdej porze dnia lub nocy, czas na dobrą książkę lub film – chętnie skandynawski lub azjatycki.</p>
				</blockquote>

			</div>
		</figure>

	</section>

	<section class="section-content">

		<div class="row">
			<div class="p-10 p-center">

				<h2 class="section-h-thin centered">Dlaczego Nocna Sowa?</h2>
				<p class="intro centered space-x2">By nocami odkrywać swoje nowe pasje.</p>

				<p>Nocna Sowa powstała w 2012 roku jako wieczorny kurs norweskiego. Taki, który realizujesz po długim dniu pracy, albo kiedy potrzebujesz dodatkowych materiałów do intensywnej nauki. Szybko okazało się, że dla wielu to kurs wiodący, uczący przede wszystkim samodzielności.</p>

				<p>Rozumiemy, że wiele osób ma ograniczony czas. Szanujemy to. Przygotowując materiały do nauki skupiamy się na najpotrzebniejszych zagadnieniach <span class="no-break">i tłumaczymy</span> je najprościej, jak to tylko możliwe. Uważamy, że brak czasu nie jest przeszkodą <span class="no-break">w nauce</span> języka. Jeśli masz wystarczająco dużo chęci, to nie ma takiej siły, która by Cię powstrzymała przed rozwijaniem swoich zainteresowań.</p>


				<h2 class="size-3 centered">Nie opowiadamy bajek</h2>

				<p>Nie stworzyliśmy tego miejsca, by sprzedać Ci jakąś tajemniczą metodę nauki na skróty, bo wiemy, że taka nie istnieje. </p>

				<p>Oficjalnie sprzeciwiamy się <a href="/bariery-w-nauce-jezyka/">mitom o nauce języków</a>, które skutecznie krzywdzą ludzi – zabijają ich zapał do nauki i podcinają skrzydła.</p>

				<p>Walczymy z <a href="/czego-cie-nauczyli-w-szkole/">przestarzałym systemem nauczania</a> <span class="no-break">i pokazujemy,</span> że można inaczej <span class="no-break">– po swojemu,</span> z pasją, bez nudnych podręczników.</p>


				<h2 class="size-3 centered">Dzielimy się tym, co nas fascynuje</h2>

				<p>Książki i filmy po norwesku są wspaniałym narzędziem do nauki. Pozwalają na kontakt <span class="no-break">z żywym</span> językiem i odcięcie się od szkolnego schematu myślenia, który podpowiada: wciąż jest za wcześnie.</p>

				<p>Na blogu pomagamy odkryć pierwszą <a href="/ksiazki-po-norwesku/" title="Książki po norwesku">książkę</a>, <a href="/czytanie-norweskiej-prasy/" title="Norweska prasa, gazety">gazetę</a>, ulubiony <a href="do-sluchania-po-norwesku/" title="Podcasty i audycje po norwesku">podcast</a> oraz <a href="/norweskie-filmy/" title="Norweskie filmy">film</a>. To zwykle przełomowy moment <span class="no-break">w podejściu</span> do nauki <span class="no-break">i najciekawsza</span> droga do zrozumienia norweskiej kultury.</p>


				<h2 class="size-3 centered">Razem tworzymy to miejsce</h2>

				<p>Nocna Sowa to już nie tylko dwójka pasjonatów. To także osoby, które przygotowują z&nbsp;nami wpisy na bloga, jak Sara Foit, czy tworzą ilustracje, jak Magdalena Piłaszewicz. To Ci, którzy wysyłają nam <a href="/spacer-po-norwegii/">zdjęcia z napisami po norwesku</a>, by inni też mogli się czegoś nowego nauczyć.</p>

				<p>Być może to także Ty, który dzielisz się <a href="/niewidzialne-scenariusze/" title="Ukryte scenariusze">przemyśleniami</a> <span class="no-break">i wiedzą</span> <span class="no-break">w komentarzach</span> lub mailach <span class="no-break">i tym</span> samym nadajesz kierunek rozwoju tej strony.</p>

				<p>Jesteśmy dumni ze wszystkich, którzy rozwijając siebie przyczyniają się do budowania pozytywnego wizerunku Polaków w Norwegii.</p>

				<p>Dziękujemy, że jesteś <span class="no-break">z nami</span>.</p>


				<h2 class="size-3 centered">Chcesz do nas dołączyć?</h2>

				<p class="space-x2">O wszystkich aktualnościach, nowych artykułach <span class="no-break">i ćwiczeniach</span> dowiesz się z naszego Newslettera. Są to regularne maile, które Cię zmotywują <span class="no-break">i dadzą</span> radość <span class="no-break">z odkrywania</span> norweskiego.</p>

				<div class="centered space-x4">
					<a class="btn btn-blue btn-s-4 space" href="/newsletter/" title="Darmowy newsletter o języku norweskim">Dołącz do Newslettera</a>
				</div>

			</div>

		</div>

	</section>

</main>

<?php include( 'includes/footer.php' ); ?>
</body>
</html>