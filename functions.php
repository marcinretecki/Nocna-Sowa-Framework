<?php
//
// Functions
//

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

function las_autover_live($url){
  $path = pathinfo($url);
  $ver = '.' . filemtime('/nocnasowa/live' . $url).'.';
  echo 'http://nocnasowa.pl' . $path['dirname'] . '/' . str_replace( '.', $ver, $path['basename'] );
}

function las_autover_livecopy($url){
  $path = pathinfo($url);
  $ver = '.' . filemtime('/nocnasowa/livecopy' . $url).'.';
  echo 'http://livecopy.nocnasowa.pl' . $path['dirname'] . '/' . str_replace( '.', $ver, $path['basename'] );
}

function autoVer($url) {
  if ( las_admin_dev_mode() ) {
    return las_autover_livecopy($url);
  }
  else {
    return las_autover_live($url);
  }
}



//
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
$source_url = las_get_source_url();



//
// Dev redirect
// it is actually redirecting all not logged in users, so it can be used for restricting content
//
function las_dev_redirect() {
  if ( ( $_SERVER['REQUEST_URI'] !== '/' ) && !is_user_logged_in() ) {
    header('Location: http://las.nocnasowa.pl/');
    exit;
  }
}
add_action('template_redirect', 'las_dev_redirect');


//
// Redirect non-editors or non-admins from admin area
//
function las_login_redirect() {
  if ( !current_user_can( 'edit_posts' ) ) {
    wp_redirect( 'http://las.nocnasowa.pl/' );
    exit;
  }
}
add_action( 'admin_init', 'las_login_redirect' );



//
// Rewrite author's page base
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
}
add_action('init', 'las_courses_rewrite_rule', 10, 0);

function las_courses_rewrite_filter_request( $vars ) {
 if ( isset( $vars['przewodnik'] ) ) {
   $vars['przewodnik'] = true;
 }
 if ( isset( $vars['wyzwanie'] ) ) {
   $vars['wyzwanie'] = true;
 }
 return $vars;
}
add_filter( 'request', 'las_courses_rewrite_filter_request' );



//
// Add categories to pages
//
function las_add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'category', 'page' );
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
//  Get user progress
//
//  User progress array example
//
//  array(        |przewodnik  |wyzwanie
//    'p-0-1' => [1,           0],
//    'p-1-1' => [1,           10],
//    'p-1-2' => [1,           0],
//    'p-1-3' => [0,           0],
//    ...
//  );
//  przewodnik może mieć wartość 0 (jeszcze nie czytał) lub 1 (już czytał)
//  wyzwanie ma wartość 0 (gdy jeszcze nie wchodził) lub większe za każdy przykład, który zrobił w ćwiczeniu s
//
function las_get_user_progress() {

  $current_user = wp_get_current_user();

  $user_meta = get_user_meta( $current_user->ID, 'las_progress' );

  //$las_progress_array = array(
  //  'p-0-1' => [1],
  //  'p-1-1' => [1, 10],
  //  'p-1-2' => [1, 0],
  //  'p-1-3' => [0, 0]
  //);

  //update_user_meta( $current_user->ID, 'las_progress', $las_progress_array );

  if ( $user_meta ) {
    return $user_meta[0];
  }


}



//
// Check if user visits course's "przewodnik"
// if yes, then update his meta
//
function las_update_user_meta_przewodnik() {
  if ( get_query_var( 'przewodnik' ) ) {

    global $post;

    $current_user = wp_get_current_user();

    $user_progress = las_get_user_progress();

    if ( $user_progress[$post->post_name][0] !== 1 ) {
      $user_progress[$post->post_name][0] = 1;
      update_user_meta( $current_user->ID, 'las_progress', $user_progress);
    }

  }
}



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