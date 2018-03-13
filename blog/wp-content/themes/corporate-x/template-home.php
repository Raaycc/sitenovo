<?php
/**
 * Template Name: FrontPage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */
  
  	get_header();

  	get_template_part( 'section-parts/section', 'slider' );

  	get_template_part( 'section-parts/section', 'features' );

  	get_template_part( 'section-parts/section', 'counter' );

  	get_template_part( 'section-parts/section', 'projects' );

  	get_template_part( 'section-parts/section', 'testimonials' );

    get_template_part( 'section-parts/section', 'team' );

  	get_template_part( 'section-parts/section', 'newsletter' );

  	get_template_part( 'section-parts/section', 'news' );

  	get_template_part( 'section-parts/section', 'contact' );

  	get_template_part( 'section-parts/section', 'brands' );

?>
<?php
 	get_footer();
?>