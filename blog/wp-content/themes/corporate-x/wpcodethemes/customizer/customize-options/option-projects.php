<?php
	
	// Section - Projects Section
	$wp_customize->add_section( 'corporate_x_projects_section',
		array(
			'title'      => esc_html__( 'Projects Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Projects Section
	$wp_customize->add_setting( 'corporate_x_show_project',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'corporate_x_show_project',
		array(
			'label'    			=> esc_html__( 'Show Projects Section', 'corporate-x' ),
			'section'  			=> 'corporate_x_projects_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting - Projects Section ID
	$wp_customize->add_setting( 'corporate_x_projects_section_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_projects_section_id',
		array(
			'label'    			=> esc_html__( 'Projects Section ID', 'corporate-x' ),
			'description'    	=> esc_html__( 'ID is used for navigating to this section from navigation menu item', 'corporate-x' ),
			'section'  			=> 'corporate_x_projects_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Projects Section Title
	$wp_customize->add_setting( 'corporate_x_projects_section_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_projects_section_title',
		array(
			'label'    			=> esc_html__( 'Projects Section Title', 'corporate-x' ),
			'section'  			=> 'corporate_x_projects_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Projects Section SubTitle
	$wp_customize->add_setting( 'corporate_x_projects_section_subtitle',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_projects_section_subtitle',
		array(
			'label'    			=> esc_html__( 'Projects Section Subtitle', 'corporate-x' ),
			'section'  			=> 'corporate_x_projects_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Projects Categories
	$wp_customize->add_setting( 'corporate_x_projects_categories',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_projects_categories',
		array(
			'label'    			=> esc_html__( 'Projects Categories', 'corporate-x' ),
			'description'    	=> esc_html__( 'Insert categories IDs. Example: 1, 2, 3', 'corporate-x' ),
			'section'  			=> 'corporate_x_projects_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Projects Posts Number
	$wp_customize->add_setting( 'corporate_x_projects_posts_number',
		array(
			'default'           => 4,
			'sanitize_callback' => 'corporate_x_sanitize_number_absint',
		)
	);

	$wp_customize->add_control( 'corporate_x_projects_posts_number',
		array(
			'label'    			=> esc_html__( 'Projects Posts Number', 'corporate-x' ),
			'description'    	=> esc_html__( 'Numbers of posts to be displayed for each categories', 'corporate-x' ),
			'section'  			=> 'corporate_x_projects_section',
			'type'     			=> 'number',
			'priority' 			=> 100,
		)
	);

	// Setting - Button Link
	$wp_customize->add_setting( 'corporate_x_projects_button_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'corporate_x_projects_button_link',
		array(
			'label'    			=> esc_html__( 'Button Link ', 'corporate-x' ),
			'section'  			=> 'corporate_x_projects_section',
			'type'     			=> 'url',
			'priority' 			=> 100,
		)
	);

	// Setting - Button Title
	$wp_customize->add_setting( 'corporate_x_projects_button_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_projects_button_title',
		array(
			'label'    			=> esc_html__( 'Button Title', 'corporate-x' ),
			'section'  			=> 'corporate_x_projects_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);