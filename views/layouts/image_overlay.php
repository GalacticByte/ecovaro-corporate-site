<?php
/**
 * Layout: Image Overlay
 */

$title       = isset( $layout['title'] ) ? $layout['title'] : '';
$content     = isset( $layout['content'] ) ? $layout['content'] : '';
$bg_image_id = isset( $layout['bg_image'] ) ? $layout['bg_image'] : 0;
$icon_id     = isset( $layout['icon'] ) ? $layout['icon'] : 0;

$bg_image_url = $bg_image_id ? wp_get_attachment_image_url( $bg_image_id, 'full' ) : get_template_directory_uri() . '/assets/images/placeholder.jpg';

$section_id     = isset( $layout['section_id'] ) ? $layout['section_id'] : '';
$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

$section_classes = 'gbyte-image-overlay';
if ( $padding_top ) {
    $section_classes .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_classes .= ' container-padding-bottom';
}

$title_id = 'overlay-title-' . ( $section_id ? $section_id : uniqid() );
?>

<section class="<?php echo esc_attr( $section_classes ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?><?php echo $title ? ' aria-labelledby="' . esc_attr( $title_id ) . '"' : ''; ?>>
    <div class="gbyte-image-overlay__container" style="background-image: url('<?php echo esc_url( $bg_image_url ); ?>');">
        <div class="gbyte-image-overlay__content">
            <?php if ( $icon_id ) : ?>
                <?php echo wp_get_attachment_image( $icon_id, 'full', false, array( 'class' => 'gbyte-image-overlay__icon', 'alt' => '', 'aria-hidden' => 'true' ) ); ?>
            <?php endif; ?>

            <?php if ( $title ) : ?>
                <h3 id="<?php echo esc_attr( $title_id ); ?>" class="gbyte-image-overlay__title"><?php echo cf_text( $title ); ?></h3>
            <?php endif; ?>
            <?php if ( $content ) : ?>
                <p class="gbyte-image-overlay__text"><?php echo cf_the_content_br( $content ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>