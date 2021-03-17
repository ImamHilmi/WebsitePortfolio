<?php
namespace PenciSoledadElementor\Modules\PenciVideoPlaylist\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciVideoPlaylist extends Base_Widget {

	public function get_name() {
		return 'penci-video-playlist';
	}

	public function get_title() {
		return esc_html__( 'Penci Video Playlist', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-youtube';
	}

	public function get_keywords() {
		return array( 'facebook', 'social', 'embed', 'page' );
	}

	/**
	 * Retrieve the list of scripts the image carousel widget depended on.
	 */
	public function get_script_depends() {
		return array( 'penci-facebook-js' );
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
				'default' => 3,
				'options' => array(
					'1' => esc_html__( '1 Column ( Small Container Width)', 'soledad' ),
					'2' => esc_html__( '2 Columns ( Medium Container Width )', 'soledad' ),
					'3' => esc_html__( '3 Columns ( Large Container Width )', 'soledad' ),
				)
			)
		);

		$this->add_control(
			'app_id', array(
				'type' => Controls_Manager::RAW_HTML,
				'raw' => '<span style="color: red;font-weight: bold;">Note Important</span>: If  you use video come from youtube, please go to Customize &gt; General Options &gt; YouTube API Key and enter an api key.',
				'content_classes' => 'elementor-descriptor',

			)
		);

		$this->add_control(
			'videos_list', array(
				'label'       => __( 'Videos List', 'soledad' ),
				'type'        => Controls_Manager::TEXTAREA,
				'description' => __( 'Enter each video url in a seprated line. Supports: YouTube and Vimeo videos only.', 'soledad' ),
			)
		);
		$this->add_control(
			'hide_duration', array(
				'label'     => __( 'Hide video duration', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
			)
		);
		$this->add_control(
			'hide_order_number', array(
				'label'     => __( 'Hide video order number', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
			)
		);
		$this->add_control(
			'video_title_length', array(
				'label'     => __( 'Title Length for Video', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '10',
				'separator' => 'before',
			)
		);
		$this->add_control(
			'block_id', array(
				'label'   => __( 'Unique ID for Save & Clear Caching', 'soledad' ),
				'type'    => Controls_Manager::TEXT,
				'default' => rand( 1000, 100000 ),
			)
		);
		$this->end_controls_section();

		$this->register_block_title_section_controls();


		// Design
		$this->start_controls_section(
			'section_design_content',
			array(
				'label' => __( 'Content', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'list_video_bgcolor',
			array(
				'label'     => __( 'Background list videos', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-nav' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'video_title_color',
			array(
				'label'     => __( 'Video title color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-playlist-item .penci-video-title' => 'color: {{VALUE}};', ),
			)
		);
		$this->add_control(
			'video_title_hover_color',
			array(
				'label'     => __( 'Video title hover color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-playlist-item .penci-video-title:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'duration_color',
			array(
				'label'     => __( 'Video duration color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video-playlist-item .penci-video-duration' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'order_number_color',
			array(
				'label'     => __( 'Video order number color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-nav .playlist-panel-item' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'order_number_bgcolor',
			array(
				'label'     => __( 'Video order number background color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-nav .playlist-panel-item' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'item_video_border_color',
			array(
				'label'     => __( 'Item video border color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-nav .penci-video-playlist-item' => 'border-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'item_video_bg_hcolor',
			array(
				'label'     => __( 'Item video hover background and border color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-video-nav .penci-video-playlist-item:hover' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'scrollbar_bg_hcolor',
			array(
				'label'     => __( 'Scroll bar background color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-video_playlist .penci-custom-scroll::-webkit-scrollbar-thumb' => 'background-color: {{VALUE}};' ),
			)
		);

		$this->end_controls_section();
		$this->register_heading_title_style_section_controls();
	}

	public function register_block_title_section_controls() {
		$this->start_controls_section(
			'section_title_block',
			array(
				'label' => __( 'Heading Title', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'heading_title_style', array(
				'label'   => __( 'Choose Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''   => esc_html__( 'Default ( follow Customize )', 'soledad' ),
					'style-1' => esc_html__( 'Style 1', 'soledad' ),
					'style-2' => esc_html__( 'Style 2', 'soledad' ),
					'style-3' => esc_html__( 'Style 3', 'soledad' ),
					'style-4' => esc_html__( 'Style 4', 'soledad' ),
					'style-5' => esc_html__( 'Style 5', 'soledad' ),
					'style-6' => esc_html__( 'Style 6', 'soledad' ),
					'style-7' => esc_html__( 'Style 7', 'soledad' ),
					'style-9' => esc_html__( 'Style 8', 'soledad' ),
					'style-8' => esc_html__( 'Style 9', 'soledad' ),
					'style-10' => esc_html__( 'Style 10', 'soledad' ),
					'style-11' => esc_html__( 'Style 11', 'soledad' ),
					'style-12' => esc_html__( 'Style 12', 'soledad' ),
					'style-13' => esc_html__( 'Style 13', 'soledad' ),
					'style-14' => esc_html__( 'Style 14', 'soledad' ),
					'video_list' => esc_html__( 'Style Video List', 'soledad' ),
				)
			)
		);
		$this->add_control(
			'heading', array(
				'label'   => __( 'Heading Title', 'soledad' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Heading Title', 'soledad' ),
			)
		);
		$this->add_control(
			'heading_title_link',
			array(
				'label'       => __( 'Title url', 'soledad' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'soledad' ),
				'separator'   => 'before',
			)
		);

		$this->add_control(
			'add_title_icon', array(
				'label'     => __( 'Add icon for title?', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'soledad' ),
				'label_off' => __( 'Hide', 'soledad' ),
				'default'   => '',
				'separator' => 'before',
			)
		);

		$this->add_control(
			'block_title_icon', array(
				'label'     => __( 'Icon', 'soledad' ),
				'type'      => Controls_Manager::ICON,
				'default'   => 'fas fa-star',
				'condition' => array(
					'add_title_icon' => 'yes'
				),
			)
		);
		$this->add_control(
			'block_title_ialign', array(
				'label'     => __( 'Icon Alignment', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'left',
				'options'   => array(
					'left'  => esc_html__( 'Left', 'soledad' ),
					'right' => esc_html__( 'Right', 'soledad' ),
				),
				'condition' => array(
					'add_title_icon' => 'yes'
				),
			)
		);

		$this->add_control(
			'block_title_align', array(
				'label'   => __( 'Heading Align', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''       => esc_html__( 'Default ( follow Customize )', 'soledad' ),
					'left'   => esc_html__( 'Left', 'soledad' ),
					'center' => esc_html__( 'Center', 'soledad' ),
					'right'  => esc_html__( 'Right', 'soledad' )
				)
			)
		);
		$this->add_control(
			'block_title_marginbt', array(
				'label'     => __( 'Margin Bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-homepage-title' => 'margin-bottom: {{SIZE}}px' ),
			)
		);

		$this->end_controls_section();
	}

	public function register_heading_title_style_section_controls() {
		$this->start_controls_section(
			'section_title_block_style',
			array(
				'label' => __( 'Block Heading Title', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'block_title_color', array(
				'label'     => __( 'Title Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow'   => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-border-arrow .inner-arrow a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-video_playlist .penci-playlist-title' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'block_title_hcolor', array(
				'label'     => __( 'Title Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-video_playlist .penci-playlist-title a:hover' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'block_title_bcolor', array(
				'label'     => __( 'Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow,' .
					'{{WRAPPER}} .style-4.penci-border-arrow .inner-arrow:before,' .
					'{{WRAPPER}} .style-4.penci-border-arrow .inner-arrow:after,' .
					'{{WRAPPER}} .style-5.penci-border-arrow,' .
					'{{WRAPPER}} .style-7.penci-border-arrow,' .
					'{{WRAPPER}} .style-9.penci-border-arrow' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .penci-border-arrow:before'  => 'border-top-color: {{VALUE}}',
				)
			)
		);
		$this->add_control(
			'btitle_outer_bcolor', array(
				'label'     => __( 'Border Outer Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}}  .penci-border-arrow:after' => 'border-color: {{VALUE}};'
				)
			)
		);
		$this->add_control(
			'btitle_style10_btopcolor', array(
				'label'     => __( 'Border Top', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-homepage-title.style-10' => 'border-top-color: {{VALUE}};'
				),
				'condition' => array( 'heading_title_style' => 'style-10' ),
			)
		);
		$this->add_control(
			'btitle_style5_bcolor', array(
				'label'     => __( 'Border Bottom', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-5.penci-border-arrow' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .penci-homepage-title.style-10' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-12.penci-border-arrow' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-11.penci-border-arrow' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-5.penci-border-arrow .inner-arrow' => 'border-bottom-color: {{VALUE}};',
				),
				'condition' => array( 'heading_title_style' => array( 'style-5','style-10','style-11','style-12' ) ),
			)
		);
		$this->add_control(
			'btitle_style78_bcolor', array(
				'label'     => __( 'Border Bottom on Widget Heading Style 7,8', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-7.penci-border-arrow .inner-arrow:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .style-9.penci-border-arrow .inner-arrow:before' => 'background-color: {{VALUE}};'
				),
				'condition' => array( 'heading_title_style' => array( 'style-7', 'style-8' ) ),
			)
		);
		$this->add_control(
			'btitle_shapes_color', array(
				'label'     => __( 'Background Shapes', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-13.pcalign-center .inner-arrow:before,{{WRAPPER}} .style-13.pcalign-right .inner-arrow:before' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .style-13.pcalign-center .inner-arrow:after,{{WRAPPER}} .style-13.pcalign-left .inner-arrow:after' => ' border-right-color: {{VALUE}};',
					'{{WRAPPER}} .style-12 .inner-arrow:before,{{WRAPPER}} .style-12.pcalign-right .inner-arrow:after,{{WRAPPER}} .style-12.pcalign-center .inner-arrow:after' => ' border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .style-11 .inner-arrow:after,{{WRAPPER}} .style-11 .inner-arrow:before' => ' border-top-color: {{VALUE}};'
				),
				'condition' => array( 'heading_title_style' => array( 'style-13','style-11','style-12' ) ),
			)
		);
		$this->add_control(
			'btitle_bgcolor', array(
				'label'     => __( 'Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .style-2.penci-border-arrow:after' => 'border-color: transparent;border-top-color: {{VALUE}};',
					'{{WRAPPER}} .penci-border-arrow .inner-arrow' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-video_playlist .penci-playlist-title' => 'background-color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'btitle_outer_bgcolor', array(
				'label'     => __( 'Background Outer Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow:after' => 'background-color: {{VALUE}};'
				)
			)
		);

		$this->add_control(
			'btitle_style9_bgimg', array(
				'label'       => __( 'Select Background Image for Style 9', 'soledad' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => array( 'active' => true ),
				'responsive'  => true,
				'render_type' => 'template',
				'selectors'   => array( '{{WRAPPER}} .style-8.penci-border-arrow .inner-arrow' => 'background-image: url("{{URL}}");' ),
				'condition' => array( 'heading_title_style' => 'style-8' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'btitle_typo',
				'label'    => __( 'Block Title Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-border-arrow .inner-arrow, {{WRAPPER}} .penci-video_playlist .penci-playlist-title h2',
			)
		);
		$this->end_controls_section();
	}


	protected function render() {
		$settings = $this->get_settings();

		if ( ! $settings['videos_list'] ) {
			return;
		}
		
		$css_class = 'penci-block-vc penci-video_playlist';
		$css_class .= ' pencisc-column-' . $settings['penci_block_width'];
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content">
				<?php
				if ( ! get_theme_mod( 'penci_youtube_api_key' ) && preg_match( "#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $settings['videos_list'], $matches ) ) {
					echo '<strong>Youtube Api key</strong> is empty. Please go to Customize > General Options > YouTube API Key and enter an api key :)';
				}

				$videos = preg_split( '/\r\n|[\r\n]/', $settings['videos_list'] );;
				$videos_list     = get_transient( 'penci-shortcode-playlist-' . $settings['block_id'] );
				$videos_list_key = get_transient( 'penci-shortcode-playlist-key' . $settings['block_id'] );
				$rand_video_list = rand( 1000, 100000 );


				if ( empty( $videos_list ) || $settings['videos_list'] != $videos_list_key ) {
					$videos_list = \Penci_Video_List::get_video_infos( $videos );
					set_transient( 'penci-shortcode-playlist-' . $settings['block_id'], $videos_list, 18000 );
					set_transient( 'penci-shortcode-playlist-key' . $settings['block_id'], $settings['videos_list'], 18000 );
				}
				$videos_count = is_array( $videos_list ) ? count( (array) $videos_list ) : 0;

				if ( ! empty( $videos_list ) ): ?>
					<div class="penci-video-play">
						<?php foreach ( (array) $videos_list as $key => $video ): ?>
							<?php
							if ( $key > 0 ) {
								continue;
							}
							?>
							<div class="fluid-width-video-wrapper">
								<iframe class="penci-video-frame" id="video-<?php echo esc_attr( $rand_video_list ) ?>-1" src="<?php echo esc_attr( $video['id'] ) ?>" width="770" height="434"></iframe>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="penci-video-nav">
						<?php if ( ! empty( $settings['heading'] ) && 'video_list' == $settings['heading_title_style'] ): ?>
							<div class="penci-playlist-title">
								<div class="playlist-title-icon"><?php penci_fawesome_icon('fas fa-play'); ?></span></div>
								<h2>
									<?php
									$attr_link = ' href="#"';
									if ( $settings['heading_title_link']['url'] ) {
										$this->add_render_attribute( 'link', 'href', $settings['heading_title_link']['url'] );
										if ( $settings['heading_title_link']['is_external'] ) {
											$this->add_render_attribute( 'link', 'target', '_blank' );
										}

										if ( $settings['heading_title_link']['nofollow'] ) {
											$this->add_render_attribute( 'link', 'rel', 'nofollow' );
										}

										$attr_link = $this->get_render_attribute_string( 'link' );
									}

									echo( ! empty( $settings['heading_title_link'] ) ? '<a ' . $attr_link . '>' : '<span>' );
									echo esc_html( $settings['heading'] );
									echo( ! empty( $settings['heading_title_link'] ) ? '</a >' : '</span>' );
									?>
								</h2>
								<span class="penci-videos-number">
								<span class="penci-video-playing">1</span> /
								<span class="penci-video-total"><?php echo( $videos_count ) ?></span>
									<?php
									if ( function_exists( 'penci_get_tran_setting' ) ) {
										echo penci_get_tran_setting( 'penci_social_video_text' );
									} else {
										esc_html_e( 'Videos', 'soledad' );
									}
									?>
								</span>
							</div>
						<?php endif; ?>
						<?php
						$class_nav = ( ! empty( $settings['title'] ) && 'video_list' == $settings['heading_title_style'] ) ? ' playlist-has-title' : '';
						$class_nav .= $videos_count > 3 ? ' penci-custom-scroll' : '';

						$direction = is_rtl() ? ' dir="rtl"' : '';
						?>
						<div class="penci-video-playlist-nav<?php echo esc_attr( $class_nav ); ?>"<?php echo( $direction ); ?>>
							<?php
							$video_number = 0;
							foreach ( $videos_list as $video ):
								$video_number ++;
								?>
								<a data-name="video-<?php echo esc_attr( $rand_video_list . '-' . $video_number ) ?>" data-src="<?php echo esc_attr( $video['id'] ) ?>"
								   class="penci-video-playlist-item penci-video-playlist-item-<?php echo esc_attr( $video_number ); ?>">
							<span class="penci-media-obj">
								<span class="penci-mobj-img">
									<?php if ( ! $settings['hide_order_number'] ): ?>
										<span class="playlist-panel-item penci-video-number"><?php echo esc_attr( $video_number ) ?></span>
										<span class="playlist-panel-item penci-video-play-icon"><?php penci_fawesome_icon('fas fa-play'); ?></span>
										<span class="playlist-panel-item penci-video-paused-icon"><?php penci_fawesome_icon('fas fa-pause'); ?></span>
										<?php
									endif;


									$class_lazy = $data_src = '';
									$dis_lazy   = get_theme_mod( 'penci_disable_lazyload_layout' );
									if ( $dis_lazy ) {
										$class_lazy = ' penci-disable-lazy';
										$data_src   = 'style="background-image: url(' . esc_url( $video['thumb'] ) . ');"';
									} else {
										$class_lazy = ' penci-lazy';
										$data_src   = 'data-src="' . esc_url( $video['thumb'] ) . '"';
									}

									printf( '<span class="penci-image-holder penci-video-thumbnail%s" %s><span class="screen-reader-text">%s</span></span>',
										$class_lazy,
										$data_src,
										esc_html__( 'Thumbnail youtube', 'soledad' )
									);
									?>
								</span>
								<span class="penci-mobj-body">
									<span class="penci-video-title" title="<?php echo esc_attr( $video['title'] ); ?>"><?php echo wp_trim_words( $video['title'], $settings['video_title_length'], '...' ); ?></span>
									<?php if ( ! $settings['hide_duration'] ): ?>
										<span class="penci-video-duration"><?php echo esc_attr( $video['duration'] ) ?></span>
									<?php endif; ?>
								</span>
							</span>
								</a>
							<?php endforeach;
							?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
