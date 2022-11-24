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
$additionalClass = $attributes['additionalClass'] ?? '';
$blockClass = $attributes['blockClass'] ?? '';
$selectorClass = $attributes['selectorClass'] ?? $componentClass;

$cardPostTags = Components::checkAttr('cardPostTags', $attributes, $manifest);
$cardPostUrl = Components::checkAttr('cardPostUrl', $attributes, $manifest);

$unique = Components::getUnique();

$cardPostClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
	Components::selector($additionalClass, $additionalClass),
]);

?>

<div class="<?php echo esc_attr($cardPostClass); ?>" data-id="<?php echo esc_attr($unique); ?>">
	<?php
	echo Components::outputCssVariables($attributes, $manifest, $unique, $globalManifest);
	?>
	<a href="<?php echo esc_attr($cardPostUrl); ?>">
	<?php
	echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'image',
		Components::props('image', $attributes, [
			'blockClass' => $componentClass,
		])
	);
	?>
	</a>
	<?php
	echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'paragraph',
		Components::props('intro', $attributes, [
			'selectorClass' => 'intro',
			'blockClass' => $componentClass
		])
	);
	?>
	<a href="<?php echo esc_attr($cardPostUrl); ?>">
	<?php
	echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'heading',
		Components::props('heading', $attributes, [
			'blockClass' => $componentClass
		])
	);
	?>
	</a>
	<?php
	echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'paragraph',
		Components::props('paragraph', $attributes, [
			'blockClass' => $componentClass
		])
	);

	if ($cardPostTags) {
		?>
	<ul class="<?php echo esc_attr("{$componentClass}__tags") ?>"> 
		<?php

		foreach ($cardPostTags as $key => $item) {
			?>
			<li> <?php echo esc_html($item->name) ?></li>
			<?php
		}

		?>
	</ul>
	<?php } ?>
</div>
