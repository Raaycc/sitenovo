<?php
/**
 * Member info panel
 *
 * Reference:
 * $a  – Arguments, an array of variables for the template
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * Notes:
 * 1. Almost everything is escaped in shortcode function
 *
 * @since   1.0.0
 */
?>

<div id="<?php echo $a['panel_id'] ?>" class="{p}panel mfp-hide <?php echo $a['panel_classes'] ?>"
     data-align="<?php echo $a['panel'] ?>" data-format="<?php echo $a['metaboxes']['post_format'] ?>">

	<div class="{p}panel__header">

		<?php if ( $a['metaboxes']['social-icons'] ) : // if social icons are enabled ?>

		  <?php
		  $custom_icons_class = '';
		  foreach ( $a['metaboxes']['social-icon-blocks'] as $icon ) {
			  if ( ! empty ( $icon['custom_icon'] ) ) {
			   $custom_icons_class = '{p}panel__custom-icons';
			  }
		  } // FOREACH	?>

			<ul class="{p}panel__icons <?php echo $custom_icons_class ?>">
			 <?php foreach ( $a['metaboxes']['social-icon-blocks'] as $icon ) :
				 $icon_name = esc_attr( $icon['select_icon'] );
				 // if social icon link is set
				 if ( $icon['social_link'] ) :?>
					 <?php if ( ! empty ( $icon['custom_icon'] ) ) : ?>
							  <li class="{p}panel__custom-icon"><a target="_blank" title="<?php echo ucfirst( $icon_name ) ?>"
										  href="<?php echo $icon['social_link'] ?>"><img class="{p}center-block" src="<?php echo $icon['custom_icon'] ?>" alt="icon"></a></li>
					 <?php else : ?>
							  <li><a target="_blank" title="<?php echo ucfirst( $icon_name ) ?>" href="<?php echo $icon['social_link'] ?>"><i aria-hidden="true" class="{p}icon-<?php echo $icon_name ?>"></i></a></li>
					 <?php endif; // custom_icon ?>
				 <?php endif; // social_link ?>
			 <?php endforeach; ?>
			</ul>
		<?php elseif ( $a['std_post_formats'] ) : // if post format - standard/quote ?>
			<div class="{p}panel__standard"></div>
		<?php endif; // first_post  ?>


		<button type="button" class="{p}btn {p}btn-rc-square {p}btn-panel-close" data-dismiss="modal" aria-label="<?php _ex( 'Close Panel', 'button label', 'amo-team' ) ?>"><i aria-hidden="true" class="{p}icon-close"></i></button>

		<?php
		/*  Output header part depending on post format
		--------------------------------------------------------------------*/ ?>
		<?php if ( $a['metaboxes']['post_format'] == 'image' && $a['panel_img'] ) : // image url is present ?>
		<div class="{p}panel__img-wrap">
			<?php
			# if panel image preload is off
			if ( ! $a['opts']['panel-img-preload'] ) : ?>
			<img class="{p}panel__img" src="<?php echo AMO_TEAM_SHOWCASE_PLUGIN_URL . 'public/img/image-placeholder.png' ?>" data-src="<?php echo $a['panel_img'] ?>" alt="<?php echo $a['title_attr'] ?>">
			<?php else : ?>
				<img class="{p}panel__img" src="<?php echo $a['panel_img'] ?>" data-img-preloaded="1" alt="<?php echo $a['title_attr'] ?>">
			<?php endif;
			# panel image preload ?>
		</div><!-- .panel__img-wrap -->

		<?php elseif( $a['metaboxes']['post_format'] == 'quote' && $a['metaboxes']['quote'] ) : // if quote  ?>
			<div class="{p}panel__quote_wrap">
				<p class="{p}panel__quote"><?php echo $a['metaboxes']['quote'] ?></p>
			</div><!-- .panel__quote -->

		<?php elseif( ! $a['metaboxes']['post_format'] && $a['code-block'] ) : // if quote  ?>
			<div class="{p}code-block"><?php echo $a['code-block'] ?></div>
		<?php endif; // standard | .code-block ?>

		<div class="{p}panel__heading">
			<h3 class="{p}panel__title {p}panel__heading-item"><?php echo $a['title'] ?></h3>
			<?php if ( $a['subtitle'] ) : ?>
			<div class="{p}panel__subtitle {p}panel__heading-item"><?php echo $a['subtitle'] ?></div>
			<?php endif; // subtitle  ?>
		</div>

	</div><!-- .panel__header -->

	<div class="{p}panel__content">
		<?php echo $a['content'] ?>
	</div><!-- .panel__content -->

</div><!-- .panel -->