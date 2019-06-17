<?php
/**
 * Search secttion options
 *
 * @package Wildtravel
 */

$defaults = wildtravel_get_default_theme_options();

// Add search section.
$wp_customize->add_section(
	'wildtravel_search_section',
	array(
		'title'       => esc_html__( 'Search Section', 'wildtravel' ),
		'description' => esc_html__( 'Search Section options.', 'wildtravel' ),
		'panel'       => 'wildtravel_front_page_panel',
	)
);

// setting search section heading.
$wp_customize->add_setting(
	'wildtravel_theme_options[front_search_heading]',
	array(
		'default'           => $defaults['front_search_heading'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'wildtravel_theme_options[front_search_heading]',
	array(
		'label'       => esc_html__( 'Search Section Heading', 'wildtravel' ),
		'description' => esc_html__(
			'Note: This is the heading that appears above the search on frontpage',
			'wildtravel'
		),
		'section'     => 'wildtravel_search_section',
		'type'        => 'text',
	)
);
