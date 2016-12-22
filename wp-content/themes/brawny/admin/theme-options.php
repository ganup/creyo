<?php
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 2/5/16
 * Time: 4:32 PM        
 */ 

include_once( get_template_directory() . '/admin/kirki/kirki.php' );     
include_once( get_template_directory() . '/admin/kirki-helpers/class-brawny-kirki.php' );
       
Brawny_Kirki::add_config( 'brawny', array(     
	'capability'    => 'edit_theme_options',                   
	'option_type'   => 'theme_mod',         
) );             
     
// Brawny option start //   

//  site identity section // 

Brawny_Kirki::add_section( 'title_tagline', array(
	'title'          => __( 'Site Identity','brawny' ),
	'description'    => __( 'Site Header Options', 'brawny'),       
	'priority'       => 8,         																																															
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'site-title',
	'label'    => __( 'Enable Logo as Title', 'brawny' ),
	'section'  => 'title_tagline',
	'type'     => 'switch',
	'priority' => 5,
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'off',   
) );
/*Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'custom-logo',
	'label'    => __( 'Upload Logo', 'brawny' ),
	'section'  => 'title_tagline',
	'type'     => 'image',
));*/
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'tagline',
	'label'    => __( 'Show site Tagline', 'brawny' ), 
	'section'  => 'title_tagline',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'on',
) );
/*Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'display_header_text',
	'label'    => __( 'Show Site Title and Tagline', 'brawny' ), 
	'section'  => 'title_tagline',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'on',
) );*/

// home panel //

Brawny_Kirki::add_panel( 'home_options', array(     
	'title'       => __( 'Home', 'brawny' ),
	'description' => __( 'Home Page Related Options', 'brawny' ),     
) );  

// home page type section

Brawny_Kirki::add_section( 'home_type_section', array(
	'title'          => __( 'General Settings','brawny' ),
	'description'    => __( 'Home Page options', 'brawny'),
	'panel'          => 'home_options', // Not typically needed. 
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'enable_home_default_content',
	'label'    => __( 'Enable Home Page Default Content', 'brawny' ),
	'section'  => 'home_type_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	
	'default'  => 'off',
	'tooltip' => __('Enable home page default content ( home page content )','brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'home_sidebar',
	'label'    => __( 'Enable sidebar on the Home page', 'brawny' ),
	'section'  => 'home_type_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	
	'default'  => 'off',
	'tooltip' => __('Disable by default. If you want to display the sidebars in your frontpage, turn this Enable.','brawny'),
) );
 

// Slider section

Brawny_Kirki::add_section( 'slider_section', array(
	'title'          => __( 'Flex Slider Settings','brawny' ),
	'description'    => __( '', 'brawny'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Brawny_Kirki::add_field( 'brawny', array(  
	'settings' => 'enable_slider',
	'label'    => __( 'Enable Slider Post ( Section )', 'brawny' ),
	'section'  => 'slider_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ),
	),
	'default'  => 'on',
	'tooltip' => __('Enable Slider Post in home page','brawny'),
) );
Brawny_Kirki::add_field( 'brawny',array(
	'settings'  =>'image_upload-1',
	'label'     =>__( 'Upload Image - Slider 1', 'brawny'),
	'section'   =>'slider_section',
	'type'      =>'image',
	'default'   =>BRAWNY_PARENT_URL.'/images/slide1.png',
	
));
Brawny_Kirki::add_field( 'brawny',array(
	'settings'  =>'flexcaption-1',
	'label'     =>__('Enter Text (Flexcaption)- Slider 1', 'brawny'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
	'default'  =>sprintf( __('<h1>The Most Modern WordPress Theme</h1><h3> Slider Setting </h3><p>You haven\'t created any slider yet. Go to Customizer and click Home => FlexSlider Settings, edit or add  your images and Caption.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'brawny'),  admin_url('customize.php') ),
));
Brawny_Kirki::add_field( 'brawny',array(
	'settings'  =>'image_upload-2',
	'label'     =>__( 'Upload Image - Slider 2', 'brawny'),
	'section'   =>'slider_section',
	'type'      =>'image',
	
));
Brawny_Kirki::add_field( 'brawny',array(
	'settings'  =>'flexcaption-2',
	'label'     =>__('Enter Text (Flexcaption)- Slider 2', 'brawny'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
));
Brawny_Kirki::add_field( 'brawny',array(
	'settings'  =>'image_upload-3',
	'label'     =>__( 'Upload Image - Slider 3', 'brawny'),
	'section'   =>'slider_section',
	'type'      =>'image',
));
Brawny_Kirki::add_field( 'brawny',array(
	'settings'  =>'flexcaption-3',
	'label'     =>__('Enter Text (Flexcaption)- Slider 3', 'brawny'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
));
Brawny_Kirki::add_field( 'brawny',array(
	'settings'  =>'image_upload-4',
	'label'     =>__( 'Upload Image - Slider 4', 'brawny'),
	'section'   =>'slider_section',
	'type'      =>'image',
));
Brawny_Kirki::add_field( 'brawny',array(
	'settings'  =>'flexcaption-4',
	'label'     =>__('Enter Text (Flexcaption)- Slider 4', 'brawny'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
));
Brawny_Kirki::add_field( 'brawny',array(
	'settings'  =>'image_upload-5',
	'label'     =>__( 'Upload Image - Slider 5', 'brawny'),
	'section'   =>'slider_section',
	'type'      =>'image',
));
Brawny_Kirki::add_field( 'brawny',array(
	'settings'  =>'flexcaption-5',
	'label'     =>__('Enter Text (Flexcaption)- Slider 5', 'brawny'),
	'section'  =>'slider_section',
	'type'     =>'textarea',
));
/*Brawny_Kirki::add_field( 'brawny', array(  
	'settings' => 'enable_slider',
	'label'    => __( 'Enable Slider Post ( Section )', 'brawny' ),
	'section'  => 'slider_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ),
	),
	'default'  => 'on',
	
	'tooltip' => __('Enable Slider Post in home page','brawny'),
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'slider_cat',
	'label'    => __( 'Slider Posts category', 'brawny' ),
	'section'  => 'slider_section',
	'type'     => 'select',
	'choices' => Kirki_Helper::get_terms( 'category' ),
	'active_callback' => array(
		array(
			'setting'  => 'enable_slider',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Create post ( Goto Dashboard => Post => Add New ) and Post Featured Image ( Preferred size is 1200 x 450 pixels ) as taken as slider image and Post Content as taken as Flexcaption.','brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'slider_count',
	'label'    => __( 'No. of Sliders', 'brawny' ),
	'section'  => 'slider_section',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 999,
		'step' => 1,
	),
	'default'  => 2,
	'active_callback' => array(
		array(
			'setting'  => 'enable_slider',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Enter number of slides you want to display under your selected Category','brawny'),
) );*/

// magazine page content section 

/*Brawny_Kirki::add_section( 'sidebar-widgets-magazine-page', array(   
	'title'          => __( 'Magazine Content Section','brawny' ),
	'description'    => __( 'You can use the following widgets here ( Brawny: Featured Category Slider, Brawny: Highlighted Post, Brawny: Magazine Posts Boxed )', 'brawny'),
	'panel'          => 'home_options', // Not typically needed.
) ); */
// service section 

Brawny_Kirki::add_section( 'service_section-1', array(
	'title'          => __( 'Service Section-1','brawny' ),
	'description'    => __( 'Home Page - Service Related Options', 'brawny'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Brawny_Kirki::add_field( 'brawny', array(  
	'settings' => 'enable_service',
	'label'    => __( 'Enable Service( Section )', 'brawny' ),
	'section'  => 'service_section-1',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ),
	),
	'default'  => 'on',
	'tooltip' => __('Enable Service Post in home page','brawny'),
) );
Brawny_Kirki::add_field('brawny',array(
	'settings' =>'service-icon-1',
	'label'    =>__('Service Icon: Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'brawny'),
	'section'  =>'service_section-1',
	'type'     =>'text',
	'default'  =>'fa fa-magic',
));
Brawny_Kirki::add_field('brawny',array(
	'settings' =>'service-title-1',
	'label'    =>__('Service Title: Enter title of this service', 'brawny'),
	'section'  =>'service_section-1',
	'type'     =>'text',
	'default'  =>'Featured Image',
));
Brawny_Kirki::add_field('brawny',array(
	'settings' =>'service-description-1',
	'label'    =>__('Service Description', 'brawny'),
	'section'  =>'service_section-1',
	'type'     =>'textarea',
	'default'  => sprintf(__('<p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -1.</p>', 'brawny' ), admin_url('customize.php') ),
));
Brawny_Kirki::add_section( 'service_section-2', array(
	'title'          => __( 'Service Section-2','brawny' ),
	'description'    => __( 'Home Page - Service Related Options', 'brawny'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Brawny_Kirki::add_field('brawny',array(
	'settings' =>'service-icon-2',
	'label'    =>__('Service Icon: Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'brawny'),
	'section'  =>'service_section-2',
	'type'     =>'text',
	'default'  =>'fa fa-magic',
));
Brawny_Kirki::add_field('brawny',array(
	'settings' =>'service-title-2',
	'label'    =>__('Service Title: Enter title of this service', 'brawny'),
	'section'  =>'service_section-2',
	'type'     =>'text',
	'default'  =>'Featured Image',
));
Brawny_Kirki::add_field('brawny',array(
	'settings' =>'service-description-2',
	'label'    =>__('Service Description', 'brawny'),
	'section'  =>'service_section-2',
	'type'     =>'textarea',
	'default'  => sprintf(__('<p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -2.</p>', 'brawny' ), admin_url('customize.php') ),
));
Brawny_Kirki::add_section( 'service_section-3', array(
	'title'          => __( 'Service Section-3','brawny' ),
	'description'    => __( 'Home Page - Service Related Options', 'brawny'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Brawny_Kirki::add_field('brawny',array(
	'settings' =>'service-icon-3',
	'label'    =>__('Service Icon: Enter Font Awesome Icon name. e.g. fa fa-bullhorn', 'brawny'),
	'section'  =>'service_section-3',
	'type'     =>'text',
	'default'  =>'fa fa-magic',
));
Brawny_Kirki::add_field('brawny',array(
	'settings' =>'service-title-3',
	'label'    =>__('Service Title: Enter title of this service', 'brawny'),
	'section'  =>'service_section-3',
	'type'     =>'text',
	'default'  =>'Featured Image',
));
Brawny_Kirki::add_field('brawny',array(
	'settings' =>'service-description-3',
	'label'    =>__('Service Description', 'brawny'),
	'section'  =>'service_section-3',
	'type'     =>'textarea',
	'default'  => sprintf(__('<p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -3.</p>', 'brawny' ), admin_url('customize.php') ),
));
/*Brawny_Kirki::add_field( 'brawny', array( 
	'settings' => 'enable_service',
	'label'    => __( 'Enable Service Section', 'brawny' ),
	'section'  => 'service_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'active_callback'    => array(
		array(
			'setting'  => 'home-page-type',
			'operator' => '==',
			'value'    => 'default',
		),
	),
	'default'  => 'on',
	'tooltip' => __('Enable service section in home page','brawny'),
) ); 
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'service_count',
	'label'    => __( 'No. of Service Section', 'brawny' ),
	'description' => __('Save the Settings, and Reload this page to Configure the service section','brawny'),
	'section'  => 'service_section',
	'type'     => 'number',
	'choices' => array(
		'min' => 3,
		'max' => 99,
		'step' => 3,
	),
	'default'  => 6,
	'active_callback' => array(
		array(
			'setting'  => 'enable_service',
			'operator' => '==',
			'value'    => true,
		),
		array(
			'setting'  => 'home-page-type',
			'operator' => '==',
			'value'    => 'default',
		),
    ),
    'tooltip' => __('Enter number of service page you want to display','brawny'),
) );

if ( get_theme_mod('service_count') > 0 ) {
 $service = get_theme_mod('service_count');
 		for ( $i = 1 ; $i <= $service ; $i++ ) {
             //Create the settings Once, and Loop through it.
 			Brawny_Kirki::add_field( 'brawny', array(
				'settings' => 'service_'.$i,
				'label'    => sprintf(__( 'Service Section #%1$s', 'brawny' ), $i ),
				'section'  => 'service_section',
				'type'     => 'dropdown-pages',	
				//'tooltip' => __('Create Page ( Goto Dashboard => Page =>Add New ) and Page Featured Image ( Preferred size is 100 x 100 pixels )','brawny'),
				'active_callback' => array(
					array(
						'setting'  => 'enable_service',
						'operator' => '==',
						'value'    => true,
					),
					array(
						'setting'  => 'home-page-type',
						'operator' => '==',
						'value'    => 'default',
					),
                ), 
               // 'description' => __('Create Page ( Goto Dashboard => Page =>Add New ) and Page Featured Image ( Preferred size is 100 x 100 pixels )','brawny'),
        
			) );
 		}
}*/

// latest blog section 

Brawny_Kirki::add_section( 'latest_blog_section', array(
	'title'          => __( 'Latest Blog Section','brawny' ),
	'description'    => __( 'Home Page - Latest Blog Options', 'brawny'),
	'panel'          => 'home_options', // Not typically needed. 
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'enable_recent_post_service',
	'label'    => __( 'Enable Recent Post Section', 'brawny' ),
	'section'  => 'latest_blog_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	 
	'default'  => 'on',
	'tooltip' => __('Enable recent post section in home page','brawny'),
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'recent_posts_count',
	'label'    => __( 'No. of Recent Posts', 'brawny' ),
	'section'  => 'latest_blog_section',
	'type'     => 'number',
	'choices' => array(
		'min' => 3,
		'max' => 99,
		'step' => 1,
	),
	'default'  => 5,
	'active_callback' => array(
		array(
			'setting'  => 'enable_recent_post_service',
			'operator' => '==',
			'value'    => true,
		),
		
    ),
) );

// general panel   

Brawny_Kirki::add_panel( 'general_panel', array(   
	'title'       => __( 'General Settings', 'brawny' ),  
	'description' => __( 'general settings', 'brawny' ),         
) );

//  Page title bar section // 

Brawny_Kirki::add_section( 'header-pagetitle-bar', array(   
	'title'          => __( 'Page Title Bar','brawny' ),
	'description'    => __( 'Page Title bar related options', 'brawny'),
	'panel'          => 'general_panel', // Not typically needed.
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'page_titlebar',  
	'label'    => __( 'Page Title Bar', 'brawny' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( 'Show Bar and Content', 'brawny' ),
		2 => __( 'Show Content Only ', 'brawny' ),
		3 => __('Hide','brawny'),
    ),
    'default' => 1,
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'page_titlebar_text',  
	'label'    => __( 'Page Title Bar Text', 'brawny' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( 'Show', 'brawny' ),
		2 => __( 'Hide', 'brawny' ), 
    ),
    'default' => 1,
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'breadcrumb',  
	'label'    => __( 'Breadcrumb', 'brawny' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ),
	),
	'default'  => 'on',
) ); 

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'breadcrumb-char',
	'label'    => __( 'Breadcrumb Character', 'brawny' ),
	'section'  => 'header-pagetitle-bar',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( ' >> ', 'brawny' ),
		2 => __( ' / ', 'brawny' ),
		3 => __( ' > ', 'brawny' ),
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'breadcrumb',
			'operator' => '==',
			'value'    => true,
		),
	),
	//'sanitize_callback' => 'allow_htmlentities'
) );

//  pagination section // 

Brawny_Kirki::add_section( 'general-pagination', array(   
	'title'          => __( 'Pagination','brawny' ),
	'description'    => __( 'Pagination related options', 'brawny'),
	'panel'          => 'general_panel', // Not typically needed.
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'numeric_pagination',
	'label'    => __( 'Numeric Pagination', 'brawny' ),   
	'section'  => 'general-pagination',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Numbered', 'brawny' ),
		'off' => esc_attr__( 'Next/Previous', 'brawny' )
	),
	'default'  => 'on',
) );

// skin color panel 

Brawny_Kirki::add_panel( 'skin_color_panel', array(   
	'title'       => __( 'Skin Color', 'brawny' ),  
	'description' => __( 'Color Settings', 'brawny' ),         
) );
// color scheme section 

Brawny_Kirki::add_section( 'brawny_customizer_options', array(
	'title'          => __( 'Color Scheme','brawny' ),
	'description'    => __( 'Select your color scheme', 'brawny'),
	'panel'          => 'skin_color_panel', // Not typically needed.
	'priority' => 9,
) );  

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'color',
	'label'    => __( 'Select your color scheme', 'brawny' ),
	'section'  => 'brawny_customizer_options',
	'type'     => 'palette',
	'choices'     => array(
    '1' => array(
		'#41285b',
	),
	'2' => array(
		'#7360cb',
	),
	'3' => array(
		'#7360cb',
	),
),
'default' => '1',
//'default'  => 'on',
) );


// Change Color Options

Brawny_Kirki::add_section( 'primary_color_field', array(
	'title'          => __( 'Change Color Options','brawny' ),
	'description'    => __( 'This will reflect in links, buttons,Navigation and many others. Choose a color to match your site.', 'brawny'),
	'panel'          => 'skin_color_panel', // Not typically needed.
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'enable_primary_color',
	'label'    => __( 'Enable Custom Primary color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'off',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'primary_color',
	'label'    => __( 'Primary color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#41285b',
	'alpha'  => true,
	'active_callback' => array(
		array (
			'setting'  => 'enable_primary_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element'  => 'input[type="text"]:focus,
input[type="email"]:focus,.circle-icon-box .service:hover,
input[type="url"]:focus,.toggle .toggle-title .icn,.widget_image-box-widget .image-box img,
input[type="password"]:focus,.dropcap-box,
input[type="search"]:focus,.flex-control-paging li a.flex-active,
.flex-control-paging li a:hover,.circle-icon-box:hover,
textarea:focus,.site-content .wpcf7-form input[type="submit"],.cnt-form .wpcf7-form input[type="text"],
.cnt-form .wpcf7-form input[type="email"],
.cnt-form .wpcf7-form textarea,.services .one-third:hover,.flex-recent-posts li .recent-post:hover h4',
			'property' => 'border-color',
		),
		array(
			'element'  => '.flex-container .flex-caption a,.btn,.widget_social-networks-widget ul li a:hover, .share-box ul li a:hover, #header-bottom .top-right ul li a:hover,
.widget_button-widget .btn,.callout-widget .callout-btn a,table td#today,.widget_recent-work-widget .flex-direction-nav a.flex-prev,.notfound-inner .search-form input[type="search"],
.widget_recent-work-widget .flex-direction-nav a.flex-next,.widget.widget_ourteam-widget .team-content .close:hover,.ui-accordion h3 span.fa,.site-footer .widget_calendar td.widget_ourteam-widget .team-content .close:hover,.widget_social-networks-widget ul li a:hover,.widget.widget_ourteam-widget ul.team-social li a,.site-footer .widget_calendar td.widget_ourteam-widget ul.team-social li a,
.share-box ul li a:hover,li.filter-options li a:hover,.portfolioeffects:hover .portfolio_overlay a:hover,.flex-control-paging li a.flex-active,
.flex-control-paging li a:hover,.page-slider .ei-slider-thumbs li a,.widget .ei-slider-thumbs li a,.site-footer .widget_calendar td .ei-slider-thumbs li a,
ul.ei-slider-thumbs li a,.notice,.hr_fancy2:before,.dropcap-circle,.service-page .textwidget .fa,
.dropcap-box,.sep:before,.pullleft,.withtip:before,.callout-widget:before,.cnt-address .fa,.og-grid .fa,
.pullright,.toggle .toggle-title,.toggle .toggle-title:hover,.slicknav_menu,
ul.filter-options li a.selected,.widget_recent-posts-gallery-widget .recent-post,.ui-accordion .ui-accordion .ui-accordion-header:hover,.ui-accordion h3:active,.ui-accordion .ui-accordion-header-active,.page-links a,.widget.widget_skill-widget .skill-container .skill .skill-percentage,.site-footer .widget_calendar td.widget_skill-widget .skill-container .skill .skill-percentage,ol.webulous_page_navi li a:hover,.main-navigation ul.sub-menu li.current_page_item > a,
.main-navigation ul.sub-menu li.current_page_ancestor > a,.post-navigation .nav-links a:hover,.post-navigation .nav-links a:focus,
.paging-navigation .nav-links a:hover,.site-footer .widget_testimonial-widget .flex-direction-nav a.flex-prev,
.site-footer .widget_testimonial-widget .flex-direction-nav a.flex-next,.ui-accordion h3,.widget_webulous-image-widget i,.comment-navigation .nav-next a:hover,
.comment-navigation .nav-previous a:hover,.site-footer a.more-button,.widget_image-box-widget a.more-button,.widget-area .widget_calendar caption,.tagcloud a:hover,.widget_search input.search-submit:hover,.site-header,
.paging-navigation .nav-links a:focus,.woocommerce #content div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,.woocommerce #content nav.woocommerce-pagination ul li a:focus,
.woocommerce #content nav.woocommerce-pagination ul li a:hover,
.woocommerce #content nav.woocommerce-pagination ul li span.current,
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce-page #content nav.woocommerce-pagination ul li a:focus,
.woocommerce-page #content nav.woocommerce-pagination ul li a:hover,
.woocommerce-page #content nav.woocommerce-pagination ul li span.current,
.woocommerce-page nav.woocommerce-pagination ul li a:focus,
.woocommerce-page nav.woocommerce-pagination ul li a:hover,
.woocommerce-page nav.woocommerce-pagination ul li span.current,
#commentform .form-submit input,.site-content .wpcf7-form input[type="submit"]',
			'property' => 'background-color',
		),
		/*array(
			'element'  => '.main-navigation a:hover::after,
							 .main-navigation .current_page_item > a::after,
							 .main-navigation .current-menu-item > a::after,
							 .main-navigation .current_page_ancestor > a::after,
							 .main-navigation .current_page_parent > a::after,.widget_magazine-post-boxed-widget .entry-content .cat-links a::after,.widget_magazine-post-boxed-widget .mag-divider::after ',
			'property' => 'border-left-color',
		),*/
		array(
			'element'  => 'a,.main-navigation .current_page_item a,.icon-horizontal a.link-title i,    
.icon-horizontal .icon-title i,
.icon-horizontal .fa-stack i,
.icon-vertical a.link-title i,.notfound-inner,.notfound-inner p a,
.icon-vertical .icon-title i,
.icon-vertical .fa-stack i,.icon-horizontal a.link-title:hover,
.icon-horizontal .icon-title:hover,
.icon-horizontal .fa-stack:hover,.cnt-address .fa:hover,.cnt-address h4,.cnt-address .textwidget:hover .fa,
.icon-vertical a.link-title:hover,h3.widget-title,.order-total .amount,
.cart-subtotal .amount,
.icon-vertical .icon-title:hover,.site-footer .footer-bottom ul.menu li a:hover,.site-footer .footer-bottom ul.menu li.current_page_item a,.site-footer .widget_social-networks-widget ul li a,
.icon-vertical .fa-stack:hover,h1.entry-title a:hover,.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,
.tabs-container ul.ui-tabs-nav li a:hover,.toggle .toggle-title .icn,
.ei-title h3,.ui-accordion .ui-accordion-header-active span.fa,.widget_recent-work-widget .recent_work_overlay .fa:hover,
.main-navigation .current-menu-item a,.content-details h3 a:hover,.widget_recent-posts-gallery-widget .flex-recent-posts h4,
.main-navigation ul.menu.nav-menu > li.current-menu-ancestor > a,
.our-achive i ,.circle-icon-box:hover h4,.circle-icon-box:hover p.fa-stack i,.main-navigation ul.nav-menu li a:hover,
.order-total .amount,
.cart-subtotal .amount,.woocommerce #content table.cart a.remove,
.woocommerce table.cart a.remove,
.woocommerce-page #content table.cart a.remove,.flex-recent-posts li .recent-post:hover h4,
.woocommerce-page table.cart a.remove,.services .one-third:hover h3,.services .one-third:hover .service-title p i',
			'property' => 'color',
		),
		/*array(
			'element'  => 'th a,
							.left-sidebar #recentcomments a,
							#recentcomments a,
							.left-sidebar .widget_rss a,
							.widget_tag_cloud a:hover,.widget_magazine-featured-slider-widget .magazine-featured-slider-wrapper .flexslider .slides .flex-caption a:hover',
			'property' => 'color',
			'suffix' => '!important',
		),*/
		array(
			'element'  => '.woocommerce #content input.button:hover,
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce-page #content input.button:hover,
.woocommerce-page #respond input#submit:hover,
.woocommerce-page a.button:hover,
.woocommerce-page button.button:hover,
.woocommerce-page input.button:hover',
			'property' => 'background-color',
			'suffix' => '!important',
		),
		array(
			'element' => '.withtip.top:after,.widget.widget_ourteam-widget .team-content h4 span::after,.site-footer .widget_calendar td.widget_ourteam-widget .team-content h4 span::after',
			'property' => 'border-top-color',
		),
		array(
			'element' => '.widget-area h3.widget-title:after,.widget_recent-work-widget .flex-direction-nav a.flex-prev,
  .widget_recent-work-widget .flex-direction-nav a.flex-next,.withtip.bottom:after',
			'property' => 'border-bottom-color',
		),
		array(
			'element' => 'ul.filter-options li ,.withtip.right:after ',
			'property' => 'border-right-color',
		),
		array(
			'element' => '.withtip.left:after',
			'property' => 'border-left-color',
		),
	),
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'enable_header_bg_color',
	'label'    => __( 'Enable Header Background Color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'off',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_bg_color',
	'label'    => __( 'Header Background Color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#272727',
	'alpha'  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_header_bg_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '#header-bottom',
			'property' => 'background-color',
		),
	),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'enable_nav_bg_color',
	'label'    => __( 'Enable Navigation Bar BG Color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'off',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'nav_bg_color',
	'label'    => __( 'Navigation Bar BG Color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#282828',
	'alpha'  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_bg_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '
					#nav-wrap,.main-navigation ul ul,.main-navigation ul.sub-menu li.current_page_item a, .main-navigation ul.sub-menu .current-menu-item a, .main-navigation ul.sub-menu li.current_page_ancestor > a',
			'property' => 'background-color',
		),
	),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'enable_nav_hover_color',
	'label'    => __( 'Enable Navigation Hover color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'off',
) );    
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'nav_hover_color',
	'label'    => __( 'Navigation Hover Color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#ffffff',
	'alpha'  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_hover_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '.main-navigation ul li .sub-menu li a:hover,.main-navigation .current_page_item a,.main-navigation .current-menu-item a,.main-navigation ul.menu.nav-menu > li.current-menu-ancestor > a,.main-navigation ul.menu > li > a:hover,.main-navigation .current_page_item li a:hover, .main-navigation .current-menu-item li a:hover, .main-navigation ul.menu.nav-menu > li.current-menu-ancestor li a:hover, .main-navigation ul.menu > li li a:hover',
			'property' => 'background-color',
		),
		array(
			'element' => '.main-navigation .current_page_item a, .main-navigation .current-menu-item a, .main-navigation ul.menu.nav-menu > li.current-menu-ancestor > a,.main-navigation ul.menu > li > a:hover ',
			'property' => 'color',
		),
	),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'enable_nav_hover_font_color',
	'label'    => __( 'Enable Navigation Hover Font color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'off',
) );    
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'nav_hover_font_color',
	'label'    => __( 'Navigation Hover Font Color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '',
	'alpha'  => true,  
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_hover_font_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '#nav-wrap .main-navigation ul li .sub-menu li a:hover,.main-navigation .current_page_item a, .main-navigation .current-menu-item a, .main-navigation ul.menu.nav-menu > li.current-menu-ancestor > a,.main-navigation ul.menu > li > a:hover',
			'property' => 'color',
		),
		
	),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'enable_secondary_color',
	'label'    => __( 'Enable Custom Secondary color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'off',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'secondary_color',
	'label'    => __( 'Secondary Color', 'brawny' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#282828',
	'alpha'  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_secondary_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '.icon-horizontal a.link-title,
.icon-horizontal .icon-title,.woocommerce ul.products li.product .price,
.icon-horizontal .fa-stack,.site-footer .widget.widget_ourteam-widget .team-content h4,.site-footer .widget_calendar td.widget_ourteam-widget .team-content h4,
.icon-vertical a.link-title,.site-footer a.more-button:hover,.site-footer .image-widget-overlay i,
.icon-vertical .icon-title,.site-footer .circle-icon-box p.more-button a,.site-footer .circle-icon-box p.more-button a:hover,
.icon-vertical .fa-stack,.widget_testimonial-widget .testimony p:nth-child(1)::before,.widget_testimonial-widget ul li p.client strong,blockquote:before,blockquote cite a,.columns.breadcrumb #breadcrumb a:hover,h1.entry-title a,.widget_social-networks-widget ul li a,
.share-box ul li a,ul.filter-options li a,#portfolio h4 a:hover,.widget_recent-work-widget .recent_work_overlay .fa,.widget_recent-work-widget .work:hover .recent_work_overlay .fa:hover,.widget.widget_ourteam-widget ul.team-social li a,.ui-accordion h3:hover,.site-footer .widget_calendar td.widget_ourteam-widget ul.team-social li a',
			'property' => 'color',
		),
		/*array(
			'element' => 'th a:hover,
							#recentcomments a:hover,
							.left-sidebar .widget_rss a:hover',
			'property' => 'color',
			'suffix' => '!important',
		),*/
		array(
			'element' => '.site-content .wpcf7-form input[type="submit"]:hover,.navigation-wrap,.main-navigation ul ul,.comment-navigation .nav-next a,
.comment-navigation .nav-previous a,.woocommerce #content input.button,
.slicknav_menu .slicknav_btn,
.slicknav_menu .slicknav_btn:hover,
.woocommerce-page a.button,
.woocommerce-page button.button,
.woocommerce-page input.button ,.slicknav_menu li.current-menu-item a,
.slicknav_menu li a:hover,
.slicknav_menu .slicknav_row:hover,
.og-grid h4:hover,.single-portfolio .single-wrapper .one-third,.widget_image-box-widget a.more-button:hover,.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,.flex-container .flex-direction-nav a:hover,.page-links a:hover,.widget.widget_ourteam-widget ul.team-social li a:hover,.site-footer .widget_calendar td.widget_ourteam-widget ul.team-social li a:hover,
.site-footer .scroll-to-top,.site-footer .scroll-to-top:hover',
			'property' => 'background-color',
		),
       /*array(
			'element' => '.flexslider .slides .flex-caption p a::after',
			'property' => 'border-left-color',
			'suffix' => '!important',
		),*/
        array(
			'element' => '.sticky,.gallery-item img,.ui-accordion .ui-accordion-header-active span.fa,.dropcap-book,.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,.flex-container .flex-direction-nav a:hover',
			'property' => 'border-color',
		),
	),
) );
// typography panel //

Brawny_Kirki::add_panel( 'typography', array( 
	'title'       => __( 'Typography', 'brawny' ),
	'description' => __( 'Typography and Link Color Settings', 'brawny' ),
) );
   
    Brawny_Kirki::add_section( 'typography_section', array(
		'title'          => __( 'General Settings','brawny' ),
		'description'    => __( 'General Settings', 'brawny'),
		'panel'          => 'typography', // Not typically needed.
	) );
	Brawny_Kirki::add_field( 'brawny', array(
		'settings' => 'custom_typography',
		'label'    => __( 'Enable Custom Typography', 'brawny' ),
		'description' => __('Save the Settings, and Reload this page to Configure the typography section','brawny'),
		'section'  => 'typography_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'brawny' ),
			'off' => esc_attr__( 'Disable', 'brawny' )
		),
		'tooltip' => __('Turn on to customize typography and turn off for default typography','brawny'),
		'default'  => 'off',
	) );

$typography_setting = get_theme_mod('custom_typography',false );
if( $typography_setting ) :

        $body_font = get_theme_mod('body_family','Georgia');		        
	    $body_color = get_theme_mod( 'body_color','#404040' );

		$body_size = get_theme_mod( 'body_size','16');
		$body_weight = get_theme_mod( 'body_weight','normal');
		$body_weight == 'bold' ? $body_weight = '400':  $body_weight = 'normal';
		

	Brawny_Kirki::add_section( 'body_font', array(
		'title'          => __( 'Body Font','brawny' ),
		'description'    => __( 'Specify the body font properties', 'brawny'),
		'panel'          => 'typography', // Not typically needed.
	) ); 


	Brawny_Kirki::add_field( 'brawny', array(
		'settings' => 'body',
		'label'    => __( 'Body Settings', 'brawny' ),
		'section'  => 'body_font', 
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $body_font,
			'variant'        => $body_weight,
			'font-size'      => $body_size.'px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => $body_color,
		),
		'output'      => array(
			array(
				'element' => 'body',
				//'suffix' => '!important',
			),
		),
	) );


	Brawny_Kirki::add_section( 'heading_section', array(
		'title'          => __( 'Heading Font','brawny' ),
		'description'    => __( 'Specify typography of h1,h2,h3,h4,h5,h6', 'brawny'),
		'panel'          => 'typography', // Not typically needed.
	) );
	

	$h1_font = get_theme_mod('h1_family','Oswald');
	$h1_color = get_theme_mod( 'h1_color','#282827' );
	$h1_size = get_theme_mod( 'h1_size','48');
	$h1_weight = get_theme_mod( 'h1_weight','bold');
	$h1_weight == 'bold' ? $h1_weight = '400' : $h1_weight = 'regular';

	Brawny_Kirki::add_field( 'brawny', array(
		'settings' => 'h1',
		'label'    => __( 'H1 Settings', 'brawny' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h1_font,
			'variant'        => $h1_weight,
			'font-size'      => $h1_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h1_color,
		),
		'output'      => array(
			array(
				'element' => 'h1',
			),
		),
	
	) );

	$h2_font = get_theme_mod('h2_family','Oswald');
	$h2_color = get_theme_mod( 'h2_color','#282827' );
	$h2_size = get_theme_mod( 'h2_size','36');
	$h2_weight = get_theme_mod( 'h2_weight','bold');
	$h2_weight == 'bold' ? $h2_weight = '400' : $h2_weight = 'regular';

	Brawny_Kirki::add_field( 'brawny', array(
		'settings' => 'h2',
		'label'    => __( 'H2 Settings', 'brawny' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h2_font,
			'variant'        => $h2_weight,
			'font-size'      => $h2_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h2_color,
		),
		'output'      => array(
			array(
				'element' => 'h2',
			),
		),
		
	) );

	$h3_font = get_theme_mod('h3_family','Oswald');
	$h3_color = get_theme_mod( 'h3_color','#282827' );
	$h3_size = get_theme_mod( 'h3_size','30');
	$h3_weight = get_theme_mod( 'h3_weight','bold');
	$h3_weight == 'bold' ? $h3_weight = '400' : $h3_weight = 'regular';

	Brawny_Kirki::add_field( 'brawny', array(
		'settings' => 'h3',
		'label'    => __( 'H3 Settings', 'brawny' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default' => array(
			'font-family'    => $h3_font,
			'variant'        => $h3_weight,
			'font-size'      => $h3_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h3_color,
		),
		'output'      => array(
			array(
				'element' => 'h3',
			),
		),
		
	) );

	$h4_font = get_theme_mod('h4_family','Oswald');
	$h4_color = get_theme_mod( 'h4_color','#282827' );
	$h4_size = get_theme_mod( 'h4_size','24');
	$h4_weight = get_theme_mod( 'h4_weight','bold');
	$h4_weight == 'bold' ? $h4_weight = '400' : $h4_weight = 'regular';


	Brawny_Kirki::add_field( 'brawny', array(
		'settings' => 'h4',
		'label'    => __( 'H4 Settings', 'brawny' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h4_font,
			'variant'        => $h4_weight,
			'font-size'      => $h4_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h4_color,
		),
		'output'      => array(
			array(
				'element' => 'h4',
			),
		),
		
	) );

    $h5_font = get_theme_mod('h5_family','Oswald');
	$h5_color = get_theme_mod( 'h5_color','#282827' );
	$h5_size = get_theme_mod( 'h5_size','18');
	$h5_weight = get_theme_mod( 'h5_weight','bold');
	$h5_weight == 'bold' ? $h5_weight = '400' : $h5_weight = 'regular';


	Brawny_Kirki::add_field( 'brawny', array(
		'settings' => 'h5',
		'label'    => __( 'H5 Settings', 'brawny' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h5_font,
			'variant'        => $h5_weight,
			'font-size'      => $h5_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h5_color,
		),
		'output'      => array(
			array(
				'element' => 'h5',
			),
		),
		
	) );

	$h6_font = get_theme_mod('h6_family','Oswald');
	$h6_color = get_theme_mod( 'h6_color','#282827' );
	$h6_size = get_theme_mod( 'h6_size','16');
	$h6_weight = get_theme_mod( 'h6_weight','bold');
	$h6_weight == 'bold' ? $h6_weight = '400' : $h6_weight = 'regular';


	Brawny_Kirki::add_field( 'brawny', array(
		'settings' => 'h6',
		'label'    => __( 'H6 Settings', 'brawny' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h6_font,
			'variant'        => $h6_weight,
			'font-size'      => $h6_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h6_color,
		),
		'output'      => array(
			array(
				'element' => 'h6',
			),
		),
		
	) );

	// navigation font 
	Brawny_Kirki::add_section( 'navigation_section', array(
		'title'          => __( 'Navigation Font','brawny' ),
		'description'    => __( 'Specify Navigation font properties', 'brawny'),
		'panel'          => 'typography', // Not typically needed.
	) );

	Brawny_Kirki::add_field( 'brawny', array(
		'settings' => 'navigation_font',
		'label'    => __( 'Navigation Font Settings', 'brawny' ),
		'section'  => 'navigation_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => 'Oswald',
			'variant'        => '400',
			'font-size'      => '16px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => '',
		),
		'output'      => array(
			array(
				'element' => '.main-navigation a',
			),
		),
	) );
endif; 


// header panel //

Brawny_Kirki::add_panel( 'header_panel', array(     
	'title'       => __( 'Header', 'brawny' ),
	'description' => __( 'Header Related Options', 'brawny' ), 
) );  
Brawny_Kirki::add_section( 'top_header_options',array(
	'title'        =>__('Top Header Options','brawny' ),
	'panel'        =>'header_panel',
));
Brawny_Kirki::add_field( 'brawny',array(
	'settings'     =>'header-top-left',
	'label'        =>__('Header Top Left','brawny' ),
	'section'      =>'top_header_options',
	'type'         =>'textarea',
	'default'      =>__( '<p><a href="#">Form</a> | <a href="#">Terms</a> | <a href="#">Contact</a> | </p>', 'brawny'),
	));
Brawny_Kirki::add_field( 'brawny',array(
	'settings'     =>'header-top-right',
	'label'        =>__('Header Top Right','brawny' ),
	'section'      =>'top_header_options',
	'type'         =>'textarea',
	'default'      =>__( '<p><span><i class="fa fa-mobile-phone"></i>123-456-789</span> <span><i class="fa fa-envelope-o"></i><a href="mailto:info@brawny.com">info@brawny.com</a></span></p>', 'brawny'),
	));
Brawny_Kirki::add_section( 'header', array(
	'title'          => __( 'General Header','brawny' ),
	'description'    => __( 'Header options', 'brawny'),
	'panel'          => 'header_panel', // Not typically needed.  
) );    

/*Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_text_color',
	'label'    => __( 'Header Text Color', 'brawny' ),
	'section'  => 'header',
	'type'     => 'color',
	'alpha' => true,
	'default'  => '', 
	'output'   => array(
		array(
			'element'  => '.site-header #header-bottom .site-branding h1 a,#nav-wrap .main-navigation a',
			'property' => 'color',
		),
	),
) );*/
/*Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_search',
	'label'    => __( 'Enable to Show Search box in Header', 'brawny' ), 
	'section'  => 'header',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'on',
) );*/
/* Breaking News section  */
/*Brawny_Kirki::add_section( 'header_breaking_news', array(
	'title'          => __( 'Breaking News','brawny' ),
	'description'    => __( 'Breaking News', 'brawny'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_breaking_news',
	'label'    => __( 'Enable Breaking News', 'brawny' ), 
	'section'  => 'header_breaking_news',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'active_callback' => array(
		array(
			'setting'  => 'home-page-type',
			'operator' => '==',
			'value'    => 'magazine',
		),
    ),
	'default'  => 'off',
) );*/
/* STICKY HEADER section */   

Brawny_Kirki::add_section( 'stricky_header', array(
	'title'          => __( 'Sticky Menu','brawny' ),
	'description'    => __( 'sticky header', 'brawny'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Brawny_Kirki::add_field( 'brawny', array(    
	'settings' => 'sticky_header',
	'label'    => __( 'Enable Sticky Header', 'brawny' ),
	'section'  => 'stricky_header',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'off',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'sticky_header_position',
	'label'    => __( 'Enable Sticky Header Position', 'brawny' ),
	'section'  => 'stricky_header',
	'type'     => 'radio-buttonset',
	'choices' => array(
		'top'  => esc_attr__( 'Top', 'brawny' ),
		'bottom' => esc_attr__( 'Bottom', 'brawny' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'sticky_header',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'top',
) );
/*
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_top_margin',
	'label'    => __( 'Header Top Margin', 'brawny' ),
	'description' => __('Select the top margin of header in pixels','brawny'),
	'section'  => 'header',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1,
	),
	//'default'  => '213',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_bottom_margin',
	'label'    => __( 'Header Bottom Margin', 'brawny' ),
	'description' => __('Select the bottom margin of header in pixels','brawny'),
	'section'  => 'header',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1,
	),
	//'default'  => '213',
) );*/

Brawny_Kirki::add_section( 'header_image', array(
	'title'          => __( 'Header Background Image','brawny' ),
	'description'    => __( 'Custom Header Image options', 'brawny'),
	'panel'          => 'header_panel', // Not typically needed.  
) );

Brawny_Kirki::add_field( 'brawny', array(   
	'settings' => 'header_bg_size',
	'label'    => __( 'Header Background Size', 'brawny' ),
	'section'  => 'header_image',
	'type'     => 'radio-buttonset', 
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'brawny' ),
		'contain' => esc_attr__( 'Contain', 'brawny' ),
		'auto'  => esc_attr__( 'Auto', 'brawny' ),
		'inherit'  => esc_attr__( 'Inherit', 'brawny' ),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-size',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'cover',
	'tooltip' => __('Header Background Image Size','brawny'),
) );

/*Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_height',
	'label'    => __( 'Header Background Image Height', 'brawny' ),
	'section'  => 'header_image',
	'type'     => 'number',
	'choices' => array(
		'min' => 100,
		'max' => 600,
		'step' => 1,
	),
	'default'  => '213',
) ); */
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_bg_repeat',
	'label'    => __( 'Header Background Repeat', 'brawny' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'brawny'),
        'repeat' => esc_attr__('Repeat', 'brawny'),
        'repeat-x' => esc_attr__('Repeat Horizontally','brawny'),
        'repeat-y' => esc_attr__('Repeat Vertically','brawny'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-repeat',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'repeat',  
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_bg_position', 
	'label'    => __( 'Header Background Position', 'brawny' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'brawny'),
        'center center' => esc_attr__('Center Center', 'brawny'),
        'center bottom' => esc_attr__('Center Bottom', 'brawny'),
        'left top' => esc_attr__('Left Top', 'brawny'),
        'left center' => esc_attr__('Left Center', 'brawny'),
        'left bottom' => esc_attr__('Left Bottom', 'brawny'),
        'right top' => esc_attr__('Right Top', 'brawny'),
        'right center' => esc_attr__('Right Center', 'brawny'),
        'right bottom' => esc_attr__('Right Bottom', 'brawny'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-position',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'center center',  
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_bg_attachment',
	'label'    => __( 'Header Background Attachment', 'brawny' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'brawny'),
        'fixed' => esc_attr__('Fixed', 'brawny'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-attachment',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'scroll',  
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_overlay',
	'label'    => __( 'Enable Header( Background ) Overlay', 'brawny' ),
	'section'  => 'header_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'off',
) );
  
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'header_overlay_color',
	'label'    => __( 'Header Overlay ( Background )color', 'brawny' ),
	'section'  => 'header_image',
	'type'     => 'color',
	'alpha' => true,
	'default'  => '#E5493A', 
	'output'   => array(
		array(
			'element'  => '.overlay-header',
			'property' => 'background-color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_overlay',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/*
/* e-option start */
/*
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'custon_favicon',
	'label'    => __( 'Custom Favicon', 'brawny' ),
	'section'  => 'header',
	'type'     => 'upload',
	'default'  => '',
) ); */
/* e-option start */ 
/* Blog page section */


/* Blog panel */

Brawny_Kirki::add_panel( 'blog_panel', array(     
	'title'       => __( 'Blog', 'brawny' ),
	'description' => __( 'Blog Related Options', 'brawny' ),     
) ); 
Brawny_Kirki::add_section( 'blog', array(
	'title'          => __( 'Blog Page','brawny' ),
	'description'    => __( 'Blog Related Options', 'brawny'),
	'panel'          => 'blog_panel', // Not typically needed.
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'blog-slider',
	'label'    => __( 'Enable to show the slider on blog page', 'brawny' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'off',
	'tooltip' => __('To show the slider on posts page','brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'blog_layout',
	'label'    => __( 'Select Blog Page Layout you prefer', 'brawny' ),
	'section'  => 'blog',
	'type'     => 'select',
	'multiple'  => 1,
	'choices' => array(
		1  => esc_attr__( 'Default ( One Column )', 'brawny' ),
		2 => esc_attr__( 'Two Columns ', 'brawny' ),
		3 => esc_attr__( 'Three Columns ( Without Sidebar ) ', 'brawny' ),
		4 => esc_attr__( 'Two Columns With Masonry', 'brawny' ),
		5 => esc_attr__( 'Three Columns With Masonry ( Without Sidebar ) ', 'brawny' ),
	),
	'default'  => 1,
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'featured_image',	
	'label'    => __( 'Enable Featured Image', 'brawny' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable Featured Image for blog page','brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'more_text',
	'label'    => __( 'More Text', 'brawny' ),
	'section'  => 'blog',
	'type'     => 'text',
	'description' => __('Text to display in case of text too long','brawny'),
	'default' => __('Read More','brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'featured_image_size',
	'label'    => __( 'Choose the Featured Image Size for Blog Page', 'brawny' ),
	'section'  => 'blog',
	'type'     => 'select',
	'multiple'  => 1,
	'choices' => array(
		1 => esc_attr__( 'Large Featured Image', 'brawny' ),
		2 => esc_attr__( 'Small Featured Image', 'brawny' ),
		3 => esc_attr__( 'Original Size', 'brawny' ),
		4 => esc_attr__( 'Medium', 'brawny' ),
		5 => esc_attr__( 'Large', 'brawny' ), 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Set large and medium image size: Goto Dashboard => Settings => Media', 'brawny') ,
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'enable_single_post_top_meta',
	'label'    => __( 'Enable to display top post meta data', 'brawny' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'off',
	'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'single_post_top_meta',
	'label'    => __( 'Activate and Arrange the Order of Top Post Meta elements', 'brawny' ),
	'section'  => 'blog',
	'type'     => 'sortable',
	'choices'     => array(
		1 => esc_attr__( 'date', 'brawny' ),
		2 => esc_attr__( 'author', 'brawny' ),
		3 => esc_attr__( 'comment', 'brawny' ),
		4 => esc_attr__( 'category', 'brawny' ),
		5 => esc_attr__( 'tags', 'brawny' ),
		6 => esc_attr__( 'edit', 'brawny' ),
	),
	'default'  => array(1, 2, 6),
	'active_callback' => array(
		array(
			'setting'  => 'enable_single_post_top_meta',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','brawny'),

) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'enable_single_post_bottom_meta',
	'label'    => __( 'Enable to display bottom post meta data', 'brawny' ),
	'section'  => 'blog', 
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','brawny'),
	'default'  => 'on',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'single_post_bottom_meta',
	'label'    => __( 'Activate and arrange the Order of Bottom Post Meta elements', 'brawny' ),
	'section'  => 'blog',
	'type'     => 'sortable',
	'choices'     => array(
		1 => esc_attr__( 'date', 'brawny' ),
		2 => esc_attr__( 'author', 'brawny' ),
		3 => esc_attr__( 'comment', 'brawny' ),
		4 => esc_attr__( 'category', 'brawny' ),
		5 => esc_attr__( 'tags', 'brawny' ),
		6 => esc_attr__( 'edit', 'brawny' ),
	),
	'default'  => array(3,4,5),
	'active_callback' => array(
		array(
			'setting'  => 'enable_single_post_bottom_meta',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','brawny'),
) );


/* Single Blog page section */

Brawny_Kirki::add_section( 'single_blog', array(
	'title'          => __( 'Single Blog Page','brawny' ),
	'description'    => __( 'Single Blog Page Related Options', 'brawny'),
	'panel'          => 'blog_panel', // Not typically needed.
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'single_featured_image',
	'label'    => __( 'Enable Single Post Featured Image', 'brawny' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable Featured Image for Single Post Page','brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'single_featured_image_size',
	'label'    => __( 'Choose the featured image display type for Single Post Page', 'brawny' ),
	'section'  => 'single_blog',
	'type'     => 'radio',
	'choices' => array(
		1  => esc_attr__( 'Large Featured Image', 'brawny' ),
		2 => esc_attr__( 'Small Featured Image', 'brawny' ),
		3 => esc_attr__( 'FullWidth Featured Image', 'brawny' ),
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'single_featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'author_bio_box',
	'label'    => __( 'Enable Author Bio Box below single post', 'brawny' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'off',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'social_sharing_box',
	'label'    => __( 'Enable Social Sharing options Box below single post', 'brawny' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'on',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'related_posts',
	'label'    => __( 'Show Related Posts', 'brawny' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'off',
	'tooltip' => __('Show the Related Post for Single Blog Page','brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'related_posts_hierarchy',
	'label'    => __( 'Related Posts Must Be Shown As:', 'brawny' ),
	'section'  => 'single_blog',
	'type'     => 'radio',
	'choices' => array(
		1  => esc_attr__( 'Related Posts By Tags', 'brawny' ),
		2 => esc_attr__( 'Related Posts By Categories', 'brawny' ) 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'related_posts',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Select the Hierarchy','brawny'),

) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'comments',
	'label'    => __( ' Show Comments', 'brawny' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Show the Comments for Single Blog Page','brawny'),
) );
/* FOOTER SECTION 
footer panel */

Brawny_Kirki::add_panel( 'footer_panel', array(     
	'title'       => __( 'Footer', 'brawny' ),
	'description' => __( 'Footer Related Options', 'brawny' ),     
) );  

Brawny_Kirki::add_section( 'footer', array(
	'title'          => __( 'Footer','brawny' ),
	'description'    => __( 'Footer related options', 'brawny'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'footer-widgets',
	'label'    => __( 'Footer Widget Area', 'brawny' ),
	'description' => sprintf(__('Select widgets, Goto <a href="%1$s"target="_blank"> Customizer </a> => Widgets','brawny'),admin_url('customize.php') ),
	'section'  => 'footer',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'on',
) );
/* Choose No.Of Footer area */
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'footer_widgets_count',
	'label'    => __( 'Choose No.of widget area you want in footer', 'brawny' ),
	'section'  => 'footer',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( '1', 'brawny' ),
		2  => esc_attr__( '2', 'brawny' ),
		3  => esc_attr__( '3', 'brawny' ),
		4  => esc_attr__( '4', 'brawny' ),
	),
	'default'  => 4,
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'copyright',
	'label'    => __( 'Footer Copyright Text', 'brawny' ),
	'section'  => 'footer',
	'type'     => 'textarea',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'footer_top_margin',
	'label'    => __( 'Footer Top Margin', 'brawny' ),
	'description' => __('Select the top margin of footer in pixels','brawny'),
	'section'  => 'footer',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.site-footer',
			'property' => 'margin-top',
			'units' => 'px',
		),
	),
	'default'  => 0,
) );

/* CUSTOM FOOTER BACKGROUND IMAGE 
footer background image section  */

Brawny_Kirki::add_section( 'footer_image', array(
	'title'          => __( 'Footer Image','brawny' ),
	'description'    => __( 'Custom Footer Image options', 'brawny'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'footer_bg_image',
	'label'    => __( 'Upload Footer Background Image', 'brawny' ),
	'section'  => 'footer_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-image',
		),
	),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'footer_bg_size',
	'label'    => __( 'Footer Background Size', 'brawny' ),
	'section'  => 'footer_image',
	'type'     => 'radio-buttonset',
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'brawny' ),
		'contain' => esc_attr__( 'Contain', 'brawny' ),
		'auto'  => esc_attr__( 'Auto', 'brawny' ),
		'inherit'  => esc_attr__( 'Inherit', 'brawny' ),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-size',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'cover',
	'tooltip' => __('Footer Background Image Size','brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'footer_bg_repeat',
	'label'    => __( 'Footer Background Repeat', 'brawny' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'brawny'),
        'repeat' => esc_attr__('Repeat', 'brawny'),
        'repeat-x' => esc_attr__('Repeat Horizontally','brawny'),
        'repeat-y' => esc_attr__('Repeat Vertically','brawny'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-repeat',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'footer_bg_position',
	'label'    => __( 'Footer Background Position', 'brawny' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'brawny'),
        'center center' => esc_attr__('Center Center', 'brawny'),
        'center bottom' => esc_attr__('Center Bottom', 'brawny'),
        'left top' => esc_attr__('Left Top', 'brawny'),
        'left center' => esc_attr__('Left Center', 'brawny'),
        'left bottom' => esc_attr__('Left Bottom', 'brawny'),
        'right top' => esc_attr__('Right Top', 'brawny'),
        'right center' => esc_attr__('Right Center', 'brawny'),
        'right bottom' => esc_attr__('Right Bottom', 'brawny'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-position',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'center center',  
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'footer_bg_attachment',
	'label'    => __( 'Footer Background Attachment', 'brawny' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'brawny'),
        'fixed' => esc_attr__('Fixed', 'brawny'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-attachment',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'scroll',  
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'footer_overlay',
	'label'    => __( 'Enable Footer( Background ) Overlay', 'brawny' ),
	'section'  => 'footer_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' )
	),
	'default'  => 'off',
) );
  
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'footer_overlay_color',
	'label'    => __( 'Footer Overlay ( Background )color', 'brawny' ),
	'section'  => 'footer_image',
	'type'     => 'color',
	'alpha' => true,
	'default'  => '', 
	'active_callback' => array(
		array(
			'setting'  => 'footer_overlay',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output'   => array(
		array(
			'element'  => '.overlay-footer',
			'property' => 'background-color',
		),
	),
) );


// single page section //

Brawny_Kirki::add_section( 'single_page', array(
	'title'          => __( 'Single Page','brawny' ),
	'description'    => __( 'Single Page Related Options', 'brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'single_page_featured_image',
	'label'    => __( 'Enable Single Page Featured Image', 'brawny' ),
	'section'  => 'single_page',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'on',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'single_page_featured_image_size',
	'label'    => __( 'Single Page Featured Image Size', 'brawny' ),
	'section'  => 'single_page',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( 'Normal', 'brawny' ),
		2 => esc_attr__( 'FullWidth', 'brawny' ) 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'single_page_featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );

// Layout section //

Brawny_Kirki::add_section( 'layout', array(
	'title'          => __( 'Layout','brawny' ),
	'description'    => __( 'Layout Related Options', 'brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'site-style',
	'label'    => __( 'Site Style', 'brawny' ),
	'section'  => 'layout',
	'type'     => 'radio-buttonset',
	'choices' => array(
		'wide' =>  esc_attr__('Wide', 'brawny'),
        'boxed' =>  esc_attr__('Boxed', 'brawny'),
        'fluid' =>  esc_attr__('Fluid', 'brawny'),  
        //'static' =>  esc_attr__('Static ( Non Responsive )', 'brawny'),
    ),
	'default'  => 'wide',
	'tooltip' => __('Select the default site layout. Defaults to "Wide".','brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'sidebar_position',
	'label'    => __( 'Main Layout', 'brawny' ),
	'section'  => 'layout',
	'type'     => 'radio-image',   
	'description' => __('Select main content and sidebar arranbrawnyent.','brawny'),
	'choices' => array(
		'left' =>  get_template_directory_uri() . '/admin/kirki/assets/images/2cl.png',
        'right' =>  get_template_directory_uri() . '/admin/kirki/assets/images/2cr.png',
        'two-sidebar' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cm.png',  
        'two-sidebar-left' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cl.png',
        'two-sidebar-right' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cr.png',
        'fullwidth' =>  get_template_directory_uri() . '/admin/kirki/assets/images/1c.png',
        'no-sidebar' =>  get_template_directory_uri() . '/images/no-sidebar.png',
    ),
	'default'  => 'right',
	'tooltip' => __('This layout will be reflected in all pages unless unique layout template is set for specific page','brawny'),
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'body_top_margin',
	'label'    => __( 'Body Top Margin', 'brawny' ),
	'description' => __('Select the top margin of body element in pixels','brawny'),
	'section'  => 'layout',
	'type'     => 'number',
	'choices' => array(
		'min' => 0,
		'max' => 200,
		'step' => 1,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'margin-top',
			'units'    => 'px',
		),
	),
	'default'  => 0,
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'body_bottom_margin',
	'label'    => __( 'Body Bottom Margin', 'brawny' ),
	'description' => __('Select the bottom margin of body element in pixels','brawny'),
	'section'  => 'layout',
	'type'     => 'number',
	'choices' => array(
		'min' => 0,
		'max' => 200,
		'step' => 1,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'margin-bottom',
			'units'    => 'px',
		),
	),
	'default'  => 0,
) );

/* LAYOUT SECTION  */
/*
Brawny_Kirki::add_section( 'layout', array(
	'title'          => __( 'Layout','brawny' ),   
	'description'    => __( 'Layout settings that affects overall site', 'brawny'),
	'panel'          => 'brawny_options', // Not typically needed.
) );



Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'primary_sidebar_width',
	'label'    => __( 'Primary Sidebar Width', 'brawny' ),
	'section'  => 'layout',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'1' => __( 'One Column', 'brawny' ),
		'2' => __( 'Two Column', 'brawny' ),
		'3' => __( 'Three Column', 'brawny' ),
		'4' => __( 'Four Column', 'brawny' ),
		'5' => __( 'Five Column ', 'brawny' ),
	),
	'default'  => '5',  
	'tooltip' => __('Select the width of the Primary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','brawny'),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'secondary_sidebar_width',
	'label'    => __( 'Secondary Sidebar Width', 'brawny' ),
	'section'  => 'layout',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'1' => __( 'One Column', 'brawny' ),
		'2' => __( 'Two Column', 'brawny' ),
		'3' => __( 'Three Column', 'brawny' ),
		'4' => __( 'Four Column', 'brawny' ),
		'5' => __( 'Five Column ', 'brawny' ),
	),            
	'default'  => '5',  
	'tooltip' => __('Select the width of the Secondary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','brawny'),
) ); 

*/

/* FOOTER SECTION 
footer panel */


//  social network panel //

Brawny_Kirki::add_panel( 'social_panel', array(
	'title'        =>__( 'Social Networks', 'brawny'),
	'description'  =>__( 'social networks', 'brawny'),
	'priority'  =>11,	
));

//social sharing box section

Brawny_Kirki::add_section( 'social_sharing_box', array(
	'title'          =>__( 'Social Sharing Box', 'brawny'),
	'description'   =>__('Social Sharing box related options', 'brawny'),
	'panel'			 =>'social_panel',
));

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'facebook_sb',
	'label'    => __( 'Enable facebook sharing option below single post', 'brawny' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'on',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'twitter_sb',
	'label'    => __( 'Enable twitter sharing option below single post', 'brawny' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'on',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'linkedin_sb',
	'label'    => __( 'Enable linkedin sharing option below single post', 'brawny' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'on',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'google-plus_sb',
	'label'    => __( 'Enable googleplus sharing option below single post', 'brawny' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'on',
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'email_sb',
	'label'    => __( 'Enable email sharing option below single post', 'brawny' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'on',
) );
//  slider panel //

Brawny_Kirki::add_panel( 'slider_panel', array(   
	'title'       => __( 'Slider Settings', 'brawny' ),  
	'description' => __( 'Flex slider related options', 'brawny' ), 
	'priority'    => 11,    
) );

//  flexslider section  //

Brawny_Kirki::add_section( 'flex_caption_section', array(
	'title'          => __( 'Flexcaption Settings','brawny' ),
	'description'    => __( 'Flexcaption Related Options', 'brawny'),
	'panel'          => 'slider_panel', // Not typically needed.
) );
Brawny_Kirki::add_field( 'brawny', array(   
	'settings' => 'enable_flex_caption_edit',
	'label'    => __( 'Enable Custom Flexcaption Settings', 'brawny' ),
	'section'  => 'flex_caption_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'brawny' ),
		'off' => esc_attr__( 'Disable', 'brawny' ) 
	),
	'default'  => 'off',
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'flexcaption_bg',
	'label'    => __( 'Select Flexcaption Background Color', 'brawny' ),
	'section'  => 'flex_caption_section',
	'type'     => 'color',
	'default'  => 'rgba(64, 41, 92, 0.3)',
	'alpha' => true,   
	'output'   => array(
		array(
			'element'  => '.flexslider .flex-caption',
			'property' => 'background-color',
			'suffix' => '!important',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'flexcaption_align',
	'label'    => __( 'Select Flexcaption Alignment', 'brawny' ),
	'section'  => 'flex_caption_section',
	'type'     => 'select',
	'default'  => 'center',
	'choices' => array(
		'left' => esc_attr__( 'Left', 'brawny' ),
		'right' => esc_attr__( 'Right', 'brawny' ),
		'center' => esc_attr__( 'Center', 'brawny' ),
		'justify' => esc_attr__( 'Justify', 'brawny' ),
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .flex-caption',
			'property' => 'text-align',
			//'suffix' => '!important',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) );
 Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'flexcaption_bg_position',
	'label'    => __( 'Select Flexcaption Background Horizontal Position', 'brawny' ),
	'tooltip' => __('Select how far from left','brawny'),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '0',
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .flex-caption',
			'property' => 'left',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) ); 
 Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'flexcaption_bg_vertical_position',
	'label'    => __( 'Select Flexcaption Background Vertical Position', 'brawny' ),
	'tooltip' => __('Select how far from top','brawny'),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '10',
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),	
	'output'   => array(
		array(
			'element'  => '.flexslider .flex-caption',
			'property' => 'top',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) ); 
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'flexcaption_bg_width',
	'label'    => __( 'Select Flexcaption Background Width', 'brawny' ),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '100',
	'tooltip' => __('Select Flexcaption Background Width','brawny'),
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .flex-caption',
			'property' => 'width',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) ); 
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'flexcaption_responsive_bg_width',
	'label'    => __( 'Select Responsive Flexcaption Background Width', 'brawny' ),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '100',
	'tooltip' => __('Select Responsive Flexcaption Background Width, Default width value 100 ( This value will apply for max-width: 768px )','brawny'),
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .flex-caption',
			'property' => 'width',
			'media_query' => '@media (max-width: 768px)',
			'value_pattern' => 'calc($%)',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
	
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'flexcaption_color',
	'label'    => __( 'Select Flexcaption Font Color', 'brawny' ),
	'section'  => 'flex_caption_section',
	'type'     => 'color',
	'default'  => '#ffffff',
	'alpha' => true,
	'output'   => array(
		array(
			'element'  => '.flex-caption,.home .flexslider .slides .flex-caption p a,.home .flexslider .slides .flex-caption p,.flexslider .slides .flex-caption p,.home .flexslider .slides .flex-caption h1, .home .flexslider .slides .flex-caption h2, .home .flexslider .slides .flex-caption h3, .home .flexslider .slides .flex-caption h4, .home .flexslider .slides .flex-caption h5, .home .flexslider .slides .flex-caption h6,.flexslider .slides .flex-caption h1,.flexslider .slides .flex-caption h2,.flexslider .slides .flex-caption h3,.flexslider .slides .flex-caption h4,.flexslider .slides .flex-caption h5,.flexslider .slides .flex-caption h6',
			'property' => 'color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),

) );

 if( class_exists( 'WooCommerce' ) ) {
	Brawny_Kirki::add_section( 'woocommerce_section', array(
		'title'          => __( 'WooCommerce','brawny' ),
		'description'    => __( 'Theme options related to woocommerce', 'brawny'),
		'priority'       => 11, 

		'theme_supports' => '', // Rarely needed.
	) );
	Brawny_Kirki::add_field( 'woocommerce', array(
		'settings' => 'woocommerce_sidebar',
		'label'    => __( 'Enable Woocommerce Sidebar', 'brawny' ),
		'description' => __('Enable Sidebar for shop page','brawny'),
		'section'  => 'woocommerce_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'brawny' ),
			'off' => esc_attr__( 'Disable', 'brawny' ) 
		),

		'default'  => 'on',
	) );
}
	
// background color ( rename )

Brawny_Kirki::add_section( 'colors', array(
	'title'          => __( 'Background Color','brawny' ),
	'description'    => __( 'This will affect overall site background color', 'brawny'),
	//'panel'          => 'skin_color_panel', // Not typically needed.
	'priority' => 11,
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'general_background_color',
	'label'    => __( 'General Background Color', 'brawny' ),
	'section'  => 'colors',
	'type'     => 'color',
	'alpha' => true,
	'default'  => '',
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-color',
		),
	),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'content_background_color',
	'label'    => __( 'Content Background Color', 'brawny' ),
	'section'  => 'colors',
	'type'     => 'color',
	'description' => __('when you are select boxed layout content background color will reflect the grid area','brawny'), 
	'alpha' => true, 
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'general_background_image',
	'label'    => __( 'General Background Image', 'brawny' ),
	'section'  => 'background_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-image',
		),
	),
) );

// background image ( general & boxed layout ) //


Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'general_background_repeat',
	'label'    => __( 'General Background Repeat', 'brawny' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'brawny'),
        'repeat' => esc_attr__('Repeat', 'brawny'),
        'repeat-x' => esc_attr__('Repeat Horizontally','brawny'),
        'repeat-y' => esc_attr__('Repeat Vertically','brawny'),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-repeat',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'general_background_size',
	'label'    => __( 'General Background Size', 'brawny' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'brawny' ),
		'contain' => esc_attr__( 'Contain', 'brawny' ),
		'auto'  => esc_attr__( 'Auto', 'brawny' ),
		'inherit'  => esc_attr__( 'Inherit', 'brawny' ),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-size',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'cover',  
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'general_background_attachment',
	'label'    => __( 'General Background Attachment', 'brawny' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'brawny'),
        'fixed' => esc_attr__('Fixed', 'brawny'),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-attachment',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'fixed',  
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'general_background_position',
	'label'    => __( 'General Background Position', 'brawny' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'brawny'),
        'center center' => esc_attr__('Center Center', 'brawny'),
        'center bottom' => esc_attr__('Center Bottom', 'brawny'),
        'left top' => esc_attr__('Left Top', 'brawny'),
        'left center' => esc_attr__('Left Center', 'brawny'),
        'left bottom' => esc_attr__('Left Bottom', 'brawny'),
        'right top' => esc_attr__('Right Top', 'brawny'),
        'right center' => esc_attr__('Right Center', 'brawny'),
        'right bottom' => esc_attr__('Right Bottom', 'brawny'),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-position',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'center top',  
) );


/* CONTENT BACKGROUND ( boxed background image )*/

Brawny_Kirki::add_field( 'brawny', array(  
	'settings' => 'content_background_image',
	'label'    => __( 'Content Background Image', 'brawny' ),
	'description' => __('when you are select boxed layout content background image will reflect the grid area','brawny'),
	'section'  => 'background_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-image',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'content_background_repeat',
	'label'    => __( 'Content Background Repeat', 'brawny' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'brawny'),
        'repeat' => esc_attr__('Repeat', 'brawny'),
        'repeat-x' => esc_attr__('Repeat Horizontally','brawny'),
        'repeat-y' => esc_attr__('Repeat Vertically','brawny'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-repeat',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'content_background_size',
	'label'    => __( 'Content Background Size', 'brawny' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'brawny' ),
		'contain' => esc_attr__( 'Contain', 'brawny' ),
		'auto'  => esc_attr__( 'Auto', 'brawny' ),
		'inherit'  => esc_attr__( 'Inherit', 'brawny' ),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-size',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'cover',  
) );

Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'content_background_attachment',
	'label'    => __( 'Content Background Attachment', 'brawny' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'brawny'),
        'fixed' => esc_attr__('Fixed', 'brawny'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-attachment',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'fixed',  
) );
Brawny_Kirki::add_field( 'brawny', array(
	'settings' => 'content_background_position',
	'label'    => __( 'Content Background Position', 'brawny' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'brawny'),
        'center center' => esc_attr__('Center Center', 'brawny'),
        'center bottom' => esc_attr__('Center Bottom', 'brawny'),
        'left top' => esc_attr__('Left Top', 'brawny'),
        'left center' => esc_attr__('Left Center', 'brawny'),
        'left bottom' => esc_attr__('Left Bottom', 'brawny'),
        'right top' => esc_attr__('Right Top', 'brawny'),
        'right center' => esc_attr__('Right Center', 'brawny'),
        'right bottom' => esc_attr__('Right Bottom', 'brawny'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container',
			'property' => 'background-position',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'center top',  
) );

do_action('wbls-brawny_pro_customizer_options');
do_action('brawny_child_customizer_options');
