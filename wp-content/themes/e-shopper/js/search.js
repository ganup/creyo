jQuery(document).ready(function(){
   if ( $('.dropdown_product_cat').length ) {
	$width = $(window).width();
	if( $width > 768) {
		//alert ("window"+ $(window).width());
    		$("#searchform input").css("width", "50%");
   	 	$( '.dropdown_product_cat' ).addClass( "form-control" ); 
        }
         else {
		$("#searchform input").css("width", "40%");
    		$( '.dropdown_product_cat' ).addClass( "form-control" ); }
         }
   else{
      $(".input-group .form-control").css("width", "77%"); 
      $(".input-group .form-control").css("border-radius", "3px"); 
      $( '.dropdown_product_cat' ).addClass( "form-control" );
   }
});
