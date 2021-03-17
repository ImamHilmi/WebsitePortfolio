<?php
/* Add Sections */
$wp_customize->add_section( 'penci_section_homepage_general', array(
	'title'    => esc_html__( 'General', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_homepage_panel'
) );

$wp_customize->add_section( 'penci_section_homepage_featured_boxes', array(
	'title'    => esc_html__( 'Home Featured Boxes', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/featured-boxes.png">this image</a> to understand what is Featured Boxes.', 'soledad' ),
	'panel'      => 'penci_homepage_panel'
) );

$wp_customize->add_section( 'penci_section_homepage_popular_posts', array(
	'title'    => esc_html__( 'Home Popular Posts', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/home-popular-posts.png">this image</a> to understand what is Home Popular Posts.', 'soledad' ),
	'panel'      => 'penci_homepage_panel'
) );

$wp_customize->add_section( 'penci_section_homepage_title_box', array(
	'title'    => esc_html__( 'Home Title Box', 'soledad' ),
	'priority' => 1,
	'description'      => __( 'You can understand "Home Title Box" is the block heading title of a featured category or block heading title of the "Latest Posts" section on the homepage.<br>Please check more on <a target="_blank" href="https://imgresources.s3.amazonaws.com/home-title-box.png">this image</a>.', 'soledad' ),
	'panel'      => 'penci_homepage_panel'
) );

$wp_customize->add_section( 'penci_section_homepage_featured_cat', array(
	'title'    => esc_html__( 'Featured Categories', 'soledad' ),
	'description'      => __( 'Please check <a target="_blank" href="http://soledad.pencidesign.com/soledad-magazine/">this demo</a> for example and <a target="_blank" href="https://imgresources.s3.amazonaws.com/featured-categories.png">this image</a> to understand what is Featured Categories.', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_homepage_panel'
) );

$wp_customize->add_section( 'penci_section_homepage_fontsize', array(
	'title'    => esc_html__( 'Font Size', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_homepage_panel'
) );

$wp_customize->add_section( 'penci_section_homepage_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_homepage_panel'
) );

/* General */
$wp_customize->add_setting( 'penci_home_layout', array(
	'default'           => 'standard',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_layout', array(
	'label'    => 'Homepage Layout',
	'section'  => 'penci_section_homepage_general',
	'settings' => 'penci_home_layout',
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
		'magazine-1'       => 'Magazine Style 1',
		'magazine-2'       => 'Magazine Style 2',
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

$wp_customize->add_setting( 'penci_home_title', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_title', array(
	'label'       => 'Custom Heading Title of Latest Posts Section',
	'section'     => 'penci_section_homepage_general',
	'settings'    => 'penci_home_title',
	'description' => 'If you want hide it, let empty this option',
	'type'        => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_exclude_cat', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_exclude_cat', array(
	'label'       => 'Exclude specific categories from latest posts on Homepage',
	'section'     => 'penci_section_homepage_general',
	'settings'    => 'penci_home_exclude_cat',
	'description' => 'Example: if you do not want all posts in categories: Fashion, Life Style show on your latest posts on homepage. You can fill slug of the categories here: fashion, life-style. You can see <a rel="nofollow" href="http://pencidesign.com/soledad/soledad-document/assets/images/magazine-2.png" target="_blank">this image</a> to understand what is slug',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_home_lastest_posts_numbers', array(
	'default' => '10',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_lastest_posts_numbers', array(
	'description' => __( 'Amount of Posts Shown Per Page on Homepage', 'soledad' ),
	'section' => 'penci_section_homepage_general',
	'settings' => array(
		'desktop' => 'penci_home_lastest_posts_numbers',
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

$wp_customize->add_setting( 'penci_hide_latest_post_homepage', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_latest_post_homepage', array(
	'label'    => 'Hide Latest Posts On Homepage',
	'section'  => 'penci_section_homepage_general',
	'settings' => 'penci_hide_latest_post_homepage',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_page_navigation_ajax', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_navigation_ajax', array(
	'label'    => 'Enable Load More Button on Homepage',
	'section'  => 'penci_section_homepage_general',
	'settings' => 'penci_page_navigation_ajax',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_page_navigation_scroll', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_navigation_scroll', array(
	'label'    => 'Enable Infinite Scroll on Homepage',
	'section'  => 'penci_section_homepage_general',
	'settings' => 'penci_page_navigation_scroll',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_number_load_more', array(
	'default' => '6',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'number_load_more', array(
	'description' => __( 'Number of Posts for Each Time Load More Posts', 'soledad' ),
	'section' => 'penci_section_homepage_general',
	'settings' => array(
		'desktop' => 'penci_number_load_more',
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

$wp_customize->add_setting( 'penci_sidebar_home', array(
	'default'           => true,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_home', array(
	'label'    => 'Enable Sidebar On Homepage',
	'section'  => 'penci_section_homepage_general',
	'settings' => 'penci_sidebar_home',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_left_sidebar_home', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'left_sidebar_home', array(
	'label'    => 'Enable Left Sidebar On Homepage',
	'section'  => 'penci_section_homepage_general',
	'settings' => 'penci_left_sidebar_home',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_two_sidebar_home', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'two_sidebar_home', array(
	'label'    => 'Enable Two Sidebars On Homepage',
	'section'  => 'penci_section_homepage_general',
	'settings' => 'penci_two_sidebar_home',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_sidebar_name_home', array(
	'default'           => 'main-sidebar',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_name_home', array(
	'label'       => 'Sidebar for Homepage',
	'section'     => 'penci_section_homepage_general',
	'settings'    => 'penci_sidebar_name_home',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar',
	'type'        => 'select',
	'choices'     => get_list_custom_sidebar_option()
) ) );

$wp_customize->add_setting( 'penci_sidebar_left_name_home', array(
	'default'           => 'main-sidebar-left',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_left_name_home', array(
	'label'       => 'Sidebar Left for Homepage',
	'section'     => 'penci_section_homepage_general',
	'settings'    => 'penci_sidebar_left_name_home',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar Left. This option just use when you enable 2 sidebars for Homepage',
	'type'        => 'select',
	'choices'     => get_list_custom_sidebar_option()
) ) );

$wp_customize->add_setting( 'penci_home_h1content', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_h1content', array(
	'label'       => 'Add More <H1> Tag for Homepage',
	'section'     => 'penci_section_homepage_general',
	'settings'    => 'penci_home_h1content',
	'description' => 'Write content for H1 tag here',
	'type'        => 'text',
) ) );

/* Featured Boxes */
$wp_customize->add_setting( 'penci_home_hide_boxes', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_hide_boxes', array(
	'label'    => 'Hide Home Featured Boxes',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_hide_boxes',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_box_style_2', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_style_2', array(
	'label'    => 'Enable Home Featured Boxes Style 2',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_style_2',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_box_style_3', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_style_3', array(
	'label'    => 'Enable Home Featured Boxes Style 3',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_style_3',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_box_weight', array(
	'default'           => 'normal',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_weight', array(
	'label'    => 'Custom Font Weight for Text on Featured Boxes',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_weight',
	'type'     => 'radio',
	'choices'  => array(
		'bold'   => 'Bold',
		'normal' => 'Normal'
	)
) ) );

$wp_customize->add_setting( 'penci_home_box_column', array(
	'default'           => '3',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_column', array(
	'label'    => 'Home Featured Boxes Columns',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_column',
	'type'     => 'radio',
	'choices'  => array(
		'3' => '3 Columns',
		'4' => '4 Columns'
	)
) ) );

$wp_customize->add_setting( 'penci_home_box_type', array(
	'default'           => 'horizontal',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_type', array(
	'label'    => 'Home Featured Boxes Size Type',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_type',
	'type'     => 'radio',
	'choices'  => array(
		'horizontal' => 'Horizontal Size',
		'square'     => 'Square Size',
		'vertical'   => 'Vertical Size'
	)
) ) );

$wp_customize->add_setting( 'penci_home_boxes_new_tab', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_boxes_new_tab', array(
	'label'    => 'Open Home Featured Boxes in New Tab',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_boxes_new_tab',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_box_img1', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_box_img1', array(
	'label'       => 'Homepage Featured Box 1st Image',
	'section'     => 'penci_section_homepage_featured_boxes',
	'settings'    => 'penci_home_box_img1',
) ) );

$wp_customize->add_setting( 'penci_home_box_text1', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_text1', array(
	'label'    => 'Homepage Featured Box 1st Text',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_text1',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_url1', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_url1', array(
	'label'    => 'Homepage Featured Box 1st URL',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_url1',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_img2', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_box_img2', array(
	'label'       => 'Homepage Featured Box 2nd Image',
	'section'     => 'penci_section_homepage_featured_boxes',
	'settings'    => 'penci_home_box_img2',
) ) );

$wp_customize->add_setting( 'penci_home_box_text2', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_text2', array(
	'label'    => 'Homepage Featured Box 2nd Text',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_text2',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_url2', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_url2', array(
	'label'    => 'Homepage Featured Box 2nd URL',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_url2',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_img3', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_box_img3', array(
	'label'       => 'Homepage Featured Box 3rd Image',
	'section'     => 'penci_section_homepage_featured_boxes',
	'settings'    => 'penci_home_box_img3',
) ) );

$wp_customize->add_setting( 'penci_home_box_text3', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_text3', array(
	'label'    => 'Homepage Featured Box 3rd Text',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_text3',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_url3', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_url3', array(
	'label'    => 'Homepage Featured Box 3rd URL',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_url3',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_img4', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_box_img4', array(
	'label'       => 'Homepage Featured Box 4th Image',
	'section'     => 'penci_section_homepage_featured_boxes',
	'settings'    => 'penci_home_box_img4',
) ) );

$wp_customize->add_setting( 'penci_home_box_text4', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_text4', array(
	'label'    => 'Homepage Featured Box 4th Text',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_text4',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_url4', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_url4', array(
	'label'    => 'Homepage Featured Box 4th URL',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_url4',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_img5', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_box_img5', array(
	'label'       => 'Homepage Featured Box 5th Image',
	'section'     => 'penci_section_homepage_featured_boxes',
	'settings'    => 'penci_home_box_img5',
) ) );

$wp_customize->add_setting( 'penci_home_box_text5', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_text5', array(
	'label'    => 'Homepage Featured Box 5th Text',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_text5',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_url5', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_url5', array(
	'label'    => 'Homepage Featured Box 5th URL',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_url5',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_img6', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_box_img6', array(
	'label'       => 'Homepage Featured Box 6th Image',
	'section'     => 'penci_section_homepage_featured_boxes',
	'settings'    => 'penci_home_box_img6',
) ) );

$wp_customize->add_setting( 'penci_home_box_text6', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_text6', array(
	'label'    => 'Homepage Featured Box 6th Text',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_text6',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_url6', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_url6', array(
	'label'    => 'Homepage Featured Box 6th URL',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_url6',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_img7', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_box_img7', array(
	'label'       => 'Homepage Featured Box 7th Image',
	'section'     => 'penci_section_homepage_featured_boxes',
	'settings'    => 'penci_home_box_img7',
) ) );

$wp_customize->add_setting( 'penci_home_box_text7', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_text7', array(
	'label'    => 'Homepage Featured Box 7th Text',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_text7',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_url7', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_url7', array(
	'label'    => 'Homepage Featured Box 7th URL',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_url7',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_img8', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_box_img8', array(
	'label'       => 'Homepage Featured Box 8th Image',
	'section'     => 'penci_section_homepage_featured_boxes',
	'settings'    => 'penci_home_box_img8',
) ) );

$wp_customize->add_setting( 'penci_home_box_text8', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_text8', array(
	'label'    => 'Homepage Featured Box 8th Text',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_text8',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_url8', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_url8', array(
	'label'    => 'Homepage Featured Box 8th URL',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_url8',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_img9', array(
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'home_box_img9', array(
	'label'       => 'Homepage Featured Box 9th Image',
	'section'     => 'penci_section_homepage_featured_boxes',
	'settings'    => 'penci_home_box_img9',
) ) );

$wp_customize->add_setting( 'penci_home_box_text9', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_text9', array(
	'label'    => 'Homepage Featured Box 9th Text',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_text9',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_box_url9', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_box_url9', array(
	'label'    => 'Homepage Featured Box 9th URL',
	'section'  => 'penci_section_homepage_featured_boxes',
	'settings' => 'penci_home_box_url9',
	'type'     => 'text',
) ) );

/* Popular Posts */
$wp_customize->add_setting( 'penci_enable_home_popular_posts', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_home_popular_posts', array(
	'label'    => 'Enable Popular Posts on HomePage',
	'section'  => 'penci_section_homepage_popular_posts',
	'settings' => 'penci_enable_home_popular_posts',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_popular_post_numberposts', array(
	'default' => '10',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_popular_post_numberposts', array(
	'description' => __( 'Amount of Posts on Popular Posts', 'soledad' ),
	'section' => 'penci_section_homepage_popular_posts',
	'settings' => array(
		'desktop' => 'penci_home_popular_post_numberposts',
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

$wp_customize->add_setting( 'penci_home_popular_type', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_popular_type', array(
	'label'    => 'Display Home Popular Posts on',
	'section'  => 'penci_section_homepage_popular_posts',
	'settings' => 'penci_home_popular_type',
	'type'     => 'select',
	'choices'  => array(
		''      => 'All Time',
		'week'  => 'Once Weekly',
		'month' => 'Once a Month'
	)
) ) );

$wp_customize->add_setting( 'penci_home_popular_title', array(
	'default'           => 'Popular Posts',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_popular_title', array(
	'label'    => 'Custom Title for Home Popular Posts Box',
	'section'  => 'penci_section_homepage_popular_posts',
	'settings' => 'penci_home_popular_title',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_home_popular_cat', array(
	'default'           => '0',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Category_Control( $wp_customize, 'home_popular_cat', array(
	'label'    => 'Filter Home Popular Posts by A Category',
	'settings' => 'penci_home_popular_cat',
	'section'  => 'penci_section_homepage_popular_posts',
) ) );

$wp_customize->add_setting( 'penci_home_polular_title_length', array(
	'default' => '8',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_polular_title_length', array(
	'description' => __( 'Custom Words Length for Post Titles on Popular Posts', 'soledad' ),
	'section' => 'penci_section_homepage_popular_posts',
	'settings' => array(
		'desktop' => 'penci_home_polular_title_length',
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

$wp_customize->add_setting( 'penci_lowcase_popular_posts', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lowcase_popular_posts', array(
	'label'    => 'Turn Off Uppercase Post Titles for Popular Posts on HomePage',
	'section'  => 'penci_section_homepage_popular_posts',
	'settings' => 'penci_lowcase_popular_posts',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_hide_date_home_popular', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_date_home_popular', array(
	'label'    => 'Hide Date on Home Popular Posts',
	'section'  => 'penci_section_homepage_popular_posts',
	'settings' => 'penci_hide_date_home_popular',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_enable_home_popular_icons', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_home_popular_icons', array(
	'label'    => 'Enable Post Format Icons on Home Popular Posts',
	'section'  => 'penci_section_homepage_popular_posts',
	'settings' => 'penci_enable_home_popular_icons',
	'type'     => 'checkbox',
) ) );

/* Featured Categories */
$wp_customize->add_setting( 'penci_home_featured_cat', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat', array(
	'label'       => 'List Featured Categories',
	'section'     => 'penci_section_homepage_featured_cat',
	'settings'    => 'penci_home_featured_cat',
	'description' => 'By default, this option apply only for Homepage Magazine(style 1 and style 2) layout, copy and paste categories slug you want display above Latest Posts here - check <a rel="nofollow" href="http://pencidesign.com/soledad/soledad-document/assets/images/magazine-2.png" target="_blank">this image</a> to understand what is categories slug. Example: You want display categories "Life Style, Travel, Music" above Latest Posts, fill categories slug like "life-style, travel, music"',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_enable_featured_cat_all_layouts', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_featured_cat_all_layouts', array(
	'label'    => 'Enable Featured Categories for All Homepage Layouts - Not for Magazine Layouts Only',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_enable_featured_cat_all_layouts',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_move_latest_posts_above', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'move_latest_posts_above', array(
	'label'    => 'Move Latest Posts To Above Featured Categories',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_move_latest_posts_above',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_featured_cat_overlay7', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat_overlay7', array(
	'label'    => 'Enable Post Meta Overlay Featured Image for Featured Category Style 7',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_home_featured_cat_overlay7',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_cat_margin', array(
	'default' => '60',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'featured_cat_margin', array(
	'description' => __( 'Custom Space Between Featured Categories', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_featured_cat_margin',
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

$wp_customize->add_setting( 'penci_home_featured_cat_author', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat_author', array(
	'label'    => 'Hide Post Author on Featured Categories',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_home_featured_cat_author',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_featured_cat_date', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat_date', array(
	'label'    => 'Hide Post Date on Featured Categories',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_home_featured_cat_date',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_featured_cat_comment', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat_comment', array(
	'label'    => 'Show Comment Count on Featured Categories',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_home_featured_cat_comment',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_featured_cat_icons', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat_icons', array(
	'label'    => 'Enable Post Format Icons on Featured Categories',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_home_featured_cat_icons',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_featured_cat_seemore', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat_seemore', array(
	'label'    => 'Enable "View All" link for Featured Categories',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_home_featured_cat_seemore',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_featured_cat_remove_arrow', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat_remove_arrow', array(
	'label'    => 'Remove arrow on "View All"',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_home_featured_cat_remove_arrow',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_featured_cat_readmore_button', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat_readmore_button', array(
	'label'    => 'Make "View All" is A Button',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_home_featured_cat_readmore_button',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_featured_cat_readmore_align', array(
	'default'           => 'left',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat_readmore_align', array(
	'label'    => 'Align "View All" Button',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_home_featured_cat_readmore_align',
	'type'     => 'select',
	'choices'  => array(
		'left'   => esc_html__( 'Left', 'soledad' ),
		'center' => esc_html__( 'Center', 'soledad' ),
		'right'  => esc_html__( 'Right', 'soledad' )
	)
) ) );

$wp_customize->add_setting( 'penci_home_featured_cat_remove_excerpt', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat_remove_excerpt', array(
	'label'    => 'Remove Posts Excerpt for Featured Categories',
	'section'  => 'penci_section_homepage_featured_cat',
	'settings' => 'penci_home_featured_cat_remove_excerpt',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_1', array(
	'default' => '5',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_1', array(
	'description' => __( 'Amount of Posts Display on Style 1', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_1',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_2', array(
	'default' => '4',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_2', array(
	'description' => __( 'Amount of Posts Display on Style 2', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_2',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_3', array(
	'default' => '4',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_3', array(
	'description' => __( 'Amount of Posts Display on Style 3', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_3',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_4', array(
	'default' => '6',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_4', array(
	'description' => __( 'Amount of Posts Display on Style 4', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_4',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_5', array(
	'default' => '6',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_5', array(
	'description' => __( 'Amount of Posts Display on Style 5', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_5',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_6', array(
	'default' => '5',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_6', array(
	'description' => __( 'Amount of Posts Display on Style 6', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_6',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_7', array(
	'default' => '6',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_7', array(
	'description' => __( 'Amount of Posts Display on Style 7', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_7',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_8', array(
	'default' => '3',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_8', array(
	'description' => __( 'Amount of Posts Display on Style 8', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_8',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_9', array(
	'default' => '8',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_9', array(
	'description' => __( 'Amount of Posts Display on Style 9', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_9',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_10', array(
	'default' => '6',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_10', array(
	'description' => __( 'Amount of Posts Display on Style 10', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_10',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_11', array(
	'default' => '4',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_11', array(
	'description' => __( 'Amount of Posts Display on Style 11', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_11',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_12', array(
	'default' => '6',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_12', array(
	'description' => __( 'Amount of Posts Display on Style 12', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_12',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_13', array(
	'default' => '6',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_13', array(
	'description' => __( 'Amount of Posts Display on Style 13', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_13',
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

$wp_customize->add_setting( 'penci_home_featured_posts_numbers_14', array(
	'default' => '6',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_featured_posts_numbers_14', array(
	'description' => __( 'Amount of Posts Display on Style 14', 'soledad' ),
	'section' => 'penci_section_homepage_featured_cat',
	'settings' => array(
		'desktop' => 'penci_home_featured_posts_numbers_14',
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

/* Home Title Box */
$wp_customize->add_setting( 'penci_featured_cat_style', array(
	'default'           => 'style-1',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_cat_style', array(
	'label'    => 'Home Title Box Style',
	'section'  => 'penci_section_homepage_title_box',
	'settings' => 'penci_featured_cat_style',
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

$wp_customize->add_setting( 'penci_home_remove_border_outer', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_remove_border_outer', array(
	'label'    => 'Remove Border Outer on Title Box',
	'section'  => 'penci_section_homepage_title_box',
	'settings' => 'penci_home_remove_border_outer',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_remove_arrow_down', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_remove_arrow_down', array(
	'label'    => 'Remove Arrow Down on Title Box',
	'section'  => 'penci_section_homepage_title_box',
	'settings' => 'penci_home_remove_arrow_down',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_cat_image_8', array(
	'default'           => '',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_cat_image_8', array(
	'label'    => 'Custom Background Image for Style 9',
	'section'  => 'penci_section_homepage_title_box',
	'settings' => 'penci_featured_cat_image_8',
) ) );

$wp_customize->add_setting( 'penci_featured_cat8_repeat', array(
	'default'           => 'no-repeat',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_cat8_repeat', array(
	'label'    => 'Background Image Repeat for Style 9',
	'section'  => 'penci_section_homepage_title_box',
	'settings' => 'penci_featured_cat8_repeat',
	'type'     => 'radio',
	'choices'  => array(
		'no-repeat' => 'No Repeat',
		'repeat'    => 'Repeat'
	)
) ) );

$wp_customize->add_setting( 'penci_home_featured_cat_lowcase', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured_cat_lowcase', array(
	'label'       => 'Turn Off Uppercase on Home Title Box',
	'section'     => 'penci_section_homepage_title_box',
	'settings'    => 'penci_home_featured_cat_lowcase',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_cat_align', array(
	'default'           => 'pcalign-left',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_cat_align', array(
	'label'    => 'Homepage Featured Categories Title Box Align',
	'section'  => 'penci_section_homepage_title_box',
	'settings' => 'penci_featured_cat_align',
	'type'     => 'radio',
	'choices'  => array(
		'pcalign-left'   => 'Left',
		'pcalign-center' => 'Center',
		'pcalign-right'  => 'Right'
	)
) ) );

$wp_customize->add_setting( 'penci_heading_latest_align', array(
	'default'           => 'pcalign-center',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'heading_latest_align', array(
	'label'    => 'Homepage Heading Latest Post Titles Align',
	'section'  => 'penci_section_homepage_title_box',
	'settings' => 'penci_heading_latest_align',
	'type'     => 'radio',
	'choices'  => array(
		'pcalign-center' => 'Center',
		'pcalign-left'   => 'Left',
		'pcalign-right'  => 'Right'
	)
) ) );

/* Font Size */
$wp_customize->add_setting( 'penci_section_featured_boxes_cheading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_featured_boxes_cheading', array(
	'label'    => esc_html__( 'Featured Boxes', 'soledad' ),
	'section'  => 'penci_section_homepage_fontsize',
	'settings' => 'penci_section_featured_boxes_cheading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_home_box_text_size', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_box_text_size', array(
	'description' => __( 'Font Size for Text on Featured Boxes', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_home_box_text_size',
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

$wp_customize->add_setting( 'penci_section_popular_cheading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_popular_cheading', array(
	'label'    => esc_html__( 'Popular Posts', 'soledad' ),
	'section'  => 'penci_section_homepage_fontsize',
	'settings' => 'penci_section_popular_cheading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_home_polular_fsectitle', array(
	'default' => '18',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_home_polular_mfsectitle', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_home_polular_fsectitle', array(
	'description' => __( 'Font Size for "Popular Posts" heading', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_home_polular_fsectitle',
		'mobile'  => 'penci_home_polular_mfsectitle',
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

$wp_customize->add_setting( 'penci_home_popular_post_font_size', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'home_popular_post_font_size', array(
	'description' => __( 'Font Size for Post Titles on Popular Posts', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_home_popular_post_font_size',
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

$wp_customize->add_setting( 'penci_home_popular_post_fdate', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_home_popular_post_fdate', array(
	'description' => __( 'Font Size for Post Date on Popular Posts', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_home_popular_post_fdate',
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

$wp_customize->add_setting( 'penci_section_home_titlebox_cheading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_home_titlebox_cheading', array(
	'label'    => esc_html__( 'Home Title Box', 'soledad' ),
	'section'  => 'penci_section_homepage_fontsize',
	'settings' => 'penci_section_home_titlebox_cheading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_featured_cat_size', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'featured_cat_size', array(
	'description' => __( 'Font Size for Home Title Box', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_featured_cat_size',
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

$wp_customize->add_setting( 'penci_section_featured_cat_cheading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_featured_cat_cheading', array(
	'label'    => esc_html__( 'Featured Categories', 'soledad' ),
	'section'  => 'penci_section_homepage_fontsize',
	'settings' => 'penci_section_featured_cat_cheading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_featuredcat_cat_size', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_featuredcat_cat_size', array(
	'description' => __( 'Font Size for Categories Name on Style 8', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_featuredcat_cat_size',
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

$wp_customize->add_setting( 'penci_featuredcat_meta_size', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_featuredcat_meta_size', array(
	'description' => __( 'Font Size for Post Meta', 'soledad' ),
	'sub_description' => __( 'Include author name, date, comment count', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_featuredcat_meta_size',
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

$wp_customize->add_setting( 'penci_featuredcat_excerpt_size', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_featuredcat_excerpt_size', array(
	'description' => __( 'Font Size for Post Excerpt', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_featuredcat_excerpt_size',
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

$wp_customize->add_setting( 'penci_featuredcat_title_size', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_featuredcat_title_size_mobile', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_featuredcat_title_size', array(
	'description' => __( 'General Font Size for Post Titles', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_featuredcat_title_size',
		'mobile' => 'penci_featuredcat_title_size_mobile',
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

$wp_customize->add_setting( 'penci_featuredcat_smtitle_size', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_featuredcat_smtitle_size_mobile', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_featuredcat_smtitle_size', array(
	'description' => __( 'Font Size for Post Titles on Small Posts', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_featuredcat_smtitle_size',
		'mobile' => 'penci_featuredcat_smtitle_size_mobile',
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

$wp_customize->add_setting( 'penci_featuredcat4_title_size', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_featuredcat4_title_size_mobile', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_featuredcat4_title_size', array(
	'description' => __( 'Font Size for Post Titles on Style 4', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_featuredcat4_title_size',
		'mobile' => 'penci_featuredcat4_title_size_mobile',
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

$wp_customize->add_setting( 'penci_featuredcat12_title_size', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_featuredcat12_title_size_mobile', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_featuredcat12_title_size', array(
	'description' => __( 'Font Size for Post Titles on Style 12 & 13', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_featuredcat12_title_size',
		'mobile' => 'penci_featuredcat12_title_size_mobile',
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

$wp_customize->add_setting( 'penci_featuredcat14_ftitle_size', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_featuredcat14_ftitle_size_mobile', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_featuredcat14_ftitle_size', array(
	'description' => __( 'Font Size for Post Titles on First Post on Style 14', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_featuredcat14_ftitle_size',
		'mobile' => 'penci_featuredcat14_ftitle_size_mobile',
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

$wp_customize->add_setting( 'penci_featuredcat14_title_size', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_featuredcat14_title_size_mobile', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_featuredcat14_title_size', array(
	'description' => __( 'Font Size for Post Titles on Other Posts on Style 14', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_featuredcat14_title_size',
		'mobile' => 'penci_featuredcat14_title_size_mobile',
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

$wp_customize->add_setting( 'penci_featuredcat_viewall_size', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_featuredcat_viewall_size', array(
	'description' => __( 'Font Size for "View All" Button', 'soledad' ),
	'section' => 'penci_section_homepage_fontsize',
	'settings' => array(
		'desktop' => 'penci_featuredcat_viewall_size',
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
$wp_customize->add_setting( 'penci_section_featured_boxes_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_featured_boxes_heading', array(
	'label'    => esc_html__( 'Featured Boxes', 'soledad' ),
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_section_featured_boxes_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_home_boxes_overlay', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_boxes_overlay', array(
	'label'    => 'Featured Boxes Border & Background Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_boxes_overlay',
) ) );

$wp_customize->add_setting( 'penci_home_boxes_title_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_boxes_title_color', array(
	'label'    => 'Featured Boxes Title Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_boxes_title_color',
) ) );

$wp_customize->add_setting( 'penci_home_boxes_accent_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_boxes_accent_hover_color', array(
	'label'    => 'Featured Boxes Accent Hover Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_boxes_accent_hover_color',
) ) );

$wp_customize->add_setting( 'penci_section_popular_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_popular_heading', array(
	'label'    => esc_html__( 'Popular Posts', 'soledad' ),
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_section_popular_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_home_popular_label_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_popular_label_color', array(
	'label'    => 'Home Popular Posts Heading Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_popular_label_color',
) ) );

$wp_customize->add_setting( 'penci_home_popular_border_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_popular_border_color', array(
	'label'    => 'Home Popular Posts Border Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_popular_border_color',
) ) );

$wp_customize->add_setting( 'penci_home_popular_post_title_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_popular_post_title_color', array(
	'label'    => 'Home Popular Post Titles Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_popular_post_title_color',
) ) );

$wp_customize->add_setting( 'penci_home_popular_post_title_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_popular_post_title_hover_color', array(
	'label'    => 'Home Popular Post Titles Post Hover Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_popular_post_title_hover_color',
) ) );

$wp_customize->add_setting( 'penci_home_popular_post_date_color', array(
	'default'           => '#888888',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_popular_post_date_color', array(
	'label'    => 'Home Popular Post Date Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_popular_post_date_color',
) ) );

$wp_customize->add_setting( 'penci_section_home_titlebox_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_home_titlebox_heading', array(
	'label'    => esc_html__( 'Home Title Box', 'soledad' ),
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_section_home_titlebox_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_home_title_box_bg', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_title_box_bg', array(
	'label'    => 'Home Title Box Background Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_title_box_bg',
) ) );

$wp_customize->add_setting( 'penci_home_title_box_outer_bg', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_title_box_outer_bg', array(
	'label'    => 'Home Title Box Background Outer Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_title_box_outer_bg',
) ) );

$wp_customize->add_setting( 'penci_home_title_box_border_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_title_box_border_color', array(
	'label'    => 'Home Title Box Border Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_title_box_border_color',
) ) );

$wp_customize->add_setting( 'penci_home_title_box_border_inner_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_title_box_border_inner_color', array(
	'label'    => 'Home Title Box Border Outer Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_title_box_border_inner_color',
) ) );

$wp_customize->add_setting( 'penci_home_title_box_border_bottom5', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_title_box_border_bottom5', array(
	'label'    => 'Custom Color for Border Bottom on Home Title Box Style 5, 10, 11, 12',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_title_box_border_bottom5',
) ) );

$wp_customize->add_setting( 'penci_home_title_box_border_bottom7', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_title_box_border_bottom7', array(
	'label'    => 'Custom Color for Small Border Bottom on Home Title Box Style 7 & Style 8',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_title_box_border_bottom7',
) ) );

$wp_customize->add_setting( 'penci_home_title_box_border_top10', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_home_title_box_border_top10', array(
	'label'    => 'Custom Color for Border Top on Home Title Box Style 10',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_title_box_border_top10',
) ) );

$wp_customize->add_setting( 'penci_home_title_box_shapes_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_home_title_box_shapes_color', array(
	'label'    => 'Custom Color for Background Shapes Home Title Box Style 11, 12, 13',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_title_box_shapes_color',
) ) );

$wp_customize->add_setting( 'penci_home_title_box_text_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_title_box_text_color', array(
	'label'    => 'Home Title Box Text Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_title_box_text_color',
) ) );

$wp_customize->add_setting( 'penci_section_featured_cat_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_featured_cat_heading', array(
	'label'    => esc_html__( 'Featured Categories', 'soledad' ),
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_section_featured_cat_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_home_featured_title_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_featured_title_color', array(
	'label'       => 'Post Titles Color',
	'section'     => 'penci_section_homepage_colors',
	'settings'    => 'penci_home_featured_title_color',
) ) );

$wp_customize->add_setting( 'penci_home_featured_title_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_featured_title_hover_color', array(
	'label'    => 'Post Titles Hover Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_featured_title_hover_color',
) ) );

$wp_customize->add_setting( 'penci_home_featured3_title_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_featured3_title_color', array(
	'label'    => 'Post Titles Color For Style 3, Style 4, Style 11, Style 14',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_featured3_title_color',
) ) );

$wp_customize->add_setting( 'penci_home_featured3_title_hover_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_featured3_title_hover_color', array(
	'label'    => 'Post Titles Hover Color For Style 3, Style 4, Style 11, Style 14',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_featured3_title_hover_color',
) ) );

$wp_customize->add_setting( 'penci_home_featured_meta_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_home_featured_meta_color', array(
	'label'    => 'Post Meta Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_featured_meta_color',
) ) );

$wp_customize->add_setting( 'penci_home_featured3_meta_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_featured3_meta_color', array(
	'label'    => 'Posts Meta Color For Style 3, Style 4, Style 11, Style 14',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_featured3_meta_color',
) ) );

$wp_customize->add_setting( 'penci_home_featured_metalink_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_home_featured_metalink_color', array(
	'label'    => 'Color for Links on Post Meta',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_featured_metalink_color',
) ) );

$wp_customize->add_setting( 'penci_home_featured_viewall_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_home_featured_viewall_color', array(
	'label'    => 'Text Color for "View All" Button',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_featured_viewall_color',
) ) );

$wp_customize->add_setting( 'penci_home_featured_viewall_bg', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_home_featured_viewall_bg', array(
	'label'    => 'Background Color for "View All" Button',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_featured_viewall_bg',
) ) );

$wp_customize->add_setting( 'penci_home_featured_accent_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_featured_accent_color', array(
	'label'    => 'Accent Color',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_featured_accent_color',
) ) );

$wp_customize->add_setting( 'penci_home_featured3_overlay_color', array(
	'default'           => '#000000',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'home_featured3_overlay_color', array(
	'label'       => 'Posts Overlay Background Color For Style 3 & Style 11',
	'section'     => 'penci_section_homepage_colors',
	'settings'    => 'penci_home_featured3_overlay_color',
) ) );

$wp_customize->add_setting( 'penci_home_featured3_overlay_opacity', array(
	'default'           => '0.15',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured3_overlay_opacity', array(
	'label'    => 'Posts Overlay Opacity For Style 3 & Style 11',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_featured3_overlay_opacity',
	'type'     => 'select',
	'choices'  => array(
		'0'    => '0',
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

$wp_customize->add_setting( 'penci_home_featured3_overlay_hover_opacity', array(
	'default'           => '0.7',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_featured3_overlay_hover_opacity', array(
	'label'    => 'Posts Overlay Opacity on Hover For Style 3 & Style 11',
	'section'  => 'penci_section_homepage_colors',
	'settings' => 'penci_home_featured3_overlay_hover_opacity',
	'type'     => 'select',
	'choices'  => array(
		'0'    => '0',
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