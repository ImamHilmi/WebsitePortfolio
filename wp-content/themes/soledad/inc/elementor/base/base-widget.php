<?php

namespace PenciSoledadElementor\Base;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use PenciSoledadElementor\Modules\QueryControl\Module;
use PenciSoledadElementor\Modules\QueryControl\Controls\Group_Control_Posts;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

abstract class Base_Widget extends Widget_Base {
	public function get_categories() {
		return array( 'basic' );
	}

	public static function markup_block_title( $args, $self = null ) {
		$defaults = array(
			'heading_title_style'  => 'style-1',
			'heading'              => '',
			'heading_title_link'   => '',
			'add_title_icon'       => '',
			'block_title_icon'     => '',
			'block_title_ialign'   => '',
			'block_title_align'    => '',
			'block_title_marginbt' => '',
		);

		$r = wp_parse_args( $args, $defaults );

		if ( ! $r['heading'] ) {
			return;
		}

		if ( 'video_list' == $r['heading_title_style'] ) {
			return;
		}

		$heading_title = get_theme_mod( 'penci_sidebar_heading_style' ) ? get_theme_mod( 'penci_sidebar_heading_style' ) : 'style-1';
		$heading_align = get_theme_mod( 'penci_sidebar_heading_align' ) ? get_theme_mod( 'penci_sidebar_heading_align' ) : 'pcalign-center';


		if ( $r['heading_title_style'] ) {
			$heading_title = $r['heading_title_style'];
		}

		if ( $r['block_title_align'] ) {
			$heading_align = 'pcalign-' . $r['block_title_align'];
		}

		$classes = 'penci-border-arrow penci-homepage-title penci-home-latest-posts';
		$classes .= ' ' . $heading_title;
		$classes .= ' ' . $heading_align;
		$classes .= $r['block_title_ialign'] ? ' block-title-icon-' . $r['block_title_ialign'] : ' block-title-icon-left';
		?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<h3 class="inner-arrow">
				<?php
				if ( $r['heading_title_link']['url'] ) {
					$self->add_render_attribute( 'link', 'href', $r['heading_title_link']['url'] );
					if ( $r['heading_title_link']['is_external'] ) {
						$self->add_render_attribute( 'link', 'target', '_blank' );
					}

					if ( $r['heading_title_link']['nofollow'] ) {
						$self->add_render_attribute( 'link', 'rel', 'nofollow' );
					}

					echo '<a ' . $self->get_render_attribute_string( 'link' ) . '>';
				} else {
					echo '<span>';
				}

				if ( $r['add_title_icon'] && $r['block_title_icon'] && 'left' == $r['block_title_ialign'] ) {
					echo '<i class="' . esc_attr( $r['block_title_icon'] ) . '"></i>';
				}
				echo do_shortcode( $r['heading'] );
				if ( $r['add_title_icon'] && $r['block_title_icon'] && 'right' == $r['block_title_ialign'] ) {
					echo '<i class="fa-pos-right ' . esc_attr( $r['block_title_icon'] ) . '"></i>';
				}
				if ( $r['heading_title_link'] ) {
					echo '</a>';
				} else {
					echo '</span>';
				}
				?>
			</h3>
		</div>
		<?php
	}

	public function register_block_title_section_controls() {
		$this->start_controls_section(
			'section_title_block',
			array(
				'label' => __( 'Heading Title', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'heading_title_style', array(
				'label'   => __( 'Choose Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''   => esc_html__( 'Default ( follow Customize )', 'soledad' ),
					'style-1' => esc_html__( 'Style 1', 'soledad' ),
					'style-2' => esc_html__( 'Style 2', 'soledad' ),
					'style-3' => esc_html__( 'Style 3', 'soledad' ),
					'style-4' => esc_html__( 'Style 4', 'soledad' ),
					'style-5' => esc_html__( 'Style 5', 'soledad' ),
					'style-6' => esc_html__( 'Style 6 - Only Text', 'soledad' ),
					'style-7' => esc_html__( 'Style 7', 'soledad' ),
					'style-9' => esc_html__( 'Style 8', 'soledad' ),
					'style-8' => esc_html__( 'Style 9 - Custom Background Image', 'soledad' ),
					'style-10' => esc_html__( 'Style 10', 'soledad' ),
					'style-11' => esc_html__( 'Style 11', 'soledad' ),
					'style-12' => esc_html__( 'Style 12', 'soledad' ),
					'style-13' => esc_html__( 'Style 13', 'soledad' ),
					'style-14' => esc_html__( 'Style 14', 'soledad' )
				)
			)
		);
		$this->add_control(
			'heading', array(
				'label'   => __( 'Heading Title', 'soledad' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Heading Title', 'soledad' ),
			)
		);
		$this->add_control(
			'heading_title_link',
			array(
				'label'       => __( 'Title url', 'soledad' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'soledad' ),
				'separator'   => 'before',
			)
		);

		$this->add_control(
			'add_title_icon', array(
				'label'     => __( 'Add icon for title?', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'soledad' ),
				'label_off' => __( 'Hide', 'soledad' ),
				'default'   => '',
				'separator' => 'before',
			)
		);

		$this->add_control(
			'block_title_icon', array(
				'label'     => __( 'Icon', 'soledad' ),
				'type'      => Controls_Manager::ICON,
				'default'   => 'fas fa-star',
				'condition' => array(
					'add_title_icon' => 'yes'
				),
			)
		);
		$this->add_control(
			'block_title_ialign', array(
				'label'     => __( 'Icon Alignment', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'left',
				'options'   => array(
					'left'  => esc_html__( 'Left', 'soledad' ),
					'right' => esc_html__( 'Right', 'soledad' ),
				),
				'condition' => array(
					'add_title_icon' => 'yes'
				),
			)
		);

		$this->add_control(
			'block_title_align', array(
				'label'   => __( 'Heading Align', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''       => esc_html__( 'Default ( follow Customize )', 'soledad' ),
					'left'   => esc_html__( 'Left', 'soledad' ),
					'center' => esc_html__( 'Center', 'soledad' ),
					'right'  => esc_html__( 'Right', 'soledad' )
				)
			)
		);
		$this->add_control(
			'block_title_marginbt', array(
				'label'     => __( 'Margin Bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-homepage-title' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		$this->end_controls_section();
	}

	public function register_block_title_section_controls_post() {
		$this->start_controls_section(
			'section_title_block',
			array(
				'label' => __( 'Heading Title', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'hide_block_heading', array(
				'label'   => __( 'Hide Heading Title', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'heading_title_style', array(
				'label'   => __( 'Choose Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''   => esc_html__( 'Default ( follow Customize )', 'soledad' ),
					'style-1' => esc_html__( 'Style 1', 'soledad' ),
					'style-2' => esc_html__( 'Style 2', 'soledad' ),
					'style-3' => esc_html__( 'Style 3', 'soledad' ),
					'style-4' => esc_html__( 'Style 4', 'soledad' ),
					'style-5' => esc_html__( 'Style 5', 'soledad' ),
					'style-6' => esc_html__( 'Style 6 - Only Text', 'soledad' ),
					'style-7' => esc_html__( 'Style 7', 'soledad' ),
					'style-9' => esc_html__( 'Style 8', 'soledad' ),
					'style-8' => esc_html__( 'Style 9 - Custom Background Image', 'soledad' ),
					'style-10' => esc_html__( 'Style 10', 'soledad' ),
					'style-11' => esc_html__( 'Style 11', 'soledad' ),
					'style-12' => esc_html__( 'Style 12', 'soledad' ),
					'style-13' => esc_html__( 'Style 13', 'soledad' ),
					'style-14' => esc_html__( 'Style 14', 'soledad' )
				)
			)
		);
		$this->add_control(
			'heading', array(
				'label'   => __( 'Heading Title', 'soledad' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Heading Title', 'soledad' ),
			)
		);
		$this->add_control(
			'heading_title_link',
			array(
				'label'       => __( 'Title url', 'soledad' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'https://your-link.com', 'soledad' ),
			)
		);
		$this->add_control(
			'block_title_align', array(
				'label'   => __( 'Heading Align', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''       => esc_html__( 'Default ( follow Customize )', 'soledad' ),
					'pcalign-left'   => esc_html__( 'Left', 'soledad' ),
					'pcalign-center' => esc_html__( 'Center', 'soledad' ),
					'pcalign-right'  => esc_html__( 'Right', 'soledad' )
				)
			)
		);
		$this->end_controls_section();
	}

	public function register_block_title_style_section_controls() {
		$this->start_controls_section(
			'section_title_block_style',
			array(
				'label' => __( 'Block Heading Title', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'block_title_color', array(
				'label'     => __( 'Title Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow'   => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-border-arrow .inner-arrow a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .home-pupular-posts-title, {{WRAPPER}} .home-pupular-posts-title a' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'block_title_hcolor', array(
				'label'     => __( 'Title Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow a:hover,{{WRAPPER}} .home-pupular-posts-title a:hover' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'block_title_bcolor', array(
				'label'     => __( 'Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow,' .
					'{{WRAPPER}} .style-4.penci-border-arrow .inner-arrow:before,' .
					'{{WRAPPER}} .style-4.penci-border-arrow .inner-arrow:after,' .
					'{{WRAPPER}} .style-5.penci-border-arrow,' .
					'{{WRAPPER}} .style-7.penci-border-arrow,' .
					'{{WRAPPER}} .style-9.penci-border-arrow' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .penci-border-arrow:before'  => 'border-top-color: {{VALUE}}',
					'{{WRAPPER}} .penci-home-popular-posts'  => 'border-top-color: {{VALUE}}',
				)
			)
		);
		$this->add_control(
			'btitle_outer_bcolor', array(
				'label'     => __( 'Border Outer Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}}  .penci-border-arrow:after' => 'border-color: {{VALUE}};'
				)
			)
		);
		$this->add_control(
			'btitle_style10_btopcolor', array(
				'label'     => __( 'Border Top', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-homepage-title.style-10' => 'border-top-color: {{VALUE}};'
				),
				'condition' => array( 'heading_title_style' => 'style-10' ),
			)
		);

		$this->add_control(
			'btitle_style5_bcolor', array(
				'label'     => __( 'Border Bottom', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-5.penci-border-arrow' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .penci-homepage-title.style-10' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-12.penci-border-arrow' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-11.penci-border-arrow' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-5.penci-border-arrow .inner-arrow' => 'border-bottom-color: {{VALUE}};',
				),
				'condition' => array( 'heading_title_style' => array( 'style-5','style-10','style-11','style-12' ) ),
			)
		);
		$this->add_control(
			'btitle_style78_bcolor', array(
				'label'     => __( 'Border Bottom', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-7.penci-border-arrow .inner-arrow:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .style-9.penci-border-arrow .inner-arrow:before' => 'background-color: {{VALUE}};'
				),
				'condition' => array( 'heading_title_style' => array( 'style-7', 'style-8' ) ),
			)
		);
		$this->add_control(
			'btitle_shapes_color', array(
				'label'     => __( 'Background Shapes', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-13.pcalign-center .inner-arrow:before,{{WRAPPER}} .style-13.pcalign-right .inner-arrow:before' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .style-13.pcalign-center .inner-arrow:after,{{WRAPPER}} .style-13.pcalign-left .inner-arrow:after' => ' border-right-color: {{VALUE}};',
					'{{WRAPPER}} .style-12 .inner-arrow:before,{{WRAPPER}} .style-12.pcalign-right .inner-arrow:after,{{WRAPPER}} .style-12.pcalign-center .inner-arrow:after' => ' border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-11 .inner-arrow:after,{{WRAPPER}} .style-11 .inner-arrow:before' => ' border-top-color: {{VALUE}};'
				),
				'condition' => array( 'heading_title_style' => array( 'style-13','style-11','style-12' ) ),
			)
		);
		$this->add_control(
			'btitle_bgcolor', array(
				'label'     => __( 'Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-2.penci-border-arrow:after' => 'border-color: transparent;border-top-color: {{VALUE}};',
					'{{WRAPPER}} .style-14 .inner-arrow:before,{{WRAPPER}} .style-11 .inner-arrow,' .
					'{{WRAPPER}} .style-12 .inner-arrow,{{WRAPPER}} .style-13 .inner-arrow,' .
					'{{WRAPPER}} .penci-border-arrow .inner-arrow' => 'background-color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'btitle_outer_bgcolor', array(
				'label'     => __( 'Background Outer Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow:after' => 'background-color: {{VALUE}};'
				)
			)
		);

		$this->add_control(
			'btitle_style9_bgimg', array(
				'label'       => __( 'Select Background Image for Style 9', 'soledad' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => array( 'active' => true ),
				'responsive'  => true,
				'render_type' => 'template',
				'selectors'   => array( '{{WRAPPER}} .style-8.penci-border-arrow .inner-arrow' => 'background-image: url("{{URL}}");' ),
				'condition' => array( 'heading_title_style' => 'style-8' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'btitle_typo',
				'label'    => __( 'Block Title Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-border-arrow .inner-arrow',
			)
		);
		$this->end_controls_section();
	}

	protected function register_query_section_controls() {
		$this->start_controls_section(
			'section_query', array(
				'label' => __( 'Query', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT
			)
		);

		$this->add_group_control(
			Group_Control_Posts::get_type(), array(
				'name' => 'posts'
			)
		);

		$this->add_control(
			'posts_per_page', array(
				'label'   => __( 'Posts Per Page', 'soledad' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 10,
			)
		);

		$this->add_control(
			'orderby', array(
				'label'   => __( 'Order By', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'          => __( 'Published Date', 'soledad' ),
					'ID'            => 'Post ID',
					'modified'      => 'Modified Date',
					'title'         => 'Post Title',
					'rand'          => 'Random Posts',
					'comment_count' => 'Comment Count',
					'popular'       => 'Most Viewed Posts All Time',
					'popular7'      => 'Most Viewed Posts Once Weekly',
					'popular_month' => 'Most Viewed Posts Once a Month',
				)
			)
		);

		$this->add_control(
			'order', array(
				'label'   => __( 'Order', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => array(
					'asc'  => __( 'ASC', 'soledad' ),
					'desc' => __( 'DESC', 'soledad' )
				)
			)
		);

		$this->add_control(
			'offset', array(
				'label'       => __( 'Offset', 'soledad' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 0,
				'condition'   => array( 'posts_post_type!' => array( 'by_id', 'current_query' ) ),
				'description' => __( 'Use this setting to skip over posts (e.g. \'2\' to skip over 2 posts).', 'soledad' ),
			)
		);

		Module::add_exclude_controls( $this );

		$this->end_controls_section();
	}
}
