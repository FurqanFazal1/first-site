<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'cU4kwvpXlTIwEGkQy+LX3miLKYcuYoTGH8URgYJRzVKZz9PD5I540TEgfmo82UvIqBdaluSgXdVnA3ooWUycgw==');
define('SECURE_AUTH_KEY',  'quzyWlpSl3gEqyhHm2EL+kthgIu3oQcoSnMhqcricg789R7QtRc9vuWOjfb5DvQ6DHczt31L7f3/TnrG+kK8kQ==');
define('LOGGED_IN_KEY',    'jttJ3R3hy8sPpm++BWi8+pCaRmeKnjlOyllijtgKJ5MIHHLn+FsqL1jW/DW7z5sKX6xZ0YsmLmVf4gVQQBlxYg==');
define('NONCE_KEY',        'hvEhpngfXZDplr9GRar0zS/AlNXPJIgWq0bs0/vRohs1QwKUCQhkoyxlJCbfJh2dFyL9uVrNlh/Ebqo56gPneQ==');
define('AUTH_SALT',        'QWFu8ouTKk5tV/EQXiFiFe24fKShpyWduFKKE8pWsRicPCYIP8AY3woGcUby3b0GEJNeGA+Yl7zBpfqcQOoa1w==');
define('SECURE_AUTH_SALT', 'DnV0+dtYGKzx9Sz8085Tl59jgQDyEtGzUXTUQAY6xGxUJvEflokZznzgYjtJxHMYitmLA7ILZ2xYKhGA70LRww==');
define('LOGGED_IN_SALT',   'e6PdmfdL1WHmMmVuQxHYc/hn1ngvjpE9J4isGRoiDckRKRo8f1XojRX9DQjr7VhmO+ky8D45ZjVUqOS6GSP3Sw==');
define('NONCE_SALT',       'yr6obbpPyNiKqOLf1ydCWOCcNg0mzzXGgZHcPWDHnxgxkMTxM1SOaLfyCjsX+XsNGU/LL3AAWyr7zwCwKdNWYg==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
