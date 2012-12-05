<?php 
/**
 * Footer view page.
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
     
 
	<!-- footer -->
	<div id="footer" class="clearingfix" style="width:959px">
 
		<div id="underfooter"></div>
 
		<!-- footer content -->
		<div class="rapidxwpr floatholder">
 
			<!-- footer credits -->
			<div class="footer-credits">
				Powered by <a href="http://www.ushahidi.com/"><img src="<?php echo url::base(); ?>/media/img/footer-logo.png" alt="Ushahidi" align="absmiddle" /></a><p>
                <div align='center'><a href='http://www.hit-counts.com'><img src='http://www.hit-counts.com/counter.php?t=18&digits=7&ic=2055&cid=702354' border='0' alt='free html visitor counters'></a><BR><a href='http://www.hit-counts.com'>hit counter</a></div>
			</div>
			<!-- / footer credits -->
		
			<!-- footer menu -->
			<div class="footermenu">
				<ul class="clearingfix">
					<li><a class="item1" href="<?php echo url::base() ?>"><?php echo Kohana::lang('ui_main.home'); ?></a></li>
					<li><a href="<?php echo url::base() . "reports/submit" ?>"><?php echo Kohana::lang('ui_main.report_an_incident'); ?></a></li>
					<li><a href="<?php echo url::base() . "alerts" ?>"><?php echo Kohana::lang('ui_main.alerts'); ?></a></li>
					<!-- Begin BTS 20111109 removed per Molly -->
					<!--<li><a href="<?php //echo url::base() . "help" ?>"><?php //echo Kohana::lang('ui_main.help'); ?></a></li>-->
					<!-- End BTS 20111109 removed per Molly -->
					<li><a href="<?php echo url::base() . "page/index/1" ?>"><?php echo Kohana::lang('ui_main.about'); ?></a></li>
					<li><a href="<?php echo url::base() . "page/index/7" ?>">Resources</a></li>
					<li><a href="<?php echo url::base() . "contact" ?>"><?php echo Kohana::lang('ui_main.contact'); ?></a></li>
					<li><a href="http://labucketbrigade.wordpress.com/"><?php echo Kohana::lang('ui_main.blog'); ?></a></li>
                                        <li><a href="http://drlatulane.org/">Tulane University DRLA</a>
					<li><a href="http://radicaldesigns.org" style="text-decoration: none;"><span style="font-size: 12px; color: #ffffff; font-family: sans-serif;">radical</span><span style="color: #E76432;font-size:10px;  font-family: sans-serif;font-weight: bold;">DESIGNS</span></a>
                                        </li>
				</ul>
				<p><?php echo Kohana::lang('ui_main.copyright'); ?></p>
			</div>
			<!-- / footer menu -->

      
			<h2 class="feedback_title" style="clear:both">
				<a href="http://feedback.ushahidi.com/fillsurvey.php?sid=5"><?php echo Kohana::lang('ui_main.feedback'); ?></a>
			</h2>

 </table></table>
		</div>
		<!-- / footer content -->
 
	</div>
	<!-- / footer -->
 
	<img src="<?php echo $tracker_url; ?>" />
	<?php echo $ushahidi_stats; ?>
	<?php echo $google_analytics; ?>
	
	<!-- Task Scheduler -->
	<img src="<?php echo url::base() . 'scheduler'; ?>" height="1" width="1" border="0" />
 
        <!-- script for share button -->
        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pub=ushahidi"></script>
</body>
</html>
