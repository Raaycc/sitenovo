<?php
	
	// Section - Features Section
	$wp_customize->add_section( 'corporate_x_features_section',
		array(
			'title'      => esc_html__( 'Features Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Features Section
	$wp_customize->add_setting( 'corporate_x_show_feature',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'corporate_x_show_feature',
		array(
			'label'    			=> esc_html__( 'Show Feature Section', 'corporate-x' ),
			'section'  			=> 'corporate_x_features_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting - Feature Section ID
	$wp_customize->add_setting( 'corporate_x_features_section_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_features_section_id',
		array(
			'label'    			=> esc_html__( 'Feature Section ID', 'corporate-x' ),
			'description'    	=> esc_html__( 'ID is used for navigating to this section from navigation menu item', 'corporate-x' ),
			'section'  			=> 'corporate_x_features_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Feature Section Title
	$wp_customize->add_setting( 'corporate_x_features_section_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_features_section_title',
		array(
			'label'    			=> esc_html__( 'Feature Section Title', 'corporate-x' ),
			'section'  			=> 'corporate_x_features_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Feautre Section SubTitle
	$wp_customize->add_setting( 'corporate_x_features_section_subtitle',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_features_section_subtitle',
		array(
			'label'    			=> esc_html__( 'Feature Section Subtitle', 'corporate-x' ),
			'section'  			=> 'corporate_x_features_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	$features_no = 6;
	for( $i = 1; $i <= $features_no; $i++ ) {
		$corporate_x_page = 'corporate_x_features_page_' . $i;
		$corporate_x_icon = 'corporate_x_features_icon_' . $i;

		// Setting - Feature Page
		$wp_customize->add_setting( $corporate_x_page,
			array(
				'default'           => 1,
				'sanitize_callback' => 'corporate_x_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $corporate_x_page,
			array(
				'label'    			=> esc_html__( 'Feature Page ', 'corporate-x' ).$i,
				'section'  			=> 'corporate_x_features_section',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);

		// Setting - Feature Icon
		$wp_customize->add_setting( $corporate_x_icon,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $corporate_x_icon,
			array(
				'label'    			=> esc_html__( 'Feautre Icon ', 'corporate-x' ).$i,
				'description'    	=> esc_html__( 'Use FontAwesome icon class. Example: fa-calendar', 'corporate-x' ),
				'section'  			=> 'corporate_x_features_section',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
	}