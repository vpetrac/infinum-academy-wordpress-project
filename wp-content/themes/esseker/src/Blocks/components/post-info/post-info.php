<?php

/**
 * Template for the Post Info Component.
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

$postId = Components::checkAttr('postId', $attributes, $manifest);
$postDate = Components::checkAttr('postDate', $attributes, $manifest);
$postTime = Components::checkAttr('postTime', $attributes, $manifest);
$postAuthor = Components::checkAttr('postAuthor', $attributes, $manifest);
$postReadingTime = Components::checkAttr('postReadingTime', $attributes, $manifest);
$postTags = Components::checkAttr('postTags', $attributes, $manifest);

$unique = Components::getUnique();

$postInfoClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
	Components::selector($additionalClass, $additionalClass),
]);

?>

<div class="<?php echo esc_attr($postInfoClass); ?>" data-id="<?php echo esc_attr($unique); ?>">
	<?php
	echo Components::outputCssVariables($attributes, $manifest, $unique, $globalManifest);
	?>
	
	<ul class="<?php echo esc_attr("{$componentClass}__details") ?>"> 
		<li><?php echo esc_html($postDate) ?>@<?php echo esc_html($postTime) ?></li> 
		<li>
			<?php
			echo __('By:', 'esseker-theme') . ' ' . esc_html($postAuthor); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?>
		</li>
		<li>
			<?php
			echo __('Estimated reading time:', 'esseker-theme') . ' ' . esc_html($postReadingTime) . // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			' ' . __('min', 'esseker-theme'); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?> 
		</li>
	</ul>
	
	<?php

	if ($postTags) {
		?>
	<ul class="<?php echo esc_attr("{$componentClass}__tags") ?>"> 
		<?php

		foreach ($postTags as $key => $item) {
			?>
			<li> <?php echo esc_html($item->name) ?></li>
			<?php
		}

		?>
	</ul>
	<?php } ?>
</div>