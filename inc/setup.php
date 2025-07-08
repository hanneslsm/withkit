<?php

/**
 * Setup
 *
 * @package withkit
 * @link https://developer.wordpress.org/themes/block-themes/block-theme-setup/
 */



if (!function_exists('withkit_setup')) :
	function withkit_setup()
	{
		// Make theme available for translation.
		load_theme_textdomain('withkit', get_template_directory() . '/languages');

		// Enqueue editor styles.
		add_editor_style('assets/css/editor-style.css');
	}
endif; // withkit_setup
add_action('after_setup_theme', 'withkit_setup');
