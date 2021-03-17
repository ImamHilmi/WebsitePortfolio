<?php
namespace PenciSoledadElementor\Modules\PenciFacebookPage\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciFacebookPage extends Base_Widget {

	public function get_name() {
		return 'penci-facebook-page';
	}

	public function get_title() {
		return esc_html__( 'Penci Facebook Page', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-fb-feed';
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

		// Section layout
		$this->start_controls_section(
			'section_page', array(
				'label' => esc_html__( 'Page', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'page_url', array(
				'label'       => __( 'Facebook Page URL', 'soledad' ),
				'placeholder' => 'https://www.facebook.com/your-page/',
				'default'     => 'https://www.facebook.com/PenciDesign',
				'label_block' => true,
				'description' => __( 'Paste the URL of the Facebook page.', 'soledad' ),
			)
		);

		$this->add_responsive_control(
			'page_height', array(
				'label'   => __( 'Facebook Page Height', 'soledad' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => array( 'size' => '290' ),
				'range'   => array( 'px' => array( 'min' => 100, 'max' => 500, ) ),
			)
		);

		$this->add_control(
			'hide_faces', array(
				'label'     => __( 'Hide Faces', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => '',
			)
		);
		$this->add_control(
			'hide_stream', array(
				'label'     => __( 'Hide Stream', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => '',
			)
		);

		$this->end_controls_section();
		$this->register_block_title_section_controls();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		if ( empty( $settings['page_url'] ) ) {
			echo $this->get_title() . ': ' . esc_html__( 'Please enter a valid URL', 'soledad' );

			return;
		}

		$css_class = 'penci-block-vc penci_facebook_widget';

		$height = $settings['page_height']['size'] . $settings['page_height']['unit'];

		$attributes = array(
			'class'              => 'fb-page',
			'data-href'          => $settings['page_url'],
			'data-height'        => $height,
			'data-small-header'  => 'false',
			'data-hide-cover'    => 'false',
			'data-show-facepile' => ! $settings['hide_faces'] ? 'true' : 'false',
			'data-show-posts'    => ! $settings['hide_stream'] ? 'true' : 'false',
			'style'              => 'min-height: 1px;height:' . $height,
			'adapt_container_width' => 'true'
		);

		$this->add_render_attribute( 'embed_div', $attributes );
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content">
				<?php echo '<div ' . $this->get_render_attribute_string( 'embed_div' ) . '></div>'; ?>
			</div>
		</div>
		<?php
	}
}
