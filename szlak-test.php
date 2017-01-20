<?php
/*
Template Name: Szlak Test
*/


include( 'includes/head.php' );


?>

<div class="section-dark">

  <div class="section-content section-6-4">

    <div class="row">
      <div class="col-10 center">

        <?php


          $green_light = '<span style="width:0.5rem;height:0.5rem;border-radius:50%;vertical-align: middle;margin-right:1rem;background-color:#308c8c;display:inline-block;"></span>';
          $red_light = '<span style="width:0.5rem;height:0.5rem;border-radius:50%;vertical-align: middle;margin-right:1rem;background-color:#dd4b39;display:inline-block;"></span>';


          $children_args = array(
            'post_type'       => 'page',
            'posts_per_page'  => -1,
            'post_parent'     => 10,
            'orderby'         => 'menu_order',
            'nopaging'        => true,
            'order'           => 'ASC'
          );

          $children = get_posts( $children_args );

          foreach ( $children as $post ) {
            setup_postdata( $post );

            echo '<h2 class="h1">' . $post->post_title . '</h2>';

            $children_args_2 = array(
              'post_type'       => 'page',
              'posts_per_page'  => -1,
              'post_parent'     => $post->ID,
              'orderby'         => 'menu_order',
              'nopaging'        => true,
              'order'           => 'ASC'
            );

            $children_2 = get_posts( $children_args_2 );

            foreach ( $children_2 as $post ) {
              setup_postdata( $post );

              echo '<h2 class="size-3 space-2">' . $post->post_title . '</h2>';

              $children_args_3 = array(
                'post_type'       => 'page',
                'posts_per_page'  => -1,
                'post_parent'     => $post->ID,
                'orderby'         => 'menu_order',
                'nopaging'        => true,
                'order'           => 'ASC'
              );

              $children_3 = get_posts( $children_args_3 );

              foreach ( $children_3 as $post ) {

                setup_postdata( $post );


                $url = get_permalink( $post );

                //print_r( $post );

                $short_url = str_replace('http://livecopy.nocnasowa.pl', '', $url);


                echo '<h3 class="h2 size-1 space-half">' . $post->post_title . '</h3>';

                //  PRZEWODNIK
                echo '<p class="size-0">';

                if ( strlen($post->post_content) > 5 ) {
                  echo $green_light;
                  echo 'Treść Przewodnika <a class="a-light" style="margin-left:0.5rem;display:inline-block;" href="' . $url . '">' . $short_url . '</a>';
                }
                else {
                  echo $red_light . 'Treść Przewodnika';
                }

                echo '<br />';

                //  WYZWANIE
                $wyzwanie = stream_resolve_include_path( __DIR__ . '/data/wyzwanie/' . $post->post_name . '.php' );

                if ( $wyzwanie ) {
                  echo $green_light;
                  echo 'Wyzwanie Data File <a class="a-light" style="margin-left:0.5rem;display:inline-block;" href="' . $url . 'wyzwanie/">' . $short_url . 'wyzwanie/</a>';
                }
                else {
                  echo $red_light . 'Wyzwanie Data File';
                }

                echo '<br />';

                //  WYZWANIE AUDIO
                $wyzwanie_audio_url = '/las/c/s/wyzwanie/' . $post->post_name . '.m4a';
                $wyzwanie_audio = stream_resolve_include_path( $wyzwanie_audio_url );

                if ( $wyzwanie_audio ) {
                  echo $green_light;
                  echo 'Wyzwanie Audio File <a class="a-light" style="margin-left:0.5rem;display:inline-block;" href="' . $wyzwanie_audio_url . '">' . $wyzwanie_audio_url . '</a>';
                }
                else {
                  echo $red_light . 'Wyzwanie Audio File';
                }

                echo '</p>';

                echo '<hr style="margin:1rem 0;border-color:rgba(255,255,255,0.5);" />';


                //  end foreach 3
              }

              wp_reset_postdata();

              //  end foreach 2
            }

            wp_reset_postdata();

            //  end foreach 1
          }

          wp_reset_postdata();

        ?>

      </div>
    </div>
  </div>
</div>


<script>
//  init Szlak
var lasHelper = new LasHelper();
lasHelper.getBasicElements();
lasHelper.hideLoader();
</script>


<?php

include( 'includes/footer.php' );