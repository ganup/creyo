(function($) {
$(window).load(function() {   
	
	if($("body").hasClass("archive"))
	{
		$("#sidebar").addClass("hidden-xs");
	}
	
	if($("body").hasClass("archive"))
	{
		$("#content").addClass("col-sm-9");
		$("#secondary").addClass("col-sm-3");
	}
	
	$("div#footer-widget-container aside ul.product_list_widget li").addClass("col-sm-6 col-md-12 col-lg-12");
	$("div#horizontal-widget-container aside ul.product_list_widget li").addClass("col-sm-4 col-md-3 col-lg-3");

	if($("div#content").hasClass("col-md-9"))
	{
		$("div.related .products > div").removeClass("col-lg-3");
		$("div.related .products > div").addClass("col-lg-4");
	}
	if($("div#content").hasClass("col-md-9"))
	{
		$("div.upsells .products > div").removeClass("col-lg-3");
		$("div.upsells .products > div").addClass("col-lg-4");
	}
	if($("div#content").hasClass("col-md-9"))
	{
		$("div.cross-sells > div > div").removeClass("col-lg-12");
		$("div.cross-sells > div > div").addClass("col-md-9 col-lg-9");		
		$("div.cross-sells .products > div").removeClass("col-lg-3");
		$("div.cross-sells .products > div").addClass("col-lg-4");
	}
});
})(jQuery);


