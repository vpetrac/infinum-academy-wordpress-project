import React from 'react';
import { __ } from '@wordpress/i18n';
import { PanelBody } from '@wordpress/components';
import { getOptions, props } from '@eightshift/frontend-libs/scripts';
import { HeadingOptions } from '../../../components/heading/components/heading-options';
import { ParagraphOptions } from '../../../components/paragraph/components/paragraph-options';
import manifest from "./../manifest.json";

export const BorderedGridOptions = (attributes) => {
	return (
		<PanelBody title={__('Bordered Grid', 'esseker-theme')}>
			<HeadingOptions
				{...props('firstHeading', attributes, {
					options: getOptions(attributes, manifest),
				})}
				label={__('First Heading', 'esseker-theme')}
				showLabel
			/>
			<ParagraphOptions
				{...props('firstParagraph', attributes)}
				label={__('First Paragraph', 'esseker-theme')}
				showLabel
			/>
			<HeadingOptions
				{...props('secondHeading', attributes, {
					options: getOptions(attributes, manifest),
				})}
				label={__('Second Heading', 'esseker-theme')}
				showLabel
			/>
			<ParagraphOptions
				{...props('secondParagraph', attributes, {
					options: getOptions(attributes, manifest),
				})}
				label={__('Second Paragraph', 'esseker-theme')}
				showLabel
			/>
			<HeadingOptions
				{...props('thirdHeading', attributes, {
					options: getOptions(attributes, manifest),
				})}
				label={__('Third Heading', 'esseker-theme')}
				showLabel
			/>
			<ParagraphOptions
				{...props('thirdParagraph', attributes, {
					options: getOptions(attributes, manifest),
				})}
				label={__('Third Paragraph', 'esseker-theme')}
				showLabel
			/>
			<HeadingOptions
				{...props('fourthHeading', attributes, {
					options: getOptions(attributes, manifest),
				})}
				label={__('Fourth Heading', 'esseker-theme')}
				showLabel
			/>
			<ParagraphOptions
				{...props('fourthParagraph', attributes, {
					options: getOptions(attributes, manifest),
				})}
				label={__('Fourth Paragraph', 'esseker-theme')}
				showLabel
			/>
		</PanelBody>
	);
};
