/**
 * ================================================
 *
 * [rd]
 *
 * ================================================
 */
var isPopup     = false,
  isOpen      = false,
  isAllowClose  = false;

$.params = {
  ua:       '', // UA
  isIE:       false, // IE判定
  isIE6:      false, // IE6判定
  isIE7:      false, // IE7判定
  isIE8:      false, // IE8判定
  isIE9:      false, // IE9判定
  isIE10:     false, // IE10判定
  isIE11:     false, // IE11判定
};

(function($) {
  $(function() {
    isPopup = $('body').hasClass('isPopup') ? true : false;
    /**
     ********************************************
     * load event
     ******************************************** 
     */
    $(window).on('load', function() {
      functions.init();
      functions.setWb();

      if ($.params.isIE8 && $('body').hasClass('about')) {
        $('.groupBlock .inner').each(function() {
          $(this).addClass('ie8');
        });
        $('.groupBlock .inner').mouseover(function() {
          $(this).addClass('active');
        });
        $('.groupBlock .inner').mouseout(function() {
          $(this).removeClass('active');
        });
      }
    });
    /**
     ********************************************
     * click event
     ******************************************** 
     */
    $('.popupBtItem').on('click', function() {
      var video = $(this).attr('data-video'),
        id = $(this).attr('data-popup'),
        title =  $(this).attr('data-title');

      if (title && !$('#' + id + ' .titleVox').get(0)) $('#' + id + ' .content').append('<div class="titleVox" />');
      if (video && !$('#' + id + ' .movieVox').get(0)) $('#' + id + ' .content').append('<div class="movieVox" />');

      $('#' + id + ' .titleVox').text(title);
      $('#' + id + ' .movieVox').html('<iframe src="//www.youtube.com/embed/' + video + '?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>');
    });
    
    //アコーディオンメニュー
    $('.accordionWrapper .accordionTtl').on('click', function() {
      if ($(this).parent().hasClass('open')) {
        $(this).nextAll('.accordionInner').slideUp();
        $(this).parent().removeClass('open');
      } else {
        $(this).nextAll('.accordionInner').slideDown();
        $(this).parent().addClass('open');
      }
    });
  });
}(jQuery));

var functions = {
  init: function() {
    setTimeout(function() {
      if (isPopup) $(window).popupAdjust({
        wrapper: 'body'
      });
      functions.adjust();
    }, 500);
  },
  adjust: function() {

  },
  /**
   * ブラウザ判定 
   */
  setWb: function() {
    $.params.ua = navigator.userAgent;
    
    $.params.isIE   = $.params.ua.match(/msie/i),
    $.params.isIE6  = $.params.ua.match(/msie [6.]/i),
    $.params.isIE7  = $.params.ua.match(/msie [7.]/i),
    $.params.isIE8  = $.params.ua.match(/msie [8.]/i),
    $.params.isIE9  = $.params.ua.match(/msie [9.]/i),
    $.params.isIE10 = $.params.ua.match(/msie [10.]/i),
    $.params.isIE11 = $.params.ua.match(/msie [11.]/i);
  }
}