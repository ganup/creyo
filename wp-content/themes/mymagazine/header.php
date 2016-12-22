<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">	    
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="wrapper">
            <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'mymagazine'); ?></a>
            <?php if ( get_header_image() ) : ?>
			<div class="row">
				<div id="site-header">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="custom-header" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div>
			</div>
			<?php endif; ?>
			<header id="masthead" class="site-header">
                <div class="pre-header">
                    <div class="row">
                        <div class="small-12 columns">
                            <ul class="mobile-icons">
                                <li class="li-social">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'social',
                                    'container'       => false,
                                    'menu_id'         => '',
                                    'menu_class'      => 'social-links',
                                    'depth'           => 1,
                                    'link_before'     => '<span class="screen-reader-text">',
                                    'link_after'      => '</span>',
                                    'fallback_cb'     => '',
                                ));
                                ?>
                                </li>
                                <li><span class="genericon genericon-search"><span class="screen-reader-text"><?php echo _e('Search', 'mymagazine'); ?></span></span></li>
                                <li><span class="genericon genericon-user"><span class="screen-reader-text"><?php echo _e('Login', 'mymagazine'); ?></span></span></li>
                            </ul>
                            <?php
                            wp_nav_menu( array(
                                    'theme_location' => 'social',
                                    'container'       => false,
                                    'menu_class'      => 'social-links',
                                    'depth'           => 1,
                                    'link_before'     => '<span class="screen-reader-text">',
                                    'link_after'      => '</span>',
                                    'fallback_cb'     => '',
                                ));
                            ?>
                            <?php get_search_form( true ); ?>
                            <a class="log" href="<?php echo esc_url(wp_login_url( home_url() )); ?>" title="Login"><?php echo _e('Login', 'mymagazine'); ?></a>
                            <a class="log" href="<?php echo esc_url(wp_registration_url()); ?>" title="Register"><?php echo _e('Register', 'mymagazine'); ?></a>
                        </div>
                    </div><!-- end .row -->
                </div><!-- end .pre-header -->
                <div class="main-header">
                    <div class="row">
                        <div class="small-11 columns logo">
                            <?php 
                            if ( '' != get_theme_mod( 'mymagazine_logo_image' )) {
								$logo_image_url = get_theme_mod( 'mymagazine_logo_image' ); ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo-img" src="<?php echo esc_url( $logo_image_url ); ?>" alt="logo"/></a>
                            <?php
                            } else { ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php } ?>
                            <p class="site-description"><?php bloginfo( 'description' ); ?></p>  
                        </div><!-- .logo -->
                    </div><!-- end .row -->
                    <nav class="site-navigation main-nav">       
                    <div class="row">
                        <div class="nav-columns small-12 columns">
                            <h2 class="screen-reader-text"><?php _e('menu', 'mymagazine'); ?></h2>
                            <div class="screen-reader-text skip-link">
                                <a href="#content" title="Skip"><?php _e('Skip to content', 'mymagazine'); ?></a>
                            </div>
                            <div class="header-menu">
                                <span class="screen-reader-text"><?php _e('menu', 'mymagazine'); ?></span>
                                <span class="menu-button">
                                    <span class="menu-bar"></span>
                                    <span class="menu-bar"></span>
                                    <span class="menu-bar"></span>
                                </span>
                            </div>
                        <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_id' => 'menu-primary',
                                    'container'       => false,
                                    'menu_class'      => 'menu',
                                    'depth'           => 3,
                                ));
                                ?>
            
                      </div><!-- end .small-2 .medium-12 .columns -->
                    </div><!-- end .row -->
                  </nav><!-- .site-navigation .main-navigation -->
                </div><!-- row -->
            </header><!-- .site-header -->
            <div class="start row"><!-- Main Column -->