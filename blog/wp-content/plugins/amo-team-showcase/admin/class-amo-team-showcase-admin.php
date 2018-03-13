<?php

/**
 * The class responsible for admin-specific functionality of the plugin.
 *
 * @package    Amo_Team_Showcase
 * @subpackage Amo_Team_Showcase/admin
 * @author     AMO Themo (Oleg Goltsev)
 * @since      1.0.0
 */
class Amo_Team_Showcase_Admin {

	/**
	 * The renderer (reference to object saved in Amo_Team_Showcase class instance)
	 * that's responsible for rendering partials (view templates) of the plugin
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var object Amo_Team_Showcase_Views_Renderer $renderer
	 */
	public $renderer;

	/**
	 * Reference to the instance of Amo_Team_Showcase, where all general (admin and public) functions/properties reside.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var object Amo_Team_Showcase $gpo
	 */
	private $gpo;

	/**
	 * Main folder for sub views of partials folder, i.e.: form fields, notices, etc.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var string Amo_Team_Showcase $main_subviews_folder
	 */
	private $main_subviews_folder = 'sub-views';


	/**
	 * Required WP version, on which the plugin is guaranteed to work properly.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $required_wp_version
	 */
	protected $required_wp_version;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since  1.0.0
	 * @param  object $general_plugin_obg - Reference to Amo_Team_Showcase object, where all general functions/properties reside.
	 */
	public function __construct( $general_plugin_obg, $required_wp_version ) {
		// Translate plugin's meta
		__( 'AMO Team Showcase', 'amo-team' );
		__( 'AMO Themo (Oleg Goltsev)', 'amo-team' );
		__( 'Easily showcase members of your team/company and their info in sleek, responsive and professional way.', 'amo-team' );

		$this->gpo = $general_plugin_obg;
		$this->required_wp_version = $required_wp_version;

	} // __construct | FNC


	/*-------------------------------------------------------------------
	▐	1. ENQUEUE ADMIN | styles and scripts
	--------------------------------------------------------------------*/
	/**
	 * Register the stylesheets and JavaScript files for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles_and_scripts( $hook_suffix ) {
		require 'amo-team-showcase-admin-enqueue.php';
	} // enqueue_styles_and_scripts | FNC


	/*-------------------------------------------------------------------
	▐	2. ADMIN NOTICES / WARNINGS
	--------------------------------------------------------------------*/
	/**
	 * Shows admin notices of the plugin, if user have not disabled them yet
	 *
	 * @since    1.0.0
	 */
	public function general_plugin_notices() {
		$system_options = get_option( $this->gpo->get_plugin_name() . '-system' );

		# Displays a warning if WP version is less than required one.
		if ( $system_options['notice-wp-version'] && version_compare( $GLOBALS['wp_version'], $this->required_wp_version, '<' ) ) {

			$this->gpo->render_dependencies( $this, false);
			$notices_args[] = array(
				'id'             => 'notice-wp-version',
				'message'        => sprintf( '<b>%s:</b> %s', __( 'Warning', 'amo-team' ), sprintf( __( 'Amo Team Showcase plugin requires at least WordPress version %s and you are running version %s. Please <a href="%s">update WordPress</a>.', 'amo-team' ), $this->required_wp_version, $GLOBALS['wp_version'], admin_url( 'update-core.php' ) ) ),
				'notice-type'    => 'warning',
				'is-dismissible' => true,
				'nonce'          => wp_create_nonce( 'hide_admin_notice' ),
			);
			$one_notice_loaded = true;
		} # IF | WP version

		# Displays a notice about WordPress thumbnails and their regeneration
		if ( $system_options['notice-thumb'] ) {

			$this->gpo->render_dependencies( $this, false);
			$notices_args[] = array(
				'id'             => 'notice-thumb',
				'message'        => sprintf( '<strong>%s</strong> %s', __( 'AMO Team Showcase plugin notice.', 'amo-team' ), _x( 'With this plugin you should only use the images, which you have uploaded after plugin\'s activation. Because the plugin creates certain image size/format for its thumbnails. To make images uploaded to your Media Library prior plugin\'s activation have that format too, you can "regenerate thumbnails" using this plugin –', 'at the end goes link to the plugin', 'amo-team' ) ) . ' <a target="_blank" href="https://' . Amo_Team_Showcase_AVH::get_lang_from_locale( '.', false, false ) . 'wordpress.org/plugins/regenerate-thumbnails/">Regenerate Thumbnails</a>.',
				'notice-type'    => 'info',
				'is-dismissible' => true,
				'nonce'          => wp_create_nonce( 'hide_admin_notice' ),
			);
			$one_notice_loaded = true;
		} # IF | WP version

		# if at least one notice is loaded
		if ( isset( $one_notice_loaded ) && isset($notices_args) ) {

			// Render the notices
			foreach ( $notices_args as $args_array ) {
				$this->renderer->set_variables( $args_array );
				echo $this->renderer->render( 'notice-general', 'specific' );
			} // FOREACH

			// Render the "ajax-loader" modal
			//add_action( 'admin_footer', array($this, 'output_ajax_loader_animation') ); // FNC
		} # IF | one notice is loaded

	} // FNC | general_plugin_notices


	/**
	 * Outputs ajax loader image, which shows loading animation when Ajax request is in progress
	 *
	 * @since    1.1.2
	 */
	public function output_ajax_loader_animation() {
	   $this->gpo->render_dependencies( $this, false);
	   echo $this->renderer->render( 'ajax-loader', 'specific' );
   } // FNC


	/**
	 * AJAX function to hide "regenerate thumbnails" admin notice,
	 * which becomes visible on plugin's activation
	 *
	 * @since    1.0.0
	 */
	public function hide_admin_notice() {
		check_ajax_referer( 'hide_admin_notice', 'security' );

		$system_options = get_option( $this->gpo->get_plugin_name() . '-system' );
		// turn of the notice by its id
		if ( isset( $_POST['id'] ) && $_POST['id'] ) {
			$system_options[$_POST['id']] = false;
		}
		update_option( $this->gpo->get_plugin_name() . '-system', $system_options );
		wp_die();
	} // FNC


	/*  3. MAIN SANITIZATION FUNCTION | Before to save in DB
	-------------------------------------------------------------------*/
	/**
	 * Sanitization of admin form values (plugin options and member metaboxes), on form submission.
	 *
	 * @since    1.0.0
	 */
	public function sanitize_form_input_values( $values_array, $metabox = false ) {
		$sanitized_vals = array();
		$metabox_key = '';
		$metabox_san_values = array();
		$sanitize = true;

		/*  Sanitize the values
		--------------------------------------------------------------------*/
		foreach ( $values_array as $key => $val ) {

			// if we have multidimensional array from metabox field
			if (  ! $metabox && is_array($val) ) {
				foreach ( $val as $key2 => $metabox_vals ) {
					$metabox_san_values[] = $this->sanitize_form_input_values( $metabox_vals, true );
				} // FOREACH
				$metabox_key = $key;
			} // IF array from metabox field

			// if no sanitization
			if ( false !== strpos( $key, 'nosan_' ) ) {
				$sanitize = false;
				$key = ( substr( $key, strlen( 'nosan_' ) ) );
			} // if no sanitization


			if ( false !== strpos( $key, 'number__' ) ) { // number input type
				// delete 'number__' from the input name ($key) and sanitize its value
				$sanitized_vals[ ( substr( $key, strlen( 'number__' ) ) ) ] = $sanitize ? absint( $val ) : $val;

			} elseif ( false !== strpos( $key, 'url__' ) ) { // text input type
				// delete 'text__' from the input name ($key) and sanitize its value
				$sanitized_vals[ ( substr( $key, strlen( 'url__' ) ) ) ] = $sanitize ? esc_url_raw( $val ) : trim( $val );

			} elseif ( false !== strpos( $key, 'text__' ) ) { // text input type
				// delete 'text__' from the input name ($key) and sanitize its value
				$sanitized_vals[ ( substr( $key, strlen( 'text__' ) ) ) ] = $sanitize ? sanitize_text_field( $val ) : trim( $val );

			} elseif ( false !== strpos( $key, 'switcher__' ) ) { // text input type
				// delete 'switcher__' from the input name ($key) and sanitize its value
				$sanitized_vals[ ( substr( $key, strlen( 'switcher__' ) ) ) ] = $sanitize ? absint( $val ) : $val;

			} elseif ( false !== strpos( $key, 'select__' ) ) { // text input type
				// delete 'select__' from the input name ($key) and sanitize its value
				$sanitized_vals[ ( substr( $key, strlen( 'select__' ) ) ) ] = $sanitize ? sanitize_text_field( $val ) : $val;
			} // IF

		} // FOREACH

		// IF it was sanitization for metabox
		if ( $metabox ) {
			$metabox_san_values = $sanitized_vals;
			$sanitized_vals = array();
		} else {
			if ( $metabox_key ) {
				$sanitized_vals[$metabox_key] = $metabox_san_values;
			}
		} // IF

		return $metabox ? $metabox_san_values : $sanitized_vals;

	} // sanitize_form_input_values | FNC


	/*-------------------------------------------------------------------
	▐	4. OPTIONS PAGE | And functionality related to it
	--------------------------------------------------------------------*/
	/**
	 * Adds plugin's options menu item to the admin panel.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_options_menu() {

		// Adds plugin's options menu item to WP panel
		add_submenu_page(
			'edit.php?post_type=amo-team',
			__( 'AMO Team Options', 'amo-team' ),
			__('Options', 'amo-team' ),
			'manage_options',
			'amo-team-options',
			array( $this, 'display_options_page' )
		);
	} // FNC


	/**
	 * Displays plugin options page.
	 *
	 * @since    1.0.0
	 */
	public function display_options_page() {
		$settings_notice = '';

		$this->gpo->render_dependencies( $this, false);

		// Settings update/reset notice
		if ( isset( $_GET['settings-updated'] ) && 1 == $_GET['settings-updated'] ) {
			$settings_notice = 'settings-updated';
		} else if ( isset( $_GET['settings-reset'] ) && 1 == $_GET['settings-reset'] ) {
			$settings_notice = 'settings-reset';
		}

		$this->renderer->set_variables( array(

			'settings_notice' => ( $this->renderer->render( 'options-page/' . $settings_notice, $this->main_subviews_folder ) ),

			'panel_buttons' => $this->renderer->render( 'options-page/panel__buttons', $this->main_subviews_folder ),

			'nav-tabs' => $this->renderer->render( 'options-page/nav-tabs', $this->main_subviews_folder, array(
				'name'  => 'args', // wil be $args in the template
				'value' => array(
					'general-t' => array( _x( 'General', 'Navigation tab title.', 'amo-team' ), 'icon-settings' ), // the second value is an icon name
					'thumbs-t'  => array( _x( 'Thumbnails', 'Navigation tab title.', 'amo-team' ), 'icon-layout-grid2' ),
					'panel-t'   => array( _x( 'Panel', 'Navigation tab title.', 'amo-team' ), 'icon-layout-width-default-alt' ),
					'shortcodes-t'   => array( _x( 'Shortcodes', 'Navigation tab title.', 'amo-team' ), 'icon-shortcode' ),
					'misc-t'    => array( _x( 'Misc', 'Abridgement from Miscellaneous. Navigation tab title.', 'amo-team' ), 'icon-panel' ),

				)
			) ),

			'tab-panes' => $this->renderer->assemble_sub_views_for_page( 'options-page', $this->main_subviews_folder, array(
				'name'  => 'opts', // wil be $opts in the template
				'value' => get_option( 'amo-team-showcase-options' )
			) ),

			'form_nonce' => wp_nonce_field( 'amo_team_options_save', 'amo_team_options_nonce', true, false ),

			'plugin_version' => AMO_TEAM_SHOWCASE_VERSION,
		) );

		echo $this->renderer->render( 'options-page' );
	} // create_options_page | FNC

	/**
	 * Saves and resets form values/settings on plugin's options page.
	 *
	 * @since    1.0.0
	 */
	public function save_plugin_options() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'You are not allowed to be on this page.', 'amo-team' ) );
		}
		// check options form nonce
		check_admin_referer( 'amo_team_options_save', 'amo_team_options_nonce' );

		$settings_status = '';
		// Initialize the renderer with admin folder parameter
		$renderer = amo_team_showcase_renderer( 'admin' );

		// If option's "Reset All Settings" button is pressed
		if ( 'reset' == $_POST['submit-type'] ) {

			// load predefined, default values/data from files
			$options = $renderer->fetch_arguments( 'options-data', 'activation' );
			update_option( $this->gpo->get_plugin_name() . '-css-styles', $renderer->assemble_css_styles_from_options( $options ) );
			update_option( $this->gpo->get_plugin_name() . '-options', $options );

			$settings_status = '&settings-reset=1';

		// If option's "Save Changes" button is pressed
		} else if ( 'save' == $_POST['submit-type'] ) {

			// get only options form values, slice off the first 3 array items (WP's form service information)
			$options_vals = array_slice($GLOBALS['_REAL_POST'], 4);

			// Sanitize form values
			$sanitized_vals = $this->sanitize_form_input_values( $options_vals );

			// Save/Update plugin options
			update_option( $this->gpo->get_plugin_name() . '-options', $sanitized_vals );

			// Save/Update plugin css styles (created from options settings)
			update_option( $this->gpo->get_plugin_name() . '-css-styles', $renderer->assemble_css_styles_from_options( $sanitized_vals ) );

			$settings_status = '&settings-updated=1';
		} // IF | "Reset All Settings" / "Save Changes" button

		// redirect back to plugin options page
		wp_redirect( admin_url('edit.php?post_type=amo-team&page=amo-team-options' . $settings_status ) );
		exit;

	} // save_plugin_options | FNC


	/*-------------------------------------------------------------------
	▐	5. TEAM MEMBER METABOXES AND SETTINGS | Edit/New member screen
	--------------------------------------------------------------------*/
	/**
	 * Add/Init team member metabox with settings | Edit/New team member
	 *
	 * @since    1.0.0
	 */
	public function team_member_meta_box_init() {
		add_meta_box(
			'amo-team-member-settings', // Meta box ID
			__( 'Team Member Settings', 'amo-team' ), // Title of the meta box.
			array( $this, 'display_member_settings_meta_box' ), // $callback
			'amo-team', // $screen - post type, page
			'normal', // The context within the screen where the boxes should display.
			'high' // Priority
		);
	} // team_member_meta_box_init | FNC


	/**
	 * Set available post formats | Edit/New team member
	 *
	 * @since    1.0.0
	 */
	public function set_post_formats_team_member_post_type() {
		global $typenow;
		if ( 'amo-team' == $typenow ) {
			add_theme_support( 'post-formats', array( 'image', 'quote', 'link' ) );
		} //IF
	} // remove_post_formats_from_team_member_post_type | FNC


	/**
	 * Display metabox | Edit/New team member
	 *
	 * @since    1.0.0
	 */
	public function display_member_settings_meta_box( $post ) {

		$this->gpo->render_dependencies( $this, false);

		//nonce for security
		wp_nonce_field( 'amo_team_member_metabox', 'amo_team_member_metabox_nonce' );

		$this->renderer->set_variables( array(

			'tab-panes' => $this->renderer->assemble_sub_views_for_page( 'member-meta-box', $this->main_subviews_folder, array(
				array(
					'name'  => 'opts', // wil be $opts in the template
					'value' => get_post_meta( $post->ID, 'amo-team-member-metabox', true )
				),
				array(
					'name'  => 'metabox', // wil be $opts in the template
					'value' => 'amo-team-member-metabox'
				),
			) ), // tab-panes
		) ); //set_variables

		echo $this->renderer->render( 'member-meta-box' );

	} // create_member_settings_meta_box | FNC


	/**
	 * Save member metabox form values/data to database
	 *
	 * @since    1.0.0
	 */
	public function team_member_meta_box_save( $post_id, $post, $update ) {

		// verify if this is not an auto save routine.
		// If the post has not been updated, we don't do anything
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		//check nonce for security
		if ( ! isset($_POST['amo-team-member-metabox']) || ! wp_verify_nonce( $_POST['amo_team_member_metabox_nonce'], 'amo_team_member_metabox' ) ) {
			return false;
		}

		// Get the post type object.
		$post_type = get_post_type_object( $post->post_type );
		// Check if the current user has permission to edit the post type.
		if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
			return false;
		}

		// Sanitize metabox values
		$values = $this->sanitize_form_input_values( $GLOBALS['_REAL_POST']['amo-team-member-metabox'] );

		// Add post format entry to the array of values
		$values['post_format'] = get_post_format( $post_id );

		// Save/Update post's meta data
		update_post_meta( $post_id, 'amo-team-member-metabox', $values );
	} // team_member_meta_box_save | FNC


	/*-------------------------------------------------------------------
	▐	6. COLUMNS | All Team Members screen
	--------------------------------------------------------------------*/
	/**
	 * Adds 2 custom columns, on 'All Members' screen
	 *
	 * @since    1.0.0
	 */
	public function set_custom_post_column_names( $defaults ) {
		$defaults['amoteam_order'] = __( 'Order', 'amo-team' );
		//$defaults['amoteam_format'] = __( 'Format', 'amo-team' );
		$defaults['amoteam_id'] = __( 'Member Shortcode', 'amo-team' );
		$defaults['amoteam_thumb'] = '';
		return $defaults;
	} // set_custom_post_column_names | FNC


	/**
	 * Renders mentioned in previous function custom columns on 'All Members' screen
	 *
	 * @since    1.0.0
	 */
	public function render_custom_post_column_names( $column_title, $post_id ) {
		switch ( $column_title ) {
			case 'amoteam_order':
				global $post;
				printf('<input name="member_order" data-nonce="%3$s" data-action="" type="number" step="1" value="%1$d" class="small-text %2$smember-order">', $post->menu_order, AMO_TEAM_SHOWCASE_CSS_PREFIX, wp_create_nonce( 'update_member_order' )  );
				break;
//			case 'amoteam_format':
//			 echo get_post_format_string(get_post_format( $post_id ));
//				break;
			case 'amoteam_id':
				echo '[amo_member id="' . $post_id . '" item-width="250" align="left" item-margin="20" full-width="yes" panel="right"]';
				break;
			case 'amoteam_thumb':
				if ( has_post_thumbnail() ) {
					$attachment_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail', true );

					// render thumbnail
					$this->gpo->render_dependencies( $this, false);
					$this->renderer->set_variables( array(
						'img_url' => $attachment_array[0],
					) );
					echo $this->renderer->render( 'general/post-list-thumb', $this->main_subviews_folder );
				}
				break;
			default:
				break;
		} // SWITCH
	} // render_custom_post_column_names | FNC


	/**
	 * AJAX function to update Order field of a team member from Team Members screen
	 *
	 * @since    1.1.2
	 */
	public function update_member_order() {
	  check_ajax_referer( 'update_member_order', 'security' );

	   $my_post = array(
		   'ID'           => $_POST['postID'],
		   'menu_order'   => $_POST['postOrder'],
	   );
		// Update the post into the database
	   wp_update_post( $my_post );

	   wp_die();
	 } // FNC


	/*-------------------------------------------------------------------
	▐	7. CATEGORY FILTER | team members list
	--------------------------------------------------------------------*/
	/**
	 * Display a custom taxonomy dropdown filter in admin | Custom post type list
	 *
	 * @since    1.0.0
	 */
	public function filter_post_type_by_taxonomy() {
		global $typenow;
		$current_screen = get_current_screen();
		if ( $typenow == 'amo-team' && $current_screen->id == 'edit-amo-team' ) {

			$taxonomy      = 'amo-team-category';
			$selected      = isset( $_GET[ $taxonomy ] ) ? $_GET[ $taxonomy ] : '';
			$info_taxonomy = get_taxonomy( $taxonomy );

			wp_dropdown_categories( array(
				'show_option_all' => __( "Show All {$info_taxonomy->label}", 'amo-team' ),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
			) );
		}; // IF 'amo-team'
	} // FNC


	/**
	 * Filter posts by taxonomy in admin | Custom post type list
	 *
	 * @since    1.0.0
	 */
	public function convert_id_to_term_in_query( $query ) {
		global $typenow;
		if ( $typenow == 'amo-team' ) {
			$taxonomy  = 'amo-team-category';
			$q_vars    = &$query->query_vars;

			if ( isset( $q_vars[ $taxonomy ] ) && is_numeric( $q_vars[ $taxonomy ] ) && $q_vars[ $taxonomy ] != 0 ) {
				$term                = get_term_by( 'id', $q_vars[ $taxonomy ], $taxonomy );
				$q_vars[ $taxonomy ] = $term->slug;
			}
		} // IF current_screen == 'edit-amo-team'
	} // FNC


	/*-------------------------------------------------------------------
	▐	8. ADD 'ID' COLUMN | Amo team Categories screen
	--------------------------------------------------------------------*/
	/**
	 * Adds ID column header, on amo team categories screen
	 *
	 * @since    1.0.0
	 */
	public function categories_columns_header( $columns ) {
		$columns['category-id'] = __( 'ID', 'amo-team' );
		return $columns;
	} // FNC


	/**
	 * Outputs category ID in the column, on amo team categories screen
	 *
	 * @since    1.0.0
	 */
	public function categories_columns_row( $argument, $column_name, $category_id ) {
		if ( $column_name == 'category-id' ) {
			return $category_id;
		}
	} // FNC


	/**
	 * Aligns custom ID column in our taxonomy/category list
	 * by adding WP native classes to it.
	 *
	 * @since    1.0.0
	 */
	public function align_taxonomy_custom_id_column(  ) {
	?>
		<script>
			jQuery( document ).ready( function( $ ) {
				'use strict';
				$( '.column-category-id' ).addClass('column-posts num');
			} );
		</script>
	<?php
	} // FNC


	/*-------------------------------------------------------------------
	▐	9. SHORTCODES GENERATING BUTTON & MODAL | EDITOR
	--------------------------------------------------------------------*/
	/**
	 * Renders shortcodes button, then shortcodes modal block; before and after WP editor
	 *
	 * @since    1.0.0
	 */
	public function add_amo_team_button_wp_editor($var) {
		$this->gpo->render_dependencies( $this, false);

		// if "edit_form_after_editor" action ($var is $post)
		if ( is_object( $var ) ) {
			// set variables for shortcodes modal block
			$this->renderer->set_variables( array(
				'link_title' => __( "Shortcode's documentation", 'amo-team' ),
				array(
					'title' => _x( 'Text Block', 'Shortcodes generating block', 'amo-team' ),
					'link'  => '//amothemo.com/docs/amo-team-showcase-documentation/' . Amo_Team_Showcase_AVH::get_lang_from_locale('/') . '#sc-text-block',
					'type'  => 'bio',
					'class' => '{p}icon-doc-text',
				),
				array(
					'title' => _x( 'Skills', 'Shortcodes generating block', 'amo-team' ),
					'link'  => '//amothemo.com/docs/amo-team-showcase-documentation/' . Amo_Team_Showcase_AVH::get_lang_from_locale('/') . '#sc-skills',
					'type'  => 'skills',
					'class' => '{p}icon-graduation-cap {p}icon-margin-fix',
				),
				array(
					'title' => _x( 'Team', 'Shortcodes generating block', 'amo-team' ),
					'link'  => '//amothemo.com/docs/amo-team-showcase-documentation/' . Amo_Team_Showcase_AVH::get_lang_from_locale('/') . '#sc-amoteam',
					'type'  => 'team',
					'class' => '{p}icon-users {p}icon-margin-fix',
				),
			) ); // End set_variables
			echo $this->renderer->render( 'post/sc-button-modal', $this->main_subviews_folder );
		} else { //"media_buttons" action
			echo $this->renderer->render( 'post/shortcodes-button', $this->main_subviews_folder );
		}
	} // add_amo_team_button_wp_editor | FNC


	/*-------------------------------------------------------------------
	▐	10. PLUGIN "ACTION" LINKS
	--------------------------------------------------------------------*/
	/**
	 * Add plugin action URL links | activate/deactivate plugins screen
	 *
	 * @return array plugin links
	 * @since 1.0.0
	 */
	public function add_plugin_actions_links( $links ) {
		$this->gpo->render_dependencies( null, false, true );

		$links[] = sprintf( '<a href="%s">%s</a>', admin_url( 'edit.php?post_type=amo-team&page=amo-team-options' ), __( 'Options', 'amo-team' ) );
		$links[] = sprintf( '<a target="_blank" href="%s">%s</a>', '//amothemo.com/docs/amo-team-showcase-documentation/' . Amo_Team_Showcase_AVH::get_lang_from_locale() . '/#ds-quic-start', __( 'Where to start?', 'amo-team' ) );
		return $links;
	}


	/*-------------------------------------------------------------------
	▐	11. IMAGE SIZES IN MEDIA LIBRARY
	--------------------------------------------------------------------*/
	/**
	 * Add new image size to the media library
	 *
	 * @param $sizes
	 *
	 * @return array image sizes array
	 * @since 1.0.0
	 */
	public function image_sizes_names( $sizes ) {
		$added_sizes = array(
			AMO_TEAM_SHOWCASE_CSS_PREFIX . "general" => __( "AMO Team general"),
		);
		return $sizes + (array)$added_sizes;
	} // FNC


	/*-------------------------------------------------------------------
	▐	12. ADD REMOVABLE QUERY ARGS
	--------------------------------------------------------------------*/

	/**
	 * Add certain plugin's query args to WP removable URL query arguments
	 *
	 * @return array $removable_query_args
	 * @since 1.0.0
	 */
	public function add_plugin_removable_query_args( $removable_query_args ) {
		if ( ! in_array( 'settings-reset', $removable_query_args ) ) {
			$removable_query_args[] = 'settings-reset';
		}
		return $removable_query_args;
	} // FNC
	

	/*-------------------------------------------------------------------
	▐	13. REMOVE VIEW LINK | All Members screen
	--------------------------------------------------------------------*/

	/**
	 * Removes "view" link from available links/actions
	 * for team member on All Members screen
	 *
	 * @return array $actions List of links
	 * @since 1.0.0
	 */
	function all_members_screen_remove_actions( $actions, $post )	{
		if ( $post->post_type == 'amo-team' ) {
			unset( $actions['view'] );
		}
		return $actions;
	} // FNC



} // Amo_Team_Showcase_Admin | CLASS
