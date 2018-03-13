<?php
/**
 * Corporate X functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Corporate_X
 */

if ( ! function_exists( 'corporate_x_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function corporate_x_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Add thumbnail sizes
		add_image_size( 'corporate-x-team', 270, 300, true );
		add_image_size( 'corporate-x-news', 369, 240, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'corporate-x' ),
			'side_menu' => esc_html__( 'Side Menu', 'corporate-x' ),
			'social' => esc_html__( 'Social', 'corporate-x' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'corporate_x_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'corporate_x_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function corporate_x_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'corporate_x_content_width', 640 );
}
add_action( 'after_setup_theme', 'corporate_x_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function corporate_x_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'corporate-x' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'corporate-x' ),
		'before_widget' => '<div id="%1$s" class="single-sidebar widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'corporate-x' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'corporate-x' ),
		'before_widget' => '<div class="col-md-4 col-sm-4 col-xs-12 widget"><div id="%1$s" class="single-widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Newsletter Widget Area', 'corporate-x' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add Newsletter widget here.', 'corporate-x' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'corporate_x_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function corporate_x_scripts() {
	wp_enqueue_style( 'corporate-x-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/wpcodethemes/assets/css/bootstrap.min.css' );

	wp_enqueue_style( 'animate', get_template_directory_uri() . '/wpcodethemes/assets/css/animate.min.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/wpcodethemes/assets/css/font-awesome.min.css' );

	wp_enqueue_style( 'hover', get_template_directory_uri() . '/wpcodethemes/assets/css/hover.min.css' );

	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/wpcodethemes/assets/css/slicknav.min.css' );

	wp_enqueue_style( 'slick', get_template_directory_uri() . '/wpcodethemes/assets/css/slick.css' );

	wp_enqueue_style( 'reset', get_template_directory_uri() . '/wpcodethemes/assets/css/reset.css' );

	wp_enqueue_style( 'pink', get_template_directory_uri() . '/wpcodethemes/assets/css/color.css' );

	wp_enqueue_style( 'corporate-x-font', corporate_x_fonts_url() );

	wp_enqueue_style( 'corporate-x-style', get_stylesheet_uri() );

	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/wpcodethemes/assets/css/responsive.css' );


	wp_enqueue_script( 'corporate-x-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'corporate-x-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/wpcodethemes/assets/js/modernizr.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'appear', get_template_directory_uri() . '/wpcodethemes/assets/js/jquery.appear.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/wpcodethemes/assets/js/isotope.pkgd.min.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/wpcodethemes/assets/js/jquery.counterup.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'nav', get_template_directory_uri() . '/wpcodethemes/assets/js/jquery.nav.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'scrollUp', get_template_directory_uri() . '/wpcodethemes/assets/js/jquery.scrollUp.min.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/wpcodethemes/assets/js/jquery.slicknav.min.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'masonry');

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/wpcodethemes/assets/js/slick.min.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/wpcodethemes/assets/js/waypoints.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'wow', get_template_directory_uri() . '/wpcodethemes/assets/js/wow.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'active', get_template_directory_uri() . '/wpcodethemes/assets/js/active.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'corporate_x_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Bootstrap Navwalker
 */
require get_template_directory() . '/wpcodethemes/third-party/nav-bootstrap-navwalker.php';

/**
 * Load Breadcrumb
 */
require get_template_directory() . '/wpcodethemes/third-party/breadcrumbs.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/wpcodethemes/theme-tags.php';

/**
 * Helper function file of this theme.
 */
require get_template_directory() . '/wpcodethemes/helpers.php';

/**
 * Filters function file of this theme.
 */
require get_template_directory() . '/wpcodethemes/filters.php';

/**
 * Theme Tags of this theme.
 */
require get_template_directory() . '/wpcodethemes/theme-tags.php';

if ( is_admin() ) {
	// Load about.
	require_once trailingslashit( get_template_directory() ) . '/inc/theme-info/class-about.php';
	require_once trailingslashit( get_template_directory() ) . '/inc/theme-info/about.php';

	// Load demo.
	require_once trailingslashit( get_template_directory() ) . '/inc/demo/class-demo.php';
	require_once trailingslashit( get_template_directory() ) . '/inc/demo/demo.php';
}
