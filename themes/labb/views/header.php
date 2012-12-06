<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title><?php echo html::specialchars($page_title.$site_name); ?></title>
	<?php if (!Kohana::config('settings.enable_timeline')) { ?>
		<style type="text/css">
			#graph{display:none;}
			#map{height:480px;}
		</style>
	<?php } ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php echo $header_block; ?>
	<?php
	// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
	?>

</head>

<?php
  // Add a class to the body tag according to the page URI

  // we're on the home page
  if (count($uri_segments) == 0)
  {
  	$body_class = "page-main";
  }
  // 1st tier pages
  elseif (count($uri_segments) == 1)
  {
    $body_class = "page-".$uri_segments[0];
  }
  // 2nd tier pages... ie "/reports/submit"
  elseif (count($uri_segments) >= 2)
  {
    $body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
  }
?>

<body id="page" class="<?php echo $body_class; ?>">

	<?php echo $header_nav; ?>

	<!-- wrapper -->
	<div class="rapidxwpr floatholder">

  <div class="report-bar">Report via
TEXT: <strong>(504) 27 27 OIL</strong>
EMAIL: </strong><a href="mailto:report@labucketbrigade.org">report@labucketbrigade.org</a></strong>
WEB FORM: </strong><a href="<?php echo url::base(); ?>/reports/submit/">here</a></strong>
</div>

		<!-- header -->
		<div id="header">

        <!-- Save for Web Slices (labb-website-update.jpg) -->
        <table class="sponsors" width="335" height="135" border="0" cellpadding="0" cellspacing="0">
        <tr>
                <td>
                        <img src="/themes/labb/images/labb-website-update_dala.jpg" width="135" height="80" alt=""></td>
                <td colspan="2">
                        <img src="/themes/labb/images/labb-website-update_LABB.jpg" width="154" height="80" alt=""></td>
                <td rowspan="2">
                        <img src="/themes/labb/images/labb-website-update_tulane.jpg" width="71" height="81" alt=""></td>
                 </tr>
        <tr>
                <td rowspan="3">
                        <img src="/themes/labb/images/labb-website-update_payson.jpg" width="135" height="66" alt=""></td>
                <td>
                        <img src="/themes/labb/images/labb-website-update_LABB-06.jpg" width="69" height="1" alt=""></td>
                <td rowspan="3">
                        <img src="/themes/labb/images/labb-website-update_rd.jpg" width="85" height="66" alt=""></td>
                        </tr>
        <tr>
                <td rowspan="2">
                        <img src="/themes/labb/images/labb-website-update_payson-08.jpg" width="69" height="65" alt=""></td>
                <td rowspan="2">
                        <img src="/themes/labb/images/labb-website-update_rd-09.jpg" width="71" height="65" alt=""></td>
        </tr>
        </table>
        <!-- End Save for Web Slices -->


			<!-- searchbox -->
			<div id="searchbox">

				<!-- languages -->
				<?php //echo $languages;?>
				<!-- / languages -->

				<!-- searchform -->
				<?php echo $search; ?>
				<!-- / searchform -->

				<div class="get-reports">Get Reports: 
<strong><a id="reports-rss" class="button btn_rss" href="<?php echo url::base() . 'feed/'; ?>">RSS</a> | 
<a class="button btn_download" href="<?php echo url::base() . 'api?task=3dkml'; ?>">KML</a> |
<a class="button btn_download" href="<?php echo url::base() . 'api?task=incidents&by=all&resp=json&limit=10000'; ?>">JSON</a> |
<a class="button btn_download" href="<?php echo url::base() . 'reports/download/'; ?>">CSV (table)</a></strong>
</div>

			</div>
			<!-- / searchbox -->

			<!-- logo -->
			<?php if ($banner == NULL): ?>
			<div id="logo">
				<h1><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></h1>
				<span><?php echo $site_tagline; ?></span>
			</div>
			<?php else: ?>
      	<a href="<?php echo url::site();?>"><img src="<?php echo $banner; ?>" alt="<?php echo $site_name; ?>" /></a>
			<?php endif; ?>
			<!-- / logo -->

			<!-- submit incident -->
			<?php //echo $submit_btn; ?>
			<!-- / submit incident -->
    
    <div class="donate"><a href="https://npo.networkforgood.org/Donate/Donate.aspx?npoSubscriptionId=1002791">Donate</a></div>
  
    </div>
		<!-- / header -->
        <!-- / header item for plugins -->
        <?php
            // Action::header_item - Additional items to be added by plugins
	        Event::run('ushahidi_action.header_item');
        ?>

		<!-- main body -->
		<div id="middle">
			<div class="background layoutleft">

				<!-- mainmenu -->
				<div id="mainmenu" class="clearingfix">
					<ul>
						<?php nav::main_tabs($this_page); ?>
					</ul>

					<?php if ($allow_feed == 1) { ?>
					<div class="feedicon"><a href="<?php echo url::site(); ?>feed/"><img alt="<?php echo htmlentities(Kohana::lang('ui_main.rss'), ENT_QUOTES); ?>" src="<?php echo url::file_loc('img'); ?>media/img/icon-feed.png" style="vertical-align: middle;" border="0" /></a></div>
					<?php } ?>

				</div>
				<!-- / mainmenu -->
