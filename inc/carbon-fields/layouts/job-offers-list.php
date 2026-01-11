<?php

use Carbon_Fields\Field;

return array(
    Field::make( 'text', 'job_list_title', __( 'Tytuł sekcji', 'ecovaro' ) ),
    Field::make( 'textarea', 'no_offers_text', __( 'Tekst w przypadku braku ofert', 'ecovaro' ) )
        ->set_default_value( 'Obecnie nie prowadzimy żadnych rekrutacji. Zachęcamy do pozostawienia swojego CV poprzez formularz poniżej' )
        ->set_rows( 4 ),

    Field::make( 'separator', 'sep_anchor', 'Kotwica' ),
    Field::make( 'text', 'section_id', 'ID sekcji (kotwica)' ),
    Field::make( 'separator', 'sep_padding', 'Odstępy' ),
    Field::make( 'checkbox', 'padding_top', 'Padding górny' )->set_default_value( true ),
    Field::make( 'checkbox', 'padding_bottom', 'Padding dolny' )->set_default_value( true ),
);