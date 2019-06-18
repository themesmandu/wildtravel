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
if ( $the_query->have_posts() ) :
	?>

<?php esc_html_e( 'Latest Stories', 'text_domain' ); ?>
			<?php
			// Loop through the posts.
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
				?>
				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

<?php endif; ?>

<?php
// Query random posts.
$the_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'orderby'             => 'rand',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => 9,
	)
);
?>
<?php
// If we have posts lets show them.
if ( $the_query->have_posts() ) :
	?>

<?php esc_html_e( 'Read on', 'text_domain' ); ?>
			<?php
			// Loop through the posts.
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
				?>
				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

<?php endif; ?>
<?php
get_footer();
