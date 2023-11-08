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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpquiz' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'PuhA5A$W(W(C{is}o}qWU1pM~dz1[g0&AzuM]Zo}eN!a!Z@@m@6o2v[(5X|g$QF7' );
define( 'SECURE_AUTH_KEY',  'N}n>/f5ZyV=p)x0_-]e/oY<38RKJ@y7BH@X$WMSrz?~e9_1OK>~g7*h3FD@!h+,Y' );
define( 'LOGGED_IN_KEY',    '6u+8wD(.nH_Sbe]5(W/&F!apJCrtRg|o12Eh(Oy*5EDr@=:F|=aqiu{cIN4]<*N{' );
define( 'NONCE_KEY',        '7vmz)SVO^zYns DjYo>:&],X]d+y81a{V(&R2z24zE!nfk]cVhurAHk77LYEp|f<' );
define( 'AUTH_SALT',        'gVX65/eV%D1h!/vCo|oBnQ L=P6{4Mwek4$P=T8Dpj>hEoIr@0Lg^%A[dh2tt(uC' );
define( 'SECURE_AUTH_SALT', 'QL6`h,mLiV+AeU#_2?10rr#eJ:jy[> R@y?F/jU(jiy/PkZUW7^$!}&wYCf,f|vx' );
define( 'LOGGED_IN_SALT',   'e/!.qS04,W6~kO;~^.YPJv_i+WG%bAGaqa:xo KT,<a&_zNLlp]*w,v7jl253$x7' );
define( 'NONCE_SALT',       'yWn6,_6w^r`7H]|s-:PY8d)uoW%Z}rq9V#zRfJQ.3#<WH8U?I7Jxt+|Q%p0B/Pjr' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
