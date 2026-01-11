<?php

use Carbon_Fields\Field;

return array(
    Field::make( 'text', 'title', __( 'Tytuł sekcji', 'ecovaro' ) ),
    Field::make( 'rich_text', 'text', __( 'Tekst', 'ecovaro' ) ),
    Field::make( 'text', 'form_shortcode', __( 'Shortcode formularza', 'ecovaro' ) ),
    Field::make( 'text', 'extra_class', __( 'Dodatkowa klasa CSS', 'ecovaro' ) ),

    Field::make( 'separator', 'sep_anchor', 'Kotwica' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )->set_default_value( true ),
);