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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u460930808_juvyj' );

/** MySQL database username */
define( 'DB_USER', 'u460930808_nyqan' );

/** MySQL database password */
define( 'DB_PASSWORD', 'VaSateRuhy' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zk]f&dU:M~I5.Ey}sk%>+H`YL%q<^xKm9ye7bzydN~]^?90+wR<<ArrZtU5/#~NV');
define('SECURE_AUTH_KEY',  'uY]2L#Pq;w&Qk)Ca8,<+JabrJDb$agnaR6c %|ovmz_+9Lde:LGYYD^}vC}8, qa');
define('LOGGED_IN_KEY',    '3S6>#m]KOnzGeCv)@_$Z-=5oR#gpi|d#AiV+7FL+zgbk}uhZj%GNY X/S3~xu3V{');
define('NONCE_KEY',        'm4PB,|iv|S<[RA4{A14kI~!}~x%&K1WDn5VW<B1k*0C7#AnR:_4}OX:),+9AZC>y');
define('AUTH_SALT',        'ztcw%>rALJ*Qi>JI~S>uAIH--_0VYUeJ83@xx&eN5!dJR)La_rsnq(H;{?wEr3v@');
define('SECURE_AUTH_SALT', 'LJG%Z|zp<-r<Vw)^YbSD*a{Nnhd>z6:drk7[rF|0oj|zoWgP,uAQZ9=auDy+/=i[');
define('LOGGED_IN_SALT',   '2>%ABJXHVDOV.z]O|emC|j_CM[sf~]q<y5]`j@T1,;SY~ zQ^A*e+!||B|so?DZ5');
define('NONCE_SALT',       'I>37m?Af+ic%ef6/|[>9_HqwTJ_k+twXOYI;M2X2eWKWvr,fW}MCg]ou#o-4-kiJ');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
