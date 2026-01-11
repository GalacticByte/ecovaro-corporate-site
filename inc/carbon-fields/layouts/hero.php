<?php
use Carbon_Fields\Field;

return array(
    Field::make( 'select', 'layout', 'Wariant sekcji' )
        ->add_options( array(
            'default'      => 'Domyślny (Home)',
            'image-banner' => 'Baner obrazkowy',
            'extended'     => 'Rozszerzony (z przyciskiem scroll)',
        ) )
        ->set_default_value( 'default' ),

    Field::make( 'text', 'title', 'Tytuł' ),
    Field::make( 'text', 'subtitle', 'Podtytuł' ),

    //Options for 'image-banner' layout
    Field::make( 'checkbox', 'show_headline', 'Pokaż nagłówek' )
        ->set_conditional_logic( array( array( 'field' => 'layout', 'value' => 'image-banner' ) ) ),
    Field::make( 'image', 'banner_image_desktop', 'Baner Desktop' )
        ->set_conditional_logic( array( array( 'field' => 'layout', 'value' => 'image-banner' ) ) ),
    Field::make( 'image', 'banner_image_mobile', 'Baner Mobile' )
        ->set_conditional_logic( array( array( 'field' => 'layout', 'value' => 'image-banner' ) ) ),

    // Options for 'extended' layout
    Field::make( 'text', 'scroll_button_text', 'Tekst przycisku scroll' )
        ->set_conditional_logic( array( array( 'field' => 'layout', 'value' => 'extended' ) ) ),
    Field::make( 'image', 'scroll_button_icon', 'Ikona przycisku scroll' )
        ->set_conditional_logic( array( array( 'field' => 'layout', 'value' => 'extended' ) ) ),
    Field::make( 'image', 'scroll_button_icon_hover', 'Ikona przycisku scroll (Hover)' )
        ->set_conditional_logic( array( array( 'field' => 'layout', 'value' => 'extended' ) ) ),
    Field::make( 'image', 'bottom_bar_icon', 'Ikona w dolnym pasku' )
        ->set_conditional_logic( array( array( 'field' => 'layout', 'value' => 'extended' ) ) ),

    // BG section
    Field::make( 'separator', 'sep_bg', 'Tło sekcji' ),
    Field::make( 'select', 'bg_type', 'Typ tła' )
        ->add_options( array(
            'image' => 'Obraz',
            'video' => 'Wideo',
        ) )
        ->set_default_value( 'image' )
        ->set_conditional_logic( array( array( 'field' => 'layout', 'value' => 'image-banner', 'compare' => '!=' ) ) ),

    Field::make( 'image', 'bg_image', 'Obraz tła (Desktop)' )
        ->set_conditional_logic( array( array( 'field' => 'bg_type', 'value' => 'image' ), array( 'field' => 'layout', 'value' => 'image-banner', 'compare' => '!=' ) ) ),
    Field::make( 'image', 'bg_image_mobile', 'Obraz tła (Mobile)' )
        ->set_conditional_logic( array( array( 'field' => 'bg_type', 'value' => 'image' ), array( 'field' => 'layout', 'value' => 'image-banner', 'compare' => '!=' ) ) ),

    Field::make( 'file', 'bg_video_desktop', 'Wideo tła (Desktop)' )
        ->set_type( array( 'video' ) )
        ->set_conditional_logic( array( array( 'field' => 'bg_type', 'value' => 'video' ), array( 'field' => 'layout', 'value' => 'image-banner', 'compare' => '!=' ) ) ),
    Field::make( 'file', 'bg_video_mobile', 'Wideo tła (Mobile)' )
        ->set_type( array( 'video' ) )
        ->set_conditional_logic( array( array( 'field' => 'bg_type', 'value' => 'video' ), array( 'field' => 'layout', 'value' => 'image-banner', 'compare' => '!=' ) ) ),

    // // Padding fields
    // Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    // Field::make( 'checkbox', 'padding_top', 'Padding górny' )
    //     ->set_default_value( true ),
    // Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )
    //     ->set_default_value( true ),
);
