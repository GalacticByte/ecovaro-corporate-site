<?php
/**
 * Enqueue scripts and styles.
 *
 * @package ECOVARO
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function ECOVARO_scripts() {
	// Bootstrap 5 CSS
	wp_enqueue_style(
		'bootstrap-css',
		ECOVARO_URI . '/assets/css/bootstrap.min.css',
		array(),
		'5.3.8'
	);

	// Main stylesheet
	wp_enqueue_style(
		'ecovaro-style',
		ECOVARO_URI . '/assets/css/style.css',
		array( 'bootstrap-css' ), // Dependency on Bootstrap CSS
		filemtime( ECOVARO_DIR . '/assets/css/style.css' ) // Versioning based on modification date
	);

	// Bootstrap 5 JS Bundle (includes Popper.js)
	wp_enqueue_script(
		'bootstrap-js',
		ECOVARO_URI . '/assets/js/bootstrap.bundle.min.js',
		array(), // Bootstrap 5 does not require jQuery
		'5.3.3', // Bootstrap version
		true // Load in footer
	);

	// Swiper CSS
	wp_enqueue_style(
		'swiper-css',
		ECOVARO_URI . '/assets/js/swiper/swiper-bundle.min.css',
		array( 'bootstrap-css' ), // Dependency on Bootstrap CSS
		ECOVARO_VERSION
	);

	// Swiper JS
	wp_enqueue_script(
		'swiper-js',
		ECOVARO_URI . '/assets/js/swiper/swiper-bundle.min.js',
		array(), // Swiper has no jQuery dependency
		ECOVARO_VERSION,
		true // Load in footer
	);

	// Main JavaScript file
	wp_enqueue_script(
		'ecovaro-main',
		ECOVARO_URI . '/assets/js/main.js',
		array( 'jquery', 'bootstrap-js', 'swiper-js' ), // Added dependency on swiper-js
		filemtime( ECOVARO_DIR . '/assets/js/main.js' ),
		true // Load in footer
	);

	// Enables comment replies
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ECOVARO_scripts' );
