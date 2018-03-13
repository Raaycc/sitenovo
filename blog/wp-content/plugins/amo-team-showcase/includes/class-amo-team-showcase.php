<?php
/**
 * The core plugin class.
 *
 * The core plugin class that is used to define internationalization,
 * admin-specific and public-facing attributes, functions and site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Amo_Team_Showcase
 * @subpackage Amo_Team_Showcase/includes
 * @author     AMO Themo (Oleg Goltsev)
 */
class Amo_Team_Showcase {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var object      Amo_Team_Showcase_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier (ID) of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * Required WP version, on which the plugin is guaranteed to work properly.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $required_wp_version
	 */
	protected $required_wp_version;

	/**
	 * Tells if we are in admin area and are doing or not doing AJAX request
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array  $is_admin Array of boolean values
	 */
	protected $zone = array(
		'is_admin' => false,
		'is_ajax_request' => false,
	);


	/**
	 * Array with boolean values on what screen is currently shown.
	 * For example: Options page or Team Member Screen
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var array Amo_Team_Showcase $what_screen
	 */
	public $what_screen = array();


	/**
	 * The renderer object, that's responsible rendering partials (view templates) of the plugin
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var object Amo_Team_Showcase_Views_Renderer $renderer
	 */
	public $renderer;


	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $required_wp_version ) {

		$this->plugin_name = 'amo-team-showcase';

		if ( is_admin() ) {
			if ( defined('DOING_AJAX') && DOING_AJAX )
				$this->zone['is_admin'] = $this->zone['is_ajax_request'] = true;
			else {
				$this->zone['is_admin'] = true;
			} //IF

			// A hack to cope with un-configurable call to wp_magic_quotes
			// E.G. Make the original $_POST available through a global $_REAL_POST
			$GLOBALS['_REAL_POST']    = $_POST;
		} // IF is_admin

		// Dependencies
		$this->load_dependencies();

		// Hooks
		$this->define_general_hooks();
		if ( $this->zone['is_admin'] ) {
			$this->define_admin_hooks( $required_wp_version );
		} else { // is public
			$this->define_public_hooks();
		}
	} // __construct | FNC


	/**
	 * Loads render dependencies such as renderer class or helper functions
	 * for plugin to able to render views/partials
	 *
	 * @since    1.0.0
	 */
	public function render_dependencies( $obj, $public = false, $helpers = true ) {
		static $count = 0;
		if ( $count === 0) {
			$area = $public ? 'public' : 'admin';

			// if renderer object is not initialized yet
			if ( is_object($obj) && ! is_object( $obj->renderer ) ) {

				// Initialize the renderer with admin/public folder parameter
				// The Renderer class is responsible for rendering views/partials in both public and admin parts of the plugin
				$obj->renderer = $this->renderer = amo_team_showcase_renderer( $area );

				$count++;
			} // IF NOT renderer is an object

			if ( ! $public && $helpers ) {
				// The class with template tags for admin/public views
				require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . $area .'/class-amo-team-showcase-'.$area.'-view-helpers.php';
			}
		} // IF count
	} // FNC


	/**
	 * Checks if certain JS file is already enqueued
	 *
	 * @param string $name – Script's file name before dot (e.g. - bootstrap, jquery-ui)
	 * @param string $status – Status: enqueued, registered, etc.
	 *
	 * @since 1.1.2
	 * @return bool
	 */
	public function script_status_check( $name, $status = array('enqueued') ) {
		global $wp_scripts;

		foreach( $wp_scripts->registered as $script ) {
			if ( stristr( $script->src, $name . '.min.js' ) !== false || stristr( $script->src, $name . '.js' ) !== false  ) {
				foreach ( $status as $s ) {
					if ( wp_script_is( $script->handle, $s ) ) {
						return true;
						break 2;
					}
				} // FOREACH $status
			} // IF
		} // FOREACH $wp_scripts
		return false;
	} // enqueue_script_check | FNC


	/**
	 * Load the require_once dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Amo_Team_Showcase_Loader. Orchestrates the hooks of the plugin.
	 * - Amo_Team_Showcase_Admin. Defines all hooks for the admin area.
	 * - Amo_Team_Showcase_Public. Defines all hooks for the public side of the site.
	 * - Amo_Team_Showcase_Shortcodes. Defines plugin shortcode functionality.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/*-------------------------------------------------------------------
		▐	1. GENERAL Dependencies
		--------------------------------------------------------------------*/
		add_image_size( AMO_TEAM_SHOWCASE_CSS_PREFIX . 'general', 640, 640, array( 'center', 'top' ) );

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . 'includes/class-amo-team-showcase-loader.php';

		/**
		 * The class responsible for all the plugin widgets
		 */
		require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . 'includes/class-amo-team-showcase-widgets.php';

		/*-------------------------------------------------------------------
		▐	2. ADMIN Dependencies
		--------------------------------------------------------------------*/
		if ( $this->zone['is_admin'] ) {

			/**
			 * The class responsible for defining all actions that occur in the admin area.
			 */
			require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . 'admin/class-amo-team-showcase-admin.php';

		/*-------------------------------------------------------------------
		▐	3. PUBLIC Dependencies
		--------------------------------------------------------------------*/
		} else { // IF IS PUBLIC
			/**
			 * The class responsible for defining all actions that occur in the public-facing
			 * side of the site.
			 */
			require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . 'public/class-amo-team-showcase-public.php';

			// Shortcodes class
			require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . 'public/class-amo-team-showcase-shortcodes.php';
		} // IF


		// init/load plugin hooks
		$this->loader = new Amo_Team_Showcase_Loader();

	} // load_dependencies | FNC


	/**
	 * Register all of the hooks related to the both areas functionality
	 * of the plugin - admin and public.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_general_hooks() {
		// Loads a plugin's translations
		$this->loader->add_action_loader( 'init', $this, 'load_plugin_textdomain' );

		// Register custom post type - AMO Team
		$this->loader->add_action_loader( 'init', $this, 'register_team_post_type' );

		// Register taxonomy (categories) for the post type
		$this->loader->add_action_loader( 'init', $this, 'register_team_taxonomy' );

		// Register the plugin widgets
		$this->loader->add_action_loader( 'widgets_init', $this, 'register_plugin_widgets' );

		// Runs the activation function, which checks for plugin's update and if it exists, updates database
		$this->loader->add_action_loader( 'plugins_loaded', $this, 'plugin_update' );
	} // FNC


	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks( $required_wp_version ) {
		// instantiate admin classes
		$plugin_admin = new Amo_Team_Showcase_Admin( $this, $required_wp_version );

		/*-------------------------------------------------------------------
		▐	1. GENERAL HOOKS
		--------------------------------------------------------------------*/
		// Enqueue styles and scripts
		$this->loader->add_action_loader( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles_and_scripts' );

		// Add AMO Team shortcodes button above WP TinyMCE editor, after "Add Media" button
		$this->loader->add_action_loader( 'media_buttons', $plugin_admin, 'add_amo_team_button_wp_editor', 1999 );
		$this->loader->add_action_loader( 'edit_form_after_editor', $plugin_admin, 'add_amo_team_button_wp_editor' );

		// Add plugin action URL links | activate/deactivate plugins screen
		$this->loader->add_filter_loader( 'plugin_action_links_' . plugin_basename( AMO_TEAM_SHOWCASE_FILE ), $plugin_admin, 'add_plugin_actions_links' );

		// Add AMO team image size(s) to the media library
		$this->loader->add_filter_loader( 'image_size_names_choose', $plugin_admin, 'image_sizes_names' );

		/*-------------------------------------------------------------------
		▐	2. OPTIONS and SANITIZATION
		--------------------------------------------------------------------*/
		// Add plugin's options to the dashboard
		$this->loader->add_action_loader( 'admin_menu', $plugin_admin, 'add_plugin_options_menu' );

		// Save (and sanitize) plugin's options to DB
		$this->loader->add_action_loader( 'admin_post_amo_team_save_plugin_options', $plugin_admin, 'save_plugin_options' );

		// Add certain plugin's query args to WP removable URL query arguments
		$this->loader->add_filter_loader( 'removable_query_args', $plugin_admin, 'add_plugin_removable_query_args' );


		/*-------------------------------------------------------------------
		▐	3. TEAM MEMBER | metaboxes and other functionality
		--------------------------------------------------------------------*/
		// Add meta box to Team Member post type
		$this->loader->add_action_loader( 'add_meta_boxes_amo-team', $plugin_admin, 'team_member_meta_box_init' );

		// Save meta box of Team Member post type
		$this->loader->add_action_loader( 'save_post_amo-team', $plugin_admin, 'team_member_meta_box_save', 10, 3 );

		// Set the only post formats for the Team Member (amo-team) post type, which are supported by the plugin
		$this->loader->add_action_loader( 'load-post.php', $plugin_admin, 'set_post_formats_team_member_post_type' );
		$this->loader->add_action_loader( 'load-post-new.php', $plugin_admin, 'set_post_formats_team_member_post_type' );

		// Set custom post type column names, in the list of all members/posts
		$this->loader->add_filter_loader( 'manage_amo-team_posts_columns' , $plugin_admin, 'set_custom_post_column_names' );
		$this->loader->add_action_loader( 'manage_amo-team_posts_custom_column' , $plugin_admin, 'render_custom_post_column_names', 10, 2 );

		// Removes "view" link from available links/actions for team member | All Members screen
		$this->loader->add_filter_loader( 'post_row_actions' , $plugin_admin, 'all_members_screen_remove_actions', 10, 2 );


		/*-------------------------------------------------------------------
		▐	4. ADD CATEGORY FILTER | team members list
		--------------------------------------------------------------------*/
		// Display a custom taxonomy dropdown filter in admin | Custom post type list
		$this->loader->add_action_loader( 'restrict_manage_posts', $plugin_admin, 'filter_post_type_by_taxonomy' );
		// Filter posts by taxonomy in admin | Custom post type list
		$this->loader->add_filter_loader( 'parse_tax_query', $plugin_admin, 'convert_id_to_term_in_query' );

		/*-------------------------------------------------------------------
		▐	5. CATEGORIES | Admin screen
		--------------------------------------------------------------------*/
		# Add ID column
		$this->loader->add_filter_loader( 'manage_edit-amo-team-category_columns' , $plugin_admin, 'categories_columns_header' );
		$this->loader->add_filter_loader( 'manage_amo-team-category_custom_column' , $plugin_admin, 'categories_columns_row', 10, 3 );
		$this->loader->add_action_loader( 'after-amo-team-category-table' , $plugin_admin, 'align_taxonomy_custom_id_column' );

		/*-------------------------------------------------------------------
		▐	6. ADMIN NOTICES
		--------------------------------------------------------------------*/
		// Shows admin notices of the plugin, if user have not disabled them yet
		$this->loader->add_action_loader( 'admin_notices' , $plugin_admin, 'general_plugin_notices' );

		/*-------------------------------------------------------------------
		▐	7. AJAX
		--------------------------------------------------------------------*/
		# Ajax loader - gif loading animation for ajax action in progress
		$this->loader->add_action_loader( 'admin_footer', $plugin_admin, 'output_ajax_loader_animation' );

		if ( $this->zone['is_ajax_request'] ) {
			# Thumbnails Notice
			$this->loader->add_action_loader( 'wp_ajax_hide_admin_notice', $plugin_admin, 'hide_admin_notice' );
			$this->loader->add_action_loader( 'wp_ajax_update_member_order', $plugin_admin, 'update_member_order' );


			# Order update on Team Members

		} // IF is_ajax_request

	} //  define_admin_hooks | FNC


	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		// instantiate public classes
		$plugin_public = new Amo_Team_Showcase_Public( $this );
		new Amo_Team_Showcase_Shortcodes( $this, $plugin_public );


		/*-------------------------------------------------------------------
		▐	1. GENERAL HOOKS
		--------------------------------------------------------------------*/
		// Extend list of allowed URL protocols.
		$this->loader->add_filter_loader( 'kses_allowed_protocols', $plugin_public, 'extend_allowed_url_protocols' );

		// Enqueue public styles and scripts
		$this->loader->add_action_loader( 'wp_enqueue_scripts', $plugin_public, 'enqueue_register_styles_and_scripts' );

		// Sets plugin's main and global JavaScript variable in website frontend
		$this->loader->add_action_loader( 'wp_head', $plugin_public, 'set_amoteam_main_variable_script' );

	} // define_public_hooks | FNC


	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Amo_Team_Showcase_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

//	/**
//	 * Runs the actiovation function, which checks for plugin's update and if it exists, - updates database
//	 *
//	 * @since     1.0.0
//	 * @return    string    The version number of the plugin.
//	 */
//	public function get_version() {
//		return $this->version;
//	}


	/**
	 * Loads a plugin's translations.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		$domain = 'amo-team';

		// First it loads translation from languages directory in wp-content folder
		// Then it loads translation from languages directory in plugin folder
		// When several mo-files are loaded for the same domain, the first found translation will be used.
		// Thus the language files provided by the plugin will serve as a fallback for strings not
		// translated in the wp-content/languages/plugins/plugin-name file.
		load_plugin_textdomain( $domain, FALSE, plugin_basename( AMO_TEAM_SHOWCASE_PLUGIN_PATH ) . '/languages/' );
	}


	/**
	 * Runs the activation function, which checks for plugin's update and if it exists, updates database
	 *
	 * @since    1.0.3
	 */
	public function plugin_update() {
		require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . 'includes/class-amo-team-showcase-activator.php';
		Amo_Team_Showcase_Activator::settings_activation_and_update( AMO_TEAM_SHOWCASE_VERSION );
	} // FNC

	/**
	 * Registers (adds) custom post type - 'amo-team' (Team Member)
	 *
	 * @since    1.0.0
	 */
	public function register_team_post_type() {
		$labels = array(
			'name'               => _x( 'Team Members', 'post type, general name', 'amo-team' ),
			'singular_name'      => _x( 'Team Member', 'post type, singular name', 'amo-team' ),
			'add_new'            => _x( 'Add New Member', 'button/menu item label', 'amo-team' ),
			'add_new_item'       => _x( 'Add New Member', 'add new member screen', 'amo-team' ),
			'edit_item'          => __( 'Edit Member', 'amo-team' ),
			'new_item'           => __( 'New Member', 'amo-team' ),
			'all_items'          => __( 'All Members', 'amo-team' ),
			'view_item'          => __( 'View Member', 'amo-team' ),
			'search_items'       => __( 'Search Members', 'amo-team' ),
			'not_found'          => __( 'No Member Found', 'amo-team' ),
			'not_found_in_trash' => __( 'No Member Found In Trash', 'amo-team' ),
			'parent_item_colon'  => '',
			'menu_name'          => _x( 'AMO Team', 'WP menu item name', 'amo-team' )

		);

		$args = array(
			'labels'              => $labels,
			'public'              => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
//			'show_ui'             => true,
//			'show_in_menu'        => true,
			'query_var'           => true,
			'rewrite'             => array( 'slug' => 'amo-team', 'with_front' => false ),
			'capability_type'     => 'page',
			'has_archive'         => false,
			'hierarchical'        => false,
			'supports'            => array(
				'title',
				'editor',
				'thumbnail',
				'page-attributes',
				'post-formats',
			),
			'menu_position'       => 99,
			'menu_icon'           => 'dashicons-admin-generic'
		);
		register_post_type( 'amo-team', apply_filters( 'amo_team_post_type_args', $args ) );
	}


	/**
	 * Registers taxonomy (categories) for the post type - 'amo-team' (Team Member)
	 *
	 * @since    1.0.0
	 */
	public function register_team_taxonomy() {

		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Team Categories', 'taxonomy general name', 'amo-team' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'amo-team' ),
			'search_items'      => __( 'Search Categories', 'amo-team' ),
			'all_items'         => __( 'All Categories', 'amo-team' ),
			'parent_item'       => __( 'Parent Category', 'amo-team' ),
			'parent_item_colon' => __( 'Parent Category:', 'amo-team' ),
			'edit_item'         => __( 'Edit Category', 'amo-team' ),
			'update_item'       => __( 'Update Category', 'amo-team' ),
			'add_new_item'      => __( 'Add New Category', 'amo-team' ),
			'new_item_name'     => __( 'New Category Name', 'amo-team' ),
			'menu_name'         => __( 'Categories', 'amo-team' ),
		);

		$args = array(
			'public'            => true,
			'hierarchical'      => true,
			'labels'            => $labels,
//			'show_ui'           => true,
			'show_in_nav_menus' => false,
			'show_tagcloud'     => false,
			'show_admin_column' => true,
			'query_var'         => true,
//			'rewrite'           => array( 'slug' => 'team-categories' ),
		);

		register_taxonomy( 'amo-team-category', 'amo-team', $args );
	} // FNC | register_team_taxonomy


	/**
	 * Registers plugin widgets
	 *
	 * @since     1.0.7
	 * @return    void
	 */
	public function register_plugin_widgets() {
		register_widget( 'Amo_Team_Showcase_Team_Members_Widget' );
	} // FNC

} // Amo_Team_Showcase | CLASS
