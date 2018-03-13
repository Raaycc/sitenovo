<?php
/**
 * Template part - Newsletter Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */

    $enable_newsletter      = get_theme_mod( 'corporate_x_show_newsletter', 1 );
    $newsletter_id          = get_theme_mod( 'corporate_x_newsletter_section_id', '' );
    $newsletter_title       = get_theme_mod( 'corporate_x_newsletter_section_title', '' );
    $newsletter_subtitle    = get_theme_mod( 'corporate_x_newsletter_section_subtitle', '' );
    $newsletter_shortcode   = get_theme_mod( 'corporate_x_newsletter_shortcode', '' );

    if( $enable_newsletter == 1 ) :
?>
    	<section id="<?php if( !empty( $newsletter_id  ) ) { echo esc_attr( $newsletter_id ); } ?>" class="newslatter section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.4s">
    					<!-- Newslatter Title -->
                        <div class="news-title">
                            <?php
                                if( !empty( $newsletter_title ) ) :
                            ?>
                                    <h2><?php echo esc_html( $newsletter_title ); ?></h2>
                            <?php
                                endif;
                                if( !empty( $newsletter_subtitle ) ) :
                            ?>
                                    <p><?php echo esc_html( $newsletter_subtitle ); ?></p>
                            <?php
                                endif;
                            ?>
                        </div>
    					<!--/ End Newslatter Title -->
                    </div>
                    <?php
                        if( is_active_sidebar( 'sidebar-3' ) ) :
                    ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-delay="0.4s">
            					<!-- Newslatter Form -->
                                <?php dynamic_sidebar( 'sidebar-3' ); ?>
            					<!--End Newslatter Form -->
                            </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </section>
<?php
    endif;