jQuery( function ( $ ) {
	'use strict';


	var PENCIWIDGETS = PENCIWIDGETS || {};
	PENCIWIDGETS.customSidebar = {

		init: function () {
			PENCIWIDGETS.customSidebar.addSidebars();
			PENCIWIDGETS.customSidebar.removeSidebar();
			PENCIWIDGETS.customSidebar.moveFormToTop();
			PENCIWIDGETS.customSidebar.addIconRemoveSidebar();
		},
		moveFormToTop: function(){
			$( '#penci-add-custom-sidebar' ).parent().prependTo($('#widgets-right .sidebars-column-1'));
		},
		addSidebars: function() {
			var idAddCustomSidebar = '#penci-add-custom-sidebar';

			$( '#penci-add-custom-sidebar form').submit(function(event) {
				event.preventDefault();

				var $this = $(this),
					nameVal = $this.find('#penci-add-custom-sidebar-name').val();

				$this.find('input[type="submit"]').attr('disabled', 'disabled');
				$this.closest( '#penci-add-custom-sidebar' ).find('.spinner').addClass('is-active');

				var data = {
					action: 'soledad_add_sidebar',
					_nameval: nameVal,
					_wpnonce: Penci.nonce
				};

				$.post( Penci.ajaxUrl, data, function( r ) {
					$this.closest( idAddCustomSidebar ).find('.spinner').removeClass('is-active');

					$this.find('input[type="submit"]').removeAttr('disabled');

					if( !r || ! r.success ) {
						if( r && r.data ) {
							alert( r.data );
						}else{
							alert( Penci.sidebarFails );
						}
					}else {
						PENCIWIDGETS.customSidebar.addSidebars.html_backup = $('#wpbody-content > .wrap').clone();

						var dataWidget = jQuery(  r.data );

						dataWidget.find( '.sidebar-name h2 .spinner' ).before('<a class="soledad-remove-custom-sidebar" href="#"><span class="notice-dismiss"></span></a>');

						PENCIWIDGETS.customSidebar.addSidebars.html_backup.find('#widgets-right .sidebars-column-2').append( dataWidget );
						$(document.body).unbind('click.widgets-toggle');

						$('#wpbody-content > .wrap').replaceWith( PENCIWIDGETS.customSidebar.addSidebars.html_backup.clone() );

						setTimeout(function() {
							wpWidgets.init();
							PENCIWIDGETS.customSidebar.addSidebars();
							PENCIWIDGETS.customSidebar.rearrangeColumns();

							PENCIWIDGETS.customSidebar.removeSidebar();
						}, 100 );
					}
				} );
			} );
		},
		removeSidebar: function (  ) {
			var titleSidebar = $('#widgets-right .sidebar-soledad-custom-sidebar .sidebar-name h2');
			titleSidebar.on('click', '.soledad-remove-custom-sidebar', function(event)  {
				event.preventDefault();
				event.stopPropagation();

				var $this = $(this);

				if ( confirm( Penci.cfRemovesidebar ) ) {

					$this.addClass('hidden').next('.spinner').addClass('is-active');

					var data = {
						action: 'soledad_remove_sidebar',
						idSidebar: $this.closest( '.widgets-sortables' ).attr( 'id' ),
						_wpnonce: Penci.nonce
					};

					$.post( Penci.ajaxUrl, data, function ( r ) {
						if ( ! r || ! r.success ) {
							if ( r && r.data ) {
								alert( r.data );
							} else {
								alert( Penci.sidebarRemoveFails );
							}
							$this.removeClass( 'hidden' ).next( '.spinner' ).removeClass( 'is-active' );
						} else {
							$this.closest( '.sidebar-soledad-custom-sidebar' ).remove();
							PENCIWIDGETS.customSidebar.rearrangeColumns();
						}
					} );
				}

			});

		},
		addIconRemoveSidebar: function ( ) {
			var titleSidebar = $('#widgets-right .sidebar-soledad-custom-sidebar .sidebar-name h2 .spinner');
			titleSidebar.each(function() {
				if ( ! $(this).prev('.soledad-remove-custom-sidebar').length) {
					$(this).before('<a class="soledad-remove-custom-sidebar" href="#"><span class="notice-dismiss"></span></a>');
				}
			});
		},
		rearrangeColumns: function () {
			var	$left = $('#wpbody-content > .wrap #widgets-right .sidebars-column-1'),
				$right = $('#wpbody-content > .wrap #widgets-right .sidebars-column-2');

			if ( $left.children().length - $right.children().length > 2 ) {
				$left.children().last().prependTo( $right );
			} else if ( $right.children().length >= $left.children().length) {
				$right.children().first().appendTo( $left );
			}
		}
	};

	/* Init functions
	 ---------------------------------------------------------------*/
	$( document ).ready( function () {
		PENCIWIDGETS.customSidebar.init();
	});
} );

