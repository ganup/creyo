<?php
/**
 * @package Flask
 */
?>
<?php $options = get_option('flask_settings'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'partials/entry-header' ); ?>

	<div class="entry-content">
	<?php if( ( ( is_archive() ) && ( isset( $options['excerpt_full_archive'] ) ) && ( $options['excerpt_full_archive'] == 'full' ) ) || 
			( ( is_home() ) && ( isset( $options['excerpt_full_blog'] ) ) && ( $options['excerpt_full_blog'] == 'full' ) ) || ( has_post_format( array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio', 'status' ) ) ) ) : ?>

		<?php	the_content( sprintf(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'flask' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) ); ?>
			
	<?php else : ?>
	
		<?php the_excerpt(); ?>
		
	<?php endif; ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'flask' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'partials/entry-footer' ); ?>

</article><!-- #post-## -->