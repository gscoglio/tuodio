<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-27 16:41:19 PDT */  echo '
<script type="text/javascript">
function SetState(obj_checkbox, obj_textarea) {
	if(obj_checkbox.checked)
		{ obj_textarea.disabled = false;
	}
	else {
		obj_textarea.disabled = true;
	}
}
function textCounter(field, countfield, maxlimit) {
	if (field.value.length > maxlimit) // if too long...trim it!
			field.value = field.value.substring(0, maxlimit);
			// otherwise, update \'characters left\' counter
	else
			countfield.value = maxlimit - field.value.length;
}
function counter(text) {
	text.form.text_num.value = text.value.length;
}
</script>
'; ?>


<div class="linetop"><br /></div>
<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_submit_step2_start"), $this);?>
<form action="" method="post" id="thisform" enctype="multipart/form-data" >
	<input type="hidden" name="id" value="<?php echo $this->_vars['submit_id']; ?>
" />
	<?php echo $this->_vars['hidden_token_edit_link']; ?>


	<fieldset><legend><?php echo $this->_confs['PLIGG_Visual_Submit2_Source']; ?>
</legend>
		<label><?php echo $this->_confs['PLIGG_Visual_Submit2_NewsURL']; ?>
: </label>
		<a href="<?php echo $this->_vars['submit_url']; ?>
"><?php echo $this->_vars['submit_url']; ?>
</a><br/>
		<?php if ($this->_vars['isAdmin'] == 1): ?><input type="text" name="url" size="60" value ="<?php echo $this->_vars['submit_url']; ?>
"><br /><?php endif; ?><br />
		<label for="url_title" accesskey="2"><?php echo $this->_confs['PLIGG_Visual_Submit2_URLTitle']; ?>
: </label><?php echo $this->_vars['submit_url_title']; ?>

	</fieldset>		

	<fieldset><legend><?php echo $this->_confs['PLIGG_Visual_Submit2_Details']; ?>
</legend>
		<label><?php echo $this->_confs['PLIGG_Visual_Submit2_Title']; ?>
: </label>
		<span><?php echo $this->_confs['PLIGG_Visual_Submit2_TitleInstruct']; ?>
</span><br/>
		<input type="text" id="title" name="title" value="<?php echo $this->_vars['submit_title']; ?>
" size="60" maxlength="<?php echo $this->_vars['maxTitleLength']; ?>
" />
		
		<br/><br/>
		
		<?php if ($this->_vars['enable_tags']): ?>
			<label><?php echo $this->_confs['PLIGG_Visual_Submit2_Tags']; ?>
: </label>
			<span><strong><?php echo $this->_confs['PLIGG_Visual_Submit2_Tags_Inst1']; ?>
</strong> <?php echo $this->_confs['PLIGG_Visual_Submit2_Tags_Example']; ?>
 <em><?php echo $this->_confs['PLIGG_Visual_Submit2_Tags_Inst2']; ?>
</em></span><br/>
			<input type="text" id="tags" name="tags" value="<?php echo $this->_vars['tags_words']; ?>
" size="60" maxlength="<?php echo $this->_vars['maxTagsLength']; ?>
" />
		<?php endif; ?>
		
		<br/><br/>
		
		<label><?php echo $this->_confs['PLIGG_Visual_Submit2_Description']; ?>
</label><span><?php echo $this->_confs['PLIGG_Visual_Submit2_DescInstruct']; ?>
</span>
			<?php if ($this->_vars['Story_Content_Tags_To_Allow'] == ""): ?>
				<br /><b><?php echo $this->_confs['PLIGG_Visual_Submit2_No_HTMLTagsAllowed']; ?>
</b> <?php echo $this->_confs['PLIGG_Visual_Submit2_HTMLTagsAllowed']; ?>

			<?php else: ?>
				<br /><?php echo $this->_confs['PLIGG_Visual_Submit2_HTMLTagsAllowed']; ?>
: <?php echo $this->_vars['Story_Content_Tags_To_Allow']; ?>

			<?php endif; ?>
		<br/><textarea name="bodytext" rows="10" cols="60" id="bodytext" WRAP="SOFT" onKeyPress="counter(this)" onKeyDown="counter(this)" <?php if ($this->_vars['SubmitSummary_Allow_Edit'] == 1): ?>onkeyup="counter(this); if(!this.form.summarycheckbox || !this.form.summarytext) return; if(this.form.summarycheckbox.checked == false) {this.form.summarytext.value = this.form.bodytext.value.substring(0, <?php echo $this->_vars['StorySummary_ContentTruncate']; ?>
);}textCounter(this.form.summarytext,this.form.remLen, <?php echo $this->_vars['StorySummary_ContentTruncate']; ?>
);"<?php else: ?>onkeyup="counter(this);"<?php endif; ?>><?php echo $this->_vars['submit_content']; ?>
</textarea><br />
		<input size=2 value='<?php echo $this->_vars['storylen']; ?>
' name=text_num disabled> <?php echo $this->_confs['PLIGG_Visual_Total_Chars']; ?>
<br>
		<?php if ($this->_vars['Spell_Checker'] == 1): ?><input type="button" name="spelling" value="<?php echo $this->_confs['PLIGG_Visual_Check_Spelling']; ?>
" class="log2" onClick="openSpellChecker('bodytext');"/><?php endif; ?> 
		
		<br/><br/>
		
		<?php if ($this->_vars['SubmitSummary_Allow_Edit'] == 1): ?>  
		<label><?php echo $this->_confs['PLIGG_Visual_Submit2_Summary']; ?>
: </label>
		<span><?php echo $this->_confs['PLIGG_Visual_Submit2_SummaryInstruct'];  echo $this->_confs['PLIGG_Visual_Submit2_SummaryLimit'];  echo $this->_vars['StorySummary_ContentTruncate'];  echo $this->_confs['PLIGG_Visual_Submit2_SummaryLimitCharacters']; ?>
</span><br/>
		<input type="checkbox" name="summarycheckbox" id="summarycheckbox" onclick="SetState(this, this.form.summarytext)" checked> <?php echo $this->_confs['PLIGG_Visual_Submit2_SummaryCheckBox']; ?>

			<?php if ($this->_vars['Story_Content_Tags_To_Allow'] == ""): ?>
				<br /><b><?php echo $this->_confs['PLIGG_Visual_Submit2_No_HTMLTagsAllowed']; ?>
</b> <?php echo $this->_confs['PLIGG_Visual_Submit2_HTMLTagsAllowed']; ?>

			<?php else: ?>
				<br /><?php echo $this->_confs['PLIGG_Visual_Submit2_HTMLTagsAllowed']; ?>
: <?php echo $this->_vars['Story_Content_Tags_To_Allow']; ?>

			<?php endif; ?>
		<br/><textarea name="summarytext"  rows="5" cols="60	" id="summarytext" WRAP="SOFT" onKeyDown="textCounter(this.form.summarytext,this.form.remLen, <?php echo $this->_vars['StorySummary_ContentTruncate']; ?>
);"><?php echo $this->_vars['submit_summary']; ?>
</textarea><br />
		<input readonly type=text name=remLen size="3" maxlength="3" value="<?php echo $this->_vars['StorySummary_ContentTruncate']; ?>
"><?php echo $this->_confs['PLIGG_Visual_Submit2_SummaryCharactersLeft']; ?>

		<?php if ($this->_vars['Spell_Checker'] == 1): ?><input type="button" name="spelling" value="<?php echo $this->_confs['PLIGG_Visual_Check_Spelling']; ?>
" class="submit" onClick="openSpellChecker('summarytext');"/><?php endif; ?>
		
		<br /><br />
		<?php endif; ?>
		
		<label><?php echo $this->_confs['PLIGG_Visual_Submit2_Category']; ?>
: </label><span><?php echo $this->_confs['PLIGG_Visual_Submit2_CatInstruct']; ?>
</span><br/>
		<select name="category">
			<?php if (isset($this->_sections['thecat'])) unset($this->_sections['thecat']);
$this->_sections['thecat']['name'] = 'thecat';
$this->_sections['thecat']['loop'] = is_array($this->_vars['cat_array']) ? count($this->_vars['cat_array']) : max(0, (int)$this->_vars['cat_array']);
$this->_sections['thecat']['show'] = true;
$this->_sections['thecat']['max'] = $this->_sections['thecat']['loop'];
$this->_sections['thecat']['step'] = 1;
$this->_sections['thecat']['start'] = $this->_sections['thecat']['step'] > 0 ? 0 : $this->_sections['thecat']['loop']-1;
if ($this->_sections['thecat']['show']) {
	$this->_sections['thecat']['total'] = $this->_sections['thecat']['loop'];
	if ($this->_sections['thecat']['total'] == 0)
		$this->_sections['thecat']['show'] = false;
} else
	$this->_sections['thecat']['total'] = 0;
if ($this->_sections['thecat']['show']):

		for ($this->_sections['thecat']['index'] = $this->_sections['thecat']['start'], $this->_sections['thecat']['iteration'] = 1;
			 $this->_sections['thecat']['iteration'] <= $this->_sections['thecat']['total'];
			 $this->_sections['thecat']['index'] += $this->_sections['thecat']['step'], $this->_sections['thecat']['iteration']++):
$this->_sections['thecat']['rownum'] = $this->_sections['thecat']['iteration'];
$this->_sections['thecat']['index_prev'] = $this->_sections['thecat']['index'] - $this->_sections['thecat']['step'];
$this->_sections['thecat']['index_next'] = $this->_sections['thecat']['index'] + $this->_sections['thecat']['step'];
$this->_sections['thecat']['first']	  = ($this->_sections['thecat']['iteration'] == 1);
$this->_sections['thecat']['last']	   = ($this->_sections['thecat']['iteration'] == $this->_sections['thecat']['total']);
?>
				<option value = "<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id']; ?>
"<?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['auto_id'] == $this->_vars['submit_category']): ?> selected="selected"<?php endif; ?>>
				<?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['spacercount'] < $this->_vars['lastspacer']):  echo $this->_run_modifier($this->_vars['cat_array'][$this->_sections['thecat']['index']]['spacerdiff'], 'repeat_count', 'plugin', 1, '');  endif; ?>
				<?php if ($this->_vars['cat_array'][$this->_sections['thecat']['index']]['spacercount'] > $this->_vars['lastspacer']):  endif; ?>
				<?php echo $this->_run_modifier($this->_vars['cat_array'][$this->_sections['thecat']['index']]['spacercount'], 'repeat_count', 'plugin', 1, '&nbsp;&nbsp;&nbsp;'); ?>

				<?php echo $this->_vars['cat_array'][$this->_sections['thecat']['index']]['name']; ?>
 
				&nbsp;&nbsp;&nbsp;       
				<?php $this->assign('lastspacer', $this->_vars['cat_array'][$this->_sections['thecat']['index']]['spacercount']); ?>					
				</option>
			<?php endfor; endif; ?>
		</select>
		
		<br/><br/>
		
		<?php if ($this->_vars['canIhaveAccess'] == 1): ?>
			<label><?php echo $this->_confs['PLIGG_Visual_EditStory_Notify']; ?>
: </label>
			<input type="checkbox" name="notify" value="yes"><?php echo $this->_confs['PLIGG_Visual_EditStory_NotifyText']; ?>
<br/>
			&nbsp;&nbsp;<input type="radio" name="reason" value="typo" onclick="notify.checked = 'true';"><?php echo $this->_confs['PLIGG_Visual_EditStory_Reason_typo']; ?>
<br/>
			&nbsp;&nbsp;<input type="radio" name="reason" value="category" onclick="notify.checked = 'true';"><?php echo $this->_confs['PLIGG_Visual_EditStory_Reason_category']; ?>
<br/>
			&nbsp;&nbsp;<input type="radio" name="reason" value="tags" onclick="notify.checked = 'true';"><?php echo $this->_confs['PLIGG_Visual_EditStory_Reason_tags']; ?>
<br/>
			&nbsp;&nbsp;<input type="radio" name="reason" value="foul" onclick="notify.checked = 'true';"><?php echo $this->_confs['PLIGG_Visual_EditStory_Reason_foul']; ?>
<br/>
			&nbsp;&nbsp;<input type="radio" name="reason" value="other" onclick="notify.checked = 'true';"><?php echo $this->_confs['PLIGG_Visual_EditStory_Reason_other']; ?>
 <input type="text" name="otherreason" size="50"><br/><br/>
		<?php endif; ?>
		
		<?php echo tpl_function_checkActionsTpl(array('location' => "submit_step_2_pre_extrafields"), $this);?>

		<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include($this->_vars['tpl_extra_fields'].".tpl", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
		
		<br />
		
		<input type="submit" value="<?php echo $this->_confs['PLIGG_Visual_Submit2_Continue']; ?>
" class="log2"/>
		
	</fieldset>
</form>
