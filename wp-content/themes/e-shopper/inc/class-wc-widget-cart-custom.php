<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shopping Cart Widget
 *
 * Displays shopping cart widget
 *
 * @author   WooThemes
 * @category Widgets
 * @package  WooCommerce/Widgets
 * @version  2.3.0
 * @extends  WC_Widget
 */
class WC_Widget_Cart_Custom extends WC_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
                $this->widget_cssclass    = 'woocommerce widget_shopping_cart';
                parent::__construct(
			'mini_cart_widget', // Base ID
			__( 'Mini_Cart', 'e-shopper' ), // Name
			array( 'description' => __( 'Mini Cart Widget', 'e-shopper' ), ) // Args
		);
		
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 *
	 * @return void
	 */
	public function widget( $args, $instance ) {
                //Commented below code to display minicart on cart and checkout page
		/*if ( is_cart() || is_checkout() ) {
			return;
		}*/
		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;

		$this->widget_start( $args, $instance );

		if ( $hide_if_empty ) {
			echo '<div class="hide_cart_widget_if_empty">';
		}

		// Insert cart widget placeholder - code in woocommerce.js will update this on page load
		echo '<div class="widget_shopping_cart_content"></div>';

		if ( $hide_if_empty ) {
			echo '</div>';
		}

		$this->widget_end( $args );
	}
}
