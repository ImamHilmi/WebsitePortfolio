<?php
/**
 * Add on for Visual Composer
 * If VC installed, this file will load
 * This add-on only use for Soledad theme
 *
 * @since 2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Soledad_VC_Admin' ) && function_exists( 'vc_map' ) ) {
	class Soledad_VC_Admin {

		function __construct() {
			// We safely integrate with VC with this hook
			add_action( 'vc_before_init', array( $this, 'integrate' ) );
		}

		/**
		 * Integrate elements (shortcodes) into VC interface
		 */
		public function integrate() {
			// Check if Visual Composer is installed
			if ( ! defined( 'WPB_VC_VERSION' ) ) {
				// Display notice that Visual Compser is required
				add_action( 'admin_notices', array( __CLASS__, 'notice' ) );

				return;
			}

			$group_color = 'Typo & Color';

			/*
			 * Register custom shortcodes within Visual Composer interface
			 *
			 * @see http://kb.wpbakery.com/index.php?title=Vc_map
			 */
			// Latest Posts
			vc_map( array(
				'name'        => __( 'Latest Posts', 'soledad' ),
				'description' => 'Display your latest posts',
				'base'        => 'latest_posts',
				'class'       => '',
				'controls'    => 'full',
				'icon'        => get_template_directory_uri() . '/images/vc-icon.png',
				'category'    => 'Soledad',
				'weight'        => 700,
				'params'      => array_merge(
					array(
						array(
							'type'        => 'loop',
							'heading'     => __( '', 'soledad' ),
							'param_name'  => 'build_query',
							'value'       => 'post_type:post|size:10',
							'settings'    => array(
								'size'      => array( 'value' => 10, 'hidden' => false ),
								'post_type' => array( 'value' => 'post', 'hidden' => false )
							),
							'description' => __( 'Create WordPress loop, to populate content from your site.', 'soledad' ),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Latest Posts Layout', 'soledad' ),
							'value'       => array(
								'Standard Posts'                   => 'standard',
								'Classic Posts'                    => 'classic',
								'Overlay Posts'                    => 'overlay',
								'Grid Posts'                       => 'grid',
								'Grid 2 Columns Posts'             => 'grid-2',
								'Grid Masonry Posts'               => 'masonry',
								'Grid Masonry 2 Columns Posts'     => 'masonry-2',
								'List Posts'                       => 'list',
								'Boxed Posts Style 1'              => 'boxed-1',
								'Boxed Posts Style 2'              => 'boxed-2',
								'Mixed Posts'                      => 'mixed',
								'Mixed Posts Style 2'              => 'mixed-2',
								'Mixed Posts Larger'               => 'mixed-larger',
								'Photography Posts'                => 'photography',
								'1st Standard Then Grid'           => 'standard-grid',
								'1st Standard Then Grid 2 Columns' => 'standard-grid-2',
								'1st Standard Then List'           => 'standard-list',
								'1st Standard Then Boxed'          => 'standard-boxed-1',
								'1st Classic Then Grid'            => 'classic-grid',
								'1st Classic Then Grid 2 Columns'  => 'classic-grid-2',
								'1st Classic Then List'            => 'classic-list',
								'1st Classic Then Boxed'           => 'classic-boxed-1',
								'1st Overlay Then Grid'            => 'overlay-grid',
								'1st Overlay Then List'            => 'overlay-list'
							),
							'param_name'  => 'style',
							'description' => 'Select Latest Posts Style',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Mixed Post Style', 'soledad' ),
							'default'    => 's1',
							'value'      => array(
								'Style 1' => 's1',
								'Style 2' => 's2',
							),
							'param_name' => 'penci_mixed_style',
							'dependency' => array( 'element' => 'style', 'value' => array( 'mixed', 'mixed-2' ) ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Heading Alignment', 'soledad' ),
							'value'      => array(
								'Default'   => '',
								'Left'   => 'left',
								'Center' => 'center',
								'Right'  => 'right',
							),
							'param_name' => 'post_alignment',
							'dependency' => array( 'element' => 'style', 'value' => array(
								'standard', 'classic', 'grid', 'grid-2', 'masonry','masonry-2',
								'list', 'mixed', 'mixed-2', 'standard-grid','standard-grid-2',
								'standard-list','standard-boxed-1','classic-grid', 'classic-grid-2','classic-list',
								'classic-boxed-1', 'overlay-grid', 'overlay-list'
							) ),
						),

						// Standard & Classic Layouts Options
						array(
							'type'             => 'textfield',
							'param_name'       => 'section_standard_classic_layout',
							'heading'          => esc_html__( 'Standard & Classic Layouts Options', 'soledad' ),
							'value'            => '',
							'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
						),
						array(
							'type'        => 'checkbox',
							'heading'     => __( 'Enable Post Meta Overlay Featured Image', 'soledad' ),
							'description' => __( 'This option just apply for Standard Layout Only', 'soledad' ),
							'param_name'  => 'standard_meta_overlay',
							'value'       => array( __( 'Yes', 'soledad' ) => 'yes' ),
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Post Thumbnail', 'soledad' ),
							'param_name'       => 'standard_thumbnail',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Disable Autoplay for Slider on Posts Format Gallery', 'soledad' ),
							'param_name'       => 'std_dis_at_gallery',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Make Featured Image Auto Crop', 'soledad' ),
							'param_name'       => 'standard_thumb_crop',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Category', 'soledad' ),
							'param_name'       => 'standard_cat',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Post Author', 'soledad' ),
							'param_name'       => 'standard_author',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Post Date', 'soledad' ),
							'param_name'       => 'standard_date',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Comment Count', 'soledad' ),
							'param_name'       => 'standard_comment',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Show Views Count', 'soledad' ),
							'param_name'       => 'standard_viewscount',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Remove Line Above Post Excerpt', 'soledad' ),
							'param_name'       => 'standard_remove_line',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Auto Render Post Excerpt', 'soledad' ),
							'param_name'       => 'standard_auto_excerpt',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Disable Hover Effect Button "Continue Reading"', 'soledad' ),
							'param_name'       => 'standard_effect_button',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Make "Continue Reading" is A Button', 'soledad' ),
							'param_name'       => 'std_continue_btn',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
							'dependency' => array( 'element' => 'standard_auto_excerpt', 'value' => 'yes' ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Custom Words Length for Post Titles', 'soledad' ),
							'param_name' => 'standard_title_length',
						),
					
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Share Icons', 'soledad' ),
							'param_name'       => 'standard_share_box',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Custom Excerpt Length', 'soledad' ),
							'param_name' => 'standard_excerpt_length',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Align Excerpt', 'soledad' ),
							'value'      => array(
								'Default'   => '',
								'Left'   => 'left',
								'Center' => 'center',
								'Right'  => 'right',
							),
							'param_name' => 'std_excerpt_align',
							'dependency' => array( 'element' => 'style', 'value' => array(
								'standard', 'classic', 'grid', 'grid-2', 'masonry','masonry-2',
								'list', 'mixed', 'mixed-2', 'standard-grid','standard-grid-2',
								'standard-list','standard-boxed-1','classic-grid', 'classic-grid-2','classic-list',
								'classic-boxed-1', 'overlay-grid', 'overlay-list'
							) ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Align "Continue Reading" Button', 'soledad' ),
							'value'      => array(
								'Default'   => '',
								'Left'   => 'left',
								'Center' => 'center',
								'Right'  => 'right',
							),
							'param_name' => 'std_continue_align',
							'dependency' => array( 'element' => 'style', 'value' => array(
								'standard', 'classic', 'grid', 'grid-2', 'masonry','masonry-2',
								'list', 'mixed', 'mixed-2', 'standard-grid','standard-grid-2',
								'standard-list','standard-boxed-1','classic-grid', 'classic-grid-2','classic-list',
								'classic-boxed-1', 'overlay-grid', 'overlay-list'
							) ),
						),
						// Other Layouts Options
						array(
							'type'             => 'textfield',
							'param_name'       => 'section_order_layouts_layout',
							'heading'          => esc_html__( 'Other Layouts Options', 'soledad' ),
							'value'            => '',
							'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Image Size Type', 'soledad' ),
							'value'      => array(
								'Default'         => '',
								'Horizontal Size' => 'horizontal',
								'Square Size'     => 'square',
								'Vertical Size'   => 'vertical',
								'Custom'          => 'custom',
							),
							'std'        => '',
							'param_name' => 'penci_featimg_size',
						),
						array(
							'type'       => 'penci_only_number',
							'heading'    => esc_html__( 'Image Ratio.Unit is %. E.g: 50', 'soledad' ),
							'param_name' => 'penci_featimg_ratio',
							'value'      => '',
							'std'        => '',
							'min'        => 0,
							'max'        => 100,
							'suffix'     => '%',
							'dependency' => array( 'element' => 'penci_featimg_size', 'value' => 'custom' ),
						),

						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Columns on Desktop', 'soledad' ),
							'value'      => array(
								'Default'   => '',
								1 => 1,
								2 => 2,
								3 => 3,
								4 => 4,
								5 => 6,
								6 => 6,
							),
							'param_name' => 'order_columns',
							'edit_field_class' => 'vc_col-sm-4',
							'dependency' => array( 'element' => 'style', 'value' => array('grid','masonry') ),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => __( 'Columns on Tablet', 'soledad' ),
							'value'            => array(
								'Default' => '',
								1 => 1,
								2 => 2,
								3 => 3,
								4 => 4,
								5 => 6,
								6 => 6,
							),
							'param_name'       => 'order_columns_tablet',
							'edit_field_class' => 'vc_col-sm-4',
							'dependency'       => array( 'element' => 'style', 'value' => array( 'grid', 'masonry' ) ),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => __( 'Columns on Mobile', 'soledad' ),
							'value'            => array(
								'Default' => '',
								1 => 1,
								2 => 2,
								3 => 3,
								4 => 4,
								5 => 6,
								6 => 6,
							),
							'param_name'       => 'order_columns_mobile',
							'edit_field_class' => 'vc_col-sm-4',
							'dependency'       => array( 'element' => 'style', 'value' => array( 'grid', 'masonry' ) ),
						),
						array(
							'type'             => 'penci_number',
							'value'            => '',
							'std'              => '',
							'suffix'           => 'px',
							'min'              => 1,
							'heading'          => esc_html__( 'Columns Gap', 'soledad' ),
							'param_name'       => 'order_column_gap',
							'edit_field_class' => 'vc_col-sm-6',

							'dependency'       => array( 'element' => 'style', 'value' => array( 'grid', 'masonry' ) ),
						),
						array(
							'type'             => 'penci_number',
							'value'            => '',
							'std'              => '',
							'suffix'           => 'px',
							'min'              => 1,
							'heading'          => esc_html__( 'Rows Gap', 'soledad' ),
							'param_name'       => 'order_row_gap',
							'edit_field_class' => 'vc_col-sm-6',
							'dependency'       => array( 'element' => 'style', 'value' => array( 'grid','masonry','list','boxed-1' ) ),
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Icon Post Format', 'soledad' ),
							'param_name'       => 'grid_icon_format',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Enable Post Meta Overlay Featured Image', 'soledad' ),
							'param_name'       => 'grid_meta_overlay',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Enable Uppercase on Post Categories', 'soledad' ),
							'param_name'       => 'grid_uppercase_cat',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Do Not Crop Images in List Layouts', 'soledad' ),
							'param_name'       => 'grid_nocrop_list',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'description'      => 'This option does not apply for gallery posts format',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Share Box', 'soledad' ),
							'param_name'       => 'grid_share_box',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Category', 'soledad' ),
							'param_name'       => 'grid_cat',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Post Author', 'soledad' ),
							'param_name'       => 'grid_author',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Post Date', 'soledad' ),
							'param_name'       => 'grid_date',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Hide Comment Count on Mixed & Overlay Posts', 'soledad' ),
							'param_name'       => 'grid_comment',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Show Comment Count on Grid, Masonry, List, Boxed, Photography Posts', 'soledad' ),
							'param_name'       => 'grid_comment_other',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Show Views Count', 'soledad' ),
							'param_name'       => 'grid_viewscount',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Remove Line Above Post Excerpt', 'soledad' ),
							'param_name'       => 'grid_remove_line',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Remove Post Excerpt', 'soledad' ),
							'param_name'       => 'grid_remove_excerpt',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Add "Read more" button link', 'soledad' ),
							'param_name'       => 'grid_add_readmore',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Remove arrow on "Read more"', 'soledad' ),
							'param_name'       => 'grid_remove_arrow',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Make "Read more" is A Button', 'soledad' ),
							'param_name'       => 'grid_readmore_button',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Align "Read more" Button', 'soledad' ),
							'std'        => 'left',
							'value'      => array(
								'Left'   => 'left',
								'Center' => 'center',
								'Right'  => 'right',
							),
							'param_name' => 'grid_readmore_align',
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Custom Words Length for Post Titles', 'soledad' ),
							'param_name' => 'grid_title_length',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Custom Excerpt Length', 'soledad' ),
							'param_name'  => 'grid_excerpt_length',
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Align Excerpt', 'soledad' ),
							'value'      => array(
								'Default'   => '',
								'Left'   => 'left',
								'Center' => 'center',
								'Right'  => 'right',
							),
							'param_name' => 'grid_excerpt_align',
							'dependency' => array( 'element' => 'style', 'value' => array(
								'standard', 'classic', 'grid', 'grid-2', 'masonry','masonry-2',
								'list', 'mixed', 'mixed-2', 'standard-grid','standard-grid-2',
								'standard-list','standard-boxed-1','classic-grid', 'classic-grid-2','classic-list',
								'classic-boxed-1', 'overlay-grid', 'overlay-list'
							) ),
						),

						// Nav
						array(
							'type'             => 'textfield',
							'param_name'       => 'heading_page_nav_settings',
							'heading'          => esc_html__( 'Page Navigation', 'soledad' ),
							'value'            => '',
							'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Page Navigation Style', 'soledad' ),
							'value'       => array(
								'Page Navigation Numbers' => 'numbers',
								'Load More Posts'         => 'loadmore',
								'Infinite Scroll'         => 'scroll'
							),
							'param_name'  => 'paging',
							'description' => 'Select Page Navigation Style',
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Custom Number Posts for Each Time Load More Posts', 'soledad' ),
							'param_name'  => 'morenum',
							'value'       => '',
							'description' => esc_html__( 'Use numeric value only', 'soledad' ),
							'dependency' => array( 'element' => 'paging', 'value' => array( 'loadmore', 'scroll' ) ),
						),
						array(
							'type'             => 'penci_number',
							'param_name'       => 'penci_paging_martop',
							'heading'          => __( 'Margin Top for Page Navigation', 'soledad' ),
							'value'            => '',
							'std'              => '',
							'suffix'           => 'px',
							'min'              => 1,
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Hide Heading Title', 'soledad' ),
							'param_name' => 'hide_block_heading',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'group'      => 'Heading',
						),
					),
					Penci_Vc_Params_Helper::heading_block_params( false ),
					Penci_Vc_Params_Helper::params_heading_typo_color( ),
					Penci_Vc_Params_Helper::params_latest_posts_typo_color(),
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

			// Featured Categories
			vc_map( array(
				'name'        => __( 'Featured Category', 'soledad' ),
				'description' => 'Display A Featured Category',
				'base'        => 'featured_cat',
				'class'       => '',
				'controls'    => 'full',
				'icon'        => get_template_directory_uri() . '/images/vc-icon.png',
				'category'    => 'Soledad',
				'weight'        => 700,
				'params'      => array_merge(
					array(
						array(
							'type'        => 'loop',
							'heading'     => __( '', 'soledad' ),
							'param_name'  => 'build_query',
							'value'       => 'post_type:post|size:10',
							'settings'    => array(
								'size'      => array( 'value' => 10, 'hidden' => false ),
								'post_type' => array( 'value' => 'post', 'hidden' => false )
							),
							'description' => __( 'Create WordPress loop, to populate content from your site.', 'soledad' ),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => __( 'Featured Category Layout', 'soledad' ),
							'value'       => array(
								'Style 1 - 1st Post Grid Featured on Left'    => 'style-1',
								'Style 2 - 1st Post Grid Featured on Top'     => 'style-2',
								'Style 3 - Text Overlay'                      => 'style-3',
								'Style 4 - Single Slider'                     => 'style-4',
								'Style 5 - Slider 2 Columns'                  => 'style-5',
								'Style 6 - 1st Post List Featured on Top'     => 'style-6',
								'Style 7 - Grid Layout'                       => 'style-7',
								'Style 8 - List Layout'                       => 'style-8',
								'Style 9 - Small List Layout'                 => 'style-9',
								'Style 10 - 2 First Posts Featured and List'  => 'style-10',
								'Style 11 - Text Overlay Center'              => 'style-11',
								'Style 12 - Slider 3 Columns'                 => 'style-12',
								'Style 13 - Grid 3 Columns'                   => 'style-13',
								'Style 14 - 1st Post Overlay Featured on Top' => 'style-14'
							),
							'param_name'  => 'style',
							'description' => '',
						),

						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Image Size Type', 'soledad' ),
							'value'      => array(
								'Default'         => '',
								'Horizontal Size' => 'horizontal',
								'Square Size'     => 'square',
								'Vertical Size'   => 'vertical',
								'Custom'          => 'custom',
							),
							'std'        => '',
							'param_name' => 'penci_featimg_size',
						),
						array(
							'type'       => 'penci_only_number',
							'heading'    => esc_html__( 'Image Ratio.Unit is %. E.g: 50', 'soledad' ),
							'param_name' => 'penci_featimg_ratio',
							'value'      => '',
							'std'        => '',
							'min'        => 0,
							'max'        => 100,
							'suffix'     => '%',
							'dependency' => array( 'element' => 'penci_featimg_size', 'value' => 'custom' ),
						),

						array(
							'type'             => 'dropdown',
							'heading'          => __( 'Columns on Desktop', 'soledad' ),
							'value'            => array(
								'Default' => '',
								1 => 1,
								2 => 2,
								3 => 3,
								4 => 4,
								5 => 6,
								6 => 6,
							),
							'param_name'       => 'penci_columns',
							'edit_field_class' => 'vc_col-sm-4',
							'dependency'       => array( 'element' => 'style', 'value' => array( 'style-3', 'style-11' ) ),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => __( 'Columns on Tablet', 'soledad' ),
							'value'            => array(
								'Default' => '',
								1 => 1,
								2 => 2,
								3 => 3,
								4 => 4,
								5 => 6,
								6 => 6,
							),
							'param_name'       => 'penci_columns_tablet',
							'edit_field_class' => 'vc_col-sm-4',
							'dependency'       => array( 'element' => 'style', 'value' => array( 'style-3', 'style-11' ) ),
						),
						array(
							'type'             => 'dropdown',
							'heading'          => __( 'Columns on Mobile', 'soledad' ),
							'value'            => array(
								'Default' => '',
								1 => 1,
								2 => 2,
								3 => 3,
								4 => 4,
								5 => 6,
								6 => 6,
							),
							'param_name'       => 'penci_columns_mobile',
							'edit_field_class' => 'vc_col-sm-4',
							'dependency'       => array( 'element' => 'style', 'value' => array( 'style-3', 'style-11' ) ),
						),
						array(
							'type'             => 'penci_number',
							'value'            => '',
							'std'              => '',
							'suffix'           => 'px',
							'min'              => 1,
							'heading'          => esc_html__( 'Columns Gap', 'soledad' ),
							'param_name'       => 'penci_column_gap',
							'edit_field_class' => 'vc_col-sm-6',

							'dependency' => array( 'element' => 'style', 'value' => array( 'style-3', 'style-11' ) ),
						),
						array(
							'type'             => 'penci_number',
							'value'            => '',
							'std'              => '',
							'suffix'           => 'px',
							'min'              => 1,
							'heading'          => esc_html__( 'Rows Gap', 'soledad' ),
							'param_name'       => 'penci_row_gap',
							'edit_field_class' => 'vc_col-sm-6',
							'dependency'       => array( 'element' => 'style', 'value' => array( 'style-3', 'style-11', 'style-8' ) ),
						),


						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Custom Words Length for Post Titles for style 1,2,6,10,14', 'soledad' ),
							'param_name' => 'big_title_length',
							'value'      => '',
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Custom Words Length for Post Titles', 'soledad' ),
							'param_name' => '_title_length',
							'value'      => '',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Hide Heading Title', 'soledad' ),
							'param_name' => 'hide_block_heading',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'group'      => 'Heading',
						),
						array(
							'type'        => 'checkbox',
							'heading'     => __( 'Enable Post Meta Overlay Featured Image', 'soledad' ),
							'param_name'  => 'enable_meta_overlay',
							'value'       => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'description' => 'This option just apply for or Featured Category Style 7'
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Hide Post Author', 'soledad' ),
							'param_name' => 'hide_author',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Hide Category', 'soledad' ),
							'param_name' => 'hide_cat',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'description' => 'This option just apply for or Featured Category Style 8'
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Hide Icon Post Format', 'soledad' ),
							'param_name' => 'hide_icon_format',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Hide Post Date', 'soledad' ),
							'param_name' => 'hide_date',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Show Comment Count', 'soledad' ),
							'param_name'       => 'show_commentcount',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'             => 'checkbox',
							'heading'          => __( 'Show Views Count', 'soledad' ),
							'param_name'       => 'show_viewscount',
							'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'edit_field_class' => 'vc_col-sm-6',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Hide Post Excerpt', 'soledad' ),
							'param_name' => 'hide_excerpt',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Remove Line Above Post Excerpt', 'soledad' ),
							'param_name' => 'hide_excerpt_line',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Custom Excerpt Length for style 1,2,6,7,8,10', 'soledad' ),
							'param_name' => '_excerpt_length',
							'value'      => '',
						),
						//// Enable view all button
						array(
							'type'             => 'textfield',
							'param_name'       => 'heading_viewall_settings',
							'heading'          => esc_html__( 'View All Button', 'soledad' ),
							'value'            => '',
							'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Enable "View All" Button', 'soledad' ),
							'param_name' => 'cat_seemore',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Custom Link for "View All" Button', 'soledad' ),
							'param_name' => 'cat_view_link',
							'value'      => '',
							'dependency' => array( 'element' => 'cat_seemore', 'value' => array( 'yes' ) ),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Remove arrow on "View All"', 'soledad' ),
							'param_name' => 'cat_remove_arrow',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'dependency' => array( 'element' => 'cat_seemore', 'value' => array( 'yes' ) ),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Make "View All" is A Button', 'soledad' ),
							'param_name' => 'cat_readmore_button',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'dependency' => array( 'element' => 'cat_seemore', 'value' => array( 'yes' ) ),
						),
						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Align "View All" Button', 'soledad' ),
							'param_name' => 'cat_readmore_align',
							'value'      => array(
								__( 'Align Left', 'soledad' )   => 'left',
								__( 'Align Center', 'soledad' ) => 'center',
								__( 'Align Right', 'soledad' )  => 'right',
							),
							'std'        => 'center',
						),
						array(
							'type'       => 'penci_number',
							'param_name' => 'cat_readmore_martop',
							'heading'    => __( 'Custom Margin Top for "View All" Button', 'soledad' ),
							'value'      => '',
							'std'        => '',
							'suffix'     => 'px',
							'min'        => 1,
							'dependency' => array( 'element' => 'cat_seemore', 'value' => array( 'yes' ) ),
						),
					),
					Penci_Vc_Params_Helper::heading_block_params( false ),
					Penci_Vc_Params_Helper::params_heading_typo_color( ),
					Penci_Vc_Params_Helper::params_featured_cat_typo_color(),
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

			// Portfolio
			vc_map( array(
				'name'        => __( 'Portfolio', 'soledad' ),
				'description' => 'Display Your Portfolio',
				'base'        => 'portfolio',
				'class'       => '',
				'controls'    => 'full',
				'icon'        => get_template_directory_uri() . '/images/vc-icon.png',
				'category'    => 'Soledad',
				'weight'        => 700,
				'params'      => array(
					array(
						'type'        => 'loop',
						'heading'     => __( 'Click button below to Build Query for This Portfolio', 'soledad' ),
						'param_name'  => 'loop',
						'value'       => 'post_type:portfolio',
						'settings'    => array(
							'size'      => array( 'value' => '' ),
							'post_type' => array( 'value' => 'portfolio' ),
						),
						'description' => __( 'Create Portfolio loop, to populate content from your site.', 'soledad' ),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Portfolio Style',
						'value'       => array(
							'Masonry' => 'masonry',
							'Grid'    => 'grid'
						),
						'param_name'  => 'style',
						'description' => '',
					),
					array(
						'type'        => 'hidden',
						'heading'     => 'Number Portfolio Display',
						'param_name'  => 'number',
						'description' => 'Fill the number portfolio display you want here',
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Item Style', 'penci-framework' ),
						'value'      => array(
							'Text Overlay'     => 'text_overlay',
							'Text Below Image' => 'below_img'
						),
						'param_name' => 'item_style',
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Number Columns',
						'value'       => array(
							'3 Columns' => '3',
							'2 Columns' => '2'
						),
						'param_name'  => 'column',
						'description' => '',
					),
					array(
						'type'       => 'dropdown',
						'heading'    => __( 'Image Type - Just apply for Grid Style', 'soledad' ),
						'param_name' => 'image_type',
						'value'      => array(
							__( 'Square', 'soledad' )    => 'square',
							__( 'Vertical', 'soledad' )  => 'vertical',
							__( 'Landscape', 'soledad' ) => 'landscape',
						),
						'std'        => 'landscape',
					),
					array(
						'type'        => 'hidden',
						'heading'     => 'Display Portfolio in Portfolio Categories',
						'param_name'  => 'cat',
						'description' => 'Fill the portfolio categories slug you want to display. E.g: cat-1, cat-2',
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Display Filter?',
						'value'       => array(
							'Yes' => 'true',
							'No'  => 'false'
						),
						'param_name'  => 'filter',
						'description' => '',
					),
					array(
						'type'        => 'textfield',
						'heading'     => 'All Portfolio Text',
						'param_name'  => 'all_text',
						'description' => '',
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Pagination:', 'soledad' ),
						'param_name' => 'pagination',
						'std'        => 'number',
						'value'      => array(
							esc_html__( 'Numeric Pagination', 'soledad' )  => 'number',
							esc_html__( 'Load More Button', 'soledad' )  => 'load_more',
							esc_html__( 'Infinite Load', 'soledad' )     => 'infinite',
						),
					),
					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Custom Number Posts for Each Time Load More Posts', 'soledad' ),
						'param_name' => 'numbermore',
						'std'        => 6,
						'dependency' => array( 'element' => 'pagination', 'value' => array( 'load_more', 'infinite' ) )
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Enable Click on Thumbnails to Open Lightbox?',
						'value'       => array(
							'No' => 'false',
							'Yes'    => 'true'
						),
						'param_name'  => 'lightbox',
						'description' => '',
					),
					// Typo
					array(
						'type'             => 'textfield',
						'param_name'       => 'heading_filter_settings',
						'heading'          => esc_html__( 'Portfolio Filter', 'soledad' ),
						'value'            => '',
						'group'            => $group_color,
						'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
					),
					array(
						'type'             => 'colorpicker',
						'heading'          => esc_html__( 'Link Color', 'soledad' ),
						'param_name'       => 'pfilter_color',
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'colorpicker',
						'heading'          => esc_html__( 'Link Hover Color', 'soledad' ),
						'param_name'       => 'pfilter_hcolor',
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'penci_number',
						'param_name'       => 'pfilter_fsize',
						'heading'          => __( 'Font Size for Link', 'soledad' ),
						'value'            => '',
						'std'              => '',
						'suffix'           => 'px',
						'min'              => 1,
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'checkbox',
						'heading'          => __( 'Custom Font Family for Link', 'soledad' ),
						'param_name'       => 'use_pfilter_typo',
						'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'       => 'google_fonts',
						'group'      => $group_color,
						'param_name' => 'pfilter_typo',
						'value'      => '',
						'dependency' => array( 'element' => 'use_pfilter_typo', 'value' => 'yes' ),
					),
					array(
						'type'             => 'textfield',
						'param_name'       => 'heading_ptittle_settings',
						'heading'          => esc_html__( 'Portfolio Title', 'soledad' ),
						'value'            => '',
						'group'            => $group_color,
						'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
					),
					array(
						'type'             => 'colorpicker',
						'heading'          => esc_html__( 'Portfolio Background Overlay Color', 'soledad' ),
						'param_name'       => 'pbgoverlay_color',
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'colorpicker',
						'heading'          => esc_html__( 'Portfolio Title Color', 'soledad' ),
						'param_name'       => 'ptitle_color',
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'colorpicker',
						'heading'          => esc_html__( 'Portfolio Title Hover Color', 'soledad' ),
						'param_name'       => 'ptitle_hcolor',
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'penci_number',
						'param_name'       => 'ptitle_fsize',
						'heading'          => __( 'Font Size for Portfolio Title', 'soledad' ),
						'value'            => '',
						'std'              => '',
						'suffix'           => 'px',
						'min'              => 1,
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'checkbox',
						'heading'          => __( 'Custom Font Family for Portfolio Title', 'soledad' ),
						'param_name'       => 'use_ptitle_typo',
						'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'       => 'google_fonts',
						'group'      => $group_color,
						'param_name' => 'ptitle_typo',
						'value'      => '',
						'dependency' => array( 'element' => 'use_ptitle_typo', 'value' => 'yes' ),
					),

					array(
						'type'             => 'textfield',
						'param_name'       => 'heading_ptittle_settings',
						'heading'          => esc_html__( 'Portfolio Category', 'soledad' ),
						'value'            => '',
						'group'            => $group_color,
						'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
					),
					array(
						'type'             => 'colorpicker',
						'heading'          => esc_html__( 'Portfolio Category Color', 'soledad' ),
						'param_name'       => 'pcat_color',
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'colorpicker',
						'heading'          => esc_html__( 'Portfolio Category Hover Color', 'soledad' ),
						'param_name'       => 'pcat_hcolor',
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'penci_number',
						'param_name'       => 'pcat_fsize',
						'heading'          => __( 'Font Size for Portfolio Category', 'soledad' ),
						'value'            => '',
						'std'              => '',
						'suffix'           => 'px',
						'min'              => 1,
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'checkbox',
						'heading'          => __( 'Custom Font Family for Portfolio Category', 'soledad' ),
						'param_name'       => 'use_pcat_typo',
						'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'       => 'google_fonts',
						'group'      => $group_color,
						'param_name' => 'pcat_typo',
						'value'      => '',
						'dependency' => array( 'element' => 'use_pcat_typo', 'value' => 'yes' ),
					),

				)
			) );

			// Popular Posts
			vc_map( array(
				'name'        => __( 'Popular Posts', 'soledad' ),
				'description' => 'Display Popular Posts Slider Based on The Most Posts Viewed',
				'base'        => 'popular_posts',
				'class'       => '',
				'controls'    => 'full',
				'icon'        => get_template_directory_uri() . '/images/vc-icon.png',
				'category'    => 'Soledad',
				'weight'        => 700,
				'params'      => array_merge(
					array(
						array(
							'type'        => 'loop',
							'heading'     => __( '', 'soledad' ),
							'param_name'  => 'build_query',
							'value'       => 'post_type:post|size:10',
							'settings'    => array(
								'size'      => array( 'value' => 10, 'hidden' => false ),
								'post_type' => array( 'value' => 'post', 'hidden' => false )
							),
							'description' => __( 'Create WordPress loop, to populate content from your site.', 'soledad' ),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => 'Select Columns for Display',
							'value'       => array(
								'4 Columns' => '4',
								'3 Columns' => '3'
							),
							'param_name'  => 'columns',
							'description' => '',
						),

						array(
							'type'       => 'dropdown',
							'heading'    => __( 'Image Size Type', 'soledad' ),
							'value'      => array(
								'Default'         => '',
								'Horizontal Size' => 'horizontal',
								'Square Size'     => 'square',
								'Vertical Size'   => 'vertical',
								'Custom'          => 'custom',
							),
							'std'        => '',
							'param_name' => 'penci_featimg_size',
						),
						array(
							'type'       => 'penci_only_number',
							'heading'    => esc_html__( 'Image Ratio.Unit is %. E.g: 50', 'soledad' ),
							'param_name' => 'penci_featimg_ratio',
							'value'      => '',
							'std'        => '',
							'min'        => 0,
							'max'        => 100,
							'suffix'     => '%',
							'dependency' => array( 'element' => 'penci_featimg_size', 'value' => 'custom' ),
						),
						array(
							'type'       => 'checkbox',
							'heading'    => __( 'Hide Heading Title', 'soledad' ),
							'param_name' => 'hide_block_heading',
							'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
							'group'      => 'Heading',
						),
					),
					Penci_Vc_Params_Helper::heading_block_params( false ),
					Penci_Vc_Params_Helper::params_heading_typo_color(),
					Penci_Vc_Params_Helper::params_popular_posts_typo_color(),
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
			
			// Sidebar
			vc_map( array(
				'name'        => __( 'Soledad Sidebar', 'soledad' ),
				'description' => 'Display a Sidebar for Soledad Theme',
				'base'        => 'soledad_sidebar',
				'class'       => '',
				'controls'    => 'full',
				'icon'        => get_template_directory_uri() . '/images/vc-icon.png',
				'category'    => 'Soledad',
				'weight'        => 700,
				'params'      => array(
					array(
						'type'        => 'dropdown',
						'heading'     => 'Sidebar to Display',
						'value'       => Penci_Custom_Sidebar::get_list_sidebar_vc(),
						'param_name'  => 'sidebar',
						'description' => '',
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Sidebar Widget Heading Style',
						'value'       => array(
							'Default'             => 'style-1',
							'Style 2'             => 'style-2',
							'Style 3'             => 'style-3',
							'Style 4'             => 'style-4',
							'Style 5'             => 'style-5',
							'Style 6 - Only Text' => 'style-6',
							'Style 7'             => 'style-7',
							'Style 8'             => 'style-9',
							'Style 9'             => 'style-8',
							'Style 10'            => 'style-10',
							'Style 11'            => 'style-11',
							'Style 12'            => 'style-12',
							'Style 13'            => 'style-13',
							'Style 14'            => 'style-14',
						),
						'param_name'  => 'style',
						'description' => '',
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Sidebar Widget Heading Align',
						'value'       => array(
							'Center' => 'pcalign-center',
							'Left' => 'pcalign-left',
							'Right' => 'pcalign-right',
						),
						'param_name'  => 'align',
						'description' => '',
					),
				)
			) );
			
			// Featured Boxes
			vc_map( array(
				'name'        => __( 'Soledad Featured Boxes', 'soledad' ),
				'description' => 'Create Featured Boxes',
				'base'        => 'soledad_featured_boxes',
				'class'       => '',
				'controls'    => 'full',
				'icon'        => get_template_directory_uri() . '/images/vc-icon.png',
				'category'    => 'Soledad',
				'weight'        => 700,
				'params'      => array(
					array(
						'type'        => 'dropdown',
						'heading'     => 'Featured Boxes Style',
						'value'       => array(
							'Style 1' => 'boxes-style-1',
							'Style 2' => 'boxes-style-2',
							'Style 3' => 'boxes-style-3',
							'Style 4' => 'boxes-style-4',
						),
						'param_name'  => 'style',
						'description' => '',
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Featured Boxes Columns',
						'value'       => array(
                            '3 Columns' => 'boxes-3-columns',
							'1 Column' => 'boxes-1-column',
							'2 Columns' => 'boxes-2-columns',
							'4 Columns' => 'boxes-4-columns',
						),
						'param_name'  => 'columns',
						'description' => '',
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Featured Boxes Size Type',
						'value'       => array(
							'Horizontal Size' => 'horizontal',
							'Square Size' => 'square',
							'Vertical Size' => 'vertical'
						),
						'param_name'  => 'size',
						'description' => '',
					),
					array(
						'type'        => 'dropdown',
						'heading'     => 'Open in New Tab?',
						'value'       => array(
							'No' => 'no',
							'Yes' => 'yes',
						),
						'param_name'  => 'new_tab',
						'description' => '',
					),
					array(
						'type'        => 'textfield',
						'heading'     => 'Custom Margin Top ( Unit is Pixel )',
						'param_name'  => 'margin_top',
						'description' => '',
						'value'       => '0'
					),
					array(
						'type'        => 'textfield',
						'heading'     => 'Custom Margin Bottom ( Unit is Pixel )',
						'param_name'  => 'margin_bottom',
						'description' => '',
						'value'       => '0'
					),
					array(
						'type'       => 'param_group',
						'heading'    => '',
						'param_name' => 'boxes_data',
						'value' => urlencode( json_encode( array(
							array(
								'text'       => 'Featured Boxed 1',
								'url' => 'http://example1.com/'
							),
							array(
								'text'       => 'Featured Boxed 2',
								'url' => 'http://example2.com/'
							),
							array(
								'text'       => 'Featured Boxed 3',
								'url' => 'http://example3.com/'
							),
						) ) ),
						'params'     => array(
							array(
								'type'        => 'attach_image',
								'heading'     => __( 'Image', 'soledad' ),
								'param_name'  => 'image',
								'value'       => '',
								'description' => __( 'Select image from media library.', 'soledad' ),
							),
							array(
								'type'        => 'textfield',
								'heading'     => __( 'Text', 'soledad' ),
								'param_name'  => 'text',
								'admin_label' => true,
							),
							array(
								'type' => 'textfield',
								'heading'     => __( 'URL', 'soledad' ),
								'param_name'  => 'url',
							),
						),
					),

					// Color
					array(
						'type'             => 'colorpicker',
						'heading'          => esc_html__( 'Background and Border color', 'soledad' ),
						'param_name'       => 'img_box_border_color',
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'colorpicker',
						'heading'          => esc_html__( 'Text color', 'soledad' ),
						'param_name'       => 'img_box_text_color',
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'colorpicker',
						'heading'          => esc_html__( 'Hover text color', 'soledad' ),
						'param_name'       => 'img_box_text_hcolor',
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'penci_number',
						'param_name'       => 'img_box_fsize',
						'heading'          => __( 'Font Size for Text', 'soledad' ),
						'value'            => '',
						'std'              => '',
						'suffix'           => 'px',
						'min'              => 1,
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'             => 'checkbox',
						'heading'          => __( 'Custom Font Family for Text', 'soledad' ),
						'param_name'       => 'use_img_box_typo',
						'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
						'group'            => $group_color,
						'edit_field_class' => 'vc_col-sm-6',
					),
					array(
						'type'       => 'google_fonts',
						'group'      => $group_color,
						'param_name' => 'img_box_typo',
						'value'      => '',
						'dependency' => array( 'element' => 'use_img_box_typo', 'value' => 'yes' ),
					),
				)
			) );
		}

		/**
		 * Show notice if your plugin is activated but Visual Composer is not
		 */
		public static function notice() {
			?>

			<div class="updated">
				<p><?php _e( '<strong>Soledad VC Addon</strong> requires <strong>Visual Composer</strong> plugin to be installed and activated on your site.', 'soledad' ) ?></p>
			</div>

		<?php
		}

		/**
		 * Get category for auto complete field
		 *
		 * @param string $taxonomy Taxnomy to get terms
		 *
		 * @return array
		 */
		private static function get_terms( $taxonomy = 'category' ) {
			$cats = get_terms( $taxonomy );
			if ( ! $cats || is_wp_error( $cats ) ) {
				return array();
			}

			$categories = array();
			foreach ( $cats as $cat ) {
				$categories[$cat->name] = $cat->slug;
			}

			return $categories;
		}
	}

	new Soledad_VC_Admin();
}