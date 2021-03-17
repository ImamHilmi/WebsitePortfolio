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
define( 'DB_NAME', 'portfolio' );

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
define( 'AUTH_KEY',         '#[9]>=`,H+h|1To+6k08NhVTnvsTzc8HT(3VT*!YM1Cr/jAo8=vSjlkW]/,A8-dA' );
define( 'SECURE_AUTH_KEY',  'p7*@czT|t+~I&LvU2 `l/s!5n1[[2)k=wYS*E8X)ar$7Kc^OKJzMQQ^(+/pverdR' );
define( 'LOGGED_IN_KEY',    'GD|m*v@<hPdFxAdL4mY$Z7iYtb~0`8v}OF[r!&^#Vq~8J>e/2.u$P_Dj!AC-0_vB' );
define( 'NONCE_KEY',        '4cFzg<7lkMr/5kPVERPn?02sWfpM@Cfl;xA4KF8uxx8F`!|bn*(/ R.Qg6F9;6*G' );
define( 'AUTH_SALT',        'A^Cb}sx,o#>pX9Ahq3[2iI_-kW*W_s ZBM1M=^?UDdUMHYdE~7ht-ZQXDnn~En-i' );
define( 'SECURE_AUTH_SALT', '({$-kQOgAZo4avs5=SM,//y?B4CbCjc MOXLQ=?u}3GIH!7+:^lS!#pS@%S8`t}9' );
define( 'LOGGED_IN_SALT',   '#s#K8m-t;0ycvoT{2%[+6Z|{zLVYC%SN7~dJSFGx-z*ScT`,0zaL=adN-(^EjRQ+' );
define( 'NONCE_SALT',       ')Usb.%4_[BKv,sbT!26DHO$N{ SZ5h.zT~$`_dyF+gR16j@5$!TC=JbCpLTp4/$h' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
