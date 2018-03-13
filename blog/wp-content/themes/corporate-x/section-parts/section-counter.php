<?php
/**
 * Template part - Counter Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_X
 */

    $enable_counter     = get_theme_mod( 'corporate_x_show_counter', 1 );
    $counter_id         = get_theme_mod( 'corporate_x_counter_section_id', '' );

    $counter_no         = 4;
    $counter_titles     = array();
    $counter_icons      = array();
    $counter_number     = array();
    for( $i = 1; $i <= $counter_no; $i++ ) {
        $counter_titles[]   = get_theme_mod( "corporate_x_counter_title_$i", "" );
        $counter_icons[]    = get_theme_mod( "corporate_x_counter_icon_$i", "" );
        $counter_numbers[]  = get_theme_mod( "corporate_x_counter_number_$i", "" );
    }
    if( $enable_counter == 1  ) :
?>
    	<section id="<?php echo esc_attr( $enable_counter ); ?>" class="count-down section">
            <div class="container">
                <div class="row">
                    <?php
                        for( $i = 0; $i < $counter_no; $i++ ) {
                    ?>
                    <div class="col-md-3 col-sm-3 col-xs-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="single-count">
                            <i class="fa <?php if( !empty( $counter_icons[ $i ] ) ) { echo esc_attr( $counter_icons[ $i ] ); } ?>"></i>
                            <h2 class="count"><?php if( !empty( $counter_numbers[ $i ] ) ) { echo esc_html( $counter_numbers[ $i ] ); } ?></h2>
                            <p><?php if( !empty( $counter_titles[ $i ] ) ) { echo esc_html( $counter_titles[ $i ] ); } ?></p>
                        </div><!-- .single-count -->
                    </div>
                    <?php
                        }
                    ?>
                </div><!-- .row -->
            </div><!-- .container -->
        </section><!-- #<?php echo esc_attr( $enable_counter ); ?> .count-down.section -->
<?php
    endif;
?>
