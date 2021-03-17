<?php
/**
 * This is footer template of Soledad theme
 *
 * @package Wordpress
 * @since   1.0
 */

$penci_hide_footer = '';
$hide_fwidget = get_theme_mod( 'penci_footer_widget_area' );
$footer_layout = get_theme_mod( 'penci_footer_widget_area_layout' ) ? get_theme_mod( 'penci_footer_widget_area_layout' ) : 'style-1';
$penci_footer_width = get_theme_mod( 'penci_footer_width' );

if ( is_page() ) {
	$penci_hide_footer = get_post_meta( get_the_ID(), 'penci_page_hide_footer', true );

	$pmeta_page_footer = get_post_meta( get_the_ID(), 'penci_pmeta_page_footer', true );
	if ( isset( $pmeta_page_footer['penci_footer_style'] ) && $pmeta_page_footer['penci_footer_style'] ) {
		$footer_layout =  $pmeta_page_footer['penci_footer_style'];
	}

	if ( isset( $pmeta_page_footer['penci_hide_fwidget'] ) ) {
		if ( 'yes' == $pmeta_page_footer['penci_hide_fwidget'] ) {
			$hide_fwidget = true;
		} elseif ( 'no' == $pmeta_page_footer['penci_hide_fwidget'] ) {
			$hide_fwidget = false;
		}
	}

	if ( isset( $pmeta_page_footer['penci_footer_width'] ) && $pmeta_page_footer['penci_footer_width'] ) {
		$penci_footer_width =  $pmeta_page_footer['penci_footer_width'];
	}
}

$footer_logo_url = esc_url( home_url('/') );
if( get_theme_mod('penci_custom_url_logo_footer') ) {
	$footer_logo_url = get_theme_mod('penci_custom_url_logo_footer');
}
?>
<!-- END CONTAINER -->
</div>

<?php if( ! $penci_hide_footer ): ?>
<div class="clear-footer"></div>

<?php if ( get_theme_mod( 'penci_footer_adsense' ) ): echo '<div class="container penci-google-adsense penci-google-adsense-footer">'. do_shortcode( get_theme_mod( 'penci_footer_adsense' ) ) .'</div>'; endif; ?>

<?php if ( ! $hide_fwidget ) :
	if( ( in_array( $footer_layout, array( 'style-2', 'style-3', 'style-8', 'style-9', 'style-10' ) ) && ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) ) ) || ( in_array( $footer_layout, array( 'style-1', 'style-5', 'style-6', 'style-7' ) ) && ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) ) || ( $footer_layout == 'style-4' && ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) ) ):
		?>
		<div id="widget-area"<?php if( get_theme_mod( 'penci_footer_widget_bg_image' ) ): echo ' class="penci-lazy" data-src="'. get_theme_mod( 'penci_footer_widget_bg_image' ) .'"'; endif; ?>>
			<div class="container<?php echo esc_attr( $penci_footer_width ? ' container-' . $penci_footer_width : '' ) ?>">
				<?php if( in_array( $footer_layout, array( 'style-1', 'style-5', 'style-6', 'style-7' ) ) ){ ?>
					<div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
					<div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
					<div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?> last">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php } elseif( in_array( $footer_layout, array( 'style-2', 'style-3', 'style-8', 'style-9', 'style-10' ) ) ) { ?>
					<div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
					<div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?> last">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php } elseif( $footer_layout == 'style-4' ) { ?>
					<div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
					<div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
					<div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?>">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
					<div class="footer-widget-wrapper footer-widget-<?php echo $footer_layout; ?> last">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
<?php endif;
endif; /* End check if disable footer widget area */  ?>

<?php if ( is_active_sidebar( 'footer-instagram' ) ): ?>
	<div class="footer-instagram footer-instagram-html<?php if( get_theme_mod('penci_footer_insta_title_overlay') ): echo ' penci-insta-title-overlay'; endif; ?>">
		<?php dynamic_sidebar( 'footer-instagram' ); ?>
	</div>
<?php endif; ?>

<?php
/**
 * Display sign-up mailchimp form on the header
 * Check if 'footer-signup-form' has widget, if true display it
 *
 * @since 4.0
 */
if ( is_active_sidebar( 'footer-signup-form' ) ): ?>
	<div class="footer-subscribe">
		<?php dynamic_sidebar( 'footer-signup-form' ); ?>
	</div>
<?php endif; ?>

<footer id="footer-section" class="penci-footer-social-media penci-lazy<?php if( get_theme_mod( 'penci_footer_social_around' ) ): echo ' footer-social-remove-circle'; endif; if( get_theme_mod( 'penci_footer_social_drop_line' ) ): echo ' footer-social-drop-line'; endif; if( get_theme_mod( 'penci_footer_disable_radius_social' ) ): echo ' footer-social-remove-radius'; endif; if( get_theme_mod( 'penci_footer_social_remove_text' ) ): echo ' footer-social-remove-text'; endif; ?>"<?php if( get_theme_mod( 'penci_footer_copyright_bg_image' ) ): echo ' data-src="'. get_theme_mod( 'penci_footer_copyright_bg_image' ) .'"'; endif; ?> <?php if( ! get_theme_mod('penci_schema_wpfoot') ): ?>itemscope itemtype="https://schema.org/WPFooter"<?php endif; ?>>
	<div class="container<?php echo esc_attr( $penci_footer_width ? ' container-' . $penci_footer_width : '' ) ?>">
		<?php if ( ! get_theme_mod( 'penci_footer_social' ) ) : ?>
			<div class="footer-socials-section<?php if( get_theme_mod( 'penci_footer_brand_social' ) && ! get_theme_mod( 'penci_footer_social_around' ) ){ echo ' penci-social-colored'; } elseif( get_theme_mod( 'penci_footer_brand_social' ) && get_theme_mod( 'penci_footer_social_around' ) ){ echo ' penci-social-textcolored'; } ?>">
				<ul class="footer-socials">
					<?php if ( penci_get_setting( 'penci_facebook' ) ) : ?>
						<li><a href="<?php echo esc_attr( penci_get_setting( 'penci_facebook' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-facebook-f'); ?><span><?php esc_html_e( 'Facebook', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( penci_get_setting( 'penci_twitter' ) ) : ?>
						<li><a href="<?php echo esc_attr( penci_get_setting( 'penci_twitter' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-twitter'); ?><span><?php esc_html_e( 'Twitter', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_instagram' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_instagram' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-instagram'); ?><span><?php esc_html_e( 'Instagram', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_pinterest' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_pinterest' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-pinterest'); ?><span><?php esc_html_e( 'Pinterest', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_linkedin' ) ) : ?>
						<li><a href="<?php echo esc_url( get_theme_mod( 'penci_linkedin' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-linkedin-in'); ?><span><?php esc_html_e( 'Linkedin', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_flickr' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_flickr' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-flickr'); ?><span><?php esc_html_e( 'Flickr', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_behance' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_behance' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-behance'); ?><span><?php esc_html_e( 'Behance', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_tumblr' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_tumblr' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-tumblr'); ?><span><?php esc_html_e( 'Tumblr', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_youtube' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_youtube' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-youtube'); ?><span><?php esc_html_e( 'Youtube', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_email_me' ) ) : ?>
						<li><a href="<?php echo get_theme_mod( 'penci_email_me' ); ?>"><?php penci_fawesome_icon('fas fa-envelope'); ?><span><?php esc_html_e( 'Email', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_vk' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_vk' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-vk'); ?><span><?php esc_html_e( 'Vk', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_bloglovin' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_bloglovin' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('far fa-heart'); ?><span><?php esc_html_e( 'Bloglovin', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_vine' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_vine' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-vine'); ?><span><?php esc_html_e( 'Vine', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_soundcloud' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_soundcloud' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-soundcloud'); ?><span><?php esc_html_e( 'Soundcloud', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_snapchat' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_snapchat' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-snapchat'); ?><span><?php esc_html_e( 'Snapchat', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_spotify' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_spotify' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-spotify'); ?><span><?php esc_html_e( 'Spotify', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_github' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_github' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-github'); ?><span><?php esc_html_e( 'Github', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_stack' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_stack' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-stack-overflow'); ?><span><?php esc_html_e( 'Stack-Overflow', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_twitch' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_twitch' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-twitch'); ?><span><?php esc_html_e( 'Twitch', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_vimeo' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_vimeo' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-vimeo-v'); ?><span><?php esc_html_e( 'Vimeo', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_steam' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_steam' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-steam'); ?><span><?php esc_html_e( 'Steam', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_xing' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_xing' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-xing'); ?><span><?php esc_html_e( 'Xing', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_whatsapp' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_whatsapp' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-whatsapp'); ?><span><?php esc_html_e( 'Whatsapp', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_telegram' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_telegram' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-telegram'); ?><span><?php esc_html_e( 'Telegram', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_reddit' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_reddit' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-reddit-alien'); ?><span><?php esc_html_e( 'Reddit', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_ok' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_ok' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-odnoklassniki'); ?><span><?php esc_html_e( 'Ok', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_500px' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_500px' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-500px'); ?><span><?php esc_html_e( '500px', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_stumbleupon' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_stumbleupon' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-stumbleupon'); ?><span><?php esc_html_e( 'StumbleUpon', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_wechat' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_wechat' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-weixin'); ?><span><?php esc_html_e( 'Wechat', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_weibo' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_weibo' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-weibo'); ?><span><?php esc_html_e( 'Weibo', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_line' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_line' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social('line'); ?><span><?php esc_html_e( 'LINE', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_viber' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_viber' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social('viber'); ?><span><?php esc_html_e( 'Viber', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_discord' ) ) : ?>
						<li><a href="<?php echo esc_attr( get_theme_mod( 'penci_discord' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social('discord'); ?><span><?php esc_html_e( 'Discord', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_rss' ) ) : ?>
						<li><a href="<?php echo esc_url( get_theme_mod( 'penci_rss' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fas fa-rss'); ?><span><?php esc_html_e( 'RSS', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_slack' ) ) : ?>
						<li><a href="<?php echo esc_url( get_theme_mod( 'penci_slack' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-slack'); ?><span><?php esc_html_e( 'Slack', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_mixcloud' ) ) : ?>
						<li><a href="<?php echo esc_url( get_theme_mod( 'penci_mixcloud' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-mixcloud'); ?><span><?php esc_html_e( 'Mixcloud', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_goodreads' ) ) : ?>
						<li><a href="<?php echo esc_url( get_theme_mod( 'penci_goodreads' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social('goodreads'); ?><span><?php esc_html_e( 'goodreads', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_tripadvisor' ) ) : ?>
						<li><a href="<?php echo esc_url( get_theme_mod( 'penci_tripadvisor' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-tripadvisor'); ?><span><?php esc_html_e( 'tripadvisor', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_tiktok' ) ) : ?>
						<li><a href="<?php echo esc_url( get_theme_mod( 'penci_tiktok' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social('tiktok'); ?><span><?php esc_html_e( 'tiktok', 'soledad' ); ?></span></a></li>
					<?php endif; ?>
				</ul>
			</div>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'penci_related_post_popup' ) ) : ?><div class="penci-flag-rlt-popup"></div><?php endif; ?>
		<?php if ( ( get_theme_mod( 'penci_footer_logo' ) && ! get_theme_mod( 'penci_hide_footer_logo' ) ) || get_theme_mod( 'penci_footer_copyright' ) || ! get_theme_mod( 'penci_go_to_top' ) || get_theme_mod( 'penci_footer_menu' ) ) : ?>
			<div class="footer-logo-copyright<?php if ( ! get_theme_mod( 'penci_footer_logo' ) || get_theme_mod( 'penci_hide_footer_logo' ) ) : echo ' footer-not-logo'; endif; ?><?php if ( get_theme_mod( 'penci_go_to_top' ) ) : echo ' footer-not-gotop'; endif; ?>">
				<?php if ( get_theme_mod( 'penci_footer_logo' ) && ! get_theme_mod( 'penci_hide_footer_logo' ) ) : ?>
					<div id="footer-logo">
						<a href="<?php echo $footer_logo_url; ?>">
							<?php if( ! get_theme_mod('penci_disable_lazyload_layout') ){ ?>
							<img class="penci-lazy" src="<?php echo get_template_directory_uri(); ?>/images/penci-holder.png" data-src="<?php echo esc_url( get_theme_mod( 'penci_footer_logo' ) ); ?>" alt="<?php esc_html_e( 'Footer Logo', 'soledad' ); ?>" />
							<?php } else { ?>
							<img src="<?php echo esc_url( get_theme_mod( 'penci_footer_logo' ) ); ?>" alt="<?php esc_html_e( 'Footer Logo', 'soledad' ); ?>" />
							<?php } ?>
						</a>
					</div>
				<?php endif; ?>

				<?php if( get_theme_mod( 'penci_footer_menu' ) ): ?>
					<div class="footer-menu-wrap" role="navigation" <?php if( ! get_theme_mod('penci_schema_sitenav') ): ?>itemscope itemtype="https://schema.org/SiteNavigationElement"<?php endif; ?>>
					<?php
					/**
					 * Display main navigation
					 */
					wp_nav_menu( array(
						'container'      => false,
						'theme_location' => 'footer-menu',
						'menu_class'     => 'footer-menu'
					) );
					?>
					</div>
				<?php endif; /* End check if enable footer menu */?>

				<?php if ( penci_get_setting( 'penci_footer_copyright' ) ) : ?>
					<div id="footer-copyright">
						<p><?php echo penci_get_setting( 'penci_footer_copyright' ); ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'penci_go_to_top' ) ) : ?>
					<div class="go-to-top-parent"><a href="#" class="go-to-top"><span><?php penci_fawesome_icon('fas fa-angle-up'); ?> <br><?php echo penci_get_setting( 'penci_trans_back_to_top' ); ?></span></a></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'penci_go_to_top_floating' ) ) : ?>
			<div class="penci-go-to-top-floating"><?php penci_fawesome_icon('fas fa-angle-up'); ?></div>
		<?php endif; ?>
	</div>
</footer>

<?php endif; //Hide footer  ?>
</div><!-- End .wrapper-boxed -->
<?php
if ( get_theme_mod( 'penci_menu_hbg_show' ) && ! get_theme_mod( 'penci_vertical_nav_show' ) ) {
	get_template_part( 'template-parts/menu-hamburger' );
}
?>
<?php
/* Get menu related posts popup */
if( is_singular( 'post' ) && get_theme_mod('penci_related_post_popup') ):
get_template_part( 'inc/templates/related_posts-popup' );
endif; ?>

<div id="fb-root"></div>
<?php
$gprd_desc       = penci_get_setting( 'penci_gprd_desc' );
$gprd_accept     = penci_get_setting( 'penci_gprd_btn_accept' );
$gprd_rmore      = penci_get_setting( 'penci_gprd_rmore' );
$gprd_rmore_link = penci_get_setting( 'penci_gprd_rmore_link' );
$penci_gprd_text = penci_get_setting( 'penci_gprd_policy_text' );
if ( get_theme_mod( 'penci_enable_cookie_law' ) && $gprd_desc && $gprd_accept ) :
	?>
	<div class="penci-wrap-gprd-law penci-wrap-gprd-law-close penci-close-all">
		<div class="penci-gprd-law">
			<p>
				<?php if ( $gprd_desc ): echo $gprd_desc; endif; ?>
				<?php if ( $gprd_accept ): echo '<a class="penci-gprd-accept" href="#">' . $gprd_accept . '</a>'; endif; ?>
				<?php if ( $gprd_rmore ): echo '<a class="penci-gprd-more" href="' . $gprd_rmore_link . '">' . $gprd_rmore . '</a>'; endif; ?>
			</p>
		</div>
		<?php if ( ! get_theme_mod( 'penci_show_cookie_law' ) ): ?>
			<a class="penci-gdrd-show" href="#"><?php echo $penci_gprd_text; ?></a>
		<?php endif; ?>
	</div>

<?php endif; ?>
<?php wp_footer(); ?>

<?php if( get_theme_mod('penci_footer_analytics') ):
echo get_theme_mod('penci_footer_analytics');
endif; ?>

</body>
</html>