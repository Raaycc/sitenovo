<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Corporate_X
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="newsblog section single">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 wow fadeInLeft error-404 not-found">
							<div class="single-news">
								<header class="page-header">
									<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'corporate-x' ); ?></h1>
								</header><!-- .page-header -->

								<div class="page-content">
									<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'corporate-x' ); ?></p>

									<?php
										get_search_form();
									?>

								</div><!-- .page-content -->
							</div>
						</div><!-- .error-404 -->
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
