import React from 'react';
import classnames from 'classnames';
import { checkAttr, props, selector } from '@eightshift/frontend-libs/scripts';
import { ImageEditor } from '../../image/components/image-editor';
import { ParagraphEditor } from '../../paragraph/components/paragraph-editor';
import manifest from './../manifest.json';

export const QuoteEditor = (attributes) => {

	const quoteUse = checkAttr('quoteUse', attributes, manifest);

	if (!quoteUse) {
		return null;
	}

	const {
		componentClass,
	} = manifest;

	const {
		selectorClass = componentClass,
		blockClass,
		additionalClass,
	} = attributes;

	const quoteClass = classnames([
		selector(componentClass, componentClass),
		selector(blockClass, blockClass, selectorClass),
		selector(additionalClass, additionalClass),
	]);

	const quoteContentClass = selector(componentClass, componentClass, 'content');
	const quoteSeparator = selector(componentClass, componentClass, 'separator');
	const quoteCaptionClass = selector(componentClass, componentClass, 'caption');

	return (
		<>
			<figure className={quoteClass}>

				<ImageEditor
					{...props('image', attributes, {
						blockClass: componentClass,
					})}
				/>
		
				<blockquote className={quoteContentClass}>
					<ParagraphEditor
						{...props('quote', attributes, {
							blockClass: componentClass,
						})}
					/>
				</blockquote>

				<div className={quoteSeparator}></div>

				<figcaption className={quoteCaptionClass}>
					<ParagraphEditor
						{...props('attribution', attributes, {
								blockClass: componentClass,
						})}
					/>
				</figcaption>
			</figure>
		</>
	);
};
