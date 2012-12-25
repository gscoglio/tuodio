<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2012-12-25 16:59:05 ART */  if ($this->_vars['pagename'] != "login"): ?>
<div class="headline">
	<div class="sectiontitle"><a href="<?php echo $this->_vars['URL_login']; ?>
"><?php echo $this->_confs['PLIGG_Visual_Login_Title']; ?>
</a></div>
</div>
<div class="boxcontent">
<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_widget_login_start"), $this);?>
	<form action="<?php echo $this->_vars['URL_login']; ?>
" method="post"> 
			<?php echo $this->_confs['PLIGG_Visual_Login_Username']; ?>
:<br /><input type="text" name="username" class="login" value="<?php if (isset ( $this->_vars['login_username'] )):  echo $this->_vars['login_username'];  endif; ?>" tabindex="40" /><br />
			<?php echo $this->_confs['PLIGG_Visual_Login_Password']; ?>
:<br /><input type="password" name="password" class="login" tabindex="41" /><br />
			<input type="hidden" name="processlogin" value="1"/>
			<input type="hidden" name="return" value="<?php echo $this->_run_modifier($_GET['return'], 'sanitize', 'plugin', 1, 3); ?>
"/>
			<?php echo $this->_confs['PLIGG_Visual_Login_Remember']; ?>
: <input type="checkbox" name="persistent" tabindex="42" />
			<input type="submit" value="<?php echo $this->_confs['PLIGG_Visual_Login_LoginButton']; ?>
" class="submit-s" tabindex="43" />
	</form>
	<?php echo tpl_function_checkActionsTpl(array('location' => "tpl_widget_login_end"), $this);?>
</div>
<?php endif; ?>