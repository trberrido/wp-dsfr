import { Fragment } from '@wordpress/element';
import { InspectorControls, useBlockProps, RichText } from '@wordpress/block-editor';
import { Panel, PanelBody, ToggleControl } from '@wordpress/components';
import SelectControlType from '../components/SelectControlType.js';

export default function Edit( { attributes, setAttributes } ) {

	const classForType = attributes.type ? ' fr-badge--' + attributes.type : '';
	const classForIcon = attributes.hasIcon === false ? ' fr-badge--no-icon' : '';
	const blockProps = useBlockProps({className: 'fr-badge' + classForIcon + classForType});

	return (
		<Fragment>
			<InspectorControls key="setting">
				<Panel>
					<PanelBody initialOpen={false} title='Options'>
						<SelectControlType attributes={attributes} setAttributes={setAttributes} />
						<ToggleControl
							label='Display Icon'
							checked={ attributes.hasIcon }
							onChange={ ( newValue ) => setAttributes( { hasIcon: newValue } ) }
						/>
					</PanelBody>
				</Panel>
			</InspectorControls>
			<RichText
				{ ...blockProps }
				tagName='p'
				onChange={ ( content ) => setAttributes( { content: content } ) }
				value={ attributes.content }
			/>
		</Fragment>
	);
}
