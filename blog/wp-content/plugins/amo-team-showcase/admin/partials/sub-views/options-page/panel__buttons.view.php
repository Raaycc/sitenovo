<?php
/**
 * Panel with buttons template | Options page
 *
 * File named after its CSS class
 *
 * Reference:
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */
?>
<div class="{p}panel__buttons">
	<a target="_blank" href="//amothemo.com/docs/amo-team-showcase-documentation/<?php echo Amo_Team_Showcase_AVH::get_lang_from_locale('/')?>" class="{p}btn {p}btn--panel-big"><?php _e( 'Documentation', 'amo-team' ) ?></a>
	<button type="button" id="{p}reset-settings" class="{p}btn {p}btn--panel-big"><?php _e( 'Reset All Settings', 'amo-team' ) ?></button>
	<label for="submit-form" class="{p}btn {p}btn--panel-big {p}btn--green"><?php _e( 'Save Changes', 'amo-team' ) ?></label>
</div><!-- .panel__buttons -->
