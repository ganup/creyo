<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flask
 */
?>

<?php $options = get_option('flask_settings'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'partials/entry-header', 'search' ); ?>

	<div class="entry-summary">
	<?php if( ( is_search() ) && ( isset( $options['excerpt_full_search'] ) ) && ( $options['excerpt_full_search'] == 'full' ) ) : ?>
		the_content( sprintf(
			__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'flask' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
	<?php else : ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php endif; ?>
	<?php get_template_part( 'partials/entry-footer', 'search' ); ?>
	
</article><!-- #post-## -->
