<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-06 07:02:35 PDT */  $this->config_load(captcha_lang_conf, null, null);  if ($this->_vars['submit_error'] == 'register_captcha_error'): ?>
	<p class="error"><?php echo $this->_confs['PLIGG_Captcha_Incorrect']; ?>
</p>
	<br/>
	<?php $this->config_load(captcha_pligg_lang_conf, null, null); ?>
	<form id="thisform">
		<input type="button" onclick="gPageIsOkToExit=true; document.location.href='<?php echo $this->_vars['my_base_url'];  echo $this->_vars['my_pligg_base']; ?>
/<?php echo $this->_vars['pagename']; ?>
.php?id=<?php echo $this->_vars['link_id']; ?>
';" value="<?php echo $this->_confs['PLIGG_Visual_Submit3Errors_Back']; ?>
" class="submit" />
	</form>
<?php endif; ?>

