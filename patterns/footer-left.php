<?php
/**
 * Title: Footer left
 * Slug: withkit/footer-left
 * Categories: footer
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"className":"is-style-footer","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group is-style-footer" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:site-logo {"width":80} /-->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p><?php esc_html_e('Enter a short description of your company here. This helps your visitors to understand what you do and improves your ranking in search engines. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'withkit');?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"right","className":"on-medium-with-alignment-left"} -->
<p class="has-text-align-right on-medium-with-alignment-left"><?php /* Translators: 1. is the start of a 'em' HTML element, 2. is the end of a 'em' HTML element, 3. is a 'br' HTML element, 4. is a 'br' HTML element */
echo sprintf( esc_html__( '%1$sYour Name%2$s%3$sYour address%4$sContact info', 'withkit' ), '<em>', '</em>', '<br>', '<br>' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","justifyContent":"center"}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
