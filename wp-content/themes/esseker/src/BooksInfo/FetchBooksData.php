<?php

/**
 * File holding the FetchBooksData class
 *
 * @package Esseker\RemoteRequest;
 */

declare(strict_types=1);

namespace Esseker\BooksInfo;

use Esseker\RemoteRequest\RemoteRequestInterface;

/**
 * Class that will fetch the data from the Gutendex API
 *
 * Used API: https://gutendex.com/
 */
class FetchBooksData
{
/**
 * API URL
 *
 * @var string
 */
	private const API_URL = 'https://gutendex.com/books';
/**
 * @var RemoteRequestInterface
 */
	private RemoteRequestInterface $wpRemoteDataFetch;
	public function __construct(RemoteRequestInterface $wpRemoteDataFetch)
	{
		$this->wpRemoteDataFetch = $wpRemoteDataFetch;
	}
	public function getData() // @phpstan-ignore-line
	{
		$response = $this->wpRemoteDataFetch->makeRequest(self::API_URL, [
		'Content-Type' => 'application/json',
		]);
		return $response;
	}
}
