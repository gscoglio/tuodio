<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-06 06:41:53 PDT */  echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_story_comments_submit_start"), $this);?>
<h3><a name="discuss"><?php echo $this->_confs['PLIGG_Visual_Comment_Send']; ?>
</a></h3>	
	<label><?php echo $this->_confs['PLIGG_Visual_Comment_NoHTML']; ?>
</label><br />
	<textarea name="comment_content" id="comment_content" class="comment-form" rows="6" cols="96"/><?php if (isset ( $this->_vars['TheComment'] )):  echo $this->_vars['TheComment'];  endif; ?></textarea><br />
	<?php if ($this->_vars['Spell_Checker'] == 1): ?><input type="button" name="spelling" value="<?php echo $this->_confs['PLIGG_Visual_Check_Spelling']; ?>
" class="log2" onClick="openSpellChecker('comment_content');"/><?php endif; ?>
	<?php if (isset ( $this->_vars['register_step_1_extra'] )): ?>
		<br />
		<?php echo $this->_vars['register_step_1_extra']; ?>

	<?php endif; ?>
	<input type="submit" name="submit" value="<?php echo $this->_confs['PLIGG_Visual_Comment_Submit']; ?>
" class="log2" />
	<?php echo $this->_vars['register_step_1_extra']; ?>

	<?php if (isset ( $this->_vars['register_step_1_extra'] )): ?>
		<br />
		<?php echo $this->_vars['register_step_1_extra']; ?>

	<?php endif;  echo tpl_function_checkActionsTpl(array('location' => "tpl_pligg_story_comments_submit_end"), $this);?>
<br />
