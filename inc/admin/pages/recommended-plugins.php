<ul class="warsa-page__recommended-plugins">
	<div class="recommended-plugins-note">
		<h3><?php esc_html_e('Recommended Plugins for Smooth Functionality', 'warsa'); ?></h3>
		<p><?php esc_html_e('Upgrade your Warsa Theme experience by installing and activating Cozy Blocks to unlock 50+ advanced blocks, 40+ ready-to-import starter templates, and 500+ professionally designed sections—helping you build faster, design smarter, and create stunning websites without limitations!', 'warsa'); ?></p>

		<p><strong><?php esc_html_e('Note:', 'warsa'); ?></strong> <?php esc_html_e('Always ensure you are using the latest versions of the plugins for optimal performance and security. If you need assistance with any of the recommended plugins, our support team is here to help.', 'warsa'); ?></p>
	</div>

	<?php
	// Define an array of plugins.
	$recommended_plugins = array(
		array(
			'slug'     => 'cozy-addons',
			'filename' => 'cozy-addons/cozy-addons.php',
			'name'     => 'Cozy Blocks',
			'desc'     => 'Essential for enabling PRO version & features and required by demos for block functionalities.',
			'icon_url' => 'https://plugins.svn.wordpress.org/cozy-addons/assets/icon-128x128.gif',
		),

	);

	// Function to render plugin item.
	function render_plugin_item($recommended_plugin)
	{
		$slug     = isset($recommended_plugin['slug']) ? sanitize_key($recommended_plugin['slug']) : '';
		$filename = isset($recommended_plugin['filename']) ? sanitize_text_field($recommended_plugin['filename']) : '';
		$name     = isset($recommended_plugin['name']) ? sanitize_text_field($recommended_plugin['name']) : '';
		$desc     = isset($recommended_plugin['desc']) ? sanitize_text_field($recommended_plugin['desc']) : '';
		$icon_url = isset($recommended_plugin['icon_url']) ? esc_url($recommended_plugin['icon_url']) : '';

		$classes = array('recommended-plugins');
		if (warsa_is_plugin_activated($filename)) {
			$classes[] = 'active';
		}
	?>
		<li class="<?php echo implode(' ', array_map('sanitize_html_class', array_filter($classes))); ?>">
			<figure class="plugin-image">
				<img src="<?php echo esc_url($icon_url); ?>" alt="
									<?php
									printf(
										/* Translated String %s: Plugin name */
										esc_html__('%s', 'warsa'),
										esc_html($name)
									);
									?>
					" loading="lazy" />
			</figure>
			<div class="plugin-details">
				<h4 class="plugin-name">
					<?php
					printf(
						/* Translated String %s: Plugin name */
						esc_html__('%s', 'warsa'),
						esc_html($name)
					);
					?>
				</h4>
				<p class="plugin-desc">
					<?php
					printf(
						/* Translated String %s: Plugin description */
						esc_html__('%s', 'warsa'),
						esc_html($desc)
					);
					?>
				</p>
				<?php
				if (warsa_is_plugin_activated($filename)) {
				?>
					<a class="plugin-button plugin-activated"><?php esc_html_e('Activated', 'warsa'); ?></a>
				<?php
				} elseif (warsa_is_plugin_installed($filename)) {
				?>
					<a href="<?php echo esc_url(get_admin_url() . 'plugins.php?action=activate&plugin=' . rawurlencode($slug)); ?>" class="plugin-button plugin-activate" data-name="<?php echo esc_html($name); ?>" data-slug="<?php echo esc_html($slug); ?>" data-filename="<?php echo esc_html($filename); ?>"><?php esc_html_e('Activate', 'warsa'); ?></a>
				<?php
				} else {
				?>
					<a href="#" class="plugin-button plugin-activate" data-name="<?php echo esc_html($name); ?>" data-slug="<?php echo esc_html($slug); ?>" data-filename="<?php echo esc_html($filename); ?>"><?php esc_html_e('Install & Activate', 'warsa'); ?></a>
				<?php
				}
				?>
			</div>
		</li>
	<?php
	}

	$has_all_recommended_plugins = true;

	// Loop through the plugins and render each one.
	foreach ($recommended_plugins as $recommended_plugin) {
		render_plugin_item($recommended_plugin);

		if (! is_plugin_active($recommended_plugin['filename'])) {
			$has_all_recommended_plugins = false;
		}
	}

	$classes   = array();
	$classes[] = ! $has_all_recommended_plugins ? 'warsa-recommend-plugins__installer' : '';

	$button_label = 'Woo-hoo! Plugins activated and ready to go! 🎉';

	if (! $has_all_recommended_plugins) {
		$button_label = 'Install and/or Activate All Plugins';
	}
	?>

	<a id="<?php echo esc_attr(implode(' ', array_map('sanitize_html_class', array_filter($classes)))); ?>" class="admin-button info-button button button-primary" <?php echo $has_all_recommended_plugins ? esc_attr('disabled') : ''; ?>>
		<?php
		printf(
			/* Translated string %s: Button label */
			esc_html__('%s', 'warsa'),
			esc_html($button_label)
		);
		?>
	</a>
</ul>