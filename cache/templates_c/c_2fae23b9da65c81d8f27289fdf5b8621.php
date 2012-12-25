<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2012-12-25 16:59:05 ART */  $this->config_load(sidebar_stats_lang_conf, null, null); ?>
<div class="sidebar_stats">
	<div class="headline">
		<div class="sectiontitle"><?php echo $this->_confs['Sidebar_Stats_Statistics']; ?>
</div>
	</div>
	<div style="padding:10px 12px;" class="sidebar_stats_content">
		<strong><?php echo $this->_confs['Sidebar_Stats_Newest_Member']; ?>
:</strong>  <a href="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/user.php?login=<?php echo $this->_vars['last_user']; ?>
"><?php echo $this->_vars['last_user']; ?>
</a> <br />
		<strong><?php echo $this->_confs['Sidebar_Stats_Members']; ?>
:</strong> <?php echo $this->_vars['members']; ?>
<br />		
		<strong><?php echo $this->_confs['Sidebar_Stats_Votes']; ?>
:</strong> <?php echo $this->_vars['votes']; ?>
<br />
		<strong><?php echo $this->_confs['Sidebar_Stats_Stories']; ?>
:</strong> <?php echo $this->_vars['stories']; ?>
<br />
		<strong><?php echo $this->_confs['Sidebar_Stats_Comments']; ?>
:</strong> <?php echo $this->_vars['comments']; ?>
<br />
		<strong><?php echo $this->_confs['Sidebar_Stats_Groups']; ?>
:</strong> <?php echo $this->_vars['groups']; ?>
<br />
		
		 
		
		
	</div>
</div>
<?php $this->config_load(sidebar_stats_pligg_lang_conf, null, null); ?>