<?php
/**
 * Renders partials (view templates) of the plugin
 *
 * This class defines all code necessary to render views/partials
 *
 * @since      1.0.0
 * @package    Amo_Team_Showcase
 * @subpackage Amo_Team_Showcase/includes
 * @author     AMO Themo (Oleg Goltsev)
 */
class Amo_Team_Showcase_Views_Renderer {


	/*--------------------------------------------*
	 * Attributes
	 *--------------------------------------------*/

	/**
	 * Plugin's prefix for CSS classes/id, {p} sign in view templates
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $prefix
	 */
	protected $prefix;

	/**
	 * Path to admin/public partial files
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $partials_folder
	 */
	protected $partials_folder;

	/**
	 * Variables for a current view/partial
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $variables
	 */
	protected $variables = array();

	/**
	 * Sub views folder name/path
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string
	 */
	protected $subviews_folder;


	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initialize the class.
	 *
	 * @param   string  $folder admin / public string to know if we in admin or in public area
	 *
	 * @since   1.0.0
	 */
	public function __construct( $folder ) {

		$this->partials_folder = AMO_TEAM_SHOWCASE_PLUGIN_PATH . $folder . '/partials/';
		$this->prefix = AMO_TEAM_SHOWCASE_CSS_PREFIX;
	}

	/*--------------------------------------------*
	 * Functions
	 *--------------------------------------------*/

	/**
	 * Sets variables for upcoming rendering of a view/partial
	 *
	 * @since    1.0.0
	 */
	public function set_variables( $name, $value = false, $rewrite = false ) {

		if ( $rewrite ) {
			$this->variables = $name;
			return;
		}

		if ( is_array( $name ) ) {
			// adds new values to an existing array without overwriting it
			$this->variables = $this->variables + $name;

		} else {
			$this->variables[$name] = $value;
		}
	} // set_variables | FNC


	/**
	 * Renders current view/partial, filling it with its variables
	 *
	 * @since    1.0.0
	 *
	 * @param string $view  Name of a view/template file, without the ending - '.view.php'
	 * @param bool   $subview   If true then adds 'sub-views/' to the template path
	 *
	 * @return bool|string  HTML string containing a view/template, or false if there is no such file
	 */
	public function render( $view, $subview = false, $extra_vars = null, $replace = '{p}' ) {

		// create path
		$path = $this->partials_folder . ($subview ? $subview . '/' : '') . $view . '.view.php';

		if ( is_file( $path ) ) {
			ob_start();

			// add stored variables to $a variable and thus to the current view template
			$a = $this->variables;

			// set extra variable for the view/template
			if ($extra_vars) {
				// IF is a multidimensional array
				if ( isset($extra_vars[0]) && is_array($extra_vars[0]) ) {
					foreach ( $extra_vars as $array ) {
						${$array['name']} = $array['value'];
					} // FOREACH
				} else {
					${$extra_vars['name']} = $extra_vars['value'];
				} //IF
			} // IF $extra_vars

			// include view template
			include $path;

			// get contents from the template and clean current output buffer
			$contents = ob_get_clean();

			// clear variables array
			$this->variables = array();

//			if ( $replace ) {
				// replace CSS classes' prefix {p} in the view, then return the view
				return str_replace( $replace, $this->prefix, $contents );
//			} // IF

		} // IF
		return false;
	} // FNC

	/**
	 * Fetches arguments array from a parameters file (*.args.php)
	 *
	 * @since 1.0.0
	 *
	 * @param string $view  Name of a parameters file, without the ending - '.args.php'
	 *
	 * @return bool|array   Arguments array | false if there is no such file
	 */
	public function fetch_arguments( $file, $subview = false ) {


		// create path
		$path = $this->partials_folder . ($subview ? $subview . '/' : '')  . $file . '.args.php';

		if ( is_file( $path ) ) {
			// include parameters file (array), and return it.
			return include $path;
		} // IF

		return false;
	} // fetch_parameters_from_file | FNC


	/**
	 * Assembles sub views/templates, using arguments file/array (*.args.php) to use in a page
	 *
	 * Sub templates/views mean inner, smaller templates/views, i.e.: form inputs, tab panes, etc,
	 * that will be used in a bigger page template/view.
	 *
	 * @since 1.0.0
	 *
	 * @param array $params_file    Array of parameters for template parts / sub views
	 *
	 * @return bool|string  HTML string containing all the compiled views/templates designated by arguments file
	 */
	public function assemble_sub_views_for_page( $params_file, $subview = false, $extra_vars = null ) {
		$subview = ($subview ? $subview . '/' : '');
		// set output var
		$html = '';
		$group_field = false;

		# if it's a group field
		if ( is_array( $params_file ) ) {
			$group_field = true;
			$args_array = $params_file;
		} else {
			// get parameters/arguments array
			$args_array = $this->fetch_arguments( $params_file );
		} // end IF

		// arguments array is fetched
		if ( $args_array ) {
			// a) get name of a sub-folder, where all the sub views for the current parameters/arguments are contained.
			$sub_folder = array_shift( $args_array ) . '/';

			// get the array of default values for current subviews
			$defaults = $this->fetch_arguments( $sub_folder . '_defaults', $subview );

			// assemble template parts using parameters array
			foreach ( $args_array as $args ) {

				// set default values if they are missing
				$args = $args + $defaults[ $args['type'] ];

				# if it's a group field
				if ( $group_field ) {
					// Pass the variables that will be used in the current sub view template
					$this->set_variables( $args, false, true );

				# normal field
				} else {
					// Pass the variables that will be used in the current sub view template
					$this->set_variables( $args );
				}

				// render sub-view template
				$html .= $this->render( $sub_folder . $args['type'], $subview, $extra_vars );

			} // FOREACH
			return $html;
		} // IF $args_array

		return false;
	} // assemble_sub_views_for_page | FNC


	/**
	 * Assemble/Compile CSS styles from plugin options/settings
	 *
	 * @since    1.0.0
	 */
	public function assemble_css_styles_from_options( $options ) {

		$this->set_variables( array(
			'options' => $options,
		) );
		return preg_replace( '/[\r\n\t\f\v]{1,}/', '', $this->render( 'css-styles', 'specific' ) );
	} // FNC

} // Amo_Team_Showcase_Views_Renderer | CLASS
