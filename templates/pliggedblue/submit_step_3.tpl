<h2>{#PLIGG_Visual_Submit3_Header#}</h2>
<fieldset><legend>{#PLIGG_Visual_Submit3_Details#}</legend>

	{* javascript that protects people from clicking away from the story before submitting it *}
	{literal}
	<SCRIPT>
		// Variable toggles exit confirmation on and foff.
		var gPageIsOkToExit = false;

		function submitEdgeStory()
		{
			// Set a variable so that our "before unload" exit handler knows not to verify
			// the page exit operation.
			gPageIsOkToExit = true;

			// Do the submission.
			// var frm = document.getElementById("thisform");
			frms = document.getElementsByName("ATISUBMIT");
			
			if (frms)
			{
				if (frms[0])
					frms[0].submit();
			}
		}

		window.onbeforeunload = function (event) 
		{
			// See if this is a safe exit.
			if (gPageIsOkToExit)
				return;

			if (!event && window.event) 
	          		event = window.event;
	          		
	   		event.returnValue = "You have not hit the Submit Button to submit your story yet.";
		}
	</SCRIPT>
	{/literal}

	{$the_story}

	<form action="{$URL_submit}" method="post" id="thisform" name="ATISUBMIT" >
		<input type="hidden" name="phase" value="3" />
		<input type="hidden" name="randkey" value="{$templatelite.post.randkey}" />
		<input type="hidden" name="id" value="{$submit_id}" />
		<input type="hidden" name="trackback" value="{$templatelite.post.trackback|escape:"html"}" />
		
		<br style="clear: both;" /><hr />
		<center>
		<input type=button onclick="javascript:gPageIsOkToExit=true;window.history.go(-1);" value="{#PLIGG_Visual_Submit3_Modify#}" class="log2">&nbsp;&nbsp;
		<input type="button" onclick="javascript:submitEdgeStory();" value="{#PLIGG_Visual_Submit3_SubmitStory#}" class="submit" />
		</center>
	</form>
</fieldset>
