<?php
/**
 * The template for displaying category-slider 
 *
 * display slider
 *
 * @package Brawny
 */


      	$output = '';
      	$output .= '<div class="flex-container">';
		$output .= '<div class="flexslider">';
		$output .= '<ul class="slides">';
		if ( brawny_slide_exists() ) {                    
			for( $slide_count = 1 ;  $slide_count < 6; $slide_count++ ) {   
				
				if ( get_theme_mod( 'image_upload-' . $slide_count ) ) {
					$output .= '<li>';	
					$slide_image = get_theme_mod( 'image_upload-' . $slide_count );
					$output .= '<div class="flex-image"><img src="' . esc_url( $slide_image ) . '" alt="" ></div>';
				}
				

				if ( get_theme_mod( 'flexcaption-' . $slide_count ) ) {
					$slide_description =  get_theme_mod( 'flexcaption-' . $slide_count );
					$output .= '<div class="flex-caption">' . $slide_description . '</div>';
				} 

				$output .= '</li>';
				
			}
		}
		else {
			$output .= '<li>';
			$slide_image = BRAWNY_PARENT_URL .'/images/slide1.png';
			$output .= '<div class="flex-image"><img src="' . esc_url( $slide_image ) . '" alt="" ></div>';
			$slide_description = sprintf( __('<h1>The Most Modern WordPress Theme</h1><h3> Slider Setting </h3><p>You haven\'t created any slider yet. Go to Customizer and click Home => FlexSlider Settings, edit or add  your images and Caption.<p><a href="%1$s"target="_blank"> Customizer </a></p>', 'brawny'),  admin_url('customize.php') );
			$output .= '<div class="flex-caption">' . $slide_description . '</div>';
			$output .= '</li>';
		}

		$output .= '</ul>';
		$output .= '</div><!-- .flexslider -->';
		$output .= '</div><!-- .flex-container -->';

		echo $output;