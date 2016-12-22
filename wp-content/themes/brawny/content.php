<?php
/**
 * @package Brawny
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
	<?php 
		$featured_image = get_theme_mod( 'featured_image',true );
	    if( $featured_image ) : ?>
		<div class="post-thumb blog-thumb">
		  <?php
			if( function_exists( 'brawny_featured_image' ) ) :
				brawny_featured_image();
	        endif;
		  ?>
	    </div>
	<?php endif; ?> 
		<?php do_action('brawny_before_entry_header'); ?>

		<div class="entry-body">
		    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title( '', '' ); ?></a></h1>
		    <?php if ( get_theme_mod('enable_single_post_top_meta', true ) ): ?>
					<footer class="entry-meta">
						<?php if(function_exists('brawny_entry_top_meta') ) {
						    brawny_entry_top_meta(); 
						} ?> 
					</footer><!-- .entry-footer -->
				<?php endif;?> 
			</div>
			
<?php do_action('brawny_after_entry_header'); ?>

			<?php
				/* translators: %s: Name of current post */
				/*the_content( sprintf(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'brawny' ), 
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );*/
				the_content();
			?>
		

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'brawny' ),
				'after'  => '</div>',
			) );
		?>
			<br class="clear" />
	</div><!-- .entry-content -->
<?php do_action('brawny_before_entry_footer'); ?>
	<?php if ( get_theme_mod('enable_single_post_bottom_meta', true ) ): ?>
		<footer class="entry-footer">
			<?php if(function_exists('brawny_entry_bottom_meta') ) {
			     brawny_entry_bottom_meta();
			} ?>
		</footer>
	<?php endif;?><!-- .entry-footer -->

<?php do_action('brawny_after_entry_footer'); ?>
</article><!-- #post-## -->
