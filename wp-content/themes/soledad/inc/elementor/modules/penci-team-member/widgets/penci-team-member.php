<?php

namespace PenciSoledadElementor\Modules\PenciTeamMember\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Group_Control_Image_Size;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciTeamMember extends Base_Widget {

	public function get_name() {
		return 'penci-team-member';
	}

	public function get_title() {
		return esc_html__( 'Penci Team Members', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_keywords() {
		return array( 'team memeber' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		$this->start_controls_section(
			'section_temmembers', array(
				'label' => esc_html__( 'Team memebers', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'image',
			array(
				'label'   => __( 'Choose Image', 'soledad' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array( 'url' => Utils::get_placeholder_image_src() ),
			)
		);
		$repeater->add_control(
			'name', array(
				'label' => __( 'Name', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'position', array(
				'label' => __( 'Position', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'desc', array(
				'label' => __( 'Description', 'soledad' ),
				'type'  => Controls_Manager::TEXTAREA,
			)
		);
		$repeater->add_control(
			'link_website', array(
				'label' => __( 'Link Website', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'link_facebook', array(
				'label' => __( 'Link Facebook', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'link_twitter', array(
				'label' => __( 'Link Twitter', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'link_linkedin', array(
				'label' => __( 'Link Linkedin', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'link_instagram', array(
				'label' => __( 'Link Instagram', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'link_youtube', array(
				'label' => __( 'Link Youtube', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'link_vimeo', array(
				'label' => __( 'Link Vimeo', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'link_pinterest', array(
				'label' => __( 'Link Pinterest', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'link_dribbble', array(
				'label' => __( 'Link Dribbble', 'soledad' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'teammembers', array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'name'          => __( 'Team member #1', 'soledad' ),
						'desc'          => 'I am text block. Click edit button to change this text.',
						'link'          => __( 'https://your-link.com', 'soledad' ),
						'image'         => array( 'url' => Utils::get_placeholder_image_src() ),
						'link_website'  => '#',
						'link_facebook' => '#',
						'link_twitter'  => '#',
					),
					array(
						'name'          => __( 'Team member #1', 'soledad' ),
						'desc'          => 'I am text block. Click edit button to change this text.',
						'link'          => __( 'https://your-link.com', 'soledad' ),
						'image'         => array( 'url' => Utils::get_placeholder_image_src() ),
						'link_website'  => '#',
						'link_facebook' => '#',
						'link_twitter'  => '#',
					),
					array(
						'name'          => __( 'Team member #1', 'soledad' ),
						'desc'          => 'I am text block. Click edit button to change this text.',
						'link'          => __( 'https://your-link.com', 'soledad' ),
						'image'         => array( 'url' => Utils::get_placeholder_image_src() ),
						'link_website'  => '#',
						'link_facebook' => '#',
						'link_twitter'  => '#',
					)
				),
				'title_field' => '{{{ name }}}',
			)
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_layout', array(
				'label' => esc_html__( 'Layout', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'style', array(
				'label'   => __( 'Choose Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1' => esc_html__( 'Style 1', 'soledad' ),
					's2' => esc_html__( 'Style 2', 'soledad' ),
					's3' => esc_html__( 'Style 3', 'soledad' ),
					's4' => esc_html__( 'Style 4', 'soledad' ),
				)
			)
		);
		$this->add_responsive_control(
			'columns', array(
				'label'          => __( 'Columns', 'soledad' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options'        => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				)
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'      => 'penci_img',
				'default'   => 'thumbnail',
				'separator' => 'none',
			)
		);

		$this->add_control(
			'height_team', array(
				'label'     => __( 'Set height team member', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-teammb-item .penci-teammb-inner' => 'height: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'border_width_team', array(
				'label'     => __( 'Set border width team member', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-teammb-item .penci-teammb-img' => 'border-width: {{SIZE}}px' ),
			)
		);
		$this->add_control(
			'width_img', array(
				'label'     => __( 'Set width for Image', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-teammb-item .penci-teammb-img' => 'width: {{SIZE}}px;' ),
			)
		);
		$this->add_control(
			'height_img', array(
				'label'     => __( 'Set height for Image', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'selectors' => array( '{{WRAPPER}} .penci-teammb-item .penci-teammb-img' => 'height: {{SIZE}}px;' ),
			)
		);
		$this->add_responsive_control(
			'row_gap', array(
				'label'     => __( 'Rows Gap', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}}  .pencisc-grid' => 'grid-row-gap: {{SIZE}}px' ),
			)
		);
		$this->add_responsive_control(
			'col_gap', array(
				'label'     => __( 'Columns Gap', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}}  .pencisc-grid' => 'grid-column-gap: {{SIZE}}px' ),
			)
		);

		$this->end_controls_section();


		$this->register_block_title_section_controls();

		$this->start_controls_section(
			'section_style_content',
			array(
				'label' => __( 'Team Members', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'heading_team_name',
			array(
				'label' => __( 'Name', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$this->add_control(
			'team_name_color',
			array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-team_member_name' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'team_name_typo',
				'selector' => '{{WRAPPER}} .penci-team_member_name',
			)
		);
		$this->add_control(
			'team_name_martop', array(
				'label'     => __( 'Margin Top', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-teammb-s2 .penci-teammb-img'       => 'margin-bottom: {{SIZE}}px',
					'{{WRAPPER}} .penci-teammb-s1 .penci-teammb-img'       => 'margin-bottom: {{SIZE}}px',
					'{{WRAPPER}} .penci-teammb-s3 .penci-team_member_name' => 'margin-top: {{SIZE}}px',
					'{{WRAPPER}} .penci-teammb-s4 .penci-team_member_name' => 'margin-top: {{SIZE}}px',
				),
			)
		);
		$this->add_control(
			'heading_team_pos',
			array(
				'label'     => __( 'Position', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'team_pos_color',
			array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-team_member_pos' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'team_pos_typo',
				'selector' => '{{WRAPPER}} .penci-team_member_pos',
			)
		);
		$this->add_control(
			'team_pos_martop', array(
				'label'     => __( 'Margin Top', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-team_member_pos, {{WRAPPER}} .penci-team_member_name + .penci-team_member_pos' => 'margin-top: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'team_desc_hcolor',
			array(
				'label'     => __( 'Description Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-team_member_desc' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'heading_team_desc',
			array(
				'label'     => __( 'Position', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'team_desc_typo',
				'selector' => '{{WRAPPER}} .penci-team_member_desc',
			)
		);
		$this->add_control(
			'team_desc_martop', array(
				'label'     => __( 'Margin Top for Description', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-team_member_desc' => 'margin-top: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'heading_team_social',
			array(
				'label'     => __( 'Social Icon', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'team_social_color',
			array(
				'label'     => __( 'Social Icon Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-social-wrap .penci-social-item' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'team_social_hcolor',
			array(
				'label'     => __( 'Social Icon Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-social-wrap .penci-social-item:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'team_social_martop', array(
				'label'     => __( 'Margin Top for Social Icon', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-team_member_socails' => 'margin-top: {{SIZE}}px' ),
			)
		);

		$this->add_control(
			'team_bghcolor',
			array(
				'label'     => __( 'Team Member Item Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-teammb-inner' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'team_borderhcolor',
			array(
				'label'     => __( 'Team Member Item Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-teammb-inner' => 'border:1px solid {{VALUE}};' ),
			)
		);

		$this->end_controls_section();

		$this->register_block_title_style_section_controls();

	}

	protected function render() {
		$settings = $this->get_settings();

		if ( ! $settings['teammembers'] ) {
			return;
		}
		$team_members = (array) $settings['teammembers'];

		$css_class = 'penci-block-vc penci-teammb-bsc';
		$css_class .= ' penci-teammb-' . $settings['style'];
		$css_class .= ' pencisc-grid-' . $settings['columns'];
		$css_class .= ' pencisc-grid-tablet-' . $settings['columns_tablet'];
		$css_class .= ' pencisc-grid-mobile-' . $settings['columns_mobile'];
		?>
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content pencisc-grid">
				<?php
				$link_target = 'target="_blank"';

				if ( ! get_theme_mod( 'penci_dis_noopener' ) ) {
					$link_target .= ' rel="noopener"';
				}
				foreach ( (array) $team_members as $item ) {

					$name_item     = isset( $item['name'] ) ? $item['name'] : '';
					$desc_item     = isset( $item['desc'] ) ? $item['desc'] : '';
					$position_item = isset( $item['position'] ) ? $item['position'] : '';

					$link_website_item   = isset( $item['link_website'] ) ? $item['link_website'] : '';
					$link_facebook_item  = isset( $item['link_facebook'] ) ? $item['link_facebook'] : '';
					$link_twitter_item   = isset( $item['link_twitter'] ) ? $item['link_twitter'] : '';
					$link_linkedin_item  = isset( $item['link_linkedin'] ) ? $item['link_linkedin'] : '';
					$link_instagram_item = isset( $item['link_instagram'] ) ? $item['link_instagram'] : '';
					$link_dribbble_item  = isset( $item['link_dribbble'] ) ? $item['link_dribbble'] : '';

					$link_youtube_item   = isset( $item['link_youtube'] ) ? $item['link_youtube'] : '';
					$link_vimeo_item     = isset( $item['link_vimeo'] ) ? $item['link_vimeo'] : '';
					$link_pinterest_item = isset( $item['link_pinterest'] ) ? $item['link_pinterest'] : '';

					$url_img_item = $this->get_marker_img_el( $item['image'], $settings['penci_img_size'] );


					?>
					<div class="penci-teammb-item pencisc-grid-item">
						<div class="penci-teammb-inner">
							<?php
							if ( $url_img_item ) {
								$dis_lazy = get_theme_mod( 'penci_disable_lazyload_layout' );
								if ( $dis_lazy ) {
									echo '<span class="penci-image-holder penci-teammb-img penci-disable-lazy" style="background-image: url(' . esc_url( $url_img_item ) . ');"></span>';
								} else {
									echo '<span class="penci-image-holder penci-teammb-img penci-lazy" data-src="' . esc_url( $url_img_item ) . '"></span>';
								}
							}
							?>
							<div class="penci-team_item__info">
								<?php if ( $position_item && in_array( $settings['style'], array( 's2', 's3', 's4' ) ) ): ?>
									<div class="penci-team_member_pos"><?php echo $position_item; ?></div>
								<?php endif; ?>
								<?php if ( $name_item ): ?>
									<h5 class="penci-team_member_name"><?php echo $name_item; ?></h5>
								<?php endif; ?>
								<?php if ( $position_item && 's1' == $settings['style'] ): ?>
									<div class="penci-team_member_pos"><?php echo $position_item; ?></div>
								<?php endif; ?>
								<?php if ( $desc_item ): ?>
									<div class="penci-team_member_desc"><?php echo $desc_item; ?></div>
								<?php endif; ?>
								<div class="penci-team_member_socails penci-social-wrap">
									<?php if ( $link_website_item ): ?>
										<a <?php echo $link_target ?> class="penci-social-item penci-social-item website" href="<?php echo esc_url( $link_website_item ); ?>"><?php penci_fawesome_icon('fas fa-globe'); ?></a>
									<?php endif; ?>
									<?php if ( $link_facebook_item ): ?>
										<a <?php echo $link_target ?> class="penci-social-item penci-social-item facebook-f" href="<?php echo esc_url( $link_facebook_item ); ?>"><?php penci_fawesome_icon('fab fa-facebook-f'); ?></a>
									<?php endif; ?>
									<?php if ( $link_twitter_item ): ?>
										<a <?php echo $link_target ?> class="penci-social-item penci-social-item twitter" href="<?php echo esc_url( $link_twitter_item ); ?>"><?php penci_fawesome_icon('fab fa-twitter'); ?></a>
									<?php endif; ?>
								
									<?php if ( $link_linkedin_item ): ?>
										<a <?php echo $link_target ?> class="penci-social-item penci-social-item linkedin" href="<?php echo esc_url( $link_linkedin_item ); ?>"><?php penci_fawesome_icon('fab fa-linkedin-in'); ?></a>
									<?php endif; ?>
									<?php if ( $link_instagram_item ): ?>
										<a <?php echo $link_target ?> class="penci-social-item penci-social-item instagram" href="<?php echo esc_url( $link_instagram_item ); ?>"><?php penci_fawesome_icon('fab fa-instagram'); ?></a>
									<?php endif; ?>
									<?php if ( $link_youtube_item ): ?>
										<a <?php echo $link_target ?> class="penci-social-item penci-social-item youtube" href="<?php echo esc_url( $link_youtube_item ); ?>"><?php penci_fawesome_icon('fab fa-youtube'); ?></a>
									<?php endif; ?>
									<?php if ( $link_vimeo_item ): ?>
										<a <?php echo $link_target ?> class="penci-social-item penci-social-item vimeo" href="<?php echo esc_url( $link_vimeo_item ); ?>"><?php penci_fawesome_icon('fab fa-vimeo-v'); ?></a>
									<?php endif; ?>
									<?php if ( $link_pinterest_item ): ?>
										<a <?php echo $link_target ?> class="penci-social-item penci-social-item pinterest" href="<?php echo esc_url( $link_pinterest_item ); ?>"><?php penci_fawesome_icon('fab fa-pinterest'); ?></a>
									<?php endif; ?>
									<?php if ( $link_dribbble_item ): ?>
										<a <?php echo $link_target ?> class="penci-social-item penci-social-item dribbble" href="<?php echo esc_url( $link_dribbble_item ); ?>"><?php penci_fawesome_icon('fab fa-dribbble'); ?></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<?php
	}

	public function get_marker_img_el( $image, $thumbnail_size = 'thumbnail' ) {
		if ( empty( $image['url'] ) ) {
			return '';
		}
		if ( ! empty( $image['id'] ) ) {
			$attr = wp_get_attachment_image_src( $image['id'], $thumbnail_size );
			if ( isset( $attr['url'] ) && $attr['url'] ) {
				$image['url'] = $attr['url'];
			}
		}

		return $image['url'];
	}
}
