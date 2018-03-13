<?php
	
	// Section - Team Section
	$wp_customize->add_section( 'corporate_x_team_section',
		array(
			'title'      => esc_html__( 'Team Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Team Section
	$wp_customize->add_setting( 'corporate_x_show_team',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'corporate_x_show_team',
		array(
			'label'    			=> esc_html__( 'Show Team Section', 'corporate-x' ),
			'section'  			=> 'corporate_x_team_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting - Team Section ID
	$wp_customize->add_setting( 'corporate_x_team_section_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_team_section_id',
		array(
			'label'    			=> esc_html__( 'Team Section ID', 'corporate-x' ),
			'description'    	=> esc_html__( 'ID is used for navigating to this section from navigation menu item', 'corporate-x' ),
			'section'  			=> 'corporate_x_team_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Team Section Title
	$wp_customize->add_setting( 'corporate_x_team_section_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_team_section_title',
		array(
			'label'    			=> esc_html__( 'Team Section Title', 'corporate-x' ),
			'section'  			=> 'corporate_x_team_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Team Section SubTitle
	$wp_customize->add_setting( 'corporate_x_team_section_subtitle',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_team_section_subtitle',
		array(
			'label'    			=> esc_html__( 'Team Section Subtitle', 'corporate-x' ),
			'section'  			=> 'corporate_x_team_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Team Category
	$wp_customize->add_setting('corporate_x_team_category',
		array(
			'sanitize_callback' => 'corporate_x_sanitize_category',
			'default' =>  1,
		) 
	);

	$wp_customize->add_control(
		new Corporate_X_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'corporate_x_team_category', 
			array(
				'label' 	=> __('Team Category','corporate-x'),
				'section' 	=> 'corporate_x_team_section',
				'type'		=> 'dropdown-taxonomies',
				'priority'	=> 100,
			) 
		)
	);

	// Setting - Team Posts Number
	$wp_customize->add_setting( 'corporate_x_team_posts_number',
		array(
			'default'           => 4,
			'sanitize_callback' => 'corporate_x_sanitize_number_absint',
		)
	);

	$wp_customize->add_control( 'corporate_x_team_posts_number',
		array(
			'label'    			=> esc_html__( 'Team Post Number', 'corporate-x' ),
			'description'    	=> esc_html__( 'Numbers of posts to be displayed for Team', 'corporate-x' ),
			'section'  			=> 'corporate_x_team_section',
			'type'     			=> 'number',
			'priority' 			=> 100,
		)
	);