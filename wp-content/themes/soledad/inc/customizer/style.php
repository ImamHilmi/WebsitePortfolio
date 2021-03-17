<?php
/**
 * Add customize CSS from options customizer
 * Hook to wp_head() function to render style
 *
 * @package Wordpress
 * @since 1.0
 */
if( ! function_exists( 'pencidesign_return_css' ) ):
	function pencidesign_return_css() {
		ob_start();
		pencidesign_get_customizer_css_file();
		if ( is_page() ) {
			pencidesign_customizer_css_page_header_title();
			pencidesign_customizer_css_page_header_transparent();
		}
		
		$output = ob_get_contents();
		ob_end_clean();
		
		return $output;
	}
endif;

/* Customize CSS */
if( ! function_exists( 'pencidesign_customizer_css' ) ):
	function pencidesign_customizer_css() {
		if( get_theme_mod( 'penci_custom_code_inside_head_tag' ) ):
			echo do_shortcode( get_theme_mod( 'penci_custom_code_inside_head_tag' ) );
		endif;

		$string_css = pencidesign_return_css();
		$string_render = trim(preg_replace('/\s+/', ' ', $string_css));
		echo '<style id="penci-custom-style" type="text/css">';
		echo $string_render;
		echo '</style>';
	}
endif;

if( ! function_exists( 'pencidesign_get_customizer_css_file' ) ):
function pencidesign_get_customizer_css_file() {
	$single_image_ratio = get_theme_mod( 'penci_post_featured_image_ratio' );

	$pmeta_single_image_ratio = get_post_meta( get_the_ID(), 'penci_pfeatured_image_ratio', true );
	if( $pmeta_single_image_ratio ){
		$single_image_ratio = $pmeta_single_image_ratio ;
	}

	$single_style = penci_get_single_style();

	if( $single_image_ratio ){
		$single_image_ratio = array_filter( explode( ':', $single_image_ratio . ':') );
		$single_image_width = isset( $single_image_ratio[0] ) ? $single_image_ratio[0] : '';
		$single_image_height = isset( $single_image_ratio[1] ) ? $single_image_ratio[1] : '';

		if( $single_image_width && $single_image_height ) {
			echo '.single .penci-single-featured-img{ padding-top: ' . number_format(  $single_image_height / $single_image_width * 100, 4 ) . '% !important; }';
		}
	}

	if( get_theme_mod( 'penci_featured_image_size' ) == 'square' ) {
		echo '.penci-image-holder:before{ padding-top: 100%; }';
	} elseif( get_theme_mod( 'penci_featured_image_size' ) == 'vertical' ){
		echo '.penci-image-holder:before{ padding-top: 135.4%; }';
	}elseif( get_theme_mod( 'penci_featured_image_size' ) == 'custom' ){
		$single_image_ratio = get_theme_mod( 'penci_general_featured_image_ratio' );

		if( $single_image_ratio ){
			$single_image_ratio = array_filter( explode( ':', $single_image_ratio . ':') );
			$single_image_width = isset( $single_image_ratio[0] ) ? $single_image_ratio[0] : '';
			$single_image_height = isset( $single_image_ratio[1] ) ? $single_image_ratio[1] : '';

			if( $single_image_width && $single_image_height ) {
				echo '.penci-image-holder:before{ padding-top: ' . number_format(  $single_image_height / $single_image_width * 100, 4 ) . '%; }';
			}
		}
	}

	if( get_theme_mod( 'penci_mega_featured_image_size' ) == 'square' ) {
		echo '.penci-megamenu .penci-image-holder:before{ padding-top: 100%; }';
	} elseif( get_theme_mod( 'penci_mega_featured_image_size' ) == 'vertical' ){
		echo '.penci-megamenu .penci-image-holder:before{ padding-top: 135.4%; }';
	}elseif( get_theme_mod( 'penci_mega_featured_image_size' ) == 'custom' ){
		$single_image_ratio = get_theme_mod( 'penci_mega_featured_image_ratio' );

		if( $single_image_ratio ){
			$single_image_ratio = array_filter( explode( ':', $single_image_ratio . ':') );
			$single_image_width = isset( $single_image_ratio[0] ) ? $single_image_ratio[0] : '';
			$single_image_height = isset( $single_image_ratio[1] ) ? $single_image_ratio[1] : '';

			if( $single_image_width && $single_image_height ) {
				echo '.penci-megamenu .penci-image-holder:before{ padding-top: ' . number_format(  $single_image_height / $single_image_width * 100, 4 ) . '%; }';
			}
		}
	}
	
	if ( function_exists( 'penci_soledad_list_self_fonts' ) ) {
		penci_soledad_list_self_fonts();
	}
	if( function_exists( 'penci_soledad_add_custom_fonts' ) ) {
		penci_soledad_add_custom_fonts();
	}

	if( get_theme_mod( 'penci_font_for_title' ) && '"Raleway", "100:200:300:regular:500:600:700:800:900", sans-serif' != get_theme_mod( 'penci_font_for_title' ) ) {
		$font_family_title = get_theme_mod( 'penci_font_for_title' );
		$font_family_title_end = $font_family_title;
		if( !in_array( $font_family_title, penci_font_browser() ) ) {
			$font_family_title = str_replace('"','',$font_family_title);
			$font_title_explo = explode(", ",$font_family_title);
			$font_title = isset(  $font_title_explo[0] ) ? $font_title_explo[0] : '';
			$font_title_serif = isset( $font_title_explo[2] ) ? $font_title_explo[2] : '';
			$space_end = ', ';
			if( empty( $font_title_serif ) ): $space_end = ''; endif;
			$font_family_title_end = "'". $font_title ."'". $space_end . $font_title_serif;
		}
		?>
		#main .bbp-login-form .bbp-submit-wrapper button[type="submit"],
		h1, h2, h3, h4, h5, h6, h2.penci-heading-video, #navigation .menu li a, .penci-photo-2-effect figcaption h2, .headline-title, a.penci-topbar-post-title, #sidebar-nav .menu li a, .penci-slider .pencislider-container .pencislider-content .pencislider-title, .penci-slider
		.pencislider-container .pencislider-content .pencislider-button,
		.author-quote span, .penci-more-link a.more-link, .penci-post-share-box .dt-share, .post-share a .dt-share, .author-content h5, .post-pagination h5, .post-box-title, .penci-countdown .countdown-amount, .penci-countdown .countdown-period, .penci-pagination a, .penci-pagination .disable-url, ul.footer-socials li a span,
		.penci-button,.widget input[type="submit"],.penci-user-logged-in .penci-user-action-links a, .widget button[type="submit"], .penci-sidebar-content .widget-title, #respond h3.comment-reply-title span, .widget-social.show-text a span, .footer-widget-wrapper .widget .widget-title,.penci-user-logged-in .penci-user-action-links a,
		.container.penci-breadcrumb span, .container.penci-breadcrumb span a, .penci-container-inside.penci-breadcrumb span, .penci-container-inside.penci-breadcrumb span a, .container.penci-breadcrumb span, .container.penci-breadcrumb span a, .error-404 .go-back-home a, .post-entry .penci-portfolio-filter ul li a, .penci-portfolio-filter ul li a, .portfolio-overlay-content .portfolio-short .portfolio-title a, .home-featured-cat-content .magcat-detail h3 a, .post-entry blockquote cite,
		.post-entry blockquote .author, .tags-share-box.hide-tags.page-share .share-title, .widget ul.side-newsfeed li .side-item .side-item-text h4 a, .thecomment .comment-text span.author, .thecomment .comment-text span.author a, .post-comments span.reply a, #respond h3, #respond label, .wpcf7 label, #respond #submit,
		div.wpforms-container .wpforms-form.wpforms-form .wpforms-field-label,div.wpforms-container .wpforms-form.wpforms-form input[type=submit], div.wpforms-container .wpforms-form.wpforms-form button[type=submit], div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button,
		.wpcf7 input[type="submit"], .widget_wysija input[type="submit"], .archive-box span,
		.archive-box h1, .gallery .gallery-caption, .contact-form input[type=submit], ul.penci-topbar-menu > li a, div.penci-topbar-menu > ul > li a, .featured-style-29 .penci-featured-slider-button a, .pencislider-container .pencislider-content .pencislider-title, .pencislider-container
		.pencislider-content .pencislider-button, ul.homepage-featured-boxes .penci-fea-in.boxes-style-3 h4 span span, .pencislider-container .pencislider-content .pencislider-button, .woocommerce div.product .woocommerce-tabs .panel #respond .comment-reply-title, .penci-recipe-index-wrap .penci-index-more-link a, .penci-menu-hbg .menu li a, #sidebar-nav .menu li a, .penci-readmore-btn.penci-btn-make-button a,
		.bos_searchbox_widget_class #flexi_searchbox h1, .bos_searchbox_widget_class #flexi_searchbox h2, .bos_searchbox_widget_class #flexi_searchbox h3, .bos_searchbox_widget_class #flexi_searchbox h4,
		.bos_searchbox_widget_class #flexi_searchbox #b_searchboxInc .b_submitButton_wrapper .b_submitButton:hover, .bos_searchbox_widget_class #flexi_searchbox #b_searchboxInc .b_submitButton_wrapper .b_submitButton,
		.penci-featured-cat-seemore.penci-btn-make-button a, .penci-menu-hbg-inner .penci-hbg_sitetitle { font-family: <?php echo sanitize_text_field( $font_family_title_end ); ?>; }
		.featured-style-29 .penci-featured-slider-button a, #bbpress-forums #bbp-search-form .button{ font-weight: bold; }
		<?php
	}
	?>
	<?php
	$body_font_html = '';
	if( get_theme_mod( 'penci_font_weight_bodytext' ) ){ $body_font_html = 'font-weight: ' . get_theme_mod( 'penci_font_weight_bodytext' ) . ';'; }
	if( get_theme_mod( 'penci_font_for_body' ) && '"PT Serif", "regular:italic:700:700italic", serif' != get_theme_mod( 'penci_font_for_body' ) ) {
		$font_family_body = get_theme_mod( 'penci_font_for_body' );
		$font_family_body_end = $font_family_body;
		if( !in_array( $font_family_body, penci_font_browser() ) ) {
			$font_family_body = str_replace('"','',$font_family_body);
			$font_body_explo = explode(", ",$font_family_body);
			$font_body = isset( $font_body_explo[0] ) ? $font_body_explo[0] : '';
			$font_body_serif = isset( $font_body_explo[2] ) ? $font_body_explo[2] : '';
			$space_body_end = ', ';
			if( empty( $font_body_serif ) ): $space_body_end = ''; endif;
			$font_family_body_end = "'". $font_body ."'". $space_body_end . $font_body_serif;
		}
		$body_font_html .= 'font-family: '. $font_family_body_end .';';
	}
	if( get_theme_mod( 'penci_font_weight_bodytext' ) || get_theme_mod( 'penci_font_for_body' ) ){
	?>
	#main #bbpress-forums .bbp-login-form fieldset.bbp-form select, #main #bbpress-forums .bbp-login-form .bbp-form input[type="password"], #main #bbpress-forums .bbp-login-form .bbp-form input[type="text"],
	body, textarea, #respond textarea, .widget input[type="text"], .widget input[type="email"], .widget input[type="date"], .widget input[type="number"], .wpcf7 textarea, .mc4wp-form input, #respond input,
	div.wpforms-container .wpforms-form.wpforms-form input[type=date], div.wpforms-container .wpforms-form.wpforms-form input[type=datetime], div.wpforms-container .wpforms-form.wpforms-form input[type=datetime-local], div.wpforms-container .wpforms-form.wpforms-form input[type=email], div.wpforms-container .wpforms-form.wpforms-form input[type=month], div.wpforms-container .wpforms-form.wpforms-form input[type=number], div.wpforms-container .wpforms-form.wpforms-form input[type=password], div.wpforms-container .wpforms-form.wpforms-form input[type=range], div.wpforms-container .wpforms-form.wpforms-form input[type=search], div.wpforms-container .wpforms-form.wpforms-form input[type=tel], div.wpforms-container .wpforms-form.wpforms-form input[type=text], div.wpforms-container .wpforms-form.wpforms-form input[type=time], div.wpforms-container .wpforms-form.wpforms-form input[type=url], div.wpforms-container .wpforms-form.wpforms-form input[type=week], div.wpforms-container .wpforms-form.wpforms-form select, div.wpforms-container .wpforms-form.wpforms-form textarea,
	.wpcf7 input, #searchform input.search-input, ul.homepage-featured-boxes .penci-fea-in
	h4, .widget.widget_categories ul li span.category-item-count, .about-widget .about-me-heading, .widget ul.side-newsfeed li .side-item .side-item-text .side-item-meta { <?php echo $body_font_html; ?> }
	p { line-height: 1.8; }
	<?php } ?>
	<?php
	if( get_theme_mod( 'penci_font_for_slogan' ) ) {
		$font_family_slogan = get_theme_mod( 'penci_font_for_slogan' );
		$font_family_slogan_end = $font_family_slogan;
		if( !in_array( $font_family_slogan, penci_font_browser() ) ) {
			$font_family_slogan = str_replace('"','',$font_family_slogan);
			$font_slogan_explo = explode(", ",$font_family_slogan);
			$font_slogan = isset( $font_slogan_explo[0] ) ? $font_slogan_explo[0] : '';
			$font_slogan_serif = isset( $font_slogan_explo[2] ) ? $font_slogan_explo[2] : '';
			$space_slogan_end = ', ';
			if( empty( $font_slogan_serif ) ): $space_slogan_end = ''; endif;
			$font_family_slogan_end = "'". $font_slogan ."'". $space_slogan_end . $font_slogan_serif;
		}
		?>
		.header-slogan .header-slogan-text{ font-family: <?php echo sanitize_text_field( $font_family_slogan_end ); ?>;  }
	<?php } ?>
	<?php
	if( get_theme_mod( 'penci_font_for_menu' ) ) {
		$font_family_menu = get_theme_mod( 'penci_font_for_menu' );
		$font_family_menu_end = $font_family_menu;
		if( !in_array( $font_family_menu, penci_font_browser() ) ) {
			$font_family_menu = str_replace('"','',$font_family_menu);
			$font_menu_explo = explode(", ",$font_family_menu);
			$font_menu = isset( $font_menu_explo[0] ) ? $font_menu_explo[0] : '';
			$font_menu_serif = isset( $font_menu_explo[2] ) ? $font_menu_explo[2] : '';
			$space_menu_end = ', ';
			if( empty( $font_menu_serif ) ): $space_menu_end = ''; endif;
			$font_family_menu_end = "'". $font_menu ."'". $space_menu_end . $font_menu_serif;
		}
		?>
		#navigation .menu li a, .penci-menu-hbg .menu li a, #sidebar-nav .menu li a { font-family: <?php echo sanitize_text_field( $font_family_menu_end ); ?>; font-weight: normal; }
	<?php } ?>
	.penci-hide-tagupdated{ display: none !important; }
	<?php if(get_theme_mod('penci_font_style_slogan')): ?>
		.header-slogan .header-slogan-text { font-style:<?php echo get_theme_mod( 'penci_font_style_slogan' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_font_weight_slogan')): ?>
		.header-slogan .header-slogan-text { font-weight:<?php echo get_theme_mod( 'penci_font_weight_slogan' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_font_size_slogan')): ?>
		.header-slogan .header-slogan-text { font-size:<?php echo get_theme_mod( 'penci_font_size_slogan' ); ?>px; }
	<?php endif; ?>
	<?php
	$body_size = get_theme_mod('penci_font_for_size_body');
	if( is_numeric( $body_size ) && $body_size > 1 && $body_size != '14' ): ?>
		body, .widget ul li a{ font-size: <?php echo absint( $body_size ); ?>px; }
		.widget ul li, .post-entry, p, .post-entry p { font-size: <?php echo absint( $body_size ); ?>px; line-height: 1.8; }
	<?php endif; ?>
	<?php if( get_theme_mod('penci_font_mfor_size_body') && '14' != get_theme_mod('penci_font_mfor_size_body') ): ?>
		@media only screen and (max-width: 480px){ body, .widget ul li a, .widget ul li, .post-entry, p, .post-entry p{ font-size: <?php echo get_theme_mod('penci_font_mfor_size_body'); ?>px; } }
	<?php endif; ?>
	<?php if( get_theme_mod('penci_archive_fpagetitle') ): ?>
		.archive-box span, .archive-box h1{ font-size: <?php echo get_theme_mod('penci_archive_fpagetitle'); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod('penci_archive_mobile_fpagetitle') ): ?>
		@media only screen and (max-width: 479px){ .archive-box span, .archive-box h1{ font-size: <?php echo get_theme_mod('penci_archive_mobile_fpagetitle'); ?>px; } }
	<?php endif; ?>
	<?php if( get_theme_mod('penci_body_line_height') && '1.8' != get_theme_mod('penci_body_line_height') ): ?>
		.widget ul li, .post-entry, p, .post-entry p{ line-height: <?php echo get_theme_mod('penci_body_line_height'); ?>; }
	<?php endif; ?>
	<?php
	if( get_theme_mod('penci_font_weight_title') ) {
		?>
		h1, h2, h3, h4, h5, h6, #sidebar-nav .menu li a, #navigation .menu li a, a.penci-topbar-post-title, .penci-slider .pencislider-container .pencislider-content .pencislider-title, .penci-slider .pencislider-container .pencislider-content .pencislider-button,
		.headline-title, .author-quote span, .penci-more-link a.more-link, .author-content h5, .post-pagination h5, .post-box-title, .penci-countdown .countdown-amount, .penci-countdown .countdown-period, .penci-pagination a, .penci-pagination .disable-url, ul.footer-socials li a span,
		.penci-sidebar-content .widget-title, #respond h3.comment-reply-title span, .widget-social.show-text a span, .footer-widget-wrapper .widget .widget-title, .error-404 .go-back-home a, .home-featured-cat-content .magcat-detail h3 a, .post-entry blockquote cite, .pencislider-container .pencislider-content .pencislider-title, .pencislider-container
		.pencislider-content .pencislider-button, .post-entry blockquote .author, .tags-share-box.hide-tags.page-share .share-title, .widget ul.side-newsfeed li .side-item .side-item-text h4 a, .thecomment .comment-text span.author, .thecomment .comment-text span.author a, #respond h3, #respond label, .wpcf7 label,
		div.wpforms-container .wpforms-form.wpforms-form .wpforms-field-label,div.wpforms-container .wpforms-form.wpforms-form input[type=submit], div.wpforms-container .wpforms-form.wpforms-form button[type=submit], div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button,
		#respond #submit, .wpcf7 input[type="submit"], .widget_wysija input[type="submit"], .archive-box span,
		.archive-box h1, .gallery .gallery-caption, .widget input[type="submit"],.penci-button, #main .bbp-login-form .bbp-submit-wrapper button[type="submit"], .widget button[type="submit"], .contact-form input[type=submit], ul.penci-topbar-menu > li a, div.penci-topbar-menu > ul > li a, .penci-recipe-index-wrap .penci-index-more-link a, #bbpress-forums #bbp-search-form .button, .penci-menu-hbg .menu li a, #sidebar-nav .menu li a, .penci-readmore-btn.penci-btn-make-button a, .penci-featured-cat-seemore.penci-btn-make-button a, .penci-menu-hbg-inner .penci-hbg_sitetitle { font-weight: <?php echo get_theme_mod('penci_font_weight_title'); ?>; }
		<?php
	}
	?>
	<?php if( get_theme_mod('penci_image_border_radius') ) { ?>
		.penci-image-holder, .standard-post-image img, .penci-overlay-over:before, .penci-overlay-over .overlay-border, .penci-grid li .item img,
		.penci-masonry .item-masonry a img, .penci-grid .list-post.list-boxed-post, .penci-grid li.list-boxed-post-2 .content-boxed-2, .grid-mixed,
		.penci-grid li.typography-style .overlay-typography, .penci-grid li.typography-style .overlay-typography:before, .penci-grid li.typography-style .overlay-typography:after,
		.container-single .post-image, .home-featured-cat-content .mag-photo .mag-overlay-photo, .mag-single-slider-overlay, ul.homepage-featured-boxes li .penci-fea-in:before, ul.homepage-featured-boxes li .penci-fea-in:after, ul.homepage-featured-boxes .penci-fea-in .fea-box-img:after, ul.homepage-featured-boxes li .penci-fea-in, .penci-slider38-overlay { border-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; -webkit-border-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; }
		.penci-featured-content-right:before{ border-top-right-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; border-bottom-right-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; }
		.penci-slider4-overlay, .penci-slide-overlay .overlay-link, .featured-style-29 .featured-slider-overlay, .penci-widget-slider-overlay{ border-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; -webkit-border-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; }
		.penci-flat-overlay .penci-slide-overlay .penci-mag-featured-content:before{ border-bottom-left-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; border-bottom-right-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; }
	<?php } ?>
	<?php if( get_theme_mod('penci_slider_border_radius') || '0' == get_theme_mod('penci_slider_border_radius') ) { ?>
		.featured-area .penci-image-holder, .featured-area .penci-slider4-overlay, .featured-area .penci-slide-overlay .overlay-link, .featured-style-29 .featured-slider-overlay, .penci-slider38-overlay{ border-radius: <?php echo get_theme_mod('penci_slider_border_radius'); ?>; -webkit-border-radius: <?php echo get_theme_mod('penci_slider_border_radius'); ?>; }
		.penci-featured-content-right:before{ border-top-right-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; border-bottom-right-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; }
		.penci-flat-overlay .penci-slide-overlay .penci-mag-featured-content:before{ border-bottom-left-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; border-bottom-right-radius: <?php echo get_theme_mod('penci_image_border_radius'); ?>; }
	<?php } ?>
	<?php if( get_theme_mod('penci_post_featured_image_radius') || '0' == get_theme_mod('penci_post_featured_image_radius') ) { ?>
		.container-single .post-image{ border-radius: <?php echo get_theme_mod('penci_post_featured_image_radius'); ?>; -webkit-border-radius: <?php echo get_theme_mod('penci_post_featured_image_radius'); ?>; }
	<?php } ?>
	<?php if( get_theme_mod('penci_megamenu_border_radius') || '0' == get_theme_mod('penci_megamenu_border_radius') ) { ?>
		.penci-mega-thumbnail .penci-image-holder{ border-radius: <?php echo get_theme_mod('penci_megamenu_border_radius'); ?>; -webkit-border-radius: <?php echo get_theme_mod('penci_megamenu_border_radius'); ?>; }
	<?php } ?>
	<?php if( get_theme_mod('penci_font_weight_menu') && ( get_theme_mod('penci_font_weight_menu') != 'normal' ) ) { ?>
		#navigation .menu li a, .penci-menu-hbg .menu li a, #sidebar-nav .menu li a { font-weight: <?php echo get_theme_mod('penci_font_weight_menu'); ?>; }
	<?php } ?>
	<?php if(get_theme_mod('penci_body_boxed_bg_color')): ?>
		body.penci-body-boxed { background-color:<?php echo get_theme_mod( 'penci_body_boxed_bg_color' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_body_boxed_bg_image')): ?>
		body.penci-body-boxed { background-image: url(<?php echo get_theme_mod( 'penci_body_boxed_bg_image' ); ?>); }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_body_boxed_bg_repeat')): ?>
		body.penci-body-boxed { background-repeat:<?php echo get_theme_mod( 'penci_body_boxed_bg_repeat' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_body_boxed_bg_attachment')): ?>
		body.penci-body-boxed { background-attachment:<?php echo get_theme_mod( 'penci_body_boxed_bg_attachment' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_body_boxed_bg_size')): ?>
		body.penci-body-boxed { background-size:<?php echo get_theme_mod( 'penci_body_boxed_bg_size' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_header_padding')): ?>
		#header .inner-header .container { padding:<?php echo get_theme_mod( 'penci_header_padding' ); ?>px 0; }
	<?php endif; ?>

	<?php if( get_theme_mod('penci_logo_max_width') && get_theme_mod('penci_logo_max_width') > 0 ): ?>
		#logo a { max-width:<?php echo get_theme_mod( 'penci_logo_max_width' ); ?>px; }
		@media only screen and (max-width: 960px) and (min-width: 768px){ #logo img{ max-width: 100%; } }
	<?php endif; ?>
	<?php if( get_theme_mod('penci_logo_max_width_overflow') && get_theme_mod('penci_logo_max_width_overflow') > 0 ): ?>
		@media only screen and (min-width: 960px){.is-sticky #navigation.penci-logo-overflow.header-10 #logo a, .is-sticky #navigation.penci-logo-overflow.header-11 #logo a{ max-width:<?php echo get_theme_mod( 'penci_logo_max_width_overflow' ); ?>px; }}
	<?php endif; ?>
	<?php if(get_theme_mod('penci_page_custom_width')): ?>
		.penci-page-container-smaller { max-width:<?php echo get_theme_mod( 'penci_page_custom_width' ); ?>px; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_page_title_uppercase')): ?>
		.penci-page-header h1 { text-transform: none; }
	<?php endif; ?>
	<?php echo penci_renders_css('.penci-page-header h1', 'penci_page_title_fsize'); ?>
	<?php if(get_theme_mod('penci_pagetitle_color')): ?>
		.penci-page-header h1 { color: <?php echo get_theme_mod( 'penci_pagetitle_color' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_page_sharetext_fsize')): ?>
		.tags-share-box.hide-tags.page-share .share-title{ font-size: <?php echo get_theme_mod( 'penci_page_sharetext_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_page_shareicon_fsize')): ?>
		.tags-share-box.hide-tags.page-share .post-share a{ font-size: <?php echo get_theme_mod( 'penci_page_shareicon_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_psharetext_color')): ?>
		.tags-share-box.hide-tags.page-share .share-title{ color: <?php echo get_theme_mod( 'penci_psharetext_color' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_pageshareicon_color')): ?>
		.tags-share-box.hide-tags.page-share .post-share a{ color: <?php echo get_theme_mod( 'penci_pageshareicon_color' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_pageshareicon_hcolor')): ?>
		.tags-share-box.hide-tags.page-share .post-share a:hover{ color: <?php echo get_theme_mod( 'penci_pageshareicon_hcolor' ); ?>; }
	<?php endif; ?>
	
	<?php if(get_theme_mod('penci_not_found_removeline')): ?>
		.error-image{ padding-bottom: 0; } .error-image:after{ content: none; display: none; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_notfound_message_fsize')): ?>
		.error-404 .sub-heading-text-404{ font-size: <?php echo get_theme_mod( 'penci_notfound_message_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_notfound_input_fsize')): ?>
		.error-404 form#searchform input.search-input{ font-size: <?php echo get_theme_mod( 'penci_notfound_input_fsize' ); ?>px; letter-spacing: 0; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_notfound_backhome_fsize')): ?>
		.error-404 .go-back-home a{ font-size: <?php echo get_theme_mod( 'penci_notfound_backhome_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_404_line_color')): ?>
		.error-image:after{ background-color: <?php echo get_theme_mod( 'penci_404_line_color' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_404_message_ctext')): ?>
		.error-404 .sub-heading-text-404{ color: <?php echo get_theme_mod( 'penci_404_message_ctext' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_404_input_color')): ?>
		.error-404 form#searchform input.search-input{ color: <?php echo get_theme_mod( 'penci_404_input_color' ); ?>; }
		.error-404 form#searchform input.search-input::-webkit-input-placeholder{ color: <?php echo get_theme_mod( 'penci_404_input_color' ); ?>; }
		.error-404 form#searchform input.search-input:-ms-input-placeholder{ color: <?php echo get_theme_mod( 'penci_404_input_color' ); ?>; }
		.error-404 form#searchform input.search-input::placeholder{ color: <?php echo get_theme_mod( 'penci_404_input_color' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_404_formborder_color')): ?>
		.error-404 form#searchform input.search-input{ border-color: <?php echo get_theme_mod( 'penci_404_formborder_color' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_404_backhome_color')): ?>
		.error-404 .go-back-home a{ color: <?php echo get_theme_mod( 'penci_404_backhome_color' ); ?>; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_post_caption_below')): ?>
		.wp-caption p.wp-caption-text, .penci-featured-caption { position: static; background: none; padding: 11px 0 0; color: #888; }
		.wp-caption:hover p.wp-caption-text, .post-image:hover .penci-featured-caption{ opacity: 1; transform: none; -webkit-transform: none; }
	<?php endif; ?>
	<?php if(get_theme_mod('penci_post_caption_disable_italic')): ?>
		.wp-caption p.wp-caption-text, .penci-featured-caption { font-style: normal; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_enable_dark_layout' ) ): ?>
	.post-entry .wp-block-quote, .wpb_text_column .wp-block-quote, .woocommerce .page-description .wp-block-quote{ border-color: #888; }
	<?php endif;?>
	<?php if( get_theme_mod( 'penci_bg_color_dark' ) ): ?>
		.penci-single-style-7:not( .penci-single-pheader-noimg ).penci_sidebar #main article.post, .penci-single-style-3:not( .penci-single-pheader-noimg ).penci_sidebar #main article.post { background-color: <?php echo penci_get_setting( 'penci_bg_color_dark' ); ?>; }
		@media only screen and (max-width: 767px){ .standard-post-special_wrapper { background: <?php echo penci_get_setting( 'penci_bg_color_dark' ); ?>; } }
		.wrapper-boxed, .wrapper-boxed.enable-boxed, .home-pupular-posts-title span, .penci-post-box-meta.penci-post-box-grid .penci-post-share-box, .penci-pagination.penci-ajax-more a.penci-ajax-more-button, #searchform input.search-input, .woocommerce .woocommerce-product-search input[type="search"], .overlay-post-box-meta, .widget ul.side-newsfeed li.featured-news2 .side-item .side-item-text, .widget select, .widget select option, .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, #penci-demobar, #penci-demobar .style-toggle, .grid-overlay-meta .grid-header-box, .header-standard.standard-overlay-meta{ background-color: <?php echo penci_get_setting( 'penci_bg_color_dark' ); ?>; }
		.penci-grid .list-post.list-boxed-post .item > .thumbnail:before{ border-right-color: <?php echo penci_get_setting( 'penci_bg_color_dark' ); ?>; }
		.penci-grid .list-post.list-boxed-post:nth-of-type(2n+2) .item > .thumbnail:before{ border-left-color: <?php echo penci_get_setting( 'penci_bg_color_dark' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_border_color_dark' ) ): ?>
		#main #bbpress-forums .bbp-login-form fieldset.bbp-form select, #main #bbpress-forums .bbp-login-form .bbp-form input[type="password"], #main #bbpress-forums .bbp-login-form .bbp-form input[type="text"],
		.widget ul li, .grid-mixed, .penci-post-box-meta, .penci-pagination.penci-ajax-more a.penci-ajax-more-button, .widget-social a i, .penci-home-popular-posts, .header-header-1.has-bottom-line, .header-header-4.has-bottom-line, .header-header-7.has-bottom-line, .container-single .post-entry .post-tags a,.tags-share-box.tags-share-box-2_3,.tags-share-box.tags-share-box-top, .tags-share-box, .post-author, .post-pagination, .post-related, .post-comments .post-title-box, .comments .comment, #respond textarea, .wpcf7 textarea, #respond input,
		div.wpforms-container .wpforms-form.wpforms-form input[type=date], div.wpforms-container .wpforms-form.wpforms-form input[type=datetime], div.wpforms-container .wpforms-form.wpforms-form input[type=datetime-local], div.wpforms-container .wpforms-form.wpforms-form input[type=email], div.wpforms-container .wpforms-form.wpforms-form input[type=month], div.wpforms-container .wpforms-form.wpforms-form input[type=number], div.wpforms-container .wpforms-form.wpforms-form input[type=password], div.wpforms-container .wpforms-form.wpforms-form input[type=range], div.wpforms-container .wpforms-form.wpforms-form input[type=search], div.wpforms-container .wpforms-form.wpforms-form input[type=tel], div.wpforms-container .wpforms-form.wpforms-form input[type=text], div.wpforms-container .wpforms-form.wpforms-form input[type=time], div.wpforms-container .wpforms-form.wpforms-form input[type=url], div.wpforms-container .wpforms-form.wpforms-form input[type=week], div.wpforms-container .wpforms-form.wpforms-form select, div.wpforms-container .wpforms-form.wpforms-form textarea,
		.wpcf7 input, .widget_wysija input, #respond h3, #searchform input.search-input, .post-password-form input[type="text"], .post-password-form input[type="email"], .post-password-form input[type="password"], .post-password-form input[type="number"], .penci-recipe, .penci-recipe-heading, .penci-recipe-ingredients, .penci-recipe-notes, .penci-pagination ul.page-numbers li span, .penci-pagination ul.page-numbers li a, #comments_pagination span, #comments_pagination a, body.author .post-author, .tags-share-box.hide-tags.page-share, .penci-grid li.list-post, .penci-grid li.list-boxed-post-2 .content-boxed-2, .home-featured-cat-content .mag-post-box, .home-featured-cat-content.style-2 .mag-post-box.first-post, .home-featured-cat-content.style-10 .mag-post-box.first-post, .widget select, .widget ul ul, .widget input[type="text"], .widget input[type="email"], .widget input[type="date"], .widget input[type="number"], .widget input[type="search"], .widget .tagcloud a, #wp-calendar tbody td, .woocommerce div.product .entry-summary div[itemprop="description"] td, .woocommerce div.product .entry-summary div[itemprop="description"] th, .woocommerce div.product .woocommerce-tabs #tab-description td, .woocommerce div.product .woocommerce-tabs #tab-description th, .woocommerce-product-details__short-description td, th, .woocommerce ul.cart_list li, .woocommerce ul.product_list_widget li, .woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total, .woocommerce .woocommerce-product-search input[type="search"], .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce div.product .product_meta, .woocommerce div.product .woocommerce-tabs ul.tabs, .woocommerce div.product .related > h2, .woocommerce div.product .upsells > h2, .woocommerce #reviews #comments ol.commentlist li .comment-text, .woocommerce table.shop_table td, .post-entry td, .post-entry th, #add_payment_method .cart-collaterals .cart_totals tr td, #add_payment_method .cart-collaterals .cart_totals tr th, .woocommerce-cart .cart-collaterals .cart_totals tr td, .woocommerce-cart .cart-collaterals .cart_totals tr th, .woocommerce-checkout .cart-collaterals .cart_totals tr td, .woocommerce-checkout .cart-collaterals .cart_totals tr th, .woocommerce-cart .cart-collaterals .cart_totals table, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce table.shop_table a.remove, .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text, .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, .woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce form.register, .woocommerce form.checkout table.shop_table, .woocommerce-checkout #payment ul.payment_methods, .post-entry table, .wrapper-penci-review, .penci-review-container.penci-review-count, #penci-demobar .style-toggle, #widget-area, .post-entry hr, .wpb_text_column hr, #buddypress .dir-search input[type=search], #buddypress .dir-search input[type=text], #buddypress .groups-members-search input[type=search], #buddypress .groups-members-search input[type=text], #buddypress ul.item-list, #buddypress .profile[role=main], #buddypress select, #buddypress div.pagination .pagination-links span, #buddypress div.pagination .pagination-links a, #buddypress div.pagination .pag-count, #buddypress div.pagination .pagination-links a:hover, #buddypress ul.item-list li, #buddypress table.forum tr td.label, #buddypress table.messages-notices tr td.label, #buddypress table.notifications tr td.label, #buddypress table.notifications-settings tr td.label, #buddypress table.profile-fields tr td.label, #buddypress table.wp-profile-fields tr td.label, #buddypress table.profile-fields:last-child, #buddypress form#whats-new-form textarea, #buddypress .standard-form input[type=text], #buddypress .standard-form input[type=color], #buddypress .standard-form input[type=date], #buddypress .standard-form input[type=datetime], #buddypress .standard-form input[type=datetime-local], #buddypress .standard-form input[type=email], #buddypress .standard-form input[type=month], #buddypress .standard-form input[type=number], #buddypress .standard-form input[type=range], #buddypress .standard-form input[type=search], #buddypress .standard-form input[type=password], #buddypress .standard-form input[type=tel], #buddypress .standard-form input[type=time], #buddypress .standard-form input[type=url], #buddypress .standard-form input[type=week], .bp-avatar-nav ul, .bp-avatar-nav ul.avatar-nav-items li.current, #bbpress-forums li.bbp-body ul.forum, #bbpress-forums li.bbp-body ul.topic, #bbpress-forums li.bbp-footer, .bbp-pagination-links a, .bbp-pagination-links span.current, .wrapper-boxed .bbp-pagination-links a:hover, .wrapper-boxed .bbp-pagination-links span.current, #buddypress .standard-form select, #buddypress .standard-form input[type=password], #buddypress .activity-list li.load-more a, #buddypress .activity-list li.load-newest a, #buddypress ul.button-nav li a, #buddypress div.generic-button a, #buddypress .comment-reply-link, #bbpress-forums div.bbp-template-notice.info, #bbpress-forums #bbp-search-form #bbp_search, #bbpress-forums .bbp-forums-list, #bbpress-forums #bbp_topic_title, #bbpress-forums #bbp_topic_tags, #bbpress-forums .wp-editor-container, .widget_display_stats dd, .widget_display_stats dt, div.bbp-forum-header, div.bbp-topic-header, div.bbp-reply-header, .widget input[type="text"], .widget input[type="email"], .widget input[type="date"], .widget input[type="number"], .widget input[type="search"], .widget input[type="password"], blockquote.wp-block-quote, .post-entry blockquote.wp-block-quote, .wp-block-quote:not(.is-large):not(.is-style-large), .post-entry pre, .wp-block-pullquote:not(.is-style-solid-color), .post-entry hr.wp-block-separator, .wp-block-separator, .wp-block-latest-posts, .wp-block-yoast-how-to-block ol.schema-how-to-steps, .wp-block-yoast-how-to-block ol.schema-how-to-steps li, .wp-block-yoast-faq-block .schema-faq-section, .post-entry .wp-block-quote, .wpb_text_column .wp-block-quote, .woocommerce .page-description .wp-block-quote, .wp-block-search .wp-block-search__input{ border-color: <?php echo penci_get_setting( 'penci_border_color_dark' ); ?>; }
		.penci-recipe-index-wrap h4.recipe-index-heading > span:before, .penci-recipe-index-wrap h4.recipe-index-heading > span:after{ border-color: <?php echo penci_get_setting( 'penci_border_color_dark' ); ?>; opacity: 1; }
		.tags-share-box .single-comment-o:after, .post-share a.penci-post-like:after{ background-color: <?php echo penci_get_setting( 'penci_border_color_dark' ); ?>; }
		.penci-grid .list-post.list-boxed-post{ border-color: <?php echo penci_get_setting( 'penci_border_color_dark' ); ?> !important; }
		.penci-post-box-meta.penci-post-box-grid:before, .woocommerce .widget_price_filter .ui-slider .ui-slider-range{ background-color: <?php echo penci_get_setting( 'penci_border_color_dark' ); ?>; }
		.penci-pagination.penci-ajax-more a.penci-ajax-more-button.loading-posts{ border-color: <?php echo penci_get_setting( 'penci_border_color_dark' ); ?> !important; }
		.penci-vernav-enable .penci-menu-hbg{ box-shadow: none; -webkit-box-shadow: none; -moz-box-shadow: none; }
		.penci-vernav-enable.penci-vernav-poleft .penci-menu-hbg{ border-right: 1px solid <?php echo penci_get_setting( 'penci_border_color_dark' ); ?>; }
		.penci-vernav-enable.penci-vernav-poright .penci-menu-hbg{ border-left: 1px solid <?php echo penci_get_setting( 'penci_border_color_dark' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_enable_dark_layout' ) ): ?>
		body, .penci-post-box-meta .penci-post-share-box a, .penci-pagination a, .penci-pagination .disable-url, .widget-social a i, .post-share a, #respond textarea, .wpcf7 textarea, #respond input, .wpcf7 input, .widget_wysija input, #respond h3 small a, #respond h3 small a:hover, .post-comments span.reply a, .post-comments span.reply a:hover, .thecomment .comment-text span.author, .thecomment .comment-text span.author a, #respond h3.comment-reply-title span, .post-box-title, .post-pagination a, .post-pagination span, .author-content .author-social, .author-content h5 a, .error-404 .sub-heading-text-404, #searchform input.search-input, input, .penci-pagination ul.page-numbers li span, .penci-pagination ul.page-numbers li a, #comments_pagination span, #comments_pagination a, .item-related h3 a, .archive-box span, .archive-box h1, .header-standard .author-post span a, .post-entry h1, .post-entry h2, .post-entry h3, .post-entry h4, .post-entry h5, .post-entry h6, .wpb_text_column h1, .wpb_text_column h2, .wpb_text_column h3, .wpb_text_column h4, .wpb_text_column h5, .wpb_text_column h6, .tags-share-box.hide-tags.page-share .share-title, .about-widget .about-me-heading, .penci-tweets-widget-content .tweet-text, .widget select, .widget ul li, .widget .tagcloud a, #wp-calendar caption, .woocommerce .page-title, .woocommerce ul.products li.product h3, .woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce .widget_price_filter .price_label, .woocommerce .woocommerce-product-search input[type="search"], .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce div.product .entry-summary div[itemprop="description"] h1, .woocommerce div.product .entry-summary div[itemprop="description"] h2, .woocommerce div.product .entry-summary div[itemprop="description"] h3, .woocommerce div.product .entry-summary div[itemprop="description"] h4, .woocommerce div.product .entry-summary div[itemprop="description"] h5, .woocommerce div.product .entry-summary div[itemprop="description"] h6, .woocommerce div.product .woocommerce-tabs #tab-description h1, .woocommerce div.product .woocommerce-tabs #tab-description h2, .woocommerce div.product .woocommerce-tabs #tab-description h3, .woocommerce div.product .woocommerce-tabs #tab-description h4, .woocommerce div.product .woocommerce-tabs #tab-description h5, .woocommerce div.product .woocommerce-tabs #tab-description h6, .woocommerce-product-details__short-description h1, .woocommerce-product-details__short-description h2, .woocommerce-product-details__short-description h3, .woocommerce-product-details__short-description h4, .woocommerce-product-details__short-description h5, .woocommerce-product-details__short-description h6,
		.woocommerce div.product .woocommerce-tabs .panel > h2:first-child, .woocommerce div.product .woocommerce-tabs .panel #reviews #comments h2, .woocommerce div.product .woocommerce-tabs .panel #respond h3.comment-reply-title, .woocommerce div.product .woocommerce-tabs .panel #respond .comment-reply-title, .woocommerce div.product .related > h2, .woocommerce div.product .upsells > h2, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce .comment-form p.stars a, .woocommerce #reviews #comments ol.commentlist li .comment-text .meta strong, .penci-page-header h1, .woocommerce table.shop_table a.remove, .woocommerce table.shop_table td.product-name a, .woocommerce table.shop_table th, .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text, .demobar-title, .demobar-desc, .container-single .post-share a, .page-share .post-share a, .footer-instagram h4.footer-instagram-title, .post-entry .penci-portfolio-filter ul li a, .penci-portfolio-filter ul li a, .widget-social.show-text a span, #buddypress select, #buddypress div.pagination .pagination-links a:hover, #buddypress div.pagination .pagination-links span, #buddypress div.pagination .pagination-links a, #buddypress div.pagination .pag-count, #buddypress ul.item-list li div.item-title span, #buddypress div.item-list-tabs:not(#subnav) ul li a, #buddypress div.item-list-tabs:not(#subnav) ul li > span, #buddypress div#item-header div#item-meta, #buddypress form#whats-new-form textarea, #buddypress .standard-form input[type=text], #buddypress .standard-form input[type=color], #buddypress .standard-form input[type=date], #buddypress .standard-form input[type=datetime], #buddypress .standard-form input[type=datetime-local], #buddypress .standard-form input[type=email], #buddypress .standard-form input[type=month], #buddypress .standard-form input[type=number], #buddypress .standard-form input[type=range], #buddypress .standard-form input[type=search], #buddypress .standard-form input[type=password], #buddypress .standard-form input[type=tel], #buddypress .standard-form input[type=time], #buddypress .standard-form input[type=url], #buddypress .standard-form input[type=week], #buddypress ul.button-nav li a, #buddypress div.generic-button a, #buddypress .comment-reply-link, .wrapper-boxed .bbp-pagination-links a, .wrapper-boxed .bbp-pagination-links a:hover, .wrapper-boxed .bbp-pagination-links span.current, #buddypress .activity-list li.load-more a, #buddypress .activity-list li.load-newest a, .activity-inner, #buddypress a.activity-time-since, .activity-greeting, div.bbp-template-notice, div.indicator-hint, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-info a, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-topic-count, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-reply-count, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-freshness, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-freshness a, #bbpress-forums li.bbp-body ul.topic li.bbp-forum-topic-count, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-voice-count, #bbpress-forums li.bbp-body ul.topic li.bbp-forum-reply-count, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-freshness > a, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-freshness, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-reply-count, div.bbp-template-notice a, #bbpress-forums #bbp-search-form #bbp_search, #bbpress-forums .wp-editor-container, #bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content, .widget_display_stats dd, #bbpress-forums fieldset.bbp-form legend, #bbpress-forums .bbp-pagination-count, span.bbp-admin-links a, .bbp-forum-header a.bbp-forum-permalink, .bbp-topic-header a.bbp-topic-permalink, .bbp-reply-header a.bbp-reply-permalink, #bbpress-forums .status-closed, #bbpress-forums .status-closed a, .post-entry blockquote.wp-block-quote p, .wpb_text_column blockquote.wp-block-quote p, .post-entry blockquote.wp-block-quote cite, .wpb_text_column blockquote.wp-block-quote cite, .post-entry code, .wp-block-video figcaption, .post-entry .wp-block-pullquote blockquote p, .post-entry .wp-block-pullquote blockquote cite, .wp-block-categories .category-item-count{ color: <?php echo penci_get_setting( 'penci_text_color_dark' ); ?>; }
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .post-entry .wp-block-file a.wp-block-file__button{ background-color: <?php echo penci_get_setting( 'penci_text_color_dark' ); ?>; }
		.penci-owl-carousel-slider .owl-dot span{ background-color: <?php echo penci_get_setting( 'penci_text_color_dark' ); ?>; border-color: <?php echo penci_get_setting( 'penci_text_color_dark' ); ?>; }
		.grid-post-box-meta span, .widget ul.side-newsfeed li .side-item .side-item-text .side-item-meta, .grid-post-box-meta span a, .penci-post-box-meta .penci-box-meta span, .penci-post-box-meta .penci-box-meta a, .header-standard .author-post span, .thecomment .comment-text span.date, .item-related span.date, .post-box-meta-single span, .container.penci-breadcrumb span, .container.penci-breadcrumb span a, .container.penci-breadcrumb i,.penci-container-inside.penci-breadcrumb span, .penci-container-inside.penci-breadcrumb span a, .penci-container-inside.penci-breadcrumb i, .overlay-post-box-meta, .overlay-post-box-meta .overlay-share span, .overlay-post-box-meta .overlay-share a, .woocommerce #reviews #comments ol.commentlist li .comment-text .meta, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-info .bbp-forum-content, #bbpress-forums li.bbp-body ul.topic p.bbp-topic-meta, #bbpress-forums .bbp-breadcrumb a, #bbpress-forums .bbp-breadcrumb .bbp-breadcrumb-current, .bbp-breadcrumb .bbp-breadcrumb-sep, #bbpress-forums .bbp-topic-started-by, #bbpress-forums .bbp-topic-started-in{ color: <?php echo penci_get_setting( 'penci_meta_color_dark' ); ?>; }
		.penci-review-process{ background-color: <?php echo penci_get_setting( 'penci_meta_color_dark' ); ?>; }
		.post-entry .wp-block-file a.wp-block-file__button{ color: <?php echo penci_get_setting( 'penci_bg_color_dark' ); ?>; }
		.post-entry.blockquote-style-2 blockquote, .wp-block-quote.is-style-large, .wp-block-quote.is-large{ background: #2b2b2b; }
		.penci-overlay-over .overlay-border{ opacity: 0.5; }
		.post-entry pre, .post-entry code, .wp-block-table.is-style-stripes tr:nth-child(odd), .post-entry pre.wp-block-verse, .post-entry .wp-block-verse pre, .wp-block-pullquote.is-style-solid-color{ background-color: #333333; }
		.post-entry blockquote.wp-block-quote cite, .wpb_text_column blockquote.wp-block-quote cite{ opacity: 0.6; }
		.penci-pagination ul.page-numbers li a:hover, #comments_pagination a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover{ color: #dedede; border-color: #777777; }
		.penci-pagination.penci-ajax-more a.penci-ajax-more-button.loading-posts{ color: <?php echo penci_get_setting( 'penci_text_color_dark' ); ?> !important; border-color: <?php echo penci_get_setting( 'penci_border_color_dark' ); ?> !important; }
		.widget ul.side-newsfeed li .order-border-number{ background-color: rgba(255,255,255,0.2); box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.1); }
		.widget ul.side-newsfeed li .number-post{ background-color: #212121; }
		div.wpforms-container .wpforms-form.wpforms-form input[type=submit], div.wpforms-container .wpforms-form.wpforms-form button[type=submit], div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button,
		#respond #submit, .wpcf7 input[type="submit"], .widget_wysija input[type="submit"], .widget input[type="submit"],.penci-user-logged-in .penci-user-action-links a,.penci-button, .widget button[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, #bbpress-forums #bbp_reply_submit, #bbpress-forums #bbp_topic_submit, #main .bbp-login-form .bbp-submit-wrapper button[type="submit"]{ background: #444; color: #f9f9f9; }
		#wp-calendar tbody td, #wp-calendar tbody td:hover{ background: none; }
		.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content{ background-color: #636363; }
		.post-entry tr:hover{ background: none; }
		.is-sticky #navigation, #navigation .menu .sub-menu, #navigation .menu .children{ box-shadow: 0px 1px 5px rgba(255, 255, 255, 0.08); -webkit-box-shadow: 0px 1px 5px rgba(255, 255, 255, 0.08); -moz-box-shadow: 0px 1px 5px rgba(255, 255, 255, 0.08); }
		.penci-image-holder:not([style*='background-image']), .penci-lazy[src*="penci-holder"], .penci-holder-load:not([style*='background-image']){ background-color: #333333; background-image: linear-gradient(to left,#333333 0%,#383838 15%,#333333 40%,#333333 100%); }
		#penci-demobar .style-toggle, #penci-demobar{ box-shadow: -1px 2px 10px 0 rgba(255, 255, 255, .15); -webkit-box-shadow: -1px 2px 10px 0 rgba(255, 255, 255, .15); -moz-box-shadow: -1px 2px 10px 0 rgba(255, 255, 255, .15); }
		.penci-page-header h1{ color: #fff; }
		#buddypress div.item-list-tabs, #buddypress .comment-reply-link, #buddypress .generic-button a, #buddypress .standard-form button, #buddypress a.button, #buddypress input[type=button], #buddypress input[type=reset], #buddypress input[type=submit], #buddypress ul.button-nav li a, a.bp-title-button, #bbpress-forums li.bbp-header, #bbpress-forums div.bbp-forum-header, #bbpress-forums div.bbp-topic-header, #bbpress-forums div.bbp-reply-header{ background-color: #252525; }
		#buddypress .comment-reply-link, #buddypress .generic-button a, #buddypress .standard-form button, #buddypress a.button, #buddypress input[type=button], #buddypress input[type=reset], #buddypress input[type=submit], #buddypress ul.button-nav li a, a.bp-title-button{ border-color: #252525; }
		#buddypress div.item-list-tabs:not(#subnav) ul li.selected a, #buddypress div.item-list-tabs:not(#subnav) ul li.current a, #buddypress div.item-list-tabs:not(#subnav) ul li a:hover, #buddypress div.item-list-tabs:not(#subnav) ul li.selected a, #buddypress div.item-list-tabs:not(#subnav) ul li.current a, #buddypress div.item-list-tabs:not(#subnav) ul li a:hover{ color: #fff; }
		#buddypress div.item-list-tabs:not(#subnav) ul li a, #buddypress div.item-list-tabs:not(#subnav) ul li > span{ border-color: #313131; }
		<?php if(get_theme_mod('penci_post_caption_below')): ?>
			.wp-caption p.wp-caption-text, .penci-featured-caption{ color: <?php echo penci_get_setting( 'penci_meta_color_dark' ); ?>; }
		<?php endif;?>
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_general_text_color' ) ): ?>
		body{ color: <?php echo get_theme_mod( 'penci_general_text_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_color_accent' ) ): ?>
		.penci-menuhbg-toggle:hover .lines-button:after, .penci-menuhbg-toggle:hover .penci-lines:before, .penci-menuhbg-toggle:hover .penci-lines:after,.tags-share-box.tags-share-box-s2 .post-share-plike,.penci-video_playlist .penci-playlist-title,.pencisc-column-2.penci-video_playlist
		.penci-video-nav .playlist-panel-item, .pencisc-column-1.penci-video_playlist .penci-video-nav .playlist-panel-item,.penci-video_playlist .penci-custom-scroll::-webkit-scrollbar-thumb, .pencisc-button, .post-entry .pencisc-button, .penci-dropcap-box, .penci-dropcap-circle{ background: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		a, .post-entry .penci-portfolio-filter ul li a:hover, .penci-portfolio-filter ul li a:hover, .penci-portfolio-filter ul li.active a, .post-entry .penci-portfolio-filter ul li.active a, .penci-countdown .countdown-amount, .archive-box h1, .post-entry a, .container.penci-breadcrumb span a:hover, .post-entry blockquote:before, .post-entry blockquote cite, .post-entry blockquote .author, .wpb_text_column blockquote:before, .wpb_text_column blockquote cite, .wpb_text_column blockquote .author, .penci-pagination a:hover, ul.penci-topbar-menu > li a:hover, div.penci-topbar-menu > ul > li a:hover, .penci-recipe-heading a.penci-recipe-print,.penci-review-metas .penci-review-btnbuy, .main-nav-social a:hover, .widget-social .remove-circle a:hover i, .penci-recipe-index .cat > a.penci-cat-name, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-info a:hover, #bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a:hover, #bbpress-forums li.bbp-body ul.forum li.bbp-forum-info .bbp-forum-content a, #bbpress-forums li.bbp-body ul.topic p.bbp-topic-meta a, #bbpress-forums .bbp-breadcrumb a:hover, #bbpress-forums .bbp-forum-freshness a:hover, #bbpress-forums .bbp-topic-freshness a:hover, #buddypress ul.item-list li div.item-title a, #buddypress ul.item-list li h4 a, #buddypress .activity-header a:first-child, #buddypress .comment-meta a:first-child, #buddypress .acomment-meta a:first-child, div.bbp-template-notice a:hover, .penci-menu-hbg .menu li a .indicator:hover, .penci-menu-hbg .menu li a:hover, #sidebar-nav .menu li a:hover, .penci-rlt-popup .rltpopup-meta .rltpopup-title:hover, .penci-video_playlist .penci-video-playlist-item .penci-video-title:hover, .penci_list_shortcode li:before, .penci-dropcap-box-outline, .penci-dropcap-circle-outline, .penci-dropcap-regular, .penci-dropcap-bold{ color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.penci-home-popular-post ul.slick-dots li button:hover, .penci-home-popular-post ul.slick-dots li.slick-active button, .post-entry blockquote .author span:after, .error-image:after, .error-404 .go-back-home a:after, .penci-header-signup-form, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce div.product .entry-summary div[itemprop="description"]:before, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote .author span:after, .woocommerce div.product .woocommerce-tabs #tab-description blockquote .author span:after, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #top-search.shoping-cart-icon > a > span, #penci-demobar .buy-button, #penci-demobar .buy-button:hover, .penci-recipe-heading a.penci-recipe-print:hover,.penci-review-metas .penci-review-btnbuy:hover, .penci-review-process span, .penci-review-score-total, #navigation.menu-style-2 ul.menu ul:before, #navigation.menu-style-2 .menu ul ul:before, .penci-go-to-top-floating, .post-entry.blockquote-style-2 blockquote:before, #bbpress-forums #bbp-search-form .button, #bbpress-forums #bbp-search-form .button:hover, .wrapper-boxed .bbp-pagination-links span.current, #bbpress-forums #bbp_reply_submit:hover, #bbpress-forums #bbp_topic_submit:hover,#main .bbp-login-form .bbp-submit-wrapper button[type="submit"]:hover, #buddypress .dir-search input[type=submit], #buddypress .groups-members-search input[type=submit], #buddypress button:hover, #buddypress a.button:hover, #buddypress a.button:focus, #buddypress input[type=button]:hover, #buddypress input[type=reset]:hover, #buddypress ul.button-nav li a:hover, #buddypress ul.button-nav li.current a, #buddypress div.generic-button a:hover, #buddypress .comment-reply-link:hover, #buddypress input[type=submit]:hover, #buddypress div.pagination .pagination-links .current, #buddypress div.item-list-tabs ul li.selected a, #buddypress div.item-list-tabs ul li.current a, #buddypress div.item-list-tabs ul li a:hover, #buddypress table.notifications thead tr, #buddypress table.notifications-settings thead tr, #buddypress table.profile-settings thead tr, #buddypress table.profile-fields thead tr, #buddypress table.wp-profile-fields thead tr, #buddypress table.messages-notices thead tr, #buddypress table.forum thead tr, #buddypress input[type=submit] { background-color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.penci-pagination ul.page-numbers li span.current, #comments_pagination span { color: #fff; background: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; border-color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.footer-instagram h4.footer-instagram-title > span:before, .woocommerce nav.woocommerce-pagination ul li span.current, .penci-pagination.penci-ajax-more a.penci-ajax-more-button:hover, .penci-recipe-heading a.penci-recipe-print:hover,.penci-review-metas .penci-review-btnbuy:hover, .home-featured-cat-content.style-14 .magcat-padding:before, .wrapper-boxed .bbp-pagination-links span.current, #buddypress .dir-search input[type=submit], #buddypress .groups-members-search input[type=submit], #buddypress button:hover, #buddypress a.button:hover, #buddypress a.button:focus, #buddypress input[type=button]:hover, #buddypress input[type=reset]:hover, #buddypress ul.button-nav li a:hover, #buddypress ul.button-nav li.current a, #buddypress div.generic-button a:hover, #buddypress .comment-reply-link:hover, #buddypress input[type=submit]:hover, #buddypress div.pagination .pagination-links .current, #buddypress input[type=submit], #searchform.penci-hbg-search-form input.search-input:hover, #searchform.penci-hbg-search-form input.search-input:focus, .penci-dropcap-box-outline, .penci-dropcap-circle-outline { border-color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message { border-top-color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.penci-slider ol.penci-control-nav li a.penci-active, .penci-slider ol.penci-control-nav li a:hover, .penci-related-carousel .owl-dot.active span, .penci-owl-carousel-slider .owl-dot.active span{ border-color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; background-color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.woocommerce .woocommerce-message:before, .woocommerce form.checkout table.shop_table .order-total .amount, .woocommerce ul.products li.product .price ins, .woocommerce ul.products li.product .price, .woocommerce div.product p.price ins, .woocommerce div.product span.price ins, .woocommerce div.product p.price, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote:before, .woocommerce div.product .woocommerce-tabs #tab-description blockquote:before, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote cite, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote .author, .woocommerce div.product .woocommerce-tabs #tab-description blockquote cite, .woocommerce div.product .woocommerce-tabs #tab-description blockquote .author, .woocommerce div.product .product_meta > span a:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce ul.cart_list li .amount, .woocommerce ul.product_list_widget li .amount, .woocommerce table.shop_table td.product-name a:hover, .woocommerce table.shop_table td.product-price span, .woocommerce table.shop_table td.product-subtotal span, .woocommerce-cart .cart-collaterals .cart_totals table td .amount, .woocommerce .woocommerce-info:before, .woocommerce div.product span.price, .penci-container-inside.penci-breadcrumb span a:hover { color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.standard-content .penci-more-link.penci-more-link-button a.more-link, .penci-readmore-btn.penci-btn-make-button a, .penci-featured-cat-seemore.penci-btn-make-button a{ background-color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; color: #fff; }
		.penci-vernav-toggle:before{ border-top-color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; color: #fff; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_body_breadcrumbs' ) ): ?>
		.penci-container-inside.penci-breadcrumb i, .container.penci-breadcrumb i, .penci-container-inside.penci-breadcrumb span, .penci-container-inside.penci-breadcrumb span a, .container.penci-breadcrumb span, .container.penci-breadcrumb span a{ font-size: <?php echo get_theme_mod( 'penci_body_breadcrumbs' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_breadcrumbs_color' ) ): ?>
		.penci-container-inside.penci-breadcrumb i, .container.penci-breadcrumb i, .penci-container-inside.penci-breadcrumb span, .penci-container-inside.penci-breadcrumb span a, .container.penci-breadcrumb span, .container.penci-breadcrumb span a{ color: <?php echo get_theme_mod( 'penci_breadcrumbs_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_loadmore_size' ) ): ?>
		.penci-pagination a, .penci-pagination .disable-url, .penci-pagination ul.page-numbers li span, .penci-pagination ul.page-numbers li a, #comments_pagination span, #comments_pagination a{ font-size: <?php echo get_theme_mod( 'penci_home_loadmore_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_pagination_color' ) ): ?>
		.penci-pagination a, .penci-pagination .disable-url, .penci-pagination ul.page-numbers li span, .penci-pagination ul.page-numbers li a, #comments_pagination span, #comments_pagination a{ color: <?php echo get_theme_mod( 'penci_pagination_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_pagination_hcolor' ) ): ?>
		.penci-pagination a:hover{ color: <?php echo get_theme_mod( 'penci_pagination_hcolor' ); ?>; }
		.penci-pagination ul.page-numbers li span.current, #comments_pagination span{ border-color: <?php echo get_theme_mod( 'penci_pagination_hcolor' ); ?>; background-color: <?php echo get_theme_mod( 'penci_pagination_hcolor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_loadmorebtn_color' ) ): ?>
		.penci-pagination.penci-ajax-more a.penci-ajax-more-button{ color: <?php echo get_theme_mod( 'penci_loadmorebtn_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_loadmorebtn_borders' ) ): ?>
		.penci-pagination.penci-ajax-more a.penci-ajax-more-button{ border-color: <?php echo get_theme_mod( 'penci_loadmorebtn_borders' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_loadmorebtn_bg' ) ): ?>
		.penci-pagination.penci-ajax-more a.penci-ajax-more-button{ background-color: <?php echo get_theme_mod( 'penci_loadmorebtn_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_loadmorebtn_hcolor' ) ): ?>
		.penci-pagination.penci-ajax-more a.penci-ajax-more-button:hover{ color: <?php echo get_theme_mod( 'penci_loadmorebtn_hcolor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_loadmorebtn_hborders' ) ): ?>
		.penci-pagination.penci-ajax-more a.penci-ajax-more-button:hover{ border-color: <?php echo get_theme_mod( 'penci_loadmorebtn_hborders' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_loadmorebtn_hbg' ) ): ?>
		.penci-pagination.penci-ajax-more a.penci-ajax-more-button:hover{ background-color: <?php echo get_theme_mod( 'penci_loadmorebtn_hbg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_archivetitle_prefix_color' ) ): ?>
		.archive-box span{ color: <?php echo get_theme_mod( 'penci_archivetitle_prefix_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_archivetitle_color' ) ): ?>
		.archive-box h1{ color: <?php echo get_theme_mod( 'penci_archivetitle_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_box_text_size' ) ): ?>
		ul.homepage-featured-boxes .penci-fea-in h4 span span, ul.homepage-featured-boxes .penci-fea-in.boxes-style-3 h4 span span { font-size: <?php echo get_theme_mod( 'penci_home_box_text_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_polular_fsectitle' ) ): ?>
		.home-pupular-posts-title{ font-size: <?php echo get_theme_mod( 'penci_home_polular_fsectitle' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_polular_mfsectitle' ) ): ?>
		@media only screen and (max-width: 479px){ .home-pupular-posts-title{ font-size: <?php echo get_theme_mod( 'penci_home_polular_mfsectitle' ); ?>px; } }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_popular_post_font_size' ) ): ?>
		.penci-home-popular-post .item-related h3 a { font-size: <?php echo get_theme_mod( 'penci_home_popular_post_font_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_popular_post_fdate' ) ): ?>
		.penci-home-popular-post .item-related span.date { font-size: <?php echo get_theme_mod( 'penci_home_popular_post_fdate' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_auto_speed' ) ): ?>
		.penci-headline .animated.slideOutUp, .penci-headline .animated.slideInUp { -webkit-animation-duration: <?php echo get_theme_mod( 'penci_top_bar_auto_speed' ); ?>ms; animation-duration: <?php echo get_theme_mod( 'penci_top_bar_auto_speed' ); ?>ms; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_bg' ) ): ?>
		.penci-top-bar, ul.penci-topbar-menu ul.sub-menu, div.penci-topbar-menu > ul ul.sub-menu { background-color: <?php echo get_theme_mod( 'penci_top_bar_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_top_posts_bg' ) ): ?>
		.headline-title { background-color: <?php echo get_theme_mod( 'penci_top_bar_top_posts_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_top_posts_color' ) ): ?>
		.headline-title { color: <?php echo get_theme_mod( 'penci_top_bar_top_posts_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_button_color' ) ): ?>
		.penci-headline-posts .slick-prev, .penci-headline-posts .slick-next, .penci-owl-carousel-slider.penci-headline-posts .owl-nav .owl-prev, .penci-owl-carousel-slider.penci-headline-posts .owl-nav .owl-next { color: <?php echo get_theme_mod( 'penci_top_bar_button_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_button_hover_color' ) ): ?>
		.penci-headline-posts .slick-prev:hover, .penci-headline-posts .slick-next:hover, .penci-owl-carousel-slider.penci-headline-posts .owl-nav .owl-prev:hover, .penci-owl-carousel-slider.penci-headline-posts .owl-nav .owl-next:hover { color: <?php echo get_theme_mod( 'penci_top_bar_button_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_title_color' ) ): ?>
		a.penci-topbar-post-title { color: <?php echo get_theme_mod( 'penci_top_bar_title_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_title_hover_color' ) ): ?>
		a.penci-topbar-post-title:hover { color: <?php echo get_theme_mod( 'penci_top_bar_title_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_off_uppercase' ) ): ?>
		a.penci-topbar-post-title { text-transform: none; letter-spacing: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_top_posts_lowcase' ) ): ?>
		.headline-title { text-transform: none; letter-spacing: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_off_uppercase_menu' ) ): ?>
		ul.penci-topbar-menu > li a, div.penci-topbar-menu > ul > li a { text-transform: none; font-size: 12px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_top_post_size' ) ): ?>
		.headline-title { font-size: <?php echo get_theme_mod( 'penci_top_bar_top_post_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_top_post_size_title' ) ): ?>
		a.penci-topbar-post-title { font-size: <?php echo get_theme_mod( 'penci_top_bar_top_post_size_title' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_menu_level_one' ) ): ?>
		ul.penci-topbar-menu > li > a, div.penci-topbar-menu > ul > li > a { font-size: <?php echo get_theme_mod( 'penci_top_bar_menu_level_one' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_sub_menu_size' ) ): ?>
		ul.penci-topbar-menu ul.sub-menu > li a, div.penci-topbar-menu ul.sub-menu > li a { font-size: <?php echo get_theme_mod( 'penci_top_bar_sub_menu_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_social_size' ) ): ?>
		.penci-topbar-social a { font-size: <?php echo get_theme_mod( 'penci_top_bar_social_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_menu_color' ) ): ?>
		ul.penci-topbar-menu > li a, div.penci-topbar-menu > ul > li a { color: <?php echo get_theme_mod( 'penci_top_bar_menu_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_menu_dropdown_bg' ) ): ?>
		ul.penci-topbar-menu ul.sub-menu, div.penci-topbar-menu > ul ul.sub-menu { background-color: <?php echo get_theme_mod( 'penci_top_bar_menu_dropdown_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_menu_hover_color' ) ): ?>
		ul.penci-topbar-menu > li a:hover, div.penci-topbar-menu > ul > li a:hover { color: <?php echo get_theme_mod( 'penci_top_bar_menu_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_menu_border' ) ): ?>
		ul.penci-topbar-menu ul.sub-menu li a, div.penci-topbar-menu > ul ul.sub-menu li a, ul.penci-topbar-menu > li > ul.sub-menu > li:first-child, div.penci-topbar-menu > ul > li > ul.sub-menu > li:first-child { border-color: <?php echo get_theme_mod( 'penci_top_bar_menu_border' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_social_color' ) ): ?>
		.penci-topbar-social a { color: <?php echo get_theme_mod( 'penci_top_bar_social_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_bar_social_hover_color' ) ): ?>
		.penci-topbar-social a:hover { color: <?php echo get_theme_mod( 'penci_top_bar_social_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_remove_border_bottom_header' ) ): ?>
		.header-header-1.has-bottom-line, .header-header-4.has-bottom-line, .header-header-7.has-bottom-line { border-bottom: none; }
	<?php endif; ?>
	<?php
	$header_bgcolor = get_theme_mod( 'penci_header_background_color' );
	$header_bgimg = get_theme_mod( 'penci_header_background_image' );
	$main_bar_bgcolor = get_theme_mod( 'penci_main_bar_bg' );
	$main_bar_bgimg = '';

	$mainmenu_height = get_theme_mod( 'penci_mainmenu_height' );
	$mainmenu_height_sticky = get_theme_mod( 'penci_mainmenu_height_sticky' );

	if ( is_page() ) {
		$pmeta_page_header = get_post_meta( get_the_ID(), 'penci_pmeta_page_header', true );
		if ( isset( $pmeta_page_header['header_bgcolor'] ) && $pmeta_page_header['header_bgcolor'] ) {
			$header_bgcolor = $pmeta_page_header['header_bgcolor'];
		}
		if ( isset( $pmeta_page_header['header_bgimg'] ) && $pmeta_page_header['header_bgimg'] ) {
			$header_bgimg_meta = wp_get_attachment_url( intval( $pmeta_page_header['header_bgimg'] ) );
			if ( $header_bgimg_meta ) {
				$header_bgimg = $header_bgimg_meta;
			}
		}
		if ( isset( $pmeta_page_header['main_bar_bg'] ) && $pmeta_page_header['main_bar_bg'] ) {
			$main_bar_bgcolor = $pmeta_page_header['main_bar_bg'];
		}
		if ( isset( $pmeta_page_header['main_bar_bgimg'] ) && $pmeta_page_header['main_bar_bgimg'] ) {
			$main_bar_bgimg_meta = wp_get_attachment_url( intval( $pmeta_page_header['main_bar_bgimg'] ) );
			if ( $main_bar_bgimg_meta ) {
				$main_bar_bgimg = $main_bar_bgimg_meta;
			}
		}


		if( isset( $pmeta_page_header['penci_mainmenu_height'] ) && $pmeta_page_header['penci_mainmenu_height'] ){
			$mainmenu_height = $pmeta_page_header['penci_mainmenu_height'];
		}
		if( isset( $pmeta_page_header['penci_mainmenu_height_sticky'] ) && $pmeta_page_header['penci_mainmenu_height_sticky'] ){
			$mainmenu_height_sticky = $pmeta_page_header['penci_mainmenu_height_sticky'];
		}
	}

	if( $mainmenu_height && $mainmenu_height > 29 ){

		$fonts_lv1 = get_theme_mod( 'penci_font_size_lv1' ) ? get_theme_mod( 'penci_font_size_lv1' ) : 12;
		$fonts_lv1 = intval( $fonts_lv1 ) + 2;
		
		echo '@media only screen and (min-width: 961px){';
		echo '.sticky-wrapper:not( .is-sticky ) #navigation, #navigation.sticky:not(.sticky-active){ height: ' . esc_attr( $mainmenu_height ) . 'px !important; }';
		echo '#navigation.sticky:not(.sticky-active) .menu > li > a, #navigation.sticky:not(.sticky-active) .main-nav-social, .sticky-wrapper:not( .is-sticky ) #navigation .menu>li>a,.sticky-wrapper:not( .is-sticky ) .main-nav-social{ line-height: ' . esc_attr( $mainmenu_height - 2 ) . 'px !important; height: ' . esc_attr( $mainmenu_height - 2 ) . 'px !important; }';
		echo '#navigation.sticky:not(.sticky-active) ul.menu > li > a:before, #navigation.sticky:not(.sticky-active) .menu > ul > li > a:before, .sticky-wrapper:not( .is-sticky ) #navigation ul.menu > li > a:before,.sticky-wrapper:not( .is-sticky ) #navigation .menu > ul > li > a:before{ bottom: calc( ' . esc_attr( $mainmenu_height ) . 'px/2 - ' . $fonts_lv1 . 'px ) !important; }';
		echo '#navigation.sticky:not(.sticky-active) #top-search > a,.sticky-wrapper:not( .is-sticky ) #top-search > a{ height: ' . esc_attr( $mainmenu_height - 2 ) . 'px !important;line-height: ' . esc_attr( $mainmenu_height - 2 ) . 'px !important; }';
		echo '#navigation.sticky:not(.sticky-active) #top-search.shoping-cart-icon > a > span, .sticky-wrapper:not( .is-sticky ) #top-search.shoping-cart-icon > a > span{ top: calc( ' . esc_attr( $mainmenu_height ) . 'px/2 - 18px ) !important; }';
		echo '#navigation.sticky:not(.sticky-active) .penci-menuhbg-toggle, #navigation.sticky:not(.sticky-active) .show-search, #navigation.sticky:not(.sticky-active) .show-search #searchform input.search-input, .sticky-wrapper:not( .is-sticky ) #navigation .penci-menuhbg-toggle,.sticky-wrapper:not( .is-sticky ) #navigation .show-search, .sticky-wrapper:not( .is-sticky ) .show-search #searchform input.search-input{ height: ' . esc_attr( $mainmenu_height - 2 ) . 'px !important; }';
		echo '#navigation.sticky:not(.sticky-active) .show-search a.close-search, .sticky-wrapper:not( .is-sticky ) .show-search a.close-search{ height: ' . esc_attr( $mainmenu_height ) . 'px !important;line-height: ' . esc_attr( $mainmenu_height ) . 'px !important; }';
		echo '#navigation.sticky:not(.sticky-active).header-6 #logo img, .sticky-wrapper:not( .is-sticky ) #navigation.header-6 #logo img{ max-height: ' . esc_attr( $mainmenu_height ) . 'px; }';
		echo 'body.rtl #navigation.sticky:not(.sticky-active) ul.menu > li > .sub-menu, body.rtl #navigation.header-6.sticky:not(.sticky-active) ul.menu > li > .sub-menu, body.rtl #navigation.header-6.sticky:not(.sticky-active) .menu > ul > li > .sub-menu, body.rtl #navigation.header-10.sticky:not(.sticky-active) ul.menu > li > .sub-menu, body.rtl #navigation.header-10.sticky:not(.sticky-active) .menu > ul > li > .sub-menu, body.rtl #navigation.header-11.sticky:not(.sticky-active) ul.menu > li > .sub-menu, body.rtl #navigation.header-11.sticky:not(.sticky-active) .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-6 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-6 .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-10 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-10 .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-11 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper:not(.is-sticky) #navigation.header-11 .menu > ul > li > .sub-menu{ top: '. ( $mainmenu_height - 1 ) .'px; }';
		echo '#navigation.header-10.sticky:not(.sticky-active):not(.penci-logo-overflow) #logo img, #navigation.header-11.sticky:not(.sticky-active):not(.penci-logo-overflow) #logo img, .sticky-wrapper:not( .is-sticky ) #navigation.header-10:not( .penci-logo-overflow ) #logo img, .sticky-wrapper:not( .is-sticky ) #navigation.header-11:not( .penci-logo-overflow ) #logo img { max-height: '. ( $mainmenu_height ) .'px; }';
		
		$header_layout  = penci_soledad_get_header_layout();
		if( $header_layout ){
			echo '.sticky-wrapper:not( .is-sticky ) #navigation.' . $header_layout . '.menu-item-padding,#navigation.' . $header_layout . '.menu-item-padding.sticky:not(.sticky-active)';
			echo '.sticky-wrapper:not( .is-sticky ) #navigation.' . $header_layout . '.menu-item-padding ul.menu > li > a, #navigation.' . $header_layout . '.menu-item-padding.sticky:not(.sticky-active) ul.menu > li > a{ height: ' . esc_attr( $mainmenu_height ) . 'px; }';
		}

		echo '}';
	}
	if( $mainmenu_height_sticky && $mainmenu_height_sticky > 29 ) {
		$fonts_lv1 = get_theme_mod( 'penci_font_size_lv1' ) ? get_theme_mod( 'penci_font_size_lv1' ) : 12;
		$fonts_lv1 = intval( $fonts_lv1 ) + 2;

		echo '@media only screen and (min-width: 961px){';
		echo '.sticky-wrapper.is-sticky #navigation, .is-sticky #navigation.menu-item-padding,.is-sticky #navigation.menu-item-padding, #navigation.sticky-active,#navigation.sticky-active.menu-item-padding,#navigation.sticky-active.menu-item-padding{  height: ' . esc_attr( $mainmenu_height_sticky ) . 'px !important; }';

		echo '.sticky-wrapper.is-sticky #navigation .menu>li>a,.sticky-wrapper.is-sticky .main-nav-social, #navigation.sticky-active .menu > li > a, #navigation.sticky-active .main-nav-social{ line-height: calc( ' . esc_attr( $mainmenu_height_sticky ) . 'px - 2px ) !important; }';
		echo '#navigation.sticky-active.header-10.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-10.menu-item-padding ul.menu > li > a,';
		echo '#navigation.sticky-active.header-11.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-11.menu-item-padding ul.menu > li > a,';
		echo '#navigation.sticky-active.header-1.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-1.menu-item-padding ul.menu > li > a,';
		echo '#navigation.sticky-active.header-4.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-4.menu-item-padding ul.menu > li > a,';
		echo '#navigation.sticky-active.header-7.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-7.menu-item-padding ul.menu > li > a,';
		echo '#navigation.sticky-active.header-6.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-6.menu-item-padding ul.menu > li > a,';
		echo '#navigation.sticky-active.header-9.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-9.menu-item-padding ul.menu > li > a,';
		echo '#navigation.sticky-active.header-2.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-2.menu-item-padding ul.menu > li > a,';
		echo '#navigation.sticky-active.header-3.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-3.menu-item-padding ul.menu > li > a,';
		echo '#navigation.sticky-active.header-5.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-5.menu-item-padding ul.menu > li > a,';
		echo '#navigation.sticky-active.header-8.menu-item-padding ul.menu > li > a, .is-sticky #navigation.header-8.menu-item-padding ul.menu > li > a{ height: ' . esc_attr( $mainmenu_height_sticky ) . 'px !important; line-height: ' . esc_attr( $mainmenu_height_sticky ) . 'px !important; }';

		echo '#navigation.sticky-active .main-nav-social, #navigation.sticky-active #top-search > a, .is-sticky .main-nav-social,.is-sticky #top-search > a,';
		echo '#navigation.sticky-active .penci-menuhbg-toggle, .sticky-wrapper.is-sticky #navigation .penci-menuhbg-toggle,';
		echo '#navigation.sticky-active .show-search, #navigation.sticky-active .show-search #searchform input.search-input, .sticky-wrapper.is-sticky .show-search, .sticky-wrapper.is-sticky .show-search #searchform input.search-input,';
		echo '#navigation.sticky-active .show-search a.close-search, .sticky-wrapper.is-sticky .show-search a.close-search{ height: ' . esc_attr( $mainmenu_height_sticky - 2 ) . 'px !important; line-height: ' . esc_attr( $mainmenu_height_sticky - 2 ) . 'px !important; }';

		echo '#navigation.sticky-active.header-6 #logo img, .is-sticky #navigation.header-6 #logo img{ max-height: ' . esc_attr( $mainmenu_height_sticky ) . 'px; }';

		echo '#navigation.sticky-active #top-search.shoping-cart-icon > a > span, .sticky-wrapper.is-sticky #top-search.shoping-cart-icon > a > span{ top: calc( ' . esc_attr( $mainmenu_height_sticky ) . 'px/2 - 18px ) !important; }';

		echo '#navigation.sticky-active ul.menu > li > a:before, #navigation.sticky-active .menu > ul > li > a:before, .sticky-wrapper.is-sticky #navigation ul.menu > li > a:before, .sticky-wrapper.is-sticky #navigation .menu > ul > li > a:before{ bottom: calc( ' . esc_attr( $mainmenu_height_sticky ) . 'px/2 - ' . $fonts_lv1 . 'px ) !important; }';

		echo 'body.rtl #navigation.sticky-active ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation ul.menu > li > .sub-menu,';
		echo 'body.rtl #navigation.sticky-active.header-6 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-6 ul.menu > li > .sub-menu,';
		echo 'body.rtl #navigation.sticky-active.header-6 .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-6 .menu > ul > li > .sub-menu,';
		echo 'body.rtl #navigation.sticky-active.header-10 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-10 ul.menu > li > .sub-menu,';
		echo 'body.rtl #navigation.sticky-active.header-10 .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-10 .menu > ul > li > .sub-menu,';
		echo 'body.rtl #navigation.sticky-active.header-11 ul.menu > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-11 ul.menu > li > .sub-menu,';
		echo 'body.rtl #navigation.sticky-active.header-11 .menu > ul > li > .sub-menu, body.rtl #navigation-sticky-wrapper.is-sticky #navigation.header-11 .menu > ul > li > .sub-menu{ top: '. ( $mainmenu_height_sticky - 1 ) .'px; }';

		echo '#navigation.sticky-active.header-10:not(.penci-logo-overflow) #logo img, #navigation.sticky-active.header-11:not(.penci-logo-overflow) #logo img, .is-sticky #navigation.header-10:not( .penci-logo-overflow ) #logo img, .is-sticky #navigation.header-11:not( .penci-logo-overflow ) #logo img { max-height: '. ( $mainmenu_height_sticky ) .'px; }';
		echo '}';
	}
	?>
	<?php if( $header_bgcolor ): ?>
		#header .inner-header { background-color: <?php echo $header_bgcolor; ?>; background-image: none; }
	<?php endif; ?>
	<?php if( $header_bgimg ): ?>
		#header .inner-header { background-image: url('<?php echo $header_bgimg; ?>'); }
	<?php endif; ?>
	<?php if( $main_bar_bgcolor ): ?>
		#navigation, .show-search { background: <?php echo $main_bar_bgcolor; ?>; }
		@media only screen and (min-width: 960px){ #navigation.header-11 .container { background: <?php echo $main_bar_bgcolor; ?>; }}
	<?php endif; ?>
	<?php if( $main_bar_bgimg ): ?>
		#navigation, .show-search { background-image: url('<?php echo $main_bar_bgimg; ?>'); }
		@media only screen and (min-width: 960px){ #navigation.header-11 .container { background-image: url('<?php echo $main_bar_bgimg; ?>'); }}
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_remove_line_hover' ) ): ?>
		#navigation ul.menu > li > a:before, #navigation .menu > ul > li > a:before{ content: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_remove_line_slogan' ) ): ?>
		.header-slogan .header-slogan-text:before, .header-slogan .header-slogan-text:after{ content: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_main_bar_border_color' ) ): ?>
		#navigation, #navigation.header-layout-bottom { border-color: <?php echo get_theme_mod( 'penci_main_bar_border_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_main_bar_nav_color' ) ): ?>
		#navigation .menu li a { color:  <?php echo get_theme_mod( 'penci_main_bar_nav_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_main_bar_color_active' ) ): ?>
		#navigation .menu li a:hover, #navigation .menu li.current-menu-item > a, #navigation .menu > li.current_page_item > a, #navigation .menu li:hover > a, #navigation .menu > li.current-menu-ancestor > a, #navigation .menu > li.current-menu-item > a { color:  <?php echo get_theme_mod( 'penci_main_bar_color_active' ); ?>; }
		#navigation ul.menu > li > a:before, #navigation .menu > ul > li > a:before { background: <?php echo get_theme_mod( 'penci_main_bar_color_active' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_main_bar_padding_color' ) ): ?>
		#navigation.menu-item-padding .menu > li > a:hover, #navigation.menu-item-padding .menu > li:hover > a, #navigation.menu-item-padding .menu > li.current-menu-item > a, #navigation.menu-item-padding .menu > li.current_page_item > a, #navigation.menu-item-padding .menu > li.current-menu-ancestor > a, #navigation.menu-item-padding .menu > li.current-menu-item > a { background-color:  <?php echo get_theme_mod( 'penci_main_bar_padding_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_drop_bg_color' ) ): ?>
		#navigation .menu .sub-menu, #navigation .menu .children, #navigation ul.menu > li.megamenu > ul.sub-menu { background-color:  <?php echo get_theme_mod( 'penci_drop_bg_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_drop_items_border' ) ): ?>
		#navigation .menu .sub-menu, #navigation .menu .children, #navigation ul.menu ul a, #navigation .menu ul ul a, #navigation.menu-style-2 .menu .sub-menu, #navigation.menu-style-2 .menu .children { border-color:  <?php echo get_theme_mod( 'penci_drop_items_border' ); ?>; }
		#navigation .penci-megamenu .penci-mega-child-categories a.cat-active { border-top-color: <?php echo get_theme_mod( 'penci_drop_items_border' ); ?>; border-bottom-color: <?php echo get_theme_mod( 'penci_drop_items_border' ); ?>; }
		#navigation ul.menu > li.megamenu > ul.sub-menu > li:before, #navigation .penci-megamenu .penci-mega-child-categories:after { background-color: <?php echo get_theme_mod( 'penci_drop_items_border' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_mega_bg_color' ) ): ?>
		#navigation .penci-megamenu, #navigation .penci-megamenu .penci-mega-child-categories a.cat-active, #navigation .penci-megamenu .penci-mega-child-categories a.cat-active:before { background-color: <?php echo get_theme_mod( 'penci_mega_bg_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_mega_child_cat_bg_color' ) ): ?>
		#navigation .penci-megamenu .penci-mega-child-categories, #navigation.menu-style-2 .penci-megamenu .penci-mega-child-categories a.cat-active { background-color: <?php echo get_theme_mod( 'penci_mega_child_cat_bg_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_mega_post_date_color' ) ): ?>
		#navigation .penci-megamenu .penci-mega-date { color: <?php echo get_theme_mod( 'penci_mega_post_date_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_mega_border_style2' ) ): ?>
		#navigation.menu-style-2 .penci-megamenu .penci-mega-child-categories:after, #navigation.menu-style-2 .penci-megamenu .penci-mega-child-categories a.all-style:before, .menu-style-2 .penci-megamenu .penci-content-megamenu .penci-mega-latest-posts .penci-mega-post:before{ background-color: <?php echo get_theme_mod( 'penci_mega_border_style2' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_mega_post_category_color' ) ): ?>
		#navigation .penci-megamenu .penci-mega-thumbnail .mega-cat-name { color: <?php echo get_theme_mod( 'penci_mega_post_category_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_mega_accent_color' ) ): ?>
		#navigation .penci-megamenu .penci-mega-child-categories a.cat-active, #navigation .menu .penci-megamenu .penci-mega-child-categories a:hover, #navigation .menu .penci-megamenu .penci-mega-latest-posts .penci-mega-post a:hover { color: <?php echo get_theme_mod( 'penci_mega_accent_color' ); ?>; }
		#navigation .penci-megamenu .penci-mega-thumbnail .mega-cat-name { background: <?php echo get_theme_mod( 'penci_mega_accent_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_size_header_social_check' ) ): ?>
		.header-social a i, .main-nav-social a { font-size: <?php echo get_theme_mod( 'penci_size_header_social_check' ); ?>px; }
		.header-social a svg, .main-nav-social a svg{ width: <?php echo get_theme_mod( 'penci_size_header_social_check' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'size_header_search_icon_check' ) ): ?>
		#top-search .search-click{ font-size: <?php echo get_theme_mod( 'size_header_search_icon_check' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'size_header_cart_icon_check' ) ): ?>
		#top-search.shoping-cart-icon > a > i{ font-size: <?php echo get_theme_mod( 'size_header_cart_icon_check' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_topbar_menu_uppercase' ) ): ?>
		#navigation .menu li a { text-transform: none; letter-spacing: 0; }
		#navigation .penci-megamenu .post-mega-title a{ text-transform: uppercase; letter-spacing: 1px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_font_size_lv1' ) ): ?>
		#navigation ul.menu > li > a, #navigation .menu > ul > li > a { font-size: <?php echo get_theme_mod( 'penci_font_size_lv1' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_font_size_drop' ) ): ?>
		#navigation ul.menu ul a, #navigation .menu ul ul a { font-size: <?php echo get_theme_mod( 'penci_font_size_drop' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod('penci_font_size_title_cat_mega') ): ?>
		#navigation .penci-megamenu .post-mega-title a { font-size:<?php echo get_theme_mod( 'penci_font_size_title_cat_mega' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_font_size_child_cat_mega' ) ): ?>
		#navigation .penci-megamenu .penci-mega-child-categories a { font-size: <?php echo get_theme_mod( 'penci_font_size_child_cat_mega' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod('penci_font_size_cat_mega') ): ?>
		#navigation .penci-megamenu .penci-mega-thumbnail .mega-cat-name { font-size:<?php echo get_theme_mod( 'penci_font_size_cat_mega' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod('penci_font_size_date_mega') ): ?>
		#navigation .penci-megamenu .penci-mega-date { font-size:<?php echo get_theme_mod( 'penci_font_size_date_mega' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_vernav_remove_line' ) ): ?>
		#sidebar-nav-logo{ padding-bottom: 0; } #sidebar-nav-logo:before { content: none; display: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_vernav_fsearchinput' ) ): ?>
		#sidebar-nav #searchform.penci-hbg-search-form input.search-input{ font-size:<?php echo get_theme_mod( 'penci_vernav_fsearchinput' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_font_icons_mobile_nav' ) ): ?>
		#sidebar-nav .header-social.sidebar-nav-social a i { font-size: <?php echo get_theme_mod( 'penci_font_icons_mobile_nav' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_font_size_mobile_nav' ) ): ?>
		#sidebar-nav .menu li a { font-size: <?php echo get_theme_mod( 'penci_font_size_mobile_nav' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_font_size_menu_hbg' ) ): ?>
		.penci-menu-hbg .menu li a { font-size: <?php echo get_theme_mod( 'penci_font_size_menu_hbg' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_font_size_submenu_hbg' ) ): ?>
		.penci-menu-hbg .menu ul.sub-menu li a { font-size: <?php echo get_theme_mod( 'penci_font_size_submenu_hbg' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_menu_hbg_lowcase' ) ): ?>
		.penci-menu-hbg .menu li a { text-transform: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_off_uppercase_cat_mega' ) ): ?>
		#navigation .penci-megamenu .post-mega-title a { text-transform: none; letter-spacing: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_slogan_color' ) ): ?>
		.header-slogan .header-slogan-text { color:  <?php echo get_theme_mod( 'penci_header_slogan_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_slogan_line_color' ) ): ?>
		.header-slogan .header-slogan-text:before, .header-slogan .header-slogan-text:after { background:  <?php echo get_theme_mod( 'penci_header_slogan_line_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_drop_text_color' ) ): ?>
		#navigation .menu .sub-menu li a { color:  <?php echo get_theme_mod( 'penci_drop_text_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_drop_text_hover_color' ) ): ?>
		#navigation .menu .sub-menu li a:hover, #navigation .menu .sub-menu li.current-menu-item > a, #navigation .sub-menu li:hover > a { color:  <?php echo get_theme_mod( 'penci_drop_text_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_drop_border_style2' ) ): ?>
		#navigation.menu-style-2 ul.menu ul:before, #navigation.menu-style-2 .menu ul ul:before { background-color: <?php echo get_theme_mod( 'penci_drop_border_style2' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_main_bar_search_magnify' ) ): ?>
		#top-search > a, #navigation .button-menu-mobile { color: <?php echo get_theme_mod( 'penci_main_bar_search_magnify' ); ?>; }
		.show-search #searchform input.search-input::-webkit-input-placeholder{ color: <?php echo get_theme_mod( 'penci_main_bar_search_magnify' ); ?>; }
		.show-search #searchform input.search-input:-moz-placeholder { color: <?php echo get_theme_mod( 'penci_main_bar_search_magnify' ); ?>; opacity: 1;}
		.show-search #searchform input.search-input::-moz-placeholder {color: <?php echo get_theme_mod( 'penci_main_bar_search_magnify' ); ?>; opacity: 1; }
		.show-search #searchform input.search-input:-ms-input-placeholder { color: <?php echo get_theme_mod( 'penci_main_bar_search_magnify' ); ?>; }
		.show-search #searchform input.search-input{ color: <?php echo get_theme_mod( 'penci_main_bar_search_magnify' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_main_bar_close_color' ) ): ?>
		.show-search a.close-search { color: <?php echo get_theme_mod( 'penci_main_bar_close_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_off_uppercase_title' ) ): ?>
		.penci-featured-content .feat-text h3 a, .featured-style-35 .feat-text-right h3 a, .featured-style-4 .penci-featured-content .feat-text h3 a, .penci-mag-featured-content h3 a, .pencislider-container .pencislider-content .pencislider-title { text-transform: none; letter-spacing: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_lowcase_popular_posts' ) ): ?>
		.penci-home-popular-post .item-related h3 a { text-transform: none; letter-spacing: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_fslider_cat_fsize' ) ): ?>
		.featured-area .cat > a.penci-cat-name { font-size: <?php echo get_theme_mod( 'penci_fslider_cat_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_fslider_meta_fsize' ) ): ?>
		.penci-featured-content .feat-text .feat-meta span { font-size: <?php echo get_theme_mod( 'penci_fslider_meta_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_fslider_title_fsize' ) ): ?>
		@media only screen and (min-width: 768px){ .penci-featured-content .feat-text h3 a, .featured-style-4 .penci-featured-content .feat-text h3 a, .featured-style-6 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-7 .penci-mag-featured-content h3 a, .featured-style-8 .penci-mag-featured-content h3 a, .featured-style-9 .penci-mag-featured-content h3 a, .featured-style-10 .penci-mag-featured-content h3 a, .featured-style-11 .penci-mag-featured-content h3 a, .featured-style-12 .penci-mag-featured-content h3 a, .featured-style-13 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-14 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-15 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-16 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-17 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-18 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-19 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-19 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-20 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-20 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-21 .penci-item-4 .penci-mag-featured-content h3 a, .featured-style-21 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-24 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-25 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-26 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-27 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-28 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-29 .penci-featured-content .feat-text h3 a, .featured-style-35 .feat-text-right h3 a, .featured-style-37 .penci-item-1 .penci-mag-featured-content h3 a{ font-size: <?php echo get_theme_mod( 'penci_fslider_title_fsize' ); ?>px; } }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_fslider_smalltitle_fsize' ) ): ?>
		@media only screen and (min-width: 768px){ .penci-mag-featured-content h3 a, .featured-style-13 .penci-mag-featured-content h3 a, .featured-style-15 .penci-mag-featured-content h3 a, .featured-style-18 .penci-mag-featured-content h3 a, .featured-style-24 .penci-item-2 .penci-mag-featured-content h3 a { font-size: <?php echo get_theme_mod( 'penci_fslider_smalltitle_fsize' ); ?>px; } }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_fslider_tinytitle_fsize' ) ): ?>
		@media only screen and (min-width: 768px){ .featured-style-22 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-4 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-5 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-6 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-4 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-5 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-24 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-24 .penci-item-0 .penci-mag-featured-content h3 a{ font-size: <?php echo get_theme_mod( 'penci_fslider_tinytitle_fsize' ); ?>px; } }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_fslider_excerpt_fsize' ) ): ?>
		.featured-style-35 .featured-content-excerpt p, .featured-slider-excerpt p { font-size: <?php echo get_theme_mod( 'penci_fslider_excerpt_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_fslider_button_fsize' ) ): ?>
		.featured-style-29 .penci-featured-slider-button a, .featured-style-35 .penci-featured-slider-button a, .featured-style-38 .penci-featured-slider-button a { font-size: <?php echo get_theme_mod( 'penci_fslider_button_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_fslider_title_fsize_mobile' ) ): ?>
		@media only screen and (max-width: 479px){ .penci-featured-content .feat-text h3 a, .featured-style-4 .penci-featured-content .feat-text h3 a, .featured-style-5 .penci-featured-content .feat-text h3 a, .featured-style-6 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-7 .penci-mag-featured-content h3 a, .featured-style-8 .penci-mag-featured-content h3 a, .featured-style-9 .penci-mag-featured-content h3 a, .featured-style-10 .penci-mag-featured-content h3 a, .featured-style-11 .penci-mag-featured-content h3 a, .featured-style-12 .penci-mag-featured-content h3 a, .featured-style-13 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-14 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-15 .penci-mag-featured-content h3 a, .featured-style-15 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-16 .penci-mag-featured-content h3 a, .featured-style-16 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-17 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-18 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-20 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-21 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-26 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-27 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-28 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-29 .penci-featured-content .feat-text h3 a, .featured-style-30 .penci-featured-content .feat-text h3 a, .featured-style-35 .feat-text-right h3 a, .featured-style-37 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-38 .penci-featured-content .feat-text h3 a{ font-size: <?php echo get_theme_mod( 'penci_fslider_title_fsize_mobile' ); ?>px; } }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_fslider_small_fsize_mobile' ) ): ?>
		@media only screen and (max-width: 479px){ .penci-mag-featured-content h3 a, .featured-style-13 .penci-mag-featured-content h3 a, .featured-style-18 .penci-mag-featured-content h3 a, .featured-style-19 .penci-mag-featured-content h3 a, .featured-style-19 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-19 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-20 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-20 .penci-item-4 .penci-mag-featured-content h3 a, .featured-style-20 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-20 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-21 .penci-item-4 .penci-mag-featured-content h3 a, .featured-style-21 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-21 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-21 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-4 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-5 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-6 .penci-mag-featured-content h3 a, .featured-style-22 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-4 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-5 .penci-mag-featured-content h3 a, .featured-style-23 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-24 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-24 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-24 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-24 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-25 .penci-item-1 .penci-mag-featured-content h3 a, .featured-style-25 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-25 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-25 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-26 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-26 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-26 .penci-item-4 .penci-mag-featured-content h3 a, .featured-style-26 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-27 .penci-item-2 .penci-mag-featured-content h3 a, .featured-style-27 .penci-item-3 .penci-mag-featured-content h3 a, .featured-style-27 .penci-item-4 .penci-mag-featured-content h3 a, .featured-style-27 .penci-item-0 .penci-mag-featured-content h3 a, .featured-style-28 .penci-mag-featured-content h3 a{ font-size: <?php echo get_theme_mod( 'penci_fslider_small_fsize_mobile' ); ?>px; } }
	<?php endif; ?>
	<?php echo penci_renders_css( '.pencislider-container .pencislider-content .pencislider-title', 'penci_pslider_title_fsize' ); ?>
	<?php echo penci_renders_css( '.pencislider-container .pencislider-content .pencislider-caption', 'penci_pslider_caption_fsize' ); ?>
	<?php echo penci_renders_css( '.pencislider-container .pencislider-content .pencislider-button', 'penci_pslider_button_fsize' ); ?>
	<?php if( get_theme_mod( 'penci_featured_cat_margin' ) ):
		$margin_space = get_theme_mod( 'penci_featured_cat_margin' );
		$margin_space = absint($margin_space);
		?>
		.home-featured-cat-content, .penci-featured-cat-seemore, .penci-featured-cat-custom-ads, .home-featured-cat-content.style-8 { margin-bottom: <?php echo $margin_space; ?>px; }
		.home-featured-cat-content.style-8 .penci-grid li.list-post:last-child{ margin-bottom: 0; }
		.home-featured-cat-content.style-3, .home-featured-cat-content.style-11{ margin-bottom: <?php echo ($margin_space - 10); ?>px; }
		.home-featured-cat-content.style-7{ margin-bottom: <?php echo ($margin_space - 26); ?>px; }
		.home-featured-cat-content.style-13{ margin-bottom: <?php echo ($margin_space - 20); ?>px; }
		.penci-featured-cat-seemore, .penci-featured-cat-custom-ads{ margin-top: <?php echo -($margin_space - 20); ?>px; }
		.penci-featured-cat-seemore.penci-seemore-style-7, .mag-cat-style-7 .penci-featured-cat-custom-ads{ margin-top: <?php echo -(abs($margin_space - 26) + 4); ?>px; }
		.penci-featured-cat-seemore.penci-seemore-style-8, .mag-cat-style-8 .penci-featured-cat-custom-ads{ margin-top: <?php echo -(abs($margin_space - 60) - 20); ?>px; }
		.penci-featured-cat-seemore.penci-seemore-style-13, .mag-cat-style-13 .penci-featured-cat-custom-ads{ margin-top: <?php echo -( $margin_space - 20 ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_filter_type' ) != 'tags' && get_theme_mod( 'penci_featured_cat' ) && get_theme_mod( 'penci_featured_cat_hide' ) ):
		$featured_cat_id = get_theme_mod( 'penci_featured_cat' );
		?>
		.widget_categories ul li.cat-item-<?php echo $featured_cat_id; ?>, .widget_categories select option[value="<?php echo $featured_cat_id; ?>"], .widget_tag_cloud .tag-cloud-link.tag-link-<?php echo $featured_cat_id; ?>{ display: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_featured_cat_lowcase' ) ): ?>
		.penci-homepage-title.penci-magazine-title h3 a, .penci-border-arrow.penci-homepage-title .inner-arrow { text-transform: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_cat_size' ) ): ?>
		.penci-homepage-title.penci-magazine-title h3 a, .penci-border-arrow.penci-homepage-title .inner-arrow { font-size: <?php echo get_theme_mod( 'penci_featured_cat_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featuredcat_cat_size' ) ): ?>
		.home-featured-cat-content .cat > a.penci-cat-name { font-size: <?php echo get_theme_mod( 'penci_featuredcat_cat_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featuredcat_meta_size' ) ): ?>
		.home-featured-cat-content .grid-post-box-meta, .home-featured-cat-content.style-12 .magcat-detail .mag-meta, .penci-fea-cat-style-13 .grid-post-box-meta, .home-featured-cat-content.style-14 .mag-meta{ font-size: <?php echo get_theme_mod( 'penci_featuredcat_meta_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featuredcat_excerpt_size' ) ): ?>
		.mag-excerpt p, .mag-excerpt, .home-featured-cat-content .item-content p, .home-featured-cat-content .item-content{ font-size: <?php echo get_theme_mod( 'penci_featuredcat_excerpt_size' ); ?>px; }
	<?php endif; ?>
	<?php echo penci_renders_css( '.home-featured-cat-content .penci-magcat-carousel .magcat-detail h3 a, .home-featured-cat-content .penci-grid li .item h2 a, .home-featured-cat-content .mag-photo .magcat-detail h3 a, .home-featured-cat-content .first-post .magcat-detail h3 a', 'penci_featuredcat_title_size' ); ?>
	<?php echo penci_renders_css( '.home-featured-cat-content .magcat-detail h3 a', 'penci_featuredcat_smtitle_size' ); ?>
	<?php echo penci_renders_css( '.penci-single-mag-slider .magcat-detail .magcat-titlte', 'penci_featuredcat4_title_size' ); ?>
	<?php echo penci_renders_css( '.home-featured-cat-content.style-12 .penci-magcat-carousel .magcat-detail h3 a, .home-featured-cat-content .penci-grid.penci-fea-cat-style-13 li .item h2 a', 'penci_featuredcat12_title_size' ); ?>
	<?php echo penci_renders_css( '.home-featured-cat-content.style-14 .first-post .magcat-detail h3 a', 'penci_featuredcat14_ftitle_size' ); ?>
	<?php echo penci_renders_css( '.home-featured-cat-content .magcat-detail .magcat-title-small a', 'penci_featuredcat14_title_size' ); ?>
	<?php if( get_theme_mod( 'penci_featuredcat_viewall_size' ) ): ?>
		.penci-featured-cat-seemore a, .penci-featured-cat-seemore.penci-btn-make-button a{ font-size: <?php echo get_theme_mod( 'penci_featuredcat_viewall_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_cat_image_8' ) ): ?>
		.penci-homepage-title.style-8 .inner-arrow { background-image: url(<?php echo get_theme_mod( 'penci_featured_cat_image_8' ); ?>); }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_cat8_repeat' ) ): ?>
		.penci-homepage-title.style-8 .inner-arrow { background-repeat: <?php echo get_theme_mod( 'penci_featured_cat8_repeat' ); ?>; background-size: auto; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_penci_slider_ratio' ) ): ?>
		.penci-owl-carousel .pencislider-item .penci-image-holder{ height: auto !important; }
		.penci-owl-carousel .pencislider-item .penci-image-holder:before { content: ''; padding-top: <?php echo get_theme_mod( 'penci_featured_penci_slider_ratio' ); ?>%; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_penci_slider_remove_overlay' ) ): ?>
		.pencislider-container .pencislider-content .pencislider-title span, .pencislider-container .pencislider-content .pencislider-caption span{ background: none; padding: 0; }
	<?php endif; ?>
	.penci-header-signup-form { padding-top: <?php echo get_theme_mod( 'penci_header_signup_padding' ); ?>px; padding-bottom: <?php echo get_theme_mod( 'penci_header_signup_padding' ); ?>px; }
	<?php if( get_theme_mod( 'penci_header_signup_fdesc' ) ): ?>
		.penci-header-signup-form .mc4wp-form-fields > p{ font-size: <?php echo get_theme_mod( 'penci_header_signup_fdesc' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_signup_finput' ) ): ?>
		.penci-header-signup-form .mc4wp-form input[type="text"], .penci-header-signup-form .mc4wp-form input[type="email"], .penci-header-signup-form .mc4wp-form input[type="date"], .penci-header-signup-form .mc4wp-form input[type="number"]{ font-size: <?php echo get_theme_mod( 'penci_header_signup_finput' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_signup_fsubmit' ) ): ?>
		.penci-header-signup-form .widget input[type="submit"] { font-size: <?php echo get_theme_mod( 'penci_header_signup_fsubmit' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_signup_bg' ) ): ?>
		.penci-header-signup-form { background-color: <?php echo get_theme_mod( 'penci_header_signup_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_signup_color' ) ): ?>
		.penci-header-signup-form .mc4wp-form, .penci-header-signup-form h4.header-signup-form, .penci-header-signup-form .mc4wp-form-fields > p, .penci-header-signup-form form > p { color: <?php echo get_theme_mod( 'penci_header_signup_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_signup_input_border' ) ): ?>
		.penci-header-signup-form .mc4wp-form input[type="text"], .penci-header-signup-form .mc4wp-form input[type="email"] { border-color: <?php echo get_theme_mod( 'penci_header_signup_input_border' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_signup_input_color' ) ): ?>
		.penci-header-signup-form .mc4wp-form input[type="text"], .penci-header-signup-form .mc4wp-form input[type="email"] { color: <?php echo get_theme_mod( 'penci_header_signup_input_color' ); ?>; }
		.penci-header-signup-form .mc4wp-form input[type="text"]::-webkit-input-placeholder, .penci-header-signup-form .mc4wp-form input[type="email"]::-webkit-input-placeholder{  color: <?php echo get_theme_mod( 'penci_header_signup_input_color' ); ?>;  }
		.penci-header-signup-form .mc4wp-form input[type="text"]:-moz-placeholder, .penci-header-signup-form .mc4wp-form input[type="email"]:-moz-placeholder {  color: <?php echo get_theme_mod( 'penci_header_signup_input_color' ); ?>;  }
		.penci-header-signup-form .mc4wp-form input[type="text"]::-moz-placeholder, .penci-header-signup-form .mc4wp-form input[type="email"]::-moz-placeholder {  color: <?php echo get_theme_mod( 'penci_header_signup_input_color' ); ?>;  }
		.penci-header-signup-form .mc4wp-form input[type="text"]:-ms-input-placeholder, .penci-header-signup-form .mc4wp-form input[type="email"]:-ms-input-placeholder {  color: <?php echo get_theme_mod( 'penci_header_signup_input_color' ); ?>;  }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_signup_submit_bg' ) ): ?>
		.penci-header-signup-form .widget input[type="submit"] { background-color: <?php echo get_theme_mod( 'penci_header_signup_submit_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_signup_submit_color' ) ): ?>
		.penci-header-signup-form .widget input[type="submit"] { color: <?php echo get_theme_mod( 'penci_header_signup_submit_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_signup_submit_bg_hover' ) ): ?>
		.penci-header-signup-form .widget input[type="submit"]:hover { background-color: <?php echo get_theme_mod( 'penci_header_signup_submit_bg_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_signup_submit_color_hover' ) ): ?>
		.penci-header-signup-form .widget input[type="submit"]:hover { color: <?php echo get_theme_mod( 'penci_header_signup_submit_color_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_social_color' ) ): ?>
		.header-social a i, .main-nav-social a {   color: <?php echo get_theme_mod( 'penci_header_social_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_header_social_color_hover' ) ): ?>
		.header-social a:hover i, .main-nav-social a:hover, .penci-menuhbg-toggle:hover .lines-button:after, .penci-menuhbg-toggle:hover .penci-lines:before, .penci-menuhbg-toggle:hover .penci-lines:after {   color: <?php echo get_theme_mod( 'penci_header_social_color_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_ver_nav_overlay_color' ) ): ?>
		#close-sidebar-nav { background-color: <?php echo get_theme_mod( 'penci_ver_nav_overlay_color' ); ?>; }
		.open-sidebar-nav #close-sidebar-nav { opacity: 0.85; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_ver_nav_close_bg' ) ): ?>
		#close-sidebar-nav i { background-color: <?php echo get_theme_mod( 'penci_ver_nav_close_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_ver_nav_close_color' ) ): ?>
		#close-sidebar-nav i { color: <?php echo get_theme_mod( 'penci_ver_nav_close_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_ver_nav_bg' ) ): ?>
		#sidebar-nav { background: <?php echo get_theme_mod( 'penci_ver_nav_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_ver_nav_searchborder' ) ): ?>
		#sidebar-nav #searchform.penci-hbg-search-form input.search-input, #sidebar-nav #searchform.penci-hbg-search-form input.search-input:hover, #sidebar-nav #searchform.penci-hbg-search-form input.search-input:focus { border-color: <?php echo get_theme_mod( 'penci_ver_nav_searchborder' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_ver_nav_textcolor' ) ): ?>
		#sidebar-nav #searchform.penci-hbg-search-form input.search-input { color: <?php echo get_theme_mod( 'penci_ver_nav_textcolor' ); ?>; }
		#sidebar-nav #searchform.penci-hbg-search-form input.search-input::-webkit-input-placeholder { color: <?php echo get_theme_mod( 'penci_ver_nav_textcolor' ); ?>; }
		#sidebar-nav #searchform.penci-hbg-search-form input.search-input:-ms-input-placeholder { color: <?php echo get_theme_mod( 'penci_ver_nav_textcolor' ); ?>; }
		#sidebar-nav #searchform.penci-hbg-search-form input.search-input::placeholder { color: <?php echo get_theme_mod( 'penci_ver_nav_textcolor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_ver_nav_iconcolor' ) ): ?>
		#sidebar-nav #searchform.penci-hbg-search-form i { color: <?php echo get_theme_mod( 'penci_ver_nav_iconcolor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_ver_nav_accent_color' ) ): ?>
		.header-social.sidebar-nav-social a i, #sidebar-nav .menu li a, #sidebar-nav .menu li a .indicator { color: <?php echo get_theme_mod( 'penci_ver_nav_accent_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_ver_nav_accent_hover_color' ) ): ?>
		#sidebar-nav .menu li a:hover, .header-social.sidebar-nav-social a:hover i, #sidebar-nav .menu li a .indicator:hover, #sidebar-nav .menu .sub-menu li a .indicator:hover{ color: <?php echo get_theme_mod( 'penci_ver_nav_accent_hover_color' ); ?>; }
		#sidebar-nav-logo:before{ background-color: <?php echo get_theme_mod( 'penci_ver_nav_accent_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_ver_nav_items_border' ) ): ?>
		#sidebar-nav .menu li, #sidebar-nav ul.sub-menu, #sidebar-nav #logo + ul {   border-color: <?php echo get_theme_mod( 'penci_ver_nav_items_border' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_video_height' ) ): ?>
		#penci-featured-video-bg { height: <?php echo get_theme_mod( 'penci_featured_video_height' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_video_heading_color' ) ): ?>
		h2.penci-heading-video { color: <?php echo get_theme_mod( 'penci_featured_video_heading_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_video_sub_heading_color' ) ): ?>
		p.penci-sub-heading-video { color: <?php echo get_theme_mod( 'penci_featured_video_sub_heading_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_overlay_bg' ) ): ?>
		.penci-slide-overlay .overlay-link {
		background: -moz-linear-gradient(top, transparent 60%, <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?> 100%);
		background: -webkit-linear-gradient(top, transparent 60%, <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?> 100%);
		background: -o-linear-gradient(top, transparent 60%, <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?> 100%);
		background: -ms-linear-gradient(top, transparent 60%, <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?> 100%);
		background: linear-gradient(to bottom, transparent 60%, <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?> 100%);
		}
		.penci-slider4-overlay{
		background: -moz-linear-gradient(left, transparent 26%, <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?> 65%);
		background: -webkit-gradient(linear, left top, right top, color-stop(26%, <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?>), color-stop(65%,transparent));
		background: -webkit-linear-gradient(left, transparent 26%, <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?> 65%);
		background: -o-linear-gradient(left, transparent 26%, <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?> 65%);
		background: -ms-linear-gradient(left, transparent 26%, <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?> 65%);
		background: linear-gradient(to right, transparent 26%, <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?> 65%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?>', endColorstr='<?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?>',GradientType=1 );
		}
		@media only screen and (max-width: 960px){
		.featured-style-4 .penci-featured-content .featured-slider-overlay, .featured-style-5 .penci-featured-content .featured-slider-overlay { background-color: <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?>; }
		}
		.penci-slider38-overlay, .penci-flat-overlay .penci-slide-overlay .penci-mag-featured-content:before{ background-color: <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?>; }
	<?php endif; ?>
	.penci-slide-overlay .overlay-link, .penci-slider38-overlay, .penci-flat-overlay .penci-slide-overlay .penci-mag-featured-content:before { opacity: <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg_opacity' ); ?>; }
	.penci-item-mag:hover .penci-slide-overlay .overlay-link, .featured-style-38 .item:hover .penci-slider38-overlay, .penci-flat-overlay .penci-item-mag:hover .penci-slide-overlay .penci-mag-featured-content:before { opacity: <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg_hover_opacity' ); ?>; }
	.penci-featured-content .featured-slider-overlay { opacity: <?php echo get_theme_mod( 'penci_featured_slider_box_opacity' ); ?>; }
	<?php if( get_theme_mod( 'penci_featured_slider_box_opacity' ) ): ?>
		@-webkit-keyframes pencifadeInUpDiv{Header Background Color
		0%{ opacity:0; -webkit-transform:translate3d(0,450px,0);transform:translate3d(0,450px,0);}
		100%{opacity:<?php echo get_theme_mod( 'penci_featured_slider_box_opacity' ); ?>;-webkit-transform:none;transform:none}
		}
		@keyframes pencifadeInUpDiv{
		0%{opacity:0;-webkit-transform:translate3d(0,450px,0);transform:translate3d(0,450px,0);}
		100%{opacity:<?php echo get_theme_mod( 'penci_featured_slider_box_opacity' ); ?>;-webkit-transform:none;transform:none}
		}
		@media only screen and (max-width: 960px){
		.penci-featured-content-right .feat-text-right:before{ opacity: <?php echo get_theme_mod( 'penci_featured_slider_box_opacity' ); ?>; }
		}
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_box_bg_color' ) ): ?>
		.penci-featured-content .featured-slider-overlay, .penci-featured-content-right:before, .penci-featured-content-right .feat-text-right:before { background: <?php echo get_theme_mod( 'penci_featured_slider_box_bg_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_cat_color' ) ): ?>
		.penci-featured-content .feat-text .featured-cat a, .penci-mag-featured-content .cat > a.penci-cat-name, .featured-style-35 .cat > a.penci-cat-name { color: <?php echo get_theme_mod( 'penci_featured_slider_cat_color' ); ?>; }
		.penci-mag-featured-content .cat > a.penci-cat-name:after, .penci-featured-content .cat > a.penci-cat-name:after, .featured-style-35 .cat > a.penci-cat-name:after{ border-color: <?php echo get_theme_mod( 'penci_featured_slider_cat_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_cat_hover_color' ) ): ?>
		.penci-featured-content .feat-text .featured-cat a:hover, .penci-mag-featured-content .cat > a.penci-cat-name:hover, .featured-style-35 .cat > a.penci-cat-name:hover { color: <?php echo get_theme_mod( 'penci_featured_slider_cat_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_title_color' ) ): ?>
		.penci-mag-featured-content h3 a, .penci-featured-content .feat-text h3 a, .featured-style-35 .feat-text-right h3 a { color: <?php echo get_theme_mod( 'penci_featured_slider_title_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_title_hover_color' ) ): ?>
		.penci-mag-featured-content h3 a:hover, .penci-featured-content .feat-text h3 a:hover, .featured-style-35 .feat-text-right h3 a:hover { color: <?php echo get_theme_mod( 'penci_featured_slider_title_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_meta_color' ) ): ?>
		.penci-mag-featured-content .feat-meta span, .penci-mag-featured-content .feat-meta a, .penci-featured-content .feat-text .feat-meta span, .penci-featured-content .feat-text .feat-meta span a, .featured-style-35 .featured-content-excerpt .feat-meta span, .featured-style-35 .featured-content-excerpt .feat-meta span a { color: <?php echo get_theme_mod( 'penci_featured_slider_meta_color' ); ?>; }
		.penci-mag-featured-content .feat-meta > span:after, .penci-featured-content .feat-text .feat-meta > span:after { border-color: <?php echo get_theme_mod( 'penci_featured_slider_meta_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_excerpt_color' ) ): ?>
		.featured-style-35 .featured-content-excerpt p, .featured-slider-excerpt p{ color: <?php echo get_theme_mod( 'penci_featured_slider_excerpt_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_icon_color' ) ): ?>
		.featured-area .overlay-icon-format { color: <?php echo get_theme_mod( 'penci_featured_slider_icon_color' ); ?>; border-color: <?php echo get_theme_mod( 'penci_featured_slider_icon_color' ); ?>; }
	<?php endif; ?>
	.featured-style-29 .featured-slider-overlay { opacity: <?php echo get_theme_mod( 'penci_featured_slider_overlay_opacity29' ); ?>; }
	<?php if( get_theme_mod( 'penci_featured_slider_color_29' ) ): ?>
		.featured-style-29 .featured-slider-overlay { background-color: <?php echo get_theme_mod( 'penci_featured_slider_color_29' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_lines_color' ) ): ?>
		.featured-style-29 .penci-featured-content .feat-text h3:before { border-color: <?php echo get_theme_mod( 'penci_featured_slider_lines_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_button_color' ) ): ?>
		.featured-style-29 .penci-featured-slider-button a, .featured-style-35 .penci-featured-slider-button a, .featured-style-38 .penci-featured-slider-button a { border-color: <?php echo get_theme_mod( 'penci_featured_slider_button_color' ); ?>; color: <?php echo get_theme_mod( 'penci_featured_slider_button_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_button_hover_bg' ) ): ?>
		.featured-style-29 .penci-featured-slider-button a:hover, .featured-style-35 .penci-featured-slider-button a:hover, .featured-style-38 .penci-featured-slider-button a:hover { border-color: <?php echo get_theme_mod( 'penci_featured_slider_button_hover_bg' ); ?>; background-color: <?php echo get_theme_mod( 'penci_featured_slider_button_hover_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_featured_slider_button_hover_color' ) ): ?>
		.featured-style-29 .penci-featured-slider-button a:hover, .featured-style-35 .penci-featured-slider-button a:hover, .featured-style-38 .penci-featured-slider-button a:hover { color: <?php echo get_theme_mod( 'penci_featured_slider_button_hover_color' ); ?>; }
	<?php endif; ?>
	<?php
	$auto_speed = get_theme_mod( 'penci_featured_slider_auto_speed' );
	if( is_numeric( $auto_speed ) ):
		$auto_speed_css = $auto_speed/1000;
		?>
		.pencislider-container .pencislider-content .pencislider-title, .featured-style-37 .penci-item-1 .featured-cat{-webkit-animation-delay: <?php echo sanitize_text_field( $auto_speed_css ); ?>s;-moz-animation-delay: <?php echo sanitize_text_field( $auto_speed_css ); ?>s;-o-animation-delay: <?php echo sanitize_text_field( $auto_speed_css ); ?>s;animation-delay: <?php echo sanitize_text_field( $auto_speed_css ); ?>s;}
		.pencislider-container .pencislider-caption, .featured-style-37 .penci-item-1 .feat-text h3 {-webkit-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.2); ?>s;-moz-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.2); ?>s;-o-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.2); ?>s;animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.2); ?>s;}
		.pencislider-container .pencislider-content .penci-button, .featured-style-37 .penci-item-1 .feat-meta {-webkit-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.4); ?>s;-moz-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.4); ?>s;-o-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.4); ?>s;animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.4); ?>s;}
		.penci-featured-content .feat-text{ -webkit-animation-delay: <?php echo sanitize_text_field( $auto_speed_css - 0.2 ); ?>s;-moz-animation-delay: <?php echo sanitize_text_field( $auto_speed_css - 0.2 ); ?>s;-o-animation-delay: <?php echo sanitize_text_field( $auto_speed_css - 0.2 ); ?>s;animation-delay: <?php echo sanitize_text_field( $auto_speed_css - 0.2 ); ?>s; }
		.penci-featured-content .feat-text .featured-cat{ -webkit-animation-delay: <?php echo sanitize_text_field($auto_speed_css); ?>s;-moz-animation-delay: <?php echo sanitize_text_field($auto_speed_css); ?>s;-o-animation-delay: <?php echo sanitize_text_field($auto_speed_css); ?>s;animation-delay: <?php echo sanitize_text_field($auto_speed_css); ?>s; }
		.penci-featured-content .feat-text h3{ -webkit-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.2); ?>s;-moz-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.2); ?>s;-o-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.2); ?>s;animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.2); ?>s; }
		.penci-featured-content .feat-text .feat-meta, .featured-style-29 .penci-featured-slider-button{ -webkit-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.4); ?>s;-moz-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.4); ?>s;-o-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.6); ?>s;animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.4); ?>s; }
		.penci-featured-content-right:before{ animation-delay: <?php echo sanitize_text_field($auto_speed_css - 0.1); ?>s; -webkit-animation-delay: <?php echo sanitize_text_field($auto_speed_css - 0.1); ?>s; }
		.featured-style-35 .featured-cat{ animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.3); ?>s; -webkit-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.3); ?>s; }
		.featured-style-35 .feat-text-right h3{ animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.5); ?>s; -webkit-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.5); ?>s; }
		.featured-style-35 .feat-text-right .featured-content-excerpt{ animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.7); ?>s; -webkit-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.7); ?>s; }
		.featured-style-35 .feat-text-right .penci-featured-slider-button{ animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.9); ?>s; -webkit-animation-delay: <?php echo sanitize_text_field($auto_speed_css + 0.9); ?>s; }
	<?php endif; ?>
	<?php
	$penci_slider_height = get_theme_mod( 'penci_featured_penci_slider_height' );
	if( !empty( $penci_slider_height ) && is_numeric( $penci_slider_height ) ): ?>
		.featured-area .penci-slider { max-height: <?php echo absint( $penci_slider_height ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_meta_overlay' ) ): ?>
		.penci-wrapper-data .standard-post-image:not(.classic-post-image){ margin-bottom: 0; }
		.header-standard.standard-overlay-meta{ margin: -30px 30px 19px; background: #fff; padding-top: 25px; padding-left: 5px; padding-right: 5px; z-index: 10; position: relative; }
		.penci-wrapper-data .standard-post-image:not(.classic-post-image) .audio-iframe, .penci-wrapper-data .standard-post-image:not(.classic-post-image) .standard-content-special{ bottom: 50px; }
		@media only screen and (max-width: 479px){
		.header-standard.standard-overlay-meta{ margin-left: 10px; margin-right: 10px; }
		}
		<?php if( get_theme_mod( 'penci_bg_color_dark' ) ): ?>
			.header-standard.standard-overlay-meta{ background-color: <?php echo penci_get_setting( 'penci_bg_color_dark' ); ?>; }
		<?php endif; ?>
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_effect_button' ) ): ?>
		.penci-more-link a.more-link:hover:before { right: 100%; margin-right: 10px; width: 60px; }
		.penci-more-link a.more-link:hover:after{ left: 100%; margin-left: 10px; width: 60px; }
		.standard-post-entry a.more-link:hover, .standard-post-entry a.more-link:hover:before, .standard-post-entry a.more-link:hover:after { opacity: 0.8; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_off_uppercase_title' ) ): ?>
		.header-standard h2, .header-standard .post-title, .header-standard h2 a { text-transform: none; letter-spacing: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_on_uppercase_cat' ) ): ?>
		.header-standard .cat a.penci-cat-name { text-transform: uppercase; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_categories_action_color' ) ): ?>
		.penci-standard-cat .cat > a.penci-cat-name { color: <?php echo get_theme_mod( 'penci_standard_categories_action_color' ); ?>; }
		.penci-standard-cat .cat:before, .penci-standard-cat .cat:after { background-color: <?php echo get_theme_mod( 'penci_standard_categories_action_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_title_post_color' ) ): ?>
		.header-standard > h2 a { color: <?php echo get_theme_mod( 'penci_standard_title_post_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_title_post_color' ) ): ?>
		.header-standard > h2 a { color: <?php echo get_theme_mod( 'penci_standard_title_post_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_title_post_hover_color' ) ): ?>
		.header-standard > h2 a:hover { color: <?php echo get_theme_mod( 'penci_standard_title_post_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_share_icon_color' ) ): ?>
		.standard-content .penci-post-box-meta .penci-post-share-box a { color: <?php echo get_theme_mod( 'penci_standard_share_icon_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_share_icon_hover_color' ) ): ?>
		.standard-content .penci-post-box-meta .penci-post-share-box a:hover, .standard-content .penci-post-box-meta .penci-post-share-box a.liked { color: <?php echo get_theme_mod( 'penci_standard_share_icon_hover_color' ); ?>; }
	<?php endif; ?>
	
	<?php if( get_theme_mod( 'penci_standard_meta_post_color' ) ): ?>
		.header-standard .author-post span, .standard-content .penci-post-box-meta .penci-box-meta span, .standard-content .penci-post-box-meta .penci-box-meta a { color: <?php echo get_theme_mod( 'penci_standard_meta_post_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_author_post_color' ) ): ?>
		.header-standard .author-post span a{ color: <?php echo get_theme_mod( 'penci_standard_author_post_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_accent_color' ) ): ?>
		.header-standard .post-entry a:hover, .header-standard .author-post span a:hover, .standard-content a, .standard-content .post-entry a, .standard-post-entry a.more-link:hover, .penci-post-box-meta .penci-box-meta a:hover, .standard-content .post-entry blockquote:before, .post-entry blockquote cite, .post-entry blockquote .author, .standard-content-special .author-quote span, .standard-content-special .format-post-box .post-format-icon i, .standard-content-special .format-post-box .dt-special a:hover, .standard-content .penci-more-link a.more-link, .standard-content .penci-post-box-meta .penci-box-meta a:hover { color: <?php echo get_theme_mod( 'penci_standard_accent_color' ); ?>; }
		.standard-content .penci-more-link.penci-more-link-button a.more-link{ background-color: <?php echo get_theme_mod( 'penci_standard_accent_color' ); ?>; color: #fff; }
		.standard-content-special .author-quote span:before, .standard-content-special .author-quote span:after, .standard-content .post-entry ul li:before, .post-entry blockquote .author span:after, .header-standard:after { background-color: <?php echo get_theme_mod( 'penci_standard_accent_color' ); ?>; }
		.penci-more-link a.more-link:before, .penci-more-link a.more-link:after { border-color: <?php echo get_theme_mod( 'penci_standard_accent_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_readmore_color' ) ): ?>
		.standard-content .penci-more-link a.more-link, .standard-content .penci-more-link.penci-more-link-button a.more-link{ color: <?php echo get_theme_mod( 'penci_standard_readmore_color' ); ?>; }
		.standard-content .penci-more-link a.more-link:before, .standard-content .penci-more-link a.more-link:after{ border-color: <?php echo get_theme_mod( 'penci_standard_readmore_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_readmore_bg' ) ): ?>
		.standard-content .penci-more-link.penci-more-link-button a.more-link{ background-color: <?php echo get_theme_mod( 'penci_standard_readmore_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_grid_off_title_uppercase' ) ): ?>
		.penci-grid li .item h2 a, .penci-masonry .item-masonry h2 a, .grid-mixed .mixed-detail h2 a, .overlay-header-box .overlay-title a { text-transform: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_grid_off_letter_spacing' ) ): ?>
		.penci-grid li .item h2 a, .penci-masonry .item-masonry h2 a { letter-spacing: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_grid_uppercase_cat' ) ): ?>
		.penci-grid .cat a.penci-cat-name, .penci-masonry .cat a.penci-cat-name, .grid-mixed .cat a.penci-cat-name, .overlay-header-box .cat a.penci-cat-name { text-transform: uppercase; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_masonry_categories_accent_color' ) ): ?>
		.penci-grid .cat a.penci-cat-name, .penci-masonry .cat a.penci-cat-name { color: <?php echo get_theme_mod( 'penci_masonry_categories_accent_color' ); ?>; }
		.penci-grid .cat a.penci-cat-name:after, .penci-masonry .cat a.penci-cat-name:after { border-color: <?php echo get_theme_mod( 'penci_masonry_categories_accent_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_masonry_box_icon' ) ): ?>
		.penci-post-box-meta .penci-post-share-box a { color: <?php echo get_theme_mod( 'penci_masonry_box_icon' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_masonry_box_icon_hover' ) ): ?>
		.penci-post-share-box a.liked, .penci-post-share-box a:hover { color: <?php echo get_theme_mod( 'penci_masonry_box_icon_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_masonry_title_post_color' ) ): ?>
		.penci-grid li .item h2 a, .penci-masonry .item-masonry h2 a, .grid-mixed .mixed-detail h2 a { color: <?php echo get_theme_mod( 'penci_masonry_title_post_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_masonry_title_post_hover_color' ) ): ?>
		.penci-grid li .item h2 a:hover, .penci-masonry .item-masonry h2 a:hover, .grid-mixed .mixed-detail h2 a:hover { color: <?php echo get_theme_mod( 'penci_masonry_title_post_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_masonry_meta_color' ) ): ?>
		.grid-post-box-meta span, .overlay-post-box-meta, .overlay-post-box-meta .overlay-share span, .overlay-post-box-meta .overlay-share a{ color: <?php echo get_theme_mod( 'penci_masonry_meta_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_masonry_author_color' ) ): ?>
		.grid-post-box-meta span a, .grid-mixed .penci-post-box-meta .penci-box-meta a{ color: <?php echo get_theme_mod( 'penci_masonry_author_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_masonry_accent_color' ) ): ?>
		.overlay-post-box-meta .overlay-share a:hover, .overlay-author a:hover, .penci-grid .standard-content-special .format-post-box .dt-special a:hover, .grid-post-box-meta span a:hover, .grid-post-box-meta span a.comment-link:hover, .penci-grid .standard-content-special .author-quote span, .penci-grid .standard-content-special .format-post-box .post-format-icon i, .grid-mixed .penci-post-box-meta .penci-box-meta a:hover { color: <?php echo get_theme_mod( 'penci_masonry_accent_color' ); ?>; }
		.penci-grid .standard-content-special .author-quote span:before, .penci-grid .standard-content-special .author-quote span:after, .grid-header-box:after, .list-post .header-list-style:after { background-color: <?php echo get_theme_mod( 'penci_masonry_accent_color' ); ?>; }
		.penci-grid .post-box-meta span:after, .penci-masonry .post-box-meta span:after { border-color: <?php echo get_theme_mod( 'penci_masonry_accent_color' ); ?>; }
		.penci-readmore-btn.penci-btn-make-button a{ background-color: <?php echo get_theme_mod( 'penci_masonry_accent_color' ); ?>; color: #fff; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_masonry_readmore_color' ) ): ?>
		.penci-readmore-btn a, .penci-readmore-btn.penci-btn-make-button a{ color: <?php echo get_theme_mod( 'penci_masonry_readmore_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_masonry_readmore_bg' ) ): ?>
		.penci-readmore-btn.penci-btn-make-button a{ background-color: <?php echo get_theme_mod( 'penci_masonry_readmore_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_photography_overlay_color' ) ): ?>
		.penci-grid li.typography-style .overlay-typography { background-color: <?php echo get_theme_mod( 'penci_photography_overlay_color' ); ?>; }
	<?php endif; ?>
	.penci-grid li.typography-style .overlay-typography { opacity: <?php echo get_theme_mod( 'penci_photography_overlay_opacity' ); ?>; }
	.penci-grid li.typography-style:hover .overlay-typography { opacity: <?php echo get_theme_mod( 'penci_photography_overlay_hover_opacity' ); ?>; }
	<?php if( get_theme_mod( 'penci_photography_categories_color' ) ): ?>
		.penci-grid .typography-style .main-typography a.penci-cat-name, .penci-grid .typography-style .main-typography a.penci-cat-name:hover { color: <?php echo get_theme_mod( 'penci_photography_categories_color' ); ?>; }
		.typography-style .main-typography a.penci-cat-name:after { border-color: <?php echo get_theme_mod( 'penci_photography_categories_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_photography_title_post_color' ) ): ?>
		.penci-grid li.typography-style .item .main-typography h2 a { color: <?php echo get_theme_mod( 'penci_photography_title_post_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_photography_title_post_hover_color' ) ): ?>
		.penci-grid li.typography-style .item .main-typography h2 a:hover { color: <?php echo get_theme_mod( 'penci_photography_title_post_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_photography_meta_color' ) ): ?>
		.penci-grid li.typography-style .grid-post-box-meta span, .penci-grid li.typography-style .grid-post-box-meta span a { color: <?php echo get_theme_mod( 'penci_photography_meta_color' ); ?>; }
		.penci-grid li.typography-style .grid-post-box-meta span:after { background-color: <?php echo get_theme_mod( 'penci_photography_meta_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_photography_accent_color' ) ): ?>
		.penci-grid li.typography-style .grid-post-box-meta span a:hover { color: <?php echo get_theme_mod( 'penci_photography_accent_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_overlay_title_post_color' ) ): ?>
		.overlay-header-box .overlay-title a { color: <?php echo get_theme_mod( 'penci_overlay_title_post_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_overlay_title_post_hover_color' ) ): ?>
		.overlay-header-box .overlay-title a:hover { color: <?php echo get_theme_mod( 'penci_overlay_title_post_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_overlay_cat_post_color' ) ): ?>
		.overlay-header-box .cat > a.penci-cat-name { color: <?php echo get_theme_mod( 'penci_overlay_cat_post_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_overlay_cat_hover_post_color' ) ): ?>
		.overlay-header-box .cat > a.penci-cat-name:hover { color: <?php echo get_theme_mod( 'penci_overlay_cat_hover_post_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_overlay_author_post_color' ) ): ?>
		.overlay-author span, .overlay-author a { color: <?php echo get_theme_mod( 'penci_overlay_author_post_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_layout_category_fsize' ) ): ?>
		.penci-standard-cat .cat > a.penci-cat-name, .grid-header-box .cat > a.penci-cat-name, .header-list-style .cat > a.penci-cat-name, .overlay-header-box .cat > a.penci-cat-name, .inner-boxed-2 .cat > a.penci-cat-name, .main-typography .cat > a.penci-cat-name{ font-size: <?php echo get_theme_mod( 'penci_layout_category_fsize' ); ?>px; }
	<?php endif; ?>
	<?php echo penci_renders_css( '.header-standard h2 a, .overlay-header-box .overlay-title a', 'penci_layout_titlebig_fsize' ); ?>
	<?php echo penci_renders_css( '.penci-grid li .item h2 a, .penci-masonry .item-masonry h2 a', 'penci_layout_title_fsize' ); ?>
	<?php if( get_theme_mod( 'penci_layout_meta_fsize' ) ): ?>
		.grid-post-box-meta, .overlay-header-box .overlay-author, .penci-post-box-meta .penci-box-meta, .header-standard .author-post{ font-size: <?php echo get_theme_mod( 'penci_layout_meta_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_layout_excerpt_fsize' ) ): ?>
		.item-content p, .standard-content .standard-post-entry, .standard-content .standard-post-entry p{ font-size: <?php echo get_theme_mod( 'penci_layout_excerpt_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_layout_readmore_fsize' ) ): ?>
		.standard-content .penci-more-link a.more-link, .standard-content .penci-more-link.penci-more-link-button a.more-link, .penci-readmore-btn a, .penci-readmore-btn.penci-btn-make-button a{ font-size: <?php echo get_theme_mod( 'penci_layout_readmore_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_layout_sharebox_fsize' ) ): ?>
		.penci-post-box-meta .penci-post-share-box a{ font-size: <?php echo get_theme_mod( 'penci_layout_sharebox_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_width' ) ): 
	$sidebarwidth = get_theme_mod( 'penci_sidebar_width' );
	$sidebarcontent = 100 - $sidebarwidth;
	?>
		@media only screen and (min-width: 961px){ .penci-sidebar-content{ width: <?php echo $sidebarwidth; ?>%; } .penci-single-style-10 .penci-single-s10-content, .container.penci_sidebar:not(.two-sidebar) #main{ width: <?php echo $sidebarcontent; ?>%;  } }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_2sidebar_width' ) ): 
	$sidebarswidth = get_theme_mod( 'penci_2sidebar_width' );
	$sidebarscontent = 100 - ( $sidebarswidth * 2);
	?>
		@media only screen and (min-width: 961px){ .layout-14_12_14 .penci-vc-sidebar, .container.two-sidebar .penci-sidebar-content{ width: <?php echo $sidebarswidth; ?>%; } .layout-14_12_14 .penci-main-content, .container.two-sidebar #main{ width: <?php echo $sidebarscontent; ?>%; } }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_space' ) ): ?>
		@media only screen and (min-width: 961px){ .penci-single-style-10 .penci-single-s10-content, .container.penci_sidebar.right-sidebar #main{ padding-right: <?php echo get_theme_mod( 'penci_sidebar_space' ); ?>px; } .penci-single-style-10.penci_sidebar.left-sidebar .penci-single-s10-content, .container.penci_sidebar.left-sidebar #main{ padding-left: <?php echo get_theme_mod( 'penci_sidebar_space' ); ?>px; } .layout-14_12_14 .penci-main-content, .container.two-sidebar #main{ padding-left: <?php echo get_theme_mod( 'penci_sidebar_space' ); ?>px; padding-right: <?php echo get_theme_mod( 'penci_sidebar_space' ); ?>px; } }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_widget_margin' ) ): ?>
		.penci-sidebar-content .widget { margin-bottom: <?php echo get_theme_mod( 'penci_sidebar_widget_margin' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_heading_lowcase' ) ): ?>
		.penci-sidebar-content .penci-border-arrow .inner-arrow { text-transform: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_heading_size' ) ): ?>
		.penci-sidebar-content .penci-border-arrow .inner-arrow { font-size: <?php echo get_theme_mod( 'penci_sidebar_heading_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_heading_image_8' ) ): ?>
		.penci-sidebar-content.style-8 .penci-border-arrow .inner-arrow { background-image: url(<?php echo get_theme_mod( 'penci_sidebar_heading_image_8' ); ?>); }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_heading8_repeat' ) ): ?>
		.penci-sidebar-content.style-8 .penci-border-arrow .inner-arrow { background-repeat: <?php echo get_theme_mod( 'penci_sidebar_heading8_repeat' ); ?>; background-size: auto; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_heading_bg' ) ): ?>
		.penci-sidebar-content.style-11 .penci-border-arrow .inner-arrow,
		.penci-sidebar-content.style-12 .penci-border-arrow .inner-arrow,
		.penci-sidebar-content.style-14 .penci-border-arrow .inner-arrow:before,
		.penci-sidebar-content.style-13 .penci-border-arrow .inner-arrow,
		.penci-sidebar-content .penci-border-arrow .inner-arrow { background-color: <?php echo get_theme_mod( 'penci_sidebar_heading_bg' ); ?>; }
		.penci-sidebar-content.style-2 .penci-border-arrow:after{ border-top-color: <?php echo get_theme_mod( 'penci_sidebar_heading_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_heading_outer_bg' ) ): ?>
		.penci-sidebar-content .penci-border-arrow:after { background-color: <?php echo get_theme_mod( 'penci_sidebar_heading_outer_bg' ); ?>; }
	<?php endif; ?>

	<?php if( get_theme_mod( 'penci_sidebar_heading_border_color' ) ): ?>
		.penci-sidebar-content .penci-border-arrow .inner-arrow, .penci-sidebar-content.style-4 .penci-border-arrow .inner-arrow:before, .penci-sidebar-content.style-4 .penci-border-arrow .inner-arrow:after, .penci-sidebar-content.style-5 .penci-border-arrow, .penci-sidebar-content.style-7
		.penci-border-arrow, .penci-sidebar-content.style-9 .penci-border-arrow { border-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_color' ); ?>; }
		.penci-sidebar-content .penci-border-arrow:before { border-top-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_heading_border_color5' ) ): ?>
		.penci-sidebar-content.style-5 .penci-border-arrow { border-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_color5' ); ?>; }
		.penci-sidebar-content.style-12 .penci-border-arrow,.penci-sidebar-content.style-10 .penci-border-arrow,
		.penci-sidebar-content.style-5 .penci-border-arrow .inner-arrow{ border-bottom-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_color5' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'sidebar_heading_bordertop_color10' ) ): ?>
		.penci-sidebar-content.style-10 .penci-border-arrow{ border-top-color: <?php echo get_theme_mod( 'sidebar_heading_bordertop_color10' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_heading_shapes_color' ) ): ?>
		.penci-sidebar-content.style-11 .penci-border-arrow .inner-arrow:after,
		.penci-sidebar-content.style-11 .penci-border-arrow .inner-arrow:before{ border-top-color: <?php echo get_theme_mod( 'penci_sidebar_heading_shapes_color' ); ?>; }
		.penci-sidebar-content.style-12 .penci-border-arrow .inner-arrow:before,
		.penci-sidebar-content.style-12.pcalign-center .penci-border-arrow .inner-arrow:after,
		.penci-sidebar-content.style-12.pcalign-right .penci-border-arrow .inner-arrow:after{ border-bottom-color: <?php echo get_theme_mod( 'penci_sidebar_heading_shapes_color' ); ?>; }
		.penci-sidebar-content.style-13.pcalign-center .penci-border-arrow .inner-arrow:after,
		.penci-sidebar-content.style-13.pcalign-left .penci-border-arrow .inner-arrow:after{ border-right-color: <?php echo get_theme_mod( 'penci_sidebar_heading_shapes_color' ); ?>; }
		.penci-sidebar-content.style-13.pcalign-center .penci-border-arrow .inner-arrow:before,
		.penci-sidebar-content.style-13.pcalign-right .penci-border-arrow .inner-arrow:before { border-left-color: <?php echo get_theme_mod( 'penci_sidebar_heading_shapes_color' ); ?>; }

	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_heading_border_color7' ) ): ?>
		.penci-sidebar-content.style-7 .penci-border-arrow .inner-arrow:before, .penci-sidebar-content.style-9 .penci-border-arrow .inner-arrow:before { background-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_color7' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_heading_border_inner_color' ) ): ?>
		.penci-sidebar-content .penci-border-arrow:after { border-color: <?php echo get_theme_mod( 'penci_sidebar_heading_border_inner_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_heading_color' ) ): ?>
		.penci-sidebar-content .penci-border-arrow .inner-arrow { color: <?php echo get_theme_mod( 'penci_sidebar_heading_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_remove_border_outer' ) ): ?>
		.penci-sidebar-content .penci-border-arrow:after { content: none; display: none; }
		.penci-sidebar-content .widget-title{ margin-left: 0; margin-right: 0; margin-top: 0; }
		.penci-sidebar-content .penci-border-arrow:before{ bottom: -6px; border-width: 6px; margin-left: -6px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_remove_arrow_down' ) ): ?>
		.penci-sidebar-content .penci-border-arrow:before, .penci-sidebar-content.style-2 .penci-border-arrow:after { content: none; display: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_accent_color' ) ): ?>
		.widget ul.side-newsfeed li .side-item .side-item-text h4 a, .widget a, #wp-calendar tbody td a, .widget.widget_categories ul li, .widget.widget_archive ul li, .widget-social a i, .widget-social a span, .widget-social.show-text a span,.penci-video_playlist .penci-video-playlist-item .penci-video-title { color: <?php echo get_theme_mod( 'penci_sidebar_accent_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_sidebar_accent_hover_color' ) ): ?>
		.penci-video_playlist .penci-video-playlist-item .penci-video-title:hover,.widget ul.side-newsfeed li .side-item .side-item-text h4 a:hover, .widget a:hover, .penci-sidebar-content .widget-social a:hover span, .widget-social a:hover span, .penci-tweets-widget-content .icon-tweets, .penci-tweets-widget-content .tweet-intents a, .penci-tweets-widget-content
		.tweet-intents span:after, .widget-social.remove-circle a:hover i , #wp-calendar tbody td a:hover, .penci-video_playlist .penci-video-playlist-item .penci-video-title:hover{ color: <?php echo get_theme_mod( 'penci_sidebar_accent_hover_color' ); ?>; }
		.widget .tagcloud a:hover, .widget-social a:hover i, .widget input[type="submit"]:hover,.penci-user-logged-in .penci-user-action-links a:hover,.penci-button:hover, .widget button[type="submit"]:hover { color: #fff; background-color: <?php echo get_theme_mod( 'penci_sidebar_accent_hover_color' ); ?>; border-color: <?php echo get_theme_mod( 'penci_sidebar_accent_hover_color' ); ?>; }
		.about-widget .about-me-heading:before { border-color: <?php echo get_theme_mod( 'penci_sidebar_accent_hover_color' ); ?>; }
		.penci-tweets-widget-content .tweet-intents-inner:before, .penci-tweets-widget-content .tweet-intents-inner:after, .pencisc-column-1.penci-video_playlist .penci-video-nav .playlist-panel-item, .penci-video_playlist .penci-custom-scroll::-webkit-scrollbar-thumb, .penci-video_playlist .penci-playlist-title { background-color: <?php echo get_theme_mod( 'penci_sidebar_accent_hover_color' ); ?>; }
		.penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot.active span, .penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot:hover span { border-color: <?php echo get_theme_mod( 'penci_sidebar_accent_hover_color' ); ?>; background-color: <?php echo get_theme_mod( 'penci_sidebar_accent_hover_color' ); ?>; }
	<?php endif; ?>
	<?php
	$footer_widget_padding = get_theme_mod( 'penci_footer_widget_padding' );
	if ( is_page() ) {
		$pmeta_page_footer = get_post_meta( get_the_ID(), 'penci_pmeta_page_footer', true );
		if ( isset( $pmeta_page_footer['penci_fw_padding_top_bottom'] ) && $pmeta_page_footer['penci_fw_padding_top_bottom'] ) {
			$footer_widget_padding =  $pmeta_page_footer['penci_fw_padding_top_bottom'];
		}
	}

	if( $footer_widget_padding ) {
		echo '#widget-area { padding: ' . $footer_widget_padding . 'px 0; }';
	}
	?>
	<?php if( get_theme_mod( 'penci_footer_widget_titlefsize' ) ): ?>
		.footer-widget-wrapper .widget .widget-title .inner-arrow{ font-size: <?php echo get_theme_mod( 'penci_footer_widget_titlefsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_social_size' ) ): ?>
		ul.footer-socials li a i{ font-size: <?php echo get_theme_mod( 'penci_footer_social_size' ); ?>px; }
		ul.footer-socials li a svg{ width: <?php echo get_theme_mod( 'penci_footer_social_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_social_lowercase' ) ): ?>
		ul.footer-socials li a span { text-transform: none; letter-spacing: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_social_text_size' ) ): ?>
		ul.footer-socials li a span { font-size: <?php echo get_theme_mod( 'penci_footer_social_text_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_menu_size' ) ): ?>
		#footer-section .footer-menu li a { font-size: <?php echo get_theme_mod( 'penci_footer_menu_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_copyright_size' ) ): ?>
		#footer-copyright * { font-size: <?php echo get_theme_mod( 'penci_footer_copyright_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_copyright_remove_italic' ) ): ?>
		#footer-copyright * { font-style: normal; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_showemail' ) ): ?>
		.footer-subscribe .mc4wp-form .mname{ display: block; }
		.footer-subscribe .mc4wp-form .memail, .footer-subscribe .mc4wp-form .msubmit{ float: none; display: block; width: 100%; margin-right: 0; margin-left: 0; }
		.footer-subscribe .mc4wp-form .msubmit input, .footer-subscribe .widget .mc4wp-form input[type="email"], .footer-subscribe .widget .mc4wp-form input[type="text"]{ width: 100%; max-width: 100%; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_ptop' ) ): ?>
		@media only screen and (min-width: 480px){ .footer-subscribe { padding-top: <?php echo get_theme_mod( 'penci_footer_signup_ptop' ); ?>px; } }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_pbottom' ) ): ?>
		@media only screen and (min-width: 480px){ .footer-subscribe { padding-bottom: <?php echo get_theme_mod( 'penci_footer_signup_pbottom' ); ?>px; } }
	<?php endif; ?>
	<?php echo penci_renders_css('.footer-subscribe h4.footer-subscribe-title', 'penci_footer_signup_fstitle'); ?>
	<?php echo penci_renders_css('.footer-subscribe .mc4wp-form .mdes', 'penci_footer_signup_fsdesc'); ?>
	<?php if( get_theme_mod( 'penci_footer_signup_fsinputs' ) ): ?>
		.footer-subscribe .widget .mc4wp-form input[type="email"], .footer-subscribe .widget .mc4wp-form input[type="text"] { font-size: <?php echo get_theme_mod( 'penci_footer_signup_fsinputs' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_fsisubmit' ) ): ?>
		.footer-subscribe .widget .mc4wp-form input[type="submit"]{ font-size: <?php echo get_theme_mod( 'penci_footer_signup_fsisubmit' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_area_bg' ) ): ?>
		.footer-subscribe { background-color: <?php echo get_theme_mod( 'penci_footer_signup_area_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_heading_color' ) ): ?>
		.footer-subscribe h4.footer-subscribe-title { color: <?php echo get_theme_mod( 'penci_footer_signup_heading_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_des_color' ) ): ?>
		.footer-subscribe .mc4wp-form .mdes { color: <?php echo get_theme_mod( 'penci_footer_signup_des_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_email_border' ) ): ?>
		.footer-subscribe .widget .mc4wp-form input[type="email"], .footer-subscribe .widget .mc4wp-form input[type="text"] { border-color: <?php echo get_theme_mod( 'penci_footer_signup_email_border' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'footer_signup_email_border_hover' ) ): ?>
		.footer-subscribe .widget .mc4wp-form input[type="email"]:focus, .footer-subscribe .widget .mc4wp-form input[type="email"]:hover, .footer-subscribe .widget .mc4wp-form input[type="text"]:focus, .footer-subscribe .widget .mc4wp-form input[type="text"]:hover { border-color: <?php echo get_theme_mod( 'footer_signup_email_border_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_email_text_color' ) ): ?>
		.footer-subscribe .widget .mc4wp-form input[type="email"], .footer-subscribe .widget .mc4wp-form input[type="text"] { color: <?php echo get_theme_mod( 'penci_footer_signup_email_text_color' ); ?>; }
		.footer-subscribe input[type="email"]::-webkit-input-placeholder { color: <?php echo get_theme_mod( 'penci_footer_signup_email_text_color' ); ?>; }
		.footer-subscribe input[type="email"]:-moz-placeholder { color: <?php echo get_theme_mod( 'penci_footer_signup_email_text_color' ); ?>; }
		.footer-subscribe input[type="email"]::-moz-placeholder { color: <?php echo get_theme_mod( 'penci_footer_signup_email_text_color' ); ?>; }
		.footer-subscribe input[type="email"]:-ms-input-placeholder {color: <?php echo get_theme_mod( 'penci_footer_signup_email_text_color' ); ?>;}
		.footer-subscribe input[type="email"]::-ms-input-placeholder {color: <?php echo get_theme_mod( 'penci_footer_signup_email_text_color' ); ?>;}
		.footer-subscribe input[type="text"]::-webkit-input-placeholder { color: <?php echo get_theme_mod( 'penci_footer_signup_email_text_color' ); ?>; }
		.footer-subscribe input[type="text"]:-moz-placeholder { color: <?php echo get_theme_mod( 'penci_footer_signup_email_text_color' ); ?>; }
		.footer-subscribe input[type="text"]::-moz-placeholder { color: <?php echo get_theme_mod( 'penci_footer_signup_email_text_color' ); ?>; }
		.footer-subscribe input[type="text"]:-ms-input-placeholder {color: <?php echo get_theme_mod( 'penci_footer_signup_email_text_color' ); ?>;}
		.footer-subscribe input[type="text"]::-ms-input-placeholder {color: <?php echo get_theme_mod( 'penci_footer_signup_email_text_color' ); ?>;}
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_button_bg' ) ): ?>
		.footer-subscribe .widget .mc4wp-form input[type="submit"] { background-color: <?php echo get_theme_mod( 'penci_footer_signup_button_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_button_bg_hover' ) ): ?>
		.footer-subscribe .widget .mc4wp-form input[type="submit"]:hover { background-color: <?php echo get_theme_mod( 'penci_footer_signup_button_bg_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_button_text' ) ): ?>
		.footer-subscribe .widget .mc4wp-form input[type="submit"] { color: <?php echo get_theme_mod( 'penci_footer_signup_button_text' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_signup_button_text_hover' ) ): ?>
		.footer-subscribe .widget .mc4wp-form input[type="submit"]:hover { color: <?php echo get_theme_mod( 'penci_footer_signup_button_text_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_widget_area_bg' ) ): ?>
		#widget-area { background-color: <?php echo get_theme_mod( 'penci_footer_widget_area_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_widget_area_text_color' ) ): ?>
		.footer-widget-wrapper, .footer-widget-wrapper .widget.widget_categories ul li, .footer-widget-wrapper .widget.widget_archive ul li,  .footer-widget-wrapper .widget input[type="text"], .footer-widget-wrapper .widget input[type="email"], .footer-widget-wrapper .widget input[type="date"], .footer-widget-wrapper .widget input[type="number"], .footer-widget-wrapper .widget input[type="search"] { color: <?php echo get_theme_mod( 'penci_footer_widget_area_text_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_widget_area_list_border' ) ): ?>
		.footer-widget-wrapper .widget ul li, .footer-widget-wrapper .widget ul ul, .footer-widget-wrapper .widget input[type="text"], .footer-widget-wrapper .widget input[type="email"], .footer-widget-wrapper .widget input[type="date"], .footer-widget-wrapper .widget input[type="number"],
		.footer-widget-wrapper .widget input[type="search"] { border-color: <?php echo get_theme_mod( 'penci_footer_widget_area_list_border' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_widget_title_center' ) ): ?>
		.footer-widget-wrapper .widget .widget-title { text-align: center; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_widget_color' ) ): ?>
		.footer-widget-wrapper .widget .widget-title { color: <?php echo get_theme_mod( 'penci_footer_widget_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_widget_title_border_color' ) ): ?>
		.footer-widget-wrapper .widget .widget-title .inner-arrow { border-color: <?php echo get_theme_mod( 'penci_footer_widget_title_border_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_widget_title_border_width' ) ): ?>
		.footer-widget-wrapper .widget .widget-title .inner-arrow { border-bottom-width: <?php echo get_theme_mod( 'penci_footer_widget_title_border_width' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_widget_accent_color' ) ): ?>
		.footer-widget-wrapper a, .footer-widget-wrapper .widget ul.side-newsfeed li .side-item .side-item-text h4 a, .footer-widget-wrapper .widget a, .footer-widget-wrapper .widget-social a i, .footer-widget-wrapper .widget-social a span { color: <?php echo get_theme_mod( 'penci_footer_widget_accent_color' ); ?>; }
		.footer-widget-wrapper .widget-social a:hover i{ color: #fff; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_widget_accent_hover_color' ) ): ?>
		.footer-widget-wrapper .penci-tweets-widget-content .icon-tweets, .footer-widget-wrapper .penci-tweets-widget-content .tweet-intents a, .footer-widget-wrapper .penci-tweets-widget-content .tweet-intents span:after, .footer-widget-wrapper .widget ul.side-newsfeed li .side-item
		.side-item-text h4 a:hover, .footer-widget-wrapper .widget a:hover, .footer-widget-wrapper .widget-social a:hover span, .footer-widget-wrapper a:hover, .footer-widget-wrapper .widget-social.remove-circle a:hover i { color: <?php echo get_theme_mod( 'penci_footer_widget_accent_hover_color'
		); ?>; }
		.footer-widget-wrapper .widget .tagcloud a:hover, .footer-widget-wrapper .widget-social a:hover i, .footer-widget-wrapper .mc4wp-form input[type="submit"]:hover, .footer-widget-wrapper .widget input[type="submit"]:hover,.footer-widget-wrapper .penci-user-logged-in .penci-user-action-links a:hover, .footer-widget-wrapper .widget button[type="submit"]:hover { color: #fff; background-color: <?php echo get_theme_mod( 'penci_footer_widget_accent_hover_color' ); ?>; border-color: <?php echo get_theme_mod( 'penci_footer_widget_accent_hover_color' ); ?>; }
		.footer-widget-wrapper .about-widget .about-me-heading:before { border-color: <?php echo get_theme_mod( 'penci_footer_widget_accent_hover_color' ); ?>; }
		.footer-widget-wrapper .penci-tweets-widget-content .tweet-intents-inner:before, .footer-widget-wrapper .penci-tweets-widget-content .tweet-intents-inner:after { background-color: <?php echo get_theme_mod( 'penci_footer_widget_accent_hover_color' ); ?>; }
		.footer-widget-wrapper .penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot.active span, .footer-widget-wrapper .penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot:hover span {  border-color: <?php echo get_theme_mod( 'penci_footer_widget_accent_hover_color' ); ?>;  background: <?php echo get_theme_mod( 'penci_footer_widget_accent_hover_color' ); ?>;  }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_icon_color' ) ): ?>
		ul.footer-socials li a i { color: <?php echo get_theme_mod( 'penci_footer_icon_color' ); ?>; border-color: <?php echo get_theme_mod( 'penci_footer_icon_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_icon_hover_color' ) ): ?>
		ul.footer-socials li a:hover i { background-color: <?php echo get_theme_mod( 'penci_footer_icon_hover_color' ); ?>; border-color: <?php echo get_theme_mod( 'penci_footer_icon_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_icon_hover_icon_color' ) ): ?>
		ul.footer-socials li a:hover i { color: <?php echo get_theme_mod( 'penci_footer_icon_hover_icon_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_social_text_color' ) ): ?>
		ul.footer-socials li a span { color: <?php echo get_theme_mod( 'penci_footer_social_text_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_social_hover_text_color' ) ): ?>
		ul.footer-socials li a:hover span { color: <?php echo get_theme_mod( 'penci_footer_social_hover_text_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_social_border_color' ) ): ?>
		.footer-socials-section { border-color: <?php echo get_theme_mod( 'penci_footer_social_border_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'footer_instagram_border_color' ) ): ?>
		.footer-instagram h4.footer-instagram-title{ border-color: <?php echo get_theme_mod( 'footer_instagram_border_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_instagram_title_color' ) ): ?>
		.footer-instagram h4.footer-instagram-title{ color: <?php echo get_theme_mod( 'penci_footer_instagram_title_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_copyright_bg_color' ) ): ?>
		#footer-section { background-color: <?php echo get_theme_mod( 'penci_footer_copyright_bg_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_menu_color' ) ): ?>
		#footer-section .footer-menu li a { color: <?php echo get_theme_mod( 'penci_footer_menu_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_menu_color_hover' ) ): ?>
		#footer-section .footer-menu li a:hover { color: <?php echo get_theme_mod( 'penci_footer_menu_color_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_copyright_text_color' ) ): ?>
		#footer-section, #footer-copyright * { color: <?php echo get_theme_mod( 'penci_footer_copyright_text_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_go_top_color' ) ): ?>
		#footer-section .go-to-top i, #footer-section .go-to-top-parent span { color: <?php echo get_theme_mod( 'penci_footer_go_top_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_go_top_hover_color' ) ): ?>
		#footer-section .go-to-top:hover span, #footer-section .go-to-top:hover i { color: <?php echo get_theme_mod( 'penci_footer_go_top_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_go_top_float_color' ) ): ?>
		.penci-go-to-top-floating { background-color: <?php echo get_theme_mod( 'penci_footer_go_top_float_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_go_top_float_icon_color' ) ): ?>
		.penci-go-to-top-floating { color: <?php echo get_theme_mod( 'penci_footer_go_top_float_icon_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_copyright_accent_color' ) ): ?>
		#footer-section a { color: <?php echo get_theme_mod( 'penci_footer_copyright_accent_color' ); ?>; }
	<?php endif; ?>
	<?php echo penci_renders_css('.footer-instagram h4.footer-instagram-title > span::before,.footer-instagram.penci-insta-title-overlay h4.footer-instagram-title > span::before,.footer-instagram h4.footer-instagram-title span, .footer-instagram.penci-insta-title-overlay h4.footer-instagram-title > span, .footer-instagram.penci-insta-title-overlay h4.footer-instagram-title > span > span', 'penci_footer_insta_title'); ?>
	<?php if( get_theme_mod( 'penci_buttons_bg' ) ): ?>
	.widget input[type="submit"], .widget button[type="submit"], .contact-form input[type=submit], #respond #submit, .wpcf7 input[type="submit"], .widget_wysija input[type="submit"], div.wpforms-container .wpforms-form.wpforms-form input[type=submit], div.wpforms-container .wpforms-form.wpforms-form button[type=submit], div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button, .mc4wp-form input[type=submit]{ background-color: <?php echo get_theme_mod( 'penci_buttons_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_buttons_color' ) ): ?>
	.widget input[type="submit"], .widget button[type="submit"], .contact-form input[type=submit], #respond #submit, .wpcf7 input[type="submit"], .widget_wysija input[type="submit"], div.wpforms-container .wpforms-form.wpforms-form input[type=submit], div.wpforms-container .wpforms-form.wpforms-form button[type=submit], div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button, .mc4wp-form input[type=submit]{ color: <?php echo get_theme_mod( 'penci_buttons_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_buttons_bghover' ) ): ?>
	.footer-widget-wrapper .widget button[type="submit"]:hover,.footer-widget-wrapper .mc4wp-form input[type="submit"]:hover, .footer-widget-wrapper .widget input[type="submit"]:hover,.widget input[type="submit"]:hover, .widget button[type="submit"]:hover, .contact-form input[type=submit]:hover, #respond #submit:hover, .wpcf7 input[type="submit"]:hover, .widget_wysija input[type="submit"]:hover, div.wpforms-container .wpforms-form.wpforms-form input[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form button[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button:hover, .mc4wp-form input[type=submit]:hover{ background-color: <?php echo get_theme_mod( 'penci_buttons_bghover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_buttons_colorhver' ) ): ?>
	.footer-widget-wrapper .widget button[type="submit"]:hover,.footer-widget-wrapper .mc4wp-form input[type="submit"]:hover, .footer-widget-wrapper .widget input[type="submit"]:hover,.widget input[type="submit"]:hover, .widget button[type="submit"]:hover, .contact-form input[type=submit]:hover, #respond #submit:hover, .wpcf7 input[type="submit"]:hover, .widget_wysija input[type="submit"]:hover, div.wpforms-container .wpforms-form.wpforms-form input[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form button[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button:hover, .mc4wp-form input[type=submit]:hover{ color: <?php echo get_theme_mod( 'penci_buttons_colorhver' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_cat_color' ) ): ?>
		.container-single .penci-standard-cat .cat > a.penci-cat-name { color: <?php echo get_theme_mod( 'penci_single_cat_color' ); ?>; }
		.container-single .penci-standard-cat .cat:before, .container-single .penci-standard-cat .cat:after { background-color: <?php echo get_theme_mod( 'penci_single_cat_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_off_uppercase_post_title' ) ): ?>
		.container-single .single-post-title { text-transform: none; letter-spacing: 1px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_title_font_size' ) ): ?>
		@media only screen and (min-width: 769px){  .container-single .single-post-title { font-size: <?php echo get_theme_mod( 'penci_single_title_font_size' ); ?>px; }  }
	<?php endif; ?>

	<?php if( get_theme_mod( 'penci_dis_jarallax_single_mb' ) ): ?>
		@media only screen and (max-width: 768px){ .single .penci-jarallax {padding-top: 0 !important;} .single .penci-jarallax .jarallax-container-fix{ position: relative !important; } .single .penci-jarallax .jarallax-img{ position: relative !important; width: 100% !important; height: auto !important; margin-top: 0 !important; transform: none !important; } } }
	<?php endif; ?>

	<?php
	if( 'style-3' == $single_style && get_theme_mod( 'psingle_title_size_s3' ) ) {
		echo '@media only screen and (min-width: 768px){  .container-single.penci-single-style-3 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s3' ) . 'px; }  }';
	}elseif( 'style-4' == $single_style && get_theme_mod( 'psingle_title_size_s4' ) ) {
		echo '@media only screen and (min-width: 768px){  .container-single.penci-single-style-4 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s4' ) . 'px; }  }';
	}if( 'style-5' == $single_style && get_theme_mod( 'psingle_title_size_s5' ) ) {
		echo '@media only screen and (min-width: 768px){  .container-single.penci-single-style-5 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s5' ) . 'px; }  }';
	}if( 'style-6' == $single_style && get_theme_mod( 'psingle_title_size_s6' ) ) {
		echo '@media only screen and (min-width: 768px){  .container-single.penci-single-style-6 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s6' ) . 'px; }  }';
	}if( 'style-7' == $single_style && get_theme_mod( 'psingle_title_size_s7' ) ) {
		echo '@media only screen and (min-width: 768px){  .container-single.penci-single-style-7 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s7' ) . 'px; }  }';
	}if( 'style-8' == $single_style && get_theme_mod( 'psingle_title_size_s8' ) ) {
		echo '@media only screen and (min-width: 768px){  .container-single.penci-single-style-8 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s8' ) . 'px; }  }';
	}if( 'style-9' == $single_style && get_theme_mod( 'psingle_title_size_s9' ) ) {
		echo '@media only screen and (min-width: 768px){  .container-single.penci-single-style-9 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s9' ) . 'px; }  }';
	}if( 'style-10' == $single_style && get_theme_mod( 'psingle_title_size_s10' ) ) {
		echo '@media only screen and (min-width: 768px){  .container-single.penci-single-style-10 .single-post-title { font-size: ' . get_theme_mod( 'psingle_title_size_s10' ) . 'px; }  }';
	}
	?>
	<?php if( get_theme_mod( 'penci_single_title_font_msize' ) ): ?>
		@media only screen and (max-width: 768px){ .container-single .single-post-title, .container-single.penci-single-style-3 .single-post-title, .container-single.penci-single-style-4 .single-post-title, .container-single.penci-single-style-5 .single-post-title, .container-single.penci-single-style-6 .single-post-title, .container-single.penci-single-style-7 .single-post-title, .container-single.penci-single-style-8 .single-post-title, .container-single.penci-single-style-9 .single-post-title, .container-single.penci-single-style-10 .single-post-title{ font-size: <?php echo get_theme_mod( 'penci_single_title_font_msize' ); ?>px; }  }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_disable_default_fonts' ) && get_theme_mod( 'penci_disable_all_fonts' ) ): ?>
	.post-entry blockquote:before, .wpb_text_column blockquote:before, .woocommerce .page-description blockquote:before, .woocommerce div.product .entry-summary div[itemprop="description"] blockquote:before, .woocommerce div.product .woocommerce-tabs #tab-description blockquote:before, .woocommerce-product-details__short-description blockquote:before, .format-post-box .post-format-icon i.fa-quote-left:before { font-family: 'FontAwesome'; content: '\f10d'; font-size: 30px; left: 2px; top: 0px; font-weight: normal; }
	.penci-fawesome-ver5 .post-entry blockquote:before, .penci-fawesome-ver5 .wpb_text_column blockquote:before, .penci-fawesome-ver5 .woocommerce .page-description blockquote:before, .penci-fawesome-ver5 .woocommerce div.product .entry-summary div[itemprop="description"] blockquote:before, .penci-fawesome-ver5 .woocommerce div.product .woocommerce-tabs #tab-description blockquote:before, .penci-fawesome-ver5 .woocommerce-product-details__short-description blockquote:before, .penci-fawesome-ver5 .format-post-box .post-format-icon i.fa-quote-left:before{ font-family: 'Font Awesome 5 Free'; font-weight: 900; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_title_h1_size' ) ): ?>
		.post-entry h1, .wpb_text_column h1, .elementor-text-editor h1, .woocommerce .page-description h1 { font-size: <?php echo get_theme_mod( 'penci_single_title_h1_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_title_h2_size' ) ): ?>
		.post-entry h2, .wpb_text_column h2, .elementor-text-editor h2, .woocommerce .page-description h2 { font-size: <?php echo get_theme_mod( 'penci_single_title_h2_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_title_h3_size' ) ): ?>
		.post-entry h3, .wpb_text_column h3, .elementor-text-editor h3, .woocommerce .page-description h3 { font-size: <?php echo get_theme_mod( 'penci_single_title_h3_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_title_h4_size' ) ): ?>
		.post-entry h4, .wpb_text_column h4, .elementor-text-editor h4, .woocommerce .page-description h4 { font-size: <?php echo get_theme_mod( 'penci_single_title_h4_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_title_h5_size' ) ): ?>
		.post-entry h5, .wpb_text_column h5, .elementor-text-editor h5, .woocommerce .page-description h5 { font-size: <?php echo get_theme_mod( 'penci_single_title_h5_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_title_h6_size' ) ): ?>
		.post-entry h6, .wpb_text_column h6, .elementor-text-editor h6, .woocommerce .page-description h6{ font-size: <?php echo get_theme_mod( 'penci_single_title_h6_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_title_p_size' ) ): ?>
		.post-entry, .post-entry p, .wpb_text_column p, .woocommerce .page-description p { font-size: <?php echo get_theme_mod( 'penci_single_title_p_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_blockquote_fsize' ) ): ?>
		.post-entry blockquote.wp-block-quote p, .wpb_text_column blockquote.wp-block-quote p, .post-entry blockquote, .post-entry blockquote p, .wpb_text_column blockquote, .wpb_text_column blockquote p, .woocommerce .page-description blockquote, .woocommerce .page-description blockquote p{ font-size: <?php echo get_theme_mod( 'penci_single_blockquote_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_blockquoteauthor_fsize' ) ): ?>
		.post-entry blockquote cite, .post-entry blockquote .author, .wpb_text_column blockquote cite, .wpb_text_column blockquote .author, .woocommerce .page-description blockquote cite, .woocommerce .page-description blockquote .author, .post-entry blockquote.wp-block-quote cite, .wpb_text_column blockquote.wp-block-quote cite{ font-size: <?php echo get_theme_mod( 'penci_single_blockquoteauthor_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_cat_font_size' ) ): ?>
		.container-single .penci-standard-cat .cat > a.penci-cat-name{ font-size: <?php echo get_theme_mod( 'penci_single_cat_font_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_meta_font_size' ) ): ?>
		.post-box-meta-single, .tags-share-box .single-comment-o{ font-size: <?php echo get_theme_mod( 'penci_single_meta_font_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_tags_font_size' ) ): ?>
		.container-single .post-entry .post-tags a{ font-size: <?php echo get_theme_mod( 'penci_single_tags_font_size' ); ?>px !important; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_share_box_fsize' ) ): ?>
		.post-share a, .post-share .count-number-like, .tags-share-box.tags-share-box-2_3 .penci-social-share-text{ font-size: <?php echo get_theme_mod( 'penci_single_share_box_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_authorbio_name_fsize' ) ): ?>
		.author-content h5{ font-size: <?php echo get_theme_mod( 'penci_authorbio_name_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_authorbio_desc_fsize' ) ): ?>
		.author-content p, .author-content{ font-size: <?php echo get_theme_mod( 'penci_authorbio_desc_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_authorbio_social_fsize' ) ): ?>
		.author-content .author-social{ font-size: <?php echo get_theme_mod( 'penci_authorbio_social_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_prevnextpost_fsize' ) ): ?>
		.post-pagination span{ font-size: <?php echo get_theme_mod( 'penci_prevnextpost_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_prevnextpost_title_fsize' ) ): ?>
		.post-pagination h5{ font-size: <?php echo get_theme_mod( 'penci_prevnextpost_title_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltcomment_heading_fsize' ) ): ?>
		#respond h3.comment-reply-title span, .post-box-title{ font-size: <?php echo get_theme_mod( 'penci_rltcomment_heading_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltcomment_post_title_fsize' ) ): ?>
		.post-related .item-related h3 a{ font-size: <?php echo get_theme_mod( 'penci_rltcomment_post_title_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltcomment_post_date_fsize' ) ): ?>
		.post-related .item-related span.date{ font-size: <?php echo get_theme_mod( 'penci_rltcomment_post_date_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltcomment_cmauthor_fsize' ) ): ?>
		.thecomment .comment-text span.author, .thecomment .comment-text span.author a{ font-size: <?php echo get_theme_mod( 'penci_rltcomment_cmauthor_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltcomment_cmdate_fsize' ) ): ?>
		.thecomment .comment-text span.date{ font-size: <?php echo get_theme_mod( 'penci_rltcomment_cmdate_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltcomment_cmcontent_fsize' ) ): ?>
		.thecomment .comment-content, .thecomment .comment-content p{ font-size: <?php echo get_theme_mod( 'penci_rltcomment_cmcontent_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltcomment_cmreplyedit_fsize' ) ): ?>
		.post-comments span.reply a{ font-size: <?php echo get_theme_mod( 'penci_rltcomment_cmreplyedit_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltcomment_input_fsize' ) ): ?>
		#respond input, #respond textarea{ font-size: <?php echo get_theme_mod( 'penci_rltcomment_input_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltcomment_submit_fsize' ) ): ?>
		#respond #submit{ font-size: <?php echo get_theme_mod( 'penci_rltcomment_submit_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltcomment_gdrp_fsize' ) ): ?>
		form#commentform > .comment-form-cookies-consent, form#commentform > div.penci-gdpr-message{ font-size: <?php echo get_theme_mod( 'penci_rltcomment_gdrp_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpopup_heading_fsize' ) ): ?>
		.penci-rlt-popup .rtlpopup-heading{ font-size: <?php echo get_theme_mod( 'penci_rltpopup_heading_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpopup_title_fsize' ) ): ?>
		.penci-rlt-popup .rltpopup-meta .rltpopup-title{ font-size: <?php echo get_theme_mod( 'penci_rltpopup_title_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpopup_date_fsize' ) ): ?>
		.penci-rlt-popup .rltpopup-meta .date{ font-size: <?php echo get_theme_mod( 'penci_rltpopup_date_fsize' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_off_letter_space_post_title' ) ): ?>
		.container-single .single-post-title { letter-spacing: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_on_uppercase_post_cat' ) ): ?>
		.container-single .cat a.penci-cat-name { text-transform: uppercase; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_grid_remove_line' ) ): ?>
		.list-post .header-list-style:after, .grid-header-box:after, .penci-overlay-over .overlay-header-box:after, .home-featured-cat-content .first-post .magcat-detail .mag-header:after { content: none; }
		.list-post .header-list-style, .grid-header-box, .penci-overlay-over .overlay-header-box, .home-featured-cat-content .first-post .magcat-detail .mag-header{ padding-bottom: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_standard_remove_line' ) ): ?>
		.header-standard:after { content: none; }
		.header-standard { padding-bottom: 0; }
	<?php endif; ?>
	<?php
	if( get_theme_mod( 'penci_align_left_post_title' ) ): ?>
		.penci-single-style-6 .single-breadcrumb, .penci-single-style-5 .single-breadcrumb, .penci-single-style-4 .single-breadcrumb, .penci-single-style-3 .single-breadcrumb, .penci-single-style-9 .single-breadcrumb, .penci-single-style-7 .single-breadcrumb{ text-align: left; }
		.container-single .header-standard, .container-single .post-box-meta-single { text-align: left; }
		.rtl .container-single .header-standard,.rtl .container-single .post-box-meta-single { text-align: right; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_off_uppercase_post_title_nav' ) ): ?>
		.container-single .post-pagination h5 { text-transform: none; letter-spacing: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_post_remove_lines_related' ) ): ?>
		#respond h3.comment-reply-title span:before, #respond h3.comment-reply-title span:after, .post-box-title:before, .post-box-title:after { content: none; display: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_off_uppercase_post_title_related' ) ): ?>
		.container-single .item-related h3 a { text-transform: none; letter-spacing: 0; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_title_color' ) ): ?>
		.container-single .header-standard .post-title { color: <?php echo get_theme_mod( 'penci_single_title_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_tag_color' ) ): ?>
		.container-single .post-entry .post-tags a{ color: <?php echo get_theme_mod( 'penci_single_tag_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_tag_border' ) ): ?>
		.container-single .post-entry .post-tags a{ border-color: <?php echo get_theme_mod( 'penci_single_tag_border' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_tag_bg' ) ): ?>
		.container-single .post-entry .post-tags a{ background-color: <?php echo get_theme_mod( 'penci_single_tag_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_tag_hcolor' ) ): ?>
		.container-single .post-entry .post-tags a:hover{ color: <?php echo get_theme_mod( 'penci_single_tag_hcolor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_tag_hborder' ) ): ?>
		.container-single .post-entry .post-tags a:hover{ border-color: <?php echo get_theme_mod( 'penci_single_tag_hborder' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_tag_hbg' ) ): ?>
		.container-single .post-entry .post-tags a:hover{ background-color: <?php echo get_theme_mod( 'penci_single_tag_hbg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_share_tcolor' ) ): ?>
		.tags-share-box.tags-share-box-2_3 .penci-social-share-text{ color: <?php echo get_theme_mod( 'penci_single_share_tcolor' ); ?>; }
	<?php endif; ?>
	<?php
	if( get_theme_mod( 'penci_single_share_icon_color' ) ): ?>
		.tags-share-box.tags-share-box-2_3 .post-share .count-number-like, .tags-share-box.tags-share-box-2_3 .post-share a,
		.container-single .post-share a, .page-share .post-share a { color: <?php echo get_theme_mod( 'penci_single_share_icon_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_share_icon_hover_color' ) ): ?>
		.container-single .post-share a:hover, .container-single .post-share a.liked, .page-share .post-share a:hover { color: <?php echo get_theme_mod( 'penci_single_share_icon_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_number_like_color' ) ): ?>
		.tags-share-box.tags-share-box-2_3 .post-share .count-number-like,
		.post-share .count-number-like { color: <?php echo get_theme_mod( 'penci_single_number_like_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_share_icon_style3_bgcolor' ) ): ?>
		.tags-share-box.tags-share-box-s3 .post-share .post-share-item{ background-color: <?php echo get_theme_mod( 'penci_single_share_icon_style3_bgcolor' ); ?>; }
	<?php endif; ?>

	<?php if( get_theme_mod( 'penci_single_share_icon_style3_hbgcolor' ) ): ?>
		.tags-share-box.tags-share-box-s3 .post-share .post-share-item:hover{ background-color: <?php echo get_theme_mod( 'penci_single_share_icon_style3_hbgcolor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_meta_color' ) ): ?>
		.tags-share-box .single-comment-o, .post-box-meta-single span, .header-standard .post-box-meta-single .author-post span, .header-standard .post-box-meta-single .author-post span a{ color: <?php echo get_theme_mod( 'penci_single_meta_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_accent_color' ) ): ?>
		.comment-content a, .container-single .post-entry a, .container-single .format-post-box .dt-special a:hover, .container-single .author-quote span, .container-single .author-post span a:hover, .post-entry blockquote:before, .post-entry blockquote cite, .post-entry blockquote .author, .wpb_text_column blockquote:before, .wpb_text_column blockquote cite, .wpb_text_column blockquote .author, .post-pagination a:hover, .author-content h5 a:hover, .author-content .author-social:hover, .item-related h3 a:hover, .container-single .format-post-box .post-format-icon i, .container.penci-breadcrumb.single-breadcrumb span a:hover, .penci_list_shortcode li:before, .penci-dropcap-box-outline, .penci-dropcap-circle-outline, .penci-dropcap-regular, .penci-dropcap-bold, .header-standard .post-box-meta-single .author-post span a:hover{ color: <?php echo get_theme_mod( 'penci_single_accent_color' ); ?>; }
		.container-single .standard-content-special .format-post-box, ul.slick-dots li button:hover, ul.slick-dots li.slick-active button, .penci-dropcap-box-outline, .penci-dropcap-circle-outline { border-color: <?php echo get_theme_mod( 'penci_single_accent_color' ); ?>; }
		ul.slick-dots li button:hover, ul.slick-dots li.slick-active button, #respond h3.comment-reply-title span:before, #respond h3.comment-reply-title span:after, .post-box-title:before, .post-box-title:after, .container-single .author-quote span:before, .container-single .author-quote
		span:after, .post-entry blockquote .author span:after, .post-entry blockquote .author span:before, .post-entry ul li:before, #respond #submit:hover,
		div.wpforms-container .wpforms-form.wpforms-form input[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form button[type=submit]:hover, div.wpforms-container .wpforms-form.wpforms-form .wpforms-page-button:hover,
		.wpcf7 input[type="submit"]:hover, .widget_wysija input[type="submit"]:hover, .post-entry.blockquote-style-2 blockquote:before,.tags-share-box.tags-share-box-s2 .post-share-plike, .penci-dropcap-box, .penci-dropcap-circle {  background-color: <?php echo get_theme_mod( 'penci_single_accent_color' ); ?>; }
		.container-single .post-entry .post-tags a:hover { color: #fff; border-color: <?php echo get_theme_mod( 'penci_single_accent_color' ); ?>; background-color: <?php echo get_theme_mod( 'penci_single_accent_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_breadcrumbs_hcolor' ) ): ?>
		.container.penci-breadcrumb.single-breadcrumb span a:hover, .penci-container-inside.penci-breadcrumb span a:hover, .container.penci-breadcrumb span a:hover{ color: <?php echo get_theme_mod( 'penci_breadcrumbs_hcolor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_smaller_width' ) ): ?>
		.penci-single-smaller-width { max-width: <?php echo get_theme_mod( 'penci_single_smaller_width' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_color_text' ) ): ?>
		.post-entry, .post-entry p{ color: <?php echo get_theme_mod( 'penci_single_color_text' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_single_color_links' ) ): ?>
		.post-entry a, .container-single .post-entry a{ color: <?php echo get_theme_mod( 'penci_single_color_links' ); ?>; }
	<?php endif; ?>
	<?php for ( $pheading = 1; $pheading < 7; $pheading++ ) { ?>
	<?php if( get_theme_mod( 'penci_single_color_h' . $pheading ) ): ?>
		.post-entry h<?php echo $pheading; ?>{ color: <?php echo get_theme_mod( 'penci_single_color_h' . $pheading ); ?>; }
	<?php endif; ?>
	<?php } ?>
	<?php if( get_theme_mod( 'penci_single_bgcolor_header' ) ): ?>
		.penci-single-style-9 .penci-post-image-wrapper,.penci-single-style-10 .penci-post-image-wrapper { background-color: <?php echo get_theme_mod( 'penci_single_bgcolor_header' ); ?>; }
	<?php endif; ?>
	<?php
	// Color single
	if( ! get_theme_mod( 'penci_move_title_bellow' ) ){
		$single_color_title = get_theme_mod( 'penci_single_color_title_s568' );
		$single_color_cat   = get_theme_mod( 'penci_single_color_cat_s568' );
		$single_color_meta  = get_theme_mod( 'penci_single_color_meta_s568' );

		if( $single_color_title && in_array(  $single_style, array( 'style-5','style-6','style-8' )) ){
			echo '@media only screen and (min-width: 768px){ .container-single.penci-single-' . $single_style . ' .single-header .post-title { color: ' . esc_attr( $single_color_title ) . '; } }';
		}
		if( $single_color_cat && in_array(  $single_style, array( 'style-5','style-6','style-8' )) ){
			echo '@media only screen and (min-width: 768px){ .container-single.penci-single-' . $single_style . ' .penci-single-cat .cat > a.penci-cat-name { color: ' . esc_attr( $single_color_cat ) . '; } }';
		}
		if( $single_color_meta && in_array(  $single_style, array( 'style-5','style-6','style-8' )) ){

			echo '@media only screen and (min-width: 768px){';
			echo '.penci-single-' . $single_style . '.penci-header-text-white .post-box-meta-single span,';
			echo '.penci-single-' . $single_style . '.penci-header-text-white .header-standard .author-post span a{ color: ' . esc_attr( $single_color_meta ) . '; }';
			echo '}';

			if( get_theme_mod( 'penci_single_accent_color' ) ){
				echo '.penci-single-' . $single_style . '.penci-header-text-white .header-standard .author-post span a:hover{ color: ' . get_theme_mod( 'penci_single_accent_color' ) . '; }';
			}
		}
	}

	if( 'style-10' == $single_style ){
		if( get_theme_mod( 'penci_single_color_bread_s10' ) ){
			echo '.penci-single-style-10 .penci-container-inside.penci-breadcrumb i,.penci-single-style-10  .container.penci-breadcrumb i,
				.penci-single-style-10 .penci-container-inside.penci-breadcrumb a,';
			echo '.penci-single-style-10 .penci-container-inside.penci-breadcrumb span{ color: ' . get_theme_mod( 'penci_single_color_bread_s10' ) . ' }';
		}

		if( get_theme_mod( 'penci_single_color_title_s10' ) ){
			echo '.penci-single-style-10.penci-header-text-white .header-standard .post-title,';
			echo '.penci-single-style-10.penci-header-text-white .header-standard h2 a';
			echo '{ color: ' . get_theme_mod( 'penci_single_color_title_s10' ) . ' }';
		}

		if( get_theme_mod( 'penci_single_color_cat_s10' ) ){
			echo '.penci-single-style-10.penci-header-text-white .penci-standard-cat  .cat > a.penci-cat-name { color: ' . get_theme_mod( 'penci_single_color_cat_s10' ) . '; }';
		}

		if( get_theme_mod( 'penci_single_color_meta_s10' ) ){
			echo '.penci-single-style-10.penci-header-text-white .post-box-meta-single span,';
			echo '.penci-single-style-10.penci-header-text-white .header-standard .author-post span a';
			echo '{ color: ' . get_theme_mod( 'penci_single_color_meta_s10' ) . ' }';

			if( get_theme_mod( 'penci_single_accent_color' ) ){
				echo '.penci-single-style-10.penci-header-text-white .header-standard .author-post span a:hover{ color: ' . get_theme_mod( 'penci_single_accent_color' ) . '; }';
			}
		}
	}

	$bquote_text_color   = get_theme_mod( 'penci_bquote_text_color' );
	$bquote_author_color = get_theme_mod( 'penci_bquote_author_color' );
	$bquote_bgcolor      = get_theme_mod( 'penci_bquote_bgcolor' );
	$bquote_border_color = get_theme_mod( 'penci_bquote_border_color' );

	if( $bquote_text_color ) {
		echo '.post-entry blockquote, .post-entry blockquote p, .wpb_text_column blockquote, .wpb_text_column blockquote p{ color: ' . $bquote_text_color . ' }';
	}
	if( $bquote_author_color ){
		echo '.post-entry blockquote cite, .post-entry blockquote .author, .wpb_text_column blockquote cite, .wpb_text_column blockquote .author, .woocommerce .page-description blockquote cite, .woocommerce .page-description blockquote .author{ color: ' . esc_attr( $bquote_author_color ) . ' }';
		echo '.post-entry blockquote .author span:after, .wpb_text_column blockquote .author span:after, .woocommerce .page-description blockquote .author span:after{ background-color: ' . esc_attr( $bquote_author_color ) . ' }';
	}
	if( $bquote_bgcolor ){
		echo '.post-entry.blockquote-style-2 blockquote{ background-color: ' . esc_attr( $bquote_bgcolor ) . ' }';
	}
	if( $bquote_border_color ){
		echo '.post-entry.blockquote-style-2 blockquote:before{ background-color: ' . esc_attr( $bquote_border_color ) . '  }';
		echo '.post-entry blockquote::before, .wpb_text_column blockquote::before, .woocommerce .page-description blockquote:before{ color: ' . esc_attr( $bquote_border_color ) . '  }';
	}
	?>
	<?php if( get_theme_mod( 'penci_rltpopup_hide_mobile' ) ): ?>
		@media only screen and (max-width: 479px) { .penci-rlt-popup{ display: none !important; } }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpopup_padding_bottom' ) ): ?>
		.penci-rlt-popup .penci-rtlpopup-content{ padding-bottom: <?php echo get_theme_mod( 'penci_rltpopup_padding_bottom' ); ?>px; }
		@media only screen and (max-width: 479px){ .penci-rlt-popup .penci-rtlpopup-content{ padding-bottom: <?php echo get_theme_mod( 'penci_rltpopup_padding_bottom' ); ?>px; } }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpop_heading_bg' ) ): ?>
		.penci-rlt-popup .rtlpopup-heading{ background-color: <?php echo get_theme_mod( 'penci_rltpop_heading_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpop_heading_color' ) ): ?>
		.penci-rlt-popup .rtlpopup-heading{ color: <?php echo get_theme_mod( 'penci_rltpop_heading_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpop_close_color' ) ): ?>
		.penci-rlt-popup .penci-close-rltpopup{ color: <?php echo get_theme_mod( 'penci_rltpop_close_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpop_bg_color' ) ): ?>
		.penci-rlt-popup{ background-color: <?php echo get_theme_mod( 'penci_rltpop_bg_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpop_title_color' ) ): ?>
		.penci-rlt-popup .rltpopup-meta .rltpopup-title{ color: <?php echo get_theme_mod( 'penci_rltpop_title_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpop_title_hover' ) ): ?>
		.penci-rlt-popup .rltpopup-meta .rltpopup-title:hover{ color: <?php echo get_theme_mod( 'penci_rltpop_title_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpop_date_color' ) ): ?>
		.penci-rlt-popup .rltpopup-meta .date{ color: <?php echo get_theme_mod( 'penci_rltpop_date_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_rltpop_border_color' ) ): ?>
		.penci-rlt-popup .rltpopup-item{ border-color: <?php echo get_theme_mod( 'penci_rltpop_border_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_authorbio_name_color' ) ): ?>
		.author-content h5 a{ color: <?php echo get_theme_mod( 'penci_authorbio_name_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_authorbio_name_hcolor' ) ): ?>
		.author-content h5 a:hover{ color: <?php echo get_theme_mod( 'penci_authorbio_name_hcolor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_authorbio_desc_color' ) ): ?>
		.author-content p{ color: <?php echo get_theme_mod( 'penci_authorbio_desc_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_authorbio_social_color' ) ): ?>
		.author-content .author-social{ color: <?php echo get_theme_mod( 'penci_authorbio_social_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_authorbio_social_hcolor' ) ): ?>
		.author-content .author-social:hover{ color: <?php echo get_theme_mod( 'penci_authorbio_social_hcolor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_prevnext_colors' ) ): ?>
		.post-pagination span{ color: <?php echo get_theme_mod( 'penci_prevnext_colors' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_prevnext_ctitle' ) ): ?>
		.post-pagination a{ color: <?php echo get_theme_mod( 'penci_prevnext_ctitle' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_prevnext_hctitle' ) ): ?>
		.post-pagination a:hover{ color: <?php echo get_theme_mod( 'penci_prevnext_hctitle' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_heading' ) ): ?>
		#respond h3.comment-reply-title span, .post-box-title{ color: <?php echo get_theme_mod( 'penci_relatedcm_heading' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_lineheading' ) ): ?>
		#respond h3.comment-reply-title span:before, #respond h3.comment-reply-title span:after, .post-box-title:before, .post-box-title:after{ background-color: <?php echo get_theme_mod( 'penci_relatedcm_lineheading' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_ctitle' ) ): ?>
		.item-related h3 a{ color: <?php echo get_theme_mod( 'penci_relatedcm_ctitle' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_hctitle' ) ): ?>
		.item-related h3 a:hover{ color: <?php echo get_theme_mod( 'penci_relatedcm_hctitle' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_cdate' ) ): ?>
		.item-related span.date{ color: <?php echo get_theme_mod( 'penci_relatedcm_cdate' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_author' ) ): ?>
		.thecomment .comment-text span.author, .thecomment .comment-text span.author a{ color: <?php echo get_theme_mod( 'penci_relatedcm_author' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_hauthor' ) ): ?>
		.thecomment .comment-text span.author a:hover{ color: <?php echo get_theme_mod( 'penci_relatedcm_hauthor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_cmdate' ) ): ?>
		.thecomment .comment-text span.date{ color: <?php echo get_theme_mod( 'penci_relatedcm_cmdate' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_replyedit' ) ): ?>
		.post-comments span.reply a, .post-comments span.reply a:hover{ color: <?php echo get_theme_mod( 'penci_relatedcm_replyedit' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_cmcontent' ) ): ?>
		.thecomment .comment-content, .thecomment .comment-content p{ color: <?php echo get_theme_mod( 'penci_relatedcm_cmcontent' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_cminput' ) ): ?>
		#respond input[type="text"], #respond input[type="email"], #respond textarea{ color: <?php echo get_theme_mod( 'penci_relatedcm_cminput' ); ?>; } #respond input[type="text"]::placeholder{ color: <?php echo get_theme_mod( 'penci_relatedcm_cminput' ); ?>; opacity: 1; } #respond input[type="text"]:-ms-input-placeholder{ color: <?php echo get_theme_mod( 'penci_relatedcm_cminput' ); ?>; } #respond input[type="text"]::-ms-input-placeholder{ color: <?php echo get_theme_mod( 'penci_relatedcm_cminput' ); ?>; } #respond input[type="email"]::placeholder{ color: <?php echo get_theme_mod( 'penci_relatedcm_cminput' ); ?>; opacity: 1; } #respond input[type="email"]:-ms-input-placeholder{ color: <?php echo get_theme_mod( 'penci_relatedcm_cminput' ); ?>; } #respond input[type="email"]::-ms-input-placeholder{ color: <?php echo get_theme_mod( 'penci_relatedcm_cminput' ); ?>; } #respond textarea::placeholder{ color: <?php echo get_theme_mod( 'penci_relatedcm_cminput' ); ?>; opacity: 1; } #respond textarea:-ms-input-placeholder{ color: <?php echo get_theme_mod( 'penci_relatedcm_cminput' ); ?>; } #respond textarea::-ms-input-placeholder{ color: <?php echo get_theme_mod( 'penci_relatedcm_cminput' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_relatedcm_gdpr' ) ): ?>
		form#commentform > .comment-form-cookies-consent, form#commentform > div.penci-gdpr-message{ color: <?php echo get_theme_mod( 'penci_relatedcm_gdpr' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_footer_insta_hide_icon' ) ): ?>
		.footer-instagram-html h4.footer-instagram-title>span:before{ content: none; display: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_top_insta_hide_icon' ) ): ?>
		.penci-top-instagram h4.footer-instagram-title>span:before{ content: none; display: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_boxes_overlay' ) ): ?>
		ul.homepage-featured-boxes .penci-fea-in h4 span span, ul.homepage-featured-boxes .penci-fea-in h4 span, ul.homepage-featured-boxes .penci-fea-in.boxes-style-2 h4 { background-color: <?php echo get_theme_mod( 'penci_home_boxes_overlay' ); ?>; }
		ul.homepage-featured-boxes li .penci-fea-in:before, ul.homepage-featured-boxes li .penci-fea-in:after, ul.homepage-featured-boxes .penci-fea-in h4 span span:before, ul.homepage-featured-boxes .penci-fea-in h4 > span:before, ul.homepage-featured-boxes .penci-fea-in h4 > span:after, ul.homepage-featured-boxes .penci-fea-in.boxes-style-2 h4:before { border-color: <?php echo get_theme_mod( 'penci_home_boxes_overlay' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_boxes_title_color' ) ): ?>
		ul.homepage-featured-boxes .penci-fea-in h4 span span { color: <?php echo get_theme_mod( 'penci_home_boxes_title_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_boxes_accent_hover_color' ) ): ?>
		ul.homepage-featured-boxes .penci-fea-in:hover h4 span { color: <?php echo get_theme_mod( 'penci_home_boxes_accent_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_popular_label_color' ) ): ?>
		.home-pupular-posts-title { color: <?php echo get_theme_mod( 'penci_home_popular_label_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_popular_border_color' ) ): ?>
		.penci-home-popular-posts { border-color: <?php echo get_theme_mod( 'penci_home_popular_border_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_popular_post_title_color' ) ): ?>
		.penci-home-popular-post .item-related h3 a { color: <?php echo get_theme_mod( 'penci_home_popular_post_title_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_popular_post_title_hover_color' ) ): ?>
		.penci-home-popular-post .item-related h3 a:hover { color: <?php echo get_theme_mod( 'penci_home_popular_post_title_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_popular_post_date_color' ) ): ?>
		.penci-home-popular-post .item-related span.date { color: <?php echo get_theme_mod( 'penci_home_popular_post_date_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_title_box_bg' ) ): ?>
		.penci-homepage-title.style-14 .inner-arrow:before,
		.penci-homepage-title.style-11 .inner-arrow,
		.penci-homepage-title.style-12 .inner-arrow,
		.penci-homepage-title.style-13 .inner-arrow,
		.penci-homepage-title .inner-arrow{ background-color: <?php echo get_theme_mod( 'penci_home_title_box_bg' ); ?>; }
		.penci-border-arrow.penci-homepage-title.style-2:after{ border-top-color: <?php echo get_theme_mod( 'penci_home_title_box_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_title_box_outer_bg' ) ): ?>
		.penci-border-arrow.penci-homepage-title:after { background-color: <?php echo get_theme_mod( 'penci_home_title_box_outer_bg' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_title_box_border_color' ) ): ?>
		.penci-border-arrow.penci-homepage-title .inner-arrow, .penci-homepage-title.style-4 .inner-arrow:before, .penci-homepage-title.style-4 .inner-arrow:after, .penci-homepage-title.style-7, .penci-homepage-title.style-9 { border-color: <?php echo get_theme_mod( 'penci_home_title_box_border_color' ); ?>; }
		.penci-border-arrow.penci-homepage-title:before { border-top-color: <?php echo get_theme_mod( 'penci_home_title_box_border_color' ); ?>; }
		.penci-homepage-title.style-5, .penci-homepage-title.style-7{ border-color: <?php echo get_theme_mod( 'penci_home_title_box_border_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_title_box_border_bottom5' ) ): ?>
		.penci-homepage-title.style-10, .penci-homepage-title.style-12,
		.penci-border-arrow.penci-homepage-title.style-5 .inner-arrow{ border-bottom-color: <?php echo get_theme_mod( 'penci_home_title_box_border_bottom5' ); ?>; }
		.penci-homepage-title.style-5{ border-color: <?php echo get_theme_mod( 'penci_home_title_box_border_bottom5' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_title_box_border_bottom7' ) ): ?>
		.penci-homepage-title.style-7 .inner-arrow:before, .penci-homepage-title.style-9 .inner-arrow:before{ background-color: <?php echo get_theme_mod( 'penci_home_title_box_border_bottom7' ); ?>; }
	<?php endif; ?>

	<?php if( get_theme_mod( 'penci_home_title_box_border_top10' ) ): ?>
		.penci-homepage-title.style-10{ border-top-color: <?php echo get_theme_mod( 'penci_home_title_box_border_top10' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_title_box_shapes_color' ) ): ?>
		.penci-homepage-title.style-13.pcalign-center .inner-arrow:before,
		.penci-homepage-title.style-13.pcalign-right .inner-arrow:before{ border-left-color: <?php echo get_theme_mod( 'penci_home_title_box_shapes_color' ); ?>; }
		.penci-homepage-title.style-13.pcalign-center .inner-arrow:after,
		.penci-homepage-title.style-13.pcalign-left .inner-arrow:after{ border-right-color: <?php echo get_theme_mod( 'penci_home_title_box_shapes_color' ); ?>; }

		.penci-homepage-title.style-12 .inner-arrow:before,
		.penci-homepage-title.style-12.pcalign-center .inner-arrow:after,
		.penci-homepage-title.style-12.pcalign-right .inner-arrow:after{ border-bottom-color: <?php echo get_theme_mod( 'penci_home_title_box_shapes_color' ); ?>; }
		.penci-homepage-title.style-11 .inner-arrow:after,
		.penci-homepage-title.style-11 .inner-arrow:before{ border-top-color: <?php echo get_theme_mod( 'penci_home_title_box_shapes_color' ); ?>; }
	<?php endif; ?>

	<?php if( get_theme_mod( 'penci_home_title_box_border_inner_color' ) ): ?>
		.penci-border-arrow.penci-homepage-title:after { border-color: <?php echo get_theme_mod( 'penci_home_title_box_border_inner_color' ); ?>; }

	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_title_box_text_color' ) ): ?>
		.penci-homepage-title .inner-arrow, .penci-homepage-title.penci-magazine-title .inner-arrow a { color: <?php echo get_theme_mod( 'penci_home_title_box_text_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_remove_border_outer' ) ): ?>
		.penci-homepage-title:after { content: none; display: none; }
		.penci-homepage-title { margin-left: 0; margin-right: 0; margin-top: 0; }
		.penci-homepage-title:before { bottom: -6px; border-width: 6px; margin-left: -6px; }
		.rtl .penci-homepage-title:before { bottom: -6px; border-width: 6px; margin-right: -6px; margin-left: 0; }
		.penci-homepage-title.penci-magazine-title:before{ left: 25px; }
		.rtl .penci-homepage-title.penci-magazine-title:before{ right: 25px; left:auto; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_remove_arrow_down' ) ): ?>
		.penci-homepage-title:before, .penci-border-arrow.penci-homepage-title.style-2:after { content: none; display: none; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_featured_title_color' ) ): ?>
		.home-featured-cat-content .magcat-detail h3 a { color: <?php echo get_theme_mod( 'penci_home_featured_title_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_featured_title_hover_color' ) ): ?>
		.home-featured-cat-content .magcat-detail h3 a:hover { color: <?php echo get_theme_mod( 'penci_home_featured_title_hover_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_featured_meta_color' ) ): ?>
		.home-featured-cat-content .grid-post-box-meta span{ color: <?php echo get_theme_mod( 'penci_home_featured_meta_color' );?> }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_featured3_meta_color' ) ): ?>
		.home-featured-cat-content .mag-photo .grid-post-box-meta span, .home-featured-cat-content .mag-photo .grid-post-box-meta span a, .home-featured-cat-content .penci-single-mag-slider .grid-post-box-meta span, .home-featured-cat-content .penci-single-mag-slider .grid-post-box-meta span a, .home-featured-cat-content.style-14 .mag-meta, .home-featured-cat-content.style-14 .mag-meta span a { color: <?php echo get_theme_mod( 'penci_home_featured3_meta_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_featured_metalink_color' ) ): ?>
		.home-featured-cat-content .grid-post-box-meta span a{ color: <?php echo get_theme_mod( 'penci_home_featured_metalink_color' );?> }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_featured_accent_color' ) ): ?>
		.home-featured-cat-content .grid-post-box-meta span a:hover { color: <?php echo get_theme_mod( 'penci_home_featured_accent_color' ); ?>; }
		.home-featured-cat-content .first-post .magcat-detail .mag-header:after { background: <?php echo get_theme_mod( 'penci_home_featured_accent_color' ); ?>; }
		.penci-slider ol.penci-control-nav li a.penci-active, .penci-slider ol.penci-control-nav li a:hover { border-color: <?php echo get_theme_mod( 'penci_home_featured_accent_color' ); ?>; background: <?php echo get_theme_mod( 'penci_home_featured_accent_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_featured_viewall_color' ) ): ?>
		.penci-featured-cat-seemore a, .penci-featured-cat-seemore.penci-btn-make-button a{ color: <?php echo get_theme_mod( 'penci_home_featured_viewall_color' );?> }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_featured_viewall_bg' ) ): ?>
		.penci-featured-cat-seemore.penci-btn-make-button a{ background-color: <?php echo get_theme_mod( 'penci_home_featured_viewall_bg' );?> }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_featured3_overlay_color' ) ): ?>
		.home-featured-cat-content .mag-photo .mag-overlay-photo { background-color: <?php echo get_theme_mod( 'penci_home_featured3_overlay_color' ); ?>; }
	<?php endif; ?>
	.home-featured-cat-content .mag-photo .mag-overlay-photo { opacity: <?php echo get_theme_mod( 'penci_home_featured3_overlay_opacity' ); ?>; }
	.home-featured-cat-content .mag-photo:hover .mag-overlay-photo { opacity: <?php echo get_theme_mod( 'penci_home_featured3_overlay_hover_opacity' ); ?>; }
	<?php if( get_theme_mod( 'penci_home_featured3_title_color' ) ): ?>
		.home-featured-cat-content .mag-photo .magcat-detail h3 a, .penci-single-mag-slider .magcat-detail .magcat-titlte a, .home-featured-cat-content.style-14 .first-post .magcat-detail h3 a { color: <?php echo get_theme_mod( 'penci_home_featured3_title_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_home_featured3_title_hover_color' ) ): ?>
		.home-featured-cat-content .mag-photo .magcat-detail h3 a:hover, .penci-single-mag-slider .magcat-detail .magcat-titlte a:hover, .home-featured-cat-content.style-14 .first-post .magcat-detail h3 a:hover { color: <?php echo get_theme_mod( 'penci_home_featured3_title_hover_color' ); ?>; }
	<?php endif; ?>
	
	<?php if( get_theme_mod( 'penci_portfolio_layout_title_color' ) ): ?>
		.portfolio-overlay-content .portfolio-short .portfolio-title a, .text-grid-info h3 a { color: <?php echo get_theme_mod( 'penci_portfolio_layout_title_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_portfolio_layout_title_hover' ) ): ?>
		.portfolio-overlay-content .portfolio-short .portfolio-title a:hover, .text-grid-info h3 a:hover { color: <?php echo get_theme_mod( 'penci_portfolio_layout_title_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_portfolio_buttons_icon_color' ) ): ?>
		.portfolio-buttons a { color: <?php echo get_theme_mod( 'penci_portfolio_buttons_icon_color' ); ?>; border-color: <?php echo get_theme_mod( 'penci_portfolio_buttons_icon_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_portfolio_buttons_icon_hover' ) ): ?>
		.portfolio-item .portfolio-buttons a:hover { color: <?php echo get_theme_mod( 'penci_portfolio_buttons_icon_hover' ); ?>; border-color: <?php echo get_theme_mod( 'penci_portfolio_buttons_icon_hover' ); ?>; }
		.portfolio-item .portfolio-buttons a.liked > i { color: <?php echo get_theme_mod( 'penci_portfolio_buttons_icon_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_portfolio_layout_overlay_color' ) ): ?>
		.portfolio-overlay-background { background: <?php echo get_theme_mod( 'penci_portfolio_layout_overlay_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_portfolio_layout_overlay_border_color' ) ): ?>
		.inner-item-portfolio:hover .portfolio-overlay-background { border-color: <?php echo get_theme_mod( 'penci_portfolio_layout_overlay_border_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_portfolio_grid_categories_color' ) ): ?>
		.text-grid-cat, .text-grid-cat a { color: <?php echo get_theme_mod( 'penci_portfolio_grid_categories_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_portfolio_grid_categories_hover' ) ): ?>
		.text-grid-cat a:hover { color: <?php echo get_theme_mod( 'penci_portfolio_grid_categories_hover' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_portfolio_overlay_color' ) ): ?>
		.penci-portfolio-thumbnail a:after { background-color: <?php echo get_theme_mod( 'penci_portfolio_overlay_color' ); ?>; }
	<?php endif; ?>
	.inner-item-portfolio:hover .penci-portfolio-thumbnail a:after { opacity: <?php echo get_theme_mod( 'penci_portfolio_overlay_opacity' ); ?>; }
	<?php if( get_theme_mod( 'penci_portfolio_title_color' ) ): ?>
		.inner-item-portfolio .portfolio-desc h3 { color: <?php echo get_theme_mod( 'penci_portfolio_title_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_portfolio_cate_color' ) ): ?>
		.inner-item-portfolio .portfolio-desc span { color: <?php echo get_theme_mod( 'penci_portfolio_cate_color' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_portfolio_title_hcolor' ) ): ?>
		.inner-item-portfolio .portfolio-desc h3:hover { color: <?php echo get_theme_mod( 'penci_portfolio_title_hcolor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_portfolio_cate_hcolor' ) ): ?>
		.inner-item-portfolio .portfolio-desc span:hover { color: <?php echo get_theme_mod( 'penci_portfolio_cate_hcolor' ); ?>; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_menu_hbg_mobile' ) ): ?>
		@media only screen and (max-width: 960px){ .penci-menuhbg-wapper { display: none !important; } }
	<?php endif; ?>
	<?php $hbg_size = get_theme_mod( 'penci_hbg_size_icon' ); ?>
	<?php if( $hbg_size && $hbg_size > 13 && $hbg_size < 31 ): ?>
		.penci-menuhbg-toggle { width: <?php echo $hbg_size;?>px; }
		.penci-menuhbg-toggle .penci-menuhbg-inner { height: <?php echo $hbg_size;?>px; }
		.penci-menuhbg-toggle .penci-lines, .penci-menuhbg-wapper{ width: <?php echo $hbg_size;?>px; }
		.penci-menuhbg-toggle .lines-button{ top: <?php echo ($hbg_size - 2)/2; ?>px; }
		.penci-menuhbg-toggle .penci-lines:before{ top: <?php echo ( ($hbg_size/2) - 4 ); ?>px; }
		.penci-menuhbg-toggle .penci-lines:after{ top: -<?php echo ( ($hbg_size/2) - 4 ); ?>px; }
		.penci-menuhbg-toggle:hover .lines-button:after, .penci-menuhbg-toggle:hover .penci-lines:before, .penci-menuhbg-toggle:hover .penci-lines:after{ transform: translateX(<?php echo ( $hbg_size + 10 );?>px); }
		.penci-menuhbg-toggle .lines-button.penci-hover-effect{ left: -<?php echo ( $hbg_size + 10 );?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_hbg_sitetitle_size' ) ): ?>
		.penci-menu-hbg-inner .penci-hbg_sitetitle{ font-size: <?php echo get_theme_mod( 'penci_hbg_sitetitle_size' ); ?>px; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_hbg_sitedes_size' ) ): ?>
		.penci-menu-hbg-inner .penci-hbg_desc{ font-size: <?php echo get_theme_mod( 'penci_hbg_sitedes_size' ); ?>px; }
	<?php endif; ?>
	<?php
	if( get_theme_mod('penci_menu_hbg_show') || get_theme_mod('penci_vertical_nav_show') ):
		$max_width_hbg = get_theme_mod('penci_hbg_logo_max_width');
		if( get_theme_mod('penci_hbg_logo_max_width') ) {
			echo '.penci-hbg-logo img{ max-width: '. $max_width_hbg .'px; }';
		}
		$penci_hbg_width = get_theme_mod( 'penci_hbg_width' );
		$penci_hbg_screen = 1500;
		if( $penci_hbg_width && $penci_hbg_width > 249 && $penci_hbg_width < 501 ){
			$penci_hbg_screen = 1170 + $penci_hbg_width;
			echo '.penci-menu-hbg{ width: ' . $penci_hbg_width . 'px; }';
			echo '.penci-menu-hbg.penci-menu-hbg-left{ transform: translateX(-' . $penci_hbg_width . 'px); -webkit-transform: translateX(-' . $penci_hbg_width . 'px); -moz-transform: translateX(-' . $penci_hbg_width . 'px); }';
			echo '.penci-menu-hbg.penci-menu-hbg-right{ transform: translateX(' . $penci_hbg_width . 'px); -webkit-transform: translateX(' . $penci_hbg_width . 'px); -moz-transform: translateX(' . $penci_hbg_width . 'px); }';
			echo '.penci-menuhbg-open .penci-menu-hbg.penci-menu-hbg-left, .penci-vernav-poleft.penci-menuhbg-open .penci-vernav-toggle{ left: ' . $penci_hbg_width . 'px; }';
			echo '@media only screen and (min-width: 961px) { .penci-vernav-enable.penci-vernav-poleft .wrapper-boxed{ padding-left: ' . $penci_hbg_width . 'px; } .penci-vernav-enable.penci-vernav-poright .wrapper-boxed{ padding-right: ' . $penci_hbg_width . 'px; } .penci-vernav-enable .is-sticky #navigation{ width: calc(100% - ' . $penci_hbg_width . 'px); } }';
			echo '@media only screen and (min-width: 961px) { .penci-vernav-enable .penci_is_nosidebar .wp-block-image.alignfull, .penci-vernav-enable .penci_is_nosidebar .wp-block-cover-image.alignfull, .penci-vernav-enable .penci_is_nosidebar .wp-block-cover.alignfull, .penci-vernav-enable .penci_is_nosidebar .wp-block-gallery.alignfull, .penci-vernav-enable .penci_is_nosidebar .alignfull{ margin-left: calc(50% - 50vw + ' . floor( $penci_hbg_width/2 ) . 'px); width: calc(100vw - ' . $penci_hbg_width . 'px); } }';
			echo '.penci-vernav-poright.penci-menuhbg-open .penci-vernav-toggle{ right: ' . $penci_hbg_width . 'px; }';
			echo '@media only screen and (min-width: 961px) { .penci-vernav-enable.penci-vernav-poleft .penci-rltpopup-left{ left: ' . $penci_hbg_width . 'px; } }';
			echo '@media only screen and (min-width: 961px) { .penci-vernav-enable.penci-vernav-poright .penci-rltpopup-right{ right: ' . $penci_hbg_width . 'px; } }';
		}
		echo '@media only screen and (max-width: ' . $penci_hbg_screen . 'px) and (min-width: 961px) { .penci-vernav-enable .container { max-width: 100%; max-width: calc(100% - 30px); } .penci-vernav-enable .container.home-featured-boxes{ display: block; } .penci-vernav-enable .container.home-featured-boxes:before, .penci-vernav-enable .container.home-featured-boxes:after{ content: ""; display: table; clear: both; } }';

		$mhbg_icon_toggle_color = get_theme_mod( 'penci_mhbg_icon_toggle_color' );
		$mhbg_icon_toggle_hcolor = get_theme_mod( 'penci_mhbg_icon_toggle_hcolor' );

		if( $mhbg_icon_toggle_color ){
			echo '.penci-menuhbg-toggle .lines-button:after,.penci-menuhbg-toggle .penci-lines:before, .penci-menuhbg-toggle .penci-lines:after{ background-color: ' . esc_attr( $mhbg_icon_toggle_color ) . ' }';
		}

		if( $mhbg_icon_toggle_hcolor ){
			echo '.penci-menuhbg-toggle:hover .lines-button:after, .penci-menuhbg-toggle:hover .penci-lines:before, .penci-menuhbg-toggle:hover .penci-lines:after{ background-color: ' . esc_attr( $mhbg_icon_toggle_hcolor ) . ' }';
		}

		$mhbg_bgcolor = get_theme_mod( 'penci_mhbg_bgcolor' );
		$mhbg_textcolor = get_theme_mod( 'penci_mhbg_textcolor' );
		$mhbg_closecolor = get_theme_mod( 'penci_mhbg_closecolor' );
		$mhbg_closehover = get_theme_mod( 'penci_mhbg_closehover' );
		$mhbg_bordercolor = get_theme_mod( 'penci_mhbg_bordercolor' );
		$mhbg_bgimgcolor = get_theme_mod( 'penci_menu_hbg_bgimg' );
		$mhbgtitle_color = get_theme_mod( 'penci_mhbgtitle_color' );
		$mhbgdesc_hcolor = get_theme_mod( 'penci_mhbgdesc_hcolor' );
		$mhbgsearch_border = get_theme_mod( 'penci_mhbg_search_border' );
		$mhbgsearch_border_hover = get_theme_mod( 'penci_mhbg_search_border_hover' );
		$mhbgsearch_color = get_theme_mod( 'penci_mhbg_search_color' );
		$mhbgsearch_icon = get_theme_mod( 'penci_mhbg_search_icon' );
		$mhbgaccent_color = get_theme_mod( 'penci_mhbgaccent_color' );
		$mhbgaccent_hover_color = get_theme_mod( 'penci_mhbgaccent_hover_color' );
		$mhbgfooter_color = get_theme_mod( 'penci_mhbgfooter_color' );
		$mhbgicon_color = get_theme_mod( 'penci_mhbgicon_color' );
		$mhbgicon_hover_color = get_theme_mod( 'penci_mhbgicon_hover_color' );
		$mhbg_social_size = get_theme_mod( 'penci_menuhbg_icon_size' );
		$mhbgicon_border = get_theme_mod( 'penci_mhbgicon_border' );
		$mhbgicon_border_hover = get_theme_mod( 'penci_mhbgicon_border_hover' );
		$mhbgicon_bg = get_theme_mod( 'penci_mhbgicon_bg' );
		$mhbgicon_bg_hover = get_theme_mod( 'penci_mhbgicon_bg_hover' );

		$mhbg_widget_title_color = get_theme_mod( 'penci_mhbg_widget_title_color' );
		$mhbgicon_bg_hover_color = get_theme_mod( 'penci_mhbgicon_bg_hover_color' );

		if( $mhbg_bgcolor ) { echo '.penci-menu-hbg,.penci-menu-hbg .penci-sidebar-content .widget-title{background-color: '. esc_attr( $mhbg_bgcolor ) .';}';}
		if( $mhbg_bgimgcolor ) { echo '.penci-menu-hbg{background-image: url( ' . esc_url( $mhbg_bgimgcolor ) . ' );}'; }
		if( $mhbg_closecolor ) { echo '.penci-menu-hbg-inner #penci-close-hbg:before, .penci-menu-hbg-inner #penci-close-hbg:after{background-color: '. esc_attr( $mhbg_closecolor ) .';}';}
		if( $mhbg_closehover ) { echo '.penci-menu-hbg-inner #penci-close-hbg:hover:before, .penci-menu-hbg-inner #penci-close-hbg:hover:after{background-color: '. esc_attr( $mhbg_closehover ) .';}';}
		if( $mhbg_textcolor ) {
			echo '.penci-menu-hbg,.penci-menu-hbg .about-widget .about-me-heading,';
			echo '.penci-menu-hbg .widget select,.penci-menu-hbg .widget select option,';
			echo '.penci-menu-hbg #searchform input.search-input{ color: ' . $mhbg_textcolor . ' }';
		}

		if( $mhbg_bordercolor ){
			echo '.penci-menu-hbg .widget ul li,.penci-menu-hbg .menu li,';
			echo '.penci-menu-hbg .widget-social a i,';
			echo '.penci-menu-hbg .penci-home-popular-posts,';
			echo '.penci-menu-hbg #respond textarea,';
			echo '.penci-menu-hbg .wpcf7 textarea,';
			echo '.penci-menu-hbg #respond input,';
			echo '.penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=date], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=datetime], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=datetime-local], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=email], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=month], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=number], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=password], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=range], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=search], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=tel], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=text], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=time], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=url], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form input[type=week], .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form select, .penci-menu-hbg div.wpforms-container .wpforms-form.wpforms-form textarea,';
			echo '.penci-menu-hbg .wpcf7 input,';
			echo '.penci-menu-hbg .widget_wysija input,';
			echo '.penci-menu-hbg .widget select,';
			echo '.penci-menu-hbg .widget ul ul,';
			echo '.penci-menu-hbg .widget .tagcloud a,';
			echo '.penci-menu-hbg #wp-calendar tbody td,';
			echo '.penci-menu-hbg #wp-calendar thead th,';
			echo '.penci-menu-hbg .widget input[type="text"],';
			echo '.penci-menu-hbg .widget input[type="email"],';
			echo '.penci-menu-hbg .widget input[type="date"],';
			echo '.penci-menu-hbg .widget input[type="number"],';
			echo '.penci-menu-hbg .widget input[type="search"], .widget input[type="password"], .penci-menu-hbg #searchform input.search-input,';
			echo '.penci-vernav-enable.penci-vernav-poleft .penci-menu-hbg, .penci-vernav-enable.penci-vernav-poright .penci-menu-hbg, .penci-menu-hbg ul.sub-menu{border-color: ' . $mhbg_bordercolor . ';}';
		}
		if( $mhbgtitle_color ) { echo '.penci-menu-hbg-inner .penci-hbg_sitetitle{ color:' . esc_attr( $mhbgtitle_color ) . ';}';}
		if( $mhbgdesc_hcolor ) { echo '.penci-menu-hbg-inner .penci-hbg_desc{ color:' . esc_attr( $mhbgdesc_hcolor ) . ';}';}
		if( $mhbgsearch_border ) { echo '.penci-menu-hbg #searchform.penci-hbg-search-form input.search-input{ border-color:' . esc_attr( $mhbgsearch_border ) . ';}';}
		if( $mhbgsearch_border_hover ) { echo '.penci-menu-hbg .penci-hbg-search-form input.search-input:hover, #searchform.penci-hbg-search-form input.search-input:hover, #searchform.penci-hbg-search-form input.search-input:focus{ border-color:' . esc_attr( $mhbgsearch_border_hover ) . ';}';}
		if( $mhbgsearch_color ) {
			echo '#searchform.penci-hbg-search-form input.search-input{ color:' . esc_attr( $mhbgsearch_color ) . ';}';
			echo '#searchform.penci-hbg-search-form input.search-input::-webkit-input-placeholder { color: ' . esc_attr( $mhbgsearch_color ) . '; }';
			echo '#searchform.penci-hbg-search-form input.search-input::-moz-placeholder { color: ' . esc_attr( $mhbgsearch_color ) . '; opacity: 1; }';
			echo '#searchform.penci-hbg-search-form input.search-input:-ms-input-placeholder { color: ' . esc_attr( $mhbgsearch_color ) . '; }';
			echo '#searchform.penci-hbg-search-form input.search-input:-moz-placeholder { color: ' . esc_attr( $mhbgsearch_color ) . '; opacity: 1; }';
		}
		if( $mhbgsearch_icon ) { echo '#searchform.penci-hbg-search-form i{ color:' . esc_attr( $mhbgsearch_icon ) . ';}';}

		if( $mhbgaccent_color ) {
			echo '.penci-menu-hbg .menu li a,';
			echo '.penci-menu-hbg .widget ul.side-newsfeed li .side-item .side-item-text h4 a,';
			echo '.penci-menu-hbg #wp-calendar tbody td a,';
			echo '.penci-menu-hbg .widget.widget_categories ul li,';
			echo '.penci-menu-hbg .widget.widget_archive ul li, .penci-menu-hbg .widget-social a i,';
			echo '.penci-menu-hbg .widget-social a span,';
			echo '.penci-menu-hbg .widget-social.show-text a span,';
			echo '.penci-menu-hbg .widget a{ color: '. esc_attr( $mhbgaccent_color ) .';}';
		}

		if( $mhbgaccent_hover_color ) {
			echo '.penci-menu-hbg .menu li a:hover,.penci-menu-hbg .menu li a .indicator:hover';
			echo '.penci-menu-hbg .widget ul.side-newsfeed li .side-item .side-item-text h4 a:hover,';
			echo '.penci-menu-hbg .widget a:hover,';
			echo '.penci-menu-hbg .penci-sidebar-content .widget-social a:hover span,';
			echo '.penci-menu-hbg .widget-social a:hover span,';
			echo '.penci-menu-hbg .penci-tweets-widget-content .icon-tweets,';
			echo '.penci-menu-hbg .penci-tweets-widget-content .tweet-intents a,';
			echo '.penci-menu-hbg .penci-tweets-widget-content.tweet-intents span:after,';
			echo '.penci-menu-hbg .widget-social.remove-circle a:hover i,';
			echo '.penci-menu-hbg #wp-calendar tbody td a:hover,';
			echo '.penci-menu-hbg a:hover {color: '. esc_attr( $mhbgaccent_hover_color ) .';}';

			echo '.penci-menu-hbg .widget .tagcloud a:hover,';
			echo '.penci-menu-hbg .widget-social a:hover i,';
			echo '.penci-menu-hbg .widget .penci-user-logged-in .penci-user-action-links a:hover,';
			echo '.penci-menu-hbg .widget input[type="submit"]:hover,';
			echo '.penci-menu-hbg .widget button[type="submit"]:hover{ color: #fff; background-color: '. esc_attr( $mhbgaccent_hover_color ) .'; border-color: '. esc_attr( $mhbgaccent_hover_color ) .'; }';

			echo '.penci-menu-hbg .about-widget .about-me-heading:before { border-color: '. esc_attr( $mhbgaccent_hover_color ) .'; }';
			echo '.penci-menu-hbg .penci-tweets-widget-content .tweet-intents-inner:before,';
			echo '.penci-menu-hbg .penci-tweets-widget-content .tweet-intents-inner:after { background-color: '. esc_attr( $mhbgaccent_hover_color ) .'; }';
			echo '.penci-menu-hbg .penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot.active span,';
			echo '.penci-menu-hbg .penci-owl-carousel.penci-tweets-slider .owl-dots .owl-dot:hover span { border-color: '. esc_attr( $mhbgaccent_hover_color ) .'; background-color: '. esc_attr( $mhbgaccent_hover_color ) .'; }';
		}

		if( $mhbgfooter_color ) { echo '.penci-menu-hbg-inner .penci_menu_hbg_ftext{ color:' . esc_attr( $mhbgfooter_color ) . ';}';}
		if( $mhbgicon_color ) { echo '.penci-menu-hbg .header-social.sidebar-nav-social a i, .penci-menu-hbg .header-social.penci-hbg-social-style-2 a i{ color:' . esc_attr( $mhbgicon_color ) . ';}';}
		if( $mhbgicon_hover_color ) { echo '.penci-menu-hbg .header-social.sidebar-nav-social a:hover i, .penci-menu-hbg .header-social.penci-hbg-social-style-2 a:hover i{ color:' . esc_attr( $mhbgicon_hover_color ) . ';}';}
		if( $mhbgicon_border ) { echo '.penci-menu-hbg .header-social.penci-hbg-social-style-2 a i{ border-color:' . esc_attr( $mhbgicon_border ) . ';}';}
		if( $mhbgicon_border_hover ) { echo '.penci-menu-hbg .header-social.penci-hbg-social-style-2 a:hover i{ border-color:' . esc_attr( $mhbgicon_border_hover ) . ';}';}
		if( $mhbgicon_bg ) { echo '.penci-menu-hbg .header-social.penci-hbg-social-style-2 a i{ background-color:' . esc_attr( $mhbgicon_bg ) . ';}';}
		if( $mhbgicon_bg_hover ) { echo '.penci-menu-hbg .header-social.penci-hbg-social-style-2 a:hover i{ background-color:' . esc_attr( $mhbgicon_bg_hover ) . ';}';}
		if( $mhbg_social_size ) { echo '.penci-menu-hbg .header-social.sidebar-nav-social a i{ font-size:' . absint( $mhbg_social_size ) . 'px;}';}

		// Widget
		$mhbg_widget_margin = get_theme_mod( 'penci_mhbg_widget_margin' );
		$mhbgwidget_heading_lowcase = get_theme_mod( 'penci_mhbgwidget_heading_lowcase' );
		$mhbgwidget_heading_size = get_theme_mod( 'penci_mhbgwidget_heading_size' );
		$mhbgwidget_heading_image_9 = get_theme_mod( 'penci_mhbgwidget_heading_image_9' );
		$mhbgwidget_heading9_repeat = get_theme_mod( 'penci_mhbgwidget_heading9_repeat' );
		$mhbgwidget_remove_border_outer = get_theme_mod( 'penci_mhbgwidget_remove_border_outer' );
		$mhbgwidget_remove_arrow_down = get_theme_mod( 'penci_mhbgwidget_remove_arrow_down' );

		if( $mhbg_widget_margin ) {
			echo '.penci-menu-hbg .penci-sidebar-content .widget{ margin-bottom: ' . esc_attr( $mhbg_widget_margin ) . 'px; }';
			echo '.penci-menu-hbg-widgets2{ margin-top: ' . esc_attr( $mhbg_widget_margin ) . 'px; }';
		}

		if( $mhbgwidget_heading_lowcase ) {
			echo '.penci-menu-hbg .penci-sidebar-content .penci-border-arrow .inner-arrow{ text-transform: none; }';
		}

		if( $mhbgwidget_heading_size ) {
			echo '.penci-menu-hbg .penci-sidebar-content .penci-border-arrow .inner-arrow { font-size: ' . $mhbgwidget_heading_size . 'px; }';
		}
		if( $mhbgwidget_heading_image_9 ) {
			echo '.penci-menu-hbg .penci-sidebar-content.style-8 .penci-border-arrow .inner-arrow { background-image: url(' . $mhbgwidget_heading_image_9 . '); }';
		}
		if( $mhbgwidget_heading9_repeat ) {
			echo '.penci-menu-hbg .penci-sidebar-content.style-8 .penci-border-arrow .inner-arrow{ background-repeat: ' . $mhbgwidget_heading9_repeat . '; background-size: auto; }';
		}
		if( $mhbgwidget_remove_border_outer ) {
			echo '.penci-menu-hbg .penci-sidebar-content .penci-border-arrow:after { content: none; display: none; }
		.penci-menu-hbg .penci-sidebar-content .widget-title{ margin-left: 0; margin-right: 0; margin-top: 0; }
		.penci-menu-hbg .penci-sidebar-content .penci-border-arrow:before{ bottom: -6px; border-width: 6px; margin-left: -6px; }';
		}

		if( $mhbgwidget_remove_arrow_down ) {
			echo '.penci-menu-hbg .penci-sidebar-content .penci-border-arrow:before, .penci-sidebar-content.style-2 .penci-border-arrow:after { content: none; display: none; }';
		}

		$mhwidget_heading_bg     = get_theme_mod( 'penci_mhwidget_heading_bg' );
		$mhwidget_heading_outer_bg     = get_theme_mod( 'penci_mhwidget_heading_outer_bg' );
		$mhwidget_heading_bcolor = get_theme_mod( 'penci_mhwidget_heading_bcolor' );
		$mhwidget_heading_binner_color = get_theme_mod( 'penci_mhwidget_heading_binner_color' );
		$mhwidget_heading_bcolor5 = get_theme_mod( 'penci_mhwidget_heading_bcolor5' );
		$mhwidget_heading_bcolor7 = get_theme_mod( 'penci_mhwidget_heading_bcolor7' );
		$mhwidget_heading_color   = get_theme_mod( 'penci_mhwidget_heading_color' );

		if( $mhwidget_heading_bg ) {
			echo '.penci-menu-hbg .penci-sidebar-content .penci-border-arrow .inner-arrow { background-color: ' . $mhwidget_heading_bg . '; }';
			echo '.penci-menu-hbg .penci-sidebar-content.style-2 .penci-border-arrow:after{ border-top-color: ' . $mhwidget_heading_bg . '; }';
		}
		if( $mhwidget_heading_outer_bg ) {
			echo '.penci-menu-hbg .penci-sidebar-content .penci-border-arrow:after { background-color: ' . $mhwidget_heading_bg . '; }';
		}
		if( $mhwidget_heading_bcolor ) {
			echo '.penci-menu-hbg .penci-sidebar-content .penci-border-arrow .inner-arrow,';
			echo '.penci-menu-hbg .penci-sidebar-content.style-4 .penci-border-arrow .inner-arrow:before,';
			echo '.penci-menu-hbg .penci-sidebar-content.style-4 .penci-border-arrow .inner-arrow:after,';
			echo '.penci-menu-hbg .penci-sidebar-content.style-5 .penci-border-arrow,';
			echo '.penci-menu-hbg .penci-sidebar-content.style-7 .penci-border-arrow,';
			echo '.penci-menu-hbg .penci-sidebar-content.style-9 .penci-border-arrow { border-color: ' . $mhwidget_heading_bcolor . '; }';
			echo '.penci-menu-hbg .penci-sidebar-content .penci-border-arrow:before { border-top-color: ' . $mhwidget_heading_bcolor . '; }';
		}
		if( $mhwidget_heading_binner_color ) {
			echo '.penci-menu-hbg .penci-sidebar-content .penci-border-arrow:after { border-color: ' . $mhwidget_heading_binner_color . '; }';
		}
		if( $mhwidget_heading_bcolor5 ) {
			echo '.penci-menu-hbg .penci-sidebar-content.style-5 .penci-border-arrow { border-color: ' . $mhwidget_heading_bcolor5 . '; }';
			echo '.penci-menu-hbg .penci-sidebar-content.style-5 .penci-border-arrow .inner-arrow{ border-bottom-color: ' . $mhwidget_heading_bcolor5 . '; }';
		}
		if( $mhwidget_heading_bcolor7 ) {
			echo '.penci-menu-hbg .penci-sidebar-content.style-7 .penci-border-arrow .inner-arrow:before,.penci-menu-hbg .penci-sidebar-content.style-9 .penci-border-arrow .inner-arrow:before { background-color: ' . $mhwidget_heading_bcolor7 . '; }';
		}
		if( $mhwidget_heading_color ) {
			echo '.penci-menu-hbg .penci-sidebar-content .penci-border-arrow .inner-arrow { color: ' . $mhwidget_heading_color . '; }';
		}
	endif; /* End check if enable HBG menu or Vertical Nav */
	?>
	<?php if( get_theme_mod( 'penci_woo_paging_align' ) == 'left' ): ?>
		.woocommerce nav.woocommerce-pagination { text-align: left; }
	<?php endif; ?>
	<?php if( get_theme_mod( 'penci_woo_paging_align' ) == 'right' ): ?>
		.woocommerce nav.woocommerce-pagination { text-align: right; }
	<?php endif; ?>

	<?php
	// RDGP
	$gprd_bgcolor     = get_theme_mod( 'penci_gprd_bgcolor' );
	$gprd_color       = get_theme_mod( 'penci_gprd_color' );
	$gprd_btn_color   = get_theme_mod( 'penci_gprd_btn_color' );
	$gprd_btn_bgcolor = get_theme_mod( 'penci_gprd_btn_bgcolor' );
	$gprd_border      = get_theme_mod( 'penci_gprd_border' );

	$rdpenci_css = '';
	if ( $gprd_bgcolor ) {
		$rdpenci_css .= '.penci-wrap-gprd-law .penci-gdrd-show,.penci-gprd-law{ background-color: ' . $gprd_bgcolor . ' } ';
	}
	if ( $gprd_color ) {
		$rdpenci_css .= '.penci-wrap-gprd-law .penci-gdrd-show,.penci-gprd-law{ color: ' . $gprd_color . ' } ';
	}
	if ( $gprd_btn_color ) {
		$rdpenci_css .= '.penci-gprd-law .penci-gprd-accept{ color: ' . $gprd_btn_color . ' }';
	}
	if ( $gprd_btn_bgcolor ) {
		$rdpenci_css .= '.penci-gprd-law .penci-gprd-accept{ background-color: ' . $gprd_btn_bgcolor . ' }';
	}
	if ( $gprd_border ) {
		$rdpenci_css .= '.penci-gprd-law{ border-top: 2px solid ' . $gprd_border . ' } ';
		$rdpenci_css .= '.penci-wrap-gprd-law .penci-gdrd-show{ border: 1px solid ' . $gprd_border . '; border-bottom: 0; } ';
	}
	echo $rdpenci_css;
	?>
	<?php if(get_theme_mod( 'penci_custom_css' )) : ?>
		<?php echo get_theme_mod( 'penci_custom_css' ); ?>
	<?php endif; ?>
	<?php
	do_action( 'soledad_theme/custom_css' );
	if( is_page() ){
		$page_custom_css = get_post_meta( get_the_ID(), 'penci_pmeta_page_custom_css', true );
		if ( isset( $page_custom_css['page_custom_css'] ) && $page_custom_css['page_custom_css'] ) {
			echo $page_custom_css['page_custom_css'];
		}
		$page_background = get_post_meta( get_the_ID(), 'penci_pmeta_page_background', true );
		$css_page_wapper = '';
		$page_background_color = '';
		
		if ( isset( $page_background['page_wrap_bgcolor'] ) && $page_background['page_wrap_bgcolor'] ) {
			$css_page_wapper .= 'background-color:' . esc_attr( $page_background['page_wrap_bgcolor'] ) . ' !important;';
			$page_background_color = esc_attr( $page_background['page_wrap_bgcolor'] );
		}
		if ( isset( $page_background['page_wrap_bgimg'] ) && $page_background['page_wrap_bgimg'] ) {
			$bgimg           = wp_get_attachment_url( $page_background['page_wrap_bgimg'] );
			$css_page_wapper .= 'background-image: url(' . esc_url( $bgimg ) . ') !important;';
		}
		if ( isset( $page_background['page_wrap_bg_pos'] ) && $page_background['page_wrap_bg_pos'] ) {
			$css_page_wapper .= 'background-position:' . esc_attr( str_replace( '_', ' ', $page_background['page_wrap_bg_pos'] ) ) . ' !important;';
		}
		if ( isset( $page_background['page_wrap_bg_size'] ) && $page_background['page_wrap_bg_size'] ) {
			$css_page_wapper .= 'background-size:' . esc_attr( $page_background['page_wrap_bg_size'] ) . ' !important;';
		}
		if ( isset( $page_background['page_wrap_bg_repeat'] ) && $page_background['page_wrap_bg_repeat'] ) {
			$css_page_wapper .= 'background-repeat:' . esc_attr( $page_background['page_wrap_bg_repeat'] ) . ' !important;';
		}
		?>
		<?php if( $css_page_wapper ): ?>
			.wrapper-boxed, .wrapper-boxed.enable-boxed{<?php echo $css_page_wapper; ?> }
		<?php endif; ?>
		<?php if( $page_background_color ): ?>
			.penci-single-style-7:not( .penci-single-pheader-noimg ).penci_sidebar #main article.post, .penci-single-style-3:not( .penci-single-pheader-noimg ).penci_sidebar #main article.post { background-color: <?php echo penci_get_setting( 'penci_bg_color_dark' ); ?>; }
			@media only screen and (max-width: 767px){ .standard-post-special_wrapper { background: <?php echo $page_background_color; ?>; } }
			.home-pupular-posts-title span, .penci-homepage-title, .penci-post-box-meta.penci-post-box-grid .penci-post-share-box, .penci-pagination.penci-ajax-more a.penci-ajax-more-button, .penci-sidebar-content .widget-title, #searchform input.search-input, .woocommerce .woocommerce-product-search input[type="search"], .overlay-post-box-meta, .widget ul.side-newsfeed li.featured-news2 .side-item .side-item-text, .widget select, .widget select option, .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, #penci-demobar, #penci-demobar .style-toggle,
			.grid-overlay-meta .grid-header-box, .header-standard.standard-overlay-meta{ background-color: <?php echo $page_background_color; ?>; }
			.penci-grid .list-post.list-boxed-post .item > .thumbnail:before{ border-right-color: <?php echo $page_background_color; ?>; }
			.penci-grid .list-post.list-boxed-post:nth-of-type(2n+2) .item > .thumbnail:before{ border-left-color: <?php echo $page_background_color; ?>; }
		<?php endif; ?>
	<?php } ?>
	<?php
}
endif;


add_action( 'wp_head', 'pencidesign_customizer_css' );
?>