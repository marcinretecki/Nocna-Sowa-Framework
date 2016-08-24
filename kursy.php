<?php
/*
  Template Name: Kursy
*/

global $post;
$id = $post->ID;


include( 'includes/head.php' );
?>


<section class="section-content">

  <h2 class="h1 size-4">Kursy</h2>

  <?php
      $current_user = wp_get_current_user();

      echo '<pre style="display:none">';
      print_r( $current_user );
      echo '</pre>';


    function las_show_courses() {

      if ( current_user_can( 'edit_posts' ) || current_user_can( 'avanced_user' ) ) {
        // if it is an editor or advanced user, we can show him advanced course
        // later it would be wise to add other courses here as well
        $post_parent__in = array(20, 24);
      }
      else if ( current_user_can( 'basic_user' ) ) {
        // if it is a basic user, show just basic course
        $post_parent__in = array(20);
      }

      $course_args = array(
        'post_type'       => 'page',
        'post_parent__in' => $post_parent__in,
        'posts_per_page'  => -1,
        'orderby'         => 'menu_order',
        'nopaging'        => true,
        'order'           => 'ASC'
      );

      $courses = get_posts( $course_args );

      $current_level = 'basic';

      foreach ( $courses as $post ) : setup_postdata( $post );

        print_r( get_the_category() );

      endforeach;
      wp_reset_postdata();

    }
    las_show_courses();


  ?>

</section>

<?php include( 'includes/footer.php' ); ?>