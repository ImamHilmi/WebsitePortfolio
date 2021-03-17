<?php
$output = $penci_block_width = $el_class = $css_animation = $css = '';

$title_page = $page_url =  $page_height = $hide_faces =  $hide_stream = '';
$heading_title_style = $heading = $heading_title_link = $heading_title_align = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'penci-block-vc penci-social-counter';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id = Penci_Vc_Helper::get_unique_id_block( 'social_counter' );
?>
	<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
		<?php Penci_Vc_Helper::markup_block_title( $atts ); ?>
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

			$social_style = isset( $atts['social_style'] ) && $atts['social_style'] ? $atts['social_style'] : 's1';

			$error = array();

			$has_data = false;

			echo '<div class="penci-socialCT-wrap penci-socialCT-' . esc_attr( $social_style ) . '">';

			foreach ( $socials as $social ) {


				if ( empty( $atts[ 'social_' . $social ] ) ) {
					continue;
				}

				$social_info = PENCI_FW_Social_Counter::get_social_counter( $social );


				$social_info_name = isset( $social_info['name'] ) ? $social_info['name'] : '';

				if ( ! $social_info || ! $social_info_name ) {
					continue;
				}

				$has_data = true;

				$target = 'target="_blank"';
				if ( ! get_theme_mod( 'penci_dis_noopener' ) ) {
					$target .= ' rel=noopener"';
				}

				$count = PENCI_FW_Social_Counter::format_followers( $social_info['count'] );
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

$id_facebook_page = '#' . $block_id;
$css_custom = Penci_Vc_Helper::get_heading_block_css( $id_facebook_page, $atts );

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}
