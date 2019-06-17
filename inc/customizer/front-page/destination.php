<?php
/**
 * Featured destination section options
 *
 * @package Wildtravel
 */

if ( class_exists( 'WP_Travel' ) ) {
	// Add Destination section.
	$wp_customize->add_section(
		'wildtravel_destination_section',
		array(
			'title'       => esc_html__( 'Destination Section', 'wildtravel' ),
			'description' => esc_html__( 'Destination Section options.', 'wildtravel' ),
			'panel'       => 'wildtravel_front_page_panel',
		)
	);

	// Add dropdown page for destination section heading and description.
	$wp_customize->add_setting(
		'wildtravel_theme_options[front_destination_page]',
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'wildtravel_theme_options[front_destination_page]',
		array(
			'label'       => esc_html__( 'Select page for destination section heading and description', 'wildtravel' ),
			'description' => esc_html__(
				'Note: Selected page\'s title and description will be used in front page for destination section heading and description',
				'wildtravel'
			),
			'section'     => 'wildtravel_destination_section',
			'type'        => 'dropdown-pages',
		)
	);

	// Add dropdown destinations setting and control.
	for ( $i = 1; $i <= 6; $i++ ) {
		$wp_customize->add_setting(
			'wildtravel_theme_options[front_destination_' . $i . ']',
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new wildtravel_Dropdown_Taxonomies_Control(
				$wp_customize,
				'wildtravel_theme_options[front_destination_' . $i . ']',
				array(
					/* translators: %d: destination number. */
					'label'       => sprintf( esc_html__( 'Select destination %d', 'wildtravel' ), $i ),
					'description' => esc_html__(
						'Note: Selected destination\'s thumbnail will be used in front page',
						'wildtravel'
					),
					'section'     => 'wildtravel_destination_section',
					'type'        => 'dropdown-taxonomies',
					'taxonomy'    => 'travel_locations',
				)
			)
		);  }
}

