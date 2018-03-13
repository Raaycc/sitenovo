<?php
/**
 * Plugin options page template
 *
 * Reference:
 * $a  – Arguments, an array of variables for the template
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */
?>
<div class="wrap">
	<h1 class="hidden">&nbsp;</h1>
	<?php echo $a['settings_notice'] ?>
	<div class="{p}panel {p}panel--options">
		<noscript><div class="{p}general-warning {p}no-js-warning"><?php _e('Warning — This options panel, and the plugin itself, will not work properly without Javascript!', 'amo-team' ) ?></div></noscript>
		<div class="{p}panel__heading">
			<h2 class="{p}panel__title"><?php printf( _x('%sAMO%s Team Showcase', 'plugin\'s name in options page', 'amo-team'), '<span>', '</span>' ) ?></h2>
			<?php echo $a['panel_buttons'] ?>
		</div><!-- .panel__heading -->

		<div class="{p}panel__body">

			<div class="{p}panel__sidebar">
				<?php echo $a['nav-tabs'] ?>
			</div><!-- .panel__sidebar -->

			<div id="{p}panel__content" class="{p}panel__content">
				<form id="{p}options-form" method="post" action="admin-post.php" enctype="multipart/form-data">
					<input type="hidden" name="action" value="amo_team_save_plugin_options">
					<input id="{p}submit-type" type="hidden" name="submit-type" value="save">
					<?php echo $a['form_nonce'] ?>
					<div class="{p}tabs-content">
							<?php echo $a['tab-panes'] ?>
					</div><!-- .tab-content -->
					<input type="submit" id="submit-form" class="hidden" />
				</form>
			</div><!-- .panel__content -->

			<div class="{p}plugin-version"><span><?php _ex( 'Version', 'The plugin version in the options page', 'amo-team' ) ?> <?php echo $a['plugin_version'] ?></span></div>

		</div><!-- .panel__body -->

		<div class="{p}panel__footer">
			<?php echo $a['panel_buttons'] ?>
		</div><!-- .panel__footer -->

	</div><!-- .panel -->

</div><!-- .wrap -->
