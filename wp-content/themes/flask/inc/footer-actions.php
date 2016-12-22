<?php
/*****************************
 * Actions the put together the footer of the theme, including the site info section
 *****************************/

if ( ! function_exists( 'flask_site_info' ) ) :
	function flask_site_info() {
		$options = get_option('flask_theme_settings');
		if ( !empty($options['site_license'] ) ) : ?>
		<div class="site-license">
			<?php echo wptexturize( $options['site_license'] ); ?>
		</div>
		<?php else : ?>
		<div class="site-license">
			<?php echo 'Copyright ' . date("Y") . ', ' . get_bloginfo( 'name', 'display' ); ?>
		</div>		
		<?php endif; ?>
		
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'flask' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'flask' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'flask' ), 'Flask', '<a href="https://basilosaur.us/" rel="designer">basilosaur.us</a>' ); ?>
		</div><!-- .site-info -->
		<?php
	}
	add_action('flask_in_the_footer', 'flask_site_info', 10);
endif;

if ( ! function_exists('flask_to_the_top') ) :
	function flask_to_the_top() {
		?>
		<span id="tothetop" class="genericon genericon-collapse"></span>
		<?php
	}
	add_action('flask_after_the_page', 'flask_to_the_top');
endif;

if ( ! function_exists( 'flask_footer_sidebar_area' ) ) :
/**
 * Adds a sidebar area before the site's footer information
 */
function flask_footer_sidebar_area() {
	$sactive = 0;
	for($i = 4; $i <= 7; $i++) {
		$sidebar = 'sidebar-' . $i;
		if (is_active_sidebar( $sidebar ) ) $sactive++;
	}
	if ( (is_active_sidebar( 'sidebar-4' ) ) || (is_active_sidebar( 'sidebar-5' ) ) || (is_active_sidebar( 'sidebar-6' ) ) || (is_active_sidebar( 'sidebar-7' ) ) ) :
		?> <div id="footer-sidebars" class="nolinkborder widget-area footer-sidebars hyphens clear fc<?php echo $sactive; ?>">
			<div class="inner">
			<?php if (is_active_sidebar( 'sidebar-4' ) ) : ?>
				<div class="footer-aside footer-column nolinkborder">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</div>
			<?php endif; ?>
			<?php if (is_active_sidebar( 'sidebar-5' ) ) : ?>
				<div class="footer-aside footer-column nolinkborder">
				<?php dynamic_sidebar( 'sidebar-5' ); ?>
				</div>
			<?php endif; ?>
			<?php if (is_active_sidebar( 'sidebar-6' ) ) : ?>
				<div class="footer-aside footer-column nolinkborder">
				<?php dynamic_sidebar( 'sidebar-6' ); ?>
				</div>
			<?php endif; ?>
			<?php if (is_active_sidebar( 'sidebar-7' ) ) : ?>
				<div class="footer-aside footer-column nolinkborder">
				<?php dynamic_sidebar( 'sidebar-7' ); ?>
				</div>
			<?php endif; ?>
			</div>
		</div> <?php
	endif;
}
endif;
add_action('flask_above_the_footer', 'flask_footer_sidebar_area', 20);

if ( ! function_exists( 'flask_loading_animation' ) ) :
/**
 * Adds a sidebar area before the site's footer information
 */
function flask_loading_animation() {
	?>
	<div id="curtain">
		<div id="loading-animation">&nbsp;</div>
	</div>
	<?php
}
endif;
add_action('flask_after_the_page', 'flask_loading_animation', 20);

