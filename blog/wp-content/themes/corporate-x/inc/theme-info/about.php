<?php
/**
 * About configuration
 *
 * @package CorporateX_Pro
 */

$config = array(
	'menu_name' => esc_html__( 'Corporate X Setup', 'corporate-x' ),
	'page_name' => esc_html__( 'Corporate X Setup', 'corporate-x' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'corporate-x' ), 'Corporate X' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'corporate-x' ), 'Corporate X' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','corporate-x' ),
			'url'  => 'https://wpcodethemes.com/downloads/corporate-x',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','corporate-x' ),
			'url'  => 'https://wpcodethemes.com/downloads/corporate-x',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'Upgrade to Pro','corporate-x' ),
			'url'    => 'https://wpcodefactory.com/item/corporate-x-wordpress-theme/',
			'button' => 'primary',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'corporate-x' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'corporate-x' ),
		'support'             => esc_html__( 'Support', 'corporate-x' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'corporate-x' ),
			'text'                => esc_html__( 'Find step by step instructions to setup theme easily.', 'corporate-x' ),
			'button_label'        => esc_html__( 'View documentation', 'corporate-x' ),
			'button_link'         => 'https://wpcodethemes.com/downloads/corporate-x',
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'corporate-x' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'corporate-x' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'corporate-x' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=corporate-x-about&tab=recommended_actions' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'corporate-x' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'corporate-x' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'corporate-x' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','corporate-x' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Home" template. Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you import demo content.', 'corporate-x' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'corporate-x' ) . '</a>',
			),
			'contact-form-7' => array(
				'title'       => esc_html__( 'Contact Form 7', 'corporate-x' ),
				'description' => esc_html__( 'Please install the Contact Form 7 plugin Before Importing Demo.', 'corporate-x' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'contact-form-7',
				'id'          => 'contact-form-7',
			),
			'newsletter' => array(
				'title'       => esc_html__( 'NewsLetter Plugin', 'corporate-x' ),
				'description' => esc_html__( 'Please install the Newsletter Plugin Before Importing Demo.', 'corporate-x' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'newsletter',
				'id'          => 'newsletter',
			),

			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'corporate-x' ),
				'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'corporate-x' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			),
			
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'corporate-x' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'corporate-x' ),
			'button_label' => esc_html__( 'Contact Support', 'corporate-x' ),
			'button_link'  => esc_url( 'https://wpcodethemes.com/downloads/corporate-x' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'corporate-x' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'corporate-x' ),
			'button_label' => esc_html__( 'View Documentation', 'corporate-x' ),
			'button_link'  => 'https://wpcodethemes.com/downloads/corporate-x',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Customization Request', 'corporate-x' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'This is 100% free theme and has premium version.Either Upgrade to Pro or  Feel free to contact us any time if you need any customization service.', 'corporate-x' ),
			'button_label' => esc_html__( 'Upgrade to Pro', 'corporate-x' ),
			'button_link'  => 'https://wpcodefactory.com/item/corporate-x-wordpress-theme/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
	),


);
Corporate_X_About::init( apply_filters( 'corporate_x_about_filter', $config ) );