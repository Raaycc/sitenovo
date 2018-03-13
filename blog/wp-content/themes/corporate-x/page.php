<?php
/**
 * The template for displaying all pages
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

get_header(); ?>
	
	<!-- Start News -->
    <section class="newsblog section single">
        <div class="container">
            <div class="row">
            	<?php
            		$sidebar_position 	= get_theme_mod( 'corporate_x_sidebar_position', 'right' );
            		$class 				= '';
            		if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar-1' ) ) :
            			$class = 'col-md-12';
            		else :
            			$class = 'col-md-8 col-sm-12 col-xs-12';
            		endif;
            		if( $sidebar_position == 'left' ) :
            			get_sidebar();
            		endif;
            	?>
                <div class="<?php echo esc_attr( $class ); ?> wow fadeInLeft" data-wow-delay="0.4s">
                	<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<!-- Single News -->
							<div class="single-news">
								<?php
									while ( have_posts() ) : the_post();

										get_template_part( 'template-parts/content', 'page' );

										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

									endwhile; // End of the loop.
								?>
							</div>
						</div>
					</div>
                </div>	
				
				<?php
					if( $sidebar_position == 'right' ) :
						get_sidebar();
					endif;
				?>
            </div>	
        </div>
    </section>
    <!--/ End News -->
<?php
get_footer();
