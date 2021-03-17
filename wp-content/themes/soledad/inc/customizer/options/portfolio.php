<?php
/* Add Panel */
$wp_customize->add_panel( 'penci_portfolio_section_panel', array(
	'priority'       => 70,
	'title'            => __( 'Portfolio', 'soledad' ),
	'description'      => __( '', 'soledad' ),
) );

/* Add Options */
$wp_customize->add_section( 'pencidesign_portfolio_sgeneral', array(
	'title'    => esc_html__( 'General', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_portfolio_section_panel'
) );

$wp_customize->add_section( 'pencidesign_portfolio_scolor', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_portfolio_section_panel'
) );

$wp_customize->add_section( 'pencidesign_portfolio_sadvanced', array(
	'title'    => esc_html__( 'Advanced', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_portfolio_section_panel'
) );

/* General */
$wp_customize->add_setting( 'penci_portfolio_cat_enable_sidebar', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_cat_enable_sidebar', array(
	'label'    => 'Enable Sidebar On Portfolio Categories',
	'section'  => 'pencidesign_portfolio_sgeneral',
	'settings' => 'penci_portfolio_cat_enable_sidebar',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_portfolio_single_enable_sidebar', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_cat_enable_sidebar', array(
	'label'    => 'Enable Sidebar On Single Portfolio',
	'section'  => 'pencidesign_portfolio_sgeneral',
	'settings' => 'penci_portfolio_single_enable_sidebar',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_portfolio_single_enable_2sidebar', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_single_enable_2sidebar', array(
	'label'    => 'Enable Two Sidebars On Single Portfolio',
	'section'  => 'pencidesign_portfolio_sgeneral',
	'settings' => 'penci_portfolio_single_enable_2sidebar',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_sidebar_single_portfolio', array(
	'default'           => 'main-sidebar',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_single_portfolio', array(
	'label'       => 'Custom Sidebar for Single Portfolio',
	'section'     => 'pencidesign_portfolio_sgeneral',
	'settings'    => 'penci_sidebar_single_portfolio',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar',
	'type'        => 'select',
	'choices'     => get_list_custom_sidebar_option()
) ) );

$wp_customize->add_setting( 'penci_sidebar_left_single_portfolio', array(
	'default'           => 'main-sidebar-left',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_left_single_portfolio', array(
	'label'       => 'Custom Sidebar Left for Single Portfolio',
	'section'     => 'pencidesign_portfolio_sgeneral',
	'settings'    => 'penci_sidebar_left_single_portfolio',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar Left. This option just use when you enable 2 sidebars for Single Portfolio',
	'type'        => 'select',
	'choices'     => get_list_custom_sidebar_option()
) ) );

$wp_customize->add_setting( 'penci_portfolio_hide_featured_image_single', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_hide_featured_image_single', array(
	'label'    => 'Hide Featured Image on Single Portfolio',
	'section'  => 'pencidesign_portfolio_sgeneral',
	'settings' => 'penci_portfolio_hide_featured_image_single',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_portfolio_share_box', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_share_box', array(
	'label'    => 'Hide Share Box on Single Portfolio',
	'section'  => 'pencidesign_portfolio_sgeneral',
	'settings' => 'penci_portfolio_share_box',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_portfolio_next_prev_project', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_next_prev_project', array(
	'label'    => 'Enable Next/Prev Project on Single Portfolio',
	'section'  => 'pencidesign_portfolio_sgeneral',
	'settings' => 'penci_portfolio_next_prev_project',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_portfolio_next_text', array(
	'default'           => 'Next Project',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_next_text', array(
	'label'    => 'Custom Text for Next Project Button',
	'section'  => 'pencidesign_portfolio_sgeneral',
	'settings' => 'penci_portfolio_next_text',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_portfolio_prev_text', array(
	'default'           => 'Previous Project',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_prev_text', array(
	'label'    => 'Custom Text for Previous Project Button',
	'section'  => 'pencidesign_portfolio_sgeneral',
	'settings' => 'penci_portfolio_prev_text',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_portfolio_enable_comment', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_enable_comment', array(
	'label'    => 'Enable Comment on Single Portfolio',
	'section'  => 'pencidesign_portfolio_sgeneral',
	'settings' => 'penci_portfolio_enable_comment',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_portfolio_layout', array(
	'default'           => 'masonry',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_layout', array(
	'label'    => 'Portfolio Category Layout',
	'section'  => 'pencidesign_portfolio_sgeneral',
	'settings' => 'penci_portfolio_layout',
	'type'     => 'radio',
	'choices'  => array(
		'masonry' => 'Masonry Layout',
		'grid'    => 'Grid Layout'
	)
) ) );

$wp_customize->add_setting( 'penci_portfolio_item_style', array(
	'default'           => 'text_overlay',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_portfolio_item_style', array(
	'label'    => 'Portfolio Category Layout',
	'section'  => 'pencidesign_portfolio_sgeneral',
	'settings' => 'penci_portfolio_item_style',
	'type'     => 'radio',
	'choices'  => array(
		'text_overlay' => 'Text Overlay',
		'below_img'    => 'Text Below Image'
	)
) ) );

/* Colors */
$wp_customize->add_setting( 'penci_portfolio_overlay_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_overlay_color', array(
	'label'    => 'Portfolio Overlay Hover Color',
	'section'  => 'pencidesign_portfolio_scolor',
	'settings' => 'penci_portfolio_overlay_color',
) ) );

$wp_customize->add_setting( 'penci_portfolio_overlay_opacity', array(
	'default'           => '0.85',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_overlay_opacity', array(
	'label'    => 'Portfolio Overlay Hover Opacity',
	'section'  => 'pencidesign_portfolio_scolor',
	'settings' => 'penci_portfolio_overlay_opacity',
	'type'     => 'select',
	'choices'  => array(
		'0.05' => '0.05',
		'0.1'  => '0.1',
		'0.15' => '0.15',
		'0.2'  => '0.2',
		'0.25' => '0.25',
		'0.3'  => '0.3',
		'0.35' => '0.35',
		'0.4'  => '0.4',
		'0.45' => '0.45',
		'0.5'  => '0.5',
		'0.55' => '0.55',
		'0.6'  => '0.6',
		'0.65' => '0.65',
		'0.7'  => '0.7',
		'0.75' => '0.75',
		'0.8'  => '0.8',
		'0.85' => '0.85',
		'0.9'  => '0.9',
		'0.95' => '0.95',
		'1'    => '1',
	)
) ) );

$wp_customize->add_setting( 'penci_portfolio_title_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_title_color', array(
	'label'    => 'Portfolio Post Title Color',
	'section'  => 'pencidesign_portfolio_scolor',
	'settings' => 'penci_portfolio_title_color',
) ) );

$wp_customize->add_setting( 'penci_portfolio_title_hcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_title_hcolor', array(
	'label'    => 'Portfolio Post Title Hover Color',
	'section'  => 'pencidesign_portfolio_scolor',
	'settings' => 'penci_portfolio_title_hcolor',
) ) );

$wp_customize->add_setting( 'penci_portfolio_cate_color', array(
	'default'           => '#888888',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_cate_color', array(
	'label'    => 'Portfolio Post Categories Color',
	'section'  => 'pencidesign_portfolio_scolor',
	'settings' => 'penci_portfolio_cate_color',
) ) );

$wp_customize->add_setting( 'penci_portfolio_cate_hcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_cate_hcolor', array(
	'label'    => 'Portfolio Post Categories Hover Color',
	'section'  => 'pencidesign_portfolio_scolor',
	'settings' => 'penci_portfolio_cate_hcolor',
) ) );

/* Advanced */
$wp_customize->add_setting( 'penci_pfl_custom_slug', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'penci_pfl_custom_slug', array(
	'label'       => esc_html__( 'Custom portfolio item URL prefix', 'soledad' ),
	'section'     => 'pencidesign_portfolio_sadvanced',
	'settings'    => 'penci_pfl_custom_slug',
	'description' => sprintf( __( 'When you change this setting you need to Save Changes again the  %s permalinks rules here. %s', 'soledad' ), '<a href="' . admin_url( 'options-permalink.php' ) . '" target="_bank">', '</a>' ),
	'input_attrs' => array(
		'placeholder' => __( 'Current portfolio slug: portfolio', 'soledad' ),
	),
) );

$wp_customize->add_setting( 'penci_pfl_custom_catslug', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'penci_pfl_custom_catslug', array(
	'label'       => esc_html__( 'Custom portfolio category URL prefix', 'soledad' ),
	'section'     => 'pencidesign_portfolio_sadvanced',
	'settings'    => 'penci_pfl_custom_catslug',
	'description' => sprintf( __( 'When you change this setting you need to Save Changes again the  %s permalinks rules here. %s', 'soledad' ), '<a href="' . admin_url( 'options-permalink.php' ) . '" target="_bank">', '</a>' ),
	'input_attrs' => array(
		'placeholder' => __( 'Current category slug: portfolio-category', 'soledad' ),
	),
) );