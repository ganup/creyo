<?php
/**
 * Mymagazine Customizer functionality
 *
 */

function mymagazine_register_theme_customizer( $wp_customize ) {
	
	/**
         * Logo upload
         */
        $wp_customize->add_setting(
            'mymagazine_logo_image',
                array(
                    'default'      => '',
                    'sanitize_callback' => 'mymagazine_sanitize_image_upload',
                )
        );
        
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'mymagazine_logo_image',
                array(
                    'label'    => __('Logo Image', 'mymagazine'),
		    'description' => __( 'The logo image. Max height 75 pixels.', 'mymagazine' ),
                    'settings' => 'mymagazine_logo_image',
                    'section'  => 'title_tagline',
                    'priority'   => 94,
                )
            )
        );
	
	/*
	 * Sanitization
	 */
	
	function mymagazine_sanitize_image_upload( $input ) {
		return esc_url( $input );
	}
}

add_action( 'customize_register', 'mymagazine_register_theme_customizer' );