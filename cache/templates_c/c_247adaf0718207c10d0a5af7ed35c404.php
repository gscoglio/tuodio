<?php require_once('/home/gscoglio/tuodio.com.ar/plugins/modifier.sanitize.php'); $this->register_modifier("sanitize", "tpl_modifier_sanitize");  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-23 23:49:22 PDT */ ?>
<fieldset><legend><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/manage_user.gif" align="absmiddle" /> <?php echo $this->_confs['PLIGG_Visual_AdminPanel_User_Manage']; ?>
</legend>

<form action="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/admin/admin_users.php" method="get">
<input type="hidden" name="mode" value="search">
	<?php if (isset ( $_GET['keyword'] )): ?>
			<?php $this->assign('searchboxtext', $this->_run_modifier($_GET['keyword'], 'sanitize', 'plugin', 1, 2)); ?>
	<?php else: ?>
			<?php $this->assign('searchboxtext', $this->_confs['PLIGG_Visual_Search_SearchDefaultText']); ?>			
	<?php endif; ?>
<input type="text" name="keyword" value="<?php echo $this->_vars['searchboxtext']; ?>
" onfocus="if(this.value == '<?php echo $this->_vars['searchboxtext']; ?>
') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $this->_vars['searchboxtext']; ?>
';}">
<input type="submit" value="<?php echo $this->_confs['PLIGG_Visual_Search_Go']; ?>
">

&nbsp;&nbsp;

  <a href="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_users.php?mode=create" title="Create User" id="create"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_New_User']; ?>
</a>
  <div class="multiBoxDesc create"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_New_User_Desc']; ?>
</div>
  
</form>
<form action="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_users.php" method="get">
	<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Pagination_Items']; ?>

	<select name="pagesize">
		<option <?php if (isset ( $this->_vars['pagesize'] ) && $this->_vars['pagesize'] == 15): ?>selected<?php endif; ?>>15</option>
		<option <?php if (isset ( $this->_vars['pagesize'] ) && $this->_vars['pagesize'] == 30): ?>selected<?php endif; ?>>30</option>
		<option <?php if (isset ( $this->_vars['pagesize'] ) && $this->_vars['pagesize'] == 50): ?>selected<?php endif; ?>>50</option>
		<option <?php if (isset ( $this->_vars['pagesize'] ) && $this->_vars['pagesize'] == 100): ?>selected<?php endif; ?>>100</option>
		<option <?php if (isset ( $this->_vars['pagesize'] ) && $this->_vars['pagesize'] == 150): ?>selected<?php endif; ?>>150</option>
		<option <?php if (isset ( $this->_vars['pagesize'] ) && $this->_vars['pagesize'] == 200): ?>selected<?php endif; ?>>200</option>
	</select>
	<input type="submit" value="Go" class="log2">
</form>



<?php if (isset ( $this->_vars['usererror'] )): ?> <span class="error"><?php echo $this->_vars['usererror']; ?>
</span><br/><br/><?php endif; ?>

<form action="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_users.php" method="post">
<?php echo $this->_vars['hidden_token_admin_users_list']; ?>

<table class="stripes">
<tr><th>&nbsp;</th><th><?php echo $this->_confs['PLIGG_Visual_Login_Username']; ?>
</th><th><?php echo $this->_confs['PLIGG_Visual_View_User_Level']; ?>
</th><th><?php echo $this->_confs['PLIGG_Visual_View_User_Email']; ?>
</th><th><?php echo $this->_confs['PLIGG_Visual_User_Profile_Joined']; ?>
</th><th><?php echo $this->_confs['PLIGG_Visual_User_Profile_Enabled']; ?>
</th><th><?php echo $this->_confs['PLIGG_Visual_User_Profile_Disabled']; ?>
</th><th><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Validate']; ?>
</th></tr>
	<?php if (isset($this->_sections['nr'])) unset($this->_sections['nr']);
$this->_sections['nr']['name'] = 'nr';
$this->_sections['nr']['loop'] = is_array($this->_vars['userlist']) ? count($this->_vars['userlist']) : max(0, (int)$this->_vars['userlist']);
$this->_sections['nr']['show'] = true;
$this->_sections['nr']['max'] = $this->_sections['nr']['loop'];
$this->_sections['nr']['step'] = 1;
$this->_sections['nr']['start'] = $this->_sections['nr']['step'] > 0 ? 0 : $this->_sections['nr']['loop']-1;
if ($this->_sections['nr']['show']) {
	$this->_sections['nr']['total'] = $this->_sections['nr']['loop'];
	if ($this->_sections['nr']['total'] == 0)
		$this->_sections['nr']['show'] = false;
} else
	$this->_sections['nr']['total'] = 0;
if ($this->_sections['nr']['show']):

		for ($this->_sections['nr']['index'] = $this->_sections['nr']['start'], $this->_sections['nr']['iteration'] = 1;
			 $this->_sections['nr']['iteration'] <= $this->_sections['nr']['total'];
			 $this->_sections['nr']['index'] += $this->_sections['nr']['step'], $this->_sections['nr']['iteration']++):
$this->_sections['nr']['rownum'] = $this->_sections['nr']['iteration'];
$this->_sections['nr']['index_prev'] = $this->_sections['nr']['index'] - $this->_sections['nr']['step'];
$this->_sections['nr']['index_next'] = $this->_sections['nr']['index'] + $this->_sections['nr']['step'];
$this->_sections['nr']['first']	  = ($this->_sections['nr']['iteration'] == 1);
$this->_sections['nr']['last']	   = ($this->_sections['nr']['iteration'] == $this->_sections['nr']['total']);
?>
	<tr>
	<td><input type='checkbox' name='delete[]' value='<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_id']; ?>
'></td>	
	<td><img src="<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['Avatar']; ?>
" align="absmiddle"/> <a href = "?mode=view&user=<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_login']; ?>
"><?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_login']; ?>
</a></td>	
	<td width="80px"><?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_level']; ?>
</td>
	<td><?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_email']; ?>
</td>
	<td width="140px"><?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_date']; ?>
</td>
	<td width="60px"><center><input type="radio" name="enabled[<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_id']; ?>
]" value="1" <?php if ($this->_vars['userlist'][$this->_sections['nr']['index']]['user_enabled']): ?>checked<?php endif; ?>></center></td>
	<td width="60px"><center><input type="radio" name="enabled[<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_id']; ?>
]" value="0" <?php if ($this->_vars['userlist'][$this->_sections['nr']['index']]['user_enabled'] == 0): ?>checked<?php endif; ?>></center></td>
	<td width="70px"><?php if ($this->_vars['userlist'][$this->_sections['nr']['index']]['user_lastlogin'] != "0000-00-00 00:00:00"):  echo $this->_confs['PLIGG_Visual_AdminPanel_Validated'];  else: ?><a href="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/admin/admin_user_validate.php?id=<?php echo $this->_vars['userlist'][$this->_sections['nr']['index']]['user_id']; ?>
" rel="width:280,height:150" class="mb" title="Validate Confirmation" style="text-decoration:none;"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Validate']; ?>
</a><?php endif; ?></td>
	</tr>
	<?php endfor; endif; ?>
</table>
<p>
	<input type='submit' name='killspam' value='<?php echo $this->_confs['PLIGG_Visual_KillSpam_Selected']; ?>
'>
	<input type="submit" name="submit" value="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Change_User_Status']; ?>
" class="log2" />
</p>
</form>

</fieldset>