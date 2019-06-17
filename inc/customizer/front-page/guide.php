<?php
/**
 * Survival guide secttion options
 *
 * @package Wildtravel
 */

// Add guide section.
$wp_customize->add_section(
	'wildtravel_guide_section',
	array(
		'title'       => esc_html__( 'Guide Section', 'wildtravel' ),
		'description' => esc_html__( 'Guide Section options.', 'wildtravel' ),
		'panel'       => 'wildtravel_front_page_panel',
	)
);

// Add dropdown page for guide section heading and background image.
$wp_customize->add_setting(
	'wildtravel_theme_options[front_guide_page]',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'wildtravel_theme_options[front_guide_page]',
	array(
		'label'       => esc_html__( 'Select page for guide section heading and background image', 'wildtravel' ),
		'description' => esc_html__(
			'Note: Selected page\'s title and featured image will be used in front page for partners section heading and background image',
			'wildtravel'
		),
		'section'     => 'wildtravel_guide_section',
		'type'        => 'dropdown-pages',
	)
);

for ( $i = 1; $i <= 6; $i++ ) {
	// Add dropdown page for guide heading and description.
	$wp_customize->add_setting(
		'wildtravel_theme_options[front_guide_' . $i . ']',
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'wildtravel_theme_options[front_guide_' . $i . ']',
		array(
			/* translators: %d: guide number. */
			'label'       => sprintf( esc_html__( 'Select page for guide %d ', 'wildtravel' ), $i ),
			'description' => esc_html__(
				'Note: Selected page\'s title and description will be used in front page for guide heading and description',
				'wildtravel'
			),
			'section'     => 'wildtravel_guide_section',
			'type'        => 'dropdown-pages',
		)
	);}
