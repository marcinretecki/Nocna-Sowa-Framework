<?php

function headerWarsztatyNavClassAdd($el) {
  $arr = [
    'btn' => '',
    'div' => 'header-top--hidden'
  ];

  if ( is_page('Pytania i odpowiedzi o Warsztatach norweskiego w Oslo') ) {
    $arr['btn'] = 'btn-dark-outline--active';
    $arr['div'] = '';

  }

  if ($el) {
    echo $arr[$el];
  }

}

?>

<div id="headerWarsztatyNav" class="section-white header-top header-top--shadowed header-top--fixed <?php headerWarsztatyNavClassAdd('div') ?>">
  <div class="section-nav">
    <div class="btn btn-nav alignright section-nav__like">
      <iframe src="//www.facebook.com/plugins/like.php?locale=pl_PL&amp;href=http%3A%2F%2Fnocnasowa.pl%2Fkurs-norweskiego-oslo%2F&amp;width=114&amp;height=20&amp;share=false&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId=110154605804697" scrolling="no" frameborder="0" style="border:none;overflow:hidden;width:124px;height:20px;display:block" allowTransparency="true"></iframe>
    </div>

    <button class="btn btn-dark-outline btn-nav section-nav__toggle js-open-nav" data-open-target="navWarsztaty" data-ga-category="Header Warsztaty Nav" data-ga-action="Nav Open">Warsztaty <span class="i-menu"></span></button>

    <nav id="navWarsztaty" class="navbar section-white">
      <ul class="navbar__list" data-gumshoe>
                 <li><a href="/kurs-norweskiego-oslo/#metody" class="btn btn-dark-outline btn-nav">Aktywne Metody
        </a></li><li><a href="/kurs-norweskiego-oslo/#kto" class="btn btn-dark-outline btn-nav">Prowadzący
        </a></li><li><a href="/kurs-norweskiego-oslo/#filozofia" class="btn btn-dark-outline btn-nav">Filozofia
        </a></li><li><a href="/kurs-norweskiego-oslo/#mapa" class="btn btn-dark-outline btn-nav">Adres
        </a></li><li><a href="/kurs-norweskiego-oslo/#grupy" class="btn btn-dark-outline btn-nav">Grupy
        </a></li><li><a href="/kurs-norweskiego-oslo/pytania/"  data-ga-action="Najczęściej zadawane pytania (Nav)" class="btn btn-dark-outline btn-nav <?php headerWarsztatyNavClassAdd('btn') ?>">Pytania
        </a></li>
      </ul>
    </nav>

  </div>
</div>