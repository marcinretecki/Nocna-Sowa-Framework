<meta charset="UTF-8">
<meta name="author" content="http://nocnasowa.pl" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, maximum-scale=1" />
<?php
if ( is_single() ) {
  $the_date = get_the_date( 'Y-m-d' );
  echo '<meta itemprop="datePublished" content="' . $the_date . '" />';
  $the_modified_date = get_the_modified_date( 'Y-m-d' );
  echo '<meta itemprop="dateModified" content="' . $the_modified_date . '" />';

  echo '<meta itemprop="mainEntityOfPage" content="' . get_permalink( $id ) . '" />';


  if ( has_post_thumbnail() ) {
    $thumb_id = get_post_thumbnail_id();
    $thumb = wp_get_attachment_image_src( $thumb_id, 'full' );
    echo '<meta property="og:image" content="' . $thumb[0] . '" />';
  } else {
    echo '<meta property="og:image" content="http://nocnasowa.pl/c/i/sowa_fb_thumb.jpg" />';
  };
}
?>

<meta property="fb:app_id" content="110154605804697" />
<meta property="article:publisher" content="https://www.facebook.com/NocnaSowaPL" />
<meta property="og:site_name" content="Twój wieczorny kurs języka norweskiego | Nocna Sowa" />


<!--[if !IE 7]><!-->
<link rel="stylesheet" type="text/css" href="<?php ns_auto_ver('/c/s.css'); ?>" />
<!--<![endif]-->

<link rel="alternate" type="application/rss+xml" title="Nocna Sowa RSS" href="http://feeds.feedburner.com/NocnaSowa" />
<link rel="icon" href="/favicon.ico" sizes="16x16" type="image/ico" />
<link rel="icon" href="/favicon.png" sizes="16x16" type="image/png" />


<?php // Space for Analytics ?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-7904644-11', 'nocnasowa.pl');
ga('send', 'pageview');


// old function
function recordOutgoing(link) {}
</script>

<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="/c/ie6.css" media="screen, projection">
<![endif]-->
<?php /*<!--[if lte IE 10]>
<script async="async" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<link rel="stylesheet" type="text/css" href="<?php ns_auto_ver('/c/ie.css'); ?>" />
<script type="text/javascript" src="<?php ns_auto_ver('/c/ie.js'); ?>"></script>
<![endif]-->
*/ ?>

<script>
  env = function(){
    var flags = {}, ua = navigator.userAgent, el = document.createElement('div'), root = document.documentElement, i
    function flag(names) {
      root.className += (root.className ? ' ' : '') + names
      names = names.split(' ')
      for (i = 0; i < names.length; i++) flags[names[i]] = true
    }
    if (ua.indexOf('(iPad') > -1) flag('ios ipad')
    if (ua.indexOf('(iPhone') > -1 || ua.indexOf('(iPod') > 1) flag('ios iphone')
    el.setAttribute('ontouchstart', 'return;')
    if (typeof el.ontouchstart === 'function') flag('touch')
    if (window.navigator.msPointerEnabled) flag('touch mspointer')
    return flags
  }()
</script>

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "name": "Nocna Sowa",
  "url": "http://nocnasowa.pl/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "http://nocnasowa.pl/?s={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>