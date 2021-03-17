<?php

namespace PenciSoledadElementor\Modules\PenciPricingTable\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Control_Media;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciPricingTable extends Base_Widget {

	public function get_name() {
		return 'penci-pricing-table';
	}

	public function get_title() {
		return esc_html__( 'Penci Pricing Table', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_keywords() {
		return array( 'Pricing', 'Table' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'Pricing Table', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'_design_style', array(
				'label'   => __( 'Choose Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1' => esc_html__( 'Style 1', 'soledad' ),
					's2' => esc_html__( 'Style 2', 'soledad' ),
				)
			)
		);

		$this->add_control(
			'_use_img', array(
				'label'     => esc_html__( 'Use image', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
				'separator' => 'before',
			)
		);

		$this->add_control(
			'_image',
			array(
				'label'     => __( 'Choose Image', 'soledad' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => array( '_use_img' => 'yes' ),
			)
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(), array(
				'name'      => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default'   => 'thumbnail',
				'separator' => 'none',
				'condition' => array( '_use_img' => 'yes' ),
			)
		);

		$this->add_responsive_control(
			'image_width', array(
				'label'     => __( 'Image Width', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 600, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-image' => 'width: {{SIZE}}px;' ),
				'condition' => array( '_use_img' => 'yes' ),
			)
		);
		$this->add_responsive_control(
			'image_height', array(
				'label'     => __( 'Image Height', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-image' => 'height: {{SIZE}}px;' ),
				'condition' => array( '_use_img' => 'yes' ),
			)
		);
		$this->add_responsive_control(
			'image_mar_top', array(
				'label'     => __( 'Image margin top', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-image' => 'margin-top: {{SIZE}}px;' ),
				'condition' => array( '_use_img' => 'yes' )
			)
		);
		$this->add_responsive_control(
			'image_mar_bottom', array(
				'label'     => __( 'Image margin bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-image' => 'margin-bottom: {{SIZE}}px;' ),
				'condition' => array( '_use_img' => 'yes' ),
				'separator' => 'after',
			)
		);
		$this->add_control(
			'_heading', array(
				'label' => __( 'Pricing Name / Title', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'_subheading', array(
				'label' => __( 'Pricing  Subtitle', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'_price', array(
				'label' => __( 'Pricing', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'_unit', array(
				'label' => __( 'Pricing Unit', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'content', array(
				'label'   => '',
				'type'    => Controls_Manager::WYSIWYG,
				'dynamic' => array( 'active' => true )
			)
		);
		$this->add_control(
			'_btn_text', array(
				'label'     => __( 'Button Text', 'soledad' ),
				'type'      => Controls_Manager::TEXT,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'_btn_link',
			array(
				'label'       => __( 'Button Link', 'soledad' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'soledad' ),
				'separator'   => 'after',
			)
		);

		$this->add_control(
			'_featured', array(
				'label'     => esc_html__( 'Make this pricing box as featured', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
				'separator' => 'before',
			)
		);
		$this->add_control(
			'min_height', array(
				'label'     => __( 'Minimum height for pricing item', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-item' => 'min-height: {{SIZE}}px' ),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_content',
			array(
				'label' => __( 'Pricing Table', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'_bg_color', array(
				'label'     => __( 'Background Color for Pricing Table', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-item' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'_pborder_color', array(
				'label'     => __( 'Border Color for Pricing Table', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-item' => 'border-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'title_heading_settings',
			array(
				'label' => __( 'Title', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$this->add_control(
			'_heading_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-title' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => '_heading_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-pricing-title',
			)
		);
		$this->add_responsive_control(
			'_heading_mar_bottom', array(
				'label'     => __( 'Margin Bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-title' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		// Sub title
		$this->add_control(
			'subtitle_heading_settings',
			array(
				'label' => __( 'Subtitle', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'_subheading_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-subtitle' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => '_subheading_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-pricing-subtitle',
			)
		);
		$this->add_responsive_control(
			'_subheading_mar_bottom', array(
				'label'     => __( 'Margin Bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-subtitle' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		// Price title
		$this->add_control(
			'_price_heading_settings',
			array(
				'label' => __( 'Price', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'_price_color', array(
				'label'     => __( 'Price Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-price' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => '_price_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-pricing-price',
			)
		);
		$this->add_responsive_control(
			'_price_mar_bottom', array(
				'label'     => __( 'Margin Bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200 ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-price' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		// Price Unit
		$this->add_control(
			'_unit_heading_settings',
			array(
				'label' => __( 'Price Unit', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'_unit_color', array(
				'label'     => __( 'Price Unit Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-unit' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => '_unit_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-pricing-unit',
			)
		);
		$this->add_responsive_control(
			'_unit_mar_bottom', array(
				'label'     => __( 'Margin Bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-unit' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		// Features
		$this->add_control(
			'features_heading_settings',
			array(
				'label' => __( 'Features', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'features_color', array(
				'label'     => __( 'Features Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing-featured' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'features_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-pricing-featured',
			)
		);
		$this->add_responsive_control(
			'features_mar_bottom', array(
				'label'     => __( 'Margin Bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-featured' => 'margin-bottom: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'item_fea_bottom', array(
				'label'     => __( 'Item of list features margin bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-featured li, .penci-pricing-featured p' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'_ribbon_color', array(
				'label'     => __( 'Ribbon Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-pricing_featured .penci-pricing-ribbon' => 'background-color: {{VALUE}};' ),
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_button',
			array(
				'label' => __( 'Pricing Table Button', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'psubmitbtn_color',
			array(
				'label'     => __( 'Button Text Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'psubmitbtn_bgcolor',
			array(
				'label'     => __( 'Button Background & Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn' => 'background-color: {{VALUE}};border-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'psubmitbtn_hcolor',
			array(
				'label'     => __( 'Button Hover Text Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'psubmitbtn_hbgcolor',
			array(
				'label'     => __( 'Button Background & Border Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn:hover' => 'background-color: {{VALUE}};border-color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'psubmitbtn_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-pricing-btn',
			)
		);

		$this->add_control(
			'btn_mar_top', array(
				'label'     => __( 'Button margin top', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'btn_mar_bt', array(
				'label'     => __( 'Button margin bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'btn_width', array(
				'label'     => __( 'Button width', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn' => 'width: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'btn_height', array(
				'label'     => __( 'Button Height', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pricing-btn' => 'height: {{SIZE}}px;line-height: {{SIZE}}px' ),
			)
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		$class_block = 'penci-block-vc penci-pricing-table penci-pricing-item';
		$class_block .= $settings['_featured'] ? ' penci-pricing_featured' : '';
		$class_block .= $settings['_design_style'] ? ' penci-pricing-' . esc_attr( $settings['_design_style'] ) : '';
		?>
		<div class="<?php echo esc_attr( $class_block ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<?php
			if ( $settings['_featured'] && 's2' == $settings['_design_style'] ) {
				echo '<span class="penci-pricing-ribbon">' . penci_icon_by_ver('fas fa-star') . '</span>';
			}
			?>
			<div class="penci-block_content penci-pricing-inner">
				<?php
				echo '<div class="penci-pricing-header">';
				if ( ! empty( $settings['_image']['url'] ) && $settings['_use_img'] ) {
					$this->add_render_attribute( 'image', 'src', $settings['_image']['url'] );
					$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['_image'] ) );
					$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['_image'] ) );

					echo '<div class="penci-pricing-image">';
					echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', '_image' );
					echo '</div>';

				}
				if ( $settings['_heading'] ) {
					echo '<div class="penci-pricing-title">' . do_shortcode( $settings['_heading'] ) . '</div>';
				}

				if ( $settings['_subheading'] ) {
					echo '<div class="penci-pricing-subtitle">' . do_shortcode( $settings['_subheading'] ) . '</div>';
				}

				echo '</div>';

				if ( $settings['_price'] || $settings['_unit'] ) {
					echo '<div class="penci-price-unit">';

					if ( $settings['_price'] ) {
						echo '<span class="penci-pricing-price">' . do_shortcode( $settings['_price'] ) . '</span>';
					}

					if ( $settings['_unit'] ) {
						echo '<span class="penci-pricing-unit">' . do_shortcode( $settings['_unit'] ) . '</span>';
					}

					echo '</div>';
				}

				if ( $settings['content'] ) {
					$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $settings['content'] ) . "\n" );
					$content = do_shortcode( shortcode_unautop( $content ) );


					echo '<div class="penci-pricing-featured">' . $content . '</div>';
				}

				echo '<div class="penci-pricing-footer">';

				if ( $settings['_btn_text'] ) {

					$a_before = '<span class="penci-pricing-btn button">';
					$a_after  = '</span>';

					if ( ! empty( $settings['_btn_link']['url'] ) ) {
						$this->add_render_attribute( '_btn_link', 'href', $settings['_btn_link']['url'] );

						if ( $settings['_btn_link']['is_external'] ) {
							$this->add_render_attribute( '_btn_link', 'target', '_blank' );
						}

						if ( $settings['_btn_link']['nofollow'] ) {
							$this->add_render_attribute( '_btn_link', 'rel', 'nofollow' );
						}

						$a_before = '<a class="penci-pricing-btn  penci-button" ' . $this->get_render_attribute_string( '_btn_link' ) . '>';
						$a_after  = '</a>';
					}

					echo $a_before . do_shortcode( $settings['_btn_text'] ) . $a_after;
				}
				echo '</div>';


				?>
			</div>
		</div>
		<?php
	}
}
