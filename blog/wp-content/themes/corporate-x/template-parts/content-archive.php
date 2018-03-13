<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */

?>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<!-- Single News -->
		<div class="single-news slide">
			<?php
				if( has_post_thumbnail() ) :
			?>
				<div class="news-head">
					<?php
						the_post_thumbnail( 'full' );
					?>
				</div>
			<?php
				endif;
			?>
			<div class="news-content">
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php
					if( 'post' === get_post_type() ) :
				?>
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
					endif;
					the_excerpt();
				?>
				<a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html__( 'Read More ', 'corporate-x' ); ?><span class="fa fa-angle-double-right"></span></a>
			</div>
		</div>
		<!--/ End Single News -->
	</div>