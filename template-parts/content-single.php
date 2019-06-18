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
