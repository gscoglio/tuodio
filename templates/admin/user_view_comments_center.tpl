<fieldset><legend><img src="{$my_pligg_base}/templates/admin/images/user_comments.gif" align="absmiddle" /> {$user}'s {#PLIGG_Visual_Story_Comments#} </legend>

<form action="{$my_pligg_base}/admin/admin_users.php?mode=viewcomments&user={$user}" method="post">
		{if $templatelite.post.keyword neq ""}
			{assign var=searchboxtext value=$templatelite.post.keyword|sanitize:2}
	{else}
			{assign var=searchboxtext value=#PLIGG_Visual_Search_SearchDefaultText#}			
	{/if}	
	<input type="text" name="keyword" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}">
	<input type="hidden" name="action" value="search">
	<input type="submit" value="{#PLIGG_Visual_Search_Go#}" class="log2">
</form>

<form name="bulk_moderate" action="{$my_pligg_base}/admin/admin_users.php?mode=viewcomments&action=bulkmod" method="post">
{$hidden_token_admin_viewcomments}
<table border="0" class="stripes">
	<tr><th>{#PLIGG_Visual_View_Links_Status#}</th><th>{#PLIGG_Visual_View_Comments_Content#}</th><th>{#PLIGG_Visual_User_NewsSent#}</th><th>{#PLIGG_Visual_View_Comments_Edit#}</th><th><center>{#PLIGG_Visual_AdminPanel_Publish#}</center></th><th><center>{#PLIGG_Visual_AdminPanel_Moderated#}</center></th><th><center>{#PLIGG_Visual_AdminPanel_Discard#}</center></th><th><center>{#PLIGG_Visual_View_Category_Delete#}</center></th></tr>
	{section name=nr loop=$comments}
    <tr>				
			<td width="80px">{$comments[nr].comment_status}</td>
			<td><a href = "{$my_pligg_base}/story.php?id={$comments[nr].comment_link_id}#c{$comments[nr].comment_id}" target="_blank">{$comments[nr].comment_content}</a></td>
			<td width="120px">{$comments[nr].comment_date}</td>
			<td width="30px"><a href = "{$my_pligg_base}/edit.php?id={$comments[nr].comment_link_id}&commentid={$comments[nr].comment_id}" target="_blank">{#PLIGG_Visual_View_Comments_Edit#}</a></td>						
			<td width="60px"><center><input type="radio" name="comment[{$comments[nr].comment_id}]" id="comment-{$comments[nr].comment_id}" value="published"></center></td>
			<td width="60px"><center><input type="radio" name="comment[{$comments[nr].comment_id}]" id="comment-{$comments[nr].comment_id}" value="moderated"></center></td>
			<td width="60px"><center><input type="radio" name="comment[{$comments[nr].comment_id}]" id="comment-{$comments[nr].comment_id}" value="discard"></center></td>
			<td width="20px"><center><input type="checkbox" name="comment[{$comments[nr].comment_id}]" id="comment-{$comments[nr].comment_id}" value="delete"></center></td>
    </tr>
	{/section}	
</table>
<br/>
<p><input type="submit" name="submit" value="{#PLIGG_Visual_Change_Link_Status#}" class="log2" /></p>
<input type="hidden" name="user" value="{$user}">
</form>

<p><a href="javascript:mark_all_publish()">{#PLIGG_Visual_AdminPanel_Mark_Published#}</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:mark_all_queued()">{#PLIGG_Visual_AdminPanel_Mark_Moderated#}</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:mark_all_discard()">{#PLIGG_Visual_AdminPanel_Mark_Discarded#}</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:mark_all_delete()">{#PLIGG_Visual_Comments_Mark_All#}</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:uncheck_all()">{#PLIGG_Visual_Comments_UnCheck_All#}</a></p>

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
		if (document.bulk_moderate[i].value == "published") {
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
		if (document.bulk_moderate[i].value == "moderated") {
			document.bulk_moderate[i].checked = true;
		}
	}
}
function mark_all_delete() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
		if (document.bulk_moderate[i].value == "delete") {
			document.bulk_moderate[i].checked = true;
		}
	}
}
function uncheck_all() {
	for (var i=0; i< document.bulk_moderate.length; i++) {
			document.bulk_moderate[i].checked = false;
	}
}
</SCRIPT>
{/literal}