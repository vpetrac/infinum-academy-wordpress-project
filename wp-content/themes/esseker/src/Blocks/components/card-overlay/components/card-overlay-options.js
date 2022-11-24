import React from 'react';
import { props, getOptions } from '@eightshift/frontend-libs/scripts';
import { ImageOptions } from '../../image/components/image-options';
import { HeadingOptions } from '../../heading/components/heading-options';
import { ParagraphOptions } from '../../paragraph/components/paragraph-options';
import manifest from '../manifest.json';

export const CardOverlayOptions = (attributes) => {
	return (
		<>
			<ImageOptions
				{...props('image', attributes)}
				showImageUse
				showLabel
			/>

			<HeadingOptions
				{...props('heading', attributes, {
					options: getOptions(attributes, manifest),
				})}
				showHeadingUse
				showLabel
			/>

			<ParagraphOptions
				{...props('paragraph', attributes, {
					options: getOptions(attributes, manifest),
				})}
				showParagraphUse
				showLabel
			/>

		</>
	);
};
