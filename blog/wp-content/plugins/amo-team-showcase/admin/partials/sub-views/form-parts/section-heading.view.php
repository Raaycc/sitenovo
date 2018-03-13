<?php
/**
 * Section Heading in a tab pane
 *
 * Reference:
 * $a  – Arguments, an array of predefined values for the current field
 *
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */

?>
<h3 class="{p}tab__heading {p}section-heading"><?php echo $a['heading'] ?></h3>
<?php if ( $a['desc'] ) : ?>
<p class="{p}tab__desc"><?php echo $a['desc'] ?></p>
<?php endif ?>