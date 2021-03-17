<?php
/* Add Sections */
$wp_customize->add_section( 'penci_section_spost_general', array(
	'title'    => esc_html__( 'General', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_single_post_panel'
) );

$wp_customize->add_section( 'penci_section_spost_related_posts', array(
	'title'    => esc_html__( 'Related Posts', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_single_post_panel'
) );

$wp_customize->add_section( 'penci_section_spost_comments', array(
	'title'    => esc_html__( 'Comments Form', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_single_post_panel'
) );

$wp_customize->add_section( 'penci_section_spost_fontsize', array(
	'title'    => esc_html__( 'Font Size', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_single_post_panel'
) );

$wp_customize->add_section( 'penci_section_spost_colors', array(
	'title'    => esc_html__( 'Colors', 'soledad' ),
	'priority' => 1,
	'panel'      => 'penci_single_post_panel'
) );

/* General */
$wp_customize->add_setting( 'penci_single_style', array(
	'default'           => 'style-1',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_single_style', array(
	'label'    => 'Single Posts Template',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_single_style',
	'type'     => 'select',
	'choices'  => array(
		'style-1'  => esc_html__( 'Style 1', 'soledad' ),
		'style-2'  => esc_html__( 'Style 2', 'soledad' ),
		'style-3'  => esc_html__( 'Style 3', 'soledad' ),
		'style-4'  => esc_html__( 'Style 4', 'soledad' ),
		'style-5'  => esc_html__( 'Style 5', 'soledad' ),
		'style-6'  => esc_html__( 'Style 6', 'soledad' ),
		'style-7'  => esc_html__( 'Style 7', 'soledad' ),
		'style-8'  => esc_html__( 'Style 8', 'soledad' ),
		'style-9'  => esc_html__( 'Style 9', 'soledad' ),
		'style-10' => esc_html__( 'Style 10', 'soledad' ),
	)
) ) );

$wp_customize->add_setting( 'penci_single_layout', array(
	'default'           => 'right',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_single_layout', array(
	'label'    => 'Single Posts Sidebar Layout',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_single_layout',
	'type'     => 'select',
	'choices'  => array(
		'right'       => 'Right Sidebar',
		'left'        => 'Left Sidebar',
		'two'         => 'Two Sidebars',
		'no'          => 'No Sidebar',
		'small_width' => 'No Sidebar with Container Width Smaller'
	)
) ) );

$wp_customize->add_setting( 'penci_single_smaller_width', array(
	'default' => '780',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'single_smaller_width', array(
	'description' => __( 'Custom Width for "No Sidebar with Container Width Smaller" Layout You Selected Above', 'soledad' ),
	'section' => 'penci_section_spost_general',
	'settings' => array(
		'desktop' => 'penci_single_smaller_width',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 100,
			'max' => 1400,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_disable_lazyload_single', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'disable_lazyload_single', array(
	'label'    => 'Disable Lazy Load Images on Single Posts',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_disable_lazyload_single',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_enable_jarallax_single', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_enable_jarallax_single', array(
	'label'       => 'Enable Parallax on Featured Image',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_enable_jarallax_single',
	'type'        => 'checkbox',
	'description' => 'This feature does not apply for Single Style 1 & 2',
) ) );

$wp_customize->add_setting( 'penci_dis_jarallax_single_mb', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_dis_jarallax_single_mb', array(
	'label'       => 'Disable Parallax on Featured Image on Mobile',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_dis_jarallax_single_mb',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_disable_autoplay_single_slider', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'disable_autoplay_single_slider', array(
	'label'    => 'Disable Auto Play for Single Slider Gallery & Posts Format Gallery',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_disable_autoplay_single_slider',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_disable_image_titles_galleries', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'disable_image_titles_galleries', array(
	'label'    => 'Hide Images Title on Galleries from The Theme',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_disable_image_titles_galleries',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_move_title_bellow', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'move_title_bellow', array(
	'label'    => 'Move Categories, Post Title, Post Meta To Bellow Featured Image',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_move_title_bellow',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_disable_lightbox_single', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'disable_lightbox_single', array(
	'label'    => 'Disable Lightbox in Single',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_disable_lightbox_single',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_thumb', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_thumb', array(
	'label'       => 'Hide Featured Image on Top',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_post_thumb',
	'description' => 'Hide Featured images auto appears on single posts page - This option not apply for Video format, Gallery format',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_cat', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_cat', array(
	'label'    => 'Hide Category',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_post_cat',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_on_uppercase_post_cat', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'on_uppercase_post_cat', array(
	'label'    => 'Enable Uppercase on Post Categories',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_on_uppercase_post_cat',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_featured_image_radius', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_featured_image_radius', array(
	'label'       => 'Custom Border Radius for Featured Image',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_post_featured_image_radius',
	'description' => 'You can use pixel or percent. E.g:  <strong>10px</strong>  or  <strong>10%</strong>. If you want to disable border radius - fill 0',
) ) );

$wp_customize->add_setting( 'penci_post_featured_image_ratio', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_featured_image_ratio', array(
	'label'       => 'Custom Aspect Ratio for Featured Image',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_post_featured_image_ratio',
	'description' => 'The aspect ratio of an element describes the proportional relationship between its width and its height. E.g: <strong>3:2</strong>. Default is 3:2 . This option not apply when enable parallax images. This feature does not apply for Single Style 1 & 2',
) ) );

$wp_customize->add_setting( 'penci_align_left_post_title', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'align_left_post_title', array(
	'label'    => 'Enable Align Left Post Title',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_align_left_post_title',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_off_letter_space_post_title', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'off_letter_space_post_title', array(
	'label'    => 'Remove Letter Spacing on Post Title',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_off_letter_space_post_title',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_off_uppercase_post_title', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'off_uppercase_post_title', array(
	'label'    => 'Turn Off Uppercase on Post Title',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_off_uppercase_post_title',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_single_meta_author', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_meta_author', array(
	'label'    => 'Hide Post Author',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_single_meta_author',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_single_meta_date', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_meta_date', array(
	'label'    => 'Hide Post Date',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_single_meta_date',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_single_publishmodified', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_publishmodified', array(
	'label'    => 'Display Published Date & Modified Date',
	'section'  => 'penci_section_spost_general',
	'description' => esc_html__( 'Note that: If Published Date and Modified Date is the same - will be display Published date only. And if you want to display Modified date only - check option for it via Customize > General > General Settings > Display Modified Date Replace with Published Date', 'soledad' ),
	'settings' => 'penci_single_publishmodified',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_single_meta_comment', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_meta_comment', array(
	'label'    => 'Hide Comment Count',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_single_meta_comment',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_single_show_cview', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_single_show_cview', array(
	'label'    => 'Show Views Count',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_single_show_cview',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_enable_ajax_view', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_enable_ajax_view', array(
	'label'       => 'Enable ajax Post View Count',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_enable_ajax_view',
	'description' => 'Use to count posts viewed when you using cache plugin.',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_thumb_caption', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_thumb_caption', array(
	'label'       => 'Enable Caption on Featured Image for Single Posts style 1 & 2',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_post_thumb_caption',
	'description' => 'If your featured image has a caption, it will display on featured image',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_gallery_caption', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_gallery_caption', array(
	'label'       => 'Enable Caption on Slider of Gallery Post Format for Single Posts style 1 & 2',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_post_gallery_caption',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_caption_below', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_caption_below', array(
	'label'    => 'Move Caption of Images to Below The Images',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_post_caption_below',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_caption_disable_italic', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_caption_disable_italic', array(
	'label'    => 'Disable Italic on Caption of Images',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_post_caption_disable_italic',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_blockquote_style', array(
	'default'           => 'style-1',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'blockquote_style', array(
	'label'    => 'Blockquote Style:',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_blockquote_style',
	'type'     => 'select',
	'choices'  => array(
		'style-1' => 'Style 1',
		'style-2' => 'Style 2'
	)
) ) );

$wp_customize->add_setting( 'penci_ads_inside_content_html', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ads_inside_content_html', array(
	'label'       => 'Add Ads/Custom HTML Code Inside Posts Content',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_ads_inside_content_html',
	'description' => '',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_ads_inside_content_style', array(
	'default'           => 'style-1',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ads_inside_content_style', array(
	'label'    => 'Add Ads/Custom HTML Code Inside Posts Content With:',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_ads_inside_content_style',
	'type'     => 'select',
	'choices'  => array(
		'style-1' => 'After Each X Paragraphs - Repeat',
		'style-2' => 'After X Paragraphs - No Repeat'
	)
) ) );

$wp_customize->add_setting( 'penci_ads_inside_content_num', array(
	'default' => '4',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'ads_inside_content_num', array(
	'description' => __( 'Add Ads/Custom HTML Code Inside Posts Content After How Many Paragraphs?', 'soledad' ),
	'section' => 'penci_section_spost_general',
	'settings' => array(
		'desktop' => 'penci_ads_inside_content_num',
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

$wp_customize->add_setting( 'penci_post_tags', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_tags', array(
	'label'    => 'Hide Tags',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_post_tags',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_share', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_share', array(
	'label'    => 'Hide Like Count & Social Share',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_post_share',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_single_style_cscount', array(
	'default'           => 's1',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_single_style_cscount', array(
	'label'       => 'Share Box Style',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_single_style_cscount',
	'description' => '',
	'type'        => 'select',
	'choices'     => array(
		's1' => 'Default',
		's2' => 'Style 2',
		's3' => 'Style 3',
	)
) ) );

$wp_customize->add_setting( 'penci_single_poslcscount', array(
	'default'           => 'below-content',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_single_poslcscount', array(
	'label'       => 'Share Box  Position',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_single_poslcscount',
	'description' => '',
	'type'        => 'select',
	'choices'     => array(
		'above-content' => 'Above content',
		'below-content' => 'Below content',
		'abovebelow-content' => 'Above & Below content',
	)
) ) );

$wp_customize->add_setting( 'penci_single_ordersec', array(
	'default'           => 'author-postnav-related-comments',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_ordersec', array(
	'label'       => 'Re-order "Author Box" - "Post Navigation" - "Related Posts" - "Comments" section',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_single_ordersec',
	'description' => '',
	'type'        => 'select',
	'choices'     => array(
		'author-postnav-related-comments' => 'Author Box - Post Navigation - Related Posts - Comments',
		'author-postnav-comments-related' => 'Author Box - Post Navigation - Comments - Related Posts',
		'author-comments-postnav-related' => 'Author Box - Comments - Post Navigation - Related Posts',
		'author-comments-related-postnav' => 'Author Box - Comments - Related Posts - Post Navigation',
		'author-related-comments-postnav' => 'Author Box - Related Posts - Comments - Post Navigation',
		'author-related-postnav-comments' => 'Author Box - Related Posts - Post Navigation - Comments',
		'postnav-author-related-comments' => 'Post Navigation - Author Box - Related Posts - Comments',
		'postnav-author-comments-related' => 'Post Navigation - Author Box - Comments - Related Posts',
		'postnav-comments-author-related' => 'Post Navigation - Comments - Author Box - Related Posts',
		'postnav-comments-related-author' => 'Post Navigation - Comments - Related Posts - Author Box',
		'postnav-related-comments-author' => 'Post Navigation - Related Posts - Comments - Author Box',
		'postnav-related-author-comments' => 'Post Navigation - Related Posts - Author Box - Comments',
		'related-author-comments-postnav' => 'Related Posts - Author Box - Comments - Post Navigation',
		'related-author-postnav-comments' => 'Related Posts - Author Box - Post Navigation - Comments',
		'related-comments-author-postnav' => 'Related Posts - Comments - Author Box - Post Navigation',
		'related-comments-postnav-author' => 'Related Posts - Comments - Post Navigation - Author Box',
		'related-postnav-author-comments' => 'Related Posts - Post Navigation - Author Box - Comments',
		'related-postnav-comments-author' => 'Related Posts - Post Navigation - Comments - Author Box',
		'comments-author-postnav-related' => 'Comments - Author Box - Post Navigation - Related Posts',
		'comments-author-related-postnav' => 'Comments - Author Box - Related Posts - Post Navigation',
		'comments-postnav-related-author' => 'Comments - Post Navigation - Related Posts - Author Box',
		'comments-postnav-author-related' => 'Comments - Post Navigation - Author Box - Related Posts',
		'comments-related-author-postnav' => 'Comments - Related Posts - Author Box - Post Navigation',
		'comments-related-postnav-author' => 'Comments - Related Posts - Post Navigation - Author Box',
	)
) ) );

$wp_customize->add_setting( 'penci_post_author', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_author', array(
	'label'    => 'Hide Author Box',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_post_author',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_author_email', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_author_email', array(
	'label'    => 'Show Email Icon of Author on Author Box',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_post_author_email',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_nav', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_nav', array(
	'label'    => 'Hide Next/Prev Post Navigation',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_post_nav',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_off_uppercase_post_title_nav', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'off_uppercase_post_title_nav', array(
	'label'    => 'Turn Off Uppercase in Post Title Next/Prev Post Navigation',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_off_uppercase_post_title_nav',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_nav_thumbnail', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_nav_thumbnail', array(
	'label'    => 'Enable Post Thumbnail for Next/Prev Post Navigation',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_post_nav_thumbnail',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_twitter_share_text', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_twitter_share_text', array(
	'label'       => 'Custom Sharing Text for Twitter',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_post_twitter_share_text',
	'description' => '',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_post_remove_lines_related', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_remove_lines_related', array(
	'label'    => 'Remove Lines Before & After of Heading Title on Related & Comments',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_post_remove_lines_related',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_disable_gallery', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_disable_gallery', array(
	'label'    => 'Disable Gallery Feature from This Theme',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_post_disable_gallery',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_gallery_dstyle', array(
	'default'           => 'justified',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gallery_dstyle', array(
	'label'    => 'Default Gallery Style from The Theme',
	'section'  => 'penci_section_spost_general',
	'settings' => 'penci_gallery_dstyle',
	'type'     => 'select',
	'choices'  => array(
		'justified' => 'Justified Style',
		'masonry' => 'Masonry Style',
		'grid' => 'Grid Style',
		'single-slider' => 'Single Slider',
		'none' => 'None'
	)
) ) );

$wp_customize->add_setting( 'penci_image_height_gallery', array(
	'default' => '150',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'image_height_gallery', array(
	'description' => __( 'Custom the height of images on Justified Gallery style', 'soledad' ),
	'section' => 'penci_section_spost_general',
	'settings' => array(
		'desktop' => 'penci_image_height_gallery',
	),
	'choices' => array(
		'desktop' => array(
			'min' => 50,
			'max' => 1000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
) ) );

$wp_customize->add_setting( 'penci_sidebar_name_single', array(
	'default'           => 'main-sidebar',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_name_single', array(
	'label'       => 'Custom Sidebar for Single',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_sidebar_name_single',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar',
	'type'        => 'select',
	'choices'     => get_list_custom_sidebar_option()
) ) );

$wp_customize->add_setting( 'penci_sidebar_left_name_single', array(
	'default'           => 'main-sidebar-left',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_left_name_single', array(
	'label'       => 'Custom Sidebar Left for Single',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_sidebar_left_name_single',
	'description' => 'If sidebar your choice is empty, will display Main Sidebar. This option just apply when you use 2 sidebars for Single',
	'type'        => 'select',
	'choices'     => get_list_custom_sidebar_option()
) ) );

$wp_customize->add_setting( 'penci_post_adsense_single10', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_post_adsense_single10', array(
	'label'       => 'Add Google Adsense/Custom HTML code For Post Template Style 10',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_post_adsense_single10',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_post_adsense_one', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_adsense_one', array(
	'label'       => 'Add Google Adsense/Custom HTML code below post description',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_post_adsense_one',
	'description' => '',
	'type'        => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_post_adsense_two', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_adsense_two', array(
	'label'       => 'Add Google Adsense/Custom HTML code in the end of content posts',
	'section'     => 'penci_section_spost_general',
	'settings'    => 'penci_post_adsense_two',
	'description' => '',
	'type'        => 'textarea',
) ) );

/* Related Posts */
$wp_customize->add_setting( 'penci_post_related', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_related', array(
	'label'    => 'Hide Related Posts Box',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_post_related',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_related_grid', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_related_grid', array(
	'label'    => 'Make Related Posts Display in a Grid Layout ( not Slider )',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_post_related_grid',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_related_by', array(
	'default'           => 'categories',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'related_by', array(
	'label'    => 'Display Related Posts By:',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_related_by',
	'type'     => 'select',
	'choices'  => array(
		'categories'  => 'Categories',
		'tags'        => 'Tags',
		'primary_cat' => 'Yoast SEO Primary Category'
	)
) ) );

$wp_customize->add_setting( 'penci_related_orderby', array(
	'default'           => 'date',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_related_orderby', array(
	'label'    => 'Order Related Posts',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_related_orderby',
	'type'     => 'select',
	'choices'  => array(
		'rand'          => 'Random',
		'date'          => 'Published Date',
		'title'         => 'Posts title',
		'modified'      => 'Modified Date',
		'ID'            => 'Post ID',
		'comment_count' => 'Comment Count'
	)
) ) );

$wp_customize->add_setting( 'penci_related_sort_order', array(
	'default'           => 'DESC',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_related_sort_order', array(
	'label'    => 'Sort Order Related Posts',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_related_sort_order',
	'type'     => 'select',
	'choices'  => array(
		'DESC' => 'Descending',
		'ASC'  => 'Ascending '
	)
) ) );

$wp_customize->add_setting( 'penci_related_posts_title_length', array(
	'default' => '8',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'related_posts_title_length', array(
	'description' => __( 'Words Length for Post Titles on Related Posts', 'soledad' ),
	'section' => 'penci_section_spost_related_posts',
	'settings' => array(
		'desktop' => 'penci_related_posts_title_length',
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

$wp_customize->add_setting( 'penci_post_related_text', array(
	'default'           => 'You may also like',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_related_text', array(
	'label'    => 'Related Posts Custom Text',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_post_related_text',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_off_uppercase_post_title_related', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'off_uppercase_post_title_related', array(
	'label'    => 'Turn Off Uppercase in Post Titles Related Posts',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_off_uppercase_post_title_related',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_related_icons', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_related_icons', array(
	'label'    => 'Enable Posts Format Icons in Related Posts',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_post_related_icons',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_hide_date_related', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_date_related', array(
	'label'    => 'Hide Post Date on Related Posts',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_hide_date_related',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_related_autoplay', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_related_autoplay', array(
	'label'    => 'Related Posts Carousel Auto Play',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_post_related_autoplay',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_related_dots', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_related_dots', array(
	'label'    => 'Hide Dots On Carousel Related Posts',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_post_related_dots',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_related_arrows', array(
	'default'           => true,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_related_arrows', array(
	'label'    => 'Enable Next/Prev Button On Carousel Related Posts',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_post_related_arrows',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_numbers_related_post', array(
	'default' => '10',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'numbers_related_post', array(
	'description' => __( 'Amount of Related Posts', 'soledad' ),
	'section' => 'penci_section_spost_related_posts',
	'settings' => array(
		'desktop' => 'penci_numbers_related_post',
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

$wp_customize->add_setting( 'penci_post_related_exclusive_cat', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_related_exclusive_cat', array(
	'label'       => 'Exclude Featured Category from Related Posts based on Categories',
	'section'     => 'penci_section_spost_related_posts',
	'settings'    => 'penci_post_related_exclusive_cat',
	'description' => 'Featured Category is category you selected to filter slider via Customize > Featured Slider > General. This option will help you remove that category on related posts based on categories',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_section_related_post_popup', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_related_post_popup', array(
	'label'    => esc_html__( 'Related Posts Popup', 'soledad' ),
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_section_related_post_popup',
	'description' => 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/related-posts-popup.png">this image</a> to know what is "Related Posts Popup"',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_related_post_popup', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'related_post_popup', array(
	'label'       => 'Enable Related Posts Popup',
	'section'     => 'penci_section_spost_related_posts',
	'settings'    => 'penci_related_post_popup',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_rltpopup_position', array(
	'default'           => 'left',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rltpopup_position', array(
	'label'    => 'Position of Related Posts Popup',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_rltpopup_position',
	'type'     => 'select',
	'choices'  => array(
		'left'  => 'Left',
		'right' => 'Right'
	)
) ) );

$wp_customize->add_setting( 'penci_rltpopup_by', array(
	'default'           => 'categories',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rltpopup_by', array(
	'label'    => 'Display Related Posts Popup By:',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_rltpopup_by',
	'type'     => 'select',
	'choices'  => array(
		'categories'  => 'Categories',
		'tags'        => 'Tags',
		'primary_cat' => 'Yoast SEO Primary Category'
	)
) ) );

$wp_customize->add_setting( 'penci_rltpopup_orderby', array(
	'default'           => 'date',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rltpopup_orderby', array(
	'label'    => 'Order Related Posts Popup',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_rltpopup_orderby',
	'type'     => 'select',
	'choices'  => array(
		'date'          => 'Published Date',
		'title'         => 'Posts title',
		'modified'      => 'Modified Date',
		'rand'          => 'Random Posts',
		'ID'            => 'Post ID',
		'comment_count' => 'Comment Count'
	)
) ) );

$wp_customize->add_setting( 'penci_rltpopup_sort_order', array(
	'default'           => 'DESC',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rltpopup_sort_order', array(
	'label'    => 'Sort Order Related Posts Popup',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_rltpopup_sort_order',
	'type'     => 'select',
	'choices'  => array(
		'DESC' => 'Descending',
		'ASC'  => 'Ascending '
	)
) ) );

$wp_customize->add_setting( 'penci_rltpopup_title_length', array(
	'default' => '6',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'rltpopup_title_length', array(
	'description' => __( 'Words Length for Post Titles on Related Posts Popup', 'soledad' ),
	'section' => 'penci_section_spost_related_posts',
	'settings' => array(
		'desktop' => 'penci_rltpopup_title_length',
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

$wp_customize->add_setting( 'penci_rltpopup_heading_text', array(
	'default'           => 'Read also',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rltpopup_heading_text', array(
	'label'    => 'Custom Heading Text for Related Posts Popup',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_rltpopup_heading_text',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_rltpopup_numpost', array(
	'default' => '3',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'rltpopup_numpost', array(
	'description' => __( 'Amount of Posts Display on Related Posts Popup', 'soledad' ),
	'section' => 'penci_section_spost_related_posts',
	'settings' => array(
		'desktop' => 'penci_rltpopup_numpost',
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

$wp_customize->add_setting( 'penci_rltpopup_padding_bottom', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'rltpopup_padding_bottom', array(
	'description' => __( 'Custom Padding Bottom of Related Posts Popup', 'soledad' ),
	'section' => 'penci_section_spost_related_posts',
	'settings' => array(
		'desktop' => 'penci_rltpopup_padding_bottom',
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

$wp_customize->add_setting( 'penci_rltpopup_hide_date', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rltpopup_hide_date', array(
	'label'    => 'Hide Date on Related Posts Popup',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_rltpopup_hide_date',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_rltpopup_hide_mobile', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rltpopup_hide_mobile', array(
	'label'    => 'Hide Related Posts Popup on Mobile',
	'section'  => 'penci_section_spost_related_posts',
	'settings' => 'penci_rltpopup_hide_mobile',
	'type'     => 'checkbox',
) ) );

/* Comments Form */
$wp_customize->add_setting( 'penci_post_hide_comments', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_hide_comments', array(
	'label'    => 'Hide Comments & Comment Form',
	'section'  => 'penci_section_spost_comments',
	'settings' => 'penci_post_hide_comments',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_post_move_comment_box', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_move_comment_box', array(
	'label'    => 'Move Comment Form to Above the List Comments',
	'section'  => 'penci_section_spost_comments',
	'settings' => 'penci_post_move_comment_box',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_single_hide_save_fields', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_hide_save_fields', array(
	'label'       => 'Remove checkbox "Save my name, email, and website in this browser for the next time I comment."',
	'section'     => 'penci_section_spost_comments',
	'settings'    => 'penci_single_hide_save_fields',
	'description' => 'Note that: This checkbox just appears when you use Wordpress from version 4.9.6',
	'type'        => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_single_gdpr', array(
	'default'           => false,
	'sanitize_callback' => 'penci_sanitize_checkbox_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_single_gdpr', array(
	'label'    => 'Enable GDPR message on Comment Form',
	'section'  => 'penci_section_spost_comments',
	'settings' => 'penci_single_gdpr',
	'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'penci_single_gdpr_text', array(
	'default'           => esc_html__( '* By using this form you agree with the storage and handling of your data by this website.', 'soledad' ),
	'sanitize_callback' => 'penci_sanitize_textarea_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_single_gdpr_text', array(
	'label'       => esc_html__( 'Custom GDPR Message on Comment Form', 'soledad' ),
	'section'     => 'penci_section_spost_comments',
	'settings'    => 'penci_single_gdpr_text',
	'description' => '',
	'type'        => 'textarea',
) ) );

/* Font Size */
$wp_customize->add_setting( 'penci_single_cat_font_size', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_single_cat_font_size', array(
	'description' => __( 'Font Size for Categories', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_single_cat_font_size',
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

$wp_customize->add_setting( 'penci_single_title_font_size', array(
	'default' => '24',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_setting( 'penci_single_title_font_msize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'single_title_font_size', array(
	'description' => __( 'Font Size for Post Title', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_single_title_font_size',
		'mobile' => 'penci_single_title_font_msize',
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

$opt_single_title_fsize = array(
	'psingle_title_size_s3'  => esc_html__( 'Font Size for Post Title on Style 3', 'soledad' ),
	'psingle_title_size_s4'  => esc_html__( 'Font Size for Post Title on Style 4', 'soledad' ),
	'psingle_title_size_s5'  => esc_html__( 'Font Size for Post Title on Style 5', 'soledad' ),
	'psingle_title_size_s6'  => esc_html__( 'Font Size for Post Title on Style 6', 'soledad' ),
	'psingle_title_size_s7'  => esc_html__( 'Font Size for Post Title on Style 7', 'soledad' ),
	'psingle_title_size_s8'  => esc_html__( 'Font Size for Post Title on Style 8', 'soledad' ),
	'psingle_title_size_s9'  => esc_html__( 'Font Size for Post Title on Style 9', 'soledad' ),
	'psingle_title_size_s10' => esc_html__( 'Font Size for Post Title on Style 10', 'soledad' ),
);
foreach ( $opt_single_title_fsize as $opt_single_title_fsize_id => $opt_single_title_fsize_label ) {
	$wp_customize->add_setting( $opt_single_title_fsize_id, array(
		'default' => '',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_setting( $opt_single_title_fsize_id . '_mobile', array(
		'default' => '',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, $opt_single_title_fsize_id, array(
		'description' => __( $opt_single_title_fsize_label, 'soledad' ),
		'section' => 'penci_section_spost_fontsize',
		'settings' => array(
			'desktop' => $opt_single_title_fsize_id,
			'mobile' => $opt_single_title_fsize_id . '_mobile',
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
}

$wp_customize->add_setting( 'penci_single_meta_font_size', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_single_meta_font_size', array(
	'description' => __( 'Font Size for Post Meta', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_single_meta_font_size',
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

for( $x = 1; $x < 7; $x++ ){
	$default = 26 - ($x * 2);
	$wp_customize->add_setting( 'penci_single_title_h'. $x .'_size', array(
		'default' => $default,
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'single_title_h'. $x .'_size', array(
		'description' => __( 'Font Size for H'. $x .' inside Post Content', 'soledad' ),
		'section' => 'penci_section_spost_fontsize',
		'settings' => array(
			'desktop' => 'penci_single_title_h'. $x .'_size',
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
}

$wp_customize->add_setting( 'penci_single_title_p_size', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'single_title_p_size', array(
	'description' => __( 'Font Size Text Inside Post Content', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_single_title_p_size',
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

$wp_customize->add_setting( 'penci_single_blockquote_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_single_blockquote_fsize', array(
	'description' => __( 'Font Size for Blockquote', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_single_blockquote_fsize',
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

$wp_customize->add_setting( 'penci_single_blockquoteauthor_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_single_blockquoteauthor_fsize', array(
	'description' => __( 'Font Size for Blockquote Author', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_single_blockquoteauthor_fsize',
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

$wp_customize->add_setting( 'penci_single_tags_font_size', array(
	'default' => '11',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_single_tags_font_size', array(
	'description' => __( 'Font Size for Post Tags', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_single_tags_font_size',
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

$wp_customize->add_setting( 'penci_single_share_box_fsize', array(
	'default' => '11',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_single_share_box_fsize', array(
	'description' => __( 'Font Size for Share Box', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_single_share_box_fsize',
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

$wp_customize->add_setting( 'penci_section_fauthor_box', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_fauthor_box', array(
	'label'    => esc_html__( 'Author Box', 'soledad' ),
	'section'  => 'penci_section_spost_fontsize',
	'settings' => 'penci_section_fauthor_box',
	'description' => 'Please check <a target="_blank" href="http://soledad.pencidesign.com/soledad-document/#author-box">this guide</a> to know how to setup Author Box',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_authorbio_name_fsize', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_authorbio_name_fsize', array(
	'description' => __( 'Font Size for Author Name', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_authorbio_name_fsize',
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

$wp_customize->add_setting( 'penci_authorbio_desc_fsize', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_authorbio_desc_fsize', array(
	'description' => __( 'Font Size for Author Description', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_authorbio_desc_fsize',
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

$wp_customize->add_setting( 'penci_authorbio_social_fsize', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_authorbio_social_fsize', array(
	'description' => __( 'Font Size for Author Social Icons', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_authorbio_social_fsize',
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

$wp_customize->add_setting( 'penci_authorbio_nextprev_fsize', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_authorbio_nextprev_fsize', array(
	'label'    => esc_html__( 'Next/Previous Posts', 'soledad' ),
	'section'  => 'penci_section_spost_fontsize',
	'settings' => 'penci_authorbio_nextprev_fsize',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_prevnextpost_fsize', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_prevnextpost_fsize', array(
	'description' => __( 'The "previous post", "next post" Text', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_prevnextpost_fsize',
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

$wp_customize->add_setting( 'penci_prevnextpost_title_fsize', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_prevnextpost_title_fsize', array(
	'description' => __( 'Font Size for Post Titles on Prev/Next Posts', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_prevnextpost_title_fsize',
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

$wp_customize->add_setting( 'penci_relatedpost_fsize', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_relatedpost_fsize', array(
	'label'    => esc_html__( 'Related Posts & Comments', 'soledad' ),
	'section'  => 'penci_section_spost_fontsize',
	'settings' => 'penci_relatedpost_fsize',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_rltcomment_heading_fsize', array(
	'default' => '18',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltcomment_heading_fsize', array(
	'description' => __( 'Font Size for Sections Heading', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltcomment_heading_fsize',
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

$wp_customize->add_setting( 'penci_rltcomment_post_title_fsize', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltcomment_post_title_fsize', array(
	'description' => __( 'Font Size for Post Titles on Related Posts', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltcomment_post_title_fsize',
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

$wp_customize->add_setting( 'penci_rltcomment_post_date_fsize', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltcomment_post_date_fsize', array(
	'description' => __( 'Font Size for Post Date on Related Posts', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltcomment_post_date_fsize',
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

$wp_customize->add_setting( 'penci_rltcomment_cmauthor_fsize', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltcomment_cmauthor_fsize', array(
	'description' => __( 'Font Size for Comment Author Name', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltcomment_cmauthor_fsize',
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

$wp_customize->add_setting( 'penci_rltcomment_cmdate_fsize', array(
	'default' => '12',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltcomment_cmdate_fsize', array(
	'description' => __( 'Font Size for Comment Date', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltcomment_cmdate_fsize',
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

$wp_customize->add_setting( 'penci_rltcomment_cmcontent_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltcomment_cmcontent_fsize', array(
	'description' => __( 'Font Size for Comment Content', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltcomment_cmcontent_fsize',
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

$wp_customize->add_setting( 'penci_rltcomment_cmreplyedit_fsize', array(
	'default' => '11',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltcomment_cmreplyedit_fsize', array(
	'description' => __( 'Font Size for Reply/Edit Text', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltcomment_cmreplyedit_fsize',
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

$wp_customize->add_setting( 'penci_rltcomment_input_fsize', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltcomment_input_fsize', array(
	'description' => __( 'Font Size for Inputs on Comment Form', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltcomment_input_fsize',
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

$wp_customize->add_setting( 'penci_rltcomment_submit_fsize', array(
	'default' => '14',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltcomment_submit_fsize', array(
	'description' => __( 'Font Size for Submit Button on Comment Form', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltcomment_submit_fsize',
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

$wp_customize->add_setting( 'penci_rltcomment_gdrp_fsize', array(
	'default' => '',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltcomment_gdrp_fsize', array(
	'description' => __( 'Font Size for GDPR message & "Save my name, email.." Text', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltcomment_gdrp_fsize',
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

$wp_customize->add_setting( 'penci_relatedpostpopup_fsize', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_relatedpostpopup_fsize', array(
	'label'    => esc_html__( 'Related Posts Popup', 'soledad' ),
	'section'  => 'penci_section_spost_fontsize',
	'settings' => 'penci_relatedpostpopup_fsize',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_rltpopup_heading_fsize', array(
	'default' => '16',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltpopup_heading_fsize', array(
	'description' => __( 'Font Size for Heading', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltpopup_heading_fsize',
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

$wp_customize->add_setting( 'penci_rltpopup_title_fsize', array(
	'default' => '15',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltpopup_title_fsize', array(
	'description' => __( 'Font Size for Post Titles', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltpopup_title_fsize',
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

$wp_customize->add_setting( 'penci_rltpopup_date_fsize', array(
	'default' => '13',
	'sanitize_callback' => 'absint',
) );
$wp_customize->add_control( new Penci_Range_Slider_Control( $wp_customize, 'penci_rltpopup_date_fsize', array(
	'description' => __( 'Font Size for Post Date', 'soledad' ),
	'section' => 'penci_section_spost_fontsize',
	'settings' => array(
		'desktop' => 'penci_rltpopup_date_fsize',
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
$wp_customize->add_setting( 'penci_single_cat_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_cat_color', array(
	'label'    => 'Single Categories Accent Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_cat_color',
) ) );

$wp_customize->add_setting( 'penci_single_title_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_title_color', array(
	'label'    => 'Post Title Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_title_color',
) ) );

$wp_customize->add_setting( 'penci_single_meta_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_single_meta_color', array(
	'label'    => 'Post Meta Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_meta_color',
) ) );

$more_opt_single = array(
	'penci_single_color_title_s568' => esc_html__( 'Post Title Color for Template Style 5, 6, 8', 'soledad' ),
	'penci_single_color_cat_s568'   => esc_html__( 'Categories Color for Template Style 5, 6, 8', 'soledad' ),
	'penci_single_color_meta_s568'  => esc_html__( 'Color for Posts Meta on Template Style 5, 6, 8', 'soledad' ),
	'penci_single_bgcolor_header'   => esc_html__( 'Header Background for Template Style 9 & 10', 'soledad' ),
	'penci_single_color_title_s10'  => esc_html__( 'Post Title Color for Template Style 10', 'soledad' ),
	'penci_single_color_cat_s10'    => esc_html__( 'Categories Color for Template Style 10', 'soledad' ),
	'penci_single_color_meta_s10'   => esc_html__( 'Color for Posts Meta on Template Style 10', 'soledad' ),
	'penci_single_color_bread_s10'  => esc_html__( 'Color for Breadcrumb on Template Style 10', 'soledad' ),
);

foreach ( $more_opt_single as $opt_single_color_id => $opt_single_color_label ) {
	$desc = '';
	if ( 'penci_single_color_title_s568' == $opt_single_color_id ||
		 'penci_single_color_cat_s568' == $opt_single_color_id ||
		 'penci_single_color_meta_s568' == $opt_single_color_id ) {
		$desc = esc_html__( 'This option doesn\'t apply for move post title & meta below featured image', 'soledad' );
	}
	
	$wp_customize->add_setting( $opt_single_color_id, array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $opt_single_color_id, array(
		'label'       => $opt_single_color_label,
		'section'     => 'penci_section_spost_colors',
		'settings'    => $opt_single_color_id,
		'description' => $desc
	) ) );
}

$wp_customize->add_setting( 'penci_single_tag_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_single_tag_color', array(
	'label'    => 'Tags Text Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_tag_color',
) ) );

$wp_customize->add_setting( 'penci_single_tag_border', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_single_tag_border', array(
	'label'    => 'Tags Borders Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_tag_border',
) ) );

$wp_customize->add_setting( 'penci_single_tag_bg', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_single_tag_bg', array(
	'label'    => 'Tags Background Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_tag_bg',
) ) );

$wp_customize->add_setting( 'penci_single_tag_hcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_single_tag_hcolor', array(
	'label'    => 'Tags Hover Text Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_tag_hcolor',
) ) );

$wp_customize->add_setting( 'penci_single_tag_hborder', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_single_tag_hborder', array(
	'label'    => 'Tags Hover Borders Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_tag_hborder',
) ) );

$wp_customize->add_setting( 'penci_single_tag_hbg', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_single_tag_hbg', array(
	'label'    => 'Tags Hover Background Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_tag_hbg',
) ) );

$wp_customize->add_setting( 'penci_single_share_tcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_single_share_tcolor', array(
	'label'    => 'Share Text Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_share_tcolor',
) ) );

$wp_customize->add_setting( 'penci_single_share_icon_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_share_icon_color', array(
	'label'    => 'Share Box Icon Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_share_icon_color',
) ) );

$wp_customize->add_setting( 'penci_single_share_icon_hover_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_share_icon_hover_color', array(
	'label'    => 'Share Box Icon Hover Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_share_icon_hover_color',
) ) );

$wp_customize->add_setting( 'penci_single_number_like_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_number_like_color', array(
	'label'    => 'Numbers Like Of Post Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_number_like_color',
) ) );

$wp_customize->add_setting( 'penci_single_share_icon_style3_bgcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_single_share_icon_style3_bgcolor', array(
	'label'    => 'Icon Background Color for Share Box Style 3',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_share_icon_style3_bgcolor',
) ) );

$wp_customize->add_setting( 'penci_single_share_icon_style3_hbgcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_single_share_icon_style3_hbgcolor', array(
	'label'    => 'Icon Background Hover Color for Share Box Style 3',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_share_icon_style3_hbgcolor',
) ) );

$wp_customize->add_setting( 'penci_single_color_text', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_color_text', array(
	'label'    => 'Custom Text Color Inside Post Content',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_color_text',
) ) );

$wp_customize->add_setting( 'penci_single_color_links', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_color_links', array(
	'label'    => 'Color for Links',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_color_links',
) ) );

for ( $pheading = 1; $pheading < 7; $pheading++ ) {
	$wp_customize->add_setting( 'penci_single_color_h' . $pheading, array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_single_color_h' . $pheading, array(
		'label'    => 'Custom Color for H'. $pheading .' Tag Inside Post Content',
		'section'  => 'penci_section_spost_colors',
		'settings' => 'penci_single_color_h' . $pheading,
	) ) );
}

$wp_customize->add_setting( 'penci_bquote_text_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_bquote_text_color', array(
	'label'    => 'Blockquote Text Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_bquote_text_color',
) ) );

$wp_customize->add_setting( 'penci_bquote_author_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_bquote_author_color', array(
	'label'    => 'Blockquote Author Text Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_bquote_author_color',
) ) );

$wp_customize->add_setting( 'penci_bquote_bgcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_bquote_bgcolor', array(
	'label'    => 'Blockquote Background Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_bquote_bgcolor',
) ) );

$wp_customize->add_setting( 'penci_bquote_border_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_bquote_border_color', array(
	'label'    => 'Borders & Icon Colors on Blockquote',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_bquote_border_color',
) ) );

$wp_customize->add_setting( 'penci_section_cauthor_box', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_cauthor_box', array(
	'label'    => esc_html__( 'Author Box', 'soledad' ),
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_section_cauthor_box',
	'description' => 'Please check <a target="_blank" href="http://soledad.pencidesign.com/soledad-document/#author-box">this guide</a> to know how to setup Author Box',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_authorbio_name_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_authorbio_name_color', array(
	'label'    => 'Author Name Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_authorbio_name_color',
) ) );

$wp_customize->add_setting( 'penci_authorbio_name_hcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_authorbio_name_hcolor', array(
	'label'    => 'Author Name Hover Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_authorbio_name_hcolor',
) ) );

$wp_customize->add_setting( 'penci_authorbio_desc_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_authorbio_desc_color', array(
	'label'    => 'Author Description Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_authorbio_desc_color',
) ) );

$wp_customize->add_setting( 'penci_authorbio_social_color', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_authorbio_social_color', array(
	'label'    => 'Author Social Icons Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_authorbio_social_color',
) ) );

$wp_customize->add_setting( 'penci_authorbio_social_hcolor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_authorbio_social_hcolor', array(
	'label'    => 'Author Social Icons Hover Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_authorbio_social_hcolor',
) ) );

$wp_customize->add_setting( 'penci_section_cpost_nav', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_cpost_nav', array(
	'label'    => esc_html__( 'Next/Previous Posts', 'soledad' ),
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_section_cpost_nav',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_prevnext_colors', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_prevnext_colors', array(
	'label'    => 'Color for "previous post", "next post" Text',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_prevnext_colors',
) ) );

$wp_customize->add_setting( 'penci_prevnext_ctitle', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_prevnext_ctitle', array(
	'label'    => 'Color for Post Titles',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_prevnext_ctitle',
) ) );

$wp_customize->add_setting( 'penci_prevnext_hctitle', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_prevnext_hctitle', array(
	'label'    => 'Color for Post Titles on Hover',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_prevnext_hctitle',
) ) );

$wp_customize->add_setting( 'penci_section_crelatedp', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_crelatedp', array(
	'label'    => esc_html__( 'Related Posts & Comments', 'soledad' ),
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_section_crelatedp',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_heading', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_heading', array(
	'label'    => 'Color for Sections Heading',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_relatedcm_heading',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_lineheading', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_lineheading', array(
	'label'    => 'Color for Lines Before & After Sections Heading',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_relatedcm_lineheading',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_ctitle', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_ctitle', array(
	'label'    => 'Post Titles Color on Related Posts',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_relatedcm_ctitle',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_hctitle', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_hctitle', array(
	'label'    => 'Post Titles Hover Color on Related Posts',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_relatedcm_hctitle',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_cdate', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_cdate', array(
	'label'    => 'Post Date Color on Related Posts',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_relatedcm_cdate',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_author', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_author', array(
	'label'    => 'Comment Author Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_relatedcm_author',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_hauthor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_hauthor', array(
	'label'    => 'Comment Author Hover Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_relatedcm_hauthor',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_cmdate', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_cmdate', array(
	'label'    => 'Comment Date Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_relatedcm_cmdate',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_replyedit', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_replyedit', array(
	'label'    => 'Reply/Edit Text Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_relatedcm_replyedit',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_cmcontent', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_cmcontent', array(
	'label'    => 'Comment Content Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_relatedcm_cmcontent',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_cminput', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_cminput', array(
	'label'    => 'Comment Form Inputs & Textarea Color',
	'section'  => 'penci_section_spost_colors',
	'description'  => 'For change color on "Submit" button color, check options on General > Colors > General Buttons',
	'settings' => 'penci_relatedcm_cminput',
) ) );

$wp_customize->add_setting( 'penci_relatedcm_gdpr', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_relatedcm_gdpr', array(
	'label'    => 'GDPR message & "Save my name, email.." Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_relatedcm_gdpr',
) ) );

$wp_customize->add_setting( 'penci_single_accent_color', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_accent_color', array(
	'label'    => 'Accent Color',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_single_accent_color',
) ) );

$wp_customize->add_setting( 'penci_section_crelated_post_popup', array(
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new Penci_Customize_Heading_Control( $wp_customize, 'penci_section_crelated_post_popup', array(
	'label'    => esc_html__( 'Related Posts Popup', 'soledad' ),
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_section_crelated_post_popup',
	'description' => 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/related-posts-popup.png">this image</a> to know what is "Related Posts Popup"',
	'type'     => 'heading',
) ) );

$wp_customize->add_setting( 'penci_rltpop_heading_bg', array(
	'default'           => '#111111',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rltpop_heading_bg', array(
	'label'    => 'Custom Heading Background on Related Posts Popup',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_rltpop_heading_bg',
) ) );

$wp_customize->add_setting( 'penci_rltpop_heading_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rltpop_heading_color', array(
	'label'    => 'Custom Heading Text Color on Related Posts Popup',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_rltpop_heading_color',
) ) );

$wp_customize->add_setting( 'penci_rltpop_close_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rltpop_close_color', array(
	'label'    => 'Close Button Color on Related Posts Popup',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_rltpop_close_color',
) ) );

$wp_customize->add_setting( 'penci_rltpop_bg_color', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rltpop_bg_color', array(
	'label'    => 'Background Color for Related Posts Popup',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_rltpop_bg_color',
) ) );

$wp_customize->add_setting( 'penci_rltpop_title_color', array(
	'default'           => '#313131',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rltpop_title_color', array(
	'label'    => 'Custom Color for Post Titles on Related Posts Popup',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_rltpop_title_color',
) ) );

$wp_customize->add_setting( 'penci_rltpop_title_hover', array(
	'default'           => '#6eb48c',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rltpop_title_hover', array(
	'label'    => 'Custom Color for Post Titles Hover on Related Posts Popup',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_rltpop_title_hover',
) ) );

$wp_customize->add_setting( 'penci_rltpop_date_color', array(
	'default'           => '#888888',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rltpop_date_color', array(
	'label'    => 'Custom Color for Date on Related Posts Popup',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_rltpop_date_color',
) ) );

$wp_customize->add_setting( 'penci_rltpop_border_color', array(
	'default'           => '#eaeaea',
	'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rltpop_border_color', array(
	'label'    => 'Custom Color for Borders on Related Posts Popup',
	'section'  => 'penci_section_spost_colors',
	'settings' => 'penci_rltpop_border_color',
) ) );