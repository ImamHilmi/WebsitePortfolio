<?php
$group_icon  = 'Icon';
$group_color = 'Typo & Color';

vc_map( array(
	'base'          => "penci_instagram",
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => 'Soledad',
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/instagram/frontend.php',
	'weight'        => 775,
	'name'          => __( 'Penci Instagram Feed', 'soledad' ),
	'description'   => 'Instagram Block',
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Search instagram for', 'soledad' ),
				'param_name' => 'search_for',
				'value'      => array(
					'Username' => 'username',
					'Hashtag'  => 'hashtag',
				),
				'std'        => 'username',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Username', 'soledad' ),
				'param_name' => 'username',
				'dependency' => array( 'element' => 'search_for', 'value' => array( 'username' ) ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Instagram Access Token:', 'soledad' ),
				'param_name'  => 'access_token',
				'description' => 'Please fill the Instagram Access Token here. You can get Instagram Access Token via <a href="http://pencidesign.com/penci_instagram/" target="_blank">http://pencidesign.com/penci_instagram/</a>',
				'dependency' => array( 'element' => 'search_for', 'value' => array( 'username' ) ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Instagram User ID:', 'soledad' ),
				'param_name'  => 'insta_user_id',
				'description' => 'Please enter the User ID for this Profile ( Eg: 123456789987654321 ). You can get User ID via <a href="http://pencidesign.com/penci_instagram/" target="_blank">http://pencidesign.com/penci_instagram/</a>',
				'dependency' => array( 'element' => 'search_for', 'value' => array( 'username' ) ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Hashtag', 'soledad' ),
				'param_name' => 'hashtag',
				'description' => 'without # sign',
				'dependency' => array( 'element' => 'search_for', 'value' => array( 'hashtag' ) ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Block Users', 'soledad' ),
				'param_name'  => 'blocked_users',
				'description' => 'Enter usernames separated by commas whose images you don\'t want to show',
				'dependency'  => array( 'element' => 'search_for', 'value' => array( 'hashtag' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Number of images to show', 'soledad' ),
				'param_name' => 'images_number',
				'value'      => array(
					1  => 1,
					2  => 2,
					3  => 3,
					4  => 4,
					5  => 5,
					6  => 6,
					7  => 7,
					8  => 8,
					9  => 9,
					10 => 10,
					11 => 11,
					12 => 12
				),
				'std'        => '9',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Check for new images every', 'soledad' ),
				'param_name'  => 'refresh_hour',
				'std'         => '5',
				'description' => 'Unix is hour(s)',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Template', 'soledad' ),
				'param_name' => 'template',
				'value'      => array(
					'Thumbnails - Without Border' => 'thumbs-no-border',
					'Thumbnails'                  => 'thumbs',
					'Slider - Normal'             => 'slider',
					'Slider - Overlay Text'       => 'slider-overlay'
				),
				'std'        => 'thumbs',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Number of Columns:', 'soledad' ),
				'param_name' => 'columns',
				'value'      => array(
					1  => 1,
					2  => 2,
					3  => 3,
					4  => 4,
					5  => 5,
					6  => 6,
					7  => 7,
					8  => 8,
					9  => 9,
					10 => 10,
				),
				'std'        => '3',
				'dependency' => array( 'element' => 'template', 'value' => array( 'thumbs-no-border', 'thumbs' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Order by', 'soledad' ),
				'param_name' => 'orderby',
				'value'      => array(
					__( 'Date - Ascending', 'soledad' )        => 'date-ASC',
					__( 'Date - Descending', 'soledad' )       => 'date-DESC',
					__( 'Popularity - Ascending', 'soledad' )  => 'popular-ASC',
					__( 'Popularity - Descending', 'soledad' ) => 'popular-DESC',
					__( 'Random', 'soledad' )                  => 'rand',
				),
				'std'        => 'rand',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'On click action', 'soledad' ),
				'param_name' => 'images_link',
				'value'      => array(
					__( 'None', 'soledad' )              => '',
					__( 'Instagram image', 'soledad' )   => 'image_url',
					__( 'Instagram Profile', 'soledad' ) => 'user_url',
					__( 'Attachment Page', 'soledad' )   => 'attachment'
				),
				'std'        => 'rand',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Slider Speed (at x seconds)', 'soledad' ),
				'param_name' => 'slidespeed',
				'dependency' => array( 'element' => 'template', 'value' => array( 'slider', 'slider-overlay' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Slider Navigation Controls', 'soledad' ),
				'param_name' => 'controls',
				'value'      => array(
					__( 'None', 'soledad' )        => 'none',
					__( 'Prev & Next', 'soledad' ) => 'prev_next',
					__( 'Dotted', 'soledad' )      => 'numberless',
				),
				'std'        => 'prev_next',
				'dependency' => array( 'element' => 'template', 'value' => array( 'slider', 'slider-overlay' ) ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Number of words in caption', 'soledad' ),
				'param_name' => 'caption_words',
				'default'    => 100,
				'dependency' => array( 'element' => 'template', 'value' => array( 'slider', 'slider-overlay' ) ),
			),
		),
		Penci_Vc_Params_Helper::heading_block_params(),
		Penci_Vc_Params_Helper::params_heading_typo_color(),
		array(
			array(
				'type'       => 'css_editor',
				'heading'    => __( 'CSS box', 'soledad' ),
				'param_name' => 'css',
				'group'      => __( 'Design Options', 'soledad' ),
			)
		)
	)
) );