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
define( 'DB_NAME', 'u460930808_eqasa' );

/** MySQL database username */
define( 'DB_USER', 'u460930808_ewety' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ePegujyWyv' );

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
define('AUTH_KEY',         '>j]yhX,%L8jUIH+,6Pr63VFqK4SJc#HE%3.[#.2w<CXX~+D,#5EY_3HNf3j-@H.Z');
define('SECURE_AUTH_KEY',  'J=j]@MB;$?2_]XUR|t[3Fm:4gQ}W?Ut*Hw]DZ>&3_Tp3bGn/Dr@~IE3,$r,&o|>D');
define('LOGGED_IN_KEY',    '-i{HQ 07N^sXr(5T<&I %gR}|s?%YJ=IUm*L#TV>cP6t{WFMN_FYPX8h@__0y%hG');
define('NONCE_KEY',        '|[+..@+NWaZ1?LsJSD1+|/]z{I-yb`P-<b#+zG3;`_{rzK|s/.o+hV0i`kfBAd|=');
define('AUTH_SALT',        '>1ELp<$YbTQL[|-r,rqE?~HgHSe%itoNLRWs]yw}Q1n|w@9n>n=zLE5,4CLTt+}_');
define('SECURE_AUTH_SALT', ') Ne2|`-kN{R%Y$fGul)yF:`PtxDY!a<Tk-2Z@QWO*UKMA+`t{$)qzf1M%#:F66E');
define('LOGGED_IN_SALT',   'Jh.Jm=R0jS+3{,YMYV3*k]v$Z.&5%.F]h(.4[!YT&XD=d#`>91 <0m1aR&8p-%xW');
define('NONCE_SALT',       'sw,cf.LXyS?zSsLUh+XFuG-fH$%H{-_bTn;84X^]$)amb0>GJAMx9.&V+P>-{w%O');


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
