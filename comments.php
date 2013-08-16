<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	
	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>

	<ul class="commentlist" style="list-style:none;">
		<?php wp_list_comments('type=comment&max_depth=2&callback=mediumpress_comment'); ?>
	</ul>

	<p id="comment-toggle" style="font-size:15px;cursor:pointer;margin-top:15px;">Leave a comment for <?php the_author_posts_link(); ?></p>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p>Comments are closed.</p>

	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" <?php echo (have_comments())?' style="display:none;margin-top:15px;"':"" ?>>

		<?php if ( is_user_logged_in() ) : ?>

			<p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo get_avatar( get_the_author_meta( 'ID' ),20 ); ?> <?php echo $user_identity; ?></a></p>

		<?php else : ?>
			<div id="comment1">
			<div>
				<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" placeholder="Name" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>

			<div>
				<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" placeholder="Email" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>

			<div>
				<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="29" tabindex="3" placeholder="URL" />
			</div>

			<div style="font-size: 12px;color: #8B8B8B;">
				<a class="nav-form-comment" href="#">Next</a>
				<?php cancel_comment_reply_link('Cancel Reply'); ?>
			</div>
			</div>

		<?php endif; ?>

		<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->
		<div id="comment2"<?php echo (!is_user_logged_in())?' style="display:none;"':"" ?>>
		<?php if ( !is_user_logged_in() ) : ?>
		<p id="pic-and-name"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/no-pic.png" width="20px"> <span id="my-name"></span></p>
		<?php endif; ?>

		<div>
			<textarea name="comment" id="comment" cols="58" rows="1" tabindex="4" placeholder="Leave a comment"></textarea>
		</div>

		<div>
			<input name="submit" type="submit" id="submit" tabindex="5" value="Publish" style="border: 0px;background: transparent;font-size: 12px;color: #8B8B8B;cursor: pointer;float: left;font-weight: bolder;" />
			<?php comment_id_fields(); ?>
		</div>

		<?php echo (!is_user_logged_in())?'<div><a class="nav-form-comment" href="#" style="font-size: 12px;color: #8B8B8B;">Back</a></div>':"" ?>
		</div>
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>
	
</div>

<?php endif; ?>
