<?php
/**
 * Modal window/block | For shortcodes button
 * File named after its ID attribute
 *
 * Reference:
 * $a  – Arguments, an array of variables for the template
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */
// get general link title value
$link_title = array_shift($a);

?>
<div style="display: none" id="AmoTeamShortcodesModal" class="{p}modal AmoTeamShortcodesModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="{p}modal-header">
				<button type="button" class="{p}btn {p}btn--panel-sign {p}btn--panel-sign--2 {p}btn--close-sc-modal" data-dismiss="modal" aria-label="<?php _ex( 'Close modal window', 'button label', 'amo-team' ) ?>"><i aria-hidden="true" class="{p}icon-close"></i></button>
				<h4 class="{p}modal-title"><?php _e( 'AMO Team Shortcodes', 'amo-team' ) ?></h4>
			</div>
			<div class="{p}modal-body">
				<div class="{p}row">

					<?php foreach ( $a as $sc_block ) : // shortcode block ?>
					<div class="{p}col-2">
						<div class="{p}modal__sc-block" data-shortcode="<?php echo $sc_block['type'] ?>">
							<div class="{p}modal__sc-wrap">
								<i class="<?php echo $sc_block['class'] ?> {p}modal__sc-icon"></i>
								<div class="{p}modal__sc-title"><?php echo $sc_block['title'] ?></div>
								<a target="_blank" href="<?php echo $sc_block['link'] ?>" title="<?php echo $link_title ?>"><i class="{p}icon-help {p}modal__sc-help"></i></a>
							</div>
						</div>
					</div><!-- .col-2 -->
					<?php endforeach; // $sc_block ?>

				</div><!-- .row -->
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
