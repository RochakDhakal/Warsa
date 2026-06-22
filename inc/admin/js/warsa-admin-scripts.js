(function ($) {
  "use strict";
  $("#warsa-dismiss-notice").on("click", ".notice-dismiss", function () {
    $.ajax({
      url: strativo_admin_localize.ajax_url,
      method: "POST",
      data: {
        action: "strativo_dismissble_notice",
        nonce: strativo_admin_localize.nonce,
      },
      success: function (response) {
        if (response.success) {
          $("#warsa-dismiss-notice").fadeOut(); // Hide the notice
        } else {
          console.log("Failed to dismiss notice:", response.data.message);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error:", textStatus, errorThrown);
      },
    });
  });

  // Dashboard
  const $strativoDashboard = $(".dashboard-about-warsa");
  const $strativoTabs = $strativoDashboard.find(".warsa-tabs-item");
  const $strativoContents = $strativoDashboard.find(".warsa-content-item");

  function strativoChangeTab(index) {
    $strativoTabs.removeClass("active");
    $strativoContents.removeClass("active");

    // Add active class to the selected tab and content
    $strativoTabs.eq(index).addClass("active");
    $strativoContents.eq(index).addClass("active");
  }

  const strativoGetSessionTab = sessionStorage.getItem("strativoActivePage");
  if (parseInt(strativoGetSessionTab)) {
    strativoChangeTab(strativoGetSessionTab);
  } else {
    strativoChangeTab(0);
  }

  $strativoTabs.click(function () {
    const strativoIndex = $(this).data("index");
    sessionStorage.setItem("strativoActivePage", strativoIndex);
    strativoChangeTab(strativoIndex);
  });

  // Recommended Plugins Page
  // Activate plugin
  $strativoDashboard.find(".plugin-button.plugin-activate").click(function (e) {
    e.preventDefault();

    const strativoPluginSlug = $(this).data("slug");
    const strativoPluginFilename = $(this).data("filename");
    const strativoPluginName = $(this).data("name");

    $(this).addClass("processing-spinner");

    $.ajax({
      url: strativo_admin_localize.ajax_url,
      type: "POST",
      data: {
        action: "strativo_rplugin_activation",
        nonce: strativo_admin_localize.nonce,
        pluginSlug: strativoPluginSlug,
        pluginFilename: strativoPluginFilename,
        pluginName: strativoPluginName,
      },
      success: function (response) {
        var strativoCheckJSON = /{.*}/;
        var strativoMatch = strativoCheckJSON.exec(response);

        if (strativoMatch) {
          var strativoJsonResponse = strativoMatch[0];
          try {
            var strativoResponseObj = JSON.parse(strativoJsonResponse);

            if (strativoResponseObj.success) {
              window.location.href = window.location.href;
            } else {
              console.log("Error!");
            }
          } catch (error) {
            console.log("Error parsing JSON!");
            window.location.href = window.location.href;
          }
        } else {
          if (response.success) {
            window.location.href = window.location.href;
          }
        }

        $(this).removeClass("processing-spinner");
      },
      error: function (xhr, status, error) {
        $("#response-container").text("An error occurred.");
        $(this).removeClass("processing-spinner");

        console.log(xhr.responseText);
      },
    });
  });

  $("#warsa-recommend-plugins__installer, #install-activate-button").click(
    function (e) {
      e.preventDefault();
      const strativoButton = $(this);
      strativoButton.attr("disabled", "disabled");
      strativoButton
        .text("Installing & Activating required plugins")
        .addClass("processing-spinner");

      var strativoActivationData = {
        action: "strativo_install_and_activate_plugins",
        nonce: strativo_admin_localize.welcomeNonce,
      };

      $.post(
        strativo_admin_localize.ajax_url,
        strativoActivationData,
        function (response) {
          var strativoCheckJSON = /{.*}/;
          var strativoMatch = strativoCheckJSON.exec(response);

          if (strativoMatch) {
            var strativoJsonResponse = strativoMatch[0];
            try {
              var strativoResponseObj = JSON.parse(strativoJsonResponse);

              if (strativoResponseObj.success === true) {
                window.location.href = strativo_admin_localize.redirect_url;
              } else {
                console.log("Error!");
              }
            } catch (error) {
              console.log("Error parsing JSON!");
            }
          } else {
            if (response.success === true) {
              window.location.href = strativo_admin_localize.redirect_url;
            } else {
              strativoButton.text(response.data.message);
            }
          }
        },
      );
    },
  );

  $strativoDashboard
    .find(".licence-activator.account-unavailable")
    .click(function (e) {
      e.preventDefault();

      window.location.href = strativo_admin_localize.scrollURL;
    });

  // Demos Page
  const strativoDemoRedirection = $strativoDashboard.find(
    ".demo-importer__redirection",
  );

  strativoDemoRedirection.click(function (e) {
    e.preventDefault();

    if ($(this).hasClass("plugins-unavailable")) {
      strativoDemoRedirection.attr("disabled", "disabled");
      strativoDemoRedirection
        .text("Installing & Activating required plugins")
        .addClass("processing-spinner");

      var strativoActivationData = {
        action: "strativo_install_and_activate_plugins",
        nonce: strativo_admin_localize.welcomeNonce,
      };

      $.post(
        strativo_admin_localize.ajax_url,
        strativoActivationData,
        function (response) {
          var strativoCheckJSON = /{.*}/;
          var strativoMatch = strativoCheckJSON.exec(response);

          if (strativoMatch) {
            var strativoJsonResponse = strativoMatch[0];
            try {
              var strativoResponseObj = JSON.parse(strativoJsonResponse);

              if (strativoResponseObj.success === true) {
                window.location.href = strativo_admin_localize.demoURL;
              } else {
                console.log("Error!");
              }
            } catch (error) {
              console.log("Error parsing JSON!");
            }
          } else {
            if (response.success === true) {
              window.location.href = strativo_admin_localize.demoURL;
            } else {
              strativoDemoRedirection.text(response.data.message);
            }
          }
        },
      );
    } else {
      window.location.href = strativo_admin_localize.demoURL;
    }
  });

  $(document).ready(function () {
    var strativoUrlParams = new URLSearchParams(window.location.search);

    if (strativoUrlParams.get("cozy-addons-scroll") === "true") {
      $("html, body").animate(
        {
          scrollTop:
            $(`.active[data-slug="cozy-addons"]`).offset().top -
            $(window).height() / 2 +
            $(`.active[data-slug="cozy-addons"]`).outerHeight() / 2,
        },
        1000,
      );

      $(`.active[data-slug="cozy-addons"] .activate-license a`).addClass(
        "warsa-highlighted",
      );

      setTimeout(() => {
        $(`.active[data-slug="cozy-addons"] .activate-license a`).removeClass(
          "warsa-highlighted",
        );
      }, 3000);
    }
  });
})(jQuery);