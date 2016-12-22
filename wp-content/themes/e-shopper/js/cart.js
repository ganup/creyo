jQuery( function( $ ) {
	
	// wc_cart_params is required to continue, ensure the object exists
	if ( typeof wc_cart_params === 'undefined' ) {
		return false;
	}

	// Shipping calculator
	$( document ).on( 'change', 'select.shipping_method, input[name^=shipping_method]', function() {
		
		var shipping_methods = [];

		$( 'select.shipping_method, input[name^=shipping_method][type=radio]:checked, input[name^=shipping_method][type=hidden]' ).each( function( index, input ) {
			shipping_methods[ $( this ).data( 'index' ) ] = $( this ).val();
		} );

		$( 'div.cart_totals' ).block({
			message: null,
			overlayCSS: {
				background: '#fff',
				opacity: 0.6
			}
		});

		var data = {
			action: 'woocommerce_update_shipping_method',
			security: wc_cart_params.update_shipping_method_nonce,
			shipping_method: shipping_methods
		};

		$.post( wc_cart_params.ajax_url, data, function( response ) {

                        $( 'div.shipping-calculator' ).remove();
			$( 'div.cart_totals' ).replaceWith( response );
			$( 'body' ).trigger( 'updated_shipping_method' );

		});


	});

	

});

$(document).ready(function() {
		  $('.nav-toggle').click(function(){
			//get collapse content selector
			var collapse_content_selector = $(this).attr('data-target');					
 
			//make the collapse content to be shown or hide
			var toggle_switch = $(this);
			$(collapse_content_selector).toggle(function(){
			  if($(this).css('display')=='none'){
                                //change the button label to be 'Show'
				toggle_switch.html('<span class="glyphicon glyphicon-chevron-down">');
			  }else{
                                //change the button label to be 'Hide'
				toggle_switch.html('<span class="glyphicon glyphicon-chevron-up">');
			  }
			});
		  });
 
		});
