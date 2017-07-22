<?php
//
// Includes – Head
//


?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <title itemprop="name"><?php wp_title(' ', true, 'right'); ?>| Las</title>

  <link href="<?php echo get_permalink( $id ); ?>" rel="canonical" />

  <?php include( '/c/w/themes/nocnasowa_theme/includes/header-meta.php' ); ?>
  <link rel="stylesheet" type="text/css" href="<?php ns_auto_ver('/c/las.css'); ?>" />
</head>

<body>
<script src="//cdn.jsdelivr.net/velocity/1.4.1/velocity.min.js"></script>
<script src="<?php ns_auto_ver('/c/j-las-min.js'); ?>"></script>

<div id="loader" class="las-loader">

  <div class="tree-wrapper">

    <div class="tree tree--left">
      <div class="tree__bottom"></div>
      <div class="tree__branch tree__branch--one">
        <div class="tree__branch tree__branch--two">
          <div class="tree__branch tree__branch--three"></div>
        </div>
      </div>
    </div>

    <div class="tree tree--right">
      <div class="tree__bottom"></div>
      <div class="tree__branch tree__branch--one">
        <div class="tree__branch tree__branch--two">
          <div class="tree__branch tree__branch--three"></div>
        </div>
      </div>
    </div>

    <div class="tree tree--front">
      <div class="tree__bottom"></div>
      <div class="tree__branch tree__branch--one">
        <div class="tree__branch tree__branch--two">
          <div class="tree__branch tree__branch--three"></div>
        </div>
      </div>
    </div>

    <div class="tree-land"></div>

    <div class="tree-wind"></div>
    <div class="tree-wind tree-wind--two"></div>

  </div>

</div>

<div id="las-nav" class="section-white header-top header-top--shadowed header-top--fixed">
  <div class="section-nav" style="position: relative;">
    <span class="btn btn-nav navbar-logo--centered navbar-logo--las">Las</span>


    <?php
    if ( $user_char ) {
      ?>
      <nav class="section-white" style="width:100%;">
        <ul class="navbar__list">
          <?php
            if ( !is_page('szlak') ) {
          ?>
                   <li><a id="las-nav-btn-szlak" href="/las/szlak/" class="btn btn-dark-outline btn-nav">Twój Szlak
          </a></li>
          <?php
            }
          ?>

          <li><div id="las-nav-char" class="btn btn-dark-outline btn-nav alignright las-nav-char--active">
                <div class="las-nav-char__img">
                  <i class="las-nav-char__img-i" style="background-image:url('<?php echo $user_img_url; ?>');"></i>
                </div>
                <?php echo $user_nick; ?>

                <div id="las-nav-char-extra" class="las-nav-char-extra">
                  <svg class="emojione-svg emojione-svg--size-1"><use xlink:href="/las/c/i/emojione.sprites.svg#emoji-1f333"></use></svg>
                </div>

                <div id="las-nav-char-log" class="las-nav-char-log">
                  <div class="profile-level profile-level--small space">
                    <div class="profile-level__line" style="width:<?php echo las_get_level_percent( $user_exp, $level_array ); ?>"></div>
                    <span class="relative"><?php echo 'Rang ' . $level_array[0]; ?></span>
                  </div>

                  <a href="/las/profil/" class="btn btn-white btn-block">Twój bohater</a>

                  <a href="/las/konto/" class="btn btn-white btn-block">Twoje konto</a>
                </div>

                <div id="las-nav-char-exp" class="las-nav-char-exp">20</div>


          </div></li>
        </ul>
      </nav>





    <?php
    }
    ?>

  </div>
</div>