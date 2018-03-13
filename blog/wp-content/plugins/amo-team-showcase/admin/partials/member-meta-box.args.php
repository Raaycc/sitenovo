<?php
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

	array( // General Settings tab - open
		'heading' => __( 'General Settings', 'amo-team' ),
		'tab-id'  => 'general-t',
		'type'    => 'tab-pane-open',
		'active'  => true,
	),

	array(
		'title'       => __( 'Subtitle', 'amo-team' ),
		'desc'        => __( 'Subtitle it is a text placed under the name/title of the member. E.g. – CEO, Graphic Designer, Film Director, etc.', 'amo-team' ),
		'type'        => 'text',
		'std'         => '',
		'id'          => 'subtitle',
		'placeholder' => __( 'Enter a Subtitle', 'amo-team' ),
	),

	array(
		'title' => __( 'Social Icons', 'amo-team' ),
		'desc'  => __( 'Enable/Disable social icons in member\'s info panel.', 'amo-team' ),
		'type'  => 'switcher',
		'std'   => '0',
		'id'    => 'social-icons',
	),

	array(
		'title'   => _x( 'Social Icon #', '# - it\'s a number sign', 'amo-team' ),
		'desc'    => __( 'Add social, skype or custom icons with links. If social icons are enabled, then they will be shown in team member\'s info panel. Max 12 icons.', 'amo-team' ),
		'type'    => 'group',
		'button_name'          => __( 'Add New Icon', 'amo-team' ),
		'limit_reached_notice' => __( 'The limit is reached, you can have only 12 social icons in team member info panel.', 'amo-team' ),
		'fields'  => array(
			array(
				'title'   => __( 'Select social icon', 'amo-team' ),
//				'desc'    => sprintf( __( 'Select an icon (by its name). Colors and other parameters can be set at the plugin’s %s options page.%s', 'amo-team' ), '<a class="' . AMO_TEAM_SHOWCASE_CSS_PREFIX . 'link" href="' . admin_url( 'edit.php?post_type=amo-team&page=amo-team-options' ) . '" target="_blank">', '</a>' ),
				'desc'  => __( 'Select an icon (by its name).', 'amo-team' ),
				'type'    => 'select',
				'std'     => 'facebook',
				'options' => array(
					'facebook'    => 'Facebook',
					'twitter'     => 'Twitter',
					'gplus'       => 'Google+',
					'youtube'     => 'YouTube',
					'vimeo'       => 'Vimeo',
					'instagram'   => 'Instagram',
					'linkedin'    => 'LinkedIn',
					'reddit'      => 'Reddit',
					'pinterest'   => 'Pinterest',
					'tumblr'      => 'Tumblr',
					'flickr'      => 'Flickr',
					'soundcloud'  => 'SoundCloud',
					'dribbble'    => 'Dribbble',
					'behance'     => 'Behance',
					'vk'          => 'VK',
					'twitch'      => 'Twitch',
					'steam'       => 'Steam',
					'github'      => 'GitHub',
					'skype'       => 'Skype',
					'website'     => 'Website',
				),
				'id'      => 'select_icon',
			),
			array(
				'title'       => __( 'Social icon link', 'amo-team' ),
				'desc'        => sprintf( '%s<br>%s', __( 'Proper link format is http://site.com/page, with http:// or https://, except for Skype.', 'amo-team' ), __( 'If link is not set, the social icon will not be outputted.', 'amo-team' ) ),
				'type'        => 'text',
				'id'          => 'social_link',
				'std'         => '',
				'placeholder' => __( 'Enter a Link', 'amo-team' ),
			),
			array(
				'title'       => __( 'Custom Icon', 'amo-team' ),
				'desc'        => __( 'You can set custom icon. Use square, PNG image with transparency.', 'amo-team' ),
				'type'        => 'upload',
				'std'         => '',
				'id'          => 'custom_icon',
				//'placeholder' => __( 'Image URL', 'amo-team' ),
				'class'       => '',
			),
		),
		'id'      => 'social-icon-blocks',
	),

	array( // End - General Settings tab
		'comment' => 'End - General Settings tab',
		'type'    => 'close-elem',
	),


	array( // Info Panel tab - open
		'heading' => __( 'Post Format Settings', 'amo-team' ),
		'desc'    => __( 'The settings presented here, depends on a chosen post format. E.g.: Standard, Image, Link, Quote.', 'amo-team' ),
		'tab-id'  => 'post-format-t',
		'type'    => 'tab-pane-open',
	),

//	array(
//		'title' => __( 'Image for Quote', 'amo-team' ),
//		'desc'  => __( 'Image will be used as a background for the quote. For that purpose will be used an image set in the Featured Image. ', 'amo-team' ),
//		'type'  => 'switcher',
//		'std'   => '0',
//		'class' => AMO_TEAM_SHOWCASE_CSS_PREFIX . 'post-format-quote hidden',
//		'id'    => 'img-other-post-formats',
//	),

	array(
		'title'       => __( 'Info Panel Image', 'amo-team' ),
		'desc'        => sprintf( '%s<br>%s<br>%s', __( 'This image will be used in member\'s info panel.', 'amo-team' ), __( ' It\'s recommended to upload / use an image, which size is at least 640x640 pixels, or more.', 'amo-team' ), __( 'What about the "Featured Image", it is used in team member’s thumbnail, and also in info panel too, if info panel image is not set.', 'amo-team' ) ),
		'type'        => 'upload',
		'std'         => '',
		'id'          => 'panel-img',
		//'placeholder' => __( 'Image URL', 'amo-team' ),
		'class'       => AMO_TEAM_SHOWCASE_CSS_PREFIX . 'post-format-image hidden',
	),

	array(
		'title'        => __( 'Link URL', 'amo-team' ),
		'desc'         => sprintf( __( 'Post Format — Link. %s Proper link format is http://website.com, with http:// or https://', 'amo-team' ), '<br>' ),
		'type'         => 'text',
		'id'           => 'link-url',
		'placeholder'  => __( 'Enter a URL', 'amo-team' ),
		'sanitization' => 'url',
		'class'        => AMO_TEAM_SHOWCASE_CSS_PREFIX . 'post-format-link hidden',
	),

	array(
		'title' => __( 'New Tab', 'amo-team' ),
		'desc'  => __( 'Set to On to open the link in new browser tab.', 'amo-team' ),
		'type'  => 'switcher',
		'std'   => '0',
		'id'    => 'link-new-tab',
		'class'       => AMO_TEAM_SHOWCASE_CSS_PREFIX . 'post-format-link hidden',
	),

	array(
		'title'       => __( 'Quote', 'amo-team' ),
		'desc'        => __( 'Enter a quote. You can change quote block\'s background color in plugin\'s options.', 'amo-team' ),
		'type'        => 'textarea',
		'rows'        => '2',
		'id'          => 'quote',
		'placeholder' => __( 'Enter a Quote', 'amo-team' ),
		'class'       => AMO_TEAM_SHOWCASE_CSS_PREFIX . 'post-format-quote hidden',
	),

	array(
		'title'       => __( 'Custom Code Block', 'amo-team' ),
		'desc'        => __( 'For standard post type you can add your custom HTML code. The code block will be placed above member\'s title. Disallowed: script tag and inline JavaScript, these will be sanitized on page output (frontend).', 'amo-team' ),
		'type'        => 'textarea',
		'sanitize'    => false,
		'rows'        => '5',
		'id'          => 'code-block',
		'placeholder' => __( 'Paste your code here', 'amo-team' ),
		'class'       => AMO_TEAM_SHOWCASE_CSS_PREFIX . 'post-format-standard hidden',
	),


	array( // End - Info Panel tab
		'comment' => 'End - Info Panel tab',
		'type'    => 'close-elem',
	),


);
