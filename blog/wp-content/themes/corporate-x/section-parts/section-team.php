<?php
/**
 * Template part - Team Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */
	
	$enable_team		= get_theme_mod( 'corporate_x_show_team', 1 );
	$team_id			= get_theme_mod( 'corporate_x_team_section_id', '' );
	$team_title			= get_theme_mod( 'corporate_x_team_section_title', '' );
	$team_subtitle		= get_theme_mod( 'corporate_x_team_section_subtitle', '' );
	$team_category		= get_theme_mod( 'corporate_x_team_category', 1 );
	$team_no 			= get_theme_mod( 'corporate_x_team_posts_number', 4 );

	$team_args			= array(
		'post_type'			=> 'post',
		'cat'				=> absint( $team_category ),
		'posts_per_page'	=> absint( $team_no ),
		'ignore_sticky_posts'   => 1,
	);

	$team_query			= new WP_Query( $team_args );

	if( $enable_team == 1 && $team_query->have_posts() ) :
?>
		<section id="team" class="team section">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp">
	                    <div class="section-title">
	                        <?php
                                if( !empty( $team_title ) ) :
                            ?>
                                    <h2><?php echo esc_html( $team_title ); ?></h2>
                            <?php
                                endif;
                                if( !empty( $team_subtitle ) ) :
                            ?>
                                    <p><?php echo esc_html( $team_subtitle ); ?></p>
                            <?php
                                endif;
                            ?>
	                    </div>
	                </div>
	            </div>
				
	            <div class="row">
	            	<?php
	            		while( $team_query->have_posts() ) :
	            			$team_query->the_post();
	            	?>
			                <div class="col-md-3 col-sm-3 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
								<!-- Single Team -->
			                    <div class="single-team">
									<div class="team-head">
										<?php
											if( has_post_thumbnail() ) :
												the_post_thumbnail( 'corporate-x-team' );
											endif;
										?>
								        <div class="hover-team">
											<p class="team-text"><?php echo esc_html( get_the_content() ); ?></p>
										</div>
									</div>
									<div class="member-name">
										<h4><?php the_title(); ?></h4>
									</div>
			                    </div>
								<!--/ End Team -->
			                </div>
			        <?php
			        	endwhile;
			        	wp_reset_postdata();
			        ?>
	            </div>
	        </div>
	    </section>
<?php
	endif;