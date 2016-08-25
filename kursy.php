<?php
/*
  Template Name: Kursy
*/

global $post;
$id = $post->ID;


include( 'includes/head.php' );
?>

<div class="section-content">

  <h2 class="h1 size-4">Kursy</h2>

  <?php
    $user_progress = las_get_user_progress();
    echo '<pre>';
    print_r( $user_progress );
    echo '</pre>';


    function las_courses_loop($courses) {
      global $post; // needed for setup_postdata

      foreach ( $courses as $post ) {
        // the Loop

        setup_postdata( $post );

        //print_r($post);

        if ( substr($post->post_name, -1) === '1' ) {
          $post_category = get_the_category( $post->ID )[0]->name;

          echo '<h3>'
             . $post_category
             . '</h3>';
        }

        $link = get_permalink();
        $title = get_the_title();

        echo '<p>'
           . $title
           . '<br />'
           . '<a href="' . $link . '/przewodnik/">Przewodnik</a> | '
           . '<a href="' . $link . '/wyzwanie/">Wyzwanie</a> | '
           . '<a href="' . $link . '/">Dyskusja</a>'
           . '</p>';

        //
        // Has user done this part?
        //


      }
      wp_reset_postdata();
    }

    function las_show_courses() {

      // Kursy IDs
      $basic_courses_parent = 20;
      $advanced_courses_parent = 24;

      $courses_args = array(
        'post_type'       => 'page',
        'post_parent'     => $basic_courses_parent,
        'posts_per_page'  => -1,
        'orderby'         => 'name',
        'nopaging'        => true,
        'order'           => 'ASC'
      );

      $basic_courses = get_posts( $courses_args );

      if ( current_user_can( 'edit_posts' ) || current_user_can( 'avanced_user' ) ) {
        // if it is an editor or advanced user, we can show him advanced course

        $courses_args['post_parent'] = $advanced_courses_parent;

        $advanced_courses = get_posts( $courses_args );

      }
      elseif ( current_user_can( 'basic_user' ) ) {
        // if it is a basic user, don't show advanced
        $advanced_courses = false;
      }


      echo '<h2>Podstawowy</h2>';
      if ( $basic_courses ) {
        // if there are any courses to display
        las_courses_loop( $basic_courses );
      }
      else {
        echo 'Wystąpił błąd i nie możemy wyświetlić kursów.';
      }


      echo '<h2>Rozszerzony</h2>';
      if ( $advanced_courses ) {
        // if there are any advanced courses to display
        las_courses_loop( $advanced_courses );
      }
      else {
        echo 'napisz coś tu...';
      }


    }
    las_show_courses();


  ?>

</div>

<?php include( 'includes/footer.php' ); ?>