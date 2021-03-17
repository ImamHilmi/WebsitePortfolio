<?php

namespace PenciSoledadElementor\Modules\PenciTestimonials\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciTestimonials extends Base_Widget {

	public function get_name() {
		return 'penci-testimonials';
	}

	public function get_title() {
		return esc_html__( 'Penci Testimonials', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-review';
	}

	public function get_keywords() {
		return array( 'testimonials' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		$this->start_controls_section(
			'section_testimonails', array(
				'label' => esc_html__( 'Testimonials', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'style', array(
				'label'   => __( 'Choose Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1' => esc_html__( 'Style 1', 'soledad' ),
					's2' => esc_html__( 'Style 2', 'soledad' ),
					's3' => esc_html__( 'Style 3', 'soledad' )
				)
			)
		);

		$this->add_control(
			'_image_width_height', array(
				'label'     => __( 'Image With/Height', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-testi-avatar' => 'width: {{SIZE}}px;height: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'_desc_width', array(
				'label'     => __( 'Description Width', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-testi-blockquote' => 'width: {{SIZE}}px;margin-left:auto;margin-right:auto;' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'testi_name', array(
				'label'   => __( 'Custom Name', 'soledad' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Testimonail #1', 'soledad' ),
			)
		);
		$repeater->add_control(
			'testi_image',
			array(
				'label'   => __( 'Choose Avatar', 'soledad' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array( 'url' => Utils::get_placeholder_image_src() ),
			)
		);
		$repeater->add_control(
			'testi_company', array(
				'label' => __( 'Company/Position', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'testi_desc', array(
				'label'   => __( 'Description', 'soledad' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'I am text block. Click edit button to change this text.', 'soledad' ),
			)
		);
		$repeater->add_control(
			'testi_rating', array(
				'label'   => __( 'Rating', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5
				),
				'default' => '5',
			)
		);

		$this->add_control(
			'testimonails', array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'testi_name'    => 'Testimonail #1',
						'testi_image'   => array( 'url' => Utils::get_placeholder_image_src() ),
						'testi_desc'    => 'I am text block. Click edit button to change this text.',
						'testi_company' => 'Company/Position',
						'testi_link'    => '#'
					),
					array(
						'testi_name'    => 'Testimonail #2',
						'testi_image'   => array( 'url' => Utils::get_placeholder_image_src() ),
						'testi_desc'    => 'I am text block. Click edit button to change this text.',
						'testi_company' => 'Company/Position',
						'testi_link'    => '#'
					),
					array(
						'testi_name'    => 'Testimonail #3',
						'testi_image'   => array( 'url' => Utils::get_placeholder_image_src() ),
						'testi_desc'    => 'I am text block. Click edit button to change this text.',
						'testi_company' => 'Company/Position',
						'testi_link'    => '#'
					),
				),
				'title_field' => '{{{ name }}}',
			)
		);

		$this->add_control(
			'slider_item', array(
				'label'     => __( 'Slides Per View', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '1',
				'options'   => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'separator' => 'before',
			)
		);

		$this->add_control(
			'p_name_marbottom', array(
				'label'     => __( 'Name Margin Top', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-testi-name' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'p_company_marbottom', array(
				'label'     => __( 'Company/Position Margin Top', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-testi-company' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'p_rating_marbottom', array(
				'label'     => __( 'Rating Margin Top', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-testi-rating' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'p_desc_marbottom', array(
				'label'     => __( 'Description Margin Top', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-testi-blockquote' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'p_desc_padding', array(
				'label'     => __( 'Description Padding', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-testi-blockquote' => 'padding: {{SIZE}}px' ),
			)
		);

		$this->end_controls_section();

		// Options slider
		$this->start_controls_section(
			'section_slider_options', array(
				'label' => __( 'Slider Options', 'soledad' ),
			)
		);
		$this->add_control(
			'autoplay', array(
				'label'   => __( 'Autoplay', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			)
		);
		$this->add_control(
			'loop', array(
				'label'   => __( 'Slider Loop', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'auto_time', array(
				'label'   => __( 'Slider Auto Time (at x seconds)', 'soledad' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4000,
			)
		);
		$this->add_control(
			'speed', array(
				'label'   => __( 'Slider Speed (at x seconds)', 'soledad' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 800,
			)
		);
		$this->add_control(
			'shownav', array(
				'label'   => __( 'Show next/prev buttons', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'showdots', array(
				'label' => __( 'Show dots navigation', 'soledad' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->end_controls_section();
		// Options colors
		$this->start_controls_section(
			'section_style_content',
			array(
				'label' => __( 'Content', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'icon_quote_color',
			array(
				'label'     => __( 'Icon Block Quote Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-testimonail .penci-testi-bq-icon:before' => 'color: {{VALUE}}; border-color:{{VALUE}};' ),
			)
		);
		$this->add_control(
			'icon_quote_bgcolor',
			array(
				'label'     => __( 'Icon Block Quote Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-testimonail .penci-testi-bq-icon:before' => 'background-color: {{VALUE}} ;' ),
				'condition' => array( 'style' => array( 's1' ) ),
			)
		);
		$this->add_control(
			'name_color',
			array(
				'label'     => __( 'Name Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-testi-name' => 'color: {{VALUE}} ;' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'name_typo',
				'label'    => __( 'Typography for Name', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-testi-name',
			)
		);

		$this->add_control(
			'company_color',
			array(
				'label'     => __( 'Company/Position Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-testi-company' => 'color: {{VALUE}} ;' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'company_typo',
				'label'    => __( 'Typography for Company/Position', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-testi-company',
			)
		);

		$this->add_control(
			'desc_color',
			array(
				'label'     => __( 'Description Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-testi-blockquote' => 'color: {{VALUE}} ;' ),
			)
		);
		$this->add_control(
			'desc_bgcolor',
			array(
				'label'     => __( 'Description Backgroung Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-testi-blockquote' => 'background-color: {{VALUE}} ;border-color: {{VALUE}} ;' ),
				'condition' => array( 'style' => array( 's1', 's2' ) ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'desc_typo',
				'label'    => __( 'Typography for Description', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-testi-blockquote',
			)
		);

		$this->add_control(
			'rating_color',
			array(
				'label'     => __( 'Rating Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-testi-rating' => 'color: {{VALUE}} ;' ),
			)
		);
		$this->add_responsive_control(
			'rating_size', array(
				'label'     => __( 'Font size for Rating', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-testi-rating' => 'font-size: {{SIZE}}px' ),
			)
		);

		// Slider
		$this->add_control(
			'heading_slider_style',
			array(
				'label' => __( 'Slider', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'slider_dot_color',
			array(
				'label'     => __( 'Dots Navigation Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .owl-dot span' => 'background-color: {{VALUE}};border-color: {{VALUE}};opacity: 1;',
				),
			)
		);
		$this->add_control(
			'slider_dot_hcolor',
			array(
				'label'     => __( 'Dots Navigation Active Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .owl-dot.hover span,{{WRAPPER}} .owl-dot.active span' => 'background-color: {{VALUE}};border-color: {{VALUE}};opacity: 1;' ),
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		if ( ! $settings['testimonails'] ) {
			return;
		}
		$css_class = 'penci-block-vc penci-testimonails';
		$css_class .= ' penci-testi-' . $settings['style'];


		$data_slider = $settings['showdots'] ? ' data-dots="true"' : '';
		$data_slider .= ! $settings['shownav'] ? ' data-nav="true"' : '';
		$data_slider .= ! $settings['loop'] ? ' data-loop="true"' : '';

		$data_slider .= 'data-auto="' . ( 'yes' == $settings['autoplay'] ? 'true' : 'false' ) . '"';
		$data_slider .= 'data-autotime="' . ( $settings['auto_time'] ? intval( $settings['auto_time'] ) : '4000' ) . '"';
		$data_slider .= 'data-speed="' . ( $settings['speed'] ? intval( $settings['speed'] ) : '800' ) . '"';

		$data_slider .= ' data-desktop="' . $settings['slider_item'] . '"';
		$data_slider .= ' data-margin="30"';
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<div class="penci-block_content penci-owl-carousel penci-owl-carousel-slider" <?php echo $data_slider; ?>>
				<?php
				foreach ( (array) $settings['testimonails'] as $_testi ) {
					$_testi_image   = isset( $_testi['testi_image'] ) ? $_testi['testi_image'] : '';
					$_testi_name    = isset( $_testi['testi_name'] ) ? $_testi['testi_name'] : '';
					$_testi_company = isset( $_testi['testi_company'] ) ? $_testi['testi_company'] : '';
					$_testi_desc    = isset( $_testi['testi_desc'] ) ? $_testi['testi_desc'] : '';
					$_testi_link    = isset( $_testi['testi_link'] ) ? $_testi['testi_link'] : '';
					$_testi_rating  = isset( $_testi['testi_rating'] ) ? $_testi['testi_rating'] : '';

					if ( $_testi_name || $_testi_company || $_testi_desc ) {
						?>
						<div class="penci-testimonail">
							<?php

							if ( 's2' == $settings['style'] ) {
								if ( $_testi_desc ) {
									echo '<div class="penci-testi-blockquote">';
									echo '<div class="penci-testi-bq-inner"><span class="penci-testi-bq-icon"></span><span>' . $_testi_desc . '</span></div>';

									if ( $_testi_rating ) {
										$rating_item = '';
										for ( $i = 1; $i <= $_testi_rating; $i ++ ) {
											$rating_item .=  penci_icon_by_ver('fas fa-star');
										}

										if ( $rating_item ) {
											echo '<div class="penci-testi-rating">' . $rating_item . '</div>';
										}
									}

									echo '</div>';
								}


							} else {
								if ( $_testi_desc ) {
									echo '<div class="penci-testi-blockquote"><div class="penci-testi-bq-inner"><span class="penci-testi-bq-icon"></span><span>' . $_testi_desc . '</span></div></div>';
								}

								if ( $_testi_rating ) {
									$rating_item = '';
									for ( $i = 1; $i <= $_testi_rating; $i ++ ) {
										$rating_item .= penci_icon_by_ver('fas fa-star');
									}

									if ( $rating_item ) {
										echo '<div class="penci-testi-rating">' . $rating_item . '</div>';
									}
								}
							}

							$url_img_item = $this->get_marker_img_el( $_testi_image );
							if ( $url_img_item ) {
								echo '<div class="penci-testi-avatar">';
								echo '<img src="' . esc_url( $url_img_item ) . '" alt="' . esc_attr( $_testi_name ) . '"/>';
								echo '</div>';
							}

							echo '<h3 class="penci-testi-name">' . $_testi_name . '</h3>';
							echo '<div class="penci-testi-company">' . $_testi_company . '</div>';
							?>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
		<?php
	}

	public function get_marker_img_el( $image, $thumbnail_size = 'thumbnail' ) {
		if ( empty( $image['url'] ) ) {
			return '';
		}
		if ( ! empty( $image['id'] ) ) {
			$attr = wp_get_attachment_image_src( $image['id'], $thumbnail_size );
			if ( isset( $attr['url'] ) && $attr['url'] ) {
				$image['url'] = $attr['url'];
			}
		}

		return $image['url'];
	}
}
