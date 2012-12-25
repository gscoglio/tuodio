<h2>{#PLIGG_Visual_Breadcrumb_Register#}</h2>

<fieldset><legend>{#PLIGG_Visual_Register_Register#}</legend>
	<form action="{$URL_register}" method="post" id="thisform">

		<label>{#PLIGG_Visual_Register_Username#}:</label>
		{if isset($form_username_error)}{ foreach value=error from=$form_username_error }<br /><span class="error">{$error}</span><br />{ /foreach }<br />{/if}
		<input type="text" name="reg_username" id="reg_username" value="{if isset($reg_username)}{$reg_username}{/if}" size="25" tabindex="30" maxlength="32"/>
		<span id="checkit-reg-username"><input type="button" name="reg-checkbutton1" id="reg-checkbutton1" value="{#PLIGG_Visual_Register_Verify#}" onclick="checkfield('username', this.form, this.form.reg_username)" class="submit-s" tabindex="31" /></span><br/><span id="reg_usernamecheckitvalue"></span>

		<br />
		
		<label>{#PLIGG_Visual_Register_Email#}:</label>
		{if isset($form_email_error)}{ foreach value=error from=$form_email_error }<br /><span class="error">{$error}</span><br />{ /foreach }<br />{/if}
		{#PLIGG_Visual_Register_Lowercase#}<br />
		<input type="text" id="reg_email" name="reg_email" value="{if isset($reg_email)}{$reg_email}{/if}" size="25" tabindex="32" maxlength="128"/>
		<span id="checkit-reg-pass"><input type="button" name="reg-checkbutton2" id="reg-checkbutton2" value="{#PLIGG_Visual_Register_Verify#}" onclick="checkfield('email', this.form, this.form.reg_email)" class="submit-s" tabindex="33" /></span><br/><span id="reg_emailcheckitvalue"></span>
		
		<br />
		
		<label>{#PLIGG_Visual_Register_Password#}:</label>
		{if isset($form_password_error)}{ foreach value=error from=$form_password_error }<br /><span class="error">{$error}</span><br />{ /foreach }<br />{/if}

		{#PLIGG_Visual_Register_FiveChar#}<br />
		<input type="password" id="reg_password" name="reg_password" value="{if isset($reg_password)}{$reg_password}{/if}" size="25" tabindex="34"/>

		<br />

		<label>{#PLIGG_Visual_Register_Verify_Password#}: </label>
		<input type="password" id="reg_verify" name="reg_password2" value="{if isset($reg_password2)}{$reg_password2}{/if}" size="25" tabindex="35"/>

		{if isset($register_step_1_extra)}
			<br />
			{$register_step_1_extra}
		{/if}
			
		<br />

		<input type="submit" name="submit" value="{#PLIGG_Visual_Register_Create_User#}" class="log2" tabindex="36" />
		<input type="hidden" name="regfrom" value="full"/>
	</form>
</fieldset>
