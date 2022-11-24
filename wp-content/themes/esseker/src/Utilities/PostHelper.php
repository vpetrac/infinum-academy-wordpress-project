<?php

/**
 * The file that is an PostHelper class.
 *
 * @package Esseker\Utilities;
 */

declare(strict_types=1);

namespace Esseker\Utilities;

/**
 * PostHelper class.
 */
class PostHelper
{
	/**
	 * Returns reading time for selected content in minutes
	 *
	 * @param string $content Content for time reading evaluation.
	 *
	 * @return float
	 */
	public static function readingTimeMinutes($content)
	{
		$wordCount = \str_word_count(\wp_strip_all_tags($content));
		$readingtime = \ceil($wordCount / 200);

		return $readingtime;
	}
}
