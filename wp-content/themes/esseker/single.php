<?php

/**
 * Single page for Posts
 *
 * @package Esseker
 */

use Esseker\Utilities\PostHelper;
use EssekerVendor\EightshiftLibs\Helpers\Components;

get_header();

$postContent = '';
$postTypeObject = get_post_type_object(get_post_type());

$blockClass = 'layout-single';

if (have_posts()) {
	while (have_posts()) {
		the_post();
		$postId = get_the_ID();
		$postDate = get_the_date('d.m.Y');
		$postTime = get_the_date('H:i');
		$postAuthor = get_the_author_meta('display_name');
		$postContent = apply_filters('the_content', get_post_field('post_content', $postId));
		$postReadingTime = PostHelper::readingTimeMinutes($postContent);
		$postTags = get_the_tags();
	}
}

echo Components::render(
	'layout-single',
	[
		'layoutSingleHeader' => [
			Components::render(
				'heading',
				[
				'headingContent' => get_the_title(),
				'headingSize' => 'huge',
				'blockClass' => $blockClass
				],
				'',
				true
			)
		],
		'layoutSingleFeatured' => [
			Components::render(
				'image',
				[
				'imageUrl' => get_the_post_thumbnail_url(),
				'imageFull' => true,
				'blockClass' => $blockClass
				],
				'',
				true
			)
		],
		'layoutSingleMeta' => [
			Components::render(
				'post-info',
				[
					'postId' => $postId,
					'postDate' => $postDate,
					'postTime' => $postTime,
					'postAuthor' => $postAuthor,
					'postReadingTime' => $postReadingTime,
					'postTags' => $postTags,
				],
				'',
				true
			)
		],
		'layoutSingleMainContent' => $postContent,
		'layoutSingleSidebar' => [
			Components::render(
				'share',
				[],
				'',
				true
			),
		],
	]
);

get_footer();
