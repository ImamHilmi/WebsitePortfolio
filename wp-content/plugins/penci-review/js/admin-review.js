jQuery( function ( $ ) {
	'use strict';

	function widgetImg() {
		var frame = wp.media( {
			title: PenciReview.WidgetImageTitle,
			multiple: false,
			library: {type: 'image'},
			button: {text: PenciReview.WidgetImageButton}
		} );

		$( 'body' )
			.on( 'click', '.penci-widget-image__select_review', function ( e ) {
				e.preventDefault();
				var $this = $( this ),
					$input = $this.siblings( 'input' ),
					$image = $this.siblings( 'img' ),
					$placeholder = $this.prev(),
					$savewidget = $this.closest( '.widget-inside' ).find( '.widget-control-save' );

				frame.off( 'select' )
				     .on( 'select', function () {
					     var id = frame.state().get( 'selection' ).toJSON()[0].id;
					     var url = frame.state().get( 'selection' ).toJSON()[0].url;
					     $input.val( id );
					     $input.data( 'url', url );
					     $image.attr( 'src', url ).removeClass( 'hidden' );
					     $placeholder.addClass( 'hidden' );
					     $savewidget.prop( "disabled", false );
				     } )
				     .open();
			} )
			.on( 'click', '.penci-widget-image__remove', function ( e ) {
				e.preventDefault();
				var $this = $( this ),
					$input = $this.siblings( 'input' ),
					$image = $this.siblings( 'img' ),
					$placeholder = $this.prev().prev(),
					$savewidget = $this.closest( '.widget-inside' ).find( '.widget-control-save' );

				$input.val( '' );
				$image.addClass( 'hidden' );
				$placeholder.removeClass( 'hidden' );
				$savewidget.prop( "disabled", false );
			} )
			.on( 'change', '.penci-widget-image__input', function ( e ) {
				e.preventDefault();
				var $this = $( this ),
					url = $this.data( url ),
					$image = $this.siblings( 'img' );
				$image.attr( 'src', url )[url ? 'removeClass' : 'addClass']( 'hidden' );


			} );
	};


	function changeReviewSchema( ) {
		$('#penci_review_schema_markup').on( 'change', function() {
			var selected_val = $(this).val();

			$( '.penci-review_schema_fields' ).hide();
			$( '.penci-review_' + selected_val +  '_fields' ).show();
		}).change();
		$( '.penci-datepicker' ).datepicker();
	}


	$( document ).ready( function () {
		widgetImg();
		changeReviewSchema();
	} );

});