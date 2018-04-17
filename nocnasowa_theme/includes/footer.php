<?php
function warsztatyNavClassAdd( $el ) {
  if ( ( $el === 'section') && is_page( array('treningi', 'warsztaty-pisania', 'kurs-norweskiego-oslo/pytania') )) {
    echo 'section-white';
  }
  else {
    echo 'section-beige';
  }
}

?>

<section id="warsztatyNav" class="section <?php warsztatyNavClassAdd( 'section' ); ?>">
  <div class="section-content">
    <div class="row">
      <div class="max-45">
        <div class="col-8">
          <a class="rounded footer-warsztaty-nav footer-warsztaty-nav--oslo" href="/kurs-norweskiego-oslo/">
            <div class="footer-warsztaty-nav__title">
              <div class="centered">
                <h4 class="h1 size-3">Warsztaty w Oslo</h4>
                <p class="p-short space-0">Intensywne kursy języka norweskiego <span class="no-break">w Oslo.</span></p>
                <span class="footer-warsztaty-nav__arrow">&raquo;</span>
              </div>
            </div>
          </a>
        </div>

        <div class="col-8">
          <a class="rounded footer-warsztaty-nav footer-warsztaty-nav--treningi" href="/kurs-norweskiego-oslo/treningi/">
            <div class="footer-warsztaty-nav__title">
              <div class="centered">
                <h4 class="h1 size-3">Treningi</h4>
                <p class="p-short space-0">Utrzymaj motywację do systematycznej pracy nad norweskim.</p>
                <span class="footer-warsztaty-nav__arrow">&raquo;</span>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

  </div>

</section>


<footer id="footer" class="section section-black">
  <div class="section-content">
    <div class="centered" itemprop="publisher" itemscope itemtype="https://schema.org/EducationalOrganization">
      <p class="size-0">&#169; Respektuj prawa autorskie, byśmy dalej mogli pomagać Ci w nauce norweskiego.<br />
      <i>Design &amp; Development:</i> <span itemprop="name">Nocna Sowa</span> | <i>Ilustracje:</i> Magdalena</p>

      <p class="size-0">Tak, używamy cookies: <a class="a-light" href="/polityka-prywatnosci-cookies/" rel="nofollow">Polityka Prywatności</a></p>

      <p class="size-0 space-0"><i>Pisane w Oslo z pasji do języka norweskiego.</i></p>

      <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
        <meta itemprop="url" content="http://nocnasowa.pl/c/i/sowa_fb_thumb.jpg">
        <meta itemprop="width" content="400">
        <meta itemprop="height" content="400">
      </div>

      <link itemprop="sameAs" href="https://www.facebook.com/NocnaSowaPL">
    </div>
  </div>
</footer>

<script src="//cdn.jsdelivr.net/velocity/1.2.3/velocity.min.js"></script>
<script src="<?php ns_auto_ver('/c/j-min.js'); ?>"></script>

