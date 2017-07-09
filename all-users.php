<?php
//
//  Template Name: All Users
//

//
//  WIP
//  Will be used to view all users and their respective data
//  payment data
//  progress
//  char usage
//  names nad nicks
//  osv.
//

//  GLOBALS
include( stream_resolve_include_path( __DIR__ . '/includes/globals.php' ) );


include( 'includes/head.php' );


?>

<div class="section-dark">

  <div class="section-content section-6-4">

    <div class="row">
      <div class="main-column center">

        <?php

          //  list users meta test
          function las_get_all_users_meta() {

            //  get only IDs
            //  we can get whole user object if needed
            $all_users = get_users( array( 'fields' => array( 'ID' ) ) );

            foreach ( $all_users as $user ) {
              echo '<div>' . $user->ID . '<br />Exp: ';

              $user_progress  = las_get_user_progress( $user->ID );

              //  show exp
              echo las_get_user_exp( $user_progress );

              echo '</div>';

            }

          }
          las_get_all_users_meta();

        ?>


      </div>
    </div>

  </div>

</div>


<?php

include( 'includes/footer.php' );