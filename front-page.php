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


<?php
// Query random posts.
$the_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'orderby'             => 'DESC',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => 3,
	)
);
?>
<?php
// If we have posts lets show them.
if ($the_query->have_posts()) :
	?>
	<section class="section_one">
		<div class="container">
			<h2 class="section-title"><span><?php esc_html_e('Latest Stories', 'text_domain'); ?></span></h2>
			<div class="row">
				<?php
				// Loop through the posts.
				while ($the_query->have_posts()) :
					$the_query->the_post();
					?>

					<article class="col-sm-12">
						<figure>
							<?php wildtravel_post_thumbnail(); ?>
							<div class="blog_content">
								<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
								<?php the_content(''); ?>
							</div>
						</figure>
					</article>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php
// Query random posts.
$the_query = new WP_Query(
	array(
		'post_type'           => 'post',
		//'orderby'             => 'rand',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => 6,
	)
);
?>
<?php
// If we have posts lets show them.
if ($the_query->have_posts()) :
	?>
	<section class="section_two">
		<div class="container">
			<h2 class="section-title"><span><?php esc_html_e('Read on', 'text_domain'); ?></span></h2>
			<div class="row">
				<?php
				// Loop through the posts.
				while ($the_query->have_posts()) :
					$the_query->the_post();
					?>

					<article class="col-sm-6">
						<figure>
							<?php wildtravel_post_thumbnail(); ?>
							<div class="blog_content">
								<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
							</div>
						</figure>
					</article>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php
get_footer();
