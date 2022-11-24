<?php

/**
 * Layout component - Layout Archive.
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

$unique = Components::getUnique();

$layoutArchiveIntro = Components::checkAttr('layoutArchiveIntro', $attributes, $manifest);
$layoutArchiveItems = Components::checkAttr('layoutArchiveItems', $attributes, $manifest);
$layoutArchiveTag = Components::checkAttr('layoutArchiveTag', $attributes, $manifest);
$layoutArchiveRowItems = Components::checkAttr('layoutArchiveRowItems', $attributes, $manifest);
$layoutArchiveLoadMoreId = Components::checkAttr('layoutArchiveLoadMoreId', $attributes, $manifest);

$layoutArchiveClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
	Components::selector($additionalClass, $additionalClass),
]);

?>

<<?php echo esc_attr($layoutArchiveTag); ?>
	class="<?php echo esc_attr("{$layoutArchiveClass}") ?>"
	data-id="<?php echo esc_attr("{$unique}") ?>"
	data-layout-row-items="<?php echo esc_attr("{$layoutArchiveRowItems}") ?>"
>
	<?php echo Components::outputCssVariables($attributes, $manifest, $unique, $globalManifest); ?>
	<div class="<?php echo esc_attr("{$componentClass}__wrap") ?>"> 

		<div class="<?php echo esc_attr("{$componentClass}__intro") ?>">
			<?php
				echo Components::ensureString($layoutArchiveIntro); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?>
		</div>

		<div 
			class="<?php echo esc_attr("{$componentClass}__items") ?>"
			data-load-more-id="<?php echo esc_attr($layoutArchiveLoadMoreId) ?>"
		>
			<?php
				echo Components::ensureString($layoutArchiveItems); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?>
		</div>

	</div>
</<?php echo esc_attr($layoutArchiveTag); ?>