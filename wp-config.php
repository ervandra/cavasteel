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
 *pab10007_web
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'DB_NAME');

/** MySQL database username */
define('DB_USER', 'DB_USER');

/** MySQL database password */
define('DB_PASSWORD', 'DB_PASS');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'tt6*PCI9E(af9?[__b.rfEX^[V#j78Gek~4!+(&$GyUgj<bHtD*Q/[w4<gC{ak5_');
define('SECURE_AUTH_KEY',  'Mc#X4X(3}B/Wim3I#D/y32&VJVc01FXrK1)z&NgS?QzB,Jp9K0C(2H1$ZNl~fVGs');
define('LOGGED_IN_KEY',    'UE,#;eF9t x ItOuofH?{+]ydTzsLum,XzQmNHwDA+xPI^8n {o>p1rs%0mG^>vZ');
define('NONCE_KEY',        '4FPu>|NjMQ< U~;MNjfLL{?~FQ`&7p0#e{VkjKaCgrMiU xE5Vl[l*Rm!l @lCH*');
define('AUTH_SALT',        '*6`DS56uFt$Ng9@sp:ng,i5@0DN)3.rk3fGC`w{%c-|!seoh30Ff5Y8IK{*siA06');
define('SECURE_AUTH_SALT', 'mEn`qjT3G[7ELsT@)v`P^Xr!qEpfC{beQ1]vmHHSS1RDz{$ud[+5u{_C?NE8fpf$');
define('LOGGED_IN_SALT',   '.D3(Bc3$,gJFR(@tew{30n0*P6g27VC`1g34!ledK-me1&wU]1I%?^Bfj] ^pAN[');
define('NONCE_SALT',       'H8RWex8F`nYzAkFSa?KA$T^@EO!Gdz02![USe3s|:ZdCJVMOEk_.Ohmxyq;W:tPA');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pabrik_';

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
