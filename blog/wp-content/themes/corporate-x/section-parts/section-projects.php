<?php
/**
 * Template part - Projects Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */
    
    $enable_projects        = get_theme_mod( 'corporate_x_show_project', 1 );
    $projects_id            = get_theme_mod( 'corporate_x_projects_section_id', '' );
    $projects_title         = get_theme_mod( 'corporate_x_projects_section_title', '' );
    $projects_subtitle      = get_theme_mod( 'corporate_x_projects_section_subtitle', '' );
    $projects_categories    = get_theme_mod( 'corporate_x_projects_categories', '' );
    $projects_post_no       = get_theme_mod( 'corporate_x_projects_posts_number', 4 );
    $projects_button_link   = get_theme_mod( 'corporate_x_projects_button_link', '' );
    $projects_button_title  = get_theme_mod( 'corporate_x_projects_button_title', '' );

    $categories             = array();
    if( !empty( $projects_categories ) ) {
        $categories = array_map( 'intval', explode( ', ', $projects_categories ) );
    }
    $projects_args = array( 
        'post_type'             => 'post',
        'posts_per_page'        => absint( $projects_post_no ),
        'cat'                   => $projects_categories,
        'ignore_sticky_posts'   => 1,
    );

    $projects_query = new WP_Query( $projects_args );

    if( $enable_projects == 1 && $projects_query->have_posts() ) :

?>
        <section id="<?php if( !empty( $projects_id ) ) { echo esc_attr( $projects_id ); } ?>" class="project section">
            <div class="container">
                <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp">
                        <div class="section-title">
                            <?php
                                if( !empty( $projects_title ) ) :
                            ?>
                                    <h2><?php echo esc_html( $projects_title ); ?></h2>
                            <?php
                                endif;
                                if( !empty( $projects_subtitle ) ) :
                            ?>
                                    <p><?php echo esc_html( $projects_subtitle ); ?></p>
                            <?php
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
                        <?php
                            $taxonomy   = 'category';
                            $terms       = get_terms( $taxonomy );
                            if( $terms && !is_wp_error( $terms ) ) :
                        ?>
                            <!-- Project Nav -->
                            <div class="project-nav">
                                <ul>
                                    <li class="active" data-filter="*">All Works</li>
                                    <?php
                                        foreach( $terms as $term ) :
                                            if( in_array( $term->term_id, $categories ) ) :
                                    ?>
                                                <li data-filter="<?php echo '.'.esc_attr( $term->slug ); ?>"><?php echo esc_html( $term->name ); ?></li>
                                    <?php
                                            endif;
                                        endforeach;
                                    ?>
                                </ul>
                            </div>
                            <!--/ End Project Nav -->
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
                
                <div class="row wow fadeInUp" data-wow-delay="0.4s">
                    <div class="isotop-active masonry">
                        <?php
                            while( $projects_query->have_posts() ) :
                                $projects_query->the_post();

                                $post_id = get_the_ID();

                                $terms      = wp_get_post_terms( absint($post_id), 'category');

                                $post_terms = '';

                                foreach( $terms as $term ) {
                                    $post_terms .= $term->slug.' ';
                                }
                        ?>
                                <div class="col-md-3 col-sm-4 col-xs-12 <?php echo esc_attr( $post_terms ); ?>">
                                    <!-- Single Project -->
                                    <div class="single-project">
                                        <div class="project-head">
                                            <?php
                                                if( has_post_thumbnail() ) :
                                                    the_post_thumbnail();
                                                endif;
                                            ?>
                                            <div class="project-hover">
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Single Project -->
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <?php
                    if( !empty( $projects_button_title ) && !empty( $projects_button_link ) ) :
                ?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp">
                                <!-- Load More -->
                                <div class="button">
                                    <a href="<?php echo esc_attr( esc_url( $projects_button_link ) ); ?>" class="btn"><?php echo esc_html( $projects_button_title ); ?></a>
                                </div>
                                <!--/ End Load More -->
                            </div>
                        </div>
                <?php
                    endif;
                ?>
            </div>
        </section>
<?php
    endif;
?>