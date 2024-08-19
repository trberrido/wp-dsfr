import { Fragment } from '@wordpress/element';
import { InspectorControls, useBlockProps, RichText } from '@wordpress/block-editor';
import { Panel, PanelBody } from '@wordpress/components';
import SelectControlSize from '../components/SelectControlSize.js';

export default function Edit( { attributes, setAttributes } ) {

	const blockProps = useBlockProps({className: 'fr-logo fr-logo--' + attributes.size});

	return (
		<Fragment>
			<InspectorControls key="setting">
				<Panel>
					<PanelBody initialOpen={false} title='Options'>
						<SelectControlSize attributes={attributes} setAttributes={setAttributes} />
					</PanelBody>
				</Panel>
			</InspectorControls>
			<RichText
				{ ...blockProps }
				tagName='p'
				onChange={ ( content ) => setAttributes( { content } ) }
				value={ attributes.content }
			/>
		</Fragment>
	);

}