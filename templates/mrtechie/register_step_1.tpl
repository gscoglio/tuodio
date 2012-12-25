{config_load file="/libs/lang.conf"}

<h2>{#PLIGG_Visual_Breadcrumb_Register#}</h2>

<fieldset><legend>{#PLIGG_Visual_Register_Register#}</legend>
	<form action="{$URL_register}" method="post" id="thisform">
		<label>{#PLIGG_Visual_Register_Username#}:</label>
		<input type="text" name="reg-username" id="reg-name" value="" size="25" tabindex="30" maxlength="32"/>
		<span id="checkit-reg-username"><input type="button" name="reg-checkbutton1" id="reg-checkbutton1" value="{#PLIGG_Visual_Register_Verify#}" onclick="checkfield('reg-username', this.form, this.form.username)" class="submit-s" tabindex="31" /></span><br/><span id="usernamecheckitvalue"></span>

		<br />
		
		<label>{#PLIGG_Visual_Register_Email#}:</label>{#PLIGG_Visual_Register_Lowercase#}<br />
		<input type="text" id="reg-email" name="reg-email" value="" size="25" tabindex="32" maxlength="128"/>
		<span id="checkit-reg-pass"><input type="button" name="reg-checkbutton2" id="reg-checkbutton2" value="{#PLIGG_Visual_Register_Verify#}" onclick="checkfield('reg-email', this.form, this.form.email)" class="submit-s" tabindex="33" /></span><br/><span id="emailcheckitvalue"></span>
		
		<br />
		
		<label>{#PLIGG_Visual_Register_Password#}:</label>{#PLIGG_Visual_Register_FiveChar#}<br />
		<input type="password" id="reg-password" name="reg-password" size="25" tabindex="34"/>

		<br />
		
		<label>{#PLIGG_Visual_Register_Verify_Password#}: </label>
		<input type="password" id="reg-verify" name="reg-password2" size="25" tabindex="35"/>
			
		<br /><br/>
		
		<input type="submit" name="submit" value="{#PLIGG_Visual_Register_Create_User#}" class="log2" tabindex="36" />
		<input type="hidden" name="process" value="1"/>
	</form>
</fieldset>