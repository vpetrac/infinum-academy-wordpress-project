<?php

/**
 * Template for the Card Component.
 *
 * @package Esseker
 */

use EssekerVendor\EightshiftLibs\Helpers\Components;

$globalManifest = Components::getManifest(dirname(__DIR__, 2));
$manifest = Components::getManifest(__DIR__);

$componentClass = $manifest['componentClass'] ?? '';
$blockClass = $attributes['blockClass'] ?? '';

$unique = Components::getUnique();

$cardOverlayClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
]);

$cardOverlayContentClass = Components::selector($componentClass, $componentClass, 'content');

$cardOverlayUrl = Components::checkAttr('cardOverlayUrl', $attributes, $manifest);
$cardOverlayIsNewTab = Components::checkAttr('cardOverlayUrlIsNewTab', $attributes, $manifest);
$cardOverlayAttrs = (array)Components::checkAttr('cardOverlayAttrs', $attributes, $manifest);

if ($cardOverlayIsNewTab) {
	$cardOverlayAttrs = array_merge(
		[
			'target' => '_blank',
			'rel' => '"noopener noreferrer"',
		],
		$cardOverlayAttrs
	);
}

?>
<?php if (! $cardOverlayUrl) { ?>
<div class="<?php echo esc_attr($cardOverlayClass); ?>" data-id="<?php echo esc_attr($unique); ?>">
<?php } else { ?>
<a 
	class="<?php echo esc_attr($cardOverlayClass); ?>" 
	data-id="<?php echo esc_attr($unique); ?>"
	href="<?php echo esc_url($cardOverlayUrl); ?>"
	<?php
	foreach ($cardOverlayAttrs as $key => $value) {
			echo wp_kses_post("{$key}=" . $value . " ");
	}
	?>
>
<?php } ?>

	<?php
	echo Components::outputCssVariables($attributes, $manifest, $unique, $globalManifest);

	echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'image',
		Components::props('image', $attributes, [
			'blockClass' => $componentClass,
		])
	);
	?>

	<div class="<?php echo esc_attr($cardOverlayContentClass); ?>">
			<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('heading', $attributes, [
					'blockClass' => $componentClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('paragraph', $attributes, [
					'blockClass' => $componentClass
				])
			)
			?>
</div>
<?php if (!$cardOverlayUrl) { ?>
</div>
<?php } else { ?>
</a>
<?php } ?>