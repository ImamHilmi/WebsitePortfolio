<?php
remove_action( 'admin_footer', 'vc_loop_include_templates',1 );
add_action( 'wp_ajax_vc_edit_form', 'penci_remove_shortcode_param_loop', 1 );
if ( ! function_exists( 'penci_remove_shortcode_param_loop' ) ) {
	function penci_remove_shortcode_param_loop() {
		global $vc_params_list;

		$key = array_search( 'loop', $vc_params_list );
		if ( $key !== false ) {
			unset( $vc_params_list[ $key ] );
		}

	}
}

require get_template_directory() . '/inc/js_composer/params/loop/register.php';
require get_template_directory() . '/inc/js_composer/params/number/register.php';
require get_template_directory() . '/inc/js_composer/params/only_number/register.php';
require get_template_directory() . '/inc/js_composer/params/post_metas/register.php';
require get_template_directory() . '/inc/js_composer/params/separator/register.php';
require get_template_directory() . '/inc/js_composer/params/custom_markup/register.php';

vc_add_shortcode_param( "loop", "penci_soledad_vc_param_loop" );
vc_add_shortcode_param( "penci_number", "penci_vc_param_number" );
vc_add_shortcode_param( "penci_only_number", "penci_vc_param_only_number" );
vc_add_shortcode_param( "penci_post_metas", "penci_vc_param_post_metas" );
vc_add_shortcode_param( "penci_separator", "penci_vc_param_separator" );
vc_add_shortcode_param( "penci_custom_markup", "penci_vc_param_custom_markup" );
