// handle the switch between light and dark theme
// trigger by the button `.swtich-styles a`

window.addEventListener( 'DOMContentLoaded', () => {

	const wpdsfr_switchTheme = e => {

		e.preventDefault();

		if ( localStorage.getItem( 'scheme' ) === 'dark' ){
			localStorage.setItem( 'scheme', 'light' );
		} else {
			localStorage.setItem( 'scheme', 'dark' );
		}

		wpdsfr_fetchTheme();

	}

	const wpdsfr_fetchTheme = () => {

		document.querySelectorAll( '.switch-styles a' ).forEach( schemeSwitch => {
			schemeSwitch.classList.add( 'link--disabled' );
			schemeSwitch.removeEventListener( 'click', wpdsfr_switchTheme );
		});

		fetch( wpdsfr_data.siteUrl + '/wp-admin/admin-ajax.php?action=dsfr_reload_styles&scheme=' + localStorage.getItem( 'scheme' ) )
			.then( response => response.text() )
			.then( result => {

				const currentStyleTag = document.getElementById( 'global-styles-inline-css' );
				if ( currentStyleTag ){
					currentStyleTag.remove();
				}

				document.head.insertAdjacentHTML( 'beforeend', result );

				document.querySelectorAll( '.switch-styles a' ).forEach( schemeSwitch => {
					schemeSwitch.classList.remove( 'link--disabled' );
					schemeSwitch.addEventListener( 'click', wpdsfr_switchTheme );
				});

			})

	};

	if ( localStorage.getItem( 'scheme' ) === null ){

		if ( window.matchMedia( '(prefers-color-scheme: dark)' ) ){
			localStorage.setItem( 'scheme', 'dark' );
			wpdsfr_fetchTheme();
		} else {
			localStorage.setItem( 'scheme', 'light' );
		}

	} else {

		// The default loaded theme is light, so we only need to fetch the dark theme
		if ( localStorage.getItem( 'scheme' ) === 'dark' ){
			wpdsfr_fetchTheme();
		}

	}

	document.querySelectorAll( '.switch-styles a' ).forEach( schemeSwitchButton => {
		schemeSwitchButton.addEventListener( 'click', wpdsfr_switchTheme );
	});

});