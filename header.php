<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;700&display=swap" rel="stylesheet">
	<!-- CSS only -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

<div class="o-modal js-modal" id="fmm-popup">
	<div class="o-modal__inner">
		<div class="c-popup">
			<a href="#0" class="c-popup__close js-modal-close"></a>
			<i class="c-popup__logo"></i>
			<h4 class="c-popup__heading">Free Consultation - Value £50</h4>
				<div class="c-popup__highlight">
					<div class="o-responsive-valign">
						<div class="o-responsive-valign__item">
							<img class="c-popup__img" src="https://www.fixmymind.co.uk/wp-content/themes/fixmymind/dist/images/cd.png?id=67f9ed03080b0c8f2958" loading="lazy">
						</div>
						<div class="o-responsive-valign__item">
							<ul class="c-popup__list">
								<li class="c-popup__list__item"><img src="<?= get_template_directory_uri(); ?>/css/images/check.svg" alt="check">2hr download value - £17.99</li>
								<li class="c-popup__list__item"><img src="<?= get_template_directory_uri(); ?>/css/images/check.svg" alt="check">20 minute consultation</li>
								<li class="c-popup__list__item"><img src="<?= get_template_directory_uri(); ?>/css/images/check.svg" alt="check">10% discount on all treatments</li>
							</ul>
						</div>
					</div>
				</div>
				<?= do_shortcode('[contact-form-7 id="1960" title="Popup"]'); ?>
			</div>
		</div>
	</div>
</div>

	<header id="masthead" class="site-header">

		<nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark bg-transparent">
			<div class="container not-padding-mobile">
				<div class="site-branding">
					<?php
					the_custom_logo(); ?>
				</div><!-- .site-branding -->

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="primary-menu" aria-expanded="false" aria-label="navbarNavDropdown">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'depth'           => 3, // 1 = no dropdowns, 2 = with dropdowns.
						// 'container'       => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ms-auto',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				);
				
				?>
				<a href="tel:08001223073" class="d-none d-lg-block btn--header">0800 122 3073</a>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
