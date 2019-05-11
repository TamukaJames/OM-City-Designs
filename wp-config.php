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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'stepp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'f]l?b}j;Q7Z?=WgE.|lf/1k.#t2F&fVK+AK:IpR_Wx4)HWc~skwv!+ca/T4SU cK' );
define( 'SECURE_AUTH_KEY',  'EyH~MX|!%wWYcUL_p_P(^nPv6I94RoHP9,FXPql9?p5s9Q? KzB!lc8knK;bA-(D' );
define( 'LOGGED_IN_KEY',    '!X_WG~7(!^e5n*?s)byQsVmK|CJNl urx,ysPma> ]<^<i_D2u/56W+cEuVWo};^' );
define( 'NONCE_KEY',        '^Z3NkC:daD0$ijDjZU>]8q|sY||hRk6M7U#t$GjJpAtiRGw_aXV6n C Gn%oMqCe' );
define( 'AUTH_SALT',        '$ @s=&e6NMZr*Q[,bC<X527TOoyt%WGvL)X@aXKN%=np0VcUo^+BvM;C_z2n5sPL' );
define( 'SECURE_AUTH_SALT', 'aQlFR]zo%$P!AH(<RDq12STA.?f!iFah.?Sj|cu2#gdqB2T/RKjP^TcZV9*>%@J5' );
define( 'LOGGED_IN_SALT',   '-1@IOT`2!lGOd,/lNC[t9EMhAG>i1= :AxQpBfkw8[Aq9!:dd}eatis3`&.wWP~w' );
define( 'NONCE_SALT',       'ljH,4r.`]Tq7EyyC>`^~? X x.xX.4hlpz[xN^_K|W]4FfcQk(~9G$EuD#.0lw[2' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
