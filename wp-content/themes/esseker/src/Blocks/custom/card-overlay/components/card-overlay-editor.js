import React from 'react';
import { props } from '@eightshift/frontend-libs/scripts';
import { CardOverlayEditor as CardOverlayEditorComponent } from '../../../components/card-overlay/components/card-overlay-editor';

export const CardOverlayEditor = ({ attributes, setAttributes }) => {
	return (
		<CardOverlayEditorComponent
			{...props('card-overlay', attributes, {
				setAttributes,
			})}
		/>
	);
};
