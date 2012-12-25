{config_load file=auto_update_lang_conf}

{php}
list($yourversion,$latestversion) = auto_update_detect_version();

// Uncomment the next line to test the alert message
//$yourversion = '0.0.1';
global $my_pligg_base;

if ($yourversion < $latestversion) {
print('<div style="float:left;position:absolute;top:0;left:0;width:100%;border-bottom:2px solid #DBDB99;background:#FFFFFF;">
	<div style="margin:0 auto;padding:5px 10px;color:#2E2E2D;">
		<h2 style="font-size:13px;font-weight:bold;">'.$this->_confs['AUTO_UPDATE_NEW_VERSION_AVAILABLE'].' 
		 <a href="'.$my_pligg_base.'/module.php?module=auto_update">'.$this->_confs['AUTO_UPDATE_NEW_VERSION_UPGRADE'] .' '.$latestversion.'</a></h2>
	</div>
</div>');
}

{/php}

{config_load file=auto_update_pligg_lang_conf}