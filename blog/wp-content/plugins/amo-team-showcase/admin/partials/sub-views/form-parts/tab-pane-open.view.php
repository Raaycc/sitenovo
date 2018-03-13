<?php
/**
 * Tab Pane - Tab pane for tab contents with heading, and without closing tag.
 *
 * Reference:
 * $a  – Arguments, an array of predefined values for the current field
 *
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */
$a['active'] = $a['active'] ? 'active' : '';

?>
<div role="tabpanel" class="{p}tab__pane <?php echo $a['active'] ?>" id="{p}<?php echo $a['tab-id'] ?>">
	<h3 class="{p}tab__heading"><?php echo $a['heading'] ?></h3>
	<?php if ( $a['desc'] ) : ?>
	<p class="{p}tab__desc"><?php echo $a['desc'] ?></p>
	<?php endif ?>