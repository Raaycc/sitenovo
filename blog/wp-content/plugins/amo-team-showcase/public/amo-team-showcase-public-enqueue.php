<?php

# General public CSS file
wp_enqueue_style( $this->gpo->get_plugin_name(), AMO_TEAM_SHOWCASE_PLUGIN_URL . 'public/css/amo-team-showcase-public.css', array(), AMO_TEAM_SHOWCASE_VERSION );

# For RTL languages
if ( is_rtl() ) {
	wp_enqueue_style( $this->gpo->get_plugin_name() . '-rtl', AMO_TEAM_SHOWCASE_PLUGIN_URL . 'public/css/rtl-public.css', array(), AMO_TEAM_SHOWCASE_VERSION );
} # IF | RTL

//wp_register_script( AMO_TEAM_SHOWCASE_CSS_PREFIX . 'imagesloaded', AMO_TEAM_SHOWCASE_PLUGIN_URL . 'public/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '4.1.1', true );

# Wookmark masonry grid making jQuery plugin | Fixed some bugs in the library
wp_register_script( AMO_TEAM_SHOWCASE_CSS_PREFIX . 'Wookmark-jQuery', AMO_TEAM_SHOWCASE_PLUGIN_URL . 'public/js/wookmark.js', array( 'jquery' ), '2.1.2', true );

# Magnific Popup CSS (jQuery plugin)
if ( ! $this->gpo->script_status_check( 'jquery.magnific-popup' ) ) {
	wp_register_script( 'magnific-popup', AMO_TEAM_SHOWCASE_PLUGIN_URL . 'public/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
}


# General public JS file
wp_register_script( $this->gpo->get_plugin_name(), AMO_TEAM_SHOWCASE_PLUGIN_URL . 'public/js/amo-team-showcase-public.js', array( 'jquery' ), AMO_TEAM_SHOWCASE_VERSION, true );

