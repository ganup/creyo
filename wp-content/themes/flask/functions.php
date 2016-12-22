<?php
/**
 * Flask functions and definitions
 *
 * @package Flask
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'flask_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function flask_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Flask, use a find and replace
	 * to change 'flask' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'flask', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 780 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'flask' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio', 'status'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'flask_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Adds theme support for woocommerce
	add_theme_support( 'woocommerce' );
}
endif; // flask_setup
add_action( 'after_setup_theme', 'flask_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function flask_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'flask' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Alternate Sidebar', 'flask' ),
		'id'            => 'sidebar-2',
		'description'   => 'To display this sidebar, use the Alternate Sidebar page template',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'First Footer Widget Area', 'flask' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'This is the first, left-most, of the three sidebar areas above the footer. It would be perfect for a supplementary menu, category list, or calendar widget.', 'flask' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Footer Widget Area', 'flask' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'This is the second, middle sidebar area above the footer. It would be perfect for a supplementary menu, category list, or calendar widget.', 'flask' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Third Footer Widget Area', 'flask' ),
		'id'            => 'sidebar-6',
		'description'   => __( 'This is the third, middle sidebar area above the footer. It would be perfect for a supplementary menu, category list, or calendar widget.', 'flask' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Fourth Footer Widget Area', 'flask' ),
		'id'            => 'sidebar-7',
		'description'   => __( 'This is the third, right-most, of the three sidebar areas above the footer. It would be perfect for a supplementary menu, category list, or calendar widget.', 'flask' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'flask_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function flask_scripts() {
	//loads variables for ajax page loading
	global $wp_query;
	$max = $wp_query->max_num_pages;
	
	wp_enqueue_style( 'google_fonts', google_fonts_url(), array() );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/css/genericons/genericons.css', array() );
	wp_enqueue_style( 'flask-einfache-formen', get_template_directory_uri() . '/css/einfache-formen.css', array() );
	wp_enqueue_style( 'flask-typography', get_template_directory_uri() . '/css/typography.css', array('google_fonts') );
	wp_enqueue_style( 'flask-layout', get_template_directory_uri() . '/css/layout.css', array() );
	wp_enqueue_style( 'flask-style', get_stylesheet_uri(), array('genericons', 'flask-einfache-formen', 'flask-typography', 'flask-layout') );

	wp_enqueue_script( 'jquery-mobile', get_template_directory_uri() . '/js/jquery.mobile.custom.min.js', array('jquery'), '1.4.5', true );
	wp_enqueue_script( 'flask-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), '3.0', true );
	wp_enqueue_script( 'flask-waypoints-sticky', get_template_directory_uri() . '/js/sticky.min.js', array('flask-waypoints'), '3.0', true );
	wp_enqueue_script( 'flask-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery', 'jquery-mobile', 'flask-waypoints'), '20120206', true );
	wp_enqueue_script( 'flask-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
	
	//Localize flask-ajax-functions for AJAX calls
	wp_localize_script( 'flask-navigation', 'flaskVars', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'startPage' => ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1,
		'maxPages' => $max,
		'prevLink' => next_posts($max, false),
		'nextLink' => previous_posts(false),
		'navNextString' => __('Newer Posts', 'flask'),
		'navPrevString' => __('Older Posts', 'flask'),
		'commentErrorString' => __('Something has gone wrong. You may have left some fields blank or posted too quickly.', 'flask'),
		'commentModerationString' => __('Your comment has been successfully submitted and is awaiting moderation.', 'flask'),
		'commentSuccessString' => __('Your comment has been successfully submitted.', 'flask'),
		'moreCommentsString' => __('See More Comments', 'flask'),
	) );
}
add_action( 'wp_enqueue_scripts', 'flask_scripts' );

//adds editor styles for theme
function flask_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/css/typography.css' );
    add_editor_style( get_template_directory_uri() . '/css/editor.css' );
}
add_action( 'after_setup_theme', 'flask_add_editor_styles' );

//Deals with google fonts
function google_fonts_url() {
	$fonts_url_base = 'http://fonts.googleapis.com/css?family=';
	$options = get_option('flask_settings');
	
	if ( !isset( $options['title_font_family'] ) ) $options['title_font_family'] = 'Roboto:400,300,700';
	if ( !isset( $options['body_font_family'] ) ) $options['body_font_family'] = 'Gentium+Book+Basic:400,700';
	
	if ( $options['title_font_family'] == $options['body_font_family'] ) {
		$the_fonts = $options['body_font_family'];
	} else {
		$the_fonts = $options['title_font_family'] . '|' . $options['body_font_family'];
	}
	
	$fonts_url = $fonts_url_base . $the_fonts;
	
	return $fonts_url;
}

function flask_excerpt_length( $length ) {
	return 99;
}
add_filter( 'excerpt_length', 'flask_excerpt_length', 999 );

function flask_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'flask_excerpt_more');

//Support for inserting comments using ajax
function flask_comments_ajax($comment_ID, $comment_status) {
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$ajax_code = -1;
		switch ($comment_status) {
			//if comment requires moderator
			case '0':
				$ajax_code = 0;
				wp_notify_moderator($comment_ID);
				break;
			case '1':
				$ajax_code = 1;
				break;
			default:
				break;
		}
		echo $ajax_code;
		exit;
	}
}
add_action('comment_post', 'flask_comments_ajax', 25, 2);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Header actions file.
 */
require get_template_directory() . '/inc/header-actions.php';

/**
 * Footer actions file.
 */
require get_template_directory() . '/inc/footer-actions.php';

/**
 * Content actions file.
 */
require get_template_directory() . '/inc/content-actions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
