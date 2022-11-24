<?php

/**
 * Register post template.
 *
 * @package Esseker\Templates;
 */

declare(strict_types=1);

namespace Esseker\Templates;

use EssekerVendor\EightshiftLibs\Services\ServiceInterface;

/**
 * Register post template.
 */
class PostTemplate implements ServiceInterface
{
/**
 * Register all the hooks
 *
 * @return void
 */
	public function register(): void
	{
		\add_action('init', [$this, 'buildPostTemplate']);
	}
/**
 * Defines the template for posts
 *
 * @return void
 */
	public function buildPostTemplate(): void
	{
		$postObject = \get_post_type_object('post');
		if (!$postObject) {
			return;
		}
		$postObject->template = [
		[
		'eightshift-boilerplate/paragraph',
		[
		'paragraphParagraphColor' => 'black',
		],
		],
		[
		'eightshift-boilerplate/image',
		[
		'imageImageFull' => true,
		],
		],
		[
		'eightshift-boilerplate/heading',
		[
		'wrapperSpacingBottomInLarge' => 0,
		'headingHeadingSize' => 'big'
		],
		],
		[
		'eightshift-boilerplate/paragraph',
		[
		'paragraphParagraphColor' => 'black',
		'wrapperSpacingTopLarge' => -20
		],
		],
		[
		'eightshift-boilerplate/paragraph',
		[
		'paragraphParagraphColor' => 'black',
		],
		],
		];
	}
}
