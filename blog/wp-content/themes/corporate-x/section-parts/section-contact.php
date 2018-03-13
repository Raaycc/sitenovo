<?php
/**
 * Template part - Contact Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */
	
	$enable_contact		= get_theme_mod( 'corporate_x_show_contact', 1 );
	$contact_id			= get_theme_mod( 'corporate_x_contact_section_id', '' );
	$contact_title		= get_theme_mod( 'corporate_x_contact_section_title', '' );
	$contact_subtitle	= get_theme_mod( 'corporate_x_contact_section_subtitle', '' );
	$contact_shortcode	= get_theme_mod( 'corporate_x_contact_shortcode', '' );
	$contact_code		= get_theme_mod( 'corporate_x_contact_map_code', '' );
	if( $enable_contact == 1 ) :
?>
		<section id="<?php if( !empty( $contact_id ) ) { echo esc_attr( $contact_id ); } ?>" class="section">
			<div class="container">
				 <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp">
						<div class="section-title">
							<?php
								if( !empty( $contact_title ) ) :
							?>
						   			<h2><?php echo esc_html( $contact_title ); ?></h2>
						   	<?php
						   		endif;
						   		if( !empty( $contact_subtitle ) ) :
						   	?>
						   			<p><?php echo esc_html( $contact_subtitle ); ?></p>
						   	<?php
						   		endif;
						   	?>
						</div>
					</div>
				 </div>
			
				<div class="row">
					<?php
						if( !empty( $contact_shortcode ) ) :
					?>
							<!-- Contact Form -->
							<div class="col-md-5 col-sm-6 col-xs-12 wow fadeInUp">
								<?php
									echo do_shortcode( $contact_shortcode );
								?>
							</div>
							<!--/ Contact Form -->
					<?php
						endif;
						if( !empty( $contact_code ) ) :
					?>					
							<!-- Google Map -->
							<div class="col-md-7 col-sm-6 col-xs-12 wow fadeInUp">
								<div class="contact-map">
									<div class="map">
										<?php echo esc_html($contact_code); ?>
									</div>
								</div>
							</div>
							<!--/ End Google Map -->
					<?php
						endif;
					?>
				</div>
			</div>
		</section>
<?php
	endif;
?>