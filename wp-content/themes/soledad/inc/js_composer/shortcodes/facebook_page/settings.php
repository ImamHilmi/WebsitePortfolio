<?php
vc_map( array(
	'base'          => 'penci_facebook_page',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => 'Soledad',
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/facebook_page/frontend.php',
	'weight'        => 700,
	'name'          => __( 'Penci Facebook Page', 'soledad' ),
	'description'   => __( 'Facebook Page Block', 'soledad' ),
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Facebook Page Title:', 'soledad' ),
				'param_name' => 'title_page',
				'std'        => esc_html__( 'Facebook', 'soledad' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Facebook Page URL:', 'soledad' ),
				'param_name'  => 'page_url',
				'admin_label' => true,
				'std'         => 'https://www.facebook.com/PenciDesign',
				'value'       => 'https://www.facebook.com/PenciDesign',
				'description' => esc_html__( 'EG. https://www.facebook.com/your-page/', 'soledad' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Facebook Page Height::', 'soledad' ),
				'param_name'  => 'page_height',
				'std'         => 290,
				'description' => esc_html__( 'This option is only applied when "Show Stream" option is checked', 'soledad' ),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Hide Faces', 'soledad' ),
				'param_name' => 'hide_faces',
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__( 'Hide Stream', 'soledad' ),
				'param_name' => 'hide_stream',
			)
		),
		Penci_Vc_Params_Helper::heading_block_params(),
		Penci_Vc_Params_Helper::params_heading_typo_color(),
		Penci_Vc_Params_Helper::extra_params()
	)
) );