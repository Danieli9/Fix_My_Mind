<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header('page');
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

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
