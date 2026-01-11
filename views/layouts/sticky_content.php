<?php
/**
 * Layout: Sticky Content
 * Image on the left sticky, content on the right scrollable.
 */

$left_title    = isset( $layout['left_title'] ) ? $layout['left_title'] : '';
$left_image_id = isset( $layout['left_image'] ) ? $layout['left_image'] : 0;
$items         = isset( $layout['content_items'] ) ? $layout['content_items'] : array();

$section_id     = isset( $layout['section_id'] ) ? $layout['section_id'] : '';
$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

$section_classes = 'gbyte-sticky-content';
if ( $padding_top ) {
    $section_classes .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_classes .= ' container-padding-bottom';
}
?>

<section class="<?php echo esc_attr( $section_classes ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
    <div class="gbyte-container">
        <div class="gbyte-sticky-content__wrapper">

            <!-- Left column (Sticky) -->
            <div class="gbyte-sticky-content__left">
                <?php if ( $left_title ) : ?>
                    <p class="gbyte-sticky-content__left-title"><?php echo cf_the_content_br( $left_title ); ?></p>
                <?php endif; ?>

                <?php if ( $left_image_id ) : ?>
                    <?php echo wp_get_attachment_image( $left_image_id, 'large', false, array( 'class' => 'gbyte-sticky-content__image', 'sizes' => '(max-width: 991px) 100vw, 50vw' ) ); ?>
                <?php else : ?>
                    <?php
                    // Fallback image
                    $fallback_img_src = get_template_directory_uri() . '/assets/images/badania/badania-rozwoj-img-02.png';
                    ?>
                    <img src="<?php echo esc_url( $fallback_img_src ); ?>" class="gbyte-sticky-content__image" alt="Default image" loading="lazy">
                <?php endif; ?>
            </div>

            <!-- Right column (Scroll) -->
            <div class="gbyte-sticky-content__right">
                <?php if ( ! empty( $items ) ) : ?>
                    <?php foreach ( $items as $item ) : ?>
                        <div class="gbyte-sticky-content__item">
                            <?php if ( ! empty( $item['item_title'] ) ) : ?>
                                <h3 class="gbyte-sticky-content__item-title"><?php echo cf_text( $item['item_title'] ); ?></h3>
                            <?php endif; ?>
                            <?php if ( ! empty( $item['item_text'] ) ) : ?>
                                <p class="gbyte-sticky-content__item-text"><?php echo cf_the_content_br( $item['item_text'] ); ?></p>
                            <?php endif; ?>
                            <div class="gbyte-sticky-content__divider"></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>