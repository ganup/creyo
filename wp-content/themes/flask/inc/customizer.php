<?php
/**
 * Flask Theme Customizer
 *
 * @package Flask
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flask_customize_register( $wp_customize ) {
	$title_fonts = array(
		'Cardo:400,700' => __('Cardo', 'flask'),
		'Droid+Serif:400,700' => __( 'Droid Serif', 'flask' ),
		'Gentium+Book+Basic:400,700' => __( 'Gentium Book Basic', 'flask' ),
		'Lato:400,300,700' => __( 'Lato', 'flask' ),
		'Lora:400,700' => __( 'Lora', 'flask' ),
		'Merriweather:400,300,700' => __( 'Merriweather', 'flask' ),
		'Old+Standard+TT:400,700' => __( 'Old Standard TT', 'flask' ),
		'Open+Sans:400,300,700' => __( 'Open Sans', 'flask' ),
		'Oxygen:400,300,700' => __( 'Oxygen', 'flask' ),
		'PT+Sans:400,700' => __( 'PT Sans', 'flask' ),
		'PT+Serif:400,700' => __( 'PT Serif', 'flask' ),
		'Roboto:400,300,700' => __( 'Roboto', 'flask' ),
		'Ubuntu:400,300,700' => __( 'Ubuntu', 'flask' ),
	);
	$body_fonts = array(
		'Cardo:400,700' => __('Cardo', 'flask'),
		'Gentium+Book+Basic:400,700' => __( 'Gentium Book Basic', 'flask' ),
		'Lato:400,300,700' => __( 'Lato', 'flask' ),
		'Lora:400,700' => __( 'Lora', 'flask' ),
		'Merriweather:400,300,700' => __( 'Merriweather', 'flask' ),
		'Old+Standard+TT:400,700' => __( 'Old Standard TT', 'flask' ),
		'Open+Sans:400,300,700' => __( 'Open Sans', 'flask' ),
		'Oxygen:400,300,700' => __( 'Oxygen', 'flask' ),
		'PT+Sans:400,700' => __( 'PT Sans', 'flask' ),
		'PT+Serif:400,700' => __( 'PT Serif', 'flask' ),
		'Roboto:400,300,700' => __( 'Roboto', 'flask' ),
		'Vollkorn:400,700' => __('Vollkorn', 'flask'),
	);
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	/**  Settings  **/
	
	//Font Family for Title Fonts Setting
	$wp_customize->add_setting('flask_settings[title_font_family]', array(
			'default'			=> 'Roboto:400,300,700',
			'type'				=> 'option',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_null',
			'transport'			=>	'postMessage',
		)
	);
	
	//Font Family for Body Fonts Setting
	$wp_customize->add_setting('flask_settings[body_font_family]', array(
			'default'			=> 'Gentium+Book+Basic:400,700',
			'type'				=> 'option',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_null',
			'transport'			=>	'postMessage',
		)
	);
	
	//Base Font Size Setting
	$wp_customize->add_setting('flask_settings[font_size]', array(
			'default'			=> '18px',
			'type'				=> 'option',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_null',
			'transport'			=>	'postMessage',
		)
	);

	//Base Font Size Setting
	$wp_customize->add_setting('flask_settings[hyphens]', array(
			'default'			=> '1',
			'type'				=> 'option',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_null',
			'transport'			=>	'postMessage',
		)
	);
	
	//Site License setting
	$wp_customize->add_setting( 'flask_settings[site_license]' , array(
			'default'			=> 'Copyright ' . date("Y") . ', ' . get_bloginfo( 'name', 'display' ),
			'type'				=> 'option',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_null',
			'transport'			=>	'postMessage',
	) );

	//Hide Footer setting
	$wp_customize->add_setting( 'flask_settings[hide_footer]' , array(
			'default'			=> '',
			'type'				=> 'option',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_null',
			'transport'			=>	'postMessage',
	) );

	//Sidebar left or right setting
	$wp_customize->add_setting( 'flask_settings[sidebar_side]' , array(
			'default'			=> 'right',
			'type'				=> 'option',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_null',
			'transport'			=>	'postMessage',
	) );

	//excerpts or full text on the blog page setting
	$wp_customize->add_setting( 'flask_settings[excerpt_full_blog]' , array(
	    'default'			=> 'excerpt',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback'	=> 'sanitize_null',
	) );
	//excerpts or full text on the archives page setting
	$wp_customize->add_setting( 'flask_settings[excerpt_full_archive]' , array(
	    'default'			=> 'excerpt',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback'	=> 'sanitize_null',
	) );

	//excerpts or full text on the search page setting
	$wp_customize->add_setting( 'flask_settings[excerpt_full_search]' , array(
	    'default'			=> 'excerpt',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback'	=> 'sanitize_null',
	) );

	//Social Media settings
	
	//facebook
	$wp_customize->add_setting( 'flask_settings[follow_facebook]' , array(
	    'default'			=> '',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback'	=> 'esc_url',
	) );
	
	//twitter
	$wp_customize->add_setting( 'flask_settings[follow_twitter]' , array(
	    'default'			=> '',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback' => 'esc_url',
	) );
	
	//google plus
	$wp_customize->add_setting( 'flask_settings[follow_googleplus]' , array(
	    'default'			=> '',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback' => 'esc_url',
	) );

	//linkedin
	$wp_customize->add_setting( 'flask_settings[follow_linkedin]' , array(
	    'default'			=> '',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback' => 'esc_url',
	) );

	//youtube
	$wp_customize->add_setting( 'flask_settings[follow_youtube]' , array(
	    'default'			=> '',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback' => 'esc_url',
	) );

	//pinterest
	$wp_customize->add_setting( 'flask_settings[follow_pinterest]' , array(
	    'default'			=> '',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback' => 'esc_url',
	) );

	//pinterest
	$wp_customize->add_setting( 'flask_settings[follow_flickr]' , array(
	    'default'			=> '',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback' => 'esc_url',
	) );

	//instagram
	$wp_customize->add_setting( 'flask_settings[follow_instagram]' , array(
	    'default'			=> '',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback' => 'esc_url',
	) );

	//include share buttons in posts and pages
	$wp_customize->add_setting( 'flask_settings[social_share]' , array(
	    'default'			=> '1',
	    'type'				=> 'option',
		 'capability'		=> 'edit_theme_options',
	    'sanitize_callback' => 'sanitize_null',
	) );
	
	/**  Panels  **/
	
	//Panel with custom options for the theme
	$wp_customize->add_panel('flask_options_panel', array(
			'priority' 			=> 200,
			'capability' 		=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title' 			=> __( 'Settings for the Flask theme', 'flask' ),
			'description' 		=> __( 'Configuration for the Flask theme', 'flask' ),
		)
	);
	
	/**  Sections  **/
	
	//Font settings section
	$wp_customize->add_section('flask_fonts_section', array(
			'title'			=> __( 'Font Options', 'flask' ),
			'description'	=> __( 'Settings for customizing fonts and font sizes.', 'flask' ),
			'panel'			=> 'flask_options_panel',
			'priority' 			=> 20,
		)
	);
	
	//Font settings section
	$wp_customize->add_section('flask_layout_section', array(
			'title'			=> __( 'Layout Options', 'flask' ),
			'description'	=> __( 'Settings for customizing the default page layout.', 'flask' ),
			'panel'			=> 'flask_options_panel',
			'priority' 			=> 30,
		)
	);

	//Custom Footer section
	$wp_customize->add_section('flask_footer_section', array(
			'title'			=> __( 'Site Footer', 'flask' ),
			'description'	=> __( 'Customize the site footer by choosing a license, whether to display widget areas, or whether to display the footer at all.', 'flask' ),
			'panel'			=> 'flask_options_panel',
			'priority' 			=> 40,
		)
	);

	//Share on Social Media section
	$wp_customize->add_section('flask_social_media_section', array(
			'title'			=> __( 'Social Media', 'flask' ),
			'description'	=> __( 'Include buttons that will allow users to follow you on your preferred social media networks. Simply insert properly formed urls for your profiles on the services you would like displayed, and they will appear in the Main Menu panel.', 'flask' ),
			'panel'			=> 'flask_options_panel',
			'priority' 			=> 35,
		)
	);
	
	/**  Controls  **/

	//Font Family for Title Fonts Control
	$wp_customize->add_control('flask_title_font_family_control', array(
			'settings'		=> 'flask_settings[title_font_family]',
			'section'		=> 'flask_fonts_section',
			'type'			=> 'select',
			'label'			=> __( 'Title Font', 'flask' ),
			'priority' 			=> 20,
			'choices'		=> $title_fonts,
	) );

	//Font Family for Body Fonts Control
	$wp_customize->add_control('flask_body_font_family_control', array(
			'settings'		=> 'flask_settings[body_font_family]',
			'section'		=> 'flask_fonts_section',
			'type'			=> 'select',
			'label'			=> __( 'Body Font', 'flask' ),
			'priority' 			=> 30,
			'choices'		=> $body_fonts,
	) );

	//Font Family for Body Fonts Control
	$wp_customize->add_control('flask_font_size_control', array(
			'settings'		=> 'flask_settings[font_size]',
			'section'		=> 'flask_fonts_section',
			'type'			=> 'select',
			'label'			=> __( 'Base Font Size', 'flask' ),
			'description'	=> __( 'All text will be sized proportionately.', 'flask' ),
			'priority' 			=> 10,
			'choices'		=> array(
				'14px' => __( 'X-Small', 'flask' ),
				'16px' => __( 'Small', 'flask' ),
				'18px' => __( 'Medium', 'flask' ),
				'20px' => __( 'Large', 'flask' ),
			),
	) );
	
	//Hyphens
	$wp_customize->add_control('flask_hyphens', array(
			'settings'		=> 'flask_settings[hyphens]',
			'section'		=> 'flask_fonts_section',
			'type'			=> 'checkbox',
			'label'			=> __( 'Hyphens in site content?', 'flask' ),
			'priority'		=> 40,
		)
	);

	//Custom Site License Control
	$wp_customize->add_control( 'flask_site_license_control', array(
			'settings'		=> 'flask_settings[site_license]',
			'section'		=> 'flask_footer_section',
			'type'			=> 'textarea',
			'label'			=> __( 'Site License', 'flask' ),
			'description'	=> __( 'We suggest Creative Commons licenses for most sites.', 'flask' ),
			'priority'		=> 10,
		)
	);

	//Hide Footer Control
	$wp_customize->add_control('flask_hide_site_footer', array(
			'settings'		=> 'flask_settings[hide_footer]',
			'section'		=> 'flask_footer_section',
			'type'			=> 'checkbox',
			'label'			=> __( 'Hide the site Footer', 'flask' ),
			// 'description'	=> __( 'Makes the section with the site license and info disappear', 'flask' ),
			'priority'		=> 20,
		)
	);

	//Sidebar Left or Right Control
	$wp_customize->add_control('flask_layout_control', array(
			'settings'		=> 'flask_settings[sidebar_side]',
			'section'		=> 'flask_layout_section',
			'type'			=> 'select',
			'label'			=> __( 'Sidebar Position', 'flask' ),
			'description'	=> __( 'Determines the default sidebar position. Selecting "none" does not affect pages. Page sidebars are set individually through page templates.', 'flask' ),
			'priority' 			=> 10,
			'choices'		=> array(
				'left' => __( 'Left', 'flask' ),
				'right' => __( 'Right', 'flask' ),
				'none' => __( 'None', 'flask' ),
			),
	) );

	//Full text or excerpts on the main blog page control
	$wp_customize->add_control('excerpt_full_blog', array(
			'settings'		=> 'flask_settings[excerpt_full_blog]',
			'section'		=> 'flask_layout_section',
			'type'			=> 'select',
			'label'			=> __( 'Main Blog Content', 'flask' ),
			'description'	=> __( 'Full text or excerpts on the main blog page.', 'flask' ),
			'priority' 			=> 30,
			'choices'		=> array(
				'excerpt' => __( 'Excerpt', 'flask' ),
				'full' => __( 'Full Text', 'flask' ),
			),
	) );

	//Full text or excerpts on the archive page control
	$wp_customize->add_control('excerpt_archive', array(
			'settings'		=> 'flask_settings[excerpt_full_archive]',
			'section'		=> 'flask_layout_section',
			'type'			=> 'select',
			'label'			=> __( 'Archive Content', 'flask' ),
			'description'	=> __( 'Full text or excerpts on archives pages.', 'flask' ),
			'priority' 			=> 40,
			'choices'		=> array(
				'excerpt' => __( 'Excerpt', 'flask' ),
				'full' => __( 'Full Text', 'flask' ),
			),
	) );

	//Full text or excerpts on the search page control
	$wp_customize->add_control('excerpt_search', array(
			'settings'		=> 'flask_settings[excerpt_full_search]',
			'section'		=> 'flask_layout_section',
			'type'			=> 'select',
			'label'			=> __( 'Search Content', 'flask' ),
			'description'	=> __( 'Full text or excerpts on search pages.', 'flask' ),
			'priority' 			=> 50,
			'choices'		=> array(
				'excerpt' => __( 'Excerpt', 'flask' ),
				'full' => __( 'Full Text', 'flask' ),
			),
	) );

	//Facebook URL control
	$wp_customize->add_control( 'flask_follow_facebook_control', array(
			'settings'		=> 'flask_settings[follow_facebook]',
			'section'		=> 'flask_social_media_section',
			'type'			=> 'url',
			'label'			=> __( 'Facebook', 'flask' ),
			'priority'		=> 10,
		)
	);

	//Twitter URL control
	$wp_customize->add_control( 'flask_follow_twitter_control', array(
			'settings'		=> 'flask_settings[follow_twitter]',
			'section'		=> 'flask_social_media_section',
			'type'			=> 'url',
			'label'			=> __( 'Twitter', 'flask' ),
			'priority'		=> 20,
		)
	);

	//Google Plus URL control
	$wp_customize->add_control( 'flask_follow_googleplus_control', array(
			'settings'		=> 'flask_settings[follow_googleplus]',
			'section'		=> 'flask_social_media_section',
			'type'			=> 'url',
			'label'			=> __( 'Google Plus', 'flask' ),
			'priority'		=> 30,
		)
	);

	//LinkedIn URL control
	$wp_customize->add_control( 'flask_follow_linkedin_control', array(
			'settings'		=> 'flask_settings[follow_linkedin]',
			'section'		=> 'flask_social_media_section',
			'type'			=> 'url',
			'label'			=> __( 'LinkedIn', 'flask' ),
			'priority'		=> 40,
		)
	);
	
	//YouTube URL control
	$wp_customize->add_control( 'flask_follow_youtube_control', array(
			'settings'		=> 'flask_settings[follow_youtube]',
			'section'		=> 'flask_social_media_section',
			'type'			=> 'url',
			'label'			=> __( 'YouTube', 'flask' ),
			'priority'		=> 50,
		)
	);

	//Pinterest URL control
	$wp_customize->add_control( 'flask_follow_pinterest_control', array(
			'settings'		=> 'flask_settings[follow_pinterest]',
			'section'		=> 'flask_social_media_section',
			'type'			=> 'url',
			'label'			=> __( 'Pinterest', 'flask' ),
			'priority'		=> 60,
		)
	);

	//Flickr URL control
	$wp_customize->add_control( 'flask_follow_flickr_control', array(
			'settings'		=> 'flask_settings[follow_flickr]',
			'section'		=> 'flask_social_media_section',
			'type'			=> 'url',
			'label'			=> __( 'Flickr', 'flask' ),
			'priority'		=> 70,
		)
	);

	//Instagram URL control
	$wp_customize->add_control( 'flask_follow_instagram_control', array(
			'settings'		=> 'flask_settings[follow_instagram]',
			'section'		=> 'flask_social_media_section',
			'type'			=> 'url',
			'label'			=> __( 'Instagram', 'flask' ),
			'priority'		=> 80,
		)
	);

	//Include Share Buttons in Posts and Pages
	$wp_customize->add_control('flask_social_share', array(
			'settings'		=> 'flask_settings[social_share]',
			'section'		=> 'flask_social_media_section',
			'type'			=> 'checkbox',
			'label'			=> __( 'Share buttons on posts and pages?', 'flask' ),
			'description'	=> __( 'Decide whether to include social media buttons at the top of each post or page that will allow users to share each post or page to Facebook, Twitter, LinkedIn, or Google Plus. (This is regardless of whether you use the Social Media URLs above.)', 'flask' ),
			'priority'		=> 90,
		)
	);

}
add_action( 'customize_register', 'flask_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function flask_customize_preview_js() {
	wp_enqueue_script( 'flask_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'flask_customize_preview_js' );

function sanitize_null($i) {
	return $i;
}