<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */

?>
	<!-- Single News -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		<!-- News Content -->
		<div class="news-content">
			<h4><a><?php the_title(); ?></a></h4>
			<?php
				the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corporate-x' ),
					'after'  => '</div>',
				) );
			?>
		</div>
		<!--/ End News Content -->	
	</article>		