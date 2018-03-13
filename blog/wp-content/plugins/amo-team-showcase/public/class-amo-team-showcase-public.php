<?php
/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and hooks for how to
 * enqueue the public-specific stylesheet and JavaScript.
 *
 * @package    Amo_Team_Showcase
 * @subpackage Amo_Team_Showcase/public
 * @author     AMO Themo (Oleg Goltsev)
 */
class Amo_Team_Showcase_Public {

	/**
	 * Reference to the instance of Amo_Team_Showcase, where all general (admin and public) functions/properties reside.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var object Amo_Team_Showcase $gpo
	 */
	private $gpo;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    object $gpo - Reference to main/general plugin object, that holds general functionality for both admin and public.
	 */
	public function __construct( $general_plugin_obg ) {

		$this->gpo = $general_plugin_obg;
	} // FNC


	/**
	 * Registers the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_register_styles_and_scripts() {
		require 'amo-team-showcase-public-enqueue.php';
	}


	public function enqueue_public_scripts_on_demand(  ) {
		static $enqueued= false;
		// IF scripts aren't enqueued yet
		if ( ! $enqueued ) {
			wp_enqueue_script( 'imagesloaded' ); // JS library needed for Wookmark to work properly
			wp_enqueue_script( AMO_TEAM_SHOWCASE_CSS_PREFIX . 'Wookmark-jQuery' ); // Masonry grid making jQuery plugin
			wp_enqueue_script( 'magnific-popup' ); // Magnific Popup CSS (jQuery plugin)
			wp_enqueue_script( $this->gpo->get_plugin_name() ); // Main plugin's JS file

			// CSS styles assembled from the plugin options
			add_action( 'wp_footer', array( $this, 'echo_assembled_css_styles' ) );

			$enqueued = true;
		}
	} // FNC


	/**
	 * Output CSS styles assembled from the plugin options
	 *
	 * @since    1.0.0
	 */
	public function echo_assembled_css_styles() {
		?><style><?php
		echo "\n", '/*  AMO TEAM DYNAMIC CSS  */', "\n", apply_filters( 'amo_team_dynamic_css_output', get_option( $this->gpo->get_plugin_name() . '-css-styles' ) ) ;
		?></style><?php
	} // FNC


	/**
	 * Sets plugin's main and global JavaScript variable in website frontend
	 *
	 * @since    1.0.0
	 */
	public function set_amoteam_main_variable_script() {
		$options = get_option( $this->gpo->get_plugin_name() . '-options' );
		?>
		 <script>
		   "use strict";
		   var amoTeamVars                      = {};
		   amoTeamVars.teamSC                   = [];
		   amoTeamVars.memberSC                 = [];
		   amoTeamVars[ 'panel-alt-scroll' ]    = <?php echo $options['panel-alt-scroll'] ?>;
		   amoTeamVars[ 'thumbs-clear-events' ] = <?php echo $options['thumbs-clear-events'] ?>;
		 </script><?php
	} // FNC


	/**
	 * Extend list of allowed protocols.
	 *
	 * @param array $protocols List of default protocols allowed by WordPress.
	 *
	 * @return array $protocols Updated list including new protocols.
	 * @since    1.0.0
	 */
	public function extend_allowed_url_protocols( $protocols ) {
		$protocols[] = 'skype';
		return $protocols;
	} // FNC


	/*-------------------------------------------------------------------
	▐	10. Sanitizes HTML (mostly from JS)
	--------------------------------------------------------------------*/
	/**
	 * Sanitizes HTML, removes certain tags and their attributes
	 *
	 * @param string $html – HTML to sanitize
	 * @param array $tags – Tags to remove
	 * @param mixed $tag_attributes – Tags' attributes to remove
	 *
	 * @return string HTML
	 * @since 1.0.0
	 */
	function remove_tags_and_attributes_from_html( $html, $tags, $tag_attributes = null ) {
		if ( ! $tag_attributes ) $tag_attributes = array('onload', 'onclick');
		$output_html = $tags_to_remove = '';

		// Disable errors on invalid HTML
		libxml_use_internal_errors(true);

		$dom = new DOMDocument( '1.0','utf-8');
		$dom->loadHTML(  mb_convert_encoding( trim($html), 'HTML-ENTITIES', 'UTF-8'));
		# remove doctype
		$dom->removeChild($dom->doctype);
		# remove <html></html>
		$dom->replaceChild($dom->firstChild->firstChild, $dom->firstChild);

		// Remove certain tags
		foreach($tags as $tag) {
			$tags_to_remove = $dom->getElementsByTagName( $tag );
			foreach( $tags_to_remove as $tag_to_remove ){
				$tag_to_remove->parentNode->removeChild( $tag_to_remove );
			} // FOREACH 2
		} // FOREACH 1

		// Remove certain attributes from tags
		$nodes = $dom->getElementsByTagName('*');//just get all nodes,
		foreach($nodes as $node) {
			$current = null;
			foreach( $tag_attributes as $attr )	{
				if ( $node->hasAttribute($attr) )	{
					$node->removeAttribute($attr);
				} // IF
			} // FOREACH 2
		} // FOREACH 1

		# Remove <body></body> and Save HTML
		foreach($dom->firstChild->childNodes as $child_node){
			$output_html .= $dom->saveHTML($child_node);
		}

		return $output_html;

	} // FNC | remove_tags_and_attributes_from_html


} // CLASS
