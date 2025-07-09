<?php
/**
 * Title: sticky
 * Slug: withkit/sticky
 * Categories: withkit/sticky
 * Viewport width: 1920
 */
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Section"},"align":"full","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:spacer {"height":"var:preset|spacing|40"} -->
<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"className":"","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"50%","className":""} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":""} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/placeholders/placeholder-image-1.webp" alt="" style="aspect-ratio:3/2;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":""} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/placeholders/placeholder-image-2.webp" alt="" style="aspect-ratio:3/2;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"3/2","scale":"cover","sizeSlug":"large","linkDestination":"none","className":""} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/placeholders/placeholder-image-3.webp" alt="" style="aspect-ratio:3/2;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"stretch","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:50%"><!-- wp:group {"className":"with-top-40","style":{"position":{"type":"sticky","top":"0px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group with-top-40"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e('This section is sticky.', 'withkit');?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vel turpis elementum, posuere dui eget, consectetur leo. Nulla sapien elit, consectetur ut porttitor ut, molestie vel sapien. Proin vitae suscipit risus, ac congue est. Integer interdum aliquet velit vel facilisis. Morbi vulputate pellentesque dolor vitae dapibus. Proin aliquet pellentesque risus, quis scelerisque risus gravida in. Sed efficitur enim sed felis aliquet, vel pretium felis pharetra. Nullam aliquet dui lectus, ut interdum nulla eleifend volutpat. Pellentesque tempus lectus eget gravida malesuada. Donec bibendum vulputate euismod.', 'withkit');?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
