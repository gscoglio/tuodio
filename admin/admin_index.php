<?php header('Content-Type: text/html; charset=utf-8');
// The source code packaged with this file is Free Software, Copyright (C) 2005 by
// Ricardo Galli <gallir at uib dot es>.
// It's licensed under the AFFERO GENERAL PUBLIC LICENSE unless stated otherwise.
// You can get copies of the licenses here:
// 		http://www.affero.org/oagpl.html
// AFFERO GENERAL PUBLIC LICENSE is also included in the file called "COPYING".

include_once('../Smarty.class.php');
$main_smarty = new Smarty;

include('../config.php');
include(mnminclude.'html1.php');
include(mnminclude.'link.php');
include(mnminclude.'user.php');
include(mnminclude.'smartyvariables.php');

check_referrer();

// require user to log in
force_authentication();

// restrict access to god and admin only
$amIgod = 0;
$amIgod = $amIgod + checklevel('god');
$main_smarty->assign('amIgod', $amIgod);

$canIhaveAccess = 0;
$canIhaveAccess = $canIhaveAccess + checklevel('god');
$canIhaveAccess = $canIhaveAccess + checklevel('admin');

if($canIhaveAccess == 0){	
//	$main_smarty->assign('tpl_center', '/admin/admin_access_denied');
//	$main_smarty->display($template_dir . '/admin/admin.tpl');		
	header("Location: " . getmyurl('login', $_SERVER['REQUEST_URI']));
	die();
}

// misc smarty
$main_smarty->assign('isAdmin', $canIhaveAccess);

// sidebar
$main_smarty = do_sidebar($main_smarty);

// breadcrumbs and page titles
$navwhere['text1'] = $main_smarty->get_config_vars('PLIGG_Visual_Header_AdminPanel');
$navwhere['link1'] = getmyurl('admin', '');
$main_smarty->assign('navbar_where', $navwhere);
$main_smarty->assign('posttitle', " / " . $main_smarty->get_config_vars('PLIGG_Visual_Header_AdminPanel'));

// grab general statistics for the admin index page	
$members = $db->get_var('SELECT count(*) from ' . table_users . ';');
$main_smarty->assign('members', $members);

$grouptotal = $db->get_var('SELECT count(*) from ' . table_groups . ';');
$main_smarty->assign('grouptotal', $grouptotal);

$published = $db->get_var('SELECT count(*) from ' . table_links . ' where link_status = "published";');
$main_smarty->assign('published', $published);

$queued = $db->get_var('SELECT count(*) from ' . table_links . ' where link_status = "queued";');
$main_smarty->assign('queued', $queued);
$main_smarty->assign('total', $queued + $published);

$votes = $db->get_var('SELECT count(*) from ' . table_votes . ' where vote_type="links";');
$main_smarty->assign('votes', $votes);

$comments = $db->get_var('SELECT count(*) from ' . table_comments . ';');
$main_smarty->assign('comments', $comments);

$sql = mysql_query("SELECT link_id,link_date FROM " . table_links . " ORDER BY link_date DESC LIMIT 1");
    while ($rows = mysql_fetch_array($sql)) {
		$link_date = txt_time_diff(unixtimestamp($rows['link_date']));
		$main_smarty->assign('link_date', $link_date . ' ' . $main_smarty->get_config_vars('PLIGG_Visual_Comment_Ago'));
		$main_smarty->assign('link_id', $rows['link_id']);
	}
		
$sql = mysql_query("SELECT link_id,comment_id,comment_link_id,comment_date FROM " . table_comments . "," . table_links . " WHERE comment_link_id = link_id ORDER BY comment_date DESC LIMIT 1");
	while ($rows = mysql_fetch_array($sql)) {
		$comment_date = txt_time_diff(unixtimestamp($rows['comment_date']));
		$main_smarty->assign('comment_date', $comment_date . ' ' . $main_smarty->get_config_vars('PLIGG_Visual_Comment_Ago'));
		$main_smarty->assign('link_id', $rows['link_id']);
		$main_smarty->assign('comment_id', $rows['comment_id']);
	}

$sql = "SELECT user_login FROM " . table_users . " ORDER BY user_id DESC LIMIT 1";
$last_user = $db->get_var($sql);
$main_smarty->assign('last_user', $last_user); 

// read the mysql database to get the pligg version
$sql = "SELECT data FROM " . table_misc_data . " WHERE name = 'pligg_version'";
$pligg_version = $db->get_var($sql);
$main_smarty->assign('version_number', $pligg_version); 

// pagename
define('pagename', 'admin_index'); 
$main_smarty->assign('pagename', pagename);

// show the template
$main_smarty->assign('tpl_center', '/admin/admin_main_center');
$main_smarty->display($template_dir . '/admin/admin.tpl');
?>