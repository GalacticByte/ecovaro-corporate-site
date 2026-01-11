<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', 'Konfigurator Strony' )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '!=', 'page-template/template-apply.php' )
    ->add_fields( array(
        Field::make( 'complex', 'crb_page_layouts', 'Sekcje' )
            ->set_layout( 'tabbed-vertical' )
            ->add_fields( 'hero', 'Hero', include get_template_directory() . '/inc/carbon-fields/layouts/hero.php' )
            ->add_fields( 'cards', 'Karty', include get_template_directory() . '/inc/carbon-fields/layouts/cards.php' )
            ->add_fields( 'columns', 'Kolumny ze zdjęciem', include get_template_directory() . '/inc/carbon-fields/layouts/columns.php' )
            ->add_fields( 'image_overlay', 'Obraz z nakładką (Overlay)', include get_template_directory() . '/inc/carbon-fields/layouts/image-overlay.php' )
            ->add_fields( 'text', 'Tekst CTA', include get_template_directory() . '/inc/carbon-fields/layouts/text.php' )
            ->add_fields( 'sticky_content', 'Sticky Content', include get_template_directory() . '/inc/carbon-fields/layouts/sticky-content.php' )
            ->add_fields( 'contact_info', 'Informacje kontaktowe', include get_template_directory() . '/inc/carbon-fields/layouts/contact-info.php' )
            ->add_fields( 'carousel', 'Karuzela obrazków swiper', include get_template_directory() . '/inc/carbon-fields/layouts/carousel.php' )
            ->add_fields( 'standalone_images', 'Pojedyncze zdjęcia (Desktop/Mobile)', include get_template_directory() . '/inc/carbon-fields/layouts/standalone-images.php' )
            ->add_fields( 'stats', 'Statystyki (Liczby)', include get_template_directory() . '/inc/carbon-fields/layouts/stats.php' )
            ->add_fields( 'boxes', 'Boxy', include get_template_directory() . '/inc/carbon-fields/layouts/boxes.php')
            ->add_fields( 'job_offers_list', 'Lista Ofert Pracy', include get_template_directory() . '/inc/carbon-fields/layouts/job-offers-list.php' )
            ->add_fields( 'forms', 'Formularze', include get_template_directory() . '/inc/carbon-fields/layouts/forms.php' )

    ) );