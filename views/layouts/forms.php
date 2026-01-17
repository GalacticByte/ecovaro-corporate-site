<?php
/**
 * Layout: Section Form
 *
 * @package Ecovaro_Starter
 * @var array $layout Data from Carbon Fields
 */

// Variables from Carbon Fields
$title           = $layout['title'] ?? '';
$text            = $layout['text'] ?? '';
$shortcode       = $layout['form_shortcode'] ?? '';
$container_class = $layout['extra_class'] ?? '';

$section_id     = isset( $layout['section_id'] ) ? $layout['section_id'] : '';
$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

$section_classes = 'gbyte-forms ' . $container_class;
if ( $padding_top ) {
    $section_classes .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_classes .= ' container-padding-bottom';
}

$title_id = 'form-title-' . ( $section_id ? $section_id : uniqid() );
?>

<section class="<?php echo esc_attr( trim( $section_classes ) ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?> aria-labelledby="<?php echo esc_attr( $title_id ); ?>">
	<div class="gbyte-container">
		<div class="gbyte-forms__inner">
			<div class="row align-items-start">
				<?php // Left column with text ?>
				<div class="col-lg-5">
					<div class="gbyte-forms__col mb-5 mb-lg-0">
						<h2 id="<?php echo esc_attr( $title_id ); ?>" class="gbyte-forms__title"><?php echo cf_text( $title ); ?></h2>
						<?php if ( $text ) : ?>
							<div class="gbyte-forms__text"><?php echo cf_the_content_br( $text ); ?></div>
						<?php endif; ?>
					</div>
				</div>

				<?php // Right column with form (changed layout for better spacing) ?>
				<div class="col-lg-7">
					<div class="gbyte-forms__col">
						<div class="gbyte-form">
							<?php echo do_shortcode( $shortcode ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>