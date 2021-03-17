<?php
/* Add Section */
$wp_customize->add_section( 'pencidesign_new_section_transition_lang', array(
	'title'       => esc_html__( 'Quick Text Translation', 'soledad' ),
	"description" => "If you are using WPML or Polylang - Use shortcode [pencilang] inside fields below with multiple languages - Example: <strong>[pencilang en_US='Share' fr_FR='Partager' language_code='Your language text' /]</strong><br>Make sure plugin Penci Shortcodes are activated. You can check languages code <a href='https://make.wordpress.org/polyglots/teams/' target='_blank'>here</a>",
	'priority'    => 45,
) );

/* Add Options */
$wp_customize->add_setting( 'penci_trans_type_and_hit', array(
	'default'           => 'Type and hit enter...',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_type_and_hit', array(
	'label'    => 'Text: "Type and hit enter..."',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_type_and_hit',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_countviews', array(
	'default'           => 'views',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_trans_countviews', array(
	'label'    => 'Text: "views"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_countviews',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_published', array(
	'default'           => 'Published:',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_trans_published', array(
	'label'    => 'Text: "Published:"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_published',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_modifiedat', array(
	'default'           => 'Last Updated on',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_trans_modifiedat', array(
	'label'    => 'Text: "Last Updated on"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_modifiedat',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_comment', array(
	'default'           => 'comment',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_comment', array(
	'label'    => 'Text: "comment"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_comment',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_comments', array(
	'default'           => 'comments',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_comments', array(
	'label'       => 'Text: "comments"',
	'section'     => 'pencidesign_new_section_transition_lang',
	'description' => 'for plural of comments',
	'settings'    => 'penci_trans_comments',
	'type'        => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_reply_comment', array(
	'default'           => 'Reply',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_reply_comment', array(
	'label'    => 'Text: "Reply"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_reply_comment',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_edit_comment', array(
	'default'           => 'Edit',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_edit_comment', array(
	'label'    => 'Text: "Edit"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_edit_comment',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_wait_approval_comment', array(
	'default'           => 'Your comment is awaiting approval',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_wait_approval_comment', array(
	'label'    => 'Text: "Your comment is awaiting approval"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_wait_approval_comment',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_save_fields', array(
	'default'           => 'Save my name, email, and website in this browser for the next time I comment.',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_save_fields', array(
	'label'    => 'Text: "Save my name, email, and website in this browser for the next time I comment."',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_save_fields',
	'type'     => 'textarea',
) ) );

$wp_customize->add_setting( 'penci_trans_by', array(
	'default'           => 'by',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_by', array(
	'label'    => 'Text: "by"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_by',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_trans_text_views', array(
	'default'           => 'views',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_trans_text_views', array(
	'label'    => 'Text: "views"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_text_views',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_trans_home', array(
	'default'           => 'Home',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_home', array(
	'label'    => 'Text: "Home"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_home',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_newer_posts', array(
	'default'           => 'Newer Posts',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_newer_posts', array(
	'label'    => 'Text: "Newer Posts"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_newer_posts',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_older_posts', array(
	'default'           => 'Older Posts',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_older_posts', array(
	'label'    => 'Text: "Older Posts"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_older_posts',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_load_more_posts', array(
	'default'           => 'Load More Posts',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_load_more_posts', array(
	'label'    => 'Text: "Load More Posts"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_load_more_posts',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_no_more_posts', array(
	'default'           => 'Sorry, No more posts',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_no_more_posts', array(
	'label'    => 'Text: "Sorry, No more posts"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_no_more_posts',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_all', array(
	'default'           => 'All',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_all', array(
	'label'    => 'Text: "All"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_all',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_back_to_top', array(
	'default'           => 'Back To Top',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_back_to_top', array(
	'label'    => 'Text: "Back To Top"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_back_to_top',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_written_by', array(
	'default'           => 'written by',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_written_by', array(
	'label'    => 'Text: "written by"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_written_by',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_previous_post', array(
	'default'           => 'previous post',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_previous_post', array(
	'label'    => 'Text: "previous post"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_previous_post',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_next_post', array(
	'default'           => 'next post',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_next_post', array(
	'label'    => 'Text: "next post"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_next_post',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_name', array(
	'default'           => 'Name*',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_name', array(
	'label'    => 'Text: "Name*"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_name',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_email', array(
	'default'           => 'Email*',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_email', array(
	'label'    => 'Text: "Email*"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_email',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_website', array(
	'default'           => 'Website',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_website', array(
	'label'    => 'Text: "Website"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_website',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_your_comment', array(
	'default'           => 'Your Comment',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_your_comment', array(
	'label'    => 'Text: "Your Comment"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_your_comment',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_leave_a_comment', array(
	'default'           => 'Leave a Comment',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_leave_a_comment', array(
	'label'    => 'Text: "Leave a Comment"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_leave_a_comment',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_cancel_reply', array(
	'default'           => 'Cancel Reply',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_cancel_reply', array(
	'label'    => 'Text: "Cancel Reply"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_cancel_reply',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_submit', array(
	'default'           => 'Submit',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_submit', array(
	'label'    => 'Text: "Submit"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_submit',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_category', array(
	'default'           => 'Category:',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_category', array(
	'label'    => 'Text: "Category:"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_category',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_continue_reading', array(
	'default'           => 'Continue Reading',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_continue_reading', array(
	'label'    => 'Text: "Continue Reading"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_continue_reading',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_read_more', array(
	'default'           => 'Read more',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_read_more', array(
	'label'    => 'Text: "Read more"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_read_more',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_view_all', array(
	'default'           => 'View All',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_view_all', array(
	'label'    => 'Text: "View All"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_view_all',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_tag', array(
	'default'           => 'Tag:',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_tag', array(
	'label'    => 'Text: "Tag:"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_tag',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_tags', array(
	'default'           => 'Tags',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_tags', array(
	'label'    => 'Text: "Tags"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_tags',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_posts_tagged', array(
	'default'           => 'Posts tagged with',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_posts_tagged', array(
	'label'    => 'Text: "Posts tagged with"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_posts_tagged',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_author', array(
	'default'           => 'Author',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_author', array(
	'label'    => 'Text: "Author"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_author',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_daily_archives', array(
	'default'           => 'Daily Archives',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_daily_archives', array(
	'label'    => 'Text: "Daily Archives"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_daily_archives',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_monthly_archives', array(
	'default'           => 'Monthly Archives',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_monthly_archives', array(
	'label'    => 'Text: "Monthly Archives"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_monthly_archives',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_yearly_archives', array(
	'default'           => 'Yearly Archives',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_yearly_archives', array(
	'label'    => 'Text: "Yearly Archives"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_yearly_archives',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_archives', array(
	'default'           => 'Archives',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_archives', array(
	'label'    => 'Text: "Archives"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_archives',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_search', array(
	'default'           => 'Search',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_search', array(
	'label'    => 'Text: "Search"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_search',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_search_results_for', array(
	'default'           => 'Search results for',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_search_results_for', array(
	'label'    => 'Text: "Search results for"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_search_results_for',
	'type'     => 'text',
) ) );
$wp_customize->add_setting( 'penci_trans_share', array(
	'default'           => 'Share',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_share', array(
	'label'    => 'Text: "Share"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_share',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_trans_comments_closed', array(
	'default'           => 'Comments are closed.',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_comments_closed', array(
	'label'    => 'Text: "Comments are closed."',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_comments_closed',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_trans_search_not_found', array(
	'default'           => 'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_search_not_found', array(
	'label'    => 'Text: "Sorry, but nothing matched your search terms. Please try again with some different keywords."',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_search_not_found',
	'type'     => 'text',
) ) );

$wp_customize->add_setting( 'penci_trans_back_to_homepage', array(
	'default'           => 'Back to Home Page',
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'trans_back_to_homepage', array(
	'label'    => 'Text: "Back to Home Page"',
	'section'  => 'pencidesign_new_section_transition_lang',
	'settings' => 'penci_trans_back_to_homepage',
	'type'     => 'text',
) ) );

$login_register = array(
	'penci_trans_hello_text'          => esc_html__( 'Hello', 'soledad' ),
	'penci_trans_profile_text'        => esc_html__( 'Profile', 'soledad' ),
	'penci_trans_logout_text'         => esc_html__( 'Logout', 'soledad' ),
	'penci_plogin_wrong'              => esc_html__( 'Wrong username or password', 'soledad' ),
	'penci_plogin_success'            => esc_html__( 'Login successful, redirecting...', 'soledad' ),
	'penci_plogin_email_place'        => esc_html__( 'Email Address', 'soledad' ),
	'penci_plogin_pass_place'         => esc_html__( 'Password', 'soledad' ),
	'penci_plogin_remember_text'      => esc_html__( 'Keep me signed in until I sign out', 'soledad' ),
	'penci_plogin_login_text'         => esc_html__( 'Login to your account', 'soledad' ),
	'penci_plogin_lostpass_text'      => esc_html__( 'Forgot your password?', 'soledad' ),
	'penci_plogin_hasaccount_text'    => esc_html__( 'Do not have an account ?', 'soledad' ),
	'penci_plogin_registration_text'  => esc_html__( 'Register here', 'soledad' ),
	'penci_trans_usernameemail_text'  => esc_html__( 'Username or email', 'soledad' ),
	'penci_trans_pass_text'           => esc_html__( 'Password', 'soledad' ),
	'penci_plogin_label_remember'     => esc_html__( 'Keep me signed in until I sign out', 'soledad' ),
	'penci_plogin_label_log_in'       => esc_html__( 'Login to your account', 'soledad' ),
	'penci_plogin_label_lostpassword' => esc_html__( 'Forgot your password?', 'soledad' ),
	'penci_plogin_text_has_account'   => esc_html__( 'Do not have an account ?', 'soledad' ),
	'penci_plogin_label_registration' => esc_html__( 'Register here', 'soledad' ),

	'penci_pregister_first_name'         => esc_html__( 'First Name', 'soledad' ),
	'penci_pregister_last_name'          => esc_html__( 'Last Name', 'soledad' ),
	'penci_pregister_user_name'          => esc_html__( 'Username', 'soledad' ),
	'penci_pregister_user_email'         => esc_html__( 'Email address', 'soledad' ),
	'penci_pregister_user_pass'          => esc_html__( 'Password', 'soledad' ),
	'penci_pregister_pass_confirm'       => esc_html__( 'Confirm Password', 'soledad' ),
	'penci_pregister_button_submit'      => esc_html__( 'Sign up new account', 'soledad' ),
	'penci_pregister_has_account'        => esc_html__( 'Have an account?', 'soledad' ),
	'penci_pregister_label_registration' => esc_html__( 'Login here', 'soledad' ),

	'penci_plogin_mess_invalid_email'    => esc_html__( 'Invalid email.', 'soledad' ),
	'penci_plogin_mess_error_email_pass' => esc_html__( 'Password does not match the confirm password', 'soledad' ),
	'penci_plogin_mess_username_reg'     => esc_html__( 'This username is already registered.', 'soledad' ),
	'penci_plogin_mess_email_reg'        => esc_html__( 'This email address is already registered.', 'soledad' ),
	'penci_plogin_mess_wrong_email_pass' => esc_html__( 'Wrong username or password.', 'soledad' ),
	'penci_plogin_mess_reg_succ'         => esc_html__( 'Registered successful, redirecting...', 'soledad' ),
);

foreach ( $login_register as $login_register_id => $login_register_label ) {
	$wp_customize->add_setting( $login_register_id, array(
		'default'           => $login_register_label,
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $login_register_id, array(
		'label'    => 'Text: "' . $login_register_label . '"',
		'section'  => 'pencidesign_new_section_transition_lang',
		'settings' => $login_register_id,
		'type'     => 'text',
	) ) );
}