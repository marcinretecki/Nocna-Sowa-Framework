<?php

//
//  AutoVer
//
function ns_auto_ver($url){
  $path = pathinfo($url);
  $ver = '.' . filemtime( $_SERVER['DOCUMENT_ROOT'] . $url ) . '.';
  echo $path['dirname'] . '/' . str_replace( '.', $ver, $path['basename'] );
}



//
//  Filter the single post content
//
function ns_filter_the_content_in_the_main_loop( $content ) {

    // Check if we're inside the main loop in a single post page.
    if ( is_single() && in_the_loop() && is_main_query() ) {

      $rep = '"' . site_url( '/' );

      //  add site url to relative links
      $content = preg_replace('/("\/)(?!\/)/', $rep, $content);

      //  add nice quotes
      //  wyłączyłem to bo przy niektórych literach, wystawało z lewej strony
      //$content = preg_replace('/(<p><q>)/', '<p class="p-quote"><q>', $content);

    }

    return $content;
}
add_filter( 'the_content', 'ns_filter_the_content_in_the_main_loop' );


//
//  Remove title from links
//
function remove_title_attributes( $html ) {
  return preg_replace('/\s*title\s*=\s*(["\']).*?\1/', '', $html);
};
add_filter( 'wp_list_pages', 'remove_title_attributes' );
add_filter( 'wp_list_categories', 'remove_title_attributes' );


//
//  Remove width and height on img
//
function remove_thumbnail_dimensions( $html ) {
  return preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );


//
//  Get clean title for usage in tags
//
function ns_get_clean_title() {
  global $post;
  $id = $post->ID;

  $title = get_post_meta($id, 'title', true);
  if ( '' == $title ) {
    $title = esc_attr( strip_tags( get_the_title() ) );
  }
  return apply_filters( 'the_title', $title, $id );
}


//
//  Get heading (h1 in articles)
//
function ns_get_heading() {
  global $post;
  $id = $post->ID;

  $heading = get_post_meta($id, 'heading', true);
  if ( '' == $heading ) {
    $heading = get_the_title();
  }
  return apply_filters( 'the_title', $heading, $id );
}


//
//  Add thumbnail support
//
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
  //add_image_size( 'example', 200, 200, true );
}


//
// NO <p> in Content
//
remove_filter('the_content', 'wpautop');



//
// COMMENTS custom style
//
function mytheme_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;

  $url    = get_comment_author_url( $comment );
  $author = get_comment_author( $comment );

  if ( empty( $url ) || 'http://' == $url ) {
    $author = $author;
  } else {
    $author = "<a href='$url' rel='external nofollow' target='_blank' rel='noopener'  class='url'>$author</a>";
  }

  ?>

  <?php if ( 1 == $depth ) {
    echo '<div class="comment-group">';
  } ?>


  <article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" itemscope itemtype="http://schema.org/Comment">
    <footer>
      <?php echo get_avatar($comment,'32','http://nocnasowa.pl/c/i/avatar_v2.png' ); ?><span class="comment-author" itemprop="author"><?php echo $author; ?></span><time itemprop="datePublished" datetime="<?php comment_time('Y-m-d'); echo 'T'; comment_time('H:i:s'); ?>"><?php comment_time('j.m.Y, G:i'); ?></time>

       | <?php comment_reply_link( array( 'reply_text' => 'Odpowiedz', 'depth' => 1, 'max_depth' => 2 ) ); ?>

       <?php //edit_comment_link(__('(Edytuj)'),'  ','') ?>
    </footer>

    <?php if ($comment->comment_approved == '0') : ?>
      <em class="note">Jeszcze tylko Sowa rzuci okiem i gotowe.</em>
    <?php
      endif;

    // old filters for replies
    //$to = $comment->comment_parent;
      $comment_text = apply_filters( 'comment_text', $comment->comment_content, $comment );
    //
    //if ( '0' != $to ) {
    //  $to_name =  '><small>@'. get_comment_author( $to ) . '</small> ';
    //  $comment_text = preg_replace( '/>/', $to_name, $comment_text, 1 );
    //}

    if ( ( 'Marcin' != $comment->comment_author ) && ( 'Marta' != $comment->comment_author ) ) {
      $search_href = 'href';
      $target = 'target="_blank" rel="noopener" href';
      $comment_text = str_replace( $search_href, $target, $comment_text);
    } else {
      $search_rel = 'rel="nofollow"';
      $null = '';
      $comment_text = str_replace( $search_rel, $null, $comment_text);
    }

    echo '<div itemprop="text">';
    echo $comment_text;
    echo '</div>';
    ?>

  </article>

<?php
}; // end comment custom style

function mytheme_end_callback($comment, $args, $depth) {

 if ( 1 != $depth ) {
    echo '</div>';
  }
}


//
//  BLOCK comments without referrer
//
function check_referrer() {
    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == “”) {
        wp_die( __('Please enable referrers in your browser, or, if you\'re a spammer, bugger off!') );
    }
}
add_action('check_comment_flood', 'check_referrer');


//
//  Check new comments
//
function preprocess_new_comment($commentdata) {
  if(isset($_POST['is_legit'])) {
    if ('' != $_POST['is_legit']) {
      wp_die( __('Czy to spam?') );
    }
  }
  return $commentdata;
}
if(function_exists('add_action')) {
  add_action('preprocess_comment', 'preprocess_new_comment');
}



//
//  Remove hentry from post class
//
function category_id_class( $classes ) {
  global $post;
  $key = array_search('hentry', $classes);
  if ($key !== false) {
    unset( $classes[$key] );
  }
  return $classes;
}
add_filter( 'post_class', 'category_id_class' );



//
//  Best commenters page
//
add_action( 'admin_menu', 'best_commenters_admin_page' );
function best_commenters_admin_page() {
  add_comments_page( 'Best Commenters', 'Best Commenters', 'manage_options', 'best-commenters-admin-page', 'best_commenters_admin_page_options');
}
function best_commenters_admin_page_options() {
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }

  echo '<div class="wrap"><pre>';

  $args = array(
    'fields' => '',
    'orderby' => 'comment_author_email',
    'order' => 'DESC',
    'status' => 'approve',
    'type' => 'comment',
    'search' => '',
    'count' => false,
  );

  $comments = get_comments( $args );
  $emails_list = array();

  foreach( $comments as $c ) {
    $email = $c->comment_author_email;
    $nick = $c->comment_author;
    $key = $nick . '|' . $email;

    if ( array_key_exists( $key, $emails_list ) ) {
      $emails_list[$key] = $emails_list[$key] + 1;
    }
    else {
      $emails_list[$key] = 1;
    }

  }

  echo count( $emails_list );
  echo '<br />';

  arsort( $emails_list );
  print_r( $emails_list );

  echo '</pre></div>';
}



//
//  Don't show error type on login
//
add_filter('login_errors',create_function('$a', "return null;"));


//
//  HELP for pages
//
add_action('add_meta_boxes', 'PageHelp_add_custom_box');
function PageHelp_add_custom_box() {add_meta_box( 'PageHelp_sectionid', 'Help', 'PageHelp_inner_custom_box', 'page' );}
function PageHelp_inner_custom_box() {
  // Use nonce for verification
  wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );
  echo '
    <h4>Help title</h4>
    <p>Help text</p>
    ';
}


//
// HELP for posts
//
add_action('add_meta_boxes', 'post_help_box');
function post_help_box() {add_meta_box( 'post_help_sectionid', 'Help', 'post_help_box_content', 'post', 'side', 'high' );}
function post_help_box_content() {
  // Use nonce for verification
  wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );
  echo '
    <p><strong>Wstęp:</strong> &#60;p class="intro"&#62;<br />
    <strong>Pierwsza duża litera:</strong> &#60;p class="capital"&#62;</p>

    <p><strong>Wewnątrz posta można używać nagłówków:</strong><br />
    &#60;h2&#62; (duze litery)<br />
    &#60;h3&#62; (trochę mniejsze, pogrubione)</p>

    <p><strong>Nowe przykłady</strong><br />
    &#60;dl class="dl-eg"&#62;<br />
      &#60;dt lang="no"&#62;Przykład&#60;/dt&#62;<br />
      &#60;dd&#62;Tłumaczenie&#60;/dd&#62;<br />
    &#60;/dl&#62;
    </p>

    <p><strong>Przykłady w dwóch kolumnach</strong><br />
    main-column row row--dl-eg center<br />
    dl-eg dl-eg--in-row col-8</p>

    <p>Słowa po norwesku: &#60;i lang="no"&#62;&#60;/i&#62;<br />
    Akapit z konstrukcją: class="con"</p>

    <p><strong>W linkach do innych stron</strong> dodaj po href="..."<br />
    target="_blank" rel="noopener"</p>

    <p><strong>Cytaty</strong><br />
    figure.figure-quote<br />
    > blockquote > p <br />
    > figcaption
    </figure>

    </p>

    <p><strong>Źródła</strong> - "sources" w Custom Fields.<br />
    Każda pozycja musi być oznaczona jako &#60;li&#62;.</p>

    <p><strong>Aside</strong><br />
    class: aside-entry col-4 l-1-32 alignright</p>

    <p><strong>Main Collumn</strong>: main-column<br />
    <strong>Full Width:</strong> full-width<br />
    <strong>aside-column</strong></p>
    ';
}


//
//  HELP 2 for posts
//
add_action('add_meta_boxes', 'post_help_box_2');
function post_help_box_2() {add_meta_box( 'post_help_2_sectionid', 'Help - ćwiczenia', 'post_help_box_2_content', 'post', 'side', 'high' );}
function post_help_box_2_content() {
  // Use nonce for verification
  wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

  echo '
    <p><strong>Struktura ćwiczenia:</strong></p>
    <p>
    &#60;section id="ex" class="ex"&#62; <br />
    &#60;h2&#62;Ćwiczenie&#60;/h2&#62; <br />
    &#60;p class="command"&#62;&#60;b&#62;Polecenie&#60;/b&#62; &#60;/p&#62; <br />
    &#60;p&#62;&#60;i class="ex-field" data-ns-clue=""&#62;Miejsce do uzupełnienia&#60;/i&#62;&#60;sup class="count"&#62;&#60;/sup&#62;&#60;/p&#62; <br />
    [check]<br />
    &#60;/section&#62;
    </p>
    <p>W razie czego: ex--nowrap-field</p>
    <p>&#60;i class="vis"&#62;<br />dobra odp. / &#60;del&#62;zła odp.&#60;/del&#62;<br />&#60;/i&#62;</p>
    <p>Błąd i poprawiona część: &#60;del&#62;&#60;/del&#62; &#60;ins&#62;&#60;/ins&#62;</p>
    <p>Tłumaczenia: section class="trans"<br />
    Et lite tips: [tips]</p>
    <p>Format zdjęc dla FB: 1.91:1</p>
    <p>Tagowanie eventów w GA<br />
    data-ga-category (Ćwiczenie) <br />
    data-ga-action (Download)
    ';
}


//
// SHARE shortcode
//
add_shortcode( 'share', 'share_handler' );
function share_handler( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'author' => '',
    ), $atts ) );
  $title = ns_get_clean_title();
  $url = get_permalink();
  $m = '“' . $content . '”';
  if ( $author ) { $m = '“' . $content . '” —'; }
  $sowa = 'NocnaSowa.pl';
  $ga = 'onClick="ga(\'send\', \'event\', \'Facebook\', \'Share quote\', \'' . $m . '\');"';
}


//
// SHARE POST
//
add_shortcode( 'share_post', 'share_post_handler' );
function share_post_handler( $atts, $content = null ) {
  $title = ns_get_clean_title();
  $permalink = get_permalink();
  $url = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode( $permalink );
  $ga = 'onClick="ga(\'send\', \'event\', \'Facebook\', \'Share\', \'' . $title . '\');"';

  return '<a ' . $ga . ' class="share alignright" rel="nofollow" href="' . $url . '" target="_blank">Podziel się</a>';
}


//
// TIPS shortcode
//
add_shortcode( 'tips', 'tips_handler' );
function tips_handler( $atts, $content = null ) {
  return '<aside class="aside-entry main-column"><h4>Et lite tips:</h4><p>Nie rób tego ćwiczenia na szybko w głowie. Weź kartkę <span class="no-break">i na</span> spokojnie zapisz każde zdanie. Sprawdź rozwiązanie dopiero, gdy skończysz całe ćwiczenie. <span class="no-break">Daj sobie</span> chwilę, by zastanowić się nad odpowiedziami. Jeśli chcesz lepiej mówić, przeczytaj wszystko <span class="no-break">na głos</span>.</p></aside>';
}


//
//  TIPS-RIGHT shortcode
//
add_shortcode( 'tips-right', 'tips_right_handler' );
function tips_right_handler( $atts, $content = null ) {
  return '<aside class="aside-entry col-4 alignright l-1-32"><h4>Et lite tips:</h4><p>Nie rób tego ćwiczenia na szybko w głowie. Weź kartkę <span class="no-break">i długopis</span>. Na spokojnie zapisz każde zdanie. Sprawdź rozwiązanie dopiero, gdy skończysz całe ćwiczenie. <span class="no-break">Daj sobie</span> chwilę, by zastanowić się nad odpowiedziami.</p></aside>';
}


//
//  CHECK shortcode
//
add_shortcode( 'check', 'check_handler' );
function check_handler( $atts, $content = null ) {
  $title = ns_get_clean_title();
  $url = urlencode( get_permalink() );
  $return = '<a class="btn btn-red btn-s-2 check" href="#ex"  data-ga-action="Sprawdź" id="check">Sprawdź</a>'
    . '<a href="#!ex"  class="btn btn-4 btn-dark btn-s-2 check" data-ga-action="X">x</a>'
    . '<span class="note">Cała prawda jednym gestem.</span>';

  return $return;
}


/* URL shortcode */
add_shortcode( 'url', 'url_handler' );
function url_handler( $atts, $content = null ) {
  $title = get_the_title();
  $url = urlencode( get_permalink() );
  return $url;
}


/* GET latest 3 articles shortcode */
add_shortcode('get_three', 'get_three_handler');
function get_three_handler( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'category' => '',
    'class' => ''
    ), $atts ) );

  if ($category) {

    $args = array(
      'posts_per_page' => 3,
      'category_name' => esc_attr( $category ),
      'post_status' => 'publish'
    );
    $posts = get_posts( $args );
    if ( $class ) {
      $list = '<ul class="' . esc_attr( $class ) . '">';
    } else {
      $list = '<ul>';
    }

    foreach ($posts as $post) :
      setup_postdata( $post );
      $list .= '<li><a href="/' . $post->post_name . '/">' . $post->post_title . '</a></li>';
    endforeach;

    wp_reset_postdata();

    $list .= '</ul>';

    return $list;

  }
}


/* LIKE shortcode */
add_shortcode( 'like', 'like_handler' );
function like_handler( $atts, $content = null ) {
  $url = urlencode( get_permalink() );
  $a = shortcode_atts( array(
    'content' => 'Podobał Ci się artykuł?'
  ), $atts );
}


/* LIKE button shortcode */
add_shortcode( 'like_button', 'like_button_handler' );
function like_button_handler( $atts ) {
  $url = urlencode( get_permalink() );
  return '<iframe src="//www.facebook.com/plugins/like.php?locale=pl_PL&amp;href=' . $url . '&amp;width=105&amp;height=20&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId=110154605804697" scrolling="no" frameborder="0" style="overflow:hidden;width:105px;height:20px;display:inline-block;margin:0" allowTransparency="true"></iframe>';
}


/* TIME shortcode */
add_shortcode( 'time', 'time_handler' );
function time_handler( $atts, $content = null ) {
  date_default_timezone_set('Europe/Oslo');
  $hour = date('G') + 1;
  $time = $hour . ":00";
  return $time;
}


/* Newsletter form shortcode */
add_shortcode( 'newsletter-form', 'newsletter_handler' );
function newsletter_handler( $atts, $content = null ) {
  $newsletter = '
    <form class="form-newsletter" action="http://nocnasowa.us5.list-manage2.com/subscribe/post?u=22ba8148ec2af7aa74a3d7151&amp;id=5fe255c367" method="post" name="mc-embedded-subscribe-form" target="_blank">
      <label for="mce-TEXT">Twoje imię:</label>
      <input type="text" value="" name="FNAME" required>
      <label for="mce-EMAIL">Adres email:</label>
      <input type="email" value="" name="EMAIL" required>
      <div class="hidden-input">
        <input type="hidden" value="Newsletter" name="FORM">
        <input class="hidden-input" type="checkbox" value="1" name="group[17321][4]" checked="">
      </div>
      <button type="submit" class="btn btn-blue btn-s-2" name="subscribe" onClick="ga(\'send\', \'event\', \'Submit\', \'Dołącz za darmo\', \'Newsletter\');">Dołącz za darmo</button>
    </form>';
  return $newsletter;
}


/* REMOVE pages from search */
function remove_pages_from_search() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'remove_pages_from_search');


//
//  NO Archive pages
//
add_action('template_redirect', 'remove_archives');
function remove_archives() {
  global $wp_query, $post;

  if ( is_author() || is_day() || is_month() || is_year() ) {
    $wp_query->set_404();
  }

  if ( is_feed() ) {
    $author = get_query_var('author_name');
    $day    = get_query_var('day');
    $month  = get_query_var('month');
    $year   = get_query_var('year');

    if ( !empty( $author ) || !empty( $day ) || !empty( $month ) || !empty( $year ) ) {
      $wp_query->set_404();
      $wp_query->is_feed = false;
    }
  }
}


// Show Tag Image
// - must be used inside loop?
// TODO
// - add type so it can show different buttons depending on place;
function show_tag_img() {
  $class = "";
  if ( has_tag( 'film' ) ) {
    echo '<a class="btn btn-trans btn-icon"><div class="icon i-w-film"></div></a>';
  } elseif ( has_tag( 'cwiczenie' ) ) {
    echo '<a class="btn btn-trans btn-icon"><div class="icon i-w-ex"></div></a>';
  } elseif ( has_tag( 'dialog' ) ) {
    echo '<a class="btn btn-trans btn-icon"><div class="icon i-w-talk"></div></a>';
  } else {
    echo '<a class="btn btn-trans btn-icon"><div class="icon i-w-ark"></div></a>';
  }
}



//
//  Add links to rss
//
function ns_add_link_rss( $content ) {
  global $wp_query;

  if (  is_feed() ) {

    $title = $wp_query->post->post_title;
    $name = $wp_query->post->post_name;

    $content .= 'Wpis <a href="/' . $name . '/">' . $title . '</a> pochodzi z <a href="http://nocnasowa.pl/">NocnaSowa.pl – blog o języku norweskim</a>';

  }

  return $content;
}
add_filter('the_excerpt_rss', 'ns_add_link_rss');


// SINGLE post template for testing
// Remember to change temlate name
// add_filter('single_template', 'singleOnecolumn');
// function singleOneColumn() {
//  global $the_template, $post;
//  if (
//    ( 'Sowo, zdradź słowa' == $post->post_title ) ||
//    ( 'Nauka języka to nie nauka tłumaczeń' == $post->post_title )  ||
//    ( 'Jak skutecznie zacząć naukę języka norweskiego?' == $post->post_title )
//  ) {
//    $directory = get_template_directory();
//    if ( file_exists($directory . "/single-onecolumn.php") ) {
//      return $directory . "/single-onecolumn.php";
//    }
//  }
//  return $the_template;
// }



// LINKs for Prefething paged pages and posts (used in head)
/*
function wp_link_pages_prefetch() {

  global $page, $numpages, $multipage, $more, $pagenow;

  $output = '';
  if ( $multipage ) {
    if ( $more ) {
      $output .= '';
      $i = $page + 1;
      if ( $i <= $numpages && $more ) {
        $output .= '<link rel="prefetch" href="';
        $output .= _wp_link_page_portfolio($i);
        $output .= '" />';
        $output .= '<link rel="prerender" href="';
        $output .= _wp_link_page_portfolio($i);
        $output .= '" />';
      }
    }
  }

  echo $output;
}
*/