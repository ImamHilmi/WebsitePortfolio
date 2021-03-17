<?php
/* Add Sections */
$wp_customize->add_section( 'penci_section_sidebar_general', array(
	'title'    => esc_html__( 'General', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/widget-heading-title.png">this image</a> to know what is "Sidebar Widget Heading"', 'soledad' ),
	'panel'      => 'penci_sidebar_panel'
) );

$wp_customize->add_section( 'penci_section_sidebar_fsize', array(
	'title'    => esc_html__( 'Font Size', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_sidebar_panel'
) );

$wp_customize->add_section( 'penci_section_sidebar_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_sidebar_panel'
) );

/* General */
$wp_customize->add_setting( 'penci_sidebar_width', array(
	'default' => '29.1',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_sidebar_width', array(
	'description' => __( 'Custom Sidebar Width', 'soledad' ),
	'section' => 'penci_section_sidebar_general',
	'settings' => array(
		'desktop' => 'penci_sidebar_width',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 50,
			'step' => 0.1,
			'edit' => true,
			'unit' => '%',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_2sidebar_width', array(
	'default' => '21.5',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_2sidebar_width', array(
	'description' => __( 'Sidebar Width on Two Sidebars Layout', 'soledad' ),
	'section' => 'penci_section_sidebar_general',
	'settings' => array(
		'desktop' => 'penci_2sidebar_width',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 50,
			'step' => 0.1,
			'edit' => true,
			'unit' => '%',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_sidebar_space', array(
	'default' => '50',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_sidebar_space', array(
	'description' => __( 'Space Between Sidebar & Content', 'soledad' ),
	'section' => 'penci_section_sidebar_general',
	'settings' => array(
		'desktop' => 'penci_sidebar_space',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 200,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_sidebar_widget_margin', array(
	'default' => '60',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'sidebar_widget_margin', array(
	'description' => __( 'Custom Space Between Widgets', 'soledad' ),
	'section' => 'penci_section_sidebar_general',
	'settings' => array(
		'desktop' => 'penci_sidebar_widget_margin',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading_lowcase', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_heading_lowcase', array(
	'label'    => 'Turn Off Uppercase Widget Heading',
	'section'  => 'penci_section_sidebar_general',
	'settings' => 'penci_sidebar_heading_lowcase',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading_style', array(
	'default'           => 'style-1',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_heading_style', array(
	'label'    => 'Sidebar Widget Heading Style',
	'section'  => 'penci_section_sidebar_general',
	'settings' => 'penci_sidebar_heading_style',
	'type'     => 'radio',
	'choices'  => array(
		'style-1'  => 'Default Style',
		'style-2'  => 'Style 2',
		'style-3'  => 'Style 3',
		'style-4'  => 'Style 4',
		'style-5'  => 'Style 5',
		'style-6'  => 'Style 6 - Only Text',
		'style-7'  => 'Style 7',
		'style-9'  => 'Style 8',
		'style-8'  => 'Style 9 - Custom Background Image',
		'style-10' => 'Style 10',
		'style-11' => 'Style 11',
		'style-12' => 'Style 12',
		'style-13' => 'Style 13',
		'style-14' => 'Style 14',
	)
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading_image_8', array(
	'default'           => '',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sidebar_heading_image_8', array(
	'label'    => 'Custom Background Image for Style 9',
	'section'  => 'penci_section_sidebar_general',
	'settings' => 'penci_sidebar_heading_image_8',
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading8_repeat', array(
	'default'           => 'no-repeat',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_heading8_repeat', array(
	'label'    => 'Background Image Repeat for Style 9',
	'section'  => 'penci_section_sidebar_general',
	'settings' => 'penci_sidebar_heading8_repeat',
	'type'     => 'radio',
	'choices'  => array(
		'no-repeat' => 'No Repeat',
		'repeat'    => 'Repeat'
	)
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading_align', array(
	'default'           => 'pcalign-center',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_heading_align', array(
	'label'    => 'Sidebar Widget Heading Align',
	'section'  => 'penci_section_sidebar_general',
	'settings' => 'penci_sidebar_heading_align',
	'type'     => 'radio',
	'choices'  => array(
		'pcalign-center' => 'Center',
		'pcalign-left'   => 'Left',
		'pcalign-right'  => 'Right'
	)
) ) );

$wp_customize->add_setting( 'penci_sidebar_remove_border_outer', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_remove_border_outer', array(
	'label'    => 'Remove Border Outer on Widget Heading',
	'section'  => 'penci_section_sidebar_general',
	'settings' => 'penci_sidebar_remove_border_outer',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_sidebar_remove_arrow_down', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_remove_arrow_down', array(
	'label'    => 'Remove Arrow Down on Widget Heading',
	'section'  => 'penci_section_sidebar_general',
	'settings' => 'penci_sidebar_remove_arrow_down',
	'type'     => 'checkbox',
) ) );

/* Font Size */
$wp_customize->add_setting( 'penci_sidebar_heading_size', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'sidebar_heading_size', array(
	'description' => __( 'Font Size for Sidebar Widget Heading', 'soledad' ),
	'section' => 'penci_section_sidebar_fsize',
	'settings' => array(
		'desktop' => 'penci_sidebar_heading_size',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

/* Colors */
$wp_customize->add_setting( 'penci_sidebar_heading_bg', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_bg', array(
	'label'    => 'Sidebar Widget Heading Background Color',
	'section'  => 'penci_section_sidebar_colors',
	'settings' => 'penci_sidebar_heading_bg',
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading_outer_bg', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_outer_bg', array(
	'label'    => 'Sidebar Widget Heading Background Outer Color',
	'section'  => 'penci_section_sidebar_colors',
	'settings' => 'penci_sidebar_heading_outer_bg',
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading_border_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_border_color', array(
	'label'    => 'Sidebar Widget Heading Border Color',
	'section'  => 'penci_section_sidebar_colors',
	'settings' => 'penci_sidebar_heading_border_color',
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading_border_inner_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_border_inner_color', array(
	'label'    => 'Sidebar Widget Heading Border Outer Color',
	'section'  => 'penci_section_sidebar_colors',
	'settings' => 'penci_sidebar_heading_border_inner_color',
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading_border_color5', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_border_color5', array(
	'label'    => 'Custom Color for Border Bottom on Widget Heading Style 5, 10, 11, 12',
	'section'  => 'penci_section_sidebar_colors',
	'settings' => 'penci_sidebar_heading_border_color5',
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading_border_color7', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_border_color7', array(
	'label'    => 'Custom Color for Small Border Bottom on Widget Heading Style 7 & Style 8',
	'section'  => 'penci_section_sidebar_colors',
	'settings' => 'penci_sidebar_heading_border_color7',
) ) );

$wp_customize->add_setting( 'sidebar_heading_bordertop_color10', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_bordertop_color10', array(
	'label'    => 'Custom Color for Border Top on Widget Heading Style 10',
	'section'  => 'penci_section_sidebar_colors',
	'settings' => 'sidebar_heading_bordertop_color10',
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading_shapes_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_sidebar_heading_shapes_color', array(
	'label'    => 'Custom Color for Background Shapes Widget Heading Style 11, 12, 13',
	'section'  => 'penci_section_sidebar_colors',
	'settings' => 'penci_sidebar_heading_shapes_color',
) ) );

$wp_customize->add_setting( 'penci_sidebar_heading_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_color', array(
	'label'    => 'Sidebar Widget Heading Text Color',
	'section'  => 'penci_section_sidebar_colors',
	'settings' => 'penci_sidebar_heading_color',
) ) );

$wp_customize->add_setting( 'penci_sidebar_accent_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_accent_color', array(
	'label'    => 'Accent Color',
	'section'  => 'penci_section_sidebar_colors',
	'settings' => 'penci_sidebar_accent_color',
) ) );

$wp_customize->add_setting( 'penci_sidebar_accent_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_accent_hover_color', array(
	'label'    => 'Accent Hover Color',
	'section'  => 'penci_section_sidebar_colors',
	'settings' => 'penci_sidebar_accent_hover_color',
) ) );