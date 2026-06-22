<?php

/**
 * Title: Editor's Choice
 * Slug: warsa/editor-choice
 * Categories: warsa-post
 */

?>
<!-- wp:group {"metadata":{"patternName":"warsa/editor-choice","name":"Editor's Choice","categories":["warsa-post"]},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0","padding":{"right":"26px","left":"26px","top":"40px","bottom":"40px"}}},"layout":{"type":"constrained","contentSize":"1260px"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:26px;padding-bottom:40px;padding-left:26px"><!-- wp:heading {"style":{"spacing":{"padding":{"top":"20px"}},"border":{"top":{"color":"var:preset|color|heading-color","width":"1px"},"right":{"width":"0px","style":"none"},"bottom":{"width":"0px","style":"none"},"left":{"width":"0px","style":"none"}}},"fontSize":"medium","fontFamily":"inter"} -->
<h2 class="wp-block-heading has-inter-font-family has-medium-font-size" style="border-top-color:var(--wp--preset--color--heading-color);border-top-width:1px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;padding-top:20px">
<?php
	esc_html_e( "Editor's Choice", 'warsa' );
?>
</h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"20px"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="margin-top:20px"><!-- wp:query {"queryId":0,"query":{"perPage":4,"pages":0,"offset":"0","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"grid","columnCount":4}} -->
<!-- wp:cover {"useFeaturedImage":true,"overlayColor":"overlay","isUserOverlayColor":true,"minHeight":420,"contentPosition":"bottom left","className":"is-style-warsa-cover-zoom-out","style":{"border":{"width":"0px","style":"none","radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}},"spacing":{"padding":{"top":"0","bottom":"0","left":"20px","right":"20px"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-left is-style-warsa-cover-zoom-out" style="border-style:none;border-width:0px;border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:20px;padding-bottom:0;padding-left:20px;min-height:420px"><span aria-hidden="true" class="wp-block-cover__background has-overlay-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"typography":{"lineHeight":"1.2"}},"textColor":"light-color","fontSize":"large"} /-->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"24px","bottom":"24px"},"margin":{"top":"20px"},"blockGap":"10px"},"border":{"top":{"color":"var:preset|color|border-color","style":"solid","width":"1px"},"right":{"width":"0px","style":"none"},"bottom":{"width":"0px","style":"none"},"left":{"width":"0px","style":"none"}},"typography":{"textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"x-small","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group alignfull has-light-color-color has-text-color has-link-color has-x-small-font-size" style="border-top-color:var(--wp--preset--color--border-color);border-top-style:solid;border-top-width:1px;border-right-style:none;border-right-width:0px;border-bottom-style:none;border-bottom-width:0px;border-left-style:none;border-left-width:0px;margin-top:20px;padding-top:24px;padding-right:20px;padding-bottom:24px;padding-left:20px;text-transform:capitalize"><!-- wp:post-terms {"term":"category","separator":"","className":"is-style-categories-background-with-round is-style-warsa-categories-primary"} /-->

<!-- wp:post-date {"datetime":"2026-06-19T08:07:09.662Z"} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results.","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center">
<?php
	esc_html_e( 'Oops! Blogs not found.', 'warsa' );
?>
</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->