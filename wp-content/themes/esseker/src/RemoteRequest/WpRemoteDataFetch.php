<?php

/**
 * The file that holds the FetchRemoteData class
 *
 * @package Esseker\RemoteRequest;
 */

declare(strict_types=1);

namespace Esseker\RemoteRequest;

/**
 * FetchRemoteData class
 *
 * A wrapper around the native WordPress wp_remote_request().
 */
class WpRemoteDataFetch implements RemoteRequestInterface
{

	/**
 	* makeRequest function
	*
	* @param $url string
	* @param $arguments array
	*
 	* @return string
 	*/
	public function makeRequest(string $url, array $arguments): string // @phpstan-ignore-line
	{
		$request = \wp_remote_request($url, $arguments);
		if (\is_wp_error($request)) {
			return \sprintf(
				\esc_html__('Error happened while making remote request: $1%1$s $2%2$s.', 'esseker-theme'),
				$request->get_error_code(),
				$request->get_error_message()
			);
		}
		return \wp_remote_retrieve_body($request);
	}
}
