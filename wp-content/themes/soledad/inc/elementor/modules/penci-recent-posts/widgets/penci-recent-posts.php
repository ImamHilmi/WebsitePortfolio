<?php

namespace PenciSoledadElementor\Modules\PenciRecentPosts\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use PenciSoledadElementor\Modules\QueryControl\Module as Query_Control;
use PenciSoledadElementor\Modules\QueryControl\Controls\Group_Control_Posts;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciRecentPosts extends Base_Widget {

	public function get_name() {
		return 'penci-recent-posts';
	}

	public function get_title() {
		return esc_html__( 'Penci Widget Recent/Popular Posts', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_keywords() {
		return array( 'posts' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		// Section layout
		$this->start_controls_section(
			'section_page_layout', array(
				'label' => esc_html__( 'Layout', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'penci_size', array(
				'label'                => __( 'Image Size Type', 'soledad' ),
				'type'                 => Controls_Manager::SELECT,
				'default'              => '',
				'options'              => array(
					''           => esc_html__( 'Default', 'soledad' ),
					'horizontal' => esc_html__( 'Horizontal Size', 'soledad' ),
					'square'     => esc_html__( 'Square Size', 'soledad' ),
					'vertical'   => esc_html__( 'Vertical Size', 'soledad' ),
					'custom'     => esc_html__( 'Custom', 'soledad' ),
				),
				'selectors'            => array( '{{WRAPPER}} .penci-image-holder:before' => '{{VALUE}}', ),
				'selectors_dictionary' => array(
					'horizontal' => 'padding-top: 66.6667%;',
					'square'     => 'padding-top: 100%;',
					'vertical'   => 'padding-top: 135.4%;',
				),
			)
		);
		$this->add_responsive_control(
			'penci_img_ratio', array(
				'label'          => __( 'Image Ratio', 'soledad' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => array( 'size' => 0.66 ),
				'tablet_default' => array( 'size' => '' ),
				'mobile_default' => array( 'size' => 0.5 ),
				'range'          => array( 'px' => array( 'min' => 0.1, 'max' => 2, 'step' => 0.01 ) ),
				'selectors'      => array(
					'{{WRAPPER}} .penci-image-holder:before' => 'padding-top: calc( {{SIZE}} * 100% );',
				),
				'condition'      => array( 'penci_size' => 'custom' ),
			)
		);
		$this->add_control(
			'title_length', array(
				'label'       => __( 'Custom words length for post titles', 'soledad' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => __( 'If your post titles is too long - You can use this option for trim it. Fill number value here.', 'soledad' ),
			)
		);

		$this->add_control(
			'hide_thumb', array(
				'label'   => __( 'Hide thumbnail', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			)
		);
		$this->add_control(
			'thumbright', array(
				'label'   => __( 'Display thumbnail on right?', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
				'condition' => array( 'hide_thumb!' => 'yes' ),
			)
		);
		$this->add_control(
			'twocolumn', array(
				'label'       => __( 'Display on 2 columns?', 'soledad' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => __( 'If you use 2 columns option, it will ignore option display thumbnail on right.', 'soledad' ),
			)
		);
		$this->add_control(
			'featured', array(
				'label' => __( 'Display 1st post featured?', 'soledad' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'featured2', array(
				'label' => __( 'Display featured post style 2?', 'soledad' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'allfeatured', array(
				'label'       => __( 'Display all post featured?', 'soledad' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => __( 'If you use all post featured option, it will ignore option display thumbnail on right & 2 columns.', 'soledad' ),
			)
		);
		$this->add_control(
			'hide_postdate', array(
				'label' => __( 'Hide post date?', 'soledad' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'icon_format', array(
				'label' => __( 'Enable icon post format?', 'soledad' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);

		$this->end_controls_section();
		$this->register_query_section_controls();
		$this->register_block_title_section_controls();
		$this->start_controls_section(
			'section_post_style',
			array(
				'label' => __( 'Post', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'pborder_color', array(
				'label'     => __( 'Borders Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  ul.side-newsfeed li' => 'border-color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'heading_ptitle_style', array(
				'label' => __( 'Post Title', 'soledad' ),
				'type'  => Controls_Manager::HEADING
			)
		);

		$this->add_control(
			'ptitle_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text h4 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text h4'   => 'color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'ptitle_hcolor', array(
				'label'     => __( 'Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text h4 a:hover' => 'color: {{VALUE}};',
				)
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'ptitle_typo',
				'selector' => '{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text h4 a,{{WRAPPER}}  ul.side-newsfeed li .side-item .side-item-text h4'
			)
		);

		$this->add_control(
			'heading_pmeta_style', array(
				'label' => __( 'Post Meta', 'soledad' ),
				'type'  => Controls_Manager::HEADING
			)
		);

		$this->add_control(
			'pmeta_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text .side-item-meta' => 'color: {{VALUE}};',
				)
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pmeta_typo',
				'selector' => '{{WRAPPER}} ul.side-newsfeed li .side-item .side-item-text .side-item-meta'
			)
		);
		$this->end_controls_section();
		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		$query_args = Query_Control::get_query_args( 'posts', $settings );
		$loop       = new \WP_Query( $query_args );

		if ( ! $loop->have_posts() ) {
			return;
		}

		$title_length = intval( $settings['title_length'] );
		$featured     = 'yes' == $settings['featured'] ? true : false;
		$twocolumn    = 'yes' == $settings['twocolumn'] ? true : false;
		$featured2    = 'yes' == $settings['featured2'] ? true : false;
		$allfeatured  = 'yes' == $settings['allfeatured'] ? true : false;
		$thumbright   = 'yes' == $settings['thumbright'] ? true : false;
		$postdate     = 'yes' == $settings['hide_postdate'] ? true : false;
		$icon         = 'yes' == $settings['icon_format'] ? true : false;

		$css_class = 'penci-block-vc penci_recent-posts-sc';
		$rand      = rand( 1000, 10000 );
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content">
				<ul id="penci-latestwg-<?php echo sanitize_text_field( $rand ); ?>" class="side-newsfeed<?php if ( $twocolumn && ! $allfeatured ): echo ' penci-feed-2columns';
					if ( $featured ) {
						echo ' penci-2columns-featured';
					} else {
						echo ' penci-2columns-feed';
					} endif; ?>">
					<?php $num = 1;
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<li class="penci-feed<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): echo ' featured-news';
							if ( $featured2 ): echo ' featured-news2'; endif; endif; ?><?php if ( $allfeatured ): echo ' all-featured-news'; endif; ?>">
							<div class="side-item">

								<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) : ?>
									<div class="side-image<?php if ( $thumbright ): echo ' thumbnail-right'; endif; ?>">
										<?php
										/* Display Review Piechart  */
										if ( function_exists( 'penci_display_piechart_review_html' ) ) {
											$size_pie = 'small';
											if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): $size_pie = 'normal'; endif;
											penci_display_piechart_review_html( get_the_ID(), $size_pie );
										}
										$thumb = penci_featured_images_size( 'small' );
										if ( ( ( $num == 1 ) && $featured ) || $allfeatured ): $thumb = penci_featured_images_size(); endif;

										if( ! $settings['hide_thumb'] ) {
										?>
											<?php if ( ! get_theme_mod( 'penci_disable_lazyload_layout' ) ) { ?>
												<a class="penci-image-holder penci-lazy<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ) {
													echo '';
												} else {
													echo ' small-fix-size';
												} ?>" rel="bookmark" data-src="<?php echo penci_get_featured_image_size( get_the_ID(), $thumb ); ?>" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
											<?php } else { ?>
												<a class="penci-image-holder<?php if ( ( ( $num == 1 ) && $featured ) || $allfeatured ) {
													echo '';
												} else {
													echo ' small-fix-size';
												} ?>" rel="bookmark" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $thumb ); ?>');" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
											<?php } ?>
										<?php } ?>
										<?php if ( $icon ): ?>
											<?php if ( has_post_format( 'video' ) ) : ?>
												<a href="<?php the_permalink() ?>" class="icon-post-format"><?php penci_fawesome_icon( 'fas fa-play' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'audio' ) ) : ?>
												<a href="<?php the_permalink() ?>" class="icon-post-format"><?php penci_fawesome_icon( 'fas fa-music' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'link' ) ) : ?>
												<a href="<?php the_permalink() ?>" class="icon-post-format"><?php penci_fawesome_icon( 'fas fa-link' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'quote' ) ) : ?>
												<a href="<?php the_permalink() ?>" class="icon-post-format"><?php penci_fawesome_icon( 'fas fa-quote-left' ); ?></a>
											<?php endif; ?>
											<?php if ( has_post_format( 'gallery' ) ) : ?>
												<a href="<?php the_permalink() ?>" class="icon-post-format"><?php penci_fawesome_icon( 'far fa-image' ); ?></a>
											<?php endif; ?>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<div class="side-item-text">
									<h4 class="side-title-post">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
											<?php
											if ( ! $title_length || ! is_numeric( $title_length ) ) {
												if ( $featured2 && ( ( ( $num == 1 ) && $featured ) || $allfeatured ) ) {
													echo wp_trim_words( wp_strip_all_tags( get_the_title() ), 12, '...' );
												} else {
													the_title();
												}
											} else {
												echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $title_length, '...' );
											}
											?>
										</a>
									</h4>
									<?php if ( ! $postdate ): ?>
										<span class="side-item-meta"><?php penci_soledad_time_link(); ?></span>
									<?php endif; ?>
								</div>
							</div>
						</li>
						<?php $num ++; endwhile; ?>
				</ul>
				<?php
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
	}
}
