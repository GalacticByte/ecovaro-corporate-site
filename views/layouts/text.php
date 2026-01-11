<?php
/**
 * Layout: Text
 */

$variant = isset( $layout['variant'] ) ? $layout['variant'] : 'text';
$title   = isset( $layout['title'] ) ? $layout['title'] : '';

$section_id     = isset( $layout['section_id'] ) ? $layout['section_id'] : '';
$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

$section_classes = '';
if ( $padding_top ) {
    $section_classes .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_classes .= ' container-padding-bottom';
}

if ( 'headline' === $variant ) :
    // Headline Variant
    $paragraph   = isset( $layout['headline_paragraph'] ) ? $layout['headline_paragraph'] : '';
    $bg_color    = isset( $layout['bg_color'] ) ? $layout['bg_color'] : '';
    $title_tag   = isset( $layout['title_tag'] ) ? $layout['title_tag'] : 'h1';
    $wrapper_tag = isset( $layout['wrapper_tag'] ) ? $layout['wrapper_tag'] : 'section';

    $title_class = ( 'h1' === $title_tag ) ? 'gbyte-headline__title' : '';
    $style_attr  = $bg_color ? 'style="background-color: ' . esc_attr( $bg_color ) . ';"' : '';
    ?>
    <<?php echo tag_escape( $wrapper_tag ); ?> class="gbyte-headline<?php echo esc_attr( $section_classes ); ?>" <?php echo $style_attr; ?><?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
        <div class="gbyte-container">
            <div class="gbyte-headline__wrapper">
                <?php if ( $title ) : ?>
                    <<?php echo tag_escape( $title_tag ); ?> class="<?php echo esc_attr( $title_class ); ?>"><?php echo cf_text( $title ); ?></<?php echo tag_escape( $title_tag ); ?>>
                <?php endif; ?>
                <?php if ( $paragraph ) : ?>
                    <p class="gbyte-headline__text"><?php echo cf_the_content_br( $paragraph ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </<?php echo tag_escape( $wrapper_tag ); ?>>

<?php else :
    // Standard Text Variant
    $content     = isset( $layout['content'] ) ? $layout['content'] : '';
    $show_button = isset( $layout['show_button'] ) ? $layout['show_button'] : false;
    $btn_text    = isset( $layout['button_text'] ) ? $layout['button_text'] : '';
    $btn_url     = isset( $layout['button_url'] ) ? $layout['button_url'] : '';
    $btn_target  = isset( $layout['button_target'] ) ? $layout['button_target'] : '_self';
    $btn_style   = isset( $layout['button_style'] ) ? $layout['button_style'] : 'bg-green';

    // Determine icon color based on button background
    $icon_color = ( 'bg-white' === $btn_style ) ? '#015AAB' : '#ffffff';
    ?>
    <section class="gbyte-text<?php echo esc_attr( $section_classes ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
        <div class="gbyte-container">
            <div class="gbyte-text__wrapper">
                <?php if ( $title ) : ?>
                    <h2 class="gbyte-text__title"><?php echo cf_text( $title ); ?></h2>
                <?php endif; ?>

                <?php if ( $content ) : ?>
                    <p class="gbyte-text__content">
                        <?php echo cf_the_content_br( $content ); ?>
                    </p>
                <?php endif; ?>

                <?php if ( $show_button && $btn_text && $btn_url ) : ?>
                    <a href="<?php echo esc_url( $btn_url ); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="btn gbyte-btn <?php echo esc_attr( $btn_style ); ?>">
                        <span><?php echo esc_html( $btn_text ); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16">
                            <defs><style>.a{fill:none;}.b{fill:<?php echo esc_attr( $icon_color ); ?>;fill-rule:evenodd;opacity:0.54;}</style></defs>
                            <rect class="a" width="16" height="16"/>
                            <path class="b" d="M12,5.25H2.85l4.2-4.2L6,0,0,6l6,6,1.05-1.05-4.2-4.2H12V5.25Z" transform="translate(14.485 14) rotate(180)"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>