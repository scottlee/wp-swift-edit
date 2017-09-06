<?php
/**
 * Plugin Name: WP Swift Edit
 * Plugin URI:  https://github.com/scottlee/wp-swift-edit
 * Description: WP Swift Edit allows user to swiftly navigate to the edit post screen based on a query param.
 * Version:     0.1.0
 * Author:      Scott Lee
 * Author URI:  https://scottlee.me
 * License:     GPL-3.0+
 */

/**
 * Register some useful globals.
 */
define( 'WPSE_VERSION', '0.1.0' );
define( 'WPSE_URL', plugin_dir_url( __FILE__ ) );
define( 'WPSE_PATH', dirname( __FILE__ ) . '/' );
define( 'WPSE_INC', WPSE_PATH . 'includes/' );

/**
 * Includes
 */
require_once WPSE_INC . 'wpsw-core.php';

/**
 * Light it up
 */
WPSW\Core\setup();