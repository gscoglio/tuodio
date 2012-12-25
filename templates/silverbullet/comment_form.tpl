<fieldset><legend>{#PLIGG_Visual_Comment_Send#}</legend>	
	<form action="" method="POST" id="thisform">		
		<label>{#PLIGG_Visual_Comment_NoHTML#}</label>
		<textarea name="comment_content" id="comment" rows="6" cols="60"/>{if isset($TheComment)}{$TheComment}{/if}</textarea><br />
		{if $Spell_Checker eq 1}<input type="button" name="spelling" value="{#PLIGG_Visual_Check_Spelling#}" class="log2" onClick="openSpellChecker('comment');"/>{/if}
		<input type="submit" name="submit" value="{#PLIGG_Visual_Comment_Submit#}" class="log2" />
		<input type="hidden" name="process" value="newcomment" />
		<input type="hidden" name="randkey" value="{$randkey}" />
		<input type="hidden" name="link_id" value="{$link_id}" />
		<input type="hidden" name="user_id" value="{$user_id}" />
	</form>
</fieldset>	
