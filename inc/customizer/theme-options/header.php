<?php
/**
 * Header theme options
 *
 * @package Wildtravel
 */

// Add header section.
$wp_customize->add_section(
	'wildtravel_header_section',
	array(
		'title'       => esc_html__( 'Header Section', 'wildtravel' ),
		'description' => esc_html__( 'Header Section options.', 'wildtravel' ),
		'panel'       => 'wildtravel_theme_options_panel',
	)
);

// Add dropdown page for header content title, description.
$wp_customize->add_setting(
	'wildtravel_theme_options[header_page]',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'wildtravel_theme_options[header_page]',
	array(
		'label'       => esc_html__( 'Select page for header content title and description', 'wildtravel' ),
		'description' => esc_html__(
			'Note: Selected page\'s title and description will be used in header content title and description',
			'wildtravel'
		),
		'section'     => 'wildtravel_header_section',
		'type'        => 'dropdown-pages',
	)
);


