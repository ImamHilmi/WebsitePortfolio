<?php
namespace PenciSoledadElementor\Modules\PenciLatestTweets\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciLatestTweets extends Base_Widget {

	public function get_name() {
		return 'penci-latest-tweets';
	}

	public function get_title() {
		return esc_html__( 'Penci Latest Tweets', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_keywords() {
		return array( 'tweets', 'social' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		// Section layout
		$this->start_controls_section(
			'section_page', array(
				'label' => esc_html__( 'Latest Tweets', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'note_important', array(
				'type'            => Controls_Manager::RAW_HTML,
				'raw'             => sprintf( __( 'Note Important: To use this widget you need fill complete your twitter information <a target="_blank" href="%s">here</a>', 'soledad' ), admin_url( 'options-general.php?page=tdf_settings' ) ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',

			)
		);
		$this->add_control(
			'tweets_align', array(
				'label'   => __( 'Align This Widget', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'pc_aligncenter',
				'options' => array(
					'pc_aligncenter' => esc_html__( 'Align Center', 'soledad' ),
					'pc_alignleft'   => esc_html__( 'Align Left', 'soledad' ),
					'pc_alignright'  => esc_html__( 'Align Right', 'soledad' ),
				)
			)
		);

		$this->add_control(
			'tweets_hide_date', array(
				'label'     => __( 'Hide tweets date?', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
				'default'   => '',
			)
		);
		$this->add_control(
			'tweets_dis_auto', array(
				'label'     => __( 'Disable Auto Play Tweets Slider?', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
				'default'   => '',
			)
		);
		$this->add_control(
			'tweets_reply', array(
				'label'       => __( 'Custom Reply text', 'soledad' ),
				'default'     => esc_html__( 'Reply', 'soledad' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'tweets_retweet', array(
				'label'       => __( 'Custom Retweet text', 'soledad' ),
				'default'     => esc_html__( 'Retweet', 'soledad' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'tweets_favorite', array(
				'label'       => __( 'Custom Favorite text', 'soledad' ),
				'default'     => esc_html__( 'Favorite', 'soledad' ),
				'label_block' => true,
			)
		);

		$this->end_controls_section();
		$this->register_block_title_section_controls();
		$this->start_controls_section(
			'section_latest_tweets_style',
			array(
				'label' => __( 'Latest Tweets', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'tweets_text_headings',
			array(
				'label'     => __( 'Text', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
			)
		);
		$this->add_control(
			'tweets_text_color', array(
				'label'     => __( 'Text color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .tweet-text'   => 'color: {{VALUE}};' )
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'tweets_text_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .tweet-text',
			)
		);
		$this->add_control(
			'tweets_date_headings',
			array(
				'label'     => __( 'Date', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'tweets_date_color', array(
				'label'     => __( 'Date color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .tweet-date'   => 'color: {{VALUE}};' )
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'tweets_date_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .tweet-date',
			)
		);
		$this->add_control(
			'tweets_link_headings',
			array(
				'label'     => __( 'Icon and Link', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'tweets_link_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-tweets-widget-content .tweet-intents-inner:after'  => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-tweets-widget-content .tweet-intents-inner:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .tweet-text a,' .
					'{{WRAPPER}} .penci-tweets-widget-content .icon-tweets,' .
					'{{WRAPPER}} .penci-tweets-widget-content .tweet-intents span:after,' .
					'{{WRAPPER}} .penci-tweets-widget-content .tweet-intents a' => 'color: {{VALUE}};',
				)
			)
		);
		$this->add_responsive_control(
			'tweets_link_size', array(
				'label'     => __( 'Font size', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-tweets-widget-content .tweet-intents a' => 'font-size: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'tweets_dots_headings',
			array(
				'label'     => __( 'Dots', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'tweets_dot_color',
			array(
				'label'     => __( 'Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array( '{{WRAPPER}} .penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot span' => 'border-color: {{VALUE}};background-color:{{VALUE}};' ),
			)
		);
		$this->add_control(
			'tweets_dot_hcolor',
			array(
				'label'     => __( 'Border and Background Active Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot:hover span,' .
					'{{WRAPPER}} .penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot.active span' => 'border-color: {{VALUE}};background-color:{{VALUE}};'
				),
			)
		);

		$this->end_controls_section();

		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$tweets = getTweets(5);
		if( empty( $tweets ) ){
			return;
		}

		$css_class = 'penci-block-vc penci-latest-tweets-widget';

		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content">
				<?php
				if( isset( $tweets['error'] ) ) {
					echo 'Missing consumer key - please check your settings in admin > Settings > Twitter Feed Auth';
				} else {
					?>
					<div class="penci-tweets-widget-content <?php echo esc_attr( $settings['tweets_align'] ); ?>">
						<span class="icon-tweets"><?php penci_fawesome_icon('fab fa-twitter'); ?></span>
						<div class="penci-owl-carousel penci-owl-carousel-slider penci-tweets-slider" data-dots="true" data-nav="false" data-auto="<?php if( $settings['tweets_dis_auto'] ){ echo 'false'; } else { echo 'true'; } ?>">
							<?php foreach( $tweets as $tweet ):
								$date_array = explode( ' ', $tweet['created_at'] );
								$tweet_id = $tweet['id_str'];
								$tweet_text = $tweet['text'];
								$urls = $tweet['entities']['urls'];

								if( isset( $urls ) ) {
									foreach ( $urls as $ul ) {
										$url = $ul['url'];
										if( isset( $url ) ):
											$tweet_text = str_replace( $url, '<a href="'. $url .'" target="_blank">'. $url .'</a>', $tweet_text );
										endif;
									}
								}
								?>
								<div class="penci-tweet">
									<div class="tweet-text">
										<?php echo $tweet_text; ?>
									</div>
									<?php
									if( $date_array[1] && $date_array[2] && $date_array[5] && ! $settings['tweets_hide_date'] ): ?>
										<p class="tweet-date"><?php echo $date_array[2] . '-' . $date_array[1] . '-' . $date_array[5]; ?></p>
									<?php endif; ?>
									<div class="tweet-intents">
										<div class="tweet-intents-inner">
											<span><a target="_blank" class="reply" href="https://twitter.com/intent/tweet?in_reply_to=<?php echo sanitize_text_field( $tweet_id ); ?>"><?php echo do_shortcode( $settings['tweets_reply'] ); ?></a></span>
											<span><a target="_blank" class="retweet" href="https://twitter.com/intent/retweet?tweet_id=<?php echo sanitize_text_field( $tweet_id ); ?>"><?php echo do_shortcode( $settings['tweets_retweet'] ); ?></a></span>
											<span><a target="_blank" class="favorite" href="https://twitter.com/intent/favorite?tweet_id=<?php echo sanitize_text_field( $tweet_id ); ?>"><?php echo do_shortcode( $settings['tweets_favorite'] ); ?></a></span>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<?php
				}
				?>
			</div>
		</div>
		<?php
	}
}
