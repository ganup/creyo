<?php
/**
 * Theme Functions
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

/*****************************************************/
//Dequeue and enqueue styles
add_filter( 'woocommerce_enqueue_styles', 'e_shopper_dequeue_styles' );
function e_shopper_dequeue_styles( $enqueue_styles ) {
unset( $enqueue_styles['woocommerce-general'] ); // Remove the gloss
unset( $enqueue_styles['woocommerce-layout'] ); // Remove the layout
return $enqueue_styles;
} 

//Dequeue and enqueue script
function e_shopper_wp_enqueue_woocommerce_custom_scripts() {

wp_enqueue_script( 'e_shopper-toggle', get_template_directory_uri() . '/js/toggle.js', array(), '', true );
wp_enqueue_script( 'e_shopper-wc-checkout-new', get_template_directory_uri() . '/js/checkout.js', array(), '', true );
wp_enqueue_script( 'e_shopper-plus-minus', get_template_directory_uri() . '/js/custom_quantity.js', array(), '', true );
wp_enqueue_script( 'e_shopper-search', get_template_directory_uri() . '/js/search.js', array(), '', true );
wp_enqueue_script( 'e_shopper-filter', get_template_directory_uri() . '/js/filter.js', array(), '', true );
wp_enqueue_script( 'e_shopper-jquery-slider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '2.2.2', true );

}

add_action( 'wp_enqueue_scripts', 'e_shopper_wp_enqueue_woocommerce_custom_scripts' );

/*****************************************************/
if ( ! function_exists( 'e_shopper_is_woocommerce_activated' ) ) {
	function e_shopper_is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}
 // Load text domain.
function cyberchimps_text_domain() {
	load_theme_textdomain( 'e-shopper', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'cyberchimps_text_domain' ); 

//handle backwards compatibility
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'theme_slug_render_title' );
}

// enabling theme support for title tag
function e_shopper_setup() 
{
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'e_shopper_setup' );

//remove addition of title 
function e_shopper_remove_title()
{
remove_filter( 'wp_title', 'cyberchimps_default_site_title', 10, 3 );
}
add_action('init', 'e_shopper_remove_title');

// Load Core
require_once( get_template_directory() . '/cyberchimps/init.php' );

// Custom shop theme functions
require_once( get_template_directory() . '/inc/custom/custom-functions.php' );

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

function cyberchimps_add_site_info() { ?>
	<p>&copy; Company Name</p>	
<?php }
add_action('cyberchimps_site_info', 'cyberchimps_add_site_info');	

if ( ! function_exists( 'cyberchimps_comment' ) ) :
// Template for comments and pingbacks.
// Used as a callback by wp_list_comments() for displaying the comments.
function cyberchimps_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'e-shopper' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'e-shopper' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment hreview">
			<footer>
				<div class="comment-author reviewer vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( '%s <span class="says">' . __( 'says:', 'e-shopper' ) . '</span>', sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'e-shopper' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="dtreviewed"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'e-shopper' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'e-shopper' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for cyberchimps_comment()


// core options customization Names and URL's
// Theme check function to determine whether the them is free or pro.
if( !function_exists( 'cyberchimps_theme_check' ) ) {
	function cyberchimps_theme_check() {
		$level = 'free';

		return $level;
	}
}

//Theme Name
function cyberchimps_options_theme_name(){
	$text = 'e-Shopper';
	return $text;
}
//Doc's URL
function cyberchimps_options_documentation_url() {
	$url = 'http://cyberchimps.com/guides/c-free/';
	return $url;
}
// Support Forum URL
function cyberchimps_options_support_forum() {
	$url = 'http://cyberchimps.com/forum/free/e-Shopper/';
	return $url;
}

add_filter( 'cyberchimps_current_theme_name', 'cyberchimps_options_theme_name', 1 );
add_filter( 'cyberchimps_documentation', 'cyberchimps_options_documentation_url' );
add_filter( 'cyberchimps_support_forum', 'cyberchimps_options_support_forum' );

//upgrade bar
function cyberchimps_upgrade_bar_pro_title() {
	$title = 'e-Shopper Pro';

	return $title;
}

function eShopper_upgrade_link() {
	$link = 'http://www.cyberchimps.com/e-shopperpro/';

	return $link;
}

add_filter( 'cyberchimps_upgrade_pro_title', 'cyberchimps_upgrade_bar_pro_title' );
add_filter( 'cyberchimps_upgrade_link', 'eShopper_upgrade_link' );

// Help Section
function cyberchimps_options_help_header() {
	$text = __('e-Shopper', 'e-shopper' );
	return $text;
}
function cyberchimps_options_help_sub_header(){
	$text = __( 'e-Shopper Responsive WordPress Starter Theme', 'e-shopper' );
	return $text;
}

add_filter( 'cyberchimps_help_heading', 'cyberchimps_options_help_header' );
add_filter( 'cyberchimps_help_sub_heading', 'cyberchimps_options_help_sub_header' );

// Branding images and defaults

// Banner default
function cyberchimps_banner_default() {
	$url = '/inc/images/branding/banner.jpg';
	return $url;
}
add_filter( 'cyberchimps_banner_img', 'cyberchimps_banner_default' );

//theme specific skin options in array. Must always include option default
function e_shopper_skin_color_options( $options ) {
	
	// Get path of image
	$imagepath = get_template_directory_uri(). '/inc/css/skins/images/';
	
	$options = array(
		'default'	=> $imagepath . 'default.png'
	);		
	return $options;
}
add_filter( 'cyberchimps_skin_color', 'e_shopper_skin_color_options', 1 );

// theme specific typography options
function cyberchimps_typography_sizes( $sizes ) {
	$sizes = array( '8', '9', '10', '12', '14', '16', '20' );

	return $sizes;
}
function cyberchimps_typography_faces( $faces ) {
	$faces = array(
		'Arial, Helvetica, sans-serif'                     => 'Arial',
		'Arial Black, Gadget, sans-serif'                  => 'Arial Black',
		'Comic Sans MS, cursive'                           => 'Comic Sans MS',
		'Courier New, monospace'                           => 'Courier New',
		'Georgia, serif'                                   => 'Georgia',
		'"HelveticaNeue-Light", "Helvetica Neue Light",
		"Helvetica Neue",Helvetica, Arial, "Lucida Grande",
		sans-serif'                                => 'Helvetica Neue',
		'Impact, Charcoal, sans-serif'                     => 'Impact',
		'Lucida Console, Monaco, monospace'                => 'Lucida Console',
		'Lucida Sans Unicode, Lucida Grande, sans-serif'   => 'Lucida Sans Unicode',
		'"Open Sans", sans-serif'                          => 'Open Sans',
		'Palatino Linotype, Book Antiqua, Palatino, serif' => 'Palatino Linotype',
		'Tahoma, Geneva, sans-serif'                       => 'Tahoma',
		'Times New Roman, Times, serif'                    => 'Times New Roman',
		'Trebuchet MS, sans-serif'                         => 'Trebuchet MS',
		'Verdana, Geneva, sans-serif'                      => 'Verdana',
		'Symbol'                                           => 'Symbol',
		'Webdings'                                         => 'Webdings',
		'Wingdings, Zapf Dingbats'                         => 'Wingdings',
		'MS Sans Serif, Geneva, sans-serif'                => 'MS Sans Serif',
		'MS Serif, New York, serif'                        => 'MS Serif',
		'Google Fonts'                                     => 'Google Fonts',
		'Museo500-Regular'				   => 'Museo500-Regular'
	);

	return $faces;
}

function cyberchimps_typography_styles( $styles ) {
	$styles = array( 'normal' => 'Normal', 'bold' => 'Bold' );

	return $styles;
}

function cyberchimps_typography_defaults() {
	$default = array(
		'size'  => '14px',
		'face'  => 'Arial, Helvetica, sans-serif',
		'style' => 'normal'
	);

	return $default;
}

function cyberchimps_typography_heading_defaults() {
	$default = array(
		'face' => 'Museo500-Regular',
	);

	return $default;
}

add_filter( 'cyberchimps_typography_sizes', 'cyberchimps_typography_sizes' );
add_filter( 'cyberchimps_typography_faces', 'cyberchimps_typography_faces' );
add_filter( 'cyberchimps_typography_styles', 'cyberchimps_typography_styles' );
add_filter( 'cyberchimps_typography_defaults', 'cyberchimps_typography_defaults' );
add_filter( 'cyberchimps_typography_heading_defaults', 'cyberchimps_typography_heading_defaults' );

// turn cyberchimps footer link off

function cyberchimps_footer_link() {
	$array = array(
								'name' => __('Cyberchimps Link', 'e-shopper'),
								'id' => 'footer_cyberchimps_link',
								'std' => 1,
								'type' => 'toggle',
								'section' => 'cyberchimps_footer_section',
								'heading' => 'cyberchimps_footer_heading'
							);
	return $array;
}
add_filter( 'footer_cyberchimps_link', 'cyberchimps_footer_link' );


function e_shopper_horizontal_widgets_init() {

	register_sidebar( array(
		'name'          => __('Home Horizontal Sidebar', 'e-shopper'),
		'id'            => 'horizontal_1',
		'before_widget' => apply_filters( 'cyberchimps_sidebar_before_widget', '<aside id="%1$s" class="widget-container %2$s">' ),
		'after_widget'  => apply_filters( 'cyberchimps_sidebar_after_widget', '</aside>' ),
		'before_title'  => apply_filters( 'cyberchimps_sidebar_before_widget_title', '<h2 class="rounded">' ),
		'after_title'   => apply_filters( 'cyberchimps_sidebar_after_widget_title', '</h2>' )
	) );

}
add_action( 'widgets_init', 'e_shopper_horizontal_widgets_init' );


//Top menu
add_action( 'init', 'e_shopper_register_my_menus' );
function e_shopper_register_my_menus() {
	register_nav_menus(
		array(
			'top-menu' => __( 'Top Menu', 'e-shopper' ),
			
		)
	);
}

//Mini cart
function e_shopper_register_wc_cart_widget() 
{
	require_once( get_template_directory() . '/inc/class-wc-widget-cart-custom.php');
	    register_widget( 'WC_Widget_Cart_Custom' );
}
if (e_shopper_is_woocommerce_activated()) 
{
	add_action( 'widgets_init', 'e_shopper_register_wc_cart_widget' );
}
add_action('cyberchimps_show_cart', 'e_shopper_show_cart_items');
function e_shopper_show_cart_items()
{

	global $woocommerce, $qty;
	if (e_shopper_is_woocommerce_activated()) 
	{
		// get cart quantity
		$qty = $woocommerce->cart->get_cart_contents_count();

		// get cart url
		$cart_url = $woocommerce->cart->get_cart_url();
		$checkout_url= WC()->cart->get_checkout_url();
	}

	// if multiple products in cart
	if($qty>1){
	      echo '<nav><ul>';
	      echo '<li> <a href="'.$cart_url.'"><span class="glyph glyphicon glyphicon-shopping-cart"></span>'.$qty.' items |'.'</a><div class="minicart-span">';
		       the_widget( 'WC_Widget_Cart_Custom', 'title=' );
	      echo '</div></li><li> <a href="'.$checkout_url.'">'.__('Checkout', 'e-shopper').'</a></li>';
	      echo '</ul></nav>' ;
	}
	// if single product in cart
	if($qty==1){
	     echo '<nav><ul>';
	     echo '<li> <a href="'.$cart_url.'"><span class="glyph glyphicon glyphicon-shopping-cart"></span>'.$qty.' item |'.'</a><div class="minicart-span">';
		                                the_widget( 'WC_Widget_Cart_Custom', 'title=' );
	     echo '</div></li><li> <a href="'.$checkout_url.'">'.__('Checkout', 'e-shopper').'</a></li>';
	     echo '</ul></nav>' ;
	}

}

function get_checkout_url() 
{
             $checkout_page_id = wc_get_page_id( 'checkout' );
             $checkout_url     = '';
              if ( $checkout_page_id ) 
                 {
  
                  // Get the checkout URL
                  $checkout_url = get_permalink( $checkout_page_id );
  
                  // Force SSL if needed
                  if ( is_ssl() || 'yes' === get_option( 'woocommerce_force_ssl_checkout' ) ) {
                      $checkout_url = str_replace( 'http:', 'https:', $checkout_url );
                  }
		}
}
function get_cart() {
              if ( ! did_action( 'wp_loaded' ) ) {
                  $this->get_cart_from_session();
                  _doing_it_wrong( __FUNCTION__, __( 'Get cart should not be called before the wp_loaded action.', 'woocommerce' ), '2.3' );
              }
              return array_filter( (array) $this->cart_contents );
}

//Checkout

add_filter( 'woocommerce_checkout_fields' , 'e_shopper_custom_override_checkout_fields' );
function e_shopper_custom_override_checkout_fields($fields) {
     $order = array(
        "first_name", 
        "last_name", 
        "company", 
        "address_1", 
        "address_2",
        "country",
        "state",
        "postcode", 
        "city",         
        "email", 
        "phone"
    );
    foreach($order as $field)
    {
        $ordered_billing_fields['billing_'.$field] = $fields["billing"]['billing_'.$field];
        if($field!=='email'&& $field!=='phone')
        $ordered_shipping_fields['shipping_'.$field] = $fields["shipping"]['shipping_'.$field];
  
    }
    $fields["billing"] = $ordered_billing_fields;
    $fields["shipping"] = $ordered_shipping_fields;
    return $fields;

}

add_filter('woocommerce_form_field_args','e_shopper_form_field_args_custom');
function e_shopper_form_field_args_custom($args){
	if(is_array($args['class']))
	{
	foreach($args['class'] as $elements => $key)
	{
	      if($key==='form-row-first'||$key==='form-row-last' ||$key==='form-row-wide')
	       $args['class'][$elements]='col-md-6';
	      
	}
	}

	if($args['id']==='billing_company'||$args['id']==='shipping_company'||$args['id']==='billing_country'||$args['id']==='shipping_country')
	$args['class'][0]='col-md-12';

	if($args['id']==='billing_address_1'||$args['id']==='shipping_address_1')
	$args['label']='Address1';

	if($args['id']==='billing_address_2'||$args['id']==='shipping_address_2')
	$args['label']='Address2';

	if($args['id']==='order_comments')
	$args['class'][1]='col-md-12';

	return $args;

}
//Latest Product Widget

class Latest_Product_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'latest_product_widget', // Base ID
			__( 'Latest Products', 'e-shopper' ), // Name
			array( 'description' => __( 'Latest Product Widget', 'e-shopper' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
                global $product;
		$content='<div id="latest_product_section" class="container-full-width">
     		<div class="container latest_products">
       		<div class="row"><div class="col-md-8"><h1>Latest Products</h1></div><div class="col-md-4"><a class="view_all_button" href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'">View All Products</a></div></div>
      		<div class="row products">';
           		$args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => 4, 'orderby' =>'date','order' => 'DESC' );
            		$loop = new WP_Query( $args );
            		while ( $loop->have_posts() ) : $loop->the_post(); global $product;
                   		$id=$loop->post->ID;
				$price = $product->get_price();
				$currency = get_woocommerce_currency_symbol();

				$regular_price = $product->regular_price;
				$sales_price = $product->sale_price;  

				$price = $regular_price - $sales_price;
				$price = round($price, 2);
				$price = explode ('.',$price);
				$price1= $price[0];$price2="";
                                if (isset ($price[1]))
                                {
				$price2 = $price[1];
                                }
				if(!$price2){$price2 = '00';}
				$sale = $currency;
				$sale .= $price[0];
                   		$content.= '<div class="col-lg-3 col-sm-4"><div class="product_widget_size"><div class="tumbnails">';    
                   		$content.='<a id="'.get_the_id().'" href="'.get_permalink().'" title="'.get_the_title().'">';
				$content.= apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' .$sale.'<sup>.'.$price2.'</sup>'. __( 'off', 'woocommerce' ) . '</span>', $product, $product );
                            	if (has_post_thumbnail( $loop->post->ID )) $content.= get_the_post_thumbnail($loop->post->ID); else $content.= '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />';

                            	$content.='</a></div><div class="details">';
                        	$content.='<a href="'.get_the_permalink().'"><h3 class="product_title">'.get_the_title().'</h3></a>';
                        	$content.='<div class="posted-by-div">'.e_shopper_posted_by().'</div>';
                                $content.='<div class="row"><div class="col-md-5 col-xs-5 add-to-cart-div" style="padding-right: 0px;">'.apply_filters( 'woocommerce_loop_add_to_cart_link',sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="add-to-cart-button %s product_type_%s">%s</a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( $product->id ),
                esc_attr( $product->get_sku() ),
                esc_attr( isset( $quantity ) ? $quantity : 1 ),
                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                esc_attr( $product->product_type ),
                esc_html( $product->add_to_cart_text() )
        ),$product ).'</div>';
				if ( in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
                      		$content.= '<div class="col-md-5 col-xs-5" style="padding-left: 0px;">'.do_shortcode('[yith_wcwl_add_to_wishlist]') .'</div>';
				}
				$post_id = get_the_id();
				$content.='<div class="col-md-2 col-xs-2" style="padding-left: 10px;"><button data-target="#collapse'.$post_id.'" class="nav-toggle"><span class="glyphicon glyphicon-chevron-down"></span></button></div></div>';
				
        			$content.= '<div class="row"><div class="col-md-12"><div id="collapse'.$post_id.'"class="collapsible" style="display:none">'.get_post($post_id)->post_excerpt;
        			$content.='</div></div></div></div></div></div>';
        		endwhile;
        	wp_reset_query();
        
		$content.='</div></div>';
		if(is_front_page())
		{
			echo $content;
		}
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Latest Products', 'e-shopper' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'e-shopper' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} 

// register Foo_Widget widget
function e_shopper_register_latest_product_widget() {
    register_widget( 'latest_product_widget' );
}
if (e_shopper_is_woocommerce_activated()) 
{
	add_action( 'widgets_init', 'e_shopper_register_latest_product_widget' );
}

//Function for displaying post time
if( !function_exists( 'e_shopper_posted_on' ) ) {

	function e_shopper_posted_on() {

		// Get value of post byline date toggle option from theme option for different pages
		if( is_single() ) {
			$show_date = ( cyberchimps_get_option( 'single_post_byline_date', 1 ) ) ? cyberchimps_get_option( 'single_post_byline_date', 1 ) : false;
		}
		elseif( is_archive() ) {
			$show_date = ( cyberchimps_get_option( 'archive_post_byline_date', 1 ) ) ? cyberchimps_get_option( 'archive_post_byline_date', 1 ) : false;
		}
		else {
			$show_date = ( cyberchimps_get_option( 'post_byline_date', 1 ) ) ? cyberchimps_get_option( 'post_byline_date', 1 ) : false;
		}

		// Get all data related to date.
		$date_url   = esc_url( get_permalink() );
		$date_title = esc_attr( get_the_time() );
		$date_time  = esc_attr( get_the_time() );
		$date_time  = esc_attr( get_the_date( 'c' ) );
		$date       = esc_html( get_the_date() );

		// Set the HTML for date link.
		$posted_on = sprintf(
						__( '%s', 'cyberchimps_core' ),
						'<a id="post-date" href="' . $date_url . '" title="' . $date_title . '" rel="bookmark">
							<time class="entry-date updated" datetime="' . $date_time . '">' . $date . '</time>
						</a>'
					);

		// If post byline date toggle is on then print HTML for date link.
		if( $show_date ) {
			apply_filters( 'e_shopper_posted_on', $posted_on );
			echo $posted_on;
		}
	}
}

//Function to display category name
if( !function_exists( 'e_shopper_posted_in' ) ) {
//add meta entry category to single post, archive and blog list if set in options
	function e_shopper_posted_in() {
		global $post;

		if( is_single() ) {
			$show = ( cyberchimps_get_option( 'single_post_byline_categories', 1 ) ) ? cyberchimps_get_option( 'single_post_byline_categories', 1 ) : false;
		}
		elseif( is_archive() ) {
			$show = ( cyberchimps_get_option( 'archive_post_byline_categories', 1 ) ) ? cyberchimps_get_option( 'archive_post_byline_categories', 1 ) : false;
		}
		else {
			$show = ( cyberchimps_get_option( 'post_byline_categories', 1 ) ) ? cyberchimps_get_option( 'post_byline_categories', 1 ) : false;
		}
		if( $show ):
			$categories_list = get_the_category_list( ' ' );
			if( $categories_list ) :
				$cats = sprintf( __( 'Categories: %s', 'cyberchimps_core' ), $categories_list );
				?>
				<span class="cat-links">
				<?php echo apply_filters( 'cyberchimps_post_categories', $cats ); ?>
			</span>
				
			<?php endif;
		endif;
	}
}

//Function to display tags
if( !function_exists( 'e_shopper_post_tags' ) ) {
//add meta entry tags to single post, archive and blog list if set in options
	function e_shopper_post_tags() {
		global $post;

		if( is_single() ) {
			$show = ( cyberchimps_get_option( 'single_post_byline_tags', 1 ) ) ? cyberchimps_get_option( 'single_post_byline_tags', 1 ) : false;
		}
		elseif( is_archive() ) {
			$show = ( cyberchimps_get_option( 'archive_post_byline_tags', 1 ) ) ? cyberchimps_get_option( 'archive_post_byline_tags', 1 ) : false;
		}
		else {

			$show = ( cyberchimps_get_option( 'post_byline_tags', 1 ) ) ? cyberchimps_get_option( 'post_byline_tags', 1 ) : false;
		}
		if( $show ):
			$tags_list = get_the_tag_list( '', ' ' );
			if( $tags_list ) :
				$tags = sprintf( __( 'Tags: %s', 'cyberchimps_core' ), $tags_list );
				?>
				<span class="taglinks">
				<?php echo apply_filters( 'cyberchimps_post_tags', $tags ); ?>
			</span>
				
			<?php endif; // End if $tags_list
		endif;
	}
}

//Function to display post format icons
function e_shopper_post_format_icon() {
	global $post;

	$format = get_post_format( $post->ID );
	if( $format == '' ) {
		$format = 'default';
	}

	if( is_single() ) {
		$show = ( cyberchimps_get_option( 'single_post_format_icons', 1 ) ) ? cyberchimps_get_option( 'single_post_format_icons', 1 ) : false;
	}
	elseif( is_archive() ) {
		$show = ( cyberchimps_get_option( 'archive_format_icons', 1 ) ) ? cyberchimps_get_option( 'archive_format_icons', 1 ) : false;
	}
	else {
		$show = ( cyberchimps_get_option( 'post_format_icons', 1 ) ) ? cyberchimps_get_option( 'post_format_icons', 1 ) : false;
	}
	if( !is_page() && $show ):

		// array of post formats and the matching font icons
		$icons = array(
			'aside' => '<span class="glyphicon glyphicon-list-alt"></span>',
			'audio' => '<span class="glyphicon glyphicon-volume-up"></span>',
			'chat' =>  '<span class="glyphicon glyphicon-comment"></span>',
			'default' => '<span class="glyphicon glyphicon-pencil"></span>',
			'gallery' => '<span class="glyphicon glyphicon-film"></span>',
			'image' => '<span class="glyphicon glyphicon-picture"></span>',
			'link' => '<span class="glyphicon glyphicon-link"></span>',
			'quote' => '<span class="glyphicon glyphicon-share"></span>',
			'status' => '<span class="glyphicon glyphicon-th"></span>',
			'video' => '<span class="glyphicon glyphicon-facetime-video"></span>'
		);
		?>

		<div class="postformats glyph-edit-div"><!--begin format icon-->
			<?php echo $icons[$format]; ?>
		</div><!--end format-icon-->
	<?php
	endif;
}
function e_shopper_posted_by() {
  // Get value of post byline author toggle option from theme option for different pages.
                if( is_single() ) {
                        $show_author = ( cyberchimps_get_option( 'single_post_byline_author', 1 ) ) ? cyberchimps_get_option( 'single_post_byline_author', 1 ) : false;
                }
                elseif( is_archive() ) {
                        $show_author = ( cyberchimps_get_option( 'archive_post_byline_author', 1 ) ) ? cyberchimps_get_option( 'archive_post_byline_author', 1 ) : false;
                }
                else {
                        $show_author = ( cyberchimps_get_option( 'post_byline_author', 1 ) ) ? cyberchimps_get_option( 'post_byline_author', 1 ) : false;
                }

                // Get url of all author archive( the page will contain all posts by the author).
                $auther_posts_url = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );

                // Set author title text which will appear on hover over the author link.
                $auther_link_title = esc_attr( sprintf( __( 'View all posts by %s', 'cyberchimps_core' ), get_the_author() ) );

                // Set the HTML for author link.
                $posted_by = sprintf(
                                                '<span class="byline"> ' . __( 'by %s', 'cyberchimps_core' ),
                                                        '<span class="author vcard">
                                                                <a class="url fn n" href="' . $auther_posts_url . '" title="' . $auther_link_title . '" rel="author">' . esc_html( get_the_author() ) . '</a>
                                                        </span>
                                                </span>'
                                        );
                // If post byline author toggle is on then print HTML for author link.
                if( $show_author ) {
                        apply_filters( 'cyberchimps_posted_by', $posted_by );
                        return $posted_by;
                }
}
// set up next and previous post links for lite themes only
function cyberchimps_next_previous_posts() {
	if( get_next_posts_link() || get_previous_posts_link() ): ?>
		<div class="more-content">
			<div class="row">
				<div class="col-md-6 previous-post">
					<?php previous_posts_link(); ?>
				</div>
				<div class="col-md-6 next-post">
					<?php next_posts_link(); ?>
				</div>
			</div>
		</div>
	<?php
	endif;
}

add_action( 'cyberchimps_after_content', 'cyberchimps_next_previous_posts' );

//remove display of mini-cart widget from backend
add_action( 'after_setup_theme', 'eshopper_unregister_widgets_init' );
function eshopper_unregister_widgets_init()
{
	if ( is_admin() && 'widgets.php' === $GLOBALS[ 'pagenow' ] ) 
	{
		add_action( 'widgets_init', 'eshopper_unregister_widgets' );
	}
}
function eshopper_unregister_widgets()
{
	unregister_widget('WC_Widget_Cart_Custom');
}