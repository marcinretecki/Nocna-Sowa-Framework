<?php
//
// Includes – Head
//


//
//  Check if user visits "przewodnik" and act accordingly
//
las_update_user_meta_przewodnik();

?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <title itemprop="name"><?php wp_title(' ', true, 'right'); ?>| Las</title>

  <link href="<?php echo get_permalink( $id ); ?>" rel="canonical" />

  <?php include( $source_url . 'includes/header-meta.php' ); ?>
  <link rel="stylesheet" type="text/css" href="<?php autoVer('/c/chat-bot-rzeczownik.css'); ?>" />
</head>

<body>

<?php if (!is_page('kursy') && !is_front_page() && !is_home()) { ?>
  <a style="position:absolute;left:0;z-index:100;" href="/kursy/" class="btn btn-white">&laquo; Powrót do listy kursów</a>
<?php } ?>
<section class="section-beige wrapper">