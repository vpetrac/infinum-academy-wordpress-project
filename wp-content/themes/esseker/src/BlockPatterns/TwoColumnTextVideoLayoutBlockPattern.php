<?php

/**
 * File that holds base class for block pattern.
 *
 * @package EightshiftLibs\BlockPatterns
 */

declare(strict_types=1);

namespace Esseker\BlockPatterns;

use EssekerVendor\EightshiftLibs\BlockPatterns\AbstractBlockPattern;

/**
 * TwoColumnTextVideoLayoutBlockPattern class.
 */
class TwoColumnTextVideoLayoutBlockPattern extends AbstractBlockPattern
{
	/**
	 * Get the pattern categories.
	 *
	 * @return array<string> Array of categories.
	 */
	protected function getCategories(): array
	{
		return [];
	}

	/**
	 * Get the pattern keywords.
	 *
	 * @return array<string> Array of keywords.
	 */
	protected function getKeywords(): array
	{
		return [];
	}

	/**
	 * Get the pattern name with namespace.
	 * Example: eightshift/pattern-name
	 *
	 * @return string Pattern name.
	 */
	protected function getName(): string
	{
		return 'two-column-text-video-layout';
	}

	/**
	 * Get the pattern title that is shown in the pattern selector.
	 *
	 * @return string Pattern title.
	 */
	protected function getTitle(): string
	{
		return 'Two Column Text Video Layout';
	}

	/**
	 * Get the pattern description.
	 *
	 * @return string Pattern description.
	 */
	protected function getDescription(): string
	{
		return 'Two columns with text on left, and video on the right side';
	}

	/**
	 * Get the pattern content.
	 * NOTE: While returning the pattern content set it inside double quotes ("")
	 * to avoid formatting issues.
	 *
	 * @return string Pattern content.
	 */
	protected function getContent(): string
	{
		return '<!-- wp:eightshift-boilerplate/columns -->
		<!-- wp:eightshift-boilerplate/column {"columnWidthLarge":6,"columnVerticalAlignLarge":"center"} -->
		<!-- wp:eightshift-boilerplate/heading {"wrapperUseSimple":true} /-->
		
		<!-- wp:eightshift-boilerplate/paragraph {"wrapperUseSimple":true} /-->
		
		<!-- wp:eightshift-boilerplate/button {"wrapperUseSimple":true} /-->
		<!-- /wp:eightshift-boilerplate/column -->
		
		<!-- wp:eightshift-boilerplate/column {"columnWidthLarge":6,"columnVerticalAlignLarge":"center"} -->
		<!-- wp:eightshift-boilerplate/video {"wrapperUseSimple":true} /-->
		<!-- /wp:eightshift-boilerplate/column -->
		<!-- /wp:eightshift-boilerplate/columns -->';
	}
}
