<?php

/**
 * Layout component - Single Post Layout.
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

$layoutSingleHeader = Components::checkAttr('layoutSingleHeader', $attributes, $manifest);
$layoutSingleFeatured = Components::checkAttr('layoutSingleFeatured', $attributes, $manifest);
$layoutSingleMeta = Components::checkAttr('layoutSingleMeta', $attributes, $manifest);
$layoutSingleMainContent = Components::checkAttr('layoutSingleMainContent', $attributes, $manifest);
$layoutSingleSidebar = Components::checkAttr('layoutSingleSidebar', $attributes, $manifest);
$layoutSingleTag = Components::checkAttr('layoutSingleTag', $attributes, $manifest);




$layoutSingleClass = Components::classnames([
	Components::selector($componentClass, $componentClass),
	Components::selector($blockClass, $blockClass, $selectorClass),
	Components::selector($additionalClass, $additionalClass),
]);

?>

<<?php echo esc_attr($layoutSingleTag); ?>
	class="<?php echo esc_attr("{$layoutSingleClass}") ?>"
	data-id="<?php echo esc_attr("{$unique}") ?>"
>
	<?php echo Components::outputCssVariables($attributes, $manifest, $unique, $globalManifest); ?>
	<div class="<?php echo esc_attr("{$componentClass}__wrap") ?>"> 

		<div class="<?php echo esc_attr("{$componentClass}__header") ?>">
			<?php
				echo Components::ensureString($layoutSingleHeader); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?> 
		</div>
	</div>

		<div class="<?php echo esc_attr("{$componentClass}__featured") ?>">
			<?php
				echo Components::ensureString($layoutSingleFeatured); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?>
		</div>
	<div class="<?php echo esc_attr("{$componentClass}__wrap") ?>"> 
		<div class="<?php echo esc_attr("{$componentClass}__meta") ?>">
			<?php
				echo Components::ensureString($layoutSingleMeta); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped 
			?>
		</div>

		<div class="<?php echo esc_attr("{$componentClass}__main-content") ?>">
			<?php
				echo Components::ensureString($layoutSingleMainContent); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped 
			?>
		</div>

		<div class="<?php echo esc_attr("{$componentClass}__sidebar") ?>">
			<?php
				echo Components::ensureString($layoutSingleSidebar); // phpcs:ignore Eightshift.Security.ComponentsEscape.OutputNotEscaped
			?>
		</div>


	</div>
</<?php echo esc_attr($layoutSingleTag); ?>