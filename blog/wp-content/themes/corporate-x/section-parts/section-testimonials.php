<?php
/**
 * Template part - Testimonials Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */

	$enable_testimonials	= get_theme_mod( 'corporate_x_show_testimonials', 1 );
	$testimonials_id		= get_theme_mod( 'corporate_x_testimonials_section_id', '' );
	$testimonials_category	= get_theme_mod( 'corporate_x_testimonials_category', 1 );
	$testimonials_number	= get_theme_mod( 'corporate_x_testimonials_posts_number', 3 );

	$testimonials_args		= array(
		'post_type'			=> 'post',
		'cat'				=> absint( $testimonials_category ),
		'posts_per_page'	=> absint( $testimonials_number ),
		'ignore_sticky_posts'   => 1,
	);

	$testimonials_query		= new WP_Query( $testimonials_args );
	if( $enable_testimonials == 1 && $testimonials_query->have_posts() ) :

?>
		<section id="<?php if( !empty( $testimonials_id ) ) { echo esc_attr( $testimonials_id ); } ?>" class="testimonial section">
	        <div class="container">
	            <div class="row">
					<div class="testimonial-active wow fadeInUp" data-wow-delay="0.4s">
						<?php
							while( $testimonials_query->have_posts() ) :
								$testimonials_query->the_post();
						?>
							<div class="testimonial-content">
								<?php the_content(); ?>
								<h4 class="t-name"><span><?php echo esc_html__( '- ', 'corporate-x' ) ?></span><?php the_title(); ?></h4>
							</div>   
						<?php
							endwhile;
							wp_reset_postdata();
						?>
					</div>
	            </div>
	        </div>
	    </section>
<?php
	endif;
?>