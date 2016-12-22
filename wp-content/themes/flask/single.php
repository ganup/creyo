<?php
/**
 * The template for displaying all single posts.
 *
 * @package Flask
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<?php do_action('flask_top_of_the_primary'); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/content', 'single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php flask_sidebar(); ?>
<?php the_post_navigation(); ?>
<?php get_footer(); ?>
