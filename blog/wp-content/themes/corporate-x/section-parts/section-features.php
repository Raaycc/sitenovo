<?php
/**
 * Template part - Features Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */
    
    $enable_feature     = get_theme_mod( 'corporate_x_show_feature', 1 );
    $feature_id         = get_theme_mod( 'corporate_x_features_section_id', '' );
    $feature_title      = get_theme_mod( 'corporate_x_features_section_title', '' );
    $feature_subtitle   = get_theme_mod( 'corporate_x_features_section_subtitle', '' );

    $features_no        = 6;
    $features_pages      = array();
    $features_icons     = array();
    for( $i = 1; $i <= $features_no; $i++ ) {
        $features_pages[]    = absint( get_theme_mod( "corporate_x_features_page_$i", 1 ) );
        $feature_icons[]    = get_theme_mod( "corporate_x_features_icon_$i", '' );
    }

    $features_args  = array(
        'post_type'             => 'page',
        'post__in'              => $features_pages,
        'posts_per_page'        => $features_no,
        'ignore_sticky_posts'   => 1,
        'order'                 => 'ASC'
    ); 

    $features_query = new   wp_Query( $features_args );
    if( $enable_feature == 1 && $features_query->have_posts() ) :
?>
        <section id="<?php echo esc_attr( $feature_id ); ?>" class="features section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp">
                        <div class="section-title">
                            <?php
                                if( !empty( $feature_title ) ) :
                            ?>
                                    <h2><?php echo esc_html( $feature_title ); ?></h2>
                            <?php
                                endif;
                                if( !empty( $feature_subtitle ) ) :
                            ?>
                                    <p><?php echo esc_html( $feature_subtitle ); ?></p>
                            <?php
                                endif;
                            ?>
                        </div><!-- .section-title -->
                    </div>
                </div><!-- .row -->
    			
                <div class="row">
                    <?php
                        $count = 0;
                        while( $features_query->have_posts() ) :
                            $features_query->the_post();
                    ?>
                            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
                                <div class="single-features">
                                    <i class="fa <?php echo esc_attr( $feature_icons[ $count ] ); ?>"></i>
            						<h4><?php the_title(); ?></h4>
            						<?php the_content(); ?>
                                </div><!-- .single-features -->
                            </div>
                    <?php
                            $count = $count + 1;
                        endwhile;
                        wp_reset_postdata();
                    ?>
                </div><!-- .row -->
            </div><!-- .container -->
        </section><!-- #<?php echo esc_attr( $feature_id ); ?> .features.section -->
<?php
    endif;
?>