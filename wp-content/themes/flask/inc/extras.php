<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Flask
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function flask_body_classes( $classes ) {
	$options = get_option('flask_settings');
	
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	//determines whether there should be a no-sidebar flag on a given page
	if ( ( $options['sidebar_side'] == 'none' ) && ( !is_page() ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'flask_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function flask_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'flask' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'flask_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function flask_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'flask_render_title' );
endif;

/**
 * A smarter way of managing sidebars
 * You can define a sidebar to retrieve; you can specify 'none'; or
 * it will look by default for sidebars for 'home', 'single', 'page',
 * 'archive', and 'search'
 */
function flask_sidebar( $i = '' ) {
	$sidebar = $i;
	if ( $sidebar == 'none' ) return;
		
	if ( ($sidebar == '') && ( is_home() ) ) $sidebar = 'home';
	if ( ($sidebar == '') && ( is_single() ) ) $sidebar = 'single';
	if ( ($sidebar == '') && ( is_page() ) ) $sidebar = 'page';
	if ( ($sidebar == '') && ( is_archive() ) ) $sidebar = 'archive';
	if ( ($sidebar == '') && ( is_search() ) ) $sidebar = 'search';
	
	get_sidebar( $sidebar );
}

/********************************************************
 * WooCommerce Integration
 ********************************************************/

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action( 'woocommerce_before_main_content', 'flask_output_content_wrapper', 10);
add_action( 'woocommerce_after_main_content', 'flask_output_content_wrapper_end', 10);

if ( ! function_exists( 'flask_output_content_wrapper' ) ) {

	/**
	 * Output the start of the page wrapper.
	 *
	 */
	function flask_output_content_wrapper() {
		echo '<div id="primary" class="content-area"><main id="main" class="site-main" role="main">';
	}
}
if ( ! function_exists( 'flask_output_content_wrapper_end' ) ) {

	/**
	 * Output the end of the page wrapper.
	 *
	 */
	function flask_output_content_wrapper_end() {
		echo '</main></div>';
	}
}

if ( ! function_exists( 'flask_woocommerce_breadcrumb' ) ) :
	function flask_woocommerce_breadcrumb() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) && ( !is_page() ) && ( !is_single() ) ) {
			remove_action('flask_top_of_the_primary', 'flask_archive_titles', 10);
			woocommerce_breadcrumb();
		}
	}
	add_action('flask_top_of_the_primary', 'flask_woocommerce_breadcrumb', 5);
endif;