<?php
$wp_customize->add_section( 'penci_section_fslider_general', array(
	'title'    => esc_html__( 'General', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_featured_slider_panel'
) );

$wp_customize->add_section( 'penci_section_fslider_fsize', array(
	'title'    => esc_html__( 'Font Size', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_featured_slider_panel'
) );

$wp_customize->add_section( 'penci_section_fslider_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_featured_slider_panel'
) );

/* General */
$wp_customize->add_setting( 'penci_featured_slider', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider', array(
	'label'    => 'Enable Featured Slider',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_featured_slider',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_all_page', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_all_page', array(
	'label'    => 'Enable Featured Slider on All Page',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_featured_slider_all_page',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_disable_lazyload_slider', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'disable_lazyload_slider', array(
	'label'    => 'Disable Lazy Load Images on The Slider',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_disable_lazyload_slider',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_enable_flat_overlay', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_flat_overlay', array(
	'label'       => 'Enable Flat Overlay Replace with Gradient Overlay',
	'section'     => 'penci_section_fslider_general',
	'settings'    => 'penci_enable_flat_overlay',
	'description' => 'This option does not apply for Slider Styles 1, 2, 3, 4, 5, 29, 30, 35, 36, 37, 38 & Penci Sliders',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_slider_border_radius', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_border_radius', array(
	'label'       => 'Border Radius for Images on Featured Slider',
	'section'     => 'penci_section_fslider_general',
	'settings'    => 'penci_slider_border_radius',
	'description' => 'You can use pixel or percent. E.g:  <strong>10px</strong>  or  <strong>10%</strong>. If you want to disable border radius for slider. Fill 0',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_style', array(
	'default'           => 'style-1',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_style', array(
	'label'       => 'Featured Slider Style',
	'section'     => 'penci_section_fslider_general',
	'settings'    => 'penci_featured_slider_style',
	'description' => 'If you choose Penci Slider, you need have posts in "Penci Slider" post type',
	'type'        => 'radio',
	'choices'     => array(
		'style-1'  => 'Style 1',
		'style-2'  => 'Style 2',
		'style-3'  => 'Style 3',
		'style-4'  => 'Style 4',
		'style-5'  => 'Style 5',
		'style-6'  => 'Style 6',
		'style-7'  => 'Style 7',
		'style-8'  => 'Style 8',
		'style-9'  => 'Style 9',
		'style-10' => 'Style 10',
		'style-11' => 'Style 11',
		'style-12' => 'Style 12',
		'style-13' => 'Style 13',
		'style-14' => 'Style 14',
		'style-15' => 'Style 15',
		'style-16' => 'Style 16',
		'style-17' => 'Style 17',
		'style-18' => 'Style 18',
		'style-19' => 'Style 19',
		'style-20' => 'Style 20',
		'style-21' => 'Style 21',
		'style-22' => 'Style 22',
		'style-23' => 'Style 23',
		'style-24' => 'Style 24',
		'style-25' => 'Style 25',
		'style-26' => 'Style 26',
		'style-27' => 'Style 27',
		'style-28' => 'Style 28',
		'style-29' => 'Style 29',
		'style-30' => 'Style 30',
		'style-31' => 'Penci Slider Style 1',
		'style-32' => 'Penci Slider Style 2',
		'style-33' => 'Revolution Slider Full Width',
		'style-34' => 'Revolution Slider In Container',
		'style-35' => 'Style 35',
		'style-36' => 'Style 36',
		'style-37' => 'Style 37',
		'style-38' => 'Style 38',
	)
) ) );

$wp_customize->add_setting( 'penci_feature_rev_sc', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'feature_rev_sc', array(
	'label'       => 'Revolution Slider Shortcode',
	'section'     => 'penci_section_fslider_general',
	'settings'    => 'penci_feature_rev_sc',
	'type'        => 'textarea',
	'description' => 'If you choose Featured Slider Style is Revolution Slider, you need to fill Revolution Slider shortcode here',
) ) );

$wp_customize->add_setting( 'penci_enable_next_prev_penci_slider', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_next_prev_penci_slider', array(
	'label'    => 'Enable Next/Prev Button for Penci Slider & Slider Styles 35, 36, 37',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_enable_next_prev_penci_slider',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_disable_dots_penci_slider', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'disable_dots_penci_slider', array(
	'label'    => 'Disable Dots for Penci Slider & Slider Styles 35, 36, 37',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_disable_dots_penci_slider',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_slider_title_length', array(
	'default' => '12',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'slider_title_length', array(
	'description' => __( 'Custom Words Length for Post Titles', 'soledad' ),
	'section' => 'penci_section_fslider_general',
	'settings' => array(
		'desktop' => 'penci_slider_title_length',
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

$wp_customize->add_setting( 'featured_slider_orderby', array(
	'default'           => 'date',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_orderby', array(
	'label'    => 'Order By on Featured Slider',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'featured_slider_orderby',
	'type'     => 'select',
	'choices'  => array(
		'date'          => 'Post Date',
		'modified'      => 'Modified Date',
		'title'         => 'Post Title',
		'rand'          => 'Random Posts',
		'ID'            => 'Post ID',
		'comment_count' => 'Comment Count'
	)
) ) );

$wp_customize->add_setting( 'featured_slider_order', array(
	'default'           => 'DESC',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_order', array(
	'label'    => 'Sort Order on Featured Slider',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'featured_slider_order',
	'type'     => 'select',
	'choices'  => array(
		'DESC' => 'Descending',
		'ASC'  => 'Ascending '
	)
) ) );

$wp_customize->add_setting( 'penci_featured_slider_slides', array(
	'default' => '6',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'featured_slider_slides', array(
	'description' => __( 'Amount of Slides', 'soledad' ),
	'section' => 'penci_section_fslider_general',
	'settings' => array(
		'desktop' => 'penci_featured_slider_slides',
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

$wp_customize->add_setting( 'penci_featured_autoplay', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_autoplay', array(
	'label'    => 'Enable Auto Play Slider',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_featured_autoplay',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_auto_time', array(
	'default' => '4000',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'featured_slider_auto_time', array(
	'description' => __( 'Featured Slider Auto Time', 'soledad' ),
	'sub_description' => __( '1000 = 1 second', 'soledad' ),
	'section' => 'penci_section_fslider_general',
	'settings' => array(
		'desktop' => 'penci_featured_slider_auto_time',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 100,
			'max' => 10000,
			'step' => 100,
			'edit' => true,
			'unit' => '',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_featured_slider_auto_speed', array(
	'default' => '600',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'featured_slider_auto_speed', array(
	'description' => __( 'Featured Slider Auto Speed', 'soledad' ),
	'sub_description' => __( '1000 = 1 second', 'soledad' ),
	'section' => 'penci_section_fslider_general',
	'settings' => array(
		'desktop' => 'penci_featured_slider_auto_speed',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 100,
			'max' => 10000,
			'step' => 100,
			'edit' => true,
			'unit' => '',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_featured_penci_slider_height', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'featured_penci_slider_height', array(
	'description' => __( 'Featured Penci Slider Height', 'soledad' ),
	'section' => 'penci_section_fslider_general',
	'settings' => array(
		'desktop' => 'penci_featured_penci_slider_height',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 10,
			'max' => 1000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_featured_penci_slider_ratio', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'featured_penci_slider_ratio', array(
	'description' => __( 'Custom Fixed Ratio Height/Width of Images on Penci Slider', 'soledad' ),
	'sub_description' => __( 'Example: height/width = 0.45 = 45% - let fill 45', 'soledad' ),
	'section' => 'penci_section_fslider_general',
	'settings' => array(
		'desktop' => 'penci_featured_penci_slider_ratio',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 400,
			'step' => 1,
			'edit' => true,
			'unit' => '%',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_penci_slider_remove_overlay', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_slider_remove_overlay', array(
	'label'    => 'Remove Black Overlay Background on Heading & Captions of Penci Slider',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_penci_slider_remove_overlay',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_filter_type', array(
	'default'           => 'category',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_filter_type', array(
	'label'    => 'Filter Featured Slider By',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_featured_slider_filter_type',
	'type'     => 'radio',
	'choices'  => array(
		'category' => 'Featured Category',
		'tags'     => 'Featured Tags'
	)
) ) );

$wp_customize->add_setting( 'penci_featured_cat', array(
	'default'           => '0',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Category_Control( $wp_customize, 'featured_cat', array(
	'label'       => 'Select Featured Category',
	'settings'    => 'penci_featured_cat',
	'description' => 'Just apply when you select filter by Featured Category above',
	'section'     => 'penci_section_fslider_general',
) ) );

$wp_customize->add_setting( 'penci_featured_tags', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_tags', array(
	'label'       => 'Fill List Featured Tags for Featured Slider',
	'section'     => 'penci_section_fslider_general',
	'settings'    => 'penci_featured_tags',
	'description' => 'Just apply when you select filter by Featured Tags above. And please fill list featured tags slug here, check <a rel="nofollow" href="http://soledad.pencidesign.com/soledad-document/images/tags.png" target="_blank">this image</a> to know what is tags slug. Example for multiple tags slug, fill:  tag-1, tag-2, tag-3',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_featured_cat_hide', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_cat_hide', array(
	'label'       => 'Hide Featured Category',
	'section'     => 'penci_section_fslider_general',
	'settings'    => 'penci_featured_cat_hide',
	'description' => 'Check this if you want the featured category to be hide on all pages.',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_exclude_featured_cat', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'exclude_featured_cat', array(
	'label'       => 'Exclude All Posts on the Featured Slider in Latest Posts on Homepage',
	'section'     => 'penci_section_fslider_general',
	'description' => 'Let view your site outside customize page to see the changes.',
	'settings'    => 'penci_exclude_featured_cat',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_center_box', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_center_box', array(
	'label'    => 'Hide Center Box on Featured Slider',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_featured_center_box',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_off_uppercase_title', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_off_uppercase_title', array(
	'label'    => 'Turn off Uppercase of Heading/Post Titles on Slider',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_featured_off_uppercase_title',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_meta_date', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_meta_date', array(
	'label'    => 'Hide Post Date',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_featured_meta_date',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_hide_categories', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_hide_categories', array(
	'label'       => 'Hide Categories Of Post',
	'section'     => 'penci_section_fslider_general',
	'settings'    => 'penci_featured_hide_categories',
	'description' => '',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_meta_comment', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_meta_comment', array(
	'label'    => 'Hide Post Number Comments',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_featured_meta_comment',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_meta_author', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_meta_author', array(
	'label'    => 'Show Post Author',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_featured_meta_author',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_meta_excerpt', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_meta_excerpt', array(
	'label'    => 'Hide Post Excerpt on Style 35 & 36',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_featured_meta_excerpt',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_icons', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_icons', array(
	'label'    => 'Hide Post Format Icons',
	'section'  => 'penci_section_fslider_general',
	'settings' => 'penci_featured_slider_icons',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_home_adsense_below_slider', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_adsense_below_slider', array(
	'label'       => 'Add Google Adsense/Custom HTML Code Below Featured Slider',
	'section'     => 'penci_section_fslider_general',
	'settings'    => 'penci_home_adsense_below_slider',
	'description' => '',
	'type'        => 'textarea',
) ) );


/* Font Size */
$wp_customize->add_setting( 'penci_fslider_cat_fsize', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_fslider_cat_fsize', array(
	'description' => __( 'Font Size for Categories on Slider', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_fslider_cat_fsize',
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

$wp_customize->add_setting( 'penci_fslider_meta_fsize', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_fslider_meta_fsize', array(
	'description' => __( 'Font Size for Post Meta', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_fslider_meta_fsize',
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

$wp_customize->add_setting( 'penci_fslider_title_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_fslider_title_fsize', array(
	'description' => __( 'Font Size for Post Titles', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_fslider_title_fsize',
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

$wp_customize->add_setting( 'penci_fslider_smalltitle_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_fslider_smalltitle_fsize', array(
	'description' => __( 'Font Size for Post Titles on Small Posts', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_fslider_smalltitle_fsize',
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

$wp_customize->add_setting( 'penci_fslider_tinytitle_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_fslider_tinytitle_fsize', array(
	'description' => __( 'Font Size for Post Titles on Tiny Posts', 'soledad' ),
	'sub_description' => __( 'You can see Tiny Posts on Style 22, 23, 24', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_fslider_tinytitle_fsize',
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

$wp_customize->add_setting( 'penci_fslider_title_fsize_mobile', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_fslider_title_fsize_mobile', array(
	'description' => __( 'Font Size for Post Titles on Mobile', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_fslider_title_fsize_mobile',
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

$wp_customize->add_setting( 'penci_fslider_small_fsize_mobile', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_fslider_small_fsize_mobile', array(
	'description' => __( 'Font Size for Post Titles on Small Posts on Mobile', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_fslider_small_fsize_mobile',
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

$wp_customize->add_setting( 'penci_fslider_excerpt_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_fslider_excerpt_fsize', array(
	'description' => __( 'Font Size for Excerpt on Style 35, 36, 38', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_fslider_excerpt_fsize',
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

$wp_customize->add_setting( 'penci_fslider_button_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_fslider_button_fsize', array(
	'description' => __( 'Font Size for Button on Style 29, 30, 35, 36, 38', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_fslider_button_fsize',
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

$wp_customize->add_setting( 'penci_pslider_fsize_heading', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_pslider_fsize_heading', array(
	'label'    => esc_html__( 'Penci Slider Style 1 & 2', 'soledad' ),
	'description'    => 'Penci Slider is a Custom Slider - it does not based on Posts. So, you can pick any image & text & URL on each slide.<br>Check a demo for Penci Slider <a target="_blank" href="http://soledad.pencidesign.com/soledad-hipster/?slider=style-31">here</a>',
	'section'  => 'penci_section_fslider_fsize',
	'settings' => 'penci_pslider_fsize_heading',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_pslider_title_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_pslider_title_fsize_mobile', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_pslider_title_fsize', array(
	'description' => __( 'Font Size for Titles on Penci Slider', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_pslider_title_fsize',
		'mobile' => 'penci_pslider_title_fsize_mobile',
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

$wp_customize->add_setting( 'penci_pslider_caption_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_pslider_caption_fsize_mobile', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_pslider_caption_fsize', array(
	'description' => __( 'Font Size for Caption on Penci Slider', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_pslider_caption_fsize',
		'mobile' => 'penci_pslider_caption_fsize_mobile',
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

$wp_customize->add_setting( 'penci_pslider_button_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_pslider_button_fsize_mobile', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_pslider_button_fsize', array(
	'description' => __( 'Font Size for Button on Penci Slider', 'soledad' ),
	'section' => 'penci_section_fslider_fsize',
	'settings' => array(
		'desktop' => 'penci_pslider_button_fsize',
		'mobile' => 'penci_pslider_button_fsize_mobile',
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

/* Colors */
$wp_customize->add_setting( 'penci_featured_slider_overlay_bg', array(
	'default'           => '#000000',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_overlay_bg', array(
	'label'       => 'Featured Slider Overlay Color',
	'section'     => 'penci_section_fslider_colors',
	'description' => 'This option just apply for some featured slider styles has overlay color',
	'settings'    => 'penci_featured_slider_overlay_bg',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_overlay_bg_opacity', array(
	'default'           => '0.7',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_overlay_bg_opacity', array(
	'label'    => 'Featured Slider Overlay Color Opacity',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_overlay_bg_opacity',
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

$wp_customize->add_setting( 'penci_featured_slider_overlay_bg_hover_opacity', array(
	'default'           => '0.9',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_overlay_bg_hover_opacity', array(
	'label'    => 'Featured Slider Hover Overlay Color Opacity',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_overlay_bg_hover_opacity',
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

$wp_customize->add_setting( 'penci_featured_slider_box_bg_color', array(
	'default'           => '#000000',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_box_bg_color', array(
	'label'       => 'Center Box Background Color',
	'section'     => 'penci_section_fslider_colors',
	'settings'    => 'penci_featured_slider_box_bg_color',
	'description' => 'This option just apply for featured slider styles 1, 2, 3, 35, 36',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_box_opacity', array(
	'default'           => '0.7',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_box_opacity', array(
	'label'    => 'Center Box Opacity',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_box_opacity',
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

$wp_customize->add_setting( 'penci_featured_slider_cat_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_cat_color', array(
	'label'    => 'Post Category Color',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_cat_color',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_cat_hover_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_cat_hover_color', array(
	'label'    => 'Post Category Hover Color',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_cat_hover_color',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_title_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_title_color', array(
	'label'    => 'Title Post Color',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_title_color',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_title_hover_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_title_hover_color', array(
	'label'    => 'Title Post Hover Color',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_title_hover_color',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_meta_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_meta_color', array(
	'label'    => 'Post Meta Color',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_meta_color',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_excerpt_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_excerpt_color', array(
	'label'    => 'Post Excerpt Color',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_excerpt_color',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_icon_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_icon_color', array(
	'label'    => 'Post Format Icons Color',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_icon_color',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_color_29', array(
	'default'           => '#000000',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_color_29', array(
	'label'    => 'Overlay Color for Slider Style 29 & 30',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_color_29',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_overlay_opacity29', array(
	'default'           => '0.3',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_overlay_opacity29', array(
	'label'    => 'Overlay Opacity for Slider Style 29 & 30',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_overlay_opacity29',
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

$wp_customize->add_setting( 'penci_featured_slider_lines_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_lines_color', array(
	'label'    => 'Color of Line on Slider Style 29 & 30',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_lines_color',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_button_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_button_color', array(
	'label'    => 'Color Button Text & Button Border on Slider Style 29, 30, 35, 36',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_button_color',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_button_hover_bg', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_button_hover_bg', array(
	'label'    => 'Background Color Hover of Buttor on Slider Style 29, 30, 35, 36, 38',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_button_hover_bg',
) ) );

$wp_customize->add_setting( 'penci_featured_slider_button_hover_color', array(
	'default'           => '#010101',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_button_hover_color', array(
	'label'    => 'Text Color Hover of Buttor on Slider Style 29, 30, 35, 36, 38',
	'section'  => 'penci_section_fslider_colors',
	'settings' => 'penci_featured_slider_button_hover_color',
) ) );