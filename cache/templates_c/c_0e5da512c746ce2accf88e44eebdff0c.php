<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-09 04:50:45 PDT */  if ($this->_vars['pagename'] == "groups"): ?>
<div class="groupexplain">
	<?php echo $this->_confs['PLIGG_Visual_Group_Explain']; ?>

	<?php if ($this->_vars['group_allow'] == "1"): ?>
		<br /><br />
		<h2><a href="<?php echo $this->_vars['URL_submit_groups']; ?>
"><span><?php echo $this->_confs['PLIGG_Visual_Submit_A_New_Group']; ?>
</span></a></h2>
	<?php endif; ?>
</div>
<?php endif; ?>

<?php echo $this->_vars['group_display']; ?>

<div style="clear:both;"></div>
<?php echo $this->_vars['group_pagination']; ?>
