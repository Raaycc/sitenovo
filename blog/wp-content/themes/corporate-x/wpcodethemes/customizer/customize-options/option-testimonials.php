<?php
	
	// Section - Testimonials Section
	$wp_customize->add_section( 'corporate_x_testimonials_section',
		array(
			'title'      => esc_html__( 'Testimonials Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Testimonials Section
	$wp_customize->add_setting( 'corporate_x_show_testimonials',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'corporate_x_show_testimonials',
		array(
			'label'    			=> esc_html__( 'Show Testimonials Section', 'corporate-x' ),
			'section'  			=> 'corporate_x_testimonials_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting - Testimonials Section ID
	$wp_customize->add_setting( 'corporate_x_testimonials_section_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_testimonials_section_id',
		array(
			'label'    			=> esc_html__( 'Testimonials Section ID', 'corporate-x' ),
			'description'    	=> esc_html__( 'ID is used for navigating to this section from navigation menu item', 'corporate-x' ),
			'section'  			=> 'corporate_x_testimonials_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Testimonials Category
	$wp_customize->add_setting('corporate_x_testimonials_category',
		array(
			'sanitize_callback' => 'corporate_x_sanitize_category',
			'default' =>  1,
		) 
	);

	$wp_customize->add_control(
		new Corporate_X_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'corporate_x_testimonials_category', 
			array(
				'label' 	=> __('Testimonial Category','corporate-x'),
				'section' 	=> 'corporate_x_testimonials_section',
				'type'		=> 'dropdown-taxonomies',
				'priority'	=> 100,
			) 
		)
	);

	// Setting - Testimonials Posts Number
	$wp_customize->add_setting( 'corporate_x_testimonials_posts_number',
		array(
			'default'           => 3,
			'sanitize_callback' => 'corporate_x_sanitize_number_absint',
		)
	);

	$wp_customize->add_control( 'corporate_x_testimonials_posts_number',
		array(
			'label'    			=> esc_html__( 'Testimonials Posts Number', 'corporate-x' ),
			'description'    	=> esc_html__( 'Numbers of posts to be displayed for testimonial', 'corporate-x' ),
			'section'  			=> 'corporate_x_testimonials_section',
			'type'     			=> 'number',
			'priority' 			=> 100,
		)
	);