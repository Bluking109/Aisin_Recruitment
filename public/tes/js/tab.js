/**
 * ================================================
 *
 * [タブ切り替え]
 *
 * ================================================
 */

(function($) {
	$(function() {
		//初期値
		$(window).load(function() {
			$(".tabs li:first-child").trigger("click");
		});
		
		$('.tabs li').on('click', function() {
			var num = $(".tabs li").index(this);
			
			$(".tabContents").hide();
			$(".tabContents").eq(num).fadeIn(1000);
			
			$(this).parent().children(".tabs li").removeClass("active");
			$(this).addClass("active");
		});
	});
}(jQuery));
