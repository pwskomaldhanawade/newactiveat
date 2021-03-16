<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bridgfwt_wp250' );

/** MySQL database username */
define( 'DB_USER', 'bridgfwt_wp250' );

/** MySQL database password */
define( 'DB_PASSWORD', 'S41rT7p[r(' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'pn01xwqjppuhizglauatcza3ioa8fnh2fn45a1319dmwbpdsry1fyzplxsu0smlz' );
define( 'SECURE_AUTH_KEY',  'pg78kbcubt1snse6aortul1kaj5xnvgzcaus6wqkxorfqcxrgajegf6mrfiznqot' );
define( 'LOGGED_IN_KEY',    'wukvqsdj8sw0xn8wbabawaan4z4zsrhnfheulg0ld7w7usx6kw9hbfczuaes3zc7' );
define( 'NONCE_KEY',        '45rfhdavpz72dfhumjh2vpogcywgorhhmi9e2aqitizthyfi2nldxaegcnv0w92z' );
define( 'AUTH_SALT',        '4a3lh52nwl9x6n0pp0qdsvflcmqhkaemk1eipbxrrb3xvy0mwvwzgerdf8cldjdw' );
define( 'SECURE_AUTH_SALT', 'lmrkhrgtx9626i4abgzse5tpwbwqnf7sjpaupbdlnmi8ue1p9gn2suxzzrwhezhr' );
define( 'LOGGED_IN_SALT',   '0vxyktpfvdbhptemiau6kotj7dq1wbjyyivkyygkhsikt5asnqnmwsam7gacvfqf' );
define( 'NONCE_SALT',       'cysr8f6u8qizsvwuhbe2u3yhqcxj3256c6lfadfjr7e2rkammeuj9sba6seg7go2' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
