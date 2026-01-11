<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Register Theme Options
add_action( 'carbon_fields_register_fields', 'ecovaro_attach_theme_options' );
function ecovaro_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options', 'ecovaro' ) )
        ->add_fields( [
            Field::make( 'separator', 'sep_general', __( 'Ustawienia Ogólne', 'ecovaro' ) ),
            Field::make( 'image', 'global_logo_white', __( 'Logo – White', 'ecovaro' ) ),
            Field::make( 'image', 'global_logo_color', __( 'Logo – Color', 'ecovaro' ) ),

            Field::make( 'separator', 'sep_footer_general', __( 'Stopka - Ogólne', 'ecovaro' ) ),

            Field::make( 'image', 'global_footer_logo', __( 'Logo w stopce', 'ecovaro' ) ),

            Field::make( 'complex', 'global_footer_socials', __( 'Social Media', 'ecovaro' ) )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( [
                    Field::make( 'image', 'social_icon', __( 'Ikona', 'ecovaro' ) ),
                    Field::make( 'text', 'social_link', __( 'Link', 'ecovaro' ) ),
                ] ),

            Field::make( 'text', 'global_footer_headline_mobile', __( 'Nagłówek (Mobile)', 'ecovaro' ) ),
            Field::make( 'text', 'global_footer_headline_desktop', __( 'Nagłówek (Desktop)', 'ecovaro' ) ),

            Field::make( 'separator', 'sep_footer_contact', __( 'Stopka - Dane Kontaktowe', 'ecovaro' ) ),
            Field::make( 'text', 'global_footer_phone', __( 'Telefon', 'ecovaro' ) ),
            Field::make( 'textarea', 'global_footer_address', __( 'Adres', 'ecovaro' ) ),
            Field::make( 'text', 'global_footer_company', __( 'Nazwa firmy', 'ecovaro' ) ),

            Field::make( 'separator', 'sep_footer_legal', __( 'Stopka - Prawne i Copyright', 'ecovaro' ) ),
            Field::make( 'rich_text', 'global_footer_copyright', __( 'Copyright', 'ecovaro' ) ),
            Field::make( 'text', 'global_footer_bottom_tagline', __( 'Tekst na samym dole', 'ecovaro' ) ),

            Field::make( 'complex', 'global_privacy_policy', __( 'Polityka Prywatności (Link)', 'ecovaro' ) )
                ->set_max( 1 )
                ->add_fields( [
                    Field::make( 'text', 'url', __( 'URL', 'ecovaro' ) ),
                    Field::make( 'text', 'title', __( 'Tytuł', 'ecovaro' ) ),
                    Field::make( 'select', 'target', __( 'Otwórz w', 'ecovaro' ) )->set_options( [ '_self' => 'Tym samym oknie', '_blank' => 'Nowym oknie' ] ),
                ] ),

            Field::make( 'complex', 'global_cookie_link', __( 'Polityka Cookies (Link)', 'ecovaro' ) )
                ->set_max( 1 )
                ->add_fields( [
                    Field::make( 'text', 'url', __( 'URL', 'ecovaro' ) ),
                    Field::make( 'text', 'title', __( 'Tytuł', 'ecovaro' ) ),
                    Field::make( 'select', 'target', __( 'Otwórz w', 'ecovaro' ) )->set_options( [ '_self' => 'Tym samym oknie', '_blank' => 'Nowym oknie' ] ),
                ] ),
        ] );
}




?>