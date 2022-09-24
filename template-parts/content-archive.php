<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<div class="col-lg-4 blog-article">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="article--holder">
            <?php echo get_the_post_thumbnail( $page->ID, 'medium' ); ?>
            <div class="content--holder">
                <div class="entry-content">
                    <h2><?php the_title(); ?></h2>
                    <?php the_excerpt();?>
                </div><!-- .entry-content -->
                <a class="btn" href="<?= get_permalink(); ?>">Read More</a>
            </div>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>
