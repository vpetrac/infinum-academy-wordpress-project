import React, { useMemo } from 'react';
import classnames from 'classnames';
import { outputCssVariables, getUnique, props, selector } from '@eightshift/frontend-libs/scripts';
import { ImageEditor } from '../../image/components/image-editor';
import { HeadingEditor } from '../../heading/components/heading-editor';
import { ParagraphEditor } from '../../paragraph/components/paragraph-editor';
import manifest from '../manifest.json';
import globalManifest from '../../../manifest.json';

export const CardOverlayEditor = (attributes) => {
	const unique = useMemo(() => getUnique(), []);

	const {
		componentClass,
	} = manifest;

	const {
		selectorClass = componentClass,
		blockClass,
	} = attributes;

	const cardClass = classnames([
		selector(componentClass, componentClass),
		selector(blockClass, blockClass, selectorClass),
	]);

	return (
		<div className={cardClass} data-id={unique}>
			{outputCssVariables(attributes, manifest, unique, globalManifest)}

			<ImageEditor
				{...props('image', attributes, {
					blockClass: componentClass,
				})}
			/>
			<div className={`${componentClass}__content`}>
				<HeadingEditor
					{...props('heading', attributes, {
						blockClass: componentClass,
					})}
				/>

				<ParagraphEditor
					{...props('paragraph', attributes, {
						blockClass: componentClass,
					})}
				/>
			</div>
		</div>
	);
};
