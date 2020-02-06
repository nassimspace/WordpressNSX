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

// ** MySQL settings - You can get this info from your web host - FILL THESE IN IF USING MySQL & COMMENT OUT THE SQLITE 3 SETTINGS BLOCK ** //

/* MySQL settings */
// define( 'DB_CHARSET', 'utf8' );
// define( 'DB_NAME',     'database_name_here' );
// define( 'DB_USER',     'username_here' );
// define( 'DB_PASSWORD', 'password_here' );
// define( 'DB_HOST',     'localhost' );
// define( 'WPLANG', 'en' );
// define( 'IMAGE_EDIT_OVERWRITE', true );
// define('WP_ALLOW_REPAIR', true);
// define('FS_CHMOD_DIR', (0755 & ~ umask()));
// define('FS_CHMOD_FILE', (0644 & ~ umask()));
// define( 'WP_DEFAULT_THEME', 'chaplin' );
/* SQLite3 settings - FILL THESE IN IF USING SQLITE, OR LEAVE AS IS FOR DEFAULT CONFIGURATION (IT WILL WORK AS IS) */

define( 'USE_MYSQL', false );
define( 'DB_CHARSET', 'utf8' );
define( 'WPLANG', 'en' );
define('DB_DIR', dirname(__FILE__) . '/nsx/db');
define('DB_FILE', '.ht.dbcore.sqlite');
define('WP_ALLOW_REPAIR', true);
define('FS_CHMOD_DIR', (0755 & ~ umask()));
define('FS_CHMOD_FILE', (0644 & ~ umask()));
define( 'WP_DEFAULT_THEME', 'chaplin' );

// Useful for subdomain install
// define( 'SUBDOMAIN_INSTALL', 'false' );


/* SSL SETTINGS - COMMENT THESE OUT FOR NON HTTPS HOSTING (LOCALHOST, etc..)*/
define( 'FORCE_SSL_LOGIN', true );
define( 'FORCE_SSL_ADMIN', true );

/* MySQL database table prefix - USE ANY PREFIX YOU WANT */

$table_prefix = 'nsx_'; // Only numbers, letters, and underscores please!
define( 'CUSTOM_USER_TABLE',      $table_prefix . 'nsx_u' );
define( 'CUSTOM_USER_META_TABLE', $table_prefix . 'nsx_u_m' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

/**#@-*/

/* Custom WordPress URL. - RECOMMENDED - EDIT THESE TO REFLECT YOUR SITE */
define( 'WP_SITEURL', 'https://example.com' );
define( 'NOBLOGREDIRECT', 'https://example.com' );
define( 'WP_HOME', 'https://example.com' );

// MOVE WP-CONTENT DIRECTORY - NSX FOLDER WILL BECOME 'WP-CONTENT' DIRECTORY
define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/nsx' );
define( 'WP_CONTENT_URL', 'https://example.com/nsx' );

// Moving the plugins directory
define( 'WP_PLUGIN_DIR', dirname(__FILE__) . '/nsx/addons' );
define( 'WP_PLUGIN_URL',  'https://example.com/nsx/addons' );
define( 'PLUGINDIR', dirname(__FILE__) . '/nsx/addons' );
define( 'WPMU_PLUGIN_DIR', dirname(__FILE__) . '/nsx/system' );
define( 'WPMU_PLUGIN_URL',  'https://example.com/nsx/system' );

// UPLOADS FOLDER WILL BE THE 'CDN' DIRECTORY WITHIN THE NSX FOLDER
// (YOU CAN LATER CREATE A SUBDOMAIN LINKING DIRECTLY TO THIS FOLDER IF YOU WANT TO SETUP YOUR SELF-HOSTED CDN FOR UPLOADED CONTENTS & MEDIAS)
define( 'UPLOADS', '/nsx/cdn' );
// define( 'COOKIE_DOMAIN', 'http://' . $_SERVER['HTTP_HOST'] ); // OPTIONAL

/* Media Trash. */
define( 'MEDIA_TRASH', true );

/* Multisite. */
// Disable post revisions - RECOMMENDED SETTINGS FOR PERFORMANCE
define( 'WP_POST_REVISIONS', false );
define( 'AUTOSAVE_INTERVAL', 180 );
define( 'WP_ALLOW_MULTISITE', false );
define( 'EMPTY_TRASH_DAYS', 30 );

// ONLY ENBLE THIS ONCE YOU NO LONGER INTEND TO INSTALL NEW THEMES AND PLUGINS, THE ONES INSTALLED WILL CONTINUE TO WORK
// THIS WILL DISABLE ANY MODIFICATION TO THEMES AND PLUGINS (USEFUL FOR MULTIUSER ADMIN INSTALLATIONS)

/* define( 'DISALLOW_FILE_MODS', true ); */

/* WordPress debug mode for developers. - RECOMMENDED SETTINGS FOR PRODUCTION ONLY AS ALL DEBUGGING AND LOGS ARE DISABLED HERE + EXTENDED CRON CALLS FOR PERFORMANCE */
@ini_set( 'log_errors', 'Off' );
@ini_set( 'display_errors', 'Off' );
define( 'SCRIPT_DEBUG', true );
define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );   // 5.2 and later
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );
define( 'SAVEQUERIES', false );
define( 'WP_CRON_LOCK_TIMEOUT', 300 );

/* PHP Memory - SOME HOSTS DO NOT ALLOW SUCH HIGH RESOURCES, USE AS APPROPRIATE TO YOUR ENVIRONMENT */
define( 'WP_MEMORY_LIMIT', '512M' );
define( 'WP_MAX_MEMORY_LIMIT', '1024M' );

/* WordPress Cache */
define('WP_CACHE', true); // USEFUL FOR HUMMINGBIRD PLUGIN

/* Compression - RECOMMENDED SETTINGS */
define( 'COMPRESS_CSS', true );
define( 'COMPRESS_SCRIPTS', true );
define( 'ENFORCE_GZIP', true );

/* Updates - ONLY ALLOW MINOR UPDATES - REF. TO WORDPRESS CODEX IF YOU WANT TO CHANGE THIS */
define( 'WP_AUTO_UPDATE_CORE', 'minor' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
