(function( $ ) {
	'use strict';

// IF this is an AMO Team specific page not a generic WP one
if ($('body.post-type-amo-team').length) {


/*--------------------------------------------------------------------
 ▐	1. UPDATE ORDER FIELD | Team Members page
 --------------------------------------------------------------------*/
	$( '.wp-list-table.posts' ).on( 'change', '.amoteam-member-order', function() {
		var $this = $( this );

		var data = {
			action:    'update_member_order',
			security:  $this.data( 'nonce' ),
			postID:    ($this.parents( '.type-amo-team' ).attr( 'id' )).match( (/\d+$/) || [] ).pop(),
			postOrder: $this.val()
		};

		$.ajax( {
			type:       "POST",
			url:        ajaxurl,
			data:       data,
			beforeSend: function() {
				$( 'body' ).addClass( 'amoteam-ajax-loading' );
			},
			complete: function( jqXHR_object ) {
				$( 'body' ).removeClass( 'amoteam-ajax-loading' );
				console.log( jqXHR_object.responseText );
			}
		} );

	} ); // end click




} // end IF this is an AMO Team specific page not a generic WP one


})( jQuery );