<?php

/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package warsa
 * @since 1.0.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since 0.1
	 *
	 * @return void
	 */
	function warsa_register_block_styles() {
		register_block_style(
			'core/group',
			array(
				'name'  => 'warsa-boxshadow',
				'label' => __( 'Box Shadow', 'warsa' ),
			)
		);
		register_block_style(
			'core/group',
			array(
				'name'  => 'warsa-boxshadow-md',
				'label' => __( 'Box Shadow : Medium', 'warsa' ),
			)
		);
		register_block_style(
			'core/group',
			array(
				'name'  => 'warsa-boxshadow-lg',
				'label' => __( 'Box Shadow : Large', 'warsa' ),
			)
		);
		register_block_style(
			'core/group',
			array(
				'name'  => 'warsa-boxshadow-hover',
				'label' => __( 'Hover : Box Shadow', 'warsa' ),
			)
		);
		register_block_style(
			'core/group',
			array(
				'name'  => 'warsa-boxshadow-overflow-hidden',
				'label' => __( 'Overflow : Hidden', 'warsa' ),
			)
		);
		register_block_style(
			'core/columns',
			array(
				'name'  => 'warsa-boxshadow',
				'label' => __( 'Box Shadow', 'warsa' ),
			)
		);
		register_block_style(
			'core/columns',
			array(
				'name'  => 'warsa-boxshadow-hover',
				'label' => __( 'Hover : Box Shadow', 'warsa' ),
			)
		);
		register_block_style(
			'core/columns',
			array(
				'name'  => 'warsa-boxshadow-overflow-hidden',
				'label' => __( 'Overflow : Hidden', 'warsa' ),
			)
		);
		register_block_style(
			'core/column',
			array(
				'name'  => 'warsa-boxshadow',
				'label' => __( 'Box Shadow', 'warsa' ),
			)
		);
		register_block_style(
			'core/column',
			array(
				'name'  => 'warsa-boxshadow-md',
				'label' => __( 'Box Shadow : Medium', 'warsa' ),
			)
		);
		register_block_style(
			'core/column',
			array(
				'name'  => 'warsa-boxshadow-lg',
				'label' => __( 'Box Shadow : Large', 'warsa' ),
			)
		);
		register_block_style(
			'core/column',
			array(
				'name'  => 'warsa-boxshadow-hover',
				'label' => __( 'Hover : Box Shadow', 'warsa' ),
			)
		);
		register_block_style(
			'core/column',
			array(
				'name'  => 'warsa-boxshadow-overflow-hidden',
				'label' => __( 'Overflow : Hidden', 'warsa' ),
			)
		);
		register_block_style(
			'core/image',
			array(
				'name'  => 'warsa-image-zoom-in',
				'label' => __( 'Hover : Zoom In', 'warsa' ),
			)
		);
		register_block_style(
			'core/image',
			array(
				'name'  => 'warsa-image-zoom-out',
				'label' => __( 'Hover : Zoom Out', 'warsa' ),
			)
		);
		register_block_style(
			'core/post-featured-image',
			array(
				'name'  => 'warsa-image-zoom-in',
				'label' => __( 'Hover : Zoom In', 'warsa' ),
			)
		);
		register_block_style(
			'core/post-featured-image',
			array(
				'name'  => 'warsa-image-zoom-out',
				'label' => __( 'Hover : Zoom Out', 'warsa' ),
			)
		);
		register_block_style(
			'core/cover',
			array(
				'name'  => 'warsa-cover-zoom-in',
				'label' => __( 'Hover : Zoom In', 'warsa' ),
			)
		);
		register_block_style(
			'core/cover',
			array(
				'name'  => 'warsa-cover-zoom-out',
				'label' => __( 'Hover : Zoom Out', 'warsa' ),
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'  => 'warsa-categories-primary',
				'label' => __( 'Primary', 'warsa' ),
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'  => 'warsa-categories-secondary',
				'label' => __( 'Secondary', 'warsa' ),
			)
		);
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'warsa-social-icons-border',
				'label' => __( 'Borders', 'warsa' ),
			)
		);
		register_block_style(
			'core/navigation',
			array(
				'name'  => 'warsa-navigation-primary-hover',
				'label' => __( 'Hover : Primary', 'warsa' ),
			)
		);
		register_block_style(
			'core/navigation',
			array(
				'name'  => 'warsa-navigation-secondary-hover',
				'label' => __( 'Hover : Secondary', 'warsa' ),
			)
		);
	}
	add_action( 'init', 'warsa_register_block_styles' );
}
