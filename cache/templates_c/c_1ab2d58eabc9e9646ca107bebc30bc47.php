<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-17 14:51:22 PDT */  $this->config_load(admin_snippet_lang_conf, null, null); ?>

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




<fieldset><legend><?php echo $this->_confs['PLIGG_Admin_Snippet_Add_New']; ?>
</legend>	
	<form action="" method="POST" id="thisform">
	<?php echo $this->_confs['PLIGG_Admin_Snippet_Instructions_2']; ?>

	<br />
		<table border="0">
		<tr>
		<td width="50"><label><strong><?php echo $this->_confs['PLIGG_Admin_Snippet_Name']; ?>
: </strong></label></td><td><input type="text" name="snippet_name" id="snippet_name" size="66" value="<?php echo $this->_vars['snippet']['snippet_name']; ?>
" style="width: 420px;"/></td>
		</tr>
		<tr>
		<td><label><strong><?php echo $this->_confs['PLIGG_Admin_Snippet_Location']; ?>
: </strong></label></td><td><select name="snippet_location" style="width: 420px;">
			<?php if (count((array)$this->_vars['admin_snippet_locations'])): foreach ((array)$this->_vars['admin_snippet_locations'] as $this->_vars['location']): ?>
				<option value='<?php echo $this->_vars['location']['0']; ?>
' <?php if ($this->_vars['snippet']['snippet_location'] == $this->_vars['location']['0']): ?>selected<?php endif; ?>><?php echo $this->_vars['location']['0']; ?>
 - <?php echo $this->_vars['location']['1']; ?>
</option>
			<?php endforeach; endif; ?>
			</select></td>
		</tr>
		<?php if ($this->_vars['snippet']['snippet_updated']): ?>
		<tr>
		<td width="50"><label><strong><?php echo $this->_confs['PLIGG_Admin_Snippet_Updated']; ?>
: </strong></label></td><td><input type="text" id="snippet_updated" size="66" value="<?php echo $this->_vars['snippet']['snippet_updated']; ?>
" style="width: 420px;" disabled readonly/></td>
		</tr>
		<?php endif; ?>
		<tr>
		<td colspan="2">
		<label><strong><?php echo $this->_confs['PLIGG_Admin_Snippet_Content']; ?>
</strong></label>
		<br />
		<div class="width100">
			<textarea !class="mooeditable" id="textarea-1" name="snippet_content" !name="editable1" rows="30" style="width: 100%;"><?php echo $this->_vars['snippet']['snippet_content']; ?>
</textarea>
		</div>
		<div class="submitbuttonfloat">
		<br />
			<input type="submit" name="submit" value="<?php echo $this->_confs['PLIGG_Admin_Snippet_Submit']; ?>
" class="log2" />
		</div>
		<input type="hidden" name="snippet_id" value="<?php echo $this->_vars['snippet']['snippet_id']; ?>
" />
		</td></tr>
		</table>
	</form>
</fieldset>

<?php $this->config_load(admin_snippet_pligg_lang_conf, null, null); ?>