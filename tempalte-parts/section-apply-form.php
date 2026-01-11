<?php
/**
 * Template Part: Section Apply Form
 *
 * @package Ecovaro_Starter
 * @var array $args {
 *      @type string $form_title Optional. Form Title.
 * }
 */

$form_title     = ! empty( $args['form_title'] ) ? $args['form_title'] : carbon_get_the_post_meta( 'apply_form_title' );
$form_shortcode = carbon_get_the_post_meta( 'apply_form_shortcode' );
?>

<section class="gbyte-forms">
    <div class="gbyte-container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="gbyte-forms__col">
                    <?php if ( $form_title ) : ?>
                        <h2 class="gbyte-forms__title"><?php echo esc_html( $form_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( $form_shortcode ) : ?>
                        <div class="gbyte-form">
                            <?php echo do_shortcode( $form_shortcode ); ?>
                        </div>
                    <?php else : ?>
                        <p>Wklej shortcode formularza w panelu edycji strony.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>