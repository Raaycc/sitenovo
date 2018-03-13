<?php
/*  Repeated text/placeholder values for the array
-------------------------------------------------------------------*/
$font_size_placeholder = __( 'Enter a font size', 'amo-team' );
$select_style = _x( 'Style', 'the first part of option name in select input', 'amo-team' );
$global_setting = __( 'A global setting that can be overridden in plugin shortcodes.', 'amo-team' );

/**
 * Arguments/Parameters for filling Options page with form inputs,
 * switchers, tab panes, etc. using sub-views templates
 *
 * @since   1.0.0
 */
return array(

	// Name of a sub-folder in 'sub-views' folder, where views/templates for these parameters are contained
	'form-parts',

	// Parameters / Arguments

	/*-------------------------------------------------------------------
	▐	1. General Settings
	--------------------------------------------------------------------*/
	array( // tab - open
		'heading' => _x( 'General Settings', 'Options section title.', 'amo-team' ),
		'tab-id'  => 'general-t',
		'type'    => 'tab-pane-open',
		'active'  => true,
	),

	array(
		'title'   => __( 'Showcase Style', 'amo-team' ),
		'desc'    => sprintf( '%s %s %s', __( 'Visual style of member thumbnails.', 'amo-team' ), $global_setting, __('Note: for round image styles (Style 2) to look properly, you should upload/use images, which size is at least 640x640 pixels or which are square.', 'amo-team') ),
		'type'    => 'select',
		'std'     => '1',
		'options' => array(
			'1'   => $select_style . ' 1',
			'1_1' => $select_style . ' 1.1',
			'2'   => $select_style . ' 2',
			'2_1' => $select_style . ' 2.1',
		),
		'id'      => 'tile-style',
	),

	array(
		'title' => __( 'Main Accent Color', 'amo-team' ),
		'desc'  => __( 'Sets color for certain areas/elements, both in member thumbnails and info panel.', 'amo-team' ),
		'type'  => 'color-picker',
		'alpha' => 'true',
		'std'   => '#68d4cd',
		'id'    => 'main-color',
	),

	array(
		'title' => __( 'Secondary Accent Color', 'amo-team' ),
		'desc'  => __( 'Sets color for certain areas/elements, both in member thumbnails and info panel.', 'amo-team' ),
		'type'  => 'color-picker',
		'alpha' => 'true',
		'std'   => '#556270',
		'id'    => 'secondary-color',
	),

	array(
		'title' => __( 'Main Font Color', 'amo-team' ),
		'desc'  => __( 'Font / Icon color for use on colored backgrounds, both in member thumbnails and info panel.', 'amo-team' ),
		'type'  => 'color-picker',
		'std'   => '#fff',
		'id'    => 'main-font-color',
	),

	array( // End - General Settings tab
		'comment' => 'End - General Settings tab',
		'type'    => 'close-elem',
	),

	/*-------------------------------------------------------------------
	▐	2. Thumbnails
	--------------------------------------------------------------------*/
	array( // tab - open
		'heading' => _x( 'Member Thumbnails', 'Options section title.', 'amo-team' ),
		'tab-id'  => 'thumbs-t',
		'type'    => 'tab-pane-open',
	),

	array(
		'title'   => __( 'Alignment', 'amo-team' ),
		'desc'    => sprintf( '%s %s',__( 'Alignment of member thumbnails. The settings is relevant if "full-width" parameter in shortcode is set to "no", or if there are not enough team members to show them in full width of the container.', 'amo-team' ), $global_setting ),
		'type'    => 'select',
		'std'     => 'left',
		'options' => array(
			'left'   => __( 'Left', 'amo-team' ),
			'center' => __( 'Center', 'amo-team' ),
			'right'  => __( 'Right', 'amo-team' ),
		),
		'id'      => 'tile-alignment',
	),

	array(
		'title'   => __( 'Title/Subtitle Alignment', 'amo-team' ),
		'desc'    => sprintf( '%s',__( 'Alignment of headings (title and subtitle) in member thumbnails.', 'amo-team' ) ),
		'type'    => 'select',
		'std'     => 'right',
		'options' => array(
			'left'   => __( 'Left', 'amo-team' ),
			'right'  => __( 'Right', 'amo-team' ),
		),
		'id'      => 'thumb-info-align',
	),

	array(
		'title'       => __('Title Font Size', 'amo-team' ),
		'desc'        => __('Font size for thumbnail\'s title (px).', 'amo-team' ),
		'type'        => 'number',
		'std'         => '18',
		'id'          => 'thumb-title-font-size',
		'placeholder' => $font_size_placeholder,
	),

	array(
		'title'       => __('Subtitle Font Size', 'amo-team' ),
		'desc'        => __('Font size for thumbnail\'s subtitle (px).', 'amo-team' ),
		'type'        => 'number',
		'std'         => '14',
		'id'          => 'thumb-subtitle-font-size',
		'placeholder' => $font_size_placeholder,
	),

	array(
		'title' => __( 'Thumbnail Overlay', 'amo-team' ),
		'desc'  => __( 'Thumbnail overlay color on mouse hover. If it\'s not set, then will be used Secondary Accent Color.', 'amo-team' ),
		'type'  => 'color-picker',
		'std'   => '',
		'id'    => 'thumb-overlay-color',
	),

	array(
		'title' => __( 'Overlay Opacity', 'amo-team' ),
		'desc'  => __( 'Opacity of the overlay color.', 'amo-team' ),
		'type'    => 'select',
		'std'     => '0.8',
		'options' => array(
			'0.1' => '10%',
			'0.2' => '20%',
			'0.3' => '30%',
			'0.4' => '40%',
			'0.5' => '50%',
			'0.6' => '60%',
			'0.7' => '70%',
			'0.8' => '80%',
			'0.9' => '90%',
			'1'   => '100%',
		),
		'id'      => 'thumb-overlay-opacity',
	),

	array(
		'title'       => __('Overlay Icon Size', 'amo-team' ),
		'desc'        => __('Size for overlay/hover icon in member thumbnail (px). Icon\'s colored background will be enlarged/decreased along with the icon size automatically.', 'amo-team' ),
		'type'        => 'number',
		'std'         => '32',
		'id'          => 'thumb-hover-icon-size',
		'placeholder' => $font_size_placeholder,
	),

	array(
		'title'       => __('Custom Info Icon', 'amo-team' ),
		'desc'        => __('You can set custom info (i) icon, which shows on hover. Use transparent PNG image.', 'amo-team' ),
		'type'        => 'upload',
		'id'          => 'thumb-overlay-icon-info',
	),

	array(
		'title'       => __('Custom Link Icon', 'amo-team' ),
		'desc'        => __('You can set custom link icon, which shows on hover. Use transparent PNG image.', 'amo-team' ),
		'type'        => 'upload',
		'id'          => 'thumb-overlay-icon-link',
	),

	array(
		'title'       => __('Custom Icon Size', 'amo-team' ),
		'desc'        => __('Visual size for custom overlay/hover icon in member thumbnail. Useful if you want to use, for example, 150x150 px image but show it as 75x75 px one. You can use any measurement units for example: 70px, 5em or 25%.', 'amo-team' ),
		'type'        => 'text',
		'std'         => '',
		'id'          => 'thumb-custom-icon-size',
		'placeholder' => __('Enter icon size', 'amo-team' ),
	),

	array(
		'title' => __( 'Hover Effect', 'amo-team' ),
		'desc'  => __( 'On / Off the effect on mouse hover over team member thumbnail.', 'amo-team' ),
		'type'  => 'switcher',
		'std'   => '1',
		'id'    => 'thumb-hover',
	),

	array( // End - Info Panel tab
		'comment' => 'End - Thumbnails tab',
		'type'    => 'close-elem',
	),

	/*-------------------------------------------------------------------
	▐	3. Info Panel
	--------------------------------------------------------------------*/
	array( // tab - open
		'heading' => _x( 'Member Info Panel', 'Options section title.',  'amo-team' ),
		'tab-id'  => 'panel-t',
		'type'    => 'tab-pane-open',
	),

	array(
		'title'       => __('Title Font Size', 'amo-team' ),
		'desc'        => __('Font size for panel\'s title (px).', 'amo-team' ),
		'type'        => 'number',
		'std'         => '26',
		'id'          => 'panel-title-font-size',
		'placeholder' => $font_size_placeholder,
	),

	array(
		'title'       => __('Subtitle Font Size', 'amo-team' ),
		'desc'        => __('Font size for panel\'s subtitle (px).', 'amo-team' ),
		'type'        => 'number',
		'std'         => '20',
		'id'          => 'panel-subtitle-font-size',
		'placeholder' => $font_size_placeholder,
	),

	array(
		'title' => __( 'Background Color', 'amo-team' ),
		'desc'  => __( 'Panel\'s content background color.', 'amo-team' ),
		'type'  => 'color-picker',
		'std'   => '#fff',
		'id'    => 'panel-bg-color',
	),

	array(
		'title' => __( 'Content Font Color', 'amo-team' ),
		'desc'  => __( 'Panel\'s content font color. If it is not set, then will be used Secondary Accent Color.', 'amo-team' ),
		'type'  => 'color-picker',
		'std'   => '',
		'id'    => 'panel-font-color',
	),

	array( // section heading
		'heading' => _x( 'Post Formats', 'Options section title.',  'amo-team' ),
		'type'    => 'section-heading',
	),

	array(
		'title' => __( 'Quote BG Color', 'amo-team' ),
		'desc'  => __( 'Background color for quote area in panel. Quote post format.', 'amo-team' ),
		'type'  => 'color-picker',
		'alpha' => 'true',
		'std'   => 'rgba(85, 98, 112, 0.035)',
		'id'    => 'quote-bg-color',
	),

	array( // section heading
		'heading' => _x( 'Additional Settings', 'Options section title.',  'amo-team' ),
		'type'    => 'section-heading',
	),

	array(
		'title' => __( 'Alternative Scrolling', 'amo-team' ),
		'desc'  => __( 'If scrolling in member info panel doesn\'t work, you can try to enable this alternative scrolling. Best looks with centered panel.', 'amo-team' ),
		'type'  => 'switcher',
		'std'   => '0',
		'id'    => 'panel-alt-scroll',
	),

	array(
		'title' => __( 'Member Image Preloading', 'amo-team' ),
		'desc'  => __( 'Enable / Disable to load panel member image on page load (for image post type). By default panel member image loads when user hovers over member\'s thumbnail (or click it on mobile). Thus page loads faster, because plugin loads member image in panel only on demand, after the page is already loaded.', 'amo-team' ),
		'type'  => 'switcher',
		'std'   => '0',
		'id'    => 'panel-img-preload',
	),

	array( // End - Info Panel tab
		'comment' => 'End - Info Panel tab',
		'type'    => 'close-elem',
	),

	/*-------------------------------------------------------------------
	▐	4. Shortcodes
	--------------------------------------------------------------------*/
	array( // tab - open
		'heading' => _x( 'Info Panel\'s Shortcodes Settings', 'Options section title.',  'amo-team' ),
		'tab-id'  => 'shortcodes-t',
		'type'    => 'tab-pane-open',
	),

	array(
		'title' => __( 'Headings Decoration', 'amo-team' ),
		'desc'  => __( 'Enable / Disable colored decorations (colored lines) in info panel for heading/title of shortcodes: Text Block, Skills.', 'amo-team' ),
		'type'  => 'switcher',
		'std'   => '1',
		'id'    => 'sc-headings-decor',
	),

	array(
		'title'       => __('Title Font Size', 'amo-team' ),
		'desc'        => __('Title font size (px) for the info panel shortcodes (Text Block, Skills).', 'amo-team' ),
		'type'        => 'number',
		'std'         => '25',
		'id'          => 'sc-title-font-size',
		'placeholder' => $font_size_placeholder,
	),

	array(
		'title'       => __('Subtitle Font Size', 'amo-team' ),
		'desc'        => __('Subtitle font size (px) for the info panel shortcodes (Text Block, Skills).', 'amo-team' ),
		'type'        => 'number',
		'std'         => '15',
		'id'          => 'sc-subtitle-font-size',
		'placeholder' => $font_size_placeholder,
	),

	array(
		'title'       => __('Bottom Margin', 'amo-team' ),
		'desc'        => __('Shortcode\'s (Text Block, Skills) bottom margin in info panel (px).', 'amo-team' ),
		'type'        => 'number',
		'std'         => '85',
		'id'          => 'sc-bottom-margin',
		'placeholder' => __('Please enter a value', 'amo-team' ),
	),

	array( // section heading
		'heading' => _x( 'Skills Shortcode', 'Options section title.',  'amo-team' ),
		'type'    => 'section-heading',
	),

	array(
		'title' => __( 'Underlying Line Opacity', 'amo-team' ),
		'desc'  => __( 'Underlying skill line (grey by default) uses Secondary Accent Color and this opacity setting to make the line color lighter/darker, which also depends on panel\'s background color.', 'amo-team' ),
		'type'    => 'select',
		'std'     => '0.1',
		'options' => array(
			'0.1' => '10%',
			'0.2' => '20%',
			'0.3' => '30%',
			'0.4' => '40%',
			'0.5' => '50%',
			'0.6' => '60%',
			'0.7' => '70%',
			'0.8' => '80%',
			'0.9' => '90%',
			'1'   => '100%',
		),
		'id'      => 'skill-b-line-opacity',
	),


	array( // End - Shortcodes tab
		'comment' => 'End - Shortcodes tab',
		'type'    => 'close-elem',
	),

	/*-------------------------------------------------------------------
	▐	4. Miscellaneous
	--------------------------------------------------------------------*/
	array( // tab - open
		'heading' => _x( 'Plugin\'s Uninstall Settings', 'Options section title.',  'amo-team' ),
		'tab-id'  => 'misc-t',
		'type'    => 'tab-pane-open',
	),

	array(
		'title' => __( 'Delete Options / Settings', 'amo-team' ),
		'desc'  => __( /** @lang text */ 'Delete plugin\'s options / settings, when uninstalling via Plugins > Delete.', 'amo-team' ),
		'type'  => 'switcher',
		'std'   => '1',
		'id'    => 'uninstall-settings',
	),

	array(
		'title' => __( 'Delete Custom Post Type', 'amo-team' ),
		'desc'  => __( /** @lang text */ 'Delete team members (custom post type) and their categories, when uninstalling via Plugins > Delete.', 'amo-team' ),
		'type'  => 'switcher',
		'std'   => '0',
		'id'    => 'uninstall-posts',
	),

	array( // section heading
		'heading' => _x( 'Different Fixes:', 'Options section title.',  'amo-team' ),
		'type'    => 'section-heading',
	),

	array(
		'title' => __( 'Clear jQuery events for thumbnails', 'amo-team' ),
		'desc'  => htmlentities(__( 'Clear all jQuery events for member thumbnails (for their <a> tags and <ul> container), on their init. May help to prevent problems with other scripts, which may automatically apply some jQuery events to these elements.', 'amo-team' )),
		'type'  => 'switcher',
		'std'   => '1',
		'id'    => 'thumbs-clear-events',
	),


	array( // End - Shortcodes tab
		'comment' => 'End - Miscellaneous tab',
		'type'    => 'close-elem',
	),

);
