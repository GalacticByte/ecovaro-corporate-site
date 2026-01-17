<?php
/**
 * Layout: Contact Info
 */

// Left column
$left_title       = isset( $layout['left_title'] ) ? $layout['left_title'] : '';
$address_subtitle = isset( $layout['address_subtitle'] ) ? $layout['address_subtitle'] : '';
$address_content  = isset( $layout['address_content'] ) ? $layout['address_content'] : '';
$hours_subtitle   = isset( $layout['hours_subtitle'] ) ? $layout['hours_subtitle'] : '';
$hours_content    = isset( $layout['hours_content'] ) ? $layout['hours_content'] : '';

// Right column
$right_title_1 = isset( $layout['right_title_1'] ) ? $layout['right_title_1'] : '';
$right_items_1 = isset( $layout['right_items_1'] ) ? $layout['right_items_1'] : array();
$right_title_2 = isset( $layout['right_title_2'] ) ? $layout['right_title_2'] : '';
$right_items_2 = isset( $layout['right_items_2'] ) ? $layout['right_items_2'] : array();

$section_id     = isset( $layout['section_id'] ) ? $layout['section_id'] : '';
$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

$section_classes = 'gbyte-contact-info';
if ( $padding_top ) {
    $section_classes .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_classes .= ' container-padding-bottom';
}
?>

<section class="<?php echo esc_attr( $section_classes ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
    <div class="gbyte-container">

        <div class="row gy-5">
            <div class="col-md-5">
                <div class="d-flex flex-column h-100">
                    <div class="gbyte-contact-info__box">
                        <?php if ( $left_title ) : ?>
                            <h2 class="gbyte-contact-info__box-title"><?php echo cf_text( $left_title ); ?></h2>
                        <?php endif; ?>
                    </div>

                    <?php if ( $address_content ) : ?>
                        <div class="gbyte-contact-info__box gbyte-contact-info__box--bottom-space">
                            <?php if ( $address_subtitle ) : ?>
                                <h3 class="gbyte-contact-info__box-subtitle"><?php echo cf_text( $address_subtitle ); ?></h3>
                            <?php endif; ?>
                            <address class="mb-0">
                                <?php echo cf_the_content_br( $address_content ); ?>
                            </address>
                        </div>
                    <?php endif; ?>

                    <?php if ( $hours_content ) : ?>
                        <div class="gbyte-contact-info__box">
                            <?php if ( $hours_subtitle ) : ?>
                                <h3 class="gbyte-contact-info__box-subtitle"><?php echo cf_text( $hours_subtitle ); ?></h3>
                            <?php endif; ?>
                            <p><?php echo cf_the_content_br( $hours_content ); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-7">
                <?php if ( ! empty( $right_items_1 ) ) : ?>
                    <div class="gbyte-contact-info__box">
                        <?php if ( $right_title_1 ) : ?>
                            <h2 class="gbyte-contact-info__box-title"><?php echo cf_text( $right_title_1 ); ?></h2>
                        <?php endif; ?>
                        <div class="gbyte-contact-info__items-wrapper">
                            <?php foreach ( $right_items_1 as $item ) :
                                $subtitle = isset( $item['item_subtitle'] ) ? $item['item_subtitle'] : '';
                                $url      = isset( $item['link_url'] ) ? $item['link_url'] : '';
                                $text     = isset( $item['link_text'] ) ? $item['link_text'] : '';
                                $target   = isset( $item['link_target'] ) ? $item['link_target'] : '_self';
                                ?>
                                <div class="gbyte-contact-info__item">
                                    <?php if ( $subtitle ) : ?>
                                        <h3 class="gbyte-contact-info__box-subtitle"><?php echo cf_text( $subtitle ); ?></h3>
                                    <?php endif; ?>
                                    <?php if ( $url && $text ) : ?>
                                        <?php
                                        $rel_attr = ( '_blank' === $target ) ? ' rel="noopener noreferrer"' : '';
                                        $aria_label = ( '_blank' === $target ) ? ' aria-label="' . esc_attr( $text . ' ' . __( '(otwiera się w nowym oknie)', 'ecovaro' ) ) . '"' : '';
                                        ?>
                                        <p><a href="<?php echo esc_url( $url ); ?>" target="<?php echo esc_attr( $target ); ?>"<?php echo $rel_attr . $aria_label; ?>><?php echo esc_html( $text ); ?></a></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="gbyte-contact-info__divider"></div>
                <?php endif; ?>

                <?php if ( ! empty( $right_items_2 ) ) : ?>
                    <div class="gbyte-contact-info__box mt-5">
                        <?php if ( $right_title_2 ) : ?>
                            <h2 class="gbyte-contact-info__box-title"><?php echo cf_text( $right_title_2 ); ?></h2>
                        <?php endif; ?>
                        <div class="gbyte-contact-info__items-wrapper">
                            <?php foreach ( $right_items_2 as $item ) :
                                $subtitle = isset( $item['item_subtitle'] ) ? $item['item_subtitle'] : '';
                                $url      = isset( $item['link_url'] ) ? $item['link_url'] : '';
                                $text     = isset( $item['link_text'] ) ? $item['link_text'] : '';
                                $target   = isset( $item['link_target'] ) ? $item['link_target'] : '_self';
                                ?>
                                <div class="gbyte-contact-info__item">
                                    <?php if ( $subtitle ) : ?>
                                        <h3 class="gbyte-contact-info__box-subtitle"><?php echo cf_text( $subtitle ); ?></h3>
                                    <?php endif; ?>
                                    <?php if ( $url && $text ) : ?>
                                        <?php
                                        $rel_attr = ( '_blank' === $target ) ? ' rel="noopener noreferrer"' : '';
                                        $aria_label = ( '_blank' === $target ) ? ' aria-label="' . esc_attr( $text . ' ' . __( '(otwiera się w nowym oknie)', 'ecovaro' ) ) . '"' : '';
                                        ?>
                                        <p><a href="<?php echo esc_url( $url ); ?>" target="<?php echo esc_attr( $target ); ?>"<?php echo $rel_attr . $aria_label; ?>><?php echo esc_html( $text ); ?></a></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="gbyte-contact-info__divider"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>