<?php

/**
 * The base configurations for WordPress.
 *
 * This file has the following configurations:
 *   -  MySQL settings
 *   -  Table Prefix
 *   -  Secret Keys
 *   -  WordPress Language
 *   -  Development/Debugging
 *   -  Environment settings
 *   -  Path/URL definitions (DIR, ABSPATH, HOME, CDN)
 *
 * You can find more information by visiting the Editing wp-config.php Codex
 * page.
 *
 * @see  http://codex.wordpress.org/Editing_wp-config.php
 *
 * @link  https://github.com/jasondmoss/Development-Snippets/blob/master/wp-config.php
 */


defined('__DIR__') || define('__DIR__', dirname(__FILE__));
defined('__DS__') || define('__DS__', DIRECTORY_SEPARATOR);
defined('ABSPATH') || define('ABSPATH', dirname(__FILE__) .'/');


/**
 * Increase memory allocated to PHP.
 */
define('WP_MEMORY_LIMIT', '96M');


/**
 * Automatic Database Optimizing.
 */
define('WP_ALLOW_REPAIR', true);


/**
 * Dynamically set the home/site URLs.
 *
 * This may need to be removed for some unique server set-ups (eg. when
 * using reverse proxies).
 */
$host = 'http'. ((isset($_SERVER['HTTPS']))? 's' : '') .'://'. $_SERVER['SERVER_NAME'];
define('WP_HOME', $host);
define('WP_SITEURL', $host);


/**
 * Database credentials/details.
 */
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_general_ci');
$table_prefix  = 'unique__';


/**
 * Authentication Unique Keys and Salts.
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
 * WordPress Localized Language, defaults to English.
 *
 * @see  http://wpcentral.io/internationalization/
 * @see  http://codex.wordpress.org/WordPress_in_Your_Language
 */
define('WPLANG', '');
// define('WPLANG', 'cs_CZ');  /* Czech. */
// define('WPLANG', 'en_GB');  /* English (UK). */
// define('WPLANG', 'fa_IR');  /* Persian. */
// define('WPLANG', 'fr_BE');  /* French (Belgium). */
// define('WPLANG', 'fr_FR');  /* French (France). */


/**
 * Force secure connection to the login and adminstration pages.
 *
 * Requires SSL configured on the server and a (virtual) host configured for
 * the secure server.
 *
 * @see  http://codex.wordpress.org/Administration_Over_SSL
 */
// define('FORCE_SSL_ADMIN', true);
// define('FORCE_SSL_LOGIN', true);


/**
 * CDN asset base domain URL.
 *
 * @example  //unique_bucket_token.cloudfront.net/
 */
defined('CDNDOMAIN') ?: define('CDNDOMAIN', null);


/**
 * Disables updates to WordPress core.
 */
define('WP_AUTO_UPDATE_CORE', false);


/**
 * Disable WordPress core/plugins file editing.
 */
define('DISALLOW_FILE_EDIT', true);


/**
 * Disable WordPress core/plugins updating.
 */
define('DISALLOW_FILE_MODS', true);


/**
 * Send media files to the trash instead of immediately deleting. This gives you
 * the option of 'undo' for trashed media files.
 */
define('MEDIA_TRASH', true);


/**
 * Automatically empty trash after these amount of days (default 30).
 */
define('EMPTY_TRASH_DAYS', 90);


/**
 * Do not download generic themes with WP upgrades.
 */
define('CORE_UPGRADE_SKIP_NEW_BUNDLED', true);


/**
 * Number of Post Revisions to store.
 */
define('WP_POST_REVISIONS', 3);


/**
 * Define our server environment.
 *
 * This should only really be used/set while developing on your localhost, or
 * a remote development server.
 *
 *
 * --------------------------------------------------------------------------- *
 *  !!!          CHANGE THIS TO '0' ON STAGING/PRODUCTION SERVER          !!!  *
 * --------------------------------------------------------------------------- *
 */
define('DEVELOPMENT', 1);
/*
 * --------------------------------------------------------------------------- *
 *  !!!          CHANGE THIS TO '0' ON STAGING/PRODUCTION SERVER          !!!  *
 * --------------------------------------------------------------------------- *
 */


/**
 * Are we currently on Remote or local Development Server? Adjust to your
 * development server(s) environment(s)/requirements.
 *
 * We set this as a global variable so we may query it site-wide through our
 * custom plug-ins and themes.
 *
 * @global  boolean $isDevelopmentServer Development server or not.
 */
global $isDevelopmentServer;
$isDevelopmentServer = (

    /**
     * If development flag is set.
     */
    1 == DEVELOPMENT

    /**
     * Remote Development IP(s) || Local Server IP.
     */
    && ('00.000.00.00' == $_SERVER['SERVER_ADDR']
        || '11.111.11.11' == $_SERVER['SERVER_ADDR']
        || '22.222.22.22' == $_SERVER['SERVER_ADDR']
        || '127.0.0.1' == $_SERVER['SERVER_ADDR']
    )

    /**
     * Remote Domain(s) || Local Server Domain.
     */
    && ('dev.mydomain.com' == $_SERVER['HOSTNAME']
        || 'dev1.mydomain.com' == $_SERVER['SERVER_NAME']
        || 'dev2.mydomain.com' == $_SERVER['SERVER_NAME']
        || 'localhost.dev' == $_SERVER['SERVER_NAME']
    )
);


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of _ALL_ notices during
 * the development phase of your WordPress project.
 *
 * It is _STRONGLY_ recommended that _ALL_ plugin and theme developers _ALWAYS_
 * use these settings in their development environments. It is _YOUR_
 * responsibility to deliver safe, secure code to (your clients | the public).
 *
 * This would _GREATLY_ help in cutting down on all the crap code currently
 * found in the WordPress Plug-In/Theme Repositories/Communities. No offense
 * to any one in particular, my code is not perfect either.
 */
if (1 == DEVELOPMENT) {


    /**
     * Development Environment.
     * ----------------------------------------------------------------------- *
     */


    /**
     * Disable all caching.
     */
    define('ENABLE_CACHE', false);
    define('WP_CACHE', false);


    /**
     * Fully enable PHP error reporting.
     */
    error_reporting(-1);


    /**
     * Enable WordPress Debugging.
     */
    define('WP_DEBUG', true);


    /*
     * Enable WordPress Script debugging.
     */
    define('SCRIPT_DEBUG', true);


    /*
     * Display all PHP/WordPress debugging warnings and errors on screen.
     */
    define('WP_DEBUG_DISPLAY', true);


    /**
     * Display RSS debugging warnings and errors.
     */
    define('MAGPIE_DEBUG', true);


    /*
     * Save WordPress database queries to an array for deeper analysis.
     */
    define('SAVEQUERIES', true);


    /**
     * Do not contatenate (combine) CSS/JS files.
     */
    define('CONCATENATE_SCRIPTS', false);


    /**
     * Do not compress JS files.
     */
    define('COMPRESS_SCRIPTS', false);


    /**
     * Do not compress CSS files.
     */
    define('COMPRESS_CSS', false);


    /**
     * Do not gzip any HTTP requests.
     */
    define('ENFORCE_GZIP', false);
} else {


    /**
     * Production Environment.
     * ----------------------------------------------------------------------- *
     */


    /**
     * Enable caching.
     */
    define('ENABLE_CACHE', true);
    define('WP_CACHE', true);


    /**
     * Fully disable PHP error reporting.
     */
    error_reporting(0);


    /**
     * Disable WordPress Debugging.
     */
    define('WP_DEBUG', false);


    /*
     * Disable WordPress Script debugging.
     */
    define('SCRIPT_DEBUG', false);


    /*
     * Do not display any PHP/WordPress debugging warnings and errors on screen.
     */
    define('WP_DEBUG_DISPLAY', false);


    /**
     * Disable RSS debugging warnings and errors.
     */
    define('MAGPIE_DEBUG', false);


    /*
     * Do not save WordPress database queries to an array for analysis
     * (potential security risk).
     */
    define('SAVEQUERIES', false);


    /**
     * Contatenate (combine) CSS/JS files.
     */
    define('CONCATENATE_SCRIPTS', true);


    /**
     * Compress JS files.
     */
    define('COMPRESS_SCRIPTS', true);


    /**
     * Compress CSS files.
     */
    define('COMPRESS_CSS', true);


    /**
     * Gzip all HTTP requests.
     */
    define('ENFORCE_GZIP', true);
}


/**
 * Sets up WordPress variables and included files.
 */
require_once(ABSPATH .'wp-settings.php');

/* <> */
