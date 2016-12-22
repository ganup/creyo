<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package Flask
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses flask_header_style()
 * @uses flask_admin_header_style()
 * @uses flask_admin_header_image()
 */
function flask_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'flask_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/img/logo.png',
		'default-text-color'     => '444444',
		'height'                 => 176,
		'flex-height'            => true,
		'wp-head-callback'       => 'flask_header_style',
		'admin-head-callback'    => 'flask_admin_header_style',
		'admin-preview-callback' => 'flask_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'flask_custom_header_setup' );

if ( ! function_exists( 'flask_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see flask_custom_header_setup().
 */
function flask_header_style() {
	$header_text_color = get_header_textcolor();
	$options = get_option('flask_settings');
	
	if ( !isset( $options['title_font_family'] ) ) $options['title_font_family'] = 'Roboto:400,300,700';
	if ( !isset( $options['body_font_family'] ) ) $options['body_font_family'] = 'Gentium+Book+Basic:400,700';
	if ( !isset( $options['font_size'] ) ) $options['font_size'] = '18px';
	
	$title_font = str_replace ( '+', ' ', preg_replace('/\:.+/i', '', $options['title_font_family']) );
	$body_font = str_replace ( '+', ' ', preg_replace('/\:.+/i', '', $options['body_font_family']) );

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
/*	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}*/

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
		body, button, input, select {
			font-family: <?php echo $body_font; ?>;
			font-size: <?php echo $options['font_size'] ?>;
		}
		
		h1, h2, h3, h4, h5, h6,
		.entry-meta, .entry-footer, 
		.site-footer, .main-navigation,
		.posts-navigation, .post-navigation,
		.comment-meta, .comment .reply, .woocommerce-breadcrumb {
			font-family: <?php echo $title_font; ?>;
		}
	<?php if ( HEADER_TEXTCOLOR != $header_text_color ) :
			// Has the text been hidden?
			if ( 'blank' == $header_text_color ) :
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that
			else :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
	<?php endif; ?>
	<?php if ( ( isset( $options['sidebar_side'] ) ) && ( $options['sidebar_side'] == 'left' ) ) : ?>
		#primary {
			float: right;
			margin-right: auto;
			margin-left: 5%;
		}
		#secondary {
			float: left;
		}
	<?php endif; ?>
	<?php if ( ( isset( $options['hyphens'] ) ) && ( $options['sidebar_side'] != '1' ) ) : ?>
		.page-content,
		.entry-content,
		.entry-summary,
		.textwidget {
			-webkit-hyphens: manual;
			-moz-hyphens: manual;
			hyphens: manual;
			word-wrap: normal;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // flask_header_style


if ( ! function_exists( 'flask_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see flask_custom_header_setup().
 */
function flask_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // flask_admin_header_style

if ( ! function_exists( 'flask_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see flask_custom_header_setup().
 */
function flask_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // flask_admin_header_image