import { SelectControl } from '@wordpress/components';

const SelectControlType = ( { attributes, setAttributes } ) => {
	const types = [
		{ label: 'Default', value: '' },
		{ label: 'Information', value: 'info' },
		{ label: 'Success', value: 'success' },
		{ label: 'Error', value: 'error' },
		{ label: 'Warning', value: 'warning' },
	];
	return (
		<SelectControl
			label='Type'
			options={types}
			onChange={ ( value ) => setAttributes( { type: value } ) }
			value={ attributes.type }
		/>
	);
}

export default SelectControlType;