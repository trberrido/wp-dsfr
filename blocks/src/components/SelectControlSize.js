import { SelectControl } from '@wordpress/components';

const SelectControlSize = ( { attributes, setAttributes } ) => {
	const sizes = [
		{ label: 'Default', value: '' },
		{ label: 'Small', value: 'sm' },
		{ label: 'Medium', value: 'md' },
		{ label: 'Large', value: 'lg' },
	];
	return (
		<SelectControl
			label='Size'
			options={sizes}
			onChange={ ( value ) => setAttributes( { size: value } ) }
			value={ attributes.size }
		/>
	);
}

export default SelectControlSize;