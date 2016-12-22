<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Brawny
 */
global $brawny;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function brawny_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'brawny_render_title' );
endif;
?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site <?php echo brawny_site_style_class(); ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'brawny' ); ?></a>
   <?php do_action('brawny_before_header'); ?>
	<header id="masthead" class="site-header <?php echo brawny_site_style_header_class(); ?>" role="banner">
		
		<div id="header-top">
			<div class="container">
				<div class="eight columns">
				<?php 
					if( get_theme_mod( 'header-top-left' ) ) {
						 echo  get_theme_mod( 'header-top-left'); 
					}
				?>
				</div> 
				<div class="eight columns">
					<div class="cnumber">
						<?php 
							if( get_theme_mod( 'header-top-right' ) ) {
						        echo get_theme_mod( 'header-top-right'); 
					        }
						?>							
					</div>
				</div>			
			</div>
		</div>

    
   <div id="header-bottom"><?php 
	   if ( get_theme_mod ('header_overlay',false ) ) { 
			echo '<div class="overlay overlay-header"></div>';     
		} ?>   
		<div class="branding header-image">
			<div class="container">
				<div class="logo site-branding ten columns">

					<?php  
						   // $header_text = get_theme_mod( 'header_text' );
							$logo_title = get_theme_mod( 'site-title',false );
                            $logo = get_theme_mod( 'custom_logo');	 				
							$tagline = get_theme_mod( 'tagline',true);
							if( $logo_title && function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();     
					        }elseif( $logo != '' && $logo_title ) { ?>
							   <h1 class="site-title img-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo) ?>"></a></h1>
					<?php	}else { ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						    <?php } ?>
						<?php if( $tagline ) : ?>
								<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php endif;  
					?>
				</div>

				<div class="six columns">
					<div class="top-right">
						<?php dynamic_sidebar( 'header-top-right' ); ?>
					</div>	
				</div>			
			</div>
		</div>
	</div>
	<div id="nav-wrap">
		<div class="container">
			<nav id="site-navigation" class="main-navigation sixteen columns" role="navigation">
				<button class="menu-toggle"><?php _e( 'Primary Menu', 'brawny' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->		
		</div>
		<?php do_action('brawny_after_primary_nav'); ?>
	</div>
	</header><!-- #masthead -->
	<?php do_action('brawny_after_header'); ?> 

	<?php if ( function_exists( 'is_woocommerce' ) ||  function_exists( 'is_checkout' ) || function_exists( 'is_cart' )) :
	 if ( is_woocommerce() || is_cart() || is_checkout() ) { ?>
		<div class="container">
			<div class="sixteen columns breadcrumb">	
				<header class="entry-header">
					<h1 class="entry-title"><?php woocommerce_page_title(); ?></h1>
				</header><!-- .entry-header -->
				<?php if ( get_theme_mod('breadcrumb' ) && function_exists( 'brawny_breadcrumbs' ) ) : ?>
					<div id="breadcrumb" role="navigation">
						<?php woocommerce_breadcrumb(); ?>
					</div>
			   <?php endif; ?>
			</div>
		</div> 
	<?php } 
	endif; ?>