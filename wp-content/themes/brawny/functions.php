<?php
/**
 * Brawny functions and definitions
 *
 * @package Brawny
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780; /* pixels */
}

if ( ! function_exists( 'brawny_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function brawny_setup() {    

		/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on brawny, use a find and replace
	 * to change 'brawny' to the name of your theme in all the template files
	 */
		load_theme_textdomain( 'brawny', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'home-thumb', 224, 180, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
				'primary' => __( 'Primary Menu', 'brawny' ),
			) );

		/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
		add_theme_support( 'html5', array(
				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
			) );

add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	add_theme_support( 'custom-background' );
	

	add_theme_support( 'custom-logo' );

	/*
	 * Add Additional image sizes
	 *
	 */
	add_image_size( 'brawny_home_page_img', 360, 220, true );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'brawny_recent-post-img', 380, 350, true);
	add_image_size( 'brawny_service-img', 100, 100, true);
	add_image_size( 'brawny-blog-full-width', 1200,350, true );
	add_image_size( 'brawny-small-featured-image-width', 450,300, true );
	add_image_size( 'brawny-blog-large-width', 800,300, true );
	add_image_size( 'brawny-thumbnail-large', 400,200, true );
	add_image_size( 'brawny-thumbnail-small', 130,90, true );
	
	
/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		add_editor_style( 'css/editor-style.css' );
	
	}
endif; // brawny_setup
add_action( 'after_setup_theme', 'brawny_setup' );
add_action( 'after_setup_theme', 'brawny_customizer_setup',11 );

if( ! function_exists( 'brawny_customizer_setup' ) ) {
		//echo '<pre>', print_r($brawny), '</pre>';
	function brawny_customizer_setup() {
		if(  count( get_theme_mods() ) <= 1 ) {
			global $options;
			$brawny = get_option('brawny');
			foreach($options['panels']['theme_options']['sections'] as $section) {
				foreach( $section['fields'] as $name => $settings ) {
					//echo 'Name: ' . $name . '<br>' . 'Value: ' . $brawny[$name] . '<br>';
					if( ! get_theme_mod( $name ) && isset( $brawny[$name] ) ) {
						if( is_array( $brawny[$name] ) ) {
							set_theme_mod( $name, $brawny[$name]['url'] );
						} else {
							set_theme_mod( $name, $brawny[$name] );
						}
					}
				}		
			}

		 	foreach($options['panels']['home']['sections'] as $section) {
				foreach( $section['fields'] as $name => $settings ) {
					if( ! get_theme_mod( $name ) && isset( $brawny[$name] ) ) {
								if( is_array($brawny[$name]) ) {
									set_theme_mod( $name, $brawny[$name]['url'] );
								} 
								else {
									set_theme_mod( $name, $brawny[$name] );
								}
					}
			
					if ( isset ( $brawny['slides'] ) ) {		
						$slide_count = 1;
						foreach($brawny['slides'] as $slide) {
							if( ! get_theme_mod( 'image_upload-' . $slide_count ) && isset( $slide['image'] ) ) {
								set_theme_mod( 'image_upload-' . $slide_count, $slide['image']);
							}
							if( ! get_theme_mod( 'flexcaption-' . $slide_count ) && isset( $slide['description'] ) ) {
								set_theme_mod( 'flexcaption-' . $slide_count, $slide['description']);
							}
							$slide_count++;
						}
					}
				}
			}	
		}
	}
}

/**
 * Constants
 */

/* Defining directory PATH Constants */
define( 'BRAWNY_PARENT_DIR', get_template_directory() );
define( 'BRAWNY_CHILD_DIR', get_stylesheet_directory() );
define( 'BRAWNY_INCLUDES_DIR', BRAWNY_PARENT_DIR. '/includes' );

/** Defining URL Constants */
define( 'BRAWNY_PARENT_URL', get_template_directory_uri() );
define( 'BRAWNY_CHILD_URL', get_stylesheet_directory_uri() );
define( 'BRAWNY_INCLUDES_URL', BRAWNY_PARENT_URL . '/includes' );

	/* 
	Check for language directory setup in Child Theme
	If not present, use parent theme's languages dir
	*/
	if ( ! defined( 'BRAWNY_LANGUAGES_URL' ) ) /** So we can predefine to child theme */
		define( 'BRAWNY_LANGUAGES_URL', BRAWNY_PARENT_URL . '/languages' );

	if ( ! defined( 'BRAWNY_LANGUAGES_DIR' ) ) /** So we can predefine to child theme */
		define( 'BRAWNY_LANGUAGES_DIR', BRAWNY_PARENT_DIR . '/languages' );



/**
 * Enqueue Scripts and Styles
 */
require_once BRAWNY_INCLUDES_DIR . '/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require BRAWNY_INCLUDES_DIR . '/template-tags.php';
/**
 * Free Theme upgrade page 
 */
require get_template_directory() . '/includes/theme_upgrade.php';

require get_template_directory() . '/includes/styles.php';


/**
 * Customizer Setup
 */
require BRAWNY_INCLUDES_DIR . '/customizer.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require BRAWNY_INCLUDES_DIR . '/extras.php';
require  get_template_directory()  . '/includes/custom-header.php';
require get_template_directory() . '/includes/hooks-filters.php';


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function brawny_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'brawny' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'brawny' ),
		'id'            => 'sidebar-left',
		'description'   => __( 'Left Sidebar', 'brawny' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Top Right', 'brawny' ),
		'id'            => 'header-top-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Nav', 'brawny' ),
		'id'            => 'footer-nav',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	$footer_widget_args = array(
		'name'          => __( 'Footer %d', 'brawny' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	);
	register_sidebars(4, $footer_widget_args);
}
add_action( 'widgets_init', 'brawny_widgets_init' );




/**
 * Load Jigoshop Support
 */
require_once BRAWNY_INCLUDES_DIR . '/jigoshop.php';

function brawny_slide_exists() {
	
	for ( $slide = 1; $slide < 6; $slide++) {
		$url = get_theme_mod( 'image_upload-' .$slide );
		$caption = get_theme_mod( 'flexcaption-' .$slide );  

		if ( $url || $caption ) {
			return true;
		} 
	}    
	
	return false;	
}
/* Woocommerce support */

add_theme_support('woocommerce');

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'brawny_output_content_wrapper');

function brawny_output_content_wrapper() {
	$woocommerce_sidebar = get_theme_mod('woocommerce_sidebar',true ) ;
	if( $woocommerce_sidebar ) {
        $woocommerce_sidebar_column = 'eleven';
    }else {
        $woocommerce_sidebar_column = 'sixteen'; 
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar');
    }
	echo '<div class="site-content container" id="content"><div id="primary" class="content-area '. $woocommerce_sidebar_column .' columns">';	
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'brawny_output_content_wrapper_end' );

function brawny_output_content_wrapper_end () {
	echo "</div>";
}

add_action( 'init', 'brawny_remove_wc_breadcrumbs' );
function brawny_remove_wc_breadcrumbs() {
   	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

include_once( get_template_directory() . '/admin/theme-options.php' );
