<?php
/**
 * Register theme options in the Customizer
 */
class Penci_Soledad_Customizer {
	/**
	 * Add hooks for customizer
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register' ) );
		add_action('customize_register', array( $this, 'move_settings' ), 30);
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue' ) );
	}


	/**
	 * Register customizer settings
	 * @param WP_Customize_Manager $wp_customize WordPress customizer manager instance
	 */
	public function register(WP_Customize_Manager $wp_customize) {
		
		require_once get_template_directory() . '/inc/customizer/custom-controls/range-slider.php';

		$wp_customize->register_control_type( 'Penci_Range_Slider_Control' );
		
		// Register Panels
		require_once get_template_directory() . '/inc/customizer/options/00-panels.php';
		
		// Theme option sections
		require_once get_template_directory() . '/inc/customizer/options/01-general.php';
		require_once get_template_directory() . '/inc/customizer/options/02-topbar.php';
		require_once get_template_directory() . '/inc/customizer/options/03-logo-header.php';
		require_once get_template_directory() . '/inc/customizer/options/04-verticalnav-hamburger.php';
		require_once get_template_directory() . '/inc/customizer/options/05-homepage.php';
		require_once get_template_directory() . '/inc/customizer/options/06-featured-slider.php';
		require_once get_template_directory() . '/inc/customizer/options/07-featured-video.php';
		require_once get_template_directory() . '/inc/customizer/options/08-post-layouts.php';
		require_once get_template_directory() . '/inc/customizer/options/09-sidebar.php';
		require_once get_template_directory() . '/inc/customizer/options/10-single-post.php';
		require_once get_template_directory() . '/inc/customizer/options/11-pages-options.php';
		require_once get_template_directory() . '/inc/customizer/options/12-footer.php';
		require_once get_template_directory() . '/inc/customizer/options/13-social-media.php';
		require_once get_template_directory() . '/inc/customizer/options/14-text-translation.php';
		
		if ( class_exists( 'Penci_Soledad_Portfolio_Shortcode' ) ) {
			require_once get_template_directory() . '/inc/customizer/options/portfolio.php';
		}
		
		if ( class_exists( 'WooCommerce' ) ) {
			require_once get_template_directory() . '/inc/customizer/options/woocommerce.php';
		}
		
		require_once get_template_directory() . '/inc/customizer/options/custom-css.php';
	}

	/**
	 * Move default WordPress settings into Theme Options for better organization.
	 *
	 * @param WP_Customize_Manager $wp_customize WordPress customizer manager instance
	 */
	public function move_settings($wp_customize) {
		// Remove Sections
		$wp_customize->remove_section( 'title_tagline' );
		$wp_customize->remove_section( 'nav' );
		$wp_customize->remove_section( 'static_front_page' );
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'background_image' );
	}
	
	/**
	 * Enqueue script for customizer control
	 */
	public function enqueue(){
		wp_enqueue_style( 'penci-customizer', get_template_directory_uri() . '/inc/customizer/css/customizer.css' );
	}
}

new Penci_Soledad_Customizer;