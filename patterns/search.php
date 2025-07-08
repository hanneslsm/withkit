<?php
/**
 * Title: search
 * Slug: withkit/search
 * Inserter: no
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:template-part {"slug":"header","area":"header","align":"wide"} /-->

<!-- wp:group {"align":"wide","className":"is-style-section-base-2","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|40","top":"var:preset|spacing|40"}},"border":{"bottom":{"color":"var:preset|color|base-3","width":"1px"},"top":[],"right":[],"left":[]}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide is-style-section-base-2" style="border-bottom-color:var(--wp--preset--color--base-3);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:query-title {"type":"search","align":"wide"} /-->

<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"border":{"color":"#EDE8E6","radius":"8px"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"tagName":"main","metadata":{"name":"Main"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"dimensions":{"minHeight":"100%"}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="min-height:100%;margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--40)"><!-- wp:query {"queryId":1,"query":{"perPage":10,"pages":0,"offset":0,"postType":"page","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[],"format":[]},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template -->
<!-- wp:group {"layout":{"type":"grid","minimumColumnWidth":"16rem"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"layout":{"columnSpan":3,"rowSpan":1}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:post-date {"fontSize":"small"} /-->

<!-- wp:post-title {"isLink":true} /--></div>
<!-- /wp:group -->

<!-- wp:post-excerpt /--></div>
<!-- /wp:group -->

<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /--></div>
<!-- /wp:group -->

<!-- wp:separator {"backgroundColor":"base-4"} -->
<hr class="wp-block-separator has-text-color has-base-4-color has-alpha-channel-opacity has-base-4-background-color has-background"/>
<!-- /wp:separator -->
<!-- /wp:post-template -->

<!-- wp:query-pagination -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e('Sorry, no results were found.', 'withkit');?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e('Please check the spelling or try searching for something else.', 'withkit');?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search","buttonPosition":"button-inside"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
