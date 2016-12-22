<?php
/**
 * The template part for displaying a message that posts cannot be found
 */
?>

	<article class="no-results not-found">
		<header class="article-intro">
			<div class="article-title no-thumbnail large-12 columns">
				<h2><?php _e( 'Nothing Found', 'mymagazine' ); ?></h2>
			</div>
		</header><!-- .page-header -->
		<div class="row">
			<div class="article-container large-12 columns">
				<div class="article-content">
	
				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		
					<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mymagazine' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		
				<?php elseif ( is_search() ) : ?>
		
					<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mymagazine' ); ?></p>
					<div class="none-and-search">
						<?php get_search_form(); ?>
					</div>
		
				<?php else : ?>
		
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mymagazine' ); ?></p>
					<div class="none-and-search">
						<?php get_search_form(); ?>
					</div>
				<?php endif; ?>
				</div>
			</div><!-- end .article-container -->
                </div><!-- end .row -->
	</article><!-- .no-results -->
