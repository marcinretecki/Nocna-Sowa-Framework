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

  <?php include( $source_url . 'includes/header-meta.php' ); ?>
  <link rel="stylesheet" type="text/css" href="<?php autoVer('/c/las.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php autoVer('/c/chat-bot-rzeczownik.css'); ?>" />
</head>

<body>
<script>
var lasChapter = "<?php echo $post->post_name; ?>";
</script>
<script src="//cdn.jsdelivr.net/velocity/1.4.0/velocity.min.js"></script>
<script src="<?php autoVer('/c/j-min.js'); ?>"></script>
<script src="<?php autoVer('/c/j-las-min.js'); ?>"></script>


<?php if ( !is_front_page() && !is_home() ) { ?>
<div class="section-white header-top header-top--shadowed header-top--fixed">
  <div class="section-nav">
    <span class="btn btn-nav navbar-logo--centered">//</span>



    <nav class="section-white" style="width:100%;">
      <ul class="nabar__list alignright">
                 <li><a href="../" class="btn btn-dark-outline btn-nav">SOS
        </a></li>
      </ul>

      <?php if ( !is_page('szlak') ) { ?>

      <ul class="navbar__list">
                 <li><a href="/szlak/" class="btn btn-dark-outline btn-nav">&laquo; Twój Szlak
        </a></li>
      </ul>
      <?php } ?>
    </nav>

  </div>
</div>
<?php };