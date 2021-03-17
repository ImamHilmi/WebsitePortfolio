<?php
/* Add Section */
$wp_customize->add_section( 'pencidesign_new_section_woocommerce', array(
	'title'    => esc_html__( 'General Options', 'soledad' ),
	'priority' => 1,
	'panel'    => 'woocommerce',
) );

/* Add Options */

$wp_customize->add_setting( 'penci_woo_shop_hide_cart_icon', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woo_shop_hide_cart_icon', array(
	'label'    => 'Hide Shopping Cart Icon on Header',
	'section'  => 'pencidesign_new_section_woocommerce',
	'settings' => 'penci_woo_shop_hide_cart_icon',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'size_header_cart_icon_check', array(
	'default'           => '17',
	'sanitize_callback' => 'penci_sanitize_number_field'
) );
$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'size_header_cart_icon_check', array(
	'label'    => 'Custom Size for Header Cart Icon',
	'section'  => 'pencidesign_new_section_woocommerce',
	'settings' => 'size_header_cart_icon_check',
	'type'     => 'number',
) ) );

$wp_customize->add_setting( 'penci_woo_shop_enable_sidebar', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woo_shop_enable_sidebar', array(
	'label'    => 'Enable Sidebar On Shop Page',
	'section'  => 'pencidesign_new_section_woocommerce',
	'settings' => 'penci_woo_shop_enable_sidebar',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_woo_cat_enable_sidebar', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woo_cat_enable_sidebar', array(
	'label'    => 'Enable Sidebar On Archive',
	'section'  => 'pencidesign_new_section_woocommerce',
	'settings' => 'penci_woo_cat_enable_sidebar',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_woo_single_enable_sidebar', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woo_single_enable_sidebar', array(
	'label'    => 'Enable Sidebar On Single Product',
	'section'  => 'pencidesign_new_section_woocommerce',
	'settings' => 'penci_woo_single_enable_sidebar',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_woo_left_sidebar', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woo_left_sidebar', array(
	'label'    => 'Enable Left Sidebar',
	'section'  => 'pencidesign_new_section_woocommerce',
	'settings' => 'penci_woo_left_sidebar',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_woo_disable_breadcrumb', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woo_disable_breadcrumb', array(
	'label'    => 'Disable Breadcrumb',
	'section'  => 'pencidesign_new_section_woocommerce',
	'settings' => 'penci_woo_disable_breadcrumb',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_woo_paging_align', array(
	'default'           => 'center',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woo_paging_align', array(
	'label'    => 'Page Navigation Alignment',
	'section'  => 'woocommerce_product_catalog',
	'settings' => 'penci_woo_paging_align',
	'type'     => 'select',
	'choices'  => array(
		'center' => 'Center',
		'left'   => 'Left',
		'right'  => 'Right'
	)
) ) );

$wp_customize->add_setting( 'penci_woo_disable_zoom', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woo_disable_zoom', array(
	'label'    => 'Disable Zoom on Gallery Product',
	'section'  => 'pencidesign_new_section_woocommerce',
	'settings' => 'penci_woo_disable_zoom',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_woo_post_per_page', array(
	'default'           => '24',
	'sanitize_callback' => 'penci_sanitize_number_field'
) );
$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'woo_post_per_page', array(
	'label'    => 'Custom Amount of Products Shown Per Page on Shop page & Categories page',
	'section'  => 'woocommerce_product_catalog',
	'settings' => 'penci_woo_post_per_page',
	'type'     => 'number',
) ) );

$wp_customize->add_setting( 'penci_woo_number_related_products', array(
	'default'           => '4',
	'sanitize_callback' => 'penci_sanitize_number_field'
) );
$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'woo_number_related_products', array(
	'label'    => 'Custom Amount of Related Products',
	'section'  => 'pencidesign_new_section_woocommerce',
	'settings' => 'penci_woo_number_related_products',
	'type'     => 'number',
) ) );