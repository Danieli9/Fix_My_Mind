<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();
?>

	<main id="primary" class="fmm__section--single">
	<section class="header">
		<div class="header--bg"></div>
		<div class="container-xxl">
			<div class="row header--row">
				<div class="col-lg-7 order-2 order-lg-1 header--text__holder">
					<div class="header--left__text">
						<h1 class="header--h1">BLOG</h1>
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
	<div class="single__blog--wrapper">
		<div class="container container--blog">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; // End of the loop.
			?>
		</div>
	</div>
	<section class="fmm__section--contact">
			<div class="container">
				<h2><em>FREE</em> CONSULTATION - VALUE £50</h2>
				<p class="p__under">Arrange your free consultation to see how Hypnotherapy can help you, and get a free ‘Accelerated Relaxation Programme’ worth £17.99</p>
				<div class="row">
					<div class="col-xl-8 img--holder">
						<img class="img-fluid" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/accelerated-relaxation-program.png?id=9c7e9ba091b76db05165" alt="">
						<div class="features">
							<ul>
								<li>
									<img src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/check.svg?id=e2f7d77b3841eba35af4" alt="">
									<p>FREE 20 minute consultation</p>
								</li>
								<li>
									<img src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/check.svg?id=e2f7d77b3841eba35af4" alt="">
									<p>FREE 2 hour audio, worth £17.99</p>
								</li>
								<li>
									<img src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/check.svg?id=e2f7d77b3841eba35af4" alt="">
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


	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
