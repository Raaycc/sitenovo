(function( $ ) {
	'use strict';


/*--------------------------------------------------------------------
 ▐	1. FORM INPUTS
 --------------------------------------------------------------------*/
	var formElements = {

		/**
		 * Make input type="text" accept only numbers and dots.
		 *
		 * @since    1.0.0
		 */
		numberInput: function() {
			$( '#amoteam-panel__content' ).on( 'change', '.amoteam-js-input-number', function() {
				// remove any characters except \d (digits) and . (dot)
				this.value = this.value.replace( /([^\d\.]+)/g, '' );
			} );
		}, // numberInput | FNC


		/**
		 * Adds/Shows warning/notice after certain page element
		 *
		 * @since    1.0.0
		 */
		formNotice: function( $parentClass, insertAfterThis, $text, warningClass ) {
			var noticeElem = $( '<div>', {
				html: $text,
				'class': 'amoteam-general-warning ' + warningClass,
				'id': warningClass
			} );

			if ( ! $parentClass.find('.' + warningClass).length ) {
				noticeElem.insertAfter( insertAfterThis ).text( $text );
				setTimeout( function() {
					noticeElem.fadeOut( 500, function() {
						noticeElem.remove()
					} );
				}, 7000 );
			}
		}, // formNotice | FNC


		/**
		 * Disable close/remove button in social icon block if there is only one block
		 *
		 * @since    1.0.0
		 */
		buttonOnOff: function( $flag, $class, $off, $parentClass ) {
			var button;

			if ( $flag ) {
				button = ( typeof($class) == 'string' ) ? $parentClass.find( $class ) : $class;

				// Disabled / Enabled
				if ( $off ) {
					button.attr( 'disabled', 'disabled' );
				} else {
					button.removeAttr( 'disabled' );
				} // IF Disabled/Enabled

			} // IF $flag true
		}, // buttonOnOff | FNC


		/**
		 * Init social icon blocks functionality: accordion, add/remove, collapse, etc.
		 *
		 * @since    1.0.0
		 */
		socialIconBlockInit: function( socialIcons ) {
			var IconGroups = socialIcons.find( '.amoteam-grouped-fields__group' );

			// if there is only one icon block, disable close button
			formElements.buttonOnOff( ( IconGroups.length === 1 ), '.amoteam-grouped-fields__close', true, IconGroups );

			socialIcons.accordion( {
				header: ".amoteam-grouped-fields__heading-wrap",
				collapsible: true,
				heightStyle: 'content'
			} );

			socialIcons.sortable({
				placeholder: "widget-placeholder",
				items: '> .amoteam-grouped-fields__group',
				opacity : 0.5,
				distance: 3,
				//containment: 'parent',
				tolerance: 'pointer',
				refreshPositions: true,
				start: function( event, ui ) {
					// fix for opened icon/panel drag & drop
					var activeTab = ui.item.find('.ui-state-active');
					if ( activeTab.length ) {
						$(this).sortable('refreshPositions');
					}
				}, // start
				stop: function( event, ui ) {
					// refresh icon blocks collection in the variable
					IconGroups = socialIcons.find( '.amoteam-grouped-fields__group' );

					// enumerate icon blocks
					for ( var i = 0; i < IconGroups.length; i ++ ) {
						formElements.socialIconBlockEnumerate( IconGroups.eq(i), i, true );
					} // FOR
				} // stop
			});

			// click to add one more social icon block
				$('#amoteam-js-add-icon-block').on( 'click', function() {

					// get all social icon group blocks
					var IconGroups = socialIcons.find( '.amoteam-grouped-fields__group' );
					console.log( socialIcons );
					// remove button :disabled, before adding another icon block
					formElements.buttonOnOff( ( IconGroups.length === 1 ), '.amoteam-grouped-fields__close', false, IconGroups );

					// IF number of Icon Blocks is not more than 12
					if ( IconGroups.length < 12 ) {

						// clone 1st social icon block / panel
						var socialIconGroup = IconGroups.eq( 0 ).clone();

						// init upload button functionality (except opening of media library)
						formElements.uploadInput( socialIconGroup.find( '.amoteam-js-media-library-upload' ) );

						// clear select/input values in the icon block
						socialIconGroup.find( 'option' ).removeAttr( 'selected' )
							.end()
							.find( 'input' ).val('')
							.end()
							.find( '.amoteam-js-upload-img-close' ).click()
							.end()
							.appendTo( socialIcons );


						formElements.socialIconBlockEnumerate( socialIconGroup, IconGroups.length );

						// Reset / Refresh the Accordion
						socialIcons.accordion( 'refresh' );

					} else { // if the limit is reached, show the warning
						// show the warning only if it's not present already
						if ( ! $('#amoteam-grouped-fields__limit-warning' ).length ) {
							formElements.formNotice( socialIcons, '.amoteam-js-grouped-fields-end', socialIcons.parent().find('.amoteam-js-grouped-fields-end').text(), 'amoteam-grouped-fields__limit-warning' );
						}
					} // IF number of Icon Blocks is not more than 12

				} ); // ON click add icon button

			socialIcons.on( 'click', '.amoteam-grouped-fields__close', function(e) {
				var currentIconBlock,
				    isFirstIconBlockDesc;

				e.preventDefault();

				// get current soc icon block
				currentIconBlock = $( this ).parents( '.amoteam-grouped-fields__group' );

				// check if this is the first icon block and detach its description
				if (currentIconBlock.find('.grouped-fields__num' ).text() == 1) {
					isFirstIconBlockDesc = socialIcons.find('.amoteam-setting__desc' ).detach();

				}

				// delete the icon block
				currentIconBlock.remove();

				// refresh icon blocks collection in the variable
				IconGroups = socialIcons.find( '.amoteam-grouped-fields__group' );

				// attach the description to the first icon block
				if (isFirstIconBlockDesc) {
					isFirstIconBlockDesc.insertAfter( IconGroups.eq(0) );
				}

				// enumerate icon blocks
				for ( var i = 0; i < IconGroups.length; i ++ ) {
					formElements.socialIconBlockEnumerate( IconGroups.eq(i), i, true );
				} // FOR

				// if there is only one icon block, disable close button
				formElements.buttonOnOff( ( IconGroups.length === 1 ), '.amoteam-grouped-fields__close', true, IconGroups );

				// Reset / Refresh the Accordion
				socialIcons.accordion( 'refresh' );

			} );
		}, // socialIconBlockSettings | FNC


		/**
		 * Properly enumerates social icon blocks on: add and remove. (sort will be added in future release)
		 *
		 * @since    1.0.0
		 */
		socialIconBlockEnumerate: function( iconBlock, IconBlocksNumber, enumGroup ) {
			var headingNumber;

			if ( enumGroup ) {
				headingNumber = (IconBlocksNumber + 1);
			} else {
				headingNumber = (~~ iconBlock.find( '.grouped-fields__num' ).text() ) + IconBlocksNumber;
			} // IF

			// Enumerate icon block heading
			iconBlock.find('.grouped-fields__num' ).text( headingNumber );

			// Enumerate icon block heading
			iconBlock.find( '.amoteam-setting__input' ).each(function(){
				var $this = $( this );

				$this.attr( 'name', $this.attr( 'name' ).replace( /\[\d{1}\]/g, '[' + IconBlocksNumber + ']' ) );

			});

		}, // socialIconBlockSettings | FNC


			/**
		 * Upload/Add image button and input functionality
		 *
		 * @since    1.0.0
		 */
		uploadInput: function( btn, json ) {
			var $btn = $( btn );

			if ( json ) { // on media uploader
				// First, make sure that we have the URL of an image to display
				if ( 0 > $.trim( json.url.length ) ) {
					return false;
				} // IF


				var uploadBlock = $btn.parents( '.amoteam-setting-group--upload' ),
				    uploadInputField = uploadBlock.find( 'input' );

				uploadInputField.val( (json.sizes['amoteam-general'] ? json.sizes['amoteam-general']['url'] : json.url ) );
				uploadInputField.trigger( 'change' );

			} else { // on page load
				var uploadBlocks = $btn.parents( '.amoteam-setting-group--upload' );

					uploadBlocks.each( function() {
						var uploadBlock      = $( this ),
						    uploadInputField = uploadBlock.find( 'input' ),
						    img              = uploadBlock.find( '.amoteam-setting-group--upload__img' );

						// if URL is set in the input field
						if ( uploadInputField.val() ) {
							img.attr( 'src', uploadInputField.val() );
							img.parent().slideDown( 500 );
						}

						uploadInputField.on( 'change', function() {
							console.log( $( this ) );
							console.log( img );
							img.attr( 'src', $( this ).val() );
							img.parent().slideDown( 500 );
						} );

						uploadBlock.on( 'click', '.amoteam-js-upload-img-close', function() {
							uploadInputField.val( '' );
							img.parent().slideUp( 500, function() {
								img.attr( 'src', '' );
							} );
						} );

					} ); // EACH | images

			} // IF json



		}, // uploadInput | FNC


		/**
		 * Display media uploader/library with certain parameters, as showing only images there
		 *
		 * @since    1.0.0
		 */
		renderMediaUploader: function( btn ) {
			var mediaUploader, json;

			/**
			 * If an instance of mediaUploader already exists, then we can open it
			 * rather than creating a new instance.
			 */
			if ( undefined !== mediaUploader ) {
				mediaUploader.open();
				return;
			}

			/**
			 * If we're this far, then an instance does not exist, so we need to
			 * create our own.
			 *
			 * We're also not allowing the user to select more than one image.
			 */
			mediaUploader = wp.media.frames.file_frame = wp.media({
				title: AmoTeamVarsAdmin.mediaUploaderTitle,
				library: { // remove these to show all mime types
					type: 'image' // specific mime type
				},
				//button: {
				//	text: 'Choose Image'
				//},
				multiple: false
			});


			/**
			 * Setup an event handler for what to do when an image has been
			 * selected.
			 */
			mediaUploader.on( 'select', function() {
				// Read the JSON data returned from the Media Uploader
				json = mediaUploader.state().get( 'selection' ).first().toJSON();

				formElements.uploadInput( btn, json );

			} ); // mediaUploader ON 'select'

			// Now display the actual mediaUploader
			mediaUploader.open();

		} // renderMediaUploader | FNC

	}; // formElements | OBJ


/*--------------------------------------------------------------------
 ▐	2. GENERAL FUNCTIONS
--------------------------------------------------------------------*/
	//var generalFuncs = {
	//}; // generalFuncs | OBJ
/*--------------------------------------------------------------------
 ▐	3. SPECIAL FUNCTIONS
--------------------------------------------------------------------*/
	var specialFuncs = {

		/**
		 * Create a notice and disable publish button if post's featured image is not set
		 *
		 * @since    1.0.0
		 */
		featuredImgNotice: function() {
			var featuredImgBlock = $( '#postimagediv' ),
			    publishButton    = $( '#publish' ),
			    headingH1        = $( 'h1' ),
			    notice           = $( '<div>', {
				    html: '<p>' + AmoTeamVarsAdmin.MemberFeatImgNotice + '</p>',
				    'id': 'amoteam-notice-no-featured-img',
				    'class': 'notice notice-warning'
			    } );

			// if no Featured image is set
			if ( ! featuredImgBlock.find( 'img' ).length ) {

				// disable publish button
				publishButton.attr( 'disabled', 'disabled' );

				// create the notice and insert in the page
				notice.insertAfter( headingH1 );

				// When featured image is added to the post | Event
				$( document ).ajaxComplete( function( event, xhr, settings ) {

					//var data = JSON.parse( xhr.responseText ).data;
					var data = settings.data;
					// featured image is added to the post
					if ( data && (typeof data === 'string') && ( -1 === data.indexOf( 'thumbnail_id=-1') ) && ( data.indexOf( 'action=get-post-thumbnail-html' ) ) !== -1 ) {
						// enable the publish button
						publishButton.removeAttr( 'disabled' );
						// remove the notice
						$( '#amoteam-notice-no-featured-img' ).remove();
					} else if ( data && (typeof data === 'string') && ( -1 !== data.indexOf( 'thumbnail_id=-1') ) ) {
						// disable publish button
						publishButton.attr( 'disabled', 'disabled' );

						// create the notice and insert in the page
						notice.insertAfter( headingH1 );
					} // IF data
				} ); // ajaxComplete
			} // IF featured image is not set
		}, // featuredImgNotice | FNC


		/**
		 * Helper method. Runs showHidePostFormatFields method on load,
		 * and on click on "post format" block's label/radio button
		 *
		 * @since    1.0.0
		 */
		postFormatsDependingFieldsInit: function( postFormatsBlock ) {

			postFormatsBlock.find( 'input' ).each( function() {
				specialFuncs.showHidePostFormatFields( $(this) );
			} ); // EACH input

			postFormatsBlock.on( 'click', 'input, label', function(e) {
				var $this = $(this );
				e.stopImmediatePropagation();
				if ( $this.is('input') ) {
					specialFuncs.showHidePostFormatFields( $this, e.type );
				}
			} );
		}, // postFormatsDependingFields | FNC


		/**
		 * Shows/Hides post format fields/blocks in member's metabox, depending on chosen post format for the post.
		 *
		 * @since    1.0.0
		 */
		showHidePostFormatFields: function( postFormatInput, eType ) {
			if ( eType || postFormatInput.prop('checked') ) {
				var inputVal = postFormatInput.val(),
					postFormatType = (inputVal != '0' ) ? inputVal : 'standard',
				    tabContentFieldGroups = $( '#amoteam-post-format-t' ).find( '.amoteam-setting-group' );

				tabContentFieldGroups.each( function() {
					var $this = $(this);
					if ( -1 !== $this[0].className.indexOf('amoteam-post-format-' + postFormatType ) ) {
						$this.removeClass('hidden');
					} // IF
				} );
			} // IF 'checked'

			if ( eType ) { // if clicked
				tabContentFieldGroups.filter( function( i ) {
					return ( - 1 === this.className.indexOf( 'amoteam-post-format-' + postFormatType ) );
				} ).addClass( 'hidden' );
			} // IF clicked

		} // postFormatsShowHideFields | FNC

	}; // genFuncs | OBJ

/*--------------------------------------------------------------------
 ▐	4. INIT
 --------------------------------------------------------------------*/

	/*  Team Member Page
	 --------------------------------------------------------------------*/
	if ( 'amo-team' == AmoTeamVarsAdmin.currentScreen ) {
		var postFormatsBlock = $( '#post-formats-select' );

		// if a new post set default post format to image
		if ( 'post-new.php' == AmoTeamVarsAdmin.pagenow ) {
			postFormatsBlock.find( '#post-format-image' ).attr( 'checked', 'checked' );
		} // IF | post-new.php

		specialFuncs.featuredImgNotice();

		formElements.socialIconBlockInit( $( "#amoteam-grouped-fields__wrap" ) );

		specialFuncs.postFormatsDependingFieldsInit( postFormatsBlock );

	} // if Team Member Page

	/*  Options Page
	 --------------------------------------------------------------------*/
	else if ( 'amo-team_page_amo-team-options' == AmoTeamVarsAdmin.currentScreen ) {
		// Form Inputs
		formElements.numberInput();

		// Reset settings button | Options page
		$( '#amoteam-reset-settings' ).on( 'click', function(e) {
			e.preventDefault();
			var form = $('#amoteam-options-form');

			// change hidden input value to "reset", which will be used in save_plugin_options PHP function
			form.find( '#amoteam-submit-type' ).val( 'reset' );

			form.submit();
		} );
	} // IF | 'Team Member' or 'Options' page

	/*  BOTH: Option and Member page
	 --------------------------------------------------------------------*/
	// init upload input block
	var uploadButton = $( '.amoteam-js-media-library-upload' );
	formElements.uploadInput( uploadButton );

	// Upload field button
	$('#amoteam-panel__content').on( 'click', '.amoteam-js-media-library-upload', function(e) {
		e.preventDefault();

		// Display the media uploader
		formElements.renderMediaUploader(this);
	} );







})( jQuery );