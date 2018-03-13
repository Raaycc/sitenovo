<?php
/**
 * Shortcode - Skill | Child shortcode for Skills sc
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

<div class="{p}panel-inner-sc {p}sc-skill <?php echo $a['class'] ?>">
	<div class="{p}sc-skill__header">
		<div class="{p}sc-skill__title"><?php echo $a['title'] ?></div>
		<div class="{p}sc-skill__percent"><?php echo $a['percent'] ?>%</div>
	</div><!-- .sc-skill__header -->

	<div class="{p}sc-skill__line-wrap">
		<div class="{p}sc-skill__line {p}sc-skill__bottom-line"></div>
		<div class="{p}sc-skill__line {p}sc-skill__top-line" style="width: <?php echo $a['percent'] ?>%"></div>
	</div>

</div><!-- .sc-skill -->