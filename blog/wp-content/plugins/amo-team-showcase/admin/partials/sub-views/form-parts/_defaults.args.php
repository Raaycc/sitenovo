<?php
/**
 * Default arguments for form part/input types
 *
 * @since   1.0.0
 */
return array(

	'text' => array(
		'title'        => '',
		'desc'         => '',
		'sanitization' => 'text',
		'std'          => '',
		'id'           => '',
		'class'        => '',
		'placeholder'  => '',
	),

	'textarea' => array(
		'title'       => '',
		'desc'        => '',
		'std'         => '',
		'rows'        => '3',
		'sanitize'    => true,
		'id'          => '',
		'class'       => '',
		'placeholder' => '',
	),

	'number' => array(
		'title'       => '',
		'desc'        => '',
		'std'         => '',
		'min'         => 0,
		'id'          => '',
		'placeholder' => '',
	),

	'color-picker' => array(
		'title' => '',
		'desc'  => '',
		'std'   => '',
		'id'    => '',
		'alpha' => 'false',
	),

	'switcher' => array(
		'title' => '',
		'desc'  => '',
		'std'   => '',
		'id'    => '',
		'class' => '',
	),

	'select' => array(
		'title'   => '',
		'desc'    => '',
		'std'     => '',
		'options' => array(),
		'id'      => '',
	),

	'upload' => array( // upload to / choose from media library
		'title'       => '',
		'desc'        => '',
		'std'         => '',
		'placeholder' => '',
		'id'          => '',
		'class'       => '',
	),

	'group' => array(
		'title'                 => '',
		'desc'                  => '',
		'repeatable'            => true,
		'row_limit'             => 12,
		'button_name'           => __( 'Add New One', 'amo-team' ),
		'remove_row_aria_label' => __( 'Remove this group.', 'amo-team' ),
		'limit_reached_notice'  => __( 'The limit is reached, you can have only %LIMIT% groups.', 'amo-team' ),
		'fields'                => array(),
		'id'                    => '',
	),

	'section-heading' => array(
		'heading' => '',
		'desc'    => '',
	),

	'tab-pane-open' => array(
		'heading' => '',
		'desc'    => '',
		'tab-id'  => '',
		'active'  => false,
	),

	'close-elem'   => array(
		'elem'    => 'div',
		'comment' => '',
	),

	// SPECIFIC PARTS
	'social-icons' => array(
		'title'  => '',
		'desc'   => '',
		'id'     => '',
		'fields' => array(),
	),

);
