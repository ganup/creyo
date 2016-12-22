<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Brawny
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<div class="entry-content">
<?php	$single_page_featured_image = get_theme_mod( 'single_page_featured_image',true );
	$single_page_featured_image_size = get_theme_mod ('single_page_featured_image_size',1); 
	if ( $single_page_featured_image && $single_page_featured_image_size !=2 ) {
        if( has_post_thumbnail() && ! post_password_required() ) :   
		  the_post_thumbnail('brawny-blog-large-width');
	    endif;
	}
	  ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'brawny' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'brawny' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->


