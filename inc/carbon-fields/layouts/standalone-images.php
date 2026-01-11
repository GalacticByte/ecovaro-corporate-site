<?php
use Carbon_Fields\Field;

return array(
    Field::make( 'image', 'image_desktop', 'Zdjęcie (Desktop)' ),
    Field::make( 'image', 'image_mobile', 'Zdjęcie (Mobile)' ),

    Field::make( 'separator', 'sep_anchor', 'Kotwica' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )
        ->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )
        ->set_default_value( true ),
);