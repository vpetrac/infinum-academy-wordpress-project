import React from 'react';
import { props, getOptions } from '@eightshift/frontend-libs/scripts';
import { CardOverlayToolbar as CardOverlayToolbarComponent } from '../../../components/card-overlay/components/card-overlay-toolbar';
import manifest from './../manifest.json';

export const CardOverlayToolbar = ({ attributes, setAttributes }) => {
	return (
		<CardOverlayToolbarComponent
			{...props('card-overlay', attributes, {
				setAttributes,
				options: getOptions(attributes, manifest),
			})}
		/>
	);
};
