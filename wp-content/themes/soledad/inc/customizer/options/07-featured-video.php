<?php
/* Add Sections */
$wp_customize->add_section( 'pencidesign_section_fvideo_general', array(
	'title'    => esc_html__( 'General', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_featured_video_panel'
) );

$wp_customize->add_section( 'pencidesign_section_fvideo_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_featured_video_panel'
) );

/* General */
$wp_customize->add_setting( 'penci_enable_featured_video_bg', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_featured_video_bg', array(
	'label'    => 'Enable Featured Video Background',
	'section'  => 'pencidesign_section_fvideo_general',
	'settings' => 'penci_enable_featured_video_bg',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_video_img_mobile', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_video_img_mobile', array(
	'label'       => 'Background Image Display Replace Video On Tablet & Mobile',
	'section'     => 'pencidesign_section_fvideo_general',
	'settings'    => 'penci_featured_video_img_mobile',
) ) );

$wp_customize->add_setting( 'penci_featured_video_url', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_video_url', array(
	'label'    => 'Video Youtube URL',
	'section'  => 'pencidesign_section_fvideo_general',
	'settings' => 'penci_featured_video_url',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_featured_video_height', array(
	'default' => '600',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'featured_video_height', array(
	'description' => __( 'Featured Video Background Height', 'soledad' ),
	'section' => 'pencidesign_section_fvideo_general',
	'settings' => array(
		'desktop' => 'penci_featured_video_height',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 50,
			'max' => 1500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_featured_video_start', array(
	'default' => '0',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'featured_video_start', array(
	'description' => __( 'Start Video At', 'soledad' ),
	'sub_description' => __( 'Unit is second', 'soledad' ),
	'section' => 'pencidesign_section_fvideo_general',
	'settings' => array(
		'desktop' => 'penci_featured_video_start',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 0,
			'max' => 1800,
			'step' => 1,
			'edit' => true,
			'unit' => 's',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_featured_video_image', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_video_image', array(
	'label'    => 'Add Custom Image on Video Background',
	'section'  => 'pencidesign_section_fvideo_general',
	'settings' => 'penci_featured_video_image',
) ) );

$wp_customize->add_setting( 'penci_featured_video_text_heading', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_video_text_heading', array(
	'label'    => 'Heading Text On Video Background',
	'section'  => 'pencidesign_section_fvideo_general',
	'settings' => 'penci_featured_video_text_heading',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_featured_video_sub_heading', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_video_sub_heading', array(
	'label'    => 'Sub Heading Text On Video Background',
	'section'  => 'pencidesign_section_fvideo_general',
	'settings' => 'penci_featured_video_sub_heading',
	'type'     => 'textarea',
) ) );

/* Colors */
$wp_customize->add_setting( 'penci_featured_video_heading_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_video_heading_color', array(
	'label'    => 'Heading Text Color',
	'section'  => 'pencidesign_section_fvideo_colors',
	'settings' => 'penci_featured_video_heading_color',
) ) );

$wp_customize->add_setting( 'penci_featured_video_sub_heading_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_video_sub_heading_color', array(
	'label'    => 'Sub Heading Text Color',
	'section'  => 'pencidesign_section_fvideo_colors',
	'settings' => 'penci_featured_video_sub_heading_color',
) ) );