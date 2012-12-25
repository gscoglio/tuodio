<div id="maintab" class="tlb2">
	<span><a href="#" rel="register" style="text-decoration:none">{#PLIGG_Visual_Register#}</a></span>
	<span class="selected"><a href="#" rel="login" style="text-decoration:none">{#PLIGG_Visual_Login_Title#}</a></span>
</div>

<div id="login" class="featurebox" style="display:none">
	<div class="tlb">
		{php}
			echo "<span><a onclick=\"new Effect.toggle('s3','blind', {queue: 'end'}); \"> <img src=\"".my_pligg_base."/templates/".The_Template."/images/expand.png\"></a></span>";
		{/php}
		<a href="{$URL_login}">{#PLIGG_Visual_Login_Title#}</a>
	</div>
	
	<div id=s3>
		<form action="{$URL_login}" method="post"> 
			{#PLIGG_Visual_Login_Username#}:<br /><input type="text" name="username" class="login" value="{$login_username}" /><br />
			{#PLIGG_Visual_Login_Password#}:<br /><input type="password" name="password" class="login" /><br />
			<input type="hidden" name="processlogin" value="1"/>
			<input type="hidden" name="return" value="{$templatelite.get.return}"/>
			{#PLIGG_Visual_Login_Remember#}: <input type="checkbox" name="persistent" />
			<input type="submit" value="{#PLIGG_Visual_Login_LoginButton#}" class="submit-s" />
		</form>
		<li class="rmore"><a href="{$URL_login}">{#PLIGG_Visual_What_Is_Pligg_Read_More#}</a></li>
	</div>
</div>



<div id="register" class="featurebox" style="display:none">	
	<div class="tlb">
		{php}
			echo "<span><a onclick=\"new Effect.toggle('s4','blind', {queue: 'end'}); \"> <img src=\"".my_pligg_base."/templates/".The_Template."/images/expand.png\"></a></span>";
		{/php}
		<a href="{$URL_register}">{#PLIGG_Visual_Register#}</a>
	</div>

	<div id=s4>	
		<form action="{$URL_register}" method="post" id="thisform">				
			{#PLIGG_Visual_Register_Username#}:<br /><input type="text" name="username" id="name" value="" onkeyup="enablebutton(this.form.checkbutton1, this.form.submit, this)" size="20" tabindex="1"/>
			<span id="checkit"><input type="button" name="checkbutton1" id="checkbutton1" disabled="disabled" value="{#PLIGG_Visual_Register_Verify#}" onclick="checkfield('username', this.form, this.form.username)" class="submit-s" /></span>
			<span id="usernamecheckitvalue"></span>
			<br />{#PLIGG_Visual_Register_Email#}:<br /><input type="text" id="email" name="email" value=""  onkeyup="enablebutton(this.form.checkbutton2, this.form.submit, this)" size="20" tabindex="2"/>
			<span id="checkit"><input type="button" name="checkbutton2" id="checkbutton2" disabled="disabled" value="{#PLIGG_Visual_Register_Verify#}" onclick="checkfield('email', this.form, this.form.email)" class="submit-s" /></span>
			<span id="emailcheckitvalue"></span>
			<br />{#PLIGG_Visual_Register_Password#}:<br /><input type="password" id="password" name="password" size="20" tabindex="3"/>
			<br />{#PLIGG_Visual_Register_Verify_Password#}:<br /><input type="password" id="verify" name="password2" size="20" tabindex="4"/>
			<br /><input type="submit" name="submit" value="{#PLIGG_Visual_Register_Create_User#}" class="log2" tabindex="6" />
			<input type="hidden" name="process" value="1"/>		
		</form>	
		<li class="rmore"><a href="{$URL_register}">{#PLIGG_Visual_What_Is_Pligg_Read_More#}</a></li>
	 </div>
</div> 

{literal}
<script type="text/javascript">
initializetabcontent("maintab")
</script>
{/literal}