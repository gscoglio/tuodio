<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-17 15:50:57 PDT */  $this->config_load(auto_update_lang_conf, null, null); ?>
<fieldset><legend> <?php echo $this->_confs['AUTO_UPDATE_TITLE']; ?>
 </legend>

<?php echo $this->_confs['AUTO_UPDATE_STEP1_DESCRIPTION']; ?>

<?php echo $this->_confs['AUTO_UPDATE_STEP2_DESCRIPTION']; ?>

<?php echo $this->_run_modifier($this->_confs['AUTO_UPDATE_STEP3_DESCRIPTION'], 'sprintf', 'PHP', 1, $this->_vars['yourversion'], $this->_vars['latestversion']); ?>

<?php echo $this->_confs['AUTO_UPDATE_STEP4_DESCRIPTION']; ?>

<?php echo $this->_confs['AUTO_UPDATE_STEP5_DESCRIPTION']; ?>

<?php echo $this->_confs['AUTO_UPDATE_STEP6_DESCRIPTION']; ?>

<hr />

<a href='?module=auto_update&step=2' style="border:1px solid #ccc;background:#0A5089;color:#fff;padding:6px 8px;float:left;color:#fff;display:block;"><?php echo $this->_confs['AUTO_UPDATE_CONTINUE_STEP2']; ?>
</a><br style="clear:both;" />

</fieldset>
<?php $this->config_load(auto_update_pligg_lang_conf, null, null); ?>