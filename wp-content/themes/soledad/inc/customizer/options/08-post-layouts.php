<?php
/* Add Sections */
$wp_customize->add_section( 'penci_section_standard_classic', array(
	'title'    => esc_html__( 'Standard & Classic', 'soledad' ),
	'description'  => 'All options here apply for Standard Layout, Classic Layout and 1st Posts of 1st Standard & 1st Classic Layout. For other layouts, check on "Other Layouts" section below.',
	'priority' => 1,
	'panel'      => 'penci_post_layout_panel'
) );

$wp_customize->add_section( 'penci_section_other_layouts', array(
	'title'    => esc_html__( 'Other Layouts', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_post_layout_panel'
) );

$wp_customize->add_section( 'penci_section_layout_fontsize', array(
	'title'    => esc_html__( 'Font Size', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_post_layout_panel'
) );

$wp_customize->add_section( 'penci_section_layout_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_post_layout_panel'
) );

/* Standard & Classic */
$wp_customize->add_setting( 'penci_standard_meta_overlay', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_meta_overlay', array(
	'label'       => 'Enable Post Meta Overlay Featured Image',
	'description' => 'This option just apply for Standard Layout Only',
	'section'     => 'penci_section_standard_classic',
	'settings'    => 'penci_standard_meta_overlay',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_thumbnail', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_thumbnail', array(
	'label'    => 'Hide Post Thumbnail',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_thumbnail',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_disable_autoplay_gallery', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_disable_autoplay_gallery', array(
	'label'    => 'Disable Autoplay for Slider on Posts Format Gallery',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_disable_autoplay_gallery',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_thumb_crop', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_thumb_crop', array(
	'label'    => 'Make Featured Image Auto Crop',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_thumb_crop',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_on_uppercase_cat', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_on_uppercase_cat', array(
	'label'    => 'Enable Uppercase in Post Categories',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_on_uppercase_cat',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_off_uppercase_title', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_off_uppercase_title', array(
	'label'    => 'Turn Off Uppercase in Post Title',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_off_uppercase_title',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_share_box', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_share_box', array(
	'label'    => 'Hide Share Icons',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_share_box',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_cat', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_cat', array(
	'label'    => 'Hide Category',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_cat',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_author', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_author', array(
	'label'    => 'Hide Post Author',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_author',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_date', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_date', array(
	'label'    => 'Hide Post Date',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_date',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_comment', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_comment', array(
	'label'    => 'Hide Comment Count',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_comment',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_viewcount', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_standard_viewcount', array(
	'label'    => 'Show Views Count',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_viewcount',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_remove_line', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_remove_line', array(
	'label'    => 'Remove Line Above Post Excerpt',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_remove_line',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_auto_excerpt', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_auto_excerpt', array(
	'label'    => 'Display Post Excerpt Instead of Full Content',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_auto_excerpt',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_effect_button', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_effect_button', array(
	'label'    => 'Disable Hover Effect on "Continue Reading" Button',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_effect_button',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_standard_continue_reading_button', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_continue_reading_button', array(
	'label'    => 'Make "Continue Reading" is A Button',
	'section'  => 'penci_section_standard_classic',
	'settings' => 'penci_standard_continue_reading_button',
	'type'     => 'checkbox',
) ) );

/* Other Layouts */
$wp_customize->add_setting( 'penci_grid_icon_format', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_icon_format', array(
	'label'    => 'Hide Icon Post Format',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_icon_format',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_meta_overlay', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_meta_overlay', array(
	'label'       => 'Display Post Meta Overlay Featured Image',
	'section'     => 'penci_section_other_layouts',
	'settings'    => 'penci_grid_meta_overlay',
	'description' => 'This option just apply for Grid Posts & Masonry Posts',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_uppercase_cat', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_uppercase_cat', array(
	'label'    => 'Enable Uppercase on Post Categories',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_uppercase_cat',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_off_title_uppercase', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_off_title_uppercase', array(
	'label'    => 'Turn Off Uppercase on Post Title',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_off_title_uppercase',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_lightbox_video', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_lightbox_video', array(
	'label'       => 'Enable Click on Posts Thumbnail to Play Video',
	'description' => 'This option only apply for video posts format - supports only for Youtube & Vimeo',
	'section'     => 'penci_section_other_layouts',
	'settings'    => 'penci_grid_lightbox_video',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_off_letter_spacing', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_off_letter_spacing', array(
	'label'    => 'Remove Letter Spacing on Post Titles',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_off_letter_spacing',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_nocrop_list', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_nocrop_list', array(
	'label'       => 'Do Not Crop Images on List Layouts',
	'section'     => 'penci_section_other_layouts',
	'settings'    => 'penci_grid_nocrop_list',
	'description' => 'This option does not apply for gallery posts format',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_share_box', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_share_box', array(
	'label'    => 'Hide Share Box',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_share_box',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_cat', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_cat', array(
	'label'    => 'Hide Category',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_cat',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_author', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_author', array(
	'label'    => 'Hide Post Author',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_author',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_date', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_date', array(
	'label'    => 'Hide Post Date',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_date',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_countviews', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_countviews', array(
	'label'    => 'Show Views Count',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_countviews',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_comment', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_comment', array(
	'label'    => 'Hide Comment Count on Mixed & Overlay Posts',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_comment',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_comment_other', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_comment_other', array(
	'label'    => 'Show Comment Count on Grid, Masonry, List, Boxed, Photography Posts',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_comment_other',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_remove_line', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_remove_line', array(
	'label'    => 'Remove Line Above Post Excerpt',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_remove_line',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_remove_excerpt', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_remove_excerpt', array(
	'label'    => 'Remove Post Excerpt',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_remove_excerpt',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_add_readmore', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_add_readmore', array(
	'label'    => 'Add "Read more" button link',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_add_readmore',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_remove_arrow', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_remove_arrow', array(
	'label'    => 'Remove arrow on "Read more"',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_remove_arrow',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_readmore_button', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_readmore_button', array(
	'label'    => 'Make "Read more" is A Button',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_readmore_button',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_grid_readmore_align', array(
	'default'           => 'left',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_readmore_align', array(
	'label'    => 'Align "Read more" Button',
	'section'  => 'penci_section_other_layouts',
	'settings' => 'penci_grid_readmore_align',
	'type'     => 'select',
	'choices'  => array(
		'left'   => esc_html__( 'Left', 'soledad' ),
		'center' => esc_html__( 'Center', 'soledad' ),
		'right'  => esc_html__( 'Right', 'soledad' )
	)
) ) );

$wp_customize->add_setting( 'penci_post_excerpt_length', array(
	'default' => '30',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'post_excerpt_length', array(
	'description' => __( 'Custom Excerpt Length', 'soledad' ),
	'section' => 'penci_section_other_layouts',
	'settings' => array(
		'desktop' => 'penci_post_excerpt_length',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 1,
			'max' => 200,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
) ) );

/* Font Size */
$wp_customize->add_setting( 'penci_layout_category_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_layout_category_fsize', array(
	'description' => __( 'Font Size for Categories', 'soledad' ),
	'section' => 'penci_section_layout_fontsize',
	'settings' => array(
		'desktop' => 'penci_layout_category_fsize',
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

$wp_customize->add_setting( 'penci_layout_titlebig_fsize', array(
	'default' => '24',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_layout_category_fsize_mobile', array(
	'default' => '18',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_layout_titlebig_fsize', array(
	'description' => __( 'Font Size for Post Titles on Layouts: Standard, Classic & Overlay', 'soledad' ),
	'section' => 'penci_section_layout_fontsize',
	'settings' => array(
		'desktop' => 'penci_layout_titlebig_fsize',
		'mobile' => 'penci_layout_category_fsize_mobile',
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

$wp_customize->add_setting( 'penci_layout_title_fsize', array(
	'default' => '18',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_layout_title_fsize_mobile', array(
	'default' => '16',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_layout_title_fsize', array(
	'description' => __( 'Font Size for Post Titles on Other Layouts', 'soledad' ),
	'section' => 'penci_section_layout_fontsize',
	'settings' => array(
		'desktop' => 'penci_layout_title_fsize',
		'mobile' => 'penci_layout_title_fsize_mobile',
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

$wp_customize->add_setting( 'penci_layout_meta_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_layout_meta_fsize', array(
	'description' => __( 'Font Size for Post Meta', 'soledad' ),
	'section' => 'penci_section_layout_fontsize',
	'settings' => array(
		'desktop' => 'penci_layout_meta_fsize',
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

$wp_customize->add_setting( 'penci_layout_excerpt_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_layout_excerpt_fsize', array(
	'description' => __( 'Font Size for Post Excerpt', 'soledad' ),
	'section' => 'penci_section_layout_fontsize',
	'settings' => array(
		'desktop' => 'penci_layout_excerpt_fsize',
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

$wp_customize->add_setting( 'penci_layout_readmore_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_layout_readmore_fsize', array(
	'description' => __( 'Font Size for "Continue Reading"/"Read More" Button', 'soledad' ),
	'section' => 'penci_section_layout_fontsize',
	'settings' => array(
		'desktop' => 'penci_layout_readmore_fsize',
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

$wp_customize->add_setting( 'penci_layout_sharebox_fsize', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_layout_sharebox_fsize', array(
	'description' => __( 'Font Size for Like/Share Icons', 'soledad' ),
	'section' => 'penci_section_layout_fontsize',
	'settings' => array(
		'desktop' => 'penci_layout_sharebox_fsize',
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
$wp_customize->add_setting( 'penci_standar_classic_heading_color', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_standar_classic_heading_color', array(
	'label'    => esc_html__( 'Standard & Classic', 'soledad' ),
	'section'  => 'penci_section_layout_colors',
	'description'  => 'All options here apply for Standard Layout, Classic Layout and 1st Posts of 1st Standard & 1st Classic Layout.',
	'settings' => 'penci_standar_classic_heading_color',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_standard_categories_action_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_categories_action_color', array(
	'label'    => 'Categories Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_standard_categories_action_color',
) ) );

$wp_customize->add_setting( 'penci_standard_title_post_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_title_post_color', array(
	'label'    => 'Post Titles Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_standard_title_post_color',
) ) );

$wp_customize->add_setting( 'penci_standard_title_post_hover_color', array(
	'default'           => '#888888',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_title_post_hover_color', array(
	'label'    => 'Post Titles Hover Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_standard_title_post_hover_color',
) ) );

$wp_customize->add_setting( 'penci_standard_meta_post_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_standard_meta_post_color', array(
	'label'    => 'Post Meta Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_standard_meta_post_color',
) ) );

$wp_customize->add_setting( 'penci_standard_author_post_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_standard_author_post_color', array(
	'label'    => 'Author Name Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_standard_author_post_color',
) ) );

$wp_customize->add_setting( 'penci_standard_readmore_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_standard_readmore_color', array(
	'label'    => '"Continue Reading" Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_standard_readmore_color',
) ) );

$wp_customize->add_setting( 'penci_standard_readmore_bg', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_standard_readmore_bg', array(
	'label'    => '"Continue Reading" Background Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_standard_readmore_bg',
) ) );

$wp_customize->add_setting( 'penci_standard_share_icon_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_share_icon_color', array(
	'label'    => 'Share Box Icons Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_standard_share_icon_color',
) ) );

$wp_customize->add_setting( 'penci_standard_share_icon_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_share_icon_hover_color', array(
	'label'    => 'Share Box Icons Hover Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_standard_share_icon_hover_color',
) ) );

$wp_customize->add_setting( 'penci_standard_accent_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_accent_color', array(
	'label'    => 'Accent Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_standard_accent_color',
) ) );

$wp_customize->add_setting( 'penci_other_layouts_heading_color', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_other_layouts_heading_color', array(
	'label'    => esc_html__( 'Other Layouts', 'soledad' ),
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_other_layouts_heading_color',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_masonry_categories_accent_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'masonry_categories_accent_color', array(
	'label'    => 'Categories Accent Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_masonry_categories_accent_color',
) ) );

$wp_customize->add_setting( 'penci_masonry_title_post_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'masonry_title_post_color', array(
	'label'    => 'Post Titles Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_masonry_title_post_color',
) ) );

$wp_customize->add_setting( 'penci_masonry_title_post_hover_color', array(
	'default'           => '#888888',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'masonry_title_post_hover_color', array(
	'label'    => 'Post Titles Hover Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_masonry_title_post_hover_color',
) ) );

$wp_customize->add_setting( 'penci_masonry_meta_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_masonry_meta_color', array(
	'label'    => 'Post Meta Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_masonry_meta_color',
) ) );

$wp_customize->add_setting( 'penci_masonry_author_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_masonry_author_color', array(
	'label'    => 'Author Name & Comment Count Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_masonry_author_color',
) ) );

$wp_customize->add_setting( 'penci_masonry_readmore_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_masonry_readmore_color', array(
	'label'    => '"Read More" Link/Button Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_masonry_readmore_color',
) ) );

$wp_customize->add_setting( 'penci_masonry_readmore_bg', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_masonry_readmore_bg', array(
	'label'    => '"Read More" Button Background Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_masonry_readmore_bg',
) ) );

$wp_customize->add_setting( 'penci_masonry_box_icon', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'masonry_box_icon', array(
	'label'    => 'Share Box Icons Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_masonry_box_icon',
) ) );

$wp_customize->add_setting( 'penci_masonry_box_icon_hover', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'masonry_box_icon_hover', array(
	'label'    => 'Share Box Icons Hover Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_masonry_box_icon_hover',
) ) );

$wp_customize->add_setting( 'penci_masonry_accent_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'masonry_accent_color', array(
	'label'    => 'Accent Color',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_masonry_accent_color',
) ) );

$wp_customize->add_setting( 'penci_photography_overlay_color', array(
	'default'           => '#000000',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'photography_overlay_color', array(
	'label'    => 'Overlay Background Color on Photography Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_photography_overlay_color',
) ) );

$wp_customize->add_setting( 'penci_photography_overlay_opacity', array(
	'default'           => '0.3',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'photography_overlay_opacity', array(
	'label'    => 'Overlay Background Opacity on Photography Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_photography_overlay_opacity',
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

$wp_customize->add_setting( 'penci_photography_overlay_hover_opacity', array(
	'default'           => '0.7',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'photography_overlay_hover_opacity', array(
	'label'    => 'Overlay Background Hover Opacity on Photography Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_photography_overlay_hover_opacity',
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

$wp_customize->add_setting( 'penci_photography_categories_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'photography_categories_color', array(
	'label'    => 'Categories Color on Photography Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_photography_categories_color',
) ) );

$wp_customize->add_setting( 'penci_photography_title_post_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'photography_title_post_color', array(
	'label'    => 'Post Titles Color on Photography Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_photography_title_post_color',
) ) );

$wp_customize->add_setting( 'penci_photography_title_post_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'photography_title_post_hover_color', array(
	'label'    => 'Post Titles Hover Color on Photography Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_photography_title_post_hover_color',
) ) );

$wp_customize->add_setting( 'penci_photography_meta_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'photography_meta_color', array(
	'label'    => 'Meta Color on Photography Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_photography_meta_color',
) ) );

$wp_customize->add_setting( 'penci_photography_accent_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'photography_accent_color', array(
	'label'    => 'Accent Color on Photography Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_photography_accent_color',
) ) );

$wp_customize->add_setting( 'penci_overlay_title_post_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'overlay_title_post_color', array(
	'label'    => 'Post Titles Color on Overlay Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_overlay_title_post_color',
) ) );

$wp_customize->add_setting( 'penci_overlay_title_post_hover_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'overlay_title_post_hover_color', array(
	'label'    => 'Post Titles Hover Color on Overlay Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_overlay_title_post_hover_color',
) ) );

$wp_customize->add_setting( 'penci_overlay_cat_post_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'overlay_cat_post_color', array(
	'label'    => 'Categories Post Color on Overlay Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_overlay_cat_post_color',
) ) );

$wp_customize->add_setting( 'penci_overlay_cat_hover_post_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'overlay_cat_hover_post_color', array(
	'label'    => 'Categories Post Hover Color on Overlay Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_overlay_cat_hover_post_color',
) ) );

$wp_customize->add_setting( 'penci_overlay_author_post_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'overlay_author_post_color', array(
	'label'    => 'Author Color on Overlay Layout',
	'section'  => 'penci_section_layout_colors',
	'settings' => 'penci_overlay_author_post_color',
) ) );