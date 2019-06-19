<?php
/**
 * Custom functions  for this theme
 *
 * @package Wildtravel
 */

if ( ! function_exists( 'wildtravel_title_split' ) ) :

	/**
	 * Display destination title on front page.
	 *
	 * @since 1.0.0
	 *
	 * @param string $wildtravel_title title to split.
	 */
	function wildtravel_title_split( $wildtravel_title ) {
		$wildtravel_title_split = explode( ' ', $wildtravel_title );
		$count                  = count( $wildtravel_title_split );
		for ( $i = 0; $i < $count; $i++ ) {
			if ( ( $count - 1 ) === $i ) {
				echo wp_kses_post( '<span>' . $wildtravel_title_split[ $i ] . '</span>' );
			} else {
				echo wp_kses_post( $wildtravel_title_split[ $i ] . ' ' );
			}
		}

	}

endif;


if ( ! function_exists( 'wildtravel_header_page_title' ) ) :

	/**
	 * Display page title on header.
	 *
	 * @since 1.0.0
	 */
	function wildtravel_header_page_title() {
		if ( is_front_page() ) :
			?>
			<div class="header-content">
			<?php if ( ! empty( wildtravel_theme_options( 'front_header_title' ) ) ) { ?>
				<h1><?php echo esc_html( wildtravel_theme_options( 'front_header_title' ) ); ?></h1>
					<?php } ?>
					<a href="<?php echo esc_url( wildtravel_theme_options( 'header_button_link' ) ); ?>"><?php echo esc_html( wildtravel_theme_options( 'header_button_text' ) ); ?></a>
			</div>
			<?php
		elseif ( ! is_front_page() && is_home() || is_singular() ) :
			?>
			<div class="page-content">
					<h1 class="header-title"><?php single_post_title(); ?></h1>
			</div>
			<?php
		elseif ( is_archive() ) :
			?>
			<div class="page-content">
					<h1 class="header-title"><?php the_archive_title(); ?></h1>
			</div>
			<?php
		elseif ( is_search() ) :
			?>
			<div class="page-content">
				<?php /* translators: %s: search query. */ ?>
					<h1 class="header-title"><?php printf( esc_html__( 'Search Results for: %s', 'wildtravel' ), get_search_query() ); ?></h1>
			</div>
			<?php
		elseif ( is_404() ) :
			?>
			<div class="page-content">
					<h1 class="header-title"><?php echo esc_html__( 'Oops! That page can&#39;t be found.', 'wildtravel' ); ?></h1>
			</div>
			<?php
		endif;
	}

endif;



if ( ! function_exists( 'wildtravel_related_post_query' ) ) :

	/**
	 * Generate the query for related posts based on taxonomies.
	 *
	 * @param int   $post_id post id of single post.
	 * @param int   $related_count post per page.
	 * @param array $args arguments.
	 *
	 * @since 1.0.0
	 */
	function wildtravel_related_post_query( $post_id, $related_count, $args = array() ) {
		$args = wp_parse_args(
			(array) $args,
			array(
				'orderby' => 'rand',
				'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array).
			)
		);

		$related_args = array(
			'post_type'      => get_post_type( $post_id ),
			'posts_per_page' => $related_count,
			'post_status'    => 'publish',
			'post__not_in'   => array( $post_id ),
			'orderby'        => $args['orderby'],
			'tax_query'      => array(),
		);

		$post       = get_post( $post_id );
		$taxonomies = get_object_taxonomies( $post, 'names' );

		foreach ( $taxonomies as $taxonomy ) {
			$terms = get_the_terms( $post_id, $taxonomy );
			if ( empty( $terms ) ) {
				continue;
			}
			$term_list                   = wp_list_pluck( $terms, 'slug' );
			$related_args['tax_query'][] = array(
				'taxonomy' => $taxonomy,
				'field'    => 'slug',
				'terms'    => $term_list,
			);
		}

		if ( count( $related_args['tax_query'] ) > 1 ) {
			$related_args['tax_query']['relation'] = 'OR';
		}

		if ( 'query' === $args['return'] ) {
			return new WP_Query( $related_args );
		} else {
			return $related_args;
		}
	}
endif;
