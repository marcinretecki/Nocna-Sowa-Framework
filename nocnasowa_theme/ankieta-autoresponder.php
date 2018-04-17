<?php
/*
Template Name: Ankieta Autoresponder
*/


// Id
global $post;
$id = $post->ID;

// Title
$title = 'Ankieta';
?>
<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/Article">
<head>
  <title><?php echo $title; ?> | Nocna Sowa</title>

  <?php include( 'includes/header-meta.php' ); ?>

  <?php $robots = get_post_meta($id, 'robots', true); ?>
  <?php if ( 'noindex' == $robots ) { ?><meta name="robots" content="noindex, follow"><?php }; ?>

  <link href="<?php the_permalink(); ?>" rel="canonical" />

  <style>
    html{margin:0;height:100%;overflow:hidden}
    iframe{position:absolute;left:0;right:0;bottom:0;top:0;border:0}
  </style>
</head>

<body>

  <?php $day = date( 'd' );
    if ( $day % 2 == 0 ) {
  ?>

    <iframe id="typeform-full" width="100%" height="100%" frameborder="0" src="https://nocnasowa.typeform.com/to/U8wtG3"></iframe>
    <script type="text/javascript" src="https://s3-eu-west-1.amazonaws.com/share.typeform.com/embed.js"></script>


  <?php } else { ?>

    <iframe id="typeform-full" width="100%" height="100%" frameborder="0" src="https://nocnasowa.typeform.com/to/WIoZzw"></iframe>
    <script type="text/javascript" src="https://s3-eu-west-1.amazonaws.com/share.typeform.com/embed.js"></script>

  <?php } ?>

</body>
</html>