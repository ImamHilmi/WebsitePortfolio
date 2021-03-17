<?php
$wp_customize->add_section( 'pencidesign_new_section_topbar', array(
	'title'    => esc_html__( 'General Settings', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_topbar_panel',
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/topbar.png">this image</a> to know what is TopBar', 'soledad' ),
) );

$wp_customize->add_section( 'pencidesign_topbar_section_fontsize', array(
	'title'    => esc_html__( 'Font Size', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_topbar_panel'
) );

$wp_customize->add_section( 'pencidesign_topbar_section_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_topbar_panel'
) );

/* General Settings */
$wp_customize->add_setting( 'penci_top_bar_show', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_show', array(
	'label'    => 'Enable Top Bar',
	'section'  => 'pencidesign_new_section_topbar',
	'settings' => 'penci_top_bar_show',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_top_bar_full_width', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_full_width', array(
	'label'    => 'Enable Full Width Layout for Top Bar',
	'section'  => 'pencidesign_new_section_topbar',
	'settings' => 'penci_top_bar_full_width',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_top_bar_custom_text', array(
	'default'           => esc_html__( 'Top Posts', 'soledad' ),
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_custom_text', array(
	'label'       => 'Custom "Top Posts" Text',
	'section'     => 'pencidesign_new_section_topbar',
	'settings'    => 'penci_top_bar_custom_text',
	'description' => 'If you want hide Top Posts text, let empty this',
	'type'        => 'text',
) ) );

$wp_customize->add_setting( 'penci_top_bar_top_posts_lowcase', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_top_posts_lowcase', array(
	'label'    => 'Disable Uppercase for "Top Posts" text',
	'section'  => 'pencidesign_new_section_topbar',
	'settings' => 'penci_top_bar_top_posts_lowcase',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_top_bar_display_by', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_display_by', array(
	'label'    => 'Display Top Posts By',
	'section'  => 'pencidesign_new_section_topbar',
	'settings' => 'penci_top_bar_display_by',
	'type'     => 'select',
	'choices'  => array(
		''      => 'Recent Posts',
		'all'   => 'Popular Posts All Time',
		'week'  => 'Popular Posts Once Weekly',
		'month' => 'Popular Posts Once Month'
	)
) ) );

$wp_customize->add_setting( 'penci_top_bar_filter_by', array(
	'default'           => 'category',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_filter_by', array(
	'label'    => 'Filter Topbar By',
	'section'  => 'pencidesign_new_section_topbar',
	'settings' => 'penci_top_bar_filter_by',
	'type'     => 'radio',
	'choices'  => array(
		'category' => 'Category',
		'tags'     => 'Tags'
	)
) ) );

$wp_customize->add_setting( 'penci_top_bar_category', array(
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Category_Control( $wp_customize, 'top_bar_category', array(
	'label'       => 'Select "Top Posts" Category',
	'section'     => 'pencidesign_new_section_topbar',
	'settings'    => 'penci_top_bar_category',
	'description' => 'This option just apply when you select "Filter Topbar by" Category above',
) ) );

$wp_customize->add_setting( 'penci_top_bar_tags', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_tags', array(
	'label'       => 'Fill List Tags for Filter by Tags on "Top Post"',
	'section'     => 'pencidesign_new_section_topbar',
	'settings'    => 'penci_top_bar_tags',
	'description' => 'This option just apply when you select "Filter Topbar by" Tags above. And please fill list featured tags slug here, check <a rel="nofollow" href="http://soledad.pencidesign.com/soledad-document/images/tags.png" target="_blank">this image</a> to know what is tags slug. Example for multiple tags slug, fill:  tag-1, tag-2, tag-3',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_top_bar_title_length', array(
	'default' => '8',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'top_bar_title_length', array(
	'description' => __( 'Words Length for Post Titles on Top Posts', 'soledad' ),
	'section' => 'pencidesign_new_section_topbar',
	'settings' => array(
		'desktop' => 'penci_top_bar_title_length',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 50,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_top_bar_off_uppercase', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_off_uppercase', array(
	'label'    => 'Turn Off Uppercase Post Titles on Top Bar',
	'section'  => 'pencidesign_new_section_topbar',
	'settings' => 'penci_top_bar_off_uppercase',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_top_bar_posts_autoplay', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_posts_autoplay', array(
	'label'    => 'Disable Auto Play Posts on Top Bar',
	'section'  => 'pencidesign_new_section_topbar',
	'settings' => 'penci_top_bar_posts_autoplay',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_top_bar_auto_time', array(
	'default' => '3000',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'top_bar_auto_time', array(
	'description' => __( 'Top Posts Autoplay Timeout', 'soledad' ),
	'sub_description' => __( '1000 = 1 second', 'soledad' ),
	'section' => 'pencidesign_new_section_topbar',
	'settings' => array(
		'desktop' => 'penci_top_bar_auto_time',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 100,
			'max' => 8000,
			'step' => 100,
			'edit' => true,
			'unit' => '',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_top_bar_auto_speed', array(
	'default' => '300',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'top_bar_auto_speed', array(
	'description' => __( 'Top Posts Autoplay Speed', 'soledad' ),
	'sub_description' => __( '1000 = 1 second', 'soledad' ),
	'section' => 'pencidesign_new_section_topbar',
	'settings' => array(
		'desktop' => 'penci_top_bar_auto_speed',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 10,
			'max' => 5000,
			'step' => 10,
			'edit' => true,
			'unit' => '',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_top_bar_posts_per_page', array(
	'default' => '10',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'top_bar_posts_per_page', array(
	'description' => __( 'Amount of Posts Display on Top Posts', 'soledad' ),
	'section' => 'pencidesign_new_section_topbar',
	'settings' => array(
		'desktop' => 'penci_top_bar_posts_per_page',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 50,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_top_bar_enable_menu', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_enable_menu', array(
	'label'       => 'Enable Topbar Menu',
	'section'     => 'pencidesign_new_section_topbar',
	'description' => 'If you enable topbar menu, you need go to Dashboard > Appearance > Menus > create/select a menu for your topbar > scroll down and check to "Topbar Menu" at the bottom',
	'settings'    => 'penci_top_bar_enable_menu',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_top_bar_off_uppercase_menu', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_off_uppercase_menu', array(
	'label'    => 'Turn Off Uppercase on Topbar Menu',
	'section'  => 'pencidesign_new_section_topbar',
	'settings' => 'penci_top_bar_off_uppercase_menu',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_top_bar_hide_social', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_hide_social', array(
	'label'    => 'Hide Social Icons on Top Bar',
	'section'  => 'pencidesign_new_section_topbar',
	'settings' => 'penci_top_bar_hide_social',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_top_bar_brand_social', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_bar_brand_social', array(
	'label'    => 'Enable Use Brand Colors for Social Icons on Top Bar',
	'section'  => 'pencidesign_new_section_topbar',
	'settings' => 'penci_top_bar_brand_social',
	'type'     => 'checkbox',
) ) );

/* Font Size */
$wp_customize->add_setting( 'penci_top_bar_top_post_size', array(
	'default' => '12',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'top_bar_top_post_size', array(
	'description' => __( 'Font Size for "Top Posts" text', 'soledad' ),
	'section' => 'pencidesign_topbar_section_fontsize',
	'settings' => array(
		'desktop' => 'penci_top_bar_top_post_size',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 50,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_top_bar_top_post_size_title', array(
	'default' => '12',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'top_bar_top_post_size_title', array(
	'description' => __( 'Font Size for Post Titles on "Top Posts"', 'soledad' ),
	'section' => 'pencidesign_topbar_section_fontsize',
	'settings' => array(
		'desktop' => 'penci_top_bar_top_post_size_title',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 50,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_top_bar_menu_level_one', array(
	'default' => '11',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'top_bar_menu_level_one', array(
	'description' => __( 'Font Size for Topbar Menu Level 1', 'soledad' ),
	'section' => 'pencidesign_topbar_section_fontsize',
	'settings' => array(
		'desktop' => 'penci_top_bar_menu_level_one',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 50,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_top_bar_sub_menu_size', array(
	'default' => '11',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'top_bar_sub_menu_size', array(
	'description' => __( 'Font Size for Sub-menu on Topbar Menu', 'soledad' ),
	'section' => 'pencidesign_topbar_section_fontsize',
	'settings' => array(
		'desktop' => 'penci_top_bar_sub_menu_size',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 50,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_top_bar_social_size', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'top_bar_social_size', array(
	'description' => __( 'Font Size for Social Icons on Topbar', 'soledad' ),
	'section' => 'pencidesign_topbar_section_fontsize',
	'settings' => array(
		'desktop' => 'penci_top_bar_social_size',
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
$wp_customize->add_setting( 'penci_top_bar_bg', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bg', array(
	'label'    => 'Top Bar Background Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_bg',
) ) );

$wp_customize->add_setting( 'penci_top_bar_top_posts_bg', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_top_posts_bg', array(
	'label'    => '"Top Posts" Background Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_top_posts_bg',
) ) );

$wp_customize->add_setting( 'penci_top_bar_top_posts_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_top_posts_color', array(
	'label'    => '"Top Posts" Text Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_top_posts_color',
) ) );

$wp_customize->add_setting( 'penci_top_bar_button_color', array(
	'default'           => '#999999',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_button_color', array(
	'label'    => 'Next/Prev Posts Top Bar Button Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_button_color',
) ) );

$wp_customize->add_setting( 'penci_top_bar_button_hover_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_button_hover_color', array(
	'label'    => 'Next/Prev Posts Top Bar Button Hover Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_button_hover_color',
) ) );

$wp_customize->add_setting( 'penci_top_bar_title_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_title_color', array(
	'label'    => 'Top Bar Posts Title Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_title_color',
) ) );

$wp_customize->add_setting( 'penci_top_bar_title_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_title_hover_color', array(
	'label'    => 'Top Bar Post Titles Hover Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_title_hover_color',
) ) );

$wp_customize->add_setting( 'penci_top_bar_menu_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_menu_color', array(
	'label'    => 'Top Bar Menu Text Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_menu_color',
) ) );

$wp_customize->add_setting( 'penci_top_bar_menu_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_menu_hover_color', array(
	'label'    => 'Top Bar Menu Text Hover Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_menu_hover_color',
) ) );

$wp_customize->add_setting( 'penci_top_bar_menu_border', array(
	'default'           => '#414141',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_menu_border', array(
	'label'    => 'Top Bar Menu Border Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_menu_border',
) ) );

$wp_customize->add_setting( 'penci_top_bar_menu_dropdown_bg', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_menu_dropdown_bg', array(
	'label'    => 'Top Bar Menu Dropdown Background Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_menu_dropdown_bg',
) ) );

$wp_customize->add_setting( 'penci_top_bar_social_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_social_color', array(
	'label'    => 'Top Bar Social Icons Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_social_color',
) ) );

$wp_customize->add_setting( 'penci_top_bar_social_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_social_hover_color', array(
	'label'    => 'Top Bar Social Icons Hover Color',
	'section'  => 'pencidesign_topbar_section_colors',
	'settings' => 'penci_top_bar_social_hover_color',
) ) );