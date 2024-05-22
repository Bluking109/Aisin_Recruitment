/**
 ***********************************************
 * 
 * ポップアップを画面の中央に表示
 * (alphaBgはfixed版)
 * @category 	Application of AZLINK.
 * @author 		Norio Murata <nori@azlink.jp>
 * @copyright 	2010- AZLINK. <http://www.azlink.jp>
 * @final 		2017.01.11
 * 
 ***********************************************
 */
(function($) {
	$.fn.popupAdjust = function(config) {
		var popup = this;
		
		var defaults = {
			wrapper: '#wrapper',
			layer: 'alphaBg',
			event: 'resize scroll',
			scrollAdjust: true,
			realtimeAdjust: true
		};
		
		var options = $.extend(defaults, config);
		
		if (!$('#' + options.layer).get(0)) {
			$('<div id="' + options.layer + '"></div>').prependTo(options.wrapper);
		}
		
		$.fn.popupAdjust.adjust = function(target) {
			var windowHeight = $(window).height(),
				windowWidth = $(window).width(),
				popupHeight = $(target).outerHeight(),
				popupWidth = $(target).outerWidth(),
				topPos,
				leftPos,
				bgHeight,
				scrollTop = $(window).scrollTop(),
				scrollLeft = $(window).scrollLeft();
				
			topPos = windowHeight > popupHeight ? (windowHeight - popupHeight) / 2 : 0,
			leftPos = windowWidth > popupWidth ? (windowWidth - popupWidth) / 2 : 0;
			
			if (target) {
				$(target).css({
					// left: leftPos + scrollLeft,
					top: topPos + scrollTop
				});
			}
		};
		
		$(window).load(function() {
			$.fn.popupAdjust.adjust(popup);
			
			var resizeTimer;
			
			$(window).bind(options.event, function() {
				if (resizeTimer !== false) {
					clearTimeout(resizeTimer);
			    }
			    resizeTimer = setTimeout(function() {
			    	if (options.scrollAdjust) {
			    		if (!$(popup).is(':visible')) $.fn.popupAdjust.adjust(popup);
			    	}
			    	if (options.realtimeAdjust) {
			    		if ($(popup).is(':visible')) $.fn.popupAdjust.adjust(popup);
			    	}
			    }, 200);
			});
		});
		
		return this;
	};
	
}(jQuery));
