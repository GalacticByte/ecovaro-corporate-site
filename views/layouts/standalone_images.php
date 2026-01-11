<?php
/**
 * Layout: Standalone Images desktop and mobile.
 */

$desktop_id = isset( $layout['image_desktop'] ) ? $layout['image_desktop'] : 0;
$mobile_id  = isset( $layout['image_mobile'] ) ? $layout['image_mobile'] : 0;

$fallback_desktop_url = get_template_directory_uri() . '/assets/images/badania/badania-rozwoj-img-06.png';
$fallback_mobile_url  = get_template_directory_uri() . '/assets/images/badania/badania-rozwoj-img-06-mobile.png';

$section_id     = isset( $layout['section_id'] ) ? $layout['section_id'] : '';
$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

$section_classes = 'gbyte-standalone-images';
if ( $padding_top ) {
    $section_classes .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_classes .= ' container-padding-bottom';
}
?>

<section class="<?php echo esc_attr( $section_classes ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
    <div class="gbyte-container">
        <div class="gbyte-image-wrapper">

            <!-- Desktop Image -->
            <?php if ( $desktop_id ) : ?>
                <?php
                // sizes: if screen < 991px (mobile), size is 0px (do not download), otherwise 100vw
                echo wp_get_attachment_image( $desktop_id, 'full', false, array(
                    'class' => 'gbyte-hide-on-mobile--flex',
                    'sizes' => '(max-width: 991px) 0px, 100vw'
                ) );
                ?>
            <?php else : ?>
                <img src="<?php echo esc_url( $fallback_desktop_url ); ?>" class="gbyte-hide-on-mobile--flex" alt="Domyślny obrazek desktop" loading="lazy">
            <?php endif; ?>

            <!-- Mobile Image -->
            <?php if ( $mobile_id ) : ?>
                <?php
                echo wp_get_attachment_image( $mobile_id, 'full', false, array(
                    'class' => 'gbyte-show-on-mobile--flex',
                    'sizes' => '(min-width: 992px) 0px, 100vw'
                ) );
                ?>
            <?php else : ?>
                <img src="<?php echo esc_url( $fallback_mobile_url ); ?>" class="gbyte-show-on-mobile--flex" alt="Domyślny obrazek mobile" loading="lazy">
            <?php endif; ?>

        </div>
    </div>
</section>