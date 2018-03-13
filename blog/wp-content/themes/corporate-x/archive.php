<?php
/**
 * The template for displaying archive pages
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
                	<?php
                		if( have_posts() ) :
                	?>
						<div class="row">
							<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'archive' );
								endwhile;
							?>
						</div>	
						<div class="row">
							<div class="col-md-12">
								<?php
									the_posts_pagination( 
										array(
											'mid_size' 	=> 2,
											'prev_text' => esc_html__( '&laquo;', 'corporate-x' ),
											'next_text' => esc_html__( '&raquo;', 'corporate-x' ),
										) 
									);
								?>
							</div>
						</div>
					<?php
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>
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
