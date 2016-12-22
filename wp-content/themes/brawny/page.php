<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Brawny
 */

get_header(); 
get_template_part('breadcrumb'); ?>

	
<?php do_action('brawny_single_page_flexslider_featured_image'); ?>
	<div id="content" class="site-content container">
	
	<?php do_action('brawny_two_sidebar_left'); ?>	
	
	
	<div id="primary" class="content-area <?php brawny_layout_class();?> columns">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php do_action('brawny_two_sidebar_right'); ?>	
     

<?php get_footer(); ?>
