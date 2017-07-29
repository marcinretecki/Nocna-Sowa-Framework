<?php
//
// Functions
//

if ( is_user_logged_in() ) {

  //  include functions
  include( stream_resolve_include_path( __DIR__ . '/functions/f-cookie.php' ) );
  include( stream_resolve_include_path( __DIR__ . '/functions/f-user-exp.php' ) );
  include( stream_resolve_include_path( __DIR__ . '/functions/f-user-progress.php' ) );
  include( stream_resolve_include_path( __DIR__ . '/functions/f-user-char.php' ) );
  include( stream_resolve_include_path( __DIR__ . '/functions/f-tests.php' ) );

}

//
// Change css and js source for development
//
function las_admin_dev_mode() {
  if ( current_user_can( 'delete_users' ) )  {
    return true;
  }
  else {
    return false;
  }
}


//
//  Is dev?
//
function las_is_developer() {
  if ( current_user_can( 'delete_users' ) )  {
    return true;
  }
  else {
    return false;
  }
}


function ns_auto_ver( $url ){

  $path = pathinfo( $url );

  $file = stream_resolve_include_path( $_SERVER['DOCUMENT_ROOT'] . $url );

  if ( $file ) {

    $mtime = filemtime( $_SERVER['DOCUMENT_ROOT'] . $url );

    $ver = '.' . $mtime . '.';

    echo $path['dirname'] . '/' . str_replace( '.', $ver, $path['basename'] );

  }
  else {
    return false;
  }

}


//
//  Get heading (h1 in articles)
//
function las_get_heading() {
  global $post;
  $id = $post->ID;

  $heading = get_post_meta($id, 'heading', true);
  if ( '' == $heading ) {
    $heading = get_the_title();
  }
  return $heading;
}



/*//
// Get source url for development
//
function las_get_source_url() {
  if ( las_admin_dev_mode() ) {
    return '/nocnasowa/livecopy/wp-content/themes/nocnasowa_theme/';
  }
  else {
    return '/nocnasowa/live/wp-content/themes/nocnasowa_theme/';
  }
}
$source_url = las_get_source_url();*/



//
//  Dev redirect
//  it is actually redirecting all not logged in users, so it can be used for restricting content
//
function las_dev_redirect() {
  if ( ( $_SERVER['REQUEST_URI'] !== '/las/' ) && !is_user_logged_in() ) {
    header('Location: /las/');
    exit;
  }
}
add_action('template_redirect', 'las_dev_redirect');


//
//  Redirect non-editors or non-admins from admin area
//
function las_login_redirect() {
  if ( !current_user_can( 'edit_posts' ) ) {
    wp_redirect( '/las/' );
    exit;
  }
}
add_action( 'admin_init', 'las_login_redirect' );



//
//  Rewrite author's page base
//
function las_rewrite_init() {
  global $wp_rewrite;
  $wp_rewrite->author_base = 'u';
  $wp_rewrite->author_structure = '/' . $wp_rewrite->author_base . '/%author%';
}
add_action('init', 'las_rewrite_init');



//
// Add rewrite rules for courses
//
function las_courses_rewrite_rule() {
  add_rewrite_endpoint( 'przewodnik', EP_PAGES );
  add_rewrite_endpoint( 'wyzwanie', EP_PAGES );
  add_rewrite_endpoint( 'testmode', EP_PAGES );
}
add_action('init', 'las_courses_rewrite_rule', 10, 0);

function las_courses_rewrite_filter_request( $vars ) {
 if ( isset( $vars['przewodnik'] ) ) {
   $vars['przewodnik'] = true;
 }
 if ( isset( $vars['wyzwanie'] ) ) {
   $vars['wyzwanie'] = true;
 }
 if ( isset( $vars['testmode'] ) ) {
   $vars['testmode'] = true;
 }
 return $vars;
}
add_filter( 'request', 'las_courses_rewrite_filter_request' );



//
// Add categories to pages
//
function las_add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'category', 'page' );
 //register_taxonomy_for_object_type( 'post_tag', 'page' );
 }
add_action( 'init', 'las_add_taxonomies_to_pages' );



//
// Usuń Title z automatycznie generowanych linków
//
function remove_title_attributes( $input ) {
  return preg_replace('/\s*title\s*=\s*(["\']).*?\1/', '', $input);
};
add_filter( 'wp_list_pages', 'remove_title_attributes' );
add_filter( 'wp_list_categories', 'remove_title_attributes' );



//
// Usuń Admin Bar
//
add_filter('show_admin_bar', '__return_false');



//
// Remove archive pages
//
function remove_archives() {
  global $wp_query, $post;

  if ( is_day() || is_month() || is_year() || is_tag() ) {
    $wp_query->set_404();
  }

  if ( is_feed() ) {
    $day    = get_query_var('day');
    $month  = get_query_var('month');
    $year   = get_query_var('year');

    if ( !empty( $day ) || !empty( $month ) || !empty( $year ) ) {
      $wp_query->set_404();
      $wp_query->is_feed = false;
    }
  }
}
add_action('template_redirect', 'remove_archives');



//
//  Add new roles
//
function las_add_roles() {
  add_role(
      'basic_user',
      __( 'Basic User' ),
      array(
          'read' => true,
      )
  );

  add_role(
      'advanced_user',
      __( 'Advanced User' ),
      array(
          'read' => true,
      )
  );
}
//  las_add_roles(); // we do it only once!







//
// Comments and questions in courses
//
function las_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;

  $url    = get_comment_author_url( $comment );
  $author = get_comment_author( $comment );

  if ( empty( $url ) || 'http://' == $url ) {
    $author = $author;
  } else {
    $author = "<a href='$url' rel='external nofollow' target='_blank' class='url'>$author</a>";
  }

  ?>

  <?php if ( 1 == $depth ) {
    echo '<div class="comment-group">';
  } ?>


  <article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" itemscope itemtype="http://schema.org/Comment">
    <footer>
      <?php echo get_avatar($comment,'32','http://nocnasowa.pl/c/i/avatar_v2.png' ); ?><span class="comment-author" itemprop="author"><?php echo $author; ?></span><time pubdate datetime="<?php comment_time('Y-m-d'); echo 'T'; comment_time('H:i:s'); ?>"><?php comment_time('j.m.Y, G:i'); ?></time>

       | <?php comment_reply_link( array( 'reply_text' => 'Odpowiedz', 'depth' => 1, 'max_depth' => 2 ) ); ?>

       <?php //edit_comment_link(__('(Edytuj)'),'  ','') ?>
    </footer>

    <?php if ($comment->comment_approved == '0') : ?>
      <em class="note">Jeszcze tylko Sowa rzuci okiem i gotowe.</em>
    <?php
      endif;

      $comment_text = apply_filters( 'comment_text', $comment->comment_content, $comment );

      if ( ( 'Marcin' != $comment->comment_author ) && ( 'Marta' != $comment->comment_author ) ) {
        $search_href = 'href';
        $target = 'target="_blank" href';
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
};
// end comment custom style





//
//  Time formating
//

//  @return array( hours, minutes, seconds )
function las_seconds_to_time_array( $seconds ) {

  $hours = 0;
  $minutes = 0;
  $seconds_rest = 0;

  //  if over an hour
  if ( $seconds > 3600 ) {

    $hours = intval( floor( $seconds / 3600 ) );
    $seconds_rest = $seconds - ( $hours * 3600 );
    $minutes = intval( floor( $seconds_rest / 60 ) );

    //  $seconds_rest = $seconds_rest - ( $minutes * 60 );
    //  przy godzinach, nie wyświetlamy sekund
    $seconds_rest = 0;

  }
  //  if less than an hour
  else {

    //  floor return a float, I preffer integer
    $minutes = intval( floor( $seconds / 60 ) );
    $seconds_rest = $seconds - ( $minutes * 60 );

  }

  return [ $hours, $minutes, $seconds_rest ];

}

//
//  Format seconds into hours, minutes, seconds
//  @return string
//
function las_format_t( $seconds ) {

  $time = '';

  $minut_array = [ 0, 1, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19 ];
  $minuty_array = [ 2, 3, 4 ];

  //  change seconds into an array
  $time_array = las_seconds_to_time_array( $seconds );

  //  assign
  $hours =    $time_array[0];
  $minutes =  $time_array[1];
  $seconds =  $time_array[2];


  //  if hours
  if ( $hours > 0 ) {

    $time .= $hours;

    //  1 godzina
    if ( $hours === 1 ) {

      $time .= ' godzina';

    }
    //  godzin
    elseif ( in_array( $hours, $minut_array ) || in_array( substr( $hours, -1 ), $minut_array ) ) {

      $time .= ' godzin';

    }
    //  godziny
    elseif ( in_array( $hours, $minuty_array ) || in_array( substr( $hours, -1 ), $minuty_array ) ) {

      $time .= ' godziny';

    }

  }

  // if there are both minutes and seconds
  if ( ( $hours > 0 ) && ( $minutes > 0 ) ) {
    $time .= ', ';
  }

  //  if any minutes
  if ( $minutes > 0 ) {

    $time .= $minutes;

    //  1 minuta
    if ( $minutes === 1 ) {

      $time .= ' minuta';

    }
    //  minut
    elseif ( in_array( $minutes, $minut_array ) || in_array( substr( $minutes, -1 ), $minut_array ) ) {

      $time .= ' minut';

    }
    //  minuty
    elseif ( in_array( $minutes, $minuty_array ) || in_array( substr( $minutes, -1 ), $minuty_array ) ) {

      $time .= ' minuty';

    }

  }


  // if there are both minutes and seconds
  if ( ( $minutes > 0 ) && ( $seconds > 0 ) ) {
    $time .= ', ';
  }


  //  if any seconds left
  if ( $seconds > 0 ) {

    $time .= $seconds;

    //  1 sekunda
    if ( $seconds === 1 ) {

      $time .= ' sekunda';

    }
    //  sekund
    elseif ( in_array( $seconds, $minut_array ) || in_array( substr( $seconds, -1 ), $minut_array ) ) {

      $time .= ' sekund';

    }
    //  sekundy
    elseif ( in_array( $seconds, $minuty_array ) || in_array( substr( $seconds, -1 ), $minuty_array ) ) {

      $time .= ' sekundy';

    }

  }


  return $time;
}


function las_format_t_short( $seconds ) {

  $time = '';

  //  change seconds into an array
  $time_array = las_seconds_to_time_array( $seconds );

  //  assign
  $hours =    $time_array[0];
  $minutes =  $time_array[1];
  $seconds =  $time_array[2];

  if ( ( $hours <= 0 ) && ( $minutes <= 0 ) ) {

    $time .= $seconds;
    $time .= 's';

  }
  else {

    if ( $hours > 0 ) {

      $time .= $hours;
      $time .= ' godz. ';
      $time .= $minutes;
      $time .= ' min.';

    }
    else {

      $time .= $minutes;
      $time .= ' min. ';
      $time .= $seconds;
      $time .= ' sek.';

    }



  }



  return $time;

}




function las_get_clean_title( $title ) {

  $new_title = explode( '. ', $title );

  //  check if there was a number in the title
  if ( $new_title[1] ) {
    $new_title = $new_title[1];
  }
  else {
    $new_title = $new_title[0];
  }

  return $new_title;

}