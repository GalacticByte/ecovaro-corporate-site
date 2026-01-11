<?php
/**
 * Layout: Hero Section
 *
 * Available variables: $layout (array with fields)
 */

// Retrieving values from Carbon Fields
$layout_type     = isset( $layout['layout'] ) ? $layout['layout'] : 'default';
$title           = isset( $layout['title'] ) ? $layout['title'] : '';
$subtitle        = isset( $layout['subtitle'] ) ? $layout['subtitle'] : '';
$show_headline   = isset( $layout['show_headline'] ) ? $layout['show_headline'] : false;

// Banner images (returned as ID)
$banner_desktop_id = isset( $layout['banner_image_desktop'] ) ? $layout['banner_image_desktop'] : 0;
$banner_mobile_id  = isset( $layout['banner_image_mobile'] ) ? $layout['banner_image_mobile'] : 0;

// Background
$bg_type      = isset( $layout['bg_type'] ) ? $layout['bg_type'] : 'image';
$bg_image_id  = isset( $layout['bg_image'] ) ? $layout['bg_image'] : 0;
$bg_image_mobile_id = isset( $layout['bg_image_mobile'] ) ? $layout['bg_image_mobile'] : 0;
$bg_video_desktop_id = isset( $layout['bg_video_desktop'] ) ? $layout['bg_video_desktop'] : 0;
$bg_video_mobile_id  = isset( $layout['bg_video_mobile'] ) ? $layout['bg_video_mobile'] : 0;

// Extended Layout
$scroll_text = isset( $layout['scroll_button_text'] ) ? $layout['scroll_button_text'] : '';
$scroll_icon_id = isset( $layout['scroll_button_icon'] ) ? $layout['scroll_button_icon'] : 0;
$scroll_icon_hover_id = isset( $layout['scroll_button_icon_hover'] ) ? $layout['scroll_button_icon_hover'] : 0;
$bottom_icon_id = isset( $layout['bottom_bar_icon'] ) ? $layout['bottom_bar_icon'] : 0;

// CSS Classes
$section_classes = 'gbyte-hero';
if ( 'default' === $layout_type ) {
    $section_classes .= ' gbyte-hero--home';
} elseif ( 'image-banner' === $layout_type ) {
    $section_classes .= ' gbyte-hero--image-banner';
} elseif ( 'extended' === $layout_type ) {
    $section_classes .= ' gbyte-hero--home gbyte-hero--with-bottom-bar';
}

$desktop_image_class = 'gbyte-hide-on-tablet--flex';
$mobile_image_class  = 'gbyte-show-on-tablet--flex';
?>

<section class="<?php echo esc_attr( $section_classes ); ?>">
    <?php if ( 'default' === $layout_type || 'extended' === $layout_type ) : ?>
        <div class="gbyte-hero__background">
            <?php if ( 'video' === $bg_type ) : ?>
                <?php if ( $bg_video_desktop_id ) : ?>
                    <video playsinline autoplay muted loop class="gbyte-hero__background-video d-none d-lg-block">
                        <source src="<?php echo esc_url( wp_get_attachment_url( $bg_video_desktop_id ) ); ?>" type="<?php echo esc_attr( get_post_mime_type( $bg_video_desktop_id ) ); ?>">
                    </video>
                <?php endif; ?>
                <?php if ( $bg_video_mobile_id ) : ?>
                    <video playsinline autoplay muted loop class="gbyte-hero__background-video d-lg-none">
                        <source src="<?php echo esc_url( wp_get_attachment_url( $bg_video_mobile_id ) ); ?>" type="<?php echo esc_attr( get_post_mime_type( $bg_video_mobile_id ) ); ?>">
                    </video>
                <?php endif; ?>
            <?php else : ?>
                <?php
                $bg_image_url = $bg_image_id ? wp_get_attachment_image_url( $bg_image_id, 'full' ) : get_template_directory_uri() . '/assets/images/strona-glowna/baner-02.png';
                $bg_image_mobile_url = $bg_image_mobile_id ? wp_get_attachment_image_url( $bg_image_mobile_id, 'full' ) : $bg_image_url;
                ?>
                <div class="gbyte-hero__background-image d-none d-lg-block" style="background-image: url('<?php echo esc_url( $bg_image_url ); ?>');"></div>
                <div class="gbyte-hero__background-image d-lg-none" style="background-image: url('<?php echo esc_url( $bg_image_mobile_url ); ?>');"></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="gbyte-hero__content">
        <div class="gbyte-container">
            <?php if ( 'default' === $layout_type || 'extended' === $layout_type ) : ?>
                <?php
                $hero_title    = ! empty( $title ) ? $title : "Domyślny tytuł Hero";
                $hero_subtitle = ! empty( $subtitle ) ? $subtitle : 'Domyślny podtytuł';
                ?>
                <h1 class="gbyte-hero__title white-text"><?php echo cf_text( $hero_title ); ?></h1>
                <p class="gbyte-hero__subtitle white-text"><?php echo cf_the_content_br( $hero_subtitle ); ?></p>

            <?php elseif ( 'image-banner' === $layout_type ) : ?>
                <?php if ( $show_headline ) :
                    $headline = ! empty( $title ) ? $title : get_the_title();
                ?>
                    <h1 class="gbyte-hero__title white-text"><?php echo cf_text( $headline ); ?></h1>
                <?php endif; ?>

                <?php
                $default_banner_url = get_template_directory_uri() . '/assets/images/nasze-marki/nasze-marki-baner-01b.png';
                $banner_desktop_url = $banner_desktop_id ? wp_get_attachment_image_url( $banner_desktop_id, 'full' ) : $default_banner_url;
                $banner_mobile_url  = $banner_mobile_id ? wp_get_attachment_image_url( $banner_mobile_id, 'full' ) : $banner_desktop_url;
                ?>
                <img src="<?php echo esc_url( $banner_desktop_url ); ?>" alt="Baner" class="<?php echo esc_attr( $desktop_image_class ); ?>">
                <img src="<?php echo esc_url( $banner_mobile_url ); ?>" alt="Baner" class="<?php echo esc_attr( $mobile_image_class ); ?>">
            <?php endif; ?>
        </div>

        <?php // Bottom bar for 'extended' layout ?>
        <?php if ( 'extended' === $layout_type ) : ?>
            <div class="gbyte-hero__bottom-bar">
                <div class="gbyte-container">
                    <div class="gbyte-hero__bottom-bar-wrapper">

                        <?php if ( $scroll_text ) : ?>
                            <a href="#main" class="btn gbyte-btn--with-icon gbyte-btn--hero js-scroll-to-next-section">
                                <?php if ( $scroll_icon_id ) : ?>
                                    <span class="gbyte-btn__icon-wrapper">
                                        <img src="<?php echo esc_url( wp_get_attachment_image_url( $scroll_icon_id, 'full' ) ); ?>" class="gbyte-img-icon gbyte-icon-default" alt="">
                                        <?php if ( $scroll_icon_hover_id ) : ?>
                                            <img src="<?php echo esc_url( wp_get_attachment_image_url( $scroll_icon_hover_id, 'full' ) ); ?>" class="gbyte-img-icon gbyte-icon-hover" alt="">
                                        <?php endif; ?>
                                    </span>
                                <?php endif; ?>
                                <span><?php echo esc_html( $scroll_text ); ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16"><defs><style>.a{fill:none;}.b{fill:#ffffff;fill-rule:evenodd;opacity:0.54;}</style></defs><rect class="a" width="16" height="16"/><path class="b" d="M6,0,4.95,1.05,9.15,5.25H0v1.5H9.15L4.95,10.95,6,12l6-6Z" transform="translate(2 2)"/></svg>
                            </a>
                        <?php endif; ?>

                        <?php if ( $bottom_icon_id ) : ?>
                            <img src="<?php echo esc_url( wp_get_attachment_image_url( $bottom_icon_id, 'full' ) ); ?>" class="gbyte-hero__bottom-bar-icon" alt="">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>