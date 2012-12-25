<div id="maintab" class="tlb2">
	<span><a href="#" rel="register" style="text-decoration:none">{#PLIGG_Visual_Register#}</a></span>
	<span class="selected"><a href="#" rel="login" style="text-decoration:none">{#PLIGG_Visual_Login_Title#}</a></span>
</div>

<div id="login" class="featurebox" style="display:none">
	<div class="tlb">
		<span><a onclick="new Effect.toggle('s1','blind', {ldelim}queue: 'end'{rdelim});"> <img src="{$my_pligg_base}/templates/{$the_template}/images/expand.png" alt="expand" /></a></span>

		<a href="{$URL_login}">{#PLIGG_Visual_Login_Title#}</a>
	</div>
	
	<div id="s3">
		<form action="{$URL_login}" method="post"> 
			{#PLIGG_Visual_Login_Username#}:<br /><input type="text" name="username" class="login" value="{if isset($login_username)}{$login_username}{/if}" tabindex="40" /><br />
			{#PLIGG_Visual_Login_Password#}:<br /><input type="password" name="password" class="login" tabindex="41" /><br />
			<input type="hidden" name="processlogin" value="1"/>
			<input type="hidden" name="return" value="{$templatelite.get.return|sanitize:3}"/>
			{#PLIGG_Visual_Login_Remember#}: <input type="checkbox" name="persistent" tabindex="42" />
			<input type="submit" value="{#PLIGG_Visual_Login_LoginButton#}" class="submit-s" tabindex="43" />
		</form>
		<ul><li class="rmore"><a href="{$URL_login}">{#PLIGG_Visual_What_Is_Pligg_Read_More#}</a></li></ul>
	</div>
</div>



<div id="register" class="featurebox" style="display:none">	
	<div class="tlb">
		<span><a onclick="new Effect.toggle('s1','blind', {ldelim}queue: 'end'{rdelim});"> <img src="{$my_pligg_base}/templates/{$the_template}/images/expand.png" alt="expand" /></a></span>

		<a href="{$URL_register}">{#PLIGG_Visual_Register#}</a>
	</div>

	<div id="s4">	
		<form action="{$URL_register}" method="post" id="thisform-register">				
			{#PLIGG_Visual_Register_Username#}:<br /><input type="text" name="username" id="name" value="" size="20" tabindex="50"/>
			<span id="checkit-username"><input type="button" name="checkbutton1" id="checkbutton1" value="{#PLIGG_Visual_Register_Verify#}" onclick="checkfield('username', this.form, this.form.username)" class="submit-s" tabindex="51" /></span>
			<span id="usernamecheckitvalue"></span>
			<br />{#PLIGG_Visual_Register_Email#}:<br /><input type="text" id="email" name="email" value="" size="20" tabindex="52"/>
			<span id="checkit-password"><input type="button" name="checkbutton2" id="checkbutton2" value="{#PLIGG_Visual_Register_Verify#}" onclick="checkfield('email', this.form, this.form.email)" class="submit-s" tabindex="53" /></span>
			<span id="emailcheckitvalue"></span>
			<br />{#PLIGG_Visual_Register_Password#}:<br /><input type="password" id="password" name="password" size="20" tabindex="54"/>
			<br />{#PLIGG_Visual_Register_Verify_Password#}:<br /><input type="password" id="verify" name="password2" size="20" tabindex="55"/>
			<br /><input type="submit" name="submit" value="{#PLIGG_Visual_Register_Create_User#}" class="log2" tabindex="56" />
			<input type="hidden" name="regfrom" value="sidebar"/>
			<input type="hidden" name="process" value="1"/>		
		</form>	
		<ul><li class="rmore"><a href="{$URL_register}">{#PLIGG_Visual_What_Is_Pligg_Read_More#}</a></li></ul>
	 </div>
</div> 

{literal}
	<script type="text/javascript">
		initializetabcontent("maintab")
	</script>
{/literal}
