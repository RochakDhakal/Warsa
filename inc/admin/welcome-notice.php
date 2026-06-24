<?php

/**
 * file for holding dashboard welcome page for theme
 */
if (! function_exists('warsa_is_plugin_installed')) {
	function warsa_is_plugin_installed($plugin_slug)
	{
		$plugin_path = WP_PLUGIN_DIR . '/' . $plugin_slug;
		return file_exists($plugin_path);
	}
}
if (! function_exists('warsa_is_plugin_activated')) {
	function warsa_is_plugin_activated($plugin_slug)
	{
		return is_plugin_active($plugin_slug);
	}
}
if (! function_exists('warsa_welcome_notice')) :
	function warsa_welcome_notice()
	{
		if (get_option('warsa_dismissed_custom_notice')) {
			return;
		}
		global $pagenow;
		$current_screen = get_current_screen();

		if (is_admin()) {
			if ($current_screen->id !== 'dashboard' && $current_screen->id !== 'themes') {
				return;
			}
			if (is_network_admin()) {
				return;
			}
			if (! current_user_can('manage_options')) {
				return;
			}
			$theme = wp_get_theme();

			if (is_child_theme()) {
				$theme = wp_get_theme()->parent();
			}
			$warsa_version = $theme->get('Version');

?>
			<div class="warsa-admin-notice notice notice-info is-dismissible content-install-plugin theme-info-notice" id="warsa-dismiss-notice">
				<div class="info-content">
					<div class="notice-holder">
						<h5><span class="theme-name"><span><?php esc_html_e('Welcome to Warsa', 'warsa'); ?></span></h5>
						<h2><?php esc_html_e('Launch Your Blog with Warsa Today! 🚀 ', 'warsa'); ?></h2>
						<div class="notice-text">
							<p><?php esc_html_e('Enhance your Warsa experience with Cozy Blocks. Unlock 15 powerful post blocks designed for blog, news, and magazine websites, along with a growing library of ready-to-use reusable patterns. Create engaging content layouts, build pages faster, and design professional publishing websites with ease—without writing a single line of code.', 'warsa'); ?></p>
						</div>
						<a href="#" id="install-activate-button" class="button admin-button info-button"><?php esc_html_e('Install & Activate Cozy Blocks', 'warsa'); ?></a>
						<a href="<?php echo esc_url(admin_url('themes.php?page=about-warsa')); ?>" class="button admin-button info-button"><?php esc_html_e('Explore Warsa', 'warsa'); ?></a>
					</div>
				</div>
				<div class="theme-hero-screens">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/admin/images/theme_screen_img.png'); ?>" />
				</div>

			</div>
<?php
		}
	}
endif;
add_action('admin_notices', 'warsa_welcome_notice');
function warsa_dismissble_notice()
{
	if (! isset($_POST['nonce']) || ! wp_verify_nonce($_POST['nonce'], 'warsa_admin_nonce')) {
		wp_send_json_error(array('message' => 'Nonce verification failed.'));
		return;
	}

	$result = update_option('warsa_dismissed_custom_notice', 1);

	if ($result) {
		wp_send_json_success();
	} else {
		wp_send_json_error(array('message' => 'Failed to update option'));
	}
}
add_action('wp_ajax_warsa_dismissble_notice', 'warsa_dismissble_notice');
// Hook into a custom action when the button is clicked
add_action('wp_ajax_warsa_install_and_activate_plugins', 'warsa_install_and_activate_plugins');
add_action('wp_ajax_nopriv_warsa_install_and_activate_plugins', 'warsa_install_and_activate_plugins');
add_action('wp_ajax_warsa_rplugin_activation', 'warsa_rplugin_activation');
add_action('wp_ajax_nopriv_warsa_rplugin_activation', 'warsa_rplugin_activation');

// Function to install and activate the plugins



function warsa_check_plugin_installed_status($pugin_slug, $plugin_file)
{
	return file_exists(ABSPATH . 'wp-content/plugins/' . $pugin_slug . '/' . $plugin_file) ? true : false;
}

/* Check if plugin is activated */


function warsa_check_plugin_active_status($pugin_slug, $plugin_file)
{
	return is_plugin_active($pugin_slug . '/' . $plugin_file) ? true : false;
}

require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/misc.php';
require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
function warsa_install_and_activate_plugins()
{
	if (! current_user_can('manage_options')) {
		wp_send_json_error('Invalid permission!');
	}
	check_ajax_referer('warsa_welcome_nonce', 'nonce');
	// Define the plugins to be installed and activated
	$recommended_plugins = array(
		array(
			'slug' => 'cozy-addons',
			'file' => 'cozy-addons.php',
			'name' => __('Cozy Blocks', 'warsa'),
		),
		// Add more plugins here as needed
	);

	// Include the necessary WordPress functions

	// Set up a transient to store the installation progress
	// set_transient( 'install_and_activate_progress', array(), MINUTE_IN_SECONDS * 10 );

	$redirect_url = admin_url('themes.php?page=about-warsa');

	// Loop through each plugin
	foreach ($recommended_plugins as $plugin) {
		$plugin_slug = $plugin['slug'];
		$plugin_file = $plugin['file'];
		$plugin_name = $plugin['name'];

		// Check if the plugin is active
		if (is_plugin_active($plugin_slug . '/' . $plugin_file)) {
			// warsa_update_install_and_activate_progress( $plugin_name, 'Already Active' );
			continue; // Skip to the next plugin
		}

		// Check if the plugin is installed but not active
		if (is_warsa_plugin_installed($plugin_slug . '/' . $plugin_file)) {
			$activate = activate_plugin($plugin_slug . '/' . $plugin_file, '', false, true);
			if (is_wp_error($activate)) {
				// warsa_update_install_and_activate_progress( $plugin_name, 'Error' );
				continue; // Skip to the next plugin
			}
			// warsa_update_install_and_activate_progress( $plugin_name, 'Activated' );
			continue; // Skip to the next plugin
		}

		// Plugin is not installed or activated, proceed with installation
		// warsa_update_install_and_activate_progress( $plugin_name, 'Installing' );

		// Fetch plugin information
		$api = plugins_api(
			'plugin_information',
			array(
				'slug'   => $plugin_slug,
				'fields' => array('sections' => false),
			)
		);

		// Check if plugin information is fetched successfully
		if (is_wp_error($api)) {
			// warsa_update_install_and_activate_progress( $plugin_name, 'Error' );
			continue; // Skip to the next plugin
		}

		// Set up the plugin upgrader
		$upgrader = new Plugin_Upgrader();
		$install  = $upgrader->install($api->download_link);

		// Check if installation is successful
		if ($install) {
			// Activate the plugin
			$activate = activate_plugin($plugin_slug . '/' . $plugin_file, '', false, true);

			// Check if activation is successful
			if (is_wp_error($activate)) {
				// warsa_update_install_and_activate_progress( $plugin_name, 'Error' );
				continue; // Skip to the next plugin
			}
			// warsa_update_install_and_activate_progress( $plugin_name, 'Activated' );
		}
	}

	// Delete the progress transient
	// delete_transient( 'install_and_activate_progress' );
	// Return JSON response
	wp_send_json_success(array('redirect_url' => $redirect_url));
}

// Function to check if a plugin is installed but not active
function is_warsa_plugin_installed($plugin_slug)
{
	$plugins = get_plugins();
	return isset($plugins[$plugin_slug]);
}

// Function to update the installation and activation progress
function warsa_update_install_and_activate_progress($plugin_name, $status)
{
	$progress   = get_transient('install_and_activate_progress');
	$progress[] = array(
		'plugin' => $plugin_name,
		'status' => $status,
	);
	set_transient('install_and_activate_progress', $progress, MINUTE_IN_SECONDS * 10);
}


function warsa_dashboard_menu()
{
	add_theme_page(esc_html__('About Warsa', 'warsa'), esc_html__('About Warsa', 'warsa'), 'edit_theme_options', 'about-warsa', 'warsa_theme_info_display');
}
add_action('admin_menu', 'warsa_dashboard_menu');
function warsa_theme_info_display()
{
	// Dashboard.
	require_once WARSA_DIR . 'inc/admin/dashboard.php';
}

/**
 * Handles the activation of a plugin via an AJAX request.
 *
 * This function processes an AJAX request to activate a plugin. It checks for required
 * parameters (plugin slug, filename, and name) and activates the specified plugin.
 * If the activation is successful, it updates the installation and activation progress.
 * If an error occurs during the activation, it logs the error and returns a failure response.
 *
 * The function uses a nonce (`warsa_admin_nonce`) to ensure the request is valid
 * and comes from an authorized source.
 *
 * @return void
 *
 * @uses check_ajax_referer() Ensures the request is valid by checking the nonce.
 * @uses activate_plugin() Attempts to activate the plugin using its filename.
 * @uses warsa_update_install_and_activate_progress() Updates the installation and activation progress.
 * @uses wp_send_json_success() Sends a success response in JSON format.
 * @uses wp_send_json_error() Sends an error response in JSON format.
 */
function warsa_rplugin_activation()
{
	if (! current_user_can('manage_options')) {
		return;
	}

	check_ajax_referer('warsa_admin_nonce', 'nonce', true);

	if (isset($_POST['pluginSlug'], $_POST['pluginFilename'], $_POST['pluginName'])) {
		$plugin_slug     = sanitize_text_field(wp_unslash($_POST['pluginSlug']));
		$plugin_filename = sanitize_text_field(wp_unslash($_POST['pluginFilename']));
		$plugin_name     = sanitize_text_field(wp_unslash($_POST['pluginName']));

		if (file_exists(trailingslashit(WP_PLUGIN_DIR) . $plugin_filename)) {
			$activate = activate_plugin($plugin_filename, '', false, true);
		} else {
			// Fetch plugin information
			$api = plugins_api(
				'plugin_information',
				array(
					'slug'   => $plugin_slug,
					'fields' => array('sections' => false),
				)
			);

			$upgrader = new Plugin_Upgrader();
			$install  = $upgrader->install($api->download_link);

			if ($install) {
				$activate = activate_plugin($plugin_filename, '', false, true);
			}
		}

		// if ( is_wp_error( $activate ) ) {
		// warsa_update_install_and_activate_progress( $plugin_name, 'Error' );
		// }

		// warsa_update_install_and_activate_progress( $plugin_name, 'Activated' );

		wp_send_json_success();
	} else {
		wp_send_json_error('Error: Missing parameters.');
	}
}
