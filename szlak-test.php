<?php
/*
Template Name: Szlak Test
*/


//  if not a dev, exit
if ( !las_is_developer() ) {
  exit;
}


//  GLOBALS
$globals = stream_resolve_include_path( __DIR__ . '/includes/globals.php' );

if ( $globals ) {
  include( $globals );
}



include( 'includes/head.php' );


?>

<div class="section-dark">

  <div class="section-content section-6-4">

    <div class="row">
      <div class="main-column center">

        <?php


          //  USER STRUCT
          echo '<div style="height:2rem;overflow:hidden;">';
            echo '<a href="#" class="a-light" onClick="this.parentNode.style.cssText=\'\';">Pokaż progress ...</a><br /><br />';



            $user_cookie_progress = las_get_user_cookie_progress();

            echo '<pre class="size-0">';
            var_dump( json_decode( stripslashes( $_COOKIE["lasChallangeProgress"] ), true ) );
            var_dump( $user_cookie_progress );
            echo '</pre>';


            echo las_get_exp_from_progress( $user_cookie_progress );


            echo '<h2 class="h1">User Struct</h2>';



            echo '<pre class="size-0">';
            print_r( $user_progress );
            echo '</pre>';

          echo '</div>';




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

          //  sections
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

            //  chapters
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


                echo '<h3 class="h2 size-1">' . $post->post_title . '</h3>';


                //  KATEGORIE
                $categories = get_the_category();

                if ( $categories ) {

                  echo '<p class="space-half size-0"><i>';

                  foreach ( $categories as $category ) {
                    echo $category->slug . ' ';
                  }

                  echo '</i> | '  . $short_url . '</p>';

                }


                //  PRZEWODNIK
                echo '<p class="size-0">';

                //  PRZEWODNIK DATA FILE
                $przewodnik = stream_resolve_include_path( __DIR__ . '/data/przewodnik/' . $post->post_name . '.php' );

                if ( $przewodnik ) {
                  echo $green_light;
                  echo 'Treść Przewodnika <a class="a-light" style="margin-left:0.5rem;display:inline-block;" href="' . $url . 'przewodnik/">' . $short_url . 'przewodnik/</a>';
                }
                else {
                  echo $red_light . 'Nie ma przewodnika';
                }

                echo '<br />';

                //  WYZWANIE

                if ( has_category('bez-wyzwania') ) {

                  echo $green_light;
                  echo 'Nie ma wyzwania.';

                }
                elseif (   !has_category('wyzwanie-audio')
                        && !has_category('wyzwanie-chat')
                        && !has_category('wyzwanie-liczby')
                        && !has_category('wyzwanie-setninger') ) {

                  echo $red_light;
                  echo 'Nie wybrałeś wyzwania!';

                }
                else {

                  //  WYZWANIE DATA FILE
                  if ( has_category( 'wyzwanie-liczby' ) ) {
                    $wyzwanie_data = stream_resolve_include_path( __DIR__ . '/data/wyzwanie/liczby.php' );
                  }
                  elseif ( has_category( 'misja' ) ) {
                    $wyzwanie_data = stream_resolve_include_path( __DIR__ . '/data/misja/' . $post->post_name . '.php' );
                  }
                  else {
                    $wyzwanie_data = stream_resolve_include_path( __DIR__ . '/data/wyzwanie/' . $post->post_name . '.php' );
                  }

                  if ( $wyzwanie_data ) {
                    echo $green_light;
                    echo 'Wyzwanie Data File <a class="a-light" style="margin-left:0.5rem;display:inline-block;" href="' . $url . 'wyzwanie/">Wyzwanie</a> <a class="a-light" style="margin-left:0.5rem;display:inline-block;" href="' . $url . 'testmode/">Testmode</a>';
                  }
                  else {
                    echo $red_light . 'Wyzwanie Data File';
                  }

                  echo '<br />';

                  //  WYZWANIE AUDIO
                  if ( has_category('wyzwanie-liczby') ) {
                    $wyzwanie_audio_url = '/las/c/s/wyzwanie/liczby.m4a';
                  }
                  else {
                    $wyzwanie_audio_url = '/las/c/s/wyzwanie/' . $post->post_name . '.m4a';
                  }

                  $wyzwanie_audio = stream_resolve_include_path( $wyzwanie_audio_url );

                  if ( $wyzwanie_audio ) {
                    echo $green_light;
                    echo 'Wyzwanie Audio File <a class="a-light" style="margin-left:0.5rem;display:inline-block;" href="' . $wyzwanie_audio_url . '">' . $wyzwanie_audio_url . '</a>';
                  }
                  else {
                    echo $red_light . 'Wyzwanie Audio File';
                  }

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
var las = new LasHelper();
las.getBasicElements();
las.hideLoader();
</script>


<?php

include( 'includes/footer.php' );
