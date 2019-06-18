<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
				<?php
				if (have_posts()) :

					/* Start the Loop */
					while (have_posts()) :
						the_post();
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
