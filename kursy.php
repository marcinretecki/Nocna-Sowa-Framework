<?php
//
// Template Name: Kursy
//

global $post;
$id = $post->ID;


include( 'includes/head.php' );
?>

<div class="section-content">

  <h2 class="h1 size-4">Kursy</h2>

  <?php

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

      echo '<p class="size-0">User progress for testing: ';
      var_dump( $user_progress );
      echo '</p>';

      foreach ( $courses as $post ) {

        //print_r($post);

        //  Begin section
        echo '<section class="section-white space pad">';
        echo '<h3>' . $post->post_title . '</h3>';


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

          echo '<p>';

          if ( ( $level === 'basic' ) || current_user_can( 'edit_posts' ) || current_user_can( 'avanced_user' ) ) {
            //  if it is an editor or advanced user, we can give him a link to advanced courses

            echo '<a href="' . $link . 'przewodnik/">' . $title . '</a>';

            if ( $user_progress && ( $user_progress[$slug]['przewodnik'] > 0 ) && !has_category('bez-wyzwania') ) {
              //  if there is a wyzwanie and user has done przewodnik, show him the link
              echo ' <a class="" href="' . $link . 'wyzwanie/"><i>Wyzwanie</i></a> ';

            }

          }
          else {
            //  user sees only names of chapters
            echo $title;

          }

          echo '</p>';

        }
        //  Reset children loop data
        wp_reset_postdata();

        // End section
        echo '</section>';

      }
      wp_reset_postdata();

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


      echo '<h2>Podstawowy</h2>';
      if ( $basic_courses ) {
        // if there are any courses to display
        las_courses_loop( $basic_courses, 'basic' );
      }
      else {
        echo 'Wystąpił błąd i nie możemy wyświetlić kursów.';
      }


      echo '<h2>Rozszerzony</h2>';
      if ( $advanced_courses ) {
        // if there are any advanced courses to display
        las_courses_loop( $advanced_courses, 'advanced' );
      }
      else {
        echo 'Wystąpił błąd i nie możemy wyświetlić kursów.';
      }


    }
    las_show_all_courses();


  ?>

</div>

<?php include( 'includes/footer.php' ); ?>