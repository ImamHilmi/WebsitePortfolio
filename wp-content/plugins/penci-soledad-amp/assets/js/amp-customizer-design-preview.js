( function( $ ) {
	'use strict';

	// Nav bar text color.
	wp.customize( 'penci_amp_customizer[header_color]', function( value ) {
		value.bind( function( to ) {
			$( '.penci-amp-wp-header a' ).css( 'color', to );
			$( '.penci-amp-wp-header div' ).css( 'color', to );
			$( '.penci-amp-wp-header .navbar-search' ).css( 'color', to );
			$( '.penci-amp-wp-header .navbar-toggle' ).css( 'color', to );
			$( '.penci-amp-wp-header .branding' ).css( 'color', to );
		} );
	} );

	wp.customize( 'penci_amp_customizer[title_color]', function( value ) {
		value.bind( function( to ) {
			$( '.penci-amp-tags-links  a:hover' ).css( 'background-color', to );
			$( '.post-comments span.reply a:hover' ).css( 'color', to );
			$( '#respond h3 small a:hover' ).css( 'color', to );
			$( '.mobile-sidebar .primary-menu-mobile li a' ).css( 'color', to );
			$( '.mobile-sidebar ul.sub-menu ul.sub-menu' ).css( 'color', to );
			$( '.penci-product-item .penci__product__title' ).css( 'color', to );
			$( '.penci-product-item .penci__product__title a' ).css( 'color', to );
			$( '.penci-archive__list_posts .penci__post-title a' ).css( 'color', to );
			$( '#close-sidebar-nav i' ).css( 'color', to );
			$( '.mobile-sidebar .sidebar-nav-social a ' ).css( 'color', to );
			$( '.pagination a,.pagination span.page-numbers' ).css( 'color', to );
		} );
	} );
	// Nav bar background color.
	wp.customize( 'penci_amp_customizer[header_background_color]', function( value ) {
		value.bind( function( to ) {
			$( 'html, .penci-amp-wp-header,.penci-search-form .search-submit' ).css( 'background-color', to );
			$( '.penci-amp-wp-article a, .penci-amp-article a:visited, .amp-wp-footer a, .amp-wp-footer a:visited' ).css( 'color', to );
			$( 'blockquote, .amp-wp-byline amp-img ' ).css( 'border-color', to );
		} );
	} );

	wp.customize( 'penci_amp_customizer[link_color]', function( value ) {
		value.bind( function( to ) {
			$( 'a,a:visited' ).css( 'color', to );
			$( '.penci-archive__list_posts .penci__post-title a:hover' ).css( 'color', to );
			$( '.post-comments span.reply a:hover' ).css( 'color', to );
			$( '.footer__copyright_menu a:hover' ).css( 'color', to );

			$( '.penci-amp-tax-category a,.penci-post-pagination a:hover' ).css( 'color', to );
			$( '.amp-wp-comments-link a' ).css( 'color', to );
			$( '.thecomment .comment-text span.author a:hover' ).css( 'color', to );
			$( '.post-comments span.reply a:hover' ).css( 'color', to );
			$( '.footer__copyright_menu a:hover' ).css( 'color', to );

			$( 'blockquote, .amp-wp-byline amp-img' ).css( 'border-color', to );

			$( '.penci-amp-main-link a' ).css( 'background-color', to );
		} );
	} );

	wp.customize( 'penci_amp_customizer[text_color]', function( value ) {
		value.bind( function( to ) {
			$( 'body,a:hover,a:active,a:focus,blockquote,.amp-wp-article' ).css( 'color', to );
		} );
	} );

	// AMP background color scheme.
	wp.customize( 'penci_amp_customizer[color_scheme]', function( value ) {
		value.bind( function( to ) {
			var colors = penci_amp_customizer_design.color_schemes[ to ];

			if ( ! colors ) {
				console.error( 'Selected color scheme "%s" not registered.', to );
				return;
			}

			$( 'body,.penci-amp-wrapper' ).css( 'background-color', colors.theme_color );
			$( 'body, a:hover, a:active, a:focus, blockquote, .amp-wp-article, .amp-wp-title' ).css( 'color', colors.text_color );
			$( '.amp-wp-meta, .wp-caption .wp-caption-text, .amp-wp-tax-category, .amp-wp-tax-tag, .amp-wp-footer p' ).css( 'color', colors.muted_text_color );
			$( '.wp-caption .wp-caption-text, .amp-wp-comments-link a, .amp-wp-footer' ).css( 'border-color', colors.border_color );
			$( '.amp-wp-iframe-placeholder, amp-carousel, amp-iframe, amp-youtube, amp-instagram, amp-vine' ).css( 'background-color', colors.border_color );
		} );
	} );

} )( jQuery );
