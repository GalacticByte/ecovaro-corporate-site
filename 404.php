<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package ECOVARO_Starter
 */

get_header();
?>

<main id="main" class="site-main">
	<section class="gbyte-404-section">
		<div class="gbyte-container text-center">
			<h1 class="gbyte-404-title">404</h1>
			<p class="gbyte-404-text">Strona, której szukasz, nie została znaleziona.</p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn gbyte-btn bg-green">
				<span>Wróć na stronę główną</span>
			</a>
		</div>
	</section>
</main><!-- #main -->

<?php
get_footer();
