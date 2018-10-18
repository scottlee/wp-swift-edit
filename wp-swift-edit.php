<?php
/**
 * Plugin Name: WP Swift Edit
 * Plugin URI:  https://github.com/scottlee/wp-swift-edit
 * Description: WP Swift Edit allows authenticated users to swiftly navigate to the edit post screen of a post or page by appending <code>?se</code> to the URL.
 * Version:     1.1
 * Author:      Scott Lee
 * Author URI:  https://scottlee.me
 * License:     GPL-3.0+
 */

/**
 * Register some useful globals.
 */
define( 'WP_SWIFT_EDIT_VERSION', '1.1' );
define( 'WP_SWIFT_EDIT_URL', plugin_dir_url( __FILE__ ) );
define( 'WP_SWIFT_EDIT_PATH', dirname( __FILE__ ) . '/' );
define( 'WP_SWIFT_EDIT_INC', WP_SWIFT_EDIT_PATH . 'includes/' );

/**
 * Includes
 */
require_once WP_SWIFT_EDIT_INC . 'wpsw-core.php';

/**
 * Light it up
 */
WP_SWIFT_EDIT\Core\setup();