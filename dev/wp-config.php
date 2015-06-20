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
define('DB_NAME', 'mahesh_word');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '7Hg(-S+nJz,(P|b0&S0_O)_#m-+LxJAgC?,Vt!HEi*H/@pB&Y49#Ou3$ASnoFu-t');
define('SECURE_AUTH_KEY',  'Q*ZF4,D*;?uO= 2/}RkIR5_Wa,-.nQrVr}|qy.6N}ltuTegUY2#q~,[JF5QU+R^6');
define('LOGGED_IN_KEY',    '3|h6-,-j}Zj0Re}^xXK.YhS?2^)/R1My$c6NXAGW1N2,5NNE[tPit(}hZ6&>4Kr/');
define('NONCE_KEY',        'Oj|/,/{<z:bq(KgFsvxxPc5{]%pUeQk5)}JBdx92{`dpr$Ugwh@7:p:+>,N&Ym(R');
define('AUTH_SALT',        'a=@m?yvI5/3!dj,O*ps_lGbepXOC%:]5g9=wIU&ZUTl)GB}.JSX(sTS-f]*{h+BF');
define('SECURE_AUTH_SALT', '=If2_Tj}H [@nTYjd@7kNYj|$^Z-;myg c+Rfk+!|DLu1KM,|&6O+&;t: E995yV');
define('LOGGED_IN_SALT',   '>[D9,1Z)nq>QmOM$!=~+s@+>Tg:Q6*@0MuVd--tp4V>@/cG4om4u.AK@EH7/Fl,Y');
define('NONCE_SALT',       'o3CS.^oVu%_H-naqI?b[|9C{`QB+n<P+si9$FlUE7P<Z)`$|_=)F/0_`WI@v7h5G');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ik_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
