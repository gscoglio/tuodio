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

// sidebar
$main_smarty = do_sidebar($main_smarty);

if($canIhaveAccess == 1) {
	global $offset;
	$CSRF = new csrf();

	// Items per page drop-down
	if(isset($_GET["pagesize"]) && is_numeric($_GET["pagesize"])) {
		misc_data_update('pagesize',$_GET["pagesize"]);
	}
	$pagesize = get_misc_data('pagesize');
	if ($pagesize <= 0) $pagesize = 30;
	$main_smarty->assign('pagesize', $pagesize);
	
	// figure out what "page" of the results we're on
	$offset=(get_current_page()-1)*$pagesize;
	
	// if user is searching
	if(isset($_GET["mode"]) && sanitize($_GET["mode"], 3) == "search"){
		$pligg_keyword = sanitize($_GET["keyword"], 3);
		$filtered = $db->get_results("SELECT * FROM " . table_links . " WHERE link_author LIKE '%".$pligg_keyword."%' OR link_title LIKE '%".$pligg_keyword."%' OR link_content LIKE '%".$pligg_keyword."%' ORDER BY link_date DESC LIMIT $offset,$pagesize");
		$rows = $db->get_var("SELECT count(*) FROM " . table_links . " where link_author LIKE '%".$pligg_keyword."%' OR link_title LIKE '%".$pligg_keyword."%' OR link_content LIKE '%".$pligg_keyword."%'");		
	}
	else {
		$filtered = $db->get_results("SELECT * FROM " . table_links . " ORDER BY link_date DESC, link_author ASC LIMIT $offset,$pagesize");
		$rows = $db->get_var("SELECT count(*) FROM " . table_links . "");
	}
	
	// if admin uses the filter
	if(isset($_GET["filter"])) {
		switch (sanitize($_GET["filter"], 3)) {
		 	case 'upcoming':
				$filtered = $db->get_results("SELECT SQL_CALC_FOUND_ROWS * FROM " . table_links . " where link_status = 'queued' ORDER BY link_date DESC LIMIT $offset,$pagesize");
				break;
			case 'all':
				$filtered = $db->get_results("SELECT SQL_CALC_FOUND_ROWS * FROM " . table_links . " ORDER BY link_date DESC LIMIT $offset,$pagesize");
				break;
			case 'today':
				$filtered = $db->get_results("SELECT SQL_CALC_FOUND_ROWS * FROM " . table_links . " WHERE link_date > DATE_SUB(NOW(),INTERVAL 1 DAY) ORDER BY link_date DESC LIMIT $offset,$pagesize");
				break;
			case 'yesterday':
				$filtered = $db->get_results("SELECT SQL_CALC_FOUND_ROWS * FROM " . table_links . " WHERE link_date BETWEEN DATE_SUB(NOW(),INTERVAL 2 DAY) AND DATE_SUB(NOW(),INTERVAL 1 DAY) ORDER BY link_date DESC LIMIT $offset,$pagesize");
				break;
			case 'week':
			 	$filtered = $db->get_results("SELECT SQL_CALC_FOUND_ROWS * FROM " . table_links . " WHERE link_date > DATE_SUB(NOW(),INTERVAL 7 DAY) ORDER BY link_date DESC LIMIT $offset,$pagesize");
			 	break;					
			default:
				$filtered = $db->get_results("SELECT SQL_CALC_FOUND_ROWS * FROM " . table_links . " where link_status = '".$db->escape($_GET["filter"])."' ORDER BY link_date DESC LIMIT $offset,$pagesize");
				break;

	  	}	
		$rows = $db->get_var("SELECT FOUND_ROWS()");
	}	
	
	// read links from database 
	$user = new User;
	$link = new Link;
	if($filtered) {
    $template_stories = array();
	  foreach($filtered as $dbfiltered) {
	    $link->id = $dbfiltered->link_id;
 	    $cached_links[$dbfiltered->link_id] = $dbfiltered;
	    $link->read();
	    $user->id = $link->author;
	    $user->read();
		  $template_stories[] = array(
				'link_title_url' => $link->title_url,
				'link_id' => $link->id,
				'link_title' => $link->title,
				'link_status' => $link->status,
				'link_author' => $user->username,
		  );
	  }
	  $main_smarty->assign('template_stories', $template_stories);
	}
	
	// breadcrumbs and page title
	$navwhere['text1'] = $main_smarty->get_config_vars('PLIGG_Visual_Header_AdminPanel');
	$navwhere['link1'] = getmyurl('admin', '');
	$navwhere['text2'] = $main_smarty->get_config_vars('PLIGG_Visual_Header_AdminPanel_Links');
	$main_smarty->assign('navbar_where', $navwhere);
	$main_smarty->assign('posttitle', " / " . $main_smarty->get_config_vars('PLIGG_Visual_Header_AdminPanel'));
	
	// if admin changes the link status
	if (isset($_GET['action']) && sanitize($_GET['action'], 3) == "bulkmod" && isset($_POST['submit'])) {
		$CSRF->check_expired('admin_links_edit');
		if ($CSRF->check_valid(sanitize($_POST['token'], 3), 'admin_links_edit')){
			$comment = array();
			foreach ($_POST["link"] as $k => $v) {
				$comment[intval($k)] = sanitize($v, 3);
			}
			foreach($comment as $key => $value) {
				if ($value == "publish") {
					$db->query('UPDATE `' . table_links . '` SET `link_status` = "published", link_published_date = now() WHERE `link_id` = "'.$key.'"');
				}
				elseif ($value == "queued") {
					$db->query('UPDATE `' . table_links . '` SET `link_status` = "queued", link_published_date=0 WHERE `link_id` = "'.$key.'"');
				}
				elseif ($value == "discard") {
					$db->query('UPDATE `' . table_links . '` SET `link_status` = "discard" WHERE `link_id` = "'.$key.'"');
				}
			}

			totals_regenerate();

			header("Location: ".my_pligg_base."/admin/admin_links.php");
		} else {
		    $CSRF->show_invalid_error(1);
		    exit;
		}
	} else {
		$CSRF->create('admin_links_edit', true, true);
	}

	// pagename
	define('pagename', 'admin_links'); 
	$main_smarty->assign('pagename', pagename);
	
	// read the mysql database to get the pligg version
	$sql = "SELECT data FROM " . table_misc_data . " WHERE name = 'pligg_version'";
	$pligg_version = $db->get_var($sql);
	$main_smarty->assign('version_number', $pligg_version);
	
	// show the template
	$main_smarty->assign('tpl_center', '/admin/admin_links_center');
	$main_smarty->display($template_dir . '/admin/admin.tpl');

}
else {
	echo 'This page is restricted to site Admins!';
}		

?>
