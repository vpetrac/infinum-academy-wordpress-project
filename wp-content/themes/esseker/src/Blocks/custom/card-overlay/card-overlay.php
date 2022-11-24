<?php

/**
 * Template for the Card Block.
 *
 * @package Esseker
 */

use EssekerVendor\EightshiftLibs\Helpers\Components;

echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'card-overlay',
	Components::props('card-overlay', $attributes)
);
