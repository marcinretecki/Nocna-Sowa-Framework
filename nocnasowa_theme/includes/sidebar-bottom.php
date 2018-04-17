<?php
//
//  Includes – Set Cookie
//

if ( !isset( $_COOKIE['nocnasowa_from_newsletter'] ) ) { ?>
<aside class="section-trans img-skog">
  <div class="section-content section-aside-bottom centered">
    <h2 class="section-h-thin size-4">Dołącz do Nocnej&nbsp;Sowy</h2>
    <p>Rozwijaj swój norweski kreatywnie i przyjemnie. Już tysiące osób dołączyło.</p>

    <form class="aside-main-form" action="http://nocnasowa.us5.list-manage2.com/subscribe/post?u=22ba8148ec2af7aa74a3d7151&amp;id=5fe255c367" method="post" name="mc-embedded-subscribe-form" target="_blank">
      <input type="text" value="" placeholder="Twoje imię" name="FNAME" id="mce-TEXT" required autocorrect="off"><input type="email" value="" placeholder="Adres email" name="EMAIL" id="mce-EMAIL" required autocapitalize="off" autocorrect="off"><button class="btn btn-blue btn-s-2" type="submit" name="subscribe" id="mc-embedded-subscribe" onClick="ga('send', 'event', 'Submit', 'Zapisz się za darmo (Bottom)', '<?php echo wp_title('', true, 'right'); ?>');">Zapisz się za darmo</button>

      <div class="hidden-input">
        <input type="hidden" value="aside-bottom" name="FORM">
        <input class="hidden-input" type="checkbox" value="1" name="group[17321][4]" checked="">
        <?php /* Bot protection: */ ?>
        <input type="text" name="b_22ba8148ec2af7aa74a3d7151_1512c830fd" tabindex="-1" value="">
      </div>
    </form>
    <p class="size-0 no-margin">Nie jesteś przekonany? <a href="/newsletter/" class="a-light" data-ga-action="Dowiedz się więcej (o newsletterze)">Dowiedz się więcej &raquo;</a></p>

  </div>
</aside>
<?php } else {} ?>