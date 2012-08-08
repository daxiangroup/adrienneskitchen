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
define('DB_NAME', $_SERVER['DB_ENV']['name']);

/** MySQL database username */
define('DB_USER', $_SERVER['DB_ENV']['user']);

/** MySQL database password */
define('DB_PASSWORD', $_SERVER['DB_ENV']['password']);

/** MySQL hostname */
define('DB_HOST', $_SERVER['DB_ENV']['host']);

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
define('AUTH_KEY',         'qo{z%#oB|UQ9Pe-7L,,F9FG].-FB@*w=~f)>YokGCJzL6vh63T1Jnvl5}+`/7~|U');
define('SECURE_AUTH_KEY',  'eK+V{BeEIn_=j{qDz6AS/#)qw(kr;#`GxPm|#uR%EWUz<g5{RT)7S+_mp/,-oOv]');
define('LOGGED_IN_KEY',    'mE7d`lr*ONuT3W^;`V|WFQhDGSIF`W4jQPKPY-yShjn(|g`mbustCZD!o:1;(3^E');
define('NONCE_KEY',        '1~[jDi5M]<5RX@&>wIZ6AE{UGao8bcd u~(doscX(|tM8s;XT%dl;>MpFL9`NAtS');
define('AUTH_SALT',        'jE0+jQSQ- 6.{yLTa6AN981[CR5MV5WZ=l+y90G5.R<+MO-sG4?Gt$]5$[S%[+-f');
define('SECURE_AUTH_SALT', ',J#Pe%Ygj+6mXald A+r!E|$|w2{bkcMgSBV,{De~c,)-~hq4OmyY0-apvi2!LVd');
define('LOGGED_IN_SALT',   'Pu[1_`D+2!c;.%[hxY~Yb>=<T-oCeqtz4UzL9A+jnHgzzpC?<iOtLr++1WlK8%zs');
define('NONCE_SALT',       'of2$Yx_5-:ah})i`j6vWpx4WL^VU6lfeX4Xff5-*CHeQVx<LEEvwh40dTd5c%KGN');

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
