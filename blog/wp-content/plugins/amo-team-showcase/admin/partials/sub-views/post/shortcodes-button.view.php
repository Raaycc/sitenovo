<?php
/**
 * Shortcodes Button | After "Add Media" button before WP editor
 * File named after its ID attribute
 *
 * Reference:
 * $a  – Arguments, an array of variables for the template
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */
?>
<a id="{p}shortcodes-button" class="button {p}shortcodes-button" data-backdrop="static" data-toggle="modal" data-target="#AmoTeamShortcodesModal"><span class="wp-media-buttons-icon"></span><?php _ex( 'AMO Team', 'button label', 'amo-team' ) ?></a>
