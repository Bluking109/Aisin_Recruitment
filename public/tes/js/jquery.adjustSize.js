/**
 ***********************************************
 * 
 * 指定クラスの幅・高さを統一
 * @category 	Application of AZLINK.
 * @author 		Norio Murata <nori@azlink.jp>
 * @copyright 	2010- AZLINK. <http://www.azlink.jp>
 * @final 		2017.07.30
 * 
 ***********************************************
 */
(function($) {

	var pluginName = 'adjustSize';
	var options;

	var methods = {
		init: function(params) {
			options = $.extend({
				type: 'normal',
				plus: 0
			}, params);
			
			methods.adjust.apply(this);

			return this;
		},
		adjust: function() {
			var setHeight = 0;

			this.each(function() {
				var getHeight = 0;

				switch (options.type) {
					case 'inner':
						getHeight = $(this).innerHeight();
						break;
					case 'outer':
						getHeight = $(this).outerHeight();
						break;
					default:
						getHeight = $(this).height();
				}

				setHeight = getHeight > setHeight ? getHeight : setHeight;
			});
			
			switch (options.type) {
				case 'inner':
					this.innerHeight(setHeight + options.plus);
					break;
				case 'outer':
					this.outerHeight(setHeight + options.plus);
					break;
				default:
					this.height(setHeight + options.plus);
			}

			return this;
		},
		destroy: function() {
			switch (options.type) {
				case 'inner':
					this.innerHeight(auto);
					break;
				case 'outer':
					this.outerHeight(auto);
					break;
				default:
					this.height(auto);
			}

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