<?php
/**
 * Text - form input field
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
$a['value'] = isset( $a['group_id'] ) ? Amo_Team_Showcase_AVH::get_group_field_standard_or_array_value( $opts, $a, true ) : Amo_Team_Showcase_AVH::get_standard_or_array_value( $opts, $a['id'], $a['std'], true );
$name = isset( $metabox ) ? Amo_Team_Showcase_AVH::metabox_or_normal_input_name( $metabox, $a ) : Amo_Team_Showcase_AVH::metabox_or_normal_input_name( false, $a );
?>

<div class="{p}setting-group<?php echo ' ', $a['class'] ?>">
	<div class="{p}setting {p}setting--switch">
		<!-- Switch ON/OFF -->
		<div class="{p}setting__label {p}margin-bottom-10"><?php echo $a['title'] ?></div>
		<div class="{p}clearfix"></div>
		<input type="radio" class="{p}setting__input-switch" id="{p}<?php echo $a['id'] ?>_left" name="<?php echo $name ?>" value="1" <?php checked( $a['value'], '1' ) ?>/>
		<label class="{p}setting__label-switch" for="{p}<?php echo $a['id'] ?>_left"><?php _ex( 'ON', 'input/button label', 'amo-team' ) ?></label>
		<input type="radio" class="{p}setting__input-switch" id="{p}<?php echo $a['id'] ?>_right" name="<?php echo $name ?>" value="0" <?php checked( $a['value'], '0' ) ?> />
		<label class="{p}setting__label-switch" for="{p}<?php echo $a['id'] ?>_right"><?php _ex( 'OFF', 'input/button label', 'amo-team' ) ?></label>
	</div><!-- .setting -->
	<div class="{p}setting__desc {p}text"><?php echo $a['desc'] ?></div>
</div><!-- .setting-group -->

