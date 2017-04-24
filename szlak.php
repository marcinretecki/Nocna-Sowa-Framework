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


//
//  List Loop
//
//  @return all sections at the level
//  @courses (object) comes from get_posts() in las_get_all_courses()
//
function las_list_loop( $courses, $level ) {
  global $post; //  needed for setup_postdata

  $user_progress = las_get_user_progress();
  $first_section = true;
  $sections = '';
  $j = 1;

  //  echo link sections
  //echo '<div class="group space-x4">';

  $sections .= '<nav id="section-' . $level . '" class="szlak-section__nav">';

  if ( $level === 'basic' ) {
    $sections .= '<h2 class="szlak-section__h centered h1 size-3">Początek drogi</h2>';
  }
  elseif ( $level === 'advanced' ) {
    $sections .= '<h2 class="szlak-section__h centered h1 size-3">Daleko w lesie</h2>';
  }

  $sections .= '<ol class="navbar__list szlak-list">';



  //  create content sections
  foreach ( $courses as $section ) {

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
    $sections .= '<li style="display:block;">';


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

      $sections .= '<a class="btn szlak-list__btn js-szlak-btn" href="#sublist-' . $level . '-' . $j . '">';
      $sections .= $new_title;
      $sections .= '<i class="szlak-arrow"></i></a>';

    }
    else {

      //  możemy to zastąpić na link, który prowadzi do upsale
      $sections .= $new_title;

    }


    //  if user can see links to excersises
    if ( ( $level === 'basic' ) || current_user_can( 'edit_posts' ) || current_user_can( 'avanced_user' ) ) {

      //
      //  Begin sublist
      //
      $sections .= '<ol id="sublist-' . $level . '-' . $j . '" class="navbar__list szlak-sublist">';



      $sublist = las_sublist_loop( $chapters, $user_progress );

      $sections .= $sublist;

      //  close sublist
      $sections .= '</ol>';

    }


    $sections .= '</li>';

    $j++;

  //  end foreach
  }
  wp_reset_postdata();


  //  close nav
  $sections .= '</ol>';
  $sections .= '</nav>';

  //  return content sections
  return $sections;

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

    if ( $user_progress && ($user_progress[$slug]['wyzwanie-punkty'] && ( $user_progress[$slug]['wyzwanie-punkty'] > 0 ) ) ) {
      $punkty = $user_progress[$slug]['wyzwanie-punkty'];
    }
    else {
      $punkty = false;
    }

    //  if it is an editor or advanced user, we can give him a link to advanced courses


    //
    //  Inner li
    //
    $sublist .= '<li><a class="btn szlak-sublist__btn" ';

    //  if there is wyzwanie and user has done przewodnik
    if ( $user_progress && ( $user_progress[$slug]['przewodnik'] > 0 ) && !has_category('bez-wyzwania') ) {

      //  hash to show choice
      $sublist .= 'href="#popup" data-szlak-url="' . $link . '" data-szlak-punkty="' . $punkty . '">';

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
    elseif ( $user_progress && !$user_progress[$slug]['przewodnik'] ) {

      //  direct link
      $sublist .= 'href="' . $link . 'przewodnik/">';

      $sublist .= $title;

      //  icons
      $sublist .= '<div class="szlak-icons">';

      //  inactive przewodnik
      $sublist .= '<i class="szlak-icon szlak-icon--post szlak-icon--inactive"></i>';

      //  close icons
      $sublist .= '</div>';


    }
    //  there is no wyzwanie but user has done przewodnik
    elseif ( $user_progress && $user_progress[$slug]['przewodnik'] ) {
      $sublist .= 'href="' . $link . 'przewodnik/">' . $title;

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
//  Show all courses
//  Gets all courses lists, and loop through them
//
function las_get_all_courses() {

  // Kursy IDs
  $basic_courses_parent = 20;
  $advanced_courses_parent = 24;
  $return = '';

  $courses_args = array(
    'post_type'       => 'page',
    'post_parent'     => $basic_courses_parent,
    'posts_per_page'  => -1,
    'orderby'         => 'menu_order',
    'nopaging'        => true,
    'order'           => 'ASC'
  );

  $basic_courses = get_posts( $courses_args );

  $courses_args['post_parent'] = $advanced_courses_parent;

  $advanced_courses = get_posts( $courses_args );

  // if there are any courses to display
  //  LOOP them
  if ( $basic_courses ) {
    $return = las_list_loop( $basic_courses, 'basic' );
  }
  else {
    $return .= 'Wystąpił błąd i nie możemy wyświetlić szlaku.';
  }

  // if there are any advanced courses to display
  if ( $advanced_courses ) {
    $return .= $advanced_sections = las_list_loop( $advanced_courses, 'advanced' );
  }
  else {
    $return .= 'Wystąpił błąd i nie możemy wyświetlić szlaku.';
  }

  return $return;

}



//
//  Check if user finished section
//
function las_is_finished_section( $user_progress ) {

}

//
//  Check if user finished chapter
//
function las_is_finished_chapter( $user_progress ) {

}



//
//  Get results from last wyzwanie
//
function las_get_last_wyzwanie_result() {

  $user_progress = las_get_user_progress();

  //  if the last is empty, don't show anything
  if ( count( $user_progress['last'] ) === 0 ) {
    return false;
  }

  //  these should be in this order
  $last_chapter = $user_progress['last'][0];
  $last_type = $user_progress['last'][1];
  $last_access = $user_progress['last'][2];
  $first_time = $user_progress['last'][3];

  $last_wyzwanie_result = $user_progress[$last_chapter][$last_type][$last_access];
  $last_wyzwanie_result['id'] = $user_progress[$last_chapter][ 'id' ];

  if ( $first_time ) {
    $last_wyzwanie_result[ 'first_time' ] = true;
  }

  $last_wyzwanie_result['url'] = '';

  return $last_wyzwanie_result;

}



//
//  Show result
//
//
function las_show_last_wyzwanie_result( $last_wyzwanie_result ) {


  //
  //  TODO
  //  jeśli było dużo błędów, albo ćwiczenie nie było zrobione całe, pytamy, czy chce spróbować jeszcze raz, albo wrócić do przewodnika
  //  jeśli nie było błędów, to sugestia, żeby wrócić na szlak
  //  animacja, która odkryje nastepny chapter
  //


  //  if there are no examples
  //  there is nothing to show
  if ( !$last_wyzwanie_result['ex'] ) {
    return;
  }

  $wyzwanie_link = get_permalink( $last_wyzwanie_result['id'] );

  $echo = '';

  $echo .= '<div id="szlak-result" class="szlak-post-popup" style="display:block;background-color:rgba(60, 69, 76, 0.5);">';
  $echo .= '<div id="szlak-result-content" class="szlak-post-popup__content section-content section-6-4">';
  $echo .= '<div class="section-white section-content rounded group centered szlak-post-popup__section">';

  //  if there is no time
  //  user has not finished the chapter
  if ( !$last_wyzwanie_result['t'] && $last_wyzwanie_result['first_time'] ) {
    $echo .= 'Nie zrobiłeś wszystkich przykładów. Może spróbujesz jeszcze raz? Jesli były za trudne, wróć do przedownika albo do poprzednich wyzwań. Jeśli nie zrobiłeś wyzwania, bo wydawało Ci się nudne, daj nam o tym znać.';
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

    $echo .= 'Na swojej ścieżce napotkałeś 27 nowych słów, 15 gatunków roślin i 3 zwierzęta.';
    $echo .= '<br />';

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

      /*$test =  json_decode( stripslashes($_COOKIE["lasChallangeProgress"] ), true );

      echo '<p style="display:none">';
      var_dump($test);
      echo '</p>';*/


      echo las_get_all_courses();

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
  $last_wyzwanie_result = las_get_last_wyzwanie_result();

  if ( $last_wyzwanie_result ) {

    //  reset the the last, so it doesn't show again
    las_reset_last_wyzwanie_user_meta();

    las_show_last_wyzwanie_result( $last_wyzwanie_result );
  }
?>


<script>
//  init Szlak
var las = new LasSzlak();
las.init();
</script>


<?php

include( 'includes/footer.php' );