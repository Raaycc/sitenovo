<?php
/**
 * The class holds helper functions for Admin views/partials/form inputs.
 *
 * @package    Amo_Team_Showcase
 * @subpackage Amo_Team_Showcase/admin
 * @author     AMO Themo (Oleg Goltsev)
 * @since      1.0.0
 */
class Amo_Team_Showcase_AVH {

	// Prevents instantiation of the class
	private function __construct() {}
	private function __clone() {}

	/*-------------------------------------------------------------------
	▐	1. GENERAL
	--------------------------------------------------------------------*/
	/**
	 * Returns specified standard value, if there is no certain/real value in array of arguments/options
	 *
	 * @since    1.0.0
	 */
	static public function get_standard_or_array_value( $vals_array, $real_val, $std_value = '', $strict = false ) {

		// strict comparison
		if ( $strict ) {
			return (isset( $vals_array[ $real_val ] ) && $vals_array[ $real_val ] !== false ) ? $vals_array[ $real_val ] : $std_value;
		} else {
			return (isset( $vals_array[ $real_val ] ) && $vals_array[ $real_val ] ) ? $vals_array[ $real_val ] : $std_value;
		}
	} // options_value_check | FNC


	/**
	 * Get first part (i.e. - ru) out of current locale (i.e. - ru_RU)
	 *
	 * @since    1.0.0
	 */
	static public function get_lang_from_locale( $appendix = '', $return_eng = true, $restrict_langs = true ) {
		$lang = substr( get_locale() , 0, 2 );

		// if only certain languages are allowed
		if ( $restrict_langs ) {
			$allowed_langs = array( 'en', 'ru' );
			if ( ! in_array( $lang, $allowed_langs ) ) {
				$lang = 'en';
			}
		}

		return ( ! $return_eng && $lang == 'en' ) ? '' : $lang . $appendix;
	} // get_lang_from_locale | FNC



	/*-------------------------------------------------------------------
	▐	2. FORMS, FORM FIELDS
	--------------------------------------------------------------------*/
	/**
	 * Assemble proper value for form input name attribute.
	 * Depending on whether it's used in plugin options or member metabox
	 *
	 * @since    1.0.0
	 */
	static public function metabox_or_normal_input_name( $metabox, $a, $type = false, $sanitize = true ) {

		$type = $type ? $type : $a['type'];
		// if false don't sanitize
		if ( ! $sanitize ) $type = 'nosan_' . $type;

		// if field of a group field
		if ( isset( $a['group_id'] ) ) {
			return  $metabox ? "{$metabox}[{$a['group_id']}][{$a['group_row_index']}][{$type}__{$a['id']}]" : $type . '__' . $a['id'];

		// normal field
		} else {
			return  $metabox ? "{$metabox}[{$type}__{$a['id']}]" : $type . '__' . $a['id'];
		}

	} // metabox_or_normal_input_name | FNC


	/**
	 * Creates proper ID for a form input from 'title' argument
	 *
	 * @since    1.0.0
	 */
	static public function get_id_from_title( $title, $id ) {
		if ( $id ) {
			return $id;
		} else {
			return str_replace( ' ', '-', strtolower( $title ) );
		}
	} // input_name_and_id_from_title | FNC


	/**
	 * Returns specified standard value, if there is no certain/real value in array of arguments/options
	 *
	 * @since    1.0.0
	 */
	static public function get_group_field_standard_or_array_value( $opts, $a, $strict = false ) {

		// strict comparison
		if ( ( $strict ? $opts[ $a['group_id'] ] !== false : $opts[ $a['group_id'] ] ) ) {
			return ! empty ($opts[ $a['group_id'] ][ $a['group_row_index'] ][ $a['id'] ]) ? $opts[ $a['group_id'] ][ $a['group_row_index'] ][ $a['id'] ] : $a['std'];
		} else {
			return $a['std'];
		} // end IF

	} // options_value_check | FNC


} // CLASS
