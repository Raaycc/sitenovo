<?php

	// Section - Counter Section
	$wp_customize->add_section( 'corporate_x_counter_section',
		array(
			'title'      => esc_html__( 'Counter Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Counter Section
	$wp_customize->add_setting( 'corporate_x_show_counter',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'corporate_x_show_counter',
		array(
			'label'    			=> esc_html__( 'Show Counter Section', 'corporate-x' ),
			'section'  			=> 'corporate_x_counter_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting - Counter Section ID
	$wp_customize->add_setting( 'corporate_x_counter_section_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_counter_section_id',
		array(
			'label'    			=> esc_html__( 'Counter Section ID', 'corporate-x' ),
			'description'    	=> esc_html__( 'ID is used for navigating to this section from navigation menu item', 'corporate-x' ),
			'section'  			=> 'corporate_x_counter_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	$counter_no = 4;
	for( $i = 1; $i <= $counter_no; $i++ ) {
		$corporate_x_title = 'corporate_x_counter_title_' . $i;
		$corporate_x_icon = 'corporate_x_counter_icon_' . $i;
		$corporate_x_number = 'corporate_x_counter_number_' . $i;

		// Setting - Counter Title
		$wp_customize->add_setting( $corporate_x_title,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $corporate_x_title,
			array(
				'label'    			=> esc_html__( 'Counter Title ', 'corporate-x' ).$i,
				'section'  			=> 'corporate_x_counter_section',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);

		// Setting - Counter Icon
		$wp_customize->add_setting( $corporate_x_icon,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $corporate_x_icon,
			array(
				'label'    			=> esc_html__( 'Counter Icon ', 'corporate-x' ).$i,
				'description'    	=> esc_html__( 'Use FontAwesome icon class. Example: fa-calendar', 'corporate-x' ),
				'section'  			=> 'corporate_x_counter_section',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);

		// Setting - Counter Number
		$wp_customize->add_setting( $corporate_x_number,
			array(
				'default'           => '',
				'sanitize_callback' => 'corporate_x_sanitize_number_absint',
			)
		);

		$wp_customize->add_control( $corporate_x_number,
			array(
				'label'    			=> esc_html__( 'Counter Number ', 'corporate-x' ).$i,
				'section'  			=> 'corporate_x_counter_section',
				'type'     			=> 'number',
				'priority' 			=> 100,
			)
		);
	}