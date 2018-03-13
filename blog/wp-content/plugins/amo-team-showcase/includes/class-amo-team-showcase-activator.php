<?php

/**
 * Fires during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Amo_Team_Showcase
 * @subpackage Amo_Team_Showcase/includes
 * @author     AMO Themo (Oleg Goltsev)
 */
class Amo_Team_Showcase_Activator {

	/**
	 * Fires during plugin activation.
	 *
	 * @since    1.0.0
	 */
	public static function activate( $version ) {
		// check PHP and WordPress version for compatibility with the plugin
		self::php_version_check();

		// activate and update plugin's version, options and compiled/dynamic CSS
		self::settings_activation_and_update( $version, true );


		// Flush rewrite rules because this plugin adds custom post type
		flush_rewrite_rules();

	} // end plugin_activation


	public static function settings_activation_and_update( $version, $activation = false ) {
		$system_options = get_option( 'amo-team-showcase-system', array() );

		// if activation or update
		if ( ! $system_options || version_compare( $system_options['version'], $version, '<' ) ) {

			// Initialize the renderer with admin folder parameter
			$renderer = amo_team_showcase_renderer( 'admin' );

			// Save plugin's system data in database
			# set default values if they are missing
			$system_options += $renderer->fetch_arguments( 'system-data', 'activation' );
			// if activation and not just update
			if ( $activation ) {
				$system_options['notice-wp-version'] = true;
				$system_options['notice-thumb'] = true;
			} // if
			$system_options['version'] = $version;
			update_option( 'amo-team-showcase-system', $system_options );

			// Save options data/values to database
			$options = get_option( 'amo-team-showcase-options', array() );
			update_option( 'amo-team-showcase-options', ( $options += $renderer->fetch_arguments( 'options-data', 'activation' ) ) );

			// Save compiled/dynamic CSS styles to database
			update_option( 'amo-team-showcase-css-styles', $renderer->assemble_css_styles_from_options( $options ) );
		} // IF | new activation or update

	} // FNC | settings_activation_and_update


	public static function php_version_check() {
		$php_version_warning = false;
		$error_title        = __( 'The plugin cannot be activated, due to the following:', 'amo-team' );
		$back_link          = sprintf( '<br><a href="%s/plugins.php">&larr; %s</a>', admin_url(), _x( 'Back to plugins', 'a URL link', 'amo-team' ) );
		//$delimiter          = '<br><br>__( 'And also,', 'amo-team' )<br><br>';


		# The plugin only works properly in PHP 5.3 or later.
		if ( PHP_VERSION_ID < 50300 ) {
			$php_version_warning = sprintf( '<b>%s:</b> %s', __( 'Warning', 'amo-team' ), sprintf( __( 'Amo Team Showcase plugin requires at least PHP version 5.3. You are running version %s. Please contact your web hosting to upgrade/change PHP version.', 'amo-team' ), PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION ) );
		} // IF | PHP version

		// if PHP warning
		if ( $php_version_warning ) {
			wp_die( $php_version_warning . $back_link, $error_title );
		}

	} // php_version_check


} // CLASS
