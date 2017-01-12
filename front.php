<?php
//
// Template Name: Front
//

?>

<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/WebPage">
<head>
  <title itemprop="name">Las - aplikacja do nauki języka norweskiego online</title>

  <link href="http://las.nocnasowa.pl/" rel="canonical" />

  <?php include( '/c/w/themes/nocnasowa_theme/includes/header-meta.php' ); ?>

  <meta name="description" itemprop="description" content="Aplikacja do nauki norweskiego online" />
  <meta itemprop="image" content="">

  <?php // Facebook og: ?>
  <meta property="og:title" content="Las - aplikacja do nauki norweskiego online" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="" />
</head>

<body>

<?php

  function las_get_front_img() {
    $img_array = array(
      'https://source.unsplash.com/5KvErlbdeyo/1600x900',
      'https://source.unsplash.com/W3V2tQAZxPA/1600x900',
      'https://source.unsplash.com/P4wUyM5DAsc/1600x900',
      'https://source.unsplash.com/jeV-LUEyJoE/1600x900',
      'https://source.unsplash.com/zquXsl5Vxgw/1600x900',
      'https://source.unsplash.com/r7SAdcwi8Vc/1600x900',
      'https://source.unsplash.com/qKFxQ3X-YbI/1600x900',
      'https://source.unsplash.com/SVqeVMCk9PE/1600x900',
      'https://source.unsplash.com/y9csmronT3s/1600x900',
      'https://source.unsplash.com/NQSWvyVRIJk/1600x900',
      'https://source.unsplash.com/Dpah1abZ3Xw/1600x900',
      'https://source.unsplash.com/2ShvY8Lf6l0/1600x900',
      'https://source.unsplash.com/Y5ekEhh6rEU/1600x900',
      'https://source.unsplash.com/OxTT6kZs_gU/1600x900',
      'https://source.unsplash.com/4k-U1Wp2d00/1600x900',
      'https://source.unsplash.com/4k-U1Wp2d00/1600x900',
      'https://source.unsplash.com/VPKGUt4s0iI/1600x900',
      'https://source.unsplash.com/kKrfPaKgE1c/1600x900'
    );
    shuffle($img_array);
    return $img_array[0];
  }

?>

<section class="section-trans section-100 section-trans--fixed" style="background-image:url('<?php echo las_get_front_img(); ?>');min-height:100%;">
  <div class="section-trans__fixed" style="background-color:rgba(0,0,0,0.33);">
    <div class="section-content" style="position:absolute;top:50%;left:0;right:0;transform:translate(0,-50%);">
      <h1 class="centered">Las</h1>
      <p class="centered">Aplikacja do nauki norweskiego online.</p>
    </div>
  </div>
</section>

</body>
</html>