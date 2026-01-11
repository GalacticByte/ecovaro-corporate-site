<?php
/**
 * Layout: Image Carousel
 */

$title       = isset( $layout['title'] ) ? $layout['title'] : '';
$slides      = isset( $layout['slides'] ) ? $layout['slides'] : array();
$btn_text    = isset( $layout['button_text'] ) ? $layout['button_text'] : '';
$btn_url     = isset( $layout['button_url'] ) ? $layout['button_url'] : '';
$btn_target  = isset( $layout['button_target'] ) ? $layout['button_target'] : '_self';

$section_id     = isset( $layout['section_id'] ) ? $layout['section_id'] : '';
$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

$section_classes = 'gbyte-carousel';
if ( $padding_top ) {
    $section_classes .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_classes .= ' container-padding-bottom';
}
?>

<section class="<?php echo esc_attr( $section_classes ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
    <div class="gbyte-container">
        <div class="gbyte-carousel__header">
            <?php if ( $title ) : ?>
                <h2 class="gbyte-carousel__title"><?php echo cf_text( $title ); ?></h2>
            <?php endif; ?>

            <div class="gbyte-carousel__nav">
                <div class="gbyte-carousel__nav-btn gbyte-carousel__nav-btn--prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><defs><style>.a{fill:none;}.b{fill:#00040c;fill-rule:evenodd;}</style></defs><rect class="a" width="24" height="24"/><path class="b" d="M15.4,7.4,14,6,8,12l6,6,1.4-1.4L10.8,12Z"/></svg>
                </div>
                <div class="gbyte-carousel__nav-btn gbyte-carousel__nav-btn--next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><defs><style>.a{fill:none;}.b{fill:#00040c;fill-rule:evenodd;}</style></defs><rect class="a" width="24" height="24"/><path class="b" d="M15.4,7.4,14,6,8,12l6,6,1.4-1.4L10.8,12Z"/></svg>
                </div>
            </div>
        </div>

        <!-- Swiper -->
         <div class="gbyte-carousel__slider-container">
             <div class="swiper gbyte-carousel__slider">
                 <div class="swiper-wrapper">
                    <?php if ( ! empty( $slides ) ) : ?>
                        <?php foreach ( $slides as $slide ) :
                            $image_id = isset( $slide['image'] ) ? $slide['image'] : 0;
                            $link_url = isset( $slide['link_url'] ) ? $slide['link_url'] : '';
                            $link_target = isset( $slide['link_target'] ) ? $slide['link_target'] : '_self';

                            if ( $image_id ) :
                                $sizes = '(max-width: 767px) 40vw, (max-width: 991px) 23vw, 19vw';
                                $image_html = wp_get_attachment_image( $image_id, 'medium_large', false, array(
                                    'sizes' => $sizes,
                                    'loading' => 'lazy'
                                ) );
                                ?>
                                 <div class="swiper-slide">
                                    <?php if ( $link_url ) : ?>
                                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $image_html; ?></a>
                                    <?php else : ?>
                                        <?php echo $image_html; ?>
                                    <?php endif; ?>
                                 </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                 </div>
             </div>
         </div>
        <!-- Pagination (progress bar) placed below the carousel -->
        <div class="swiper-pagination gbyte-carousel__pagination"></div>

        <?php if ( $btn_text && $btn_url ) : ?>
            <div class="gbyte-carousel__footer">
                <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="btn gbyte-btn bg-green">
                    <span><?php echo esc_html( $btn_text ); ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16"><defs><style>.a{fill:none;}.b{fill:#015AAB;fill-rule:evenodd;opacity:0.54;}</style></defs><rect class="a" width="16" height="16"/><path class="b" d="M12,5.25H2.85l4.2-4.2L6,0,0,6l6,6,1.05-1.05-4.2-4.2H12V5.25Z" transform="translate(14.485 14) rotate(180)"/></svg></a>
            </div>
        <?php endif; ?>
    </div>
</section>