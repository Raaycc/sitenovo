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
$a['value'] = isset( $a['group_id'] ) ? Amo_Team_Showcase_AVH::get_group_field_standard_or_array_value( $opts, $a ) : Amo_Team_Showcase_AVH::get_standard_or_array_value( $opts, $a['id'], $a['std'] );
$name = isset( $metabox ) ? Amo_Team_Showcase_AVH::metabox_or_normal_input_name( $metabox, $a ) : Amo_Team_Showcase_AVH::metabox_or_normal_input_name( false, $a );

?>

<div class="{p}setting-group">
	<div class="{p}setting {p}setting--select">
		<label class="{p}setting__label" for="{p}<?php echo $a['id'] ?>"><?php echo $a['title'] ?></label>
		<div class="{p}setting__wrap">
			<select class="{p}setting__input" name="<?php echo $name ?>" id="{p}<?php echo $a['id'] ?>">
				<?php foreach ( $a['options'] as $key => $option ) : ?>
					<option <?php selected( $a['value'], $key ) ?> value="<?php echo esc_attr( $key )?>"><?php echo $option?></option>
				<?php endforeach; ?>
			</select>
			<i class="{p}icon-angle-down-1"></i>
		</div><!-- .setting__wrap -->
	</div><!-- .setting--select -->
	<div class="{p}setting__desc {p}text"><?php echo $a['desc'] ?></div>
</div><!-- .setting-group -->