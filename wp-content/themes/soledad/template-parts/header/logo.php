<?php
$logo_url = esc_url( home_url( '/' ) );
if ( get_theme_mod( 'penci_custom_url_logo' ) ) {
	$logo_url = get_theme_mod( 'penci_custom_url_logo' );
}
$logo_src = get_template_directory_uri() . '/images/logo.png';
if ( get_theme_mod( 'penci_logo' ) ) {
	$logo_src = get_theme_mod( 'penci_logo' );
}

if ( is_page() ) {
	$pmeta_page_header = get_post_meta( get_the_ID(), 'penci_pmeta_page_header', true );
	if ( isset( $pmeta_page_header['custom_logo'] ) && $pmeta_page_header['custom_logo'] ) {

		$logo_src_meta = wp_get_attachment_url( intval( $pmeta_page_header['custom_logo'] ) );
		if ( $logo_src_meta ) {
			$logo_src = $logo_src_meta;
		}
	}
}
?>
<a href="<?php echo $logo_url; ?>"><img src="<?php echo esc_url( $logo_src ); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>