<?php
$wp_customize->add_section( 'pencidesign_new_section_custom_css', array(
	'title'       => esc_html__( 'Custom CSS', 'soledad' ),
	'description' => esc_html__( 'Add your custom CSS which will overwrite the theme CSS', 'soledad' ),
	'priority'    => 80,
) );
// Custom CSS
$wp_customize->add_setting( 'penci_custom_css', array(
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );

$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'custom_css', array(
	'label'       => 'Custom CSS',
	'section'     => 'pencidesign_new_section_custom_css',
	'settings'    => 'penci_custom_css',
	'code_type'   => 'text/css',
	'input_attrs' => array(
		'aria-describedby' => 'editor-keyboard-trap-help-1 editor-keyboard-trap-help-2 editor-keyboard-trap-help-3 editor-keyboard-trap-help-4',
	),
	'priority'    => 5
) ) );