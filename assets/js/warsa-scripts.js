(function ($) {
  "use strict";
  $(window).scroll(function () {
    var scrollTop = $(this).scrollTop();
    var strativoStickyMenu = $(".warsa-sticky-menu");
    var strativoStickyNavigation = $(".warsa-sticky-navigation");

    if (strativoStickyMenu.length && scrollTop > 0) {
      strativoStickyMenu.addClass("sticky-menu-enabled warsa-zoom-in-up");
    } else {
      strativoStickyMenu.removeClass("sticky-menu-enabled");
    }
  });

  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery(".warsa-scrollto-top a").addClass("show");
    } else {
      jQuery(".warsa-scrollto-top a").removeClass("show");
    }
  });
  jQuery(".warsa-scrollto-top a").click(function () {
    jQuery("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });
})(jQuery);
