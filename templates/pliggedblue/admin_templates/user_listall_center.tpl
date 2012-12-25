<fieldset><legend><img src="{$my_pligg_base}/templates/{$the_template}/images/manage_user.png" align="absmiddle" /> {#PLIGG_Visual_Header_AdminPanel_1#}</legend>

<form action="{$my_base_url}{$my_pligg_base}/admin_users.php" method="get">
<input type="hidden" name="mode" value="search">
	{if isset($templatelite.get.keyword)}
			{assign var=searchboxtext value=$templatelite.get.keyword|sanitize:2}
	{else}
			{assign var=searchboxtext value=#PLIGG_Visual_Search_SearchDefaultText#}			
	{/if}
<input type="text" name="keyword" value="{$searchboxtext}" onfocus="if(this.value == '{$searchboxtext}') {ldelim}this.value = '';{rdelim}" onblur="if (this.value == '') {ldelim}this.value = '{$searchboxtext}';{rdelim}">
<input type="submit" value="{#PLIGG_Visual_Search_Go#}" class="submit">

&nbsp;&nbsp;

{php}
echo '<input type="button" value="Create User" onclick="new Effect.toggle(\'new\',\'appear\', {queue: \'end\'});" class="log2">';
{/php}
</form>

{if isset($usererror)} <span class="error">{$usererror}</span><br/><br/>{/if}

<div id="new" style="display:none">
<h3>Create New User</h3>
<form action="" method="post" onsubmit="validate();">
<label>*{#PLIGG_Visual_Register_Username#}:</label><input type="text" name="username" onkeyup="enablebutton(this.form.checkbutton1, this.form.submit, this)">
<span id="checkit"><input type="button" name="checkbutton1" id="checkbutton1" disabled="disabled" value="{#PLIGG_Visual_Register_Verify#}" onclick="checkfield('username', this.form, this.form.username)" class="submit-s" /></span>
<span id="usernamecheckitvalue"></span>
<label>*{#PLIGG_Visual_Register_Email#}:</label><input type="text" name="email" onkeyup="enablebutton(this.form.checkbutton2, this.form.submit, this)">
<span id="checkit"><input type="button" name="checkbutton2" id="checkbutton2" disabled="disabled" value="{#PLIGG_Visual_Register_Verify#}" onclick="checkfield('email', this.form, this.form.email)" class="submit-s" /></span>
<span id="emailcheckitvalue"></span>
<label>*{#PLIGG_Visual_View_User_Level#}:</label><select name="level">
                      <option value="normal">Normal</option>
			    <option value="admin">Admin</option>
			    <option value="god">God</option>	
			    </select>
<label>*{#PLIGG_Visual_Register_Password#}:</label><input type="text" name="password">
<input type="hidden" name="mode" value="newuser"><br/>
<input type="submit" value="Create User" class="log2">	
</form>
<hr/>
</div>

<table cellpadding="1" border="0" width="90%">
<tr><th>{#PLIGG_Visual_Login_Username#}</th><th>{#PLIGG_Visual_View_User_Level#}</th><th>{#PLIGG_Visual_View_User_Email#}</th><th>{#PLIGG_Visual_User_Profile_Joined#}</th></tr>
	{section name=nr loop=$userlist}
	<tr>
	<td><img src="{$userlist[nr].Avatar}" align="absmiddle"/> <a href = "?mode=view&user={$userlist[nr].user_login}">{$userlist[nr].user_login}</a></td>	
	<td>{$userlist[nr].user_level}</td>
	<td>{$userlist[nr].user_email}</td>
	<td>{$userlist[nr].user_date}</td>
	</tr>
	{/section}
</table>

<br/>

{php} 
Global $db, $main_smarty, $rows, $top_users_size, $offset;
do_pages($rows, $top_users_size, ''); 
{/php}

</fieldset>