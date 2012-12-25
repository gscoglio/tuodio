<fieldset><legend><img src="{$my_pligg_base}/templates/{$the_template}/images/user_comments.png" align="absmiddle" /> {#PLIGG_Visual_Header_AdminPanel_Comments#}</legend>

<form action="{$my_pligg_base}/admin_comments.php" method="get">
	<select name="filter">
		<option value="{#PLIGG_Visual_Comments_Filter_All#}" {if isset($templatelite.get.filter) && $templatelite.get.filter eq "{#PLIGG_Visual_Comments_Filter_All#}"} selected="selected" {/if}>{#PLIGG_Visual_Comments_Filter_All#}</option>
		<option value="{#PLIGG_Visual_Comments_Filter_Today#}" {if isset($templatelite.get.filter) && $templatelite.get.filter eq "{#PLIGG_Visual_Comments_Filter_Today#}"} selected="selected" {/if}>{#PLIGG_Visual_Comments_Filter_Today#}</option>
		<option value="{#PLIGG_Visual_Comments_Filter_Yesterday#}" {if isset($templatelite.get.filter) && $templatelite.get.filter eq "{#PLIGG_Visual_Comments_Filter_Yesterday#}"} selected="selected" {/if}>{#PLIGG_Visual_Comments_Filter_Yesterday#}</option>
		<option value="{#PLIGG_Visual_Comments_Filter_This_Week#}" {if isset($templatelite.get.filter) && $templatelite.get.filter eq "{#PLIGG_Visual_Comments_Filter_This_Week#}"} selected="selected" {/if}>{#PLIGG_Visual_Comments_Filter_This_Week#}</option>
	</select>
	<input type="submit" value="{#PLIGG_Visual_Comments_Filter#}" class="log2">
</form>

<form action="{$my_pligg_base}/admin_comments.php" method="get">
	<input type="hidden" name="mode" value="search">
	{if isset($templatelite.get.keyword)}
		{assign var=searchboxtext value=$templatelite.get.keyword|sanitize:2}
	{else}
		{assign var=searchboxtext value=#PLIGG_Visual_Search_SearchDefaultText#}			
	{/if}	
	<input type="text" name="keyword" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}">
	<input type="submit" value="{#PLIGG_Visual_Search_Go#}" class="log2">
</form>

<form name="bulk_moderate" action="{$my_pligg_base}/admin_comments.php?action=bulkmod" method="post">
<table cellpadding="1" cellspacing="2" border="0">
	<tr><th>{#PLIGG_Visual_View_Links_Author#}</th><th>{#PLIGG_MiscWords_Comment#}</th><th>{#PLIGG_Visual_User_NewsSent#}</th><th><center>{#PLIGG_Visual_View_Category_Delete#}</center></th></tr>
	{if isset($template_comments)}
		{section name=id loop=$template_comments}
		<tr>		
			<td><a href="{$URL_user, $template_comments[id].comment_author}">{$template_comments[id].comment_author}</a></td>
			<td><a href = "{$my_pligg_base}/story.php?id={$template_comments[id].comment_link_id}#c{$template_comments[id].comment_id}" target="_blank" title="{$template_comments[id].comment_content_long}">{$template_comments[id].comment_content}</a></td>
			<td>{$template_comments[id].comment_date} {#PLIGG_Visual_Comment_Ago#}</td>
			<td><center><input type="checkbox" name="comment[{$template_comments[id].comment_id}]" id="comment-{$template_comments[id].comment_id}" value="discard"></center></td>
	
		</tr>
		{/section}
	{/if}		
</table>
<br/>
<p align="right"><input type="submit" name="submit" value="{#PLIGG_Visual_Comments_Delete_Selected#}" class="log2" /></p>
</form>

<p align="right"><a href="javascript:mark_all_discard()">{#PLIGG_Visual_Comments_Mark_All#}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:uncheck_all()">{#PLIGG_Visual_Comments_UnCheck_All#}</a></p>

<br/>

{php} 
Global $db, $main_smarty, $rows, $offset;
do_pages($rows, 25, ''); 
{/php}

<br/>
</fieldset>

{literal}
<SCRIPT>
function mark_all_discard() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
		if (document.bulk_moderate[i].value == "discard") {
			document.bulk_moderate[i].checked = true;
		}
	}
}
function uncheck_all() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
		if ((document.bulk_moderate[i].value == "discard")){
			document.bulk_moderate[i].checked = false;
		}
	}
}
</SCRIPT>
{/literal}