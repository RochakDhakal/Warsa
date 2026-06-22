<?php

/**
 * Title: Newsletter
 * Slug: warsa/newsletter
 * Categories: warsa-contact
 */

?>
<!-- wp:group {"metadata":{"patternName":"warsa/newsletter","name":"Newsletter","categories":["warsa-post"]},"style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"26px","right":"26px"}}},"backgroundColor":"background-alt","layout":{"type":"constrained","contentSize":"1260px"}} -->
<div class="wp-block-group has-background-alt-background-color has-background" style="padding-top:80px;padding-right:26px;padding-bottom:80px;padding-left:26px"><!-- wp:group {"layout":{"type":"constrained","contentSize":"530px"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"textAlign":"center","fontSize":"40px"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:40px">
<?php
	esc_html_e( 'Subscribe Our Newsletter', 'warsa' );
?>
</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"16px"}}}} -->
<p class="has-text-align-center" style="margin-top:16px">
<?php
	esc_html_e( 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius.', 'warsa' );
?>
</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group">
<?php
if ( class_exists( 'WPCF7' ) ) {
	?>
<!-- wp:contact-form-7/contact-form-selector {"id":1322,"hash":"ef01a7a","title":"Untitled","className":"warsa-newsletter-form"} -->
<div class="wp-block-contact-form-7-contact-form-selector warsa-newsletter-form">[contact-form-7 id="ef01a7a" title="Untitled"]</div>
<!-- /wp:contact-form-7/contact-form-selector -->
	<?php
} else {
	?>
<!-- wp:group {"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>
	<?php
	esc_html_e( 'Note: Please install and activate the WP-CF7 plugin. Add the additional CSS class name "warsa-newsletter-form" to the Contact Form block.', 'warsa' );
	?>
</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>
	<?php
	esc_html_e( 'Use the following Contact Form 7 fields for the newsletter form:', 'warsa' );
	?>
</p>
<!-- /wp:paragraph -->

<!-- wp:code -->
<pre class="wp-block-code"><code>[email* your-email autocomplete:email placeholder "sample@email.com"]
[submit "Subscribe"]</code></pre>
<!-- /wp:code --></div>
<!-- /wp:group -->
	<?php
}
?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->