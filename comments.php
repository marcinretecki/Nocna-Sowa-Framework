<?php
//
//  Includes Comments
//

//  logged in user
global $user_char, $user_img_url, $user_nick, $user_level;



function las_comment($comment, $args, $depth) {

  //  comment author
  $author = get_comment_author( $comment );
  $author_id = $comment->user_id;

  //  Progress
  //  możemy pominąć progress
  //  o ile w char będziemy zapisywali jakieś dodatkowe info
  //  wskazujące na zaawansowanie usera
  //  fajnie by było pokazać:
  //    level
  //    zdobycze
  //    i zmienić minimalnie avatara dla zaaawansowanych
  $author_progress = las_get_user_progress( $author_id );

  //  Char
  $author_char = las_get_user_char( $author_id );
  $author_char_name = las_get_user_char_full_name( $author_char );
  $author_char_img_url = las_get_user_profile_img( $author_char );



  if ( 1 == $depth ) {
    echo '<div class="ratownik-comment-group" style="border: 1px solid #aaa; margin: 1rem 0;">';
  }
  else {
    echo '<div class="ratownik-comment-child" style="padding-left: 2rem;">';
  }

  ?>
  <article id="comment-<?php comment_ID(); ?>" class="ratownik-comment" style="padding: 1rem;">
    <footer style="">
      <img class="ratownik-comment__img" src="<?php echo $author_char_img_url;  ?>" style="width:100px; height: 100px; display: inline-block; border-radius: 50%; " />
      <span class="ratownik-comment__author"><?php echo $author_char_name; ?></span>

      <time class="small" pubdate datetime="<?php comment_time('Y-m-d'); echo 'T'; comment_time('H:i:s'); ?>"><?php comment_time('j.m.Y, G:i'); ?></time>
    </footer>

    <?php

    $comment_text = apply_filters( 'comment_text', $comment->comment_content, $comment );

    echo '<div>';
    echo $comment_text;
    echo '</div>';

    comment_reply_link( array( 'reply_text' => 'Odpowiedz', 'depth' => 1, 'max_depth' => 2 ) );

    ?>

  </article>

<?php
//  end function
};



//
//  Begin HTML
//

if ( have_comments() ) {

    if ( !empty($comments_by_type['comment']) ) {
      wp_list_comments('type=comment&callback=las_comment&style=div');
    }
    else {
      echo 'nie ma komentarzy';
    }
}
else  {
  echo 'no comments';
}

if ( comments_open() ) {

//  char usera


?>

  <form id="ratownik-form" class="ratownik-form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    <img class="ratownik-form__img" src="<?php echo $user_img_url; ?>" style="width:100px; height: 100px;" />
    <textarea class="textarea-big" name="comment" placeholder="Skriv her..."></textarea>

    <button name="submit" type="submit" class="btn btn-blue center btn-s-4">Dodaj pytanie</button>
    <span class="note centered">Notatka pod przyciskiem.</span>

    <input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" />
    <?php do_action('comment_form', $post->ID); ?>
  </form>

<?php } else { ?>
<p>Pytania zamknięte.</p>
<?php }


?>
<script>
  function AddComment() {
    this.openedForm = null;

    this.moveForm = function(id, commentId, action, post) {
      var that = this;
      var postTitle = "<?php wp_title('', true, 'right'); ?>";
      var mainForm;
      var newForm;
      var parentCommentId;
      var where;
      var closeButton;

      // Clean Up
      this.cleanUp();

      where = document.getElementById(id);
      mainForm = document.getElementById( 'ratownik-form' );

      //  create new form
      newForm = mainForm.cloneNode(true);

      //  change id
      newForm.id = "form-" + id;

      //  add comment parent to new form
      parentCommentId = document.createElement('input');
      parentCommentId.type = "hidden";
      parentCommentId.value = commentId;
      parentCommentId.name = "comment_parent";
      newForm.appendChild(parentCommentId);

      //  change submit button
      newForm.elements['submit'].innerHTML = 'Dodaj odpowiedź';

      //  add close button
      closeButton = document.createElement("a");
      closeButton.href = "#!";
      closeButton.role = "button";
      closeButton.className = "btn-secondary";
      closeButton.innerHTML = "Anuluj odpowiedź";
      closeButton.addEventListener("click", function() {
        that.cleanUp();
      }, false);

      newForm.appendChild(closeButton);

      // Append
      where.appendChild(newForm);

      // Add opened form id to object
      this.openedForm = "form-" + id;

      return false;
    };

    this.cleanUp = function() {
      var form;
      var parent;

      if (this.openedForm !== null) {

        form = document.getElementById (this.openedForm );
        parent = form.parentNode;

        parent.removeChild( form );

        this.openedForm = null;
      }
    }
  }

  var addComment = new AddComment();
</script>