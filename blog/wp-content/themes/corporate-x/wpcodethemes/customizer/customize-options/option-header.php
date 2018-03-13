<?php

	// Section - Top Header
	$wp_customize->add_section( 'corporate_x_top_header',
		array(
			'title'      => esc_html__( 'Top Header Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Top Header
	$wp_customize->add_setting( 'corporate_x_show_top_header',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'corporate_x_show_top_header',
		array(
			'label'    			=> esc_html__( 'Show Top Header', 'corporate-x' ),
			'section'  			=> 'corporate_x_top_header',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting - Corporate Contact Number
	$wp_customize->add_setting( 'corporate_x_contact_number',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_contact_number',
		array(
			'label'    			=> esc_html__( 'Contact Number', 'corporate-x' ),
			'section'  			=> 'corporate_x_top_header',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Corporate Opening Hour
	$wp_customize->add_setting( 'corporate_x_opening_hour',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_opening_hour',
		array(
			'label'    			=> esc_html__( 'Opening Hour', 'corporate-x' ),
			'section'  			=> 'corporate_x_top_header',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Corporate Email Address
	$wp_customize->add_setting( 'corporate_x_email',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_email',
		)
	);

	$wp_customize->add_control( 'corporate_x_email',
		array(
			'label'    			=> esc_html__( 'Email Contact', 'corporate-x' ),
			'section'  			=> 'corporate_x_top_header',
			'type'     			=> 'email',
			'priority' 			=> 100,
		)
	);




	// Section - Navigation Header
	$wp_customize->add_section( 'corporate_x_nav_header',
		array(
			'title'      => esc_html__( 'Navigation Header Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Search Icon
	$wp_customize->add_setting( 'corporate_x_show_search_icon',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'corporate_x_show_search_icon',
		array(
			'label'    			=> esc_html__( 'Show Search Icon', 'corporate-x' ),
			'section'  			=> 'corporate_x_nav_header',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting - Enable Side Menu
	$wp_customize->add_setting( 'corporate_x_show_side_menu',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);
	
	$wp_customize->add_control( 'corporate_x_show_side_menu',
		array(
			'label'    			=> esc_html__( 'Show Side Menu', 'corporate-x' ),
			'section'  			=> 'corporate_x_nav_header',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);