<?php
get_header();
?>

<main id="main" class="site-main">
	<?php
    // Get all sections from the complex field
    $layouts = carbon_get_the_post_meta( 'crb_page_layouts' );

    if ( ! empty( $layouts ) ) {
        foreach ( $layouts as $layout ) {
            $template_part = 'views/layouts/' . $layout['_type'] . '.php';

            if ( file_exists( get_template_directory() . '/' . $template_part ) ) {
                include( get_template_directory() . '/' . $template_part );
            }
        }
    }
    ?>
</main><!-- #main -->

<?php

get_footer();
