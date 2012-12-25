<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-03 19:37:15 GMT+3 */ ?>
<br clear="all" />
<!-- START FOOTER -->
		<div id="footer">
		
			<?php echo '<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
			try {
			var pageTracker = _gat._getTracker("UA-13059556-1");
			pageTracker._trackPageview();
			} catch(err) {}</script>'; ?>

				
			<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_footer_start"), $this);?>
        	<span class="subtext">Copyright 2009 <?php echo $this->_confs['PLIGG_Visual_Name']; ?>
 | Pligg <a href="http://www.pligg.com/">Content Management System</a> | <a href="<?php echo $this->_vars['URL_advancedsearch']; ?>
"><?php echo $this->_confs['PLIGG_Visual_Search_Advanced']; ?>
</a> | <a href="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/rssfeeds.php"><?php echo $this->_confs['PLIGG_Visual_RSS_Feeds']; ?>
</a> <?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_footer_end"), $this);?></span>
        </div>
<!-- END FOOTER --> 
