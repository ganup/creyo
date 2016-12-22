<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Flask
 */
?>
		<?php $options = get_option('flask_settings'); ?>
		
		<?php do_action('flask_bottom_of_the_content'); ?>
		</div><!-- .inner -->
	</div><!-- #content -->

	<?php do_action('flask_above_the_footer'); ?>
	
	<?php if ( ( !isset( $options['hide_footer'] ) ) || ( $options['hide_footer'] != 1 ) ) : ?>
	<footer id="colophon" class="site-footer nolinkborder" role="contentinfo">
		<div class="inner">
			<?php do_action('flask_in_the_footer'); ?>
		</div>
	</footer><!-- #colophon -->
	<?php endif; ?>
	
	<?php do_action('flask_after_the_footer'); ?>
	
</div><!-- #page -->

<?php do_action('flask_after_the_page'); ?>

<?php wp_footer(); ?>

</body>
</html>
