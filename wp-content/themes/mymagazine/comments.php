<?php
/**
 * The template for displaying comments.
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="row">
	<div class="comments-area large-12 columns">
		<div class="comment-container">
			<div class="comment-title">
				<h3><?php _e( 'Comments', 'mymagazine' ); ?></h3>                
			</div>
			<?php if ( have_comments() ) : ?>
				<ul class="comment-list">
					<?php wp_list_comments( array( 'callback' => 'mymagazine_comment' ) ); ?>
					
					<?php paginate_comments_links( array('prev_text' => '<span class="genericon genericon-leftarrow"><span class="screen-reader-text">'. __( "Previous", "mymagazine" ) .'</span>', 'next_text' => '<span class="genericon genericon-rightarrow"><span class="screen-reader-text">'. __( "Next", "mymagazine" ) .'</span></span>') ); ?>
				</ul>
			<?php endif; // have_comments() ?>
			<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
				<p class="nocomments"><?php _e( 'Comments are closed.', 'mymagazine' ); ?></p>
			<?php endif; ?>
			<?php $comments_args = array(
				'fields' => apply_filters( 'comment_form_default_fields', array(
											'author' => '<p class="comment-form-author"><label for="author">'. __( 'name', 'mymagazine' ) .'</label></br><input id="author" name="author" " type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30" /></p>',
											'email' => '<p class="comment-form-email"><label for="email">'. __( 'email', 'mymagazine' ) .'</label></br><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30" /></p>'
											)
							),
							'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">'. __('Your email address will not be published. Name and email are required', 'mymagazine') .'</p>',
							'comment_field' => '<p class="comment-form-comment"><label for="comment" aria-required="true" class="screen-reader-text">Commento</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required="required"></textarea></p>',
				);
			comment_form($comments_args); ?>
		
		</div><!-- end .comment-container -->
	</div><!-- end .comments-area -->
</div><!-- end .row -->
