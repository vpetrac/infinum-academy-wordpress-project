import React from 'react';
import { __ } from '@wordpress/i18n';
import { PanelBody } from '@wordpress/components';
import { props, getOptions } from '@eightshift/frontend-libs/scripts';
import { CardOverlayOptions as CardOverlayOptionsComponent } from '../../../components/card-overlay/components/card-overlay-options';
import manifest from './../manifest.json';

export const CardOverlayOptions = ({ attributes, setAttributes }) => {
	return (
		<PanelBody title={__('Card Overlay', 'esseker')}>
			<CardOverlayOptionsComponent
				{...props('card-overlay', attributes, {
					setAttributes,
					options: getOptions(attributes, manifest),
				})}
			/>
		</PanelBody>
	);
};
