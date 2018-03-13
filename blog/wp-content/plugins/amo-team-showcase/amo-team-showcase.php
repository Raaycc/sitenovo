<?php
/**
 * Plugin Name: AMO Team Showcase
 * Description: Easily showcase members of your team/company and their info in sleek, responsive and professional way.
 * Version: 1.1.4
 * Author: Oleg Goltsev (amothemo)
 * Requires at least: 4.6
 * Tested up to: 4.9.1
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * Text Domain: amo-team
 * Domain Path: /languages/
 *
 * @package Amo_Team_Showcase
 * @author AMO Themo (Oleg Goltsev)
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*  Define Constants
-------------------------------------------------------------------*/
$amo_team_showcase_plugin_version = get_file_data(__FILE__, array(
	'Version' => 'Version',
), 'plugin');

/**
 * Plugin version
 */
define( 'AMO_TEAM_SHOWCASE_VERSION', $amo_team_showcase_plugin_version['Version'] );

/**
 * Path to the plugin main __FILE__
 */
define( 'AMO_TEAM_SHOWCASE_FILE', __FILE__ );

/**
 * Path to the plugin directory
 */
define( 'AMO_TEAM_SHOWCASE_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
 * URL path to the plugin directory
 */
define( 'AMO_TEAM_SHOWCASE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * CSS prefix for the plugin's CSS classes
 */
define( 'AMO_TEAM_SHOWCASE_CSS_PREFIX', 'amoteam-' );

/**
 * First part of the URL to the plugin documentation
 */
define( 'AMO_TEAM_SHOWCASE_DOCUMENTATION', '//amothemo.com/docs/amo-team-showcase-documentation/' );

/**
 * Require and instantiate plugin's Renderer Class
 * The class is responsible for rendering views/partials in both public and admin parts of the plugin
 *
 * @since    1.0.0
 */
function amo_team_showcase_renderer( $area ) {
	require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . 'includes/class-amo-team-showcase-views-renderer.php';
	return new Amo_Team_Showcase_Views_Renderer( $area );
}

/*  Activation / Deactivation of the plugin
-------------------------------------------------------------------*/
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-amo-team-showcase-activator.php
 * @since    1.0.0
 */
function activate_amo_team_showcase() {
	require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . 'includes/class-amo-team-showcase-activator.php';
	Amo_Team_Showcase_Activator::activate( AMO_TEAM_SHOWCASE_VERSION, true );
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-amo-team-showcase-deactivator.php
 * @since    1.0.0
 */
function deactivate_amo_team_showcase() {
	require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . 'includes/class-amo-team-showcase-deactivator.php';
	Amo_Team_Showcase_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_amo_team_showcase' );
register_deactivation_hook( __FILE__, 'deactivate_amo_team_showcase' );

/*  Initialization of the plugin
-------------------------------------------------------------------*/
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific and public-facing attributes, functions and site hooks.
 */
require_once AMO_TEAM_SHOWCASE_PLUGIN_PATH . 'includes/class-amo-team-showcase.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_amo_team_showcase() {

	$plugin = new Amo_Team_Showcase( '4.6' );
	$plugin->run();
}
run_amo_team_showcase();