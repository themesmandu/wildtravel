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
