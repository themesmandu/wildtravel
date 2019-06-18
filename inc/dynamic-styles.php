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
	}
endif;
add_action( 'wp_head', 'wildtravel_dynamic_styles' );
