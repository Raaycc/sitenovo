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
	<div class="{p}panel {p}panel--member-metabox">
		<noscript><div class="{p}general-warning {p}no-js-warning"><?php _e('Warning — This team member metabox, and the plugin itself, will not work properly without Javascript!', 'amo-team' ) ?></div></noscript>

		<div class="{p}panel__body">

			<div class="{p}panel__sidebar">
				<ul class="{p}nav {p}tabs">
					<li role="presentation" class="active"><a href="#{p}general-t" aria-controls="{p}general-t" role="tab" data-toggle="tab"><i class="{p}icon-settings"></i><span class="{p}tab__title"><?php _ex( 'General', 'Navigation tab name in team member metabox.', 'amo-team' ) ?></span></a></li>
					<li role="presentation"><a href="#{p}post-format-t" aria-controls="{p}post-format-t" role="tab" data-toggle="tab"><i class="{p}icon-layout-accordion-separated"></i><span class="{p}tab__title"><?php _ex( 'Post Format', 'Navigation tab name in team member metabox.', 'amo-team' ) ?></span></a></li>
				</ul>
			</div><!-- .panel__sidebar -->

			<div id="{p}panel__content" class="{p}panel__content">
					<div class="{p}tabs-content">
						<?php echo $a['tab-panes'] ?>
					</div><!-- .tab-content -->
			</div><!-- .panel__content -->


		</div><!-- .panel__body -->

	</div><!-- .panel -->
