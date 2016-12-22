<?php
/**
 * The Front Page template file.
 *
 * This is the front page template file, use to display static page
 * when set 'Front page displays' to a page in Reading Settings
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Brawny
 */
if ( 'posts' == get_option( 'show_on_front' ) ) {
		get_template_part('home');
} else {
	get_header();
	if ( get_theme_mod('page-builder',false ) ) { 
		if( get_theme_mod('flexslider') ) {   
			echo do_shortcode( get_theme_mod('flexslider'));
		} ?>

		<div id="content" class="site-content container">
		<?php  if( get_theme_mod('home_sidebar',false ) ) { ?>
				<div id="primary" class="content-area eleven columns">
			<?php }else { ?>
			    <div id="primary" class="content-area sixteen columns">
			<?php } ?>
			
				<main id="main" class="site-main" role="main"><?php
						while ( have_posts() ) : the_post();
							the_content();
						endwhile; ?>
				</main><!-- #main -->
		     </div><!-- #primary -->
<?php	} else {
	
	if( get_theme_mod('enable_slider',true) ) {
		get_template_part('category-slider');
	}
	if( get_theme_mod('enable_service',true) ) {

		$output = '';
		$output = '<div class="services">';
		$output .= '<div class="container"><div class="sixteen columns">'; 

		if ( get_theme_mod('service-icon-1') || get_theme_mod('service-title-1') || get_theme_mod('service-description-1') ) {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-1') ) . '"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">' . '<h3>' . esc_html( get_theme_mod('service-title-1') ) . '</h3>'. get_theme_mod('service-description-1') . '</div>';
			$output .= '</div><!-- .one-third -->';
		} else {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">';
			$output .= sprintf( __('<h3>Featured Page</h3><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -1.</p>', 'brawny' ), admin_url('customize.php') );
			$output .= '</div></div><!-- .one-third -->';
		}

		if ( get_theme_mod('service-icon-2') || get_theme_mod('service-title-2') || get_theme_mod('service-description-2') )  {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-2') ) . '"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">' . '<h3>' . esc_html( get_theme_mod('service-title-2')  ) . '</h3>' . get_theme_mod('service-description-2') . '</div>';
			$output .= '</div><!-- .one-third -->'; 
		} else {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">';
			$output .= sprintf( __('<h3>Featured Page</h3><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -2.</p>', 'brawny' ), admin_url('customize.php') );
			$output .= '</div></div><!-- .one-third -->';
		}
		if ( get_theme_mod('service-icon-3') || get_theme_mod('service-title-3') || get_theme_mod('service-description-3') )  {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="' . esc_attr( get_theme_mod('service-icon-3') ) . '"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">' . '<h3>' . esc_html( get_theme_mod('service-title-3')  ) . '</h3>'. get_theme_mod('service-description-3') . '</div>';
			$output .= '</div><!-- .one-third -->';
		} else {
			$output .= '<div class="one-third column" class="service">';
			$output .= '<div class="service-title"><p><i class="fa fa-magic"></i></p>';
			$output .= '</div>';
			$output .= '<div class="service">';
			$output .= sprintf( __('<h3>Featured Page</h3><p>Featured page description text : use the page excerpt or set your own custom text. Click  <a href="%1$s"target="_blank"> Customizer </a> and Goto Home => Sercice Section -3.</p>', 'brawny' ), admin_url('customize.php') );
			$output .= '</div></div><!-- .one-third -->';
		}

		$output .= '</div></div><!-- .container -->';
		$output .= '</div><!-- .services -->';

		echo $output;
	}
		 do_action('brawny_service_content_after');
			   do_action('brawny_recent_post_before'); ?>
			   <div id="content" class="site-content container">
			    <div id="primary" class="content-area <?php echo brawny_get_home_page_primary_class(); ?> columns">
					<main id="main" class="site-main" role="main"><?php
						if( get_theme_mod('enable_recent_post_service',true) ) {
						   brawny_recent_posts(); 
						} 
				       do_action('brawny_recent_post_after');
					    if( get_theme_mod('enable_home_default_content',false ) ) {  ?>
							<div class="container default-home-page"><?php
								while ( have_posts() ) : the_post();       
									the_content();
								endwhile; ?>
					         </div><?php
	                    } ?>
	                </main><!-- #main -->
	            </div><!-- #primary -->
<?php
}
if( get_theme_mod('home_sidebar',false ) ) { 
   get_sidebar();
}
get_footer();  
}
?>