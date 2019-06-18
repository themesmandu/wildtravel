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
		$count                = count( $wildtravel_title_split );
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
				$wildtravel_header_title       = apply_filters( 'the_title', get_post( wildtravel_theme_options( 'header_page' ) )->post_title );
				$wildtravel_header_description = apply_filters( 'the_content', get_post( wildtravel_theme_options( 'header_page' ) )->post_content );
			?>
			<div class="header-content">
			<?php if ( ! empty( wildtravel_theme_options( 'header_page' ) ) ) { ?>
				<h1><?php echo wp_kses_post( $wildtravel_header_title ); ?></h1>
					<?php echo wp_kses_post( $wildtravel_header_description ); ?>
					<?php } ?>
					<a href="#">know more</a>
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
