<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * @param $width
 *
 * @return bool|string
 * @since 4.2
 */
if ( ! function_exists( 'penci_wpb_translateColumnWidthToSpan' ) ):
	function penci_wpb_translateColumnWidthToSpan( $width, $order ) {
		$output = array();
		preg_match( '/(\d+)\/(\d+)/', $width, $matches );

		$container_layout = Penci_Global_Data_Blocks::get_data_row();
		if ( in_array( $container_layout, array( '23_13', '13_23', '14_12_14', '12_14_14', '14_14_12' ) ) ) {
			if ( '1/4' == $width ) {
				$output[] = 'penci-vc-sidebar';
				if ( '12_14_14' == $container_layout ) {
					if ( 2 == $order ) {
						$output [] = 'penci-sidebar-left';
					} else {
						$output [] = 'penci-sidebar-right';
					}
				} else {
					if ( 1 == $order ) {
						$output [] = 'penci-sidebar-left';
					} else {
						$output [] = 'penci-sidebar-right';
					}
				}
			} elseif ( '1/3' == $width ) {
				$output[] = 'penci-vc-sidebar';

				if ( '23_13' == $container_layout ) {
					$output [] = 'penci-sidebar-right';
				} else {
					$output [] = 'penci-sidebar-left';
				}

			} elseif ( '2/3' == $width || '1/2' == $width ) {
				$output[] = 'penci-main-content';
			}
		} else {
			if ( ! empty( $matches ) ) {
				$part_x = (int) $matches[1];
				$part_y = (int) $matches[2];
				if ( $part_x > 0 && $part_y > 0 ) {
					$value = ceil( $part_x / $part_y * 12 );
					if ( $value > 0 && $value <= 12 ) {
						$output[] = 'penci-col-' . $value;
					}
				}
			}
			if ( preg_match( '/\d+\/5$/', $width ) ) {
				$output[] = 'penci-col-' . $width;
			}
		}

		if ( '11' == $width ) {
			$output[] = 'penci-col-12';
		}


		$output = implode( ' ', $output );

		if ( ! $output ) {
			$output = $width;
		}


		return apply_filters( 'penci_vc_translate_column_width_class', $output, $width );
	}
endif;

if ( ! class_exists( 'Penci_Vc_Helper' ) ):
	class Penci_Vc_Helper {
		public static function get_unique_id_block( $block_id ) {
			return 'penci' . $block_id . '_' . rand( 1000, 100000 );
		}

		public static function get_http() {
			return is_ssl() ? 'https://' : 'http://';
		}

		/**
		 * Get typo of element
		 *
		 * @param $args
		 *
		 * @return string
		 */
		public static function vc_google_fonts_parse_attributes( $args ) {

			$args = wp_parse_args( $args, array(
				'template'   => '',
				'font_size'  => '',
				'font_style' => '',
				'media'      => '768',
			) );

			$output = $styles = $css_size = '';

			// Render google style
			if ( $args['font_style'] ) {
				$fonts_data = vc_parse_multi_attribute( $args['font_style'], array(
					'font_family' => '',
					'font_style'  => '',
				) );

				$fonts_family = explode( ':', $fonts_data['font_family'] );
				$fonts_styles = explode( ':', $fonts_data['font_style'] );

				if ( $fonts_family ) {

					$google_fonts_obj = new Vc_Google_Fonts();
					$font             = $google_fonts_obj->_vc_google_fonts_parse_attributes( array(), trim( $args['font_style'] ) );
					$font             = $font['values'];
					list( $font_family_load ) = explode( ':', $font['font_family'] . ':' );
					$penci_font_enqueue = array( 'Raleway', 'PT Serif', 'Playfair Display SC', 'Montserrat' );

					$settings = get_option( 'wpb_js_google_fonts_subsets' );
					if ( is_array( $settings ) && ! empty( $settings ) ) {
						$subsets = '&subset=' . implode( ',', $settings );
					} else {
						$subsets = '';
					}

					if ( $font_family_load && ! in_array( $font_family_load, $penci_font_enqueue ) ) {
						wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( urlencode( $font_family_load ) ), '//fonts.googleapis.com/css?family=' . urlencode( $font_family_load ) . $subsets );
					}
				}

				if ( isset( $fonts_family[0] ) && $fonts_family[0] ) {
					$styles .= 'font-family:' . $fonts_family[0] . ';';
				}
				if ( isset( $fonts_styles[1] ) && $fonts_styles[1] ) {
					$styles .= 'font-weight:' . $fonts_styles[1] . ';';
				}
				if ( isset( $fonts_styles[2] ) && $fonts_styles[2] ) {
					$styles .= 'font-style:' . $fonts_styles[2] . ';';
				}
			}

			// Render font size
			$css_size = '';
			if ( $args['font_size'] ) {
				$css_size = 'font-size:' . $args['font_size'] . ';';
			}

			// Check Media screen
			if ( $css_size ) {
				if ( $args['media'] ) {
					$output .= sprintf( '@media screen and (min-width: %spx ){' . $args['template'] . '}', $args['media'], $css_size );
				} elseif ( $css_size ) {
					$styles .= $css_size;
				}
			}

			if ( $styles ) {
				$output .= sprintf( $args['template'], $styles );
			}


			return $output;
		}

		public static function markup_block_title( $args ) {
			$defaults = array(
				'heading_title_style'  => 'style-1',
				'heading'              => '',
				'heading_title_link'   => '',
				'add_title_icon'       => '',
				'block_title_icon'     => '',
				'block_title_ialign'   => '',
				'block_title_align'    => '',
				'block_title_offupper' => '',
				'block_title_marginbt' => '',
			);

			$r = wp_parse_args( $args, $defaults );

			if ( ! $r['heading'] ) {
				return;
			}
			if ( 'video_list' == $r['heading_title_style'] ) {
				return;
			}

			$heading_title = get_theme_mod( 'penci_sidebar_heading_style' ) ? get_theme_mod( 'penci_sidebar_heading_style' ) : 'style-1';
			$heading_align = get_theme_mod( 'penci_sidebar_heading_align' ) ? get_theme_mod( 'penci_sidebar_heading_align' ) : 'pcalign-center';

			if ( $r['heading_title_style'] ) {
				$heading_title = $r['heading_title_style'];
			}

			if ( $r['block_title_align'] ) {
				$heading_align = $r['block_title_align'];
			}

			$classes = 'penci-border-arrow penci-homepage-title penci-home-latest-posts';
			$classes .= ' ' . $heading_title;
			$classes .= ' ' . $heading_align;
			?>
			<div class="<?php echo esc_attr( $classes ); ?>">
				<h3 class="inner-arrow">
					<?php
					if ( $r['heading_title_link'] ) {
						echo '<a href="' . esc_url( $r['heading_title_link'] ) . '">';
					} else {
						echo '<span>';
					}

					if ( $r['add_title_icon'] && $r['block_title_icon'] && 'left' == $r['block_title_ialign'] ) {
						echo '<i class="' . esc_attr( $r['block_title_icon'] ) . '"></i>';
					}
					echo do_shortcode( $r['heading'] );
					if ( $r['add_title_icon'] && $r['block_title_icon'] && 'right' == $r['block_title_ialign'] ) {
						penci_icon_by_ver( 'fa-pos-right ' . esc_attr( $r['block_title_icon'] ) );
					}
					if ( $r['heading_title_link'] ) {
						echo '</a>';
					} else {
						echo '</span>';
					}
					?>
				</h3>
			</div>
			<?php
		}

		public static function get_heading_block_css( $block_id_css, $args ) {
			$defaults = array(
				'block_title_color'        => '',
				'block_title_hcolor'       => '',
				'btitle_bcolor'            => '',
				'btitle_outer_bcolor'      => '',
				'btitle_style5_bcolor'     => '',
				'btitle_style78_bcolor'    => '',
				'btitle_bgcolor'           => '',
				'btitle_outer_bgcolor'     => '',
				'btitle_style9_bgimg'      => '',
				'use_btitle_typo'          => '',
				'btitle_typo'              => '',
				'btitle_fsize'             => '',
				'block_title_offupper'     => '',
				'block_title_marginbt'     => '',
				'btitle_style10_btopcolor' => '',
				'btitle_shapes_color'      => '',
			);

			$r = wp_parse_args( $args, $defaults );

			$output = '';
			if ( $r['block_title_color'] ) {
				$output .= $block_id_css . ' .penci-border-arrow .inner-arrow a,';
				$output .= $block_id_css . ' .penci-border-arrow .inner-arrow{ color: ' . esc_attr( $r['block_title_color'] ) . '; }';
			}

			if ( $r['block_title_hcolor'] ) {
				$output .= $block_id_css . ' .penci-border-arrow .inner-arrow a:hover{ color: ' . esc_attr( $r['block_title_hcolor'] ) . '; }';
			}
			if ( $r['btitle_bcolor'] ) {
				$output .= $block_id_css . ' .penci-border-arrow .inner-arrow,';
				$output .= $block_id_css . ' .style-4.penci-border-arrow .inner-arrow:before,';
				$output .= $block_id_css . ' .style-4.penci-border-arrow .inner-arrow:after,';
				$output .= $block_id_css . ' .style-5.penci-border-arrow,';
				$output .= $block_id_css . ' .style-7.penci-border-arrow,';
				$output .= $block_id_css . ' .style-9.penci-border-arrow { border-color: ' . esc_attr( $r['btitle_bcolor'] ) . '; }';
				$output .= $block_id_css . ' .penci-border-arrow:before{ border-top-color: ' . esc_attr( $r['btitle_bcolor'] ) . '; }';
			}

			if ( $r['btitle_style5_bcolor'] ) {
				$output .= $block_id_css . ' .style-5.penci-border-arrow{ border-color: ' . esc_attr( $r['btitle_style5_bcolor'] ) . '; }';

				$output .= $block_id_css . ' .style-11.penci-border-arrow,';
				$output .= $block_id_css . ' .penci-homepage-title.style-10,';
				$output .= $block_id_css . ' .style-12.penci-border-arrow,';
				$output .= $block_id_css . ' .style-5.penci-border-arrow .inner-arrow{ border-bottom-color: ' . esc_attr( $r['btitle_style5_bcolor'] ) . '; }';
			}
			if ( $r['btitle_style78_bcolor'] ) {
				$output .= $block_id_css . ' .style-7.penci-border-arrow .inner-arrow:before,';
				$output .= $block_id_css . ' .style-9.penci-border-arrow .inner-arrow:before{ background-color: ' . esc_attr( $r['btitle_style78_bcolor'] ) . '; }';
			}

			if ( $r['btitle_outer_bcolor'] ) {
				$output .= $block_id_css . ' .penci-border-arrow:after{ border-color: ' . esc_attr( $r['btitle_outer_bcolor'] ) . '; }';
			}
			if ( $r['btitle_style10_btopcolor'] ) {
				$output .= $block_id_css . ' .style-10.penci-border-arrow{ border-top-color: ' . esc_attr( $r['btitle_style10_btopcolor'] ) . '; }';
			}

			if ( $r['btitle_shapes_color'] ) {
				$output .= $block_id_css . ' .style-13.pcalign-center .inner-arrow:before,';
				$output .= $block_id_css . ' .style-13.pcalign-right .inner-arrow:before { border-left-color: ' . esc_attr( $r['btitle_shapes_color'] ) . ' !important; }';

				$output .= $block_id_css . ' .style-13.pcalign-center .inner-arrow:after,';
				$output .= $block_id_css . ' .style-13.pcalign-left .inner-arrow:after { border-right-color: ' . esc_attr( $r['btitle_shapes_color'] ) . ' !important; }';

				$output .= $block_id_css . ' .style-12 .inner-arrow:before,';
				$output .= $block_id_css . ' .style-12.pcalign-right .inner-arrow:after,';
				$output .= $block_id_css . ' .style-12.pcalign-center .inner-arrow:after{ border-bottom-color: ' . esc_attr( $r['btitle_shapes_color'] ) . ' !important; }';

				$output .= $block_id_css . ' .style-11 .inner-arrow:after,';
				$output .= $block_id_css . ' .style-11 .inner-arrow:before{ border-top-color: ' . esc_attr( $r['btitle_shapes_color'] ) . ' !important; }';
			}

			if ( $r['btitle_bgcolor'] ) {
				$output .= $block_id_css . ' .style-2.penci-border-arrow:after{ border-color: transparent;border-top-color: ' . esc_attr( $r['btitle_bgcolor'] ) . ' !important; }';
				$output .= $block_id_css . ' .style-14 .inner-arrow:before,';
				$output .= $block_id_css . ' .style-11 .inner-arrow,';
				$output .= $block_id_css . ' .style-12 .inner-arrow,';
				$output .= $block_id_css . ' .style-13 .inner-arrow,';
				$output .= $block_id_css . ' .penci-border-arrow .inner-arrow{ background-color: ' . esc_attr( $r['btitle_bgcolor'] ) . ' !important; }';
				$output .= $block_id_css . ' .style-14.penci-border-arrow .inner-arrow{ background-color: transparent !important; }';
			}

			if ( $r['btitle_outer_bgcolor'] ) {
				$output .= $block_id_css . ' .penci-border-arrow:after{ background-color: ' . esc_attr( $r['btitle_outer_bgcolor'] ) . '; }';
			}

			if ( $r['btitle_style9_bgimg'] ) {
				$output .= $block_id_css . ' .style-8.penci-border-arrow .inner-arrow{ background-image: url(' . esc_url( wp_get_attachment_url( $r['btitle_style9_bgimg'] ) ) . '); }';
			}

			if ( $r['use_btitle_typo'] ) {
				$output .= self::vc_google_fonts_parse_attributes( array(
					'font_size'  => $r['btitle_fsize'],
					'font_style' => $r['btitle_typo'],
					'template'   => $block_id_css . ' .penci-border-arrow .inner-arrow{ %s }',
				) );
			}

			if ( $r['block_title_offupper'] ) {
				$output .= $block_id_css . ' .penci-border-arrow .inner-arrow{ text-transform: none; }';
			}
			if ( $r['block_title_marginbt'] ) {
				$output .= $block_id_css . ' penci-border-arrow { margin-bottom:' . esc_attr( $r['block_title_marginbt'] ) . ';}';
			}

			return $output;
		}

		/**
		 * Get url image
		 *
		 * @param $attach_id
		 * @param string $size
		 *
		 * @return mixed|void
		 */
		public static function get_image_holder_gal( $attach_id, $size = 'full', $image_type, $is_background = true, $count = '', $class = '', $caption_source = '' ) {
			$list_url  = self::penci_image_downsize( $attach_id, array( $size, 'penci-full-thumb' ) );
			$src_large = isset( $list_url['penci-full-thumb']['img_url'] ) ? $list_url['penci-full-thumb']['img_url'] : '';
			$src_thmb  = isset( $list_url[ $size ]['img_url'] ) ? $list_url[ $size ]['img_url'] : '';

			$class_lazy = ' penci-lazy';
			$data_src   = ' data-src="' . $src_thmb . '"';
			$dis_lazy   = get_theme_mod( 'penci_disable_lazyload_layout' );

			if ( $dis_lazy ) {
				$class_lazy = ' penci-disable-lazy';
				$data_src   = ' style="background-image: url(' . $src_thmb . ');"';
			}

			if ( $image_type ) {
				$class_lazy .= ' penci-image-' . $image_type;
			}

			$caption_markup     = '';
			$gallery_title      = '';
			$attachment_caption = wp_get_attachment_caption( $attach_id );
			if ( $attachment_caption && 'attachment' == $caption_source ) {
				$caption_markup = '<span class="caption">' . wp_kses( $attachment_caption, array( 'em' => array(), 'strong' => array(), 'b' => array(), 'i' => array() ) ) . '</span>';
				$gallery_title  = ' data-cap="' . esc_attr( $attachment_caption ) . '"';
			}

			if ( $is_background ) {
				ob_start();
				?>
				<div class="penci-gallery-item penci-galitem-<?php echo $count . ( $class ? ' ' . $class : '' ); ?>">
					<a class="penci-image-holder<?php echo $class_lazy; ?>" <?php echo $data_src; ?> href="<?php echo $src_large; ?>" <?php echo $gallery_title; ?>>
						<?php echo $caption_markup; ?>
						<?php echo penci_icon_by_ver( 'fas fa-arrows-alt' ); ?>
					</a>
				</div>
				<?php
				$output = ob_get_clean();

			} else {
				ob_start();
				?>
				<a class="<?php echo $class_lazy . ( $class ? ' ' . $class : '' ); ?>" href="<?php echo $src_large; ?>" <?php echo $gallery_title; ?>>
					<img src="<?php echo $src_thmb; ?>" alt="<?php echo self::get_image_alt( $attach_id ); ?>" />
					<?php echo $caption_markup; ?>
					<?php echo penci_icon_by_ver( 'la la-plus-circle' ); ?>
				</a>
				<?php
				$output = ob_get_clean();
			}

			return $output;
		}

		public static function penci_image_downsize( $id, $sizes = array( 'medium' ) ) {

			$img_url          = wp_get_attachment_url( $id );
			$img_url_basename = wp_basename( $img_url );

			$list_url = array();

			foreach ( $sizes as $size ) {
				$img_url_pre = $width = $height = '';
				if ( $intermediate = image_get_intermediate_size( $id, $size ) ) {
					$img_url_pre = isset( $intermediate['url'] ) ? $intermediate['url'] : $img_url;
					$width       = isset( $intermediate['width'] ) ? $intermediate['width'] : '';
					$height      = isset( $intermediate['height'] ) ? $intermediate['height'] : '';
				} elseif ( $size == 'thumbnail' ) {
					if ( ( $thumb_file = wp_get_attachment_thumb_file( $id ) ) && $info = getimagesize( $thumb_file ) ) {
						$img_url_pre = str_replace( $img_url_basename, wp_basename( $thumb_file ), $img_url );
						$width       = $info[0];
						$height      = $info[1];
					}
				} else {
					$img_url_pre = $img_url;
				}

				$list_url[ $size ] = array(
					'img_url' => $img_url_pre,
					'height'  => $height,
					'width'   => $width
				);
			}

			return $list_url;
		}

		/**
		 * Get media control image alt.
		 * Retrieve the `alt` value of the image selected by the media control.
		 *
		 * @return string Image alt.
		 */
		public static function get_image_alt( $instance ) {
			if ( empty( $instance['id'] ) ) {
				return '';
			}

			$attachment_id = $instance['id'];
			if ( ! $attachment_id ) {
				return '';
			}

			$attachment = get_post( $attachment_id );
			if ( ! $attachment ) {
				return '';
			}

			$alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
			if ( ! $alt ) {
				$alt = $attachment->post_excerpt;
				if ( ! $alt ) {
					$alt = $attachment->post_title;
				}
			}

			return trim( strip_tags( $alt ) );
		}

		public static function _login_form( $args = array() ) {
			$defaults = array(
				'echo'               => true,
				'redirect'           => '',
				'form_id'            => 'penci-loginform',
				'label_username'     => penci_get_setting( 'penci_trans_usernameemail_text' ),
				'label_password'     => penci_get_setting( 'penci_trans_pass_text' ),
				'label_remember'     => penci_get_setting( 'penci_plogin_remember_text' ),
				'label_log_in'       => penci_get_setting( 'penci_plogin_login_text' ),
				'label_lostpass'     => penci_get_setting( 'penci_plogin_lostpass_text' ),
				'label_has_account'  => penci_get_setting( 'penci_plogin_text_has_account' ),
				'label_registration' => penci_get_setting( 'penci_plogin_label_registration' ),
				'id_username'        => 'penci-user-login',
				'id_password'        => 'penci-user-pass',
				'id_remember'        => 'rememberme',
				'id_submit'          => 'wp-submit',
				'remember'           => true,
				'value_username'     => '',
				'value_remember'     => false,
				'lostpassword'       => true,
				'register'           => true,
			);

			$args = wp_parse_args( $args, apply_filters( 'login_form_defaults', $defaults ) );

			if ( ! $args['redirect'] ) {
				$args['redirect'] = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			}

			$login_form_top    = apply_filters( 'login_form_top', '', $args );
			$login_form_middle = apply_filters( 'login_form_middle', '', $args );
			$login_form_bottom = apply_filters( 'login_form_bottom', '', $args );

			$form = '
		<form name="' . $args['form_id'] . '" id="' . $args['form_id'] . '" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post">
			' . $login_form_top . '
			<p class="login-username">
				<input type="text" name="log" id="' . esc_attr( $args['id_username'] ) . '" class="input penci-input" value="' . esc_attr( $args['value_username'] ) . '" size="20" placeholder="' . esc_html( $args['label_username'] ) . '"/>
			</p>
			<p class="login-password">
				<input type="password" name="pwd" id="' . esc_attr( $args['id_password'] ) . '" class="input penci-input" value="" size="20" placeholder="' . esc_html( $args['label_password'] ) . '"/>
			</p>
			' . $login_form_middle . '
			' . ( $args['remember'] ? '<p class="login-remember"><label><input name="rememberme" type="checkbox" id="' . esc_attr( $args['id_remember'] ) . '" value="forever"' . ( $args['value_remember'] ? ' checked="checked"' : '' ) . ' /> ' . esc_html( $args['label_remember'] ) . '</label></p>' : '' ) . '
			<p class="login-submit">
				<input type="submit" name="wp-submit" id="' . esc_attr( $args['id_submit'] ) . '" class="button button-primary" value="' . esc_attr( $args['label_log_in'] ) . '" />
				<input type="hidden" name="redirect_to" value="' . esc_url( $args['redirect'] ) . '" />
			</p>
			' . $login_form_bottom . '
		</form>';

			$extra_from = '';
			if ( $args['lostpassword'] ) {
				$extra_from .= '<a class="penci-lostpassword" href="' . esc_url( wp_lostpassword_url() ) . '">' . $args['label_lostpass'] . '</a>';
			}
			if ( $args['register'] && get_option( 'users_can_register' ) ) {
				$extra_from .= '<a class="penci-user-register" href="' . esc_url( wp_registration_url() ) . '">' . $args['label_registration'] . '</a>';
			}

			if ( $extra_from ) {
				$form .= '<div class="penci-loginform-extra">' . $extra_from . '</div>';
			}

			if ( $args['echo'] ) {
				echo $form;
			} else {
				return $form;
			}
		}

		/**
		 * Get image sizes.
		 *
		 * Retrieve available image sizes after filtering `include` and `exclude` arguments.
		 */
		/**
		 * Get image sizes.
		 *
		 * Retrieve available image sizes after filtering `include` and `exclude` arguments.
		 */
		public static function get_list_image_sizes( $default = false ) {
			$wp_image_sizes = self::get_all_image_sizes();

			$image_sizes = array();

			if ( $default ) {
				$image_sizes[ esc_html__( 'Default', 'soledad' ) ] = '';
			}

			foreach ( $wp_image_sizes as $size_key => $size_attributes ) {
				$control_title = ucwords( str_replace( '_', ' ', $size_key ) );
				if ( is_array( $size_attributes ) ) {
					$control_title .= sprintf( ' - %d x %d', $size_attributes['width'], $size_attributes['height'] );
				}

				$image_sizes[ $control_title ] = $size_key;
			}

			$image_sizes[ _x( 'Full', 'Image Size Control', 'soledad' ) ] = 'full';

			return $image_sizes;
		}

		public static function get_all_image_sizes() {
			global $_wp_additional_image_sizes;

			$default_image_sizes = [ 'thumbnail', 'medium', 'medium_large', 'large' ];

			$image_sizes = [];

			foreach ( $default_image_sizes as $size ) {
				$image_sizes[ $size ] = [
					'width'  => (int) get_option( $size . '_size_w' ),
					'height' => (int) get_option( $size . '_size_h' ),
					'crop'   => (bool) get_option( $size . '_crop' ),
				];
			}

			if ( $_wp_additional_image_sizes ) {
				$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
			}

			return $image_sizes;
		}
	}
endif;
