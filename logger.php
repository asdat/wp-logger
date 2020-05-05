<?php

/**
 * @package           Logger
 *
 * @wordpress-plugin
 * Plugin Name:       Logger Plugin
 * Description:       This is a plugin to log user logs in and out actions.
 * Version:           1.0.0
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 */
define( 'WP_LOGGER_VERSION', '1.0.0' );

require plugin_dir_path( __FILE__ ) . 'includes/class-logger.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_logger() {

	if ( ! session_id() ) {
		session_start();
	}

	$plugin = new Logger();
	$plugin->run();

}

run_logger();
