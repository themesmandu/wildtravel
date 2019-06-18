<?php
/**
 * Customizer default options
 *
 * @package Themesmandu
 * @subpackage Wildtravel
 * @since Wildtravel 1.0.0
 * @return array An array of default values
 */

if ( ! function_exists( 'wildtravel_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function wildtravel_get_default_theme_options() {

		$defaults = array();

		$defaults['footer_copyright_text'] = 'Copyright';

		// Pass through filter.
		$defaults = apply_filters( 'wildtravel_get_default_theme_options', $defaults );
		return $defaults;
	}

endif;
