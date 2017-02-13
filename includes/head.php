<?php
//
// Includes – Head
//


//
//  Update user meta
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
<script src="//cdn.jsdelivr.net/velocity/1.4.0/velocity.min.js"></script>
<script src="<?php ns_auto_ver('/c/j-min.js'); ?>"></script>
<script src="<?php ns_auto_ver('/c/j-las-min.js'); ?>"></script>


<?php if ( !is_front_page() && !is_home() ) { ?>

<?php
  //  Loader
?>
<div id="loader" class="las-loader" style="position:fixed;left:0;top:0;right:0;bottom:0;background:#000;z-index:1000"></div>

<div id="las-nav" class="section-white header-top header-top--shadowed header-top--fixed">
  <div class="section-nav">
    <span class="btn btn-nav navbar-logo--centered navbar-logo--las">Las</span>


    <?php if ( !is_page('szlak') ) { ?>
    <nav class="section-white" style="width:100%;">
      <ul class="nabar__list alignright">
                 <li><a id="las-nav-btn-sos" href="../" class="btn btn-dark-outline btn-nav">SOS
        </a></li>
      </ul>

      <ul class="navbar__list">
                 <li><a id="las-nav-btn-szlak" href="/las/szlak/" class="btn btn-dark-outline btn-nav">&laquo; Twój Szlak
        </a></li>
      </ul>
    </nav>
    <?php } ?>

  </div>
</div>
<?php };