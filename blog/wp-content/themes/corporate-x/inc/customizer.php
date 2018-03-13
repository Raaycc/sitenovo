<?php
/**
 * Corporate X Theme Customizer
 *
 * @package Corporate_X
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corporate_x_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Load dropdown-category.php
	 */
	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/customize-control.php';

	/**
	 * Load sanitize.php
	 */
	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/sanitize.php';

	/**
	 * Load options.php
	 */
	require_once trailingslashit( get_template_directory() ) . '/wpcodethemes/customizer/options.php';

	



	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'corporate_x_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'corporate_x_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'corporate_x_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function corporate_x_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function corporate_x_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corporate_x_customize_preview_js() {
	wp_enqueue_script( 'corporate-x-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'corporate_x_customize_preview_js' );



/**
 * Enqueue scripts for customizer
 */
function corporate_x_customizer_js() {
    wp_enqueue_script('corporate-x-customizer', get_template_directory_uri() . '/inc/upgrade-to-pro/pro.js', array('jquery'), '1.3.0', true);

    wp_localize_script( 'corporate-x-customizer', 'corporate_x_customizer_js_obj', array(
        'pro' => __('Upgrade To Corporate X Pro','corporate-x')
    ) );
    wp_enqueue_style( 'corporate-x-customizer', get_template_directory_uri() . '/inc/upgrade-to-pro/pro.css');
}
add_action( 'customize_controls_enqueue_scripts', 'corporate_x_customizer_js' );
