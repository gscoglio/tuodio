<?php
include_once('../Smarty.class.php');
$main_smarty = new Smarty;

include('../config.php');
include(mnminclude.'html1.php');
include(mnminclude.'link.php');
include(mnminclude.'user.php');
include(mnminclude.'smartyvariables.php');

// If called from a browser, required authentication. Cron version does not require.
if ($_SERVER['SERVER_ADDR'])
{
	check_referrer();

	// require user to log in
	force_authentication();

	// restrict access to god only
	$canIhaveAccess = 0;
	$canIhaveAccess = $canIhaveAccess + checklevel('god');

	if($canIhaveAccess == 0){	
//		$main_smarty->assign('tpl_center', '/admin/admin_access_denied');
//		$main_smarty->display($template_dir . '/admin/admin.tpl');		
		header("Location: " . getmyurl('login', $_SERVER['REQUEST_URI']));
		die();
	}
}

// $message = "";

    $query = "SHOW TABLE STATUS";
    $result=mysql_query($query);
    $table_list = "";
    while ($cur_table = mysql_fetch_object($result)) {
        $table_list .= $cur_table->Name.", ";
    }

    if (!empty($table_list)) {
        $table_list = substr($table_list, 0, -2);
        $query = "OPTIMIZE TABLE ".$table_list;
        mysql_query($query);
	if (mysql_error())
		echo mysql_error();
	else
        echo "Database optimized";
		echo '<br/><br />If you are viewing this from a popup window, please close it.<br /> If not,<a href="./admin_links.php">click here</a> to return to the News Management page.';
    }


?>