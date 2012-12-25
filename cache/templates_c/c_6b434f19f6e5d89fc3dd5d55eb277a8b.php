<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-17 15:51:15 PDT */  $this->config_load(auto_update_lang_conf, null, null); ?>
<fieldset><legend> <?php echo $this->_confs['AUTO_UPDATE_TITLE']; ?>
</legend>

<p><?php echo $this->_confs['AUTO_UPDATE_STEP2_DESCRIPTION']; ?>
</p>

<script>
var mysql=0, files=0;
</script>

<?php echo $this->_confs['AUTO_UPDATE_DOWNLOAD_MYSQL']; ?>
: <?php if ($this->_vars['gzip']): ?><a href='?module=auto_update&download=mysql&type=gzip' onclick='mysql=1'>gzip</a><?php endif; ?> <a href='?module=auto_update&download=mysql&type=zip' onclick='mysql=1'>zip</a> <a href='?module=auto_update&download=mysql' onclick='mysql=1'>text</a><br />
<?php echo $this->_confs['AUTO_UPDATE_DOWNLOAD_FILES']; ?>
: <a href='?module=auto_update&download=files&type=gzip' onclick='files=1'>gzip</a> <a href='?module=auto_update&download=files&type=zip' onclick='files=1'>zip</a><br />


<hr />

<a href='?module=auto_update&step=3' onclick='if (!mysql || !files) return confirm("<?php echo $this->_confs['AUTO_UPDATE_CONFIRM_STEP3']; ?>
");' style="border:1px solid #ccc;background:#0A5089;color:#fff;padding:6px 8px;float:left;color:#fff;display:block;"><?php echo $this->_confs['AUTO_UPDATE_CONTINUE_STEP3']; ?>
</a><br style="clear:both;" />

</fieldset>
<?php $this->config_load(auto_update_pligg_lang_conf, null, null); ?>