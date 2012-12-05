<?php
/**
* Header view page.
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi - http://source.ushahididev.com
 * @module     API Controller
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL)
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title><?php echo $site_name; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<?php
		echo html::stylesheet('media/css/style','',true);
		echo html::stylesheet('media/css/jquery-ui-themeroller', '', true);
		echo "<!--[if lte IE 7]>".html::stylesheet('media/css/iehacks','',true)."<![endif]-->";
		echo "<!--[if IE 7]>".html::stylesheet('media/css/ie7hacks','',true)."<![endif]-->";
		echo "<!--[if IE 6]>".html::stylesheet('media/css/ie6hacks','',true)."<![endif]-->";

		// Load OpenLayers before jQuery!

		if ($map_enabled == 'streetmap')
		{

			echo html::script('media/js/OpenLayers', true);
			echo html::script('media/js/OpenStreetMap.js', true);
			echo "<script type=\"text/javascript\">OpenLayers.ImgPath = '".url::base().'media/img/openlayers/'."';</script>";
		}

		// Load jQuery

		echo html::script('media/js/jquery', true);
		echo html::script('media/js/jquery.ui.min', true);

		// Other stuff to load only we have the map enabled

		if ($map_enabled)
		{
			echo $api_url . "\n";

			if ($main_page || $this_page == 'alerts')
			{
				echo html::script('media/js/selectToUISlider.jQuery', true);
			}

			if ($main_page)
			{
				echo html::script('media/js/jquery.flot', true);
				echo html::script('media/js/timeline', true);
				echo "<!--[if IE]>".
					html::script('media/js/excanvas.pack', true)
					."<![endif]-->";
			}
		}

		if ($treeview_enabled)
		{
			echo html::script('media/js/jquery.treeview');
			echo html::stylesheet('media/css/jquery.treeview');
		}

		if ($validator_enabled)
		{
			echo html::script('media/js/jquery.validate.min');
		}

		if ($photoslider_enabled)
		{
			echo html::script('media/js/picbox', true);
			echo html::stylesheet('media/css/picbox/picbox');
		}

		if( $videoslider_enabled )
		{
			echo html::script('media/js/coda-slider.pack');
			echo html::stylesheet('media/css/videoslider');
		}

		// Load ProtoChart

		if ($protochart_enabled)
		{
			echo "<script type=\"text/javascript\">jQuery.noConflict()</script>";
			echo html::script('media/js/protochart/prototype', true);
			echo '<!--[if IE]>';
			echo html::script('media/js/protochart/excanvas-compressed', true);
			echo '<![endif]-->';
			echo html::script('media/js/protochart/ProtoChart', true);
		}

		if ($allow_feed == 1)
		{
			echo "<link rel=\"alternate\" type=\"application/rss+xml\" href=\"http://" . $_SERVER['SERVER_NAME'] . "/feed/\" title=\"RSS2\" />";
		}

		//Custom stylesheet

		echo html::stylesheet(url::base().'themes/'.$site_style."/style.css");
	?>

	<!--[if IE 6]>
	<script type="text/javascript" src="js/ie6pngfix.js"></script>
	<script type="text/javascript">DD_belatedPNG.fix('img, ul, ol, li, div, p, a');</script>
	<![endif]-->
	<script type="text/javascript">
		var addthis_config = {
		   ui_click: true
		}
		<?php echo $js . "\n"; ?>

	</script>
	<!-- ########### Begin GrassrootsMapping TMS Layers ############# -->
	<script type="text/javascript" charset="utf-8">
		function gm_tms() {
			latlon =  new OpenLayers.Projection('EPSG:4326');
			spherical =  new OpenLayers.Projection('EPSG:900913');

			var tmsMaxExtent = new OpenLayers.Bounds(-20037508,-20037508,20037508,20037508.34);
			// console.log(tmsMaxExtent);

			var mapMinZoom = 12;
			var mapMaxZoom = 20;
			map.maxExtent = tmsMaxExtent;
			map.baseLayer.numZoomLevels = 20

			map.baseLayer.resolutions = [156543.0339, 78271.51695, 39135.758475, 19567.8792375, 9783.93961875, 4891.969809375, 2445.9849046875, 1222.99245234375, 611.496226171875, 305.7481130859375, 152.87405654296876, 76.43702827148438, 38.21851413574219, 19.109257067871095, 9.554628533935547, 4.777314266967774, 2.388657133483887, 1.1943285667419434, 0.5971642833709717, 0.29858214168548586]

			function overlay_getTileURL(bounds) {
				// console.log('overlay_getTileURL')
				//     console.log(bounds);
			    var res = this.map.getResolution();
			    var x = Math.round((bounds.left - this.maxExtent.left) / (res * this.tileSize.w));
			    var y = Math.round((bounds.bottom - this.tileOrigin.lat) / (res * this.tileSize.h));
			    var z = this.map.getZoom();
			    if (this.map.baseLayer.name == 'Virtual Earth Roads' || this.map.baseLayer.name == 'Virtual Earth Aerial' || this.map.baseLayer.name == 'Virtual Earth Hybrid') {
			       z = z + 1;
			    }
				// console.log(this.layerBounds);
				// console.log(bounds);
			    if (this.layerBounds.intersectsBounds(bounds) && z >= mapMinZoom && z <= mapMaxZoom ) {
			       //console.log( this.url + z + "/" + x + "/" + y + "." + this.type);
			       return this.url + z + "/" + x + "/" + y + "." + this.type;
			    } else {
			       return "http://www.maptiler.org/img/none.png";
			    }
			}

			var TMSUrls = [["http://maps.grassrootsmapping.org/may-7-port-fourchon-balloon-oliver/","May 7 Port Fourchon boat",[-90.2410044402, 29.1552688063, -90.2250135601, 29.1946537898]],
						   ["http://maps.grassrootsmapping.org/chandeleur-may8-plane/","May 8 Chandeleur overflight",[ -88.8510862263, 29.9065301622, -88.8098846235, 29.991048132]],
						   ["http://maps.grassrootsmapping.org/may-9-chandeleur-balloon/","May 9 Chandeleur boat",[-88.8702269818, 29.7993140466, -88.861761108, 29.8070744924]]]

			var TMSLayers = []

			for (i=0;i<TMSUrls.length;i++) {

				var tmsoverlay = new OpenLayers.Layer.TMS( TMSUrls[i][1], TMSUrls[i][0], { type: 'png', getURL: overlay_getTileURL, alpha: true, isBaseLayer: false }); 
				if (OpenLayers.Util.alphaHack() == false) { tmsoverlay.setOpacity(0.7); }; 

				tmsoverlay.layerBounds = new OpenLayers.Bounds(TMSUrls[i][2][0],TMSUrls[i][2][1],TMSUrls[i][2][2],TMSUrls[i][2][3]);
				tmsoverlay.layerBounds.transform(latlon,spherical);
				// console.log(tmsBounds);
				// console.log(tmsoverlay);

				TMSLayers.push(tmsoverlay)
				map.addLayers([tmsoverlay]);

			}
		}
		var map
		function try_gm() {
			try {
				if(map != undefined) gm_tms()
				else setTimeout(try_gm,1000)
			} catch(e) {
				setTimeout(try_gm,1000)
			}
		}
		try_gm()
	</script>
	<!-- ########### End GrassrootsMapping TMS Layers ############# -->
</head>

<body id="page">
	<!-- wrapper -->
	<div class="rapidxwpr floatholder">

		<!-- header -->
		<div id="header">

			<!-- logo -->
			
                <div align="right" class="boxx"> 
<table border="0" cellspacing="0" cellpadding="0"> 
<tr>

 <td><table border="0" cellpadding="0" cellspacing="0" bgcolor="white"> 
<div class="additional-content"><font color="white" ><strong>Report via</strong></font><font color="white">
<strong> TEXT: <font color="black">(504) 27 27 OIL</font> EMAIL: <a href="mailto:bpspillmap@gmail.com"><font color="black">bpspillmap@gmail.com</font></a> TWITTER: <font color="black">#BPspillmap</font> ANDROID: <a href="http://www.appbrain.com/app/org.addhen.oilspill"><font color="black">Oil Spill Tracker App</font></a> iPHONE: <a href="http://www.savegulfwildlife.org/"><font color="black">MoGO App</font></a> WEB FORM: <a href="http://www.oilspill.labucketbrigade.org/reports/submit/"><font color="black">here</font></a></font>

</strong>
</td>
</div>


</tr>


  <tr> 
    <td><table border="0" cellspacing="0" cellpadding="0"> 
      <tr> 
        <td><table border="0" cellpadding="0" cellspacing="0"> 
          <tr> 
<!-- Save for Web Slices (labb-website-update.jpg) -->
<!-- End Save for Web Slices -->
           </tr>
<tr>

<form method="get" id="search" action="<?php echo url::base() . 'search/'; ?>">
<input type="submit" name="b" class="searchbtn" value="search reports" /><input type="text" name="k" value="" class="text" /></form>  get reports: 
 <a id="reports-rss" class="button btn_rss" href="<?php echo url::base() . 'feed/'; ?>"><font color="black"><strong>RSS</strong></font></a> | 
<a class="button btn_download" href="<?php echo url::base() . '/api?task=3dkml'; ?>"><font color="black"><strong>KML</strong></font></a> |
<a class="button btn_download" href="<?php echo url::base() . '/api?task=incidents&by=all&resp=json&limit=10000'; ?>"><font color="black"><strong>JSON</strong></font></a> |
<a class="button btn_download" href="<?php echo url::base() . 'download/'; ?>"><font color="black"><strong>CSV (table)</strong></font></a>



</tr>





        </table>

<style>
.menu_fix{
margin-left: 3px;
display:block;
height:31px;
overflow:hidden;
}
.menu_fix td{
padding:0;
margin:0;
}
.menu_spacer{
width:202px;
}
</style> 

		</div>
			<!-- / logo -->

			
		</div>
		<!-- / header -->

		<!-- main body -->
		<div id="middle" style="width:958px;">
			<div class="background layoutleft" style="width:958px;">

				<!-- mainmenu -->
				<div id="mainmenu" class="clearingfix" style="width:934px;">
					<ul>
						<li><a href="<?php echo url::base() . "main" ?>" <?php if ($this_page == 'home') echo 'class="active"'; ?>><?php echo Kohana::lang('ui_main.home'); ?></a></li>
						<li><a href="<?php echo url::base() . "reports" ?>" <?php if ($this_page == 'reports') echo 'class="active"'; ?>><?php echo Kohana::lang('ui_main.reports'); ?></a></li>
						<li><a href="<?php echo url::base() . "reports/submit" ?>" <?php if ($this_page == 'reports_submit') echo 'class="active"'; ?>><?php echo Kohana::lang('ui_main.submit'); ?></a></li>
						<li><a href="<?php echo url::base() . "alerts" ?>" <?php if ($this_page == 'alerts') echo 'class="active"'; ?>><?php echo Kohana::lang('ui_main.alerts'); ?></a></li>
						<?php
						// Contact Page
						if ($site_contact_page)
						{
							?>
							<li><a href="<?php echo url::base() . "contact" ?>" <?php if ($this_page == 'contact') echo 'class="active"'; ?>><?php echo Kohana::lang('ui_main.contact'); ?></a></li>
							<?php
						}

						// Help Page
						if ($site_help_page)
						{
							?>
							<li><a href="<?php echo url::base() . "help" ?>"><?php echo Kohana::lang('ui_main.help'); ?></a></li>
							<?php
						}

						// Custom Pages
						foreach ($pages as $page)
						{
							$this_active = ($this_page == 'page_'.$page->id) ? 'class="active"' : '';
							echo "<li><a href=\"".url::base()."page/index/".$page->id."\" ".$this_active.">".$page->page_tab."</a></li>";
						}
						?>
					</ul>

				</div>
				<!-- / mainmenu -->
