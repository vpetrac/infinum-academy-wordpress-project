import React from 'react';
import { __ } from '@wordpress/i18n';
import { ColorPaletteCustom, ComponentUseToggle, IconLabel, CustomSelect, checkAttr, getAttrKey, icons, getOption } from '@eightshift/frontend-libs/scripts';
import manifest from './../manifest.json';

export const ParagraphOptions = (attributes) => {
	const {
		title: manifestTitle,
	} = manifest;

	const {
		setAttributes,
		label = manifestTitle,
		paragraphShowControls = true,

		showParagraphUse = false,
		showLabel = false,
		showParagraphColor = true,
		showParagraphSize = true,
		showParagraphFontFamily = true,
		showParagraphWeight = true
	} = attributes;

	if (!paragraphShowControls) {
		return null;
	}

	const paragraphUse = checkAttr('paragraphUse', attributes, manifest);
	const paragraphColor = checkAttr('paragraphColor', attributes, manifest);
	const paragraphSize = checkAttr('paragraphSize', attributes, manifest);
	const paragraphFontFamily = checkAttr('paragraphFontFamily', attributes, manifest);
	const paragraphWeight = checkAttr('paragraphWeight', attributes, manifest);

	return (
		<>
			<ComponentUseToggle
				label={label}
				checked={paragraphUse}
				onChange={(value) => setAttributes({ [getAttrKey('paragraphUse', attributes, manifest)]: value })}
				showUseToggle={showParagraphUse}
				showLabel={showLabel}
			/>

			{paragraphUse &&
				<>
					{showParagraphColor &&
						<ColorPaletteCustom
							label={<IconLabel icon={icons.color} label={__('Color', 'esseker')} />}
							colors={getOption('paragraphColor', attributes, manifest, true)}
							value={paragraphColor}
							onChange={(value) => setAttributes({ [getAttrKey('paragraphColor', attributes, manifest)]: value })}
						/>
					}

					{showParagraphSize &&
						<CustomSelect
							label={<IconLabel icon={icons.textSize} label={__('Text size', 'esseker')} />}
							value={paragraphSize}
							options={getOption('paragraphSize', attributes, manifest)}
							onChange={(value) => setAttributes({ [getAttrKey('paragraphSize', attributes, manifest)]: value })}
							isClearable={false}
							isSearchable={false}
							simpleValue
						/>
					}

					{showParagraphFontFamily &&
						<CustomSelect
							label={<IconLabel icon={icons.fontFamily} label={__('Font Family', 'eightshift-theme')} />}
							value={paragraphFontFamily}
							options={getOption('paragraphFontFamily', attributes, manifest)}
							onChange={(value) => setAttributes({ [getAttrKey('paragraphFontFamily', attributes, manifest)]: value })}
							isClearable={false}
							isSearchable={false}
							simpleValue
            />
        }
					{showParagraphWeight &&
						<CustomSelect
							label={<IconLabel icon={icons.textSize} label={__('Font weight', 'esseker')} />}
							value={paragraphWeight}
							options={getOption('paragraphWeight', attributes, manifest)}
							onChange={(value) => setAttributes({ [getAttrKey('paragraphWeight', attributes, manifest)]: value })}
							isClearable={false}
							isSearchable={false}
							simpleValue
						/>
					}
				</>
			}

		</>
	);
};
