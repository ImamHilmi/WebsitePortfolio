<?php
namespace PenciSoledadElementor;

use PenciSoledadElementor\Base\Module_Base;
use Elementor\Element_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

final class Manager {
	/**
	 * @var Module_Base
	 */
	private $modules = array();
	private $column_order = 1;

	public function __construct() {
		$modules = array(
			'penci-sticky',
			'query-control',
			'penci-latest-posts',
			'penci-featured-cat',
			'penci-featured-sliders',
			'penci-popular-posts',
			'penci-portfolio',
			'penci-featured-boxes',
			'penci-about-me',
			'penci-posts-slider',
			'penci-recent-posts',
			'penci-instagram',
			'penci-pintersest',
			'penci-social-media',

			'penci-facebook-page',
			'penci-custom-sliders',
			'penci-count-down',
			'penci-counter-up',
			'penci-fancy-heading',
			'penci-map',
			'penci-info-box',
			'penci-image-gallery',
			'penci-latest-tweets',
			'penci-mail-chimp',
			'penci-open-hour',
			'penci-popular-cat',
			'penci-text-block',
			'penci-pricing-table',
			'penci-progress-bar',
			'penci-social-counter',
			'penci-team-member',
			'penci-video-playlist',
			'penci-weather',
			'penci-testimonials',
			'penci-login-form',
			'penci-sidebar',
			'penci-media-carousel',
		);

		foreach ( $modules as $module_name ) {
			$class_name = str_replace( '-', ' ', $module_name );
			$class_name = str_replace( ' ', '', ucwords( $class_name ) );
			$class_name = __NAMESPACE__ . '\\Modules\\' . $class_name . '\Module';

			if ( $class_name::is_active() ) {
				$this->modules[ $module_name ] = $class_name::instance();
			}
		}

		$this->add_actions();
	}

	/**
	 * @param string $module_name
	 *
	 * @return Module_Base|Module_Base[]
	 */
	public function get_modules( $module_name ) {
		if ( $module_name ) {
			if ( isset( $this->modules[ $module_name ] ) ) {
				return $this->modules[ $module_name ];
			}

			return null;
		}

		return $this->modules;
	}

	/**
	 * Add sticky class for sticky content and sticky sidebar
	 */
	protected function add_actions() {
		add_action( 'elementor/frontend/column/before_render', array( $this, 'add_column_attribute' ) );
		add_action( 'elementor/frontend/section/before_render', array( $this, 'add_section_attribute' ) );

		add_action( 'elementor/frontend/column/after_add_attributes', array( $this, 'add_column_attribute' ) );
		add_action( 'elementor/frontend/section/after_add_attributes', array( $this, 'add_section_attribute' ) );
	}

	public function add_column_attribute( $element ) {
		$settings = $element->get_settings();

		$current_column_order = $this->column_order;
		$element->add_render_attribute( array(
			'_inner_wrapper' => array( 'class' => 'theiaStickySidebar' ),
			'_wrapper'       => array(
				'class' => array(
					'penci-ercol-' . $settings['_column_size'],
					'penci-ercol-order-' . $current_column_order,
					in_array( $settings['_column_size'], array( 33, 25 ) ) ? 'penci-sticky-sb' : 'penci-sticky-ct',
					in_array( $settings['_column_size'], array( 33, 25 ) ) ? 'penci-sidebarSC' : ''
				)
			)
		) );

		$this->column_order   = $current_column_order + 1;
	}

	public function add_section_attribute( $element ) {
		$settings = $element->get_settings();

		$enable_sticky       = isset( $settings['penci_enable_sticky'] ) ? $settings['penci_enable_sticky'] : false;
		$enable_repons_twosb = isset( $settings['penci_enable_repons_section'] ) ? $settings['penci_enable_repons_section'] : false;
		$ctsidebar_mb        = isset( $settings['penci_ctsidebar_mb'] ) ? $settings['penci_ctsidebar_mb'] : 'con_sb2_sb1';
		$structure           = isset( $settings['structure'] ) ? $settings['structure'] : '';

		$this->column_order   = 1;

		$class = 'penci-section';

		if ( ! $enable_sticky ) {
			$class .= ' penci-disSticky';
		} else {
			$class .= ' penci-enSticky';
		}

		if( $enable_repons_twosb ) {
			$class .= ' penci-repons-elsection';

			$class .= ' penci-' . $ctsidebar_mb;
		}

		if( $structure ){
			$class .= ' penci-structure-' . $structure;
		}

		$element->add_render_attribute( '_wrapper', array(
			'class'  => $class,
		) );
	}

}