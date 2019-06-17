<?php
/**
 * Articles secttion options
 *
 * @package Wildtravel
 */

$defaults = wildtravel_get_default_theme_options();

// Add articles section.
$wp_customize->add_section(
	'wildtravel_article_section',
	array(
		'title'       => esc_html__( 'Article Section', 'wildtravel' ),
		'description' => esc_html__( 'Article Section options.', 'wildtravel' ),
		'panel'       => 'wildtravel_front_page_panel',
	)
);

// setting article section heading.
$wp_customize->add_setting(
	'wildtravel_theme_options[front_article_heading]',
	array(
		'default'           => $defaults['front_article_heading'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'wildtravel_theme_options[front_article_heading]',
	array(
		'label'       => esc_html__( 'Article Section Heading', 'wildtravel' ),
		'description' => esc_html__(
			'Note: This is extra heading that appears on the left side of selected post',
			'wildtravel'
		),
		'section'     => 'wildtravel_article_section',
		'type'        => 'text',
	)
);

// setting article section post select.
$wp_customize->add_setting(
	'wildtravel_theme_options[front_article_post]',
	array(
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new wildtravel_Dropdown_Posts_Control(
		$wp_customize,
		'wildtravel_theme_options[front_article_post]',
		array(
			'label'       => esc_html__( 'Select post to appear in article section', 'wildtravel' ),
			'description' => esc_html__(
				'Note: Selected post\'s date, title, features image and content will be used in front page for article section heading, description and background image',
				'wildtravel'
			),
			'section'     => 'wildtravel_article_section',
			'input_attrs' => array(
				'posts_per_page' => -1,
				'orderby'        => 'name',
				'order'          => 'ASC',
			),
		)
	)
);
