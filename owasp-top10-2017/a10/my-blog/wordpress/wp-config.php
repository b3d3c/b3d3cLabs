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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',          'Yt^*[wN/xXt+{]dhq28f2I/Z%tP:_rs+oem)B`3q^fj,O& *Nza0eG|+v <s^Ij1' );
define( 'SECURE_AUTH_KEY',   'Cv9/.QMR V6G!>71TA,3SP3F2crG=S `is*e#<-K?4=I7SFB?1@X:<}_R7Z[SM53' );
define( 'LOGGED_IN_KEY',     'dd2vNvzWws`u2>n,+%H^.0Nt`joc.%c;;vr(.Z; ^Nr8kM!D/U-OxE}nDF,b9R(2' );
define( 'NONCE_KEY',         'Q|Zf$B 38^$M=h8+I9cMWniZJk@!^=al3c@`2~7g.+)nZ0p9?Ok;(@`i:A>/WsT>' );
define( 'AUTH_SALT',         'W%94tX`h_DySYv5x~JeHurEdQ)GE3.+}jXPugg*-CB30=r|l{WenTXl|8Bwja7d@' );
define( 'SECURE_AUTH_SALT',  'E&T7{JB,D{^_xQ]h#g@;#~D(0&am-skLxD~@ald8%$,|7U,_X-ih%q6A!@8@YbAq' );
define( 'LOGGED_IN_SALT',    'pwK^wuZaPFJ-QoO,*|z){+sJuY@JHm0xgWS=VtE{j$_b9UNCzoRMCjXx1<h$BB7e' );
define( 'NONCE_SALT',        '+4ZE3869;9Fr>RpKN#L%jkgqEEr[-,[XIA;Xet~r%/q$v ~qQ}{kIOU^u1G0PmE+' );
define( 'WP_CACHE_KEY_SALT', '^<CR /w?fskXxyvTz HPpEZ/c.@-e%2aJFxV#PAik=ih*g@?^KS]N#ARJ&vFMe>]' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
