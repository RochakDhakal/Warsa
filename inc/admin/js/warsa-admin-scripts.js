(function ($) {
  "use strict";
  $("#warsa-dismiss-notice").on("click", ".notice-dismiss", function () {
    $.ajax({
      url: warsa_admin_localize.ajax_url,
      method: "POST",
      data: {
        action: "warsa_dismissble_notice",
        nonce: warsa_admin_localize.nonce,
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
  const $warsaDashboard = $(".dashboard-about-warsa");
  const $warsaTabs = $warsaDashboard.find(".warsa-tabs-item");
  const $warsaContents = $warsaDashboard.find(".warsa-content-item");

  function warsaChangeTab(index) {
    $warsaTabs.removeClass("active");
    $warsaContents.removeClass("active");

    // Add active class to the selected tab and content
    $warsaTabs.eq(index).addClass("active");
    $warsaContents.eq(index).addClass("active");
  }

  const warsaGetSessionTab = sessionStorage.getItem("warsaActivePage");
  if (parseInt(warsaGetSessionTab)) {
    warsaChangeTab(warsaGetSessionTab);
  } else {
    warsaChangeTab(0);
  }

  $warsaTabs.click(function () {
    const warsaIndex = $(this).data("index");
    sessionStorage.setItem("warsaActivePage", warsaIndex);
    warsaChangeTab(warsaIndex);
  });

  // Recommended Plugins Page
  // Activate plugin
  $warsaDashboard.find(".plugin-button.plugin-activate").click(function (e) {
    e.preventDefault();

    const warsaPluginSlug = $(this).data("slug");
    const warsaPluginFilename = $(this).data("filename");
    const warsaPluginName = $(this).data("name");

    $(this).addClass("processing-spinner");

    $.ajax({
      url: warsa_admin_localize.ajax_url,
      type: "POST",
      data: {
        action: "warsa_rplugin_activation",
        nonce: warsa_admin_localize.nonce,
        pluginSlug: warsaPluginSlug,
        pluginFilename: warsaPluginFilename,
        pluginName: warsaPluginName,
      },
      success: function (response) {
        var warsaCheckJSON = /{.*}/;
        var warsaMatch = warsaCheckJSON.exec(response);

        if (warsaMatch) {
          var warsaJsonResponse = warsaMatch[0];
          try {
            var warsaResponseObj = JSON.parse(warsaJsonResponse);

            if (warsaResponseObj.success) {
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
      const warsaButton = $(this);
      warsaButton.attr("disabled", "disabled");
      warsaButton
        .text("Installing & Activating required plugins")
        .addClass("processing-spinner");

      var warsaActivationData = {
        action: "warsa_install_and_activate_plugins",
        nonce: warsa_admin_localize.welcomeNonce,
      };

      $.post(
        warsa_admin_localize.ajax_url,
        warsaActivationData,
        function (response) {
          var warsaCheckJSON = /{.*}/;
          var warsaMatch = warsaCheckJSON.exec(response);

          if (warsaMatch) {
            var warsaJsonResponse = warsaMatch[0];
            try {
              var warsaResponseObj = JSON.parse(warsaJsonResponse);

              if (warsaResponseObj.success === true) {
                window.location.href = warsa_admin_localize.redirect_url;
              } else {
                console.log("Error!");
              }
            } catch (error) {
              console.log("Error parsing JSON!");
            }
          } else {
            if (response.success === true) {
              window.location.href = warsa_admin_localize.redirect_url;
            } else {
              warsaButton.text(response.data.message);
            }
          }
        },
      );
    },
  );

  $warsaDashboard
    .find(".licence-activator.account-unavailable")
    .click(function (e) {
      e.preventDefault();

      window.location.href = warsa_admin_localize.scrollURL;
    });

  // Demos Page
  const warsaDemoRedirection = $warsaDashboard.find(
    ".demo-importer__redirection",
  );

  warsaDemoRedirection.click(function (e) {
    e.preventDefault();

    if ($(this).hasClass("plugins-unavailable")) {
      warsaDemoRedirection.attr("disabled", "disabled");
      warsaDemoRedirection
        .text("Installing & Activating required plugins")
        .addClass("processing-spinner");

      var warsaActivationData = {
        action: "warsa_install_and_activate_plugins",
        nonce: warsa_admin_localize.welcomeNonce,
      };

      $.post(
        warsa_admin_localize.ajax_url,
        warsaActivationData,
        function (response) {
          var warsaCheckJSON = /{.*}/;
          var warsaMatch = warsaCheckJSON.exec(response);

          if (warsaMatch) {
            var warsaJsonResponse = warsaMatch[0];
            try {
              var warsaResponseObj = JSON.parse(warsaJsonResponse);

              if (warsaResponseObj.success === true) {
                window.location.href = warsa_admin_localize.demoURL;
              } else {
                console.log("Error!");
              }
            } catch (error) {
              console.log("Error parsing JSON!");
            }
          } else {
            if (response.success === true) {
              window.location.href = warsa_admin_localize.demoURL;
            } else {
              warsaDemoRedirection.text(response.data.message);
            }
          }
        },
      );
    } else {
      window.location.href = warsa_admin_localize.demoURL;
    }
  });

  $(document).ready(function () {
    var warsaUrlParams = new URLSearchParams(window.location.search);

    if (warsaUrlParams.get("cozy-addons-scroll") === "true") {
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