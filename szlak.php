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



global $post;
$id = $post->ID;
$user_progress = las_get_user_progress();


//
//  List Loop
//
//  @return all sections at the level
//  @sections (object) comes from get_posts() in las_get_all_sections()
//
function las_list_loop( $sections, $level, $user_progress ) {
  global $post; //  needed for setup_postdata

  $first_section = true;
  $main_list = '';
  $j = 1;

  $main_list .= '<section id="section-' . $level . '" class="szlak-section__nav">';

  if ( $level === 'basic' ) {
    $main_list .= '<h2 class="szlak-section__h centered h1 size-3">Początek drogi</h2>';
  }
  elseif ( $level === 'advanced' ) {
    $main_list .= '<h2 class="szlak-section__h centered h1 size-3">Daleko w lesie</h2>';
  }

  $main_list .= '<ol class="navbar__list szlak-list">';



  //  create content sections
  foreach ( $sections as $section ) {

    //  $section check
    //print_r($section);


    $chapters_args = array(
      'post_type'       => 'page',
      'post_parent'     => $section->ID,
      'posts_per_page'  => -1,
      'orderby'         => 'menu_order',
      'nopaging'        => true,
      'order'           => 'ASC'
    );

    $chapters = get_posts( $chapters_args );


    //
    //  Outer li
    //
    $main_list .= '<li>';


    //  Section title

    //  remove the number from the title
    $new_title = explode( '. ', $section->post_title );

    //  check if there was a number in the title
    if ( $new_title[1] ) {
      $new_title = $new_title[1];
    }
    else {
      $new_title = $new_title[0];
    }



    //
    //  trzeba sprawdzić, czy user wykonał cały poprzedni dział
    //


    if ( ( $level === 'basic' ) || current_user_can( 'edit_posts' ) || current_user_can( 'avanced_user' ) ) {

      $main_list .= '<a class="btn szlak-list__btn js-szlak-btn" href="#sublist-' . $level . '-' . $j . '">';
      $main_list .= $new_title;
      $main_list .= '<i class="szlak-arrow"></i></a>';

    }
    else {

      //  możemy to zastąpić na link, który prowadzi do upsale
      $main_list .= $new_title;

    }


    //  if user can see links to excersises
    if ( ( $level === 'basic' ) || current_user_can( 'edit_posts' ) || current_user_can( 'avanced_user' ) ) {

      //
      //  Begin sublist
      //
      $main_list .= '<ol id="sublist-' . $level . '-' . $j . '" class="navbar__list szlak-sublist">';



      $sublist = las_sublist_loop( $chapters, $user_progress );

      $main_list .= $sublist;

      //  close sublist
      $main_list .= '</ol>';

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
  return $main_list;

}


//
//  Sublist Loop
//  @return sublist
//  @children and @user_progress come from las_list_loop()
//
function las_sublist_loop( $chapters, $user_progress ) {
  global $post; //  needed for setup_postdata

  $sublist = '';

  foreach ( $chapters as $post ) {
    setup_postdata( $post );

    $link = get_permalink();
    $title = $post->post_title;
    $slug = $post->post_name;

    if (    $user_progress[ $slug ]
         && ( $user_progress[ $slug ][ 'wyzwanie-suma-ex' ] > 0 ) ) {

      $punkty = $user_progress[ $slug ][ 'wyzwanie-suma-ex' ];

    }
    else {
      $punkty = false;
    }

    //  if it is an editor or advanced user, we can give him a link to advanced courses


    //
    //  Inner li
    //
    $sublist .= '<li>';

    //  if there is wyzwanie and user has done przewodnik
    if (    $user_progress[ $slug ]
         && ( count( $user_progress[ $slug ][ 'przewodnik' ] ) > 0 )
         && !has_category( 'bez-wyzwania' ) ) {

      //  hash to show choice
      $sublist .= '<a class="btn szlak-sublist__btn" href="#popup" data-szlak-url="' . $link . '" data-szlak-punkty="' . $punkty . '">';

      $sublist .= $title;


      //  icons
      $sublist .= '<div class="szlak-icons">';

      // user has done wyzwanie
      if ( $punkty > 0 ) {
        $sublist .= '<i class="szlak-icon szlak-icon--mountain"></i>' . $punkty;
      }
      //  user has not done wyzwanie but it is available
      else {
        $sublist .= '<i class="szlak-icon szlak-icon--mountain szlak-icon--inactive"></i>';
      }

      //  close icons
      $sublist .= '</div>';

    }
    //  if user has not done przewodnik
    elseif ( !$user_progress[ $slug ][ 'przewodnik' ] || ( count( $user_progress[ $slug ][ 'przewodnik' ] ) === 0 ) ) {

      //  direct link
      $sublist .= '<a class="btn szlak-sublist__btn szlak-sublist__btn--inactive" href="' . $link . 'przewodnik/">';

      $sublist .= $title;

      //  icons
      $sublist .= '<div class="szlak-icons">';

      //  inactive przewodnik
      $sublist .= '<i class="szlak-icon szlak-icon--post szlak-icon--inactive"></i>';

      //  close icons
      $sublist .= '</div>';


    }
    //  there is no wyzwanie but user has done przewodnik
    elseif ( $user_progress[ $slug ] && $user_progress[$slug]['przewodnik'] ) {
      $sublist .= '<a class="btn szlak-sublist__btn" href="' . $link . 'przewodnik/">' . $title;

      //  icons
      $sublist .= '<div class="szlak-icons">';

      //  inactive przewodnik
      $sublist .= '<i class="szlak-icon szlak-icon--post"></i>';

      //  close icons
      $sublist .= '</div>';
    }


    //  experimental circles
    $sublist .= '<div class="szlak-sublist__icon-wrapper">';
      $sublist .= '<i class="szlak-sublist__icon"></i>';
    $sublist .= '</div>';

    $sublist .= '</a>';

  //  end foreach
  }


  //  Reset chapters loop data
  wp_reset_postdata();


  return $sublist;

}



//
//  Show all sections
//  Gets all sections lists, and loop through them
//
function las_get_all_sections( $user_progress ) {

  // Kursy IDs
  $basic_sections_parent = 20;
  $advanced_sections_parent = 24;
  $return = '';

  $sections_args = array(
    'post_type'       => 'page',
    'post_parent'     => $basic_sections_parent,
    'posts_per_page'  => -1,
    'orderby'         => 'menu_order',
    'nopaging'        => true,
    'order'           => 'ASC'
  );

  //  get sections array
  $basic_sections = get_posts( $sections_args );

  $sections_args['post_parent'] = $advanced_sections_parent;

  $advanced_sections = get_posts( $sections_args );

  // if there are any sections to display
  //  LOOP them
  if ( $basic_sections ) {
    $return = las_list_loop( $basic_sections, 'basic', $user_progress );
  }
  else {
    $return .= 'Wystąpił błąd i nie możemy wyświetlić szlaku.';
  }

  // if there are any advanced sections to display
  if ( $advanced_sections ) {
    $return .= las_list_loop( $advanced_sections, 'advanced', $user_progress );
  }
  else {
    $return .= 'Wystąpił błąd i nie możemy wyświetlić szlaku.';
  }

  return $return;

}




//
//  Show result
//  echos the whole thing
//
function las_show_last_wyzwanie_result( $last_wyzwanie_result, $user_progress ) {


  //
  //  TODO
  //  jeśli było dużo błędów, albo ćwiczenie nie było zrobione całe, pytamy, czy chce spróbować jeszcze raz, albo wrócić do przewodnika
  //  jeśli nie było błędów, to sugestia, żeby wrócić na szlak
  //  animacja, która odkryje nastepny chapter
  //


  //  if there are no examples
  //  there is nothing to show
  if ( !$last_wyzwanie_result['ex'] ) {
    //return;
  }

  $wyzwanie_link = get_permalink( $last_wyzwanie_result['id'] );
  $img_url = las_get_user_profile_img();
  $user_exp = las_get_user_exp( $user_progress );
  $level_array = las_get_user_level_array( $user_exp );
  $user_level = $level_array[0];
  $exp_for_next = $level_array[1];

  $echo = '';

  $echo .= '<div id="szlak-result" class="szlak-post-popup" style="display:block;background-color:rgba(60, 69, 76, 0.5);">';
  $echo .= '<div id="szlak-result-content" class="szlak-post-popup__content section-content section-6-4">';
  $echo .= '<div class="section-white section-content rounded group centered szlak-post-popup__section">';

  $echo .= '<img src="' . $img_url . '" style="width:8rem !important;height:8rem !important;border-radius:50%;overflow:hidden;display:block;" class="center" />';

  $echo .= 'Doświadczenie: ' . $user_exp;
  $echo .= '<br />';
  $echo .= 'Level: ' . $user_level;
  $echo .= '<br />';
  $echo .= 'Nastepny level: ' . $exp_for_next;
  $echo .= '<br />';

  //  if there is no time
  //  user has not finished the chapter
  if ( !$last_wyzwanie_result['t'] && $last_wyzwanie_result['first_time'] ) {

    $echo .= 'Nie zrobiłeś wszystkich przykładów. Może spróbujesz jeszcze raz? Jeśli były za trudne, wróć do przewodnika albo do poprzednich wyzwań. Jeśli nie zrobiłeś wyzwania, bo wydawało Ci się nudne, daj nam o tym znać.';

  }
  else {

    $echo .= 'Czas: ' . $last_wyzwanie_result['t'];
    $echo .= '<br />';
    $echo .= 'Przykłady: ' . $last_wyzwanie_result['ex'];
    $echo .= '<br />';
    if ( $last['wrong'] ) {
      $echo .= 'Błędy: ' . $last_wyzwanie_result['wrong'];
      $echo .= '<br />';
    }

    //  Na swojej ścieżce napotkałeś 27 nowych słów, 15 gatunków roślin i 3 zwierzęta.


  }

  $echo .= '<a href="' . $wyzwanie_link . 'wyzwanie/" class="btn btn-green">Powtórz Wyzwanie</a>';
  $echo .= '<button id="close-result" class="btn btn-green">Wróć na Szlak</button>';

  $echo .= '</div>';
  $echo .= '</div>';
  $echo .= '</div>';

  echo $echo;

}



//
//  Begin HTML
//

include( 'includes/head.php' );

?>

<section id="szlak-wrapper" class="section-trans wrapper group" style="background-image: url('/las/c/i/las_test_8.jpg');">

  <h1 class="szlak-h1 size-6 centered">Twój Szlak</h1>


  <div id="szlak-section" class="szlak-section">

    <?php

      // $test =  json_decode( stripslashes($_COOKIE["lasChallangeProgress"] ), true );

      // echo '<p style="display:none">';
      // var_dump($test);
      // echo '</p>';


      echo las_get_all_sections( $user_progress );

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
      </a><a href="" class="szlak-post-popup__btn" id="szlak-btn-sos">
            <div class="szlak-post-popup__img"></div>
            <span class="btn btn-nav btn-white">SOS</span>
      </a>

    </div>
  </div>
</div>

<?php
  $last_wyzwanie_result = las_get_last_wyzwanie_result( $user_progress );

/*  if ( $last_wyzwanie_result ) {

    //  reset the the last, so it doesn't show again
    las_reset_last_wyzwanie_user_meta();

    las_show_last_wyzwanie_result( $last_wyzwanie_result, $user_progress );
  }*/

  las_show_last_wyzwanie_result( $last_wyzwanie_result, $user_progress );
?>


<script>
//  init Szlak
var las = new LasSzlak();
las.init();
</script>


<?php

include( 'includes/footer.php' );