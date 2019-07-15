<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wildtravel
 */

get_header();
?>

<div class="container">
	<div class="row">
		<main id="main" class="col-md-12 grid_content">
			<div class="row">

				<?php if (have_posts()) : ?>

					<?php
					/* Start the Loop */
					while (have_posts()) :
						the_post();

						/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
						get_template_part('template-parts/content', 'custom');

					endwhile;
					?>
				</div><!-- .row -->
				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 2,
						'prev_text' => '<span class="previous">' . __('Prev', 'wildtravel'),
						'next_text' => '<span class="next">' . __('Next', 'wildtravel'),
					)
				);

			else :

				get_template_part('template-parts/content', 'none');

			endif;
			?>

		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- .container -->

<?php
get_footer();
