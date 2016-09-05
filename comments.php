<?php if ( have_comments() ) { ?>
  <div class="row space-x4 nodots">
  <?php
    if ( !empty($comments_by_type['comment']) ) :
      wp_list_comments('type=comment&callback=las_comment&style=div');
    endif;
  ?>
  </div>
<?php }

if ( comments_open() && is_user_logged_in() ) { ?>

  <form class="comment-form space-x4" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    <textarea class="textarea-big col-10 center" name="comment" id="form-comment" placeholder="Skriv her..."></textarea>

    <button name="submit" type="submit" id="submit" class="btn btn-blue center btn-s-4">Dodaj pytanie</button>
    <span class="note centered">Notatka pod przyciskiem.</span>

    <input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" />
    <?php do_action('comment_form', $post->ID); ?>
  </form>

<?php } else { ?>
<p>Pytania zamknięte.</p>
<?php }; ?>