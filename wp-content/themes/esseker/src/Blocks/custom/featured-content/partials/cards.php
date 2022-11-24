<?php

/**
 * Template for the Featured Content view - Card content map from ID.
 *
 * @package Esseker
 */

use EssekerVendor\EightshiftLibs\Helpers\Components;

$items = $attributes['items'] ?? [];

$output = [];

if (!$items) {
	return $output;
}

foreach ($items as $item) {
	if (is_int($item)) {
		$attributes = [
			'cardHeadingContent' => get_the_title($item),
			'cardParagraphContent' => get_the_excerpt($item),
			'cardButtonUrl' => get_the_permalink($item),
			'cardButtonContent' => __('View More', 'esseker'),
			'cardImageUrl' => get_the_post_thumbnail_url($item, 'large'),
			'blockSsr' => $attributes['blockSsr'],
		];
	} else {
		$authors = '';

		foreach ($item['authors'] as $key => $value) {
			$authors .= $value['name'] . '<br>';
		}

		$attributes = [
			'cardHeadingContent' => $item['title'],
			'cardParagraphContent' => $authors,
			'cardButtonUse' => false,
			'cardImageUrl' => $item['formats']['image/jpeg'],
			'blockSsr' => $attributes['blockSsr'],
		];
	}

	echo Components::render(
		'card',
		Components::props(
			'card',
			$attributes,
		),
		'',
		true
	);
}
