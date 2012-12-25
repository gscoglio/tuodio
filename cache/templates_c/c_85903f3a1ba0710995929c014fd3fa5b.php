<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-06 06:41:53 PDT */  $this->config_load(spam_trigger_lang_conf, null, null); ?>

<?php if ($_SESSION['spam_trigger_comment_error'] == 'moderated'): ?>
	<div class="spam_trigger_moderated spam_trigger">
		<?php echo $this->_confs['PLIGG_Spam_Trigger_Comment_Moderated']; ?>

	</div>
<?php elseif ($_SESSION['spam_trigger_comment_error'] == 'deleted'): ?>
	<div class="spam_trigger_moderated spam_trigger">
		<?php echo $this->_confs['PLIGG_Spam_Trigger_Comment_Deleted']; ?>

	</div>
<?php endif; ?>

<?php $this->config_load(spam_trigger_pligg_lang_conf, null, null); ?>


<?php unset($_SESSION['spam_trigger_comment_error']); ?>
