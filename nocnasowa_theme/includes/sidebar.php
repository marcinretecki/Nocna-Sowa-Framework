<?php include( 'bubble-functions.php' ); ?>

<aside class="aside-main col-5 alignright" id="aside-main">

	<div class="aside-bubble group">
		<span class="aside-sowa"></span>
		<p class="aside-quote">
			<q><?php
				if ( check_date_aside() ) {
					echo 'Ha en morsom og fargeglad Aprilsnarr!';
				} else {
					array_mt_rand( $bubble );
				}
			?></q>
			<span class="aside-quote-triangle"></span>
		</p>
	</div>

		<div class="aside-newsletter">
			<div class="aside-newsletter-top">
				<p class="aside-h">Bądź na bieżąco!</p>
				<p class="aside-sub">Darmowy Newsletter już frunie na Twoją skrzynkę.</p>
			</div>
			<form class="aside-newsletter-bottom" action="http://nocnasowa.us5.list-manage2.com/subscribe/post?u=22ba8148ec2af7aa74a3d7151&amp;id=5fe255c367" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
				<div class="aside-newsletter-fields">
					<label for="mce-TEXT">Imię</label>
					<input type="text" value="" name="FNAME" id="mce-TEXT" placeholder="Imię" required>
					<label for="mce-EMAIL">Email</label>
					<input type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder="Adres email" required>
					<div class="hidden-input">
            <input type="hidden" value="aside" name="FORM">
            <input class="hidden-input" type="checkbox" value="1" name="group[17321][4]" checked="">
          </div>
					<input type="submit" value="Zapisz się za darmo" name="subscribe" id="mc-embedded-subscribe" onClick="ga('send', 'event', 'Submit', 'Zapisz się za darmo (Aside)', '<?php echo wp_title('', true, 'right'); ?>');">
					<span class="note">100% prywatności. Nie spamujemy. W każdej chwili możesz zrezygnować.</span>
				</div>
				<ul>
					<li>Mamy dla Ciebie Szybki Start, żeby łatwiej się zadomowić.</li>
					<li>Pomożemy Ci uczyć się systematycznie.</li>
					<li>Raz w miesiącu otrzymasz świeżą dawkę inspiracji do nauki.</li>
				</ul>
			</form>
		</div>

</aside>
