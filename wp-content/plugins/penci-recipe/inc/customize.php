<?php
/**
 * Customize for Penci Recipe
 * @since 1.0
 */
function penci_soledad_recipe_customizer( $wp_customize ) {
	// Panel
	$wp_customize->add_panel( 'penci_recipe_panel', 
		array(
			'priority'       => 100,
			'title'            => __( 'Recipe Options', 'soledad-recipe' ),
			'description'      => __( '', 'soledad-recipe' ),
		) 
	);
	// Add Sections
	$wp_customize->add_section( 'penci_new_section_recipe' , array(
		'title'      => 'General Options',
		'description'=> '',
		'priority'   => 49,
		'panel'      => 'penci_recipe_panel'
	) );
	
	$wp_customize->add_section( 'penci_new_recipe_schema' , array(
		'title'      => 'Default Schema Data',
		'description'=> 'Because Google will validate your recipes to make it display good on search results. So, you should set a default value for all default fileds below to make Google validate your recipe bestest. If you want to modify any default field, let go to edit your posts and change recipe data there.',
		'priority'   => 49,
		'panel'      => 'penci_recipe_panel'
	) );
	
	$wp_customize->add_section( 'penci_new_recipe_size' , array(
		'title'      => 'Font Size',
		'description'=> '',
		'priority'   => 49,
		'panel'      => 'penci_recipe_panel'
	) );
	
	$wp_customize->add_section( 'penci_new_recipe_typo' , array(
		'title'      => 'Colors',
		'description'=> '',
		'priority'   => 49,
		'panel'      => 'penci_recipe_panel'
	) );
	
	$wp_customize->add_section( 'penci_new_recipe_translate' , array(
		'title'      => 'Text Translation',
		'description'=> '',
		'priority'   => 49,
		'panel'      => 'penci_recipe_panel'
	) );

	// Add settings
	$wp_customize->add_setting( 'penci_recipe_layout', array(
		'default'           => 'style-1',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_layout', array(
		'label'    => 'Recipe Card Layout',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_layout',
		'type'     => 'radio',
		'priority' => 1,
		'choices'  => array(
			'style-1'  => 'Style 1',
			'style-2'  => 'Style 2',
			'style-3'  => 'Style 3',
			'style-4'  => 'Style 4',
		)
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_featured_image', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_featured_image', array(
		'label'    => 'Hide Featured Image on Recipe Card',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_featured_image',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_jump_button', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_jump_button', array(
		'label'    => 'Show "Jump to Recipe" button at the top of post',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_jump_button',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_print_btn', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_print_btn', array(
		'label'    => 'Show "Print Recipe" button at the top of post',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_print_btn',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_btn_align', array(
		'default'           => 'align-center',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_btn_align', array(
		'label'    => 'Align for "Jump to Recipe" & "Print Recipe" at The Top',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_btn_align',
		'type'     => 'select',
		'priority' => 1,
		'choices'  => array(
			'align-center'  => esc_html__( 'Center', 'soledad' ),
			'align-left'  => esc_html__( 'Left', 'soledad' ),
			'align-right'  => esc_html__( 'Right', 'soledad' ),
		)
	) ) );
	$wp_customize->add_setting( 'penci_recipe_ratio_fimage', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_ratio_fimage', array(
		'label'       => 'Custom Ratio Width/Height of Recipe Image for Style 2 & 3. E.g: W/H = 50%, fill 50 below',
		'section'     => 'penci_new_section_recipe',
		'settings'    => 'penci_recipe_ratio_fimage',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_title_overlay', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_title_overlay', array(
		'label'    => 'Display Recipe Card Title Overlay on Featured Image',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_title_overlay',
		'description' => 'This option apply for Recipe Style 2 & Style 3 only',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_print', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_print', array(
		'label'    => 'Hide Print Button',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_print',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_pinterest', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_pinterest', array(
		'label'    => 'Show Pin Button',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_pinterest',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_hide_image_print', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_hide_image_print', array(
		'label'    => 'Hide Images on Recipe Igredients & Instructions When Users Print Recipe',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_hide_image_print',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_nutrition', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_nutrition', array(
		'label'    => 'Show Nutrition Facts',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_nutrition',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_remove_nutrition', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_remove_nutrition', array(
		'label'    => 'Completely Remove Nutrition Facts in HTML',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_remove_nutrition',
		'description' => esc_html__( 'If you remove Nutrition Facts - you can get warning missing it for all your recipe cards in google search console. And we do not recommend you do that.', 'soledad' ),
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_calories', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_calories', array(
		'label'    => 'Hide Calories',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_calories',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_fat', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_fat', array(
		'label'    => 'Hide Fat',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_fat',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_rating', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_rating', array(
		'label'    => 'Hide Rating',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_rating',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );

	$wp_customize->add_setting( 'penci_recipe_ingredients_visual', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_ingredients_visual', array(
		'label'    => 'Make Ingredients is Visual Editor on Edit Recipe Screen',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_ingredients_visual',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_notes_visual', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_notes_visual', array(
		'label'    => 'Make Notes is Visual Editor on Edit Recipe Screen',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_notes_visual',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_make_trecipe', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_make_trecipe', array(
		'label'    => 'Show "Did You Make This Recipe?" Section At The Bottom',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_make_trecipe',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_dfcalories', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_dfcalories', array(
		'label'       => 'Set default number calories for all Recipe Cards',
		'section'     => 'penci_new_recipe_schema',
		'settings'    => 'penci_recipe_dfcalories',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_dffat', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_dffat', array(
		'label'       => 'Set default number fat for all Recipe Cards',
		'section'     => 'penci_new_recipe_schema',
		'settings'    => 'penci_recipe_dffat',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_dfcuisine', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_dfcuisine', array(
		'label'       => 'Set default recipe cuisine for all Recipe Cards',
		'section'     => 'penci_new_recipe_schema',
		'settings'    => 'penci_recipe_dfcuisine',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_dfkeywords', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_dfkeywords', array(
		'label'       => 'Set default keywords for all Recipe Cards',
		'section'     => 'penci_new_recipe_schema',
		'settings'    => 'penci_recipe_dfkeywords',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_dfvideoid', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_dfvideoid', array(
		'label'       => 'Set default Youtube video ID for all Recipe Cards',
		'section'     => 'penci_new_recipe_schema',
		'settings'    => 'penci_recipe_dfvideoid',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_dfvideotitle', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_dfvideotitle', array(
		'label'       => 'Set default Youtube video title for all Recipe Cards',
		'section'     => 'penci_new_recipe_schema',
		'settings'    => 'penci_recipe_dfvideotitle',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_dfvideoduration', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_dfvideoduration', array(
		'label'       => 'Set default Youtube video duration for all Recipe Cards',
		'section'     => 'penci_new_recipe_schema',
		'settings'    => 'penci_recipe_dfvideoduration',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_dfvideodate', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_dfvideodate', array(
		'label'       => 'Set default Youtube video upload date for all Recipe Cards',
		'section'     => 'penci_new_recipe_schema',
		'settings'    => 'penci_recipe_dfvideodate',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_dfvideodes', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_dfvideodes', array(
		'label'       => 'Set default Youtube video description for all Recipe Cards',
		'section'     => 'penci_new_recipe_schema',
		'settings'    => 'penci_recipe_dfvideodes',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_btn_fsize', array(
		'default'           => '14',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_btn_fsize', array(
		'label'       => 'Custom Font Size for Buttons "Jump to Recipe" & "Print Recipe" at the Top',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipe_btn_fsize',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_title_fsize', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_title_fsize', array(
		'label'       => 'Font Size for Recipe Title',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipe_title_fsize',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_title_mfsize', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_title_mfsize', array(
		'label'       => 'Font Size for Recipe Title on Mobile',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipe_title_mfsize',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_meta_ifsize', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_meta_ifsize', array(
		'label'       => 'Custom Font Size for Recipe Card Data Icons',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipe_meta_ifsize',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_meta_fsize', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_meta_fsize', array(
		'label'       => 'General Font Size for Recipe Card Data',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipe_meta_fsize',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_meta2_fsize', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_meta2_fsize', array(
		'label'       => 'Font Size for Text: "Serves", "Prep Time", "Cooking Time" on Style 2 & 3',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipe_meta2_fsize',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_headings', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_headings', array(
		'label'       => 'Font Size for Recipe Card Headings: "INGREDIENTS", "INSTRUCTIONS", "NOTES"',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipe_headings',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_makethis_head', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_makethis_head', array(
		'label'       => 'Font Size for heading on "DID YOU MAKE THIS RECIPE?" section',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipe_makethis_head',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_makethis_desc', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_makethis_desc', array(
		'label'       => 'Font Size for description on "DID YOU MAKE THIS RECIPE?" section',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipe_makethis_desc',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_upperheadings', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_upperheadings', array(
		'label'    => 'Disable Uppercase on Recipe Card Headings: "INGREDIENTS", "INSTRUCTIONS", "NOTES"',
		'section'  => 'penci_new_recipe_size',
		'settings' => 'penci_recipe_upperheadings',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipei_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipei_title', array(
		'label'       => 'Font Size for Recipe Index Section Title',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipei_title',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipei_mtitle', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipei_mtitle', array(
		'label'       => 'Font Size for Recipe Index Section Title on Mobile',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipei_mtitle',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipei_cat', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipei_cat', array(
		'label'       => 'Font Size for Categories on Recipe Index',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipei_cat',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipei_ptitle', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipei_ptitle', array(
		'label'       => 'Font Size for Post Titles on Recipe Index',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipei_ptitle',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipei_pmtitle', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipei_pmtitle', array(
		'label'       => 'Font Size for Post Titles on Recipe Index on Mobile',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipei_pmtitle',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipei_date', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipei_date', array(
		'label'       => 'Font Size for Date on Recipe Index',
		'section'     => 'penci_new_recipe_size',
		'settings'    => 'penci_recipei_date',
		'description' => '',
		'type'        => 'text',
		'priority'    => 1
	) ) );
	$wp_customize->add_setting( 'penci_recipe_btn_bg', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_btn_bg', array(
		'label'    => 'Custom Background Color for Buttons "Jump to Recipe" & "Print Recipe" at the Top',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_btn_bg',
		'priority' => 2
	) ) );
	$wp_customize->add_setting( 'penci_recipe_btn_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_btn_color', array(
		'label'    => 'Custom Text Color for Buttons "Jump to Recipe" & "Print Recipe" at the Top',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_btn_color',
		'priority' => 2
	) ) );
	$wp_customize->add_setting( 'penci_recipe_btn_hbg', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_btn_hbg', array(
		'label'    => 'Custom Hover Background Color for Buttons "Jump to Recipe" & "Print Recipe" at the Top',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_btn_hbg',
		'priority' => 2
	) ) );
	$wp_customize->add_setting( 'penci_recipe_btn_hcolor', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_btn_hcolor', array(
		'label'    => 'Custom Hover Text Color for Buttons "Jump to Recipe" & "Print Recipe" at the Top',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_btn_hcolor',
		'priority' => 2
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_border_color', array(
		'default'           => '#dedede',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_border_color', array(
		'label'    => 'Recipe Border Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_border_color',
		'priority' => 2
	) ) );
	$wp_customize->add_setting( 'penci_recipe_border_4color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_border_4color', array(
		'label'    => 'Border Color for Style 4',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_border_4color',
		'priority' => 2
	) ) );
	$wp_customize->add_setting( 'penci_recipe_title_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_title_color', array(
		'label'    => 'Recipe Title Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_title_color',
		'priority' => 3
	) ) );
	$wp_customize->add_setting( 'penci_recipe_title_ocolor', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_title_ocolor', array(
		'label'    => 'Recipe Title Color for Style 4 & Overlay Recipe Image',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_title_ocolor',
		'priority' => 3
	) ) );
	$wp_customize->add_setting( 'penci_recipe_header4bg', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_header4bg', array(
		'label'    => 'Recipe Header Section Background for Style 4',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_header4bg',
		'priority' => 3
	) ) );
	$wp_customize->add_setting( 'penci_recipe_print_button', array(
		'default'           => '#6eb48c',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_print_button', array(
		'label'    => 'Recipe Print Button Accent Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_print_button',
		'priority' => 3
	) ) );
	$wp_customize->add_setting( 'penci_recipe_meta_border4', array(
		'default'           => '#aaaaaa',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_meta_border4', array(
		'label'    => 'Border Color after Title on Style 4',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_meta_border4',
		'priority' => 4
	) ) );
	$wp_customize->add_setting( 'penci_recipe_meta_icon_color', array(
		'default'           => '#aaaaaa',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_meta_icon_color', array(
		'label'    => 'Recipe Meta Icons Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_meta_icon_color',
		'priority' => 4
	) ) );
	$wp_customize->add_setting( 'penci_recipe_meta_icon_4color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_meta_icon_4color', array(
		'label'    => 'Recipe Meta Icons Color for Style 4',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_meta_icon_4color',
		'priority' => 4
	) ) );
	$wp_customize->add_setting( 'penci_recipe_meta_color', array(
		'default'           => '#888888',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_meta_color', array(
		'label'    => 'Recipe Meta Text Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_meta_color',
		'priority' => 4
	) ) );
	$wp_customize->add_setting( 'penci_recipe_meta_4color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_meta_4color', array(
		'label'    => 'Recipe Meta Text Color for Style 4',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_meta_4color',
		'priority' => 4
	) ) );
	$wp_customize->add_setting( 'penci_recipe_meta_2color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_meta_2color', array(
		'label'    => 'Custom Color for Text "Serves", "Prep Time", "Cooking Time" on Style 2 & 3',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_meta_2color',
		'priority' => 4
	) ) );
	$wp_customize->add_setting( 'penci_recipe_meta_bcolor', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_meta_bcolor', array(
		'label'    => 'Recipe Meta Border Color for Style 2 & 3',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_meta_bcolor',
		'priority' => 4
	) ) );
	$wp_customize->add_setting( 'penci_recipe_section_title_color', array(
		'default'           => '#888888',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_section_title_color', array(
		'label'    => 'Recipe Section Title Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_section_title_color',
		'priority' => 5
	) ) );

	$wp_customize->add_setting( 'penci_recipe_note_title_color', array(
		'default'           => '#888888',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_note_title_color', array(
		'label'    => 'Recipe Notes Title Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_note_title_color',
		'priority' => 5
	) ) );

	$wp_customize->add_setting( 'penci_recipe_note_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_note_color', array(
		'label'    => 'Recipe Notes Text Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_note_color',
		'priority' => 6
	) ) );
	$wp_customize->add_setting( 'penci_recipe_makethis_bg', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_makethis_bg', array(
		'label'    => 'Recipe "DID YOU MAKE THIS RECIPE?" Section Background Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_makethis_bg',
		'priority' => 6
	) ) );
	$wp_customize->add_setting( 'penci_recipe_makethis_inbg', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_makethis_inbg', array(
		'label'    => 'Recipe "DID YOU MAKE THIS RECIPE?" Instagram Icon Background Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_makethis_inbg',
		'priority' => 6
	) ) );
	$wp_customize->add_setting( 'penci_recipe_makethis_in', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_makethis_in', array(
		'label'    => 'Recipe "DID YOU MAKE THIS RECIPE?" Instagram Icon Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_makethis_in',
		'priority' => 6
	) ) );
	$wp_customize->add_setting( 'penci_recipe_makethis_chead', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_makethis_chead', array(
		'label'    => 'Recipe "DID YOU MAKE THIS RECIPE?" Heading Text Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_makethis_chead',
		'priority' => 6
	) ) );
	$wp_customize->add_setting( 'penci_recipe_makethis_cdesc', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_recipe_makethis_cdesc', array(
		'label'    => 'Recipe "DID YOU MAKE THIS RECIPE?" Description Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_makethis_cdesc',
		'priority' => 6
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_index_title_color', array(
		'default'           => '#777777',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_index_title_color', array(
		'label'    => 'Recipe Index Section Title Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_index_title_color',
		'priority' => 6
	) ) );

	$wp_customize->add_setting( 'penci_recipe_index_cat_color', array(
		'default'           => '#6eb48c',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_index_cat_color', array(
		'label'    => 'Recipe Index Posts Categories Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_index_cat_color',
		'priority' => 6
	) ) );

	$wp_customize->add_setting( 'penci_recipe_index_post_title_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_index_post_title_color', array(
		'label'    => 'Recipe Index Posts Title Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_index_post_title_color',
		'priority' => 6
	) ) );

	$wp_customize->add_setting( 'penci_recipe_index_post_date_color', array(
		'default'           => '#888888',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_index_post_date_color', array(
		'label'    => 'Recipe Index Posts Date Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_index_post_date_color',
		'priority' => 6
	) ) );

	$wp_customize->add_setting( 'penci_recipe_index_button_bg', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_index_button_bg', array(
		'label'    => 'Recipe Index Button View All Background Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_index_button_bg',
		'priority' => 6
	) ) );

	$wp_customize->add_setting( 'penci_recipe_index_button_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_index_button_color', array(
		'label'    => 'Recipe Index Button View All Text Color',
		'section'  => 'penci_new_recipe_typo',
		'settings' => 'penci_recipe_index_button_color',
		'priority' => 6
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_jump_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_jump_text', array(
		'label'    => 'Custom "Jump to Recipe" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_jump_text',
		'type'     => 'text',
		'priority' => 7
	) ) );
	$wp_customize->add_setting( 'penci_recipe_print_btn_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_print_btn_text', array(
		'label'    => 'Custom "Print Recipe" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_print_btn_text',
		'type'     => 'text',
		'priority' => 7
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_pin_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_pin_text', array(
		'label'    => 'Custom "Pin" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_pin_text',
		'type'     => 'text',
		'priority' => 7
	) ) );
	$wp_customize->add_setting( 'penci_recipe_print_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_print_text', array(
		'label'    => 'Custom "Print" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_print_text',
		'type'     => 'text',
		'priority' => 7
	) ) );

	$wp_customize->add_setting( 'penci_recipe_serves_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_serves_text', array(
		'label'    => 'Custom "Serves" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_serves_text',
		'type'     => 'text',
		'priority' => 8
	) ) );

	$wp_customize->add_setting( 'penci_recipe_prep_time_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_prep_time_text', array(
		'label'    => 'Custom "Prep Time" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_prep_time_text',
		'type'     => 'text',
		'priority' => 9
	) ) );

	$wp_customize->add_setting( 'penci_recipe_cooking_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_cooking_text', array(
		'label'    => 'Custom "Cooking Time" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_cooking_text',
		'type'     => 'text',
		'priority' => 10
	) ) );

	$wp_customize->add_setting( 'penci_recipe_nutrition_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_nutrition_text', array(
		'label'    => 'Custom "Nutrition facts:" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_nutrition_text',
		'type'     => 'text',
		'priority' => 10
	) ) );

	$wp_customize->add_setting( 'penci_recipe_calories_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_calories_text', array(
		'label'    => 'Custom "calories" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_calories_text',
		'type'     => 'text',
		'priority' => 10
	) ) );

	$wp_customize->add_setting( 'penci_recipe_fat_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_fat_text', array(
		'label'    => 'Custom "fat" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_fat_text',
		'type'     => 'text',
		'priority' => 10
	) ) );

	$wp_customize->add_setting( 'penci_recipe_rating_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_rating_text', array(
		'label'    => 'Custom "Rating:" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_rating_text',
		'type'     => 'text',
		'priority' => 10
	) ) );

	$wp_customize->add_setting( 'penci_recipe_voted_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_voted_text', array(
		'label'    => 'Custom "voted" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_voted_text',
		'type'     => 'text',
		'priority' => 10
	) ) );

	$wp_customize->add_setting( 'penci_recipe_ingredients_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_ingredients_text', array(
		'label'    => 'Custom "INGREDIENTS" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_ingredients_text',
		'type'     => 'text',
		'priority' => 11
	) ) );

	$wp_customize->add_setting( 'penci_recipe_instructions_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_instructions_text', array(
		'label'    => 'Custom "INSTRUCTIONS" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_instructions_text',
		'type'     => 'text',
		'priority' => 12
	) ) );

	$wp_customize->add_setting( 'penci_recipe_notes_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_notes_text', array(
		'label'    => 'Custom "NOTES" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_notes_text',
		'type'     => 'text',
		'priority' => 13
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_did_you_make', array(
		'default'           => 'Did You Make This Recipe?',
		'sanitize_callback' => 'penci_recipe_html_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_did_you_make', array(
		'label'    => 'Custom "Did You Make This Recipe?" text',
		'section'  => 'penci_new_recipe_translate',
		'settings' => 'penci_recipe_did_you_make',
		'type'     => 'text',
		'priority' => 13
	) ) );
	
	$wp_customize->add_setting( 'penci_recipe_descmake_recipe', array(
		'default'           => 'How you went with my recipes? Tag me on Instagram at <a href="https://www.instagram.com/">@PenciDesign.</a>',
		'sanitize_callback' => 'penci_recipe_html_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_recipe_descmake_recipe', array(
		'label'       => 'Custom Description for "Did You Make This Recipe?" Section',
		'section'     => 'penci_new_recipe_translate',
		'settings'    => 'penci_recipe_descmake_recipe',
		'description' => 'You can use Custom HTML here',
		'type'        => 'textarea',
		'priority'    => 13
	) ) );

}
add_action( 'customize_register', 'penci_soledad_recipe_customizer' );

/**
 * Callback function for sanitizing checkbox settings.
 * Use for PenciDesign
 *
 * @param $input
 *
 * @return string default value if type is not exists
 */
function penci_recipe_sanitize_checkbox_field( $input ) {
	if ( $input == 1 ) {
		return true;
	}
	else {
		return false;
	}
}

if ( ! function_exists( 'penci_recipe_html_field' ) ) {
	function penci_recipe_html_field( $input ) {
		return $input;
	}
}

/**
 * Customize colors
 * @since 3.0
 */
function penci_recipe_customizer_css() {
	?>
	<style type="text/css">
		<?php if(get_theme_mod( 'penci_recipe_ratio_fimage' )) : ?>.precipe-style-2 .penci-recipe-thumb{ padding-bottom:<?php echo get_theme_mod( 'penci_recipe_ratio_fimage' ); ?>%; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_color_accent' )) : ?>.penci-recipe-tagged .prt-icon span, .penci-recipe-action-buttons .penci-recipe-button:hover{ background-color:<?php echo get_theme_mod( 'penci_color_accent' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_btn_fsize' )) : ?>.penci-recipe-action-buttons .penci-recipe-button{ font-size:<?php echo get_theme_mod( 'penci_recipe_btn_fsize' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_title_fsize' )) : ?>.post-entry .penci-recipe-heading .recipe-title-nooverlay, .post-entry .penci-recipe-heading .recipe-title-overlay{ font-size:<?php echo get_theme_mod( 'penci_recipe_title_fsize' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_title_mfsize' )) : ?>@media only screen and (max-width: 479px){.post-entry .penci-recipe-heading .recipe-title-nooverlay, .post-entry .penci-recipe-heading .recipe-title-overlay{ font-size:<?php echo get_theme_mod( 'penci_recipe_title_mfsize' ); ?>px; } }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta_fsize' )) : ?>.penci-recipe-heading .penci-recipe-meta, .penci-recipe-rating{ font-size:<?php echo get_theme_mod( 'penci_recipe_meta_fsize' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta_ifsize' )) : ?>.precipe-style-2 .penci-recipe-heading .penci-recipe-meta span i, .precipe-style-2 .penci-ficon.ficon-fire, .penci-recipe-heading .penci-recipe-meta span i, .penci-ficon.ficon-fire{ font-size:<?php echo get_theme_mod( 'penci_recipe_meta_ifsize' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta2_fsize' )) : ?>.precipe-style-2 .penci-recipe-heading .penci-recipe-meta span.remeta-item{ font-size:<?php echo get_theme_mod( 'penci_recipe_meta2_fsize' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_headings' )) : ?>.post-entry .penci-recipe-title{ font-size:<?php echo get_theme_mod( 'penci_recipe_headings' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_makethis_head' )) : ?>.penci-recipe-tagged .prt-span-heading{ font-size:<?php echo get_theme_mod( 'penci_recipe_makethis_head' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_makethis_desc' )) : ?>.penci-recipe-tagged .prt-span-des, .penci-recipe-tagged .prt-span-des *{ font-size:<?php echo get_theme_mod( 'penci_recipe_makethis_desc' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_upperheadings' )) : ?>.post-entry .penci-recipe-title{ text-transform:none; letter-spacing: 0; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipei_title' )) : ?>.penci-recipe-index-wrap h4.recipe-index-heading{ font-size:<?php echo get_theme_mod( 'penci_recipei_title' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipei_mtitle' )) : ?>@media only screen and (max-width: 479px){.penci-recipe-index-wrap h4.recipe-index-heading{ font-size:<?php echo get_theme_mod( 'penci_recipei_mtitle' ); ?>px; } }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipei_cat' )) : ?>.penci-recipe-index .cat > a.penci-cat-name{ font-size:<?php echo get_theme_mod( 'penci_recipei_cat' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipei_ptitle' )) : ?>.penci-recipe-index-wrap .penci-recipe-index-title a{ font-size:<?php echo get_theme_mod( 'penci_recipei_ptitle' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipei_pmtitle' )) : ?>@media only screen and (max-width: 479px){.penci-recipe-index-wrap .penci-recipe-index-title a{ font-size:<?php echo get_theme_mod( 'penci_recipei_pmtitle' ); ?>px; } }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipei_date' )) : ?>.penci-recipe-index .date{ font-size:<?php echo get_theme_mod( 'penci_recipei_date' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_btn_bg' )) : ?>.penci-recipe-action-buttons .penci-recipe-button{ background-color:<?php echo get_theme_mod( 'penci_recipe_btn_bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_btn_color' )) : ?>.penci-recipe-action-buttons .penci-recipe-button{ color:<?php echo get_theme_mod( 'penci_recipe_btn_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_btn_hbg' )) : ?>.penci-recipe-action-buttons .penci-recipe-button:hover{ background-color:<?php echo get_theme_mod( 'penci_recipe_btn_hbg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_btn_hcolor' )) : ?>.penci-recipe-action-buttons .penci-recipe-button:hover{ color:<?php echo get_theme_mod( 'penci_recipe_btn_hcolor' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_border_color' )) : ?>.wrapper-penci-recipe .penci-recipe, .wrapper-penci-recipe .penci-recipe-heading, .wrapper-penci-recipe .penci-recipe-ingredients, .wrapper-penci-recipe .penci-recipe-notes { border-color:<?php echo get_theme_mod( 'penci_recipe_border_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_border_4color' )) : ?>.precipe-style-4, .precipe-style-4 .penci-recipe-thumb .recipe-thumb-top{ border-color:<?php echo get_theme_mod( 'penci_recipe_border_4color' ); ?> !important; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_title_color' )) : ?>.post-entry .penci-recipe-heading .recipe-title-nooverlay { color:<?php echo get_theme_mod( 'penci_recipe_title_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_title_ocolor' )) : ?>.post-entry .precipe-style-4 .penci-recipe-heading .recipe-title-nooverlay, .post-entry .penci-recipe-heading .recipe-title-overlay{ color:<?php echo get_theme_mod( 'penci_recipe_title_ocolor' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_header4bg' )) : ?>.precipe-style-4 .penci-recipe-heading{ background-color:<?php echo get_theme_mod( 'penci_recipe_header4bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_print_button' )) : ?>.post-entry .penci-recipe-heading a.penci-recipe-print { color:<?php echo get_theme_mod( 'penci_recipe_print_button' ); ?>; } .post-entry .penci-recipe-heading a.penci-recipe-print { border-color:<?php echo get_theme_mod( 'penci_recipe_print_button' ); ?>; } .post-entry .penci-recipe-heading a.penci-recipe-print:hover, .wrapper-buttons-style4 .penci-recipe-print-btn, .wrapper-buttons-overlay .penci-recipe-print-btn { background-color:<?php echo get_theme_mod( 'penci_recipe_print_button' ); ?>; border-color:<?php echo get_theme_mod( 'penci_recipe_print_button' ); ?>; } .post-entry .penci-recipe-heading a.penci-recipe-print:hover { color:#fff; }.wrapper-buttons-overlay .penci-recipe-print-btn{ -webkit-box-shadow: 0 5px 20px <?php echo get_theme_mod( 'penci_recipe_print_button' ); ?>; box-shadow: 0 5px 20px <?php echo get_theme_mod( 'penci_recipe_print_button' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta_icon_color' )) : ?>.penci-recipe-heading .penci-recipe-meta span i, .penci-ficon.ficon-fire { color:<?php echo get_theme_mod( 'penci_recipe_meta_icon_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta_border4' )) : ?>.post-entry .precipe-style-4 .penci-recipe-heading .recipe-title-nooverlay:after { background-color:<?php echo get_theme_mod( 'penci_recipe_meta_border4' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta_icon_4color' )) : ?>.precipe-style-4 .penci-recipe-heading .penci-recipe-meta span i, .precipe-style-4 .penci-ficon.ficon-fire { color:<?php echo get_theme_mod( 'penci_recipe_meta_icon_4color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta_color' )) : ?>.penci-recipe-heading .penci-recipe-meta, .penci-recipe-rating{ color:<?php echo get_theme_mod( 'penci_recipe_meta_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta_4color' )) : ?>.precipe-style-4 .penci-recipe-heading .penci-recipe-meta, .precipe-style-4 .penci-recipe-rating{ color:<?php echo get_theme_mod( 'penci_recipe_meta_4color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta_2color' )) : ?>.precipe-style-2 .penci-recipe-heading .penci-recipe-meta span.remeta-item{ color:<?php echo get_theme_mod( 'penci_recipe_meta_2color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta_bcolor' )) : ?>.precipe-style-2 .penci-recipe-heading .penci-recipe-meta, .precipe-style-2 .penci-recipe-heading .penci-recipe-meta > span{ border-color:<?php echo get_theme_mod( 'penci_recipe_meta_bcolor' ); ?>; }@media only screen and (max-width: 767px){ .precipe-style-2 .penci-recipe-heading .penci-recipe-meta > span:nth-of-type(1), .precipe-style-2 .penci-recipe-heading .penci-recipe-meta > span:nth-of-type(2){ border-color:<?php echo get_theme_mod( 'penci_recipe_meta_bcolor' ); ?>; } }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_section_title_color' )) : ?>.post-entry .penci-recipe-title { color:<?php echo get_theme_mod( 'penci_recipe_section_title_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_note_title_color' )) : ?>.post-entry .penci-recipe-notes .penci-recipe-title { color:<?php echo get_theme_mod( 'penci_recipe_note_title_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_note_color' )) : ?>.post-entry .penci-recipe-notes, .post-entry .penci-recipe-notes p { color:<?php echo get_theme_mod( 'penci_recipe_note_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_makethis_bg' )) : ?>.penci-recipe-tagged { background-color:<?php echo get_theme_mod( 'penci_recipe_makethis_bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_makethis_inbg' )) : ?>.penci-recipe-tagged .prt-icon span { background-color:<?php echo get_theme_mod( 'penci_recipe_makethis_inbg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_makethis_in' )) : ?>.penci-recipe-tagged .prt-icon span { color:<?php echo get_theme_mod( 'penci_recipe_makethis_in' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_makethis_chead' )) : ?>.penci-recipe-tagged .prt-span-heading{ color:<?php echo get_theme_mod( 'penci_recipe_makethis_chead' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_makethis_cdesc' )) : ?>.penci-recipe-tagged .prt-span-des, .penci-recipe-tagged .prt-span-des * { color:<?php echo get_theme_mod( 'penci_recipe_makethis_cdesc' ); ?> !important; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_index_title_color' )) : ?>.penci-recipe-index-wrap h4.recipe-index-heading { color:<?php echo get_theme_mod( 'penci_recipe_index_title_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_index_cat_color' )) : ?>.penci-recipe-index .cat > a.penci-cat-name { color:<?php echo get_theme_mod( 'penci_recipe_index_cat_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_index_post_title_color' )) : ?>.penci-recipe-index-wrap .penci-recipe-index-title a { color:<?php echo get_theme_mod( 'penci_recipe_index_post_title_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_index_post_date_color' )) : ?>.penci-recipe-index .date { color:<?php echo get_theme_mod( 'penci_recipe_index_post_date_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_index_button_bg' )) : ?>.penci-recipe-index-wrap .penci-index-more-link a { background-color:<?php echo get_theme_mod( 'penci_recipe_index_button_bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_index_button_color' )) : ?>.penci-recipe-index-wrap .penci-index-more-link a { color:<?php echo get_theme_mod( 'penci_recipe_index_button_color' ); ?>; }<?php endif; ?>
	</style>
<?php
}
add_action( 'wp_head', 'penci_recipe_customizer_css' );