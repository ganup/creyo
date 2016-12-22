<?php
/*
 * Enqueue style and scripts
 */

function mymagazine_theme_styles() {
		wp_enqueue_style( 'mymagazine_google_fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,700,300italic' );
		wp_enqueue_style( 'mymagazine_foundation', get_template_directory_uri() . '/css/foundation.min.css' );
		wp_enqueue_style( 'mymagazine_main_css', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'mymagazine_theme_styles' );

function mymagazine_theme_scripts() {
        wp_enqueue_script( 'mymagazine-responsiveslides', get_template_directory_uri() . '/js/responsiveslides.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'mymagazine_scripts', get_template_directory_uri() . '/js/mymagazine-scripts.js', array('jquery'), '', true );
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'mymagazine_theme_scripts' );

function mymagazine_setup(){
     
	 /*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'mymagazine', get_template_directory() . '/languages' );
    
    if ( ! isset( $content_width ) ) $content_width = 1100;
    
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mymagazine' ),
        'social' => __( 'Social Menu', 'mymagazine' ),
	) );
    add_theme_support( 'custom-background' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
		$args = array(
		'flex-width'    => true,
		'width'         => 1100,
		'flex-height'    => true,
		'height'        => 126,
		'default-image' => '',
	);
	add_theme_support( 'custom-header', $args );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );
    add_theme_support( 'post-formats', array(
        'aside', 'gallery', 'image', 'video',
    ) );
	add_image_size( 'mymagazine-size', 703, 527 );

}
add_action( 'after_setup_theme', 'mymagazine_setup' );

/**
* Register widgetized area and update sidebar with default widgets
*/
function mymagazine_widgets_init() {
    
    register_sidebar( array(
        'name' => __( 'Right Sidebar Widget Area', 'mymagazine' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget-container">',
        'after_widget' => '</div></aside>',
        'before_title' => '<div class="widget-title"><h3>',
        'after_title' => '</h3></div>',
    ) );
        
    register_sidebar( array(
        'name' => __( 'Footer Widget Area', 'mymagazine' ),
        'id' => 'sidebar-2',
        'before_widget' => '<div class="small-12 medium-3 columns"><aside id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Below the Content Widget Area', 'mymagazine' ),
        'id' => 'sidebar-3',
        'before_widget' => '<div class="widget widget-suggest row">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title"><h4>',
        'after_title' => '</h4></div>',
    ) );

}

add_action( 'widgets_init', 'mymagazine_widgets_init' );


/*
 * Adds editor style 
 *
 */

function mymagazine_add_editor_styles() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,700,300italic' );
    add_editor_style( $font_url );
    add_editor_style( 'mymagazine-editor-style.css' );
}
add_action( 'admin_init', 'mymagazine_add_editor_styles' );



/**
* Custom template tags for this theme.
*/
require( get_template_directory().'/inc/template-tags.php');

/**
 * Customizer additions.
 *
 */
require ( get_template_directory() . '/inc/customizer.php' );



/**
 * Adds an author box to the main column on the Post edit screens.
 */
if ( ! function_exists( 'mymagazine_add_author_meta_box' ) ) {

		function mymagazine_add_author_meta_box() {
		
			add_meta_box(
					'mymagazine_author',
					__( 'Author display', 'mymagazine' ),
					'mymagazine_author_meta_box_callback',
					'post',
					'normal',
					'high'
			);
		}
}

add_action( 'add_meta_boxes', 'mymagazine_add_author_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
if ( ! function_exists( 'mymagazine_author_meta_box_callback' ) ) {
 
		function mymagazine_author_meta_box_callback( $post ) {
		
			// Add a nonce field so we can check for it later.
			wp_nonce_field( 'mymagazine_save_author_meta_box_data', 'mymagazine_author_meta_box_nonce' );
		
			/*
			 * Use get_post_meta() to retrieve an existing value
			 * from the database and use the value for the form.
			 */
			$value = get_post_meta( $post->ID, '_author_key', true );
		
			echo '<label for="mymagazine_author">';
			_e( 'Display author\'s description?', 'mymagazine' );
			echo '</label></br> ';
				if ($value == '1') {
					echo '<input type="checkbox" name="mymagazine_author" value="1" checked="checked"/>';
				} else {
					echo '<input type="checkbox" name="mymagazine_author" value="0" />';
				}     
		}
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */

if ( ! function_exists( 'mymagazine_save_author_meta_box_data' ) ) {

		function mymagazine_save_author_meta_box_data( $post_id ) {
		
			/*
			 * We need to verify this came from our screen and with proper authorization,
			 * because the save_post action can be triggered at other times.
			 */
		
			// Check if our nonce is set.
			if ( ! isset( $_POST['mymagazine_author_meta_box_nonce'] ) ) {
				return;
			}
		
			// Verify that the nonce is valid.
			if ( ! wp_verify_nonce( $_POST['mymagazine_author_meta_box_nonce'], 'mymagazine_save_author_meta_box_data' ) ) {
				return;
			}
		
			// If this is an autosave, our form has not been submitted, so we don't want to do anything.
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}
		
			// Check the user's permissions.
		
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
			
			// Make sure that it is set and sanitize data
			if ( ! isset( $_POST['mymagazine_author'] ) ) {
				$my_data = "0";
			} else {
					$my_data = "1";
				}
		
			// Update the meta field in the database.
			update_post_meta( $post_id, '_author_key', $my_data );
		}
}
add_action( 'save_post', 'mymagazine_save_author_meta_box_data' );



/**
 * Function used to display the first tag of a post
 */

if ( ! function_exists( 'mymagazine_posttags' ) ) {
 
		function mymagazine_posttags(){
			$posttags = get_the_tags();
			if ($posttags) {
				echo '<a href="' . esc_url( get_tag_link( $posttags[0]->term_id ) ) . '" title="' . sprintf( __( "View all posts in %s", 'mymagazine' ), $posttags[0]->name ) . '" ' . '>' . $posttags[0]->name.'</a> ';
			}
		}
 }
 
/**
 * Function used to display the first category of a post
 */
if ( ! function_exists( 'mymagazine_postcategory' ) ) {
		function mymagazine_postcategory(){
			$category = get_the_category();
				if ($category) {
					echo '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '" title="' . sprintf( __( "View all posts in %s", 'mymagazine' ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
				}
		}
}
/**
 * Function used to return the first category of a post
 */
if ( ! function_exists( 'mymagazine_namecategory' ) ) {
		
		function mymagazine_namecategory(){
			$category = get_the_category();
			$catslug = $category[0]->name;
			return $catslug;
		}
}

/**
 * Function used to avoid page scroll clicking on "Read More"
 */
if ( ! function_exists( 'mymagazine_remove_more_link_scroll' ) ) {
		function mymagazine_remove_more_link_scroll( $link ) {
			$link = preg_replace( '|#more-[0-9]+|', '', $link );
			return $link;
		}
}
add_filter( 'the_content_more_link', 'mymagazine_remove_more_link_scroll' );

/**
 * Function used to customize the "Read More" link
 */

add_filter( 'the_content_more_link', 'mymagazine_modify_read_more_link' );

if ( ! function_exists( 'mymagazine_modify_read_more_link' ) ) {
		function mymagazine_modify_read_more_link() {
		return '<a class="more-link" href="' . esc_url( get_permalink() ). '">'. __( "Read More", 'mymagazine' ).'</a>';
		}
}
/*
 * Function used to avoid the archive name from the archive title. For example "Nature" instead of "Category: Nature"
 */

add_filter( 'get_the_archive_title', 'mymagazine_remove_name_from_archive_title' );

if ( ! function_exists( 'mymagazine_remove_name_from_archive_title' ) ) {
		function mymagazine_remove_name_from_archive_title( $title ) {
			if ( is_category() ) {
				$title = str_replace( 'Category:', '', $title );
			} elseif ( is_tag() ) {
				$title = str_replace( 'Tag:', '', $title );
			} elseif ( is_author() ) {
				$title = str_replace( 'Author:', '', $title );
			} elseif ( is_year() ) {
				$title = str_replace( 'Year:', '', $title );
			} elseif ( is_month() ) {
				$title = str_replace( 'Month:', '', $title );
			} elseif ( is_day() ) {
				$title = str_replace( 'Day:', '', $title );
			}
			return $title;
		}
}

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'mymagazine_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 */

if ( ! function_exists( 'mymagazine_register_required_plugins' ) ) {
		
		function mymagazine_register_required_plugins() {
			
			$plugins = array(	
				array(
					'name'               => 'Mymagazine Features', 
					'slug'               => 'mymagazine-features', 
					'source'             => 'http://www.svgthemes.com/wp-content/themes/mymagazine/mymagazine-features.zip', 
					'required'           => false, 
					'version'            => '1.0', 
					'force_activation'   => true, 
					'force_deactivation' => true, 
				),
			);
		
			$config = array(
				'id'           => 'mymagazine-tgmpa',
				'menu'         => 'mymagazine-install-plugins', 
				'parent_slug'  => 'themes.php',            
				'capability'   => 'edit_theme_options',    
				'has_notices'  => true,                    
				'dismissable'  => true,                    
				'dismiss_msg'  => __("You need to install this plugin to use all the features included in the theme.", "mymagazine"),                      
				'is_automatic' => false,                   
				'message'      => '',                      
				);
			tgmpa( $plugins, $config );
		}
}
