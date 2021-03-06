<?php
/**
 * Title: Boxes Lite Element
 *
 * Description: Displays three boxes having optional custom links
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// Don't load directly
if( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Boxes Lite element action
add_action( 'boxes_lite', 'cyberchimps_boxes_lite_content' );

// Defining content of the boxes-lite element
function cyberchimps_boxes_lite_content() {

	// Set directory uri
	$directory_uri = get_template_directory_uri();
	
	// Getting Image URL for each box
	$img1 = cyberchimps_get_option( 'cyberchimps_blog_boxes_lite_image_one', $directory_uri . apply_filters( 'cyberchimps_boxes_lite_img1', '/elements/lib/images/boxes/slidericon.png' ) );
	$img2 = cyberchimps_get_option( 'cyberchimps_blog_boxes_lite_image_two', $directory_uri . apply_filters( 'cyberchimps_boxes_lite_img2', '/elements/lib/images/boxes/blueprint.png' ) );
	$img3 = cyberchimps_get_option( 'cyberchimps_blog_boxes_lite_image_three', $directory_uri . apply_filters( 'cyberchimps_boxes_lite_img3', '/elements/lib/images/boxes/docs.png' ) );

	// Getting URL of custom link
	$url1 = cyberchimps_get_option( 'cyberchimps_blog_boxes_link_url_one' );
	$url2 = cyberchimps_get_option( 'cyberchimps_blog_boxes_link_url_two' );
	$url3 = cyberchimps_get_option( 'cyberchimps_blog_boxes_link_url_three' );

	$box_default_text = 'Alto ventos est coeptis utque fecit. Phoebe sine circumfuso arce. Tanto aliis. Matutinis cornua origo formaeque animal mundo. Chaos: fabricator. Natura mundo caesa addidit.
        Cuncta habendum meis omni ille formaeque emicuit septemque et. Lege fecit aethere porrexerat gentes horrifer formas.';
	
	// Getting text for each box
	$text1 = cyberchimps_get_option( 'cyberchimps_blog_boxes_lite_image_one_text', $box_default_text );
	$text2 = cyberchimps_get_option( 'cyberchimps_blog_boxes_lite_image_two_text', $box_default_text );
	$text3 = cyberchimps_get_option( 'cyberchimps_blog_boxes_lite_image_three_text', $box_default_text );

	?>

	<!-- Start of markup for boxes lite element -->
	<div id="widget_boxes_container" class="row">
		<div class="boxes">
			<div class="box col-md-4">
				<?php if( $url1 != '' && $img1 != '' ): ?>
					<a href="<?php echo esc_url( $url1 ); ?>" class="box-link">
						<img class="box-image" src="<?php echo esc_url( $img1 ); ?>"/>
					</a>
				<?php else: ?>
					<?php if( $img1 != '' ): ?>
						<a class="box-no-url">
							<img class="box-image" src="<?php echo esc_url( $img1 ); ?>"/>
						</a>
					<?php endif; ?>
				<?php endif; ?>
				<p><?php echo wp_kses( $text1, array( 'br' => array(), 'em' => array(), 'strong' => array() ) ); ?></p>
			</div>
			<!--end box1-->

			<div class="box col-md-4">
				<?php if( $url2 != '' && $img2 != '' ): ?>
					<a href="<?php echo esc_url( $url2 ); ?>" class="box-link">
						<img class="box-image" src="<?php echo esc_url( $img2 ); ?>"/>
					</a>
				<?php else: ?>
					<?php if( $img2 != '' ): ?>
						<a class="box-no-url">
							<img class="box-image" src="<?php echo esc_url( $img2 ); ?>"/>
						</a>
					<?php endif; ?>
				<?php endif; ?>
				<p><?php echo wp_kses( $text2, array( 'br' => array(), 'em' => array(), 'strong' => array() ) ); ?></p>
			</div>
			<!--end box2-->

			<div class="box col-md-4">
				<?php if( $url3 != '' && $img3 != '' ): ?>
					<a href="<?php echo esc_url( $url3 ); ?>" class="box-link">
						<img class="box-image" src="<?php echo esc_url( $img3 ); ?>"/>
					</a>
				<?php else: ?>
					<?php if( $img3 != '' ): ?>
						<a class="box-no-url">
							<img class="box-image" src="<?php echo esc_url( $img3 ); ?>"/>
						</a>
					<?php endif; ?>
				<?php endif; ?>
				<p><?php echo wp_kses( $text3, array( 'br' => array(), 'em' => array(), 'strong' => array() ) ); ?></p>
			</div>
			<!--end box3-->
		</div>
		<!-- end boxes -->
	</div><!-- end row -->
	<!-- End of markup for boxes lite element -->
<?php
}

?>