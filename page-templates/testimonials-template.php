<?php
/**
 * Template Name: testimonials Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="hope--page__wrapper">

    <section class="header">
        <div class="header--bg"></div>
        <div class="container-xxl">
            <div class="row header--row">
                <div class="col-lg-7 order-2 order-lg-1 header--text__holder">
                    <div class="header--left__text">
                        <h1 class="header--h1">Imagine your life when you finally get control of your anxiety</h1>
                        <p class="header--p">Hello, I'm James Mallinson, and I've used Clinical Hypnotherapy to treat thousands of people for anxiety both online and face to face in London and Winchester</p>
                        <a class="btn--header__hero" href="/contact/">Get my free consultation</a>
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 header--image__holder">
                    <img class="img-fluid header--right__img" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/portraits/james-mallinson-1.png" alt="jon">
                </div>
            </div>
        </div>
    </section>

    <section class="fmm__section--second">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="review--holder">
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
                            <div class="swiper-slide">
                                <div class="text-holder">
                                    <p>James has a very honest yet approachable style and knows how to put you at ease. From the onset, James explained that this would not be a quick fix for me and I still have some work to do on myself but he has taught me techniques to help ease my fear which are extremely useful. It has given me a confidence boost which is always a bonus and I have left the sessions feeling very calm with a positive outlook towards the future diminishment of my fear. All in all, it has definitely been worth it and I would recommend for anyone with fears that can cause extreme anxiety. *</p>
                                    <div class="review">
                                        <h5>Laura Glen</h5>
                                        <p class="date">23-03-2022</p>
                                        <div class="reviews__stars">★★★★★</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-holder">
                                    <p>James helped me with my horse riding anxiety after a bad fall. I really appreciated his open, forthright approach. I have had an excellent result. I have just returned from a week of horse riding abroad and can honestly say that ‘horse behaviour’ that would have terrified me beforehand (e.g., horse refusing to walk forward and backing up close to a cliff edge) I was able to deal with in a cool, confident way that I know I am capable of. I feel that James really put the effort into the session and as a result has helped me enormously. *</p>
                                    <div class="review">
                                        <h5>Laura Glen</h5>
                                        <p class="date">23-03-2022</p>
                                        <div class="reviews__stars">★★★★★</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-holder">
                                    <p>From unsure and nervous to conquering a phobia I've let control aspects of my life for the past forty years - in a matter of minutes! Still can’t quite believe it, I feel a weight has been lifted from my shoulders. James is friendly, approachable and in my humble opinion, a genius! Thank you *</p>
                                    <div class="review">
                                        <h5>Laura Glen</h5>
                                        <p class="date">23-03-2022</p>
                                        <div class="reviews__stars">★★★★★</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="fmm__section--third testimonial">
        <div class="container container--content">
            <h1><span>Professional Clinical Hypnotherapy</span><br> in London</h1>
            <p>Hello, we have been using clinical hypnotherapy in to help thousands of people for over 25 years.  Most of our clients just need 2 appointments to experienced significant change.  We’re here to help you to get & be more of what and who you want to be.   And, as we emerge from the chaos of COVID, you may have decided it’s time for you to tackle whatever it is that may be holding you back which we can do face to face, or as effectively via online hypnotherapy session.</p>
            <p>Do you want to stop smoking, cure a phobia, overcome anxiety, stop panic attacks, lose weight and be more in control?*</p>
            <p>Or, you may want to be more confident, happier, and successful speaking publicly, or in the areas of your health, family or relationship.*</p>
            <p>With our huge experience, training and expertise and with over 90 5* reviews* you can have the confidence that Clinical Hypnotherapy and Fix My Mind may be able to help you.   And as an extra incentive, we’re offering a 10% discount on all treatments.    If you want to explore how we can help you, then just use the simple ‘free consultation form’ and we can can have an initial 20 minute discussion to see how we could work together.</p>
            <p>We look forward to working with you.</p>
        </div>
    </section>
    
    <section class="fmm__section--seventh">
        <div class="container-md">
            <div class="listen__here--holder">
                <div class="row g-0">
                    <div class="col-5 img--holder">
                        <img class="img-fluid" src="http://fixmymind.test/wp-content/uploads/2022/09/Kelly-Holmes.png" alt="kelly">
                    </div>
                    <div class="col-7">
                        <div class="text--holder">
                            <h3 class="h1">I give my experience of hypnotherapy with James <span>10/10</span></h3>
                            <p>Dame Kelly Holmes</p>
                            <a href="#" class="btn">Listen Here</a>
                            <div class="icon">
                                <img class="img-fluid" src="http://fixmymind.test/wp-content/uploads/2022/09/bbc.png" alt="radio">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    
    <section class="fmm__section--sixth">
        <div class="container p-0">
            <ul>
                <li><img class="img-fluid" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/logos/bbc-radio-4.png?id=07f591fd8a1364b6e9ce" alt="test"></li>
                <li><img class="img-fluid" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/logos/bbc-radio-solent.png?id=1f43dfe1d387277f5071" alt="test"></li>
                <li><img class="img-fluid" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/logos/city-am.png?id=7010fec6fa685b8ae0c6" alt="test"></li>
                <li><img class="img-fluid" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/logos/daily-mail.png?id=89aff4e70d8d0d666dc0" alt="test"></li>
                <li><img class="img-fluid" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/logos/gulf-news.png?id=ffe63f54cd67e04f66e5" alt="test"></li>
                <li><img class="img-fluid" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/logos/hampshire-chronicle.png?id=b59b8fde0b5e9369cce6" alt="test"></li>
                <li><img class="img-fluid" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/logos/hampshire-life.png?id=2a26014c83c41a111ce4" alt="test"></li>
                <li><img class="img-fluid" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/logos/slimming-world.png?id=4d9029509c938092feaf" alt="test"></li>
                <li><img class="img-fluid" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/logos/the-observer.png?id=fd68488baf68cfcfcb07" alt="test"></li>
                <li><img class="img-fluid" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/logos/womens-health.png?id=7f84523fe1e464ca6bd9" alt="test"></li>
            </ul>
        </div>
    </section>



</div><!-- #full-width-page-wrapper -->

<?php
get_footer();