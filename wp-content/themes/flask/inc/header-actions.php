<?php
/*****************************
 * Actions the put together the header of the theme, including site branding and navigation
 *****************************/

if ( ! function_exists( 'flask_site_branding' ) ) :
	function flask_site_branding() {
		?>
		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img class="site-logo" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>">
		</a>
		<?php endif; // End header image check. ?>
		<div class="site-branding nolinkborder">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->
		<?php
	}
	add_action('flask_in_the_header', 'flask_site_branding', 10);
endif;

if ( ! function_exists( 'flask_nav_button' ) ) :
	function flask_nav_button() {
		?>
		<div id="button-block" class="button-block" >
			<span class="menu-button genericon genericon-menu"></span>
		</div>
		<?php
	}
	add_action('flask_before_the_header', 'flask_nav_button', 10);
endif;

if ( ! function_exists( 'flask_main_menu' ) ) :
	function flask_main_menu() {
		?>
		<div id="main-menu" class="main-menu">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'depth' => 2 ) ); ?>
			</nav><!-- #site-navigation -->
			<?php get_search_form(); ?>
			<?php flask_follow_social_media(); ?>
		</div>
		<?php
	}
	add_action('flask_before_the_page', 'flask_main_menu', 10);
endif;