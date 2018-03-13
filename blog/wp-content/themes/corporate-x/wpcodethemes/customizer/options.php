<?php

	$wp_customize->add_panel( 'theme_option_panel', 
		array(
			'title'			=> __( 'Corporate X Options', 'corporate-x' ),
			'description'	=> __( 'Customize Corporate X Theme', 'corporate-x' ),
			'priority'		=> 10	
		) 
	);

	// Load Options
	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-header.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-slider.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-features.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-counter.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-projects.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-testimonials.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-team.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-newsletter.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-news.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-contact.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-brands.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-footer.php';

	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-options/option-others.php';