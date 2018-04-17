<?php
//
//  Includes – Blog Submenu
//
//  Shows links to chosen sections
//


//
//  No spaces
//  inline-block here
?>
<div class="section-submenu">
  <nav class="section-nav navbar-submenu">
    <ul id="navbar-submenu__list" class="navbar__list navbar-submenu__list">
               <li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_home() ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/">Nowe
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'metody' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/metody/">Metody
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'czasy' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/czasy/">Czasy
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'rzeczownik' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/rzeczownik/">Rzeczownik
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'szyk-zdania' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/szyk-zdania/">Szyk zdania
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'przymiotnik' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/przymiotnik/">Przymiotnik
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'pisanie' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/pisanie/">Pisanie
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'sluchanie' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/sluchanie/">Słuchanie
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'czytanie' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/czytanie/">Czytanie
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'dialogi' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/dialogi/">Dialogi
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'zaimek' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/zaimek/">Zaimek
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'przyimek' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/przyimek/">Przyimek
      </a></li><li><a data-ga-category="Blog Submenu" class="btn btn-nav navbar-submenu__btn <?php if ( is_tag( 'przyslowek' ) ) { echo 'navbar-submenu__btn--active'; } ?>" href="/blog/przyslowek/">Przysłówek
      </a></li><li><button id="js-submenu-toggle" class="btn btn-nav navbar-submenu__btn navbar-submenu__btn--arr" role="button"></button></li>
    </ul>
  </nav>
</div>