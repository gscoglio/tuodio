<h2>{#PLIGG_Visual_Submit1_Header#}</h2>

<h3>{#PLIGG_Visual_Submit1_Instruct#}:</h3>

<ul>
	{if #PLIGG_Visual_Submit1_Instruct_1A# ne ''}<li><strong>{#PLIGG_Visual_Submit1_Instruct_1A#}:</strong> {#PLIGG_Visual_Submit1_Instruct_1B#}</li>{/if}
	{if #PLIGG_Visual_Submit1_Instruct_2A# ne ''}<li><strong>{#PLIGG_Visual_Submit1_Instruct_2A#}:</strong> {#PLIGG_Visual_Submit1_Instruct_2B#}</li>{/if}
	{if #PLIGG_Visual_Submit1_Instruct_3A# ne ''}<li><strong>{#PLIGG_Visual_Submit1_Instruct_3A#}:</strong> {#PLIGG_Visual_Submit1_Instruct_3B#}</li>{/if}
	{if #PLIGG_Visual_Submit1_Instruct_4A# ne ''}<li><strong>{#PLIGG_Visual_Submit1_Instruct_4A#}:</strong> {#PLIGG_Visual_Submit1_Instruct_4B#}</li>{/if}
	{if #PLIGG_Visual_Submit1_Instruct_5A# ne ''}<li><strong>{#PLIGG_Visual_Submit1_Instruct_5A#}:</strong> {#PLIGG_Visual_Submit1_Instruct_5B#}</li>{/if}
	{if #PLIGG_Visual_Submit1_Instruct_6A# ne ''}<li><strong>{#PLIGG_Visual_Submit1_Instruct_6A#}:</strong> {#PLIGG_Visual_Submit1_Instruct_6B#}</li>{/if}
	{if #PLIGG_Visual_Submit1_Instruct_7A# ne ''}<li><strong>{#PLIGG_Visual_Submit1_Instruct_7A#}:</strong> {#PLIGG_Visual_Submit1_Instruct_7B#}</li>{/if}
</ul>

<fieldset><legend>{#PLIGG_Visual_Submit1_NewsSource#}</legend>
	<form action="{$URL_submit}" method="post" id="thisform">
		<label for="url">{#PLIGG_Visual_Submit1_NewsURL#}:</label>
		<input type="text" name="url" id="url" value="http://" size="55" />
		<input type="hidden" name="phase" value=1>
		<input type="hidden" name="randkey" value="{$submit_rand}">
		<input type="hidden" name="id" value="c_1">
		<input type="submit" value="{#PLIGG_Visual_Submit1_Continue#}" class="submit-s" />
	</form>
	<br />{if $Submit_Require_A_URL neq 1}{#PLIGG_Visual_Submit_Editorial#}{/if}
</fieldset>
