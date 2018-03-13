<?php
/**
 * Social Icons Block - special input field for team member metabox
 *
 * Reference:
 * $a  – Arguments, an array of predefined values for the current field
 * $this  – Renderer's class object
 * $opts  – Option values, an array of values, which is saved in plugin's options / in post metadata
 * $metabox  – If the variable is set, then this form input will be used in a post metabox, thus it's name attribute
 *             will be set to a $metabox array, e.g.: amo-team-showcase['input_value_example']
 *
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */


// if there is no saved values in database yet
if ( ! isset( $opts[ $a['id'] ] ) ) {
	$opts[ $a['id'] ] = array( array( $a['fields'][0]['id'] => '', $a['fields'][1]['id'] => '' ) );
}

# Assemble essential variables (for render/assemble function) for inner fields of the group
$extra_vars = array(
	array(
		'name'  => 'opts', // wil be $opts in the template
		'value' => $opts
	),
);

if ( isset( $metabox ) ) {
	$extra_vars[] = array(
		'name'  => 'metabox', // wil be $opts in the template
		'value' => $metabox
	);
} // end IF

?>

<div id="{p}grouped-fields" class="{p}setting-group {p}grouped-fields">
	<ul id="{p}grouped-fields__wrap" class="{p}setting {p}grouped-fields__wrap">

	   <?php foreach ( $opts[ $a['id'] ] as $index_key => $values ) : ?>
			 <li class="{p}grouped-fields__group">

				 <div class="{p}grouped-fields__heading-wrap">
					 <h4><?php echo $a['title'] ?><span class="grouped-fields__num"><?php echo( $index_key + 1 ) ?></span></h4>
					 <button type="button" class="{p}btn {p}btn--panel-sign {p}grouped-fields__close {p}l-center-translate-v"
							 aria-label="<?php _ex( 'Remove this group', 'button label', 'amo-team' ) ?>"><i
								 class="{p}icon-close"></i></button>
					 <button type="button" class="{p}btn {p}btn--panel-sign {p}grouped-fields__collapse {p}l-center-translate-v"
							 aria-label="<?php _ex( 'Collapse panel', 'button label', 'amo-team' ) ?>"><i
								 class="{p}icon-angle-down-1 {p}grouped-fields__collapse-icon"></i></button>
				 </div><!-- .grouped-fields__heading-wrap -->

				 <div class="{p}grouped-fields__content">
				 <?php
				 // Add group name to the fields
				 $group_fields = array();
				 foreach ( $a['fields'] as $field ) {
					 $field['group_id'] = $a['id'];
					 $field['group_row_index'] = $index_key;
					 $group_fields[]    = $field;
				 }

				 // Add another essential variable (for render/assemble function)
				 array_unshift( $group_fields, 'form-parts' );

				 # output inner fields
				 echo $this->assemble_sub_views_for_page( $group_fields, 'sub-views', $extra_vars );
				 ?>
				 </div> <!-- .grouped-fields__content -->

			 </li><!-- .grouped-fields__group -->
	   <?php endforeach; // $opts ?>

	</ul><!-- .grouped-fields__groups -->
	<div class="{p}setting__desc {p}text"><?php echo $a['desc'] ?></div>

	<div class="{p}clearfix {p}js-grouped-fields-end hidden"><?php echo str_replace( '%LIMIT%', $a['row_limit'], $a['limit_reached_notice']) ?></div>

	<div class="{p}clearfix"></div>
	<button type="button" id="{p}js-add-icon-block" class="{p}btn {p}btn--metabox-icon"><?php echo $a['button_name'] ?><i
				class="{p}icon-plus"></i></button>
</div><!-- .social-icons -->
