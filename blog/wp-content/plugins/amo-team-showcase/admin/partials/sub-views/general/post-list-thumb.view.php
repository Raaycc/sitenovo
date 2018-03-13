<?php
/**
 * Member post img in post list | All Members page
 *
 * File named after its CSS class
 *
 * Reference:
 * $a  – Arguments, an array of variables for the template
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */
?>
<img class="{p}post-list-thumb" src="<?php echo $a['img_url'] ?>" alt="member's featured image thumbnail" title="member's featured image thumbnail" >