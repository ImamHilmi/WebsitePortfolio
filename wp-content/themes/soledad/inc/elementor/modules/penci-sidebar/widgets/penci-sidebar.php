<?php
namespace PenciSoledadElementor\Modules\PenciSidebar\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciSidebar extends Base_Widget {

	public function get_name() {
		return 'penci-sidebar';
	}

	public function get_title() {
		return esc_html__( 'Penci Sidebar', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-sidebar';
	}

	public function get_keywords() {
		return array( 'Sidebar' );
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
				'label' => esc_html__( 'General', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'penci_sidebar', array(
				'label'   => __( 'Sidebar to Display', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'main-sidebar',
				'options' => \Penci_Custom_Sidebar::get_list_sidebar_el()
			)
		);
		$this->add_control(
			'penci_htitle_style', array(
				'label'   => __( 'Sidebar Widget Heading Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => array(
					'style-1'  => esc_html__( 'Style 1', 'soledad' ),
					'style-2'  => esc_html__( 'Style 2', 'soledad' ),
					'style-3'  => esc_html__( 'Style 3', 'soledad' ),
					'style-4'  => esc_html__( 'Style 4', 'soledad' ),
					'style-5'  => esc_html__( 'Style 5', 'soledad' ),
					'style-6'  => esc_html__( 'Style 6 - Only Text', 'soledad' ),
					'style-7'  => esc_html__( 'Style 7', 'soledad' ),
					'style-9'  => esc_html__( 'Style 8', 'soledad' ),
					'style-8'  => esc_html__( 'Style 9', 'soledad' ),
					'style-10' => esc_html__( 'Style 10', 'soledad' ),
					'style-11' => esc_html__( 'Style 11', 'soledad' ),
					'style-12' => esc_html__( 'Style 12', 'soledad' ),
					'style-13' => esc_html__( 'Style 13', 'soledad' ),
					'style-14' => esc_html__( 'Style 14', 'soledad' )
				)
			)
		);
		$this->add_control(
			'penci_htitle_align', array(
				'label'   => __( 'Sidebar Widget Heading Align', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'pcalign-center',
				'options' => array(
					'pcalign-left'   => esc_html__( 'Left', 'soledad' ),
					'pcalign-center' => esc_html__( 'Center', 'soledad' ),
					'pcalign-right'  => esc_html__( 'Right', 'soledad' )
				)
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$sidebar = $settings['penci_sidebar'] ? $settings['penci_sidebar'] : 'main-sidebar';
		$style   = $settings['penci_htitle_style'] ? $settings['penci_htitle_style'] : 'style-1';
		$align   = $settings['penci_htitle_align'] ? $settings['penci_htitle_align'] : 'center';

		if ( ! isset( $sidebar ) ): $sidebar = 'main-sidebar'; endif;
		if ( ! isset( $style ) ): $style = 'style-1'; endif;
		if ( ! in_array( $align, array( 'pcalign-center', 'pcalign-left', 'pcalign-right' ) ) ): $align = 'pcalign-center'; endif;

		?>

		<div id="sidebar" class="penci-sidebar-content penci-sidebar-content-vc <?php echo sanitize_text_field( $style . ' ' . $align ); ?>">
			<div class="theiaStickySidebar">
				<?php
				if( is_active_sidebar( $sidebar ) ){
					dynamic_sidebar( $sidebar );
				} else {
					dynamic_sidebar( 'main-sidebar' );
				}
				?>
			</div>
		</div>

		<?php
	}
}
