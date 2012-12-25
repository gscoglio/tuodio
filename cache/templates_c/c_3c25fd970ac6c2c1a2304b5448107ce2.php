<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-08-01 06:20:33 PDT */ ?>
<fieldset><legend><?php echo $this->_confs['PLIGG_Visual_Change_Link_Status']; ?>
</legend>
<b><?php echo $this->_confs['PLIGG_Visual_Change_Link_Title']; ?>
:</b> <?php echo $this->_vars['link_title']; ?>
 <br /><br />
<b><?php echo $this->_confs['PLIGG_Visual_Change_Link_URL']; ?>
:</b> <?php echo $this->_vars['link_url']; ?>
 <a href = "<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/admin/manage_banned_domains.php?id=<?php echo $this->_vars['link_id']; ?>
&add=<?php echo $this->_vars['banned_domain_url']; ?>
"><?php echo $this->_confs['PLIGG_Visual_Ban_This_URL']; ?>
</a><br /><br />
<b><?php echo $this->_confs['PLIGG_Visual_Change_Link_Content']; ?>
:</b> <?php echo $this->_vars['link_content']; ?>
<br /><br />
<b><?php echo $this->_confs['PLIGG_Visual_Change_Link_Status2']; ?>
:</b> <?php echo $this->_vars['link_status']; ?>
<br /><br />
<b><?php echo $this->_confs['PLIGG_Visual_Change_Link_Submitted_By']; ?>
:</b> <?php echo $this->_vars['user_login']; ?>
 <a href ="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/admin/admin_users.php?mode=disable&user=<?php echo $this->_vars['user_login']; ?>
"><?php echo $this->_confs['PLIGG_Visual_Disable_This_USer']; ?>
</a><br /><br />
<hr />
Are you sure you want to set the status to <?php echo $this->_vars['action']; ?>
?<br /><br />
<a href = "<?php echo $this->_vars['admin_modify_url']; ?>
">No</a><br /><br />
<a href = "<?php echo $this->_vars['admin_modify_do_url']; ?>
">Yes</a>