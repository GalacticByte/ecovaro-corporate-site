<?php
/**
 * Layout: Job Offers List
 *
 * @package Ecovaro_Starter
 */

// Variables from Carbon Fields
$list_title     = $layout['job_list_title'] ?? '';
$no_offers_text = $layout['no_offers_text'] ?? __( 'Obecnie nie prowadzimy żadnych rekrutacji. Zachęcamy do pozostawienia swojego CV poprzez formularz poniżej.', 'ecovaro' );

$section_id     = isset( $layout['section_id'] ) ? $layout['section_id'] : '';
$padding_top    = isset( $layout['padding_top'] ) ? $layout['padding_top'] : true;
$padding_bottom = isset( $layout['padding_bottom'] ) ? $layout['padding_bottom'] : true;

$section_classes = 'gbyte-job-offers';
if ( $padding_top ) {
    $section_classes .= ' container-padding-top';
}
if ( $padding_bottom ) {
    $section_classes .= ' container-padding-bottom';
}

$args = array(
    'post_type'      => 'job_offer',
    'order'          => 'date',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'suppress_filters' => false,
);

$job_offers_query = new WP_Query($args);

?>

<section class="<?php echo esc_attr( $section_classes ); ?>"<?php echo $section_id ? ' id="' . esc_attr( $section_id ) . '"' : ''; ?>>
    <div class="gbyte-container">
        <?php if ( $list_title ) : ?>
            <h2 class="gbyte-job-offers__title"><?php echo cf_text( $list_title ); ?></h2>
        <?php endif; ?>

        <div class="row g-4 justify-content-start">
            <?php if ( $job_offers_query->have_posts() ) : ?>
                <?php while ( $job_offers_query->have_posts() ) : $job_offers_query->the_post();


                    $excerpt = carbon_get_the_post_meta( 'job_offer_excerpt' );
                    $image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' ) ?: get_template_directory_uri() . '/assets/images/placeholder.jpg';
                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 gbyte-job-offers__card">
                            <img src="<?php echo esc_url($image_url); ?>" class="card-img-top gbyte-job-offers__card-image" alt="<?php the_title_attribute(); ?>">
                            <div class="card-body gbyte-job-offers__card-body">
                                <h3 class="card-title gbyte-job-offers__card-title"><?php the_title(); ?></h3>
                                <?php if ($excerpt): ?>
                                    <p class="card-text gbyte-job-offers__card-text"><?php echo esc_html($excerpt); ?></p>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="btn gbyte-btn bg-green mt-auto">
                                    <span><?php _e('Dowiedz się więcej', 'ecovaro'); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16"><defs><style>.a{fill:none;}.b{fill:#ffffff;fill-rule:evenodd;opacity:0.54;}</style></defs><rect class="a" width="16" height="16"/><path class="b" d="M12,5.25H2.85l4.2-4.2L6,0,0,6l6,6,1.05-1.05-4.2-4.2H12V5.25Z" transform="translate(14.485 14) rotate(180)"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="gbyte-job-offers__empty text-center">
                    <?php echo esc_html( $no_offers_text ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>