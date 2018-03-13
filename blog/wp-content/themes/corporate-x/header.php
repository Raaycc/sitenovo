<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_X
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<!-- Start Header -->
    <header class="header clearfix" id="header">
    	<?php
    		$enable_topbar	= get_theme_mod( 'corporate_x_show_top_header', 1 );
    		if( $enable_topbar == 1 ) :
    	?>
			<!-- Start Topbar -->
	        <div class="topbar">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-6 col-sm-12 col-xs-12">
							<!-- Address -->
	                        <ul class="address">
	                        	<?php
	                        		$contact_no 	= get_theme_mod( 'corporate_x_contact_number', '' );
	                        		$opening_hour	= get_theme_mod( 'corporate_x_opening_hour', '' );
	                        		$contact_email	= get_theme_mod( 'corporate_x_email', '' );
	                        		if( !empty( $contact_no ) ) :
	                        	?>
	                            		<li><i class="fa fa-phone"></i><?php echo esc_html( $contact_no ); ?></li>
	                            <?php
	                            	endif;
	                            	if( !empty( $opening_hour ) ) :
	                            ?>
	                            		<li><i class="fa fa-clock-o"></i><?php echo esc_html( $opening_hour ); ?></li>
	                            <?php
	                            	endif;
	                            	if( !empty( $contact_email ) ) :
	                            ?>
	                            		<li><a href="mailto:<?php echo esc_attr( $contact_email ); ?>"><i class="fa fa-send"></i><?php echo esc_html( $contact_email ); ?></a></li>
	                            <?php
	                            	endif;
	                            ?>
	                        </ul>
							<!--/ End Address -->
	                    </div>
	      				<?php
	      					if( has_nav_menu( 'social' ) ) :
	      				?>
			                    <div class="col-md-6 col-sm-12 col-xs-12">
									<!-- Social -->
									<?php
										wp_nav_menu( array(
				                            'theme_location'    => 'social',
				                            'menu_class'		=> 'social'
				                        ) );
									?>
									<!-- End Social -->
			                    </div>
		                <?php
		                	endif;
		                ?>
	                </div>
	            </div>
	        </div>
			<!--/ End Topbar -->
		<?php
			endif;
		?>
		
		<!-- Header Inner -->
        <div class="header-inner">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-12">
						<!-- Logo -->
						<div class="logo">
							<?php
								if( has_custom_logo() ) :
									the_custom_logo();
							?>
							<?php
								else :
							?>
									<h1 class="site-title">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					                        <?php bloginfo( 'name' ); ?>
					                    </a>
									</h1><!-- .site-title -->
									<h5 class="site-description">
										<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
									</h5><!-- .site-description -->
							<?php
								endif;
							?>
						</div>
						<!--/End Logo -->
						
						<div class="mobile-menu"></div>	
					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<!-- Main Menu -->
						<div class="main-menu">
							<!-- Cart Bar -->
							<?php
								$enable_search_icon	= get_theme_mod( 'corporate_x_show_search_icon', 1 );
								$enable_side_menu	= get_theme_mod( 'corporate_x_show_side_menu', 1 );
								if( $enable_search_icon == 1 || $enable_side_menu == 1 ) :
							?>
									<ul class="cart-search-bar">
										<?php
											if( $enable_search_icon == 1 ) :
										?>
												<li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
										<?php
											endif;
											if( $enable_side_menu == 1 && has_nav_menu( 'side_menu' ) ) :
										?>
												<li><a href="#" class="fa fa-bars"></a></li>
										<?php
											endif;
										?>
									</ul>
							<?php
								endif;
							?>
							<!--/ End Cart Bar -->
							
							<!-- Search Form -->
							<?php 
								if( $enable_search_icon == 1 ) :
							?>
									<div class="header-search-form">
										<?php
											get_search_form(); 
										?>
									</div>
							<?php
								endif;
							?>
							<!--/ End Search Form -->
							
							<?php
								if( $enable_side_menu == 1 && has_nav_menu( 'side_menu' ) ) :
							?>
								<!-- Side Menu -->
								<div class="side-menu">
									<div class="close-btn">
										<li class="remove"><a><i class="fa fa-remove"></i></a></li>
									</div>
									<?php
										wp_nav_menu( array(
											'theme_location'	=> 'side_menu',
											'menu_class'		=> 'nav navbar-nav'
										) );
									?>
								</div>
								<!--/ End Side Menu -->
							<?php
								endif;
							?>
							
							<!-- Navigation -->
							<nav class="navbar">
								<?php
									if( has_nav_menu( 'primary' ) ) :
							            wp_nav_menu( array(
							                'theme_location'    => 'primary',
							                'depth'             => 8,
							                'container'         => 'div',
							                'container_class'   => 'collapse navbar-collapse',
							                'container_id'      => 'bs-example-navbar-collapse-1',
							                'menu_class'        => 'nav navbar-nav menu',
							                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							                'walker'            => new WP_Bootstrap_Navwalker())
							            );
							       	endif;
						        ?>
							</nav>
							<!--/ End Navigation -->
						</div>
						<!--/ End Main Menu -->
					</div>
				</div>
			</div>
        </div>
		<!--/ End Header Inner -->
    </header>
    <!--/ End Header-->
	
	<?php
		if( !is_front_page() && !is_home() ) :
	?>
			<!-- Start Breadcrumbs -->
			<section class="breadcrumbs-container" style="background-image: url( <?php if( has_header_image() ) { header_image();  } ?> ); background-size: cover; background-attachment: fixed;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php
								if( is_search() ) :
							?>
								<h2>
									<?php
										/* translators: %s: search query. */
										printf( esc_html__( ' %s', 'corporate-x' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h2>
							<?php
								endif;
								if( is_archive() ) :
							?>
								<h2>
									<?php
										the_archive_title();
									?>
								</h2>
							<?php
								endif;
								if( is_404() ) :
							?>
								<h2>
									<?php
										echo esc_html__( '404', 'corporate-x' );
									?>
								</h2>
							<?php
								endif;
								if( is_single() || is_page() ) :
							?>
								<h2>
									<?php
										single_post_title();
									?>
								</h2>
							<?php
								endif;
	                            $breadcrumb_args = array(
	                                'show_browse' => false,
	                                'separator' => '&nbsp;',
	                                'post_taxonomy' => array(
	                                    'post' => 'category'
	                                )                        
	                            );
	                            corporate_x_breadcrumb_trail( $breadcrumb_args );
							?>
						</div>
					</div>
				</div>
			</section>
			<!--/ End Breadcrumbs -->
	<?php
		endif;
	?>