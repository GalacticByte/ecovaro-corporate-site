<?php
use Carbon_Fields\Field;

return array(
    Field::make( 'select', 'layout_type', 'Wariant układu' )
        ->add_options( array(
            'standard' => 'Standardowy (Tytuł nad kartami)',
            'intro'    => 'Intro (Tytuł jako pierwsza karta)',
        ) )
        ->set_default_value( 'standard' ),
    Field::make( 'text', 'title', 'Tytuł sekcji' ),
    Field::make( 'textarea', 'description', 'Opis sekcji' )
        ->set_rows( 4 ),

    Field::make( 'complex', 'cards', 'Karty' )
        ->set_layout( 'tabbed-vertical' )
        ->setup_labels( array(
            'plural_name' => 'Karty',
            'singular_name' => 'Karta',
        ) )
        ->add_fields( array(
            Field::make( 'image', 'image', 'Zdjęcie (Desktop)' ), // Return ID
            Field::make( 'image', 'image_mobile', 'Zdjęcie (Mobile)' ), // Return ID
            Field::make( 'checkbox', 'is_icon', 'Wyświetl jako ikonę' ),
            Field::make( 'text', 'card_title', 'Tytuł karty' ),
            Field::make( 'textarea', 'card_description', 'Opis karty' )
                ->set_rows( 3 ),

            Field::make( 'text', 'link_url', 'Link URL' ),
            Field::make( 'text', 'link_text', 'Tekst linku' ),
            Field::make( 'select', 'link_target', 'Otwórz w' )
                ->add_options( array(
                    '_self' => 'Tym samym oknie',
                    '_blank' => 'Nowym oknie',
                ) )
                ->set_default_value( '_self' ),
        ) ),

    Field::make( 'separator', 'sep_anchor', 'Kotwica' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )
        ->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )
        ->set_default_value( true ),
);