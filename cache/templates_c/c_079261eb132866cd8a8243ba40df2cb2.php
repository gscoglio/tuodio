<?php require_once('/home/gscoglio/tuodio.com.ar/plugins/modifier.sanitize.php'); $this->register_modifier("sanitize", "tpl_modifier_sanitize");  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-23 23:49:13 PDT */ ?>
<fieldset><legend><img src="<?php echo $this->_vars['my_pligg_base']; ?>
/templates/admin/images/user_comments.gif" align="absmiddle" /> <?php echo $this->_confs['PLIGG_Visual_AdminPanel_Comments_Legend']; ?>
</legend>

<form action="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_comments.php" method="get">
	<select name="filter">
		<option value="all" <?php if (isset ( $_GET['filter'] ) && $_GET['filter'] == "all"): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Visual_Comments_Filter_All']; ?>
</option>
                <option value="published" <?php if (isset ( $_GET['filter'] ) && $_GET['filter'] == "published"): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Published']; ?>
</option>
                <option value="moderated" <?php if (isset ( $_GET['filter'] ) && $_GET['filter'] == "moderated"): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Moderated']; ?>
</option>
                <option value="discard" <?php if (isset ( $_GET['filter'] ) && $_GET['filter'] == "discard"): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Discarded']; ?>
</option>
		<option disabled>   ---   </option>
		<option value="today" <?php if (isset ( $_GET['filter'] ) && $_GET['filter'] == "today"): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Visual_Comments_Filter_Today']; ?>
</option>
		<option value="yesterday" <?php if (isset ( $_GET['filter'] ) && $_GET['filter'] == "yesterday"): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Visual_Comments_Filter_Yesterday']; ?>
</option>
		<option value="week" <?php if (isset ( $_GET['filter'] ) && $_GET['filter'] == "week"): ?>selected<?php endif; ?>><?php echo $this->_confs['PLIGG_Visual_Comments_Filter_This_Week']; ?>
</option>
	</select>
	<input type="submit" value="<?php echo $this->_confs['PLIGG_Visual_Comments_Filter']; ?>
" class="log2">
</form>

<form action="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_comments.php" method="get">
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
" class="log2">
</form>

<form action="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_comments.php" method="get">
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

<form name="bulk_moderate" action="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_comments.php?action=bulkmod" method="post">
<?php echo $this->_vars['hidden_token_admin_comments_edit']; ?>

<table class="stripes">
	<tr><th><?php echo $this->_confs['PLIGG_Visual_View_Links_Status']; ?>
</th><th><?php echo $this->_confs['PLIGG_Visual_View_Links_Author']; ?>
</th><th><?php echo $this->_confs['PLIGG_MiscWords_Comment']; ?>
</th><th><?php echo $this->_confs['PLIGG_Visual_User_NewsSent']; ?>
</th><th><center><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Publish']; ?>
</center></th><th><center><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Moderated']; ?>
</center></th><th><center><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Discard']; ?>
</center></th><th><center><?php echo $this->_confs['PLIGG_Visual_View_Category_Delete']; ?>
</center></th></tr>
	<?php if (isset ( $this->_vars['template_comments'] )): ?>
		<?php if (isset($this->_sections['id'])) unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($this->_vars['template_comments']) ? count($this->_vars['template_comments']) : max(0, (int)$this->_vars['template_comments']);
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
			<td width="80px"><?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_status']; ?>
</td>
			<td><a href="<?php echo $this->_vars['my_pligg_base']; ?>
/admin/admin_users.php?mode=viewcomments&user=<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_author']; ?>
" title="<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_author']; ?>
's Profile"><?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_author']; ?>
</a></td>
			<td><a href = "<?php echo $this->_vars['my_pligg_base']; ?>
/story.php?id=<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_link_id']; ?>
#c<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_id']; ?>
" rel="width:800,height:700" class="mb" title="<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_content_long']; ?>
"><?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_content']; ?>
</a></td>
			<td width="100px"><?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_date']; ?>
 <?php echo $this->_confs['PLIGG_Visual_Comment_Ago']; ?>
</td>
			<td width="60px"><center><input type="radio" name="comment[<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_id']; ?>
]" id="comment-<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_id']; ?>
" value="published"></center></td>
			<td width="60px"><center><input type="radio" name="comment[<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_id']; ?>
]" id="comment-<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_id']; ?>
" value="moderated"></center></td>
			<td width="60px"><center><input type="radio" name="comment[<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_id']; ?>
]" id="comment-<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_id']; ?>
" value="discard"></center></td>
			<td width="50px"><center><input type="checkbox" name="comment[<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_id']; ?>
]" id="comment-<?php echo $this->_vars['template_comments'][$this->_sections['id']['index']]['comment_id']; ?>
" value="delete"></center></td>
		</tr>
		<?php endfor; endif; ?>
	<?php endif; ?>		
</table>
<hr />
<p align="center"><a href="javascript:mark_all_publish()"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Mark_Published']; ?>
</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:mark_all_queued()"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Mark_Moderated']; ?>
</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:mark_all_discard()"><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Mark_Discarded']; ?>
</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:mark_all_delete()"><?php echo $this->_confs['PLIGG_Visual_Comments_Mark_All']; ?>
</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:uncheck_all()"><?php echo $this->_confs['PLIGG_Visual_Comments_UnCheck_All']; ?>
</a></p>
<p align="center"><a href="admin_delete_comments.php" rel="width:250,height:150" class="mb" title="<?php echo $this->_confs['PLIGG_Visual_AdminPanel_Delete_Comments']; ?>
" ><?php echo $this->_confs['PLIGG_Visual_AdminPanel_Delete_Comments']; ?>
</a></p>
<p align="center"><input type="submit" name="submit" value="<?php echo $this->_confs['PLIGG_Visual_Change_Link_Status']; ?>
" class="log2" /></p>
</form>



</fieldset>

<?php echo '
<SCRIPT>
function mark_all_publish() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
		if (document.bulk_moderate[i].value == "published") {
			document.bulk_moderate[i].checked = true;
		}
	}
}
function mark_all_discard() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
		if (document.bulk_moderate[i].value == "discard") {
			document.bulk_moderate[i].checked = true;
		}
	}
}
function mark_all_queued() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
		if (document.bulk_moderate[i].value == "moderated") {
			document.bulk_moderate[i].checked = true;
		}
	}
}
function mark_all_delete() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
		if (document.bulk_moderate[i].value == "delete") {
			document.bulk_moderate[i].checked = true;
		}
	}
}
function uncheck_all() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
			document.bulk_moderate[i].checked = false;
	}
}
</SCRIPT>
'; ?>
