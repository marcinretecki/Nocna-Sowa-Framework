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
<script src="//cdn.jsdelivr.net/velocity/1.4.2/velocity.min.js"></script>
<script src="<?php ns_auto_ver('/c/j-min.js'); ?>"></script>
<script src="<?php ns_auto_ver('/c/j-las-min.js'); ?>"></script>


<?php

if ( !is_front_page() && !is_home() && is_user_logged_in() ) {

  $user_progress = las_get_user_progress();
  $exp = las_get_user_exp( $user_progress );
  $level_array = las_get_user_level_array( $exp );

  if ( !is_page('szlak-test') ) {
    $user_char = las_get_user_char();
  }

  ?>
  <div id="loader" class="las-loader" style="position:fixed;left:0;top:0;right:0;bottom:0;background:#000;z-index:1000"></div>

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
                     <li><a id="las-nav-btn-sos" href="../" class="btn btn-dark-outline btn-nav">SOS
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
                     <li><a id="las-nav-btn-szlak" href="/las/profil/" class="btn btn-dark-outline btn-nav">
                            <div style="width:2rem;float:left;height:1rem;position:relative;">
                              <i style="position:absolute;left:0;margin-top:-0.25rem;width:1.5rem;height:1.5rem;border-radius:50%;overflow:hidden;display:block;background-image:url('<?php echo las_get_user_profile_img(); ?>');background-size:1.5rem 1.5rem;"></i>
                            </div>
                            Twój Profil
            </a></li>
          </ul>
        </nav>

      <?php
        }
      }
      ?>

    </div>
  </div>
<?php
};