<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @since      1.0.0
 * @package    Amo_Team_Showcase
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

# get plugin's options
$amo_team_options = get_option( 'amo-team-showcase-options' );

# If plugin options set to delete settings/options on uninstall
if ( $amo_team_options['uninstall-settings'] ) {
	$options_to_remove = array(
		'amo-team-showcase-system',
		'amo-team-showcase-css-styles',
		'amo-team-showcase-options',
	);

	// delete options from the database
	foreach ( $options_to_remove as $option ) {
		delete_option( $option );
	} // FOREACH

} // IF | delete settings/options on uninstall


# If plugin options set to delete the custom posts data related to them
if ( $amo_team_options['uninstall-posts'] ) {

	global $wpdb;

	# Delete revisions of our custom post type
	$wpdb->query( "DELETE p FROM {$wpdb->posts} p INNER JOIN {$wpdb->posts} pp ON pp.id = p.post_parent WHERE pp.post_type = 'amo-team' AND p.post_type = 'revision';" );
	# Delete our custom post type posts and their meta
	$wpdb->query( "DELETE p,pm FROM {$wpdb->posts} p LEFT JOIN {$wpdb->postmeta} pm ON pm.post_id = p.id WHERE p.post_type = 'amo-team';" );


	# Delete plugin's term taxonomy
	$wpdb->delete( $wpdb->term_taxonomy, array(	'taxonomy' => 'amo-team-category', ) );
	delete_option( 'amo-team-category_children');

	# Delete orphan relationships
	$wpdb->query( "DELETE tr FROM {$wpdb->term_relationships} tr LEFT JOIN {$wpdb->posts} posts ON posts.ID = tr.object_id WHERE posts.ID IS NULL;" );

	# Delete orphan terms
	$wpdb->query( "DELETE t FROM {$wpdb->terms} t LEFT JOIN {$wpdb->term_taxonomy} tt ON t.term_id = tt.term_id WHERE tt.term_id IS NULL;" );

	# Delete orphan term meta
	if ( ! empty( $wpdb->termmeta ) ) {
		$wpdb->query( "DELETE tm FROM {$wpdb->termmeta} tm LEFT JOIN {$wpdb->term_taxonomy} tt ON tm.term_id = tt.term_id WHERE tt.term_id IS NULL;" );
	}

} // IF | delete the custom posts data related to them


# Clear any cached data that has been removed
wp_cache_flush();