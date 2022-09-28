<?php
/**
 * Template Name: hero Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<?php
// header
$header_title = get_field( 'header_title' ); 
$header_subheading = get_field( 'header_subheading' );

$first_image = get_field( 'first_image' );
$second_image = get_field( 'second_image' );
$third_image = get_field( 'third_image' );
$fourth_image = get_field( 'fourth_image' );
$fifth_image = get_field( 'fifth_image' );

// Contact Form Visibility Footer
$visibility_contact_form_visibility_footer = get_field( 'visibility_contact_form_visibility_footer' );
?>

<div class="wrapper" id="hope--page__wrapper">

    <section class="header">
        <div class="header--bg"></div>
        <div class="container-xxl">
            <div class="row header--row">
                    <div class="col-lg-7 order-2 order-lg-1 header--text__holder">
                        <div class="header--left__text">
                            <h1 class="header--h1"><?= $header_title; ?></h1>
                            <p class="header--p"><?= $header_subheading; ?></p>
                            <a class="btn--header__hero" href="/contact/">Get my free consultation</a>
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 header--image__holder">
                        <?php
                        $random = rand(1,5); 
                        if ($random == 1 ){

                            if ( $first_image ) {
                                echo wp_get_attachment_image( $first_image, 'full', "", ["class" => "img-fluid header--right__img"] );
                            }

                         } elseif($random == 2 ) { 

                            if ( $second_image ) {
                                echo wp_get_attachment_image( $second_image, 'full', "", ["class" => "img-fluid header--right__img"] );
                            }

                         } elseif($random == 3 ) { 

                            if ( $third_image ) {
                                echo wp_get_attachment_image( $third_image, 'full', "", ["class" => "img-fluid header--right__img"] );
                            }

                         } elseif($random == 4 ) { 

                            if ( $fourth_image ) {
                                echo wp_get_attachment_image( $fourth_image, 'full', "", ["class" => "img-fluid header--right__img"] );
                            }

                         } else { 

                            if ( $fifth_image ) {
                                echo wp_get_attachment_image( $fifth_image, 'full', "", ["class" => "img-fluid header--right__img"] );
                            }

                         } ?>
                         
                    </div>
            </div>
        </div>
    </section>

    <section class="fmm__section--others">
        <div class="container container--content">
            <?php the_content();?>
        </div>
    </section>

    <?php if ($visibility_contact_form_visibility_footer) { 
    ?>
        <section class="fmm__section--contact">
            <div class="container">
                <h2><em>FREE</em> CONSULTATION - VALUE £50</h2>
                <p class="p__under">Arrange your free consultation to see how Hypnotherapy can help you, and get a free ‘Accelerated Relaxation Programme’ worth £17.99</p>
                <div class="row">
                    <div class="col-xl-8 img--holder">
                        <img class="img-fluid" src="<?= get_template_directory_uri(); ?>/css/images/accelerated-relaxation-program.webp" alt="mobile phone">
                        <div class="features">
                            <ul>
                                <li>
                                    <img src="<?= get_template_directory_uri(); ?>/css/images/check.svg" alt="check">
                                    <p>FREE 20 minute consultation</p>
                                </li>
                                <li>
                                    <img src="<?= get_template_directory_uri(); ?>/css/images/check.svg" alt="check">
                                    <p>FREE 2 hour audio, worth £17.99</p>
                                </li>
                                <li>
                                    <img src="<?= get_template_directory_uri(); ?>/css/images/check.svg" alt="check">
                                    <p>10% discount on all treatments</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 form--holder">
                        <?= do_shortcode('[contact-form-7 id="15573" title="Squeeze Form 2022"]') ?>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } else { 
        // silence is golden
    } ?>

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();