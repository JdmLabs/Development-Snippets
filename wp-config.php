<?php

/**
 * The base configurations of the WordPress.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @category Configuration
 * @package  WordPress
 * @author   2013 by the contributors <info@wordpress.org>
 * @author   2013 Jason D. Moss <jason@jdmlabs.com>
 * @license  /license.txt [GPL License]
 * @link     http://codex.wordpress.org/Editing_wp-config.php
 */

if (! defined('__DIR__')) {
    define('__DIR__', dirname(__FILE__));
}

if (! defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) .'/');
}


/**
 * Dynamically set the host
 */
$host = 'http'. ((isset($_SERVER['HTTPS'])) ? 's' : '') .'://'. $_SERVER['SERVER_NAME'];

define('WP_HOME', $host);
define('WP_SITEURL', $host);


/**
 * Environment-based configurations
 */
switch ($_SERVER['SERVER_NAME']) {

    /**
     * DEVELOPMENT (LOCALHOST)
     *
     * -------------------------------------------------------------------------
     */
    case '_LOCALHOST_.dev':

        /**
         * Database
         */
        define('DB_NAME', getenv('DB_NAME'));
        define('DB_USER', getenv('DB_USER'));
        define('DB_PASSWORD', getenv('DB_PASSWORD'));
        define('DB_HOST', getenv('DB_HOST'));
        define('DB_CHARSET', getenv('DB_CHARSET'));
        define('DB_COLLATE', '');


        /**
         * Debugging
         */

        // Enable full PHP error reporting
        error_reporting(E_ALL);

        // Enable WP debugging
        define('WP_DEBUG', true);

        // Enable Script debugging
        define('SCRIPT_DEBUG', true);

        // Display WP debugging warnings and errors
        define('WP_DEBUG_DISPLAY', true);

        // Save database queries to an array for analysis
        define('SAVEQUERIES', true);

        // Contatenate (combine) JS files
        define('CONCATENATE_SCRIPTS', false);

        // Compress JS files
        define('COMPRESS_SCRIPTS', false);

        // Compress CSS files
        define('COMPRESS_CSS', false);

        // Gzip all HTTP requests
        define('ENFORCE_GZIP', false);


        /**
         * Must-Use Plug-ins directory
         */
        define('WPMU_PLUGIN_DIR', dirname(__FILE__) .'/wp-content/autoload');
        define('WPMU_PLUGIN_URL', $host .'/wp-content/autoload');


        /**
         * Relocate and rename the "uploads" directory
         */
        define('UPLOADS', 'media');


        /**
         * Disable WordPress core/plugins updating and file editing
         *
         * To maintain proper security practices and for clean Version Control,
         * this should _always_ be set to true ...
         */
        define('DISALLOW_FILE_MODS', true);


        /**
         * Number of Post Revisions to store
         */
        define('WP_POST_REVISIONS', 3);


        /**
         * AUTOMATICALLY EMPTY THE TRASH
         */
        define('EMPTY_TRASH_DAYS', 30);  // 30 days


        /**
         * Environment
         */
        define('ENVIRONMENT', 'local');


        /**
         * WordPress Localized Language, defaults to English.
         */
        define('WPLANG', '');


        /**
         * WordPress Database Table prefix.
         *
         * You can have multiple installations in one database if you give each
         * a unique prefix. Only numbers, letters, and underscores please!
         */
        $table_prefix  = 'wp_';
        break;


    /**
     * DEVELOPMENT (REMOTE)
     *
     * -------------------------------------------------------------------------
     */
    case '0.0.0.0':

        /**
         * Database
         */
        define('DB_NAME', getenv('DB_NAME'));
        define('DB_USER', getenv('DB_USER'));
        define('DB_PASSWORD', getenv('DB_PASSWORD'));
        define('DB_HOST', getenv('DB_HOST'));
        define('DB_CHARSET', getenv('DB_CHARSET'));
        define('DB_COLLATE', '');


        /**
         * Debugging
         */

        // Enable full PHP error reporting
        error_reporting(-1);

        // Enable WP debugging
        define('WP_DEBUG', false);

        // Enable Script debugging
        define('SCRIPT_DEBUG', true);

        // Display WP debugging warnings and errors
        define('WP_DEBUG_DISPLAY', true);

        // Save database queries to an array for analysis
        define('SAVEQUERIES', true);

        // Contatenate (combine) JS files
        define('CONCATENATE_SCRIPTS', false);

        // Compress JS files
        define('COMPRESS_SCRIPTS', false);

        // Compress CSS files
        define('COMPRESS_CSS', false);

        // Gzip all HTTP requests
        define('ENFORCE_GZIP', false);


        /**
         * Must-Use Plug-ins directory
         */
        define('WPMU_PLUGIN_DIR', dirname(__FILE__) .'/wp-content/autoload');
        define('WPMU_PLUGIN_URL', $host .'/wp-content/autoload');


        /**
         * Relocate and rename the "uploads" directory
         */
        define('UPLOADS', 'media');


        /**
         * Disable WordPress core/plugins updating and file editing
         *
         * To maintain proper security practices and for clean Version Control,
         * this should _always_ be set to true ...
         */
        define('DISALLOW_FILE_MODS', true);


        /**
         * Number of Post Revisions to store
         */
        define('WP_POST_REVISIONS', 3);


        /**
         * AUTOMATICALLY EMPTY THE TRASH
         */
        define('EMPTY_TRASH_DAYS', 30);  // 30 days


        /**
         * Environment
         */
        define('ENVIRONMENT', 'development');


        /**
         * WordPress Localized Language, defaults to English.
         */
        define('WPLANG', '');


        /**
         * WordPress Database Table prefix.
         *
         * You can have multiple installations in one database if you give each
         * a unique prefix. Only numbers, letters, and underscores please!
         */
        $table_prefix  = 'wp_';
        break;


    /**
     * PRODUCTION
     *
     * -------------------------------------------------------------------------
     */
    case '1.1.1.1':
    default:

        /**
         * DATABASE
         */
        define('DB_NAME', getenv('DB_NAME'));
        define('DB_USER', getenv('DB_USER'));
        define('DB_PASSWORD', getenv('DB_PASSWORD'));
        define('DB_HOST', getenv('DB_HOST'));
        define('DB_CHARSET', getenv('DB_CHARSET'));
        define('DB_COLLATE', '');


        /**
         * Debugging
         */

        // Disable full PHP error reporting
        error_reporting(0);

        // Disable WP debugging
        define('WP_DEBUG', false);

        // Disable Script debugging
        define('SCRIPT_DEBUG', false);

        // Do not display WP debugging warnings and errors
        define('WP_DEBUG_DISPLAY', false);

        // Save database queries to an array for analysis
        define('SAVEQUERIES', false);

        // Contatenate (combine) JS files
        define('CONCATENATE_SCRIPTS', true);

        // Compress JS files
        define('COMPRESS_SCRIPTS', true);

        // Compress CSS files
        define('COMPRESS_CSS', true);

        // Gzip all HTTP requests
        define('ENFORCE_GZIP', true);


        /**
         * Must-Use Plug-ins directory
         */
        define('WPMU_PLUGIN_DIR', dirname(__FILE__) .'/wp-content/autoload');
        define('WPMU_PLUGIN_URL', $host .'/wp-content/autoload');


        /**
         * Relocate and rename the "uploads" directory
         */
        define('UPLOADS', 'media');


        /**
         * Disable WordPress core/plugins updating and file editing
         *
         * To maintain proper security practices and for clean Version Control,
         * this should _always_ be set to true ...
         */
        define('DISALLOW_FILE_MODS', true);


        /**
         * Number of Post Revisions to store
         */
        define('WP_POST_REVISIONS', 3);


        /**
         * Automatically empty the trash
         */
        define('EMPTY_TRASH_DAYS', 30);  // 30 days


        /**
         * Environment
         */
        define('ENVIRONMENT', 'production');


        /**
         * WordPress Localized Language, defaults to English.
         */
        define('WPLANG', '');


        /**
         * WordPress Database Table prefix.
         *
         * You can have multiple installations in one database if you give each
         * a unique prefix. Only numbers, letters, and underscores please!
         */
        $table_prefix  = 'wp_';
}


/**
 * Authentication Unique Keys and Salts.
 *
 * You can change these at any point in time to invalidate all existing
 * cookies. This will force all users to have to log in again.
 *
 * @link https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY', '');
define('SECURE_AUTH_KEY', '');
define('LOGGED_IN_KEY', '');
define('NONCE_KEY', '');
define('AUTH_SALT', '');
define('SECURE_AUTH_SALT', '');
define('LOGGED_IN_SALT', '');
define('NONCE_SALT', '');


/**
 * Sets up WordPress vars and included files.
 */
require_once ABSPATH .'wp-settings.php';

/* <> */
