<?php

/**
 * The base configurations of the WordPress.
 *
 * @category Configuration
 * @package  WordPress
 * @author   2013 by the contributors <info@wordpress.org>
 * @author   2013 Jason D. Moss <jason@jdmlabs.com>
 * @license  /license.txt [GPL License]
 * @link     http://codex.wordpress.org/Editing_wp-config.php
 * @link     https://github.com/jasondmoss/Development-Snippets
 *
 * ----------------------------------------------------------------------------|
 *
 * Set your environment variables in your .htaccess file per host:
 *
 *    SetEnv DB_NAME dbname
 *    SetEnv DB_USER dbuser
 *    SetEnv DB_PASSWORD dbpass
 *    SetEnv DB_HOST 127.0.0.1
 *    SetEnv DB_CHARSET utf8
 *    SetEnv DB_PREFIX myprefix_
 *
 *    # (dev-local, dev-remote, stage, production)
 *    SetEnv ENVIRONMENT dev-local
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

/**
 * Dynamically set the home/site URLs
 */
$host = 'http'. ((isset($_SERVER['HTTPS']))? 's' : '') .'://'.
    $_SERVER['SERVER_NAME'];

define('WP_HOME', $host);
define('WP_SITEURL', $host .'/system');

/**
 * Database
 */
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST'));
define('DB_CHARSET', getenv('DB_CHARSET'));
define('DB_COLLATE', '');

$table_prefix  = getenv('DB_PREFIX');

define('ENVIRONMENT', getenv('ENVIRONMENT'));

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

        // Enable full PHP error reporting
        error_reporting(-1);

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

        // wp_content directory
        define('WP_CONTENT_DIR', dirname(dirname(__FILE__)));
        define('WP_CONTENT_URL', $host);

        // Custom plug-ins directory
        define('WP_PLUGIN_DIR', WP_CONTENT_DIR .'/extend');
        define('WP_PLUGIN_URL', WP_CONTENT_URL .'/extend');

        // Backwards compatibility for outdated/poorly written plug-ins
        define('PLUGINDIR', WP_CONTENT_DIR .'/extend');

        // Must-use plug-ins directory
        define('WPMU_PLUGIN_DIR', WP_CONTENT_DIR .'/autoload');
        define('WPMU_PLUGIN_URL', WP_CONTENT_URL .'/autoload');

        //define('UPLOADS', '/media');

        // Disable WordPress core/plugins updating and file editing
        define('DISALLOW_FILE_MODS', true);

        // Number of Post Revisions to store
        define('WP_POST_REVISIONS', 5);

        break;

    /**
     * Staging/Production
     * ------------------------------------------------------------------------|
     */
    case 'stage':
    case 'production':
    default:

        // Disable full PHP error reporting
        error_reporting(0);

        // Disable WP debugging
        define('WP_DEBUG', false);

        // Disable Script debugging
        define('SCRIPT_DEBUG', false);

        // Display WP debugging warnings and errors
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

        // wp_content directory
        define('WP_CONTENT_DIR', dirname(dirname(__FILE__)));
        define('WP_CONTENT_URL', $host);

        // Custom plug-ins directory
        define('WP_PLUGIN_DIR', WP_CONTENT_DIR .'/extend');
        define('WP_PLUGIN_URL', WP_CONTENT_URL .'/extend');

        // Backwards compatibility for outdated/poorly written plug-ins
        define('PLUGINDIR', WP_CONTENT_DIR .'/extend');

        // Must-use plug-ins directory
        define('WPMU_PLUGIN_DIR', WP_CONTENT_DIR .'/autoload');
        define('WPMU_PLUGIN_URL', WP_CONTENT_URL .'/autoload');

        //define('UPLOADS', '/media');

        // Disable WordPress core/plugins updating and file editing
        define('DISALLOW_FILE_MODS', true);

        // Number of Post Revisions to store
        define('WP_POST_REVISIONS', 5);

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
define('AUTH_KEY',         'unique-key');
define('SECURE_AUTH_KEY',  'unique-key');
define('LOGGED_IN_KEY',    'unique-key');
define('NONCE_KEY',        'unique-key');
define('AUTH_SALT',        'unique-key');
define('SECURE_AUTH_SALT', 'unique-key');
define('LOGGED_IN_SALT',   'unique-key');
define('NONCE_SALT',       'unique-key');

// WordPress Localized Language, defaults to English.
define('WPLANG', '');

/**
 * Sets up WordPress vars and included files.
 */
require_once ABSPATH .'wp-settings.php';

/* <> */
