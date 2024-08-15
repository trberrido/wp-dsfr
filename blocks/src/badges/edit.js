import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Edit( { attributes, setAttributes } ) {

	const MC_TEMPLATE = [ [ 'wpdsfr/badge', { 'content': 'Liberté', 'hasIcon': false } ] ];

	return ( <InnerBlocks template={ MC_TEMPLATE } { ...useBlockProps() } /> );

}
