{config_load file=sidebar_stats_lang_conf}
<div class="sidebar_stats">
	<div class="headline">
		<div class="sectiontitle">{#Sidebar_Stats_Statistics#}</div>
	</div>
	<div style="padding:10px 12px;" class="sidebar_stats_content">
		<strong>{#Sidebar_Stats_Newest_Member#}:</strong>  <a href="{$my_base_url}{$my_pligg_base}/user.php?login={$last_user}">{$last_user}</a> <br />
		<strong>{#Sidebar_Stats_Members#}:</strong> {$members}<br />		
		<strong>{#Sidebar_Stats_Votes#}:</strong> {$votes}<br />
		<strong>{#Sidebar_Stats_Stories#}:</strong> {$stories}<br />
		<strong>{#Sidebar_Stats_Comments#}:</strong> {$comments}<br />
		<strong>{#Sidebar_Stats_Groups#}:</strong> {$groups}<br />
		
		{* Uncomment the lines below by removing the brackets and asterisks *} 
		{*
		<strong>{#Sidebar_Stats_Files#}:</strong> {$files}<br />
		<strong>{#Sidebar_Stats_Messages#}:</strong> {$messages}<br />
		*}
		
	</div>
</div>
{config_load file=sidebar_stats_pligg_lang_conf}