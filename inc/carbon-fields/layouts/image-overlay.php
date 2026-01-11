<?php
use Carbon_Fields\Field;

return array(
    Field::make( 'text', 'title', 'Tytuł' ),
    Field::make( 'textarea', 'content', 'Tekst' )
        ->set_rows( 4 ),

    Field::make( 'image', 'bg_image', 'Zdjęcie w tle' ),
    Field::make( 'image', 'icon', 'Ikona' ),

    Field::make( 'separator', 'sep_anchor', 'Kotwica' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )
        ->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )
        ->set_default_value( true ),
);