<?php
/* Add Section */
$wp_customize->add_section( 'pencidesign_new_section_social', array(
	'title'       => esc_html__( 'Social Media', 'soledad' ),
	'description' => esc_html__( 'Enter full your social URL ( include http:// or https:// on the URL ), Icons will not show if left blank.', 'soledad' ),
	'priority'    => 40,
) );

$wp_customize->add_setting( 'penci_facebook', array(
	'default'           => 'https://www.facebook.com/PenciDesign',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
	'label'    => 'Facebook',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_facebook',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_twitter', array(
	'default'           => 'https://twitter.com/PenciDesign',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
	'label'    => 'Twitter',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_twitter',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_instagram', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram', array(
	'label'    => 'Instagram',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_instagram',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_pinterest', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pinterest', array(
	'label'    => 'Pinterest',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_pinterest',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_linkedin', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin', array(
	'label'    => 'LinkedIn',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_linkedin',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_flickr', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'flickr', array(
	'label'    => 'Flickr',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_flickr',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_behance', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'behance', array(
	'label'    => 'Behance',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_behance',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_tumblr', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tumblr', array(
	'label'    => 'Tumblr',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_tumblr',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_youtube', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube', array(
	'label'    => 'Youtube',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_youtube',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_email_me', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email_me', array(
	'label'       => 'Email',
	'section'     => 'pencidesign_new_section_social',
	'description' => 'If you want to click email icon to link to your mail, please fill: mailto:yourmail@hostmail. Change yourmail@hostmail.com to your mail. You also can fill your contact link page here',
	'settings'    => 'penci_email_me',
	'type'        => 'text',
) ) );

$wp_customize->add_setting( 'penci_vk', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vk', array(
	'label'    => 'VK',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_vk',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_bloglovin', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bloglovin', array(
	'label'    => 'Bloglovin',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_bloglovin',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_vine', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vine', array(
	'label'    => 'Vine',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_vine',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_soundcloud', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'soundcloud', array(
	'label'    => 'Soundcloud',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_soundcloud',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_snapchat', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'snapchat', array(
	'label'    => 'Snapchat',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_snapchat',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_spotify', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'spotify', array(
	'label'    => 'Spotify',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_spotify',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_github', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'github', array(
	'label'    => 'Github',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_github',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_stack', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'stack-overflow', array(
	'label'    => 'Stack Overflow',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_stack',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_twitch', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitch', array(
	'label'    => 'Twitch',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_twitch',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_steam', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'steam', array(
	'label'    => 'Steam',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_steam',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_vimeo', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vimeo', array(
	'label'    => 'Vimeo',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_vimeo',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_xing', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xing', array(
	'label'    => 'XING',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_xing',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_whatsapp', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'whatsapp', array(
	'label'    => 'Whatsapp',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_whatsapp',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_telegram', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'telegram', array(
	'label'    => 'Telegram',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_telegram',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_reddit', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'reddit', array(
	'label'    => 'Reddit',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_reddit',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_ok', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ok', array(
	'label'    => 'Ok',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_ok',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_500px', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, '500px', array(
	'label'    => '500px',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_500px',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_stumbleupon', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'stumbleupon', array(
	'label'    => 'StumbleUpon',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_stumbleupon',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_wechat', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wechat', array(
	'label'    => 'Wechat',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_wechat',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_weibo', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'weibo', array(
	'label'    => 'Weibo',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_weibo',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_line', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_line', array(
	'label'    => 'LINE',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_line',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_viber', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'viber', array(
	'label'    => 'Viber',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_viber',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_discord', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'discord', array(
	'label'    => 'Discord',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_discord',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_rss', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rss', array(
	'label'    => 'RSS Link',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_rss',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_slack', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_slack', array(
	'label'    => 'Slack Link',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_slack',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_mixcloud', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_mixcloud', array(
	'label'    => 'Mixcloud Link',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_mixcloud',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_goodreads', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_goodreads', array(
	'label'    => 'Goodreads Link',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_goodreads',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_tripadvisor', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_tripadvisor', array(
	'label'    => 'Trip advisor Link',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_tripadvisor',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_tiktok', array(
	'default'           => '',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_tiktok', array(
	'label'    => 'Tik tok Link',
	'section'  => 'pencidesign_new_section_social',
	'settings' => 'penci_tiktok',
	'type'     => 'text',
) ) );