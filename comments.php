<?php if ( have_comments() ) { ?>
  <div class="row space-x4 nodots">
  <?php
    if ( !empty($comments_by_type['comment']) ) :
      wp_list_comments('type=comment&callback=las_comment&style=div');
    endif;
  ?>
  </div>
<?php }

if ( comments_open() && ($chars_left > 0) && $workshop_open ) : ?>

  <form class="comment-form space-x4" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    <?php if ( is_user_logged_in() ) : ?>
      <textarea class="textarea-big col-10 center" name="comment" id="form-comment" placeholder="Skriv her..."></textarea>
    <?php endif; ?>

    <input name="submit" type="submit" id="submit" class="center" value="Dodaj pytanie" />
    <span class="note centered">Notatka pod przyciskiem.</span>
    <input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" />
    <?php do_action('comment_form', $post->ID); ?>
  </form>

<?php endif; ?>