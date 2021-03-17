<?php

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
/* Check page header has enable or not */

if ( ! function_exists( 'penci_is_pageheader' ) ):
	function penci_is_pageheader(){
		if( ! is_page() ): return false; endif;
		
		static $show_page_title;
		$show_page_title = get_theme_mod( 'penci_pheader_show' );
		$penci_page_title = get_post_meta( get_the_ID(), 'penci_pmeta_page_title', true );

		$pheader_show = isset( $penci_page_title['pheader_show'] ) ? $penci_page_title['pheader_show'] : '';
		if(  'enable' == $pheader_show  ) {
			$show_page_title = true;
		}elseif(  'disable' == $pheader_show  ) {
			$show_page_title = false;
		}

		return $show_page_title;
	}
endif;
if ( ! function_exists( 'penci_soledad_get_header_layout' ) ):
	function penci_soledad_get_header_layout() {
		$header_layout = get_theme_mod( 'penci_header_layout' );
		if ( is_page() ) {
			$pmeta_page_header = get_post_meta( get_the_ID(), 'penci_pmeta_page_header', true );
			if ( isset( $pmeta_page_header['header_style'] ) && $pmeta_page_header['header_style'] ) {
				$header_layout = $pmeta_page_header['header_style'];
			}
		}

		if ( empty( $header_layout ) ) {
			$header_layout = 'header-1';
		}

		return $header_layout;
	}
endif;

if ( ! function_exists( 'penci_soledad_get_header_width' ) ):
	function penci_soledad_get_header_width() {
		$header_width = get_theme_mod( 'penci_header_ctwidth' );
		if ( is_page() ) {
			$pmeta_page_header = get_post_meta( get_the_ID(), 'penci_pmeta_page_header', true );
			if ( isset( $pmeta_page_header['penci_header_width'] ) && $pmeta_page_header['penci_header_width'] ) {
				$header_width = $pmeta_page_header['penci_header_width'];
			}
		}

		$output = 'container';
		if ( $header_width ) {
			$output .= ' container-' . $header_width;
		}

		echo $output;
	}
endif;

if ( ! function_exists( 'penci_soledad_wpheader_classes' ) ):
	function penci_soledad_wpheader_classes( $class = '' ) {
		$_featured_slider_all_page   = get_theme_mod( 'penci_featured_slider_all_page' );
		$_featured_slider            = get_theme_mod( 'penci_featured_slider' );
		$_vertical_nav_remove_header = get_theme_mod( 'penci_vertical_nav_remove_header' );
		$_vertical_nav_show          = get_theme_mod( 'penci_vertical_nav_show' );
		$header_layout               = penci_soledad_get_header_layout();

		$classes = 'header-' . $header_layout;
		if ( ( ( ! is_home() || ! is_front_page() ) && ! $_featured_slider_all_page ) || ( ( is_home() || is_front_page() ) && ! $_featured_slider ) ) {
			$classes .= ' has-bottom-line';
		}
		if ( $_vertical_nav_remove_header && $_vertical_nav_show ) {
			$classes .= ' penci-vernav-hide-innerhead';
		}

		if ( $class ) {
			$classes .= ' ' . $class;
		}

		return $classes;
	}
endif;

if ( ! function_exists( 'penci_soledad_sitenavigation_classes' ) ):
	function penci_soledad_sitenavigation_classes( $class = '' ) {
		$menu_style    = get_theme_mod( 'penci_header_menu_style' );
		$header_layout = penci_soledad_get_header_layout();

		$classes = '';

		if ( in_array( $header_layout, array( 'header-1', 'header-4', 'header-7' ) ) ) {
			$classes .= 'header-layout-top';
		} else {
			$classes .= 'header-layout-bottom';
		}

		if ( $header_layout == 'header-9' ) {
			$classes .= ' header-6';
		}

		if ( $header_layout == 'header-10' || $header_layout == 'header-11' ) {
			$overflow_logo = get_theme_mod( 'penci_overflow_logo' );
			if ( $overflow_logo ) {
				$class .= ' penci-logo-overflow';
			}
		}

		$classes .= ' ' . $header_layout;
		$classes .= ' ' . ( $menu_style ? $menu_style : 'menu-style-1' );

		if ( get_theme_mod( 'penci_header_enable_padding' ) ) {
			$classes .= ' menu-item-padding';
		}
		if ( get_theme_mod( 'penci_disable_sticky_header' ) ) {
			$classes .= ' penci-disable-sticky-nav';
		}

		if ( $class ) {
			$classes .= ' ' . $class;
		}

		return $classes;
	}
endif;

if ( ! function_exists( 'penci_soledad_body_classes' ) ):
	function penci_soledad_body_classes( $classes ) {

		$fontawesome_ver5 = get_theme_mod( 'penci_fontawesome_ver5' );
		if ( $fontawesome_ver5 ) {
			$classes[] = 'penci-fawesome-ver5';
		}

		if ( is_singular( 'portfolio' ) ) {

			if ( get_theme_mod( "penci_portfolio_single_enable_2sidebar" ) ) {
				$classes[] = 'penci-two-sidebar';
			}
		} elseif ( is_home() || is_front_page() ) {

			$show_on_front =  get_option( 'show_on_front' );
			if( 'page' == $show_on_front ) {

				$sidebar_layout   = get_theme_mod( 'penci_page_default_template_layout' );
				$sidebar_position = get_post_meta( get_the_ID(), 'penci_sidebar_page_pos', true );
				if ( $sidebar_position ) {
					$sidebar_layout = $sidebar_position;
				}

				if ( 'two-sidebar' == $sidebar_layout ) {
					$classes[] = 'penci-two-sidebar';
				}

				// Header transparent
				$header_trans = penci_is_header_transparent();
				if ( $header_trans ) {
					$classes[] = 'penci-header-trans';
				}

			}else{
				if ( get_theme_mod( "penci_two_sidebar_home" ) ) {
					$classes[] = 'penci-two-sidebar';
				}
			}

		} elseif ( is_archive() || is_search() ) {

			$is_two_sidebar_archive = get_theme_mod( 'penci_two_sidebar_archive' );

			if ( is_category() ) {
				$category_oj  = get_queried_object();
				$fea_cat_id   = $category_oj->term_id;
				$cat_meta     = get_option( "category_$fea_cat_id" );
				$sidebar_opts = isset( $cat_meta['cat_sidebar_display'] ) ? $cat_meta['cat_sidebar_display'] : '';
				if ( $sidebar_opts == 'two' ) {
					$is_two_sidebar_archive = true;
				}else{
					$is_two_sidebar_archive = false;
				}
			}

			if ( $is_two_sidebar_archive ) {
				$classes[] = 'penci-two-sidebar';
			}
		} elseif ( is_page() ) {
			$sidebar_layout   = get_theme_mod( 'penci_page_default_template_layout' );
			$sidebar_position = get_post_meta( get_the_ID(), 'penci_sidebar_page_pos', true );
			if ( $sidebar_position ) {
				$sidebar_layout = $sidebar_position;
			}

			if ( 'two-sidebar' == $sidebar_layout ) {
				$classes[] = 'penci-two-sidebar';
			}
			
			$show_page_title = penci_is_pageheader();
			if( $show_page_title ):
			$classes[] = 'penci-body-epageheader';
			endif;

			// Header transparent
			$header_trans = penci_is_header_transparent();
			if ( $header_trans ) {
				$classes[] = 'penci-header-trans';
			}
			
		} elseif ( is_single() ) {
			$sidebar_single_layout   = get_theme_mod( 'penci_single_layout' );
			$sidebar_single_position = get_post_meta( get_the_ID(), 'penci_post_sidebar_display', true );
			if ( $sidebar_single_position ) {
				$sidebar_single_layout = $sidebar_single_position;
			}

			if ( 'two' == $sidebar_single_layout ) {
				$classes[] = 'penci-two-sidebar';
			}
		}


		if ( is_singular( 'portfolio' ) || is_singular( 'product' ) ) {
			$classes[] = 'penci-port-product';
		}



		return $classes;
	}

	add_filter( 'body_class', 'penci_soledad_body_classes' );
endif;

/**
 * Get class sidebar position
 */
if ( ! function_exists( 'penci_is_header_transparent' ) ):
	function penci_is_header_transparent() {
		$header_trans = false;
		if( is_page() ){
			$header_trans = get_theme_mod( 'penci_header_enable_transparent' );
		}

		$pmeta_page_header = get_post_meta( get_the_ID(), 'penci_pmeta_page_header', true );
		if ( isset( $pmeta_page_header['penci_edeader_trans'] ) ) {
			if ( 'yes' == $pmeta_page_header['penci_edeader_trans'] ) {
				$header_trans = true;
			} elseif ( 'no' == $pmeta_page_header['penci_edeader_trans'] ) {
				$header_trans = false;
			}
		}

		return $header_trans;
	}
endif;

/**
 * Get class sidebar position
 */
if ( ! function_exists( 'penci_get_sidebar_position_archive' ) ):
	function penci_get_sidebar_position_archive() {
		$sidebar_position = 'right-sidebar';
		if ( get_theme_mod( 'penci_two_sidebar_archive' ) ) {
			$sidebar_position = 'two-sidebar';
		} elseif ( get_theme_mod( "penci_left_sidebar_archive" ) ) {
			$sidebar_position = 'left-sidebar';
		}

		return $sidebar_position;
	}
endif;

if ( ! function_exists( 'get_list_custom_sidebar_option' ) ):
	function get_list_custom_sidebar_option() {
		$list_sidebar = array(
			'main-sidebar'      => 'Main Sidebar',
			'main-sidebar-left' => 'Main Sidebar Left',
			'custom-sidebar-1'  => 'Custom Sidebar 1',
			'custom-sidebar-2'  => 'Custom Sidebar 2',
			'custom-sidebar-3'  => 'Custom Sidebar 3',
			'custom-sidebar-4'  => 'Custom Sidebar 4',
			'custom-sidebar-5'  => 'Custom Sidebar 5',
			'custom-sidebar-6'  => 'Custom Sidebar 6',
			'custom-sidebar-7'  => 'Custom Sidebar 7',
			'custom-sidebar-8'  => 'Custom Sidebar 8',
			'custom-sidebar-9'  => 'Custom Sidebar 9',
			'custom-sidebar-10' => 'Custom Sidebar 10'
		);

		$custom_sidebars = get_option( 'soledad_custom_sidebars' );
		if ( empty( $custom_sidebars ) || ! is_array( $custom_sidebars ) ) {
			return $list_sidebar;
		}

		foreach ( $custom_sidebars as $sidebar_id => $custom_sidebar ) {

			if ( empty( $custom_sidebar['name'] ) ) {
				continue;
			}
			$list_sidebar[ $sidebar_id ] = $custom_sidebar['name'];
		}

		return $list_sidebar;
	}
endif;

if ( ! function_exists( 'penci_get_option_yesno' ) ) {
	function penci_get_option_yesno( $default = false ) {
		$output = array();

		if ( $default ) {
			$output[''] = esc_html__( 'Default( follow Customize )', 'soledad' );
		}

		$output['no']  = esc_html__( 'No', 'soledad' );
		$output['yes'] = esc_html__( 'Yes', 'soledad' );

		return $output;
	}
}

if ( ! function_exists( 'penci_get_option_menus' ) ) {
	function penci_get_option_menus( $hide_empty = false ) {
		$output = array( '' => esc_html__( '-- Default Main Navigation -- ', 'soledad' ) );

		$menus = get_terms( 'nav_menu', array( 'hide_empty' => $hide_empty ) );

		foreach ( $menus as $menu ) {
			$output[ $menu->term_id ] = $menu->name;
		}

		return $output;
	}
}

if ( ! function_exists( 'penci_get_data_slider' ) ):
	function penci_get_data_slider( $args ) {
		$items = $autoplay = $autotime = $speed = $loop = $showdots = $shownav = '';

		$args = wp_parse_args( $args, array(
			'items'    => '1',
			'autoplay' => '',
			'autotime' => '',
			'speed'    => '',
			'loop'     => '',
			'showdots' => '0',
			'shownav'  => '0',
		) );
		extract( $args );

		$data = ' data-items="' . $items . '"';
		$data .= ' data-auto="' . ( 'yes' == $autoplay ? 'true' : 'false' ) . '"';

		$data .= $autotime ? ' data-autotime="' . $autotime . '"' : '';
		$data .= $speed ? ' data-speed="' . $speed . '"' : '';
		$data .= ! $loop ? ' data-loop="false"' : '';
		$data .= $showdots ? ' data-dots="true"' : '';
		$data .= ! $shownav ? ' data-nav="true"' : '';

		return $data;
	}
endif;

if ( defined( 'ELEMENTOR_VERSION' ) || defined( 'WPB_VC_VERSION' ) ) {
	if ( ! function_exists( 'custom_css_title_block_pagebuilder' ) ) {
		add_action( 'soledad_theme/custom_css', 'custom_css_title_block_pagebuilder' );
		function custom_css_title_block_pagebuilder() {
			if ( get_theme_mod( 'penci_sidebar_heading_lowcase' ) ): ?>
				.penci-block-vc .penci-border-arrow .inner-arrow { text-transform: none; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_heading_size' ) ): ?>
				.penci-block-vc .penci-border-arrow .inner-arrow { font-size: <?php echo get_theme_mod( 'penci_sidebar_heading_size' ); ?>px; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_heading_image_8' ) ): ?>
				.penci-block-vc .style-8.penci-border-arrow .inner-arrow { background-image: url(<?php echo get_theme_mod( 'penci_sidebar_heading_image_8' ); ?>); }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_heading8_repeat' ) ): ?>
				.penci-block-vc .style-8.penci-border-arrow .inner-arrow { background-repeat: <?php echo get_theme_mod( 'penci_sidebar_heading8_repeat' ); ?>; background-size: auto; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_heading_bg' ) ): ?>
				.penci-block-vc .penci-border-arrow .inner-arrow { background-color: <?php echo get_theme_mod( 'penci_sidebar_heading_bg' ); ?>; }
				.penci-block-vc .style-2.penci-border-arrow:after{ border-top-color: <?php echo get_theme_mod( 'penci_sidebar_heading_bg' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_heading_outer_bg' ) ): ?>
				.penci-block-vc .penci-border-arrow:after { background-color: <?php echo get_theme_mod( 'penci_sidebar_heading_outer_bg' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_heading_border_color' ) ): ?>
				.penci-block-vc .penci-border-arrow .inner-arrow, .penci-block-vc.style-4 .penci-border-arrow .inner-arrow:before, .penci-block-vc.style-4 .penci-border-arrow .inner-arrow:after, .penci-block-vc.style-5 .penci-border-arrow, .penci-block-vc.style-7
				.penci-border-arrow, .penci-block-vc.style-9 .penci-border-arrow { border-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_color' ); ?>; }
				.penci-block-vc .penci-border-arrow:before { border-top-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_color' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_heading_border_color5' ) ): ?>
				.penci-block-vc .style-5.penci-border-arrow { border-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_color5' ); ?>; }
				.penci-block-vc .style-5.penci-border-arrow .inner-arrow{ border-bottom-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_color5' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_heading_border_color7' ) ): ?>
				.penci-block-vc .style-7.penci-border-arrow .inner-arrow:before, .penci-block-vc.style-9 .penci-border-arrow .inner-arrow:before { background-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_color7' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_heading_border_inner_color' ) ): ?>
				.penci-block-vc .penci-border-arrow:after { border-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_inner_color' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_heading_color' ) ): ?>
				.penci-block-vc .penci-border-arrow .inner-arrow { color: <?php echo get_theme_mod( 'penci_sidebar_heading_color' ); ?>; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_remove_border_outer' ) ): ?>
				.penci-block-vc .penci-border-arrow:after { content: none; display: none; }
				.penci-block-vc .widget-title{ margin-left: 0; margin-right: 0; margin-top: 0; }
				.penci-block-vc .penci-border-arrow:before{ bottom: -6px; border-width: 6px; margin-left: -6px; }
			<?php endif; ?>
			<?php if ( get_theme_mod( 'penci_sidebar_remove_arrow_down' ) ): ?>
				.penci-block-vc .penci-border-arrow:before, .penci-block-vc .style-2.penci-border-arrow:after { content: none; display: none; }
			<?php endif;
		}
	}
}

/**
 * Get icon font awesome with each version
 *
 * Note important : if edit function , please edit same function on penci snorlax framework
 * @see penci_icon_by_ver()
 */
if ( ! function_exists( 'penci_icon_by_ver' ) ):
	function penci_icon_by_ver( $class, $style = '' ) {
		$fontawesome_ver5 = get_theme_mod( 'penci_fontawesome_ver5' );

		if ( ! $fontawesome_ver5 ) {
			$class = str_replace( array( 'fab ', 'fal ', 'far ', 'fas ' ), 'fa ', $class );

			if( 'fa fa-facebook-f' == $class ){
				$class = str_replace( 'facebook-f', 'facebook', $class );
			}elseif( 'fa fa-thumbtack' == $class ){
				$class = str_replace( 'thumbtack', 'thumb-tack', $class );
			}elseif( 'fa fa-linkedin-in' == $class ){
				$class = str_replace( 'linkedin-in', 'linkedin', $class );
			}elseif( 'fa fa-image' == $class ){
				$class = str_replace( 'fa-image', 'fa-picture-o', $class );
			}elseif( 'fa fa-clock' == $class ){
				$class = str_replace( 'fa-clock', 'fa-clock-o', $class );
			}elseif( 'fa fa-user-circle-o' == $class ){
				$class = str_replace( 'fa-user-circle-o', 'fa-user-circle', $class );
			}elseif( 'fa fa-sign-out' == $class ){
				$class = str_replace( 'fa-sign-out', 'fa-sign-out-alt', $class );
			}elseif( 'fa fa-sync' == $class ){
				$class = str_replace( 'fa-sync', 'fa-refresh', $class );
			}elseif( 'fa fa-youtube' == $class ){
				$class = str_replace( 'fa-youtube', 'fa-youtube-play', $class );
			}elseif( 'fa fa-envelope-o' == $class ){
				$class = str_replace( 'fa-envelope-o', 'fa-envelope', $class );
			}elseif( 'fa fa-snapchat-ghost' == $class ){
				$class = str_replace( 'fa-snapchat-ghost', 'fa-snapchat', $class );
			}elseif( 'fa fa-vimeo-v' == $class ){
				$class = str_replace( 'fa-vimeo-v', 'fa-vimeo', $class );
			}elseif( 'fa fa-times' == $class ){
				$class = str_replace( 'fa-times', 'fa-close', $class );
			}elseif( 'fa fa-heart' == $class ){
				$class = str_replace( 'fa-heart', 'fa-heart-o', $class );
			}elseif( 'fa fa-comment' == $class ){
				$class = str_replace( 'fa-comment', 'fa-comment-o', $class );
			}
		}

		return '<i class="penci-faicon ' . esc_attr( $class ) . '" ' . ( $style ? ' ' . $style : '' ) . '></i>';
	}
endif;
/**
 * Show icon font awesome with each version
 *
 *  * Note important : if edit function , please edit same function on penci snorlax framework
 * @see penci_fawesome_icon()
 */
if ( ! function_exists( 'penci_fawesome_icon' ) ):
	function penci_fawesome_icon( $class, $style = '' ) {
		echo penci_icon_by_ver( $class, $style );
	}
endif;

/**
 * Trims post title.
 *
 * @param $id
 * @param int $length
 * @param null $more
 *
 * @return string
 */
if ( ! function_exists( 'penci_get_trim_post_title' ) ) {
	function penci_get_trim_post_title( $id = '', $length = 20, $more = '...' ) {
		if ( empty( $id ) ) {
			$id = get_the_ID();
		}

		if ( ! $length || ! is_numeric( $length ) ) {
			return get_the_title( $id );
		}

		return sanitize_text_field( wp_trim_words( wp_strip_all_tags( get_the_title( $id ) ), $length, $more ) );
	}
}
if ( ! function_exists( 'penci_trim_post_title' ) ) {
	function penci_trim_post_title( $id = '', $length = 20, $more = '...' ) {
		echo penci_get_trim_post_title( $id, $length, $more );
	}
}

if( !function_exists( 'penci_get_post_countview' ) ) {
	function penci_get_post_countview( $post_id = null ) {

		echo '<span>';
		penci_fawesome_icon('fas fa-eye');
		echo penci_get_post_views( $post_id );
		echo ' ' . penci_get_setting( 'penci_trans_countviews' );
		echo '</span>';
	}
}
