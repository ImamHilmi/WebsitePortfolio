<?php
/* Add Sections */
$wp_customize->add_section( 'pencidesign_new_section_general', array(
	'title'    => esc_html__( 'General Settings', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_general_panel'
) );

$wp_customize->add_section( 'pencidesign_general_body_boxed', array(
	'title'    => esc_html__( 'Body Boxed', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_general_panel'
) );

$wp_customize->add_section( 'pencidesign_general_archive_page', array(
	'title'    => esc_html__( 'Category, Tags, Search, Archive Pages', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_general_panel'
) );

$wp_customize->add_section( 'pencidesign_general_gdpr', array(
	'title'    => esc_html__( 'GDPR Policy', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_general_panel'
) );

$wp_customize->add_section( 'pencidesign_general_social_sharing', array(
	'title'    => esc_html__( 'Show/Hide Social Sharing', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_general_panel'
) );

$wp_customize->add_section( 'pencidesign_general_image_sizes', array(
	'title'    => esc_html__( 'Manage Image Sizes', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_general_panel'
) );

$wp_customize->add_section( 'pencidesign_general_schema_markup', array(
	'title'    => esc_html__( 'Schema Markup', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_general_panel'
) );

$wp_customize->add_section( 'pencidesign_general_extra', array(
	'title'    => esc_html__( 'Extra Options', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_general_panel'
) );
$wp_customize->add_section( 'pencidesign_general_typography', array(
	'title'    => esc_html__( 'Typography', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_general_panel'
) );
$wp_customize->add_section( 'pencidesign_general_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_general_panel'
) );

/* General Settings */
$wp_customize->add_setting( 'penci_favicon', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_favicon', array(
	'label'    => 'Upload Favicon',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_favicon',
) ) );

$wp_customize->add_setting( 'penci_disable_lazyload_layout', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'disable_lazyload_layout', array(
	'label'    => 'Disable Lazyload on All Posts Layouts & Widgets',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_disable_lazyload_layout',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_image_size', array(
	'default'           => 'horizontal',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_image_size', array(
	'label'       => 'Featured Images Type:',
	'section'     => 'pencidesign_new_section_general',
	'settings'    => 'penci_featured_image_size',
	'description' => 'This feature does not apply for Featured Sliders and some special places. For featured images on category mega menu items, please select option for it via <strong>Customize > Logo & Header</strong>',
	'type'        => 'radio',
	'choices'     => array(
		'horizontal' => 'Horizontal Size',
		'square'     => 'Square Size',
		'vertical'   => 'Vertical Size',
		'custom'     => 'Custom',
	)
) ) );

$wp_customize->add_setting( 'penci_general_featured_image_ratio', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_general_featured_image_ratio', array(
	'label'       => 'Custom Aspect Ratio for Featured Image',
	'section'     => 'pencidesign_new_section_general',
	'settings'    => 'penci_general_featured_image_ratio',
	'description' => 'The aspect ratio of an element describes the proportional relationship between its width and its height. E.g: <strong>3:2</strong>. Default is 3:2 . This option apply  for <strong>Featured Images Type is Custom</strong>',
) ) );

$wp_customize->add_setting( 'penci_image_border_radius', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'image_border_radius', array(
	'label'       => 'Custom Border Radius for Featured Images',
	'section'     => 'pencidesign_new_section_general',
	'settings'    => 'penci_image_border_radius',
	'description' => 'Fill value for border radius you want here - You can use pixel or percent. E.g:  <strong>10px</strong>  or  <strong>10%</strong>',
) ) );

$wp_customize->add_setting( 'penci_general_post_orderby', array(
	'default'           => 'date',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'general_post_orderby', array(
	'label'    => 'Sort Posts By',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_general_post_orderby',
	'type'     => 'select',
	'choices'  => array(
		'date'          => 'Published Date',
		'ID'            => 'Post ID',
		'modified'      => 'Modified Date',
		'title'         => 'Post Title',
		'rand'          => 'Random Posts',
		'comment_count' => 'Comment Count'
	)
) ) );

$wp_customize->add_setting( 'penci_general_post_order', array(
	'default'           => 'DESC',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'general_post_order', array(
	'label'    => 'Select Posts Order',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_general_post_order',
	'type'     => 'select',
	'choices'  => array(
		'DESC' => 'Descending',
		'ASC'  => 'Ascending '
	)
) ) );

$wp_customize->add_setting( 'penci_disable_breadcrumb', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'disable_breadcrumb', array(
	'label'    => 'Disable Breadcrumb',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_disable_breadcrumb',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_show_modified_date', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'show_modified_date', array(
	'label'    => 'Display Modified Date Replace with Published Date',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_show_modified_date',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_enable_smooth_scroll', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_smooth_scroll', array(
	'label'    => 'Enable Smooth Scroll',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_enable_smooth_scroll',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_include_search_page', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'include_search_page', array(
	'label'    => 'Include Pages on Search Results Page',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_include_search_page',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_page_navigation_numbers', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_navigation_numbers', array(
	'label'    => 'Enable Page Navigation Numbers',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_page_navigation_numbers',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_page_navigation_align', array(
	'default'           => 'align-left',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_navigation_align', array(
	'label'    => 'Page Navigation Numbers Alignment',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_page_navigation_align',
	'type'     => 'select',
	'choices'  => array(
		'align-left'   => 'Left',
		'align-right'  => 'Right',
		'align-center' => 'Center',
	)
) ) );

$wp_customize->add_setting( 'penci_sidebar_sticky', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_sticky', array(
	'label'    => 'Enable Sticky Sidebar',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_sidebar_sticky',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_dis_sidebar_bbforums', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_dis_sidebar_bbforums', array(
	'label'    => 'Disable Sidebar for BBPress Forums',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_dis_sidebar_bbforums',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_dis_sidebar_bbforum', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_dis_sidebar_bbforum', array(
	'label'    => 'Disable Sidebar for BBPress Forum',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_dis_sidebar_bbforum',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_dis_sidebar_bbtoppic', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_dis_sidebar_bbtoppic', array(
	'label'    => 'Disable Sidebar for BBPress Topic',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_dis_sidebar_bbtoppic',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'enable_pri_cat_yoast_seo', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_pri_cat_yoast_seo', array(
	'label'    => 'Enable Primary Category Feature from Yoast SEO plugin for Breadcrumb',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'enable_pri_cat_yoast_seo',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_show_pricat_yoast_only', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_show_pricat_yoast_only', array(
	'label'    => 'Show Primary Category from Yoast SEO only',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_show_pricat_yoast_only',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_show_pricat_first_yoast', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_show_pricat_first_yoast', array(
	'label'    => 'Show Primary Category at First ( When you display full categories )',
	'section'  => 'pencidesign_new_section_general',
	'settings' => 'penci_show_pricat_first_yoast',
	'type'     => 'checkbox',
) ) );

/* Body Boxed Pages */
$wp_customize->add_setting( 'penci_body_boxed_layout', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'body_boxed_layout', array(
	'label'       => 'Enable Body Boxed Layout',
	'section'     => 'pencidesign_general_body_boxed',
	'description' => 'This option does not apply when you enable vertical navigation',
	'settings'    => 'penci_body_boxed_layout',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_body_boxed_bg_color', array(
	'default'           => '#F5F5F5',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_boxed_bg_color', array(
	'label'    => 'Background Color for Body Boxed',
	'section'  => 'pencidesign_general_body_boxed',
	'settings' => 'penci_body_boxed_bg_color',
) ) );

$wp_customize->add_setting( 'penci_body_boxed_bg_image', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'body_boxed_bg_image', array(
	'label'    => 'Background Image for Body Boxed',
	'section'  => 'pencidesign_general_body_boxed',
	'settings' => 'penci_body_boxed_bg_image',
) ) );

$wp_customize->add_setting( 'penci_body_boxed_bg_repeat', array(
	'default'           => 'no-repeat',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'body_boxed_bg_repeat', array(
	'label'    => 'Background Body Boxed Repeat',
	'section'  => 'pencidesign_general_body_boxed',
	'settings' => 'penci_body_boxed_bg_repeat',
	'type'     => 'select',
	'choices'  => array(
		'no-repeat' => 'No Repeat',
		'repeat'    => 'Repeat'
	)
) ) );

$wp_customize->add_setting( 'penci_body_boxed_bg_attachment', array(
	'default'           => 'fixed',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'body_boxed_bg_attachment', array(
	'label'    => 'Background Body Boxed Attachment',
	'section'  => 'pencidesign_general_body_boxed',
	'settings' => 'penci_body_boxed_bg_attachment',
	'type'     => 'select',
	'choices'  => array(
		'fixed'  => 'Fixed',
		'scroll' => 'Scroll',
		'local'  => 'Local'
	)
) ) );

$wp_customize->add_setting( 'penci_body_boxed_bg_size', array(
	'default'           => 'cover',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'body_boxed_bg_size', array(
	'label'    => 'Background Body Boxed Size',
	'section'  => 'pencidesign_general_body_boxed',
	'settings' => 'penci_body_boxed_bg_size',
	'type'     => 'select',
	'choices'  => array(
		'cover' => 'Cover',
		'auto'  => 'Auto',
	)
) ) );

/* Arhive Pages */
$wp_customize->add_setting( 'penci_archive_layout', array(
	'default'           => 'standard',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'archive_layout', array(
	'label'    => 'Category, Tag, Search, Archive Layout',
	'section'  => 'pencidesign_general_archive_page',
	'settings' => 'penci_archive_layout',
	'type'     => 'radio',
	'choices'  => array(
		'standard'         => 'Standard Posts',
		'classic'          => 'Classic Posts',
		'overlay'          => 'Overlay Posts',
		'grid'             => 'Grid Posts',
		'grid-2'           => 'Grid 2 Columns Posts',
		'masonry'          => 'Grid Masonry Posts',
		'masonry-2'        => 'Grid Masonry 2 Columns Posts',
		'list'             => 'List Posts',
		'boxed-1'          => 'Boxed Posts Style 1',
		'boxed-2'          => 'Boxed Posts Style 2',
		'mixed'            => 'Mixed Posts',
		'mixed-2'          => 'Mixed Posts Style 2',
		'photography'      => 'Photography Posts',
		'standard-grid'    => '1st Standard Then Grid',
		'standard-grid-2'  => '1st Standard Then Grid 2 Columns',
		'standard-list'    => '1st Standard Then List',
		'standard-boxed-1' => '1st Standard Then Boxed',
		'classic-grid'     => '1st Classic Then Grid',
		'classic-grid-2'   => '1st Classic Then Grid 2 Columns',
		'classic-list'     => '1st Classic Then List',
		'classic-boxed-1'  => '1st Classic Then Boxed',
		'overlay-grid'     => '1st Overlay Then Grid',
		'overlay-list'     => '1st Overlay Then List'
	)
) ) );

$wp_customize->add_setting( 'penci_archive_ad_above', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'archive_ad_above', array(
	'label'       => 'Google Adsense/Custom HTML Code to Display Above Posts Layout for Archive Pages',
	'section'     => 'pencidesign_general_archive_page',
	'settings'    => 'penci_archive_ad_above',
	'description' => 'You can display google adsense/custom HTML code above posts on category, tags, search, archive page by use this option',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_archive_ad_below', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'archive_ad_below', array(
	'label'       => 'Google Adsense/Custom HTML Code to Display Below Posts Layout for Archive Pages',
	'section'     => 'pencidesign_general_archive_page',
	'settings'    => 'penci_archive_ad_below',
	'description' => 'You can display google adsense/custom HTML code below posts on category, tags, search, archive page by use this option',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_archive_nav_ajax', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_archive_nav_ajax', array(
	'label'    => 'Enable Load More Button for Categories, Tags, Search, Archive Pages',
	'section'  => 'pencidesign_general_archive_page',
	'settings' => 'penci_archive_nav_ajax',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_archive_nav_scroll', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_archive_nav_scroll', array(
	'label'    => 'Enable Infinite Scroll for Categories, Tags, Search, Archive Pages',
	'section'  => 'pencidesign_general_archive_page',
	'settings' => 'penci_archive_nav_scroll',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_arc_number_load_more', array(
	'default' => '6',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_arc_number_load_more', array(
	'description' => __( 'Number of Posts for Each Time Load More Posts', 'soledad' ),
	'section' => 'pencidesign_general_archive_page',
	'settings' => array(
		'desktop' => 'penci_arc_number_load_more',
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

$wp_customize->add_setting( 'penci_sidebar_archive', array(
	'default'           => true,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_archive', array(
	'label'    => 'Enable Sidebar On Archives',
	'section'  => 'pencidesign_general_archive_page',
	'settings' => 'penci_sidebar_archive',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_left_sidebar_archive', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'left_sidebar_archive', array(
	'label'    => 'Enable Left Sidebar On Archives',
	'section'  => 'pencidesign_general_archive_page',
	'settings' => 'penci_left_sidebar_archive',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_two_sidebar_archive', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'two_sidebar_archive', array(
	'label'    => 'Enable Two Sidebars On Archives',
	'section'  => 'pencidesign_general_archive_page',
	'settings' => 'penci_two_sidebar_archive',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_remove_cat_words', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'remove_cat_words', array(
	'label'    => 'Remove "Category:" Words on Category Pages',
	'section'  => 'pencidesign_general_archive_page',
	'settings' => 'penci_remove_cat_words',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_remove_tag_words', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'remove_tag_words', array(
	'label'    => 'Remove "Tag:" Words on Tag Pages',
	'section'  => 'pencidesign_general_archive_page',
	'settings' => 'penci_remove_tag_words',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_sidebar_name_category', array(
	'default'           => 'main-sidebar',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_name_category', array(
	'label'       => 'Custom Sidebar Display',
	'section'     => 'pencidesign_general_archive_page',
	'settings'    => 'penci_sidebar_name_category',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar',
	'type'        => 'select',
	'choices'     => get_list_custom_sidebar_option()
) ) );

$wp_customize->add_setting( 'penci_sidebar_left_name_category', array(
	'default'           => 'main-sidebar-left',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_left_name_category', array(
	'label'       => 'Custom Sidebar Left Display',
	'section'     => 'pencidesign_general_archive_page',
	'settings'    => 'penci_sidebar_left_name_category',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar Left. This option just use when you enable 2 sidebars for Archive pages',
	'type'        => 'select',
	'choices'     => get_list_custom_sidebar_option()
) ) );

/* GDPR Policy */
$wp_customize->add_setting( 'penci_disable_default_fonts', array(
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_disable_default_fonts', array(
	'label'    => esc_html__( 'Remove all default google fonts - load default fonts from located hosting', 'soledad' ),
	'section'  => 'pencidesign_general_gdpr',
	'settings' => 'penci_disable_default_fonts',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_disable_all_fonts', array(
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_disable_all_fonts', array(
	'label'    => esc_html__( 'Remove all default fonts loads by the theme from located hosting', 'soledad' ),
	'section'  => 'pencidesign_general_gdpr',
	'settings' => 'penci_disable_all_fonts',
	'description'  => 'This option only works when you check to option "Remove all default google fonts" above.',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_enable_cookie_law', array(
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_enable_cookie_law', array(
	'label'    => esc_html__( 'Enable Cookie Law Policy PopUp At The Footer', 'soledad' ),
	'section'  => 'pencidesign_general_gdpr',
	'settings' => 'penci_enable_cookie_law',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_show_cookie_law', array(
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_show_cookie_law', array(
	'label'    => esc_html__( 'Remove "Privacy & Cookies Policy" notice after Accept clicked', 'soledad' ),
	'section'  => 'pencidesign_general_gdpr',
	'settings' => 'penci_show_cookie_law',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_gprd_desc', array(
	'default'           => penci_default_setting_customizer( 'penci_gprd_desc' ),
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_gprd_desc', array(
	'label'    => esc_html__( 'Custom Description on Cookie Law PopUp', 'soledad' ),
	'section'  => 'pencidesign_general_gdpr',
	'settings' => 'penci_gprd_desc',
	'type'     => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_gprd_btn_accept', array(
	'default'           => penci_default_setting_customizer( 'penci_gprd_btn_accept' ),
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_gprd_btn_accept', array(
	'label'    => esc_html__( 'Custom Text "Accept"', 'soledad' ),
	'section'  => 'pencidesign_general_gdpr',
	'settings' => 'penci_gprd_btn_accept',
) ) );

$wp_customize->add_setting( 'penci_gprd_rmore', array(
	'default'           => penci_default_setting_customizer( 'penci_gprd_rmore' ),
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_gprd_rmore', array(
	'label'    => esc_html__( 'Custom Text "Read More"', 'soledad' ),
	'section'  => 'pencidesign_general_gdpr',
	'settings' => 'penci_gprd_rmore',
) ) );

$wp_customize->add_setting( 'penci_gprd_rmore_link', array(
	'default'           => penci_default_setting_customizer( 'penci_gprd_rmore_link' ),
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_gprd_rmore_link', array(
	'label'    => esc_html__( 'Custom URL on "Read More" Button', 'soledad' ),
	'section'  => 'pencidesign_general_gdpr',
	'settings' => 'penci_gprd_rmore_link',
) ) );

$wp_customize->add_setting( 'penci_gprd_policy_text', array(
	'default'           => penci_default_setting_customizer( 'penci_gprd_policy_text' ),
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_gprd_policy_text', array(
	'label'    => esc_html__( 'Custom Text "Privacy & Cookies Policy"', 'soledad' ),
	'section'  => 'pencidesign_general_gdpr',
	'settings' => 'penci_gprd_policy_text',
) ) );

$options_color_gprd = array(
	'penci_gprd_bgcolor'     => esc_html__( 'Background For Cookie Law Policy PopUp', 'soledad' ),
	'penci_gprd_color'       => esc_html__( 'Text Color For Cookie Law Policy PopUp', 'soledad' ),
	'penci_gprd_btn_color'   => esc_html__( 'Text Color For Accept Button', 'soledad' ),
	'penci_gprd_btn_bgcolor' => esc_html__( 'Background For Accept Button', 'soledad' ),
	'penci_gprd_border'      => esc_html__( 'Border Color For Cookie Law Policy PopUp', 'soledad' ),
);
foreach ( $options_color_gprd as $key => $label ) {
	$wp_customize->add_setting( $key, array(
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $key, array(
		'label'    => $label,
		'section'  => 'pencidesign_general_gdpr',
		'settings' => $key,
	) ) );
}

/* Social Sharing */
$list_block_social = array(
	'plike'       => esc_html__( 'Hide Post Like', 'soledad' ),
	'facebook'    => esc_html__( 'Hide Share Facebook', 'soledad' ),
	'twitter'     => esc_html__( 'Hide Share Twitter', 'soledad' ),
	'pinterest'   => esc_html__( 'Hide Share Pinterest', 'soledad' ),
	'linkedin'    => esc_html__( 'Hide Share Linkedin', 'soledad' ),
	'tumblr'      => esc_html__( 'Hide Share Tumblr', 'soledad' ),
	'reddit'      => esc_html__( 'Hide Share Reddit', 'soledad' ),
	'stumbleupon' => esc_html__( 'Hide Share Stumbleupon', 'soledad' ),
	'whatsapp'    => esc_html__( 'Hide Share Whatsapp', 'soledad' ),
	'telegram'    => esc_html__( 'Hide Share Telegram', 'soledad' ),
	'line'        => esc_html__( 'Hide Share LINE', 'soledad' ),
	'email'       => esc_html__( 'Hide Share Email', 'soledad' ),
);

foreach ( $list_block_social as $social_id => $social_label ) {

	$default = '';
	if ( in_array( $social_id, array( 'linkedin', 'tumblr', 'reddit', 'stumbleupon', 'whatsapp', 'telegram', 'line' ) ) ) {
		$default = 1;
	}

	$social_id = 'penci__hide_share_' . $social_id;
	$wp_customize->add_setting( $social_id, array(
		'sanitize_callback' => 'penci_sanitize_checkbox_field',
		'default'           => $default
	) );
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		$social_id,
		array(
			'label'    => $social_label,
			'section'  => 'pencidesign_general_social_sharing',
			'type'     => 'checkbox',
			'settings' => $social_id,
		)
	) );

	$list_block_social ++;
}

/* Manage Image Sizes */
$list_image_sizes = array(
	'penci_dthumb_1920_auto'   => esc_html__( 'Disable Image Size - 1920 x auto', 'soledad' ),
	'penci_dthumb_1920_800'   => esc_html__( 'Disable Image Size - 1920 x 800px', 'soledad' ),
	'penci_dthumb_1170_auto'   => esc_html__( 'Disable Image Size - 1170 x auto', 'soledad' ),
	'penci_dthumb_1170_663'   => esc_html__( 'Disable Image Size - 1170 x 663px', 'soledad' ),
	'penci_dthumb_780_516'   => esc_html__( 'Disable Image Size - 780 x 516px', 'soledad' ),
	'penci_dthumb_585_390'   => esc_html__( 'Disable Image Size - 585 x 390px', 'soledad' ),
	'penci_dthumb_585_auto'   => esc_html__( 'Disable Image Size - 585 x auto', 'soledad' ),
	'penci_dthumb_585_585' => esc_html__( 'Disable Image Size - 585 x 585px', 'soledad' ),
	'penci_dthumb_480_650'  => esc_html__( 'Disable Image Size - 480 x 650px', 'soledad' ),
	'penci_dthumb_263_175'  => esc_html__( 'Disable Image Size - 263 x 175px', 'soledad' )
);
foreach ( $list_image_sizes as $id_size => $label_size ) {
	$wp_customize->add_setting( $id_size, array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $id_size, array(
		'label'    => $label_size,
		'section' => 'pencidesign_general_image_sizes',
		'settings' => $id_size,
		'type'     => 'checkbox',
	) ) );
}

/* Schema markup */
$wp_customize->add_setting( 'penci_logo_schema', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'penci_logo_schema', array(
	'label'    => 'Custom General Logo for Schema Markup',
	'section'  => 'pencidesign_general_schema_markup',
	'settings' => 'penci_logo_schema',
) ) );

$wp_customize->add_setting( 'penci_schema_wphead', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_schema_wphead', array(
	'label'    => 'Remove WPHeader Schema Data',
	'section'  => 'pencidesign_general_schema_markup',
	'settings' => 'penci_schema_wphead',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_schema_wpfoot', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_schema_wpfoot', array(
	'label'    => 'Remove WPFooter Schema Data',
	'section'  => 'pencidesign_general_schema_markup',
	'settings' => 'penci_schema_wpfoot',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_schema_sitenav', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_schema_sitenav', array(
	'label'    => 'Remove Site Navigation Schema Data',
	'section'  => 'pencidesign_general_schema_markup',
	'settings' => 'penci_schema_sitenav',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_schema_hentry', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_schema_hentry', array(
	'label'    => 'Remove Hentry Schema Data',
	'section'  => 'pencidesign_general_schema_markup',
	'settings' => 'penci_schema_hentry',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_schema_organization', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_schema_organization', array(
	'label'    => 'Remove General Organization Schema Data',
	'section'  => 'pencidesign_general_schema_markup',
	'settings' => 'penci_schema_organization',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_schema_website', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_schema_website', array(
	'label'    => 'Remove Website Schema Data',
	'section'  => 'pencidesign_general_schema_markup',
	'settings' => 'penci_schema_website',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_schema_breadcrumbs', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_schema_breadcrumbs', array(
	'label'    => 'Remove Breadcrumbs Schema Data',
	'section'  => 'pencidesign_general_schema_markup',
	'settings' => 'penci_schema_breadcrumbs',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_schema_single', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_schema_single', array(
	'label'    => 'Remove Schema Data for Single Posts/Pages',
	'section'  => 'pencidesign_general_schema_markup',
	'settings' => 'penci_schema_single',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_use_newsarticle', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_use_newsarticle', array(
	'label'    => 'Use NewsArticle Schema for All Posts',
	'section'  => 'pencidesign_general_schema_markup',
	'settings' => 'penci_post_use_newsarticle',
	'type'     => 'checkbox',
) ) );

/* Extra Options */
$wp_customize->add_setting( 'penci_youtube_api_key', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_youtube_api_key', array(
	'label'       => esc_attr__( 'YouTube API Key', 'soledad' ),
	'section'     => 'pencidesign_general_extra',
	'settings'    => 'penci_youtube_api_key',
	'type'        => 'text',
	'description' => 'Please go to <a href="https://developers.google.com/youtube/v3/getting-started?hl=en" target="_blank">https://developers.google.com/youtube/v3/getting-started?hl=en</a> and check this giude and get the YouTube API Key',
) ) );

$wp_customize->add_setting( 'penci_api_weather_key', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_api_weather_key', array(
	'label'       => esc_attr__( 'Weather API Key', 'soledad' ),
	'section'     => 'pencidesign_general_extra',
	'settings'    => 'penci_api_weather_key',
	'type'        => 'text',
	'description' => '<a href="' . esc_url( 'https://openweathermap.org/appid#get' ) . '" target="_blank">' . esc_html__( 'Click here to get an api key', 'soledad' ) . '</a>'
) ) );

$wp_customize->add_setting( 'penci_map_api_key', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_map_api_key', array(
	'label'    => esc_attr__( 'Google Map API Key', 'soledad' ),
	'section'  => 'pencidesign_general_extra',
	'settings' => 'penci_map_api_key',
	'type'     => 'text',
	'description' => 'When you use "Penci Map" element from Elementor or WPBakery page builder, it required an Google Map API to make it works.',
) ) );

$wp_customize->add_setting( 'penci_rel_type_social', array(
	'default'           => 'nofollow',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_rel_type_social', array(
	'label'    => 'Select "rel" Attribute Type for Social Media & Social Share Icons',
	'section'  => 'pencidesign_general_extra',
	'settings' => 'penci_rel_type_social',
	'type'     => 'select',
	'choices'  => array(
		'none' => 'None',
		'nofollow' => 'nofollow',
		'noreferrer'    => 'noreferrer',
		'noopener'    => 'noopener',
		'noreferrer_noopener'    => 'noreferrer noopener',
		'nofollow_noreferrer'    => 'nofollow noreferrer',
		'nofollow_noopener'    => 'nofollow noopener',
		'nofollow_noreferrer_noopener'    => 'nofollow noreferrer noopener',
	)
) ) );

$wp_customize->add_setting( 'penci_preload_penci_fonts', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_preload_penci_fonts', array(
	'label'    => 'Disable Preload for Icons & Google Fonts from the theme',
	'section'  => 'By default, we optimized the speed by use preload for icons & google fonts from the theme. If you dont want to use preload, you can disable it here',
	'section'  => 'pencidesign_general_extra',
	'settings' => 'penci_preload_penci_fonts',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_swap_font_icons', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_swap_font_icons', array(
	'label'    => 'Use display:swap for Font Icons from The Theme',
	'section'  => 'pencidesign_general_extra',
	'settings' => 'penci_swap_font_icons',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_fontawesome_ver5', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_fontawesome_ver5', array(
	'label'    => 'Use Fontawesome Version 5',
	'section'  => 'pencidesign_general_extra',
	'settings' => 'penci_fontawesome_ver5',
	'type'     => 'checkbox',
) ) );

/* Typography */
$wp_customize->add_setting( 'penci_font_for_title', array(
	'default'           => '"Raleway", "100:200:300:regular:500:600:700:800:900", sans-serif',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_for_title', array(
	'label'       => 'Font For Heading Titles',
	'section'     => 'pencidesign_general_typography',
	'settings'    => 'penci_font_for_title',
	'description' => 'Default font is "Raleway"',
	'type'        => 'select',
	'choices'     => penci_all_fonts()
) ) );

$wp_customize->add_setting( 'penci_font_weight_title', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_weight_title', array(
	'label'    => 'Font Weight For Heading Titles',
	'section'  => 'pencidesign_general_typography',
	'settings' => 'penci_font_weight_title',
	'type'     => 'select',
	'choices'  => array(
		''  => '&mdash; Select &mdash;',
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

$wp_customize->add_setting( 'penci_font_for_body', array(
	'default'           => '"PT Serif", "regular:italic:700:700italic", serif',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_for_body', array(
	'label'       => 'Font For Body Text',
	'section'     => 'pencidesign_general_typography',
	'settings'    => 'penci_font_for_body',
	'description' => 'Default font is "PT Serif"',
	'type'        => 'select',
	'choices'     => penci_all_fonts()
) ) );

$wp_customize->add_setting( 'penci_font_weight_bodytext', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_font_weight_bodytext', array(
	'label'    => 'Font Weight For Body Text',
	'section'  => 'pencidesign_general_typography',
	'settings' => 'penci_font_weight_bodytext',
	'type'     => 'select',
	'choices'  => array(
		''  => '&mdash; Select &mdash;',
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

$wp_customize->add_setting( 'penci_font_for_size_body', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_font_mfor_size_body', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'font_for_size_body', array(
	'description' => __( 'General Font Size for Text', 'soledad' ),
	'section' => 'pencidesign_general_typography',
	'settings' => array(
		'desktop' => 'penci_font_for_size_body',
		'mobile' => 'penci_font_mfor_size_body',
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

$wp_customize->add_setting( 'penci_body_line_height', array(
	'default' => '1.8',
	'sanitize_callback' => 'penci_sanitize_decimal_empty_field',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_body_line_height', array(
	'description' => __( 'General Line Height for Text', 'soledad' ),
	'section' => 'pencidesign_general_typography',
	'settings' => array(
		'desktop' => 'penci_body_line_height',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 3,
			'step' => 0.1,
			'edit' => true,
			'unit' => '',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_archive_fpagetitle', array(
	'default' => '24',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_archive_mobile_fpagetitle', array(
	'default' => '16',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_archive_fpagetitle', array(
	'description' => __( 'Font Size for Archive Page Title', 'soledad' ),
	'sub_description' => 'Apply for Category Page Title, Tag Page Title, Search Page Title, Archive Page Title - check more on <a href="https://imgresources.s3.amazonaws.com/archive-page-title.png" target="_blank">this image</a>',
	'section' => 'pencidesign_general_typography',
	'settings' => array(
		'desktop' => 'penci_archive_fpagetitle',
		'mobile' => 'penci_archive_mobile_fpagetitle',
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

$wp_customize->add_setting( 'penci_body_breadcrumbs', array(
	'default' => '13',
	'sanitize_callback' => 'penci_sanitize_decimal_empty_field',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_body_breadcrumbs', array(
	'description' => __( 'Font Size for Breadcrumbs', 'soledad' ),
	'section' => 'pencidesign_general_typography',
	'settings' => array(
		'desktop' => 'penci_body_breadcrumbs',
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

$wp_customize->add_setting( 'penci_home_loadmore_size', array(
	'default' => '12',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_home_loadmore_size', array(
	'description' => __( 'Font Size for "Load More Posts" & Pagination Button', 'soledad' ),
	'section' => 'pencidesign_general_typography',
	'settings' => array(
		'desktop' => 'penci_home_loadmore_size',
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
$wp_customize->add_setting( 'penci_general_text_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_general_text_color', array(
	'label'    => 'General Text Colors',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_general_text_color',
) ) );

$wp_customize->add_setting( 'penci_color_accent', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_accent', array(
	'label'    => 'Accent Colors',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_color_accent',
) ) );

$wp_customize->add_setting( 'penci_buttons_bg', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_buttons_bg', array(
	'label'    => 'Custom General Buttons Background Color',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_buttons_bg',
) ) );

$wp_customize->add_setting( 'penci_buttons_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_buttons_color', array(
	'label'    => 'Custom General Buttons Text Color',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_buttons_color',
) ) );

$wp_customize->add_setting( 'penci_buttons_bghover', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_buttons_bghover', array(
	'label'    => 'Custom General Buttons Hover Background Color',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_buttons_bghover',
) ) );

$wp_customize->add_setting( 'penci_buttons_colorhver', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_buttons_colorhver', array(
	'label'    => 'Custom General Buttons Hover Text Color',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_buttons_colorhver',
) ) );

$wp_customize->add_setting( 'penci_bg_color_dark', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_color_dark', array(
	'label'    => 'Custom Background Color for Body',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_bg_color_dark',
) ) );

$wp_customize->add_setting( 'penci_border_color_dark', array(
	'default'           => '#DEDEDE',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'border_color_dark', array(
	'label'    => 'Custom General Border Color',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_border_color_dark',
) ) );

$wp_customize->add_setting( 'penci_breadcrumbs_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_breadcrumbs_color', array(
	'label'    => 'Breadcrumbs Text Color',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_breadcrumbs_color',
) ) );

$wp_customize->add_setting( 'penci_breadcrumbs_hcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_breadcrumbs_hcolor', array(
	'label'    => 'Breadcrumbs Text Hover Color',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_breadcrumbs_hcolor',
) ) );

$wp_customize->add_setting( 'penci_archivetitle_prefix_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_archivetitle_prefix_color', array(
	'label'    => 'Archive Page Titles Prefix Color',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_archivetitle_prefix_color',
) ) );

$wp_customize->add_setting( 'penci_archivetitle_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_archivetitle_color', array(
	'label'    => 'Archive Page Titles Color',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_archivetitle_color',
) ) );

$wp_customize->add_setting( 'penci_enable_dark_layout', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_dark_layout', array(
	'label'       => 'Enable Dark Theme',
	'section'     => 'pencidesign_general_colors',
	'settings'    => 'penci_enable_dark_layout',
	'description' => 'All options below only apply when you enable dark theme. And all other elements, please change it via other colors options for those elements.',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_text_color_dark', array(
	'default'           => '#afafaf',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color_dark', array(
	'label'    => 'Custom Text Color for Dark Theme',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_text_color_dark',
) ) );

$wp_customize->add_setting( 'penci_meta_color_dark', array(
	'default'           => '#949494',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'meta_color_dark', array(
	'label'    => 'Custom Posts Meta Color for Dark Theme',
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_meta_color_dark',
) ) );

$wp_customize->add_setting( 'penci_pagination_bheading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_pagination_bheading', array(
	'label'    => esc_html__( 'Pagination/Load More Post Button', 'soledad' ),
	'section'  => 'pencidesign_general_colors',
	'settings' => 'penci_pagination_bheading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_pagination_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_pagination_color', array(
	'label'       => 'Color for Pagination',
	'section'     => 'pencidesign_general_colors',
	'settings'    => 'penci_pagination_color',
) ) );

$wp_customize->add_setting( 'penci_pagination_hcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_pagination_hcolor', array(
	'label'       => 'Accent Color for Pagination',
	'section'     => 'pencidesign_general_colors',
	'settings'    => 'penci_pagination_hcolor',
) ) );

$wp_customize->add_setting( 'penci_loadmorebtn_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_loadmorebtn_color', array(
	'label'       => 'Color for "Load More Posts" Button',
	'section'     => 'pencidesign_general_colors',
	'settings'    => 'penci_loadmorebtn_color',
) ) );

$wp_customize->add_setting( 'penci_loadmorebtn_borders', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_loadmorebtn_borders', array(
	'label'       => 'Borders Color for "Load More Posts" Button',
	'section'     => 'pencidesign_general_colors',
	'settings'    => 'penci_loadmorebtn_borders',
) ) );

$wp_customize->add_setting( 'penci_loadmorebtn_bg', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_loadmorebtn_bg', array(
	'label'       => 'Background Color for "Load More Posts" Button',
	'section'     => 'pencidesign_general_colors',
	'settings'    => 'penci_loadmorebtn_bg',
) ) );

$wp_customize->add_setting( 'penci_loadmorebtn_hcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_loadmorebtn_hcolor', array(
	'label'       => 'Color on Hover for "Load More Posts" Button',
	'section'     => 'pencidesign_general_colors',
	'settings'    => 'penci_loadmorebtn_hcolor',
) ) );

$wp_customize->add_setting( 'penci_loadmorebtn_hborders', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_loadmorebtn_hborders', array(
	'label'       => 'Borders Color on Hover for "Load More Posts" Button',
	'section'     => 'pencidesign_general_colors',
	'settings'    => 'penci_loadmorebtn_hborders',
) ) );

$wp_customize->add_setting( 'penci_loadmorebtn_hbg', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_loadmorebtn_hbg', array(
	'label'       => 'Background Color on Hover for "Load More Posts" Button',
	'section'     => 'pencidesign_general_colors',
	'settings'    => 'penci_loadmorebtn_hbg',
) ) );