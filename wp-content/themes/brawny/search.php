<?php
/**
 * The template for displaying search results pages.
 *
 * @package Brawny
 */

get_header(); ?>
<div id="content" class="site-content container">
		<?php do_action('brawny_two_sidebar_left'); ?>	
        
		
	<section id="primary" class="content-area <?php brawny_layout_class();?> columns">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'brawny' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

		
	<?php 
		if(  get_theme_mod ('numeric_pagination',true) && function_exists( 'brawny_pagination' ) ) : 
				brawny_pagination();
			else :
				brawny_post_nav();     
			endif; 
	?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
	<?php do_action('brawny_two_sidebar_right'); ?>
     
<?php get_footer(); ?>
