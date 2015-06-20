<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dev1_wp');

/** MySQL database username */
define('DB_USER', 'dev_1');

/** MySQL database password */
define('DB_PASSWORD', 'Fjjcm9ZqB5MV9Gfa');

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
define('AUTH_KEY',         'jE,V&w^6dmQDY/%M?abSeSGGruta%A`y}_58tmTRKVqp3OV,nZnw2W]{bJlMf+p+');
define('SECURE_AUTH_KEY',  'X^^Xpq4*Vd!,smiyyO4eg(L%71fOJ!@D9(]|X iROf02%zP0{!C?.j@|)&-mV0(3');
define('LOGGED_IN_KEY',    'Vl]@mN6i|5.H}oCvu,pGR{<uk7K`WJ_G7qAv<30;#0jf12tr/; P4Q?=-tr-P4U{');
define('NONCE_KEY',        'ej=N80AdQq8((qZPy%I.Q2MZPLg}G*G-2Q%2e,WsgWw|E5p[9l=2QRBr#^kExC7t');
define('AUTH_SALT',        '+Q5|-i8/_)DA(e6E-zBFSpFq9q$:H&2_9k4a9c.@:u_-meL#Nc{-Mk1Cltd6 zP>');
define('SECURE_AUTH_SALT', 'uJ7f{>A7&z|rXq<MhrGcEc-zLZB$w,-$Kc^H{|MMJSm7.zWr;6AhcHw^;!TC+<NR');
define('LOGGED_IN_SALT',   'n!z.4liVZ|,uwwzeH~OQi N2+miB*c=/Y:(dB<J^! 8|*522N@9|INH&Ki79Hkb3');
define('NONCE_SALT',       'Ih]r(~xw$o`c 38I`o@595Z%Xo~&:YJxM=_np2%M|l#,F}[W`,$iV*-2Yhkk828a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
