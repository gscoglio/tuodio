<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2011-07-06 06:23:43 PDT */  $this->config_load(spam_trigger_lang_conf, null, null); ?>

<?php 
global $db;
$links = $db->get_var("SELECT COUNT(*) FROM ".table_links." WHERE link_status='moderated'");
$comments = $db->get_var("SELECT COUNT(*) FROM ".table_comments." WHERE comment_status='moderated'");
if ($links>0 || $comments>0)
{
    print('<div style="float:left;position:absolute;top:0;left:0;width:100%;border-bottom:2px solid #DBDB99;background:#FFFFFF;">
		<div style="margin:0 auto;padding:5px 10px;color:#2E2E2D;">
		<h2 style="font-size:13px;font-weight:bold;">');
    printf($this->_confs['PLIGG_Spam_Trigger_Notification'], 
	$links>0 ? "<a href='admin_links.php?filter=moderated'>$links</a>" : '0', 
	$comments>0 ? "<a href='admin_comments.php?filter=moderated'>$comments</a>" : '0');
    print('</h2></div></div>');
}
 ?>

<?php $this->config_load(spam_trigger_pligg_lang_conf, null, null); ?>