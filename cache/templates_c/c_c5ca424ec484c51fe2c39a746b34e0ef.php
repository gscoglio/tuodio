<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-17 14:51:08 PDT */  $this->config_load(admin_snippet_lang_conf, null, null); ?>

<?php echo '
	<style type="text/css">
		td {line-height:18px;}
		.eip_editable { background-color: #ff9; padding: 3px; }
		.eip_savebutton { background-color: #36f; color: #fff; }
		.eip_cancelbutton { background-color: #000; color: #fff; }
		.eip_saving { background-color: #903; color: #fff; padding: 3px; }
		.eip_empty { color: #afafaf; }	
		.emptytext {padding:0px 6px 0px 6px;border-top:2px solid #828177;border-left:2px solid #828177;border-bottom:1px solid #B0B0B0;border-right:1px solid #B0B0B0;background:#F5F5F5;}
	</style>
'; ?>


<fieldset><legend><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/page.gif" align="absmiddle" /> <?php echo $this->_confs['PLIGG_Admin_Snippet']; ?>
</legend>
<p><?php echo $this->_confs['PLIGG_Admin_Snippet_Instructions_1']; ?>
</p>
<br />

<form name="snippet" method="post">
<table cellpadding="1" cellspacing="2" border="0">
	<tr><th width='40%'><?php echo $this->_confs['PLIGG_Admin_Snippet_Name']; ?>
</th>
	<th width='30%'><?php echo $this->_confs['PLIGG_Admin_Snippet_Location']; ?>
</th>
	<th width='15%'><?php echo $this->_confs['PLIGG_Admin_Snippet_Updated']; ?>
</th>
	<th><?php echo $this->_confs['PLIGG_Admin_Snippet_Order']; ?>
</th>
	<th><b><?php echo $this->_confs['PLIGG_Admin_Snippet_Delete']; ?>
</b></th>
	</tr>
	<?php if (isset($this->_sections['id'])) unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($this->_vars['template_snippets']) ? count($this->_vars['template_snippets']) : max(0, (int)$this->_vars['template_snippets']);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
	$this->_sections['id']['total'] = $this->_sections['id']['loop'];
	if ($this->_sections['id']['total'] == 0)
		$this->_sections['id']['show'] = false;
} else
	$this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

		for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
			 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
			 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']	  = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']	   = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
	<tr>
		<td><a href="?module=admin_snippet&mode=edit&id=<?php echo $this->_vars['template_snippets'][$this->_sections['id']['index']]['snippet_id']; ?>
"><?php echo $this->_vars['template_snippets'][$this->_sections['id']['index']]['snippet_name']; ?>
</a></td>
		<td><?php echo $this->_vars['template_snippets'][$this->_sections['id']['index']]['snippet_location']; ?>
</td>
		<td><?php echo $this->_vars['template_snippets'][$this->_sections['id']['index']]['snippet_updated']; ?>
</td>
		<td><center><input type="text" name="snippet_order[<?php echo $this->_vars['template_snippets'][$this->_sections['id']['index']]['snippet_id']; ?>
]" id="order-<?php echo $this->_vars['template_snippets'][$this->_sections['id']['index']]['snippet_id']; ?>
" value="<?php echo $this->_vars['template_snippets'][$this->_sections['id']['index']]['snippet_order']; ?>
" size="3"></center></td>
		<td><center><input type="checkbox" name="snippet_delete[<?php echo $this->_vars['template_snippets'][$this->_sections['id']['index']]['snippet_id']; ?>
]" id="delete-<?php echo $this->_vars['template_snippets'][$this->_sections['id']['index']]['snippet_id']; ?>
" value="1"></center></td>
	</tr>	
	<?php endfor; endif; ?>		
</table>
<br>
<hr/>
<p align="right"><a href="javascript:check_all()"><?php echo $this->_confs['PLIGG_Admin_Snippet_Check_All']; ?>
</a>&nbsp;&nbsp;&nbsp;<a href="javascript:uncheck_all()"><?php echo $this->_confs['PLIGG_Admin_Snippet_Uncheck_All']; ?>
</a></p><br />
<p align="right"><input type="submit" value="<?php echo $this->_confs['PLIGG_Admin_Snippet_Add_New']; ?>
" onclick="document.location='?module=admin_snippet&mode=new'; return false;" class="log2" /> <input type="submit" name="update" value="<?php echo $this->_confs['PLIGG_Admin_Snippet_Update']; ?>
" class="log2" /> <input type="submit" name="delete" value="<?php echo $this->_confs['PLIGG_Admin_Snippet_Delete_Selected']; ?>
" class="log2" /></p>
</form>

<?php echo '
<SCRIPT>
function check_all() {
	for (var i=0; i< document.snippet.length; i++) {
		if (document.snippet[i].type == "checkbox") {
			document.snippet[i].checked = true;
		}
	}
}
function uncheck_all() {
	for (var i=0; i< document.snippet.length; i++) {
		if (document.snippet[i].type == "checkbox") {
			document.snippet[i].checked = false;
		}
	}
}
</SCRIPT>
'; ?>


<?php $this->config_load(admin_snippet_pligg_lang_conf, null, null); ?>