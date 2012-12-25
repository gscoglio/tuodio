<fieldset><legend><img src="{$my_pligg_base}/templates/admin/images/manage_user.gif" align="absmiddle" /> {#PLIGG_Visual_AdminPanel_User_Manage#}</legend>

<form action="{$my_base_url}{$my_pligg_base}/admin/admin_users.php" method="get">
<input type="hidden" name="mode" value="search">
	{if isset($templatelite.get.keyword)}
			{assign var=searchboxtext value=$templatelite.get.keyword|sanitize:2}
	{else}
			{assign var=searchboxtext value=#PLIGG_Visual_Search_SearchDefaultText#}			
	{/if}
<input type="text" name="keyword" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}">
<input type="submit" value="{#PLIGG_Visual_Search_Go#}">

&nbsp;&nbsp;

  <a href="{$my_pligg_base}/admin/admin_users.php?mode=create" title="Create User" id="create">{#PLIGG_Visual_AdminPanel_New_User#}</a>
  <div class="multiBoxDesc create">{#PLIGG_Visual_AdminPanel_New_User_Desc#}</div>
  
</form>
<form action="{$my_pligg_base}/admin/admin_users.php" method="get">
	{#PLIGG_Visual_AdminPanel_Pagination_Items#}
	<select name="pagesize">
		<option {if isset($pagesize) && $pagesize == 15}selected{/if}>15</option>
		<option {if isset($pagesize) && $pagesize == 30}selected{/if}>30</option>
		<option {if isset($pagesize) && $pagesize == 50}selected{/if}>50</option>
		<option {if isset($pagesize) && $pagesize == 100}selected{/if}>100</option>
		<option {if isset($pagesize) && $pagesize == 150}selected{/if}>150</option>
		<option {if isset($pagesize) && $pagesize == 200}selected{/if}>200</option>
	</select>
	<input type="submit" value="Go" class="log2">
</form>



{if isset($usererror)} <span class="error">{$usererror}</span><br/><br/>{/if}

<form action="{$my_pligg_base}/admin/admin_users.php" method="post">
{$hidden_token_admin_users_list}
<table class="stripes">
<tr><th>&nbsp;</th><th>{#PLIGG_Visual_Login_Username#}</th><th>{#PLIGG_Visual_View_User_Level#}</th><th>{#PLIGG_Visual_View_User_Email#}</th><th>{#PLIGG_Visual_User_Profile_Joined#}</th><th>{#PLIGG_Visual_User_Profile_Enabled#}</th><th>{#PLIGG_Visual_User_Profile_Disabled#}</th><th>{#PLIGG_Visual_AdminPanel_Validate#}</th></tr>
	{section name=nr loop=$userlist}
	<tr>
	<td><input type='checkbox' name='delete[]' value='{$userlist[nr].user_id}'></td>	
	<td><img src="{$userlist[nr].Avatar}" align="absmiddle"/> <a href = "?mode=view&user={$userlist[nr].user_login}">{$userlist[nr].user_login}</a></td>	
	<td width="80px">{$userlist[nr].user_level}</td>
	<td>{$userlist[nr].user_email}</td>
	<td width="140px">{$userlist[nr].user_date}</td>
	<td width="60px"><center><input type="radio" name="enabled[{$userlist[nr].user_id}]" value="1" {if $userlist[nr].user_enabled}checked{/if}></center></td>
	<td width="60px"><center><input type="radio" name="enabled[{$userlist[nr].user_id}]" value="0" {if $userlist[nr].user_enabled==0}checked{/if}></center></td>
	<td width="70px">{if $userlist[nr].user_lastlogin neq "0000-00-00 00:00:00"}{#PLIGG_Visual_AdminPanel_Validated#}{else}<a href="{$my_base_url}{$my_pligg_base}/admin/admin_user_validate.php?id={$userlist[nr].user_id}" rel="width:280,height:150" class="mb" title="Validate Confirmation" style="text-decoration:none;">{#PLIGG_Visual_AdminPanel_Validate#}</a>{/if}</td>
	</tr>
	{/section}
</table>
<p>
	<input type='submit' name='killspam' value='{#PLIGG_Visual_KillSpam_Selected#}'>
	<input type="submit" name="submit" value="{#PLIGG_Visual_AdminPanel_Change_User_Status#}" class="log2" />
</p>
</form>

</fieldset>