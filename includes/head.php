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
  <div class="section-nav">
    <span class="btn btn-nav navbar-logo--centered navbar-logo--las">Las</span>


    <?php
    if ( $user_char ) {
      if ( !is_page('szlak') ) {
      ?>
      <nav class="section-white" style="width:100%;">
        <?php if ( !is_page('profil') ) { ?>
        <ul class="nabar__list alignright">
                   <li><a id="las-nav-btn-sos" href="#" class="btn btn-dark-outline btn-nav">SOS
          </a></li>
        </ul>
        <?php } ?>

        <ul class="navbar__list">
                   <li><a id="las-nav-btn-szlak" href="/las/szlak/" class="btn btn-dark-outline btn-nav">&laquo; Twój Szlak
          </a></li>
        </ul>
      </nav>
      <?php } else { ?>
      <nav class="section-white" style="width:100%;">
        <ul class="navbar__list">
                   <li><a href="/las/profil/" class="btn btn-dark-outline btn-nav">
                          <div class="las-nav-user-img" style="">
                            <i class="las-nav-user-img__i" style="background-image:url('<?php echo $user_img_url; ?>');"></i>
                          </div>
                          <?php echo $user_nick; ?>
          </a></li>
        </ul>
      </nav>

    <?php
      }
    }
    ?>

  </div>
</div>