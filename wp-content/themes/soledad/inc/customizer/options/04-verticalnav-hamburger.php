<?php
/* Add Sections */
$wp_customize->add_section( 'penci_menu_hbg', array(
	'title'    => esc_html__( 'General', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/vertical-navigation.png">this image</a> to know what is Vertical Navigation and <a target="_blank" href="https://imgresources.s3.amazonaws.com/hamburger.png">this image</a> to know what is Hamburger Menu.<br>Most of the options here applies for both Vertical Navigation & Hamburger Menu. When you enable Vertical Navigation - of course, the Hamburger Menu will does not display.', 'soledad' ),
	'panel'      => 'penci_vernav_hamburger_panel'
) );

$wp_customize->add_section( 'penci_menu_hbg_widgets', array(
	'title'    => esc_html__( 'Widgets', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'When you use Vertical Navigation or Hamburger Menu, you can add widgets display above or below the menu like on <a target="_blank" href="https://imgresources.s3.amazonaws.com/hamburger-widgets.png">this image</a> via Appearance > Widgets > drag & drop widgets on the left side to "Sidebar Hamburger Widgets Above Menu" and "Sidebar Hamburger Widgets Below Menu" - check <a target="_blank" href="https://imgresources.s3.amazonaws.com/hamburger-widgets2.png">this image</a>.', 'soledad' ),
	'panel'      => 'penci_vernav_hamburger_panel'
) );

$wp_customize->add_section( 'penci_menu_hbg_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_vernav_hamburger_panel'
) );

/* General */
$wp_customize->add_setting( 'penci_menu_hbg_show', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_show', array(
	'label'    => esc_html__( 'Enable Menu Hamburger', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'type'     => 'checkbox',
	'settings' => 'penci_menu_hbg_show',
) ) );

$wp_customize->add_setting( 'penci_vertical_nav_show', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_vertical_nav_show', array(
	'label'    => esc_html__( 'Enable Vertical Navigation', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'type'     => 'checkbox',
	'settings' => 'penci_vertical_nav_show',
) ) );

$wp_customize->add_setting( 'penci_vertical_nav_remove_header', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_vertical_nav_remove_header', array(
	'label'    => esc_html__( 'Completely Delete The Header When Enable Vertical Navigation', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'type'     => 'checkbox',
	'settings' => 'penci_vertical_nav_remove_header',
) ) );

$wp_customize->add_setting( 'penci_menu_hbg_mobile', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_mobile', array(
	'label'    => esc_html__( 'Hide Menu Hamburger Icon Display on Horizontal Navigation on Mobile', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'type'     => 'checkbox',
	'settings' => 'penci_menu_hbg_mobile',
) ) );

$wp_customize->add_setting( 'penci_menu_hbg_bgimg', array(
	'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'penci_menu_hbg_bgimg', array(
	'label'    => esc_html__( 'Set A Background Image', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'settings' => 'penci_menu_hbg_bgimg',
) ) );

$wp_customize->add_setting( 'penci_hbg_width', array(
	'default' => '330',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_hbg_width', array(
	'description' => __( 'Custom Width for Vertical Nav & Menu Hamburger', 'soledad' ),
	'sub_description' => __( 'Min is 250px, Max is 500px', 'soledad' ),
	'section' => 'penci_menu_hbg',
	'settings' => array(
		'desktop' => 'penci_hbg_width',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 250,
			'max' => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_hbg_size_icon', array(
	'default' => '18',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_hbg_size_icon', array(
	'description' => __( 'Custom Size for Hamburger Menu Icon', 'soledad' ),
	'sub_description' => __( 'Min is 14px, Max is 30px', 'soledad' ),
	'section' => 'penci_menu_hbg',
	'settings' => array(
		'desktop' => 'penci_hbg_size_icon',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 14,
			'max' => 30,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_menu_hbg_pos', array(
	'default'           => 'left',
	'sanitize_callback' => 'penci_sanitize_choices_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_pos', array(
	'label'    => esc_html__( 'Position in Page', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'settings' => 'penci_menu_hbg_pos',
	'type'     => 'select',
	'choices'  => array(
		'left'  => esc_html__( 'Left', 'soledad' ),
		'right' => esc_html__( 'Right', 'soledad' )
	)
) ) );

$wp_customize->add_setting( 'penci_menu_hbg_hide_logo', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_hide_logo', array(
		'label'    => esc_html__( 'Hide Logo', 'soledad' ),
		'section'  => 'penci_menu_hbg',
		'type'     => 'checkbox',
		'settings' => 'penci_menu_hbg_hide_logo',
) ) );

$wp_customize->add_setting( 'penci_menu_hbg_logo', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'penci_menu_hbg_logo', array(
	'label'    => esc_html__( 'Custom Logo Image', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'settings' => 'penci_menu_hbg_logo',
) ) );

$wp_customize->add_setting( 'penci_custom_logo_hamburger', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_logo_hamburger', array(
	'label'    => 'Custom Link for Logo Image',
	'section'  => 'penci_menu_hbg',
	'settings' => 'penci_custom_logo_hamburger',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_hbg_logo_max_width', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'hbg_logo_max_width', array(
	'description' => __( 'Set A Max Width for Logo Image', 'soledad' ),
	'section' => 'penci_menu_hbg',
	'settings' => array(
		'desktop' => 'penci_hbg_logo_max_width',
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

$wp_customize->add_setting( 'penci_menu_hbg_sitetitle', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_sitetitle', array(
	'label'    => esc_html__( 'Add Site Title', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'settings' => 'penci_menu_hbg_sitetitle',
) ) );

$wp_customize->add_setting( 'penci_hbg_sitetitle_size', array(
	'default' => '18',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_hbg_sitetitle_size', array(
	'description' => __( 'Font Size for Site Title', 'soledad' ),
	'section' => 'penci_menu_hbg',
	'settings' => array(
		'desktop' => 'penci_hbg_sitetitle_size',
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

$wp_customize->add_setting( 'penci_menu_hbg_desc', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_desc', array(
	'label'    => esc_html__( 'Add Site Description', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'settings' => 'penci_menu_hbg_desc',
	'type'     => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_hbg_sitedes_size', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_hbg_sitedes_size', array(
	'description' => __( 'Font Size for Site Description', 'soledad' ),
	'section' => 'penci_menu_hbg',
	'settings' => array(
		'desktop' => 'penci_hbg_sitedes_size',
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

$wp_customize->add_setting( 'penci_menu_hbg_show_search', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_show_search', array(
	'label'    => esc_html__( 'Add Search Form Below Site Description', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'type'     => 'checkbox',
	'settings' => 'penci_menu_hbg_show_search',
) ) );

$wp_customize->add_setting( 'penci_menu_hbg_primary', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new Penci_Customize_List_Menus_Control( $wp_customize, 'menu_hbg_primary', array(
	'label'    => 'Select Custom Menu to Display on Primary Menu',
	'section'  => 'penci_menu_hbg',
	'settings' => 'penci_menu_hbg_primary',
	'type'     => 'list_menus'
) ) );

$wp_customize->add_setting( 'penci_menu_hbg_hide_menu', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_hide_menu', array(
	'label'    => esc_html__( 'Hide Primary Menu', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'type'     => 'checkbox',
	'settings' => 'penci_menu_hbg_hide_menu',
) ) );

$wp_customize->add_setting( 'penci_menu_hbg_lowcase', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_lowcase', array(
	'label'    => esc_html__( 'Disable Uppercase on Primary Menu Items', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'type'     => 'checkbox',
	'settings' => 'penci_menu_hbg_lowcase',
) ) );

$wp_customize->add_setting( 'penci_font_size_menu_hbg', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'font_size_menu_hbg', array(
	'description' => __( 'Font Size for Primary Menu Items', 'soledad' ),
	'section' => 'penci_menu_hbg',
	'settings' => array(
		'desktop' => 'penci_font_size_menu_hbg',
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

$wp_customize->add_setting( 'penci_font_size_submenu_hbg', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'font_size_submenu_hbg', array(
	'description' => __( 'Font Size for Sub-menu Items', 'soledad' ),
	'section' => 'penci_menu_hbg',
	'settings' => array(
		'desktop' => 'penci_font_size_submenu_hbg',
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

$wp_customize->add_setting( 'penci_menu_hbg_hideftext', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_hideftext', array(
	'label'    => esc_html__( 'Hide Footer Text', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'type'     => 'checkbox',
	'settings' => 'penci_menu_hbg_hideftext',
) ) );

$wp_customize->add_setting( 'penci_menu_hbg_hidesocial', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_checkbox_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_hidesocial', array(
	'label'    => esc_html__( 'Hide Social Icons', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'type'     => 'checkbox',
	'settings' => 'penci_menu_hbg_hidesocial',
) ) );

$wp_customize->add_setting( 'penci_menuhbg_social_style', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field',
) );
$wp_customize->add_control( 'penci_menuhbg_social_style', array(
	'label'       => esc_html__( 'Select Style for Social Icons', 'soledad' ),
	'section'     => 'penci_menu_hbg',
	'settings'    => 'penci_menuhbg_social_style',
	'description' => 'The options for custom colors, background color, border for social icons will does not apply for Brand Color styles',
	'type'        => 'select',
	'choices'     => array(
		''                                                => esc_html__( 'Default', 'soledad' ),
		'style-6 penci-social-textcolored'                => esc_html__( 'Icons with Brand Color', 'soledad' ),
		'style-2'                                         => esc_html__( 'Round with Border', 'soledad' ),
		'style-2 hgb-social-style-3'                      => esc_html__( 'Square with Border', 'soledad' ),
		'style-4 penci-social-colored'                    => esc_html__( 'Round with Brand Color', 'soledad' ),
		'style-4 hgb-social-style-5 penci-social-colored' => esc_html__( 'Square with Brand Color', 'soledad' ),
	)
) );

$wp_customize->add_setting( 'penci_menuhbg_icon_size', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_menuhbg_icon_size', array(
	'description' => __( 'Font Size for Social Media Icons', 'soledad' ),
	'section' => 'penci_menu_hbg',
	'settings' => array(
		'desktop' => 'penci_menuhbg_icon_size',
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

$wp_customize->add_setting( 'penci_menu_hbg_footer_text', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_menu_hbg_footer_text', array(
	'label'    => esc_html__( 'Custom Footer Text', 'soledad' ),
	'section'  => 'penci_menu_hbg',
	'settings' => 'penci_menu_hbg_footer_text',
	'type'     => 'textarea',
) ) );

/* Widgets */
$wp_customize->add_setting( 'penci_mhbg_widget_margin', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_mhbgwidget_margin', array(
	'description' => __( 'Custom Space Between Widgets', 'soledad' ),
	'section' => 'penci_menu_hbg_widgets',
	'settings' => array(
		'desktop' => 'penci_mhbg_widget_margin',
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

$wp_customize->add_setting( 'penci_mhbgwidget_heading_lowcase', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_mhbgwidget_heading_lowcase', array(
	'label'    => 'Turn Off Uppercase Widget Heading',
	'section'  => 'penci_menu_hbg_widgets',
	'settings' => 'penci_mhbgwidget_heading_lowcase',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_mhbgwidget_heading_size', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_mhbgwidget_heading_size', array(
	'description' => __( 'Custom Widget Heading Text Size', 'soledad' ),
	'section' => 'penci_menu_hbg_widgets',
	'settings' => array(
		'desktop' => 'penci_mhbgwidget_heading_size',
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

$wp_customize->add_setting( 'penci_mhbgwidget_heading_style', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_mhbgwidget_heading_style', array(
	'label'    => 'Sidebar Widget Heading Style',
	'section'  => 'penci_menu_hbg_widgets',
	'settings' => 'penci_mhbgwidget_heading_style',
	'type'     => 'radio',
	'choices'  => array(
		''         => 'Default',
		'style-1'  => 'Style 1',
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

$wp_customize->add_setting( 'penci_mhbgwidget_heading_image_9', array(
	'default'           => '',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'penci_mhbgwidget_heading_image_9', array(
	'label'    => 'Custom Background Image for Style 9',
	'section'  => 'penci_menu_hbg_widgets',
	'settings' => 'penci_mhbgwidget_heading_image_9',
) ) );

$wp_customize->add_setting( 'penci_mhbgwidget_heading9_repeat', array(
	'default'           => 'no-repeat',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_mhbgwidget_heading9_repeat', array(
	'label'    => 'Background Image Repeat for Style 9',
	'section'  => 'penci_menu_hbg_widgets',
	'settings' => 'penci_mhbgwidget_heading9_repeat',
	'type'     => 'radio',
	'choices'  => array(
		'no-repeat' => 'No Repeat',
		'repeat'    => 'Repeat'
	)
) ) );

$wp_customize->add_setting( 'penci_mhbgwidget_heading_align', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_mhbgwidget_heading_align', array(
	'label'    => 'Sidebar Widget Heading Align',
	'section'  => 'penci_menu_hbg_widgets',
	'settings' => 'penci_mhbgwidget_heading_align',
	'type'     => 'radio',
	'choices'  => array(
		''               => 'Default',
		'pcalign-center' => 'Center',
		'pcalign-left'   => 'Left',
		'pcalign-right'  => 'Right'
	)
) ) );

$wp_customize->add_setting( 'penci_mhbgwidget_remove_border_outer', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_mhbgwidget_remove_border_outer', array(
	'label'    => 'Remove Border Outer on Widget Heading',
	'section'  => 'penci_menu_hbg_widgets',
	'settings' => 'penci_mhbgwidget_remove_border_outer',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_mhbgwidget_remove_arrow_down', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_mhbgwidget_remove_arrow_down', array(
	'label'    => 'Remove Arrow Down on Widget Heading',
	'section'  => 'penci_menu_hbg_widgets',
	'settings' => 'penci_mhbgwidget_remove_arrow_down',
	'type'     => 'checkbox',
) ) );

/* Colors */
$wp_customize->add_setting( 'penci_hmhbg_general_color', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_hmhbg_general_color', array(
	'label'    => esc_html__( 'General Colors', 'soledad' ),
	'section'  => 'penci_menu_hbg_colors',
	'settings' => 'penci_hmhbg_general_color',
	'type'     => 'heading',
) ) );

$options_color_menu_hbg1 = array(
	'penci_mhbg_icon_toggle_color'   => esc_html__( 'Menu Hamburger Icon Color on Horizontal Navigation', 'soledad' ),
	'penci_mhbg_icon_toggle_hcolor'  => esc_html__( 'Menu Hamburger Icon Hover Color on Horizontal Navigation', 'soledad' ),
	'penci_mhbg_bgcolor'             => esc_html__( 'Background Color', 'soledad' ),
	'penci_mhbg_textcolor'           => esc_html__( 'General Text Color', 'soledad' ),
	'penci_mhbg_closecolor'          => esc_html__( 'Menu Hamburger Close Icon Color', 'soledad' ),
	'penci_mhbg_closehover'          => esc_html__( 'Menu Hamburger Close Icon Hover Color', 'soledad' ),
	'penci_mhbg_bordercolor'         => esc_html__( 'General Border Color', 'soledad' ),
	'penci_mhbgtitle_color'          => esc_html__( 'Site Title Color', 'soledad' ),
	'penci_mhbgdesc_hcolor'          => esc_html__( 'Site Description Color', 'soledad' ),
	'penci_mhbg_search_border'       => esc_html__( 'Custom Border Colors for Search Box', 'soledad' ),
	'penci_mhbg_search_border_hover' => esc_html__( 'Custom Border Colors for Search Box on Focus', 'soledad' ),
	'penci_mhbg_search_color'        => esc_html__( 'Custom Text Colors for Search Box', 'soledad' ),
	'penci_mhbg_search_icon'         => esc_html__( 'Custom Colors for Search Icon', 'soledad' ),
	'penci_mhbgaccent_color'         => esc_html__( 'Accent Color', 'soledad' ),
	'penci_mhbgaccent_hover_color'   => esc_html__( 'Accent Hover Color', 'soledad' ),
	'penci_mhbgfooter_color'         => esc_html__( 'Footer Text Color', 'soledad' ),
	'penci_mhbgicon_color'           => esc_html__( 'Social Icons Color', 'soledad' ),
	'penci_mhbgicon_hover_color'     => esc_html__( 'Social Icons Hover Color', 'soledad' ),
	'penci_mhbgicon_border'          => esc_html__( 'Social Icons Border Color', 'soledad' ),
	'penci_mhbgicon_border_hover'    => esc_html__( 'Social Icons Border Hover Color', 'soledad' ),
	'penci_mhbgicon_bg'              => esc_html__( 'Social Icons Background Color', 'soledad' ),
	'penci_mhbgicon_bg_hover'        => esc_html__( 'Social Icons Background Hover Color', 'soledad' ),
);

foreach ( $options_color_menu_hbg1 as $key => $label ) {
	$wp_customize->add_setting( $key, array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $key, array(
		'label'    => $label,
		'section'  => 'penci_menu_hbg_colors',
		'settings' => $key,
	) ) );
}

$wp_customize->add_setting( 'penci_hmhbg_widgets_color', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_hmhbg_widgets_color', array(
	'label'    => esc_html__( 'Widgets Colors', 'soledad' ),
	'section'  => 'penci_menu_hbg_colors',
	'settings' => 'penci_hmhbg_widgets_color',
	'type'     => 'heading',
) ) );

$options_color_menu_hbg2 = array(
	'penci_mhwidget_heading_bg'           => esc_html__( 'Widget Heading Background Color', 'soledad' ),
	'penci_mhwidget_heading_outer_bg'     => esc_html__( 'Widget Heading Background Outer Color', 'soledad' ),
	'penci_mhwidget_heading_bcolor'       => esc_html__( 'Sidebar Widget Heading Border Color', 'soledad' ),
	'penci_mhwidget_heading_binner_color' => esc_html__( 'Widget Heading Border Outer Color', 'soledad' ),
	'penci_mhwidget_heading_bcolor5'      => esc_html__( 'Custom Color for Border Bottom on Widget Heading Style 5', 'soledad' ),
	'penci_mhwidget_heading_bcolor7'      => esc_html__( 'Custom Color for Small Border Bottom on Widget Heading Style 7 & Style 8', 'soledad' ),
	'penci_mhwidget_heading_color'        => esc_html__( 'Widget Heading Text Color', 'soledad' ),
);

foreach ( $options_color_menu_hbg2 as $key => $label ) {
	$wp_customize->add_setting( $key, array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $key, array(
		'label'    => $label,
		'section'  => 'penci_menu_hbg_colors',
		'settings' => $key,
	) ) );
}
