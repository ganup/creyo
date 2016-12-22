<?php
/**
 * Template part for displaying page content in page-home.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Simple Portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php
            if (has_post_thumbnail()) {
                echo '<div class="large-thumbnail clear">';
                echo the_post_thumbnail( 'really-simple-portfolio-large-thumb' );
                echo '</div>';
            }
        ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'really-simple-portfolio' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'really-simple-portfolio' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
