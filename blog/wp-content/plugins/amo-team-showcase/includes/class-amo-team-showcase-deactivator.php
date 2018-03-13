<?php
/**
 * Fires during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Amo_Team_Showcase
 * @subpackage Amo_Team_Showcase/includes
 * @author     AMO Themo (Oleg Goltsev)
 */
class Amo_Team_Showcase_Deactivator {

	/**
	 * Fires during plugin deactivation.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		// Flush rewrite rules because this plugin adds custom post type
		flush_rewrite_rules();

		// to make the notice visible again on next plugin's activation
		$amo_team_system = get_option( 'amo-team-showcase-system' );
//		$amo_team_system['notice-thumb'] = true;
		update_option( 'amo-team-showcase-system', $amo_team_system );
	}

}
//amo-team-showcase-thumb-notice