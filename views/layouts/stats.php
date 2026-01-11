<?php
/**
 * Layout: Stats
 */

$intro_title = isset( $layout['intro_title'] ) ? $layout['intro_title'] : '';
$stats_items = isset( $layout['stats_items'] ) ? $layout['stats_items'] : array();

$section_id     = isset( $layout['section_id'] ) ? $layout['section_id'] : '';
$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

$section_classes = 'section-big-text';
if ( $padding_top ) {
    $section_classes .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_classes .= ' container-padding-bottom';
}
?>

<div class="<?php echo esc_attr( $section_classes ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
    <div class="gbyte-container">
        <div class="wrapper">
            <?php if ( $intro_title ) : ?>
                <p><?php echo cf_the_content_br( $intro_title ); ?></p>
            <?php endif; ?>

            <?php if ( ! empty( $stats_items ) ) : ?>
                <div class="gbyte-big-text-container--grid">
                    <?php foreach ( $stats_items as $item ) : ?>
                        <div class="gbyte-big-text-container--grid--item">
                            <?php if ( ! empty( $item['stat_number'] ) ) : ?>
                                <p><?php echo cf_the_content_br( $item['stat_number'] ); ?></p>
                            <?php endif; ?>
                            <?php if ( ! empty( $item['stat_label'] ) ) : ?>
                                <p><?php echo cf_the_content_br( $item['stat_label'] ); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="h-line"></div>
    </div>
</div>