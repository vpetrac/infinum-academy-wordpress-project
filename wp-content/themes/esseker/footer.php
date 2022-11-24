<?php

/**
 * Display footer
 *
 * @package Esseker
 */

use EssekerVendor\EightshiftLibs\Helpers\Components;

?>

</main>

<?php
echo Components::render(
	'layout-three-columns',
	[
		'layoutThreeColumnsAriaRole' => 'contentinfo',
		'additionalClass' => 'footer',
		'layoutThreeColumnsRight' => Components::render(
			'copyright',
			[
				'copyrightBy' => esc_html__('Eightshift', 'esseker'),
				'copyrightYear' => gmdate('Y'),
				'copyrightContent' => esc_html__('Made with 🧡  by Team Eightshift', 'esseker'),
			]
		),
		'layoutThreeColumnsLeft' => Components::render(
			'menu',
			[
				'variation' => 'horizontal',
				'menu' => 'footer_main_nav'
			]
		),
	]
);

wp_footer();
?>
</body>
</html>
