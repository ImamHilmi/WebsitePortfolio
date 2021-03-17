<?php

namespace PenciSoledadElementor\Modules\PenciInfoBox\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Group_Control_Typography;
use Elementor\Controls_Manager;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciInfoBox extends Base_Widget {

	public function get_name() {
		return 'penci-info-box';
	}

	public function get_title() {
		return esc_html__( 'Penci Info Box', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	public function get_keywords() {
		return array( 'icon', 'box', 'info box', 'icon box' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		$this->start_controls_section(
			'section_icon', array(
				'label' => __( 'Info Box', 'soledad' ),
			)
		);
		$this->add_control(
			'icon_type', array(
				'label'   => __( 'Icon type', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'icon'  => __( 'Icon', 'soledad' ),
					'image' => __( 'Image', 'soledad' ),
				),
				'default' => 'icon',
			)
		);
		$this->add_control(
			'icon', array(
				'label'     => __( 'Icon', 'soledad' ),
				'type'      => Controls_Manager::ICON,
				'default'   => 'fas fa-star',
				'condition' => array( 'icon_type' => 'icon' ),
			)
		);
		$this->add_control(
			'icon_view', array(
				'label'     => __( 'View', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'default',
				'condition' => array( 'icon_type' => 'icon' ),
				'options'   => array(
					'default' => esc_html__( 'Default', 'soledad' ),
					'stacked' => esc_html__( 'Stacked', 'soledad' ),
					'framed'  => esc_html__( 'Framed', 'soledad' )
				)
			)
		);
		$this->add_control(
			'icon_shape', array(
				'label'     => __( 'Shape', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'circle',
				'condition' => array( 'icon_view' => array( 'stacked', 'framed' ) ),
				'options'   => array(
					'circle' => esc_html__( 'Circle', 'soledad' ),
					'square' => esc_html__( 'Square', 'soledad' )
				),
			)
		);

		$this->add_control(
			'icon_hover_animation', array(
				'label'     => __( 'Hover Animation', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'condition' => array( 'icon_view' => array( 'stacked', 'framed' ) ),
				'options'   => array(
					''             => esc_html__( 'None', 'soledad' ),
					'grow'         => esc_html__( 'Grow', 'soledad' ),
					'shrink'       => esc_html__( 'Shrink', 'soledad' ),
					'pulse'        => esc_html__( 'Pulse', 'soledad' ),
					'pulse-grow'   => esc_html__( 'Pulse Grow', 'soledad' ),
					'pulse-shrink' => esc_html__( 'Pulse Shrink', 'soledad' ),
					'push'         => esc_html__( 'Push', 'soledad' ),
					'pop'          => esc_html__( 'Pop', 'soledad' ),
					'custom-1'     => esc_html__( 'Custom Style 1', 'soledad' ),
					'custom-2'     => esc_html__( 'Custom Style 2', 'soledad' ),
					'custom-3'     => esc_html__( 'Custom Style 3', 'soledad' ),
					'custom-4'     => esc_html__( 'Custom Style 4', 'soledad' ),
					'custom-5'     => esc_html__( 'Custom Style 5', 'soledad' )
				),
			)
		);

		$this->add_control(
			'image',
			array(
				'label'     => __( 'Choose Image', 'soledad' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array( 'url' => Utils::get_placeholder_image_src() ),
				'condition' => array( 'icon_type' => 'image' ),
			)
		);
		$this->add_control(
			'image_hover',
			array(
				'label'     => __( 'Choose Image Hover', 'soledad' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => array( 'icon_type' => 'image' ),
			)
		);

		$this->add_control(
			'icon_position', array(
				'label'   => __( 'Icon position', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'top-left'    => __( 'Top left', 'soledad' ),
					'top-center'  => __( 'Top center', 'soledad' ),
					'top-right'   => __( 'Top right', 'soledad' ),
					'float-left'  => __( 'Float left', 'soledad' ),
					'float-right' => __( 'Float right', 'soledad' ),
				),
				'default' => 'float-left',
			)
		);


		$this->add_control(
			'title_text', array(
				'label'       => __( 'Title', 'soledad' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'This is the heading', 'soledad' ),
				'placeholder' => __( 'Enter your title', 'soledad' ),
				'label_block' => true,
				'separator'   => 'before',
			)
		);
		$this->add_control(
			'_use_line', array(
				'label'     => __( 'Use Line Below The Title', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
			)
		);
		$this->add_control(
			'pline_height', array(
				'label'     => __( 'Custom Height of Line', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}}  .penci-ibox-line' => 'height: {{SIZE}}px' ),
				'condition' => array( '_use_line!' => '' ),
			)
		);
		$this->add_control(
			'pline_width', array(
				'label'     => __( 'Custom Width of Line', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}}  .penci-ibox-line' => 'width: {{SIZE}}px' ),
				'condition' => array( '_use_line!' => '' ),
			)
		);

		$this->add_control(
			'description_text', array(
				'label'       => '',
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'soledad' ),
				'placeholder' => __( 'Enter your description', 'soledad' ),
				'rows'        => 10,
				'separator'   => 'none',
				'show_label'  => false,
			)
		);

		$this->add_control(
			'link', array(
				'label'       => __( 'Link', 'soledad' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'soledad' ),
				'separator'   => 'before',
			)
		);
		$this->add_control(
			'icon_width', array(
				'label'     => __( 'Custom Width/Height for Icon', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'condition' => array( 'icon_type' => 'icon' ),
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-ibox-top-right .penci-ibox-icon'     => 'float:right;',
					'{{WRAPPER}} .penci-ibox-top-center .penci-ibox-icon'   => 'margin-left: auto;margin-right: auto;',
					'{{WRAPPER}} .penci-icon-box.penci-ibox-float-left .penci-ibox-inner'  => 'padding-left: calc( {{SIZE}}px + 30px );',
					'{{WRAPPER}} .penci-icon-box.penci-ibox-float-right .penci-ibox-inner' => 'padding-right: calc( {{SIZE}}px + 30px );',
					'{{WRAPPER}} .penci-ibox-icon'                                         => 'width: {{SIZE}}px;height:{{SIZE}}px;display: flex; align-items: center; justify-content: center;',
					'{{WRAPPER}} .penci-icon-box.penci-ibox-float-left .penci-ibox-icon'   => 'max-width: {{SIZE}}px',
					'{{WRAPPER}} .penci-icon-box.penci-ibox-float-right .penci-ibox-icon'  => 'max-width: {{SIZE}}px',
				),
			)
		);
		$this->add_control(
			'icon_marbt', array(
				'label'     => __( 'Custom Margin Bottom for Icon or Image', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-ibox-icon' => 'margin-bottom: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'title_paddingtop', array(
				'label'     => __( 'Custom Padding Top for Title', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-ibox-title' => 'padding-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'title_marbt', array(
				'label'     => __( 'Custom Margin Bottom for Title', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-ibox-title' => 'margin-bottom: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'desc_martop', array(
				'label'     => __( 'Custom Margin Top for Description', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-ibox-content' => 'margin-top: {{SIZE}}px' ),
			)
		);


		$this->end_controls_section();

		// Design
		$this->start_controls_section(
			'section_design_content',
			array(
				'label' => __( 'Info Box', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'ptitle_style',
			array(
				'label' => __( 'Title', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-ibox-title' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'title_typo',
				'label'    => __( 'Title Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-ibox-title',
			)
		);
		$this->add_control(
			'_line_color',
			array(
				'label'     => __( 'Line Below The Title Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-ibox-line' => 'background-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'pdesc_style',
			array(
				'label' => __( 'Description', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'desc_color',
			array(
				'label'     => __( 'Description Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-ibox-content' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'desc_typo',
				'label'    => __( 'Description Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-ibox-content',
			)
		);
		$this->add_control(
			'picon_style',
			array(
				'label' => __( 'Icon', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'picon_color',
			array(
				'label'     => __( 'Icon Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-ibox-icon, {{WRAPPER}} .penci-ibox-icon a' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'picon_bgcolor',
			array(
				'label'     => __( 'Icon Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'icon_view' => array( 'stacked', 'framed' ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-view-stacked .penci-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-framed .penci-icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-3:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-4:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-5:after' => 'background-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'picon_border_color',
			array(
				'label'     => __( 'Icon Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'icon_view' => array( 'stacked', 'framed' ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-view-stacked .penci-icon' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-framed .penci-icon' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-3' => 'box-shadow: inset 0 0 0 3px {{VALUE}}',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-4' => 'box-shadow: inset 0 0 0 3px {{VALUE}}',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-5' => 'box-shadow: inset 0 0 0 3px {{VALUE}}',
					'{{WRAPPER}} .penci-view-framed .penci-animation-custom-2:after' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .penci-view-framed .penci-animation-custom-5:after' => 'border-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'picon_hcolor',
			array(
				'label'     => __( 'Icon Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-ibox-icon:hover, {{WRAPPER}} .penci-ibox-icon:hover a' => 'color: {{VALUE}} !important;' ),
			)
		);
		$this->add_control(
			'picon_hbgcolor',
			array(
				'label'     => __( 'Icon Hover Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'icon_view' => array( 'stacked', 'framed' ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-view-stacked .penci-icon:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-framed .penci-icon:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-3:hover:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-4:hover:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-5:hover:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-framed .penci-animation-custom-1:after' => 'background-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'picon_border_hcolor',
			array(
				'label'     => __( 'Icon Hover Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'icon_view' => array( 'stacked', 'framed' ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-view-stacked .penci-icon:hover'         => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-framed .penci-icon:hover'          => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-2:after'       => 'box-shadow: 0 0 0 3px {{VALUE}};',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-1:after'       => 'box-shadow: 0 0 0 3px {{VALUE}};',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-3:hover' => 'box-shadow: inset 0 0 0 3px {{VALUE}}',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-4:hover' => 'box-shadow: inset 0 0 0 3px {{VALUE}}',
					'{{WRAPPER}} .penci-view-stacked .penci-animation-custom-5:hover' => 'box-shadow: inset 0 0 0 3px {{VALUE}}',
					'{{WRAPPER}} .penci-view-framed .penci-animation-custom-2:hover:after' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .penci-view-framed .penci-animation-custom-5:hover:after' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .penci-view-framed .penci-animation-custom-5:hover' => 'box-shadow: 0 0 0 6px {{VALUE}}',
				),
			)
		);
		$this->add_responsive_control(
			'picon_fsize', array(
				'label'     => __( 'Font size for Icon', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-ibox-icon--icon' => 'font-size: {{SIZE}}px' ),
			)
		);


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$block_id = 'penci_info_box_' . rand( 1000, 100000 );
		$css_class = 'penci-block-vc penci-info-box';
		$css_class .= $settings['icon_position'] ? ' penci-ibox-' . $settings['icon_position'] : 'penci-ibox-float-left';
		$css_class .= $settings['icon_view'] ? ' penci-view-' . $settings['icon_view'] : '';
		$css_class .= $settings['icon_shape'] ? ' penci-shape-' . $settings['icon_shape'] : '';


		$a_before = '<span class="penci-ibox-icon-fa">';
		$a_after  = '</span>';

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'link', 'href', $settings['link']['url'] );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
			}

			if ( $settings['link']['nofollow'] ) {
				$this->add_render_attribute( 'link', 'rel', 'nofollow' );
			}

			$a_before = '<a class="penci-ibox-icon-fa-fix" ' . $this->get_render_attribute_string( 'link' ) . '></a>';
			$a_before .= '<a class="penci-ibox-icon-fa" ' . $this->get_render_attribute_string( 'link' ) . '>';
			$a_after  = '</a>';
		}
		?>
		<div id="<?php echo esc_attr( $block_id ) ?>" class="<?php echo esc_attr( $css_class ); ?>">
			<div class="penci-ibox-inner">
				<?php
				if ( 'icon' == $settings['icon_type'] ) {
					echo '<div class="penci-ibox-icon penci-ibox-icon--icon penci-icon ' . ( $settings['icon_hover_animation'] ? 'penci-animation-' . $settings['icon_hover_animation'] : '' ) . '">';
					echo $a_before;

					$this->add_render_attribute( 'i', 'class', 'penci-ibox-icon--i ' . $settings['icon'] );
					$this->add_render_attribute( 'i', 'aria-hidden', 'true' );
					echo '<i ' . $this->get_render_attribute_string( 'i' ) . '></i>';

					echo $a_after;
					echo '</div>';
				} elseif ( $settings['image'] ) {
					$image_src = '';
					if( isset( $settings['image']['id'] ) && $settings['image']['id'] ){
						$image_src = wp_get_attachment_url( $settings['image']['id'] );
					}
					if ( ! $image_src && isset( $settings['image']['url'] ) ) {
						$image_src = $settings['image']['url'];
					}

					echo '<div class="penci-ibox-icon penci-ibox-icon--image">';
					echo $a_before;
					echo '<img class="' . ( $settings['image_hover'] ? 'penci-ibox-img_active' : '' ) . '" src="' . esc_url( $image_src ) . '">';

					if ( $settings['image_hover'] ) {
						$image_hover_src = '';
						if( isset( $settings['image_hover']['id'] ) && $settings['image_hover']['id'] ){
							$image_hover_src = wp_get_attachment_url( $settings['image_hover']['id'] );
						}
						if ( ! $image_src && isset( $settings['image_hover']['url'] ) ) {
							$image_hover_src = $settings['image_hover']['url'];
						}

						echo '<img class="penci-ibox-img_hover" src="' . esc_url( $image_hover_src ) . '">';
					}

					echo $a_after;
					echo '</div>';
				}
				?>
				<div class="penci-ibox-content">
					<?php if( $settings['title_text'] ): ?><h3 class="penci-ibox-title"><?php echo $settings['title_text']; ?></h3><?php endif; ?>
					<?php if( $settings['_use_line'] ): ?><span class="penci-ibox-line"></span><?php endif; ?>
					<?php if( $settings['description_text'] ): ?><p class="penci-ibox-content"><?php echo do_shortcode( $settings['description_text'] ); ?></p><?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
}
