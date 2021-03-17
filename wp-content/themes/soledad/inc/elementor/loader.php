<?php
namespace PenciSoledadElementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Loader {
	private static $_instance;

	public $modules_manager;

	private $classes_aliases = array(
		'PenciSoledadElementor\Modules\PanelPostsControl\Module' => 'PenciSoledadElementor\Modules\QueryControl\Module',
		'PenciSoledadElementor\Modules\PanelPostsControl\Controls\Group_Control_Posts' => 'PenciSoledadElementor\Modules\QueryControl\Controls\Group_Control_Posts',
		'PenciSoledadElementor\Modules\PanelPostsControl\Controls\Query' => 'PenciSoledadElementor\Modules\QueryControl\Controls\Query',
	);

	/**
	 * @return \Elementor\Plugin
	 */

	public static function elementor() {
		return \Elementor\Plugin::$instance;
	}

	/**
	 * @return Plugin
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}


	private function includes() {
		require PENCI_ELEMENTOR_PATH . 'includes/modules-manager.php';
		require PENCI_ELEMENTOR_PATH . 'includes/helper.php';
		require PENCI_ELEMENTOR_PATH . 'includes/utils.php';
	}

	public function autoload( $class ) {
		if ( 0 !== strpos( $class, __NAMESPACE__ ) ) {
			return;
		}

		$has_class_alias = isset( $this->classes_aliases[ $class ] );

		// Backward Compatibility: Save old class name for set an alias after the new class is loaded
		if ( $has_class_alias ) {
			$class_alias_name = $this->classes_aliases[ $class ];
			$class_to_load = $class_alias_name;
		} else {
			$class_to_load = $class;
		}

		if ( ! class_exists( $class_to_load ) ) {
			$filename = strtolower(
				preg_replace(
					array( '/^' . __NAMESPACE__ . '\\\/', '/([a-z])([A-Z])/', '/_/', '/\\\/' ),
					array( '', '$1-$2', '-', DIRECTORY_SEPARATOR  ),
					$class_to_load
				)
			);
			$filename = PENCI_ELEMENTOR_PATH . $filename . '.php';

			if ( is_readable( $filename ) ) {
				include( $filename );
			}
		}

		if ( $has_class_alias ) {
			class_alias( $class_alias_name, $class );
		}
	}

	public function widget_categories( $elements_manager ) {
		$elements_manager->add_category( 'penci-elements', array( 'title' => __( 'Penci', 'soledad' ) ) );
	}
	/**
	 *  Editor enqueue styles.
	 */
	public function enqueue_editor_styles() {
		wp_enqueue_style( 'penci-elementor', PENCI_ELEMENTOR_URL . 'assets/css/editor.css', array( 'elementor-editor' ), '' );
	}

	public function enqueue_editor_scripts() {
		if( defined( 'ELEMENTOR_PRO_VERSION' ) ) {
			return;
		}

		if ( version_compare( ELEMENTOR_VERSION, '3.0.0', '<' ) ) {
			wp_enqueue_script( 'penci-elementor', PENCI_ELEMENTOR_URL . 'assets/js/editor.bak.js', array( 'backbone-marionette' ), PENCI_SOLEDAD_VERSION, true );
		}else{
			wp_enqueue_script( 'penci-elementor', PENCI_ELEMENTOR_URL . 'assets/js/editor.min.js', array(
				'backbone-marionette',
				'elementor-common',
				'elementor-editor-modules',
				'elementor-editor-document',
			),
				PENCI_SOLEDAD_VERSION, true );
		}

		wp_localize_script( 'penci-elementor', 'PenciElementorConfig', array( 'i18n' => array(), 'isActive' => true, ) );
	}

	/**
	 * Register scripts
	 */
	public function register_frontend_scripts() {
		$api = get_theme_mod( 'penci_map_api_key' );

		if ( ! $api ) {
			$api = 'AIzaSyBzbXkmI1iibQGKhyS_YbIDEyDEfBK5_bI';
		}
		$http = is_ssl() ? 'https://' : 'http://';

		wp_register_script( 'google-map', esc_url( $http . 'maps.google.com/maps/api/js?key=' . esc_attr( $api ) ), array(), '', true );

		wp_register_script( 'jquery.plugin', get_template_directory_uri() . '/js/jquery.plugin.min.js', array( 'jquery' ), '2.0.2', true );
		wp_register_script( 'countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array( 'jquery' ), '2.0.2', true );
		wp_register_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '2.0.3', true );
		wp_register_script( 'jquery-counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js', array( 'jquery','waypoints' ), '1.0', true );
	}
	public function on_elementor_init() {
		$this->modules_manager = new Manager();
	}
	private function setup_hooks() {
		add_action( 'elementor/init', array( $this, 'on_elementor_init' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categories' ) );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'enqueue_editor_styles' ) );
		add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'enqueue_editor_scripts' ));
		add_action( 'elementor/frontend/before_register_scripts', array( $this, 'register_frontend_scripts' ) );
	}

	/**
	 * Plugin constructor.
	 */
	private function __construct() {
		spl_autoload_register( array( $this, 'autoload' ) );

		$this->includes();
		$this->setup_hooks();
	}
}

Loader::instance();

