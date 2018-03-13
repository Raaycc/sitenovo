<?php
/**
 * Template part - Latest News Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */
	$enable_news		= get_theme_mod( 'corporate_x_show_news', 1 );
	$news_id			= get_theme_mod( 'corporate_x_news_section_id', '' );
	$news_title			= get_theme_mod( 'corporate_x_news_section_title', '' );
	$news_subtitle		= get_theme_mod( 'corporate_x_news_section_subtitle', '' );
	$news_categories	= get_theme_mod( 'corporate_x_news_categories', '' );
	$news_post_no		= get_theme_mod( 'corporate_x_news_posts_number', 3 );
	$news_button_title	= get_theme_mod( 'corporate_x_news_button_title', '' );
	$news_button_link	= get_theme_mod( 'corporate_x_news_button_link', '' );

	$news_args 			= array(
		'post_type'             => 'post',
        'posts_per_page'        => absint( $news_post_no ),
        'cat'                   => $news_categories,
        'ignore_sticky_posts'   => 1,
	);
	$news_query			= new WP_Query( $news_args );

	if( $enable_news == 1 && $news_query->have_posts() ) :
?>
	<section id="news" class="newsblog section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp">
                    <div class="section-title">
                        <?php
                                if( !empty( $news_title ) ) :
                            ?>
                                    <h2><?php echo esc_html( $news_title ); ?></h2>
                            <?php
                                endif;
                                if( !empty( $news_subtitle ) ) :
                            ?>
                                    <p><?php echo esc_html( $news_subtitle ); ?></p>
                            <?php
                                endif;
                            ?>
                    </div>
                </div>
            </div>
			
            <div class="row">
            	<?php
            		while( $news_query->have_posts() ) :
            			$news_query->the_post();
            	?>
		                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
							<!-- Single News -->
							<div class="single-news">
								<div class="news-head">
									<?php
										if( has_post_thumbnail() ):
											the_post_thumbnail( 'corporate-x-news' );
										endif;
									?>
									<a href="<?php the_permalink(); ?>" class="link"><i class="fa fa-link"></i></a>
								</div>
								<div class="news-content">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<div class="date">
										<?php 
											corporate_x_get_categories(); 
										?>
										<span><?php echo esc_html__( '/ ', 'corporate-x' ); ?></span>
										<?php 
											corporate_x_get_date(); 
										?>
									</div>
									<?php
										the_excerpt();
									?>
									<a href="<?php the_permalink(); ?>" class="btn">
										<?php echo esc_html__( 'Read More', 'corporate-x' ); ?>
										<span class="fa fa-angle-double-right"></span>
									</a>
								</div>
							</div>
							<!--/ End Single Testimonial -->
		                </div>
		        <?php
		        	endwhile;
		        	wp_reset_postdata();
		        ?>
            </div>
			<?php
				if( !empty( $news_button_link ) && !empty( $news_button_title ) ) :
			?>
		            <div class="row">
		                <div class="col-md-12 col-sm-12  col-xs-12 wow fadeInUp">
							<!-- Load More Button -->
							<div class="button">
		                        <a href="<?php echo esc_attr( esc_url( $news_button_link ) ); ?>" class="btn"><?php echo esc_html( $news_button_title ); ?></a>
		                    </div>
							<!--/ End Load More Button -->
		                </div>
		            </div>
		    <?php
		    	endif;
		    ?>
        </div>
    </section>
<?php
	endif;