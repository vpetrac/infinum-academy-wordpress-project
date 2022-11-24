<?php

/**
 * Display regular index/home page
 *
 * @package Esseker
 */

use EssekerVendor\EightshiftLibs\Helpers\Components;

get_header();

$archiveContent = '';
$postTypeObject = get_post_type_object(get_post_type());

$blockClass = 'layout-archive';

if (have_posts()) {
	ob_start();
	while (have_posts()) {
		the_post();
		$postDate = get_the_date('d.m.Y');
		$postTime = get_the_date('H:i');
		echo Components::render(
			'card-post',
			[
				'introContent' => "{$postDate} @ {$postTime}",
				'headingContent' => get_the_title(),
				'paragraphContent' => get_the_excerpt(),
				'imageUrl' => get_the_post_thumbnail_url('', 'medium-square'),
				'cardPostTags' => get_the_tags(),
				'cardPostUrl' => get_permalink(),
			],
			'',
			true
		);
	}
	$archiveContent = ob_get_clean();
}

echo Components::render(
	'layout-archive',
	[
	'layoutArchiveIntro' => [
			Components::render(
				'heading',
				[
				'headingContent' => __("Latest posts", "esseker-theme"),
				'blockClass' => $blockClass,
				'headingSize' => 'big'
				],
				'',
				true
			)
	],
		'layoutArchiveRowItems' => 3,
		'layoutArchiveItems' => $archiveContent ?? '',
	]
);

get_footer();
