/**
 ***********************************************
 * 
 * ポップアップを画面の中央に表示
 * (alphaBgはfixed版)
 * @category 	Application of AZLINK.
 * @author 		Norio Murata <nori@azlink.jp>
 * @copyright 	2010- AZLINK. <http://www.azlink.jp>
 * @final 		2017.08.01
 * 
 ***********************************************
 */
(function($) {

	var pluginName = 'popupAdjust';
	var options;
	var $jq;

	var isOpen = false,
			isAllowClose = false;

	var methods = {
		init: function(params) {
			$jq = this;

			options = $.extend({
				wrapper: '#wrapper',
				realtimeAdjust: true
			}, params);

			if (!$('#alphaBg').get(0)) {
				$('<div id="alphaBg" />').prependTo(options.wrapper);
			}

			var popupIDs = new Array;

			$('.popupBtItem:not(.exclude)').each(function() {
				var popupID = $(this).attr('data-popup');

				if ($.inArray(popupID, popupIDs) === -1) {
					popupIDs.push(popupID);
				}
			});

			var popupSrc = '<div class="popupWrapper vertical s1-6r"><div class="closeVox"><a href="javascript:void(0)" class="popupCloseBt"><span><!-- --></span><span><!-- --></span></a></div><div class="contentWrapper"><div class="content"><!-- --></div></div></div><!-- /popupWrapper01 -->';

			$('#popupContents .content').each(function(i) {
				var src = $(this).html(),
					group = $(this).attr('data-group');

				$(popupSrc).appendTo(options.wrapper).attr('id', popupIDs[i]).addClass(group);
				$('#' + popupIDs[i]).find('.content').html(src);

				$(this).remove();
			});

			$(document).on('click touchstart', '.popupCloseBt, #alphaBg, .popupBtItemClose', function() {
				if ($('.popupWrapper, #alphaBg').hasClass('.velocity-animating') || !isAllowClose) return;
				$('body').removeClass('open');
				methods.close();
			});

			$(document).on('keydown', function(e) {
				if (isOpen && e.keyCode === 27) {
					if ($('.popupWrapper, #alphaBg').hasClass('.velocity-animating') || !isAllowClose) return;
					$('body').removeClass('open');
					methods.close();
					return false;
				}
			});

			$(document).on('click', '.popupBtItem', function() {
				if ($('.popupWrapper, #alphaBg').hasClass('.velocity-animating')) return;

				var id = $(this).attr('data-popup');

				$('#' + id).css('opacity', 0).show();
				$('#' + id).hide().css('opacity', 1);

				$('body').addClass('open');

				methods.change('#' + id);
			});

			return this;
		},
		change: function(id) {
			if (!isOpen) {
				isOpen = true;

				methods.adjust(id);

				$('#alphaBg').show().velocity('stop').velocity({
					opacity: 0.8
				}, 200, function() {
					if ($.params.isIE6 || $.params.isIE7 || $.params.isIE8) {
						$(id).show();
					} else {
						$(id).fadeIn(200);
					}
					isAllowClose = true;
				});
			}

			return this;
		},
		close: function() {
			if ($.params.isIE6 || $.params.isIE7 || $.params.isIE8) {
				$('.popupWrapper').hide();
				$('#alphaBg').velocity('stop').velocity({
					opacity: 0
				}, 200, function() {
					$(this).hide();
					isOpen = false;
				});
			} else {
				$('.popupWrapper').velocity('fadeOut', 200, function() {
					$('#alphaBg').velocity('stop').velocity({
						opacity: 0
					}, 200, function() {
						$(this).hide();
						isOpen = false;
					});
				});
			}
			$('#popupWrapperMovie .content').empty();

			return this;
		},
		adjust: function(target) {
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
					top: topPos + scrollTop
				});
			}

			return this;
		},
		destroy: function() {


			return this;
		}
	};
	
	$.fn[pluginName] = function(method) {
		if ( methods[method] ) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || ! method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Method ' + method + ' does not exist on jQuery.' + pluginName);
			return this;
		}
	};
	
}(jQuery));