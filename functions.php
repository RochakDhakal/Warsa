<?php
if (! defined('WARSA_VERSION')) {
	// Replace the version number of the theme on each release.
	define('WARSA_VERSION', wp_get_theme()->get('Version'));
}
define('WARSA_DEBUG', defined('WP_DEBUG') && WP_DEBUG === true);
define('WARSA_DIR', trailingslashit(get_template_directory()));
define('WARSA_URL', trailingslashit(get_template_directory_uri()));

if (! function_exists('warsa_support')) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since warsa 1.0.0
	 *
	 * @return void
	 */
	function warsa_support()
	{
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');
		// Add support for block styles.
		add_theme_support('wp-block-styles');
		add_theme_support('post-thumbnails');
		// Enqueue editor styles.
		add_editor_style('style.css');
		// Removing default patterns.
		remove_theme_support('core-block-patterns');
	}

endif;
add_action('after_setup_theme', 'warsa_support');

/*
----------------------------------------------------------------------------------
Enqueue Styles
-----------------------------------------------------------------------------------*/
if (! function_exists('warsa_styles')) :
	function warsa_styles()
	{
		// registering style for theme
		wp_enqueue_style('warsa-style', get_stylesheet_uri(), array(), WARSA_VERSION);
		if (is_rtl()) {
			wp_enqueue_style('warsa-rtl-css', get_template_directory_uri() . '/assets/css/rtl.css', 'rtl_css', WARSA_VERSION);
		}
	}
endif;

add_action('wp_enqueue_scripts', 'warsa_styles');

/**
 * Enqueue scripts for admin area
 */
function warsa_admin_style()
{
	$hello_notice_current_screen = get_current_screen();
	if (! empty($_GET['page']) && 'about-warsa' === $_GET['page'] || $hello_notice_current_screen->id === 'themes' || $hello_notice_current_screen->id === 'dashboard' || $hello_notice_current_screen->id === 'plugins') {
		wp_enqueue_style('warsa-admin-style', get_template_directory_uri() . '/inc/admin/css/admin-style.css', array(), WARSA_VERSION, 'all');
		wp_enqueue_script('warsa-admin-scripts', get_template_directory_uri() . '/inc/admin/js/warsa-admin-scripts.js', array('jquery'), WARSA_VERSION, true);

		wp_localize_script(
			'warsa-admin-scripts',
			'warsa_admin_localize',
			array(
				'ajax_url'     => admin_url('admin-ajax.php'),
				'nonce'        => wp_create_nonce('warsa_admin_nonce'),
				'welcomeNonce' => wp_create_nonce('warsa_welcome_nonce'),
				'redirect_url' => admin_url('themes.php?page=about-warsa'),
				'scrollURL'    => admin_url('plugins.php?cozy-addons-scroll=true'),
				'demoURL'      => admin_url('themes.php?page=advanced-import'),
			)
		);
	}
}
add_action('admin_enqueue_scripts', 'warsa_admin_style');

/**
 * Enqueue assets scripts for both backend and frontend
 */
add_action(
	'enqueue_block_assets',
	function () {
		wp_enqueue_style('warsa-blocks-style', get_template_directory_uri() . '/assets/css/blocks.css', array(), WARSA_VERSION);
	}
);


/**
 * Load core file.
 */
require_once get_template_directory() . '/inc/core/init.php';

/**
 * Load welcome page file.
 */
require_once get_template_directory() . '/inc/admin/welcome-notice.php';

function warsa_add_woocommerce_support()
{
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'warsa_add_woocommerce_support');
