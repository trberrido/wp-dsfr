import { useBlockProps, RichText, InnerBlocks, BlockControls, HeadingLevelDropdown } from '@wordpress/block-editor';

export default function Edit( { attributes, setAttributes } ) {
	const blockProps = useBlockProps( {className: 'fr-accordion'} );
	const MC_TEMPLATE = [ [ 'core/paragraph', {} ] ];
	return (
		<section { ...blockProps }>
			<BlockControls group="block">
				<HeadingLevelDropdown
					value={ attributes.level }
					options={ attributes.levelOptions }
					onChange={ newLevel => setAttributes( { level: newLevel } )	}
				/>
			</BlockControls>
			<span className='fr-accordion__title'>
				<RichText
					className='fr-accordion__btn'
					tagName={ 'button' }
					onChange={ ( content ) => setAttributes( { content: content } ) }
					value={ attributes.content }
					placeholder="Item title"
				/>
			</span>
			<InnerBlocks
				className='wp-block-wpdsfr-accordion__content'
				template={ MC_TEMPLATE } />
		</section>
	);
}
