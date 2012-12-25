<?php
// The source code packaged with this file is Free Software.
//  Copyright (C) 2005 by Ricardo Galli <gallir at uib dot es>.
//  Copyright (C) 2005 - 2008 Pligg, LLC <www.pligg.com>.
// You can get copies of the licenses here: http://www.affero.org/oagpl.html
// AFFERO GENERAL PUBLIC LICENSE is also included in the file called "COPYING".

include_once('../Smarty.class.php');
$main_smarty = new Smarty;

include('../config.php');
include(mnminclude.'html1.php');
include(mnminclude.'link.php');
include(mnminclude.'smartyvariables.php');
include(mnminclude.'csrf.php');

check_referrer();

// require user to log in
force_authentication();

// restrict access to god only
$canIhaveAccess = 0;
$canIhaveAccess = $canIhaveAccess + checklevel('god');

if($canIhaveAccess == 0){	
//	$main_smarty->assign('tpl_center', '/admin/admin_access_denied');
//	$main_smarty->display($template_dir . '/admin/admin.tpl');			
	header("Location: " . getmyurl('login', $_SERVER['REQUEST_URI']));
	die();
}

// breadcrumbs and page title
$navwhere['text1'] = $main_smarty->get_config_vars('PLIGG_Visual_Header_AdminPanel');
$navwhere['link1'] = getmyurl('admin', '');
$navwhere['text2'] = $main_smarty->get_config_vars('PLIGG_Visual_Header_AdminPanel_Editor');
$main_smarty->assign('navbar_where', $navwhere);
$main_smarty->assign('posttitle', " / " . $main_smarty->get_config_vars('PLIGG_Visual_Header_AdminPanel'));

// pagename
define('pagename', 'admin_editor'); 
$main_smarty->assign('pagename', pagename);

// read the mysql database to get the pligg version
$sql = "SELECT data FROM " . table_misc_data . " WHERE name = 'pligg_version'";
$pligg_version = $db->get_var($sql);
$main_smarty->assign('version_number', $pligg_version); 

// show the template
$main_smarty->assign('tpl_center', '/admin/editor_center');
$main_smarty->display($template_dir . '/admin/admin.tpl');	
?>
