<?php
use Carbon_Fields\Field;

return array(
    Field::make( 'text', 'intro_title', 'Tytuł wprowadzający' ),

    Field::make( 'complex', 'stats_items', 'Elementy statystyk' )
        ->set_layout( 'tabbed-vertical' )
        ->setup_labels( array(
            'plural_name' => 'Elementy',
            'singular_name' => 'Element',
        ) )
        ->add_fields( array(
            Field::make( 'text', 'stat_number', 'Liczba / Wartość' ),
            Field::make( 'text', 'stat_label', 'Opis / Etykieta' ),
        ) ),

    Field::make( 'separator', 'sep_anchor', 'Kotwica' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )
        ->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )
        ->set_default_value( true ),
);