<?php

	// Section - Slider Section
	$wp_customize->add_section( 'corporate_x_slider_section',
		array(
			'title'      => esc_html__( 'Slider Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Slider Section
	$wp_customize->add_setting( 'corporate_x_show_slider',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'corporate_x_show_slider',
		array(
			'label'    			=> esc_html__( 'Show Slider Section', 'corporate-x' ),
			'section'  			=> 'corporate_x_slider_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	$slider_no = 3;
	for( $i = 1; $i <= $slider_no; $i++ ) {
		$corporate_x_page = 'corporate_x_slider_page_' . $i;
		$corporate_x_link = 'corporate_x_slider_link_' . $i;

		// Setting - Slider Pages
		$wp_customize->add_setting( $corporate_x_page,
			array(
				'default'           => 1,
				'sanitize_callback' => 'corporate_x_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $corporate_x_page,
			array(
				'label'    			=> esc_html__( 'Slider Page ', 'corporate-x' ).$i,
				'section'  			=> 'corporate_x_slider_section',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);

		// Setting - Slider Links
		$wp_customize->add_setting( $corporate_x_link,
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( $corporate_x_link,
			array(
				'label'    			=> esc_html__( 'Slider Link ', 'corporate-x' ).$i,
				'section'  			=> 'corporate_x_slider_section',
				'type'     			=> 'url',
				'priority' 			=> 100,
			)
		);
	}

	// Setting - Left Button Title
	$wp_customize->add_setting( 'corporate_x_button_left_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_button_left_title',
		array(
			'label'    			=> esc_html__( 'Button Left Title', 'corporate-x' ),
			'section'  			=> 'corporate_x_slider_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Right Button Title
	$wp_customize->add_setting( 'corporate_x_button_right_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_button_right_title',
		array(
			'label'    			=> esc_html__( 'Button right Title', 'corporate-x' ),
			'section'  			=> 'corporate_x_slider_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);