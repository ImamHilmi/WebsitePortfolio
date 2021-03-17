<?php
/**
 * Callback function for sanitizing radio settings.
 * Use for PenciDesign
 *
 * @param $input , $setting
 *
 * @return $input
 */
if ( ! function_exists( 'penci_sanitize_choices_field' ) ) {
	function penci_sanitize_choices_field( $input ) {
		return $input;
	}
}

/**
 * Callback function for sanitizing textarea settings
 * Use for PenciDesign
 *
 * @param $input , $setting
 *
 * @return $input
 */
if ( ! function_exists( 'penci_sanitize_textarea_field' ) ) {
	function penci_sanitize_textarea_field( $input ) {
		return $input;
	}
}
/**
 * Callback function for sanitizing checkbox settings.
 * Use for PenciDesign
 *
 * @param $input
 *
 * @return string default value if type is not exists
 */
if ( ! function_exists( 'penci_sanitize_checkbox_field' ) ) {
	function penci_sanitize_checkbox_field( $input ) {
		if ( $input == 1 ) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 * Callback function for sanitizing checkbox settings.
 * Use for PenciDesign
 *
 * @param $input
 *
 * @return a number
 */
if ( ! function_exists( 'penci_sanitize_number_field' ) ) {
	function penci_sanitize_number_field( $input ) {
		return absint( $input );
	}
}


/**
 * Sanitize integers that can use decimals
 *
 * @return a decimal
 */
if ( ! function_exists( 'penci_sanitize_decimal_field' ) ) {
	function penci_sanitize_decimal_field( $input ) {
		return abs( floatval( $input ) );
	}
}

/**
 * Sanitize integers that can use decimals
 *
 * @return empty if input is empty or a decimal
 */
if ( ! function_exists( 'penci_sanitize_decimal_empty_field' ) ) {
	function penci_sanitize_decimal_empty_field( $input ) {
		if ( '' == $input ) {
			return '';
		}
		return abs( floatval( $input ) );
	}
}

/**
 * Output CSS for desktop & mobile devices based on selector & option & attr
 *
 * @return string
 */
if ( ! function_exists( 'penci_renders_css' ) ) {
	function penci_renders_css( $selector, $option, $attr = NULL ) {
		if ( '' == $selector || '' == $option ) {
			return '';
		}
		$return = '';
		$attr = is_null( $attr ) ? 'font-size' : $attr;
		$sub_fix = ( 'font-size' == $attr ) ? 'px' : '';
		$mobile_option = $option . '_mobile';
		
		if( get_theme_mod( $option ) ){
			$return = $selector . '{'. $attr .':'. get_theme_mod( $option ) . $sub_fix . ';}';
		}
		if( get_theme_mod( $mobile_option ) ){
			$return .= '@media only screen and (max-width: 479px){'. $selector . '{'. $attr .':'. get_theme_mod( $mobile_option ) . $sub_fix . ';}}';
		}
		
		return $return;
		
	}
}