<?php

/**
 * Template for the Example Block view.
 *
 * @package Esseker
 */

use EssekerVendor\EightshiftLibs\Helpers\Components;

$globalManifest = Components::getManifest(dirname(__DIR__, 2));
$manifest = Components::getManifest(__DIR__);
$blockClass = $attributes['blockClass'] ?? '';
$unique = Components::getUnique();

$itemContentClass = Components::selector($blockClass, $blockClass, 'item');

?>

<div class="<?php echo esc_attr($blockClass); ?>">
	<?php
		echo Components::outputCssVariables($attributes, $manifest, $unique, $globalManifest);
	?>
		<div class="<?php echo esc_attr($itemContentClass); ?>">
			<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('firstHeading', $attributes, [
					'blockClass' => $blockClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('firstParagraph', $attributes, [
					'blockClass' => $blockClass
				])
			)
			?>
	</div>

	<div class="<?php echo esc_attr($itemContentClass); ?>">
			<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('secondHeading', $attributes, [
					'blockClass' => $blockClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('secondParagraph', $attributes, [
					'blockClass' => $blockClass
				])
			)
			?>
	</div>

	<div class="<?php echo esc_attr($itemContentClass); ?>">
			<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('thirdHeading', $attributes, [
					'blockClass' => $blockClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('thirdParagraph', $attributes, [
					'blockClass' => $blockClass
				])
			)
			?>
	</div>

	<div class="<?php echo esc_attr($itemContentClass); ?>">
			<?php
			echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'heading',
				Components::props('fourthHeading', $attributes, [
					'blockClass' => $blockClass
				])
			),

			Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'paragraph',
				Components::props('fourthParagraph', $attributes, [
					'blockClass' => $blockClass
				])
			)
			?>
	</div>
</div>
