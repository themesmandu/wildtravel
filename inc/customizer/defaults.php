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

		// search Section.
		$defaults['front_search_heading'] = 'Search your Destination';

		// about Section.
		$defaults['front_about_heading'] = 'GET TO KNOW';

		// article Section.
		$defaults['front_article_heading'] = 'World Travellers articles';

		// footer section.
		$defaults['footer_button_text']    = 'LEARN MORE';
		$defaults['footer_button_link']    = home_url();
		$defaults['footer_copyright_text'] = 'Copyright';

		// Pass through filter.
		$defaults = apply_filters( 'wildtravel_get_default_theme_options', $defaults );
		return $defaults;
	}

endif;
