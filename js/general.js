window.addEventListener('load', updateViewport, false);
window.addEventListener('orientationchange', updateViewport, false);


function updateViewport() {
	$("meta[name=viewport]").attr('content', 'width=device-width,user-scalable=yes,initial-scale=1,minimum-scale=1,maximum-scale=1');
	var width = $.viewportW();
	var scale = Math.round( ( width / 640 ) * 100 ) / 100;

	if( width > 640 ) {
		$("meta[name=viewport]").attr('content', 'width=device-width,user-scalable=yes,initial-scale=1,minimum-scale=1,maximum-scale=1');
	} else {
		$("meta[name=viewport]").attr('content', 'width=640,user-scalable=yes,initial-scale='+scale+',minimum-scale='+scale+',maximum-scale='+scale);
	}
}
$(document).ready(function()
	{   
		$(document).on("click","#nav_btn",function()
			{
				var $top_menu = $(".header_menu");
				if( $top_menu.hasClass("active") )
				{
					$top_menu.slideUp();
					$top_menu.removeClass("active");
				}
				else
				{
					$top_menu.addClass("active");
					$top_menu.slideDown();
				}
			}
		);
		$(document).on("click", "#left_menu_btn a", function()
			{
				var $sl_left_menu = $(".sd_level_left_menu");
				if( $sl_left_menu.hasClass("active") )
				{
					$sl_left_menu.slideUp(1000);
					$sl_left_menu.removeClass("active");
				}
				else
				{
					$sl_left_menu.addClass("active");
					$sl_left_menu.slideDown(1000);
				}
			}
		);
	}
);