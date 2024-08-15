import { store, getContext } from '@wordpress/interactivity';

store( 'wpdsfr/accordion', {
	actions: {
		toggle: () => {
			const context = getContext();
			context.isOpen = ! context.isOpen;
		},
	}
} );
