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
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				wildtravel_posted_on();
				wildtravel_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php wildtravel_post_thumbnail(); ?>

	<div class="entry-content">
		<?php

		the_content( '' );

		if ( ! is_singular() ) :
			?>
			<a class="more_link" href="<?php esc_url( the_permalink() ); ?>"><?php echo esc_html__( 'Read More', 'wildtravel' ); ?></a>	
			<?php
			endif;

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wildtravel' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
