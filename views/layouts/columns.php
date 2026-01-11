<?php
/**
 * Layout: Columns
 */

$style          = isset( $layout['layout_style'] ) ? $layout['layout_style'] : 'v1';
$full_width     = isset( $layout['full_width'] ) ? $layout['full_width'] : false;
$add_padding    = isset( $layout['add_padding'] ) ? $layout['add_padding'] : false;
$image_position = isset( $layout['image_position'] ) ? $layout['image_position'] : 'left';
$bg_color       = isset( $layout['bg_color'] ) ? $layout['bg_color'] : '#F1F0F5';
$title          = isset( $layout['title'] ) ? $layout['title'] : '';
$content        = isset( $layout['content'] ) ? $layout['content'] : '';
$image_id       = isset( $layout['image'] ) ? $layout['image'] : 0;
$image_caption  = isset( $layout['image_caption'] ) ? $layout['image_caption'] : '';

// Standard button (V1)
$btn_text       = isset( $layout['button_text'] ) ? $layout['button_text'] : '';
$btn_url        = isset( $layout['button_url'] ) ? $layout['button_url'] : '';
$btn_target     = isset( $layout['button_target'] ) ? $layout['button_target'] : '_self';

// Scroll button (V2)
$scroll_text    = isset( $layout['scroll_btn_text'] ) ? $layout['scroll_btn_text'] : '';
$scroll_link    = isset( $layout['scroll_btn_link'] ) ? $layout['scroll_btn_link'] : '#main';
$scroll_icon    = isset( $layout['scroll_btn_icon'] ) ? $layout['scroll_btn_icon'] : 0;
$scroll_icon_h  = isset( $layout['scroll_btn_icon_hover'] ) ? $layout['scroll_btn_icon_hover'] : 0;

$section_id     = isset( $layout['section_id'] ) ? $layout['section_id'] : '';

// CSS classes for column order (Bootstrap order)
$text_order_class  = ( 'right' === $image_position ) ? 'order-md-1' : 'order-md-2';
$image_order_class = ( 'right' === $image_position ) ? 'order-md-2' : 'order-md-1';

// Container class depending on style
$section_class = 'gbyte-columns';
if ( 'v2' === $style ) {
    $section_class .= ' gbyte-columns--hero';
}

$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

if ( $padding_top ) {
    $section_class .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_class .= ' container-padding-bottom';
}

// Container: standard or fluid (100%)
$container_class = ( 'v2' === $style && $full_width ) ? 'container-fluid p-0' : 'gbyte-container';

// Class for text column (padding)
$text_col_inner_class = 'gbyte-columns__content';
if ( 'v2' === $style && $add_padding ) {
    $text_col_inner_class .= ' gbyte-columns__content--extra-padding'; // Class to be handled in CSS
}

// Helper class to define image position for CSS (border-radius)
$boxes_modifier_class = ( 'right' === $image_position ) ? 'gbyte-columns__row--img-right' : 'gbyte-columns__row--img-left';
?>

<section class="<?php echo esc_attr( $section_class ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
    <div class="<?php echo esc_attr( $container_class ); ?>">

        <div class="row g-0 gbyte-columns__row <?php echo esc_attr( $boxes_modifier_class ); ?>" style="background-color: <?php echo esc_attr( $bg_color ); ?>;">

            <!-- Image column -->
            <div class="col-md-6 <?php echo esc_attr( $image_order_class ); ?>">
                <div class="gbyte-columns__item <?php echo ( 'v2' === $style ) ? 'gbyte-columns__item--relative' : ''; ?>">
                    <?php if ( $image_id ) : ?>
                        <?php echo wp_get_attachment_image( $image_id, 'large', false, array( 'class' => 'gbyte-columns__image' ) ); ?>
                    <?php else : ?>
                        <!-- Fallback image -->
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/kim-jestesmy/about-img-03.png" class="gbyte-columns__image" alt="Placeholder" loading="lazy">
                    <?php endif; ?>
                    <?php if ( 'v2' === $style && $image_caption ) : ?>
                        <p class="gbyte-columns__image-caption"><?php echo cf_the_content_br( $image_caption ); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Content column -->
            <div class="col-md-6 <?php echo esc_attr( $text_order_class ); ?>">
                <div class="gbyte-columns__item">
                    <div class="gbyte-columns__content-wrapper">
                        <div class="<?php echo esc_attr( $text_col_inner_class ); ?>">
                            <div class="gbyte-columns__text-wrapper">
                            <?php if ( $title ) : ?>
                                <?php if ( 'v2' === $style ) : ?>
                                    <h2 class="gbyte-columns__title"><?php echo cf_text( $title ); ?></h2>
                                <?php else : ?>
                                    <h3 class="gbyte-columns__title"><?php echo cf_text( $title ); ?></h3>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if ( $content ) : ?>
                                <p class="gbyte-columns__text"><?php echo cf_the_content_br( $content ); ?></p>
                            <?php endif; ?>
                            </div>

                            <?php // Standard Button (V1) ?>
                            <?php if ( 'v1' === $style && $btn_text && $btn_url ) : ?>
                                <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="btn gbyte-btn bg-green">
                                    <span><?php echo esc_html( $btn_text ); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16"><defs><style>.a{fill:none;}.b{fill:#015AAB;fill-rule:evenodd;opacity:0.54;}</style></defs><rect class="a" width="16" height="16"/><path class="b" d="M12,5.25H2.85l4.2-4.2L6,0,0,6l6,6,1.05-1.05-4.2-4.2H12V5.25Z" transform="translate(14.485 14) rotate(180)"/></svg>
                                </a>
                            <?php endif; ?>

                            <?php // Scroll Button (V2) ?>
                            <?php if ( 'v2' === $style && $scroll_text ) : ?>
                                <div class="gbyte-columns__link-wrapper">
                                    <a href="<?php echo esc_url( $scroll_link ); ?>" class="btn gbyte-btn--with-icon js-scroll-to-next-section">
                                        <?php if ( $scroll_icon ) : ?>
                                            <span class="gbyte-btn__icon-wrapper">
                                                <?php echo wp_get_attachment_image( $scroll_icon, 'full', false, array( 'class' => 'gbyte-img-icon gbyte-icon-default' ) ); ?>
                                                <?php
                                                $hover_icon_id = $scroll_icon_h ? $scroll_icon_h : $scroll_icon;
                                                echo wp_get_attachment_image( $hover_icon_id, 'full', false, array( 'class' => 'gbyte-img-icon gbyte-icon-hover' ) );
                                                ?>
                                            </span>
                                        <?php endif; ?>
                                        <span><?php echo esc_html( $scroll_text ); ?></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16"><defs><style>.a{fill:none;}.b{fill:#00040C;fill-rule:evenodd;opacity:0.54;}</style></defs><rect class="a" width="16" height="16"/><path class="b" d="M12,5.25H2.85l4.2-4.2L6,0,0,6l6,6,1.05-1.05-4.2-4.2H12V5.25Z" transform="translate(14.485 14) rotate(180)"/></svg>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>