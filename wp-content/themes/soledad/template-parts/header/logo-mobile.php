<?php
if ( get_theme_mod( 'penci_header_logo_mobile' ) ) {
	$logo_url = esc_url( home_url( '/' ) );
	if ( get_theme_mod( 'penci_custom_url_logo' ) ) {
		$logo_url = get_theme_mod( 'penci_custom_url_logo' );
	}

	$logo_src = get_template_directory_uri() . '/images/logo.png';
	if ( get_theme_mod( 'penci_logo' ) ) {
		$logo_src = get_theme_mod( 'penci_logo' );
	}
	?>
	<div class="penci-mobile-hlogo">
		<a href="<?php echo esc_url( $logo_url ); ?>"><img src="<?php echo esc_url( $logo_src ); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
	</div>
	<?php
}