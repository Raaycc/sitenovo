(function( $ ) {
	'use strict';
	/*  Enhance Contact Form functionality for IE < 10 (e.g. IE9)
	 --------------------------------------------------------------------*/
	var ua       = window.navigator.userAgent;
	var msie     = ua.indexOf( "MSIE " );
	var IELess10 = parseInt( ua.substring( msie + 5, ua.indexOf( ".", msie ) ) ) < 10;

	if ( IELess10 ) {
		$( '.amoteam-js-setting-text-field' ).each( function() {
			var $this = $( this );
			if (! $this.val() ) {
				$this.val( $this.attr( "placeholder" )  );
			}
		} );

	} // end IF IELess10

})( jQuery );