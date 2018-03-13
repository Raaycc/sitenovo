<?php
/**
 * Template part - Slider Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */	

	$enable_slider = get_theme_mod( "corporate_x_show_slider", 1 );
	$left_button_title = get_theme_mod( "corporate_x_button_left_title", "" );
	$right_button_title = get_theme_mod( "corporate_x_button_right_title", "" );

	$slider_pages = array();
	$slider_links = array();
	$slider_number = 3;
	for( $i = 1; $i <= $slider_number; $i++ ) {
		$slider_pages[] = absint( get_theme_mod( "corporate_x_slider_page_$i", 1 ) );
		$slider_links[] = get_theme_mod( "corporate_x_slider_link_$i", "" ); 
	}
	$slider_links = array_reverse( $slider_links );

	$slider_args = array(
		'post_type'			=> 'page',
		'posts_per_page'	=> absint( $slider_number ),
		'post__in'			=> $slider_pages,
	);
	$slider_query = new WP_Query( $slider_args );

	if( $enable_slider == 1 && $slider_query->have_posts() ) :

?>
		<section class="sufia-slider clearfix">
	        <div class="slider-main">
	        	<?php
	        		$count = 0;
	        		while( $slider_query->have_posts() ) :
	        			$slider_query->the_post();
	        			if( has_post_thumbnail() ) :
	        				$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
	        			else :
	        				$thumbnail_url = "";
	        			endif;
	        	?>
			            <!-- Slider Item -->
						<div class="single-slider" style="background-image:url(<?php if( !empty( $thumbnail_url ) ) { echo esc_attr( esc_url( $thumbnail_url ) );  } ?>)">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="welcome-text">
											<h1><?php the_title(); ?></h1>
											<div class="button">
												<?php
													if( !empty( $left_button_title ) ) :
												?>
														<a href="<?php the_permalink(); ?>" class="btn primary">
															<?php echo esc_html( $left_button_title ); ?>
														</a>
												<?php
													endif;
													if( !empty( $right_button_title ) && !empty( $slider_links[ $count ] ) ) :
												?>
														<a href='<?php echo esc_attr( esc_url( $slider_links[ $count ] ) ); ?>' class="btn">	<?php echo esc_html( $right_button_title ); ?>
														</a>
												<?php
													endif;
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
			            </div>
						<!--/ End Slider Item -->
				<?php
						$count = $count + 1;
					endwhile;
					wp_reset_postdata();
				?>
	        </div>
	    </section>
<?php
	endif;
?>