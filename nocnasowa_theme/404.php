<?php
/*
404
*/

?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Łoo! Ale poleciałeś | Nocna Sowa</title>

	<meta name="robots" content="noindex, follow">

 <?php include( 'includes/header-meta.php' ); ?>
</head>

<body>

<?php include( 'includes/header.php' ); ?>


<div class="section-content">

	<img class="error" src="/c/i/404.jpg" />

	<h1 class="space-x2 centered">Łoo! No to poleciałeś...</h1>

	<div class="row">
		<div class="col-8 center">
			<p><b>Wracaj do najlepszych treści:</b></p>

			<ul class="e-best">
				<?php
					$posts = new WP_Query('&posts_per_page=5');
					while ($posts->have_posts()) : $posts->the_post();
						echo '<li><a href="';
						the_permalink();
						echo '">';
						the_title();
						echo '</a></li>';
					endwhile;
				?>
			</ul>

			<p>Błąd 404. Oznacza to, że strona o podanym adresie nie istnieje. Sprawdź czy wpisany adres jest poprawny.</p>
		</div>

	</div>

</div>

<?php

include( 'includes/sidebar-bottom.php' );

include( 'includes/footer.php' );

?>
</body>
</html>