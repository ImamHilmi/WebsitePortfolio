<?php

namespace PenciSoledadElementor\Modules\PenciFeaturedCat\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use PenciSoledadElementor\Modules\QueryControl\Module;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciFeaturedCat extends Base_Widget {

	public function get_name() {
		return 'penci-featured-cat';
	}

	public function get_title() {
		return esc_html__( 'Penci Featured Cat', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_keywords() {
		return array( 'facebook', 'social', 'embed', 'page' );
	}

	/**
	 * Retrieve the list of scripts the image carousel widget depended on.
	 */
	public function get_script_depends() {
		return array( 'penci-facebook-js' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		$this->register_query_section_controls();
		$this->start_controls_section(
			'section_layout', array(
				'label' => esc_html__( 'Layout', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'penci_style', array(
				'label'   => __( 'Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => array(
					'style-1'  => 'Style 1 - 1st Post Grid Featured on Left',
					'style-2'  => 'Style 2 - 1st Post Grid Featured on Top',
					'style-3'  => 'Style 3 - Text Overlay',
					'style-4'  => 'Style 4 - Single Slider',
					'style-5'  => 'Style 5 - Slider 2 Columns',
					'style-6'  => 'Style 6 - 1st Post List Featured on Top',
					'style-7'  => 'Style 7 - Grid Layout',
					'style-8'  => 'Style 8 - List Layout',
					'style-9'  => 'Style 9 - Small List Layout',
					'style-10' => 'Style 10 - 2 First Posts Featured and List',
					'style-11' => 'Style 11 - Text Overlay Center',
					'style-12' => 'Style 12 - Slider 3 Columns',
					'style-13' => 'Style 13 - Grid 3 Columns',
					'style-14' => 'Style 14 - 1st Post Overlay Featured on Top',
				)
			)
		);

		$this->add_responsive_control(
			'penci_columns', array(
				'label'          => __( 'Columns', 'soledad' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => '',
				'tablet_default' => '1',
				'mobile_default' => '1',
				'options'        => array(
					''  => 'Default',
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'condition'      => array( 'penci_style' => array( 'style-3', 'style-11' ) ),
			)
		);

		$this->add_control(
			'penci_column_gap', array(
				'label'     => __( 'Columns Gap', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-featured-cat-sc:not( .penci-featured-cat-ctcol ) .home-featured-cat-content' => 'width: calc(100% + {{SIZE}}{{UNIT}});margin-left: calc(-{{SIZE}}{{UNIT}}/2); margin-right: calc(-{{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .penci-featured-cat-sc:not( .penci-featured-cat-ctcol ) .home-featured-cat-content .mag-photo' => 'padding-left: calc({{SIZE}}{{UNIT}}/2); padding-right: calc({{SIZE}}{{UNIT}}/2)',
					'{{WRAPPER}} .penci-featured-cat-ctcol .home-featured-cat-content' => 'grid-column-gap: {{SIZE}}{{UNIT}}'
				),
				'condition' => array( 'penci_style' => array( 'style-3', 'style-11' ) ),
			)
		);

		$this->add_control(
			'penci_row_gap', array(
				'label'              => __( 'Rows Gap', 'soledad' ),
				'type'               => Controls_Manager::SLIDER,
				'range'              => array( 'px' => array( 'min' => 0, 'max' => 200 ) ),
				'frontend_available' => true,
				'selectors'          => array(
					'{{WRAPPER}} .penci-featured-cat-sc:not( .penci-featured-cat-ctcol ) .home-featured-cat-content .mag-photo' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .penci-featured-cat-ctcol .home-featured-cat-content'  => 'grid-row-gap: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .mag-cat-style-8 .penci-grid li.list-post:not( :last-child )' => 'padding-bottom: calc({{SIZE}}{{UNIT}}/2); margin-bottom: calc({{SIZE}}{{UNIT}}/2)',
				),
				'condition'          => array( 'penci_style' => array( 'style-3', 'style-11', 'style-8' ) ),
			)
		);

		$this->add_control(
			'penci_featimg_size', array(
				'label'                => __( 'Image Size Type', 'soledad' ),
				'type'                 => Controls_Manager::SELECT,
				'default'              => '',
				'options'              => array(
					''           => esc_html__( 'Default', 'soledad' ),
					'horizontal' => esc_html__( 'Horizontal Size', 'soledad' ),
					'square'     => esc_html__( 'Square Size', 'soledad' ),
					'vertical'   => esc_html__( 'Vertical Size', 'soledad' ),
					'custom'     => esc_html__( 'Custom', 'soledad' ),
				),
				'selectors'            => array( '{{WRAPPER}} .penci-image-holder:before' => '{{VALUE}}', ),
				'selectors_dictionary' => array(
					'horizontal' => 'padding-top: 66.6667%;',
					'square'     => 'padding-top: 100%;',
					'vertical'   => 'padding-top: 135.4%;',
				),
				'condition'      => array( 'penci_style!' => array( 'masonry-2','masonry' ) ),
			)
		);
		$this->add_responsive_control(
			'penci_featimg_ratio', array(
				'label'          => __( 'Image Ratio', 'soledad' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => array( 'size' => 0.66 ),
				'tablet_default' => array( 'size' => '' ),
				'mobile_default' => array( 'size' => 0.5 ),
				'range'          => array( 'px' => array( 'min' => 0.1, 'max' => 2, 'step' => 0.01 ) ),
				'selectors'      => array(
					'{{WRAPPER}} .penci-image-holder:before' => 'padding-top: calc( {{SIZE}} * 100% );',
				),
				'condition'      => array( 'penci_featimg_size' => 'custom' ),
			)
		);

		$this->add_control(
			'big_title_length', array(
				'label'       => __( 'Custom Words Length for Post Titles for Big Posts', 'soledad' ),
				'type'        => Controls_Manager::NUMBER,
				'label_block' => true,
				'default'     => '',
			)
		);
		$this->add_control(
			'_title_length', array(
				'label'       => __( 'Custom Words Length for Post Titles', 'soledad' ),
				'type'        => Controls_Manager::NUMBER,
				'label_block' => true,
				'default'     => '',
			)
		);
		$featured_cat_opts = array(
			'enable_meta_overlay' => array( 'label' => 'Enable Post Meta Overlay Featured Image', 'desc' => 'This option just apply for or Featured Category Style 7' ),
			'hide_author'         => array( 'label' => 'Hide Post Author', 'desc' => '' ),
			'hide_cat'            => array( 'label' => 'Hide Category', 'desc' => 'This option just apply for or Featured Category Style 8' ),
			'hide_icon_format'    => array( 'label' => 'Hide Icon Post Format', 'desc' => '' ),
			'hide_date'           => array( 'label' => 'Hide Post Date', 'desc' => '' ),
			'show_commentcount'   => array( 'label' => 'Show Comment Count', 'desc' => '' ),
			'show_viewscount'     => array( 'label' => 'Show Views Count', 'desc' => '' ),
			'hide_excerpt'        => array( 'label' => 'Hide Post Excerpt', 'desc' => '' ),
			'hide_excerpt_line'   => array( 'label' => 'Remove Line Above Post Excerpt', 'desc' => '' ),
		);

		foreach ( $featured_cat_opts as $featured_cat_key => $featured_cat_opt ) {
			$this->add_control(
				$featured_cat_key, array(
					'label'       => $featured_cat_opt['label'],
					'type'        => Controls_Manager::SWITCHER,
					'description' => $featured_cat_opt['desc'],
				)
			);
		}

		$this->add_control(
			'_excerpt_length', array(
				'label'     => __( 'Custom Excerpt Length', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'condition' => array( 'hide_excerpt!' => 'yes', 'penci_style' => array( 'style-1', 'style-2','style-6','style-7','style-8','style-10' ) ),
			)
		);
		
		// Enable view all button
		$this->add_control(
			'cat_seemore', array(
				'label'     => __( 'Enable "View All" Button', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'cat_view_link',array(
				'label' => __( 'Custom Link for "View All" Button', 'soledad' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'https://your-link.com', 'soledad' ),
				'condition' => array( 'cat_seemore' => 'yes' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'cat_remove_arrow', array(
				'label'     => __( 'Remove arrow on "View All"', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'condition' => array( 'cat_seemore' => 'yes' ),
			)
		);
		$this->add_control(
			'cat_readmore_button', array(
				'label'     => __( 'Make "View All" is A Button', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'condition' => array( 'cat_seemore' => 'yes' ),
			)
		);
		$this->add_control(
			'cat_readmore_align', array(
				'label'     => __( 'Align "View All" Button', 'soledad' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'left'    => array(
						'title' => __( 'Left', 'soledad' ),
						'icon'  => 'eicon-text-align-left'
					),
					'center'  => array(
						'title' => __( 'Center', 'soledad' ),
						'icon'  => 'eicon-text-align-center'
					),
					'right'   => array(
						'title' => __( 'Right', 'soledad' ),
						'icon'  => 'eicon-text-align-right'
					),
				),
				'default' => 'left',
				'label_block' => true,
				'condition' => array( 'cat_seemore' => 'yes' ),
			)
		);
		$this->add_responsive_control(
			'cat_readmore_martop',
			array(
				'label'     => __( 'Custom Margin Top for "View All" Button', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => array( 'size' => '' ),
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-featured-cat-seemore'  => 'margin-top: {{SIZE}}{{UNIT}} !important'
				),
				'condition' => array( 'cat_seemore' => 'yes' ),
				'label_block' => true,
			)
		);


		$this->end_controls_section();

		$this->register_block_title_section_controls_post();

		// Design
		$this->start_controls_section(
			'section_design_general',
			array(
				'label' => __( 'Featured Cat', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'pborder_color',
			array(
				'label'     => __( 'Post Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .home-featured-cat-content .mag-post-box,{{WRAPPER}} .penci-grid li.list-post' => 'border-color: {{VALUE}};' ),
			)
		);

		// Post title
		$this->add_control(
			'heading_ptittle_settings',
			array(
				'label'     => __( 'Posts Title', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'ptitle_color',
			array(
				'label'     => __( 'Post Title Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-grid li .item h2 a'                      => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-masonry .item-masonry h2 a'              => 'color: {{VALUE}};',
					'{{WRAPPER}} .home-featured-cat-content .magcat-detail h3 a' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'ptitle_hcolor',
			array(
				'label'     => __( 'Post Title Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-grid li .item h2 a:hover'                      => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-masonry .item-masonry h2 a:hover'              => 'color: {{VALUE}};',
					'{{WRAPPER}} .home-featured-cat-content .magcat-detail h3 a:hover' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'bptitle_color',
			array(
				'label'     => __( 'Post Title Color of Big Post', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .home-featured-cat-content .first-post .magcat-detail h3 a' => 'color: {{VALUE}} !important;' ),
				'condition' => array( 'penci_style' => 'style-14' ),
			)
		);
		$this->add_control(
			'bptitle_hcolor',
			array(
				'label'     => __( 'Post Title Hover Color of Big Post', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .home-featured-cat-content .first-post .magcat-detail h3 a:hover' => 'color: {{VALUE}} !important;' ),
				'condition' => array( 'penci_style' => 'style-14' ),
			)
		);
		$this->add_responsive_control(
			'bptitle_fsize', array(
				'label'     => __( 'Font Size for Title of Big Post', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .home-featured-cat-content .first-post .magcat-detail h3 a' => 'font-size: {{SIZE}}px' ),
				'condition' => array( 'penci_style' => array( 'style-1', 'style-2', 'style-6', 'style-10', 'style-14' ) ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'ptitle_typo',
				'selector' => '{{WRAPPER}} .home-featured-cat-content .magcat-detail h3 a,{{WRAPPER}} .penci-grid li .item h2 a,{{WRAPPER}} .penci-masonry .item-masonry h2 a',
			)
		);
		// Post meta
		$this->add_control(
			'heading_pmeta_settings',
			array(
				'label'     => __( 'Posts Meta', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'pmeta_color',
			array(
				'label'     => __( 'Post Meta Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .home-featured-cat-content .grid-post-box-meta span a'                => 'color: {{VALUE}};',
					'{{WRAPPER}} .home-featured-cat-content .grid-post-box-meta span'                  => 'color: {{VALUE}};',
					'{{WRAPPER}} .home-featured-cat-content .mag-photo .grid-post-box-meta span:after' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'pmeta_hcolor',
			array(
				'label'     => __( 'Post Meta Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .grid-post-box-meta span a.comment-link:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .grid-post-box-meta span a:hover'              => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pmeta_typo',
				'selector' => '{{WRAPPER}} .home-featured-cat-content .grid-post-box-meta',
			)
		);
		// Post excrept
		$this->add_control(
			'heading_pexcrept_settings',
			array(
				'label'     => __( 'Posts Excerpt', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'pexcerpt_color',
			array(
				'label'     => __( 'Post Excerpt Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .entry-content' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pexcerpt_typo',
				'selector' => '{{WRAPPER}} .entry-content,{{WRAPPER}} .entry-content p',
			)
		);

		// Post category
		$this->add_control(
			'heading_pcat_settings',
			array(
				'label'     => __( 'Categories', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'pcat_color',
			array(
				'label'     => __( 'Categories Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cat > a.penci-cat-name'       => 'color: {{VALUE}};',
					'{{WRAPPER}} .cat > a.penci-cat-name:after' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'pcat_hcolor',
			array(
				'label'     => __( 'Categories Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .cat > a.penci-cat-name:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pcat_typo',
				'selector' => '{{WRAPPER}} .cat > a.penci-cat-name',
			)
		);

		// Button
		$this->add_control(
			'heading_pbutton_settings',
			array(
				'label'     => __( 'View all" Button', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'cat_viewall_color',
			array(
				'label'     => __( 'Text Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-featured-cat-seemore a,{{WRAPPER}} .penci-featured-cat-seemore.penci-btn-make-button a' => 'color: {{VALUE}};',
				),
				'condition' => array( 'cat_seemore' => 'yes' ),
			)
		);
		$this->add_control(
			'cat_viewall_bgcolor',
			array(
				'label'     => __( 'Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-featured-cat-seemore.penci-btn-make-button a' => 'background-color: {{VALUE}};',
				),
				'condition' => array( 'cat_seemore' => 'yes' ),
			)
		);

		$this->end_controls_section();

		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$query_args = Module::get_query_args( 'posts', $settings );


		echo \Soledad_VC_Shortcodes::featured_cat( array(
			'heading'             => $settings['heading'],
			'hide_block_heading'  => $settings['hide_block_heading'],
			'heading_title_style' => $settings['heading_title_style'],
			'heading_title_link'  => $settings['heading_title_link'],
			'heading_title_align' => $settings['block_title_align'],
			'cat_seemore'         => $settings['cat_seemore'],
			'cat_view_link'       => $settings['cat_view_link'],
			'cat_remove_arrow'    => $settings['cat_remove_arrow'],
			'cat_readmore_button' => $settings['cat_readmore_button'],
			'cat_readmore_align'  => $settings['cat_readmore_align'],

			'enable_meta_overlay' => $settings['enable_meta_overlay'],
			'hide_author'         => $settings['hide_author'],
			'hide_cat'            => $settings['hide_cat'],
			'hide_icon_format'    => $settings['hide_icon_format'],
			'hide_date'           => $settings['hide_date'],
			'hide_excerpt'        => $settings['hide_excerpt'],
			'hide_excerpt_line'   => $settings['hide_excerpt_line'],
			'_excerpt_length'     => $settings['_excerpt_length'],
			'big_title_length'    => $settings['big_title_length'],
			'_title_length'       => $settings['_title_length'],

			'penci_columns'        => $settings['penci_columns'],
			'penci_columns_tablet' => $settings['penci_columns_tablet'],
			'penci_columns_mobile' => $settings['penci_columns_mobile'],
			'penci_column_gap'     => $settings['penci_column_gap'],
			'penci_row_gap'        => $settings['penci_row_gap'],
			'show_viewscount'      => $settings['show_viewscount'],
			'show_commentcount'      => $settings['show_commentcount'],

			'style'           => $settings['penci_style'],
			'elementor_query' => $query_args,
		) );
	}
}
