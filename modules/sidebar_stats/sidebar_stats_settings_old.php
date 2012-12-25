<?php

// the path to the module. the probably shouldn't be changed unless you rename the sidebar_stats folder(s)
define('sidebar_stats_path', my_pligg_base . '/modules/sidebar_stats/');
// the path to the modules templates. the probably shouldn't be changed unless you rename the sidebar_stats folder(s)
define('sidebar_stats_tpl_path', '../modules/sidebar_stats/templates/');
// the path for smarty / template lite plugins
define('sidebar_stats_plugins_path', 'modules/sidebar_stats/plugins');
// the language path for the module
	if(!defined('lang_loc')){
		// determine if we're in root or another folder like admin
			$pos = strrpos($_SERVER["SCRIPT_NAME"], "/");
			$path = substr($_SERVER["SCRIPT_NAME"], 0, $pos);
			if ($path == "/"){$path = "";}
			
			if($path != my_pligg_base){
				define('lang_loc', '..');
			} else {
				define('lang_loc', '.');
			}
	}

define('sidebar_stats_lang_conf', lang_loc . '/modules/sidebar_stats/lang.conf');
define('sidebar_stats_pligg_lang_conf', lang_loc . "/languages/lang_" . pligg_language . ".conf");

// don't touch anything past this line.

$sql = "SELECT user_login FROM " . table_users . " ORDER BY user_id DESC LIMIT 1";
$last_user = $db->get_var($sql);
$main_smarty->assign('last_user', $last_user); 

$members = $db->get_var('SELECT count(*) from ' . table_users . ';');
$main_smarty->assign('members', $members);

$votes = $db->get_var('SELECT count(*) from ' . table_votes . ' where vote_type="links";');
$main_smarty->assign('votes', $votes);

$published = $db->get_var('SELECT count(*) from ' . table_links . ' where link_status = "published";');
$main_smarty->assign('published', $published);
$queued = $db->get_var('SELECT count(*) from ' . table_links . ' where link_status = "queued";');
$main_smarty->assign('queued', $queued);
$main_smarty->assign('stories', $queued + $published);

$sql = "SELECT user_login FROM " . table_users . " ORDER BY user_id DESC LIMIT 1";
$last_user = $db->get_var($sql);
$main_smarty->assign('last_user', $last_user); 

$comments = $db->get_var('SELECT count(*) from ' . table_comments . ';');
$main_smarty->assign('comments', $comments);

$groups = $db->get_var('SELECT count(*) from ' . table_groups . ';');
$main_smarty->assign('groups', $groups);

$files = $db->get_var('SELECT count(*) from ' . table_prefix . 'files;');
$main_smarty->assign('files', $files);

$messages = $db->get_var('SELECT count(*) from ' . table_prefix . 'messages;');
$main_smarty->assign('messages', $messages);

if(is_object($main_smarty)){
	$main_smarty->assign('sidebar_stats_path', sidebar_stats_path);
	$main_smarty->assign('sidebar_stats_tpl_path', sidebar_stats_tpl_path);
	$main_smarty->assign('sidebar_stats_pligg_lang_conf', sidebar_stats_pligg_lang_conf);
	$main_smarty->assign('sidebar_stats_lang_conf', sidebar_stats_lang_conf);
}

?>
