# wp-dsfr
Design System WordPress Gutenberg FSE

## Todo
- add spacing var in theme.json
- add font-size to theme.json
- concatene js and css generic files
- try loading css to sync patterns, see https://github.com/KevinBatdorf/pattern-css
- functions name -> improve consistency

## wp-config.php

```
define( ‘FORCE_SSL_ADMIN’,		true );
define( 'DISALLOW_FILE_EDIT',	true );

——————————

define( 'WP_ENVIRONMENT_TYPE', 'local|development|staging|production' );

——————————

define( 'UPLOADS',			'media' );
define( 'WP_CONTENT_DIR',	'/path/to/wordpress/dir/content' );
define( 'WP_CONTENT_URL',	'http://example.com/content' );
define( 'WP_PLUGIN_DIR',	'/path/to/wordpress/dir/content/mod' );
define( 'WP_PLUGIN_URL',	'http://example.com/content/mod' );

——————————

define( 'USER_COOKIE',			'my_user_cookie' );
define( 'PASS_COOKIE',			'my_pass_cookie' );
define( 'AUTH_COOKIE',			'my_auth_cookie' );
define( 'SECURE_AUTH_COOKIE',	'my_sec_cookie' );
define( 'LOGGED_IN_COOKIE',		'my_logged_cookie' );
define( 'TEST_COOKIE',			'my_test_cookie' );
```
