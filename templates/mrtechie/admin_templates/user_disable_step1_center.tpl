<fieldset><legend><img src="{$my_pligg_base}/templates/{$the_template}/images/user_disable.png" align="absmiddle" /> {#PLIGG_Visual_View_User_Disable#}</legend>
<table style="border:none">
	<tr><td>Are you sure you want to "disable" this user and prevent them from logging in?</td></tr>
	<tr><td> <a href = "admin_users.php?mode=yesdisable&user={$user}{$uri_token_admin_users_disable}">Yes, disable this user.</a>&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;<a href="javascript: history.go(-1)">No, cancel</a></td></tr>
	<tr><td><strong>A disabled user will be "logged out" if they are currently "logged in."</strong></td></tr>
</table>
</fieldset>
