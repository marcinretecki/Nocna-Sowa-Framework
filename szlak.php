<?php
//
// Template Name: Szlak
//

global $post;
$id = $post->ID;


//
// Custom Loop
// it prints courses list
//
// @courses (object) comes from get_posts() in las_show_all_courses()
//
function las_courses_loop($courses, $level) {
  global $post; //  needed for setup_postdata

  $user_progress = las_get_user_progress();

  $first_section = true;

  echo '<p style="display:none">User progress for testing: ';
  var_dump( $user_progress );
  echo '</p>';

  $title_array = [];
  $sections = '';
  $i = 0;


  //  create content sections
  foreach ( $courses as $post ) {

    //  $post check
    //print_r($post);

    //  add title to array
    $title_array[$i] = $post->post_title;

    //  if user can see links to excersises
    if ( ( $level === 'basic' ) || current_user_can( 'edit_posts' ) || current_user_can( 'avanced_user' ) ) {

      //  Begin section
      $sections .= '<section id="section-' . $level . '-' . $i . '" class="section-white space col-8 las-szlak-section" style="display:none;">';

      $sections .= '<a href="#section-' . $level . '" class="btn btn-white btn-nav las-szlak-section__back-btn">&laquo; Wróć</a>';

      $sections .= '<h3 class="las-szlak-section__h centered h1 size-3">' . $post->post_title . '</h3>';

      $sections .= '<ul class="navbar__list las-szlak-list las-szlak-list--posts">';

      $children_args = array(
        'post_type'       => 'page',
        'post_parent'     => $post->ID,
        'posts_per_page'  => -1,
        'orderby'         => 'menu_order',
        'nopaging'        => true,
        'order'           => 'ASC'
      );

      $children = get_posts( $children_args );

      foreach ( $children as $post ) {
        setup_postdata( $post );

        $link = get_permalink();
        $title = $post->post_title;
        $slug = $post->post_name;

        //  if it is an editor or advanced user, we can give him a link to advanced courses

          $sections .= '<li><a class="btn btn-dark-outline las-szlak-list__btn las-szlak-list__btn--light" ';

          //  if there is wyzwanie and user has done przewodnik
          if ( $user_progress && ( $user_progress[$slug]['przewodnik'] > 0 ) && !has_category('bez-wyzwania') ) {

            if ( $user_progress[$slug]['wyzwanie-punkty'] ) {
              $punkty = $user_progress[$slug]['wyzwanie-punkty'];
            }
            else {
              $punkty = 0;
            }

            //  hash to show choice
            $sections .= 'href="#popup" data-szlak-url="' . $link . '" data-szlak-punkty="' . $punkty . '">';

            $sections .= $title;

            //  icons
            $sections .= '<span class="las-szlak__icons">';

            // active wyzwanie
            if ( $user_progress[$slug]['wyzwanie-punkty'] && ( $user_progress[$slug]['wyzwanie-punkty'] > 0 ) ) {
              $sections .= '<span class="las-szlak__icon las-szlak__icon--mountain"></span>';
            }
            //  inactive wyzwanie
            else {
              $sections .= '<span class="las-szlak__icon las-szlak__icon--mountain las-szlak__icon--inactive"></span>';
            }

            //  active przewodnik
            $sections .= '<span class="las-szlak__icon las-szlak__icon--post"></span>';

            //  close icons
            $sections .= '</span>';

          }
          //  if user has not done przewodnik
          elseif ( $user_progress && !$user_progress[$slug]['przewodnik'] ) {

            //  direct link
            $sections .= 'href="' . $link . 'przewodnik/">';

            $sections .= $title;

            //  icons
            $sections .= '<span class="las-szlak__icons">';

            //  inactive przewodnik
            $sections .= '<span class="las-szlak__icon las-szlak__icon--post las-szlak__icon--inactive"></span>';

            //  close icons
            $sections .= '</span>';


          }
          //  there is no wyzwanie
          else {
            $sections .= 'href="' . $link . 'przewodnik/">' . $title;
          }

          $sections .= '</a>';

      //  end foreach
      }

    //  end if user can see links to excersises
    }

    //  Reset children loop data
    wp_reset_postdata();

    $sections .= '</ul>';

    // End section
    $sections .= '</section>';

    $i++;

  //  end foreach
  }
  wp_reset_postdata();


  $j = 0;
  $l = count( $title_array );

  //  echo link sections
  echo '<div class="group space-x4">';

  echo '<nav id="section-' . $level . '" class="section-dark col-8 las-szlak-section-nav" style="box-shadow:0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);overflow:visible;">';

  if ( $level === 'basic' ) {
    echo '<h2 class="las-szlak-section__h centered h1 size-3">Początek drogi</h2>';
  }
  elseif ( $level === 'advanced' ) {
    echo '<h2 class="las-szlak-section__h centered h1 size-3">Daleko w lesie</h2>';
  }

  echo '<ul class="navbar__list las-szlak-list">';

  for ( $j; $j < $l; $j++ ) {

    //  remove the number from the title
    $new_title = explode( '. ', $title_array[$j] );

    //  check if there was a number in the title
    if ( $new_title[1] ) {
      $new_title = $new_title[1];
    }
    else {
      $new_title = $new_title[0];
    }

    echo '<li>';

    if ( ( $level === 'basic' ) || current_user_can( 'edit_posts' ) || current_user_can( 'avanced_user' ) ) {

      echo '<a class="btn btn-dark las-szlak-list__btn las-szlak-list__btn--arrow js-szlak-btn" href="#section-' . $level . '-' . $j . '">' . $new_title . '</a>';

    }
    else {

      //  możemy to zastąpić na link, który prowadzi do upsale

      echo $new_title;

    }

    echo '</li>';

  }

  echo '</ul>';
  echo '</nav>';

  //  echo content sections
  echo $sections;

  //  close row
  echo '</div>';

}




//
// Show all courses
// Gets all courses lists, and loop through them
//
function las_show_all_courses() {

  // Kursy IDs
  $basic_courses_parent = 20;
  $advanced_courses_parent = 24;

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
  if ( $basic_courses ) {
    las_courses_loop( $basic_courses, 'basic' );
  }
  else {
    echo 'Wystąpił błąd i nie możemy wyświetlić szlaku.';
  }

  // if there are any advanced courses to display
  if ( $advanced_courses ) {
    las_courses_loop( $advanced_courses, 'advanced' );
  }
  else {
    echo 'Wystąpił błąd i nie możemy wyświetlić szlaku.';
  }


}



include( 'includes/head.php' );
?>

<section class="section-trans wrapper" style="background-image: url('/i/las_test_7.jpg');">

  <div class="section-content section-8-2">

    <h1 class="size-6 centered space-0 text-shadow">Twój Szlak</h1>

  </div>

  <div id="szlak-wrapper" class="section-content">

    <?php

      $test =  json_decode( stripslashes($_COOKIE["lasChallangeProgress"] ), true );

      echo '<p style="display:none">';
      var_dump($test);
      echo '</p>';


      las_show_all_courses();

    ?>

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

  </div>

<?php include( 'includes/footer.php' ); ?>


<script>
//  init Szlak
var lasSzlak = new LasSzlak();
lasSzlak.init();
</script>