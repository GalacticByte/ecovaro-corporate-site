<?php
use Carbon_Fields\Field;

return array(
    Field::make( 'select', 'layout_style', 'Styl layoutu' )
        ->add_options( array(
            'v1' => 'Wersja 1 (Standard)',
            'v2' => 'Wersja 2 (Hero)',
        ) )
        ->set_default_value( 'v1' ),

    Field::make( 'color', 'bg_color', 'Kolor tła' )
        ->set_default_value( '#F1F0F5' ),

    Field::make( 'text', 'title', 'Tytuł' ),
    Field::make( 'textarea', 'content', 'Treść' )
        ->set_rows( 8 ),
    Field::make( 'image', 'image', 'Zdjęcie' ),
    Field::make( 'select', 'image_position', 'Pozycja zdjęcia' )
        ->add_options( array(
            'left' => 'Lewo',
            'right' => 'Prawo',
        ) )
        ->set_default_value( 'left' ),

    // V1 fields
    Field::make( 'separator', 'sep_btn_v1', 'Przycisk' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v1' ) ) ),
    Field::make( 'text', 'button_text', 'Tekst przycisku' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v1' ) ) ),
    Field::make( 'text', 'button_url', 'Link przycisku' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v1' ) ) ),
    Field::make( 'select', 'button_target', 'Otwórz w' )
        ->add_options( array( '_self' => 'Tym samym oknie', '_blank' => 'Nowym oknie' ) )
        ->set_default_value( '_self' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v1' ) ) ),

    // V2 fields
    Field::make( 'separator', 'sep_btn_v2', 'Ustawienia' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v2' ) ) ),
    Field::make( 'checkbox', 'full_width', 'Kontener na 100% szerokości' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v2' ) ) ),
    Field::make( 'checkbox', 'add_padding', 'Dodatkowy padding dla tekstu' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v2' ) ) ),
    Field::make( 'text', 'image_caption', 'Podpis pod zdjęciem' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v2' ) ) ),
    Field::make( 'text', 'scroll_btn_text', 'Tekst przycisku scroll' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v2' ) ) ),
    Field::make( 'text', 'scroll_btn_link', 'Link przycisku scroll (ID/klasa sekcji)' )
        ->set_default_value( '#main' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v2' ) ) ),
    Field::make( 'image', 'scroll_btn_icon', 'Ikona przycisku scroll' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v2' ) ) ),
    Field::make( 'image', 'scroll_btn_icon_hover', 'Ikona przycisku scroll (hover)' )
        ->set_conditional_logic( array( array( 'field' => 'layout_style', 'value' => 'v2' ) ) ),

    Field::make( 'separator', 'sep_anchor', 'Kotwica' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    // Padding fields
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )
        ->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )
        ->set_default_value( true ),
);