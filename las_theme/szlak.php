<?php
//
//  Template Name: Szlak
//


//
//  Szlak structure
//
//    Level (Początek)
//
//      1. Section  (main list)
//        1.1 Chapter (sublist)
//        1.2 Chapter
//        1.3 ...
//      2. Section
//      ...
//
//    Level (Daleko)
//
//      1. Section
//        1.1 Chapter
//        1.2 Chapter
//        1.3 ...
//      2. Section
//      ...
//



//  GLOBALS
$globals = stream_resolve_include_path( __DIR__ . '/includes/globals.php' );

if ( $globals ) {
  include( $globals );
}

$last_wyzwanie_result = las_get_last_wyzwanie_result( $user_progress );

//  for testing results
$last_wyzwanie_result = test_las_get_last_wyzwanie_result();
$user_exp = 900;
$level_array = las_get_user_level_array( $user_exp );
$user_level = $level_array[0];
$exp_for_next = $level_array[1];


//
//  Show all sections
//  Gets all sections lists, and loop through them
//  return array( all sections, section to open )
//
function las_get_all_sections( $user_progress ) {

  // Kursy IDs
  $basic_sections_parent = 20;
  $fonetyka_sections_parent = 284;
  $advanced_sections_parent = 24;

  $all_sections         = '';
  $list_loop_array      = array();
  $adv_list_loop_array  = array();
  $section_top_open     = '';
  $ids                  = array();



  //
  //  Początek drogi
  //

  //  get sections array
  $sections_args = array(
    'post_type'       => 'page',
    'post_parent'     => $basic_sections_parent,
    'posts_per_page'  => -1,
    'orderby'         => 'menu_order',
    'nopaging'        => true,
    'order'           => 'ASC'
  );
  $basic_sections = get_posts( $sections_args );

  // if there are any sections to display
  //  LOOP them
  if ( $basic_sections ) {
    $list_loop_array = las_list_loop( $basic_sections, 'basic', $user_progress );
  }
  else {
    $all_sections .= 'Wystąpił błąd i nie możemy wyświetlić szlaku.';
  }


  //
  //  Fonetyka
  //

  //  get fonetyka sections array
  $fonetyka_sections_args = $sections_args;
  $fonetyka_sections_args['post_parent'] = $fonetyka_sections_parent;
  $fonetyka_sections = get_posts( $fonetyka_sections_args );

  // if there are any fonetyka sections to display
  if ( $fonetyka_sections ) {
    $fonetyka_list_loop_array = las_list_loop( $fonetyka_sections, 'fonetyka', $user_progress );
  }
  else {
    $all_sections .= 'Wystąpił błąd i nie możemy wyświetlić szlaku.';
  }


  //
  //  Daleko w lesie
  //

  //  get advanced sections array
  $adv_sections_args = $sections_args;
  $adv_sections_args['post_parent'] = $advanced_sections_parent;
  $advanced_sections = get_posts( $adv_sections_args );


  // if there are any advanced sections to display
  if ( $advanced_sections ) {
    $adv_list_loop_array = las_list_loop( $advanced_sections, 'advanced', $user_progress );
  }
  else {
    $all_sections .= 'Wystąpił błąd i nie możemy wyświetlić szlaku.';
  }


  $all_sections .= $list_loop_array[0];
  $all_sections .= $fonetyka_list_loop_array[0];
  $all_sections .= $adv_list_loop_array[0];

  //  if there is section to open in advanced courses
  if ( $adv_list_loop_array[1] && ( $adv_list_loop_array[1] !== '' ) ) {
    $section_top_open = $adv_list_loop_array[1];
  }
  //  if there is section to open in basic courses
  elseif ( $list_loop_array[1] && ( $list_loop_array[1] !== '' ) ) {
    $section_top_open = $list_loop_array[1];
  }

  if ( $list_loop_array[2] && ( count( $list_loop_array[2] ) > 0 ) ) {
    $ids = $list_loop_array[2];
  }

  return array( $all_sections, $section_top_open, $ids );

}


//
//  List Loop
//
//  @return array( all sections at the level, sublist_to_open )
//  @sections (object) comes from get_posts() in las_get_all_sections()
//
function las_list_loop( $sections, $level, $user_progress ) {
  global $post; //  needed for setup_postdata

  $last_section_done  = true;
  $main_list          = '';
  $j                  = 1;
  $sublist_id         = '';
  $sublist_to_open    = '';
  $ids                = array();

  $main_list .= '<section id="section-' . $level . '" class="szlak__section">';

  $main_list .= '<h2 class="h1 szlak__section-h">';

  if ( $level === 'basic' ) {
    $main_list .= 'Początek drogi';
  }
  elseif ( $level === 'fonetyka' ) {
    $main_list .= 'Dźwięki';
  }
  elseif ( $level === 'advanced' ) {
    $main_list .= 'Daleko w lesie';
  }

  $main_list .= '</h2>';

  $main_list .= '<ol class="navbar__list szlak-list">';



  //  create content sections
  foreach ( $sections as $section ) {

    //  $section check
    //print_r($section);

    //
    //  Section title
    //
    $new_title = las_get_clean_title( $section->post_title );


    $sublist_id = 'sublist-' . $level . '-' . $j;


    //  user has done previous section
    //  show active link to next section
    if (     ( $last_section_done && ( $level === 'basic' ) )
          || ( $last_section_done && ( $level === 'fonetyka' ) )
          || ( $last_section_done && current_user_can( 'avanced_user' ) )
          //|| ( $last_section_done && current_user_can( 'edit_posts' ) )
        ) {

      //  li
      $main_list .= '<li>';

      //  link
      $main_list .= '<a id="btn-' . $sublist_id . '" class="btn szlak-list__btn" href="#' . $sublist_id . '">';
      $main_list .= $new_title;
      //$main_list .= '<i class="szlak-arrow"></i>';
      $main_list .= '</a>';

      //  set section to open
      $sublist_to_open = $sublist_id;

    }
    //  user can see the links
    //  but hasn't done the previous section
    //  the link is gray but active so user can see what is inside
    elseif (     ( $level === 'basic' )
              || ( $level === 'fonetyka' )
              || current_user_can( 'avanced_user' )
              //|| current_user_can( 'edit_posts' )
            ) {

      //   li
      $main_list .= '<li style="opacity:0.5">';

      //  link
      $main_list .= '<a id="btn-' . $sublist_id . '" class="btn szlak-list__btn" href="#' . $sublist_id . '">';
      $main_list .= $new_title;
      $main_list .= '</a>';

    }
    //  user can't see the links to chapters
    //  show them the upsale link
    else {

      //  li
      $main_list .= '<li style="opacity:0.5">';

      //  link
      $main_list .= '<a class="btn szlak-list__btn" href="#upsale">';
      $main_list .= $new_title;
      $main_list .= '</a>';

    }


    //  if user can see links to excersises
    if (    ( $level === 'basic' )
         || ( $level === 'fonetyka' )
         || current_user_can( 'avanced_user' )
         //|| current_user_can( 'edit_posts' )
        ) {

      //
      //  Begin sublist
      //

      $main_list .= '<ol id="' . $sublist_id . '" class="navbar__list szlak-sublist">';

      //  get the chapters for this section
      $chapters_args = array(
        'post_type'       => 'page',
        'post_parent'     => $section->ID,
        'posts_per_page'  => -1,
        'orderby'         => 'menu_order',
        'nopaging'        => true,
        'order'           => 'ASC'
      );

      $chapters = get_posts( $chapters_args );

      //  loop over chapters to form the sublist
      $sublist_array = las_sublist_loop( $chapters, $level, $user_progress, $last_section_done );

      //  add all the sections to list
      $main_list .= $sublist_array[ 0 ];

      //  assign section done
      $last_section_done = $sublist_array[ 1 ];

      //  assign ids array
      $ids = array_merge($ids, $sublist_array[ 2 ] );

      $main_list .= '</ol>';

      //
      //  End sublist
      //

    }


    $main_list .= '</li>';

    $j++;

  //  end foreach
  }
  wp_reset_postdata();


  //  close nav
  $main_list .= '</ol>';
  $main_list .= '</section>';

  //  return content sections
  return array( $main_list, $sublist_to_open, $ids );

}


//
//  Sublist Loop
//  @return sublist
//  @children and @user_progress come from las_list_loop()
//
function las_sublist_loop( $chapters, $level, $user_progress, $last_section_done ) {
  global $post; //  needed for setup_postdata

  $sublist = '';
  $previous_chapter_done = true;
  $wyzwanie = true;
  $ids = [];

  foreach ( $chapters as $post ) {
    setup_postdata( $post );

    $link   = get_permalink();
    $title  = $post->post_title;
    $slug   = $post->post_name;
    $id     = 'chapter-' . $post->ID;
    $ids[]  = $id;
    $correct_sum = las_get_wyzwanie_correct_sum( $user_progress, $slug );

    //  Inner li
    $sublist .= '<li>';


    //  done chapter
    //  user has done przewodnik
    //  and wyzwanie or there is no wyzwanie
    if (    $user_progress[ $slug ][ 'przewodnik' ]
         && ( count( $user_progress[ $slug ][ 'przewodnik' ] ) > 0 )
         && ( ( $correct_sum > 0 ) || has_category( 'bez-wyzwania' ) )
        ) {

      if ( has_category( 'bez-wyzwania' ) ) {
        $wyzwanie = false;
        $punkty = 0;
      }
      else {
        $punkty = $correct_sum;
      }

      //  popup
      $sublist .= '<a id="' . $id . '" class="btn szlak-sublist__btn" href="#popup" data-szlak-url="' . $link . '" data-szlak-punkty="' . $punkty . '" data-szlak-wyzwanie="' . $wyzwanie . '">';
      $sublist .= $title;

      if ( $wyzwanie ) {
        //  icons and points
        $sublist .= '<span class="szlak-sublist__result">';
          $sublist .= $punkty;
        $sublist .= '</span>';
      }

      //  experimental circles
      $sublist .= '<span class="szlak-sublist__icon-wrapper">';
        $sublist .= '<i class="szlak-sublist__icon"></i>';
      $sublist .= '</span>';
      $sublist .= '</a>';

    }
    //  user has done the previous section and previous chapter (or it is the first chapter in section)
    //  or has done previous chapter and is advanced user
    //  but user has not done the chapter (as checked in previous if)
    elseif (    ( $last_section_done && $previous_chapter_done )
             || ( $previous_chapter_done && current_user_can( 'avanced_user' ) )
            ) {

      //  direct link to przewodnik
      $sublist .= '<a id="' . $id . '" class="btn szlak-sublist__btn szlak-sublist__btn--active" href="' . $link . 'przewodnik/">';
      $sublist .= $title;
      $sublist .= '<div class="szlak-sublist__icon-wrapper">';
        $sublist .= '<i class="szlak-sublist__icon szlak-sublist__icon--inactive"></i>';
      $sublist .= '</div>';
      $sublist .= '<i class="szlak-arrow"></i>';
      $sublist .= '</a>';

      $previous_chapter_done = false;

    }
    //  user has no access to the link
    else {

      //  span
      $sublist .= '<span class="btn szlak-sublist__span" style="opacity:0.5">';
      $sublist .= $title;
      $sublist .= '<div class="szlak-sublist__icon-wrapper">';
        $sublist .= '<i class="szlak-sublist__icon szlak-sublist__icon--inactive"></i>';
      $sublist .= '</div>';
      $sublist .= '</span>';

      $previous_chapter_done = false;

    }


    $sublist .= '</li>';


  //  end foreach
  }


  //  Reset chapters loop data
  wp_reset_postdata();


  return array( $sublist, $previous_chapter_done, $ids );

}






//
//  Begin HTML
//

include( 'includes/head.php' );

?>

<section id="szlak-wrapper" class="section-trans wrapper group preload--hidden b-szlak">

  <h1 class="szlak-h1">Twój Szlak</h1>


  <div id="szlak" class="szlak">

    <?php

      $all_sections_array = las_get_all_sections( $user_progress );

      echo $all_sections_array[0];

    ?>

  </div>

</section>


<div id="szlak-post-popup" class="szlak-post-popup">
  <div class="szlak-post-popup__content section-content section-6-4">
    <div id="szlak-post-popup__section" class="section-white section-content rounded group centered szlak-post-popup__section">

      <div style="position:absolute;right:1rem;top:1rem;cursor:pointer;">X</div>

          <a href="" class="szlak-post-popup__btn" id="szlak-btn-przewodnik">
            <div class="szlak-post-popup__img"></div>
            <span class="btn btn-nav btn-white">Przewodnik</span>
      </a><a href="" class="szlak-post-popup__btn" id="szlak-btn-wyzwanie">
            <div class="szlak-post-popup__img"></div>
            <span class="btn btn-nav btn-white">Wyzwanie</span>
      </a><a href="" class="szlak-post-popup__btn" id="szlak-btn-ratownik">
            <div class="szlak-post-popup__img"></div>
            <span class="btn btn-nav btn-white">Ratownik</span>
      </a>

    </div>
  </div>
</div>


<script>
//  prepare Szlak
var las = new LasSzlak();
</script>


<?php

  //  Results
  if ( $last_wyzwanie_result && $last_wyzwanie_result['id'] ) {

    //  Remove last wyzwanie result from database
    //  the result is still in the var, so results can show
    //  this way same results don't show twice
    las_reset_last_wyzwanie_user_meta();

    include( stream_resolve_include_path( __DIR__ . '/includes/results.php' ) );
  }

?>


<script>
<?php
  //  there is a section to open
  if ( $all_sections_array[1] && ( $all_sections_array[1] !== '' ) ) {
    echo 'las.helper.sectionTopOpen = \'' . $all_sections_array[1] . '\';'  . "\r\n";
  }
?>

//  init Szlak
las.init();
</script>


<?php

include( 'includes/footer.php' );