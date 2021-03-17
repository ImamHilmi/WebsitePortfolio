<?php
/**
 * Socials Widget
 * Get in touch with your clients
 *
 * @package Wordpress
 * @since 1.0
 */

add_action( 'widgets_init', 'penci_social_load_widget' );

function penci_social_load_widget() {
	register_widget( 'penci_social_widget' );
}

if( ! class_exists( 'penci_social_widget' ) ) {
	class penci_social_widget extends WP_Widget {

		/**
		 * Widget setup.
		 */
		function __construct() {
			/* Widget settings. */
			$widget_ops = array( 'classname'   => 'penci_social_widget', 'description' => esc_html__( 'A widget that displays your social icons', 'soledad' ) );

			/* Widget control settings. */
			$control_ops = array( 'id_base' => 'penci_social_widget' );

			/* Create the widget. */
			global $wp_version;
			if( 4.3 > $wp_version ) {
				$this->WP_Widget( 'penci_social_widget', esc_html__( '.Soledad Social Media', 'soledad' ), $widget_ops, $control_ops );
			} else {
				parent::__construct( 'penci_social_widget', esc_html__( '.Soledad Social Media', 'soledad' ), $widget_ops, $control_ops );
			}
		}

		/**
		 * How to display the widget on the screen.
		 */
		function widget( $args, $instance ) {
			extract( $args );

			/* Our variables from the widget settings. */
			$title         = apply_filters( 'widget_title', $instance['title'] );
			$align         = isset( $instance['align'] ) ? $instance['align'] : '';
			$text          = $instance['text'];
			$circle        = isset( $instance['circle'] ) ? $instance['circle'] : false;
			$border_radius = isset( $instance['border_radius'] ) ? $instance['border_radius'] : false;
			$brand_color   = isset( $instance['brand_color'] ) ? $instance['brand_color'] : false;
			$size_icon     = isset( $instance['size_icon'] ) ? $instance['size_icon'] : '14';
			$size_upper    = isset( $instance['size_upper'] ) ? $instance['size_upper'] : false;
			$size_text     = isset( $instance['size_text'] ) ? $instance['size_text'] : '13';
			$facebook      = $instance['facebook'];
			$twitter       = $instance['twitter'];
			$instagram     = $instance['instagram'];
			$youtube       = $instance['youtube'];
			$tumblr        = $instance['tumblr'];
			$behance       = $instance['behance'];
			$linkedin      = $instance['linkedin'];
			$flickr        = $instance['flickr'];
			$pinterest     = $instance['pinterest'];
			$email         = $instance['email'];
			$vk            = $instance['vk'];
			$bloglovin     = isset( $instance['bloglovin'] ) ? $instance['bloglovin'] : '';
			$vine          = isset( $instance['vine'] ) ? $instance['vine'] : '';
			$soundcloud    = isset( $instance['soundcloud'] ) ? $instance['soundcloud'] : '';
			$snapchat      = isset( $instance['snapchat'] ) ? $instance['snapchat'] : '';
			$spotify       = isset( $instance['spotify'] ) ? $instance['spotify'] : '';
			$github        = isset( $instance['github'] ) ? $instance['github'] : '';
			$stack         = isset( $instance['stack'] ) ? $instance['stack'] : '';
			$twitch        = isset( $instance['twitch'] ) ? $instance['twitch'] : '';
			$vimeo         = isset( $instance['vimeo'] ) ? $instance['vimeo'] : '';
			$steam         = isset( $instance['steam'] ) ? $instance['steam'] : '';
			$xing          = isset( $instance['xing'] ) ? $instance['xing'] : '';
			$whatsapp      = isset( $instance['whatsapp'] ) ? $instance['whatsapp'] : '';
			$telegram      = isset( $instance['telegram'] ) ? $instance['telegram'] : '';
			$reddit        = isset( $instance['reddit'] ) ? $instance['reddit'] : '';
			$ok            = isset( $instance['ok'] ) ? $instance['ok'] : '';
			$px500         = isset( $instance['500px'] ) ? $instance['500px'] : '';
			$stumbleupon   = isset( $instance['stumbleupon'] ) ? $instance['stumbleupon'] : '';
			$wechat        = isset( $instance['wechat'] ) ? $instance['wechat'] : '';
			$weibo         = isset( $instance['weibo'] ) ? $instance['weibo'] : '';
			$line          = isset( $instance['line'] ) ? $instance['line'] : '';
			$viber         = isset( $instance['viber'] ) ? $instance['viber'] : '';
			$discord       = isset( $instance['discord'] ) ? $instance['discord'] : '';
			$slack         = isset( $instance['slack'] ) ? $instance['slack'] : '';
			$mixcloud      = isset( $instance['mixcloud'] ) ? $instance['mixcloud'] : '';
			$goodreads     = isset( $instance['goodreads'] ) ? $instance['goodreads'] : '';
			$tripadvisor   = isset( $instance['tripadvisor'] ) ? $instance['tripadvisor'] : '';
			$tiktok        = isset( $instance['tiktok'] ) ? $instance['tiktok'] : '';
			$rss           = $instance['rss'];

			/* Before widget (defined by themes). */
			echo ent2ncr( $before_widget );

			/* Display the widget title if one was input (before and after defined by themes). */
			if ( $title )
				echo ent2ncr( $before_title ) . $title . ( $after_title );

			$style_icon     = 'style="font-size: ' . $size_icon . 'px"';
			$style_icon_svg = 'style="width: ' . $size_icon . 'px;height: ' . $size_icon . 'px"';
			$style_text     = 'style="font-size: ' . $size_text . 'px"';
			?>

			<div class="widget-social<?php if( $align ): echo ' '. $align; endif; ?><?php if( $text ): echo ' show-text'; endif; ?><?php if( $circle ): echo ' remove-circle'; endif; ?><?php if( $size_upper ): echo ' remove-uppercase-text'; endif; ?><?php if( $border_radius ): echo ' remove-border-radius'; endif; ?><?php if( $brand_color && ! $circle ){ echo ' penci-social-colored'; } elseif( $brand_color && $circle ){ echo ' penci-social-textcolored'; } ?>">
				<?php if ( $facebook ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_facebook' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-facebook-f', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Facebook', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $twitter ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_twitter' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-twitter', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Twitter', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $instagram ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_instagram' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-instagram', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Instagram', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $pinterest ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_pinterest' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-pinterest', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Pinterest', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $linkedin ) : ?>
					<a href="<?php echo esc_url( get_theme_mod( 'penci_linkedin' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-linkedin-in', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Linkedin', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $flickr ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_flickr' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-flickr', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Flickr', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $behance ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_behance' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-behance', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Behance', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $tumblr ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_tumblr' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-tumblr', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Tumblr', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $youtube ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_youtube' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-youtube', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Youtube', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $email ) : ?>
					<a href="<?php echo get_theme_mod( 'penci_email_me' ); ?>"><?php penci_fawesome_icon('fas fa-envelope', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Email', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $vk ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_vk' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-vk', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Vk', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $bloglovin ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_bloglovin' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('far fa-heart', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Bloglovin', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $vine ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_vine' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-vine', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Vine', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $soundcloud ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_soundcloud' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-soundcloud', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Soundcloud', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $snapchat ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_snapchat' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-snapchat', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Snapchat', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $spotify ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_spotify' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-spotify', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Spotify', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $github ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_github' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-github', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Github', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $stack ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_stack' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-stack-overflow', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Stack-Overflow', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $twitch ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_twitch' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-twitch', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Twitch', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $vimeo ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_vimeo' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon( 'fab fa-vimeo-v', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Vimeo', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $steam ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_steam' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-steam', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Steam', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $xing ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_xing' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-xing', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Xing', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $whatsapp ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_whatsapp' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-whatsapp', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Whatsapp', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $telegram ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_telegram' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-telegram', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Telegram', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $reddit ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_reddit' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-reddit-alien', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Reddit', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $ok ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_ok' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-odnoklassniki', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Ok', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $px500 ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_500px' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-500px', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( '500px', 'soledad' ); ?></span></a>
				<?php endif; ?>
				
				<?php if ( $stumbleupon ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_stumbleupon' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-stumbleupon', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'StumbleUpon', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $wechat ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_wechat' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-weixin', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Wechat', 'soledad' ); ?></span></a>
				<?php endif; ?>
				
				<?php if ( $weibo ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_weibo' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-weibo', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Weibo', 'soledad' ); ?></span></a>
				<?php endif; ?>
				
				<?php if ( $line ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_line' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social( 'line', $size_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'LINE', 'soledad' ); ?></span></a>
				<?php endif; ?>
				
				<?php if ( $viber ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_viber' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social( 'viber', $size_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Viber', 'soledad' ); ?></span></a>
				<?php endif; ?>
				
				<?php if ( $discord ) : ?>
					<a href="<?php echo esc_attr( get_theme_mod( 'penci_discord' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social( 'discord', $size_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Discord', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $rss ) : ?>
					<a href="<?php echo esc_url( get_theme_mod( 'penci_rss' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fas fa-rss', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'RSS', 'soledad' ); ?></span></a>
				<?php endif; ?>

				<?php if ( $slack ) : ?>
					<a href="<?php echo esc_url( get_theme_mod( 'penci_slack' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-slack', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Slack', 'soledad' ); ?></span></a>
				<?php endif; ?>
				<?php if ( $mixcloud ) : ?>
					<a href="<?php echo esc_url( get_theme_mod( 'penci_mixcloud' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-mixcloud', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Mixcloud', 'soledad' ); ?></span></a>
				<?php endif; ?>
				<?php if ( $goodreads ) : ?>
					<a href="<?php echo esc_url( get_theme_mod( 'penci_goodreads' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social('goodreads', $size_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Goodreads', 'soledad' ); ?></span></a>
				<?php endif; ?>
				<?php if ( $tripadvisor ) : ?>
					<a href="<?php echo esc_url( get_theme_mod( 'penci_tripadvisor' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-tripadvisor', $style_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Tripadvisor', 'soledad' ); ?></span></a>
				<?php endif; ?>
				<?php if ( $tiktok ) : ?>
					<a href="<?php echo esc_url( get_theme_mod( 'penci_tiktok' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social('tiktok', $size_icon ); ?><span <?php echo $style_text; ?>><?php esc_html_e( 'Tiktok', 'soledad' ); ?></span></a>
				<?php endif; ?>
			</div>

			<?php

			/* After widget (defined by themes). */
			echo ent2ncr( $after_widget );
		}

		/**
		 * Update the widget settings.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title']         = $new_instance['title'];
			$instance['text']          = $new_instance['text'];
			$instance['align']         = $new_instance['align'];
			$instance['circle']        = $new_instance['circle'];
			$instance['border_radius'] = $new_instance['border_radius'];
			$instance['brand_color']   = $new_instance['brand_color'];
			$instance['size_icon']     = $new_instance['size_icon'];
			$instance['size_upper']    = $new_instance['size_upper'];
			$instance['size_text']     = $new_instance['size_text'];
			$instance['facebook']      = $new_instance['facebook'];
			$instance['twitter']       = $new_instance['twitter'];
			$instance['instagram']     = $new_instance['instagram'];
			$instance['linkedin']      = $new_instance['linkedin'];
			$instance['flickr']        = $new_instance['flickr'];
			$instance['behance']       = $new_instance['behance'];
			$instance['youtube']       = $new_instance['youtube'];
			$instance['tumblr']        = $new_instance['tumblr'];
			$instance['pinterest']     = $new_instance['pinterest'];
			$instance['email']         = $new_instance['email'];
			$instance['vk']            = $new_instance['vk'];
			$instance['bloglovin']     = $new_instance['bloglovin'];
			$instance['vine']          = $new_instance['vine'];
			$instance['soundcloud']    = $new_instance['soundcloud'];
			$instance['snapchat']      = $new_instance['snapchat'];
			$instance['spotify']       = $new_instance['spotify'];
			$instance['github']        = $new_instance['github'];
			$instance['stack']         = $new_instance['stack'];
			$instance['twitch']        = $new_instance['twitch'];
			$instance['vimeo']         = $new_instance['vimeo'];
			$instance['steam']         = $new_instance['steam'];
			$instance['xing']          = $new_instance['xing'];
			$instance['whatsapp']      = $new_instance['whatsapp'];
			$instance['telegram']      = $new_instance['telegram'];
			$instance['reddit']        = $new_instance['reddit'];
			$instance['ok']            = $new_instance['ok'];
			$instance['500px']         = $new_instance['500px'];
			$instance['stumbleupon']   = $new_instance['stumbleupon'];
			$instance['wechat']        = $new_instance['wechat'];
			$instance['weibo']         = $new_instance['weibo'];
			$instance['line']          = $new_instance['line'];
			$instance['viber']         = $new_instance['viber'];
			$instance['discord']       = $new_instance['discord'];
			$instance['rss']           = $new_instance['rss'];
			$instance['slack']         = $new_instance['slack'];
			$instance['mixcloud']      = $new_instance['mixcloud'];
			$instance['goodreads']     = $new_instance['goodreads'];
			$instance['tripadvisor']   = $new_instance['tripadvisor'];
			$instance['tiktok']       = $new_instance['tiktok'];

			return $instance;
		}


		function form( $instance ) {

			/* Set up some default widget settings. */
			$defaults = array(
				'title'         => 'Keep in touch',
				'text'          => false,
				'align'         => '',
				'circle'        => false,
				'border_radius' => false,
				'brand_color'   => false,
				'size_icon'     => '14',
				'size_upper'    => false,
				'size_text'     => '13',
				'facebook'      => 'on',
				'twitter'       => 'on',
				'instagram'     => 'on',
				'linkedin'      => '',
				'behance'       => '',
				'flickr'        => '',
				'youtube'       => '',
				'tumblr'        => '',
				'pinterest'     => 'on',
				'email'         => '',
				'vk'            => '',
				'bloglovin'     => '',
				'vine'          => '',
				'soundcloud'    => '',
				'snapchat'      => '',
				'spotify'       => '',
				'github'        => '',
				'stack'         => '',
				'twitch'        => '',
				'vimeo'         => '',
				'steam'         => '',
				'xing'          => '',
				'whatsapp'      => '',
				'telegram'      => '',
				'reddit'        => '',
				'ok'            => '',
				'500px'         => '',
				'wechat'        => '',
				'weibo'         => '',
				'stumbleupon'   => '',
				'line'          => '',
				'viber'         => '',
				'discord'       => '',
				'rss'           => '',
				'slack'         => '',
				'mixcloud'      => '',
				'goodreads'     => '',
				'tripadvisor'   => '',
				'tiktok'        => '',
			);
			$instance = wp_parse_args( (array) $instance, $defaults );
			$instance_title = $instance['title'] ? str_replace( '"','&quot;', $instance['title'] ) : '';
			?>

			<!-- Widget Title: Text Input -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:','soledad'); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo $instance_title; ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e('Display Social Text on Right Icons?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" <?php checked( (bool) $instance['text'], true ); ?> />
			</p>

			<!-- Align -->
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('align') ); ?>">Align This Widget:</label>
				<select id="<?php echo esc_attr( $this->get_field_id('align') ); ?>" name="<?php echo esc_attr( $this->get_field_name('align') ); ?>" class="widefat categories" style="width:100%;">
					<option value='pc_aligncenter' <?php if ('' == $instance['align']) echo 'selected="selected"'; ?>>Align Center</option>
					<option value='pc_alignleft' <?php if ('pc_alignleft' == $instance['align']) echo 'selected="selected"'; ?>>Align Left</option>
					<option value='pc_alignright' <?php if ('pc_alignright' == $instance['align']) echo 'selected="selected"'; ?>>Align Right</option>
				</select>
				<small>This option only apply when you hide text on the right side of social icons.</small>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'circle' ) ); ?>"><?php esc_html_e('Remove Border Around Icons?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'circle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'circle' ) ); ?>" <?php checked( (bool) $instance['circle'], true ); ?> />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'border_radius' ) ); ?>"><?php esc_html_e('Remove Border Radius on Border of Icons?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'border_radius' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'border_radius' ) ); ?>" <?php checked( (bool) $instance['border_radius'], true ); ?> />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'brand_color' ) ); ?>"><?php esc_html_e('Use Brand Colors for Social Icons?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'brand_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'brand_color' ) ); ?>" <?php checked( (bool) $instance['brand_color'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'size_icon' ) ); ?>"><?php esc_html_e('Custom Font Size for Icons:', 'soledad'); ?></label>
				<input  type="number" style="width: 50px;" id="<?php echo esc_attr( $this->get_field_id( 'size_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size_icon' ) ); ?>" value="<?php echo esc_attr( $instance['size_icon'] ); ?>" size="3" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'size_upper' ) ); ?>"><?php esc_html_e('Disable Uppercase Text on Right Icons?:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'size_upper' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size_upper' ) ); ?>" <?php checked( (bool) $instance['size_upper'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'size_text' ) ); ?>"><?php esc_html_e('Custom Font Size for Text on Right Icons:', 'soledad'); ?></label>
				<input  type="number" style="width: 50px;" id="<?php echo esc_attr( $this->get_field_id( 'size_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size_text' ) ); ?>" value="<?php echo esc_attr( $instance['size_text'] ); ?>" size="3" />
			</p>

			<p class="description"><?php esc_html_e('Note: Setup your social links in the Appearance -> Customizer','soledad'); ?></p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e('Show Facebook:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" <?php checked( (bool) $instance['facebook'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e('Show Twitter:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" <?php checked( (bool) $instance['twitter'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e('Show Instagram:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" <?php checked( (bool) $instance['instagram'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e('Show Pinterest:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" <?php checked( (bool) $instance['pinterest'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e('Show Likedin:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" <?php checked( (bool) $instance['linkedin'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>"><?php esc_html_e('Show Behance:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'behance' ) ); ?>" <?php checked( (bool) $instance['behance'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>"><?php esc_html_e('Show Flickr:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr' ) ); ?>" <?php checked( (bool) $instance['flickr'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>"><?php esc_html_e('Show Tumblr:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tumblr' ) ); ?>" <?php checked( (bool) $instance['tumblr'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_html_e('Show Youtube:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" <?php checked( (bool) $instance['youtube'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e('Show Email:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" <?php checked( (bool) $instance['email'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>"><?php esc_html_e('Show Vk:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vk' ) ); ?>" <?php checked( (bool) $instance['vk'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'bloglovin' ) ); ?>"><?php esc_html_e('Show Bloglovin:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'bloglovin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bloglovin' ) ); ?>" <?php checked( (bool) $instance['bloglovin'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'vine' ) ); ?>"><?php esc_html_e('Show Vine:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'vine' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vine' ) ); ?>" <?php checked( (bool) $instance['vine'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'soundcloud' ) ); ?>"><?php esc_html_e('Show Soundcloud:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'soundcloud' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'soundcloud' ) ); ?>" <?php checked( (bool) $instance['soundcloud'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'snapchat' ) ); ?>"><?php esc_html_e('Show Snapchat:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'snapchat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'snapchat' ) ); ?>" <?php checked( (bool) $instance['snapchat'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'spotify' ) ); ?>"><?php esc_html_e('Show Spotify:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'spotify' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'spotify' ) ); ?>" <?php checked( (bool) $instance['spotify'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>"><?php esc_html_e('Show Github:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'github' ) ); ?>" <?php checked( (bool) $instance['github'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'stack' ) ); ?>"><?php esc_html_e('Show Stack Overflow:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'stack' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'stack' ) ); ?>" <?php checked( (bool) $instance['stack'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'twitch' ) ); ?>"><?php esc_html_e('Show Twitch:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'twitch' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitch' ) ); ?>" <?php checked( (bool) $instance['twitch'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>"><?php esc_html_e('Show Vimeo:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo' ) ); ?>" <?php checked( (bool) $instance['vimeo'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'steam' ) ); ?>"><?php esc_html_e('Show Steam:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'steam' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'steam' ) ); ?>" <?php checked( (bool) $instance['steam'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'xing' ) ); ?>"><?php esc_html_e('Show Xing:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'xing' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'xing' ) ); ?>" <?php checked( (bool) $instance['xing'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'whatsapp' ) ); ?>"><?php esc_html_e('Show Whatsapp:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'whatsapp' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'whatsapp' ) ); ?>" <?php checked( (bool) $instance['whatsapp'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'telegram' ) ); ?>"><?php esc_html_e('Show Telegram:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'telegram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'telegram' ) ); ?>" <?php checked( (bool) $instance['telegram'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'reddit' ) ); ?>"><?php esc_html_e('Show Reddit:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'reddit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'reddit' ) ); ?>" <?php checked( (bool) $instance['reddit'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'ok' ) ); ?>"><?php esc_html_e('Show Ok:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'ok' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ok' ) ); ?>" <?php checked( (bool) $instance['ok'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( '500px' ) ); ?>"><?php esc_html_e('Show 500px:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( '500px' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( '500px' ) ); ?>" <?php checked( (bool) $instance['500px'], true ); ?> />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'stumbleupon' ) ); ?>"><?php esc_html_e('Show StumbleUpon:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'stumbleupon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'stumbleupon' ) ); ?>" <?php checked( (bool) $instance['stumbleupon'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'wechat' ) ); ?>"><?php esc_html_e('Show Wechat:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'wechat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wechat' ) ); ?>" <?php checked( (bool) $instance['wechat'], true ); ?> />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'weibo' ) ); ?>"><?php esc_html_e('Show Weibo:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'weibo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'weibo' ) ); ?>" <?php checked( (bool) $instance['weibo'], true ); ?> />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'line' ) ); ?>"><?php esc_html_e('Show LINE:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'line' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'line' ) ); ?>" <?php checked( (bool) $instance['line'], true ); ?> />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'viber' ) ); ?>"><?php esc_html_e('Show Viber:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'viber' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'viber' ) ); ?>" <?php checked( (bool) $instance['viber'], true ); ?> />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'discord' ) ); ?>"><?php esc_html_e('Show Discord:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'discord' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'discord' ) ); ?>" <?php checked( (bool) $instance['discord'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'rss' ) ); ?>"><?php esc_html_e('Show RSS:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'rss' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rss' ) ); ?>" <?php checked( (bool) $instance['rss'], true ); ?> />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'slack' ) ); ?>"><?php esc_html_e('Show slack:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'slack' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'slack' ) ); ?>" <?php checked( (bool) $instance['slack'], true ); ?> />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'mixcloud' ) ); ?>"><?php esc_html_e('Show Mixcloud:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'mixcloud' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mixcloud' ) ); ?>" <?php checked( (bool) $instance['mixcloud'], true ); ?> />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'goodreads' ) ); ?>"><?php esc_html_e('Show Goodreads:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'goodreads' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'goodreads' ) ); ?>" <?php checked( (bool) $instance['goodreads'], true ); ?> />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'tripadvisor' ) ); ?>"><?php esc_html_e('Show Tripadvisor:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'tripadvisor' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tripadvisor' ) ); ?>" <?php checked( (bool) $instance['tripadvisor'], true ); ?> />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'tiktok' ) ); ?>"><?php esc_html_e('Show Tiktok:','soledad'); ?></label>
				<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'tiktok' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tiktok' ) ); ?>" <?php checked( (bool) $instance['tiktok'], true ); ?> />
			</p>
		<?php
		}
	}
}
?>