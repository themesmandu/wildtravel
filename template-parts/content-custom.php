<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wildtravel
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="blog_content">
            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            endif;
            ?>
        </div>

        <?php wildtravel_post_thumbnail(); ?>
    </header><!-- .entry-header -->

    <?php
    wp_link_pages(
        array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'wildtravel'),
            'after'  => '</div>',
        )
    );
    ?>

</article><!-- #post-<?php the_ID(); ?> -->