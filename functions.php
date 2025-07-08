<?php

/**
 * withkit functions and definitions
 *
 * @package withkit
 */


// Setup
require get_template_directory() . '/inc/setup.php';

// Woocommerce Setup
require get_template_directory() . '/inc/woo-remove-patterns.php';

// Remove emojis
require get_template_directory() . '/inc/gdpr-remove-emojis.php';

// Enqueue files
require get_template_directory() . '/inc/enqueuing.php';

// Block  Variations
require get_template_directory() . '/inc/block-variations.php';

// Block Style Variations
require get_template_directory() . '/inc/block-styles.php';

// Patterns Setup
require get_template_directory() . '/inc/block-patterns.php';



/**
 * withkit tools
 */

// Dashboard Widget
require get_template_directory() . '/inc/dashboard-widget.php';

// Helpers
require get_template_directory() . '/inc/dev-helpers.php';


/**
 * Development tools
 */

// Remove default CSS variables
// require get_template_directory() . '/inc/dev-remove-defaults.php';

// Purge theme cache
require get_template_directory() . '/inc/dev-purge-themes-cache.php';
