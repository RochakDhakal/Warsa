<?php

/**
 * warsa: Block Patterns
 *
 * @since warsa 1.0.0
 */

/**
 * Registers pattern categories for warsa
 *
 * @since warsa 1.0.0
 *
 * @return void
 */
function warsa_register_pattern_category()
{
	$block_pattern_categories = array(
		'warsa-header' => array('label' => __('Header Layout', 'warsa')),
		'warsa-footer' => array('label' => __('Footer Layout', 'warsa')),
		'warsa-templates' => array('label' => __('Templates', 'warsa')),
		'warsa-post' => array('label' => __('Posts / Blog', 'warsa')),
		'warsa-contact' => array('label' => __('Contacts / Newsletter', 'warsa')),
	);

	$block_pattern_categories = apply_filters('warsa_block_pattern_categories', $block_pattern_categories);

	foreach ($block_pattern_categories as $name => $properties) {
		if (!WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($name)) {
			register_block_pattern_category($name, $properties); // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_pattern_category
		}
	}
}
add_action('init', 'warsa_register_pattern_category', 9);
