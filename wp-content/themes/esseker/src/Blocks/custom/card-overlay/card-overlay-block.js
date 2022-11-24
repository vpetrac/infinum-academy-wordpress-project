import React from 'react';
import { InspectorControls, BlockControls } from '@wordpress/block-editor';
import { CardOverlayEditor } from './components/card-overlay-editor';
import { CardOverlayToolbar } from './components/card-overlay-toolbar';
import { CardOverlayOptions } from './components/card-overlay-options';

export const CardOverlay = (props) => {
	return (
		<>
			<InspectorControls>
				<CardOverlayOptions {...props} />
			</InspectorControls>
			<BlockControls>
				<CardOverlayToolbar {...props} />
			</BlockControls>
			<CardOverlayEditor {...props} />
		</>
	);
};
