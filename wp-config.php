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
define('DB_NAME', 'm1w7q4t3_activate');

/** MySQL database username */
define('DB_USER', 'm1w7q4t3');

/** MySQL database password */
define('DB_PASSWORD', 'Graphic608!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
 define('AUTH_KEY',         'b+50nkYJEyWi5g,m-(u@yw#-{$-,AL#p#5fKU.ALtf1i2?)PP@HbXN;nV;N[Mx)l');
 define('SECURE_AUTH_KEY',  '?!3^m=p+scjms*AQ|*=ML/?9:Vh5~33GSP;f$FBf2o(h9VXI=)&QwMw$dFqszU/J');
 define('LOGGED_IN_KEY',    'H0DvbK|4llf0^kn[Czfx+e,Xs8N-Vw|i?3t)UB4g4E.i7P|[bEgh|)eIJnl.!v+S');
 define('NONCE_KEY',        ';V2|$p0.bM+g[N9d]%CR[?S:DS@1<T}LaCKTkeBptU8HhSryXk-ax=~#%k[1LZgb');
 define('AUTH_SALT',        'gXuQngv-$?QzZJ-Ed]lcZ;]+?tl>5V1AzOJ+?,_;^=<ecbAn-,9Gvn~2~bMe8}+{');
 define('SECURE_AUTH_SALT', 'im0>$fd%lGUc*wNrbiDz0&=9i43Iqqo!l=qz`?Yi?RJZh~YD#Z6%dvB6BQRV[yLi');
 define('LOGGED_IN_SALT',   '+Y6n,o+]fHmnT+B&%_kSM|laP+TkZw?UC1_.z<OO1C:5qsrQ_0k1EeV4E^(Ka~<^');
 define('NONCE_SALT',       '_uv/2pLd&NA_gf^#%$t5d5WYOW]LYl!wZ4Y}l.LsG:~1L/VjV[/Q-bG9+&$*^L+v');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

