<?php
// The source code packaged with this file is Free Software, Copyright (C) 2005 by
// Ricardo Galli <gallir at uib dot es>.
// It's licensed under the AFFERO GENERAL PUBLIC LICENSE unless stated otherwise.
// You can get copies of the licenses here:
// 		http://www.affero.org/oagpl.html
// AFFERO GENERAL PUBLIC LICENSE is also included in the file called "COPYING".

if(!defined('mnminclude')){header('Location: ../404error.php');}

class Link {
	var $id = 0;
	var $author = -1;
	var $username = false;
	var $randkey = 0;
	var $karma = 1;
	var $valid = true;
	var $date = false;
	var $published_date = 0;
	var $modified = 0;
	var $url = '';
	var $url_title = '';
	var $url_description = '';
	var $encoding = false;
	var $status = 'discard';
	var $type = '';
	var $category = 0;
	var $votes = 0;
	var $comments = 0;
	var $reports = 0;
	var $title = '';
	var $title_url = '';
	var $tags = '';
	var $content = '';
	var $html = true;
	var $trackback = false;
	var $read = true;
	var $fullread = true;
	var $voted = false;
	var $link_field1 = '';
	var $link_field2 = '';
	var $link_field3 = '';
	var $link_field4 = '';
	var $link_field5 = '';
	var $link_field6 = '';
	var $link_field7 = '';
	var $link_field8 = '';
	var $link_field9 = '';
	var $link_field10 = '';
	var $link_field11 = '';
	var $link_field12 = '';
	var $link_field13 = '';
	var $link_field14 = '';
	var $link_field15 = '';
	var $link_group_id = 0;
	var $current_user_votes = 0;
	var $current_user_reports = 0;
	var $debug = false;
	var $check_saved = true; // check to see if the user has 'saved' this link. sidebarstories doesn't need to check (so don't waste time on it)
	var $get_author_info = true; // get information about the link_author. sidebarstories doesn't need this information (so don't waste time on it)
	var $check_friends = true; // see if the author is a friend of the logged in user.  sidebarstories doesn't need this information (so don't waste time on it)

	function get($url) {
		$url=trim($url);

		if(CHECK_SPAM && $this->check_spam($url)){
			$this->valid = false;
			return;
		}
		if(Validate_URL != false){
			if($url != 'http://' && $url != ''){
				$r = new PliggHTTPRequest($url);
				$xxx = $r->DownloadToString();
			} else {
				$this->url='http://';
				$xxx = '';
			}
		}else{
			$xxx = "";
			$this->valid = true;
			$this->url=$url;
			return;
		}


		if(!($this->html = $xxx)) {
			return;
		}

		if($xxx == "BADURL") {
			$this->valid = false; return;
		}

		$this->valid = true;
		$this->url=$url;
		if(preg_match('/charset=([a-zA-Z0-9-_]+)/i', $this->html, $matches)) {
			$this->encoding=trim($matches[1]);
			//you need iconv to encode to utf-8
			if(function_exists("iconv"))
			{
				if(strcasecmp($this->encoding, 'utf-8') != 0) {
					//convert the html code into utf-8 whatever encoding it is using
					$this->html=iconv($this->encoding, 'UTF-8//IGNORE', $this->html);
				}
			}
		}
		if(preg_match("'<title>([^<]*?)</title>'", $this->html, $matches)) {
			$this->url_title=trim($matches[1]);
		}
		if(preg_match("'<meta name=\"description\" content=\"([^<]*?)\" />'", $this->html, $matches)) {
			$this->url_description=$matches[1];
		}
		
		// Detect trackbacks
		if (sanitize($_POST['trackback'], 3) != '') {
			$this->trackback=trim(sanitize($_POST['trackback'], 3));
		} elseif (preg_match('/trackback:ping="([^"]+)"/i', $this->html, $matches) ||
			preg_match('/trackback:ping +rdf:resource="([^>]+)"/i', $this->html, $matches) ||
			preg_match('/<trackback:ping>([^<>]+)/i', $this->html, $matches)) {
			$this->trackback=trim($matches[1]);
		} elseif (preg_match('/<a[^>]+rel="trackback"[^>]*>/i', $this->html, $matches)) {
			if (preg_match('/href="([^"]+)"/i', $matches[0], $matches2)) {
				$this->trackback=trim($matches2[1]);
			}
		} elseif (preg_match('/<a[^>]+href=[^>]+>trackback<\/a>/i', $this->html, $matches)) {
			if (preg_match('/href="([^"]+)"/i', $matches[0], $matches2)) {
				$this->trackback=trim($matches2[1]);
			}
		}

	}
	function type() {
		if (empty($this->type)) {
			return 'normal';
		}
		return $this->type;
	}

	function store() {
		global $db, $current_user;

		// DB 09/03/08
		if(!is_numeric($this->id)){return false;}
		/////
		$this->store_basic();
		$link_url = $db->escape($this->url);
		$link_url_title = $db->escape($this->url_title);
		$link_url_description = $db->escape($this->url_description);
		$link_title = $db->escape($this->title);
		$link_title_url = $db->escape($this->title_url);
		if($link_title_url == ""){$link_title_url = makeUrlFriendly($this->title);}
		$link_tags = $db->escape($this->tags);
		$link_content = $db->escape($this->content);
		$link_field1 = $db->escape($this->link_field1);
		$link_field2 = $db->escape($this->link_field2);
		$link_field3 = $db->escape($this->link_field3);
		$link_field4 = $db->escape($this->link_field4);
		$link_field5 = $db->escape($this->link_field5);
		$link_field6 = $db->escape($this->link_field6);
		$link_field7 = $db->escape($this->link_field7);
		$link_field8 = $db->escape($this->link_field8);
		$link_field9 = $db->escape($this->link_field9);
		$link_field10 = $db->escape($this->link_field10);
		$link_field11 = $db->escape($this->link_field11);
		$link_field12 = $db->escape($this->link_field12);
		$link_field13 = $db->escape($this->link_field13);
		$link_field14 = $db->escape($this->link_field14);
		$link_field15 = $db->escape($this->link_field15);
		$link_group_id = $db->escape($this->link_group_id);
		$link_summary = $db->escape($this->link_summary);
		$sql = "UPDATE " . table_links . " set link_summary='$link_summary', link_title_url='$link_title_url', link_url='$link_url', link_url_title='$link_url_title', link_title='$link_title', link_content='$link_content', link_tags='$link_tags', link_field1='$link_field1', link_field2='$link_field2', link_field3='$link_field3', link_field4='$link_field4', link_field5='$link_field5', link_field6='$link_field6', link_field7='$link_field7', link_field8='$link_field8', link_field9='$link_field9', link_field10='$link_field10', link_field11='$link_field11', link_field12='$link_field12', link_field13='$link_field13', link_field14='$link_field14', link_field15='$link_field15', link_group_id = $link_group_id WHERE link_id=$this->id";
		if($this->debug == true){echo '<hr>Store:'. $sql . '<hr>';}
		//echo "query".$sql;
		$db->query($sql);
		
		$pos = strrpos($_SERVER["SCRIPT_NAME"], "/");
		$script_name = substr($_SERVER["SCRIPT_NAME"], $pos + 1, 100);
		$script_name = str_replace(".php", "", $script_name);

	}

	function store_basic() {
		global $db, $current_user;

		// DB 09/03/08
		if(!is_numeric($this->id)){return false;}
		/////
		if(!$this->date) $this->date=time();
		$link_author = $this->author;
		$link_status = $this->status;
		$link_votes = $this->votes;
		$link_comments = $this->comments;
		$link_reports = $this->reports;
		$link_karma = $this->karma;
		$link_randkey = $this->randkey;
		$link_category = $this->category;
		$link_date = $this->date;
		if($this->published_date == 0){$this->published_date = 943941600;}
		$link_published_date = $this->published_date;
		$link_group_id = $this->link_group_id;

		$vars = array('link' => $this);
		check_actions('link_store_basic_pre_sql', $vars);		

		if($this->id===0) {
			$sql = "INSERT IGNORE INTO " . table_links . " (link_author, link_status, link_randkey, link_category, link_date, link_published_date, link_votes, link_karma, link_title, link_content ,link_group_id) VALUES ($link_author, '$link_status', $link_randkey, $link_category, FROM_UNIXTIME($link_date), FROM_UNIXTIME($link_published_date), $link_votes, $link_karma, '', '',$link_group_id)";
			if($this->debug == true){echo '<hr>store_basic:Insert:' . $sql . '<hr>';}
			$db->query($sql);
			$this->id = $db->insert_id;
		} else {
		// update
			$sql = "UPDATE " . table_links . " set `link_reports`=$link_reports, `link_comments`=$link_comments, link_author=$link_author, link_status='$link_status', link_randkey=$link_randkey, link_category='$link_category', link_modified=NULL, link_date=FROM_UNIXTIME($link_date), link_published_date=FROM_UNIXTIME($link_published_date), link_votes=$link_votes, link_karma=$link_karma, link_group_id=$link_group_id WHERE link_id=$this->id";
			if($this->debug == true){echo '<hr>store_basic:Update:' . $sql . '<hr>';}
			$db->query($sql);
		}

		$vars = array('link' => $this);
		check_actions('link_store_basic_post_sql', $vars);		

	}

	function read($usecache = TRUE) {
		global $db, $current_user, $cached_links;
		$id = $this->id;
		$this->rating = 0;
		if(!is_numeric($id)){return false;}
		// check to see if the link is cached
		// if it is, use it
		// if not, get from mysql and save to cache
		
		if (isset($cached_links[$id]) && $usecache == TRUE) {
			$link = $cached_links[$id];
		} else {
			$link = $db->get_row("SELECT " . table_links . ".* FROM " . table_links . " WHERE link_id = $id");
			$cached_links[$id] = $link;
		}
    
		if($link) {
			$this->author=$link->link_author;
			$this->userid=$link->link_author;
			$this->status=$link->link_status;
			$this->votes=$link->link_votes;
			$this->reports=$link->link_reports;
			$this->comments=$link->link_comments;
			$this->randkey=$link->link_randkey;
			$this->category=$link->link_category;
			$this->url= $link->link_url;
			$this->url= str_replace('&amp;', '&', $link->link_url);  
			$this->url_title=$link->link_url_title;
			$this->url_description=$link->link_url_description;
			$this->title=$link->link_title;
			$this->title_url=$link->link_title_url;
			$this->tags=$link->link_tags;
			$this->content=$link->link_content;     
// DB 01/08/09
			$this->date=strtotime($link->link_date);
//			$date=$link->link_date;
//			$this->date=$db->get_var("SELECT UNIX_TIMESTAMP('$date')");
			$this->published_date=strtotime($link->link_published_date);
//			$date=$link->link_published_date;
//			$this->published_date=$db->get_var("SELECT UNIX_TIMESTAMP('$date')");
			$this->modified=strtotime($link->link_modified);
//			$date=$link->link_modified;
//			$this->modified=$db->get_var("SELECT UNIX_TIMESTAMP('$date')");
/////
			$this->fullread = $this->read = true;
			$this->link_summary = $link->link_summary;

			$this->link_field1=$link->link_field1;
			$this->link_field2=$link->link_field2;
			$this->link_field3=$link->link_field3;
			$this->link_field4=$link->link_field4;
			$this->link_field5=$link->link_field5;
			$this->link_field6=$link->link_field6;
			$this->link_field7=$link->link_field7;
			$this->link_field8=$link->link_field8;
			$this->link_field9=$link->link_field9;
			$this->link_field10=$link->link_field10;
			$this->link_field11=$link->link_field11;
			$this->link_field12=$link->link_field12;
			$this->link_field13=$link->link_field13;
			$this->link_field14=$link->link_field14;
			$this->link_field15=$link->link_field15;
			$this->link_group_id=$link->link_group_id;

			return true;
		}
		$this->fullread = $this->read = false;
		return false;
	}

	function read_basic() {
		global $db, $current_user;
		$this->username = false;
		$this->fullread = false;
		$this->rating = 0;
		$id = $this->id;
		if(!is_numeric($id)){return false;}
		if(($link = $db->get_row("SELECT link_comments, link_author, link_status, link_randkey, link_category, link_date, link_votes, link_karma, link_published_date,link_group_id FROM " . table_links . " WHERE link_id = $id"))) {
			$this->author=$link->link_author;
			$this->votes=$link->link_votes;
			$this->karma=$link->link_karma;
			$this->status=$link->link_status;
			$this->randkey=$link->link_randkey;
			$this->category=$link->link_category;
			// DB 01/08/09
			$this->date=strtotime($link->link_date);
			//$date=$link->link_date;
			//$this->date=$db->get_var("SELECT UNIX_TIMESTAMP('$date')");
			$this->published_date=strtotime($link->link_published_date);
			//$date=$link->link_published_date;
			//$this->published_date=$db->get_var("SELECT UNIX_TIMESTAMP('$date')");
			/////
			$this->comments=$link->link_comments;
			$this->link_group_id=$link->link_group_id;
			$this->read = true;
			return true;
		}
		$this->read = false;
		return false;
	}

	function duplicates($url) {
		global $db;
		$link_url=$db->escape($url);
		$n = $db->get_var("SELECT count(*) FROM " . table_links . " WHERE link_url = '$link_url' AND link_status != 'discard'");
		return $n;
	}
	
	function duplicates_title($title) {
		global $db;
		$link_title=$db->escape($title);
		$n = $db->get_var("SELECT count(*) FROM " . table_links . " WHERE link_title = '$link_title' AND link_status != 'discard'");
		return $n;
	}

	
	function print_summary($type='full', $fetch = false, $link_summary_template = 'link_summary.tpl') {
		global $current_user, $globals, $the_template, $smarty;

		// DB 09/03/08
		if(!is_numeric($this->id)){return false;}
		/////
		include_once('./Smarty.class.php');

		$main_smarty = new Smarty;
		$main_smarty->compile_check=false;
		// enable caching at your own risk. this code is still experimental
		//$smarty->cache = true;
		$main_smarty->cache_lifetime = 120;

		$main_smarty->compile_dir = mnmpath."cache/templates_c/";
		$main_smarty->template_dir = mnmpath."templates/";
		$main_smarty->cache_dir = mnmpath."cache/";

		$main_smarty->config_dir = "";
		$main_smarty->assign('pligg_language', pligg_language);
		$main_smarty->config_load(lang_loc . "/languages/lang_" . pligg_language . ".conf");

		if(phpnum() == 4) {
			$main_smarty->force_compile = true;
		}

		$main_smarty = $this->fill_smarty($main_smarty, $type);

		$main_smarty->assign('use_title_as_link', use_title_as_link);
		$main_smarty->assign('open_in_new_window', open_in_new_window);
		$main_smarty->assign('the_template', The_Template);

		include mnminclude.'extra_fields_smarty.php';
	
		if($fetch == false){
			$main_smarty->display($the_template . '/' . $link_summary_template, 'story' . $this->id . "|" . $current_user->user_id . "|" . $type);
		} else {
			return $main_smarty->fetch($the_template . '/' . $link_summary_template, 'story' . $this->id . "|" . $current_user->user_id . "|" . $type);
		}
	}

	function fill_smarty($smarty, $type='full'){

		static $link_index=0;
		global $current_user, $globals, $the_template, $db;

		// DB 08/04/08
		if(!is_numeric($this->id)){return false;}
		/////
		$smarty->assign('link_id', $this->id);

		if(!$this->read) return $smarty;

		$url = str_replace('&amp;', '&', htmlspecialchars($this->url));
		$url_short = txt_shorter($url);	

		if($this->url == "http://" || $this->url == ''){
			$url_short = "http://";
		} else {
			$parsed = parse_url($this->url);
			if(isset($parsed['scheme'])){$url_short = $parsed['scheme'] . "://" . $parsed['host'];}
		}
		$title_short = htmlspecialchars(utf8_wordwrap($this->title, 30, " ", 1));

		$smarty->assign('viewtype', $type);
		$smarty->assign('URL_tagcloud', getmyurl("tagcloud"));
		$smarty->assign('No_URL_Name', No_URL_Name);
		if(track_outgoing == true && $url_short != "http://"){ 
			if(track_outgoing_method == "id"){$smarty->assign('url', getmyurl("out", ($this->id)));}
			if(track_outgoing_method == "title"){$smarty->assign('url', getmyurl("outtitle", urlencode($this->title_url)));}
			if(track_outgoing_method == "url"){$smarty->assign('url', getmyurl("outurl", ($url)));}
		} else {
			$smarty->assign('url', ($url));
		}
		// DB 11/12/08
		if ($url_short == "http://" || $url_short == "://")
			$smarty->assign('enc_url', urlencode(my_base_url.$this->get_internal_url()));
		else
			$smarty->assign('enc_url', urlencode($url));
		/////
		$smarty->assign('url_short', $url_short);
		$smarty->assign('title_short', $title_short);
		$smarty->assign('title_url', urlencode($this->title_url));
		$smarty->assign('enc_title_short', urlencode($title_short));
		$smarty->assign('story_url', $this->get_internal_url());
		$smarty->assign('story_edit_url', getmyurl("editlink", $this->id));
		$smarty->assign('story_admin_url', getmyurl("admin_modify", $this->id));
		$smarty->assign('story_comment_count', $this->comments());
		$smarty->assign('story_status', $this->status);
		if($type == "summary"){
			if($this->link_summary == ""){
				$smarty->assign('story_content', $this->truncate_content());
			} else {
				$smarty->assign('story_content', $this->link_summary);
			}
		}
		if($type == "full"){
			$smarty->assign('story_content', $this->content);
		}
		
		if($this->get_author_info == true){
			$smarty->assign('link_submitter', $this->username());
			$smarty->assign('submitter_profile_url', getmyurl('user', $this->username()));
		}
		
		$smarty->assign('link_submit_time', $this->date);
		$smarty->assign('link_submit_timeago', txt_time_diff($this->date));
		$smarty->assign('link_submit_date', date('F, d Y g:i A',$this->date));
		$smarty->assign('link_published_time', $this->published_date);
		$smarty->assign('link_published_timeago', txt_time_diff($this->published_date));
		$smarty->assign('link_category', $this->category_name());
		//assign category id to smarty, so we can use it in the templates. Needed for category colors!
		$smarty->assign('category_id', $this->category);

		global $URLMethod;

		{$catvar = $this->category_safe_name();}

		$smarty->assign('Voting_Method', Voting_Method);
		if(Voting_Method == 2)
		{
			if (!$this->rating)
			    $this->rating = $this->rating($this->id)/2;
			$smarty->assign('link_rating', $this->rating);
			$smarty->assign('link_rating_width', $this->rating * 25);

			$js5link = "vote($current_user->user_id, $this->id, $link_index, " . "'" . md5($current_user->user_id . $this->randkey) . "',10)";
			$smarty->assign('link_shakebox_javascript_vote_5star', $js5link);

			$js4link = "vote($current_user->user_id, $this->id, $link_index, " . "'" . md5($current_user->user_id . $this->randkey) . "',8)";
			$smarty->assign('link_shakebox_javascript_vote_4star', $js4link);

			$js3link = "vote($current_user->user_id, $this->id, $link_index, " . "'" . md5($current_user->user_id . $this->randkey) . "',6)";
			$smarty->assign('link_shakebox_javascript_vote_3star', $js3link);

			$js2link = "vote($current_user->user_id, $this->id, $link_index, " . "'" . md5($current_user->user_id . $this->randkey) . "',4)";
			$smarty->assign('link_shakebox_javascript_vote_2star', $js2link);

			$js1link = "vote($current_user->user_id, $this->id, $link_index, " . "'" . md5($current_user->user_id . $this->randkey) . "',2)";
			$smarty->assign('link_shakebox_javascript_vote_1star', $js1link);

			$this->votecount = $this->countvotes();
			$smarty->assign('vote_count', $this->votecount);
			
			if($this->votes($current_user->user_id) > 0){
				$smarty->assign('star_class', "-noh");
			} else {
				$smarty->assign('star_class', "");
			}
		}
		$smarty->assign('get_group_membered', $this->get_group_membered()); 
		if($this->status == "published"){$smarty->assign('category_url', getmyurl("maincategory", $catvar));}
		if($this->status == "queued"){$smarty->assign('category_url', getmyurl("queuedcategory", $catvar));}
		if($this->status == "discard"){$smarty->assign('category_url', getmyurl("discardedcategory", $catvar));}

		$smarty->assign('trackback_url', get_trackback($this->id));
		$smarty->assign('user_logged_in', $current_user->user_login);
		$smarty->assign('randmd5', md5($current_user->user_id.$this->randkey));
		$smarty->assign('user_id', $this->author);
		$smarty->assign('current_user_id', $current_user->user_id);

		if(Enable_Extra_Fields){
			$main_smarty = $smarty; include mnminclude.'extra_fields_smarty.php'; $smarty=$main_smarty;
			$smarty->assign('link_field1', $this->link_field1);
			$smarty->assign('link_field2', $this->link_field2);
			$smarty->assign('link_field3', $this->link_field3);
			$smarty->assign('link_field4', $this->link_field4);
			$smarty->assign('link_field5', $this->link_field5);
			$smarty->assign('link_field6', $this->link_field6);
			$smarty->assign('link_field7', $this->link_field7);
			$smarty->assign('link_field8', $this->link_field8);
			$smarty->assign('link_field9', $this->link_field9);
			$smarty->assign('link_field10', $this->link_field10);
			$smarty->assign('link_field11', $this->link_field11);
			$smarty->assign('link_field12', $this->link_field12);
			$smarty->assign('link_field13', $this->link_field13);
			$smarty->assign('link_field14', $this->link_field14);
			$smarty->assign('link_field15', $this->link_field15);
		}
		$smarty->assign('link_group_id', $this->link_group_id);
		$smarty->assign('Enable_Recommend', Enable_Recommend);
		$smarty->assign('Recommend_Type', Recommend_Type);
		$smarty->assign('instpath', my_base_url . my_pligg_base . "/");		
		$smarty->assign('UseAvatars', do_we_use_avatars());
		$smarty->assign('Avatar_ImgSrc', get_avatar('large', "", "", "", $this->userid));
        $smarty->assign('Avatar_ImgSrcs', get_avatar('small', "", "", "", $this->userid));

		$canIhaveAccess = 0;
		$canIhaveAccess = $canIhaveAccess + checklevel('god');
		$canIhaveAccess = $canIhaveAccess + checklevel('admin');
		if($canIhaveAccess == 1)
			{$smarty->assign('isadmin', 'yes');}

		if($this->check_friends == true){
			// For Friends //
				include_once(mnminclude.'friend.php');
				$friend = new Friend;
				// make sure we're logged in and we didnt submit the link.
				if($current_user->user_id > 0 && $current_user->user_login != $this->username()){
					$friend_md5 = friend_MD5($current_user->user_login, $this->username());
					$smarty->assign('FriendMD5', $friend_md5);
		
					$isfriend = $friend->get_friend_status($this->author);
					if (!$isfriend)	{$friend_text = 'add to';	$friend_url = 'addfriend';}
						else{$friend_text = 'remove from';	$friend_url = 'removefriend';}
		
					$smarty->assign('Friend_Text', $friend_text);				
					$smarty->assign('user_add_remove', getmyurl('user_add_remove', $this->username(), $friend_url));
				}
		
				$smarty->assign('Allow_Friends', Allow_Friends);
			// --- //
		}
		if($current_user->user_id != '')
		{
			$vars = array('author_id' => $this->author,'link_id' => $this->id);
			check_actions('friends_activity_function', $vars);
			if($vars['value'] == true){
				$smarty->assign('friendvoted', 1);
			}	
		}
		/*
		//for friends voting activity
		include_once(mnminclude.'friend.php');
		$friend = new Friend;
		$sql = 'SELECT ' . table_votes . '.*, ' . table_users . '.user_id FROM ' . table_votes . ' INNER JOIN ' . table_users . ' ON ' . table_votes . '.vote_user_id = ' . table_users . '.user_id WHERE (((' . table_votes . '.vote_value)>0) AND ((' . table_votes . '.vote_link_id)='.$this->id.') AND (' . table_votes . '.vote_type= "links"));';
		$voters = $db->get_results($sql);
		$voters = object_2_array($voters);
		foreach($voters as $key => $val)
		{
			$voteduserid = $val['user_id'];
			if($voteduserid == $friend->get_friend_status($this->author))
			{
				$friendvoted = 1;
			}
			$smarty->assign('friendvoted', $friendvoted);
		}*/
		if($this->check_saved == true){
			global $cached_saved_links;
			if(isset($cached_saved_links[$this->id])){
				$smarty->assign('link_mine', $cached_saved_links[$this->id]);
			} else {
				$smarty->assign('link_mine', $db->get_row("SELECT * FROM " . table_saved_links . " WHERE saved_user_id=$current_user->user_id AND saved_link_id=$this->id LIMIT 1;"));
			}
		}
		$smarty->assign('user_url_saved', getmyurl('user2', $current_user->user_login, 'saved'));
		
		$smarty->assign('user_add_links_private', getmyurl('user_add_links_private', $this->id));
		$smarty->assign('user_add_links_public', getmyurl('user_add_links_public', $this->id));
		
		$smarty->assign('group_story_links_publish', getmyurl('group_story_links_publish', $this->id));
		$smarty->assign('group_story_links_queued', getmyurl('group_story_links_queued', $this->id));
		$smarty->assign('group_story_links_discard', getmyurl('group_story_links_discard', $this->id));

		$smarty->assign('user_url_add_links', getmyurl('user_add_links', $this->id));
		$smarty->assign('user_url_remove_links', getmyurl('user_remove_links', $this->id));
		$smarty->assign('enable_tags', Enable_Tags);
		$smarty->assign('link_shakebox_index', $link_index);
		$smarty->assign('link_shakebox_votes', $this->votes);
	    $smarty->assign('link_shakebox_showbury', $this->reports);
	        
		$this->get_current_user_votes($current_user->user_id);
		
		$smarty->assign('link_shakebox_currentuser_votes', $this->current_user_votes);
		$smarty->assign('link_shakebox_currentuser_reports', $this->current_user_reports);

		if($this->reports == -1){
			// reporting was added to the svn and some people started using it
			// so in upgrade if someone already has the reports field, we set it to
			// -1. Then when we read() we check if -1. if it still is, update the count
			// from the votes table and store it into the link_reports field so we
			// don't have to look at the votes table again.
		
			$this->reports = $this->count_all_votes("<0");
			$this->store_basic();
			$smarty->assign('link_shakebox_reports', $this->reports);
		}

		$jslink = "vote($current_user->user_id,$this->id,$link_index," . "'" . md5($current_user->user_id.$this->randkey) . "',10)";
		$jsreportlink = "vote($current_user->user_id,$this->id,$link_index," . "'" . md5($current_user->user_id.$this->randkey) . "',-10)";
		$smarty->assign('link_shakebox_javascript_vote', $jslink);

		$jsunvote = "unvote($current_user->user_id,$this->id,$link_index," . "'" . md5($current_user->user_id.$this->randkey) . "',10)";
		$smarty->assign('link_shakebox_javascript_unvote', $jsunvote);
		
		$smarty->assign('link_shakebox_javascript_report', $jsreportlink);
		if(!defined('alltagtext')){
			// for pages like index, this ->display was being called for each story
			// which was sometimes 15+ times per page. this way it's just called once
			$smarty->display('blank.tpl'); //this is just to load the lang file so we can pull from it in php
			define('alltagtext', $smarty->get_config_vars('PLIGG_Visual_Tags_All_Tags')); 			
		}
		$alltagtext = alltagtext;
	
		if(Enable_Tags){
			$smarty->assign('tags', $this->tags);
			if (!empty($this->tags)) {
				$tags_words = str_replace(", ", ",", $this->tags);
				$tags_count = substr_count($tags_words, ',');
				if ($tags_count > 1){$tags_words = $tags_words;}

				$tag_array = explode(",", $tags_words);
				$c = count($tag_array);
				$tag_array[$c] = $this->tags;
 				$c++;
 				for($i=0; $i<=$c; $i++)
 				{
 					if(isset($tag_array[$i])){
						if ( $URLMethod == 1 ) { 
						    $tags_url_array[$i] = my_pligg_base . "/search.php?search=".urlencode(trim($tag_array[$i]))."&amp;tag=true";
						} elseif ( $URLMethod == 2) {
						    $tags_url_array[$i] = my_pligg_base . "/tag/" . urlencode(trim($tag_array[$i]));
				    }
				  }
 				}
 				$tag_array[$c - 1] = $alltagtext;

				$smarty->assign('tag_array', $tag_array);
				$smarty->assign('tags_url_array', $tags_url_array);

				$tags_url = urlencode($this->tags);
				$smarty->assign('tags_count', $tags_count);
				$smarty->assign('tags_words', $tags_words);
				$smarty->assign('tags_url', $tags_url);
			}
		}
		$smarty->assign('enable_group', enable_group);
		$smarty->assign('pagename', pagename);
		$smarty->assign('my_base_url', my_base_url);
		$smarty->assign('my_pligg_base', my_pligg_base);
		$smarty->assign('Default_Gravatar_Large', Default_Gravatar_Large);
			
		$link_index++;
		$vars['smarty'] = $smarty;
		check_actions('lib_link_summary_fill_smarty', $vars);

		return $smarty;
	}

	//sharing membered group list
	function get_group_membered()
	{
		global $db, $main_smarty, $rows,$current_user;
		$current_userid = $current_user->user_id;
		if (!isset($this->group_membered) && $current_userid)
//		    $this->group_membered = $db->get_results("SELECT group_id,group_name FROM " . table_groups . " WHERE group_creator = $current_userid and group_status = 'Enable'");
		    $this->group_membered = $db->get_results("SELECT DISTINCT group_id,group_name FROM " . table_groups . " LEFT JOIN ".table_group_member." ON member_group_id=group_id AND member_user_id = $current_userid WHERE group_status = 'Enable' AND member_status='active'");

		$output = '';
		if ($this->group_membered)
			foreach($this->group_membered as $results)
				$output .= "<a class='group_member_share' href='".my_base_url.my_pligg_base."/group_share.php?link_id=".$this->id."&group_id=".$results->group_id."&user_id=".$current_user->user_id."' >".$results->group_name."</a><br />";

		return $output;

	}
	//--------------------------------------
	function truncate_content(){
		if(strlen($this->content) > StorySummary_ContentTruncate){ return close_tags(substr($this->content, 0, StorySummary_ContentTruncate)) . "...";}
		return $this->content;
	}

	function print_shake_box($smarty) {
		global $current_user;
	}

	function rating($linkid)
	{
		require_once(mnminclude.'votes.php');

		$vote = new Vote;
		$vote->type='links';
		$vote->link=$linkid;
		return $vote->rating();
	}

	function countvotes() {
		require_once(mnminclude.'votes.php');

		$vote = new Vote;
		$vote->type='links';
		$vote->link=$this->id;
		return $vote->anycount();
	}

	function count_all_votes($value="> 0") {
		require_once(mnminclude.'votes.php');

		$vote = new Vote;
		$vote->type='links';
		$vote->link=$this->id;
		return $vote->count_all($value);
	}

	function votes($user) {
		require_once(mnminclude.'votes.php');

		$vote = new Vote;
		$vote->type='links';
		$vote->user=$user;
		$vote->link=$this->id;
		return $vote->count();
	}

	function reports($user) {
		require_once(mnminclude.'votes.php');

		$vote = new Vote;
		$vote->type='links';
		$vote->user=$user;
		$vote->link=$this->id;
		return $vote->reports();
	}

	// DB 11/10/08
	function votes_from_ip($ip='') {
		require_once(mnminclude.'votes.php');

		$vote = new Vote;
		$vote->type='links';
		if ($ip)
		    $vote->ip=$ip;
		else {
		    require_once(mnminclude.'check_behind_proxy.php');
		    $vote->ip=check_ip_behind_proxy();
		}
		$vote->link=$this->id;
		return $vote->count();
	}

	function reports_from_ip($ip='') {
		require_once(mnminclude.'votes.php');

		$vote = new Vote;
		$vote->type='links';
		if ($ip)
		    $vote->ip=$ip;
		else {
		    require_once(mnminclude.'check_behind_proxy.php');
		    $vote->ip=check_ip_behind_proxy();
		}
		$vote->link=$this->id;
		return $vote->reports();
	}
	/////

	function get_current_user_votes($user) {
		require_once(mnminclude.'votes.php');
		
		$vote = new Vote;
		$vote->type='links';
		$vote->user=$user;
		$vote->link=$this->id;
		$results = $vote->user_list_all_votes();
		
		$votes = 0;
		$reports = 0;
		
		if(is_array($results)){
			foreach ($results as $row){
				if(isset($row->vote_value)){
				if($row->vote_value > 0){$votes = $votes + 1;}
				if($row->vote_value < 0){$reports = $reports + 1;}
			}
		}
		}
				
		$this->current_user_votes = $votes;
		$this->current_user_reports = $reports;
		
	}

	function remove_vote($user=0, $value=10) {
	
		$vote = new Vote;
		$vote->type='links';
		$vote->user=$user;
		$vote->link=$this->id;
		$vote->value=$value;
		$vote->remove();

			$vote = new Vote;
			$vote->type='links';
			$vote->link=$this->id;
			if(Voting_Method == 1){
				$this->votes=$vote->count();
				$this->reports = $this->count_all_votes("<0");
			}
			if(Voting_Method == 2){
				$this->votes=$vote->rating();
				$this->votecount=$vote->count();
				$this->reports = $this->count_all_votes("<0");
			}
			$this->store_basic();

	}
	
	function insert_vote($user=0, $value=10) {
		global $anon_karma;
		require_once(mnminclude.'votes.php');
		if($value>10){$value=10;}
		$vote = new Vote;
		$vote->type='links';
		$vote->user=$user;
		$vote->link=$this->id;
		$vote->value=$value;
		if($value<10) {$vote->value=($anon_karma/10)*$value;}
		if($user>0) {
			require_once(mnminclude.'user.php');
			$dbuser = new User($user);
			if($dbuser->id>0) {
				if($value<10) {$vote->value = ($dbuser->karma/10)*$value;}
			}
		} else if (!anonymous_vote)
			return;
		if($vote->insert()) {
			$vote = new Vote;
			$vote->type='links';
			$vote->link=$this->id;
			if(Voting_Method == 1){
				$this->votes=$vote->count();
				$this->reports = $this->count_all_votes("<0");
			}
			if(Voting_Method == 2){
				$this->votes=$vote->rating();
				$this->votecount=$vote->count();
				$this->reports = $this->count_all_votes("<0");
			}
			$this->store_basic();
			$this->check_should_publish();
			
			$vars = array('vote' => $this);
			check_actions('link_insert_vote_post', $vars);		
			
			return true;
		}
		return false;
	}

	function check_should_publish(){
	
		$votes = $this->category_votes();
		if (!is_numeric($votes))
		    $votes = votes_to_publish;
		if(Voting_Method == 1){
			// check to see if we should change the status to publish
			if($this->status == 'queued' && $this->votes>=$votes) {
				$now = time();
				$diff=$now-$this->date;
				$days=intval($diff/86400);
				if ($days <=days_to_publish) {
					$this->publish();
				}
			}
		}
	
		if(Voting_Method == 2){
			if($this->status == 'queued' && $this->votes>=(rating_to_publish * 2) && $this->votecount>=$votes) {
				$now = time();
				$diff=$now-$this->date;
				$days=intval($diff/86400);
				if ($days <=days_to_publish+1000) {
					$this->publish();
				}
			}
		}
	}

	function category_votes() {
		// $the_cats is set in /libs/smartyvariables.php

		global $dblang, $the_cats;

		foreach($the_cats as $cat){
			if($cat->category_id == $this->category)
				return $cat->category_votes; 
		}

		return $main_smarty->get_config_vars('PLIGG_Visual_Submit3Errors_NoCategory');
	}

	function category_name() {
		// $the_cats is set in /libs/smartyvariables.php

		global $dblang, $the_cats, $main_smarty;

		foreach($the_cats as $cat){
			if($cat->category_id == $this->category)
//			if($cat->category_id == $this->category && $cat->category_lang == $dblang)
			{ 
				return $cat->category_name; 
			}
		}

		return $main_smarty->get_config_vars('PLIGG_Visual_Submit3Errors_NoCategory');
	}

	function category_safe_name() {
		// $the_cats is set in /libs/smartyvariables.php

		global $dblang, $the_cats;

		foreach($the_cats as $cat){
			if($cat->category_id == $this->category && $cat->category_lang == $dblang)
			{ 
				return $cat->category_safe_name; 
			}
		}
	}
	
	function publish() {
		if(!$this->read) $this->read_basic();
		$this->published_date = time();

		totals_adjust_count($this->status, -1);
		totals_adjust_count('published', 1);

		$this->status = 'published';
		$this->store_basic();
	}

	function username() {
		global $db;
		include_once(mnminclude.'user.php');

		$user = new User;
		$user->id = $this->author;
		$user->read('short');
	  
		$this->username = $user->username;
	    
		return $user->username;
	}


	function recalc_comments(){
		global $db;
		
		// DB 08/04/08
		if(!is_numeric($this->id)){return false;}
		/////
		$this->comments = $db->get_var("SELECT count(*) FROM " . table_comments . " WHERE comment_status='published' AND comment_link_id = $this->id");
	}


	function comments() {
		global $db;

		if(summarize_mysql == 1){		
			return $this->comments;
		}else{
		// DB 08/04/08
		if(!is_numeric($this->id)){return false;}
		/////
		return $db->get_var("SELECT count(*) FROM " . table_comments . " WHERE comment_status='published' AND comment_link_id = $this->id");
		}
	}

	function evaluate_formulas ()
	{
		global $db;
		
		$res = $db->get_results("select * from " . table_formulas . " where type = 'report' and enabled = 1;");
		if (!$res) return;
		foreach ($res as $formula) {
			$reports = $this->count_all_votes("< 0");
			$votes = $this->count_all_votes("> 0");

			$from = $this->date;
			$now = time();
			$diff=$now-$from;
			$hours=($diff/3600);
			$hours_since_submit = intval($hours * 100) / 100;

			$evalthis = 'if (' . $formula->formula . '){return "1";}else{return "0";}';
			if(eval($evalthis) == 1){
				totals_adjust_count($this->status, -1);
				totals_adjust_count('discard', 1);

				$this->status = 'discard';
				$this->store_basic();
			} 
		}
		
	}
	
	function return_formula_system_version()
	{
		// 0.1 original
		// 0.2 added hours_since_submit
		
		return 0.2;
	}
	
	function adjust_comment($value)
	{
		$this->comments = $this->comments + $value;
	}

	function verify_ownership($authorid){
		global $db;
		
		// DB 09/03/08
		if(!is_numeric($this->id)){return false;}
		if(!is_numeric($authorid)){return false;}
		/////
		$sql = 'SELECT `link_id` from `' . table_links . '` WHERE `link_id` = ' . $this->id . ' AND `link_author` = ' . $authorid . ' ORDER BY `link_date` DESC LIMIT 1;';
		if($db->get_var($sql)){
			return true;
		} else {
			return false;
		}
	}

	function get_internal_url(){
		// returns the internal (comments page) url	
		if ($this->title_url == ""){
			return getmyurl("story", $this->id);
		} else {
			return getmyurl("storyURL", $this->category_safe_name(), urlencode($this->title_url), $this->id);
		}
	}
	
	function check_spam($text )
	{
		global $MAIN_SPAM_RULESET;
		global $USER_SPAM_RULESET;

		$regex_url   = "/(http:\/\/|https:\/\/|ftp:\/\/|www\.)([^\/\"<\s]*)/im";
		$mk_regex_array = array();
		preg_match_all($regex_url, $text, $mk_regex_array);

		for( $cnt=0; $cnt < count($mk_regex_array[2]); $cnt++ )
			{
			$test_domain = rtrim($mk_regex_array[2][$cnt],"\\");
			if (strlen($test_domain) > 3)
				{
				$domain_to_test = $test_domain . ".multi.surbl.org";
				if( strstr(gethostbyname($domain_to_test),'127.0.0'))
					{ logSpam( "surbl rejected $test_domain");  return true; }
				}
			}
		$retVal = $this->check_spam_rules($MAIN_SPAM_RULESET, strtoupper($text));
		if(!$retVal) { $retVal = $this->check_spam_rules($USER_SPAM_RULESET, strtoupper($text)); }

		return $retVal;
	}

	#####################################
	# check a file of local rules
	# . . the rules are written in a regex format for php
	#     . . or one entry per line eg: bigtimespammer.com on one line
	####################

	function check_spam_rules($ruleFile, $text)
	{
		if(!file_exists( $ruleFile)) { echo $ruleFile . " does not exist\n"; return false; }
		$handle = fopen( $ruleFile, "r");
		while (!feof($handle))
		{
			$buffer = fgets($handle, 4096);
			$splitbuffer = explode("####", $buffer);
			// Parse domain name from a line
			$expression = parse_url(trim($splitbuffer[0]),PHP_URL_HOST);
		   	if (!$expression) $expression = trim($splitbuffer[0]);
			// Make it regexp compatible
			$expression = str_replace('.','\.',$expression);
			// Check $text against http://<domain>
			if (strlen($expression) > 0 && preg_match("/\/\/([^\.]+\.)*$expression(\/|$)/i", $text))
			{ 
				$this->logSpam( "$ruleFile violation: $expression"); 
				return true; 
			}
		}
		fclose($handle);
		return false;
	}

	
	// log date, time, IP address and rule which triggered the spam	
	function logSpam($message)
	{
		global $SPAM_LOG_BOOK;

		$ip = "127.0.0.0";
		if(!empty($_SERVER["REMOTE_ADDR"])) { $ip = $_SERVER["REMOTE_ADDR"]; }
		$date = date('M-d-Y');
		$timestamp = time();

		$message = $date . "\t" . $timestamp . "\t" . $ip . "\t" . $message . "\n";

		$file = fopen( $SPAM_LOG_BOOK, "a");
		fwrite( $file, $message );
		fclose($file);
	}

}
class PliggHTTPRequest
{
   var $_fp;        // HTTP socket
   var $_url;        // full URL
   var $_host;        // HTTP host
   var $_protocol;    // protocol (HTTP/HTTPS)
   var $_uri;        // request URI
   var $_port;        // port

   // scan url
   function _scan_url()
   {
       $req = $this->_url;

       $pos = strpos($req, '://');
       $this->_protocol = strtolower(substr($req, 0, $pos));

       $req = substr($req, $pos+3);
       $pos = strpos($req, '/');
       if($pos === false)
           $pos = strlen($req);
       $host = substr($req, 0, $pos);

       if(strpos($host, ':') !== false)
       {
           list($this->_host, $this->_port) = explode(':', $host);
       }
       else
       {
           $this->_host = $host;
           $this->_port = ($this->_protocol == 'https') ? 443 : 80;
       }

       $this->_uri = substr($req, $pos);
       if($this->_uri == '')
           $this->_uri = '/';
   }

   // constructor
   function PliggHTTPRequest($url)
   {
		$this->_url = $url;
		$this->_scan_url();
   }

   // download URL to string
   function DownloadToString()
   {
       $crlf = "\r\n";

       // generate request
       $req = 'GET ' . $this->_uri . ' HTTP/1.0' . $crlf
           .    'Host: ' . $this->_host . $crlf
           .    $crlf;

	error_reporting(E_ERROR);
	// fetch
	$this->_fp = fsockopen(($this->_protocol == 'https' ? 'tls://' : '') . $this->_host, $this->_port, $errno, $errstr, 20);
	if(!$this->_fp)
		{return("BADURL");}
	fwrite($this->_fp, $req);
       while(is_resource($this->_fp) && $this->_fp && !feof($this->_fp))
           $response .= fread($this->_fp, 1024);
       fclose($this->_fp);

       // split header and body
       $pos = strpos($response, $crlf . $crlf);
       if($pos === false)
           return($response);
       $header = substr($response, 0, $pos);
       $body = substr($response, $pos + 2 * strlen($crlf));

       // parse headers
       $headers = array();
       $lines = explode($crlf, $header);
       foreach($lines as $line)
           if(($pos = strpos($line, ':')) !== false)
               $headers[strtolower(trim(substr($line, 0, $pos)))] = trim(substr($line, $pos+1));

       // redirection?
       if(isset($headers['location']))
       {
           $http = new PliggHTTPRequest($headers['location']);
           return($http->DownloadToString($http));
       }
       else
       {
//print_r($headers);
	   if (extension_loaded('iconv') && preg_match('/charset=(.+)$/',$headers['content-type'],$m))
		$body = iconv($m[1],"UTF-8",$body);

           return($body);
       }
   }
}
?>
