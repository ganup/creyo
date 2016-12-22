<?php
/**
 * Cart Page
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

if ( ! function_exists( 'woocommerce_button_proceed_to_checkout_custom' ) ) {

	/**
	 * Output the proceed to checkout button.
	 *
	 * @subpackage	Cart
	 */
	function woocommerce_button_proceed_to_checkout_custom() {
		$checkout_url = WC()->cart->get_checkout_url();

		?>
		<a href="<?php echo $checkout_url; ?>" class="checkout-button custom-button alt wc-forward"><?php _e( 'Proceed to Checkout', 'woocommerce' ); ?></a>
		<?php
	}
}

add_action( 'woocommerce_proceed_to_checkout_custom', 'woocommerce_button_proceed_to_checkout_custom', 20 );

add_action( 'woocommerce_cross_sell_display_custom', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_cart_collaterals_totals', 'woocommerce_cart_totals', 10 );

do_action( 'woocommerce_before_cart' ); ?>

<div class="row">
<div class="col-lg-12 col-xs-12">

<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<div class="table-responsive">
<table class="shop_table cart table" cellspacing="0">
	<thead>
		<tr>
			<th class="product-remove">&nbsp;</th>
			<th class="product-thumbnail">&nbsp;</th>
			<th class="product-name"><?php _e( 'Product Name', 'woocommerce' ); ?></th>
			<th class="product-price"><?php _e( 'Unit Cost', 'woocommerce' ); ?></th>
			<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
			<th class="product-subtotal"><?php _e( 'Price', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

					<td class="product-remove">
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
								esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
								__( 'Remove this item', 'woocommerce' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
						?>
					</td>

					<td class="product-thumbnail">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $_product->is_visible() ) {
								echo $thumbnail;
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
							}
						?>
					</td>

					<td class="product-name">
						<?php
							if ( ! $_product->is_visible() ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s </a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
							}

							// Meta data
							echo WC()->cart->get_item_data( $cart_item );

							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
							}
						?>
					</td>

					<td class="product-price">
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
					</td>

					<td class="product-quantity">
						<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									'min_value'   => '0',
									'item_key' => "{$cart_item_key}",
								), $_product, false );
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
						?>
					</td>

					<td class="product-subtotal">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
					</td>
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
		<tr class="shop_buttons hidden-md hidden-sm hidden-xs" >
			<td colspan="6" class="actions">

				<?php if ( WC()->cart->coupons_enabled() ) { ?>
					<div class="coupon">

						<label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'woocommerce' ); ?>" />

						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</div>
				<?php } ?>

				<input type="submit" class="button update-cart" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>" />
				<?php do_action( 'woocommerce_proceed_to_checkout_custom' ); ?>
				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
			</td>
		</tr>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>
</div><!--end of table -responsive-->

<div class="row cart-buttons hidden-lg">
	<?php if ( WC()->cart->coupons_enabled() ) { ?>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php _e( '', 'woocommerce' ); ?>" /> 
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="submit" class="button apply-coupon" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />
		</div>
	<?php do_action( 'woocommerce_cart_coupon' ); ?>
	<?php } ?>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<input type="submit" class="button update-cart" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" />
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<?php do_action( 'woocommerce_proceed_to_checkout_custom' ); ?>
		</div>
		<?php do_action( 'woocommerce_cart_actions' ); ?>

		<?php wp_nonce_field( 'woocommerce-cart' ); ?>
					
</div>

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>
</div><!--div class=col-lg-12-->
 
</div><!--end of div class=row-->
<div class="row">
	<div class="col-lg-6 col-xs-12">
	</div>
<div class="col-lg-6 col-xs-12">
		<div class="cart-collaterals">
			<?php do_action('woocommerce_cart_collaterals_totals'); ?>
		</div> 
	</div>
</div>

<div class="row">
	
		<?php do_action('woocommerce_cross_sell_display_custom');?>


</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
