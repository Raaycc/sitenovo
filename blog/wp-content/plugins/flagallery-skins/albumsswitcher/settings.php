<?php
$default_options = array(
	// Common Settings
	'activColor' => '#3498db',
	'reverseColor' => '#ffffff',
	'hoverColor' => '#2470a1',
	// Splash Page
	'columns' => '3',
	'thumbRecomendedSize' => '200',
	'spaceX' => '6',
	'coverThumbRatio' => '0.6',
	'coverTitleFontSize' => '20',
	'coverTitleTextColor' => '#ffffff',
	'coverTitleBgColor' => '#000000',
	'coverTitleBgAlpha' => '60',
	// Collection Bar
	'termCollectionViewHeight' => '400',
	'collectionBgColor' => '#ffffff',
	'collectionBgOpacity' => '100',
	'collectionTitleShow' => '1',
	'collectionTitleBgColor' => '#ffffff',
	'collectionTitleBgOpacity' => '100',
	'collectionTitleTextColor' => '#000000',
	'collectiontTitleFontSize' => '30',
	'collectionDescriptionShow' => '1',
	'collectiontDescriptionTextFontSize' => '15',
	'collectiontDescriptionTextColor' => '#000000',
	'collectionShareButtonEnable' => '1',
	'collectionShareButtonsCollor' => '#3498db',
	'termCollectionSwitcherThumbsTitleShow' => '1',
	'termCollectionSwitcherThumbsTitleFontSize' => '14',
	'termCollectionSwitcherThumbsHeight' => '176',
	'collectionThumbsScrollBarCollor' => '#3498db',
	// Slider Page
	'sliderBgColor' => '#ffffff',
	'sliderInfoEnable' => '1',
	'sliderDescriptionMode' => '0',
	'sliderInfoBoxBgColor' => '#ffffff',
	'sliderInfoBoxBgAlpha' => '80',
	'sliderInfoBoxTitleTextColor' => '#000000',
	'sliderInfoBoxTextColor' => '#000000',
	'sliderItemDownload' => '1',
	'sliderItemDiscuss' => '1',
	'sliderSocialShareEnabled' => '1',
	//Slider ThumbsBar
	'sliderThumbBarEnable' => '1',
	'sliderThumbBarBgColor' => '#AED6F1',
	'sliderThumbBarHeight' => '100',
	// Custom CSS
	'customCSS' => ''
);
$options_tree = array(
	array('label' => 'Common Settings',
		'fields' => array(
			'activColor' => array('label' => 'Color 1',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color"',
				'text' => 'Set custom color for gallery'
			),
			'reverseColor' => array('label' => 'Color 2',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color"',
				'text' => 'Set custom color for gallery'
			),
			'hoverColor' => array('label' => 'Color 3',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color"',
				'text' => 'Set custom color for gallery'
			)
		)
	),
	array('label' => 'Collections Page (Splash page)',
		'fields' => array(
			'columns' => array('label' => 'Thumbnail Columns',
				'tag' => 'input',
				'attr' => 'type="number" min="1" max="10"',
				'text' => 'Number of columns in a row'
			),
			'thumbRecomendedSize' => array('label' => 'Minimum Thumbnail Width',
				'tag' => 'input',
				'attr' => 'type="number" min="100" max="300"',
				'text' => 'The module will ignore the number of columns.'
			),
			'coverThumbRatio' => array('label' => 'Thumbnail ratio',
				'tag' => 'input',
				'attr' => 'type="number" min="0.1" max="2" step="0.1"',
				'text' => 'Height / Width = Ratio'
			),
			'spaceX' => array('label' => 'Space between thumbnails',
				'tag' => 'input',
				'attr' => 'type="number" min="0" max="100"',
				'text' => ''
			),
			'coverTitleFontSize' => array('label' => 'Cover Title - font size',
				'tag' => 'input',
				'attr' => 'type="number" min="14" max="36" step="1"',
				'text' => ''
			),
			'coverTitleTextColor' => array('label' => 'Cover Title - text color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color"',
				'text' => 'For Albums / Categories covers'
			),
			'coverTitleBgColor' => array('label' => 'Cover Title - background color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color"',
				'text' => 'For Albums / Categories covers'
			),
			'coverTitleBgAlpha' => array('label' => 'Cover Title - transparency for background',
				'tag' => 'input',
				'attr' => 'type="number" min="0" max="100" step="10"',
				'text' => 'For Albums / Categories covers'
			),
		)
	),
	array('label' => 'Collection Bar',
		'fields' => array(
			'termCollectionViewHeight' => array('label' => 'Collection Bar Height',
				'tag' => 'input',
				'attr' => 'type="number" min="120" max="570"',
				'text' => ''
			),
			'collectionBgColor' => array('label' => 'Collection Bar background color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color"',
				'text' => ''
			),
			'collectionBgOpacity' => array('label' => 'Collection Bar background - opacity',
				'tag' => 'input',
				'attr' => 'type="number" min="0" max="100" step="10"',
				'text' => ''
			),
			'collectionTitleShow' => array('label' => 'Title Show',
				'tag' => 'checkbox',
				'attr' => 'data-watch="change"',
				'text' => ''
			),
			'collectionTitleBgColor' => array('label' => 'Title section background color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color" data-collectionTitleShow="is:1"',
				'text' => ''
			),
			'collectionTitleBgOpacity' => array('label' => 'Title section background opacity',
				'tag' => 'input',
				'attr' => 'type="number" min="0" max="100" step="10" data-collectionTitleShow="is:1"',
				'text' => ''
			),
			'collectionTitleTextColor' => array('label' => 'Title text color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color" data-collectionTitleShow="is:1"',
				'text' => ''
			),
			'collectiontTitleFontSize' => array('label' => 'Title font size',
				'tag' => 'input',
				'attr' => 'type="number" min="13" max="30" data-collectionTitleShow="is:1"',
				'text' => ''
			),
			'collectionDescriptionShow' => array('label' => 'Description Show',
				'tag' => 'checkbox',
				'attr' => 'data-watch="change"',
				'text' => ''
			),
			'collectiontDescriptionTextFontSize' => array('label' => 'Collection description font size',
				'tag' => 'input',
				'attr' => 'type="number" min="13" max="20" data-collectionDescriptionShow="is:1"',
				'text' => ''
			),
			'collectiontDescriptionTextColor' => array('label' => 'Collection description - text color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color" data-collectionDescriptionShow="is:1"',
				'text' => ''
			),
			'collectionShareButtonEnable' => array('label' => 'Share Menu Enable',
				'tag' => 'checkbox',
				'attr' => 'data-watch="change"',
				'text' => ''
			),
			'collectionShareButtonsCollor' => array('label' => 'Share Buttons color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color" data-collectionShareButtonEnable="is:1"',
				'text' => ''
			),
			'termCollectionSwitcherThumbsTitleShow' => array('label' => 'Collection items title show',
				'tag' => 'checkbox',
				'attr' => 'data-watch="change"',
				'text' => ''
			),
			'termCollectionSwitcherThumbsTitleFontSize' => array('label' => 'Collection items title font size',
				'tag' => 'input',
				'attr' => 'type="number" min="10" max="20" data-termCollectionSwitcherThumbsTitleShow="is:1"',
				'text' => ''
			),
			'termCollectionSwitcherThumbsHeight' => array('label' => 'Collection Thumbnails Bar Height',
				'tag' => 'input',
				'attr' => 'type="number" min="100" max="300"',
				'text' => ''
			),
			'collectionThumbsScrollBarCollor' => array('label' => 'Thumbnails ScrollBar color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color"',
				'text' => ''
			)
		)
	),
	array('label' => 'Slider Window Settings',
		'fields' => array(
			'sliderBgColor' => array('label' => 'Slider Window Color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color"',
				'text' => 'Set the background color for the slider window'
			),
			'sliderThumbBarEnable' => array('label' => 'Show Thumbnails Bar',
				'tag' => 'checkbox',
				'attr' => 'data-watch="change"',
				'text' => ''
			),
			'sliderThumbBarBgColor' => array('label' => 'Slider Thumbnails Bar Color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color" data-sliderThumbBarEnable="is:1"',
				'text' => 'Set the background color for the thumbnails bar'
			),
			'sliderThumbBarHeight' => array('label' => 'Thumbnails Bar Height',
				'tag' => 'input',
				'attr' => 'type="number" min="60" max="200" step="10" data-sliderThumbBarEnable="is:1"',
				'text' => ''
			),
			'sliderInfoEnable' => array('label' => 'Show Info Button',
				'tag' => 'checkbox',
				'attr' => 'data-watch="change"',
				'text' => 'Enable description bar for item'
			),
			'sliderDescriptionMode' => array('label' => 'Show Info Bar automatically',
				'tag' => 'checkbox',
				'attr' => 'data-watch="change" data-sliderInfoEnable="is:1"',
				'text' => ''
			),
			'sliderInfoBoxBgColor' => array('label' => 'Slider Info Bar background color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color" data-sliderInfoEnable="is:1"',
				'text' => 'Set the background color for the slider window'
			),
			'sliderInfoBoxBgAlpha' => array('label' => 'Slider Info Bar background - alpha channel ',
				'tag' => 'input',
				'attr' => 'type="number" min="0" max="100" step="10" data-sliderInfoEnable="is:1"',
				'text' => ''
			),
			'sliderInfoBoxTitleTextColor' => array('label' => 'Slider Info Bar - Title color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color" data-sliderInfoEnable="is:1"',
				'text' => ''
			),
			'sliderInfoBoxTextColor' => array('label' => 'Slider Info Bar - Description color',
				'tag' => 'input',
				'attr' => 'type="text" data-type="color" data-sliderInfoEnable="is:1"',
				'text' => ''
			),
			'sliderSocialShareEnabled' => array('label' => 'Show Share Buttons',
				'tag' => 'checkbox',
				'attr' => 'data-watch="change" data-sliderInfoEnable="is:1"',
				'text' => ''
			),
			'sliderItemDownload' => array('label' => 'Show Download Button',
				'tag' => 'checkbox',
				'attr' => 'data-watch="change" data-sliderInfoEnable="is:1"',
				'text' => 'Download original file'
			),
			'sliderItemDiscuss' => array('label' => 'Show Comments',
				'tag' => 'checkbox',
				'attr' => 'data-watch="change" data-sliderInfoEnable="is:1"',
				'text' => ''
			)
		)
	),
	array('label' => 'Advanced Settings',
		'fields' => array('customCSS' => array('label' => 'Custom CSS',
			'tag' => 'textarea',
			'attr' => 'cols="20" rows="10"',
			'text' => 'You can enter custom style rules into this box if you\'d like. IE: <i>a{color: red !important;}</i>
                                                                      <br />This is an advanced option! This is not recommended for users not fluent in CSS... but if you do know CSS, 
                                                                      anything you add here will override the default styles'
		)
			/*,
			'loveLink' => array(
				'label' => 'Display LoveLink?',
				'tag' => 'checkbox',
				'attr' => '',
				'text' => 'Selecting "Yes" will show the lovelink icon (codeasily.com) somewhere on the gallery'
			)*/
		)
	)
);