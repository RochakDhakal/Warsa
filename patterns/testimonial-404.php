<?php

/**
 * Title: 404 Template
 * Slug: warsa/template-404
 * Categories: warsa
 */
?>
<!-- wp:group {"tagName":"main","metadata":{"patternName":"warsa/template-404","name":"404 Template","categories":["warsa"]},"align":"full","style":{"border":{"width":"0px","style":"none"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<main class="wp-block-group alignfull" style="border-style:none;border-width:0px"><!-- wp:cover {"overlayColor":"background","isUserOverlayColor":true,"minHeight":340,"isDark":false,"sizeSlug":"full","style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-cover is-light" style="min-height:340px"><span aria-hidden="true" class="wp-block-cover__background has-background-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"140px","fontStyle":"normal","fontWeight":"600","lineHeight":"1","textAlign":"center"}}} -->
<h1 class="wp-block-heading has-text-align-center" style="font-size:140px;font-style:normal;font-weight:600;line-height:1">
<?php
	esc_html_e( '404', 'warsa' );
?>
</h1>
<!-- /wp:heading -->

<!-- wp:heading {"level":3,"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"300","textAlign":"center"}},"fontSize":"large"} -->
<h3 class="wp-block-heading has-text-align-center has-large-font-size" style="font-style:normal;font-weight:300;text-transform:uppercase">
<?php
	esc_html_e( 'OOPS! Page Not Found!', 'warsa' );
?>
</h3>
<!-- /wp:heading --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px","right":"26px","left":"26px"},"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|foreground"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"foreground","layout":{"type":"constrained","contentSize":"1260px"}} -->
<div class="wp-block-group has-foreground-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:26px;padding-bottom:40px;padding-left:26px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
<h2 class="wp-block-heading has-heading-color-color has-text-color has-link-color" style="font-style:normal;font-weight:500">
<?php
	esc_html_e( 'Helpful Link', 'warsa' );
?>
</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|foreground-alt"}}}},"textColor":"foreground-alt"} -->
<p class="has-foreground-alt-color has-text-color has-link-color" style="line-height:1.5">
<?php
	esc_html_e(
		'Something went wrong! We couldn’t find the page you were looking for. But don’t worry, we’ve got some other
			Links that might be helpful:',
		'warsa'
	);
	?>
	</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"60px"}}}} -->
<div class="wp-block-columns" style="margin-top:60px"><!-- wp:column {"style":{"elements":{"link":{"color":{"text":"var:preset|color|black-color"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"black-color"} -->
<div class="wp-block-column has-black-color-color has-text-color has-link-color"><!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
<h4 class="wp-block-heading has-heading-color-color has-text-color has-link-color" style="margin-bottom:var(--wp--preset--spacing--50);font-style:normal;font-weight:500">
			<?php
				esc_html_e( 'Pages', 'warsa' );
			?>
			</h4>
<!-- /wp:heading -->

<!-- wp:page-list {"className":"is-style-warsa-page-list-bullet-hide-style is-style-warsa-page-list-bullet-hide-style","style":{"typography":{"lineHeight":"2"}}} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
<h4 class="wp-block-heading has-heading-color-color has-text-color has-link-color" style="margin-bottom:var(--wp--preset--spacing--50);font-style:normal;font-weight:500">
			<?php
				esc_html_e( 'Categories', 'warsa' );
			?>
			</h4>
<!-- /wp:heading -->

<!-- wp:categories {"className":"is-style-warsa-categories-bullet-hide-style is-style-warsa-categories-bullet-hide-style","style":{"typography":{"lineHeight":"2"}}} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}},"elements":{"link":{"color":{"text":"var:preset|color|heading-color"}}}},"textColor":"heading-color"} -->
<h4 class="wp-block-heading has-heading-color-color has-text-color has-link-color" style="margin-bottom:var(--wp--preset--spacing--50);font-style:normal;font-weight:500">
<?php
	esc_html_e( 'Posts', 'warsa' );
?>
</h4>
<!-- /wp:heading -->

<!-- wp:query {"queryId":22,"query":{"perPage":"20","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
<!-- wp:post-title {"level":5,"isLink":true,"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} /-->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></main>
<!-- /wp:group -->