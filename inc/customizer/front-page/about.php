<?php
/**
 * About secttion options
 *
 * @package Wildtravel
 */

$defaults = wildtravel_get_default_theme_options();

// Add about section.
$wp_customize->add_section(
	'wildtravel_about_section',
	array(
		'title'       => esc_html__( 'About Section', 'wildtravel' ),
		'description' => esc_html__( 'About Section options.', 'wildtravel' ),
		'panel'       => 'wildtravel_front_page_panel',
	)
);

// setting about section heading.
$wp_customize->add_setting(
	'wildtravel_theme_options[front_about_heading]',
	array(
		'default'           => $defaults['front_about_heading'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'wildtravel_theme_options[front_about_heading]',
	array(
		'label'       => esc_html__( 'About Section Heading', 'wildtravel' ),
		'description' => esc_html__(
			'Note: This is extra heading that appears above the selected page heading',
			'wildtravel'
		),
		'section'     => 'wildtravel_about_section',
		'type'        => 'text',
	)
);

// Add dropdown page for about section heading and description.
$wp_customize->add_setting(
	'wildtravel_theme_options[front_about_page]',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'wildtravel_theme_options[front_about_page]',
	array(
		'label'       => esc_html__( 'Select page for about section heading, description and background image', 'wildtravel' ),
		'description' => esc_html__(
			'Note: Selected page\'s title, description and features image will be used in front page for about section heading, description and background image',
			'wildtravel'
		),
		'section'     => 'wildtravel_about_section',
		'type'        => 'dropdown-pages',
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// setting front page about images.
	$wp_customize->add_setting(
		'wildtravel_theme_options[front_about_image_' . $i . ']',
		array(
			'sanitize_callback' => 'wildtravel_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wildtravel_theme_options[front_about_image_' . $i . ']',
			array(
				/* translators: %d: about image number. */
				'label'         => sprintf( __( 'Select About Image %d', 'wildtravel' ), $i ),
				'description'   => esc_html__( 'This image will appear in about section image album', 'wildtravel' ),
				'section'       => 'wildtravel_about_section',
				'button_labels' => array( // Optional.
					'select'       => __( 'Select Image', 'wildtravel' ),
					'change'       => __( 'Change Image', 'wildtravel' ),
					'remove'       => __( 'Remove', 'wildtravel' ),
					'default'      => __( 'Default', 'wildtravel' ),
					'placeholder'  => __( 'No image selected', 'wildtravel' ),
					'frame_title'  => __( 'Select Image', 'wildtravel' ),
					'frame_button' => __( 'Choose Image', 'wildtravel' ),
				),
			)
		)
	);
}
