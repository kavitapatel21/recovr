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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'recovr' );

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
define( 'AUTH_KEY',         ')%s0]p(,<:kGIsYF7ud+?w=F>iQrcmh? 4r(Y7Tw}<JBh`g<4Y?.&Q*yiC#r%Wz|' );
define( 'SECURE_AUTH_KEY',  'U3R_`MOXT&x},xoJV5?-|@5|H/dsJBJgrb*j.>,pOt97PWF+~o=x%XjJxP#`Do|m' );
define( 'LOGGED_IN_KEY',    ':PwPzF@)o+8y^9psqI@-]wrSxy;tcv@[v)W}$$%V%{ACafV$^Z]iccH(wLw)b 5q' );
define( 'NONCE_KEY',        ':/xN=7+uz_JSs| Pk2zT{C;gj{G&[GrlE2Nz-4:S..#D@^v+86wjMmxQ[{:N3s X' );
define( 'AUTH_SALT',        '*[m@-B~K3L%:6v0ivBuvJhQo4%_A{Hp-Hw]<. ;0Dmx6*yyu Vke[>P]:oASVj7`' );
define( 'SECURE_AUTH_SALT', '6KIDZ1/5r2k4ab)wZ(-}4SCKWH5c^9LQQz<3y@Q$L,K[3SG?1a/qt~]f1?(e?eP)' );
define( 'LOGGED_IN_SALT',   '7L,3mB/(c)z@6QOO7$lZ9Bp_P}_<W@qO|eUl(ij)z=s@X),+N)<_m/On3<Ljp Y|' );
define( 'NONCE_SALT',       'p5WW]@jmg52J9`.=($lM2hz/E79%zz)BT[`T_h- <%KwFq6#&wk?/v}UimZwli>>' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
