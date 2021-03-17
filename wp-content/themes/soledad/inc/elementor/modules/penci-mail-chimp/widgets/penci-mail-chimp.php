<?php

namespace PenciSoledadElementor\Modules\PenciMailChimp\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciMailChimp extends Base_Widget {

	public function get_name() {
		return 'penci-mail-chimp';
	}

	public function get_title() {
		return esc_html__( 'Penci Mail Chimp', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_keywords() {
		return array( 'mail', 'chimp' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		// Section layout
		$this->start_controls_section(
			'section_page', array(
				'label' => esc_html__( 'Mailchimp', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'note_important', array(
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => sprintf( __( 'You can edit your sign-up form in the <a href="%s">Mailchimp for WordPress form settings</a>.', 'soledad' ), admin_url( 'admin.php?page=mailchimp-for-wp-forms' ) ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			)
		);

		$this->add_control(
			'mailchimp_style', array(
				'label'   => __( 'Choose Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1' => esc_html__( 'Style 1', 'soledad' ),
					's2' => esc_html__( 'Style 2', 'soledad' ),
					's3' => esc_html__( 'Style 3', 'soledad' ),
				)
			)
		);

		$this->end_controls_section();
		$this->register_block_title_section_controls();
		$this->start_controls_section(
			'section_mailchimp_style',
			array(
				'label' => __( 'Mailchimp', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'mc4wp_bg_color', array(
				'label'     => __( 'Background color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'mailchimp_style' => array( 's2', 's3' ) ),
				'selectors' => array(
					'{{WRAPPER}} .footer-subscribe,' .
					'{{WRAPPER}} .penci-header-signup-form' => 'background-color: {{VALUE}};',
				),

			)
		);

		$this->add_control(
			'tweets_desc_headings',
			array(
				'label' => __( 'Description', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'mc4wp_des_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-header-signup-form .mc4wp-form-fields > p,' .
					'{{WRAPPER}} .penci-header-signup-form form > p,' .
					'{{WRAPPER}} .footer-subscribe .mc4wp-form .mdes,' .
					'{{WRAPPER}} .mc4wp-form-fields' => 'color: {{VALUE}};'
				)
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'mc4wp_des_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-header-signup-form .mc4wp-form-fields > p,{{WRAPPER}} .penci-header-signup-form form > p,{{WRAPPER}} .footer-subscribe .mc4wp-form .mdes,{{WRAPPER}} .mc4wp-form-fields'
			)
		);
		$this->add_responsive_control(
			'mc4wp_des_width', array(
				'label'     => __( 'Description Width', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 1000 ) ),
				'selectors' => array( '{{WRAPPER}} .mc4wp-form .mdes' => 'max-width: {{SIZE}}px;width:100%;display: inline-block' ),
			)
		);
		$this->add_responsive_control(
			'mc4wp_des_martop', array(
				'label'     => __( 'Margin Top', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200 ) ),
				'selectors' => array( '{{WRAPPER}} .mc4wp-form .mdes' => 'margin-top: {{SIZE}}px' ),
			)
		);
		$this->add_responsive_control(
			'mc4wp_des_marbt', array(
				'label'     => __( 'Margin Bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200 ) ),
				'selectors' => array( '{{WRAPPER}} .mc4wp-form .mdes' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		// Input

		$markup_input = '{{WRAPPER}} .widget input[type="text"],';
		$markup_input .= '{{WRAPPER}} .widget input[type="email"],';
		$markup_input .= '{{WRAPPER}} .widget input[type="date"],';
		$markup_input .= '{{WRAPPER}} .widget input[type="number"],';
		$markup_input .= '{{WRAPPER}} .widget input[type="search"],';
		$markup_input .= '{{WRAPPER}} .widget input[type="password"]';


		$this->add_control(
			'tweets_input_headings',
			array(
				'label' => __( 'Input', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'mc4wp_bg_input_color', array(
				'label'     => __( 'Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( $markup_input => 'background-color: {{VALUE}};' )
			)
		);
		$this->add_control(
			'mc4wp_border_input_color', array(
				'label'     => __( 'Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( $markup_input => 'border-color: {{VALUE}};' )
			)
		);
		$this->add_control(
			'mc4wp_text_input', array(
				'label'     => __( 'Text Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( $markup_input => 'color: {{VALUE}};' )
			)
		);

		$this->add_control(
			'mc4wp_placeh_input', array(
				'label'     => __( 'Placeholder Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .widget input::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .widget input::-moz-placeholder'          => 'color: {{VALUE}};',
					'{{WRAPPER}} .widget input:-ms-input-placeholder,'     => 'color: {{VALUE}};',
					'{{WRAPPER}} .widget input::placeholder'               => 'color: {{VALUE}};',
				)
			)
		);
		// Button
		$this->add_control(
			'mc4wp_button_headings',
			array(
				'label' => __( 'Button', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'mc4wp_btn_typo',
				'selector' => '{{WRAPPER}} .mc4wp-form input[type="submit"]',
			)
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal', array(
				'label' => __( 'Normal', 'soledad' )
			)
		);

		$this->add_control(
			'button_text_color', array(
				'label'     => __( 'Text Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .mc4wp-form input[type="submit"]' => 'fill: {{VALUE}}; color: {{VALUE}};' )
			)
		);

		$this->add_control(
			'background_color', array(
				'label'     => __( 'Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .mc4wp-form input[type="submit"]' => 'background-color: {{VALUE}};' )
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover', array(
				'label' => __( 'Hover', 'soledad' )
			)
		);

		$this->add_control(
			'hover_color', array(
				'label'     => __( 'Text Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .mc4wp-form input[type="submit"]:hover' => 'color: {{VALUE}};',

				)
			)
		);

		$this->add_control(
			'button_background_hover_color', array(
				'label'     => __( 'Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mc4wp-form input[type="submit"]:hover' => 'background-color: {{VALUE}};',
				)
			)
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$mailchimp_style = $settings['mailchimp_style'];

		$css_class = 'penci-block-vc penci-mailchimp-block';
		$css_class .= ' penci-mailchimp-' . $mailchimp_style;

		$class_signup_form = 'widget widget_mc4wp_form_widget';
		if ( 's2' == $mailchimp_style ) {
			$class_signup_form .= ' penci-header-signup-form';
		} elseif ( 's3' == $mailchimp_style ) {
			$class_signup_form .= ' footer-subscribe';
		}
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content">
				<div class="<?php echo esc_attr( $class_signup_form ); ?>">
					<?php
					if ( function_exists( 'mc4wp_show_form' ) ) {
						mc4wp_show_form();
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}
}
