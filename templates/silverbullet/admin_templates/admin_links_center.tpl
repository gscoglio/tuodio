<fieldset><legend><img src="{$my_pligg_base}/templates/{$the_template}/images/news_manage.png" align="absmiddle" /> {#PLIGG_Visual_Header_AdminPanel_Links#}</legend>

<form action="{$my_pligg_base}/admin_links.php" method="get">
	<select name="filter">
		<option value="all" {if $templatelite.get.filter eq "all"} selected="selected" {/if}>All</option>
		<option value="published" {if $templatelite.get.filter eq "published"} selected="selected" {/if}>Published</option>
		<option value="upcoming" {if $templatelite.get.filter eq "upcoming"} selected="selected" {/if}>Queued</option>
		<option value="discard" {if $templatelite.get.filter eq "discard"} selected="selected" {/if}>Discard</option>
		<option>   ---   </option>
		<option value="today" {if $templatelite.get.filter eq "today"} selected="selected" {/if}>Today</option>
		<option value="yesterday" {if $templatelite.get.filter eq "yesterday"} selected="selected" {/if}>Yesterday</option>
		<option value="week" {if $templatelite.get.filter eq "week"} selected="selected" {/if}>This Week</option>
	</select>
	<input type="submit" value="Filter" class="log2">
</form>

<form action="{$my_pligg_base}/admin_links.php" method="get">
	<input type="hidden" name="mode" value="search">
		{if $templatelite.get.keyword neq ""}
			{assign var=searchboxtext value=$templatelite.get.keyword|sanitize:2}
	{else}
			{assign var=searchboxtext value=#PLIGG_Visual_Search_SearchDefaultText#}			
	{/if}	
	<input type="text" name="keyword" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}">
	<input type="submit" value="{#PLIGG_Visual_Search_Go#}" class="log2">
</form>

<form name="bulk_moderate" action="{$my_pligg_base}/admin_links.php?action=bulkmod" method="post">
<table cellpadding="1" cellspacing="2" border="0">
	<tr><th>{#PLIGG_Visual_View_Links_Status#}</th><th>{#PLIGG_Visual_View_Links_Author#}</th><th>{#PLIGG_Visual_View_Links_New_Window#}</th><th><center>Publish</center></th><th><center>Queued</center></th><th><center>Discard</center></th></tr>
	{section name=id loop=$template_stories}
	<tr>	
		<td>{$template_stories[id].link_status}</td>
		<td><a href="{$URL_user, $template_stories[id].link_author}">{$template_stories[id].link_author}</a></td>
		<td><a href="{$my_pligg_base}/story.php?title={$template_stories[id].link_title_url}" target="_blank">{$template_stories[id].link_title}</a></td>
		<td><center><input type="radio" name="link[{$template_stories[id].link_id}]" id="link-{$template_stories[id].link_id}" value="publish"></center></td>
		<td><center><input type="radio" name="link[{$template_stories[id].link_id}]" id="link-{$template_stories[id].link_id}" value="queued"></center></td>
		<td><center><input type="radio" name="link[{$template_stories[id].link_id}]" id="link-{$template_stories[id].link_id}" value="discard"></center></td>
	</tr>	
	{/section}		
</table>
<br/>
<p align="right"><input type="submit" name="submit" value="Change Status" class="log2" /></p>
</form>

<center><a href="javascript:mark_all_publish()">Mark all for Published</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:mark_all_queued()">Mark all for Queued</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:mark_all_discard()">Mark all for Discarded</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:uncheck_all()">Uncheck All</a></center>

<br/>
{php} 
Global $db, $main_smarty, $rows, $offset;
do_pages($rows, 25, $the_page); 
{/php}
<br/>

</fieldset>


{literal}
<SCRIPT>
function mark_all_publish() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
		if (document.bulk_moderate[i].value == "publish") {
			document.bulk_moderate[i].checked = true;
		}
	}
}
function mark_all_discard() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
		if (document.bulk_moderate[i].value == "discard") {
			document.bulk_moderate[i].checked = true;
		}
	}
}
function mark_all_queued() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
		if (document.bulk_moderate[i].value == "queued") {
			document.bulk_moderate[i].checked = true;
		}
	}
}
function uncheck_all() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
		if ((document.bulk_moderate[i].value == "queued")||(document.bulk_moderate[i].value == "discard")|| (document.bulk_moderate[i].value == "publish")){
			document.bulk_moderate[i].checked = false;
		}
	}
}
</SCRIPT>
{/literal}