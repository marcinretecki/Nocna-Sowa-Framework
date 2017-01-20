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

  /*echo '<p style="display:none">User progress for testing: ';
  var_dump( $user_progress );
  echo '</p>';*/

  $title_array = [''];
  $sections = '';
  $i = 1;


  //  create content sections
  foreach ( $courses as $post ) {

    //  $post check
    //print_r($post);

    //  add title to array
    $title_array[$i] = $post->post_title;

    //  if user can see links to excersises
    if ( ( $level === 'basic' ) || current_user_can( 'edit_posts' ) || current_user_can( 'avanced_user' ) ) {

      //  Begin section
      $sections .= '<section id="section-' . $level . '-' . $i . '" class="wrapper wrapper--szlak-section__sublist" style="display:none;">';

      $sections .= '<div class="szlak-section__sublist">';

      $sections .= '<a href="#section-' . $level . '" class="szlak-arrow szlak-arrow--prev"></a>';

      $sections .= '<h3 class="szlak-section__h centered h1 size-3" style="color:#000;">' . $post->post_title . '</h3>';

      $sections .= '<ol class="navbar__list szlak-list">';

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

        if ( $user_progress[$slug]['wyzwanie-punkty'] && ( $user_progress[$slug]['wyzwanie-punkty'] > 0 ) ) {
          $punkty = $user_progress[$slug]['wyzwanie-punkty'];
        }
        else {
          $punkty = false;
        }

        //  if it is an editor or advanced user, we can give him a link to advanced courses

          $sections .= '<li><a class="btn szlak-list__btn szlak-list__btn--light" ';

          //  if there is wyzwanie and user has done przewodnik
          if ( $user_progress && ( $user_progress[$slug]['przewodnik'] > 0 ) && !has_category('bez-wyzwania') ) {

            //  hash to show choice
            $sections .= 'href="#popup" data-szlak-url="' . $link . '" data-szlak-punkty="' . $punkty . '">';

            $sections .= $title;

            //  icons
            $sections .= '<div class="szlak-icons">';

            // user has done wyzwanie
            if ( $punkty > 0 ) {
              $sections .= '<i class="szlak-icon szlak-icon--mountain"></i>' . $punkty;
            }
            //  user has not done wyzwanie but it is available
            else {
              $sections .= '<i class="szlak-icon szlak-icon--mountain szlak-icon--inactive"></i>';
            }

            //  close icons
            $sections .= '</div>';

          }
          //  if user has not done przewodnik
          elseif ( $user_progress && !$user_progress[$slug]['przewodnik'] ) {

            //  direct link
            $sections .= 'href="' . $link . 'przewodnik/">';

            $sections .= $title;

            //  icons
            $sections .= '<div class="szlak-icons">';

            //  inactive przewodnik
            $sections .= '<i class="szlak-icon szlak-icon--post szlak-icon--inactive"></i>';

            //  close icons
            $sections .= '</div>';


          }
          //  there is no wyzwanie but user has done przewodnik
          elseif ( $user_progress && $user_progress[$slug]['przewodnik'] ) {
            $sections .= 'href="' . $link . 'przewodnik/">' . $title;

            //  icons
            $sections .= '<div class="szlak-icons">';

            //  inactive przewodnik
            $sections .= '<i class="szlak-icon szlak-icon--post"></i>';

            //  close icons
            $sections .= '</div>';
          }

          $sections .= '</a>';

      //  end foreach
      }

    //  end if user can see links to excersises
    }

    //  Reset children loop data
    wp_reset_postdata();

    $sections .= '</ol>';

    // End section
    $sections .= '</div>';
    $sections .= '</section>';

    $i++;

  //  end foreach
  }
  wp_reset_postdata();


  $j = 1;
  $l = count( $title_array );

  //  echo link sections
  //echo '<div class="group space-x4">';

  echo '<nav id="section-' . $level . '" class="szlak-section__nav">';

  if ( $level === 'basic' ) {
    echo '<h2 class="szlak-section__h centered h1 size-3">Początek drogi</h2>';
  }
  elseif ( $level === 'advanced' ) {
    echo '<h2 class="szlak-section__h centered h1 size-3">Daleko w lesie</h2>';
  }

  echo '<ol class="navbar__list szlak-list">';

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

      echo '<a class="btn szlak-list__btn szlak-list__btn--nav js-szlak-btn" href="#section-' . $level . '-' . $j . '">';
      echo $new_title;
      echo '<i class="szlak-arrow"></i></a>';

    }
    else {

      //  możemy to zastąpić na link, który prowadzi do upsale

      echo $new_title;

    }

    echo '</li>';

  }

  echo '</ol>';
  echo '</nav>';

  //  return content sections
  return $sections;

  //  close row
  //echo '</div>';

}




//
// Show all courses
// Gets all courses lists, and loop through them
//
function las_show_all_courses() {

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
  if ( $basic_courses ) {
    $return = las_courses_loop( $basic_courses, 'basic' );
  }
  else {
    $return .= 'Wystąpił błąd i nie możemy wyświetlić szlaku.';
  }

  // if there are any advanced courses to display
  if ( $advanced_courses ) {
    $return .= $advanced_sections = las_courses_loop( $advanced_courses, 'advanced' );
  }
  else {
    $return .= 'Wystąpił błąd i nie możemy wyświetlić szlaku.';
  }

  return $return;

}



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


      $szlak_sections = las_show_all_courses();

    ?>

  </div>

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

</section>

<?php echo $szlak_sections; ?>


<script>
//  init Szlak
var lasSzlak = new LasSzlak();
lasSzlak.init();
</script>


<?php

include( 'includes/footer.php' );