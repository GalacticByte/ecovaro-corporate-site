<?php
/**
 * Template for a single job offer (CPT: job_offer).
 *
 * @package ECOVARO_Starter
 */

get_header();

$base_page = get_page_by_path( 'aplikuj', OBJECT, 'page' );

if ( $base_page ) {
    // Get the permalink for the Apply page
    $apply_page_url = get_permalink( $base_page->ID );

    // Add offer_id parameter
    $apply_link = add_query_arg( 'offer_id', get_the_ID(), $apply_page_url );
}
?>

<main id="main" class="site-main">
	<?php
	// Start the Loop.
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'gbyte-single-job-offer' ); ?>>
			<div class="gbyte-container">
				<div class="row justify-content-center gbyte-single-job-offer__row">
					<div class="col-lg-8">
						<header class="gbyte-single-job-offer__header">
							<?php the_title( '<h1 class="gbyte-single-job-offer__title">', '</h1>' ); ?>
						</header>
						<div class="gbyte-single-job-offer__content">
							<?php the_content(); ?>

						</div>
					</div>
					<div class="col-lg-4">
						<div class="gbyte-single-job-offer__sidebar-wrapper">
							<div class="gbyte-single-job-offer__sidebar-sticky">
								<a href="<?php echo esc_url( $apply_link ); ?>" class="btn gbyte-btn bg-green">
								<span><?php _e( 'Aplikuj', 'ecovaro' ); ?></span>
								 <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="16" height="16" viewBox="0 0 16 16"><defs><style>.a{fill:none;}.b{fill:#ffffff;fill-rule:evenodd;opacity:0.54;}</style></defs><rect class="a" width="16" height="16"/><path class="b" d="M12,5.25H2.85l4.2-4.2L6,0,0,6l6,6,1.05-1.05-4.2-4.2H12V5.25Z" transform="translate(14.485 14) rotate(180)"/></svg>
								</a>
								<p class="gbyte-single-job-offer__date">
									<?php _e( 'Data publikacji:', 'ecovaro' ); ?> <?php echo get_the_date( 'd.m.Y' ); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
		<?php
	endwhile; // End of the loop.
	?>
</main>

<?php
get_footer();