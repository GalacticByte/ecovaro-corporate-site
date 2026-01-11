<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// 1. Fields for the "Apply" page (assigned to the page template)
Container::make( 'post_meta', __( 'Ustawienia formularza', 'ecovaro' ) )
    // Condition: Show only when the "Apply Page" template is selected
    ->where( 'post_template', '=', 'page-template/template-apply.php' )
    ->add_fields( array(
        Field::make( 'text', 'apply_form_title', __( 'Tytuł formularza', 'ecovaro' ) )
            ->set_default_value( 'Aplikuj' ),
        Field::make( 'text', 'apply_form_shortcode', __( 'Shortcode formularza (CF7)', 'ecovaro' ) )
            ->set_help_text( 'Wklej tutaj shortcode, np. [contact-form-7 id="5" title="Formularz"]' ),
    ) );

// 2. Fields for Custom Post Type: Job Offers
Container::make( 'post_meta', __( 'Szczegóły oferty', 'ecovaro' ) )
    ->where( 'post_type', '=', 'job_offer' )
    ->add_fields( array(
        Field::make( 'textarea', 'job_offer_excerpt', __( 'Krótki opis (zajawka)', 'ecovaro' ) )
            ->set_rows( 4 )
            ->set_help_text( __( 'Ten tekst pojawi się na kafelku z ofertą na liście.', 'ecovaro' ) ),
    ) );