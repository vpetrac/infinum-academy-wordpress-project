import React from 'react';
import { checkAttr, getAttrKey, props, getOptions, LinkToolbarButton } from '@eightshift/frontend-libs/scripts';
import { HeadingToolbar } from '../../heading/components/heading-toolbar';
import manifest from '../manifest.json';

export const CardOverlayToolbar = (attributes) => {
	const {
		title: manifestTitle,
	} = manifest;

	const {
		setAttributes,
		label = manifestTitle,

		showCardOverlayUrl = true,
	} = attributes;

	const cardOverlayUrl = checkAttr('cardOverlayUrl', attributes, manifest);
	const cardOverlayUrlIsNewTab = checkAttr('cardOverlayUrlIsNewTab', attributes, manifest);

	return (
		<>
			<HeadingToolbar
				{...props('heading', attributes, {
					options: getOptions(attributes, manifest),
				})}
			/>

			{showCardOverlayUrl &&
				<LinkToolbarButton
					url={cardOverlayUrl}
					opensInNewTab={cardOverlayUrlIsNewTab}
					setAttributes={setAttributes}
					urlAttrName={getAttrKey('cardOverlayUrl', attributes, manifest)}
					isNewTabAttrName={getAttrKey('cardOverlayUrlIsNewTab', attributes, manifest)}
					title={label}
				/>
			}
		</>
	);
};
