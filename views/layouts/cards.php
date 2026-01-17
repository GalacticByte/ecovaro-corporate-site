<?php
/**
 * Layout: Cards
 * Variables: $layout['title'], $layout['cards']
 */

$layout_type = isset( $layout['layout_type'] ) ? $layout['layout_type'] : 'standard';
$main_title  = isset( $layout['title'] ) ? $layout['title'] : '';
$description = isset( $layout['description'] ) ? $layout['description'] : '';
$cards       = isset( $layout['cards'] ) ? $layout['cards'] : array();

$section_id     = isset( $layout['section_id'] ) ? $layout['section_id'] : '';
$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

$section_classes = 'gbyte-cards';
if ( 'intro' === $layout_type ) {
    $section_classes .= ' gbyte-cards--intro';
}
if ( $padding_top ) {
    $section_classes .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_classes .= ' container-padding-bottom';
}
?>

<section class="<?php echo esc_attr( $section_classes ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
    <div class="gbyte-container">

        <?php // Standard Variant: Title above cards ?>
        <?php if ( 'standard' === $layout_type && ( $main_title || $description ) ) : ?>
            <div class="row">
                <div class="col">
                    <?php if ( $main_title ) : ?>
                        <h2 class="gbyte-cards__title mb-4"><?php echo cf_text( $main_title ); ?></h2>
                    <?php endif; ?>
                    <?php if ( $description ) : ?>
                        <p class="gbyte-cards__description mb-5"><?php echo cf_the_content_br( $description ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row gx-2 gx-lg-3 justify-content-center">

            <?php // Intro Variant: Title as the first card ?>
            <?php if ( 'intro' === $layout_type && ( $main_title || $description ) ) : ?>
                <div class="col-12 col-md-4 mb-4 mb-lg-0">
                    <div class="card h-100 gbyte-cards__card border-0 justify-content-center">
                        <?php if ( $main_title ) : ?>
                            <h2 class="gbyte-cards__title"><?php echo cf_text( $main_title ); ?></h2>
                        <?php endif; ?>
                        <?php if ( $description ) : ?>
                            <p class="gbyte-cards__card-text mt-3"><?php echo cf_the_content_br( $description ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( ! empty( $cards ) ) : ?>
                <?php foreach ( $cards as $card ) :
                    $image_desktop_id = isset( $card['image'] ) ? $card['image'] : 0;
                    $image_mobile_id  = isset( $card['image_mobile'] ) ? $card['image_mobile'] : 0;
                    $is_icon          = isset( $card['is_icon'] ) ? $card['is_icon'] : false;
                    $title            = isset( $card['card_title'] ) ? $card['card_title'] : '';
                    $card_desc        = isset( $card['card_description'] ) ? $card['card_description'] : '';
                    $link_url         = isset( $card['link_url'] ) ? $card['link_url'] : '';
                    $link_text        = isset( $card['link_text'] ) ? $card['link_text'] : 'Więcej';
                    $link_target      = isset( $card['link_target'] ) ? $card['link_target'] : '_self';

                    // Column: Intro uses col-6 on mobile, Standard uses col-lg-4
                    $col_class = ( 'intro' === $layout_type ) ? 'col-6 col-md-4 mb-4 mb-lg-0' : 'col-lg-4 mb-4 mb-lg-0';
                ?>
                <div class="<?php echo esc_attr( $col_class ); ?>">
                    <div class="card h-100 gbyte-cards__card border-0 <?php echo ( 'intro' === $layout_type ) ? 'text-white' : ''; ?>">

                        <!-- Desktop Version -->
                        <div class="<?php echo ( 'intro' === $layout_type ) ? 'd-none d-lg-block' : ''; ?> h-100">
                            <?php if ( $image_desktop_id ) : ?>
                                <?php
                                $img_args = array( 'class' => 'card-img-top' );
                                if ( $is_icon ) {
                                    $img_args['class'] .= ' gbyte-cards__card-icon';
                                }
                                echo wp_get_attachment_image( $image_desktop_id, 'large', false, $img_args );
                                ?>
                            <?php endif; ?>

                            <div class="card-body <?php echo ( 'intro' === $layout_type ) ? 'text-dark' : ''; ?>">
                                <h5 class="card-title gbyte-cards__card-title"><?php echo cf_text( $title ); ?></h5>
                                <?php if ( $card_desc ) : ?>
                                    <p class="card-text gbyte-cards__card-text"><?php echo cf_the_content_br( $card_desc ); ?></p>
                                <?php endif; ?>
                                <?php if ( $link_url ) : ?>
                                    <?php
                                    $rel_attr = ( '_blank' === $link_target ) ? ' rel="noopener noreferrer"' : '';
                                    $aria_label_text = $link_text . ' - ' . strip_tags( $title );
                                    if ( '_blank' === $link_target ) {
                                        $aria_label_text .= ' ' . __( '(otwiera się w nowym oknie)', 'ecovaro' );
                                    }
                                    ?>
                                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn gbyte-btn bg-green" aria-label="<?php echo esc_attr( $aria_label_text ); ?>"<?php echo $rel_attr; ?>>
                                        <span><?php echo esc_html( $link_text ); ?> </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><defs><style>.a{fill:none;}.b{fill: #ffffff;fill-rule:evenodd;opacity:0.54;}</style></defs><rect class="a" width="16" height="16"/><path class="b" d="M12,5.25H2.85l4.2-4.2L6,0,0,6l6,6,1.05-1.05-4.2-4.2H12V5.25Z" transform="translate(14.485 14) rotate(180)"/></svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Mobile Version (with overlay for Intro) -->
                        <?php if ( 'intro' === $layout_type ) : ?>
                            <div class="d-lg-none h-100 position-relative">
                                <?php
                                $mobile_img_id = $image_mobile_id ? $image_mobile_id : $image_desktop_id;
                                if ( $mobile_img_id ) :
                                    $mobile_img_args = array( 'class' => 'card-img' );
                                    if ( $is_icon ) {
                                        $mobile_img_args['class'] .= ' gbyte-cards__card-icon';
                                    }
                                    echo wp_get_attachment_image( $mobile_img_id, 'medium_large', false, $mobile_img_args );
                                endif;
                                ?>

                                <div class="card-img-overlay d-flex flex-column justify-content-end">
                                    <h5 class="card-title gbyte-cards__card-title"><?php echo cf_text( $title ); ?></h5>
                                    <?php if ( $card_desc ) : ?>
                                        <p class="card-text gbyte-cards__card-text mb-2"><?php echo cf_the_content_br( $card_desc ); ?></p>
                                    <?php endif; ?>
                                    <?php if ( $link_url ) : ?>
                                        <?php
                                        $rel_attr = ( '_blank' === $link_target ) ? ' rel="noopener noreferrer"' : '';
                                        $aria_label_text = $link_text . ' - ' . strip_tags( $title );
                                        if ( '_blank' === $link_target ) {
                                            $aria_label_text .= ' ' . __( '(otwiera się w nowym oknie)', 'ecovaro' );
                                        }
                                        ?>
                                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="btn gbyte-btn bg-white mt-2" aria-label="<?php echo esc_attr( $aria_label_text ); ?>"<?php echo $rel_attr; ?>>
                                            <span><?php echo esc_html( $link_text ); ?></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><defs><style>.a{fill:none;}.b{fill: #015AAB;fill-rule:evenodd;opacity:0.54;}</style></defs><rect class="a" width="16" height="16"/><path class="b" d="M12,5.25H2.85l4.2-4.2L6,0,0,6l6,6,1.05-1.05-4.2-4.2H12V5.25Z" transform="translate(14.485 14) rotate(180)"/></svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>