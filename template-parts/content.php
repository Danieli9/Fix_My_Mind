<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>
<?php
$fixMyMindURL = urlencode(get_permalink());
$fixMyMindTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
// Construct sharing URL without using any script
$twitterURL = 'https://twitter.com/intent/tweet?text='.$fixMyMindTitle.'&amp;url='.$fixMyMindURL;
$googleplusURL = 'https://plus.google.com/share?url='.$fixMyMindURL;
$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$fixMyMindURL;
$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$fixMyMindURL.'&amp;title='.$fixMyMindTitle;
// $mail_to_body = get_field( 'mail_to', 'option'); 

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="header--navigation">
					<?php the_post_navigation(array('prev_text' => '<span class="nav-title">Previous</span>','next_text' => '')); ?> |
					<?php the_date( 'm, d, Y', '<p>', '</p>' ); ?> |
					<?php the_post_navigation(array('prev_text' => '','next_text' => '<span class="nav-title">Next</span>',));?>
				</div>

				
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<?php _s_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<p>Share this article</p>
		<ul class="blog__social--icons">
			<li><a href="<?= $facebookURL; ?>"><svg viewBox="0 0 97.75 97.75"><path d="M48.875,0C21.882,0,0,21.882,0,48.875S21.882,97.75,48.875,97.75S97.75,75.868,97.75,48.875S75.868,0,48.875,0z M67.521,24.89l-6.76,0.003c-5.301,0-6.326,2.519-6.326,6.215v8.15h12.641L67.07,52.023H54.436v32.758H41.251V52.023H30.229V39.258 h11.022v-9.414c0-10.925,6.675-16.875,16.42-16.875l9.851,0.015V24.89L67.521,24.89z"/></svg></a></li>
			<li><a href="<?= $twitterURL; ?>"><svg viewBox="0 0 1024 1024"> <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm215.3 337.7c.3 4.7.3 9.6.3 14.4 0 146.8-111.8 315.9-316.1 315.9-63 0-121.4-18.3-170.6-49.8 9 1 17.6 1.4 26.8 1.4 52 0 99.8-17.6 137.9-47.4-48.8-1-89.8-33-103.8-77 17.1 2.5 32.5 2.5 50.1-2a111 111 0 0 1-88.9-109v-1.4c14.7 8.3 32 13.4 50.1 14.1a111.13 111.13 0 0 1-49.5-92.4c0-20.7 5.4-39.6 15.1-56a315.28 315.28 0 0 0 229 116.1C492 353.1 548.4 292 616.2 292c32 0 60.8 13.4 81.1 35 25.1-4.7 49.1-14.1 70.5-26.7-8.3 25.7-25.7 47.4-48.8 61.1 22.4-2.4 44-8.6 64-17.3-15.1 22.2-34 41.9-55.7 57.6z"/></svg></a></li>
			<li><a href="<?= $googleplusURL; ?>"><svg viewBox="0 0 1024 1024"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm36.5 558.8c-43.9 61.8-132.1 79.8-200.9 53.3-69-26.3-118-99.2-112.1-173.5 1.5-90.9 85.2-170.6 176.1-167.5 43.6-2 84.6 16.9 118 43.6-14.3 16.2-29 31.8-44.8 46.3-40.1-27.7-97.2-35.6-137.3-3.6-57.4 39.7-60 133.4-4.8 176.1 53.7 48.7 155.2 24.5 170.1-50.1-33.6-.5-67.4 0-101-1.1-.1-20.1-.2-40.1-.1-60.2 56.2-.2 112.5-.3 168.8.2 3.3 47.3-3 97.5-32 136.5zM791 536.5c-16.8.2-33.6.3-50.4.4-.2 16.8-.3 33.6-.3 50.4H690c-.2-16.8-.2-33.5-.3-50.3-16.8-.2-33.6-.3-50.4-.5v-50.1c16.8-.2 33.6-.3 50.4-.3.1-16.8.3-33.6.4-50.4h50.2l.3 50.4c16.8.2 33.6.2 50.4.3v50.1z"/></svg></a></li>
			<li><a href="<?= $linkedInURL; ?>"><svg viewBox="0 0 97.75 97.75"><path d="M39.969,59.587c7.334-3.803,14.604-7.571,21.941-11.376c-7.359-3.84-14.627-7.63-21.941-11.447 C39.969,44.398,39.969,51.954,39.969,59.587z"/><path d="M48.875,0C21.883,0,0,21.882,0,48.875S21.883,97.75,48.875,97.75S97.75,75.868,97.75,48.875S75.867,0,48.875,0z  M82.176,65.189c-0.846,3.67-3.848,6.377-7.461,6.78c-8.557,0.957-17.217,0.962-25.842,0.957c-8.625,0.005-17.287,0-25.846-0.957 c-3.613-0.403-6.613-3.11-7.457-6.78c-1.203-5.228-1.203-10.933-1.203-16.314s0.014-11.088,1.217-16.314 c0.844-3.67,3.844-6.378,7.457-6.782c8.559-0.956,17.221-0.961,25.846-0.956c8.623-0.005,17.285,0,25.841,0.956 c3.615,0.404,6.617,3.111,7.461,6.782c1.203,5.227,1.193,10.933,1.193,16.314S83.379,59.962,82.176,65.189z"/></svg></a></li>
		</ul>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->



