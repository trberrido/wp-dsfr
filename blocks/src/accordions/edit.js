import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function Edit( { attributes, setAttributes } ) {

	const MC_TEMPLATE = [ [ 'wpdsfr/accordion', {} ] ];

	return ( <InnerBlocks template={ MC_TEMPLATE } { ...useBlockProps() } /> );

}
