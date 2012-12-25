<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2012-02-10 21:45:16 PST */ ?>
<div style="position:absolute;display:block;background:#fff;padding:10px;margin:10px 0 0 100px;font-size:12px;border:2px solid #000;">
<fieldset><legend><?php echo $this->_confs['PLIGG_Visual_Recommend_FormTitle']; ?>
</legend>
	<form name="email_to" method="get" action="<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/recommend.php">
		<?php echo $this->_confs['PLIGG_Visual_Recommend_EnterAddress']; ?>
<br>
		<?php echo $this->_vars['hidden_token_recommend']; ?>

		<input type="text" name="email_address_1" size="35" id="email_address_1_<?php echo $this->_vars['link_shakebox_index']; ?>
" value=""><br>
		<input type="text" name="email_address_2" size="35" id="email_address_2_<?php echo $this->_vars['link_shakebox_index']; ?>
" value=""><br>
		<input type="text" name="email_address_3" size="35" id="email_address_3_<?php echo $this->_vars['link_shakebox_index']; ?>
" value=""><br>
		<br /><?php echo $this->_confs['PLIGG_Visual_Recommend_Comment']; ?>
<br />
		<textarea name="email_message<?php echo $this->_vars['link_shakebox_index']; ?>
" id="email_message<?php echo $this->_vars['link_shakebox_index']; ?>
" cols="40" rows="5"><?php echo $this->_vars['Default_Message']; ?>
</textarea><br />

		<br /><input type="button" name="email_to_submit" value="<?php echo $this->_confs['PLIGG_Visual_Recommend_Submit']; ?>
" onclick="emailto (<?php echo $this->_vars['link_id']; ?>
, <?php echo $this->_vars['link_shakebox_index']; ?>
, '<?php echo $this->_vars['instpath']; ?>
', 3);" class="log2">
	</form>
</fieldset>
</div>