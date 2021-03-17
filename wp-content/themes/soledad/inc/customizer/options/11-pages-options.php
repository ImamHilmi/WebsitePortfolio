<?php
/* Add Sections */
$wp_customize->add_section( 'penci_section_spage_general', array(
	'title'    => esc_html__( 'General', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_single_page_panel'
) );

$wp_customize->add_section( 'penci_section_spage_header', array(
	'title'    => esc_html__( 'Page Header', 'soledad' ),
	'priority' => 1,
	'description' => 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/page-header.png">this image</a> to know what is "Page Header"',
	'panel'      => 'penci_single_page_panel'
) );

$wp_customize->add_section( 'penci_section_spage_404', array(
	'title'    => esc_html__( '404 Page', 'soledad' ),
	'priority' => 2,
	'panel'      => 'penci_single_page_panel'
) );

$wp_customize->add_section( 'penci_section_spage_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 2,
	'panel'      => 'penci_single_page_panel'
) );

/* General */
$wp_customize->add_setting( 'penci_page_default_template_layout', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_default_template_layout', array(
	'label'    => 'Page Default Template Layout',
	'section'  => 'penci_section_spage_general',
	'settings' => 'penci_page_default_template_layout',
	'description' => 'Check <a target="_blank" href="http://soledad.pencidesign.com/soledad-document/images/template.png">this image</a> to know how to change Template of a page.',
	'type'     => 'select',
	'choices'  => array(
		''              => 'No Sidebar with Container',
		'small-width'   => 'No Sidebar with Smaller Container Width',
		'right-sidebar' => 'Page with Right Sidebar',
		'left-sidebar'  => 'Page with Left Sidebar',
		'two-sidebar'   => 'Page with Two Sidebars'
	)
) ) );

$wp_customize->add_setting( 'penci_page_custom_width', array(
	'default' => '900',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'page_custom_width', array(
	'description' => __( 'Custom Width for "Page No Sidebar with Smaller Container Width"', 'soledad' ),
	'section' => 'penci_section_spage_general',
	'settings' => array(
		'desktop' => 'penci_page_custom_width',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 100,
			'max' => 1400,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_page_hide_featured_image', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_hide_featured_image', array(
	'label'    => 'Hide Featured Image Auto Appears',
	'section'  => 'penci_section_spage_general',
	'settings' => 'penci_page_hide_featured_image',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_page_hide_ptitle', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_hide_ptitle', array(
	'label'    => 'Hide Page Titles',
	'section'  => 'penci_section_spage_general',
	'settings' => 'penci_page_hide_ptitle',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_page_title_uppercase', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_title_uppercase', array(
	'label'    => 'Disable Uppercase on Page Titles',
	'section'  => 'penci_section_spage_general',
	'settings' => 'penci_page_title_uppercase',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_page_title_fsize', array(
	'default' => '24',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_page_title_fsize_mobile', array(
	'default' => '18',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_page_title_fsize', array(
	'description' => __( 'Font Size for Page Titles', 'soledad' ),
	'section' => 'penci_section_spage_general',
	'settings' => array(
		'desktop' => 'penci_page_title_fsize',
		'mobile' => 'penci_page_title_fsize_mobile',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_page_share', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_share', array(
	'label'    => 'Hide Share Buttons',
	'section'  => 'penci_section_spage_general',
	'settings' => 'penci_page_share',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_page_sharetext_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_page_sharetext_fsize', array(
	'description' => __( 'Font Size for "Share" Text', 'soledad' ),
	'section' => 'penci_section_spage_general',
	'settings' => array(
		'desktop' => 'penci_page_sharetext_fsize',
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

$wp_customize->add_setting( 'penci_page_shareicon_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_page_shareicon_fsize', array(
	'description' => __( 'Font Size for Social Share Icons', 'soledad' ),
	'section' => 'penci_section_spage_general',
	'settings' => array(
		'desktop' => 'penci_page_shareicon_fsize',
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

$wp_customize->add_setting( 'penci_page_comments', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_comments', array(
	'label'    => 'Hide Comments',
	'section'  => 'penci_section_spage_general',
	'settings' => 'penci_page_comments',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_header_enable_transparent', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_header_enable_transparent', array(
	'label'    => 'Enable Header Transparent',
	'section'  => 'penci_section_spage_general',
	'settings' => 'penci_header_enable_transparent',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_sidebar_name_pages', array(
	'default'           => 'main-sidebar',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_name_pages', array(
	'label'       => 'Sidebar for Pages',
	'section'     => 'penci_section_spage_general',
	'settings'    => 'penci_sidebar_name_pages',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar.',
	'type'        => 'select',
	'choices'     => get_list_custom_sidebar_option()
) ) );

$wp_customize->add_setting( 'penci_sidebar_left_name_pages', array(
	'default'           => 'main-sidebar-left',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_left_name_pages', array(
	'label'       => 'Sidebar Left for Pages',
	'section'     => 'penci_section_spage_general',
	'settings'    => 'penci_sidebar_left_name_pages',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar Left. This option just apply when you use 2 sidebars for Pages',
	'type'        => 'select',
	'choices'     => get_list_custom_sidebar_option()
) ) );

/* Page Header */
$wp_customize->add_setting( 'penci_pheader_show', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_pheader_show', array(
		'label'    => esc_html__( 'Enable Page Header for Pages', 'soledad' ),
		'section'  => 'penci_section_spage_header',
		'type'     => 'checkbox',
		'settings' => 'penci_pheader_show',
	)
) );

$wp_customize->add_setting( 'penci_pheader_bgimg', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'penci_pheader_bgimg', array(
	'label'    => esc_html__( 'Background Image for Page Header', 'soledad' ),
	'section'  => 'penci_section_spage_header',
	'settings' => 'penci_pheader_bgimg',
) ) );

$wp_customize->add_setting( 'penci_pheader_hideline', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_pheader_hideline', array(
		'label'    => esc_html__( 'Hide Line Below Title', 'soledad' ),
		'section'  => 'penci_section_spage_header',
		'type'     => 'checkbox',
		'settings' => 'penci_pheader_hideline',
	)
) );

$wp_customize->add_setting( 'penci_pheader_hidebead', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_pheader_hidebead', array(
		'label'    => esc_html__( 'Hide Breadcrumbs', 'soledad' ),
		'section'  => 'penci_section_spage_header',
		'type'     => 'checkbox',
		'settings' => 'penci_pheader_hidebead',
	)
) );

$wp_customize->add_setting( 'penci_pheader_align', array(
	'default'           => 'center',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'penci_pheader_align', array(
	'label'    => esc_html__( 'Text Align', 'soledad' ),
	'section'  => 'penci_section_spage_header',
	'settings' => 'penci_pheader_align',
	'type'     => 'select',
	'choices'  => array(
		'left'   => esc_html__( 'Left', 'soledad' ),
		'center' => esc_html__( 'Center', 'soledad' ),
		'right'  => esc_html__( 'Right', 'soledad' ),
	)
) );

$wp_customize->add_setting( 'penci_pheader_width', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_pheader_width', array(
	'description' => __( 'Custom Width for "Page No Sidebar with Smaller Container Width"', 'soledad' ),
	'description' => __( 'By default, container width for page header will follow the container width for header', 'soledad' ),
	'section' => 'penci_section_spage_header',
	'settings' => array(
		'desktop' => 'penci_pheader_width',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 100,
			'max' => 1400,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_pheader_ptop', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_pheader_ptop', array(
	'description' => __( 'Padding top', 'soledad' ),
	'section' => 'penci_section_spage_header',
	'settings' => array(
		'desktop' => 'penci_pheader_ptop',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_pheader_pbottom', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_pheader_pbottom', array(
	'description' => __( 'Padding Bottom', 'soledad' ),
	'section' => 'penci_section_spage_header',
	'settings' => array(
		'desktop' => 'penci_pheader_pbottom',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );


$wp_customize->add_setting( 'penci_pheader_turn_offup', array(
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_pheader_turn_offup', array(
		'label'    => esc_html__( 'Turn Off Uppercase for Title', 'soledad' ),
		'section'  => 'penci_section_spage_header',
		'type'     => 'checkbox',
		'settings' => 'penci_pheader_turn_offup',
	)
) );

$wp_customize->add_setting( 'penci_pheader_title_pbottom', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_pheader_title_pbottom', array(
	'description' => __( 'Custom Padding Bottom for Page Title', 'soledad' ),
	'section' => 'penci_section_spage_header',
	'settings' => array(
		'desktop' => 'penci_pheader_title_pbottom',
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

$wp_customize->add_setting( 'penci_pheader_title_mbottom', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_pheader_title_mbottom', array(
	'description' => __( 'Custom Margin Bottom for Page Title', 'soledad' ),
	'section' => 'penci_section_spage_header',
	'settings' => array(
		'desktop' => 'penci_pheader_title_mbottom',
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

$wp_customize->add_setting( 'penci_pheader_title_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_pheader_title_fsize', array(
	'description' => __( 'Font Size for Page Title', 'soledad' ),
	'section' => 'penci_section_spage_header',
	'settings' => array(
		'desktop' => 'penci_pheader_title_fsize',
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

$wp_customize->add_setting( 'penci_pheader_fwtitle', array(
	'default'           => '600',
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'penci_pheader_fwtitle', array(
	'label'    => esc_html__( 'Font Weight For Title', 'soledad' ),
	'section'  => 'penci_section_spage_header',
	'settings' => 'penci_pheader_fwtitle',
	'type'     => 'select',
	'choices'  => array(
		'normal'  => 'Normal',
		'bold'    => 'Bold',
		'bolder'  => 'Bolder',
		'lighter' => 'Lighter',
		'100'     => '100',
		'200'     => '200',
		'300'     => '300',
		'400'     => '400',
		'500'     => '500',
		'600'     => '600',
		'700'     => '700',
		'800'     => '800',
		'900'     => '900'
	)
) );

$wp_customize->add_setting( 'penci_pheader_bread_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_pheader_bread_fsize', array(
	'description' => __( 'Font Size for Breadcrumb on Page Header', 'soledad' ),
	'section' => 'penci_section_spage_header',
	'settings' => array(
		'desktop' => 'penci_pheader_bread_fsize',
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


/* 404 Page */
$wp_customize->add_setting( 'penci_not_found_image', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'not_found_image', array(
	'label'    => '404 Custom Main Image',
	'section'  => 'penci_section_spage_404',
	'settings' => 'penci_not_found_image',
) ) );

$wp_customize->add_setting( 'penci_not_found_removeline', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_not_found_removeline', array(
	'label'    => 'Remove Line Below Main Image',
	'section'  => 'penci_section_spage_404',
	'settings' => 'penci_not_found_removeline',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_not_found_sub_heading', array(
	'default'           => "OOPS! Page you're looking for doesn't exist. Please use search for help",
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'not_found_sub_heading', array(
	'label'    => '404 Custom Message Text',
	'section'  => 'penci_section_spage_404',
	'settings' => 'penci_not_found_sub_heading',
	'type'     => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_not_found_hide_search', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'not_found_hide_search', array(
	'label'    => 'Hide Search Form',
	'section'  => 'penci_section_spage_404',
	'settings' => 'penci_not_found_hide_search',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_not_found_hide_backhome', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'not_found_hide_backhome', array(
	'label'    => 'Hide "BACK TO HOME PAGE"',
	'section'  => 'penci_section_spage_404',
	'settings' => 'penci_not_found_hide_backhome',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_notfound_message_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_notfound_message_fsize', array(
	'description' => __( 'Font Size for Message Text', 'soledad' ),
	'section' => 'penci_section_spage_404',
	'settings' => array(
		'desktop' => 'penci_notfound_message_fsize',
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

$wp_customize->add_setting( 'penci_notfound_input_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_notfound_input_fsize', array(
	'description' => __( 'Font Size for Text on Search Form', 'soledad' ),
	'section' => 'penci_section_spage_404',
	'settings' => array(
		'desktop' => 'penci_notfound_input_fsize',
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

$wp_customize->add_setting( 'penci_notfound_backhome_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_notfound_backhome_fsize', array(
	'description' => __( 'Font Size for "Back To Homepage"', 'soledad' ),
	'section' => 'penci_section_spage_404',
	'settings' => array(
		'desktop' => 'penci_notfound_backhome_fsize',
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
$wp_customize->add_setting( 'penci_pagetitle_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_pagetitle_color', array(
	'label'    => 'Page Title Color',
	'section'  => 'penci_section_spage_colors',
	'settings' => 'penci_pagetitle_color',
) ) );

$wp_customize->add_setting( 'penci_psharetext_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_psharetext_color', array(
	'label'    => '"Share" Text Color',
	'section'  => 'penci_section_spage_colors',
	'settings' => 'penci_psharetext_color',
) ) );

$wp_customize->add_setting( 'penci_pageshareicon_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_pageshareicon_color', array(
	'label'    => 'Share Icons Color',
	'section'  => 'penci_section_spage_colors',
	'settings' => 'penci_pageshareicon_color',
) ) );

$wp_customize->add_setting( 'penci_pageshareicon_hcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_pageshareicon_hcolor', array(
	'label'    => 'Share Icons Hover Color',
	'section'  => 'penci_section_spage_colors',
	'settings' => 'penci_pageshareicon_hcolor',
) ) );

$wp_customize->add_setting( 'penci_pheader_colors_heading', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_pheader_colors_heading', array(
	'label'    => esc_html__( 'Page Header', 'soledad' ),
	'description' => 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/page-header.png">this image</a> to know what is "Page Header"',
	'section'  => 'penci_section_spage_colors',
	'settings' => 'penci_pheader_colors_heading',
	'type'     => 'heading',
) ) );

$pheader_colors = array(
	'penci_pheader_bgcolor'      => esc_html__( 'Background Color', 'soledad' ),
	'penci_pheader_title_color'  => esc_html__( 'Title Color', 'soledad' ),
	'penci_pheader_line_color'   => esc_html__( 'Line Color', 'soledad' ),
	'penci_pheader_bread_color'  => esc_html__( 'Breadcrumbs Text Color', 'soledad' ),
	'penci_pheader_bread_hcolor' => esc_html__( 'Breadcrumbs Hover Text Color', 'soledad' ),
);

foreach ( $pheader_colors as $key => $label ) {
	$wp_customize->add_setting( $key, array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $key, array(
		'label'    => $label,
		'section'  => 'penci_section_spage_colors',
		'settings' => $key,
	) ) );
}

$wp_customize->add_setting( 'penci_pheader_404_heading', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_pheader_404_heading', array(
	'label'    => esc_html__( '404 Page', 'soledad' ),
	'section'  => 'penci_section_spage_colors',
	'settings' => 'penci_pheader_404_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_404_line_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_404_line_color', array(
	'label'    => 'Color for Line Above the Message Text',
	'section'  => 'penci_section_spage_colors',
	'settings' => 'penci_404_line_color',
) ) );

$wp_customize->add_setting( 'penci_404_message_ctext', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_404_message_ctext', array(
	'label'    => 'Message Text Color',
	'section'  => 'penci_section_spage_colors',
	'settings' => 'penci_404_message_ctext',
) ) );

$wp_customize->add_setting( 'penci_404_input_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_404_input_color', array(
	'label'    => 'Search Form Text Color',
	'section'  => 'penci_section_spage_colors',
	'settings' => 'penci_404_input_color',
) ) );

$wp_customize->add_setting( 'penci_404_formborder_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_404_formborder_color', array(
	'label'    => 'Search Form Borders Color',
	'section'  => 'penci_section_spage_colors',
	'settings' => 'penci_404_formborder_color',
) ) );

$wp_customize->add_setting( 'penci_404_backhome_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_404_backhome_color', array(
	'label'    => '"Back To Homepage" Color',
	'section'  => 'penci_section_spage_colors',
	'settings' => 'penci_404_backhome_color',
) ) );
