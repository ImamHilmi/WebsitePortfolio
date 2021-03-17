<?php
$pmetas = array(
	'facebook'       => array( 'label' => __( 'Facebook', 'soledad' ), 'default' => 'yes' ),
	'twitter'        => array( 'label' => __( 'Twitter', 'soledad' ), 'default' => 'yes' ),
	'youtube'        => array( 'label' => __( 'Youtube', 'soledad' ), 'default' => 'yes' ),
	'instagram'      => array( 'label' => __( 'Instagram', 'soledad' ), 'default' => 'yes' ),
	'linkedin'       => array( 'label' => __( 'Linkedin', 'soledad' ), 'default' => '' ),
	'pinterest'      => array( 'label' => __( 'Pinterest', 'soledad' ), 'default' => '' ),
	'flickr'         => array( 'label' => __( 'Flickr', 'soledad' ), 'default' => '' ),
	'dribbble'       => array( 'label' => __( 'Dribbble', 'soledad' ), 'default' => '' ),
	'vimeo'          => array( 'label' => __( 'Vimeo', 'soledad' ), 'default' => '' ),
	'delicious'      => array( 'label' => __( 'Delicious', 'soledad' ), 'default' => '' ),
	'soundcloud'     => array( 'label' => __( 'SoundCloud', 'soledad' ), 'default' => '' ),
	'github'         => array( 'label' => __( 'Github', 'soledad' ), 'default' => '' ),
	'behance '       => array( 'label' => __( 'Behance', 'soledad' ), 'default' => '' ),
	'vk'             => array( 'label' => __( 'VK', 'soledad' ), 'default' => '' ),
	'tumblr'         => array( 'label' => __( 'Tumblr', 'soledad' ), 'default' => '' ),
	'vine'           => array( 'label' => __( 'Vine', 'soledad' ), 'default' => '' ),
	'steam'          => array( 'label' => __( 'Steam', 'soledad' ), 'default' => '' ),
	'email'          => array( 'label' => __( 'Email', 'soledad' ), 'default' => '' ),
	'bloglovin'      => array( 'label' => __( 'Bloglovin', 'soledad' ), 'default' => '' ),
	'rss'            => array( 'label' => __( 'Rss', 'soledad' ), 'default' => '' ),
	'snapchat'       => array( 'label' => __( 'Snapchat', 'soledad' ), 'default' => '' ),
	'spotify'        => array( 'label' => __( 'Spotify', 'soledad' ), 'default' => '' ),
	'stack_overflow' => array( 'label' => __( 'Stack overflow', 'soledad' ), 'default' => '' ),
	'twitch'         => array( 'label' => __( 'Twitch', 'soledad' ), 'default' => '' ),
	'line'           => array( 'label' => __( 'Line', 'soledad' ), 'default' => '' ),
	'xing'           => array( 'label' => __( 'Xing', 'soledad' ), 'default' => '' ),
	'patreon'        => array( 'label' => __( 'patreon', 'soledad' ), 'default' => '' ),
);

$meta_params =  array();
foreach ( $pmetas as $key => $pmeta ) {
	$meta_params[] = array(
		'type'       => 'checkbox',
		'heading'    => $pmeta['label'],
		'param_name' => 'social_' . $key,
		'value' => array( __( 'Yes', 'soledad' ) => 'yes' ),
		'std'        => $pmeta['default']
	);
}

vc_map( array(
	'base'          => 'penci_social_counter',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => 'Soledad',
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/social_counter/frontend.php',
	'weight'        => 700,
	'name'          => __( 'Penci Social Counter', 'soledad' ),
	'description'   => __( 'Social Counter Block', 'soledad' ),
	'controls'      => 'full',
	'params'        => array_merge(
		Penci_Vc_Params_Helper::params_container_width(),
		array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Choose Style', 'soledad' ),
				'param_name' => 'social_style',
				'std'        => 's1',
				'value'      => array(
					esc_html__( 'Style 1', 'soledad' ) => 's1',
					esc_html__( 'Style 2', 'soledad' ) => 's2',
					esc_html__( 'Style 3', 'soledad' ) => 's3',
					esc_html__( 'Style 4', 'soledad' ) => 's4',
				),
			),
		),
		$meta_params,
		array(
			array(
				'type'       => 'penci_number',
				'param_name' => 'social_name_size',
				'heading'    => __( 'Font size for Social Name', 'soledad' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
			),
			array(
				'type'       => 'penci_number',
				'param_name' => 'social_number_size',
				'heading'    => __( 'Font size for Social Number', 'soledad' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
			),
		),
		Penci_Vc_Params_Helper::heading_block_params(),
		Penci_Vc_Params_Helper::params_heading_typo_color(),
		Penci_Vc_Params_Helper::extra_params()
	)
) );