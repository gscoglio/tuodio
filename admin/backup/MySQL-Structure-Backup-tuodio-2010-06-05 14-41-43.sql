DROP TABLE IF EXISTS `tuodio_categories`;

CREATE TABLE `tuodio_categories` (
  `category__auto_id` int(11) NOT NULL auto_increment,
  `category_lang` varchar(2) collate utf8_unicode_ci default 'en',
  `category_id` int(11) NOT NULL default '0',
  `category_parent` int(11) NOT NULL default '0',
  `category_name` varchar(64) collate utf8_unicode_ci default NULL,
  `category_safe_name` varchar(64) collate utf8_unicode_ci default NULL,
  `rgt` int(11) NOT NULL default '0',
  `lft` int(11) NOT NULL default '0',
  `category_enabled` int(11) NOT NULL default '1',
  `category_order` int(11) NOT NULL default '0',
  `category_desc` varchar(255) collate utf8_unicode_ci default NULL,
  `category_keywords` varchar(255) collate utf8_unicode_ci default NULL,
  `category_author_level` enum('normal','admin','god') character set latin1 NOT NULL default 'normal',
  `category_author_group` varchar(255) collate utf8_unicode_ci default NULL,
  `category_votes` varchar(4) character set latin1 NOT NULL default '',
  PRIMARY KEY  (`category__auto_id`),
  KEY `category_id` (`category_id`),
  KEY `category_parent` (`category_parent`),
  KEY `category_safe_name` (`category_safe_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_comments`;

CREATE TABLE `tuodio_comments` (
  `comment_id` int(20) NOT NULL auto_increment,
  `comment_randkey` int(11) NOT NULL default '0',
  `comment_parent` int(20) default '0',
  `comment_link_id` int(20) NOT NULL default '0',
  `comment_user_id` int(20) NOT NULL default '0',
  `comment_date` datetime NOT NULL,
  `comment_karma` smallint(6) NOT NULL default '0',
  `comment_content` text collate utf8_unicode_ci,
  `comment_votes` int(20) NOT NULL default '0',
  `comment_status` enum('discard','moderated','published') character set latin1 NOT NULL default 'published',
  `comment_anonymous_username` varchar(32) collate utf8_unicode_ci NOT NULL,
  `comment_anonymous_email` varchar(128) collate utf8_unicode_ci NOT NULL,
  `comment_anonymous_website` varchar(128) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`comment_id`),
  UNIQUE KEY `comments_randkey` (`comment_randkey`,`comment_link_id`,`comment_user_id`,`comment_parent`),
  KEY `comment_link_id` (`comment_link_id`,`comment_parent`,`comment_date`),
  KEY `comment_link_id_2` (`comment_link_id`,`comment_date`),
  KEY `comment_date` (`comment_date`),
  KEY `comment_parent` (`comment_parent`,`comment_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_config`;

CREATE TABLE `tuodio_config` (
  `var_id` int(11) NOT NULL auto_increment,
  `var_page` varchar(50) collate utf8_unicode_ci default NULL,
  `var_name` varchar(100) collate utf8_unicode_ci default NULL,
  `var_value` varchar(255) collate utf8_unicode_ci default NULL,
  `var_defaultvalue` varchar(50) collate utf8_unicode_ci default NULL,
  `var_optiontext` varchar(200) collate utf8_unicode_ci default NULL,
  `var_title` varchar(200) collate utf8_unicode_ci default NULL,
  `var_desc` text collate utf8_unicode_ci,
  `var_method` varchar(10) collate utf8_unicode_ci default NULL,
  `var_enclosein` varchar(5) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`var_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_files`;

CREATE TABLE `tuodio_files` (
  `file_id` int(11) NOT NULL auto_increment,
  `file_name` varchar(255) default NULL,
  `file_size` varchar(20) default NULL,
  `file_user_id` int(11) NOT NULL,
  `file_link_id` int(11) NOT NULL,
  `file_orig_id` int(11) NOT NULL,
  `file_real_size` int(11) NOT NULL,
  `file_number` tinyint(4) NOT NULL,
  `file_ispicture` tinyint(4) NOT NULL,
  `file_fields` text NOT NULL,
  `file_hide_thumb` tinyint(1) unsigned NOT NULL default '0',
  `file_hide_file` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `tuodio_formulas`;

CREATE TABLE `tuodio_formulas` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(10) collate utf8_unicode_ci default NULL,
  `enabled` tinyint(1) NOT NULL,
  `title` varchar(50) collate utf8_unicode_ci default NULL,
  `formula` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_friends`;

CREATE TABLE `tuodio_friends` (
  `friend_id` int(11) NOT NULL auto_increment,
  `friend_from` bigint(20) NOT NULL default '0',
  `friend_to` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`friend_id`),
  UNIQUE KEY `friends_from_to` (`friend_from`,`friend_to`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_group_member`;

CREATE TABLE `tuodio_group_member` (
  `member_id` int(20) NOT NULL auto_increment,
  `member_user_id` int(20) NOT NULL,
  `member_group_id` int(20) NOT NULL,
  `member_role` enum('admin','normal','moderator','flagged','banned') character set latin1 NOT NULL,
  `member_status` enum('active','inactive') character set latin1 NOT NULL,
  PRIMARY KEY  (`member_id`),
  KEY `user_group` (`member_group_id`,`member_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_group_shared`;

CREATE TABLE `tuodio_group_shared` (
  `share_id` int(20) NOT NULL auto_increment,
  `share_link_id` int(20) NOT NULL,
  `share_group_id` int(20) NOT NULL,
  `share_user_id` int(20) NOT NULL,
  PRIMARY KEY  (`share_id`),
  UNIQUE KEY `share_group_id` (`share_group_id`,`share_link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_groups`;

CREATE TABLE `tuodio_groups` (
  `group_id` int(20) NOT NULL auto_increment,
  `group_creator` int(20) NOT NULL,
  `group_status` enum('Enable','disable') collate utf8_unicode_ci NOT NULL,
  `group_members` int(20) NOT NULL,
  `group_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `group_safename` text collate utf8_unicode_ci,
  `group_name` text collate utf8_unicode_ci,
  `group_description` text collate utf8_unicode_ci,
  `group_privacy` enum('private','public','restricted') collate utf8_unicode_ci default NULL,
  `group_avatar` varchar(255) collate utf8_unicode_ci default NULL,
  `group_vote_to_publish` int(20) NOT NULL,
  `group_field1` varchar(255) collate utf8_unicode_ci default NULL,
  `group_field2` varchar(255) collate utf8_unicode_ci default NULL,
  `group_field3` varchar(255) collate utf8_unicode_ci default NULL,
  `group_field4` varchar(255) collate utf8_unicode_ci default NULL,
  `group_field5` varchar(255) collate utf8_unicode_ci default NULL,
  `group_field6` varchar(255) collate utf8_unicode_ci default NULL,
  `group_notify_email` tinyint(1) NOT NULL,
  PRIMARY KEY  (`group_id`),
  KEY `group_name` (`group_name`(100)),
  KEY `group_creator` (`group_creator`,`group_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_links`;

CREATE TABLE `tuodio_links` (
  `link_id` int(20) NOT NULL auto_increment,
  `link_author` int(20) NOT NULL default '0',
  `link_status` enum('discard','queued','published','abuse','duplicated','page','moderated') collate utf8_unicode_ci default 'discard',
  `link_randkey` int(20) NOT NULL default '0',
  `link_votes` int(20) NOT NULL default '0',
  `link_reports` int(20) NOT NULL default '0',
  `link_comments` int(20) NOT NULL default '0',
  `link_karma` decimal(10,2) NOT NULL default '0.00',
  `link_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `link_date` timestamp NOT NULL default '0000-00-00 00:00:00',
  `link_published_date` timestamp NOT NULL default '0000-00-00 00:00:00',
  `link_category` int(11) NOT NULL default '0',
  `link_lang` int(11) NOT NULL default '1',
  `link_url` varchar(200) collate utf8_unicode_ci default NULL,
  `link_url_title` text collate utf8_unicode_ci,
  `link_title` text collate utf8_unicode_ci,
  `link_title_url` varchar(255) collate utf8_unicode_ci default NULL,
  `link_content` mediumtext collate utf8_unicode_ci,
  `link_summary` text collate utf8_unicode_ci,
  `link_tags` text collate utf8_unicode_ci,
  `link_field1` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field2` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field3` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field4` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field5` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field6` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field7` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field8` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field9` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field10` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field11` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field12` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field13` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field14` varchar(255) collate utf8_unicode_ci default NULL,
  `link_field15` varchar(255) collate utf8_unicode_ci default NULL,
  `link_group_id` int(20) NOT NULL default '0',
  `link_group_status` enum('queued','published','discard') character set latin1 NOT NULL default 'queued',
  `link_out` int(11) NOT NULL default '0',
  PRIMARY KEY  (`link_id`),
  KEY `link_author` (`link_author`),
  KEY `link_url` (`link_url`),
  KEY `link_status` (`link_status`),
  KEY `link_title_url` (`link_title_url`),
  KEY `link_date` (`link_date`),
  KEY `link_published_date` (`link_published_date`),
  FULLTEXT KEY `link_url_2` (`link_url`,`link_url_title`,`link_title`,`link_content`,`link_tags`),
  FULLTEXT KEY `link_tags` (`link_tags`),
  FULLTEXT KEY `link_search` (`link_title`,`link_content`,`link_tags`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_messages`;

CREATE TABLE `tuodio_messages` (
  `idMsg` int(11) NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci default NULL,
  `body` text collate utf8_unicode_ci,
  `sender` int(11) NOT NULL default '0',
  `receiver` int(11) NOT NULL default '0',
  `senderLevel` int(11) NOT NULL default '0',
  `readed` int(11) NOT NULL default '0',
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`idMsg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_misc_data`;

CREATE TABLE `tuodio_misc_data` (
  `name` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `data` text collate utf8_unicode_ci,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_modules`;

CREATE TABLE `tuodio_modules` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) collate utf8_unicode_ci default NULL,
  `version` float NOT NULL,
  `latest_version` float NOT NULL,
  `folder` varchar(50) collate utf8_unicode_ci default NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_redirects`;

CREATE TABLE `tuodio_redirects` (
  `redirect_id` int(11) NOT NULL auto_increment,
  `redirect_old` varchar(255) collate utf8_unicode_ci default NULL,
  `redirect_new` varchar(255) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`redirect_id`),
  KEY `redirect_old` (`redirect_old`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_saved_links`;

CREATE TABLE `tuodio_saved_links` (
  `saved_id` int(11) NOT NULL auto_increment,
  `saved_user_id` int(11) NOT NULL,
  `saved_link_id` int(11) NOT NULL,
  `saved_privacy` enum('private','public') character set latin1 NOT NULL default 'public',
  PRIMARY KEY  (`saved_id`),
  KEY `saved_user_id` (`saved_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_snippets`;

CREATE TABLE `tuodio_snippets` (
  `snippet_id` int(11) NOT NULL auto_increment,
  `snippet_name` varchar(255) default NULL,
  `snippet_location` varchar(255) NOT NULL,
  `snippet_updated` datetime NOT NULL,
  `snippet_order` int(11) NOT NULL,
  `snippet_content` text,
  PRIMARY KEY  (`snippet_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `tuodio_tag_cache`;

CREATE TABLE `tuodio_tag_cache` (
  `tag_words` varchar(64) collate utf8_unicode_ci default NULL,
  `count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_tags`;

CREATE TABLE `tuodio_tags` (
  `tag_link_id` int(11) NOT NULL default '0',
  `tag_lang` varchar(4) collate utf8_unicode_ci default 'en',
  `tag_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `tag_words` varchar(64) collate utf8_unicode_ci default NULL,
  UNIQUE KEY `tag_link_id` (`tag_link_id`,`tag_lang`,`tag_words`),
  KEY `tag_lang` (`tag_lang`,`tag_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_totals`;

CREATE TABLE `tuodio_totals` (
  `name` varchar(10) collate utf8_unicode_ci NOT NULL default '',
  `total` int(11) NOT NULL,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_trackbacks`;

CREATE TABLE `tuodio_trackbacks` (
  `trackback_id` int(10) unsigned NOT NULL auto_increment,
  `trackback_link_id` int(11) NOT NULL default '0',
  `trackback_user_id` int(11) NOT NULL default '0',
  `trackback_type` enum('in','out') collate utf8_unicode_ci default 'in',
  `trackback_status` enum('ok','pendent','error') collate utf8_unicode_ci default 'pendent',
  `trackback_modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `trackback_date` timestamp NULL default NULL,
  `trackback_url` varchar(200) collate utf8_unicode_ci default NULL,
  `trackback_title` text collate utf8_unicode_ci,
  `trackback_content` text collate utf8_unicode_ci,
  PRIMARY KEY  (`trackback_id`),
  UNIQUE KEY `trackback_link_id_2` (`trackback_link_id`,`trackback_type`,`trackback_url`),
  KEY `trackback_link_id` (`trackback_link_id`),
  KEY `trackback_url` (`trackback_url`),
  KEY `trackback_date` (`trackback_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_users`;

CREATE TABLE `tuodio_users` (
  `user_id` int(20) NOT NULL auto_increment,
  `user_login` varchar(32) collate utf8_unicode_ci default NULL,
  `user_level` enum('normal','admin','god') collate utf8_unicode_ci default 'normal',
  `user_modification` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `user_date` timestamp NOT NULL default '0000-00-00 00:00:00',
  `user_pass` varchar(64) collate utf8_unicode_ci default NULL,
  `user_email` varchar(128) collate utf8_unicode_ci default NULL,
  `user_names` varchar(128) collate utf8_unicode_ci default NULL,
  `user_karma` decimal(10,2) default '10.00',
  `user_url` varchar(128) collate utf8_unicode_ci default NULL,
  `user_lastlogin` timestamp NOT NULL default '0000-00-00 00:00:00',
  `user_aim` varchar(64) collate utf8_unicode_ci default NULL,
  `user_msn` varchar(64) collate utf8_unicode_ci default NULL,
  `user_yahoo` varchar(64) collate utf8_unicode_ci default NULL,
  `user_gtalk` varchar(64) collate utf8_unicode_ci default NULL,
  `user_skype` varchar(64) collate utf8_unicode_ci default NULL,
  `user_irc` varchar(64) collate utf8_unicode_ci default NULL,
  `public_email` varchar(64) collate utf8_unicode_ci default NULL,
  `user_avatar_source` varchar(255) collate utf8_unicode_ci default NULL,
  `user_ip` varchar(20) collate utf8_unicode_ci default '0',
  `user_lastip` varchar(20) collate utf8_unicode_ci default '0',
  `last_reset_request` timestamp NOT NULL default '0000-00-00 00:00:00',
  `last_email_friend` timestamp NOT NULL default '0000-00-00 00:00:00',
  `last_reset_code` varchar(255) collate utf8_unicode_ci default NULL,
  `user_location` varchar(255) collate utf8_unicode_ci default NULL,
  `user_occupation` varchar(255) collate utf8_unicode_ci default NULL,
  `user_categories` varchar(1024) collate utf8_unicode_ci default '',
  `user_enabled` tinyint(1) NOT NULL default '1',
  `google_adsense_id` varchar(64) collate utf8_unicode_ci NOT NULL,
  `google_adsense_channel` varchar(64) collate utf8_unicode_ci NOT NULL,
  `google_adsense_percent` tinyint(3) unsigned NOT NULL default '50',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_login` (`user_login`),
  KEY `user_email` (`user_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `tuodio_votes`;

CREATE TABLE `tuodio_votes` (
  `vote_id` int(20) NOT NULL auto_increment,
  `vote_type` enum('links','comments') character set latin1 NOT NULL default 'links',
  `vote_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `vote_link_id` int(20) NOT NULL default '0',
  `vote_user_id` int(20) NOT NULL default '0',
  `vote_value` smallint(11) NOT NULL default '1',
  `vote_ip` varchar(64) character set latin1 default NULL,
  PRIMARY KEY  (`vote_id`),
  KEY `user_id` (`vote_user_id`),
  KEY `link_id` (`vote_link_id`),
  KEY `vote_type` (`vote_type`,`vote_link_id`,`vote_user_id`,`vote_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

