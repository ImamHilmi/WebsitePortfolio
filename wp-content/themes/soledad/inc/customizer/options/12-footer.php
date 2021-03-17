<?php
/* Add Sections */
$wp_customize->add_section( 'penci_section_footer_general', array(
	'title'    => esc_html__( 'General', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_footer_section_panel'
) );

$wp_customize->add_section( 'penci_section_footer_widgets', array(
	'title'    => esc_html__( 'Footer Widgets Area', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/footer-widgets-area.png">this image</a> to know where is "Footer Widgets Area".<br>To config Footer Widgets, please go to <strong>Appearance > Widgets > drag & drop widgets to "Footer Column #1", "Footer Column #2", "Footer Column #3", "Footer Column #4</strong> - check <a target="_blank" href="https://imgresources.s3.amazonaws.com/footer-columns.png">this image</a>', 'soledad' ),
	'panel'      => 'penci_footer_section_panel'
) );

$wp_customize->add_section( 'penci_section_footer_instagram', array(
	'title'    => esc_html__( 'Footer Instagram', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/footer-instagram.png">this image</a> to know where is "Footer Instagram".<br>To config Footer Instagram, please go to <strong>Appearance > Widgets > drag & drop widget "Soledad Instagram Feed" to "Footer Instagram"</strong> - check <a target="_blank" href="https://imgresources.s3.amazonaws.com/footer-instagram-widgets.png">this image</a>', 'soledad' ),
	'panel'      => 'penci_footer_section_panel'
) );

$wp_customize->add_section( 'penci_section_footer_signupform', array(
	'title'    => esc_html__( 'Footer SignUp Form', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/footer-signup-form.png">this image</a> to know where is "Footer Sign-Up Form".<br>To config Footer SignUp Form, please use the HTML markup like we said on the documentation <a target="_blank" href="http://soledad.pencidesign.com/soledad-document/#setup_mailchimp">here</a>, after that go to <strong>Appearance > Widgets > drag & drop widget "Mailchimp Sign-Up Form" to "Footer Sign-Up Form"</strong> - check <a target="_blank" href="https://imgresources.s3.amazonaws.com/footer-signup-form-widgets.png">this image</a>', 'soledad' ),
	'panel'      => 'penci_footer_section_panel'
) );

$wp_customize->add_section( 'penci_section_footer_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_footer_section_panel'
) );

/* General */
$wp_customize->add_setting( 'penci_footer_adsense', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_adsense', array(
	'label'       => 'Add Google Adsense/Custom HTML Code Above Footer',
	'section'     => 'penci_section_footer_general',
	'settings'    => 'penci_footer_adsense',
	'description' => '',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_footer_width', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_footer_width', array(
	'label'    => 'Footer Container Width',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_width',
	'type'     => 'select',
	'choices'  => array(
		''          => esc_html__( 'Width: 1170px', 'soledad' ),
		'1400'      => esc_html__( 'Width: 1400px', 'soledad' ),
		'fullwidth' => esc_html__( 'Full Width', 'soledad' )
	)
) ) );

$wp_customize->add_setting( 'penci_footer_social', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_social', array(
	'label'    => 'Disable Footer Socials',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_social',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_social_around', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_social_around', array(
	'label'    => 'Disable Border Around Footer Social Icons',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_social_around',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_brand_social', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_brand_social', array(
	'label'    => 'Enable Use Brand Colors for Footer Social Icons',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_brand_social',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_disable_radius_social', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_disable_radius_social', array(
	'label'    => 'Disable Border Radius on Border of Social Icons',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_disable_radius_social',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_social_remove_text', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_social_remove_text', array(
	'label'    => 'Hide Footer Social Icons Text',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_social_remove_text',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_social_drop_line', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_social_drop_line', array(
	'label'    => 'Make Footer Social Text Drop In New Line',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_social_drop_line',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_social_size', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'footer_social_size', array(
	'description' => __( 'Font Size for Icons on Footer Social Icons', 'soledad' ),
	'section' => 'penci_section_footer_general',
	'settings' => array(
		'desktop' => 'penci_footer_social_size',
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

$wp_customize->add_setting( 'penci_footer_social_lowercase', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_social_lowercase', array(
	'label'    => 'Disable Uppercase on Footer Social Icons Text',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_social_lowercase',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_social_text_size', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'footer_social_text_size', array(
	'description' => __( 'Font Size for Footer Social Icons Text', 'soledad' ),
	'section' => 'penci_section_footer_general',
	'settings' => array(
		'desktop' => 'penci_footer_social_text_size',
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

$wp_customize->add_setting( 'penci_hide_footer_logo', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_footer_logo', array(
	'label'    => 'Disable Footer Logo',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_hide_footer_logo',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_logo', array(
	'default'           => '',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
	'label'    => 'Footer Logo',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_logo',
) ) );

$wp_customize->add_setting( 'penci_custom_url_logo_footer', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_url_logo_footer', array(
	'label'       => 'Custom Link for Footer Logo Image',
	'section'     => 'penci_section_footer_general',
	'settings'    => 'penci_custom_url_logo_footer',
	'description' => 'By default, footer logo image will link to homepage url. If you want to link the footer logo for another URL - fill here. Include http:// or https:// on the link',
	'type'        => 'text',
) ) );

$wp_customize->add_setting( 'penci_go_to_top', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_go_to_top', array(
	'label'    => 'Disable Go To Top Button on Footer',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_go_to_top',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_go_to_top_floating', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'go_to_top_floating', array(
	'label'    => 'Enable Go To Top Button Floating on The Bottom Right',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_go_to_top_floating',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_menu', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_menu', array(
	'label'       => 'Enable Footer Menu',
	'section'     => 'penci_section_footer_general',
	'settings'    => 'penci_footer_menu',
	'description' => 'You can setup your footer menu by go to admin > Appearance > Menus > Create/Select your menu > scroll down and check to "Footer Menu" at the bottom.',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_menu_size', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'footer_menu_size', array(
	'description' => __( 'Font Size for Footer Menu', 'soledad' ),
	'section' => 'penci_section_footer_general',
	'settings' => array(
		'desktop' => 'penci_footer_menu_size',
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

$wp_customize->add_setting( 'penci_footer_copyright', array(
	'default'           => '@2020 - All Right Reserved. Designed and Developed by <a rel="nofollow" href="https://1.envato.market/YYJ4P" target="_blank">PenciDesign</a>',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_copyright', array(
	'label'    => 'Footer Copyright Text',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_copyright',
	'type'     => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_footer_copyright_remove_italic', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_copyright_remove_italic', array(
	'label'    => 'Disable Italic on Footer Copyright Text',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_copyright_remove_italic',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_copyright_size', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'footer_copyright_size', array(
	'description' => __( 'Font Size for Footer Copyright Text', 'soledad' ),
	'section' => 'penci_section_footer_general',
	'settings' => array(
		'desktop' => 'penci_footer_copyright_size',
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

$wp_customize->add_setting( 'penci_footer_analytics', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_analytics', array(
	'label'    => 'Add Custom HTML code before close &lt;/body&gt; tag / Google Analytics Code',
	'section'  => 'penci_section_footer_general',
	'settings' => 'penci_footer_analytics',
	'type'     => 'textarea',
) ) );

/* Footer Widget Area */
$wp_customize->add_setting( 'penci_footer_widget_area', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_widget_area', array(
	'label'    => 'Disable Footer Widget Area',
	'section'  => 'penci_section_footer_widgets',
	'settings' => 'penci_footer_widget_area',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_widget_area_layout', array(
	'default'           => 'style-1',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_widget_area_layout', array(
	'label'    => 'Footer Widget Area Columns Layout',
	'section'  => 'penci_section_footer_widgets',
	'settings' => 'penci_footer_widget_area_layout',
	'type'     => 'select',
	'choices'  => array(
		'style-1'  => '1/3 + 1/3 + 1/3',
		'style-2'  => '1/3 + 2/3',
		'style-3'  => '2/3 + 1/3',
		'style-4'  => '1/4 + 1/4 + 1/4 + 1/4',
		'style-5'  => '2/4 + 1/4 + 1/4',
		'style-6'  => '1/4 + 2/4 + 1/4',
		'style-7'  => '1/4 + 1/4 + 2/4',
		'style-8'  => '1/4 + 3/4',
		'style-9'  => '3/4 + 1/4',
		'style-10' => '1/2 + 1/2',
	)
) ) );

$wp_customize->add_setting( 'penci_footer_widget_padding', array(
	'default' => '60',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'footer_widget_padding', array(
	'description' => __( 'Footer Widget Area Padding Top & Bottom', 'soledad' ),
	'section' => 'penci_section_footer_widgets',
	'settings' => array(
		'desktop' => 'penci_footer_widget_padding',
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

$wp_customize->add_setting( 'penci_footer_widget_title_center', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_widget_title_center', array(
	'label'    => 'Align Center Footer Widget Title',
	'section'  => 'penci_section_footer_widgets',
	'settings' => 'penci_footer_widget_title_center',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_widget_titlefsize', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_footer_widget_titlefsize', array(
	'description' => __( 'Font Size for Footer Widget Titles', 'soledad' ),
	'section' => 'penci_section_footer_widgets',
	'settings' => array(
		'desktop' => 'penci_footer_widget_titlefsize',
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


/* Footer Instagram */
$wp_customize->add_setting( 'penci_footer_insta_title_overlay', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_insta_title_overlay', array(
	'label'    => 'Display Footer Instagram Widget Title Overlay Images',
	'section'  => 'penci_section_footer_instagram',
	'settings' => 'penci_footer_insta_title_overlay',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_insta_hide_icon', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_insta_hide_icon', array(
	'label'    => 'Hide Instagram Icon on Footer Instagram',
	'section'  => 'penci_section_footer_instagram',
	'settings' => 'penci_footer_insta_hide_icon',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_insta_title', array(
	'default' => '16',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_footer_insta_title_mobile', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_footer_insta_title', array(
	'description' => __( 'Font Size for Widget Title', 'soledad' ),
	'section' => 'penci_section_footer_instagram',
	'settings' => array(
		'desktop' => 'penci_footer_insta_title',
		'mobile' => 'penci_footer_insta_title_mobile',
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

/* Footer SignUp Form */
$wp_customize->add_setting( 'penci_footer_signup_ptop', array(
	'default' => '50',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_footer_signup_ptop', array(
	'description' => __( 'Custom Padding to Top', 'soledad' ),
	'section' => 'penci_section_footer_signupform',
	'settings' => array(
		'desktop' => 'penci_footer_signup_ptop',
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

$wp_customize->add_setting( 'penci_footer_signup_pbottom', array(
	'default' => '40',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_footer_signup_pbottom', array(
	'description' => __( 'Custom Padding to Bottom', 'soledad' ),
	'section' => 'penci_section_footer_signupform',
	'settings' => array(
		'desktop' => 'penci_footer_signup_pbottom',
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

$wp_customize->add_setting( 'penci_footer_signup_fstitle', array(
	'default' => '32',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_footer_signup_fstitle_mobile', array(
	'default' => '24',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_footer_signup_fstitle', array(
	'description' => __( 'Font Size for Heading', 'soledad' ),
	'section' => 'penci_section_footer_signupform',
	'settings' => array(
		'desktop' => 'penci_footer_signup_fstitle',
		'mobile' => 'penci_footer_signup_fstitle_mobile',
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

$wp_customize->add_setting( 'penci_footer_signup_fsdesc', array(
	'default' => '18',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_footer_signup_fsdesc_mobile', array(
	'default' => '16',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_footer_signup_fsdesc', array(
	'description' => __( 'Font Size for Description', 'soledad' ),
	'section' => 'penci_section_footer_signupform',
	'settings' => array(
		'desktop' => 'penci_footer_signup_fsdesc',
		'mobile' => 'penci_footer_signup_fsdesc_mobile',
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

$wp_customize->add_setting( 'penci_footer_signup_fsinputs', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_footer_signup_fsinputs', array(
	'description' => __( 'Font Size for Inputs', 'soledad' ),
	'section' => 'penci_section_footer_signupform',
	'settings' => array(
		'desktop' => 'penci_footer_signup_fsinputs',
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

$wp_customize->add_setting( 'penci_footer_signup_fsisubmit', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_footer_signup_fsisubmit', array(
	'description' => __( 'Font Size for Submit Button', 'soledad' ),
	'section' => 'penci_section_footer_signupform',
	'settings' => array(
		'desktop' => 'penci_footer_signup_fsisubmit',
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

$wp_customize->add_setting( 'penci_footer_signup_showemail', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_signup_showemail', array(
	'label'    => 'Display Name Field on Footer SignUp Form',
	'section'  => 'penci_section_footer_signupform',
	'settings' => 'penci_footer_signup_showemail',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_footer_signup_area_bg', array(
	'default'           => '#f7f7f7',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_signup_area_bg', array(
	'label'    => 'Footer SignUp Form Area Background Color',
	'section'  => 'penci_section_footer_signupform',
	'settings' => 'penci_footer_signup_area_bg',
) ) );

$wp_customize->add_setting( 'penci_footer_signup_heading_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_signup_heading_color', array(
	'label'    => 'SignUp Form Heading Text Color',
	'section'  => 'penci_section_footer_signupform',
	'settings' => 'penci_footer_signup_heading_color',
) ) );

$wp_customize->add_setting( 'penci_footer_signup_des_color', array(
	'default'           => '#5c5c5c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_signup_des_color', array(
	'label'    => 'SignUp Form Description Text Color',
	'section'  => 'penci_section_footer_signupform',
	'settings' => 'penci_footer_signup_des_color',
) ) );

$wp_customize->add_setting( 'penci_footer_signup_email_border', array(
	'default'           => '#d7d7d7',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_signup_email_border', array(
	'label'    => 'SignUp Form Email Input Border Color',
	'section'  => 'penci_section_footer_signupform',
	'settings' => 'penci_footer_signup_email_border',
) ) );

$wp_customize->add_setting( 'footer_signup_email_border_hover', array(
	'default'           => '#888888',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'signup_email_border_hover', array(
	'label'    => 'SignUp Form Email Input Hover Border Color',
	'section'  => 'penci_section_footer_signupform',
	'settings' => 'footer_signup_email_border_hover',
) ) );

$wp_customize->add_setting( 'penci_footer_signup_email_text_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_signup_email_text_color', array(
	'label'    => 'SignUp Form Email Text Color',
	'section'  => 'penci_section_footer_signupform',
	'settings' => 'penci_footer_signup_email_text_color',
) ) );

$wp_customize->add_setting( 'penci_footer_signup_button_bg', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_signup_button_bg', array(
	'label'    => 'SignUp Form Submit Background Color',
	'section'  => 'penci_section_footer_signupform',
	'settings' => 'penci_footer_signup_button_bg',
) ) );

$wp_customize->add_setting( 'penci_footer_signup_button_bg_hover', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_signup_button_bg_hover', array(
	'label'    => 'SignUp Form Submit Hover Background Color',
	'section'  => 'penci_section_footer_signupform',
	'settings' => 'penci_footer_signup_button_bg_hover',
) ) );

$wp_customize->add_setting( 'penci_footer_signup_button_text', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_signup_button_text', array(
	'label'    => 'SignUp Form Submit Text Color',
	'section'  => 'penci_section_footer_signupform',
	'settings' => 'penci_footer_signup_button_text',
) ) );

$wp_customize->add_setting( 'penci_footer_signup_button_text_hover', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_signup_button_text_hover', array(
	'label'    => 'SignUp Form Submit Hover Text Color',
	'section'  => 'penci_section_footer_signupform',
	'settings' => 'penci_footer_signup_button_text_hover',
) ) );

/* Colors */
$wp_customize->add_setting( 'penci_footer_copyright_bg_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_bg_color', array(
	'label'    => 'Footer Section Background Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_copyright_bg_color',
) ) );

$wp_customize->add_setting( 'penci_footer_copyright_bg_image', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_copyright_bg_image', array(
	'label'    => 'Footer Section Background Image',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_copyright_bg_image',
) ) );

$wp_customize->add_setting( 'penci_footer_warea_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_footer_warea_heading', array(
	'label'    => esc_html__( 'Footer Widgets Area', 'soledad' ),
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_warea_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_footer_widget_area_bg', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_area_bg', array(
	'label'    => 'Footer Widget Area Background',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_widget_area_bg',
) ) );

$wp_customize->add_setting( 'penci_footer_widget_bg_image', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_widget_bg_image', array(
	'label'    => 'Footer Widget Area Background Image',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_widget_bg_image',
) ) );

$wp_customize->add_setting( 'penci_footer_widget_area_text_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_area_text_color', array(
	'label'    => 'Footer Widget Area Text Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_widget_area_text_color',
) ) );

$wp_customize->add_setting( 'penci_footer_widget_area_list_border', array(
	'default'           => '#E0E0E0',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_area_list_border', array(
	'label'    => 'Footer Widget Area Borders Color for List',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_widget_area_list_border',
) ) );

$wp_customize->add_setting( 'penci_footer_widget_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_color', array(
	'label'    => 'Footer Widget Title Text Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_widget_color',
) ) );

$wp_customize->add_setting( 'penci_footer_widget_title_border_color', array(
	'default'           => '#e0e0e0',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_title_border_color', array(
	'label'    => 'Footer Widget Title Border Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_widget_title_border_color',
) ) );

$wp_customize->add_setting( 'penci_footer_widget_title_border_width', array(
	'default' => '3',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'footer_widget_title_border_width', array(
	'description' => __( 'Border Width of Footer Widget Titles', 'soledad' ),
	'section' => 'penci_section_footer_colors',
	'settings' => array(
		'desktop' => 'penci_footer_widget_title_border_width',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 20,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_footer_widget_accent_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_accent_color', array(
	'label'    => 'Footer Widget Accent Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_widget_accent_color',
) ) );

$wp_customize->add_setting( 'penci_footer_widget_accent_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_accent_hover_color', array(
	'label'    => 'Footer Widget Accent Hover Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_widget_accent_hover_color',
) ) );

$wp_customize->add_setting( 'penci_footer_instagram_bheading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_footer_instagram_bheading', array(
	'label'    => esc_html__( 'Footer Instagram', 'soledad' ),
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_instagram_bheading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'footer_instagram_border_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_instagram_border_color', array(
	'label'    => 'Footer Instagram Border Top Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'footer_instagram_border_color',
) ) );

$wp_customize->add_setting( 'penci_footer_instagram_title_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_instagram_title_color', array(
	'label'    => 'Footer Instagram Title Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_instagram_title_color',
) ) );

$wp_customize->add_setting( 'penci_footer_socialicons_bheading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_footer_socialicons_bheading', array(
	'label'    => esc_html__( 'Footer Social Icons', 'soledad' ),
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_socialicons_bheading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_footer_icon_color', array(
	'default'           => '#999999',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_icon_color', array(
	'label'    => 'Footer Social Icons Border & Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_icon_color',
) ) );

$wp_customize->add_setting( 'penci_footer_icon_hover_icon_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_icon_hover_icon_color', array(
	'label'    => 'Footer Social Icons Hover Icons Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_icon_hover_icon_color',
) ) );

$wp_customize->add_setting( 'penci_footer_icon_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_icon_hover_color', array(
	'label'    => 'Footer Social Icons Hover Border & Background Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_icon_hover_color',
) ) );

$wp_customize->add_setting( 'penci_footer_social_text_color', array(
	'default'           => '#999999',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_text_color', array(
	'label'    => 'Footer Social Text Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_social_text_color',
) ) );

$wp_customize->add_setting( 'penci_footer_social_hover_text_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_hover_text_color', array(
	'label'    => 'Footer Social Hover Text Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_social_hover_text_color',
) ) );

$wp_customize->add_setting( 'penci_footer_social_border_color', array(
	'default'           => '#4A4A4A',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_border_color', array(
	'label'    => 'Footer Section Social Border Bottom Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_social_border_color',
) ) );

$wp_customize->add_setting( 'penci_footer_menu_bheading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_footer_menu_bheading', array(
	'label'    => esc_html__( 'Footer Menu', 'soledad' ),
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_menu_bheading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_footer_menu_color', array(
	'default'           => '#999999',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_menu_color', array(
	'label'    => 'Footer Menu Text Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_menu_color',
) ) );

$wp_customize->add_setting( 'penci_footer_menu_color_hover', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_menu_color_hover', array(
	'label'    => 'Footer Menu Text Color Hover',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_menu_color_hover',
) ) );

$wp_customize->add_setting( 'penci_footer_copyright_text_color', array(
	'default'           => '#999999',
	'sanitize_callback' => 'sanitize_hex_color'
) );

$wp_customize->add_setting( 'penci_footer_copyright_bheading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_footer_copyright_bheading', array(
	'label'    => esc_html__( 'Footer Copyright Text', 'soledad' ),
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_copyright_bheading',
	'type'     => 'heading',
) ) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_text_color', array(
	'label'    => 'Footer Copyright Text Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_copyright_text_color',
) ) );

$wp_customize->add_setting( 'penci_footer_copyright_accent_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_accent_color', array(
	'label'    => 'Footer Copyright Accent Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_copyright_accent_color',
) ) );

$wp_customize->add_setting( 'penci_footer_gototop_bheading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_footer_gototop_bheading', array(
	'label'    => esc_html__( 'Go to Top Button', 'soledad' ),
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_gototop_bheading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_footer_go_top_color', array(
	'default'           => '#999999',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_go_top_color', array(
	'label'    => 'Go To Top Text & Icon Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_go_top_color',
) ) );

$wp_customize->add_setting( 'penci_footer_go_top_hover_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_go_top_hover_color', array(
	'label'    => 'Go To Top Text & Icon Hover Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_go_top_hover_color',
) ) );

$wp_customize->add_setting( 'penci_footer_go_top_float_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_go_top_float_color', array(
	'label'    => 'Go To Top Button Floating Background Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_go_top_float_color',
) ) );

$wp_customize->add_setting( 'penci_footer_go_top_float_icon_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_go_top_float_icon_color', array(
	'label'    => 'Go To Top Button Floating Icon Color',
	'section'  => 'penci_section_footer_colors',
	'settings' => 'penci_footer_go_top_float_icon_color',
) ) );
