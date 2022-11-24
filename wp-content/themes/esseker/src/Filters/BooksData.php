<?php

/**
 * The file that is an BooksData class.
 *
 * @package Esseker\Filters;
 */

declare(strict_types=1);

namespace Esseker\Filters;

use EssekerVendor\EightshiftLibs\Rest\RouteInterface;
use EssekerVendor\EightshiftLibs\Services\ServiceInterface;
use WP_REST_Request;

/**
 * BooksData class.
 */
class BooksData implements ServiceInterface
{
	public const BOOKS_DATA = 'books_data';

	/**
	 * Register all the hooks
	 *
	 * @return void
	 */
	public function register(): void
	{
		\add_filter(self::BOOKS_DATA, [$this, 'featuredBooksData'], 10);
	}

	/**
	 * Returns books data array
	 *
	 * @return array
	 */
	public function featuredBooksData() // @phpstan-ignore-line
	{
		$request = new WP_REST_Request(RouteInterface::READABLE, '/esseker/v1/books');
		$response = \rest_do_request($request);

		if ($response->is_error()) {
			$error = $response->as_error();
			$message = $error->get_error_messages();
			$errorData = $error->get_error_data();

			return \printf(\esc_html('API data error: %1$s %2$s'), \esc_html($message), \esc_html($errorData)); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped // @phpstan-ignore-line
		}

		$response = $response->get_data();
		return $response['results'];
	}
}
