<?php
/**
 * Template Name: testimonials Template
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

// testimonials header
$visibility_testimonials_header = get_field( 'visibility_testimonials_header' );

// Trusted By
$visibility_trusted_by = get_field( 'visibility_trusted_by' );

// Listen Radio Review
$visibility_listen_radio_review = get_field( 'visibility_listen_radio_review' );
$left_image_listen_radio_review = get_field( 'left_image_listen_radio_review' );
$right_icon_listen_radio_review = get_field( 'right_icon_listen_radio_review' );
$button_listen_radio_review = get_field( 'button_listen_radio_review' );

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
                                                        <?php the_date( 'jS F Y', '<p class="date">', '</p>' ); ?>
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
        // silence is golden
    } ?>

    <section class="fmm__section--third testimonial">
        <div class="container container--content">
            <?php the_content();?>
        </div>
    </section>
    
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
        // silence is golden
    } ?>

    <section class="fmm__section--testimonials">
        <div class="container">
            <?php
                $args = array(  
                    'post_type' => 'testimonial',
                    'post_status' => 'publish',
                    'posts_per_page' => 8, 
                    // 'orderby' => 'title', 
                    'order' => 'DESC', 
                );
            
                $loop = new WP_Query( $args ); 
            ?>
            <div class="row justify-content-center g-0">
                <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
                <div class="col-lg-5 single--testimonial">
                    <div class="content">
                        <h3><?php the_field( 'primary_heading' ); ?></h3>
                        <div class="reviews-stars">★★★★★</div>
                        <?php the_content();?>
                    </div>
                    <div class="content--foter">
                        <p class="name"><?php the_title(); ?></p>
                        <?php the_date( 'd-m-Y', '<p class="date">', '</p>' ); ?>
                    </div>
                <svg width="24px" height="24px" viewBox="0 0 24 24"><path fill="#EA4335 " d="M5.26620003,9.76452941 C6.19878754,6.93863203 8.85444915,4.90909091 12,4.90909091 C13.6909091,4.90909091 15.2181818,5.50909091 16.4181818,6.49090909 L19.9090909,3 C17.7818182,1.14545455 15.0545455,0 12,0 C7.27006974,0 3.1977497,2.69829785 1.23999023,6.65002441 L5.26620003,9.76452941 Z"/><path fill="#34A853" d="M16.0407269,18.0125889 C14.9509167,18.7163016 13.5660892,19.0909091 12,19.0909091 C8.86648613,19.0909091 6.21911939,17.076871 5.27698177,14.2678769 L1.23746264,17.3349879 C3.19279051,21.2936293 7.26500293,24 12,24 C14.9328362,24 17.7353462,22.9573905 19.834192,20.9995801 L16.0407269,18.0125889 Z"/><path fill="#4A90E2" d="M19.834192,20.9995801 C22.0291676,18.9520994 23.4545455,15.903663 23.4545455,12 C23.4545455,11.2909091 23.3454545,10.5272727 23.1818182,9.81818182 L12,9.81818182 L12,14.4545455 L18.4363636,14.4545455 C18.1187732,16.013626 17.2662994,17.2212117 16.0407269,18.0125889 L19.834192,20.9995801 Z"/><path fill="#FBBC05" d="M5.27698177,14.2678769 C5.03832634,13.556323 4.90909091,12.7937589 4.90909091,12 C4.90909091,11.2182781 5.03443647,10.4668121 5.26620003,9.76452941 L1.23999023,6.65002441 C0.43658717,8.26043162 0,10.0753848 0,12 C0,13.9195484 0.444780743,15.7301709 1.23746264,17.3349879 L5.27698177,14.2678769 Z"/></svg>
                </div>
                <?php endwhile;?>
                <?php wp_reset_postdata();  ?>
            </div>
            <a href="#" class="btn--testimonial">Load More</a>
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
        // silence is golden
    } ?>



</div><!-- #full-width-page-wrapper -->

<?php
get_footer();