<?php

/**
 * Enqueue frontend and editor styles.
 *
 * @package withkit
 */

/**
 * Enqueue global CSS and JavaScript for both the frontend and editor.
 */
function withkit_enqueue_scripts()
{
	// Enqueue the global CSS.
	$global_style_path   = get_template_directory_uri() . '/build/css/global.css';
	$global_style_asset  = require get_template_directory() . '/build/css/global.asset.php';

	wp_enqueue_style(
		'withkit-global-style',
		$global_style_path,
		$global_style_asset['dependencies'],
		$global_style_asset['version']
	);

	// Enqueue the global JavaScript.
	$global_script_path   = get_template_directory_uri() . '/build/js/global.js';
	$global_script_asset  = require get_template_directory() . '/build/js/global.asset.php';

	wp_enqueue_script(
		'withkit-global-script',
		$global_script_path,
		$global_script_asset['dependencies'],
		$global_script_asset['version'],
		true
	);
}
add_action('enqueue_block_assets', 'withkit_enqueue_scripts');

/**
 * Enqueue the screen CSS for the frontend.
 */
function withkit_enqueue_frontend_styles()
{
	$screen_style_path   = get_template_directory_uri() . '/build/css/screen.css';
	$screen_style_asset  = require get_template_directory() . '/build/css/screen.asset.php';

	wp_enqueue_style(
		'withkit-screen-style',
		$screen_style_path,
		$screen_style_asset['dependencies'],
		$screen_style_asset['version']
	);
}
add_action('wp_enqueue_scripts', 'withkit_enqueue_frontend_styles');

/**
 * Remove the withkit_enqueue_editor_styles function and its add_action, and replace with add_editor_style for block editor CSS
 */
add_action( 'after_setup_theme', function() {
	add_editor_style( 'build/css/editor.css' );
} );

/**
 * 1. Collect everything that is actually rendered.
 */
add_filter('render_block', 'withkit_collect_used_blocks', 10, 2);

function withkit_collect_used_blocks(string $block_content, array $block): string
{
	static $collected = [
		'blocks' => [],
		'styles' => [],
	];

	if (empty($block['blockName'])) {
		return $block_content;
	}

	$block_name = $block['blockName'];

	// Collect block names.
	if (! in_array($block_name, $collected['blocks'], true)) {
		$collected['blocks'][] = $block_name;
	}

	// Collect style variations.
	if (
		! empty($block['attrs']['className'])
		&& preg_match('/\bis-style-([a-z0-9\-]+)\b/', $block['attrs']['className'], $m)
	) {
		$style_slug = $m[1];

		if (! isset($collected['styles'][$block_name])) {
			$collected['styles'][$block_name] = [];
		}

		if (! in_array($style_slug, $collected['styles'][$block_name], true)) {
			$collected['styles'][$block_name][] = $style_slug;
		}
	}

	$GLOBALS['withkit_used_blocks'] = $collected;
	return $block_content;
}

/**
 * 2. Enqueue the collected block‐ and style‐variation CSS
 */
add_action('enqueue_block_assets', 'withkit_enqueue_block_styles', 20);

function withkit_enqueue_block_styles(): void
{
	$used = $GLOBALS['withkit_used_blocks'] ?? [];

	if (empty($used['blocks'])) {
		return;
	}

	$base_dir    = trailingslashit(get_theme_file_path('build/css/blocks'));
	$base_url    = trailingslashit(get_theme_file_uri('build/css/blocks'));
	$styles_dir  = trailingslashit(get_theme_file_path('build/css/block-styles'));
	$styles_url  = trailingslashit(get_theme_file_uri('build/css/block-styles'));

	// Base block styles.
	foreach ($used['blocks'] as $block_name) {
		$slug = str_replace('/', '-', $block_name); // core/cover → core-cover
		$path = "{$base_dir}{$slug}.css";

		if (file_exists($path)) {
			wp_enqueue_style(
				"withkit-block-style-{$slug}",
				"{$base_url}{$slug}.css",
				[],
				filemtime($path)
			);
		}
	}

	// Style variations.
	if (! empty($used['styles'])) {
		foreach ($used['styles'] as $block_name => $variations) {
			$block_slug = str_replace('/', '-', $block_name);

			foreach ($variations as $style_slug) {
				$path = "{$styles_dir}{$style_slug}/{$block_slug}.css";

				if (file_exists($path)) {
					wp_enqueue_style(
						"withkit-block-style-{$block_slug}-{$style_slug}",
						"{$styles_url}{$style_slug}/{$block_slug}.css",
						[],
						filemtime($path)
					);
				}
			}
		}
	}
}
/**
 * Enqueue ALL block & variation styles into every block-based editor,
 * including the Site Editor.
 */
function withkit_enqueue_all_block_styles_in_editor(): void {
	// Skip the public frontend.
	if ( ! is_admin() ) {
		return;
	}

	$dir_base   = get_theme_file_path( 'build/css/blocks' );
	$url_base   = get_theme_file_uri( 'build/css/blocks' );
	$dir_styles = get_theme_file_path( 'build/css/block-styles' );
	$url_styles = get_theme_file_uri( 'build/css/block-styles' );

	// 1) Base block CSS.
	foreach ( glob( $dir_base . '/*.css' ) as $file ) {
		$slug = basename( $file, '.css' );
		wp_enqueue_style(
			"withkit-block-style-{$slug}",
			"{$url_base}/{$slug}.css",
			[],
			filemtime( $file )
		);
	}

	// 2) Variation CSS: build/css/block-styles/{variation}/{block-slug}.css
	foreach ( glob( $dir_styles . '/*/*.css' ) as $file ) {
		$rel               = str_replace( $dir_styles . '/', '', $file ); // "duotone/core-cover.css"
		list( $variation, $css_file ) = explode( '/', $rel, 2 );          // [ "duotone", "core-cover.css" ]
		$block             = basename( $css_file, '.css' );
		wp_enqueue_style(
			"withkit-block-style-{$block}-{$variation}",
			"{$url_styles}/{$variation}/{$block}.css",
			[],
			filemtime( $file )
		);
	}
}

// Page/post editors.
add_action( 'enqueue_block_editor_assets', 'withkit_enqueue_all_block_styles_in_editor', 5 );
// Site Editor (template & template-part editing).
add_action( 'enqueue_block_assets',       'withkit_enqueue_all_block_styles_in_editor', 5 );
