<?php
/**
 * Demo configuration
 *
 * @package Corporate X
 */

$config = array(
	'static_page'    => 'home',
	'posts_page'     => 'blog',
	'menu_locations' => array(
		'primary' 	=> 'primary',
		'side_menu'	=>'sidemenu',
		'social'	=>'socialmenu',
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import Corporate Demo', 'corporate-x' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.json',
      		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/customizer.dat',
      		'import_notice'                => __( 'It will overwrite your settings', 'corporate-x' ),
      		'preview_url'                  => 'https://wpcodethemes.com/corporate-x/',
		),
		
	),
);

Corporate_X_Demo::init( apply_filters( 'corporate_x_demo_filter', $config ) );