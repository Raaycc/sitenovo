(function( $ ) {
	'use strict';

	/* Post or Page */

/*--------------------------------------------------------------------
 ▐	1. SPECIFIC
 --------------------------------------------------------------------*/
	// Shortcode modal block
	var shortcodeModal = $( '#AmoTeamShortcodesModal' ),
	    wpWrap = $( '#wpwrap' );


	// Shortcodes button, prevent post/page submission
	$( '#amoteam-shortcodes-button' ).on( 'click', function(e) {
		e.preventDefault();

		// mobile fix
		wpWrap.css( 'position', 'relative' );
	} );


	// Generate shortcode and insert it in WP editor
	shortcodeModal.on( 'click', '.amoteam-modal__sc-block', function(e) {
		var shortcode,
		    lineBreak;

		// if user clicks help icon don't add shortcode
		if ( ! $( e.target ).hasClass( 'amoteam-modal__sc-help' ) ) {
			// Check whether tinyMCE editor in Visual or Text mode, and set proper line break for shortcodes
			lineBreak = ( ( typeof tinyMCE != 'undefined' ) && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden() ) ? '<br/>' : '\n';

			switch ($(this).data( 'shortcode' )) {
				case 'bio':
					shortcode = '[amoteam_text title="Your Title" subtitle=""]Your text[/amoteam_text]' + lineBreak;
					break;
				case 'skills':
					shortcode = '[amoteam_skills title="Your Title"]' + lineBreak + '[amoteam_skill title="Photoshop" percent="92"]' + lineBreak + '[amoteam_skill title="HTML" percent="85"]' + lineBreak + '[amoteam_skill title="CSS" percent="90"]' + lineBreak + "[/amoteam_skills]" + lineBreak;
					break;
				case 'team':
					shortcode = '[amoteam max="50" categories="" item-width="250" item-margin="20" full-width="yes" panel="right"]' + lineBreak;
					break;
				default:
					break;
			} // SWITCH

			// hide shortcode modal
			shortcodeModal.modal( 'hide' );

			wpWrap.css( 'position', '' );

			// insert shortcode in the editor
			window.wp.media.editor.insert( shortcode );

		} // IF not help icon

	} ); // ON click


})( jQuery );