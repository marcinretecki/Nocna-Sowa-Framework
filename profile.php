<?php
/*
Template Name: Profile
*/



//  tu będzie potrzebny pełny profil łącznie z opcjami:
//  - reset progress
//  - stop payments
//  - etc



//
//  for now only reset data
//
//print_r( las_reset_user_meta() );


$user_progress = las_get_user_progress();
$exp = las_get_user_exp( $user_progress );
$level_array = las_get_user_level_array( $exp );
$user_char = las_get_user_char();



//
//  Begin HTML
//

include( 'includes/head.php' );


//
//  Check if there is char
//  if not, create it
//
if ( $user_char ) {
  include( stream_resolve_include_path( __DIR__ . '/includes/char-display.php' ) );
}
else {
  include( stream_resolve_include_path( __DIR__ . '/includes/char-create.php' ) );
  include( stream_resolve_include_path( __DIR__ . '/data/las-nicknames.php' ) );
}

?>




<script>
//  init Szlak
var las = new LasProfile();
las.init();
</script>


<?php

include( 'includes/footer.php' );