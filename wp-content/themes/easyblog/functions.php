<?php
/**
 * EasyBlog functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EasyBlog
 */

if ( ! function_exists( 'easyblog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function easyblog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on EasyBlog, use a find and replace
	 * to change 'easyblog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'easyblog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom Image Crop
	add_image_size( 'easyblog-blog-img', 800, 400, true );
	add_image_size( 'easyblog-recent-posts-img', 480, 320, true );

	// Header Image Size
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'easyblog_header_image_width', 1920 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'easyblog_header_image_height', 500 ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Add Custom Logo Support
	 */
	add_theme_support( 'custom-logo' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'easyblog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'easyblog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // easyblog_setup
add_action( 'after_setup_theme', 'easyblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function easyblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'easyblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'easyblog_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function easyblog_scripts() {

	// Enqueue Bootstrap Grid
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.5', '' );

	// Enqueue FontAwesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0', '' );

	// Enqueue Google fonts
	wp_enqueue_style( 'easyblog-roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' );
	wp_enqueue_style( 'easyblog-delius-swash-caps', '//fonts.googleapis.com/css?family=Delius+Swash+Caps' );

	// Stylesheet
	wp_enqueue_style( 'easyblog-style', get_stylesheet_uri() );

	// Custom JS
	wp_enqueue_script( 'easyblog-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'easyblog_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load Widgets file
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Breadcrumbs
 */
function easyblog_breadcrumb() {
	global $post;
	echo '<ul id="dt_breadcrumbs">';
	if ( !is_home() ) {
		echo '<li><a href="';
		echo esc_url( home_url() );
		echo '">';
		echo __( 'Home', 'easyblog' );
		echo '</a></li><li class="separator"> / </li>';
		if ( is_category() || is_single() ) {
			echo '<li>';
			the_category( ' </li><li class="separator"> / </li><li> ' );
			if ( is_single() ) {
				echo '</li><li class="separator"> / </li><li>';
				the_title();
				echo '</li>';
			}
		} elseif ( is_page() ) {
			if ( $post->post_parent ){
				$anc = get_post_ancestors( $post->ID );
				$title = get_the_title();
				foreach ( $anc as $ancestor ) {
					$output = '<li><a href="'. esc_url( get_permalink( $ancestor ) ) .'" title="'. esc_attr( get_the_title( $ancestor ) ) .'">'. esc_attr( get_the_title( $ancestor ) ) .'</a></li> <li class="separator"> / </li>';
				}
				echo $output;
				echo esc_attr( $title );
			} else {
				'<li>'. the_title_attribute() .'</li>';
			}
		}
	} elseif ( is_tag() ) {
		single_tag_title();
	} elseif ( is_day() ) {
		echo"<li>" . __( 'Archive for', 'easyblog' ); the_time( 'F jS, Y' ); echo'</li>';
	} elseif ( is_month() ) {
		echo"<li>" . __( 'Archive for', 'easyblog' ); the_time( 'F, Y' ); echo'</li>';
	} elseif ( is_year() ) {
		echo"<li>" . __( 'Archive for', 'easyblog' ); the_time( 'Y' ); echo'</li>';
	} elseif ( is_author( ) ) {
		echo"<li>" . __( 'Author Archive', 'easyblog' ); echo'</li>';
	} elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) {
		echo "<li>" . __( 'Blog Archive', 'easyblog' ); echo'</li>';
	} elseif ( is_search() ) {
		echo"<li>" . __( 'Search Results', 'easyblog' ); echo'</li>';
	}
	echo '</ul>';
}

/**
 * Add editor style
 */
function easyblog_add_editor_styles() {
	add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'easyblog_add_editor_styles' );


/**
 * Filter the except length to 40 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function easyblog_archive_excerpt_length( $length ) {
	return ( is_front_page() ) ? 50 : 45;
}
add_filter( 'excerpt_length', 'easyblog_archive_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function easyblog_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'easyblog_excerpt_more' );
