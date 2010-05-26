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
</head>

<body id="page">
	<!-- wrapper -->
	<div class="rapidxwpr floatholder">

		<!-- header -->
		<div id="header">

			<!-- logo -->
			
                <div align="center" class="boxx"> 
<table border="0" cellspacing="0" cellpadding="0"> 
  <tr> 
    <td><table border="0" cellspacing="0" cellpadding="0"> 
      <tr> 
        <td><table border="0" cellpadding="0" cellspacing="0"> 
          <tr> 
            <td rowspan="2"><a href="http://labucketbrigade.org/index.php"><img src="/themes/labb/labb_index_01.gif" width="565" height="160" border="0"></a></td> 
            <td><img src="/themes/labb/labb_index_02.gif" width="393" height="114"></td> 
          </tr> 
          <tr> 
            <td><a href="https://npo.networkforgood.org/Donate/Donate.aspx?npoSubscriptionId=1002791"><img src="/themes/labb/labb_index_04.gif" width="393" height="46" border="0"></a></td> 
          </tr>

<tr>
<div class="additional-content">
<h5><font color="white">Submit an Incident</font></h5><font color="white">
<strong>Text: <font color="black">(504) 27 27 OIL</font>  |  Email: <a href="mailto:bpspillmap@gmail.com"><font color="black">bpspillmap@gmail.com</font></a>  |  Tweet with <font color="black">#BPspillmap</font>  |  or <a href="http://www.oilspill.labucketbrigade.org/reports/submit/"><font color="black">fill out this form</font></a></font>
</strong></div>
</tr>

<tr>

<form method="get" id="search" action="<?php echo url::base() . 'search/'; ?>">
<input type="text" name="k" value="" class="text" /><input type="submit" name="b" class="searchbtn" value="search reports" /></form><a class="button btn_download" href="<?php echo url::base() . 'download/'; ?>"><font color="black"><strong> | Download reports</strong></font></a><a id="reports-rss" class="button btn_rss" href="<?php echo url::base() . 'feed/'; ?>"><font color="black"><strong> | Reports RSS</strong></font></a>

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
        <table class="menu_fix" align="left" style="background:#507425" border="0" cellspacing="0" cellpadding="0"> 
          <tr> 
            <td><a href="http://labucketbrigade.org/article.php?list=type&type=136"><img src="/themes/labb/labb_index_05.gif"  height="32" border="0"></a></td> 
            <td><a href="http://labucketbrigade.org/article.php?list=type&type=4"><img src="/themes/labb/labb_index_06.gif"  height="32" border="0"></a></td> 
            <td><a href="http://labucketbrigade.org/article.php?list=type&type=5"><img src="/themes/labb/labb_index_07.gif"  height="32" border="0"></a></td> 
            <td><a href="http://labucketbrigade.org/article.php?list=type&type=7"><img src="/themes/labb/labb_index_08.gif"  height="32" border="0"></a></td> 
            <td><a href="http://labucketbrigade.org/article.php?list=type&type=8"><img src="/themes/labb/labb_index_09.gif"  height="32" border="0"></a></td> 
            <td><a href="http://labucketbrigade.org/article.php?list=type&type=144"><img src="/themes/labb/labb_index_10.gif"  height="32" border="0"></a></td> 
	    <td class="menu_spacer"></td>
            <td align="right"><a href="http://labucketbrigade.org/article.php?list=type&type=6"><img src="/themes/labb/labb_index_11.gif"  height="32" border="0"></a></td> 
          </tr> 
        </table>
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
