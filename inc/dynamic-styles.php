<?php
/**
 * Dynamic styles for this theme.
 *
 * This is the template that loads the dynamic styles in header.
 *
 * @package Wildtravel
 */

if ( ! function_exists( 'wildtravel_dynamic_styles' ) ) :

	/**
	 * Dynamic styles for theme.
	 *
	 * @since 1.0.0
	 */
	function wildtravel_dynamic_styles() {
		if ( is_front_page() ) :
			?>
			<style type="text/css">
	header.site-header {
		background-image: url(
			<?php
			header_image();
			?>
		);
	}
			</style>
			<?php
	elseif ( is_singular() ) :
		?>
		<style type="text/css">
header.site-header {
	background-image: url(
		<?php
		the_post_thumbnail_url();
		?>
	);
}
		</style>
		<?php
	elseif ( ! is_front_page() && is_home() ) :
		?>
		<style type="text/css">
header.site-header {
	background-image: url(
		<?php
		echo esc_url( get_the_post_thumbnail_url( get_option( 'page_for_posts' ) ) );
		?>
	);
}
		</style>
		<?php
	elseif ( is_archive() ) :
		?>
		<style type="text/css">
header.site-header {
	background-image: url(
		<?php
		header_image();
		?>
	);
}

</style>
		<?php
	elseif ( is_search() ) :
		?>
		<style type="text/css">
header.site-header {
	background-image: url(
		<?php
		header_image();
		?>
	);
}

</style>
		<?php
	elseif ( is_404() ) :
		?>
		<style type="text/css">
header.site-header {
	background-image: url(
		<?php
		header_image();
		?>
	);
}

</style>
		<?php
	endif;
	}
endif;
add_action( 'wp_head', 'wildtravel_dynamic_styles' );
