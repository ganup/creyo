jQuery( function( $ ) {
	
         $('.input-radio').change(
          function(){
            if ($(this).is(':checked') && $(this).val() == 'Yes') {
            $('.payment-information').show();
           }
            else
             $('.payment-information').hide();
         });


        $('#ship-to-different-address-checkbox').change(function(){
                 if(this.checked){
                 $( 'div.shipping_address_heading' ).show();
                 $( 'div.shipping_address' ).slideDown();
                 $('label.checkbox-label').css('font-weight','normal');
	         }
        else{
                $( 'div.shipping_address_heading' ).hide();
	    	$( 'div.shipping_address' ).hide();
                $('label.checkbox-label').css('font-weight','700');}
         });
                    
});
