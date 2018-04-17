<?php
if ( post_password_required() ) : ?>
<p>Wpisz hasło by zobaczyć komentarze.</p>
<?php return; endif; ?>

<?php if ( comments_open() ) : ?>

	<h3 class="h1 size-4">Twój komentarz</h3>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php printf(__('Musisz być <a href="%s">zalogowany</a> by zostawić komentarz.'), wp_login_url( get_permalink() ) );?></p>
	<?php else : ?>

		<form class="comment-form space-x4" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
			<?php if ( is_user_logged_in() ) : ?>
				<label for="form-comment">Treść</label>
				<textarea name="comment" id="form-comment" placeholder="Treść"></textarea>
				<p class="size-0"><?php printf(__('Zalogowany jako %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Wyloguj &raquo;</a></p>

			<?php else : ?>
				<label for="form-comment">Treść</label>
				<textarea id="form-comment" class="space" name="comment" placeholder="możesz się rozpisać"></textarea>
				<label for="form-author">Imię</label>
				<input id="form-author" class="space" type="text" value="<?php echo esc_attr($comment_author); ?>" name="author" placeholder="lub pseudonim" required>
				<label for="form-email">Email</label>
				<input id="form-email" class="space" type="email" value="<?php echo esc_attr($comment_author_email); ?>" name="email" placeholder="nie będzie widoczny" required>
				<label for="form-url">URL (niewymagany)</label>
				<input id="form-url" class="space" type="url" value="<?php echo esc_attr($comment_author_url); ?>" name="url" placeholder="strona www">
				<div class="hidden-input">
					<label for="is_legit">Nie wypełniaj tego pola</label>
					<input type="text" name="is_legit" value="" />
				</div>
			<?php endif; ?>

			<input name="submit" type="submit" id="submit" value="Opublikuj" onClick="ga('send', 'event', 'Comment', 'Opublikuj', '<?php echo $title; ?>');" />
			<span class="note">Ktoś czeka na Twoją opinię.</span>
			<input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" />
			<?php do_action('comment_form', $post->ID); ?>

		</form>

	<?php endif; ?>

<?php endif; ?>

<?php if ( have_comments() ) : ?>

	<?php
	if ( !empty($comments_by_type['comment']) ) :
		echo '<h3>Komentarze:</h3>';
		wp_list_comments('type=comment&callback=mytheme_comment&style=div&end-callback=mytheme_end_callback');
	endif;
	?>


	<script>
		function AddComment() {
			this.openedForm = null;

			this.moveForm = function(id, commentId, action, post) {
				var that = this,
						postTitle = "<?php wp_title('', true, 'right'); ?>",
						where,form,title,closeButton,closeEvent,textLabel,text,authorLabel,author,emailLabel,email,urlLabel,url,hidden,hiddenLabel,hiddenInput,button,replyEvent,note,postId,parent;

				// Clean Up
				this.cleanUp();

				where = document.getElementById(id)

				form = document.createElement("form");
				form.className = "comment-form space-x4 comment-reply-form";
				form.action = "<?php echo get_option('siteurl'); ?>/wp-comments-post.php";
				form.method = "post";
				form.id = "form-" + id;

				title = document.createElement("h3");
				title.innerHTML = "Twoja odpowiedź:";
				form.appendChild(title);

				textLabel = document.createElement('label');
				textLabel.for = "form-comment";
				textLabel.innerHTML = "Treść:";
				form.appendChild(textLabel);

				text = document.createElement('textarea');
				text.name = "comment";
				form.appendChild(text);

				authorLabel = document.createElement('label');
				authorLabel.setAttribute("for", "form-author");
				authorLabel.innerHTML = "Imię:";
				form.appendChild(authorLabel);

				author = document.createElement('input');
				author.type = "text";
				author.value = "<?php echo esc_attr($comment_author); ?>";
				author.name = "author";
				author.required = "";
				form.appendChild(author);

				emailLabel = document.createElement('label');
				emailLabel.setAttribute("for", "form-email");
				emailLabel.innerHTML = "Email:";
				form.appendChild(emailLabel);

				email = document.createElement('input');
				email.type = "email";
				email.value = "<?php echo esc_attr($comment_author_email); ?>";
				email.name = "email";
				email.required = "";
				form.appendChild(email);

				urlLabel = document.createElement('label');
				urlLabel.setAttribute("for", "form-email");
				urlLabel.innerHTML = "URL (niewymagany):";
				form.appendChild(urlLabel);

				url = document.createElement('input');
				url.type = "url";
				url.value = "<?php echo esc_attr($comment_author_url); ?>";
				url.name = "url";
				url.required = "";
				form.appendChild(url);

				hidden = document.createElement('div');
				hidden.className = "hidden-input";

				hiddenLabel = document.createElement('label');
				hiddenLabel.setAttribute("for", "is_legit");
				hiddenLabel.innerHTML = "Nie wypełniaj tego pola:";
				hidden.appendChild(hiddenLabel);

				hiddenInput = document.createElement('input');
				hiddenInput.type = "text";
				hiddenInput.value = "";
				hiddenInput.name = "is_legit";
				hidden.appendChild(hiddenInput);

				postId = document.createElement('input');
				postId.type = "hidden";
				postId.value = post;
				postId.name = "comment_post_ID";
				hidden.appendChild(postId);

				parent = document.createElement('input');
				parent.type = "hidden";
				parent.value = commentId;
				parent.name = "comment_parent";
				hidden.appendChild(parent);

				form.appendChild(hidden);

				button = document.createElement('input');
				button.name = "submit";
				button.type = "submit";
				button.className = "btn-secondary-left";
				button.value = "Odpowiedz";
				button.addEventListener("click", function() {
					replyEvent = 'Odpowiedz ' + commentId;
					ga('send', 'event', 'Comment', replyEvent, postTitle);
				}, false);

				form.appendChild(button);

				closeButton = document.createElement("a");
				closeButton.href = "#!";
				closeButton.role = "button";
				closeButton.className = "btn-secondary";
				closeButton.innerHTML = "Anuluj odpowiedź";
				closeButton.addEventListener("click", function() {
					that.cleanUp();
					closeEvent = 'Anuluj odpowiedź ' + commentId;
					ga('send', 'event', 'Comment', closeEvent, postTitle);
					return false;
				}, false);

				form.appendChild(closeButton);

				note = document.createElement("span");
				note.className = "note";
				note.innerHTML = "Ktoś czeka na Twoją opinię.";
				form.appendChild(note);

				// Append
				where.appendChild(form);

				// Opened form Id
				this.openedForm = "form-" + id;

				return false;
			};

			this.cleanUp = function() {
				if (this.openedForm !== null) {
					var form = document.getElementById(this.openedForm),
              parent = form.parentNode;

          parent.removeChild(form);

          this.openedForm = null;
				}
			}
		}

		var addComment = new AddComment();
	</script>

<?php endif; ?>