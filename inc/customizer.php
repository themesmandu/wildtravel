<?php
/**
 * Wildtravel Theme Customizer
 *
 * @package Wildtravel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wildtravel_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'wildtravel_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'wildtravel_customize_partial_blogdescription',
			)
		);
	}

		// load custom control dropdown taxonomy.
		require get_template_directory() . '/inc/customizer/custom-controls/class-wildtravel-dropdown-posts-control.php';

		// Add panel for common theme options.
		$wp_customize->add_panel(
			'wildtravel_theme_options_panel',
			array(
				'title'       => esc_html__( 'Wildtravel Theme Options', 'wildtravel' ),
				'description' => esc_html__( 'Wildtravel Theme Options.', 'wildtravel' ),
				'priority'    => 150,
			)
		);

		// load footer option.
		require get_template_directory() . '/inc/customizer/theme-options/header.php';

		// load footer option.
		require get_template_directory() . '/inc/customizer/theme-options/footer.php';

		// Add panel for front page theme options.
		$wp_customize->add_panel(
			'wildtravel_front_page_panel',
			array(
				'title'       => esc_html__( 'Wildtravel Front Page Options', 'wildtravel' ),
				'description' => esc_html__( 'Front Page Theme Options.', 'wildtravel' ),
				'priority'    => 140,
			)
		);

}
add_action( 'customize_register', 'wildtravel_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wildtravel_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wildtravel_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wildtravel_customize_preview_js() {
	wp_enqueue_script( 'wildtravel-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wildtravel_customize_preview_js' );
