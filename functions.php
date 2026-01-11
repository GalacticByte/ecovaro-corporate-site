<?php
/**
 * Ecovaro Functions and Definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ecovaro_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


// Define constants for paths
define( 'ECOVARO_VERSION', '1.0.0' );
define( 'ECOVARO_DIR', get_template_directory() );
define( 'ECOVARO_URI', get_template_directory_uri() );


// Load Composer autoloader (required for Carbon Fields)
require_once ECOVARO_DIR . '/vendor/autoload.php';

// Load configuration files from /inc folder
require_once ECOVARO_DIR . '/inc/theme-setup.php';
require_once ECOVARO_DIR . '/inc/enqueue-scripts.php';
require_once ECOVARO_DIR . '/inc/carbon-fields/bootstrap.php';
// require_once ECOVARO_DIR . '/inc/carbon-fields/definitions.php'; // Load field definitions
require_once ECOVARO_DIR . '/inc/bootstrap_5_wp_nav_menu_walker.php';
