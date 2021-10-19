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
define( 'DB_NAME', 'logicalconstant' );

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
define( 'AUTH_KEY',         'G*>/*9xD}h!p? zXfM@LPvvB-,U.iFApz*c[1@#Wb%k?p9rFs()w|RSY|e0^XkSg' );
define( 'SECURE_AUTH_KEY',  'v{|dI;Wa^y0474?UNyE(GQRdS-4+ e_Al%2g1zGw]FcLtkCG@r|;8/(*r4uKX7l&' );
define( 'LOGGED_IN_KEY',    ' LRUA]cBPE:p:zivqTZ5u#6L0GCaO-EE:K-,wj/[S#/W%=2Qf.%#zo565`2lT&hj' );
define( 'NONCE_KEY',        '}kcx7q~byL,_lh=jwF=E*}Hpn{{,/K7;<n?y~E7 6qFcVx8Xl:0B5!_UCU{updes' );
define( 'AUTH_SALT',        'PB$[=)m^movsEc./S}]CGnA]D<cg2|Dy_KtEOB~>(vRQyIb)/x/>]dz<fJ^LLHnp' );
define( 'SECURE_AUTH_SALT', '~Of/y0#CNqf#~o%^8-}{c%C`mFs4XDBc%F-Nig,y]>As]@#I!{1l$Fna1IFNMR;n' );
define( 'LOGGED_IN_SALT',   ')>.n:,i5o7e[U1B-/`~c)CVF@w=M:9iR%GQKOk+RUa,d{#UAZPE{C=agH|*^]9`l' );
define( 'NONCE_SALT',       'L.I!=RF(>|OK.C|AoH5x=11bG}E?l>t#6+c|j[r`gcisL$Twb||x:vPqQAn3q4t.' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */


define('ALLOW_UNFILTERED_UPLOADS', true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
