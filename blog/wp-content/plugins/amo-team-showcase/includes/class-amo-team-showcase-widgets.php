<?php
/**
 * This file holds all the plugin widgets
 *
 * @since      1.0.7
 * @package    Amo_Team_Showcase
 * @subpackage Amo_Team_Showcase/includes
 * @author     AMO Themo (Oleg Goltsev)
 */


/**
 * This class defines general functions for the plugin's widgets
 *
 * @since      1.0.7
 */
class Amo_Team_Showcase_Widget extends WP_Widget {

	/**
	 * Renders backend/admin form field.
	 * @since      1.0.7
	 */
	public function form_field( $a, $instance) {

		# set default values
		$a += array( 'type' => false, 'desc' => '', 'args' => null );
		$id_value = $instance[$a['id']]
		?><p>
		<label for="<?php echo $this->get_field_id( $a['id'] ); ?>"><?php echo $a['label'] ?>:</label>
		<?php

		# determine input type
		if ( 'text' == $a['type'] || 'number' == $a['type'] ) {
			?>
			<input class="widefat" type="<?php echo $a['type'] ?>" id="<?php echo $this->get_field_id( $a['id'] ); ?>" name="<?php echo $this->get_field_name( $a['id'] ); ?>" value="<?php echo $a['type'] == 'text' ? esc_attr( $id_value ) : absint( $id_value ); ?>" />
			<?php
		} elseif ( false !== strpos( $a['type'], 'select' ) ) {
			$select_multiple = $a['type'] == 'select-multiple';
			?>
			<select class="widefat" name="<?php echo $this->get_field_name( $a['id'] ), $select_multiple ? '[]" multiple="multiple"' : '"'; ?> id="<?php echo $this->get_field_id( $a['id'] ); ?>">
				<?php if ( $select_multiple && is_array( $id_value ) ) : ?>
					<?php foreach ( $a['args'] as $key => $val ) :	?>
						<option <?php selected( in_array($key, $id_value), true ) ?> value="<?php echo $key; ?>"><?php echo $val; ?></option>
					<?php endforeach; // end ?>
				<?php else : ?>
					<?php foreach ( $a['args'] as $key => $val ) : ?>
						<option <?php selected( $key, $id_value ) ?> value="<?php echo $key; ?>"><?php echo $val ?></option>
					<?php endforeach; // end ?>
				<?php endif; // end ?>
			</select>
			<?php
		} # end IF | Input type


		# IF there is a description
		if ( $a['desc'] ) : ?>
		<span class="<?php echo AMO_TEAM_SHOWCASE_CSS_PREFIX ?>widget-field-desc"><?php echo $a['desc'] ?></span>
		<?php endif; // end IF | description ?>
		</p><?php

	} // FNC | form_field

	public function form_description( $desc ) {

		# IF there is a description
		if ( $desc ) { ?>
			<p class="<?php echo AMO_TEAM_SHOWCASE_CSS_PREFIX ?>widget-field-desc"><b><?php echo $desc ?></b></p><?php
		}; // end IF | description

	} // FNC

} // Amo_Team_Showcase_Widget | CLASS



/**
 * Widget to display team member(s) by ID
 *
 * This class defines all code necessary for the widget
 * @since      1.0.7
 */
class Amo_Team_Showcase_Team_Members_Widget extends Amo_Team_Showcase_Widget {

	public function __construct() {
		$widget_options = array(
			//'classname' => AMO_TEAM_SHOWCASE_CSS_PREFIX . 'team-members',
			'description' => 'Display team members (thumbnails)',
		);

		parent::__construct(
			AMO_TEAM_SHOWCASE_CSS_PREFIX . 'team-members', // ID
			_x('AMO Team Members', 'widget name', 'amo-team'), // Name
			$widget_options );
	} // FNC | __construct

	/**
	 * Displays the widget on the frontend
	 * @since      1.0.7
	 */
	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', $instance[ 'title' ] );

		# widget output | start
		echo $args['before_widget'];

		# if there is a title
		if ( $title ) {
			echo $args['before_title'], $title, $args['after_title'];
		}

		# determine which shortcode to use
		if ( $instance['id'] ) { // Member shortcode

			echo do_shortcode( sprintf(
				'[amo_member id="%s" item-width="%s" item-margin="%s" full-width="%s" panel="%s" align="%s" style="%s" class="%s"]',
				$instance['id'], $instance['item-width'], $instance['item-margin'], $instance['full-width'], $instance['panel'], $instance['align'], $instance['style'], $instance['class']
			) );
		} else { // Team shortcode

			# "All Categories" option settings
			if ( !isset( $instance['categories'] ) ) {
				$instance['categories'][0] = '';
			} elseif ( $instance['categories'][0] === 0 ) {
				# if only "All Categories" option is selected
				if (count( $instance['categories'] ) == 1) {
					$instance['categories'][0] = '';
				} else { # if not
					array_shift( $instance['categories'] );
				} # IF
			} # IF | "All Categories" option settings

			echo do_shortcode( sprintf(
				'[amoteam max="%s" categories="%s" item-width="%s" item-margin="%s" full-width="%s" panel="%s" align="%s" style="%s" orderby="%s" class="%s"]',
				$instance['max'], implode( ',', $instance['categories'] ), $instance['item-width'], $instance['item-margin'], $instance['full-width'], $instance['panel'], $instance['align'], $instance['style'], $instance['orderby'], $instance['class']
			) );
		}

		# widget output | end
		echo $args['after_widget'];
	} // FNC | widget

	/**
	 * Displays widget's backend/admin form
	 * @since      1.0.7
	 */
	public function form( $instance ) {
		# default parameters
		$instance = wp_parse_args( (array) $instance, array(
			'title'       => '',
			'id'          => '',
			'max'         => 50,
			'categories'  => false,
			'item-width'  => '250',
			'item-margin' => '20',
			'full-width'  => 'yes',
			'panel'       => 'right',
			'orderby'     => 'date-desc',
			'align'       => false,
			'style'       => false,
			'class'       => '',
		) );

		/*  GENERAL VARIABLES / VALUES
		-------------------------------------------------------------------*/
		$lrc = array( 'left'   => __( 'Left', 'amo-team' ),
		              'center' => __( 'Center', 'amo-team' ),
		              'right'  => __( 'Right', 'amo-team' ),
		);

		/*  RENDER FORM DESCRIPTION
		-------------------------------------------------------------------*/
		require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . 'admin/class-amo-team-showcase-admin-view-helpers.php';

		$link = '<a target="_blank" href="%s">%s</a>';
		$link_team = sprintf( $link, AMO_TEAM_SHOWCASE_DOCUMENTATION . Amo_Team_Showcase_AVH::get_lang_from_locale() . '/#sc-amoteam', __( 'Team', 'amo-team' ) );
		$link_member = sprintf( $link, AMO_TEAM_SHOWCASE_DOCUMENTATION . Amo_Team_Showcase_AVH::get_lang_from_locale() . '/#sc-member', __( 'Member', 'amo-team' ) );

		$this->form_description( sprintf( __( 'All the widget fields correspond to the same parameters in plugin\'s shortcodes – %s and %s.', 'amo-team' ), $link_team, $link_member ) );

		/*  RENDER FORM FIELDS
		-------------------------------------------------------------------*/
		$id_field_notice = __( 'This setting works only if "Team member ID" field is empty.', 'amo-team' );

		# Title
		$this->form_field( array(
			'type'  => 'text',
			'id'    => 'title',
			'label' => _x( 'Title', 'widget field backend', 'amo-team' ),
		), $instance );

		# ID
		$this->form_field( array(
			'type'  => 'text',
			'id'    => 'id',
			'label' => _x( 'Team member ID', 'widget field backend', 'amo-team' ),
			'desc'  => __( 'You can find member\'s ID right in the shortcode column, on All Team Members page. To enter several ID\'s please use comma – 19,27,85.', 'amo-team' ),
		), $instance );

		# Max number of member to display
		$this->form_field( array(
			'type'  => 'number',
			'id'    => 'max',
			'label' => _x( 'Max number of members to display', 'widget field backend', 'amo-team' ),
			'desc'  => $id_field_notice,
		), $instance );

		# Categories
		$cat_keys = get_terms( array(
			'taxonomy'     => 'amo-team-category',
			'orderby'      => 'name',
			'hide_empty'   => false,
			'fields'       => 'ids',
		) );
		$cat_values = get_terms( array(
			'taxonomy'     => 'amo-team-category',
			'orderby'      => 'name',
			'hide_empty'   => false,
			'fields'       => 'names',
		) );
		$this->form_field( array(
			'type'  => 'select-multiple',
			'id'           => 'categories',
			'label'        => _x( 'Categories', 'widget field backend', 'amo-team' ),
			'desc'         => sprintf( __( 'Display team members only from certain categories. %s', 'amo-team' ), $id_field_notice ),
			'args'  => ( array( 0 => __( 'All Categories', 'amo-team' ) ) + array_combine( $cat_keys, $cat_values )),
			), $instance );

		# Item width
		$this->form_field( array(
			'type'  => 'number',
			'id'    => 'item-width',
			'label' => _x( 'Item width', 'widget field backend', 'amo-team' ),
			'desc'  => __( 'Width of membmer thumbnails (px).', 'amo-team' ),
		), $instance );

		# Item margin
		$this->form_field( array(
			'type'  => 'number',
			'id'    => 'item-margin',
			'label' => _x( 'Item margin', 'widget field backend', 'amo-team' ),
			'desc' => __( 'Width and height of margins/spaces between member thumbnails on the page (px).', 'amo-team' ),
		), $instance );

		# Full width
		$this->form_field( array(
			'type'  => 'select',
			'id'    => 'full-width',
			'label' => _x( 'Full width', 'widget field backend', 'amo-team' ),
			'desc'  => __( 'When set to yes, will try to span member thumbnails row to container\'s width.', 'amo-team' ),
			'args'  => array( 'yes' => __( 'Yes', 'amo-team' ), 'no' => __( 'No', 'amo-team' ) ),
		), $instance );

		# Panel
		$this->form_field( array(
			'type'  => 'select',
			'id'    => 'panel',
			'label' => _x( 'Panel alignment', 'widget field backend', 'amo-team' ),
			'desc'  => __( 'Defines from which side will appear the member info panel. You can also turn the panel off.', 'amo-team' ),
			'args'  => $lrc + array( 'off'  => __( 'Off', 'amo-team' )),
		), $instance );

		# Align
		$this->form_field( array(
			'type'  => 'select',
			'id'    => 'align',
			'label' => _x( 'Items alignment', 'widget field backend', 'amo-team' ),
			'desc'  => __( 'Defines alignment of member thumbnails.', 'amo-team' ),
			'args'  => $lrc,
		), $instance );

		# Style
		$this->form_field( array(
			'type'  => 'select',
			'id'    => 'style',
			'label' => _x( 'Style', 'widget field backend', 'amo-team' ),
			'desc'  => __( 'Defines style of member thumbnails.', 'amo-team' ),
			'args'  => array( '1' => '1', '2' => '2', '2_1' => '2.1',  ),
		), $instance );

	   # Order by
	   $this->form_field( array(
		   'type'  => 'select',
		   'id'    => 'orderby',
		   'label' => _x( 'Order by', 'widget field backend', 'amo-team' ),
		   'desc'  => __( 'Defines order of team members, works jointly with "Order" field of member.', 'amo-team' ),
		   'args'  => array(
			   'date-desc'     => __( 'Publication date', 'amo-team' ) . ' &darr;',
			   'date-asc'      => __( 'Publication date', 'amo-team' ) . ' &uarr;',
			   'modified-desc' => __( 'Modification date', 'amo-team' ) . ' &darr;',
			   'modified-asc'  => __( 'Modification date', 'amo-team' ) . ' &uarr;',
			   'title-desc'    => __( 'Title / Name', 'amo-team' ) . ' &darr;',
			   'title-asc'     => __( 'Title / Name', 'amo-team' ) . ' &uarr;',
			   'rand'          => __( 'Random', 'amo-team' ),
		   ),
	   ), $instance );

		# Class
		$this->form_field( array(
			'type'  => 'text',
			'id'    => 'class',
			'label' => _x( 'CSS class', 'widget field backend', 'amo-team' ),
		), $instance );

	} // FNC | backend form


	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 * @since      1.0.7
	 */
	public function update( $new_instance, $old_instance ) {

		# text fields
		$texts = array( 'title', 'id', 'full-width', 'panel', 'align', 'style', 'orderby', 'class', );
		# number fields
		$numbers = array( 'max', 'item-width', 'item-margin', );
		$instance = array();


		/*  SANITIZE FIELDS
		-------------------------------------------------------------------*/
		foreach ( $new_instance as $key => $value ) {

			// sanitize text values
			if ( in_array( $key, $texts ) ) {
				$instance[ $key ] = sanitize_text_field( $new_instance[ $key ] );
			// sanitize number values
			} elseif ( in_array( $key, $numbers ) ) {
				$instance[ $key ] = absint( $new_instance[ $key ] );
			// sanitize categories' values
			} elseif ( $key == 'categories' ) {
				foreach ( $new_instance[ $key ] as $item ) {
					$instance[ $key ][] = absint( $item );
				}
			} // end IF
		} // FOREACH | Sanitization

		return $instance;
	} // FNC | update



} // Amo_Team_Showcase_Team_Members_Widget | CLASS
