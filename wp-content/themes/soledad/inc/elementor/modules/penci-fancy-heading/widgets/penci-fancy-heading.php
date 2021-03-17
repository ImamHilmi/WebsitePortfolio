<?php

namespace PenciSoledadElementor\Modules\PenciFancyHeading\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciFancyHeading extends Base_Widget {

	public function get_name() {
		return 'penci-fancy_heading';
	}

	public function get_title() {
		return esc_html__( 'Penci Fancy Heading', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-t-letter';
	}

	public function get_keywords() {
		return array( 'fancy_heading', 'block', 'penci', 'heading', 'soledad' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'Fancy Heading', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'_text_align', array(
				'label'   => __( 'Text Align', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => array(
					'left'   => esc_html__( 'Left', 'soledad' ),
					'center' => esc_html__( 'Center', 'soledad' ),
					'right'  => esc_html__( 'Right', 'soledad' ),
				),
			)
		);
		// Subtag
		$this->add_control(
			'p_sub_heading',
			array(
				'label' => __( 'Subtitle', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'p_subtitle', array(
				'label'       => __( 'Subtitle Text', 'soledad' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'This is the subtitle', 'soledad' ),
				'placeholder' => __( 'Add Your Subtitle Text Here', 'soledad' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'subtitle_tag', array(
				'label'   => __( 'Subtitle Tag', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				),
				'default' => 'div',
			)
		);
		$this->add_control(
			'subtitle_pos', array(
				'label'   => __( 'Subtitle Position', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'above'     => __( 'Above the title', 'soledad' ),
					'below'     => __( 'Below the title', 'soledad' ),
					'belowline' => __( 'Below the separator', 'soledad' ),
				),
				'default' => 'above',
			)
		);
		$this->add_control(
			'subtitle_margin_top', array(
				'label'     => __( 'Custom Margin Top for Subtitle', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}}  .penci-heading-subtitle' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'subtitle_margin_bottom', array(
				'label'     => __( 'Custom Margin Bottom for Subtitle', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}}  .penci-heading-subtitle' => 'margin-bottom: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'subtitle_width', array(
				'label'     => __( 'Custom Width for Subtitle', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 2000, ) ),
				'selectors' => array( '{{WRAPPER}}  .penci-heading-subtitle' => 'width: {{SIZE}}px' ),
			)
		);

		// Title
		$this->add_control(
			'p_title_heading',
			array(
				'label' => __( 'Title', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'p_title', array(
				'label'       => __( 'Title Text', 'soledad' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'This is the title', 'soledad' ),
				'placeholder' => __( 'Add Your title Text Here', 'soledad' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'title_tag', array(
				'label'   => __( 'Title Tag', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				),
				'default' => 'h2',
			)
		);
		$this->add_control(
			'title_link', array(
				'label'   => __( 'Link', 'soledad' ),
				'type'    => Controls_Manager::URL,
				'dynamic' => array( 'active' => true ),
				'default' => array( 'url' => '' )
			)
		);
		// Line
		$this->add_control(
			'p_separator_heading',
			array(
				'label' => __( 'Separator', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'_use_separator', array(
				'label'     => __( 'Use separator', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
			)
		);
		$this->add_control(
			'separator_style', array(
				'label'     => __( 'Style', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					''       => 'Border',
					'dashed' => 'Dashed',
					'dotted' => 'Dotted',
					'double' => 'Double',
				),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		$this->add_control(
			'add_separator_icon', array(
				'label'     => __( 'Add separator icon?', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
				'condition' => array( 'separator_style!' => 'double', '_use_separator!' => '' ),
			)
		);
		$this->add_control(
			'p_icon', array(
				'label'     => __( 'Icon', 'soledad' ),
				'type'      => Controls_Manager::ICON,
				'default'   => 'fas fa-star',
				'condition' => array( 'add_separator_icon!' => '' ),
			)
		);
		$this->add_control(
			'p_icon_martop', array(
				'label'     => __( 'Margin Top& Bottom for Icon', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}}  .penci-heading-icon' => 'margin-top: {{SIZE}}px;margin-bottom: {{SIZE}}px' ),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		$this->add_control(
			'p_icon_marlr', array(
				'label'     => __( 'Margin Right & Left for Icon', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}}  .penci-heading-icon' => 'margin-left: {{SIZE}}px;margin-right: {{SIZE}}px' ),
				'condition' => array( '_use_separator!' => '' ),
			)
		);

		$this->add_control(
			'separator_border_width', array(
				'label'     => __( 'Separator Border width', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}}  .penci-separator .penci-sep_line'               => 'border-width: {{SIZE}}px;top: calc( -{{SIZE}}px / 2 );',
					'{{WRAPPER}}  .penci-separator.penci-separator-double'        => 'height: {{SIZE}}px;',
					'{{WRAPPER}}  .penci-separator.penci-separator-double:before' => 'height: {{SIZE}}px;',
					'{{WRAPPER}}  .penci-separator.penci-separator-double:after'  => 'border-top-width:: {{SIZE}}px;',
				),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		$this->add_control(
			'separator_width', array(
				'label'     => __( 'Separator width', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 2000, ) ),
				'selectors' => array( '{{WRAPPER}}  .penci-separator' => 'width: {{SIZE}}px' ),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		$this->add_control(
			'separator_margin_top', array(
				'label'     => __( 'Custom margin top for Separator', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}}  .penci-separator' => 'margin-top: {{SIZE}}px' ),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		// Description
		$this->add_control(
			'p_desc_heading',
			array(
				'label' => __( 'Descrition', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'content', array(
				'label'   => __( 'Description', 'soledad' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'soledad' ),
			)
		);
		$this->add_control(
			'content_margin_top', array(
				'label'     => __( 'Custom margin top for Content', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}}  .penci-heading-content' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_responsive_control(
			'content_width', array(
				'label'     => __( 'Custom width for Content', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 2000, ) ),
				'selectors' => array( '{{WRAPPER}}  .penci-heading-content' => 'max-width: {{SIZE}}px;width:100%;' ),
			)
		);

		$this->end_controls_section();

		// Design
		$this->start_controls_section(
			'section_design_content',
			array(
				'label' => __( 'Fancy Heading', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'psubtitle_color',
			array(
				'label'     => __( 'SubTitle Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-heading-subtitle' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'psubtitle_typo',
				'label'    => __( 'SubTitle Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-heading-subtitle',
			)
		);

		// Title
		$this->add_control(
			'ptitle_color',
			array(
				'label'     => __( 'Title Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-heading-title,{{WRAPPER}} .penci-heading-title a' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'ptitle_hcolor',
			array(
				'label'     => __( 'Title Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-heading-title a:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'ptitle_typo',
				'label'    => __( 'Title Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-heading-title',
			)
		);

		$this->add_control(
			'pseparator_color',
			array(
				'label'     => __( 'Separator Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-separator .penci-sep_line' => 'border-color: {{VALUE}};' ),
				'condition' => array( '_use_separator!' => '' ),
			)
		);
		$this->add_control(
			'picon_color',
			array(
				'label'     => __( 'Icon Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-heading-icon' => 'color: {{VALUE}};' ),
				'condition' => array( 'add_separator_icon!' => '' ),
			)
		);
		$this->add_responsive_control(
			'picon_size', array(
				'label'     => __( 'Font size for Icon', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-heading-icon' => 'font-size: {{SIZE}}px' ),
				'condition' => array( 'add_separator_icon!' => '' ),
			)
		);
		// Content
		$this->add_control(
			'pdesc_color',
			array(
				'label'     => __( 'Descrition Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-heading-content' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pdesc_typo',
				'label'    => __( 'Descrition Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-heading-content',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$markup_subtitle = '';
		$subtitle_pos    = $settings['subtitle_pos'];

		if ( $settings['p_subtitle'] ) {
			$markup_subtitle = '<' . esc_attr( $settings['subtitle_tag'] ) . ' class="penci-heading-subtitle">' . $settings['p_subtitle'] . '</' . esc_attr( $settings['subtitle_tag'] ) . '>';
		}
		?>
		<div class="penci-fancy-heading penci-heading-text-<?php echo esc_attr( $settings['_text_align'] ); ?>">
			<div class="penci-fancy-heading-inner">
				<?php

				if ( $markup_subtitle && 'above' == $subtitle_pos ) {
					echo $markup_subtitle;
				}
				if ( $settings['p_title'] ) {

					$title = $settings['p_title'];
					if ( ! empty( $settings['title_link']['url'] ) ) {
						$this->add_render_attribute( 'url', 'href', $settings['title_link']['url'] );

						if ( $settings['title_link']['is_external'] ) {
							$this->add_render_attribute( 'url', 'target', '_blank' );
						}

						if ( ! empty( $settings['title_link']['nofollow'] ) ) {
							$this->add_render_attribute( 'url', 'rel', 'nofollow' );
						}

						$title = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $settings['p_title'] );
					}

					echo '<' . esc_attr( $settings['title_tag'] ) . ' class="penci-heading-title">' . $title . '</' . esc_attr( $settings['title_tag'] ) . '>';
				}

				if ( $markup_subtitle && 'below' == $subtitle_pos ) {
					echo $markup_subtitle;
				}

				if ( $settings['_use_separator'] ) {
					echo '<div class="penci-separator penci-separator-' . esc_attr( $settings['separator_style'] ) . ' penci-separator-' . $settings['_text_align'] . '">';
					echo '<span class="penci-sep_holder penci-sep_holder_l"><span class="penci-sep_line"></span></span>';

					if ( $settings['add_separator_icon'] ) {
						echo '<span class="penci-heading-icon ' . esc_attr( $settings['p_icon'] ? $settings['p_icon'] : 'fa fa-adjust' ) . '"></span>';
					}

					echo '<span class="penci-sep_holder penci-sep_holder_r"><span class="penci-sep_line"></span></span>';
					echo '</div>';
				}

				if ( $markup_subtitle && 'belowline' == $subtitle_pos ) {
					echo $markup_subtitle;
				}

				if ( $settings['content'] ) {
					$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $settings['content'] ) . "\n" );
					$content = do_shortcode( shortcode_unautop( $content ) );

					echo '<div class="penci-heading-content entry-content">' . $content . '</div>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
