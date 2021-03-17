<?php
namespace PenciSoledadElementor\Modules\PenciSocialMedia\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Group_Control_Typography;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciSocialMedia extends Base_Widget {

	public function get_name() {
		return 'penci-social-media';
	}

	public function get_title() {
		return esc_html__( 'Penci Widget Social Media', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-share';
	}

	public function get_keywords() {
		return array( 'social media' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'General', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'penci_block_width', array(
				'label'   => __( 'Element Columns', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 1,
				'options' => array(
					'1' => esc_html__( '1 Column ( Small Container Width)', 'soledad' ),
					'2' => esc_html__( '2 Columns ( Medium Container Width )', 'soledad' ),
					'3' => esc_html__( '3 Columns ( Large Container Width )', 'soledad' ),
				)
			)
		);
		$this->add_control(
			'text_right', array(
				'label'     => __( 'Display Social Text on Right Icons', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
			)
		);
		$this->add_control(
			'alignment', array(
				'label'   => __( 'Alignment', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'pc_alignleft',
				'options' => array(
					'pc_aligncenter' => esc_html__( 'Center', 'soledad' ),
					'pc_alignleft' => esc_html__( 'Left', 'soledad' ),
					'pc_alignright' => esc_html__( 'Right', 'soledad' ),
				)
			)
		);
		$this->add_control(
			'dis_circle', array(
				'label'     => __( 'Remove Border Around Icons ?', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
			)
		);
		$this->add_control(
			'dis_border_radius', array(
				'label'     => __( 'Remove Border Radius on Border of Icons ?', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
			)
		);
		$this->add_control(
			'brand_color', array(
				'label'     => __( 'Use Brand Colors for Social Icons ?', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
			)
		);
		$this->add_responsive_control(
			'size_icon', array(
				'label'     => __( 'Custom Font Size for Icons', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					'{{WRAPPER}} .widget-social i' => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .widget-social svg' => 'width: {{SIZE}}px; height: auto;',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'size_text',
				'label'    => __( 'Typography for Text', 'soledad' ),
				'selector' => '{{WRAPPER}} .widget-social span',
			)
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_show_socials',
			array(
				'label' => __( 'Socials', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$show_socials = $this->get_show_socials();
		foreach ( $show_socials as $social_label => $social_key ) {
			$default = '';
			if( in_array( $social_key, array( 'facebook','twitter','instagram' ) ) ){
				$default = 'yes';
			}

			$this->add_control(
				$social_key, array(
					'label'     => $social_label,
					'type'      => Controls_Manager::SWITCHER,
					'label_on'  => __( 'Yes', 'soledad' ),
					'label_off' => __( 'No', 'soledad' ),
					'default'   => $default,
				)
			);
		}
		$this->end_controls_section();

		$this->register_block_title_section_controls();
		$this->start_controls_section(
			'section_style_content',
			array(
				'label' => __( 'Content', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'social_text_color',
			array(
				'label' => __( 'Icons Color', 'soledad' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .widget-social a i' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'social_text_hcolor',
			array(
				'label' => __( 'Icons Hover Color', 'soledad' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .widget-social a:hover i' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'social_bodcolor',
			array(
				'label' => __( 'Icons Border Color', 'soledad' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .widget-social a i' => 'border-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'social_hbodcolor',
			array(
				'label' => __( 'Icons Border Hover Color', 'soledad' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .widget-social a:hover i' => 'border-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'social_bgcolor',
			array(
				'label' => __( 'Icons Background Color', 'soledad' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .widget-social a i' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'social_bghcolor',
			array(
				'label' => __( 'Icons Hover Background Color', 'soledad' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .widget-social a:hover i' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'social_textcolor',
			array(
				'label' => __( 'Text Color', 'soledad' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .widget-social.show-text a span' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'social_htextcolor',
			array(
				'label' => __( 'Text Hover Color', 'soledad' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .widget-social.show-text a:hover span' => 'color: {{VALUE}};' ),
			)
		);

		$this->end_controls_section();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$css_class = 'penci-block-vc penci-social-media';

		$class_socials = ' widget-social';
		$class_socials .= $settings['alignment'] ? ' ' . $settings['alignment'] : '';
		$class_socials .= $settings['text_right'] ? ' show-text' : '';
		$class_socials .= $settings['dis_circle'] ? ' remove-circle' : '';
		$class_socials .= $settings['dis_border_radius'] ? ' remove-border-radius' : '';

		if ( $settings['brand_color'] && ! $settings['dis_circle'] ) {
			$class_socials .= ' penci-social-colored';
		} elseif ( $settings['brand_color'] && $settings['dis_circle'] ) {
			$class_socials .= ' penci-social-textcolored';
		}

		$style_icon_svg = '';
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content<?php echo esc_attr( $class_socials ); ?>">
				<?php
				$show_socials = $this->get_show_socials();

				foreach ( (array)$show_socials as $social_item ) {
					if( ! $settings[$social_item] ){
						continue;
					}

					switch ($social_item) {
						case 'facebook':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_facebook' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-facebook-f'); ?><span><?php esc_html_e( 'Facebook', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'twitter':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_twitter' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-twitter'); ?><span><?php esc_html_e( 'Twitter', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'instagram':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_instagram' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-instagram'); ?><span><?php esc_html_e( 'Instagram', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'pinterest':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_pinterest' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-pinterest'); ?><span><?php esc_html_e( 'Pinterest', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'linkedin':
							?>
							<a href="<?php echo esc_url( get_theme_mod( 'penci_linkedin' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-linkedin-in'); ?><span><?php esc_html_e( 'Linkedin', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'behance':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_behance' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-behance'); ?><span><?php esc_html_e( 'Behance', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'flickr':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_flickr' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-flickr'); ?><span><?php esc_html_e( 'Flickr', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'tumblr':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_tumblr' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-tumblr'); ?><span><?php esc_html_e( 'Tumblr', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'youtube':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_youtube' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-youtube'); ?><span><?php esc_html_e( 'Youtube', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'email':
							?>
							<a href="<?php echo get_theme_mod( 'penci_email_me' ); ?>"><?php penci_fawesome_icon('fas fa-envelope'); ?><span><?php esc_html_e( 'Email', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'vk':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_vk' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-vk'); ?><span><?php esc_html_e( 'Vk', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'bloglovin':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_bloglovin' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('far fa-heart'); ?><span><?php esc_html_e( 'Bloglovin', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'vine':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_vine' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-vine'); ?><span><?php esc_html_e( 'Vine', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'soundcloud':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_soundcloud' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-soundcloud'); ?><span><?php esc_html_e( 'Soundcloud', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'snapchat':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_snapchat' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-snapchat'); ?><span><?php esc_html_e( 'Snapchat', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'spotify':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_spotify' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-spotify'); ?><span><?php esc_html_e( 'Spotify', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'github':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_github' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-github'); ?><span><?php esc_html_e( 'Github', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'stack':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_stack' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-stack-overflow'); ?><span><?php esc_html_e( 'Stack-Overflow', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'twitch':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_twitch' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-twitch'); ?><span><?php esc_html_e( 'Twitch', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'vimeo':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_vimeo' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-vimeo-v'); ?><span><?php esc_html_e( 'Vimeo', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'steam':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_steam' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-steam'); ?><span><?php esc_html_e( 'Steam', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'xing':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_xing' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-xing'); ?><span><?php esc_html_e( 'Xing', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'whatsapp':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_whatsapp' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-whatsapp'); ?><span><?php esc_html_e( 'Whatsapp', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'telegram':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_telegram' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-telegram'); ?><span><?php esc_html_e( 'Telegram', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'reddit':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_reddit' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-reddit-alien'); ?><span><?php esc_html_e( 'Reddit', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'ok':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_ok' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-odnoklassniki'); ?><span><?php esc_html_e( 'Ok', 'soledad' ); ?></span></a>
							<?php
							break;
						case '500px':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_500px' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-500px'); ?><span><?php esc_html_e( '500px', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'stumbleupon':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_stumbleupon' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-stumbleupon'); ?><span><?php esc_html_e( 'StumbleUpon', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'wechat':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_wechat' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-weixin'); ?><span><?php esc_html_e( 'Wechat', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'weibo':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_weibo' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-weibo'); ?><span><?php esc_html_e( 'Weibo', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'line':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_line' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social( 'line' ); ?><span><?php esc_html_e( 'LINE', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'viber':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_viber' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social( 'viber' ); ?><span><?php esc_html_e( 'Viber', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'discord':
							?>
							<a href="<?php echo esc_attr( get_theme_mod( 'penci_discord' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social( 'discord' ); ?><span><?php esc_html_e( 'Discord', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'rss':
							?>
							<a href="<?php echo esc_url( get_theme_mod( 'penci_rss' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fas fa-rss'); ?><span><?php esc_html_e( 'RSS', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'slack':
							?>
							<a href="<?php echo esc_url( get_theme_mod( 'penci_slack' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-slack'); ?><span><?php esc_html_e( 'Slack', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'mixcloud':
							?>
							<a href="<?php echo esc_url( get_theme_mod( 'penci_mixcloud' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-mixcloud'); ?><span><?php esc_html_e( 'Mixcloud', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'goodreads':
							?>
							<a href="<?php echo esc_url( get_theme_mod( 'penci_goodreads' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social('goodreads'); ?><span><?php esc_html_e( 'Goodreads', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'tripadvisor':
							?>
							<a href="<?php echo esc_url( get_theme_mod( 'penci_tripadvisor' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php penci_fawesome_icon('fab fa-tripadvisor'); ?><span><?php esc_html_e( 'Tripadvisor', 'soledad' ); ?></span></a>
							<?php
							break;
						case 'tiktok':
							?>
							<a href="<?php echo esc_url( get_theme_mod( 'penci_tiktok' ) ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo penci_svg_social('tiktok'); ?><span><?php esc_html_e( 'Tiktok', 'soledad' ); ?></span></a>
							<?php
							break;
					}
				}
				?>
			</div>
		</div>
		<?php
	}

	public function get_show_socials(){
		return array(
			'Show facebook'    => 'facebook',
			'Show twitter'     => 'twitter',
			'Show instagram'   => 'instagram',
			'Show pinterest'   => 'pinterest',
			'Show linkedin'    => 'linkedin',
			'Show behance'     => 'behance',
			'Show flickr'      => 'flickr',
			'Show tumblr'      => 'tumblr',
			'Show youtube'     => 'youtube',
			'Show email'       => 'email',
			'Show vk'          => 'vk',
			'Show bloglovin'   => 'bloglovin',
			'Show vine'        => 'vine',
			'Show soundcloud'  => 'soundcloud',
			'Show snapchat'    => 'snapchat',
			'Show spotify'     => 'spotify',
			'Show github'      => 'github',
			'Show stack'       => 'stack',
			'Show twitch'      => 'twitch',
			'Show vimeo'       => 'vimeo',
			'Show steam'       => 'steam',
			'Show xing'        => 'xing',
			'Show whatsapp'    => 'whatsapp',
			'Show telegram'    => 'telegram',
			'Show reddit'      => 'reddit',
			'Show ok'          => 'ok',
			'Show 500px'       => '500px',
			'Show stumbleupon' => 'stumbleupon',
			'Show wechat'      => 'wechat',
			'Show weibo'       => 'weibo',
			'Show line'        => 'line',
			'Show viber'       => 'viber',
			'Show discord'     => 'discord',
			'Show rss'         => 'rss',
			'Show slack'       => 'slack',
			'Show mixcloud'    => 'mixcloud',
			'Show goodreads'   => 'goodreads',
			'Show tripadvisor' => 'tripadvisor',
			'Show tiktok'      => 'tiktok',
		);
	}
}
