<?php
	
	// Section - Brands Section
	$wp_customize->add_section( 'corporate_x_brands_section',
		array(
			'title'      => esc_html__( 'Brands Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Brands Section
	$wp_customize->add_setting( 'corporate_x_show_brands',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'corporate_x_show_brands',
		array(
			'label'    			=> esc_html__( 'Show Brands Section', 'corporate-x' ),
			'section'  			=> 'corporate_x_brands_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting - Brands Section ID
	$wp_customize->add_setting( 'corporate_x_brands_section_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_brands_section_id',
		array(
			'label'    			=> esc_html__( 'Brands Section ID', 'corporate-x' ),
			'description'    	=> esc_html__( 'ID is used for navigating to this section from navigation menu item', 'corporate-x' ),
			'section'  			=> 'corporate_x_brands_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Brands Category
	$wp_customize->add_setting('corporate_x_brands_category',
		array(
			'sanitize_callback' => 'corporate_x_sanitize_category',
			'default' =>  1,
		) 
	);

	$wp_customize->add_control(
		new Corporate_X_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'corporate_x_brands_category', 
			array(
				'label' 	=> __('Brands Category','corporate-x'),
				'section' 	=> 'corporate_x_brands_section',
				'type'		=> 'dropdown-taxonomies',
				'priority'	=> 100,
			) 
		)
	);