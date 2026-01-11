<?php
use Carbon_Fields\Carbon_Fields;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once __DIR__ . '/theme-options.php';
    Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'crb_register_custom_fields' );
function crb_register_custom_fields() {
    // Tutaj wczytujemy definicje pól
    require_once get_template_directory() . '/inc/carbon-fields/page-builder.php';
    require_once get_template_directory() . '/inc/carbon-fields/definitions.php';

}