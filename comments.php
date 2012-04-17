<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() )
{ ?>
	This post is password protected. Enter the password to view comments.
	<?php
	return;
} ?>

<?php //RUN THE "COMMENTS LOOP" ?>
<?php if ( have_comments() ) : ?>
	<h2 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h2>
	<ol class="commentlist">
	<?php wp_list_comments( array('type' => "comment", 'callback' => 'rm_comment' )); ?>
	</ol>
	
	<?php else : // IF THERE AREN'T ANY COMMENTS YET ?>

	<?php if ( comments_open() ) : ?>
	
	<?php //PUT SOMETHING HERE IF COMMENTS ARE OPEN BUT NOBODY'S COMMENTED YET. ?>
	
	<?php else : //COMMENTS ARE CLOSED ?>
	<p>Comments are closed.</p>
	
	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<div id="respond">
		<h2><?php comment_form_title( 'Leave a Comment', 'Reply to %s' ); ?></h2>
		<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
		</div>
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( is_user_logged_in() ) : ?>
		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
		
		<?php else : ?>
		<div>
		<label for="author">Name <?php if ($req) echo "(required)"; ?></label><br />
		<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
		</div>
		
		<div>
		<label for="email">Email Address (will not be published) <?php if ($req) echo "(required)"; ?></label><br />
		<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		</div>
		
		<?php endif; ?>
		
		<div>
		<label for="comment">Your Comment</label><br />
		<textarea name="comment" id="comment" tabindex="4"></textarea>
		</div>
		<div>
		<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
		<?php comment_id_fields(); ?>
		</div>
		<?php do_action('comment_form', $post->ID); ?>
		</form>
		
		<?php endif; // END IF REGISTRATION REQUIRED AND NOT LOGGED IN.?>
	</div><!-- end #respond -->
<?php endif; ?>