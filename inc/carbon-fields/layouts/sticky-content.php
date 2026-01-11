<?php
use Carbon_Fields\Field;

return array(
    Field::make( 'text', 'left_title', 'Tytuł (Lewa kolumna)' ),
    Field::make( 'image', 'left_image', 'Zdjęcie (Lewa kolumna)' ),

    Field::make( 'complex', 'content_items', 'Treść (Prawa kolumna)' )
        ->set_layout( 'tabbed-vertical' )
        ->setup_labels( array(
            'plural_name' => 'Elementy',
            'singular_name' => 'Element',
        ) )
        ->add_fields( array(
            Field::make( 'text', 'item_title', 'Tytuł elementu' ),
            Field::make( 'textarea', 'item_text', 'Treść elementu' )
                ->set_rows( 3 ),
        ) ),

    Field::make( 'separator', 'sep_anchor', 'Kotwica' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )
        ->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )
        ->set_default_value( true ),
);