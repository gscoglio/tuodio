<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2012-12-25 16:59:05 ART */  $this->config_load(spam_trigger_lang_conf, null, null); ?>

<?php if ($_SESSION['spam_trigger_story_error'] == 'moderated'): ?>
	<div class="spam_trigger_moderated spam_trigger">
		<?php echo $this->_confs['PLIGG_Spam_Trigger_Story_Moderated']; ?>

	</div>
<?php elseif ($_SESSION['spam_trigger_story_error'] == 'discarded'): ?>
	<div class="spam_trigger_discarded spam_trigger">
		<?php echo $this->_confs['PLIGG_Spam_Trigger_Story_Discarded']; ?>

	</div>
<?php elseif ($_SESSION['spam_trigger_story_error'] == 'deleted'): ?>
	<div class="spam_trigger_deleted spam_trigger">
		<?php echo $this->_confs['PLIGG_Spam_Trigger_Story_Deleted']; ?>

	</div>
<?php endif; ?>

<?php $this->config_load(spam_trigger_pligg_lang_conf, null, null); ?>


<?php unset($_SESSION['spam_trigger_story_error']); ?>
