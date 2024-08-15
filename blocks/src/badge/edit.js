import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Edit( { attributes, setAttributes } ) {
	const blockProps = useBlockProps();

	return (
		<RichText
			{ ...blockProps }
			tagName='p'
			onChange={ ( content ) => setAttributes( { content: content } ) }
			value={ attributes.content }
		/>
	);
}
