import { useBlockProps, BlockControls, InspectorControls, HeadingLevelDropdown, RichText } from '@wordpress/block-editor';
import { Panel, PanelBody, ToggleControl } from '@wordpress/components';
import SelectControlType from '../components/SelectControlType.js';

export default function Edit( { attributes, setAttributes } ) {

	const classForType = attributes.type ? ' fr-badge--' + attributes.type : '';
	const blockProps = useBlockProps({className: 'fr-alert' + classForType});

	return (
		<div { ...blockProps }>
			<InspectorControls key="setting">
				<Panel>
					<PanelBody initialOpen={false} title='Options'>
						<SelectControlType attributes={attributes} setAttributes={setAttributes} />
					</PanelBody>
				</Panel>
			</InspectorControls>
			<BlockControls group="block">
				<HeadingLevelDropdown
					value={ attributes.level }
					options={ attributes.levelOptions }
					onChange={ newLevel => setAttributes( { level: newLevel } )	}
				/>
			</BlockControls>
			<RichText
				className='fr-alert__title'
				tagName={ 'h3' }
				onChange={ ( newTitle ) => setAttributes( { title: newTitle } ) }
				value={ attributes.title }
				placeholder="Alert title"
			/>
			<RichText
				{ ...blockProps }
				tagName='p'
				onChange={ ( newContent ) => setAttributes( { content: newContent } ) }
				value={ attributes.content }
				placeholder="Alert content"
			/>
		</div>
	);
}
