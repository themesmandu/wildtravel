<?php
/**
 * Footer theme options
 *
 * @package Wildtravel
 */

$defaults = wildtravel_get_default_theme_options();
// Add footer section.
$wp_customize->add_section(
	'wildtravel_footer_section',
	array(
		'title'       => esc_html__( 'Footer Section', 'wildtravel' ),
		'description' => esc_html__( 'Footer Section options.', 'wildtravel' ),
		'panel'       => 'wildtravel_theme_options_panel',
	)
);

// Add dropdown page for footer section heading, description and background image.
$wp_customize->add_setting(
	'wildtravel_theme_options[footer_page]',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'wildtravel_theme_options[footer_page]',
	array(
		'label'       => esc_html__( 'Select page for footer section heading, description and background image', 'wildtravel' ),
		'description' => esc_html__(
			'Note: Selected page\'s title, description and featured image will be used in footer section heading, description and background image',
			'wildtravel'
		),
		'section'     => 'wildtravel_footer_section',
		'type'        => 'dropdown-pages',
	)
);

// setting footer buttion text.
$wp_customize->add_setting(
	'wildtravel_theme_options[footer_button_text]',
	array(
		'default'           => $defaults['footer_button_text'],
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	'wildtravel_theme_options[footer_button_text]',
	array(
		'label'   => esc_html__( 'Footer Section Button Text', 'wildtravel' ),
		'section' => 'wildtravel_footer_section',
		'type'    => 'text',
	)
);

// setting footer buttion link.
$wp_customize->add_setting(
	'wildtravel_theme_options[footer_button_link]',
	array(
		'default'           => $defaults['footer_button_link'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'wildtravel_theme_options[footer_button_link]',
	array(
		'label'   => esc_html__( 'Footer Section Button Link', 'wildtravel' ),
		'section' => 'wildtravel_footer_section',
		'type'    => 'url',
	)
);

// setting footer widget area background image.
$wp_customize->add_setting(
	'wildtravel_theme_options[footer_widget_background]',
	array(
		'sanitize_callback' => 'wildtravel_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'wildtravel_theme_options[footer_widget_background]',
		array(
			'label'         => esc_html__( 'Select footer widget area background image', 'wildtravel' ),
			'description'   => esc_html__( 'This image will appear in footer widgets background', 'wildtravel' ),
			'section'       => 'wildtravel_footer_section',
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

// setting footer copyright text.
$wp_customize->add_setting(
	'wildtravel_theme_options[footer_copyright_text]',
	array(
		'default'           => $defaults['footer_copyright_text'],
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	'wildtravel_theme_options[footer_copyright_text]',
	array(
		'label'       => esc_html__( 'Footer Copyright Text', 'wildtravel' ),
		'description' => esc_html__( 'This text will appear before &copy; on footer copyright section', 'wildtravel' ),
		'section'     => 'wildtravel_footer_section',
		'type'        => 'textarea',
	)
);
