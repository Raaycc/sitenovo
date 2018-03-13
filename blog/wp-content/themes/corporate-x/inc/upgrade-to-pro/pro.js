/**
 * Customizer custom js
 */

jQuery(document).ready(function() {
   jQuery('.wp-full-overlay-sidebar-content').prepend('<div class="corporate-ads"> <a href="https://wpcodefactory.com/item/corporate-x-wordpress-theme/" class="button" target="_blank">{pro}</a></div>'.replace('{pro}',corporate_x_customizer_js_obj.pro));
});