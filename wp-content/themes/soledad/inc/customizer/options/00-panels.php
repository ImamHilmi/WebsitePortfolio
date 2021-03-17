<?php
// Add Panels
$wp_customize->add_panel( 'penci_general_panel', array(
	'priority'       => 2,
	'title'            => __( 'General', 'soledad' ),
	'description'      => __( '', 'soledad' ),
) );

$wp_customize->add_panel( 'penci_topbar_panel', array(
	'priority'       => 2,
	'title'            => __( 'TopBar', 'soledad' ),
	'description'      => __( 'Check <a target="_blank" href="https://imgresources.s3.amazonaws.com/topbar.png">this image</a> to know what is TopBar', 'soledad' ),
) );

$wp_customize->add_panel( 'penci_logoheader_panel', array(
		'priority'       => 3,
		'title'            => __( 'Logo & Header', 'soledad' ),
		'description'      => __( '', 'soledad' ),
) );

$wp_customize->add_panel( 'penci_vernav_hamburger_panel', array(
		'priority'       => 4,
		'title'            => __( 'Vertical Navigation & Hamburger Menu', 'soledad' ),
		'description'      => __( 'Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/vertical-navigation.png">this image</a> to know what is Vertical Navigation and <a target="_blank" href="https://imgresources.s3.amazonaws.com/hamburger.png">this image</a> to know what is Hamburger Menu.<br>Most of the options here applies for both Vertical Navigation & Hamburger Menu. When you enable Vertical Navigation - of course, the Hamburger Menu will does not display.', 'soledad' ),
) );

$wp_customize->add_panel( 'penci_homepage_panel', array(
		'priority'       => 5,
		'title'            => __( 'Homepage', 'soledad' ),
		'description'      => __( 'This is a powerful WordPress theme, it supports 3 ways to help you can setup a homepage - you can check more <a target="_blank" href="http://soledad.pencidesign.com/soledad-document/#homepage">here</a>.<br>And most of all the options here apply when you use <strong>WAY 2: Config Homepage by use Customize</strong>.', 'soledad' ),
) );

$wp_customize->add_panel( 'penci_featured_slider_panel', array(
		'priority'       => 6,
		'title'            => __( 'Featured Slider', 'soledad' ),
		'description'      => __( 'This is a powerful WordPress theme, it supports 3 ways to help you can setup a homepage - you can check more <a target="_blank" href="http://soledad.pencidesign.com/soledad-document/#homepage">here</a>.<br>And most of all the options here apply when you use <strong>WAY 2: Config Homepage by use Customize</strong>.<br>If you use Elementor or WPBakery to config your pages, you can use element "Penci Featured Slider" to get the slider display.', 'soledad' ),
) );

$wp_customize->add_panel( 'penci_featured_video_panel', array(
		'priority'       => 7,
		'title'            => __( 'Featured Video Background', 'soledad' ),
		'description'      => __( 'You can check <a target="_blank" href="http://soledad.pencidesign.com/?video=video-bg&body=boxed-none">this demo</a> to know what is Featured Video Background.<br>This is a powerful WordPress theme, it supports 3 ways to help you can setup a homepage - you can check more <a target="_blank" href="http://soledad.pencidesign.com/soledad-document/#homepage">here</a>.<br>And most of all the options here apply when you use <strong>WAY 2: Config Homepage by use Customize</strong>.If you use Elementor or WPBakery to config your pages, you can use background video feature on section/rows to get it display.', 'soledad' ),
) );

$wp_customize->add_panel( 'penci_post_layout_panel', array(
		'priority'       => 8,
		'title'            => __( 'Posts Layouts', 'soledad' ),
		'description'      => __( '', 'soledad' ),
) );

$wp_customize->add_panel( 'penci_sidebar_panel', array(
		'priority'       => 9,
		'title'            => __( 'Sidebar', 'soledad' ),
		'description'      => __( '', 'soledad' ),
) );

$wp_customize->add_panel( 'penci_single_post_panel', array(
		'priority'       => 10,
		'title'            => __( 'Single Posts', 'soledad' ),
		'description'      => __( '', 'soledad' ),
) );

$wp_customize->add_panel( 'penci_single_page_panel', array(
		'priority'       => 11,
		'title'            => __( 'Pages', 'soledad' ),
		'description'      => __( '', 'soledad' ),
) );

$wp_customize->add_panel( 'penci_footer_section_panel', array(
		'priority'       => 12,
		'title'            => __( 'Footer', 'soledad' ),
		'description'      => __( '', 'soledad' ),
) );

