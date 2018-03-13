<?php
/**
 * Tabs navigation | Options page
 *
 * Reference:
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */
?>
<ul class="{p}nav {p}tabs {p}tabs--arrow {p}tabs--colored">

	<?php
	$first_item = key( $args );
	foreach ( $args as $key => $value ) : ?>
		<li role="presentation" <?php echo ( $first_item == $key ? 'class="active"' : '') ?>><a href="#{p}<?php echo $key ?>" aria-controls="{p}<?php echo $key ?>" role="tab" data-toggle="tab"><i class="{p}<?php echo $value[1] ?>"></i><span class="{p}tab__title"><?php echo $value[0] ?></span></a></li>
	<?php endforeach;	?>

</ul><!-- .tabs -->

