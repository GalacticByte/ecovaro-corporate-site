<?php
use Carbon_Fields\Field;

return array(
    // Left Box
    Field::make( 'separator', 'sep_left', 'Lewy Box' ),
    Field::make( 'color', 'left_bg_color', 'Kolor tła' )
    ->set_alpha_enabled( true ),
    Field::make( 'checkbox', 'left_text_light', 'Jasny tekst (biały)' ),
    Field::make( 'text', 'left_title', 'Tytuł' ),
    Field::make( 'textarea', 'left_subtitle', 'Podtytuł' )
        ->set_rows( 2 ),
    Field::make( 'text', 'left_btn_text', 'Tekst przycisku' ),
    Field::make( 'text', 'left_btn_url', 'Link przycisku' ),
    Field::make( 'select', 'left_btn_target', 'Otwórz w' )
        ->add_options( array( '_self' => 'Tym samym oknie', '_blank' => 'Nowym oknie' ) )
        ->set_default_value( '_self' ),

    // Right Box
    Field::make( 'separator', 'sep_right', 'Prawy Box' ),
    Field::make( 'color', 'right_bg_color', 'Kolor tła' )
    ->set_alpha_enabled( true ),
    Field::make( 'checkbox', 'right_text_light', 'Jasny tekst (biały)' )->set_default_value( true ),
    Field::make( 'text', 'right_title', 'Tytuł' ),
    Field::make( 'textarea', 'right_subtitle', 'Podtytuł' )
        ->set_rows( 2 ),
    Field::make( 'text', 'right_btn_text', 'Tekst przycisku' ),
    Field::make( 'text', 'right_btn_url', 'Link przycisku' ),
    Field::make( 'select', 'right_btn_target', 'Otwórz w' )
        ->add_options( array( '_self' => 'Tym samym oknie', '_blank' => 'Nowym oknie' ) )
        ->set_default_value( '_self' ),

    // Padding
    Field::make( 'separator', 'sep_anchor', 'Kotiwca' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )
        ->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )
        ->set_default_value( true ),
);