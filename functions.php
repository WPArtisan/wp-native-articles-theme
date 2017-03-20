<?php
/**
 * Functions file for wp-native-articles-theme V2
 *
 * @package wp-native-articles-theme
 */

// If this file is called directly abort
if ( ! defined( 'WPINC' ) ) {
	wp_die();
}

// Define the current version
define( 'WPNAT_VERSION', '2.0.0' );

// Path to this directory
define( 'WPNAT_BASE_PATH', get_template_directory() );

/**
 * A global function that kicks everything off.
 * Really just to stop everything polluting the
 * global namespace.
 *
 * @return void
 */
if ( ! function_exists( 'wpnat_initialise' ) ) :

	function wpnat_initialise() {

		// Global functions and helper files.
		// Don't execute anything on their own.

		// Load the helper file
		// require WPNAT_BASE_PATH . '/inc/functions-helpers.php';

		// Setup files and functions that do minor stuff

		// Load the setup file
		require WPNAT_BASE_PATH . '/inc/setup.php';

		// Classes that register hooks and do stuff.

		// Load the caching class.
		require WPNAT_BASE_PATH . '/inc/class-main.php';
		$main = new WPNAT_Main();
	}
endif;

wpnat_initialise();
