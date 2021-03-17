(
	function ( $ ) {
		'use strict';


		// Textlogo
		wp.customize( 'penci_amp_header_text_logo', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-amp-wp-header .text-logo' ).text( to );
				$( '.penci-amp-wp-header .custom_logo ' ).text( to );
			} );
		} );

		wp.customize( 'penci_amp_img_logo', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-amp-wp-header .image-logo' ).text( to );
			} );
		} );

		wp.customize( 'penci_amp_sticky_header', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-amp-body' )[to ? 'addClass' : 'removeClass']( 'sticky-header' );
			} );
		} );

		wp.customize( 'penci_amp_show_sidebar', function ( value ) {
			value.bind( function ( to ) {
				$( '.navbar-toggle' )[to ? 'show' : 'hide']();
				$( '.mobile-sidebar' )[to ? 'show' : 'hide']();
			} );
		} );

		wp.customize( 'penci_amp_show_search', function ( value ) {
			value.bind( function ( to ) {
				$( '.navbar-search' )[to ? 'show' : 'hide']();
			} );
		} );

		wp.customize( 'penci_amp_home_show_slider', function ( value ) {
			value.bind( function ( to ) {

				$( '.homepage-slider' )[to ? 'show' : 'hide']();
			} );
		} );
		wp.customize( 'penci_amp_home_show_pdate', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-archive__list_posts .penci-posted-on' )[to ? 'show' : 'hide']();
			} );
		} );
		wp.customize( 'penci_amp_home_show_excrept', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-archive__list_posts.listing-3 .penci-post-item-1 .post-excerpt' )[to ? 'show' : 'hide']();
				$( '.penci-archive__list_posts.listing-2 .post-excerpt' )[to ? 'show' : 'hide']();
			} );
		} );
		wp.customize( 'penci_amp_home_show_readmore', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-archive__list_posts .post-read-more' )[to ? 'show' : 'hide']();
			} );
		} );

		wp.customize( 'penci_amp_home_show_pagination', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-amp-pagination' )[to ? 'show' : 'hide']();
			} );
		} );


		wp.customize( 'penci_amp_no_version_link', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-amp-main-link' )[to ? 'show' : 'hide']();
			} );
		} );
		wp.customize( 'penci_amp_gototop', function ( value ) {
			value.bind( function ( to ) {
				$( '.back-to-top' )[to ? 'show' : 'hide']();
			} );
		} );

		wp.customize( 'penci_amp_footer_copy_right', function ( value ) {
			value.bind( function ( to ) {
				$( '.footer__copyright_menu p' ).html( to );
			} );
		} );

		wp.customize( 'penci_amp_featured_cat_listing', function ( value ) {
			value.bind( function ( to ) {

				$( '.penci_amp_featured_cat_listing' )
					.removeClass( 'listing-1' )
					.removeClass( 'listing-2' )
					.removeClass( 'listing-3' )
					.addClass( to );
			} );
		} );

		wp.customize( 'penci_amp_home_listing', function ( value ) {
			value.bind( function ( to ) {

				$( '.penci_amp_home_listing' )
					.removeClass( 'listing-1' )
					.removeClass( 'listing-2' )
					.removeClass( 'listing-3' )
					.addClass( to );
			} );
		} );

		wp.customize( '.penci_amp_archive_listing', function ( value ) {
			value.bind( function ( to ) {
				$( '.archive .penci-archive__list_posts' )
					.removeClass( 'listing-1' )
					.removeClass( 'listing-2' )
					.removeClass( 'listing-3' )
					.addClass( to );
			} );
		} );

		// Sidebar
		wp.customize( 'penci_amp_header_text_logo_sidebar', function ( value ) {
			value.bind( function ( to ) {
				$( '.sidebar-nav-logo .text-logo' ).text( to );
			} );
		} );

		wp.customize( 'penci_amp_img_logo_sidebar', function ( value ) {
			value.bind( function ( to ) {
				$( '.sidebar-nav-logo .image-logo' ).text( to );
			} );
		} );

		wp.customize( 'penci_amp_sidebar_show_socail', function ( value ) {
			value.bind( function ( to ) {
				$( '.sidebar-nav-social' )[to ? 'show' : 'hide']();
			} );
		} );

		wp.customize( 'penci_amp_sidebar_show_logo', function ( value ) {
			value.bind( function ( to ) {
				$( '#sidebar-nav-logo' )[to ? 'show' : 'hide']();
			} );
		} );


		// Posts
		wp.customize( 'penci_amp_posts_show_thumb', function ( value ) {
			value.bind( function ( to ) {
				$( '.amp-wp-article-featured-image' )[to ? 'show' : 'hide']();
			} );
		} );
		wp.customize( 'penci_amp_posts_show_pmeta', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-amp-entry-meta' )[to ? 'show' : 'hide']();
			} );
		} );
		wp.customize( 'penci_amp_posts_show_pcat', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-amp-tax-category' )[to ? 'show' : 'hide']();
			} );
		} );
		wp.customize( 'penci_amp_posts_show_ptag', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-amp-tags-links' )[to ? 'show' : 'hide']();
			} );
		} );
		wp.customize( 'penci_amp_posts_show_comment', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-amp-comment' )[to ? 'show' : 'hide']();
			} );
		} );
		wp.customize( 'penci_amp_posts_show_share', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-social-buttons' )[to ? 'show' : 'hide']();
			} );
		} );
		wp.customize( 'penci_amp_posts_show_related', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-post-related' )[to ? 'show' : 'hide']();
			} );
		} );

		wp.customize( 'penci_amp_posts_show_show_pag', function ( value ) {
			value.bind( function ( to ) {
				$( '.penci-post-pagination' )[to ? 'show' : 'hide']();
			} );
		} );


	}
)( jQuery );
