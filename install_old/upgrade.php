<?php
error_reporting(E_ALL^E_NOTICE);
$page = 'upgrade';
include('class_HTTPRequest.php');
if ($_GET['language'])
    $language = addslashes(strip_tags($_GET['language']));
include ('header.php');
define("mnmpath", dirname(__FILE__).'/../');
define("mnminclude", dirname(__FILE__).'/../libs/');
define("mnmmodules", dirname(__FILE__).'/../modules/');
include_once '../settings.php';
if ($_GET['language'])
    $language = $_GET['language'];
if($language != 'local'){
	include_once('../languages/installer_lang.php');
} else {
	include_once('../languages/installer_lang_default.php');
}

if($language == '' && $_POST['submit'] == ''){
	$url = 'http://www.pligg.com/languages/check/getLanguageList.php?type=upgrade&version=102';

	$r = new CD_HTTPRequest($url);
	$data = $r->DownloadToString();
	if(strpos($data, '!--Pligg Language Select-->') > 0){
		echo $data;
	} else {
		echo 'We just tried to connect to Pligg.com to get a list of available languages but there was a problem.<br /><br /><a href = "upgrade.php?language=local">Click to Continue in English</a>';
	}

	include ('footer.php');
	
	die();

} else {

	if($language != 'local'){
	    $url = 'http://www.pligg.com/languages/check/getLanguageFile.php?type=installer&version=102&language=' . $language;
	    $r = new CD_HTTPRequest($url);
	    $data = $r->DownloadToString();

	    if (strpos($data,'$lang[') > 0) {
		$filename = '../languages/installer_lang.php';
		$fh=fopen($filename,"w");

		if (fwrite($fh, $data)) {
			fclose($fh);
		} else {
			$url = 'http://www.pligg.com/languages/check/chmod_' . $language . '.php';
			$r = new CD_HTTPRequest($url);
			echo $r->DownloadToString();
			die();
		}
	    } else {
		echo 'We just tried to connect to Pligg.com to get language file but there was a problem.<br /><br /><a href = "upgrade.php?language=local">Click to Continue in English</a>';
		include ('footer.php');
		die();
	    }		
	}	

	$step = 1;

}


$include='header.php'; if (file_exists($include)) { include_once($include); }
$include='functions.php'; if (file_exists($include)) { include_once($include); }


echo '<h3>' . $lang['UpgradeTop'] . '</h3>';

$file='../config.php';
if (!file_exists($file)) { $errors[]="$file " . $lang['NotFound'] ; }
elseif (filesize($file) <= 0) { $errors[]="$file " . $lang['ZeroBytes'] ; }

$file='../settings.php';
if (!file_exists($file)) { $errors[]="$file " . $lang['NotFound'] ; }
elseif (filesize($file) <= 0) { $errors[]="$file " . $lang['ZeroBytes'] ; }
elseif (!is_writable($file)) { $errors[]="$file " . $lang['NotEditable'] ; }

$file='../libs/dbconnect.php';
if (!file_exists($file)) { $errors[]="$file " . $lang['NotFound'] ; }
elseif (filesize($file) <= 0) { $errors[]="$file " . $lang['ZeroBytes'] ; }

if (!$errors) {
    echo '<p>' . $lang['UpgradeHome'] . '</p>';

    //this checks to see if they actually do want to upgrade.
    if (!$_POST['submit']) {
	echo '<p><strong>' . $lang['UpgradeAreYouSure'] . '</strong></p>
	<form id="form" name="form" method="post">
	<input type="submit" class="submitbutton" name="submit" value="' . $lang['UpgradeYes'] . '" />
	</form>';
    }       	
    else { //they clicked yes!
	$include='../config.php';
	if (file_exists($include)) { 
		include_once($include);
		include(mnminclude.'html1.php');
	}
	
	// Language File Upgrade
	$languageContent = '../languages/lang_' . $language . '.conf';
	$languageContent = file_get_contents($languageContent);

	// Lets start with 1.0.0 and work our way up to the latest version available.
	$oldLanguage100 = "// End 1.0.0 Language File";
	$newLanguage101='http://www.pligg.com/languages/update/lang_' . $language . '_update_101.conf';
	//echo $newLanguage101;
	$r = new CD_HTTPRequest($newLanguage101);
	$content = $r->DownloadToString();
	if($content)
		$languageContent = str_replace($oldLanguage100 , $content , $languageContent);

	$oldLanguage101 = "// End 1.0.1 Language File";
	$newLanguage102='http://www.pligg.com/languages/update/lang_' . $language . '_update_102.conf';
	$r = new CD_HTTPRequest($newLanguage102);
	$content = $r->DownloadToString();
	if($content)
		$languageContent = str_replace($oldLanguage101 , $content , $languageContent);
		
	$oldLanguage102 = "// End 1.0.2 Language File";
	$newLanguage103='http://www.pligg.com/languages/update/lang_' . $language . '_update_103.conf';
	$r = new CD_HTTPRequest($newLanguage103);
	$content = $r->DownloadToString();
	if($content)
		$languageContent = str_replace($oldLanguage102 , $content , $languageContent);
		
// echo $languageContent;

	// Point to the file that's going to be written to.
	$filename = '../languages/lang_' . $language . '.conf';
	echo $lang['LanguageUpdate'] . '<br />';
	// Let's make sure the language file exists and is writable first.
	if (is_writable($filename)) {

		if (!$handle = fopen($filename, 'w')) {
			 echo '$filename' . $lang['NotFound'] . '<br />';
			 exit;
		}

		// Write $languageContent to the opened language file.
		if (fwrite($handle, $languageContent) === FALSE) {
			echo '$filename' . $lang['NotEditable'] . '<br />';
			exit;
		}

		echo $lang['UpgradeLanguage'] . '<br />';

		fclose($handle);
	} else {
		echo '$filename' . $lang['NotEditable'] . '<br />';
	}
	echo '<br />';
	// End Language File Upgrade

	echo $lang['UpgradingTables'] . '<br />';
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'enable_gzip_files';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` VALUES (70, 'Misc', 'enable_gzip_files', 'false', 'false', 'true / false', 'Enable Gzip File Compression', 'Enable or disable gzip compression on js files.', 'define', NULL);");
	}

	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'minTitleLength';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` VALUES (71, 'Submit', 'minTitleLength', '10', '10', 'number', 'Minimum Title Length', 'Set the minimum number of characters for the story title.', 'define', NULL);");
	}
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'minStoryLength';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` VALUES (72, 'Submit', 'minStoryLength', '10', '10', 'number', 'Minimum Story Length', 'Set the minimum number of characters for the story description.', 'define', NULL);");
	}

	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'tags_min_pts_s';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` VALUES (73, 'Tags', 'tags_min_pts_s', '6', '6', 'number (should be at least 6)', 'Tag minimum points (sidebar)', '<b>Only used if Tags are enabled.</b> How small should the text for the smallest tags be(sidebar).', 'define', NULL);");
	}
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'tags_max_pts_s';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` VALUES (74, 'Tags', 'tags_max_pts_s', '15', '15', 'number', 'Tag maximum points (sidebar)', '<b>Only used if Tags are enabled.</b> How big should the text for the largest tags be (sidebar).', 'define', NULL);");
	}
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'tags_words_limit_s';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` VALUES (75, 'Tags', 'tags_words_limit_s', '5', '5', 'number', 'Tag cloud word limit (sidebar)', '<b>Only used if Tags are enabled.</b> The most tags to show in the cloud (sidebar).', 'define', NULL);");
	}

	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'comments_length_sidebar';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` VALUES (76, 'Comments', 'comments_length_sidebar', '75', '75', 'number', 'Comment length (sidebar)', 'The maximum number of characters shown for each comment (sidebar).', 'define', NULL);");
	}
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'comments_size_sidebar';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` VALUES (77, 'Comments', 'comments_size_sidebar', '8', '8', 'number', 'Number of comments (sidebar)', 'How many comments are shown in the Latest Comments sidebar module', 'define', NULL);");
	}
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'Recommend_Time_Limit';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` VALUES (79, 'Story', 'Recommend_Time_Limit', '30', '30', 'number', 'Email time limit.', 'Limit how many seconds in between a users recommend a friend emails.', 'define', NULL);");
	}
	//for groups module config settings
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'enable_group';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL , 'Groups', 'enable_group', 'true', 'true', 'true/false', 'Groups', 'Should Groups be turned on?', 'define', 'NULL');");
	}

	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'max_user_groups_allowed';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL , 'Groups', 'max_user_groups_allowed', '10', '10', 'number', 'Max Groups User Create', 'Maximum number of groups a user is allowed to create', 'define', 'NULL');");
	}

	// delete the AddTo field from database
	$sql = "DELETE FROM `" . table_config . "` WHERE `var_name` = 'Enable_AddTo';";
	$db->query($sql);

	// delete Thumbnail feature
	$sql = "DELETE FROM `" . table_config . "` WHERE `var_name` = 'use_thumbnails';";
	$db->query($sql);
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'max_groups_to_join';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL , 'Groups', 'max_groups_to_join', '10', '10', 'number', 'Max Joinable Groups', 'Maximum number of groups a user is allowed to join', 'define', 'NULL');");
	}
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'auto_approve_group';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL , 'Groups', 'auto_approve_group', 'true', 'true', 'true/false', 'Auto Approve', 'Should group stories be moderated before being published?', 'define', 'NULL');");
	}
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'group_avatar_size_width';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL , 'Groups', 'group_avatar_size_width', '90', '90', 'number', 'Width of Group Avatar', 'Width in pixels for the group avatar', 'define', 'NULL');");	}
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'group_avatar_size_height';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL , 'Groups', 'group_avatar_size_height', '90', '90', 'number', 'Height of Group Avatar', 'Height in pixels for the group avatar', 'define', 'NULL');");
	}
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'votes_per_ip';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL , 'Voting', 'votes_per_ip', '1', '1', 'number', 'Votes from one IP', '<b>0</b> = disable feature.', 'define', 'NULL');");
	}

	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'limit_time_to_edit';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL , 'Submit', 'limit_time_to_edit', '0', '0', '1 = on / 0 = off', 'Limit time to edit stories', '<b>0</b> = Unlimited amount of time to edit<br /><b>1</b> = specified amount of time', 'define', NULL);");
	}

	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'edit_time_limit';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL , 'Submit', 'edit_time_limit', '0', '0', 'number', 'Minutes before a user is no longer allowed to edit a story', '<b>0</b> = Disable the users ability to ever edit the story. Requires that you enable Limit Time To Edit Stories (set to 1).', 'define', NULL);");
	}

	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'group_submit_level';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL , 'Groups', 'group_submit_level', 'normal', 'normal', 'normal,admin,god', 'Group Create User Level', 'Minimum user level to create new groups', 'define', 'NULL');");
	}
	
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'misc_validate';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL, 'Misc', 'misc_validate', 'false', 'false', 'true / false', 'Validate user email', 'Require users to validate their email address?', 'define', '');");
	}

	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'misc_timezone';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL, 'Misc', 'misc_timezone', '0', '0', 'number', 'Timezone offset', 'Should be a number between -12 and 12 for GMT -1200 through GMT +1200 timezone', 'define', '');");
	}

	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = '\$language';");
	if (count($result) == 0) {
		$db->query("INSERT INTO `" . table_config . "` ( `var_id` , `var_page` , `var_name` , `var_value` , `var_defaultvalue` , `var_optiontext` , `var_title` , `var_desc` , `var_method` , `var_enclosein` )VALUES (NULL, 'Misc', '\$language', '$language', 'english', 'text', 'Site Language', 'Site Language', 'normal', '\'');");
	}

	//---------------
	//out.php alter table 
	$fieldexists = checkforfield('link_out', table_links);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `".table_links."` ADD `link_out` INT( 11 ) NOT NULL ;";
		$db->query($sql);
	}

	$result = $db->get_results("select * from `" . table_links . "` where (ISNULL(link_title_url) OR link_title_url='') AND link_status='page'");
	if ($results)
	    foreach ($results as $result)
	    {
   		$page_url=makeUrlFriendly($db->escape(trim($result->link_title)), true);
		$db->query("UPDATE ".table_links." SET link_title_url='$page_url' WHERE id={$result->link_id}");
	    }

	//---------------
	//Groups module alter table 
	$fieldexists = checkforfield('link_group_id', table_links);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `".table_links."` ADD `link_group_id` INT( 20 ) NOT NULL ;";
		$db->query($sql);
	}
	$fieldexists = checkforfield('link_group_status', table_links);
	if (!$fieldexists) {
		$sql = "ALTER TABLE  `pligg_links` ADD  `link_group_status` SET(  'queued',  'published',  'discard' ) DEFAULT 'queued' NOT NULL ;";
		$db->query($sql);
	}

	/*$fieldexists = checkforfield('member_group_id', table_links);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `".table_links."` ADD `link_share_id` INT( 20 ) NOT NULL ;";
		$db->query($sql);
	}*/

	// add in google site search
	$sql = "UPDATE `" . table_config . "` set `var_value` = '3', `var_optiontext` = '1 - 3', `var_desc` = '<br /><b>1</b> = uses MySQL MATCH for FULLTEXT indexes (or something). <b>Problems are MySQL STOP words and words less than 4 characters. Note: these limitations do not affect clicking on a TAG to search by it.</b>\r\n<br /><b>2</b> = uses MySQL LIKE and is much slower, but returns better results. Also supports \"*\" and \"-\"\r\n<br /><b>3</b> = is a hybrid, using method 1 if possible, but method 2 if needed.' WHERE `var_id` = 43;";
	$db->query($sql);
	
	// uninstall the RSS importer so that the user has to re-install it to make sure
	// some SQL queries get run
	$sql = "DELETE FROM `" . table_modules . "` WHERE `name` = 'RSS Importer';";
	$db->query($sql);


	$fieldexists = checkforfield('latest_version', table_modules);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `".table_modules."` ADD `latest_version` float NOT NULL AFTER `version`;";
		$db->query($sql);
	}  
  
	// Install English Help Documents Module
	$result = $db->get_results("select * from `" . table_modules . "` where `folder` = 'multibox_admin';");
	if (count($result) == 0) 
		$db->query("insert into `" . table_modules . "` (`id`, `name`, `version`, `latest_version`, `folder`, `enabled`) VALUES (97, 'Multibox Admin', 0.1, 0, 'multibox_admin', 1);");
		
	$result = $db->get_results("select * from `" . table_modules . "` where `folder` = 'admin_help_english';");
	if (count($result) == 0) 
		$db->query("insert into `" . table_modules . "` (`id`, `name`, `version`, `latest_version`, `folder`, `enabled`) VALUES (98, 'Admin Help English', 0.2, 0, 'admin_help_english', 1);");
	
	// Install Hello World Module
	$result = $db->get_results("select * from `" . table_modules . "` where `folder` = 'hello_world';");
	if (count($result) == 0) 
		$db->query("insert into `" . table_modules . "` (`id`, `name`, `version`, `latest_version`, `folder`, `enabled`) VALUES (99, 'Hello World', 0.2, 0, 'hello_world', 1);");	
	
	// 3 levels for html tags
	$sql = "UPDATE `" . table_config . "` set  var_title='HTML tags to allow to Normal users' WHERE `var_id` = 20;";
	$db->query($sql);
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'Story_Content_Tags_To_Allow_Admin';");
	if (count($result) == 0) 
		$db->query("INSERT INTO `" . table_config . "` VALUES (91, 'Submit', 'Story_Content_Tags_To_Allow_Admin', '', '', 'HTML tags', 'HTML tags to allow to Admin users', 'leave blank to not allow tags. Example is ''< b >< br >< font >< img >< p >'' <strong>(without spaces)</strong>', 'define', '''')");
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'Story_Content_Tags_To_Allow_God';");
	if (count($result) == 0) 
		$db->query("INSERT INTO `" . table_config . "` VALUES (92, 'Submit', 'Story_Content_Tags_To_Allow_God', '', '', 'HTML tags', 'HTML tags to allow to God', 'leave blank to not allow tags. Example is ''< b >< br >< font >< img >< p >'' <strong>(without spaces)</strong>', 'define', '''')");
	$db->query("UPDATE `" . table_config . "` SET var_name='Story_Content_Tags_To_Allow_Normal' WHERE var_name='Story_Content_Tags_To_Allow'");

	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'maxTitleLength';");
	if (count($result) == 0) 
		$db->query("INSERT INTO `" . table_config . "` VALUES (NULL, 'Submit', 'maxTitleLength', '120', '120', 'number', 'Maximum Title Length', 'Maximum number of characters for the story title.', 'define', NULL)");
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'maxTagsLength';");
	if (count($result) == 0) 
		$db->query("INSERT INTO `" . table_config . "` VALUES (NULL, 'Submit', 'maxTagsLength', '40', '40', 'number', 'Maximum Tag Line Length', 'Maximum number of characters for the story tags.', 'define', NULL)");
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'maxStoryLength';");
	if (count($result) == 0) 
		$db->query("INSERT INTO `" . table_config . "` VALUES (NULL, 'Submit', 'maxStoryLength', '1000', '1000', 'number', 'Maximum Story Length', 'Maximum number of characters for the story description.', 'define', NULL)");
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'maxSummaryLength';");
	if (count($result) == 0) 
		$db->query("INSERT INTO `" . table_config . "` VALUES (NULL, 'Submit', 'maxSummaryLength', '400', '400', 'number', 'Maximum Summary Length', 'Maximum number of characters for the story summary.', 'define', NULL)");
	$result = $db->get_results("select * from `" . table_config . "` where `var_name` = 'maxCommentLength';");
	if (count($result) == 0) 
		$db->query("INSERT INTO `" . table_config . "` VALUES (NULL, 'Comments', 'maxCommentLength', '1200', '1200', 'number', 'Maximum Comment Length', 'Maximum number of characters for the comment.', 'define', NULL)");

	$tableexists = checkfortable(table_saved_links);
	if (!$tableexists) {
		$sql = "CREATE TABLE `" . table_saved_links . "` (
		  `saved_id` int(11) NOT NULL auto_increment,
		  `saved_user_id` int(11) NOT NULL,
		  `saved_link_id` int(11) NOT NULL,
		  PRIMARY KEY  (`saved_id`),
		  KEY `saved_user_id` (  `saved_user_id` )
		) TYPE = MyISAM;";
		$db->query($sql);
	}
	$fieldexists = checkforfield('saved_privacy', table_saved_links);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `".table_saved_links."` ADD `saved_privacy` ENUM( 'private', 'public' ) NOT NULL ";
		$db->query($sql);
	}
	$fieldexists = checkforfield('link_reports', table_links);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `" . table_links . "` ADD `link_reports` int(20) NOT NULL default '0'";
		$db->query($sql);
	} else {
		// this is for caching link_reports in the links table instead of checking the 
		// votes table every link->read()
		// this is here for people who already upgraded to the SVN and may have
		// stories that have been reported. this field wasn't used right away so may
		// show 0 even though there have been reports (stored in the votes table)
		$sql = "update `" . table_links . "` set link_reports = -1 where link_reports = 0;";
		$db->query($sql);
	}
	$fieldexists = checkforfield('link_comments', table_links);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `" . table_links . "` ADD `link_comments` int(20) NOT NULL default '0'";
		$db->query($sql);
	}
	
	$fieldexists = checkforfield('link_blog', table_links); 	 
	if ($fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_links . "` drop column `link_blog`"; 	 
	         $db->query($sql); 	 
	}
	/* modification for page cms*/
	$fieldexists = checkforfield('link_status', table_links);
	if ($fieldexists) {
		$sql = (" ALTER TABLE `" . table_links . "` CHANGE `link_status` `link_status` ENUM( 'discard', 'queued', 'published', 'abuse', 'duplicated', 'page' ) NOT NULL DEFAULT 'discard' ");
		$db->query($sql);
	}
	/*----------*/
	// DB 05/07/09
	$fields = $db->get_results("DESCRIBE ".table_links);
	if ($fields)
	    foreach ($fields as $field)
		if ($field->Field == 'link_status' && !strstr($field->Type,"'page'"))
		    $db->query("ALTER TABLE `".table_links."` CHANGE  `link_status`  `link_status` ".str_replace(')',",'page')",$field->Type)." DEFAULT  'discard'");
	/////
	$fieldexists = checkforfield('user_lang', table_users); 	 
	if ($fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_users . "` drop column `user_lang`"; 	 
	         $db->query($sql); 	 
	}
	
	$fieldexists = checkforfield('comment_nick', table_comments); 	 
	if ($fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_comments . "` drop column `comment_nick`"; 	 
	         $db->query($sql); 	 
	}

	$fieldexists = checkforfield('comment_status', table_comments); 	 
	if (!$fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_comments . "` ADD `comment_status` enum('discard','moderated','published') NOT NULL default 'published' "; 	 
	         $db->query($sql); 	 
	}
        $sql = "ALTER TABLE  `" . table_comments . "` CHANGE  `comment_date`  `comment_date` DATETIME";
        $db->query($sql); 	 

	$sql = "ALTER TABLE ".table_links." MODIFY `link_content` MEDIUMTEXT";
        $db->query($sql); 	 

	//groups upgrade code inserting table
	//group table
	$tableexists = checkfortable(table_groups);
	if (!$tableexists) {
		$sql = "CREATE TABLE `".table_groups."` (
		  `group_id` int(20) NOT NULL auto_increment,
		  `group_creator` int(20) NOT NULL,
	          `group_status` enum('Enable','disable') collate latin1_general_ci NOT NULL,
		  `group_members` int(20) NOT NULL,
		  `group_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
		  `group_safename` text collate latin1_general_ci NOT NULL,
		  `group_name` text collate latin1_general_ci NOT NULL,
		  `group_description` text collate latin1_general_ci NOT NULL,
		  `group_privacy` enum('private','public','restricted') collate latin1_general_ci NOT NULL,
		  `group_avatar` varchar(255) collate latin1_general_ci NOT NULL,
	          `group_vote_to_publish` int(20) NOT NULL,
		  `group_field1` varchar(255) collate latin1_general_ci NOT NULL,
		  `group_field2` varchar(255) collate latin1_general_ci NOT NULL,
		  `group_field3` varchar(255) collate latin1_general_ci NOT NULL,
		  `group_field4` varchar(255) collate latin1_general_ci NOT NULL,
		  `group_field5` varchar(255) collate latin1_general_ci NOT NULL,
		  `group_field6` varchar(255) collate latin1_general_ci NOT NULL,
		  `group_notify_email` tinyint(1) NOT NULL,
			PRIMARY KEY  (`group_id`),
			KEY `group_name` (`group_name`(100)),
			KEY `group_creator` (`group_creator`, `group_status`)
			);";
		$db->query($sql);
	}
	echo 'Creating table: \'groups\'....<br />';
	
	//group member table
	$tableexists = checkfortable(table_group_member);
	if (!$tableexists) {
	$sql = "CREATE TABLE `".table_group_member."` (
		`member_id` INT( 20 ) NOT NULL auto_increment,
		`member_user_id` INT( 20 ) NOT NULL ,
        	`member_group_id` INT( 20 ) NOT NULL ,
        	`member_role` ENUM( 'admin', 'normal', 'moderator', 'flagged', 'banned' ) NOT NULL,
		`member_status` ENUM( 'active', 'inactive') NOT NULL,
		PRIMARY KEY  (`member_id`),
		KEY `user_group` (`member_group_id`, `member_user_id`)
		);";
		$db->query($sql);
       	}
	echo 'Creating table: \'group_member\'....<br />';
	
	//group shared table
	$tableexists = checkfortable(table_group_shared);
	if (!$tableexists) {
	$sql = "CREATE TABLE `".table_group_shared."` (
		`share_id` INT( 20 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`share_link_id` INT( 20 ) NOT NULL ,
		`share_group_id` INT( 20 ) NOT NULL ,
		`share_user_id` INT( 20 ) NOT NULL,
		UNIQUE KEY `share_group_id` (`share_group_id`,`share_link_id`)
		);";
        	$db->query($sql);
		}
	echo 'Creating table: \'group_shared\'....<br />';
	
	$fieldexists = checkforindex('group_name', table_groups); 	 
	if (!$fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_groups . "` ADD INDEX (  `group_name`(100) )"; 	 
	         $db->query($sql); 	 
	         $sql = "ALTER TABLE `" . table_groups . "` ADD INDEX  `group_creator` (  `group_creator` ,  `group_status` )"; 	 
	         $db->query($sql); 	 
	}
	$fieldexists = checkforfield('group_notify_email', table_groups); 	 
	if (!$fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_groups . "` ADD `group_notify_email` tinyint(1) NOT NULL default '0'"; 	 
	         $db->query($sql); 	 
	}
	$fieldexists = checkforindex('share_group_id', table_group_shared); 	 
	if (!$fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_group_shared . "` ADD UNIQUE (`share_group_id` ,`share_link_id`)"; 	 
	         $db->query($sql); 	 
	}
	$fieldexists = checkforindex('user_group', table_group_member); 	 
	if (!$fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_group_member . "` ADD INDEX `user_group` (  `member_group_id`, `member_user_id` )"; 	 
	         $db->query($sql); 	 
	}
	$fieldexists = checkforindex('category_id', table_categories); 	 
	if (!$fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_categories . "` ADD INDEX (  `category_id` )"; 	 
	         $db->query($sql); 	 
	}
	$fieldexists = checkforindex('category_parent', table_categories); 	 
	if (!$fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_categories . "` ADD INDEX (  `category_parent` )"; 	 
	         $db->query($sql); 	 
	         $sql = "ALTER TABLE `" . table_categories . "` ADD INDEX (  `category_safe_name` )"; 	 
	         $db->query($sql); 	 
	}
	$fieldexists = checkforindex('category_name', table_categories); 	 
	if ($fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_categories . "` DROP INDEX `category_name`"; 	 
	         $db->query($sql); 	 
	}
	$fieldexists = checkforindex('comment_date', table_comments); 	 
	if (!$fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_comments . "` ADD INDEX (  `comment_date` )"; 	 
	         $db->query($sql); 	 
	         $sql = "ALTER TABLE `" . table_comments . "` ADD INDEX `comment_link_id` (  `comment_link_id`, `comment_parent`, `comment_date` )"; 	 
	         $db->query($sql); 	 
	         $sql = "ALTER TABLE `" . table_comments . "` ADD INDEX `comment_parent` (   `comment_parent`, `comment_date` )"; 	 
	         $db->query($sql); 	 
	}
	$fieldexists = checkforindex('link_title_url', table_links); 	 
	if (!$fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_links . "` ADD INDEX (  `link_title_url` )"; 	 
	         $db->query($sql); 	 
	         $sql = "ALTER TABLE `" . table_links . "` ADD INDEX `link_status` (  `link_status` ,  `link_date` )"; 	 
	         $db->query($sql); 	 
	}
	$fieldexists = checkforindex('saved_user_id', table_saved_links); 	 
	if (!$fieldexists) { 	 
	         $sql = "ALTER TABLE `" . table_saved_links . "` ADD INDEX (  `saved_user_id` )"; 	 
	         $db->query($sql); 	 
	}
	
	// for the 'totals' table for summarizing
	$tableexists = checkfortable(table_totals);
	if (!$tableexists) {
		$sql = "CREATE TABLE `" . table_totals . "` (
	  	`name` varchar(10) NOT NULL,
	  	`total` int(11) NOT NULL,
	  	PRIMARY KEY  (`name`)
			) TYPE = MyISAM;";
        	$db->query($sql);
	
		$db->query("insert into `" . table_totals . "` (`name`, `total`) values ('published', 0);");	
		$db->query("insert into `" . table_totals . "` (`name`, `total`) values ('queued', 0);");	
		$db->query("insert into `" . table_totals . "` (`name`, `total`) values ('discard', 0);");	
	}
	
	$tableexists = checkfortable(table_tag_cache);
	if (!$tableexists) {
		$sql = "CREATE TABLE `" . table_tag_cache . "` (
	        	  `tag_words` varchar(64) NOT NULL,
			  `count` int(11) NOT NULL
			) TYPE=MyISAM";
		$db->query($sql);
	}
	        
	//echo '<br />Regenerating the totals table...<br />';
	totals_regenerate();
        
	
	$tableexists = checkfortable(table_misc_data);
	if (!$tableexists) {
		$sql = "CREATE TABLE `" . table_misc_data . "` (
			`name` VARCHAR( 20 ) NOT NULL ,
			`data` TEXT NOT NULL ,
			PRIMARY KEY ( `name` )
			) TYPE = MyISAM;";
		$db->query($sql);
		
		$sql = "INSERT INTO `" . table_misc_data . "` ( `name` , `data` ) VALUES ('pligg_version', '1.0.3');";
		$db->query($sql);
		//Captcha upgrade:
		$sql = "INSERT INTO `" . table_misc_data . "` ( `name` , `data` ) VALUES ('captcha_method', 'reCaptcha');";
		$db->query($sql);
		$sql = "INSERT INTO `" . table_misc_data . "` ( `name` , `data` ) VALUES ('reCaptcha_pubkey', '6LfwKQQAAAAAAPFCNozXDIaf8GobTb7LCKQw54EA');";
		$db->query($sql);
		$sql = "INSERT INTO `" . table_misc_data . "` ( `name` , `data` ) VALUES ('reCaptcha_prikey', '6LfwKQQAAAAAALQosKUrE4MepD0_kW7dgDZLR5P1');";
		$db->query($sql);
		//
		//register validation//
        	$randkey = rand(1000000,100000000);
        	misc_data_update('hash', $randkey);
		misc_data_update('validate', 0);
		//
	} else {
		$sql = "UPDATE `" . table_misc_data . "` SET `data` = '1.0.3' WHERE `name` = 'pligg_version';";
		$db->query($sql);
        	//Captcha upgrade:
		$captcha_result=$db->get_results("select * from " . table_misc_data . " where name = 'captcha_method'");
		if(count($captcha_result)==0){
			$sql = "INSERT INTO `" . table_misc_data . "` ( `name` , `data` ) VALUES ('captcha_method', 'reCaptcha');";
			$db->query($sql);
			$sql = "INSERT INTO `" . table_misc_data . "` ( `name` , `data` ) VALUES ('reCaptcha_pubkey', '6LfwKQQAAAAAAPFCNozXDIaf8GobTb7LCKQw54EA');";
			$db->query($sql);
			$sql = "INSERT INTO `" . table_misc_data . "` ( `name` , `data` ) VALUES ('reCaptcha_prikey', '6LfwKQQAAAAAALQosKUrE4MepD0_kW7dgDZLR5P1');";
			$db->query($sql);
		}
		//
		//register validation//
		$randkey = rand(1000000,100000000);
		misc_data_update('hash', $randkey);
        	misc_data_update('validate', 0);
		//
	}
	
	$fieldexists = checkforfield('rgt', table_categories);
	if ($fieldexists) {
		$sql = "ALTER TABLE `" . table_categories . "` CHANGE `rgt` `rgt` int(11) NOT NULL default '0';";
		$db->query($sql);
	
		$sql = "ALTER TABLE `" . table_categories . "` CHANGE `lft` `lft` int(11) NOT NULL default '0';";
		$db->query($sql);
	}
	
	$sql = "UPDATE `" . table_categories . "` SET `category__auto_id` = '0' WHERE `category_name` = 'all' LIMIT 1;";
	$db->query($sql);
	
	$fieldexists = checkforfield('last_reset_code', table_users);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `" . table_users . "` ADD `last_reset_code` varchar(255) default NULL;";
		$db->query($sql);
	}
	$fieldexists = checkforfield('user_enabled', table_users);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `" . table_users . "` ADD `user_enabled` tinyint(1) default '1';";
		$db->query($sql);
	}
	
	$fieldexists = checkforfield('last_email_friend', table_users);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `" . table_users . "` ADD `last_email_friend` timestamp NOT NULL;";
		$db->query($sql);
	}
	
	$fieldexists = checkforfield('user_categories', table_users);
	if (!$fieldexists) {
		// DB 04/13/09
		$categories = $db->get_results("SELECT category_id FROM `".table_categories."` WHERE category_id>0",ARRAY_A);
		$cats = array();
		if ($categories)
		    foreach ($categories as $cat)
			$cats[] = $cat['category_id'];
		
		$sql = "ALTER TABLE `" . table_users . "` ADD `user_categories` VARCHAR(255) NOT NULL default '' AFTER `user_occupation`;";
		$db->query($sql);
		/////
	} else {
		$sql = "CHANGE  `user_categories`  `user_categories` VARCHAR( 255 ) DEFAULT  ''";
		$db->query($sql);
		if (get_misc_data('user_cat')!='changed')
		{
			$sqlGetiCategory = "SELECT category__auto_id from " . table_categories . " where category__auto_id!= 0;";
			$sqlGetiCategoryQ = mysql_query($sqlGetiCategory);
			$arr = array();
			while ($row = mysql_fetch_array($sqlGetiCategoryQ, MYSQL_NUM)) 
				$arr[] = $row[0];

			$result = mysql_query("SELECT * FROM ".table_users);
			while ($row = mysql_fetch_array($result))
			{
			    $cats = split(',',$row['user_categories']);
			    $diff = array_diff($arr,$cats);
			    mysql_query($sql="UPDATE ".table_users." SET user_categories='".join(',',$diff)."' WHERE user_id='{$row['user_id']}'");
			}

			misc_data_update('user_cat','changed');
		}
	}

	$fieldexists = checkforfield('category_desc', table_categories);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `" . table_categories . "` ADD `category_desc` varchar(255) NOT NULL;";
		$db->query($sql);
	}
	
	$fieldexists = checkforfield('category_keywords', table_categories);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `" . table_categories . "` ADD `category_keywords` varchar(255) NOT NULL;";
		$db->query($sql);
	}
	
	$sql = "ALTER TABLE `" . table_links . "` ADD FULLTEXT `link_search` (
	`link_title` ,
	`link_content` ,
	`link_tags`
	);";
	$show_errors = $db->show_errors;
	$db->show_errors = false;
	$db->query($sql);
	$db->show_errors = $show_errors;
	
	$tableexists = checkfortable(table_formulas);
        if (!$tableexists) {
		$sql = "CREATE TABLE `" . table_formulas . "` (
			  `id` int(11) NOT NULL auto_increment,
			  `type` varchar(10) NOT NULL,
			  `enabled` tinyint(1) NOT NULL,
			  `title` varchar(50) NOT NULL,
			  `formula` text NOT NULL,
			  PRIMARY KEY  (`id`)
			) TYPE = MyISAM;";
		$db->query($sql);
        
		$sql = 'INSERT INTO `' . table_formulas . '` (`id`, `type`, `enabled`, `title`, `formula`) VALUES (1, \'report\', 1, \'Simple Story Reporting\', \'$reports > $votes * 3\');';
		$db->query($sql);
	}
	
	
	$tableexists = checkfortable(table_redirects);
	if (!$tableexists) {
        	$sql = "CREATE TABLE `" . table_redirects . "` (
			  `redirect_id` int(11) NOT NULL auto_increment,
			  `redirect_old` varchar(255) NOT NULL,
			  `redirect_new` varchar(255) NOT NULL,
			  PRIMARY KEY  (`redirect_id`),
			  KEY `redirect_old` (`redirect_old`)
			) TYPE = MyISAM;";
		$db->query($sql);
	}
	$fieldexists = checkforfield('category_author_level', table_categories);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `" . table_categories . "` ADD `category_author_level` enum('normal','admin','god') NOT NULL default 'normal';";
		$db->query($sql);
	}
	
	$fieldexists = checkforfield('category_author_group', table_categories);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `" . table_categories . "` ADD `category_author_group` VARCHAR(255) NOT NULL default '';";
		$db->query($sql);
	}

	$fieldexists = checkforfield('category_votes', table_categories);
	if (!$fieldexists) {
		$sql = "ALTER TABLE `" . table_categories . "` ADD `category_votes` VARCHAR(4) NOT NULL default '';";
		$db->query($sql);
	}

        $sql = "DELETE FROM " . table_config . " WHERE var_name='enable_show_last_visit'";
	$db->query($sql);
	
	$sql = "DELETE FROM `" . table_config . "` WHERE `var_name` = 'StorySummary_ContentTruncate';";
	$db->query($sql);
	
	// Change the default template value to Wistie
	$sql = "UPDATE `" . table_config . "` SET `var_defaultvalue` = 'wistie' WHERE `var_name` = '$thetemp';";
	$db->query($sql);
	
	// Delete Pageviews and Captcha
	$sql = "DELETE FROM `" . table_config . "` WHERE `var_name` = 'PageViews';";
	$db->query($sql);
        $sql = "DELETE FROM `" . table_config . "` WHERE `var_page` = 'Captcha';";
	$db->query($sql);
	
	// Change config categories for 1.0
	$sql = "UPDATE `" . table_config . "` SET `var_page` = 'SEO' WHERE `var_page` = 'UrlMethod';";
	$db->query($sql);
	$sql = "UPDATE `" . table_config . "` SET `var_page` = 'SEO' WHERE `var_page` = 'FriendlyURLs';";
	$db->query($sql);
	$sql = "UPDATE `" . table_config . "` SET `var_page` = 'Misc' WHERE `var_page` = 'Trackback';";
	$db->query($sql);
	$sql = "UPDATE `" . table_config . "` SET `var_page` = 'Misc' WHERE `var_page` = 'ExtraFields';";
	$db->query($sql);
	$sql = "UPDATE `" . table_config . "` SET `var_page` = 'Misc' WHERE `var_page` = 'Social';";
	$db->query($sql);

	print "Upgrading to UTF-8<br />";
	$stmts = explode(';', file_get_contents(dirname(__FILE__) . '/utf8.sql'));
	foreach($stmts as $stmt) {
	  $stmt = str_replace("`pligg_", "`".table_prefix, $stmt);
  	  mysql_query($stmt);
	}
	
	// echo 'Clearing cache/templates_c directory...<br />';
	include_once('../Smarty.class.php');
	$smarty = new Smarty;
	$smarty->config_dir= '';
	$smarty->compile_dir = "../cache/templates_c";
	$smarty->template_dir = "../templates";
	$smarty->config_dir = "..";
	$smarty->clear_compiled_tpl();
	
	include(mnminclude.'admin_config.php');
	$config = new pliggconfig;
	$config->create_file("../settings.php");
	
	echo '<br /><b>' . $lang['IfNoError'] . '</b>';

    //end of if post submit is Yes.
    }
//end of no errors
}
else { 
	echo DisplayErrors($errors);
	echo '<p>' . $lang['PleaseFix'] . '</p>';
}

$include='footer.php'; if (file_exists($include)) { include_once($include); }
?>



