<?php

function brawny_custom_styles($custom) {
$custom = '';	
	$sticky_header_position = get_theme_mod('sticky_header_position');
	if( $sticky_header_position == 'bottom') {
		$custom .= ".sticky-header #nav-wrap {  top: auto!important;
			bottom:0; }"."\n";	
		$custom .= ".sticky-header #nav-wrap .nav-menu .sub-menu {  top: auto;
			bottom:100%; }"."\n";	
	}	

     $page_title_bar = get_theme_mod('page_titlebar');
     switch ($page_title_bar) {
     	case 2:
     		$custom .= ".breadcrumb-wrap .columns.breadcrumb{
     			background-color: transparent;
                    background-image: none;
     		}"."\n";
     		break;     	
     	case 3:
     		$custom .= ".breadcrumb-wrap {
     			display: none;
     		}"."\n";
     		break;		
     }

     $page_title_bar_status = get_theme_mod('page_titlebar_text');
     if( $page_title_bar_status == 2 ) {
     	    $custom .= ".breadcrumb-wrap .entry-header .entry-title {
     			display: none;
     		}"."\n";
                $custom .= ".breadcrumb-wrap  .columns.breadcrumb{
                    padding:31px 100%;
               }"."\n";
     }
     
     if( get_theme_mod('enable_flex_caption_edit') ) {
              $custom .= ".flex-container .flex-caption {
                    padding: 30px;
                    bottom: auto;
                    right: auto;
                    height: auto!important;
               }"."\n";
                $custom .= ".breadcrumb-wrap  .columns.breadcrumb{
                    padding:31px 100%;
               }"."\n";
     }


	//Output all the styles
	wp_add_inline_style( 'brawny-style', $custom );    	
}
 

add_action( 'wp_enqueue_scripts', 'brawny_custom_styles' );  
