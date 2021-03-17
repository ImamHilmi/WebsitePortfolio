<?php
if ( ! class_exists( 'Penci_Vc_Params_Helper' ) ):
	class Penci_Vc_Params_Helper {
		public static function params_heading() {

			$group_name = 'Heading';

			return array(
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Show / Hide Block Heading', 'soledad' ),
					'param_name' => 'is_block_heading',
					'value'      => array(
						__( 'Show', 'soledad' ) => 'show',
						__( 'Hide', 'soledad' ) => 'hide',
					),
					'std'        => 'show',
					'group'      => $group_name,
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Heading Title Style', 'soledad' ),
					'param_name' => 'heading_title_style',
					'std'        => '',
					'value'      => array(
						esc_html__( 'Default ', 'soledad' ) => '',
						esc_html__( 'Style 1', 'soledad' )  => 'style-1',
						esc_html__( 'Style 2', 'soledad' )  => 'style-2',
						esc_html__( 'Style 3', 'soledad' )  => 'style-3',
						esc_html__( 'Style 4', 'soledad' )  => 'style-4',
						esc_html__( 'Style 5', 'soledad' )  => 'style-5',
						esc_html__( 'Style 6', 'soledad' )  => 'style-6',
						esc_html__( 'Style 7', 'soledad' )  => 'style-7',
						esc_html__( 'Style 8', 'soledad' )  => 'style-9',
						esc_html__( 'Style 9', 'soledad' )  => 'style-8',
						esc_html__( 'Style 10', 'soledad' ) => 'style-10',
						esc_html__( 'Style 11', 'soledad' ) => 'style-11',
						esc_html__( 'Style 12', 'soledad' ) => 'style-12',
						esc_html__( 'Style 13', 'soledad' ) => 'style-13',
						esc_html__( 'Style 14', 'soledad' ) => 'style-14',
					),
					'group'      => $group_name,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Heading Title', 'soledad' ),
					'param_name'  => 'heading',
					'value'       => 'Block title',
					'std'         => 'Block title',
					'admin_label' => true,
					'description' => esc_html__( 'A title for this block, if you leave it blank the block will not have a title', 'soledad' ),
					'group'       => $group_name,
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title url', 'soledad' ),
					'param_name'  => 'heading_title_link',
					'std'         => '',
					'description' => esc_html__( 'A custom url when the block title is clicked', 'soledad' ),
					'group'       => $group_name,
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Add icon for title?', 'soledad' ),
					'param_name' => 'add_title_icon',
					'group'      => $group_name,
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'soledad' ),
					'param_name' => 'block_title_icon',
					'std'        => 'block_title_icon',
					'settings'   => array(
						'emptyIcon'    => true,
						'type'         => 'fontawesome',
						'iconsPerPage' => 4000,
					),
					'dependency' => array( 'element' => 'add_title_icon', 'value' => 'true', ),
					'group'      => $group_name,
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Icon Alignment', 'soledad' ),
					'description' => __( 'Select icon alignment.', 'soledad' ),
					'param_name'  => 'block_title_ialign',
					'value'       => array(
						__( 'Left', 'soledad' )  => 'left',
						__( 'Right', 'soledad' ) => 'right',
					),
					'dependency'  => array( 'element' => 'add_title_icon', 'value' => 'true', ),
					'group'       => $group_name,
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Heading Align', 'soledad' ),
					'param_name' => 'block_title_align',
					'std'        => '',
					'value'      => array(
						esc_html__( 'Default ( follow Customize )', 'soledad' ) => '',
						esc_html__( 'Left', 'soledad' )                         => 'pcalign-left',
						esc_html__( 'Center', 'soledad' )                       => 'pcalign-center',
						esc_html__( 'Right', 'soledad' )                        => 'pcalign-right',
					),
					'group'      => $group_name,
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Turn off Uppercase Block Title', 'soledad' ),
					'param_name' => 'block_title_offupper',
					'group'      => $group_name,
				),
				array(
					'type'       => 'penci_number',
					'param_name' => 'block_title_marginbt',
					'heading'    => __( 'Margin Bottom', 'soledad' ),
					'value'      => '',
					'std'        => '',
					'suffix'     => 'px',
					'min'        => 1,
					'group'      => $group_name,
				),
			);
		}

		public static function params_heading_typo_color( $group_color = '' ) {
			if ( ! $group_color ) {
				$group_color = 'Typo & Color';
			}

			return array(
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_meta_settings',
					'heading'          => esc_html__( 'Block Heading Title', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Title Color', 'soledad' ),
					'param_name'       => 'block_title_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Title Hover Color', 'soledad' ),
					'param_name'       => 'block_title_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Border Color', 'soledad' ),
					'param_name'       => 'btitle_bcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Border Outer Color', 'soledad' ),
					'param_name'       => 'btitle_outer_bcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Border Bottom for Heading Style 5, 10, 11, 12', 'soledad' ),
					'param_name'       => 'btitle_style5_bcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'heading_title_style', 'value' => array( 'style-5', 'style-10', 'style-11', 'style-12' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Small Border Bottom for Heading Style 7 & Style 8', 'soledad' ),
					'param_name'       => 'btitle_style78_bcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'heading_title_style', 'value' => array( 'style-7', 'style-9' ) ),
				),

				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Border Top for Heading Style 10', 'soledad' ),
					'param_name'       => 'btitle_style10_btopcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'heading_title_style', 'value' => array( 'style-10' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Background Shapes for Heading Style 11, 12, 13', 'soledad' ),
					'param_name'       => 'btitle_shapes_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'heading_title_style', 'value' => array( 'style-13', 'style-11', 'style-12' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Background Color', 'soledad' ),
					'param_name'       => 'btitle_bgcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6'
				),

				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Background Outer Color', 'soledad' ),
					'param_name'       => 'btitle_outer_bgcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__( 'Custom Background Image for Style 9', 'soledad' ),
					'param_name' => 'btitle_style9_bgimg',
					'group'      => $group_color,
					'dependency' => array( 'element' => 'heading_title_style', 'value' => array( 'style-8' ) ),
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Custom Font Family for Block Title', 'soledad' ),
					'param_name' => 'use_btitle_typo',
					'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
					'group'      => $group_color,
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'btitle_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_btitle_typo', 'value' => 'yes' ),
				),
				array(
					'type'       => 'penci_number',
					'param_name' => 'btitle_fsize',
					'heading'    => __( 'Font Size for Block Title', 'soledad' ),
					'value'      => '',
					'std'        => '',
					'suffix'     => 'px',
					'min'        => 1,
					'group'      => $group_color,
				)
			);
		}

		public static function params_container_width( $default = 3 ) {
			return array(
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Element Columns', 'soledad' ),
					'param_name' => 'penci_block_width',
					'std'        => $default,
					'value'      => array(
						__( '1 Column ( Small Container Width)', 'soledad' )    => '1',
						__( '2 Columns ( Medium Container Width )', 'soledad' ) => '2',
						__( '3 Columns ( Large Container Width )', 'soledad' )  => '3',
					),
				)
			);
		}

		public static function extra_params() {
			return array(
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'CSS box', 'soledad' ),
					'param_name' => 'css',
					'group'      => __( 'Design Options', 'soledad' ),
				)
			);
		}

		public static function heading_block_params( $block_title_df = true ) {
			return array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Heading Title Style', 'soledad' ),
					'param_name' => 'heading_title_style',
					'std'        => '',
					'value'      => array(
						esc_html__( 'Default ( follow Customize )', 'soledad' ) => '',
						esc_html__( 'Style 1', 'soledad' )                      => 'style-1',
						esc_html__( 'Style 2', 'soledad' )                      => 'style-2',
						esc_html__( 'Style 3', 'soledad' )                      => 'style-3',
						esc_html__( 'Style 4', 'soledad' )                      => 'style-4',
						esc_html__( 'Style 5', 'soledad' )                      => 'style-5',
						esc_html__( 'Style 6', 'soledad' )                      => 'style-6',
						esc_html__( 'Style 7', 'soledad' )                      => 'style-7',
						esc_html__( 'Style 8', 'soledad' )                      => 'style-9',
						esc_html__( 'Style 9', 'soledad' )                      => 'style-8',
						esc_html__( 'Style 10', 'soledad' )                     => 'style-10',
						esc_html__( 'Style 11', 'soledad' )                     => 'style-11',
						esc_html__( 'Style 12', 'soledad' )                     => 'style-12',
						esc_html__( 'Style 13', 'soledad' )                     => 'style-13',
						esc_html__( 'Style 14', 'soledad' )                     => 'style-14',
					),
					'group'      => 'Heading',
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Heading Title', 'soledad' ),
					'param_name'  => 'heading',
					'value'       => $block_title_df ? esc_html__( 'Block Title', 'soledad' ) : '',
					'std'         => $block_title_df ? esc_html__( 'Block Title', 'soledad' ) : '',
					'admin_label' => true,
					'description' => esc_html__( 'A title for this block, if you leave it blank the block will not have a title', 'soledad' ),
					'group'       => 'Heading',
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title Url', 'soledad' ),
					'param_name'  => 'heading_title_link',
					'std'         => '',
					'description' => esc_html__( 'A custom url when the block title is clicked', 'soledad' ),
					'group'       => 'Heading',
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Heading Align', 'soledad' ),
					'param_name' => 'heading_title_align',
					'std'        => '',
					'value'      => array(
						esc_html__( 'Default ( follow Customize )', 'soledad' ) => '',
						esc_html__( 'Left', 'soledad' )                         => 'pcalign-left',
						esc_html__( 'Center', 'soledad' )                       => 'pcalign-center',
						esc_html__( 'Right', 'soledad' )                        => 'pcalign-right',
					),
					'group'      => 'Heading',
				)
			);
		}

		public static function params_latest_posts_typo_color() {
			$group_color = 'Typo & Color';

			$style_big_post = array( 'mixed', 'mixed-2', 'standard-grid', 'standard-grid-2', 'standard-list', 'standard-boxed-1', 'classic-grid', 'classic-grid-2', 'classic-list', 'classic-boxed-1' );

			return array(
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_ptittle_settings',
					'heading'          => esc_html__( 'General Posts', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),

				// Post title
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Border Color', 'soledad' ),
					'param_name'       => 'pborder_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'boxed-1', 'boxed-2', 'mixed', 'mixed-2', 'standard-boxed-1' ) ),
				),

				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Color', 'soledad' ),
					'param_name'       => 'ptitle_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Hover Color', 'soledad' ),
					'param_name'       => 'ptitle_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'ptitle_fsize',
					'heading'          => __( 'Font Size for Post Title', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Title', 'soledad' ),
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
					'type'       => 'penci_separator',
					'param_name' => 'penci_separator1',
					'group'      => $group_color,
				),
				// Post meta
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Color', 'soledad' ),
					'param_name'       => 'pmeta_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Hover Color', 'soledad' ),
					'param_name'       => 'pmeta_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Author Color', 'soledad' ),
					'param_name'       => 'pauthor_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Border Color', 'soledad' ),
					'param_name'       => 'pmeta_border_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'pmeta_fsize',
					'heading'          => __( 'Font Size for Post Meta', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Meta', 'soledad' ),
					'param_name'       => 'use_pmeta_typo',
					'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pmeta_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_pmeta_typo', 'value' => 'yes' ),
				),

				array(
					'type'       => 'penci_separator',
					'param_name' => 'penci_separator2',
					'group'      => $group_color,
				),

				// Post Excrept
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Excrept Color', 'soledad' ),
					'param_name'       => 'pexcrept_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'pexcrept_fsize',
					'heading'          => __( 'Font Size for Post Excrept', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Excrept', 'soledad' ),
					'param_name'       => 'use_pexcrept_typo',
					'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pexcrept_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_pexcrept_typo', 'value' => 'yes' ),
				),
				array(
					'type'       => 'penci_separator',
					'param_name' => 'penci_separator2',
					'group'      => $group_color,
				),
				// Category
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Color', 'soledad' ),
					'param_name'       => 'pcat_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Hover Color', 'soledad' ),
					'param_name'       => 'pcat_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'pcat_fsize',
					'heading'          => __( 'Font Size for Post Categories', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Categories', 'soledad' ),
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
				array(
					'type'       => 'penci_separator',
					'param_name' => 'penci_separator2',
					'group'      => $group_color,
				),
				// Continue reading
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Continue reading Color', 'soledad' ),
					'param_name'       => 'prmore_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Continue reading Hover Color', 'soledad' ),
					'param_name'       => 'prmore_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'prmore_fsize',
					'heading'          => __( 'Font Size for Continue reading', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Continue reading', 'soledad' ),
					'param_name'       => 'use_prmore_typo',
					'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'prmore_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_prmore_typo', 'value' => 'yes' ),
				),
				array(
					'type'       => 'penci_separator',
					'param_name' => 'penci_separator2',
					'group'      => $group_color,
				),

				// Share
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Social Share Color', 'soledad' ),
					'param_name'       => 'pshare_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Social Share Hover Color', 'soledad' ),
					'param_name'       => 'pshare_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Social Share Border Color', 'soledad' ),
					'param_name'       => 'pshare_border_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),

				// Big Post
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_bptittle_settings',
					'heading'          => esc_html__( 'Big Posts', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
					'dependency'       => array( 'element' => 'style', 'value' => $style_big_post ),
				),

				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Color', 'soledad' ),
					'param_name'       => 'bptitle_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'mixed-2' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Hover Color', 'soledad' ),
					'param_name'       => 'bptitle_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'mixed-2' ) ),
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'bptitle_fsize',
					'heading'          => __( 'Font Size for Post Title', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $style_big_post ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Author Color', 'soledad' ),
					'param_name'       => 'bpauthor_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'mixed-2' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Border Color', 'soledad' ),
					'param_name'       => 'bpmeta_border_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'mixed-2' ) ),
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'bpmeta_fsize',
					'heading'          => __( 'Font Size for Post Meta', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $style_big_post ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Color', 'soledad' ),
					'param_name'       => 'bpcat_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'mixed-2' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Hover Color', 'soledad' ),
					'param_name'       => 'bpcat_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'mixed-2' ) ),
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'bpcat_fsize',
					'heading'          => __( 'Font Size for Post Categories', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $style_big_post ),
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'bpexcerpt_size',
					'heading'          => __( 'Font Size for Post Excerpt', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'mixed', 'standard-grid', 'standard-grid-2', 'standard-list', 'standard-boxed-1', 'classic-grid', 'classic-grid-2', 'classic-list' ) ),
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'bsocialshare_size',
					'heading'          => __( 'Font Size for Post Social Share', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => $style_big_post ),
				),

				// Pagination
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pag_settings',
					'heading'          => esc_html__( 'Pagination', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'pagination_icon',
					'heading'          => __( 'Font size for Load More Icon', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'pagination_size',
					'heading'          => __( 'Font Size for Pagination', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Text Color', 'soledad' ),
					'param_name'       => 'pagination_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Border Color', 'soledad' ),
					'param_name'       => 'pagination_bordercolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Background Color', 'soledad' ),
					'param_name'       => 'pagination_bgcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Hover Text Color', 'soledad' ),
					'param_name'       => 'pagination_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Hover Border Color', 'soledad' ),
					'param_name'       => 'pagination_hbordercolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Pagination Hover Background Color', 'soledad' ),
					'param_name'       => 'pagination_hbgcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
			);
		}

		public static function params_featured_cat_typo_color() {
			$group_color = 'Typo & Color';

			return array(
				// Post title
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_ptittle_settings',
					'heading'          => esc_html__( 'Posts General Options', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Border Color', 'soledad' ),
					'param_name'       => 'pborder_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				// Post title
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_ptittle_settings',
					'heading'          => esc_html__( 'Posts Title', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Color', 'soledad' ),
					'param_name'       => 'ptitle_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Hover Color', 'soledad' ),
					'param_name'       => 'ptitle_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Color of Big Post', 'soledad' ),
					'param_name'       => 'bptitle_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'style-14' ) ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Hover Color of Big Post', 'soledad' ),
					'param_name'       => 'bptitle_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'style-14' ) ),
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'ptitle_fsize',
					'heading'          => __( 'Font Size for Post Title', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'bptitle_fsize',
					'heading'          => __( 'Font Size for Title of Big Post', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => array( 'style-1', 'style-2', 'style-6', 'style-10', 'style-14' ) ),
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Title', 'soledad' ),
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

				// Post meta
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pmeta_settings',
					'heading'          => esc_html__( 'Posts Meta', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Color', 'soledad' ),
					'param_name'       => 'pmeta_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Hover Color', 'soledad' ),
					'param_name'       => 'pmeta_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'pmeta_fsize',
					'heading'          => __( 'Font Size for Post Meta', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Meta', 'soledad' ),
					'param_name'       => 'use_pmeta_typo',
					'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pmeta_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_pmeta_typo', 'value' => 'yes' ),
				),
				// Post excrept
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pexcrept_settings',
					'heading'          => esc_html__( 'Posts Excerpt', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Excerpt Color', 'soledad' ),
					'param_name'       => 'pexcerpt_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'pexcerpt_fsize',
					'heading'          => __( 'Font Size for Post Excerpt', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Excerpt', 'soledad' ),
					'param_name'       => 'use_pexcerpt_typo',
					'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pexcerpt_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_pexcerpt_typo', 'value' => 'yes' ),
				),

				// Category
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pcat_settings',
					'heading'          => esc_html__( 'Categories', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
					'dependency'       => array( 'element' => 'style', 'value' => 'style-8' ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Color', 'soledad' ),
					'param_name'       => 'pcat_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => 'style-8' ),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Categories Hover Color', 'soledad' ),
					'param_name'       => 'pcat_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => 'style-8' ),
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'pcat_fsize',
					'heading'          => __( 'Font Size for Post Categories', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
					'dependency'       => array( 'element' => 'style', 'value' => 'style-8' ),
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pcat_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'style', 'value' => 'style-8' ),
				),
			);
		}

		public static function params_popular_posts_typo_color() {
			$group_color = 'Typo & Color';

			return array(
				// Post title
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_ptittle_settings',
					'heading'          => esc_html__( 'Posts Title', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Color', 'soledad' ),
					'param_name'       => 'ptitle_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Title Hover Color', 'soledad' ),
					'param_name'       => 'ptitle_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'ptitle_fsize',
					'heading'          => __( 'Font Size for Post Title', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Title', 'soledad' ),
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

				// Post meta
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pmeta_settings',
					'heading'          => esc_html__( 'Posts Meta', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Post Meta Color', 'soledad' ),
					'param_name'       => 'pmeta_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'penci_number',
					'param_name'       => 'pmeta_fsize',
					'heading'          => __( 'Font Size for Post Meta', 'soledad' ),
					'value'            => '',
					'std'              => '',
					'suffix'           => 'px',
					'min'              => 1,
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'checkbox',
					'heading'          => __( 'Custom Font Family for Post Meta', 'soledad' ),
					'param_name'       => 'use_pmeta_typo',
					'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'       => 'google_fonts',
					'group'      => $group_color,
					'param_name' => 'pmeta_typo',
					'value'      => '',
					'dependency' => array( 'element' => 'use_pmeta_typo', 'value' => 'yes' ),
				),

				// Dot style
				array(
					'type'             => 'textfield',
					'param_name'       => 'heading_pmeta_settings',
					'heading'          => esc_html__( 'Dots Slider', 'soledad' ),
					'value'            => '',
					'group'            => $group_color,
					'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Dot background color', 'soledad' ),
					'param_name'       => '_dot_color',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => esc_html__( 'Dot border and background active color', 'soledad' ),
					'param_name'       => 'dot_hcolor',
					'group'            => $group_color,
					'edit_field_class' => 'vc_col-sm-6',
				),
			);
		}

		/**
		 * Get image sizes.
		 *
		 * Retrieve available image sizes after filtering `include` and `exclude` arguments.
		 */
		public static function get_list_image_sizes( $default = false ) {
			$wp_image_sizes = self::get_all_image_sizes();

			$image_sizes = array();

			if ( $default ) {
				$image_sizes[ esc_html__( 'Default', 'soledad' ) ] = '';
			}

			foreach ( $wp_image_sizes as $size_key => $size_attributes ) {
				$control_title = ucwords( str_replace( '_', ' ', $size_key ) );
				if ( is_array( $size_attributes ) ) {
					$control_title .= sprintf( ' - %d x %d', $size_attributes['width'], $size_attributes['height'] );
				}

				$image_sizes[ $control_title ] = $size_key;
			}

			$image_sizes[ esc_html__( 'Full', 'soledad' ) ] = 'full';

			return $image_sizes;
		}

		public static function get_all_image_sizes() {
			global $_wp_additional_image_sizes;

			$default_image_sizes = array( 'thumbnail', 'medium', 'medium_large', 'large' );

			$image_sizes = array();

			foreach ( $default_image_sizes as $size ) {
				$image_sizes[ $size ] = [
					'width'  => (int) get_option( $size . '_size_w' ),
					'height' => (int) get_option( $size . '_size_h' ),
					'crop'   => (bool) get_option( $size . '_crop' ),
				];
			}

			if ( $_wp_additional_image_sizes ) {
				$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
			}

			return $image_sizes;
		}
	}
endif;