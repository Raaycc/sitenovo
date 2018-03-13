<?php
/**
 * General warning / notice | Admin pages
 *
 * Reference:
 * $a  – Arguments, an array of variables for the template
 * {p} – Plugin prefix for CSS classes/ids, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */
?>
<div id="{p}<?php echo  $a['id'] ?>" class="notice-<?php echo $a['notice-type'] ?> notice<?php echo $a['is-dismissible'] ? ' is-dismissible' : '' ?>"><p><?php echo $a['message'] ?></p></div>

<script>
	(function( $ ) {
		'use strict';
		$( document ).ready( function() {
			$( '#<?php echo AMO_TEAM_SHOWCASE_CSS_PREFIX . $a['id'] ?>' ).on( 'click', '.notice-dismiss', function() {

				var data = {
					'action':   'hide_admin_notice',
					'security': '<?php echo $a['nonce'] ?>',
					'id':       '<?php echo $a['id'] ?>'
				};

				$.ajax( {
					type:       "POST",
					url:        ajaxurl,
					data:       data,
					beforeSend: function() {
						$( 'body' ).addClass( '<?php echo AMO_TEAM_SHOWCASE_CSS_PREFIX ?>ajax-loading' );
					},
					complete: function( response ) {
						$( 'body' ).removeClass( '<?php echo AMO_TEAM_SHOWCASE_CSS_PREFIX ?>ajax-loading' );
					}
				} );

			} ); // end click
		} ); // ready
	})( jQuery );
</script>
