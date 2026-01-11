<?php
use Carbon_Fields\Field;

return array(
    Field::make( 'text', 'title', 'Tytuł sekcji' ),

    Field::make( 'complex', 'slides', 'Slajdy' )
        ->set_layout( 'tabbed-vertical' )
        ->setup_labels( array(
            'plural_name' => 'Slajdy',
            'singular_name' => 'Slajd',
        ) )
        ->add_fields( array(
            Field::make( 'image', 'image', 'Zdjęcie' ),
            Field::make( 'text', 'link_url', 'Link URL' ),
            Field::make( 'select', 'link_target', 'Otwórz w' )
                ->add_options( array(
                    '_self' => 'Tym samym oknie',
                    '_blank' => 'Nowym oknie',
                ) )
                ->set_default_value( '_self' ),
        ) ),

    Field::make( 'separator', 'sep_btn', 'Przycisk pod karuzelą' ),
    Field::make( 'text', 'button_text', 'Tekst przycisku' ),
    Field::make( 'text', 'button_url', 'Link przycisku' ),
    Field::make( 'select', 'button_target', 'Otwórz w' )
        ->add_options( array(
            '_self' => 'Tym samym oknie',
            '_blank' => 'Nowym oknie',
        ) )
        ->set_default_value( '_self' ),

    Field::make( 'separator', 'sep_anchor', 'Kotwica' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )
        ->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )
        ->set_default_value( true ),
);