<?php
	
	// Section - Contact Section
	$wp_customize->add_section( 'corporate_x_contact_section',
		array(
			'title'      => esc_html__( 'Contact Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Contact Section
	$wp_customize->add_setting( 'corporate_x_show_contact',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'corporate_x_show_contact',
		array(
			'label'    			=> esc_html__( 'Show Contact Section', 'corporate-x' ),
			'section'  			=> 'corporate_x_contact_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting - Contact Section ID
	$wp_customize->add_setting( 'corporate_x_contact_section_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_contact_section_id',
		array(
			'label'    			=> esc_html__( 'Contact Section ID', 'corporate-x' ),
			'description'    	=> esc_html__( 'ID is used for navigating to this section from navigation menu item', 'corporate-x' ),
			'section'  			=> 'corporate_x_contact_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Contact Section Title
	$wp_customize->add_setting( 'corporate_x_contact_section_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_contact_section_title',
		array(
			'label'    			=> esc_html__( 'Contact Section Title', 'corporate-x' ),
			'section'  			=> 'corporate_x_contact_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Contact Section SubTitle
	$wp_customize->add_setting( 'corporate_x_contact_section_subtitle',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_contact_section_subtitle',
		array(
			'label'    			=> esc_html__( 'Contact Section Subtitle', 'corporate-x' ),
			'section'  			=> 'corporate_x_contact_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Contact Section Contact Form
	$wp_customize->add_setting( 'corporate_x_contact_shortcode',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_contact_shortcode',
		array(
			'label'    			=> esc_html__( 'Contact Form Shortcode', 'corporate-x' ),
			'section'  			=> 'corporate_x_contact_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);


	// Setting - Contact Section Map iFrame
	$wp_customize->add_setting( 'corporate_x_contact_map_code',
		array(
			'default'           => '',
			'sanitize_callback' => 'corporate_x_sanitize_textarea_code',
		)
	);

	$wp_customize->add_control( 'corporate_x_contact_map_code',
		array(
			'label'    			=> esc_html__( 'Contact Contact Map Code', 'corporate-x' ),
			'section'  			=> 'corporate_x_contact_section',
			'type'     			=> 'textarea',
			'priority' 			=> 100,
		)
	);