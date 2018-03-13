<?php
/**
 * Template to assemble CSS styles from plugin's options
 *
 * Reference:
 * $a  – Option values, an array of values, which is saved in plugin's options
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */
?>

<?php
/*-------------------------------------------------------------------
▐	1. INIT VARIABLES
--------------------------------------------------------------------*/
$main_color = esc_attr( $a['options']['main-color'] );
$secondary_color = esc_attr( $a['options']['secondary-color'] );
$main_font_color = esc_attr( $a['options']['main-font-color'] );

// Thumbnail
$thumb_overlay_color = esc_attr( $a['options']['thumb-overlay-color'] );
$thumb_overlay_opacity = esc_attr( $a['options']['thumb-overlay-opacity'] );
$thumb_title_font_size = absint( $a['options']['thumb-title-font-size'] );
$thumb_subtitle_font_size = absint( $a['options']['thumb-subtitle-font-size'] );
$thumb_hover_icon_size = absint( $a['options']['thumb-hover-icon-size'] );

$thumb_custom_hover_icon = $a['options']['thumb-overlay-icon-info'] || $a['options']['thumb-overlay-icon-link'];
$thumb_custom_icon_size = esc_attr( $a['options']['thumb-custom-icon-size'] );

// Panel
$panel_title_font_size = absint( $a['options']['panel-title-font-size'] );
$panel_subtitle_font_size = absint( $a['options']['panel-subtitle-font-size'] );
$panel_bg_color = esc_attr( $a['options']['panel-bg-color'] );
$panel_font_color = esc_attr( $a['options']['panel-font-color'] );

// Panel | Post Formats
$quote_bg_color = esc_attr( $a['options']['quote-bg-color'] );

// Shortcodes
$sc_headings_decor = absint( $a['options']['sc-headings-decor'] );
$sc_title_font_size = absint( $a['options']['sc-title-font-size'] );
$sc_subtitle_font_size = absint( $a['options']['sc-subtitle-font-size'] );
$sc_bottom_margin = absint( $a['options']['sc-bottom-margin'] );
$skill_bottom_line_opacity = esc_attr( $a['options']['skill-b-line-opacity'] );

/*-------------------------------------------------------------------
▐	2. ASSEMBLE STYLES
--------------------------------------------------------------------*/

/*  2.0 General
-------------------------------------------------------------------*/
/*  Buttons
----------------------------------*/
?>
.{p}btn {
	color: <?php echo $main_font_color ?>;
}

.{p}btn:focus, .{p}btn:hover {
	color: <?php echo $main_font_color ?>;
}


<?php
/*  2.1 Member Tiles/Thumbnails
-------------------------------------------------------------------*/
?>
.{p}member-name {
	background: <?php echo $main_color ?>;
	font-size: <?php echo $thumb_title_font_size ?>px;
}

.{p}member-subtitle {
	background: <?php echo $secondary_color ?>;
	font-size: <?php echo $thumb_subtitle_font_size ?>px;
}

.{p}member-info, .{p}member-hover-icon {
	color: <?php echo $main_font_color ?>;
}

.{p}member-hover-icon {
	width: <?php echo $thumb_hover_icon_size * 1.75 ?>px;
	height: <?php echo $thumb_hover_icon_size * 1.75 ?>px;
	background: <?php echo $main_color ?>;
}

.{p}member-hover-icon.{p}member-custom-hover-icon {
<?php echo ($thumb_custom_hover_icon && $thumb_custom_icon_size) ? 'width:' . $thumb_custom_icon_size . ';' : ''?>;
<?php echo ($thumb_custom_hover_icon && $thumb_custom_icon_size) ? 'height: auto;' : '' ?>;
}

.{p}member-hover-icon i {
	font-size: <?php echo $thumb_hover_icon_size ?>px;
}

.{p}tiles__item .{p}member:before {
	background: <?php echo ( $thumb_overlay_color ) ? $thumb_overlay_color : $secondary_color ?>;
}

.{p}tiles__item .{p}member:hover:before {
	opacity: <?php echo $thumb_overlay_opacity ?>;
}

<?php // Tile Style 2 ?>
.{p}tile-style-2 .{p}member-img-wrap:before {
	border-left-color: <?php echo $main_color ?>;
	border-top-color: <?php echo $main_color ?>;
}

<?php
/*  2.2 Member Panel
-------------------------------------------------------------------*/
/*  General
----------------------------------*/?>
.{p}panel {
	background: <?php echo $panel_bg_color ?>;
	color: <?php echo ( $panel_font_color ) ? $panel_font_color : $secondary_color ?>;
}

<?php
/*  Header
----------------------------------*/?>
.{p}btn-panel-close {
	background: <?php echo $main_color ?>;
}

.{p}btn-panel-close:hover, .{p}btn-panel-close:focus {
	background: <?php echo $secondary_color ?>;
}

.{p}panel__heading {
	color: <?php echo $main_font_color ?>;
}

.{p}panel__title {
	background: <?php echo $main_color ?>;
	color: <?php echo $main_font_color ?>;
	font-size: <?php echo $panel_title_font_size ?>px;
	min-width: <?php echo min( 640, round( ( $panel_title_font_size * 12.222 ), 1 ) )?>px;

}

.{p}panel__subtitle {
	background: <?php echo $secondary_color ?>;
	font-size: <?php echo $panel_subtitle_font_size ?>px;
	min-width: <?php echo min( 640, round( ( $panel_subtitle_font_size * 10 ), 1 ) )?>px;
}

<?php
/*  Social Icons
----------------------------------*/?>

@media (max-width: 550px) {
	.{p}panel__icons {
		background: <?php echo $secondary_color ?>;
	}
}

.{p}panel__icons a:hover i,
.{p}panel__icons a:focus i,
.{p}panel__custom-icon:hover {
	background: <?php echo $main_color ?>;
}

.{p}panel__icons i {
	color: <?php echo $main_font_color ?>;
}

<?php
/*  /*  Header | Post Format VARIATIONS
----------------------------------*/?>
.{p}panel-pf-standard .{p}panel__icons,
.{p}panel-pf-quote .{p}panel__icons,
.{p}panel-pf-standard .{p}panel__standard,
.{p}panel-pf-quote .{p}panel__standard {
	background: <?php echo $secondary_color ?>;
}

.{p}panel-pf-standard .{p}btn-panel-close,
.{p}panel-pf-quote .{p}btn-panel-close {
	background: <?php echo $secondary_color ?>;
}

.{p}panel-pf-standard .{p}btn-panel-close:hover,
.{p}panel-pf-quote .{p}btn-panel-close:hover,
.{p}panel-pf-standard .{p}btn-panel-close:focus,
.{p}panel-pf-quote .{p}btn-panel-close:focus {
	background: <?php echo $main_color ?>;
}

<?php
/*  Content
----------------------------------*/?>
.{p}panel-pf-image .{p}panel__content {
	padding-top: <?php echo 30 + ( $panel_subtitle_font_size + 10 ) ?>px;
}

@media (min-width: 600px) {
	.{p}panel-pf-image .{p}panel__content {
		padding-top: <?php echo 40 + ( $panel_subtitle_font_size + 10 ) ?>px;
	}
}

<?php
/*  Content | Post Formats
----------------------------------*/?>
.{p}panel__quote_wrap {
background: <?php echo $quote_bg_color ?>;
}

<?php
/*  2.3 Panel Shortcodes
-------------------------------------------------------------------*/
/*  General
----------------------------------*/?>
.{p}panel-highlight-word {
	background: <?php echo $main_color ?>;
	color: <?php echo $main_font_color ?>;
}

.{p}panel-sc_title, .{p}panel-sc_subtitle {
	color: <?php echo ( $panel_font_color ) ? $panel_font_color : $secondary_color ?> !important;
}

.{p}panel-sc_title {
	font-size: <?php echo $sc_title_font_size ?>px !important;
}

{p}panel-sc_subtitle {
	font-size: <?php echo $sc_subtitle_font_size ?>px !important;
}

.{p}panel-sc {
margin-bottom: <?php echo $sc_bottom_margin ?>px;
}

<?php
// if headings decoration is OFF
if ( ! $sc_headings_decor ) : ?>
	.{p}panel-sc__header {
		border-left: none;
		padding-left: 0 !important;
	}

	.{p}panel-sc__header:before, .{p}panel-sc__header:after {
		content: inherit;
		content: initial;
	}

<?php endif; // headings decoration is OFF ?>


<?php
/*  Text Block
----------------------------------*/?>
<?php // if headings decoration is ON
if ( $sc_headings_decor ) : ?>

.{p}sc-text-block__header {
	border-color: <?php echo $main_color ?>;
}

.{p}sc-text-block__header:before {
	border-color: <?php echo $secondary_color ?>;
}
<?php endif; // headings decoration is ON ?>


<?php
/*  Skills
----------------------------------*/?>
<?php // if headings decoration is ON
if ( $sc_headings_decor ) : ?>

.{p}sc-skills__header:before {
	border-bottom-color: <?php echo $main_color ?>;
}

.{p}sc-skills__header:after {
	border-bottom-color: <?php echo $secondary_color ?>;
}
<?php endif; // headings decoration is ON ?>


<?php
/*  Skill | single
----------------------------------*/?>
.{p}sc-skill__bottom-line {
	background: <?php echo $secondary_color ?>;
	opacity: <?php echo $skill_bottom_line_opacity ?>;
}

.{p}sc-skill__top-line {
	background: <?php echo $main_color ?>;
}