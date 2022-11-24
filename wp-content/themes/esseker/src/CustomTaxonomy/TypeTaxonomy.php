<?php

/**
 * The Blog_Taxonomy specific functionality.
 *
 * @package Esseker\CustomTaxonomy
 */

declare(strict_types=1);

namespace Esseker\CustomTaxonomy;

use Esseker\CustomPostType\EventPostType;
use EssekerVendor\EightshiftLibs\CustomTaxonomy\AbstractTaxonomy;

/**
 * Class TypeTaxonomy
 */
class TypeTaxonomy extends AbstractTaxonomy
{
	/**
	 * Taxonomy slug constant.
	 *
	 * @var string
	 */
	public const TAXONOMY_SLUG = 'type';

	/**
	 * Taxonomy post type slug constant.
	 *
	 * @var string
	 */
	public const TAXONOMY_POST_TYPE_SLUG = EventPostType::POST_TYPE_SLUG;

	/**
	 * Rest API Endpoint slug constant.
	 *
	 * @var string
	 */
	public const REST_API_ENDPOINT_SLUG = 'types';

	/**
	 * Get the slug of the custom taxonomy
	 *
	 * @return string Custom taxonomy slug.
	 */
	protected function getTaxonomySlug(): string
	{
		return static::TAXONOMY_SLUG;
	}

	/**
	 * Get the post type slug(s) that use the taxonomy.
	 *
	 * @return string|array<string> Custom post type slug or an array of slugs.
	 */
	protected function getPostTypeSlug()
	{
		return self::TAXONOMY_POST_TYPE_SLUG;
	}

	/**
	 * Get the arguments that configure the custom taxonomy.
	 *
	 * @return array<mixed> Array of arguments.
	 */
	protected function getTaxonomyArguments(): array
	{
		$nouns = [
			\esc_html_x(
				'Type',
				'taxonomy upper case singular name',
				'esseker'
			),
			\esc_html_x(
				'type',
				'taxonomy lower case singular name',
				'esseker'
			),
			\esc_html_x(
				'Types',
				'taxonomy upper case plural name',
				'esseker'
			),
			\esc_html_x(
				'types',
				'taxonomy lower case plural name',
				'esseker'
			),
		];

		$labels = $this->getGeneratedLabels($nouns);

		return [
			'hierarchical' => true,
			'label' => $nouns[0],
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => false,
			'public' => true,
			'show_in_rest' => true,
			'query_var' => true,
			'rest_base' => static::REST_API_ENDPOINT_SLUG,
			'rewrite' => [
				'hierarchical' => true,
				'with_front' => false,
			],
		];
	}
}
