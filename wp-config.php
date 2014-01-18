<?php

/**
 * The base configurations of WordPress.
 *
 * @category Configuration
 * @package  WordPress
 * @author   2014 by the contributors <info@wordpress.org>
 * @author   Jason D. Moss <jason@jdmlabs.com>
 * @license  http://files.jdmlabs.com/license/license-GPL-2.0.txt [GPL 2.0 License]
 * @link     http://codex.wordpress.org/Editing_wp-config.php
 * @link     https://github.com/jasondmoss/development-snippets
 */

if (! defined('__DIR__')) {
    define('__DIR__', dirname(__FILE__));
}

if (! defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (! defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) .'/');
}

// Dynamically set the home/site URLs
$host = 'http'. ((isset($_SERVER['HTTPS']))? 's' : '') .'://'.
    $_SERVER['SERVER_NAME'];

// Blog URL
define('WP_HOME', $host);

// WordPress Administration URL
define('WP_SITEURL', $host .'/system');


/**
 * Set your environment variables in your .htaccess file, per host:
 *
 *    SetEnv DB_NAME dbname
 *    SetEnv DB_USER dbuser
 *    SetEnv DB_PASSWORD dbpass
 *    SetEnv DB_HOST 127.0.0.1
 *    SetEnv DB_CHARSET utf8
 *    SetEnv DB_PREFIX myprefix_
 *
 *    # (dev-local, dev-remote, staging, production)
 *    SetEnv ENVIRONMENT dev-local
 */
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_CHARSET', getenv('DB_CHARSET'));
define('DB_COLLATE', '');

$table_prefix  = getenv('DB_PREFIX');

// Environment
define('ENVIRONMENT', getenv('ENVIRONMENT'));


/**
 * Assumed WordPress directory structure:
 *
 *    {WEBROOT}                         ==>  Set as wp-content (/var/www OR /var/www/WORDPRESS_DIR/, etc.)
 *      -- /autoload                    ==>  Must-use Plugins (mu-plugins)
 *      -- /cache                       ==>  Cache
 *      -- /extend                      ==>  Plug-ins
 *      -- /media                       ==>  Uploads
 *      -- /system                      ==>  WordPress Core Files
 *          -- /wp-admin
 *          -- /wp-includes
 *          -- wp-config.php            ==>  WordPress config (This file)
 *          -- ...                      ==>  All other WordPress core files
 *      -- /themes                      ==>  Themes
 *      -- /.htaccess
 *      -- /index.php
 */

// "wp-content" directory
define('WP_CONTENT_DIR', dirname(dirname(__FILE__)));
define('WP_CONTENT_URL', $host);

// "plugins" directory
define('WP_PLUGIN_DIR', WP_CONTENT_DIR .'/extend');
define('WP_PLUGIN_URL', WP_CONTENT_URL .'/extend');

// "mu-plugins" directory
define('WPMU_PLUGIN_DIR', WP_CONTENT_DIR .'/autoload');
define('WPMU_PLUGIN_URL', WP_CONTENT_URL .'/autoload');

// "uploads" directory
// This path can _not_ be absolute. It is always relative to ABSPATH
define('UPLOADS', dirname(dirname(__FILE__)) .'/media');

// Multisite
//define('MULTISITE', 1);

// Caching
//define('WP_CACHE', 1);

// Disable WordPress core/plugins file editing (Security purposes)
define('DISALLOW_FILE_EDIT', 1);

// Disable WordPress core/plugins updating (Security purposes)
define('DISALLOW_FILE_MODS', 1);

// Number of Post Revisions to store (Why need more?)
define('WP_POST_REVISIONS', 3);

/**
 * Environment-based configurations
 */
switch (ENVIRONMENT) {

    /**
     * DEVELOPMENT (Local/Remote)
     * ------------------------------------------------------------------------|
     */
    case 'dev-local':
    case 'dev-remote':

        /**
         * DEBUG WARNING:
         * .....................................................................
         *
         * If you download and install many plug-ins and/or themes from the main
         * WordPress repository, premium theme/plug-in sites, etc., chances are
         * you will get a _LOT_ of errors and warnings and deprecation notices
         * displayed.
         *
         * Just saying...
         */

        // Enable full PHP error reporting (I wish all developers would do this...)
        error_reporting(-1);

        // Enable WP debugging
        define('WP_DEBUG', 1);

        // Enable Script debugging
        define('SCRIPT_DEBUG', 1);

        // Display WP debugging warnings and errors
        define('WP_DEBUG_DISPLAY', 1);

        // Display RSS debugging warnings and errors
        define('MAGPIE_DEBUG', 1);

        // Save database queries to an array for analysis
        define('SAVEQUERIES', 1);

        // Contatenate (combine) JS files
        define('CONCATENATE_SCRIPTS', 0);

        // Compress JS files
        define('COMPRESS_SCRIPTS', 0);

        // Compress CSS files
        define('COMPRESS_CSS', 0);

        // Gzip all HTTP requests
        define('ENFORCE_GZIP', 0);
        break;

    /**
     * Staging/Production
     * ------------------------------------------------------------------------|
     */
    case 'staging':
    case 'production':
    default:

        // Disable full PHP error reporting
        error_reporting(0);

        // Disable WP debugging
        define('WP_DEBUG', 0);

        // Disable Script debugging
        define('SCRIPT_DEBUG', 0);

        // Display WP debugging warnings and errors
        define('WP_DEBUG_DISPLAY', 0);

        // Display RSS debugging warnings and errors
        define('MAGPIE_DEBUG', 0);

        // Save database queries to an array for analysis
        define('SAVEQUERIES', 0);

        // Contatenate (combine) JS files
        define('CONCATENATE_SCRIPTS', 1);

        // Compress JS files
        define('COMPRESS_SCRIPTS', 1);

        // Compress CSS files
        define('COMPRESS_CSS', 1);

        // Gzip all HTTP requests
        define('ENFORCE_GZIP', 1);
        break;
}

/**
 * Authentication Unique Keys and Salts.
 *
 * You can change these at any point in time to invalidate all existing
 * cookies. This will force all users to have to log in again.
 *
 * @link https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY', 'put your unique phrase here');
define('SECURE_AUTH_KEY', 'put your unique phrase here');
define('LOGGED_IN_KEY', 'put your unique phrase here');
define('NONCE_KEY', 'put your unique phrase here');
define('AUTH_SALT', 'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT', 'put your unique phrase here');
define('NONCE_SALT', 'put your unique phrase here');

// WordPress Localized Language, defaults to English.
define('WPLANG', '');
//define('WPLANG', 'de_DE');  // German
//define('WPLANG', 'en_GB');  // English (U.K.)
//define('WPLANG', 'fr_FR');  // French
//define('WPLANG', 'zh_TW');  // Chinese (Traditional)

// Sets up WordPress vars and included files.
require_once ABSPATH .'wp-settings.php';

/* <> */
