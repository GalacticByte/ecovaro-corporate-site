<?php
/**
 * Custom template tags for this theme.
 *
 * @package ECOVARO_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'get_gbyte_button' ) ) {
	/**
	 * Generates and returns the HTML for a custom theme button.
	 *
	 * @param array $args {
	 *     An array of arguments.
	 *
	 *     @type string $text     The button text.
	 *     @type string $url      The button URL.
	 *     @type string $classes  Additional CSS classes for the button.
	 * }
	 * @return string The button HTML.
	 */
	function get_gbyte_button( $args = array() ) {
		$defaults = array(
			'text'    => __( 'Click me', 'ecovaro' ),
			'url'     => '#',
			'classes' => '',
		);
		$args = wp_parse_args( $args, $defaults );

		$arrow_url  = get_template_directory_uri() . '/assets/images/strona-glowna/arrow-btn-01.svg';
		$arrow_html = sprintf( ' <img class="arrow" src="%s" alt="">', esc_url( $arrow_url ) );

		$button_html = sprintf(
			'<a href="%s" class="btn gbyte-btn %s">%s%s</a>',
			esc_url( $args['url'] ),
			esc_attr( $args['classes'] ),
			esc_html( $args['text'] ),
			$arrow_html
		);

		return $button_html;
	}
}