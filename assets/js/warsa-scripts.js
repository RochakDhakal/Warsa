(function ($) {
  "use strict";
  $(window).scroll(function () {
    var scrollTop = $(this).scrollTop();
    var warsaStickyMenu = $(".warsa-sticky-menu");
    var warsaStickyNavigation = $(".warsa-sticky-navigation");

    if (warsaStickyMenu.length && scrollTop > 0) {
      warsaStickyMenu.addClass("sticky-menu-enabled warsa-zoom-in-up");
    } else {
      warsaStickyMenu.removeClass("sticky-menu-enabled");
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
