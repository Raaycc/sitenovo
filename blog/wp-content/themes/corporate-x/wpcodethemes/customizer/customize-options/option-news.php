<?php
	
	// Section - News Section
	$wp_customize->add_section( 'corporate_x_news_section',
		array(
			'title'      => esc_html__( 'News Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable News Section
	$wp_customize->add_setting( 'corporate_x_show_news',
		array(
			'default'           => 1,
			'sanitize_callback' => 'corporate_x_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'corporate_x_show_news',
		array(
			'label'    			=> esc_html__( 'Show News Section', 'corporate-x' ),
			'section'  			=> 'corporate_x_news_section',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting - News Section ID
	$wp_customize->add_setting( 'corporate_x_news_section_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_news_section_id',
		array(
			'label'    			=> esc_html__( 'News Section ID', 'corporate-x' ),
			'description'    	=> esc_html__( 'ID is used for navigating to this section from navigation menu item', 'corporate-x' ),
			'section'  			=> 'corporate_x_news_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - News Section Title
	$wp_customize->add_setting( 'corporate_x_news_section_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_news_section_title',
		array(
			'label'    			=> esc_html__( 'News Section Title', 'corporate-x' ),
			'section'  			=> 'corporate_x_news_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - News Section SubTitle
	$wp_customize->add_setting( 'corporate_x_news_section_subtitle',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_news_section_subtitle',
		array(
			'label'    			=> esc_html__( 'News Section Subtitle', 'corporate-x' ),
			'section'  			=> 'corporate_x_news_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - News Categories
	$wp_customize->add_setting( 'corporate_x_news_categories',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_news_categories',
		array(
			'label'    			=> esc_html__( 'News Categories', 'corporate-x' ),
			'description'    	=> esc_html__( 'Insert categories IDs. Example: 1, 2, 3', 'corporate-x' ),
			'section'  			=> 'corporate_x_news_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);

	// Setting - News Posts Number
	$wp_customize->add_setting( 'corporate_x_news_posts_number',
		array(
			'default'           => 3,
			'sanitize_callback' => 'corporate_x_sanitize_number_absint',
		)
	);

	$wp_customize->add_control( 'corporate_x_news_posts_number',
		array(
			'label'    			=> esc_html__( 'News Posts Number', 'corporate-x' ),
			'description'    	=> esc_html__( 'Numbers of posts to be displayed for each categories', 'corporate-x' ),
			'section'  			=> 'corporate_x_news_section',
			'type'     			=> 'number',
			'priority' 			=> 100,
		)
	);

	// Setting - Button Link
	$wp_customize->add_setting( 'corporate_x_news_button_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control( 'corporate_x_news_button_link',
		array(
			'label'    			=> esc_html__( 'Button Link ', 'corporate-x' ),
			'section'  			=> 'corporate_x_news_section',
			'type'     			=> 'url',
			'priority' 			=> 100,
		)
	);

	// Setting - Button Title
	$wp_customize->add_setting( 'corporate_x_news_button_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'corporate_x_news_button_title',
		array(
			'label'    			=> esc_html__( 'Button Title', 'corporate-x' ),
			'section'  			=> 'corporate_x_news_section',
			'type'     			=> 'text',
			'priority' 			=> 100,
		)
	);