<?php

class Poloray_Customizer {

    public static function Poloray_Register($wp_customize) {
        self::Poloray_Sections($wp_customize);
        self::Poloray_Controls($wp_customize);
    }

    public static function Poloray_Sections($wp_customize) {
        /**
         * General Section
         */
        $wp_customize->add_section('general_setting_section', array(
            'title' => __('General Settings', 'poloray'),
            'description' => __('Allows you to customize header logo, favicon, background etc settings for Poloray Theme.', 'poloray'), //Descriptive tooltip
            'panel' => '',
            'priority' => '10',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page Top Feature Area
         */
        $wp_customize->add_section('home_top_feature_area', array(
            'title' => __('Top Feature Area', 'poloray'),
            'description' => __('Allows you to setup Top feature area section for Poloray Theme.', 'poloray'), //Descriptive tooltip
            'panel' => '',
            'priority' => '11',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Add panel for home page feature area
         */
        $wp_customize->add_panel('home_page_feature_area_panel', array(
            'title' => __('Home Page Feature Area', 'poloray'),
            'description' => __('Allows you to setup home page feature area section for Poloray Theme.', 'poloray'),
            'priority' => '12',
            'capability' => 'edit_theme_options'
        ));
        /**
         * Home Page Tag Line Feature
         */
        $wp_customize->add_section('home_feature_tagline_section', array(
            'title' => __('Home Page Tagline Feature Area', 'poloray'),
            'description' => __('Allows you to setup home page tagline feature area section for Poloray Theme.', 'poloray'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 1
         */
        $wp_customize->add_section('home_feature_area_section1', array(
            'title' => __('First Feature Area', 'poloray'),
            'description' => __('Allows you to setup first feature area section for Poloray Theme.', 'poloray'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 2
         */
        $wp_customize->add_section('home_feature_area_section2', array(
            'title' => __('Second Feature Area', 'poloray'),
            'description' => __('Allows you to setup second feature area section for Poloray Theme.', 'poloray'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 3
         */
        $wp_customize->add_section('home_feature_area_section3', array(
            'title' => __('Third Feature Area', 'poloray'),
            'description' => __('Allows you to setup third feature area section for Poloray Theme.', 'poloray'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 4
         */
        $wp_customize->add_section('home_feature_area_section4', array(
            'title' => __('Fourth Feature Area', 'poloray'),
            'description' => __('Allows you to setup fourth feature area section for Poloray Theme.', 'poloray'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Style Section
         */
        $wp_customize->add_section('style_section', array(
            'title' => __('Style Setting', 'poloray'),
            'description' => __('Allows you to setup Top Footer Section Text for Poloray Theme.', 'poloray'),
            'panel' => '',
            'priority' => '13',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Social Icon Section
         */
        $wp_customize->add_section('social_icon_settings', array(
            'title' => __('Social Icons', 'poloray'),
            'description' => __('Allows you to setup social site link for Poloray Theme.', 'poloray'),
            'panel' => '',
            'priority' => '14',
            'capability' => 'edit_theme_options'
                )
        );
    }

    public static function Poloray_Section_Content() {

        $section_content = array(
            'general_setting_section' => array(
                'poloray_logo',
                'poloray_favicon'
            ),
            'home_top_feature_area' => array(
                'poloray_slider_heading',
                'poloray_slider_description',
                'poloray_slideimage1',
                'poloray_slider_link'
            ),
            'home_feature_tagline_section' => array(
                'poloray_mainheading',
                'poloray_homepage_button',
                'poloray_homepage_button_link'
            ),
            'home_feature_area_section1' => array(
                'poloray_wimg1',
                'poloray_firsthead',
                'poloray_firstdesc',
                'poloray_feature_link1'
            ),
            'home_feature_area_section2' => array(
                'poloray_fimg2',
                'poloray_headline2',
                'poloray_seconddesc',
                'poloray_feature_link2'
            ),
            'home_feature_area_section3' => array(
                'poloray_fimg3',
                'poloray_headline3',
                'poloray_thirddesc',
                'poloray_feature_link3'
            ),
            'home_feature_area_section4' => array(
                'poloray_fimg4',
                'poloray_headline4',
                'poloray_fourthdesc',
                'poloray_feature_link4'
            ),
            'style_section' => array(
                'poloray_customcss'
            ),
            'social_icon_settings' => array(
                'poloray_facebook',
                'poloray_twitter',
                'poloray_yahoo',
                'poloray_rss',
                'poloray_digg',
                'poloray_pinterest'
            )
        );
        return $section_content;
    }

    public static function Poloray_Settings() {
        $poloray_settings = array(
            'poloray_logo' => array(
                'id' => 'poloray_options[poloray_logo]',
                'label' => __('Custom Logo', 'poloray'),
                'description' => __('Choose your own logo. Optimal Size: 300px Wide by 90px Height.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/logo.png'
            ),
            'poloray_favicon' => array(
                'id' => 'poloray_options[poloray_favicon]',
                'label' => __('Custom Favicon', 'poloray'),
                'description' => __('Specify a 16px x 16px image that will represent your website favicon.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),
            'poloray_slider_heading' => array(
                'id' => 'poloray_options[poloray_slider_heading]',
                'label' => __('Top Feature Heading', 'poloray'),
                'description' => __('Enter your text for Top Feature.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Your Site is faster to built & Search Engine Optimized.', 'poloray')
            ),
            'poloray_slider_description' => array(
                'id' => 'poloray_options[poloray_slider_description]',
                'label' => __('Top Feature Description', 'poloray'),
                'description' => __('Enter your text for Top Feature Description.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Poloray WordPress Theme with Single Click Installation, Just a Click and your website is ready in Instant.', 'poloray')
            ),
            'poloray_slideimage1' => array(
                'id' => 'poloray_options[poloray_slideimage1]',
                'label' => __('Top Feature Image', 'poloray'),
                'description' => __('Choose your image or video. Optimal size is 422px wide and height 224px', 'poloray'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/sliderimg.png'
            ),
            'poloray_slider_link' => array(
                'id' => 'poloray_options[poloray_slider_link]',
                'label' => __('Link for Top Feature Image', 'poloray'),
                'description' => __('Enter your text for Top Feature  Link.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            // Home Page Feature Tagline
            'poloray_mainheading' => array(
                'id' => 'poloray_options[poloray_mainheading]',
                'label' => __('Home Page Tagline', 'poloray'),
                'description' => __('Enter your text for home page tagline', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('You will find some of the best and most reliable products over Here.', 'poloray')
            ),
            'poloray_homepage_button' => array(
                'id' => 'poloray_options[poloray_homepage_button]',
                'label' => __('Home Page Button Text', 'poloray'),
                'description' => __('Enter your text for home page button.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Read More', 'poloray')
            ),
            'poloray_homepage_button_link' => array(
                'id' => 'poloray_options[poloray_homepage_button_link]',
                'label' => __('Home Page Button Link', 'poloray'),
                'description' => __('Enter your text for home page button link', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            // First Feature Box
            'poloray_wimg1' => array(
                'id' => 'poloray_options[poloray_wimg1]',
                'label' => __('First Feature Image', 'poloray'),
                'description' => __('Choose image for your first Feature area. Optimal size 170px x 170px', 'poloray'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg1.png'
            ),
            'poloray_firsthead' => array(
                'id' => 'poloray_options[poloray_firsthead]',
                'label' => __('First Feature Heading', 'poloray'),
                'description' => __('Mention the heading for First Feature Box that will showcase your business services.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Quick to Install and Configure', 'poloray')
            ),
            'poloray_firstdesc' => array(
                'id' => 'poloray_options[poloray_firstdesc]',
                'label' => __('First Feature Description', 'poloray'),
                'description' => __('Write short description for your First Feature Box.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Poloray Theme is very easy to Install and you can do the setup in few minutes.', 'poloray')
            ),
            'poloray_feature_link1' => array(
                'id' => 'poloray_options[poloray_feature_link1]',
                'label' => __('First feature Link', 'poloray'),
                'description' => __('Enter your text for First feature Link.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            // Second Feature Box
            'poloray_fimg2' => array(
                'id' => 'poloray_options[poloray_fimg2]',
                'label' => __('Second Feature Image', 'poloray'),
                'description' => __('Choose image for your Second Feature area. Optimal size 170px x 170px', 'poloray'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg2.png'
            ),
            'poloray_headline2' => array(
                'id' => 'poloray_options[poloray_headline2]',
                'label' => __('Second Feature Heading', 'poloray'),
                'description' => __('Mention the heading for Second Feature Box that will showcase your business services.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Multi Language Translation Enabled', 'poloray')
            ),
            'poloray_seconddesc' => array(
                'id' => 'poloray_options[poloray_seconddesc]',
                'label' => __('Second Feature Description', 'poloray'),
                'description' => __('Write short description for your Second Feature Box.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Poloray Theme allows multi-language translation &amp; you can easily translate your site.', 'poloray')
            ),
            'poloray_feature_link2' => array(
                'id' => 'poloray_options[poloray_feature_link2]',
                'label' => __('Second feature Link', 'poloray'),
                'description' => __('Enter your text for Second feature Link.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            // Third Feature Box
            'poloray_fimg3' => array(
                'id' => 'poloray_options[poloray_fimg3]',
                'label' => __('Third Feature Image', 'poloray'),
                'description' => __('Choose image for your Third Feature area. Optimal size 170px x 170px', 'poloray'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg3.png'
            ),
            'poloray_headline3' => array(
                'id' => 'poloray_options[poloray_headline3]',
                'label' => __('Third Feature Heading', 'poloray'),
                'description' => __('Mention the heading for Third Feature Box that will showcase your business services.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Mobile &amp; Tablet Optimized Design', 'poloray')
            ),
            'poloray_thirddesc' => array(
                'id' => 'poloray_options[poloray_thirddesc]',
                'label' => __('Third Feature Description', 'poloray'),
                'description' => __('Write short description for your Third Feature Box.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Poloray Theme had a Responsive Mobiles &amp; Tablets Optimized Design.', 'poloray')
            ),
            'poloray_feature_link3' => array(
                'id' => 'poloray_options[poloray_feature_link3]',
                'label' => __('Third feature Link', 'poloray'),
                'description' => __('Enter your text for Third feature Link.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            // Fourth Feature Box
            'poloray_fimg4' => array(
                'id' => 'poloray_options[poloray_fimg4]',
                'label' => __('Fourth Feature Image', 'poloray'),
                'description' => __('Choose image for your Fourth Feature area. Optimal size 170px x 170px', 'poloray'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/circleimg4.png'
            ),
            'poloray_headline4' => array(
                'id' => 'poloray_options[poloray_headline4]',
                'label' => __('Fourth Feature Heading', 'poloray'),
                'description' => __('Mention the heading for Fourth Feature Box that will showcase your business services.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Highly Search Engine Friendly', 'poloray')
            ),
            'poloray_fourthdesc' => array(
                'id' => 'poloray_options[poloray_fourthdesc]',
                'label' => __('Fourth Feature Description', 'poloray'),
                'description' => __('Write short description for your Fourth Feature Box.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Poloray Theme is SEO Friendly WordPress Theme, rank your site easily with Poloray.', 'poloray')
            ),
            'poloray_feature_link4' => array(
                'id' => 'poloray_options[poloray_feature_link4]',
                'label' => __('Fourth feature Link', 'poloray'),
                'description' => __('Enter your text for Fourth feature Link.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'poloray_customcss' => array(
                'id' => 'poloray_options[poloray_customcss]',
                'label' => __('Custom CSS', 'poloray'),
                'description' => __('Quickly add your custom CSS code to your theme by writing the code in this block.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),
            'poloray_facebook' => array(
                'id' => 'poloray_options[poloray_facebook]',
                'label' => __('Facebook URL', 'poloray'),
                'description' => __('Enter your Facebook URL if you have one.', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'poloray_twitter' => array(
                'id' => 'poloray_options[poloray_twitter]',
                'label' => __('Twitter URL', 'poloray'),
                'description' => __('Enter your Twitter URL if you have one', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'poloray_yahoo' => array(
                'id' => 'poloray_options[poloray_yahoo]',
                'label' => __('Yahoo URL', 'poloray'),
                'description' => __('Enter your Yahoo Feed URL if you have one', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'poloray_rss' => array(
                'id' => 'poloray_options[poloray_rss]',
                'label' => __('Rss URL', 'poloray'),
                'description' => __('Enter your Rss URL if you have one', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'poloray_digg' => array(
                'id' => 'poloray_options[poloray_digg]',
                'label' => __('Digg URL', 'poloray'),
                'description' => __('Enter your Digg URL if you have one', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            'poloray_pinterest' => array(
                'id' => 'poloray_options[poloray_pinterest]',
                'label' => __('Pinterest URL', 'poloray'),
                'description' => __('Enter your Pinterest Feed URL if you have one', 'poloray'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
        );
        return $poloray_settings;
    }

    public static function Poloray_Controls($wp_customize) {
        $sections = self::Poloray_Section_Content();
        $settings = self::Poloray_Settings();
        foreach ($sections as $section_id => $section_content) {
            foreach ($section_content as $section_content_id) {
                switch ($settings[$section_content_id]['setting_type']) {
                    case 'image':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'poloray_sanitize_url');
                        $wp_customize->add_control(new WP_Customize_Image_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id']
                                )
                        ));
                        break;
                    case 'text':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'poloray_sanitize_text');
                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));
                        break;
                    case 'textarea':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'poloray_sanitize_textarea');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'textarea'
                                )
                        ));
                        break;
                    case 'link':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'poloray_sanitize_url');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));

                        break;
                    default:
                        break;
                }
            }
        }
    }

    public static function add_setting($wp_customize, $setting_id, $default, $type, $sanitize_callback) {
        $wp_customize->add_setting($setting_id, array(
            'default' => $default,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => array('Poloray_Customizer', $sanitize_callback),
            'type' => $type
                )
        );
    }

    /**
     * adds sanitization callback funtion : textarea
     * @package Poloray
     */
    public static function poloray_sanitize_textarea($value) {
        $value = esc_html($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : url
     * @package Poloray
     */
    public static function poloray_sanitize_url($value) {
        $value = esc_url($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : text
     * @package Poloray
     */
    public static function poloray_sanitize_text($value) {
        $value = sanitize_text_field($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : email
     * @package Poloray
     */
    public static function poloray_sanitize_email($value) {
        $value = sanitize_email($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : number
     * @package Poloray
     */
    public static function poloray_sanitize_number($value) {
        $value = preg_replace("/[^0-9+ ]/", "", $value);
        return $value;
    }

}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('Poloray_Customizer', 'Poloray_Register'));

function inkthemes_registers() {
    wp_register_script('inkthemes_jquery_ui', '//code.jquery.com/ui/1.11.0/jquery-ui.js', array("jquery"), true);
    wp_register_script('inkthemes_customizer_script', get_template_directory_uri() . '/js/inkthemes_customizer.js', array("jquery", "inkthemes_jquery_ui"), true);
    wp_enqueue_script('inkthemes_customizer_script');
    wp_localize_script('inkthemes_customizer_script', 'ink_advert', array(
        'pro' => __('View PRO version', 'poloray'),
        'url' => esc_url('http://www.inkthemes.com/wp-themes/lawyer-wordpress-theme/'),
		'support_text' => __('Need Help!','poloray'),
		'support_url' => esc_url('http://www.inkthemes.com/lets-connect/')
        )
    );
}

add_action('customize_controls_enqueue_scripts', 'inkthemes_registers');
