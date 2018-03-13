<?php

class EIC_Giveaway {

    public function __construct()
    {
        $now = new DateTime();
		$giveaway_start = new DateTime( '2017-11-16 10:00:00', new DateTimeZone( 'Europe/Brussels' ) );
		$giveaway_end = new DateTime( '2017-11-24 10:00:00', new DateTimeZone( 'Europe/Brussels' ) );

		if ( ! EasyImageCollage::is_premium_active() && $giveaway_start < $now && $now < $giveaway_end ) {
            add_action( 'eic_modal_notices',    array( $this, 'giveaway_notice' ) );
		}
    }

    public function giveaway_notice()
    {
        echo '<div style="text-align: center; border: 1px solid darkgreen; padding: 5px; margin-bottom: 5px; background-color:rgba(0,255,0,0.15);">';
        echo '<strong>Feeling lucky?</strong> Win plugins in our <a href="https://gleam.io/dY9yY/black-friday-2017" target="_blank">Black Friday Giveaway</a>!';
        echo '</div>';
    }
}