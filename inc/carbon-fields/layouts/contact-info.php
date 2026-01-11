<?php
use Carbon_Fields\Field;

return array(
    Field::make( 'separator', 'sep_left', 'Lewa kolumna' ),
    Field::make( 'text', 'left_title', 'Tytuł sekcji' ),

    Field::make( 'text', 'address_subtitle', 'Podtytuł adresu' ),
    Field::make( 'rich_text', 'address_content', 'Treść adresu' ),

    Field::make( 'text', 'hours_subtitle', 'Podtytuł godzin' ),
    Field::make( 'text', 'hours_content', 'Treść godzin' ),

    Field::make( 'separator', 'sep_right_1', 'Prawa kolumna - Grupa 1' ),
    Field::make( 'text', 'right_title_1', 'Tytuł grupy 1' ),
    Field::make( 'complex', 'right_items_1', 'Elementy grupy 1' )
        ->set_layout( 'tabbed-vertical' )
        ->setup_labels( array(
            'plural_name' => 'Elementy',
            'singular_name' => 'Element',
        ) )
        ->add_fields( array(
            Field::make( 'text', 'item_subtitle', 'Podtytuł elementu' ),
            Field::make( 'text', 'link_url', 'Link URL' ),
            Field::make( 'text', 'link_text', 'Tekst linku' ),
            Field::make( 'select', 'link_target', 'Otwórz w' )
                ->add_options( array(
                    '_self' => 'Tym samym oknie',
                    '_blank' => 'Nowym oknie',
                ) )
                ->set_default_value( '_self' ),
        ) ),

    Field::make( 'separator', 'sep_right_2', 'Prawa kolumna - Grupa 2' ),
    Field::make( 'text', 'right_title_2', 'Tytuł grupy 2' ),
    Field::make( 'complex', 'right_items_2', 'Elementy grupy 2' )
        ->set_layout( 'tabbed-vertical' )
        ->setup_labels( array(
            'plural_name' => 'Elementy',
            'singular_name' => 'Element',
        ) )
        ->add_fields( array(
            Field::make( 'text', 'item_subtitle', 'Podtytuł elementu' ),
            Field::make( 'text', 'link_url', 'Link URL' ),
            Field::make( 'text', 'link_text', 'Tekst linku' ),
            Field::make( 'select', 'link_target', 'Otwórz w' )
                ->add_options( array(
                    '_self' => 'Tym samym oknie',
                    '_blank' => 'Nowym oknie',
                ) )
                ->set_default_value( '_self' ),
        ) ),

    Field::make( 'separator', 'sep_anchor', 'Kotwica' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )->set_default_value( true ),
);