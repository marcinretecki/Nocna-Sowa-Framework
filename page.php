<?php
//
// Page template
// used as a general wrapper for course pages
//

global $post;
$id = $post->ID;


include( 'includes/head.php' );


//
// Function routing different course parts
//


echo '<h1>' . the_title() . '</h1>';


include( 'includes/footer.php' );