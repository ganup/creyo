<?php
/**
 * Enqueue scripts and styles.
 */

function brawny_fontawesome() {
    wp_deregister_style( 'redux-elusive-icon' );
    wp_deregister_style( 'redux-elusive-icon-ie7' );
	wp_enqueue_style( 'brawny-fontawesome', BRAWNY_PARENT_URL . '/css/font-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'brawny_fontawesome' );
add_action( 'redux/page/brawny/enqueue', 'brawny_fontawesome' );

function brawny_scripts() {   
    wp_enqueue_style( 'brawny-oswald', brawny_theme_font_url('Oswald:400,300,700'), array(), 20141212 );
	wp_enqueue_style( 'flexslider', BRAWNY_PARENT_URL . '/css/flexslider.css' );
	wp_enqueue_style( 'brawny-style', get_stylesheet_uri() );

	wp_enqueue_script( 'brawny-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'brawny-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'jquery-flexslider', BRAWNY_PARENT_URL . '/js/jquery.flexslider-min.js', array( 'jquery' ), '2.2.2', true );
	wp_enqueue_script( 'jquery-ui-tabs', false, array( 'jquery' ) );
	wp_enqueue_script( 'brawny-custom', BRAWNY_PARENT_URL . '/js/custom.js', array( 'jquery' ), '1.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if( get_theme_mod('sticky_header',false) ){
		wp_enqueue_script( 'brawny-custom-sticky', get_template_directory_uri() . '/js/custom-sticky.js', array('jquery'), '1.0.0', true );
	}
	wp_enqueue_script('masonry');

  
		switch ( get_theme_mod('color' ) ) {
			case '1':
				wp_enqueue_style( 'brawny-blue', BRAWNY_PARENT_URL . '/css/default.css');
				break;			
			case '2':
				wp_enqueue_style( 'brawny-blue', BRAWNY_PARENT_URL . '/css/lightpurple.css');
				break;
			case '3':
				wp_enqueue_style( 'brawny-blue', BRAWNY_PARENT_URL . '/css/lightpurple-nav.css');
				break;
			default:
				wp_enqueue_style( 'brawny-blue', BRAWNY_PARENT_URL . '/css/default.css');
				break;
		}		
	}

add_action( 'wp_enqueue_scripts', 'brawny_scripts' );

/**
 * Register Google fonts.
 *
 * @return string
 */
function brawny_theme_font_url($font) {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Font, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Font: on or off', 'brawny' ) ) {
		$font_url = esc_url( add_query_arg( 'family', urlencode($font), "//fonts.googleapis.com/css" ) );
	}

	return $font_url;
}

function brawny_admin_style() {
	wp_enqueue_style( 'brawny-fontawesome', BRAWNY_PARENT_URL . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'brawny-admin', BRAWNY_PARENT_URL . '/css/admin.css' );
	wp_enqueue_style( 'brawny-admin-css', get_template_directory_uri() . '/admin/css/admin.css');


}
add_action( 'admin_enqueue_scripts', 'brawny_admin_style' );

function brawny_admin_enqueue_scripts( $hook ) {
	if( strpos( $hook, 'brawny_upgrade') ) {
		wp_enqueue_style( 
			'font-awesome',
			get_template_directory_uri() . '/css/font-awesome.min.css', 
			array(), 
			'4.3.0', 
			'all' 
		);
		wp_enqueue_style( 
			'brawny-admin-css', 
			get_template_directory_uri() . '/admin/css/admin.css', 
			array(), 
			'1.0.0', 
			'all' 
		);

	}
}
add_action( 'admin_enqueue_scripts', 'brawny_admin_enqueue_scripts' );


function brawny_admin_customizer_enqueue_scripts(){
	   wp_enqueue_script( 
			'brawny-customizer-review-script', 
			get_template_directory_uri() . '/admin/js/script.js',
			array('jquery'),
			'1.0.0',
			true
		); 
	   wp_enqueue_style( 
			'brawny-customizer-css', 
			get_template_directory_uri() . '/admin/css/customizer.css', 
			array(), 
			'1.0.0', 
			'all' 
		);
}
add_action( 'admin_enqueue_scripts', 'brawny_admin_customizer_enqueue_scripts');