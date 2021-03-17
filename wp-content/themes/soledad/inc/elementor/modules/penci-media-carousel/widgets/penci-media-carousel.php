<?php

namespace PenciSoledadElementor\Modules\PenciMediaCarousel\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use PenciSoledadElementor\Loader;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciMediaCarousel extends Base_Widget {

	public function get_name() {
		return 'penci-media-carousel';
	}

	public function get_script_depends() {
		return array( 'imagesloaded' );
	}

	public function get_title() {
		return esc_html__( 'Penci Advanced Carousel', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-media-carousel';
	}

	public function get_keywords() {
		return array( 'media', 'carousel', 'image', 'video', 'lightbox' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		$this->start_controls_section(
			'section_slides', array(
				'label' => esc_html__( 'Slides', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'type', array(
				'type'        => Controls_Manager::CHOOSE,
				'label'       => __( 'Type', 'soledad' ),
				'default'     => 'image',
				'options'     => array(
					'image' => array(
						'title' => __( 'Image', 'soledad' ),
						'icon'  => 'eicon-image-bold'
					),
					'video' => array(
						'title' => __( 'Video', 'soledad' ),
						'icon'  => 'eicon-video-camera'
					)
				),
				'label_block' => false,
				'toggle'      => false,
			)
		);

		$repeater->add_control(
			'image', array(
				'label' => __( 'Image', 'soledad' ),
				'type'  => Controls_Manager::MEDIA
			)
		);
		$repeater->add_control(
			'image_link_to_type', array(
				'label'     => __( 'Link', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					''       => __( 'None', 'soledad' ),
					'file'   => __( 'Media File', 'soledad' ),
					'custom' => __( 'Custom URL', 'soledad' )
				),
				'condition' => array( 'type' => 'image' )
			)
		);

		$repeater->add_control(
			'image_link_to', array(
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'soledad' ),
				'condition'   => array(
					'type'               => 'image',
					'image_link_to_type' => 'custom'
				),
				'separator'   => 'none',
				'show_label'  => false
			)
		);

		$repeater->add_control(
			'video', array(
				'label'         => __( 'Video Link', 'soledad' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'Enter your video link', 'soledad' ),
				'description'   => __( 'YouTube or Vimeo link', 'soledad' ),
				'show_external' => false,
				'condition'     => array( 'type' => 'video' )
			)
		);

		$repeater->add_control(
			'title_text', array(
				'label'       => __( 'Title', 'soledad' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'This is the heading', 'elementor' ),
				'placeholder' => __( 'Enter your title', 'elementor' ),
				'label_block' => true,
				'separator' => 'before',
			)
		);
		$repeater->add_control(
			'description_text', array(
				'label'       => __( 'Description', 'soledad' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
				'placeholder' => __( 'Enter your description', 'elementor' ),
				'separator'   => 'none',
			)
		);

		$this->add_control(
			'slides', array(
				'label'     => __( 'Slides', 'soledad' ),
				'type'      => Controls_Manager::REPEATER,
				'fields'    => $repeater->get_controls(),
				'default'   => array(
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
					),
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
					),
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
					),
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
					),
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
					),
					array(
						'image'            => array( 'url' => Utils::get_placeholder_image_src() ),
						'title_text'       => 'This is the heading',
						'description_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
					),
				),
				'separator' => 'after',
			)
		);

		$this->add_control(
			'slides_item_gap', array(
				'label'   => __( 'Gap', 'soledad' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 10,
			)
		);
		$slides_per_view = range( 1, 10 );
		$slides_per_view = array_combine( $slides_per_view, $slides_per_view );
		$this->add_responsive_control(
			'slides_per_view', array(
				'type'               => Controls_Manager::SELECT,
				'label'              => __( 'Slides Per View', 'soledad' ),
				'options'            => $slides_per_view,
				'frontend_available' => true,
				'separator'          => 'before',
				'default'            => '3',
				'tablet_default'     => '2',
				'mobile_default'     => '1',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_options',
			array(
				'label' => __( 'Addtional Options', 'soledad' ),
				'type'  => Controls_Manager::SECTION,
			)
		);

		$this->add_control(
			'autoplay', array(
				'label'   => __( 'Autoplay', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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
		$this->add_control(
			'image_size', array(
				'label'     => __( 'Image size', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'separator' => 'before',
				'options'   => $this->get_list_image_sizes( true ),
			)
		);

		$this->add_control(
			'image_fit', array(
				'label'     => __( 'Image Fit', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''        => __( 'Cover', 'soledad' ),
					'contain' => __( 'Contain', 'soledad' ),
					'auto'    => __( 'Auto', 'soledad' )
				),
				'selectors' => array( '{{WRAPPER}} .penci-media-item .penci-image-holder' => 'background-size: {{VALUE}}' )
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content', array(
				'label' => __( 'Content', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE
			)
		);

		$this->add_responsive_control(
			'text_align', array(
				'label'     => __( 'Alignment', 'elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => __( 'Left', 'elementor-pro' ),
						'icon'  => 'fa fa-align-left'
					),
					'center' => array(
						'title' => __( 'Center', 'elementor-pro' ),
						'icon'  => 'fa fa-align-center'
					),
					'right'  => array(
						'title' => __( 'Right', 'elementor-pro' ),
						'icon'  => 'fa fa-align-right'
					)
				),
				'selectors' => array(
					'{{WRAPPER}} .penci-media-carousels .penci-media-content' => 'text-align: {{VALUE}};'
				)
			)
		);

		$this->add_control(
			'heading_title', array(
				'label'     => __( 'Title', 'elementor' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_responsive_control(
			'title_top_space', array(
				'label'     => __( 'Spacing', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-media-carousels .penci-media-title' => 'margin-top: {{SIZE}}{{UNIT}};'
				)
			)
		);

		$this->add_control(
			'title_color', array(
				'label'     => __( 'Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-media-carousels .penci-media-title' => 'color: {{VALUE}};'
				)
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .penci-media-carousels .penci-media-title'
			)
		);

		$this->add_control(
			'heading_description', array(
				'label'     => __( 'Description', 'elementor' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			)
		);
		$this->add_responsive_control(
			'desc_top_space', array(
				'label'     => __( 'Spacing', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-media-carousels .penci-media-desc' => 'margin-top: {{SIZE}}{{UNIT}};'
				)
			)
		);
		$this->add_control(
			'description_color', array(
				'label'     => __( 'Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-media-carousels .penci-media-desc' => 'color: {{VALUE}};'
				)
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .penci-media-carousels .penci-media-desc'
			)
		);

		$this->end_controls_section();
	}

	protected function get_repeater_defaults() {
		$placeholder_image_src = Utils::get_placeholder_image_src();

		return array_fill( 0, 5, array(
			'image' => array( 'url' => $placeholder_image_src )
		) );
	}

	/**
	 * Get image sizes.
	 *
	 * Retrieve available image sizes after filtering `include` and `exclude` arguments.
	 */
	public function get_list_image_sizes( $default = false ) {
		$wp_image_sizes = $this->get_all_image_sizes();

		$image_sizes = array();

		if ( $default ) {
			$image_sizes[''] = esc_html__( 'Default', 'soledad' );
		}

		foreach ( $wp_image_sizes as $size_key => $size_attributes ) {
			$control_title = ucwords( str_replace( '_', ' ', $size_key ) );
			if ( is_array( $size_attributes ) ) {
				$control_title .= sprintf( ' - %d x %d', $size_attributes['width'], $size_attributes['height'] );
			}

			$image_sizes[ $size_key ] = $control_title;
		}

		$image_sizes['full'] = esc_html__( 'Full', 'soledad' );

		return $image_sizes;
	}

	public function get_all_image_sizes() {
		global $_wp_additional_image_sizes;

		$default_image_sizes = [ 'thumbnail', 'medium', 'medium_large', 'large' ];

		$image_sizes = [];

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

	protected function render() {
		$settings = $this->get_settings();

		if ( empty( $settings['slides'] ) ) {
			return;
		}

		$css_class = 'penci-block-vc penci-media-carousels';

		$data_slider = $settings['showdots'] ? ' data-dots="true"' : '';
		$data_slider .= ! $settings['shownav'] ? ' data-nav="true"' : '';
		$data_slider .= ! $settings['loop'] ? ' data-loop="true"' : '';
		$data_slider .= ' data-auto="' . ( 'yes' == $settings['autoplay'] ? 'true' : 'false' ) . '"';
		$data_slider .= $settings['auto_time'] ? ' data-autotime="' . $settings['auto_time'] . '"' : '';
		$data_slider .= $settings['speed'] ? ' data-speed="' . $settings['speed'] . '"' : '';


		$data_slider .= ' data-margin="' . ( isset( $settings['slides_item_gap'] ) && $settings['slides_item_gap'] ? $settings['slides_item_gap'] : '10' ) . '"';
		$data_slider .= ' data-item="' . ( isset( $settings['slides_per_view'] ) && $settings['slides_per_view'] ? $settings['slides_per_view'] : '3' ) . '"';
		$data_slider .= ' data-desktop="' . ( isset( $settings['slides_per_view'] ) && $settings['slides_per_view'] ? $settings['slides_per_view'] : '3' ) . '" ';
		$data_slider .= ' data-tablet="' . ( isset( $settings['slides_per_view_tablet'] ) && $settings['slides_per_view_tablet'] ? $settings['slides_per_view_tablet'] : '2' ) . '"';
		$data_slider .= ' data-tabsmall="' . ( isset( $settings['slides_per_view_mobile'] ) && $settings['slides_per_view_mobile'] ? $settings['slides_per_view_mobile'] : '1' ) . '"';
		?>

		<div class="<?php echo esc_attr( $css_class ); ?>">
			<div class="penci-block_content penci-owl-carousel penci-owl-carousel-slider" <?php echo $data_slider; ?>>
				<?php
				$slide_prints_count = 0;
				foreach ( $settings['slides'] as $index => $slide ) {
					$slide_prints_count ++;

					$slide_title = ! empty( $slide['title_text'] ) ? $slide['title_text'] : '';
					$desc_title  = ! empty( $slide['description_text'] ) ? $slide['description_text'] : '';

					$element_key = 'slide-' . $index . '-' . $slide_prints_count;

					$this->add_render_attribute( $element_key . '-image', array(
						'class' => 'penci-image-holder',
						'style' => 'background-image: url(' . $this->get_slide_image_url( $slide, $settings ) . ')',
					) );

					$a_before = $a_after = '';

					$image_link_to = $this->get_image_link_click( $slide );
					if ( $image_link_to && empty( $settings['thumbs_slider'] ) ) {

						if ( 'image' === $slide['type'] ) {
							$this->add_render_attribute( $element_key . '_link', 'href', $image_link_to );

							if ( 'custom' === $slide['image_link_to_type'] ) {
								if ( $slide['image_link_to']['is_external'] ) {
									$this->add_render_attribute( $element_key . '_link', 'target', '_blank' );
								}

								if ( $slide['image_link_to']['nofollow'] ) {
									$this->add_render_attribute( $element_key . '_link', 'nofollow', '' );
								}
							} else {

								if ( Loader::elementor()->editor->is_edit_mode() ) {
									$this->add_render_attribute( $element_key . '_link', [
										'class' => 'elementor-clickable',
									] );
								}
							}


						} else if ( 'video' === $slide['type'] && $slide['video']['url'] ) {
							$this->add_render_attribute( $element_key . '_link', 'class', 'penci-other-layouts-lighbox' );
							$this->add_render_attribute( $element_key . '_link', 'href', $slide['video']['url'] );
						}

						$a_before = '<a ' . $this->get_render_attribute_string( $element_key . '_link' ) . '>';
						$a_after  = '</a>';
					}

					?>
					<div class="penci-media-item">
						<?php echo $a_before; ?>
						<div <?php echo $this->get_render_attribute_string( $element_key . '-image' ); ?>>
							<?php
							if ( 'video' === $slide['type'] ) {
								echo '<div class="overlay-icon-format lager-size-icon">';
								penci_fawesome_icon( 'fas fa-play' );
								echo '</div>';
							}
							?>
						</div>
						<?php echo $a_after; ?>
						<?php if ( $slide_title || $desc_title ) : ?>
							<div class="penci-media-content">
								<?php if ( $slide_title ): ?>
									<h3 class="penci-media-title"><?php echo $slide_title; ?></h3>
								<?php endif; ?>
								<?php if ( $desc_title ): ?>
									<div class="penci-media-desc"><?php echo $desc_title ?></div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
					<?php
				}
				?>
			</div>
		</div>

		<?php
	}

	protected function get_slide_image_url( $slide, array $settings ) {
		$image_url = '';

		if ( ! $image_url ) {
			$image_url = $slide['image']['url'];
		}

		return $image_url;
	}

	protected function get_image_link_click( $slide ) {
		if ( $slide['video']['url'] ) {
			return $slide['image']['url'];
		}

		if ( ! $slide['image_link_to_type'] ) {
			return '';
		}

		if ( 'custom' === $slide['image_link_to_type'] ) {
			return $slide['image_link_to']['url'];
		}

		return $slide['image']['url'];
	}
}
