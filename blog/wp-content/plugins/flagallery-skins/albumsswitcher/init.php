<?php
$ver = '1.4';

global $wp;
$settings['galleryID'] = $galleryID;
$settings['post_url'] = add_query_arg($_SERVER['QUERY_STRING'], '', home_url($wp->request));

wp_enqueue_style('flagallery-albumsswitcher-skin', plugins_url('/css/albumsswitcher.css', __FILE__), array(), $ver);
wp_enqueue_script('flagallery-albumsswitcher-skin', plugins_url('/js/albumsswitcher.js', __FILE__), array(), $ver, true);

?>
<noscript class="fla_AlbumsGrid_noscript">
    <p>JavaScript is not enabled in your browser</p>
</noscript>
<script type="text/javascript">
	function flaListINIT()
	{
		var id = 'flaAlbumsSwitcher'+Math.floor((1 + Math.random()) * 0x10000);
		var dataDIVs = document.body.getElementsByClassName('albumsswitcher_skin');
		dataDIVs[dataDIVs.length-1].setAttribute('app-id', id);
		this[id] = {'settings':<?php echo json_encode($settings);?>, 'data':<?php echo json_encode($data);?>, };
	}
	flaListINIT();
</script>
