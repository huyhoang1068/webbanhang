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
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'D:\HOANG\xampp\htdocs\webbanhang\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'webbanhang' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '#+pv`9~b`R0}VYp:e,T=u4B.}|<[?:7zIG?vH:<UVA.V=!PSDsxax#sp#U2To[Q=' );
define( 'SECURE_AUTH_KEY',  '3ej_:@:cJl;Q_<T!qs#g *15}a?9A;m#k}#Lt6;.Pgqn*j.8W`C-:hBXBI?f{qOo' );
define( 'LOGGED_IN_KEY',    'h6!bnK<n.&X&8hcgnlSu%J@TnzPLSB(dC%RLiFOaT+Rab*UKHx@o0;/S{?x#=4Z6' );
define( 'NONCE_KEY',        'Hq0}hYcOEdM[7W0n7;8pp_[A-h y[CW<X1~%wt-&?o+?,T!%Zws#~{N!An3D$Q%M' );
define( 'AUTH_SALT',        'DK%:vRQ?;`ew34O<x0Xf1`4o_K#sSXe_XeC*F-f5w0v+9kGr*iqdn4J.rWKeoKK-' );
define( 'SECURE_AUTH_SALT', 'tYt`(:|dk=F$ET}RliIF num-&D6%<eY|b_PUmddmbjO,G%Uar{bf? TJl{Cge5m' );
define( 'LOGGED_IN_SALT',   'ydF_P@HD&pv@t.BP=<xH+.K913D!*8oAND>r1w) QbpY-?&>]~/HIMpB^/KJKDdc' );
define( 'NONCE_SALT',       ';6ah12b[PpwfzQ/kJsJPjwEU=LK38Cm9|`tl9&97R8 ,<BeiP^h.z|C3pkF&0ko5' );

/**#@-*/

/**
 * WordPress database table prefix.
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
// define( 'WP_MEMORY_LIMIT', '256M');
define( 'WP_MEMORY_LIMIT', '512M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
