<?php
//
// Page template
// used as a general wrapper for course pages
//

global $post;
$id = $post->ID;


include( 'includes/head.php' ); ?>

<div class="section-content">

  <?php
  if ( get_query_var( 'przewodnik' ) ) {
    echo 'przewodnik';
  }
  elseif ( get_query_var( 'wyzwanie' ) ) {
    echo 'wyzwanie';
  }
  else {
    comments_template('', true);
  }



  if ( have_posts() ) : while ( have_posts() ) : the_post();

    echo '<h1>';
    the_title();
    echo '</h1>';

    the_content();

    echo '<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Maecenas faucibus mollis interdum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec id elit non mi porta gravida at eget metus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>';

    echo '<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Maecenas faucibus mollis interdum. Nullam quis risus eget urna mollis ornare vel eu leo. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>';

    echo '<p>Nullam quis risus eget urna mollis ornare vel eu leo. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pharetra augue. Donec ullamcorper nulla non metus auctor fringilla.</p>';

    echo '<p>Donec sed odio dui. Curabitur blandit tempus porttitor. Sed posuere consectetur est at lobortis. Donec ullamcorper nulla non metus auctor fringilla.</p>';


  endwhile; endif;
  ?>

</div>

<?php
//
// Function routing different course parts
//

function las_course_router() {

}


include( 'includes/footer.php' );