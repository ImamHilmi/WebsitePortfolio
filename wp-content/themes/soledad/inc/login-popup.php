<?php
add_action( 'wp_ajax_nopriv_penci_login_ajax', 'penci_login_ajax_callback' );
add_action( 'wp_ajax_penci_login_ajax', 'penci_login_ajax_callback' );

function penci_login_ajax_callback() {
	global $wpdb;

	// We shall SQL prepare all inputs to avoid sql injection.
	$username = isset( $_REQUEST['username'] ) ? $wpdb->prepare( $_REQUEST['username'], array() ) : '';
	$password = $_REQUEST['password'];
	$remember = isset( $_REQUEST['rememberme'] ) ? $wpdb->prepare( $_REQUEST['rememberme'], array() ) : '';
	$captcha = isset( $_REQUEST['captcha'] ) ? $_REQUEST['captcha']  : '';

	$_POST['g-recaptcha-response']    = $captcha;
	$_REQUEST['g-recaptcha-response'] = $captcha;

	if ( $remember ) {
		$remember = 'true';
	} else {
		$remember = 'false';
	}

	$login_data                         = array();
	$login_data['user_login']           = $username;
	$login_data['user_password']        = $password;
	$login_data['remember']             = $remember;
	$login_data['g-recaptcha-response'] = $captcha;
	$user_verify                 = wp_signon( $login_data, false );

	if ( is_wp_error( $user_verify ) ) {
		wp_send_json_error( '<p class="message message-error">' . penci_get_setting( 'penci_plogin_wrong' ) . '</p>' );
	}

	if( isset( $user_verify->ID ) ){
		wp_set_current_user( $user_verify->ID );
		wp_set_auth_cookie( $user_verify->ID );
	}

	wp_send_json_success( '<p class="message message-success">' . penci_get_setting( 'penci_plogin_success' ) . '</p>' );
}

//Ajax widget login-popup
add_action( 'wp_ajax_nopriv_penci_register_ajax', 'penci_register_ajax_callback' );
add_action( 'wp_ajax_penci_register_ajax', 'penci_register_ajax_callback' );

function penci_register_ajax_callback() {
	$nonce =  isset( $_POST['_wpnonce'] ) ? $_POST['_wpnonce'] : '';

	$first_name  = sanitize_text_field( $_POST['fistName'] );
	$last_name   = sanitize_text_field( $_POST['lastName'] );
	$username    = sanitize_text_field( $_POST['username'] );
	$email       = sanitize_text_field( $_POST['email'] );
	$pass        = sanitize_text_field( $_POST['password'] );
	$confirmPass = sanitize_text_field( $_POST['confirmPass'] );
	$captcha = isset( $_REQUEST['captcha'] ) ? $_REQUEST['captcha']  : '';

	$error = array();
	if ( ! is_email( $email ) ) {
		$error[] = penci_get_setting( 'penci_plogin_mess_invalid_email' );
	}

	if ( $confirmPass != $pass ) {
		$error[] = penci_get_setting( 'penci_plogin_mess_error_email_pass' );

	}

	if ( ! empty( $error ) ) {
		$error = implode( '<br> ', $error );
		wp_send_json_error( '<p class="message message-error">' . $error . '</p>' );
	}

	// Register the user
	$user_register = wp_insert_user( array(
		'first_name'           => $first_name,
		'last_name'            => $last_name,
		'user_login'           => $username,
		'user_email'           => $email,
		'user_pass'            => $pass,
		'g-recaptcha-response' => $captcha

	) );


	if ( is_wp_error($user_register) ){
		$error  = $user_register->get_error_codes()	;

		if ( in_array( 'empty_user_login', $error ) ) {

			wp_send_json_error( '<p class="message message-error">' . $user_register->get_error_message( 'empty_user_login' ) . '</p>' );

		} elseif ( in_array( 'existing_user_login', $error ) ) {
			wp_send_json_error( '<p class="message message-error">' . penci_get_setting( 'penci_plogin_mess_username_reg' ) . '</p>' );

		} elseif ( in_array( 'existing_user_email', $error ) ) {
			wp_send_json_error( '<p class="message message-error">' . penci_get_setting( 'penci_plogin_mess_email_reg' ) . '</p>' );
		}
	} else {

		remove_action( 'authenticate', 'gglcptch_login_check', 21, 1 );

		$login_data                         = array();
		$login_data['user_login']           = $username;
		$login_data['user_password']        = $pass;
		$login_data['remember']             = true;
		$login_data['g-recaptcha-response'] = $captcha;

		$user_signon                 = wp_signon( $login_data, false );

		if( isset( $user_signon->ID ) ){
			wp_set_current_user( $user_signon->ID );
			wp_set_auth_cookie( $user_signon->ID );
		}

		if ( is_wp_error( $user_signon ) ) {
			wp_send_json_error( '<p class="message message-error">' .  penci_get_setting( 'penci_plogin_mess_wrong_email_pass' ). '</p>' );
		} else {
			wp_set_current_user( $user_signon->ID );
			wp_send_json_success( '<p class="message message-success">' . penci_get_setting( 'penci_plogin_mess_reg_succ' ) . '</p>' );
		}
	}
}