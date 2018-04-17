<?php
/*
Template Name: Chat Bot Rzeczownik
*/


// ID
global $post;
$id = $post->ID;

// if comes from Newsletter, set cookie
include( 'includes/set-cookie.php' );

// Title
$title = ns_get_clean_title();
?>
<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/CreativeWork">
<head>
  <title><?php if ( '' != $title ) { echo $title; } else { wp_title('', true, 'right'); }; ?> | Nocna Sowa</title>

  <?php include( 'includes/header-meta.php' ); ?>

  <link href="<?php echo get_permalink( $id ); ?>" rel="canonical" />

  <meta property="og:type" content="article" />
  <?php
    $description = get_post_meta($id, 'description', true);
    if ( '' != $description ) { ?>
      <meta name="description" itemprop="description" content="<?php echo $description; ?>" />
  <?php }; ?>

  <?php // Facebook og: ?>
  <meta property="og:title" content="<?php if ( '' != $title ) { echo $title; } else { wp_title('', true, 'right'); }; ?>" />
  <meta property="og:site_name" content="Twój wieczorny kurs języka norweskiego | Nocna Sowa" />

  <?php
    $robots = get_post_meta($id, 'robots', true);
    if ( 'noindex' == $robots ) { ?>
      <meta name="robots" content="noindex, follow">
  <?php }; ?>

  <link rel="stylesheet" type="text/css" href="<?php ns_auto_ver('/c/chat-bot-rzeczownik.css'); ?>" />
</head>

<body>

<div id="chat-bot" class="wrapper"></div>

<style>
  /* testing small screen */
  /*
  html{font-size:0.75em;}
  .chat-window{max-width:31.25rem;}
  .btn-chat-answer .emojione, .chat-bubble-answer .emojione, .chat-bubble .emojione{transform:scale(0.5, 0.5);margin:-20px -16px -24px;}
  */
</style>



<?php include('functions/chat-bot-rzeczownik-data.php'); ?>


<script src="<?php ns_auto_ver('/c/j-min.js'); ?>"></script>
<script src="<?php ns_auto_ver('/c/j-chat-min.js'); ?>"></script>
<script src="//cdn.jsdelivr.net/velocity/1.2.3/velocity.min.js"></script>
</body>
</html>