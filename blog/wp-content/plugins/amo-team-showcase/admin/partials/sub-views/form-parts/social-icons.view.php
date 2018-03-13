<?php
/**
 * Social Icons Block - special input field for team member metabox
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

// Set metabox array for input name attribute - amo-team-member-metabox[social-icon-blocks]
$social_icons_array_name = isset( $metabox ) ? "{$metabox}[{$a['id']}]" : '';

// if is new team member
if ( ! isset( $opts[ $a['id'] ] ) ) {
	( $opts[ $a['id'] ] = array( array( $a['fields'][0]['id'] => '', $a['fields'][1]['id'] => '' ) ) );
}

?>


<div id="{p}social-icons" class="{p}setting-group {p}social-icons">
	<ul id="{p}social-icons__wrap" class="{p}setting {p}social-icons__wrap">
		<?php foreach ( $opts[ $a['id'] ] as $meta_key => $meta_vals ) :
			$meta_vals['select_icon'] = Amo_Team_Showcase_AVH::get_standard_or_array_value( $meta_vals, $a['fields'][0]['id'], $a['fields'][0]['std'] );
			$meta_vals['social_link'] = Amo_Team_Showcase_AVH::get_standard_or_array_value( $meta_vals, $a['fields'][1]['id'], $a['fields'][1]['std'] );
			?>

			<li class="{p}social-icon__group">

			<div class="{p}social-icon__heading-wrap">
			<h4><?php echo $a['title'] ?><span class="social-icon__num"><?php echo ($meta_key + 1) ?></span></h4>
				<button type="button" class="{p}btn {p}btn--panel-sign {p}social-icon__close {p}l-center-translate-v" aria-label="<?php _ex( 'Remove this social icon', 'button label', 'amo-team' ) ?>"><i class="{p}icon-close"></i></button>
				<button type="button" class="{p}btn {p}btn--panel-sign {p}social-icon__collapse {p}l-center-translate-v" aria-label="<?php _ex( 'Collapse panel', 'button label', 'amo-team' ) ?>"><i class="{p}icon-angle-down-1 {p}social-icon__collapse-icon"></i></button>
			</div><!-- .social-icon__heading-wrap -->

			<div class="{p}social-icon__content">

				<div class="{p}social-icon__input {p}setting--select">
					<label class="{p}setting__label screen-reader-text" for="{p}<?php echo $a['fields'][0]['id'] ?>"><?php echo $a['fields'][0]['title'] ?></label>
					<div class="{p}setting__wrap">
						<select class="{p}setting__input" name="<?php echo $social_icons_array_name, '['.$meta_key.']', '[', $a['fields'][0]['type'] . '__' . $a['fields'][0]['id'], ']' ?>" id="{p}<?php echo $a['fields'][0]['id'] ?>">
							<?php foreach ( $a['fields'][0]['options'] as $select_key => $option ) { ?>
								<option <?php selected( $meta_vals['select_icon'] , $select_key ) ?> value="<?php echo esc_attr( $select_key )?>"><?php echo $option?></option>
							<?php }; ?>
						</select>
						<i class="{p}icon-angle-down-1"></i>
					</div><!-- .setting__wrap -->
					<div class="{p}social-ico__desc {p}text"><?php echo $a['fields'][0]['desc'] ?></div>
				</div><!-- .social-icon__input -->

				<div class="{p}social-icon__input">
					<label class="{p}setting__label screen-reader-text" for="{p}<?php echo $a['fields'][1]['id'] ?>"><?php echo $a['fields'][1]['title'] ?></label>
					<input type="text" class="{p}setting__input"
					       id="{p}<?php echo $a['fields'][1]['id'] ?>"
					       name="<?php echo $social_icons_array_name, '['.$meta_key.']', '[', $a['fields'][1]['type'] . '__' . $a['fields'][1]['id'], ']' ?>"
					       value="<?php echo esc_attr( $meta_vals['social_link'] ) ?>"
					       placeholder="<?php echo $a['fields'][1]['placeholder'] ?>">
					<div class="{p}social-ico__desc {p}text"><?php echo $a['fields'][1]['desc'] ?></div>
				</div><!-- .social-icon__input -->


			</div> <!-- .social-icon__content -->

		</li>
		<?php endforeach; ?>
	</ul><!-- .social-icon__groups -->
	<div class="{p}setting__desc {p}text"><?php echo $a['desc'] ?></div>

	<div class="{p}clearfix {p}js-social-icon-end"></div>

	<div class="{p}clearfix"></div>
	<button type="button" id="{p}js-add-icon-block" class="{p}btn {p}btn--metabox-icon"><?php _e( 'Add New Icon', 'amo-team' ) ?><i class="{p}icon-plus"></i></button>
</div><!-- .social-icons -->
