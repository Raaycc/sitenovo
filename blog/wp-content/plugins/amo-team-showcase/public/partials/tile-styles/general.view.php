<?php
/**
 * Member thumbnail / tile | General template
 *
 * Reference:
 * $a  – Arguments, an array of variables for the template
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * Notes:
 * 1. Everything is escaped in shortcode function
 *
 * @since   1.0.0
 */
?>

<?php if ( $a['sc_id'] ) : // output <ul> on first post ?>
<ul id="<?php echo $a['sc_id'] ?>" class="{p}sc-team {p}tiles {p}<?php echo $a['class'] ?>">
<?php endif; // first_post  ?>
	<li class="{p}tiles__item <?php echo ( ! $a['panel_or_link'] ) ? '{p}tile-bg-hover-off' : '', $a['li_class'] ?>">

	<?php if ( $a['panel_or_link'] ) : // if panel is not off or post format link?>
	<a <?php echo  $a['link_params'] // the link escaped in the shortcode function?>>
	<?php endif; // panel_or_link  ?>

		<div class="{p}member">
			<?php if ( $a['panel_or_link'] ) : // if panel or link is not off ?>
				<div class="{p}member-hover-icon <?php
				if ( ( $a['post_format_link'] ? $a['opts']['thumb-overlay-icon-link'] : $a['opts']['thumb-overlay-icon-info'] ) )
				echo '{p}member-custom-hover-icon'; ?>">

				<?php # If is is set custom overlay icon
				if ( ( $a['post_format_link'] ? $a['opts']['thumb-overlay-icon-link'] : $a['opts']['thumb-overlay-icon-info'] ) ) : ?>
					<img src="<?php echo $a['post_format_link'] ? ( $a['opts']['thumb-overlay-icon-link'] ) : ( $a['opts']['thumb-overlay-icon-info'] ) ; ?>">
			 	<?php else : ?>
					<i class="{p}<?php echo $a['hover_icon'] ?>"></i>
				<?php endif; // is is set custom overlay icon  ?>
				</div>
			<?php endif; // panel_or_link  ?>

			<div class="{p}member-info {p}member-info--al-<?php echo $a['opts']['thumb-info-align'] ?> <?php if ( ! $a['subtitle'] ) echo '{p}member-info--ns' ?>">
				<div class="{p}member-name {p}member-info__item "><?php echo $a['title'] ?></div>
				<?php if ( $a['subtitle'] ) : ?>
				<div class="{p}member-subtitle {p}member-info__item"><?php echo $a['subtitle'] ?></div>
				<?php endif; // subtitle  ?>
			</div><!-- .member-info -->

			<div class="{p}member-img-wrap">
				<img class="{p}member-img" src="<?php echo $a['img_url'] ?>" alt="<?php echo esc_attr( $a['title'] ) ?>">
			</div>
		</div><!-- .member -->

	<?php if ( $a['panel_or_link'] ) : // if panel is not off or post format link?>
		</a>
	<?php endif; // panel_or_link  ?>
	</li><!-- .tiles__item -->

<?php if ( $a['last_post'] ) : ?>
</ul><!-- .sc-team -->
<?php endif; // last_post  ?>
