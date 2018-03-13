<?php
	// Section - Others Section
	$wp_customize->add_section( 'corporate_x_others_section',
		array(
			'title'      => esc_html__( 'Other Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	$wp_customize->add_setting('corporate_x_sidebar_position', 
		array(
			'sanitize_callback'	=> 'corporate_x_sanitize_sidebar',
			'default'			=> 'right'
		)
	);

	$wp_customize->add_control('corporate_x_sidebar_position', 
		array(
			'label'      		=> esc_html__('Theme Sidebar Position', 'corporate-x'),
			'description'		=> esc_html__( 'Select Sidebar Postion. Select none to hide sidebar.', 'corporate-x' ),
			'section'    		=> 'corporate_x_others_section',
			'type'       		=> 'radio',
			'choices'    		=> array(
				'left'   		=> esc_html__('Left','corporate-x'),
				'right'  		=> esc_html__('Right','corporate-x'),
				'none'	 		=> esc_html__('None','corporate-x'),
			),
		) 
	);