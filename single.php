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
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content', 'single');

				the_post_navigation(
					array(
						'prev_text'          => __('<i class="fas fa-chevron-left"></i>  %title', 'wildtravel'),
						'next_text'          => __('%title <i class="fas fa-chevron-right"></i>', 'wildtravel'),
						'screen_reader_text' => ' ',
					)
				);
				?>

				<?php
				// Query random posts.
				$the_query = new WP_Query(
					array(
						'post_type'           => 'post',
						'orderby'             => 'DESC',
						'ignore_sticky_posts' => 1,
						'posts_per_page'      => 5,
					)
				);
				?>
				<?php
				// If we have posts lets show them.
				if ($the_query->have_posts()) :
					?>
					<div class="related_wrap">
						<h2 class="section-title"><span><?php esc_html_e('Related Posts', 'text_domain'); ?></span></h2>

						<?php
						// Loop through the posts.
						while ($the_query->have_posts()) :
							$the_query->the_post();
							?>
							<article class="row">
								<div class="col-sm-5 figure">
									<a href="<?php the_permalink(); ?>">
										<?php wildtravel_post_thumbnail(); ?>
									</a>
								</div>

								<div class="blog_content col-sm-7">
									<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</article>

						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</div>
				<?php endif; ?>

				<?php

				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- .row -->
</div><!-- .container -->

<?php
get_footer();
