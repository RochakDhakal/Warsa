<?php

/**
 * Title: Header Default
 * Slug: warsa/header-default
 * Description: Default header layout for the strativo
 * Categories: warsa-header
 * Keywords: header, nav, links, button
 * Block Types: core/template-part/header
 * Post Types: wp_template
 * Inserter: true
 */
?>
<!-- wp:group {"metadata":{"patternName":"warsa/header-default","name":"Header Default","description":"Default header layout for the strativo","categories":["warsa-header"]},"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"backgroundColor":"heading-color","layout":{"type":"constrained","contentSize":"100%","wideSize":"100%"}} -->
<div class="wp-block-group has-heading-color-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"28px","bottom":"28px","left":"24px","right":"24px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"1260px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:28px;padding-right:24px;padding-bottom:28px;padding-left:24px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"24px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
<!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFE","iconBackgroundColor":"transparent","iconBackgroundColorValue":"#ffffff00","size":"has-normal-icon-size","className":"is-style-warsa-social-icons-border","style":{"spacing":{"blockGap":{"top":"8px","left":"8px"}}}} -->
	<ul class="wp-block-social-links has-normal-icon-size has-icon-color has-icon-background-color is-style-warsa-social-icons-border">
		<!-- wp:social-link {"url":"#","service":"facebook"} /-->
		<!-- wp:social-link {"url":"#","service":"x"} /-->
		<!-- wp:social-link {"url":"#","service":"instagram"} /-->
	</ul>
<!-- /wp:social-links -->

<!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo /-->

<!-- wp:site-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}},"typography":{"textTransform":"uppercase"}},"textColor":"light-color"} /--></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">
<?php
	esc_html_e( 'Subscribe', 'warsa' );
?>
</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"14px","bottom":"14px","left":"24px","right":"24px"}}},"backgroundColor":"primary","layout":{"type":"constrained","contentSize":"1260px"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:14px;padding-right:24px;padding-bottom:14px;padding-left:24px">
<!-- wp:navigation {"textColor":"light-color","overlayBackgroundColor":"primary","overlayTextColor":"light-color","className":"is-style-warsa-navigation-secondary-hover","style":{"typography":{"textTransform":"uppercase"},"spacing":{"blockGap":"18px"}},"fontSize":"normal","layout":{"type":"flex","justifyContent":"center"}} -->
	<!-- wp:home-link /-->
	<!-- wp:page-list /-->
<!-- /wp:navigation -->
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->