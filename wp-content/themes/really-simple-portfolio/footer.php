<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simple Portfolio
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
                                                    <?php printf(
                                                            // Translators: 1 is current year, 2 is site title, 3 is theme author link.
                                                            esc_html__( '&copy; %1$s %2$s | Designed by %3$s', 'really-simple-portfolio' ),
                                                            date_i18n( 'Y' ),
                                                            get_bloginfo( 'name' ),
                                                            sprintf( '<a href="http://webcoursesbangkok.com" rel="nofollow">%s</a>', __( 'Carl Heaton', 'really-simple-portfolio' ) )
                                                    ); ?>
		</div><!-- .site-info -->
                <?php simple_portfolio_social_menu() ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
