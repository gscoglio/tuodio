<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2012-12-25 16:59:05 ART */  $this->config_load($this->_vars['simple_messaging_lang_conf'], null, null);  if ($this->_vars['user_authenticated'] == true): ?>
	<div class="links">
		<div class="sectiontitle">
			
			
			<a href="<?php echo $this->_vars['URL_simple_messaging_inbox']; ?>
" class="main">
			<span><?php echo $this->_confs['PLIGG_MESSAGING_Inbox']; ?>
 <?php if ($this->_vars['msg_new_count'] > 0): ?>(<?php echo $this->_vars['msg_new_count']; ?>
 <?php echo $this->_confs['PLIGG_MESSAGING_New']; ?>
)<?php endif; ?> </span>
			</a>
		</div>
	</div>
<?php endif;  $this->config_load(simple_messaging_pligg_lang_conf, null, null); ?>