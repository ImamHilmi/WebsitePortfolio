<?php
$output = $penci_block_width = $el_class = $css_animation = $css = '';

$text_right = $alignment = $dis_circle = $dis_border_radius = $brand_color = '';
$size_icon = $size_upper = $size_text = $show_socials = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if( ! $show_socials ) {
	return;
}

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'penci-block-vc penci-social-media';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id = Penci_Vc_Helper::get_unique_id_block( 'social_media' );

$class_socials = ' widget-social';
$class_socials .= $alignment ? ' ' . $alignment : '';
$class_socials .= $text_right ? ' show-text' : '';
$class_socials .= $dis_circle ? ' remove-circle' : '';
$class_socials .= $size_upper ? ' remove-uppercase-text' : '';
$class_socials .= $dis_border_radius ? ' remove-border-radius' : '';

if ( $brand_color && ! $dis_circle ) {
	$class_socials .= ' penci-social-colored';
} elseif ( $brand_color && $dis_circle ) {
	$class_socials .= ' penci-social-textcolored';
}

$style_icon     = 'style="font-size: ' . $size_icon . '"';
$style_icon_svg = 'style="width: ' . $size_icon . 'px;height: auto;"';
$style_text     = 'style="font-size: ' . $size_text . '"';

?>
	<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
		<?php Penci_Vc_Helper::markup_block_title( $atts ); ?>
		<div class="penci-block_content<?php echo esc_attr( $class_socials ); ?>">
			<?php
			$show_socials = explode(',', $show_socials );
			foreach ( (array)$show_socials as $social_item ) {
				switch ($social_item) {
					case 'facebook':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_facebook' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-facebook-f', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Facebook', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'twitter':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_twitter' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-twitter', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Twitter', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'instagram':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_instagram' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-instagram', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Instagram', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'pinterest':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_pinterest' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-pinterest', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Pinterest', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'linkedin':
						?>
						<a href="<?php echo esc_url( get_theme_mod( 'penci_linkedin' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-linkedin-in', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Linkedin', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'behance':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_behance' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-behance', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Behance', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'flickr':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_flickr' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-flickr', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Flickr', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'tumblr':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_tumblr' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-tumblr', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Tumblr', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'youtube':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_youtube' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-youtube', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Youtube', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'email':
						?>
						<a href="<?php echo get_theme_mod( 'penci_email_me' ); ?>"><?php penci_fawesome_icon('fas fa-envelope', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Email', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'vk':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_vk' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-vk', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Vk', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'bloglovin':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_bloglovin' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('far fa-heart', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Bloglovin', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'vine':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_vine' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-vine', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Vine', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'soundcloud':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_soundcloud' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-soundcloud', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Soundcloud', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'snapchat':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_snapchat' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-snapchat', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Snapchat', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'spotify':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_spotify' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-spotify', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Spotify', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'github':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_github' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-github', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Github', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'stack':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_stack' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-stack-overflow', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Stack-Overflow', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'twitch':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_twitch' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-twitch', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Twitch', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'vimeo':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_vimeo' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-vimeo-v', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Vimeo', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'steam':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_steam' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-steam', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Steam', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'xing':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_xing' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-xing', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Xing', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'whatsapp':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_whatsapp' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-whatsapp', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Whatsapp', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'telegram':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_telegram' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-telegram', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Telegram', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'reddit':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_reddit' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-reddit-alien', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Reddit', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'ok':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_ok' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-odnoklassniki', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Ok', 'soledad' ); ?></span></a>
						<?php
						break;
					case '500px':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_500px' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-500px', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( '500px', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'stumbleupon':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_stumbleupon' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-stumbleupon', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'StumbleUpon', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'wechat':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_wechat' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-weixin', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Wechat', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'weibo':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_weibo' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-weibo', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Weibo', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'line':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_line' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social( 'line', $size_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'LINE', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'viber':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_viber' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social( 'viber', $size_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Viber', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'discord':
						?>
						<a href="<?php echo esc_attr( get_theme_mod( 'penci_discord' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social( 'discord', $size_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Discord', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'rss':
						?>
						<a href="<?php echo esc_url( get_theme_mod( 'penci_rss' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fas fa-rss', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'RSS', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'slack':
						?>
						<a href="<?php echo esc_url( get_theme_mod( 'penci_slack' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-slack', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Slack', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'mixcloud':
						?>
						<a href="<?php echo esc_url( get_theme_mod( 'penci_mixcloud' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-mixcloud', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Mixcloud', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'goodreads':
						?>
						<a href="<?php echo esc_url( get_theme_mod( 'penci_goodreads' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social('goodreads',$style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Goodreads', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'tripadvisor':
						?>
						<a href="<?php echo esc_url( get_theme_mod( 'penci_tripadvisor' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-tripadvisor', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Tripadvisor', 'soledad' ); ?></span></a>
						<?php
						break;
					case 'tiktok':
						?>
						<a href="<?php echo esc_url( get_theme_mod( 'penci_tiktok' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social('tiktok', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Tiktok', 'soledad' ); ?></span></a>
						<?php
						break;
				}
			}
			?>
		</div>
	</div>
<?php

$id_social_media = '#' . $block_id;
$css_custom = Penci_Vc_Helper::get_heading_block_css( $id_social_media, $atts );

if ( $atts['size_icon'] ) {
	$css_custom .= $id_social_media . ' .widget-social i{ font-size:' . esc_attr( $atts['size_icon'] ) . ' !important; }';
}
if ( $atts['size_icon'] ) {
	$css_custom .= $id_social_media . ' .widget-social svg{ width:' . esc_attr( $atts['size_icon'] ) . ' !important; height: auto; }';
}

// Color
if ( $atts['social_text_color'] ) {
	$css_custom .= $id_social_media . ' .widget-social a i{ color: ' . esc_attr( $atts['social_text_color'] ) . '; }';
}
if ( $atts['social_text_hcolor'] ) {
	$css_custom .= $id_social_media . ' .widget-social a:hover i{ color: ' . esc_attr( $atts['social_text_hcolor'] ) . '; }';
}
if ( $atts['social_bodcolor'] ) {
	$css_custom .= $id_social_media . ' .widget-social a i{ border-color: ' . esc_attr( $atts['social_bodcolor'] ) . '; }';
}
if ( $atts['social_hbodcolor'] ) {
	$css_custom .= $id_social_media . ' .widget-social a:hover i{ border-color: ' . esc_attr( $atts['social_hbodcolor'] ) . '; }';
}
if ( $atts['social_bgcolor'] ) {
	$css_custom .= $id_social_media . ' .widget-social a i{ background-color: ' . esc_attr( $atts['social_bgcolor'] ) . '; }';
}
if ( $atts['social_bghcolor'] ) {
	$css_custom .= $id_social_media . ' .widget-social a:hover i{ background-color: ' . esc_attr( $atts['social_bghcolor'] ) . '; }';
}
if ( $atts['social_textcolor'] ) {
	$css_custom .= $id_social_media . ' .widget-social.show-text a span{ color: ' . esc_attr( $atts['social_textcolor'] ) . '; }';
}
if ( $atts['social_htextcolor'] ) {
	$css_custom .= $id_social_media . ' .widget-social.show-text a:hover span{ color: ' . esc_attr( $atts['social_htextcolor'] ) . '; }';
}

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
