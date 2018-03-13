<?php
/**
 * Shortcode - Skills | Parent shortcode for Skill sc
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

<div class="{p}panel-sc {p}sc-skills {p}panel-sc-only-title <?php echo $a['class'] ?>">

	<div class="{p}panel-sc__header {p}sc-skills__header">
		<h5 class="{p}panel-sc_title {p}sc-skills_title"><?php echo $a['title'] ?></h5>
	</div><!-- .sc-bio__header -->

	<div class="{p}panel-sc__content {p}sc-skills__content"><?php echo $a['content'] ?></div>

</div><!-- .sc-skills -->