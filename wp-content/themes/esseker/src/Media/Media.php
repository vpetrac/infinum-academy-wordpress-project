<?php

/**
 * The Media specific functionality.
 *
 * @package Esseker\Media
 */

declare(strict_types=1);

namespace Esseker\Media;

use EssekerVendor\EightshiftLibs\Media\AbstractMedia;

/**
 * Class Media
 *
 * This class handles all media options. Sizes, Types, Features, etc.
 */
class Media extends AbstractMedia
{
	/**
	 * Register all the hooks
	 *
	 * @return void
	 */
	public function register(): void
	{
		\add_action('after_setup_theme', [$this, 'addThemeSupport'], 20);
		\add_action('after_setup_theme', [$this, 'addCustomImageSize'], 20);
		\add_filter('image_size_names_choose', [$this, 'mediaCustomSizes']);

		// WebP.
		if (\extension_loaded('gd')) {
			\add_filter('wp_generate_attachment_metadata', [$this, 'generateWebPMedia'], 10, 2);
			\add_filter('wp_update_attachment_metadata', [$this, 'generateWebPMedia'], 10, 2);
			\add_action('delete_attachment', [$this, 'deleteWebPMedia']);
		}
	}


	/**
	 * Enable theme support
	 *
	 * For full list check: https://developer.wordpress.org/reference/functions/add_theme_support/
	 *
	 * @return void
	 */
	public function addThemeSupport(): void
	{
		\add_theme_support('title-tag');
		\add_theme_support('html5', ['style', 'script']);
		// Enables HTML5 markup support and explicitly states support for script and style tags, so WP doesn't insert the type attribute on those tags.
		// Registering the type attribute is not compliant with the HTML5 specification.
		\add_theme_support('post-thumbnails');
	}


	/**
	 * Custom image size support
	 *
	 * For details check: https://developer.wordpress.org/reference/functions/add_image_size/
	 *
	 * @return void
	 */
	public function addCustomImageSize(): void
	{
		\add_image_size('medium-square', 600, 600, true);
	}



	/**
	 * Media Library Image Custom Size
	 *
	 * For details check: https://developer.wordpress.org/reference/functions/add_image_size/
	 *
	 * @param array $sizes WP Image sizes array.
	 *
	 * @return array
	 */
	public function mediaCustomSizes($sizes): array  /* @phpstan-ignore-line */
	{
		return \array_merge($sizes, [
			'medium-square' => \__('Medium Square'),
		]);
	}
}
