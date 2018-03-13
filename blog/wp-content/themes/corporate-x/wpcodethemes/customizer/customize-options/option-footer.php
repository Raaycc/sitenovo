<?php

	// Section - Footer
	$wp_customize->add_section( 'corporate_x_footer',
		array(
			'title'      => esc_html__( 'Footer Options', 'corporate-x' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);