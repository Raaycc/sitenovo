<?php
/**
 * Template part - Brands Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */
	$enable_brand		= get_theme_mod( 'corporate_x_show_brands', 1 );
	$brand_id			= get_theme_mod( 'corporate_x_brands_section_id', '' );
	$brand_category		= get_theme_mod( 'corporate_x_brands_category', 1 );

	$brand_args			= array(
			'post_type'				=> 'post',
			'cat'					=> absint( $brand_category ),
			'posts_per_page'		=> -1,
			'ignore_sticky_posts'	=> 1,
	);
	$brand_query		= new WP_Query( $brand_args );

	if( $enable_brand == 1 && $brand_query->have_posts() ) :
?>
		<div id="brand" class="brand section">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp">
						<div class="brand-slider">
							<?php
								$count = 1;
								while( $brand_query->have_posts() ) :
									$brand_query->the_post();
									if( has_post_thumbnail() ) :
							?>
										<!-- Single Brand -->
										<div class="single-brand <?php if( $count == 1 ) { echo 'active'; } ?>">
											<a href=""><?php the_post_thumbnail(); ?></a>
										</div>
										<!--/ End Single Brand -->
							<?php
									endif;
									$count = $count + 1;
								endwhile;
							?>
						</div>
	                </div>
	            </div>
	        </div>
	    </div>
<?php
	endif;