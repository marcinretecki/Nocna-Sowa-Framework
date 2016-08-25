<?php
//
// Page template
// used as a general wrapper for course pages
//

global $post;
$id = $post->ID;


include( 'includes/head.php' );





echo '<h1>' . the_title() . '</h1>';


//
// Function routing different course parts
//

function las_course_router() {

}


include( 'includes/footer.php' );