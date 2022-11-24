<?php

/**
 * The class register route for $className endpoint
 *
 * @package Esseker\Rest\Routes
 */

declare(strict_types=1);

namespace Esseker\Rest\Routes;

use Esseker\BooksInfo\FetchBooksData;
use Esseker\Config\Config;
use EssekerVendor\EightshiftLibs\Rest\Routes\AbstractRoute;
use EssekerVendor\EightshiftLibs\Rest\CallableRouteInterface;
use WP_REST_Request;

/**
 * Class BooksRoute
 */
class BooksRoute extends AbstractRoute implements CallableRouteInterface
{
/**
 * Instance that will fetch the data from the Gutendex API
 *
 * @var FetchBooksData
 */
	private FetchBooksData $fetchBooksData;

	private const BOOKS_TRANSIENT = 'books_transient';


	/**
	 * Instance that will fetch the data from the Gutendex API
	 *
	 * @param $fetchBooksData
	 */
	public function __construct(FetchBooksData $fetchBooksData)
	{
		$this->fetchBooksData = $fetchBooksData;
	}

	/**
	 * Method that returns project Route namespace.
	 *
	 * @return string Project namespace EssekerVendor\for REST route.
	 */
	protected function getNamespace(): string
	{
		return Config::getProjectRoutesNamespace();
	}

	/**
	 * Method that returns project route version.
	 *
	 * @return string Route version as a string.
	 */
	protected function getVersion(): string
	{
		return Config::getProjectRoutesVersion();
	}

	/**
	 * Get the base url of the route
	 *
	 * @return string The base URL for route you are adding.
	 */
	protected function getRouteName(): string
	{
		return '/books';
	}

	/**
	 * Get callback arguments array
	 *
	 * @return array Either an array of options for the endpoint, or an array of arrays for multiple methods.
	 */
	protected function getCallbackArguments(): array // @phpstan-ignore-line
	{
		return [
			'methods' => static::READABLE,
			'callback' => [$this, 'routeCallback'],
			'permission_callback' => '__return_true'
		];
	}

	/**
	 * Method that returns rest response
	 *
	 * @param WP_REST_Request $request Data got from endpoint url.
	 *
	 * @return WP_REST_Response|mixed If response generated an error, WP_Error, if response
	 *                                is already an instance, WP_HTTP_Response, otherwise
	 *                                returns a new WP_REST_Response instance.
	 */
	public function routeCallback(WP_REST_Request $request)
	{
		$cachedData = \get_transient(self::BOOKS_TRANSIENT);

		if ($cachedData !== false) {
			return $cachedData;
		}

		$response = $this->fetchBooksData->getData();

		$apiResposne = \json_decode($response, true);

		\set_transient(self::BOOKS_TRANSIENT, $apiResposne, \WEEK_IN_SECONDS);

		return \rest_ensure_response($apiResposne);
	}
}
