<?php
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

// restrict access to god only
$canIhaveAccess = 0;
$canIhaveAccess = $canIhaveAccess + checklevel('god');

if($canIhaveAccess == 0){	
	header("Location: " . getmyurl('login', $_SERVER['REQUEST_URI']));
	die();
}


function delete_comment($key) {
    global $db;
    if (!is_numeric($key)) return;
   
	$link_id = $db->get_var("SELECT comment_link_id FROM `" . table_comments . "` WHERE `comment_id` = ".$key.";");
	
	$db->query('DELETE FROM `' . table_comments . '` WHERE `comment_id` = "'.$key.'"');
	$db->query('DELETE FROM `' . table_comments . '` WHERE `comment_parent` = "'.$key.'"');

	$link = new Link;
	$link->id=$link_id;
	$link->read();
	$link->recalc_comments();
	$link->store();
}

$sql_query = "SELECT comment_id FROM " . table_comments . " WHERE comment_status = 'discard'";
$result = mysql_query($sql_query);
$num_rows = mysql_num_rows($result);
while($comment = mysql_fetch_object($result))
        delete_comment($comment->comment_id);

echo $num_rows. " discarded comments deleted<br><br>";

$query = "OPTIMIZE TABLE comments";
mysql_query($query);
if (mysql_error())
	echo mysql_error();
else
        echo "Comments table optimized";
?>
