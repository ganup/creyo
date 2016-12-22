<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
wc_print_notices();?>
<div class="row">
		<div class="col-md-12">

			<?php do_action( 'woocommerce_before_checkout_form', $checkout );

			// If checkout registration is disabled and not logged in, the user cannot checkout
			if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
				echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
				return;
			}?>
		</div>
</div>
<div class="row">
	<?php
	// filter hook for include new pages inside the payment method
	$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">
	
	<div class="col-md-12">
		<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div class="col2-set row" id="customer_details">
				<div class="col-md-6 billing">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
				</div>

				<div class="col-md-6 shipping">
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>
			</div>

		        <div class="row">
			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
		        </div>
		        <div class="row" >
				<div class="col-md-12">
					<h3 id="order_review_heading"><?php _e( 'Your Order', 'woocommerce' ); ?></h3>
					<?php endif; ?>

					<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

					<div id="order_review" class="woocommerce-checkout-review-order">
					<?php 	add_action( 'woocommerce_checkout_order_review_custom', 'woocommerce_order_review', 10 );
						add_action( 'woocommerce_checkout_payment_custom', 'woocommerce_checkout_payment', 20 );?>
						<div class="accordion_vertical">
							<div class="table-responsive">
								<?php do_action( 'woocommerce_checkout_order_review_custom' ); ?>
							</div>
						</div>
					<?php do_action( 'woocommerce_checkout_payment_custom' );?>
					</div>
				</div>
	       		</div>
		<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	</div>
	</form>
	
</div>
	
<div class="row">
          <div class="col-md-12">
		<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
           </div>
</div>
