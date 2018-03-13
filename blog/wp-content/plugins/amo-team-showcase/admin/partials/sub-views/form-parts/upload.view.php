<?php
/**
 * Upload - form input field for upload to / choose from media library
 *
 * Reference:
 * $a  – Arguments, an array of predefined values for the current field
 * $opts  – Option values, an array of values, which is saved in plugin's options / in post metadata
 * $metabox  – If the variable is set, then this form input will be used in a post metabox, thus it's name attribute
 *             will be set to a $metabox array, e.g.: amo-team-showcase['input_value_example']
 *
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */

$a['id']    = Amo_Team_Showcase_AVH::get_id_from_title( $a['title'], $a['id'] );
$a['value'] = isset( $a['group_id'] ) ? Amo_Team_Showcase_AVH::get_group_field_standard_or_array_value( $opts, $a ) : Amo_Team_Showcase_AVH::get_standard_or_array_value( $opts, $a['id'], $a['std'] );
//$a['placeholder'] = Amo_Team_Showcase_AVH::get_standard_or_array_value( $a, 'placeholder', $a['title'] );
$name = isset( $metabox ) ? Amo_Team_Showcase_AVH::metabox_or_normal_input_name( $metabox, $a, 'url' ) : Amo_Team_Showcase_AVH::metabox_or_normal_input_name( false, $a, 'url' );
?>
<div class="{p}setting-group {p}setting-group--upload<?php echo ' ', $a['class'] ?>">
	<div class="{p}setting">
		<label class="{p}setting__label" for="{p}<?php echo $a['id'] ?>"><?php echo $a['title'] ?></label>
		<input type="hidden" class="{p}setting__input {p}js-setting-text-field"
		       id="{p}<?php echo $a['id'] ?>"
		       name="<?php echo $name ?>"
		       value="<?php echo esc_url( $a['value'] ) ?>"
		       placeholder="<?php //echo $a['placeholder'] ?>">
		<div class="{p}setting-group--upload__img-wrap hidden">
			<img class="{p}setting-group--upload__img" src="" />
			<button type="button" class="amoteam-btn amoteam-btn--panel-sign {p}btn--panel-sign--2 {p}js-upload-img-close" aria-label="<?php _ex( 'Unset/Remove the image', 'button label', 'amo-team' ) ?>"><i class="amoteam-icon-close"></i></button>
		</div>

		<div class="{p}clearfix"></div>
		<button type="button" class="{p}js-media-library-upload {p}btn {p}btn--metabox-icon"><?php _ex( 'Set Image', 'button label', 'amo-team' ) ?><i class="{p}icon-image"></i></button>

	</div><!-- .setting -->
	<div class="{p}setting__desc {p}text"><?php echo $a['desc'] ?></div>

	<div class="{p}clearfix"></div>

</div><!-- .setting-group -->