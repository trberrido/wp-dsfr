import { useBlockProps, RichText, InnerBlocks, BlockControls, HeadingLevelDropdown } from '@wordpress/block-editor';

export default function Edit( { attributes, setAttributes } ) {
	const blockProps = useBlockProps();
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
			<span className='wp-block-wpdsfr-accordion__title'>
				<RichText
					className='wp-block-wpdsfr-accordion__button'
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
