<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-10 11:23:25 PDT */  echo $this->_vars['page_content']; ?>


<?php if (isset ( $this->_vars['isgod'] ) && $this->_vars['isgod'] == 1): ?>
	<div class="edit">
		<a href="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/admin/edit_page.php?link_id=<?php echo $this->_vars['link_id']; ?>
" style="text-decoration:none;" ><div class="edit-image"><img src="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/icon_user_edit.png" alt="Click to" /></div> &nbsp; <?php echo $this->_confs['PLIGG_Visual_AdminPanel_Page_Edit']; ?>
</a>
	</div>
<?php endif; ?>