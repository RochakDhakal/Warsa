<?php

/**
 * Title: Advertisement CTA
 * Slug: warsa/ads
 * Categories: warsa-post
 */
$warsa_url    = trailingslashit( get_template_directory_uri() );
$warsa_images = array(
	$warsa_url . 'assets/images/ad.png',
);
?>
<!-- wp:group {"metadata":{"patternName":"warsa/ads","name":"Advertisement CTA","categories":["warsa-post"]},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"top":"24px","bottom":"24px","left":"26px","right":"26px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:24px;padding-right:26px;padding-bottom:24px;padding-left:26px"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center">
<?php
	esc_html_e( 'Advertisement', 'warsa' );
?>
</p>
<!-- /wp:paragraph -->

<!-- wp:image {"width":"1180px","sizeSlug":"large","linkDestination":"none","style":{"spacing":{"margin":{"top":"8px"}}}} -->
<figure class="wp-block-image size-large is-resized" style="margin-top:8px"><img src="
<?php
	echo esc_url( $warsa_images[0] );
?>
" alt="" class="" style="width:1180px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->