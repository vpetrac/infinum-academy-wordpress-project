<?php

/**
 * File holding the Remote Request Interface
 *
 * @package Esseker\RemoteRequest;
 */

declare(strict_types=1);

namespace Esseker\RemoteRequest;

/**
 * RemoteRequest interface
 */
interface RemoteRequestInterface
{
	public function makeRequest(string $url, array $arguments); // @phpstan-ignore-line 
} 
