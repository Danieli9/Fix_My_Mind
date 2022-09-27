<?php
/**
 * Template Name: location Template
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


// Select Single testimonials 
$visibility_select_single_testimonials = get_field( 'visibility_select_single_testimonials' );

// Select Single testimonials footer
$visibility_select_single_testimonials_footer = get_field( 'visibility_select_single_testimonials_footer' );

// testimonials header
$visibility_testimonials_header = get_field( 'visibility_testimonials_header' );

// Contact Form Visibility
$visibility_contact_form_visibility = get_field( 'visibility_contact_form_visibility' );

// Contact Form Visibility Footer
$visibility_contact_form_visibility_footer = get_field( 'visibility_contact_form_visibility_footer' );

// Content one row white blue background (button)
$visibility_content_one_row_white_blue_background_button = get_field( 'visibility_content_one_row_white_blue_background_button' );
$visibility_visibility_content_one_row_white_blue_background_button = get_field( 'visibility_visibility_content_one_row_white_blue_background_button' );
$button_content_one_row_white_blue_background = get_field( 'button_content_one_row_white_blue_background' );

// Content one row with signature
$visibility_content_one_row_with_signature = get_field( 'visibility_content_one_row_with_signature' );

// Content one row without signature and button
$visibility_content_one_row_without_signature_and_button = get_field( 'visibility_content_one_row_without_signature_and_button' );

// Listen Radio Review
$visibility_listen_radio_review = get_field( 'visibility_listen_radio_review' );
$left_image_listen_radio_review = get_field( 'left_image_listen_radio_review' );
$right_icon_listen_radio_review = get_field( 'right_icon_listen_radio_review' );
$button_listen_radio_review = get_field( 'button_listen_radio_review' );

// Trusted By
$visibility_trusted_by = get_field( 'visibility_trusted_by' );

// List of Treatments
$visibility_list_of_treatments = get_field( 'visibility_list_of_treatments' );
$footer_button_list_of_treatments = get_field( 'footer_button_list_of_treatments' );

// Footer Our philosophy
$visibility_footer_our_philosophy_visibility = get_field( 'visibility_footer_our_philosophy_visibility' );


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

    <?php if ($visibility_testimonials_header) { 
    ?>
        <section class="fmm__section--second">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="review--holder-top">
                            <img src="<?= get_template_directory_uri(); ?>/css/images/google-logo.png.webp" alt="google">
                            <div class="review--score">
                                <p>4.6</p>
                                <div class="reviews-stars">★★★★★</div>
                            </div>
                            <p>115 reviews</p>
                        </div>
                    </div>
                    <div class="col-lg-10 position-relative">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                            <?php $select_testimonials_header = get_field( 'select_testimonials_header' ); ?>
                                <?php if ( $select_testimonials_header ): ?>
                                    <?php foreach ( $select_testimonials_header as $post ):  ?>
                                        <?php setup_postdata ( $post ); ?>
                                            <div class="swiper-slide">
                                                <div class="text-holder">
                                                <?php the_content();?>
                                                    <div class="review">
                                                        <h5><?php the_title(); ?></h5>
                                                        <?php the_date( 'd-m-Y', '<p class="date">', '</p>' ); ?>
                                                        <div class="reviews__stars">★★★★★</div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } else { 
        // silenc is gold
    } ?>

    <?php if ($visibility_content_one_row_with_signature) { 
    ?>
        <section class="fmm__section--third">
            <div class="container container--content">
                <?php the_field( 'content_one_row_with_signature' ); ?>
                <div class="content--footer">
                    <div class="signature">
                        <svg viewBox="0 0 96 36.78"><path d="M26.83,1.93c.62-.07,1.08-.11,1.38-.11a4.76,4.76,0,0,1,.66,0,.71.71,0,0,0,.78.41A.78.78,0,0,0,30.3,2a.93.93,0,0,0,.25-.65,1.51,1.51,0,0,0-.49-.95l-.41-.2A2.3,2.3,0,0,0,28.83,0a12.8,12.8,0,0,0-1.61,0c-.68,0-1.6.15-2.75.33s-2.56.43-4.23.76-3.68.75-6,1.27c-1.7.38-3.36.77-5,1.15s-3.06.73-4.32,1-2.27.57-3,.78l-1.19.3a.81.81,0,0,0-.55.42.88.88,0,0,0-.1.69.86.86,0,0,0,.9.7.57.57,0,0,0,.25,0l1.13-.29c.75-.19,1.73-.44,3-.73l4.16-1C11,5,12.61,4.63,14.28,4.25l2.39-.54,2.13-.45q-.33,1.61-1.42,5.08A86.86,86.86,0,0,1,14,17.15a36.77,36.77,0,0,0-5.71,5.44A40.06,40.06,0,0,0,4.36,28a20.81,20.81,0,0,0-2.09,4.63,5.51,5.51,0,0,0-.27,3,1.43,1.43,0,0,0,1.31,1.1H3.4a3,3,0,0,0,1.93-1,16.33,16.33,0,0,0,2.19-2.59,43,43,0,0,0,2.3-3.64q1.17-2,2.24-4.1c.72-1.38,1.37-2.72,2-4s1.11-2.42,1.53-3.35A86.34,86.34,0,0,0,19.42,8q1.09-3.82,1.31-5.14c1.48-.27,2.71-.48,3.7-.64S26.21,2,26.83,1.93ZM9,27.22q-1.36,2.46-2.42,4a22.12,22.12,0,0,1-1.77,2.4,6.94,6.94,0,0,1-1.13,1.11,8,8,0,0,1,.46-2.07A19,19,0,0,1,5.94,29a32.11,32.11,0,0,1,2.75-4.05,41.24,41.24,0,0,1,3.41-3.75Q10.42,24.75,9,27.22Z"/><path class="cls-1" d="M95.92,19.82a.93.93,0,0,0-.52-.51.78.78,0,0,0-.72.06q-2.06.94-4.15,2c-1.39.71-2.74,1.44-4,2.18a19.58,19.58,0,0,1-.5-2.94,13.82,13.82,0,0,1,0-1.91,3.29,3.29,0,0,1,.24-1.11,2.83,2.83,0,0,1,.35-.53.85.85,0,0,1,.56-.29h.31a.84.84,0,0,0,.7-.14.93.93,0,0,0,.41-.6A.89.89,0,0,0,87.9,15a4.47,4.47,0,0,0-1.17,0,2.34,2.34,0,0,0-1.42.78,5.26,5.26,0,0,0-1.16,3.77.92.92,0,0,0-.56.14Q80.34,21.88,78.33,23a26,26,0,0,1-3.17,1.52,4.51,4.51,0,0,1-1.57.37,2,2,0,0,1-.48-.08c-.13-.06-.16-.29-.08-.7a3.75,3.75,0,0,1,.19-.84,7.78,7.78,0,0,1,.35-.89A7.61,7.61,0,0,0,76,21.1a10.34,10.34,0,0,0,1.87-1.87A9.77,9.77,0,0,0,79,17.28a3.16,3.16,0,0,0,.33-1.56,1.39,1.39,0,0,0-.43-.84,1.29,1.29,0,0,0-.89-.31,2.37,2.37,0,0,0-1.39.62A12.17,12.17,0,0,0,75,16.75a17.44,17.44,0,0,0-1.58,2.1c-.1.13-.18.26-.27.4a.77.77,0,0,0-.38.12,36.86,36.86,0,0,1-4,1.58,15.57,15.57,0,0,1-2.78.64,6.22,6.22,0,0,1-1.74,0,2.4,2.4,0,0,1-.93-.33,1.68,1.68,0,0,1-.76-1.15,8,8,0,0,1-.1-1.15v-.09a5.84,5.84,0,0,0-.1-1,1,1,0,0,0-.72-.81,1.24,1.24,0,0,0-.72-.05,2.85,2.85,0,0,0-1,.52,12.3,12.3,0,0,0-1.48,1.27c-.59.56-1.34,1.33-2.24,2.28-.55.6-1,1.06-1.34,1.38a9.24,9.24,0,0,1-.8.68,10.76,10.76,0,0,1,0-1.4c0-.57.07-1.15.12-1.73q0-.5.06-1.05c0-.37,0-.74.07-1.13.08-1.39-.29-2.22-1.11-2.46a1.91,1.91,0,0,0-.84-.06,2.9,2.9,0,0,0-1.17.53,12.81,12.81,0,0,0-1.73,1.5C48.81,18,48,18.93,47,20.11c-.14.16-.26.32-.38.47a4.72,4.72,0,0,1-.37.47c.39-1.06.72-1.91,1-2.54s.41-1,.41-1a.82.82,0,0,0,0-.67,1.08,1.08,0,0,0-.45-.56.86.86,0,0,0-.72,0,1,1,0,0,0-.51.48q0,.08-.36.78c-.2.46-.45,1.09-.76,1.87a.08.08,0,0,1,0,0,53.74,53.74,0,0,1-5.08,2.08,22.82,22.82,0,0,1-3.41.9,6.57,6.57,0,0,1-2,.08,2.6,2.6,0,0,1-1-.34c-.52-.38-.66-1.31-.41-2.79a1.46,1.46,0,0,0-.15-1,1.18,1.18,0,0,0-.39-.41,1.73,1.73,0,0,0-1-.21,3.87,3.87,0,0,0-.92-.57,3.11,3.11,0,0,0-1.46-.25c-1.8.09-3.75,1.4-5.83,3.95-.25.27-.47.55-.68.82a4.31,4.31,0,0,0-.49.78,1.57,1.57,0,0,0-.19.74,1,1,0,0,0,.29.66,1.13,1.13,0,0,0,.54.3,1.08,1.08,0,0,0,.59,0,2.77,2.77,0,0,0,.62-.23,3.57,3.57,0,0,0,.55-.3L25.62,23l1.32-.78q.4-.28,1-.63c.37-.24.75-.47,1.13-.68l1.11-.64a9.4,9.4,0,0,1,.94-.48c0,.28,0,.59,0,.93a4,4,0,0,0,.13,1,3.91,3.91,0,0,0,.39,1,2.82,2.82,0,0,0,.76.87,4.36,4.36,0,0,0,2.71.77q3.11,0,9.07-2.6l-.12.37c-.33,1.05-.62,2.17-.9,3.34a.94.94,0,0,0,.06.62.85.85,0,0,0,.48.41,1.37,1.37,0,0,0,.37.08.82.82,0,0,0,.74-.41l1-1.44c.3-.43.67-.93,1.09-1.48s.87-1.11,1.34-1.68c.65-.83,1.23-1.5,1.72-2s.91-1,1.26-1.29a8.51,8.51,0,0,1,.84-.74,2.62,2.62,0,0,1,.53-.32v.49c0,.38-.05.76-.08,1.13s-.06.7-.08,1a30.27,30.27,0,0,0-.09,3.62,1.7,1.7,0,0,0,.95,1.6A1.86,1.86,0,0,0,55,24.68a16,16,0,0,0,2.54-2.4c.8-.85,1.44-1.51,1.91-2a10.93,10.93,0,0,1,1.18-1.05c0,.22,0,.48,0,.8a3.5,3.5,0,0,0,.23,1,4.31,4.31,0,0,0,.51,1,3.32,3.32,0,0,0,.9.84,6.21,6.21,0,0,0,4.31.55,23.1,23.1,0,0,0,5.16-1.59,1.42,1.42,0,0,0-.08.18,3.46,3.46,0,0,0-.23.66,5.72,5.72,0,0,0-.33,1.44,3.83,3.83,0,0,0,0,1,1.93,1.93,0,0,0,.29.73,1.69,1.69,0,0,0,.45.44,2.79,2.79,0,0,0,.64.34,2.71,2.71,0,0,0,.88.12A6.69,6.69,0,0,0,75,26.48a13.25,13.25,0,0,0,2.28-.88c.89-.43,1.93-1,3.13-1.71s2.37-1.49,3.81-2.47a28.72,28.72,0,0,0,.6,3.13c-1,.63-1.93,1.25-2.76,1.87a14.55,14.55,0,0,0-2,1.81,5.38,5.38,0,0,0-1.14,1.7,1.92,1.92,0,0,0,0,1.52,1.65,1.65,0,0,0,.78.91,2.82,2.82,0,0,0,1.36.32,4.09,4.09,0,0,0,.76-.08c.25-.05.54-.12.84-.21a7.46,7.46,0,0,0,1.87-.94A5.86,5.86,0,0,0,86,29.93a6.55,6.55,0,0,0,.9-2,5.76,5.76,0,0,0,0-2.49Q90,23.57,95.45,21a.93.93,0,0,0,.48-.51A.81.81,0,0,0,95.92,19.82ZM76.26,18.14c.17-.23.33-.43.46-.62a6.78,6.78,0,0,1-1,1.28Zm-50.1,2.38a7.36,7.36,0,0,1,1.64-1.27A3.89,3.89,0,0,1,29,18.8C28.2,19.26,27.25,19.83,26.16,20.52Zm58.33,8.29a6.2,6.2,0,0,1-1.31,1.28,4,4,0,0,1-1.63.68,1.82,1.82,0,0,1-1,0,1.54,1.54,0,0,1,.14-.4,4,4,0,0,1,.62-.82,15.78,15.78,0,0,1,1.37-1.27,21.66,21.66,0,0,1,2.47-1.74A3.5,3.5,0,0,1,84.49,28.81Z"/></svg>
                        <div class="blue--box">
                        <p><b>James Mallinson</b><br style="display: initial;"> Co-Founder Fix My Mind</p>
                        </div>
                    </div>
                    <div class="image">
                        <img class="img-fluid" src="<?= get_template_directory_uri(); ?>/css/images/James-2.webp" alt="jon">
                    </div>
                </div>
            </div>
        </section>
    <?php
    } else { 
        // silence is golden
    } ?>

    <?php if ($visibility_contact_form_visibility) { 
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
        // silenc is gold
    } ?>

    <?php if ($visibility_select_single_testimonials) { 
    ?>
        <section class="fmm__section--twelfth">
            <div class="testimonial-bg"></div>
            <div class="container cont-testimonial">
                <h3 class="h1">Testimonial</h3>
                <div class="testimonial--holder">
                    <div class="quote-up"></div>
                    <div class="quote-down"></div>

                    <?php $select_testimonials_select_single_testimonials = get_field( 'select_testimonials_select_single_testimonials' ); ?>
                    <?php if ( $select_testimonials_select_single_testimonials ): ?>
                        <?php foreach ( $select_testimonials_select_single_testimonials as $post ):  ?>
                            <?php setup_postdata ( $post ); ?>
                                <?php the_content();?>
                                <div class="testimonial--footer">
                                    <h6><?php the_title(); ?></h6>
                                    <?php the_date( 'F d Y', '<p>', '</p>' ); ?>
                                    <div class="c--reviews__stars">★★★★★</div>
                                </div>
                        <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    <?php
    } else { 
        // silenc is gold
    } ?>

    <?php if ($visibility_content_one_row_white_blue_background_button) { 
    ?>
        <section class="fmm__section--fifth location">
            <div class="container container--content">
                <?php the_field( 'content_content_one_row_white_blue_background_button' );
                if ($visibility_visibility_content_one_row_white_blue_background_button) { 
            
                    if ( $button_content_one_row_white_blue_background ) { ?>
                        <a class="btn__content" href="<?php echo $button_content_one_row_white_blue_background['url']; ?>" target="<?php echo $button_content_one_row_white_blue_background['target']; ?>"><?php echo $button_content_one_row_white_blue_background['title']; ?></a>
                    <?php } 

                } else { 
                    // silence is golden
                } ?>
            </div>
        </section>
    <?php
    } else { 
        // silence is golden
    } ?>
    
    <?php if ($visibility_trusted_by) { 
    ?>
        <section class="fmm__section--sixth">
            <div class="container p-0">
                <ul>
                <?php if ( have_rows( 'images_group_trusted_by' ) ) : ?>
                    <?php while ( have_rows( 'images_group_trusted_by' ) ) : the_row(); ?>
                        <?php $single_image_trusted_by = get_sub_field( 'single_image_trusted_by' ); ?>
                        <?php if ( $single_image_trusted_by ) { ?>
                            <li><?php echo wp_get_attachment_image( $single_image_trusted_by, 'medium', "", ["class" => "img-fluid"] ); ?> </li>
                        <?php } ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // no rows found ?>
                <?php endif; ?>
                </ul>
            </div>
        </section>
    <?php
    } else { 
        // silenc is gold
    } ?>

    <?php if ($visibility_listen_radio_review) { 
    ?>
        <section class="fmm__section--seventh">
            <div class="container-md">
                <div class="listen__here--holder">
                    <div class="row g-0">
                        <div class="col-12 col-sm-5 img--holder order-2 order-sm-1">
                            <?php if ( $left_image_listen_radio_review ) { ?>
                                <?php echo wp_get_attachment_image( $left_image_listen_radio_review, 'large', "", ["class" => "img-fluid"] ); ?>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-sm-7 order-1 order-sm-2">
                            <div class="text--holder">
                                <?php the_field( 'content_listen_radio_review' ); ?>
                                <?php if ( $button_listen_radio_review ) { ?>
                                    <a class="btn" id="play-button" href="https://www.fixmymind.co.uk/media/Fix-My-Mind-Radio-4-Interview.mp3"><?php echo $button_listen_radio_review['title']; ?></a>
                                <?php } ?>
                                <audio id="play-bar" type="audio/mpeg" controls src="https://www.fixmymind.co.uk/media/Fix-My-Mind-Radio-4-Interview.mp3"></audio>
                                <div class="icon">
                                    <?php if ( $right_icon_listen_radio_review ) { ?>
                                        <?php echo wp_get_attachment_image( $right_icon_listen_radio_review, 'medium', "", ["class" => "img-fluid"] ); ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } else { 
        // silenc is gold
    } ?>

    <?php if ($visibility_list_of_treatments) { 
    ?>
        <section class="fmm__section--eighth">
            <div class="container">
                <div class="container--content">
                    <?php the_field( 'content_list_of_treatments' ); ?>
                </div>

                <div class="row">
                    
                    <?php if ( have_rows( 'list_of_treatments_treatments_repeater' ) ) : ?>
                        <?php while ( have_rows( 'list_of_treatments_treatments_repeater' ) ) : the_row(); ?>
                            <?php $icon_list_of_treatments = get_sub_field( 'icon_list_of_treatments' ); ?>
                            <div class="col-md-6 home--card">
                            <div class="home--card--holder">
                                    <div class="card-header">
										<div class="image--holder">
										<?php if ( $icon_list_of_treatments ) { ?>
                                            <?php echo wp_get_attachment_image( $icon_list_of_treatments, 'thumbnail' ); ?>
                                        <?php } ?>
										</div>
                                        <h4><?php the_sub_field( 'title_list_of_treatments' ); ?></h4>
                                    </div>
                                    <div class="text-holder">
                                    <div class="text-holder-wrapper">
                                    <?php the_sub_field( 'content_list_of_treatments' ); ?>
                                    </div>
                                    <?php $button_list_of_treatments = get_sub_field( 'button_list_of_treatments' ); ?>
                                        <?php if ( $button_list_of_treatments ) { ?>
                                            <a class="btn" href="<?php echo $button_list_of_treatments['url']; ?>" target="<?php echo $button_list_of_treatments['target']; ?>"><?php echo $button_list_of_treatments['title']; ?></a>
                                        <?php } ?>
                                    </div>
                            </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php // no rows found ?>
                    <?php endif; ?>

                </div>

                <div class="container--content-footer">
                    <?php the_field( 'footer_content_list_of_treatments' ); ?>
                    <?php if ( $footer_button_list_of_treatments ) { ?>
                        <a class="btn" href="<?php echo $footer_button_list_of_treatments['url']; ?>" target="<?php echo $footer_button_list_of_treatments['target']; ?>"><?php echo $footer_button_list_of_treatments['title']; ?></a>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php
    } else { 
        // silence is golden
    } ?>

    <?php if ($visibility_footer_our_philosophy_visibility) { 
    ?>
        <section class="fmm__section--eighth philosophy">
            <div class="container">
                <?php the_field( 'title_footer_our_philosophy', 'option' ); ?>
            </div>
            <div class="container">
                <div class="row">
                    <?php if ( have_rows( 'list_footer_our_philosophy', 'option' ) ) : ?>
                        <?php while ( have_rows( 'list_footer_our_philosophy', 'option' ) ) : the_row(); ?>
                                <div class="col-md-4 home--card">
                                    <div class="home--card--holder">
                                        <div class="card-header">
                                            <div class="image--holder">
                                                <?php $icon_footer_our_philosophy = get_sub_field( 'icon_footer_our_philosophy' ); ?>
                                                <?php if ( $icon_footer_our_philosophy ) { ?>
                                                    <?php echo wp_get_attachment_image( $icon_footer_our_philosophy, 'thumbnail' ); ?>
                                                <?php } ?>
                                            </div>                                        
                                            <h4><?php the_sub_field( 'title_footer_our_philosophy' ); ?></h4>
                                        </div>
                                        <div class="text-holder">
                                        <div class="text-holder-wrapper philosophy">
                                            <?php the_sub_field( 'content_footer_our_philosophy' ); ?>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php // no rows found ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php
    } else { 
        // silenc is gold
    } ?>

    <?php if ($visibility_content_one_row_without_signature_and_button) { 
    ?>
        <section class="fmm__section--thirteenth">
            <div class="container container--content">
                <?php the_field( 'content_content_one_row_without_signature_and_button' ); ?>
            </div>
        </section>
    <?php
    } else { 
        // silenc is gold
    } ?>

    <?php if ($visibility_select_single_testimonials_footer) { 
    ?>
        <section class="fmm__section--twelfth">
            <div class="testimonial-bg"></div>
            <div class="container cont-testimonial">
                <h3 class="h1">Testimonial</h3>
                <div class="testimonial--holder">
                    <div class="quote-up"></div>
                    <div class="quote-down"></div>

                    <?php $select_testimonials_select_single_testimonials_footer = get_field( 'select_testimonials_select_single_testimonials_footer' ); ?>
                    <?php if ( $select_testimonials_select_single_testimonials_footer ): ?>
                        <?php foreach ( $select_testimonials_select_single_testimonials_footer as $post ):  ?>
                            <?php setup_postdata ( $post ); ?>
                                <?php the_content();?>
                                <div class="testimonial--footer">
                                    <h6><?php the_title(); ?></h6>
                                    <?php the_date( 'F d Y', '<p>', '</p>' ); ?>
                                    <div class="c--reviews__stars">★★★★★</div>
                                </div>
                        <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    <?php
    } else { 
        // silenc is gold
    } ?>

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
        // silenc is gold
    } ?>

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();