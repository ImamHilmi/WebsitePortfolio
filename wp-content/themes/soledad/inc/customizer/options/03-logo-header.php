<?php
/* Add Sections */
$wp_customize->add_section( 'pencidesign_logo_header_logo', array(
	'title'    => esc_html__( 'Logo', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_logoheader_panel'
) );

$wp_customize->add_section( 'pencidesign_logo_header_general', array(
	'title'    => esc_html__( 'General', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_logoheader_panel'
) );

$wp_customize->add_section( 'pencidesign_logo_header_slogan', array(
	'title'    => esc_html__( 'Slogan Text', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/slogan-text.png">this image</a> to know what is Slogan text. Note that slogan text does not supports on some header styles', 'soledad' ),
	'panel'      => 'penci_logoheader_panel'
) );

$wp_customize->add_section( 'pencidesign_logo_header_primary_menu', array(
	'title'    => esc_html__( 'Main Bar & Primary Menu', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/mainbar-primary.png">this image</a> to know what is "Main Bar" and "Primary Menu"', 'soledad' ),
	'panel'      => 'penci_logoheader_panel'
) );

$wp_customize->add_section( 'pencidesign_logo_header_category_megamenu', array(
	'title'    => esc_html__( 'Category Mega Menu', 'soledad' ),
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/category-mega-menu.png">this image</a> to know what is Category Mega Menu. To config a category mega menu, please check <a target="_blank" href="http://soledad.pencidesign.com/soledad-document/#menu">this guide</a>', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_logoheader_panel'
) );

$wp_customize->add_section( 'penci_section_header_signupform', array(
	'title'    => esc_html__( 'Header SignUp Form', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/header-signup-form.png">this image</a> to know where is "Header Sign-Up Form".<br>To config Header SignUp Form, please use the HTML markup like we said on the documentation <a target="_blank" href="http://soledad.pencidesign.com/soledad-document/#setup_mailchimp">here</a>, after that go to <strong>Appearance > Widgets > drag & drop widget "Mailchimp Sign-Up Form" to "Header Sign-Up Form"</strong> - check <a target="_blank" href="https://imgresources.s3.amazonaws.com/header-signup-form-widget.png">this image</a>.<br>If you use Elementor or WPBakery Page Builder to config your page, you can use element "Penci Mailchimp" to get it display.', 'soledad' ),
	'panel'      => 'penci_logoheader_panel'
) );

$wp_customize->add_section( 'pencidesign_logo_header_verticalnav', array(
	'title'    => esc_html__( 'Vertical Mobile Navigation', 'soledad' ),
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/vertical-mobile-navigation.png">this image</a> to know what is Vertical Mobile Navigation.', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_logoheader_panel'
) );

$wp_customize->add_section( 'pencidesign_logo_header_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_logoheader_panel'
) );

$wp_customize->add_section( 'pencidesign_logo_header_colors_trans', array(
	'title'    => esc_html__( 'Colors for Transparent Header', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_logoheader_panel'
) );


/* Logo */
$wp_customize->add_setting( 'penci_logo', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_logo', array(
	'label'    => 'Upload Logo',
	'section'  => 'pencidesign_logo_header_logo',
	'settings' => 'penci_logo',
) ) );

$wp_customize->add_setting( 'penci_logo_max_width', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'logo_max_width', array(
	'description' => __( 'Set A Max Width for Logo', 'soledad' ),
	'section' => 'pencidesign_logo_header_logo',
	'settings' => array(
		'desktop' => 'penci_logo_max_width',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 1400,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_upload_transparent_logo', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'penci_upload_transparent_logo', array(
	'label'       => 'Upload Logo for Transparent Header style 6, 9, 10 & 11',
	'section'     => 'pencidesign_logo_header_logo',
	'settings'    => 'penci_upload_transparent_logo',
	'description' => 'Important Note: This option apply when you use transparent header only',
) ) );

$wp_customize->add_setting( 'penci_custom_url_logo', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_url_logo', array(
	'label'       => 'Custom Link for Logo Image',
	'section'     => 'pencidesign_logo_header_logo',
	'settings'    => 'penci_custom_url_logo',
	'description' => 'By default, logo image will link to homepage url. If you want to link the logo for another URL - fill here. Include http:// or https:// on the link',
	'type'        => 'text',
) ) );

$wp_customize->add_setting( 'penci_header_padding', array(
	'default' => '40',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'header_padding', array(
	'description' => __( 'Logo Padding Top & Bottom', 'soledad' ),
	'sub_description' => __( 'This option does not apply for header layout 6, 9, 10, 11', 'soledad' ),
	'section' => 'pencidesign_logo_header_logo',
	'settings' => array(
		'desktop' => 'penci_header_padding',
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

$wp_customize->add_setting( 'penci_overflow_logo', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_overflow_logo', array(
	'label'    => 'Overflow Logo for Header Layout 10 & 11',
	'section'  => 'pencidesign_logo_header_logo',
	'settings' => 'penci_overflow_logo',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_logo_max_width_overflow', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_logo_max_width_overflow', array(
	'description' => __( 'Max Width for Sticky Logo on Header 10 & 11', 'soledad' ),
	'sub_description' => __( 'This option just apply when you use overflow logo for header layout 10 & 11', 'soledad' ),
	'section' => 'pencidesign_logo_header_logo',
	'settings' => array(
		'desktop' => 'penci_logo_max_width_overflow',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 1000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

/* General Header Options */
$wp_customize->add_setting( 'penci_header_layout', array(
	'default'           => 'header-1',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_layout', array(
	'label'    => 'Header Layout',
	'section'  => 'pencidesign_logo_header_general',
	'settings' => 'penci_header_layout',
	'type'     => 'radio',
	'choices'  => array(
		'header-1'  => 'Header 1',
		'header-2'  => 'Header 2',
		'header-3'  => 'Header 3',
		'header-4'  => 'Header 4 ( Centered )',
		'header-5'  => 'Header 5 ( Centered )',
		'header-6'  => 'Header 6',
		'header-7'  => 'Header 7',
		'header-8'  => 'Header 8',
		'header-9'  => 'Header 9',
		'header-10' => 'Header 10',
		'header-11' => 'Header 11'
	)
) ) );

$wp_customize->add_setting( 'penci_header_ctwidth', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_header_ctwidth', array(
	'label'    => 'Custom Header Container Width',
	'section'  => 'pencidesign_logo_header_general',
	'settings' => 'penci_header_ctwidth',
	'type'     => 'radio',
	'choices'  => array(
		''          => esc_html__( 'Width: 1170px', 'soledad' ),
		'1400'      => esc_html__( 'Width: 1400px', 'soledad' ),
		'fullwidth' => esc_html__( 'FullWidth', 'soledad' ),
	)
) ) );

$wp_customize->add_setting( 'penci_header_3_banner', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_3_banner', array(
	'label'       => 'Banner Header Right For Header 3',
	'section'     => 'pencidesign_logo_header_general',
	'settings'    => 'penci_header_3_banner',
	'description' => 'You should choose banner with 728px width and 90px - 100px height for the best result',
) ) );

$wp_customize->add_setting( 'penci_header_3_banner_url', array(
	'default'           => '#',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_3_banner_url', array(
	'label'       => 'Link To Go When Click Banner Header Right on Header 3',
	'section'     => 'pencidesign_logo_header_general',
	'settings'    => 'penci_header_3_banner_url',
	'description' => '',
	'type'        => 'text',
) ) );

$wp_customize->add_setting( 'penci_header_3_adsense', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_3_adsense', array(
	'label'       => 'Google adsense/custom HTML code to display in header 3',
	'section'     => 'pencidesign_logo_header_general',
	'settings'    => 'penci_header_3_adsense',
	'description' => 'If you want use google adsense/custom HTML code in header style 3, paste your google adsense/custom HTML code here',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_remove_border_bottom_header', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'remove_border_bottom_header', array(
	'label'       => 'Remove Border Bottom on The Header',
	'section'     => 'pencidesign_logo_header_general',
	'settings'    => 'penci_remove_border_bottom_header',
	'description' => 'This option just apply for header styles 1, 4, 7',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_header_social_check', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_social_check', array(
	'label'    => 'Disable Header Social Icons',
	'section'  => 'pencidesign_logo_header_general',
	'settings' => 'penci_header_social_check',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_header_social_brand', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_social_brand', array(
	'label'    => 'Enable Use Brand Colors for Social Icons on Header',
	'section'  => 'pencidesign_logo_header_general',
	'settings' => 'penci_header_social_brand',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_size_header_social_check', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'size_header_social_check', array(
	'description' => __( 'Custom Font Size for Social Icons', 'soledad' ),
	'section' => 'pencidesign_logo_header_general',
	'settings' => array(
		'desktop' => 'penci_size_header_social_check',
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

$wp_customize->add_setting( 'penci_top_insta_overlay_image', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_insta_overlay_image', array(
	'label'    => 'Display Top Instagram Widget Title Overlay Images',
	'section'  => 'pencidesign_logo_header_general',
	'settings' => 'penci_top_insta_overlay_image',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_top_insta_hide_icon', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_insta_hide_icon', array(
	'label'    => 'Hide Instagram Icon on Top Instagram Widget',
	'section'  => 'pencidesign_logo_header_general',
	'settings' => 'penci_top_insta_hide_icon',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_custom_code_inside_head_tag', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_code_inside_head_tag', array(
	'label'    => 'Add Custom Code Inside &lt;head&gt; tag',
	'section'  => 'pencidesign_logo_header_general',
	'settings' => 'penci_custom_code_inside_head_tag',
	'type'     => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_custom_code_after_body_tag', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_custom_code_after_body_tag', array(
	'label'    => 'Add Custom Code After &lt;body&gt; tag',
	'section'  => 'pencidesign_logo_header_general',
	'settings' => 'penci_custom_code_after_body_tag',
	'type'     => 'textarea',
) ) );

/* Slogan Text */
$wp_customize->add_setting( 'penci_header_slogan_text', array(
	'default'           => 'keep your memories alive',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_slogan_text', array(
	'label'       => 'Header Slogan Text',
	'section'     => 'pencidesign_logo_header_slogan',
	'settings'    => 'penci_header_slogan_text',
	'description' => 'If you want to hide the slogan text, let make it blank',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_header_remove_line_slogan', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_remove_line_slogan', array(
	'label'    => 'Remove the Lines on Left & Right of Header Slogan',
	'section'  => 'pencidesign_logo_header_slogan',
	'settings' => 'penci_header_remove_line_slogan',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_font_size_slogan', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'font_size_slogan', array(
	'description' => __( 'Font Size', 'soledad' ),
	'section' => 'pencidesign_logo_header_slogan',
	'settings' => array(
		'desktop' => 'penci_font_size_slogan',
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

$wp_customize->add_setting( 'penci_font_for_slogan', array(
	'default'           => '"PT Serif", "regular:italic:700:700italic", serif',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_for_slogan', array(
	'label'       => 'Font For Header Slogan',
	'section'     => 'pencidesign_logo_header_slogan',
	'settings'    => 'penci_font_for_slogan',
	'description' => 'Default font is "PT Serif"',
	'type'        => 'select',
	'choices'     => penci_all_fonts()
) ) );

$wp_customize->add_setting( 'penci_font_weight_slogan', array(
	'default'           => 'bold',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_weight_slogan', array(
	'label'    => 'Font Weight For Slogan',
	'section'  => 'pencidesign_logo_header_slogan',
	'settings' => 'penci_font_weight_slogan',
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
) ) );

$wp_customize->add_setting( 'penci_font_style_slogan', array(
	'default'           => 'italic',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_style_slogan', array(
	'label'    => 'Font Style for Slogan',
	'section'  => 'pencidesign_logo_header_slogan',
	'settings' => 'penci_font_style_slogan',
	'type'     => 'select',
	'choices'  => array(
		'italic' => 'Italic',
		'normal' => 'Normal'
	)
) ) );

/* Main Bar & Primary Menu */
$wp_customize->add_setting( 'penci_mainmenu_height', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_mainmenu_height', array(
	'description' => __( 'Custom Main Bar Height ( Min 30px )', 'soledad' ),
	'section' => 'pencidesign_logo_header_primary_menu',
	'settings' => array(
		'desktop' => 'penci_mainmenu_height',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 30,
			'max' => 300,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_mainmenu_height_sticky', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_mainmenu_height_sticky', array(
	'description' => __( 'Custom Sticky Main Bar Height When Scroll Down ( Min 30px )', 'soledad' ),
	'section' => 'pencidesign_logo_header_primary_menu',
	'settings' => array(
		'desktop' => 'penci_mainmenu_height_sticky',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 30,
			'max' => 300,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_header_menu_style', array(
	'default'           => 'menu-style-1',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_menu_style', array(
	'label'    => 'Menu Style',
	'section'  => 'pencidesign_logo_header_primary_menu',
	'settings' => 'penci_header_menu_style',
	'type'     => 'radio',
	'choices'  => array(
		'menu-style-1' => 'Menu Style 1',
		'menu-style-2' => 'Menu Style 2',
	)
) ) );

$wp_customize->add_setting( 'penci_font_for_menu', array(
	'default'           => '"Raleway", "100:200:300:regular:500:600:700:800:900", sans-serif',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_for_menu', array(
	'label'       => 'Custom Font For Primary Menu Items',
	'section'     => 'pencidesign_logo_header_primary_menu',
	'settings'    => 'penci_font_for_menu',
	'description' => 'Default font is "Raleway"',
	'type'        => 'select',
	'choices'     => penci_all_fonts()
) ) );

$wp_customize->add_setting( 'penci_font_weight_menu', array(
	'default'           => 'normal',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_weight_menu', array(
	'label'    => 'Font Weight For Primary Menu Items',
	'section'  => 'pencidesign_logo_header_primary_menu',
	'settings' => 'penci_font_weight_menu',
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
) ) );

$wp_customize->add_setting( 'penci_font_size_lv1', array(
	'default' => '12',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'font_size_lv1', array(
	'description' => __( 'Font Size for Menu Items Level 1', 'soledad' ),
	'section' => 'pencidesign_logo_header_primary_menu',
	'settings' => array(
		'desktop' => 'penci_font_size_lv1',
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

$wp_customize->add_setting( 'penci_font_size_drop', array(
	'default' => '12',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'font_size_drop', array(
	'description' => __( 'Font Size for Dropdown Menu Items', 'soledad' ),
	'section' => 'pencidesign_logo_header_primary_menu',
	'settings' => array(
		'desktop' => 'penci_font_size_drop',
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

$wp_customize->add_setting( 'penci_header_enable_padding', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_enable_padding', array(
	'label'    => 'Enable Padding on Menu Item Level 1',
	'section'  => 'pencidesign_logo_header_primary_menu',
	'settings' => 'penci_header_enable_padding',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_header_remove_line_hover', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_remove_line_hover', array(
	'label'    => 'Remove Lines When Hover on Menu Style 1',
	'section'  => 'pencidesign_logo_header_primary_menu',
	'settings' => 'penci_header_remove_line_hover',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_disable_sticky_header', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'disable_sticky_header', array(
	'label'    => 'Disable Sticky Main Bar When Scroll Down',
	'section'  => 'pencidesign_logo_header_primary_menu',
	'settings' => 'penci_disable_sticky_header',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_header_social_nav', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_social_nav', array(
	'label'    => 'Enable Social Icons on Main Bar',
	'section'  => 'pencidesign_logo_header_primary_menu',
	'settings' => 'penci_header_social_nav',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'size_header_search_icon_check', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'size_header_search_icon_check', array(
	'description' => __( 'Font Size for Search, Shopping Cart Icons', 'soledad' ),
	'section' => 'pencidesign_logo_header_primary_menu',
	'settings' => array(
		'desktop' => 'size_header_search_icon_check',
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

$wp_customize->add_setting( 'penci_header_logo_mobile', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_logo_mobile', array(
	'label'       => 'Display Logo on Main Bar on Mobile Devices',
	'section'     => 'pencidesign_logo_header_primary_menu',
	'settings'    => 'penci_header_logo_mobile',
	'type'        => 'checkbox',
	'description' => 'This option does not apply for Header Style 6 & Style 9',
) ) );

$wp_customize->add_setting( 'penci_header_logo_mobile_center', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_logo_mobile_center', array(
	'label'    => 'Move Logo on Main Bar on Mobile to Center',
	'section'  => 'pencidesign_logo_header_primary_menu',
	'settings' => 'penci_header_logo_mobile_center',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_topbar_search_check', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_search_check', array(
	'label'    => 'Disable Header Search',
	'section'  => 'pencidesign_logo_header_primary_menu',
	'settings' => 'penci_topbar_search_check',
	'type'     => 'checkbox',
) ) );

/* Category Mega Menu */
$wp_customize->add_setting( 'penci_topbar_mega_disable_lazy', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_mega_disable_lazy', array(
	'label'    => 'Disable LazyLoad Images on Category Mega Menu',
	'section'  => 'pencidesign_logo_header_category_megamenu',
	'settings' => 'penci_topbar_mega_disable_lazy',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_megamenu_border_radius', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'megamenu_border_radius', array(
	'label'       => 'Custom Border Radius for Images on Category Mega Menu',
	'section'     => 'pencidesign_logo_header_category_megamenu',
	'settings'    => 'penci_megamenu_border_radius',
	'description' => 'You can use pixel or percent. E.g:  <strong>10px</strong>  or  <strong>10%</strong>. If you want to disable border radius for it - fill 0',
) ) );

$wp_customize->add_setting( 'penci_mega_featured_image_size', array(
	'default'           => 'horizontal',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mega_featured_image_size', array(
	'label'    => 'Featured Images Type for Category Mega Menu',
	'section'  => 'pencidesign_logo_header_category_megamenu',
	'settings' => 'penci_mega_featured_image_size',
	'type'     => 'radio',
	'choices'  => array(
		'horizontal' => 'Horizontal Size',
		'square'     => 'Square Size',
		'vertical'   => 'Vertical Size',
		'custom'     => 'Custom',
	)
) ) );

$wp_customize->add_setting( 'penci_mega_featured_image_ratio', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_mega_featured_image_ratio', array(
	'label'       => 'Custom Aspect Ratio for Featured Images Type for Category Mega Menu',
	'section'     => 'pencidesign_logo_header_category_megamenu',
	'settings'    => 'penci_mega_featured_image_ratio',
	'description' => 'The aspect ratio of an element describes the proportional relationship between its width and its height. E.g: <strong>3:2</strong>. Default is 3:2 . This option apply  for <strong>Featured Images Type for Category Mega Menu is Custom</strong>',
) ) );

$wp_customize->add_setting( 'penci_topbar_mega_hide_alltab', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_mega_hide_alltab', array(
	'label'    => 'Hide "All" tab on Category Mega Menu',
	'section'  => 'pencidesign_logo_header_category_megamenu',
	'settings' => 'penci_topbar_mega_hide_alltab',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_megamenu_title_length', array(
	'default' => '8',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'megamenu_title_length', array(
	'description' => __( 'Custom Words Length for Post Titles on Category Mega Menu', 'soledad' ),
	'section' => 'pencidesign_logo_header_category_megamenu',
	'settings' => array(
		'desktop' => 'penci_megamenu_title_length',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_topbar_mega_icons', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_mega_icons', array(
	'label'    => 'Enable Post Format Icons on Category Mega Menu',
	'section'  => 'pencidesign_logo_header_category_megamenu',
	'settings' => 'penci_topbar_mega_icons',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_topbar_mega_category', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_mega_category', array(
	'label'    => 'Hide Post Category On Category Mega Menu',
	'section'  => 'pencidesign_logo_header_category_megamenu',
	'settings' => 'penci_topbar_mega_category',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_topbar_mega_date', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_mega_date', array(
	'label'    => 'Hide Post Date On Category Mega Menu',
	'section'  => 'pencidesign_logo_header_category_megamenu',
	'settings' => 'penci_topbar_mega_date',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_off_uppercase_cat_mega', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'off_uppercase_cat_mega', array(
	'label'    => 'Turn Off Uppercase Post Titles On Category Mega Menu',
	'section'  => 'pencidesign_logo_header_category_megamenu',
	'settings' => 'penci_off_uppercase_cat_mega',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_font_size_child_cat_mega', array(
	'default' => '12',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'font_size_child_cat_mega', array(
	'description' => __( 'Font Size for Child Categories On Category Mega Menu', 'soledad' ),
	'section' => 'pencidesign_logo_header_category_megamenu',
	'settings' => array(
		'desktop' => 'penci_font_size_child_cat_mega',
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

$wp_customize->add_setting( 'penci_font_size_cat_mega', array(
	'default' => '10',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_font_size_cat_mega', array(
	'description' => __( 'Font Size for Category Name On Category Mega Menu', 'soledad' ),
	'section' => 'pencidesign_logo_header_category_megamenu',
	'settings' => array(
		'desktop' => 'penci_font_size_cat_mega',
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

$wp_customize->add_setting( 'penci_font_size_title_cat_mega', array(
	'default' => '12',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'font_size_title_cat_mega', array(
	'description' => __( 'Font Size for Post Titles On Category Mega Menu', 'soledad' ),
	'section' => 'pencidesign_logo_header_category_megamenu',
	'settings' => array(
		'desktop' => 'penci_font_size_title_cat_mega',
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

$wp_customize->add_setting( 'penci_font_size_date_mega', array(
	'default' => '12',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_font_size_date_mega', array(
	'description' => __( 'Font Size for Post Date On Category Mega Menu', 'soledad' ),
	'section' => 'pencidesign_logo_header_category_megamenu',
	'settings' => array(
		'desktop' => 'penci_font_size_date_mega',
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

/* Header SignUp Form */
$wp_customize->add_setting( 'penci_move_signup_below', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'move_signup_below', array(
	'label'       => 'Move Header Sign-Up Form To Below Featured Slider',
	'section'     => 'penci_section_header_signupform',
	'settings'    => 'penci_move_signup_below',
	'description' => 'If you using Sign-Up form on the header, this option will help you move Sign-Up form to below the featured slider',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_move_signup_full_width', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'move_signup_full_width', array(
	'label'    => 'Make Header Sign-Up Form Below Featured Slider Full Width',
	'section'  => 'penci_section_header_signupform',
	'settings' => 'penci_move_signup_full_width',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_signup_display_homepage', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'signup_display_homepage', array(
	'label'    => 'Display Header Sign-Up Form only on Homepage',
	'section'  => 'penci_section_header_signupform',
	'settings' => 'penci_signup_display_homepage',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_header_signup_padding', array(
	'default' => '20',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'header_signup_padding', array(
	'description' => __( 'Header Sign-Up Form Padding Top & Bottom', 'soledad' ),
	'section' => 'penci_section_header_signupform',
	'settings' => array(
		'desktop' => 'penci_header_signup_padding',
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

$wp_customize->add_setting( 'penci_header_signup_fdesc', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_header_signup_fdesc', array(
	'description' => __( 'Font Size for Description on Sign-Up Form', 'soledad' ),
	'section' => 'penci_section_header_signupform',
	'settings' => array(
		'desktop' => 'penci_header_signup_fdesc',
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

$wp_customize->add_setting( 'penci_header_signup_finput', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_header_signup_finput', array(
	'description' => __( 'Font Size for Text on "Name" & "Email" fields', 'soledad' ),
	'section' => 'penci_section_header_signupform',
	'settings' => array(
		'desktop' => 'penci_header_signup_finput',
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

$wp_customize->add_setting( 'penci_header_signup_fsubmit', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_header_signup_fsubmit', array(
	'description' => __( 'Font Size for "Subscrible" button', 'soledad' ),
	'section' => 'penci_section_header_signupform',
	'settings' => array(
		'desktop' => 'penci_header_signup_fsubmit',
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

$wp_customize->add_setting( 'penci_header_signup_bg', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_signup_bg', array(
	'label'    => 'Header Sign-Up Form Area Background Color',
	'section'  => 'penci_section_header_signupform',
	'settings' => 'penci_header_signup_bg',
) ) );

$wp_customize->add_setting( 'penci_header_signup_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_signup_color', array(
	'label'    => 'Text Color',
	'section'  => 'penci_section_header_signupform',
	'settings' => 'penci_header_signup_color',
) ) );

$wp_customize->add_setting( 'penci_header_signup_input_border', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_signup_input_border', array(
	'label'    => 'Input Border Color',
	'section'  => 'penci_section_header_signupform',
	'settings' => 'penci_header_signup_input_border',
) ) );

$wp_customize->add_setting( 'penci_header_signup_input_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_signup_input_color', array(
	'label'    => 'Input Text Color',
	'section'  => 'penci_section_header_signupform',
	'settings' => 'penci_header_signup_input_color',
) ) );

$wp_customize->add_setting( 'penci_header_signup_submit_bg', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_signup_submit_bg', array(
	'label'    => 'Submit Button Background Color',
	'section'  => 'penci_section_header_signupform',
	'settings' => 'penci_header_signup_submit_bg',
) ) );

$wp_customize->add_setting( 'penci_header_signup_submit_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_signup_submit_color', array(
	'label'    => 'Submit Button Text Color',
	'section'  => 'penci_section_header_signupform',
	'settings' => 'penci_header_signup_submit_color',
) ) );

$wp_customize->add_setting( 'penci_header_signup_submit_bg_hover', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_signup_submit_bg_hover', array(
	'label'    => 'Submit Button Hover Background Color',
	'section'  => 'penci_section_header_signupform',
	'settings' => 'penci_header_signup_submit_bg_hover',
) ) );

$wp_customize->add_setting( 'penci_header_signup_submit_color_hover', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_signup_submit_color_hover', array(
	'label'    => 'Submit Button Hover Text Color',
	'section'  => 'penci_section_header_signupform',
	'settings' => 'penci_header_signup_submit_color_hover',
) ) );

/* Vertical Mobile Navigation */
$wp_customize->add_setting( 'penci_mobile_nav_logo', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_mobile_nav_logo', array(
	'label'    => 'Logo for Vertical Mobile Nav',
	'section'  => 'pencidesign_logo_header_verticalnav',
	'settings' => 'penci_mobile_nav_logo',
) ) );

$wp_customize->add_setting( 'penci_custom_url_logo_vertical', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_url_logo_vertical', array(
	'label'    => 'Custom Link for Logo Image on Vertical Mobile Nav',
	'section'  => 'pencidesign_logo_header_verticalnav',
	'settings' => 'penci_custom_url_logo_vertical',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_header_logo_vertical', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_logo_vertical', array(
	'label'    => 'Disable Logo on Vertical Mobile Nav',
	'section'  => 'pencidesign_logo_header_verticalnav',
	'settings' => 'penci_header_logo_vertical',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_vernav_remove_line', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_vernav_remove_line', array(
	'label'    => 'Remove The Line Below Logo Image',
	'section'  => 'pencidesign_logo_header_verticalnav',
	'settings' => 'penci_vernav_remove_line',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_header_social_vertical', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_social_vertical', array(
	'label'    => 'Disable Social Icons on Vertical Mobile Nav',
	'section'  => 'pencidesign_logo_header_verticalnav',
	'settings' => 'penci_header_social_vertical',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_header_social_vertical_brand', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_social_vertical_brand', array(
	'label'    => 'Use Brand Colors for Social Icons on Vertical Mobile Nav',
	'section'  => 'pencidesign_logo_header_verticalnav',
	'settings' => 'penci_header_social_vertical_brand',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_vernav_searchform', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_vernav_searchform', array(
	'label'    => 'Display Search Form on Vertical Mobile Nav',
	'section'  => 'pencidesign_logo_header_verticalnav',
	'settings' => 'penci_vernav_searchform',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_moble_vertical_menu', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new Penci_Customize_List_Menus_Control( $wp_customize, 'penci_moble_vertical_menu', array(
	'label'    => 'Select Custom Menu for Vertical Mobile Nav',
	'section'  => 'pencidesign_logo_header_verticalnav',
	'settings' => 'penci_moble_vertical_menu',
	'type'     => 'list_menus',
) ) );

$wp_customize->add_setting( 'penci_font_icons_mobile_nav', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_font_icons_mobile_nav', array(
	'description' => __( 'Font Size for Social Icons', 'soledad' ),
	'section' => 'pencidesign_logo_header_verticalnav',
	'settings' => array(
		'desktop' => 'penci_font_icons_mobile_nav',
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

$wp_customize->add_setting( 'penci_font_size_mobile_nav', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'font_size_mobile_nav', array(
	'description' => __( 'Font Size for Vertical Mobile Menu Items', 'soledad' ),
	'section' => 'pencidesign_logo_header_verticalnav',
	'settings' => array(
		'desktop' => 'penci_font_size_mobile_nav',
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

$wp_customize->add_setting( 'penci_vernav_fsearchinput', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_vernav_fsearchinput', array(
	'description' => __( 'Font Size for text on Search Form', 'soledad' ),
	'section' => 'pencidesign_logo_header_verticalnav',
	'settings' => array(
		'desktop' => 'penci_vernav_fsearchinput',
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
$wp_customize->add_setting( 'penci_header_background_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
	'label'    => 'Header Background Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_header_background_color',
) ) );

$wp_customize->add_setting( 'penci_header_background_image', array(
	'default'           => '',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_background_image', array(
	'label'       => 'Header Background Image',
	'section'     => 'pencidesign_logo_header_colors',
	'description' => 'You should use image with minimum width 1920px and minimum height 300px',
	'settings'    => 'penci_header_background_image',
) ) );

$wp_customize->add_setting( 'penci_header_social_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_social_color', array(
	'label'    => 'Header Social Icons Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_header_social_color',
) ) );

$wp_customize->add_setting( 'penci_header_social_color_hover', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_social_color_hover', array(
	'label'    => 'Header Social Icons Color Hover',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_header_social_color_hover',
) ) );

$wp_customize->add_setting( 'penci_section_slogan_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_slogan_heading', array(
	'label'    => esc_html__( 'Slogan Text', 'soledad' ),
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_section_slogan_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_header_slogan_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_slogan_color', array(
	'label'    => 'Header Slogan Text Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_header_slogan_color',
) ) );

$wp_customize->add_setting( 'penci_header_slogan_line_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_slogan_line_color', array(
	'label'    => 'Header Slogan Line Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_header_slogan_line_color',
) ) );

$wp_customize->add_setting( 'penci_section_mainbar_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_mainbar_heading', array(
	'label'    => esc_html__( 'Main Bar', 'soledad' ),
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_section_mainbar_heading',
	'description'      => __( 'Check <a target="_blank" href="https://imgresources.s3.amazonaws.com/main-bar.png">this image</a> to know what is Main Bar', 'soledad' ),
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_main_bar_bg', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_bg', array(
	'label'    => 'Main Bar Background',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_main_bar_bg',
) ) );

$wp_customize->add_setting( 'penci_main_bar_border_color', array(
	'default'           => '#ECECEC',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_border_color', array(
	'label'    => 'Main Bar Border Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_main_bar_border_color',
) ) );

$wp_customize->add_setting( 'penci_main_bar_search_magnify', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_search_magnify', array(
	'label'    => 'Search, Shopping Cart & Mobile Bars Icons Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_main_bar_search_magnify',
) ) );

$wp_customize->add_setting( 'penci_main_bar_close_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_close_color', array(
	'label'    => 'Icon Close Search Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_main_bar_close_color',
) ) );

$wp_customize->add_setting( 'penci_section_primary_menu_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_primary_menu_heading', array(
	'label'    => esc_html__( 'Primary Menu', 'soledad' ),
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_section_primary_menu_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_main_bar_nav_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_nav_color', array(
	'label'    => 'Menu Text Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_main_bar_nav_color',
) ) );

$wp_customize->add_setting( 'penci_main_bar_color_active', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_color_active', array(
	'label'    => 'Menu Text Hover & Active Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_main_bar_color_active',
) ) );

$wp_customize->add_setting( 'penci_main_bar_padding_color', array(
	'default'           => '#ececec',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_padding_color', array(
	'label'    => 'Padding Menu Items Background Color',
	'section'  => 'pencidesign_logo_header_colors',
	'description'  => 'Use when you enable padding for menu items',
	'settings' => 'penci_main_bar_padding_color',
) ) );

$wp_customize->add_setting( 'penci_drop_bg_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_bg_color', array(
	'label'    => 'Dropdown Background Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_drop_bg_color',
) ) );

$wp_customize->add_setting( 'penci_drop_items_border', array(
	'default'           => '#E0E0E0',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_items_border', array(
	'label'    => 'Dropdown Menu Items Border Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_drop_items_border',
) ) );

$wp_customize->add_setting( 'penci_drop_text_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_text_color', array(
	'label'    => 'Dropdown Text Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_drop_text_color',
) ) );

$wp_customize->add_setting( 'penci_drop_text_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_text_hover_color', array(
	'label'    => 'Dropdown Text Hover Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_drop_text_hover_color',
) ) );

$wp_customize->add_setting( 'penci_drop_border_style2', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_border_style2', array(
	'label'    => 'Dropdown Border When Hover for Menu Style2',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_drop_border_style2',
) ) );

$wp_customize->add_setting( 'penci_section_category_megamenu_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_category_megamenu_heading', array(
	'label'    => esc_html__( 'Category Mega Menu', 'soledad' ),
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_section_category_megamenu_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_mega_bg_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_bg_color', array(
	'label'    => 'Category Mega Menu Background Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_mega_bg_color',
) ) );

$wp_customize->add_setting( 'penci_mega_child_cat_bg_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_child_cat_bg_color', array(
	'label'    => 'Category Mega Menu List Child Categories Background Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_mega_child_cat_bg_color',
) ) );

$wp_customize->add_setting( 'penci_mega_post_date_color', array(
	'default'           => '#999999',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_post_date_color', array(
	'label'    => 'Category Mega Menu Post Date Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_mega_post_date_color',
) ) );

$wp_customize->add_setting( 'penci_mega_post_category_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_post_category_color', array(
	'label'    => 'Mega Menu Post Category Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_mega_post_category_color',
) ) );

$wp_customize->add_setting( 'penci_mega_accent_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_accent_color', array(
	'label'    => 'Category Mega Menu Accent Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_mega_accent_color',
) ) );

$wp_customize->add_setting( 'penci_mega_border_style2', array(
	'default'           => '#f1f1f2',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_border_style2', array(
	'label'    => 'Border Color for Category Mega on Menu Style2',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_mega_border_style2',
) ) );

$wp_customize->add_setting( 'penci_section_mobilevernav_color_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_mobilevernav_color_heading', array(
	'label'    => esc_html__( 'Vertical Mobile Navigation', 'soledad' ),
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_section_mobilevernav_color_heading',
	'description'      => __( 'Check <a target="_blank" href="https://imgresources.s3.amazonaws.com/vertical-mobile-navigation.png">this image</a> to know what is Vertical Mobile Navigation.', 'soledad' ),
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_ver_nav_overlay_color', array(
	'default'           => '#000000',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_overlay_color', array(
	'label'    => 'Mobile Nav Close Overlay Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_ver_nav_overlay_color',
) ) );

$wp_customize->add_setting( 'penci_ver_nav_close_bg', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_close_bg', array(
	'label'    => 'Mobile Nav Close Button Background',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_ver_nav_close_bg',
) ) );

$wp_customize->add_setting( 'penci_ver_nav_close_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_close_color', array(
	'label'    => 'Mobile Nav Close Button Icon Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_ver_nav_close_color',
) ) );

$wp_customize->add_setting( 'penci_ver_nav_bg', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_bg', array(
	'label'    => 'Mobile Nav Background',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_ver_nav_bg',
) ) );

$wp_customize->add_setting( 'penci_ver_nav_searchborder', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_ver_nav_searchborder', array(
	'label'    => 'Search Form Borders Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_ver_nav_searchborder',
) ) );

$wp_customize->add_setting( 'penci_ver_nav_textcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_ver_nav_textcolor', array(
	'label'    => 'Search Form Text Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_ver_nav_textcolor',
) ) );

$wp_customize->add_setting( 'penci_ver_nav_iconcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_ver_nav_iconcolor', array(
	'label'    => 'Search Form Search Icon Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_ver_nav_iconcolor',
) ) );

$wp_customize->add_setting( 'penci_ver_nav_accent_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_accent_color', array(
	'label'    => 'Mobile Nav Accent Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_ver_nav_accent_color',
) ) );

$wp_customize->add_setting( 'penci_ver_nav_accent_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_accent_hover_color', array(
	'label'    => 'Mobile Nav Accent Hover Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_ver_nav_accent_hover_color',
) ) );

$wp_customize->add_setting( 'penci_ver_nav_items_border', array(
	'default'           => '#DEDEDE',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_items_border', array(
	'label'    => 'Mobile Nav Menu Items Border Color',
	'section'  => 'pencidesign_logo_header_colors',
	'settings' => 'penci_ver_nav_items_border',
) ) );

/* Colors Transparent */
$wp_customize->add_setting( 'penci_header_tran_social_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_header_tran_social_color', array(
	'label'    => 'Header Social Icons Color',
	'section'  => 'pencidesign_logo_header_colors_trans',
	'settings' => 'penci_header_tran_social_color',
) ) );

$wp_customize->add_setting( 'penci_header_tran_social_color_hover', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_header_tran_social_color_hover', array(
	'label'    => 'Header Social Icons Color Hover',
	'section'  => 'pencidesign_logo_header_colors_trans',
	'settings' => 'penci_header_tran_social_color_hover',
) ) );

$wp_customize->add_setting( 'penci_tran_main_bar_search_magnify', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_tran_main_bar_search_magnify', array(
	'label'    => 'Search, Shopping Cart & Mobile Bars Icons Color',
	'section'  => 'pencidesign_logo_header_colors_trans',
	'settings' => 'penci_tran_main_bar_search_magnify',
) ) );

$wp_customize->add_setting( 'penci_tran_main_bar_close_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_tran_main_bar_close_color', array(
	'label'    => 'Icon Close Search Color',
	'section'  => 'pencidesign_logo_header_colors_trans',
	'settings' => 'penci_tran_main_bar_close_color',
) ) );

$wp_customize->add_setting( 'penci_section_trslogan_text_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_trslogan_text_heading', array(
	'label'    => esc_html__( 'Slogan Text', 'soledad' ),
	'section'  => 'pencidesign_logo_header_colors_trans',
	'settings' => 'penci_section_trslogan_text_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_header_tran_slogan_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_header_tran_slogan_color', array(
	'label'    => 'Header Slogan Text Color',
	'section'  => 'pencidesign_logo_header_colors_trans',
	'settings' => 'penci_header_tran_slogan_color',
) ) );

$wp_customize->add_setting( 'penci_header_tran_slogan_line_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_header_tran_slogan_line_color', array(
	'label'    => 'Header Slogan Line Color',
	'section'  => 'pencidesign_logo_header_colors_trans',
	'settings' => 'penci_header_tran_slogan_line_color',
) ) );

$wp_customize->add_setting( 'penci_section_traprimary_menu_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_traprimary_menu_heading', array(
	'label'    => esc_html__( 'Primary Menu', 'soledad' ),
	'section'  => 'pencidesign_logo_header_colors_trans',
	'settings' => 'penci_section_traprimary_menu_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_tran_main_bar_nav_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_tran_main_bar_nav_color', array(
	'label'    => 'Menu Text Color',
	'section'  => 'pencidesign_logo_header_colors_trans',
	'settings' => 'penci_tran_main_bar_nav_color',
) ) );

$wp_customize->add_setting( 'penci_tran_main_bar_color_active', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_tran_bar_color_active', array(
	'label'    => 'Menu Text Hover & Active Color',
	'section'  => 'pencidesign_logo_header_colors_trans',
	'settings' => 'penci_tran_main_bar_color_active',
) ) );

$wp_customize->add_setting( 'penci_tran_main_bar_padding_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_tran_main_bar_padding_color', array(
	'label'    => 'Padding Menu Items Background Color',
	'section'  => 'pencidesign_logo_header_colors_trans',
	'settings' => 'penci_tran_main_bar_padding_color',
) ) );