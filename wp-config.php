<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'yournalism');

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
define('AUTH_KEY',         'SID(&4]VOKNFz_53/AWn9wCY`;Ic|&=LWBPxR`9|#(pj}lW.n.^!_j2$#cWlh2W*');
define('SECURE_AUTH_KEY',  'w*9J%O/0pE+B@L Db? uWZa(Mhs9Ml><<:5V/jNZOL<KOZeEM)BZ6:kTmnKVS!7;');
define('LOGGED_IN_KEY',    '6QoVE@>tJI8,i))L4wii+nT_C|^J$$(qYQ{p>eFGl%,>2jX+pT$A)*+Ox-_ZK=/n');
define('NONCE_KEY',        'uu80t3,=q]-{cE6?[xPzs%{u*fbt~3bfqE}td=xIff42zUt6kTh`-LcPt7)3Uz)=');
define('AUTH_SALT',        '*cG7Ahz</SX?1h/XNs1do-g]o~ZD=Y$<Rq+aq8qYBfk6zxFSV83pU^|.}sVu5=0,');
define('SECURE_AUTH_SALT', '2-8CQ~y;l#>at;KV-}frh$XmF9^pa:oX69t@ZS(j>;w_wBF-+/:8s0$5rceXF?L~');
define('LOGGED_IN_SALT',   'O})r $ |^1mQNv36nz&sp!3VD(263TH77uQNC%)iCLP9$lP~knN6}*w(s9^4Z1Qi');
define('NONCE_SALT',       '^<MbyAO7BV_p}0-M<+TXK7{=&`d!y4a0x5F{#m9]=E$fov^TN/4fxHB5T7+361LJ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
