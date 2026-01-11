<?php
/**
 * Template Name: Apply
 *
 * @package Ecovaro_Starter
 */

get_header();

// Get the offer ID from the URL parameter (validation is done in theme-setup.php)
$offer_id = isset( $_GET['offer_id'] ) ? absint( $_GET['offer_id'] ) : 0;
$offer_title = '';

if ( $offer_id ) {
    $offer_title = get_the_title( $offer_id );
}
?>

<main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();

        // Display standard page content
        the_content();

        // Prepare arguments for the template part
        $args = array();

        if ( $offer_title ) {
            // Dynamically override the form title
            $args['form_title'] = sprintf( __( 'Aplikuj na stanowisko: %s', 'ecovaro' ), $offer_title );
        }

        // Load the form section
        get_template_part( 'tempalte-parts/section', 'apply-form', $args );

    endwhile;
    ?>

</main><!-- #main -->

<?php
get_footer();