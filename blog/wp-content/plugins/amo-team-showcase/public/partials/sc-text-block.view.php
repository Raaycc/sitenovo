<?php
/**
 * Shortcode - Text Block
 *
 * Reference:
 * $a  – Arguments, an array of variables for the template
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * Sanitization/Escaping: everything escaped in the shortcode function
 *
 * @since   1.0.0
 */

?>

<div class="{p}panel-sc {p}sc-text-block <?php echo $a['class'] ?>">

	<div class="{p}panel-sc__header {p}sc-text-block__header">
		<h5 class="{p}panel-sc_title {p}sc-text-block_title"><?php echo $a['title'] ?></h5>

		<?php if ( $a['subtitle'] ) : ?>
		<div class="{p}panel-sc_subtitle {p}sc-text-block_subtitle"><?php echo $a['subtitle'] ?></div>
		<?php endif; // subtitle  ?>

	</div><!-- .sc-text-block__header -->

	<div class="{p}panel-sc__content {p}sc-text-block__content"><?php echo $a['content'] ?></div>

</div><!-- .sc-text-block -->