<?php

	// Section - Newsletter Section
	$wp_customize->add_section( 'corporate_x_newsletter_section',
		array(
			'title'      => esc_html__( 'Newsletter Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Newsletter Section
	$wp_customize->add_setting( 'corporate_x_show_newsletter',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'corporate_x_show_newsletter',
		array(
			'label'    			=> esc_html__( 'Show Newsletter Section', 'corporate-x' ),
			'section'  			=> 'corporate_x_newsletter_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting - Newsletter Section ID
	$wp_customize->add_setting( 'corporate_x_newsletter_section_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_newsletter_section_id',
		array(
			'label'    			=> esc_html__( 'Newsletter Section ID', 'corporate-x' ),
			'description'    	=> esc_html__( 'ID is used for navigating to this section from navigation menu item', 'corporate-x' ),
			'section'  			=> 'corporate_x_newsletter_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Newsletter Section Title
	$wp_customize->add_setting( 'corporate_x_newsletter_section_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_newsletter_section_title',
		array(
			'label'    			=> esc_html__( 'Newsletter Section Title', 'corporate-x' ),
			'section'  			=> 'corporate_x_newsletter_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Newsletter Section SubTitle
	$wp_customize->add_setting( 'corporate_x_newsletter_section_subtitle',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_newsletter_section_subtitle',
		array(
			'label'    			=> esc_html__( 'Newsletter Section Subtitle', 'corporate-x' ),
			'section'  			=> 'corporate_x_newsletter_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - Newsletter Section Newsletter Form
	$wp_customize->add_setting( 'corporate_x_newsletter_shortcode',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_newsletter_shortcode',
		array(
			'label'    			=> esc_html__( 'Newsletter Form Shortcode', 'corporate-x' ),
			'section'  			=> 'corporate_x_newsletter_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);