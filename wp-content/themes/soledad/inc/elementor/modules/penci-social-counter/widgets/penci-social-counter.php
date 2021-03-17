<?php
namespace PenciSoledadElementor\Modules\PenciSocialCounter\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciSocialCounter extends Base_Widget {

	public function get_name() {
		return 'penci-social-counter';
	}

	public function get_title() {
		return esc_html__( 'Penci Social Counter', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-share';
	}

	public function get_keywords() {
		return array( 'social counter' );
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
			'app_id', array(
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<span style="color: red;font-weight: bold;">Note Important</span>: You need to setup data for socials sharing via <strong>Dashboard > Soledad > Social Counter</strong> to make this element work.',
				'content_classes' => 'elementor-descriptor',

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
			'social_style', array(
				'label'   => __( 'Choose Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1' => esc_html__( 'Style 1', 'soledad' ),
					's2' => esc_html__( 'Style 2', 'soledad' ),
					's3' => esc_html__( 'Style 3', 'soledad' ),
					's4' => esc_html__( 'Style 4', 'soledad' ),
					's5' => esc_html__( 'Style 5', 'soledad' ),
					's6' => esc_html__( 'Style 6', 'soledad' ),
				)
			)
		);

		$pmetas = array(
			'facebook'       => array( 'label' => __( 'Facebook', 'soledad' ), 'default' => 'yes' ),
			'twitter'        => array( 'label' => __( 'Twitter', 'soledad' ), 'default' => 'yes' ),
			'youtube'        => array( 'label' => __( 'Youtube', 'soledad' ), 'default' => 'yes' ),
			'instagram'      => array( 'label' => __( 'Instagram', 'soledad' ), 'default' => 'yes' ),
			'linkedin'       => array( 'label' => __( 'Linkedin', 'soledad' ), 'default' => '' ),
			'pinterest'      => array( 'label' => __( 'Pinterest', 'soledad' ), 'default' => '' ),
			'flickr'         => array( 'label' => __( 'Flickr', 'soledad' ), 'default' => '' ),
			'dribbble'       => array( 'label' => __( 'Dribbble', 'soledad' ), 'default' => '' ),
			'vimeo'          => array( 'label' => __( 'Vimeo', 'soledad' ), 'default' => '' ),
			'delicious'      => array( 'label' => __( 'Delicious', 'soledad' ), 'default' => '' ),
			'soundcloud'     => array( 'label' => __( 'SoundCloud', 'soledad' ), 'default' => '' ),
			'github'         => array( 'label' => __( 'Github', 'soledad' ), 'default' => '' ),
			'behance '       => array( 'label' => __( 'Behance', 'soledad' ), 'default' => '' ),
			'vk'             => array( 'label' => __( 'VK', 'soledad' ), 'default' => '' ),
			'tumblr'         => array( 'label' => __( 'Tumblr', 'soledad' ), 'default' => '' ),
			'vine'           => array( 'label' => __( 'Vine', 'soledad' ), 'default' => '' ),
			'steam'          => array( 'label' => __( 'Steam', 'soledad' ), 'default' => '' ),
			'email'          => array( 'label' => __( 'Email', 'soledad' ), 'default' => '' ),
			'bloglovin'      => array( 'label' => __( 'Bloglovin', 'soledad' ), 'default' => '' ),
			'rss'            => array( 'label' => __( 'Rss', 'soledad' ), 'default' => '' ),
			'snapchat'       => array( 'label' => __( 'Snapchat', 'soledad' ), 'default' => '' ),
			'spotify'        => array( 'label' => __( 'Spotify', 'soledad' ), 'default' => '' ),
			'stack_overflow' => array( 'label' => __( 'Stack overflow', 'soledad' ), 'default' => '' ),
			'twitch'         => array( 'label' => __( 'Twitch', 'soledad' ), 'default' => '' ),
			'line'           => array( 'label' => __( 'Line', 'soledad' ), 'default' => '' ),
			'xing'           => array( 'label' => __( 'Xing', 'soledad' ), 'default' => '' ),
			'patreon'        => array( 'label' => __( 'patreon', 'soledad' ), 'default' => '' ),
		);

		foreach ( $pmetas as $key => $pmeta ) {
			$this->add_control( 'social_' . $key, array(
					'label'     => $pmeta['label'],
					'type'      => Controls_Manager::SWITCHER,
					'label_on'  => __( 'Show', 'soledad' ),
					'label_off' => __( 'Hide', 'soledad' ),
					'default'   => $pmeta['default'],
					'separator' => '',
				)
			);
		}

		$this->end_controls_section();
		$this->register_block_title_section_controls();
		$this->start_controls_section(
			'section_content_style',
			array(
				'label' => __( 'Block Heading Title', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'social_name_size', array(
				'label'     => __( 'Font size for Social Name', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-socialCT-wrap .penci-social-name' => 'font-size: {{SIZE}}px' ),
			)
		);
		$this->add_responsive_control(
			'social_number_size', array(
				'label'     => __( 'Font size for Social Number', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-socialCT-wrap .penci-social-button' => 'font-size: {{SIZE}}px' ),
			)
		);

		$this->end_controls_section();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$css_class = 'penci-block-vc penci-social-counter';
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content">
				<?php
				$socials = array(
					'facebook', 'twitter', 'youtube', 'instagram',
					'linkedin', 'pinterest', 'flickr', 'dribbble',
					'vimeo', 'delicious', 'soundcloud', 'github',
					'behance ', 'vk', 'tumblr', 'vine', 'steam',
					'email', 'bloglovin', 'rss', 'snapchat',
					'spotify', 'stack-overflow', 'twitch',
					'xing', 'patreon',
				);

				$social_style = isset( $settings['social_style'] ) && $settings['social_style'] ? $settings['social_style'] : 's1';

				$error = array();

				$has_data = false;

				echo '<div class="penci-socialCT-wrap penci-socialCT-' . esc_attr( $social_style ) . '">';

				foreach ( $socials as $social ) {


					if ( empty( $settings[ 'social_' . $social ] ) ) {
						continue;
					}

					$social_info = \PENCI_FW_Social_Counter::get_social_counter( $social );


					$social_info_name = isset( $social_info['name'] ) ? $social_info['name'] : '';

					if ( ! $social_info || ! $social_info_name ) {
						continue;
					}

					$has_data = true;

					$target = 'target="_blank"';
					if ( ! get_theme_mod( 'penci_dis_noopener' ) ) {
						$target .= ' rel=noopener"';
					}

					$count = \PENCI_FW_Social_Counter::format_followers( $social_info['count'] );
					?>
					<div class="penci-socialCT-item penci-social-<?php echo $social . ( ! $social_info['count'] ? ' penci-socialCT-empty' : '' ); ?>">
						<a class="penci-social-content" href="<?php echo esc_url( $social_info['url'] ); ?>" <?php echo $target; ?>>
						<span>
						<?php
						if ( 's1' == $social_style ) {
							echo $social_info['icon'];
							echo '<span class="penci-social-name">' . $social_info['title'] . '</span>';
							echo '<span class="penci-social-button">';

							if ( $count ) {
								echo '<span>' . $count . '</span>';
							}

							echo $social_info['text_btn'];
							echo '</span>';
						} elseif ( 's2' == $social_style ) {
							echo $social_info['icon'];
							echo '<span class="penci-social-name">' . $social_info['title'] . '</span>';
						} elseif ( 's3' == $social_style || 's5' == $social_style || 's6' == $social_style ) {
							echo $social_info['icon'];
						} else {
							echo $social_info['icon'];
							if ( $social_info['count'] ) {
								echo '<span class="penci-social-number">' . $count . '</span>';
								echo '<span class="penci-social-info-text">' . $social_info['text_below'] . '</span>';
							}
						}
						?>
						</span>
						</a>
						<?php
						if( 's6' == $social_style && $social_info['count'] ) {
							echo '<span class="penci-social-number">' . $count . '</span>';
							echo '<span class="penci-social-info-text">' . $social_info['text'] . '</span>';
						}
						?>
					</div>
					<?php

					if ( ! empty( $social_info['error'] ) ) {
						$error[] = $social_info['error'];
					}
				}

				echo '</div>';

				if ( ! $has_data ) {
					$error[] = esc_html__( 'Please go to Dashboad > Soledad > Social Counter, press Social Counter tab then insert social information you want show', 'soledad' );
				}
				?>
			</div>
		</div>
		<?php
	}
}
