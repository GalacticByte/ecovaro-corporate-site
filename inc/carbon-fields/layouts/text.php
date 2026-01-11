<?php
use Carbon_Fields\Field;

return array(
    Field::make( 'select', 'variant', 'Wariant sekcji' )
        ->add_options( array(
            'text'     => 'Sekcja Tekstowa (Standard)',
            'headline' => 'Nagłówek (Headline)',
        ) )
        ->set_default_value( 'text' ),

    Field::make( 'text', 'title', 'Tytuł' ),

    // Fields for the Text variant
    Field::make( 'textarea', 'content', 'Treść' )
        ->set_rows( 8 )
        ->set_conditional_logic( array( array( 'field' => 'variant', 'value' => 'text' ) ) ),

    Field::make( 'checkbox', 'show_button', 'Pokaż przycisk' )
        ->set_default_value( false )
        ->set_conditional_logic( array( array( 'field' => 'variant', 'value' => 'text' ) ) ),

    Field::make( 'text', 'button_text', 'Tekst przycisku' )
        ->set_conditional_logic( array( array( 'field' => 'show_button', 'value' => true ), array( 'field' => 'variant', 'value' => 'text' ) ) ),
    Field::make( 'text', 'button_url', 'Link przycisku' )
        ->set_conditional_logic( array( array( 'field' => 'show_button', 'value' => true ), array( 'field' => 'variant', 'value' => 'text' ) ) ),
    Field::make( 'select', 'button_target', 'Otwórz w' )
        ->add_options( array(
            '_self'  => 'Tym samym oknie',
            '_blank' => 'Nowym oknie',
        ) )
        ->set_default_value( '_self' )
        ->set_conditional_logic( array( array( 'field' => 'show_button', 'value' => true ), array( 'field' => 'variant', 'value' => 'text' ) ) ),
    Field::make( 'select', 'button_style', 'Styl przycisku' )
        ->add_options( array(
            'bg-green'  => 'Niebieski (bg-green)',
            'bg-white' => 'Biały (bg-white)',
        ) )
        ->set_default_value( 'bg-green' )
        ->set_conditional_logic( array( array( 'field' => 'show_button', 'value' => true ), array( 'field' => 'variant', 'value' => 'text' ) ) ),

    // Fields for the Headline variant
    Field::make( 'textarea', 'headline_paragraph', 'Tekst akapitu' )
        ->set_rows( 4 )
        ->set_conditional_logic( array( array( 'field' => 'variant', 'value' => 'headline' ) ) ),
    Field::make( 'color', 'bg_color', 'Kolor tła' )
        ->set_conditional_logic( array( array( 'field' => 'variant', 'value' => 'headline' ) ) ),
    Field::make( 'select', 'title_tag', 'Tag tytułu' )
        ->add_options( array( 'h1'=>'H1', 'h2'=>'H2', 'h3'=>'H3', 'h4'=>'H4', 'h5'=>'H5', 'h6'=>'H6', 'div'=>'div' ) )
        ->set_default_value( 'h1' )
        ->set_conditional_logic( array( array( 'field' => 'variant', 'value' => 'headline' ) ) ),
    Field::make( 'select', 'wrapper_tag', 'Tag kontenera' )
        ->add_options( array( 'section'=>'section', 'header'=>'header', 'div'=>'div' ) )
        ->set_default_value( 'section' )
        ->set_conditional_logic( array( array( 'field' => 'variant', 'value' => 'headline' ) ) ),

    Field::make( 'separator', 'sep_anchor', 'Kotwica' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )
        ->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )
        ->set_default_value( true ),
);