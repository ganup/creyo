<?php

/**
 * Simple Portfolio functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Simple Portfolio
 */
if (!function_exists('simple_portfolio_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function simple_portfolio_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Simple Portfolio, use a find and replace
         * to change 'really-simple-portfolio' to the name of your theme in all the template files
         */
        load_theme_textdomain('really-simple-portfolio', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('really-simple-portfolio-large-thumb', 960, 365, true);
        add_image_size('really-simple-portfolio-small-thumb', 158, 158, true);


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'really-simple-portfolio'),
            'social' => esc_html__('Social Menu', 'really-simple-portfolio'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));


        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('simple_portfolio_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif; // simple_portfolio_setup
add_action('after_setup_theme', 'simple_portfolio_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simple_portfolio_content_width() {
    $GLOBALS['content_width'] = apply_filters('simple_portfolio_content_width', 640);
}

add_action('after_setup_theme', 'simple_portfolio_content_width', 0);



/**
 * Enqueue scripts and styles.
 */
function simple_portfolio_scripts() {
    wp_enqueue_style('really-simple-portfolio-style', get_stylesheet_uri());

    if (is_page_template('page-templates/page-home.php') || is_home()) {
        wp_enqueue_style( 'really-simple-portfolio-homepage-style' , get_template_directory_uri() . '/layouts/content.css');
        } else {
        wp_enqueue_style( 'really-simple-portfolio-layout-style' , get_template_directory_uri() . '/layouts/content-blog.css');
    }

    wp_enqueue_style('really-simple-portfolio-google-fonts', '//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic');

    wp_enqueue_style ('really-simple-portfolio-fontawesome', get_template_directory_uri() .'/font-awesome/css/font-awesome.min.css');

    wp_enqueue_script('really-simple-portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('really-simple-portfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'simple_portfolio_scripts');

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
