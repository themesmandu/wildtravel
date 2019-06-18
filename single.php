<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wildtravel
 */

get_header();
?>

<div class="container">
	<div class="row">
		<main id="main" class="col-md-12">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation(
				array(
					'prev_text'          => __( '<i class="fas fa-chevron-left"></i>  %title', 'wildtravel' ),
					'next_text'          => __( '%title <i class="fas fa-chevron-right"></i>', 'wildtravel' ),
					'screen_reader_text' => ' ',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- .container -->

<?php
get_footer();
