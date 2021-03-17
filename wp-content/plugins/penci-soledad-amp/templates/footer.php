<?php
$_site_url = site_url();

$use_site_address_url = get_theme_mod( 'penci_amp_use_site_address_url' );
if ( $use_site_address_url ) {
	$_site_url = home_url();
}
?>
<footer class="penci-amp-footer">
	<div class="penci-amp-footer-container">
		<div class="penci-amp-main-link">
			<a href="<?php echo esc_attr( Penci_AMP_Link_Sanitizer::__pre_url_off ( $_site_url ) ); ?>">
				<i class="fa fa-desktop"></i> <?php echo penci_amp_get_setting( 'penci_amp_text_view_desktop' ); ?>
			</a>
		</div>
	</div>
	<div class="footer__copyright_menu">
		<p>
			<?php echo penci_amp_get_setting( 'penci_amp_footer_copy_right' ); ?>
		</p>
		<a href="#top" class="back-to-top"><?php echo penci_amp_get_setting( 'penci_amp_text_backtotop' ); ?><i class="fa  fa-long-arrow-up"></i></a>
	</div>
</footer>
<?php
if ( $analytics_code = penci_amp_get_setting( 'penci-amp-analytics' ) ) :
	?>
	<amp-analytics type="googleanalytics">
		<script type="application/json">
			{
				"vars": {
					"account": "<?php echo esc_attr( $analytics_code ) ?>"
				},
				"triggers": {
					"trackPageview": {
						"on": "visible",
						"request": "pageview"
					}
				}
			}
		</script>
	</amp-analytics>
<?php endif ?>
<?php
$gprd_desc = $gprd_accept = $gprd_rmore = $gprd_rmore_link = '';
if( function_exists( 'penci_get_setting' ) ){
	$gprd_desc       = penci_get_setting( 'penci_gprd_desc' );
	$gprd_accept     = penci_get_setting( 'penci_gprd_btn_accept' );
	$gprd_rmore      = penci_get_setting( 'penci_gprd_rmore' );
	$gprd_rmore_link = penci_get_setting( 'penci_gprd_rmore_link' );
}
if ( get_theme_mod( 'penci_enable_cookie_law' ) && $gprd_desc && $gprd_accept && $gprd_rmore ):
?>
	<amp-user-notification layout="nodisplay" id="amp-user-notification-gdpr">
		<div class="penci-gprd-law">
			<p>
			<?php if ( $gprd_desc ): echo $gprd_desc; endif; ?>
			<button on="tap:amp-user-notification-gdpr.dismiss" class="ampstart-btn caps ml1 penci-gprd-accept"><?php echo $gprd_accept; ?></button>
			<?php if ( $gprd_rmore ): echo '<a class="penci-gprd-more" href="' . $gprd_rmore_link . '">' . $gprd_rmore . '</a>'; endif; ?>
			</p>
		</div>
	</amp-user-notification>
<?php
endif;
?>
