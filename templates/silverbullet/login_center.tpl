<h2>{#PLIGG_Visual_Breadcrumb_Login#}</h2>

{checkActionsTpl location="tpl_login_top"}

<form action="{$URL_login}" id="thisform" method="post">
	<fieldset><legend>{#PLIGG_Visual_Login_Login#}</legend>
		{if $errorMsg ne ""}
			<p><span class="error">{$errorMsg}</span></p><br />
	    {/if} 
		<label>{#PLIGG_Visual_Login_Username#}:</label>
		<input type="text" name="username" size="25" tabindex="1" id="login-name" value="" /><br />
		<label>{#PLIGG_Visual_Login_Password#}:</label>
		<input type="password" name="password" id="login-password" size="25" tabindex="2"/>
		<label>{#PLIGG_Visual_Login_Remember#}: <input type="checkbox" name="persistent" id="remember" tabindex="3"/></label>
		<input type="submit" value="{#PLIGG_Visual_Login_LoginButton#}" class="log2" tabindex="4" />
		<input type="hidden" name="processlogin" value="1"/>
		<input type="hidden" name="return" value="{$templatelite.get.return|sanitize:3}"/>
	</fieldset>
</form>

<form action="{$URL_login}" id="thisform2" method="post">
	<fieldset><legend>{#PLIGG_Visual_Login_ForgottenPassword#}</legend>
		<label>{#PLIGG_Visual_Login_Username#}:</label>
		<input type="text" name="username" size="25" tabindex="5" id="forgot-name" value="" /><br />
		<input type="submit" value="{#PLIGG_Visual_Login_EmailChangePass#}" class="log2" tabindex="6" />
		<input type="hidden" name="processlogin" value="3"/>
		<input type="hidden" name="return" value="{$templatelite.get.return|sanitize:3}"/>
	</fieldset>
</form>

<fieldset><legend>{#PLIGG_Visual_Login_NewUsers#}</legend>
	{#PLIGG_Visual_Login_NewUsersA#}<a href="{$register_url}">{#PLIGG_Visual_Login_NewUsersB#}</a>{#PLIGG_Visual_Login_NewUsersC#}
</fieldset>

{checkActionsTpl location="tpl_login_bottom"}
