<?php
/**
 * Layout: Boxes
 *
 * @package Ecovaro_Starter
 */

// Retrieving data from Carbon Fields ($layout passed from the loop in page.php)
$left_title      = isset( $layout['left_title'] ) ? $layout['left_title'] : '';
$left_subtitle   = isset( $layout['left_subtitle'] ) ? $layout['left_subtitle'] : '';
$left_btn_text   = isset( $layout['left_btn_text'] ) ? $layout['left_btn_text'] : '';
$left_btn_url    = isset( $layout['left_btn_url'] ) ? $layout['left_btn_url'] : '';
$left_btn_target = isset( $layout['left_btn_target'] ) ? $layout['left_btn_target'] : '_self';
$left_bg_color   = isset( $layout['left_bg_color'] ) ? $layout['left_bg_color'] : '';
$left_text_light = isset( $layout['left_text_light'] ) ? $layout['left_text_light'] : false;

$right_title      = isset( $layout['right_title'] ) ? $layout['right_title'] : '';
$right_subtitle   = isset( $layout['right_subtitle'] ) ? $layout['right_subtitle'] : '';
$right_btn_text   = isset( $layout['right_btn_text'] ) ? $layout['right_btn_text'] : '';
$right_btn_url    = isset( $layout['right_btn_url'] ) ? $layout['right_btn_url'] : '';
$right_btn_target = isset( $layout['right_btn_target'] ) ? $layout['right_btn_target'] : '_self';
$right_bg_color   = isset( $layout['right_bg_color'] ) ? $layout['right_bg_color'] : '';
$right_text_light = isset( $layout['right_text_light'] ) ? $layout['right_text_light'] : false;

$section_id       = isset( $layout['section_id'] ) ? $layout['section_id'] : '';

// Preparing classes and styles for the left box
$left_box_classes = 'gbyte-boxes__box';
$left_box_style   = $left_bg_color ? 'style="background-color: ' . esc_attr( $left_bg_color ) . ';"' : '';
if ( ! $left_bg_color ) { $left_box_classes .= ' gbyte-boxes__box--light'; }
if ( $left_text_light ) { $left_box_classes .= ' text-white'; }
$left_box_classes .= ' gbyte-boxes__box--left';

// Preparing classes and styles for the right box
$right_box_classes = 'gbyte-boxes__box';
$right_box_style   = $right_bg_color ? 'style="background-color: ' . esc_attr( $right_bg_color ) . ';"' : '';
if ( ! $right_bg_color ) { $right_box_classes .= ' gbyte-boxes__box--dark'; }
if ( $right_text_light ) { $right_box_classes .= ' text-white'; }
$right_box_classes .= ' gbyte-boxes__box--right';

// Handling paddings
$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

$section_classes = 'gbyte-boxes';
if ( $padding_top ) {
    $section_classes .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_classes .= ' container-padding-bottom';
}
?>
<section class="<?php echo esc_attr( $section_classes ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
    <div class="gbyte-boxes__container p-0">
        <div class="row  g-4 g-lg-0">
            <div class="col-lg-6">
                <div class="<?php echo esc_attr( $left_box_classes ); ?>" <?php echo $left_box_style; ?>>
                    <?php if ( $left_title ) : ?>
                        <h2 class="gbyte-boxes__title"><?php echo cf_text( $left_title ); ?></h2>
                    <?php endif; ?>
                    <?php if ( $left_subtitle ) : ?>
                        <p class="gbyte-boxes__text"><?php echo cf_the_content_br( $left_subtitle ); ?></p>
                    <?php endif; ?>
                    <?php if ( $left_btn_text && $left_btn_url ) : ?>
                        <?php
                        $rel_attr = ( '_blank' === $left_btn_target ) ? ' rel="noopener noreferrer"' : '';
                        $aria_label = ( '_blank' === $left_btn_target ) ? ' aria-label="' . esc_attr( $left_btn_text . ' ' . __( '(otwiera się w nowym oknie)', 'ecovaro' ) ) . '"' : '';
                        ?>
                        <a href="<?php echo esc_url( $left_btn_url ); ?>" target="<?php echo esc_attr( $left_btn_target ); ?>" class="btn gbyte-btn bg-green"<?php echo $rel_attr . $aria_label; ?>>
                            <span><?php echo esc_html( $left_btn_text ); ?></span> <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><defs><style>.a{fill:none;}.b{fill:#015AAB;fill-rule:evenodd;opacity:0.54;}</style></defs><rect class="a" width="16" height="16"/><path class="b" d="M12,5.25H2.85l4.2-4.2L6,0,0,6l6,6,1.05-1.05-4.2-4.2H12V5.25Z" transform="translate(14.485 14) rotate(180)"/></svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="<?php echo esc_attr( $right_box_classes ); ?>" <?php echo $right_box_style; ?>>
                    <?php if ( $right_title ) : ?>
                        <h2 class="gbyte-boxes__title"><?php echo cf_text( $right_title ); ?></h2>
                    <?php endif; ?>
                    <?php if ( $right_subtitle ) : ?>
                        <p class="gbyte-boxes__text"><?php echo cf_the_content_br( $right_subtitle ); ?></p>
                    <?php endif; ?>
                    <?php if ( $right_btn_text && $right_btn_url ) : ?>
                        <?php
                        $rel_attr = ( '_blank' === $right_btn_target ) ? ' rel="noopener noreferrer"' : '';
                        $aria_label = ( '_blank' === $right_btn_target ) ? ' aria-label="' . esc_attr( $right_btn_text . ' ' . __( '(otwiera się w nowym oknie)', 'ecovaro' ) ) . '"' : '';
                        ?>
                        <a href="<?php echo esc_url( $right_btn_url ); ?>" target="<?php echo esc_attr( $right_btn_target ); ?>" class="btn gbyte-btn bg-green"<?php echo $rel_attr . $aria_label; ?>>
                            <span><?php echo esc_html( $right_btn_text ); ?></span> <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><defs><style>.a{fill:none;}.b{fill:#015AAB;fill-rule:evenodd;opacity:0.54;}</style></defs><rect class="a" width="16" height="16"/><path class="b" d="M12,5.25H2.85l4.2-4.2L6,0,0,6l6,6,1.05-1.05-4.2-4.2H12V5.25Z" transform="translate(14.485 14) rotate(180)"/></svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
