<?php

/**
 * Template for the Quote Component.
 *
 * @package Esseker
 */

use EssekerVendor\EightshiftLibs\Helpers\Components;

$globalManifest = Components::getManifest(dirname(__DIR__, 2));
$manifest = Components::getManifest(__DIR__);

$quoteUse = Components::checkAttr('quoteUse', $attributes, $manifest);
if (!$quoteUse) {
	return;
}

$componentClass = $manifest['componentClass'] ?? '';
$additionalClass = $attributes['additionalClass'] ?? '';
$blockClass = $attributes['blockClass'] ?? '';
$selectorClass = $attributes['selectorClass'] ?? $componentClass;

$quoteClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
	Components::selector($additionalClass, $additionalClass),
]);

?>

<figure class="<?php echo esc_attr($quoteClass); ?>">
	
		<?php
		echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'image',
			Components::props('image', $attributes, [
				'blockClass' => $componentClass,
			])
		);
		?>

	<blockquote class="<?php echo esc_attr("{$componentClass}__content"); ?>">
		<?php
		echo Components::render(
			'paragraph',
			Components::props('quote', $attributes, [
				'blockClass' => $componentClass
			])
		);
		?>
	</blockquote>

	<div class="<?php echo esc_attr("{$componentClass}__separator"); ?>"></div>

	<figcaption class="<?php echo esc_attr("{$componentClass}__caption"); ?>">
		<?php
		echo Components::render(
			'paragraph',
			Components::props('attribution', $attributes, [
				'blockClass' => $componentClass
			])
		);
		?>
	</figcaption>
</figure>