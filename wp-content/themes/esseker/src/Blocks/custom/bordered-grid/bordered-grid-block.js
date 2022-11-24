import React from 'react';
import { InspectorControls } from '@wordpress/block-editor';
import { BorderedGridEditor } from './components/bordered-grid-editor';
import { BorderedGridOptions } from './components/bordered-grid-options';

export const BorderedGrid = (props) => {
	return (
		<>
			<InspectorControls>
				<BorderedGridOptions {...props} />
			</InspectorControls>
			<BorderedGridEditor {...props} />
		</>
	);
};
