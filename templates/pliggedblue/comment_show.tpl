<a id="c{$comment_id}"></a>

<div id="comment-wrap">
  
	<div id="comment-head"> 	
		{if $UseAvatars neq "0"}<span id="ls_avatar-{$link_shakebox_index}"> <img src="{$Avatar_ImgSrc}" align="absmiddle"/></span>{/if}      
		{#PLIGG_Visual_Comment_WrittenBy#} <a href="{$user_view_url}">{$user_username}</a> {$comment_age} {#PLIGG_Visual_Comment_Ago#} {if $comment_votes lt 0} - <span id = "show_hide_comment_content-{$comment_id}"> <a href = "javascript://"  onclick="var replydisplay=document.getElementById('comment_content-{$comment_id}').style.display ? '' : 'none'; document.getElementById('comment_content-{$comment_id}').style.display = replydisplay;">{#PLIGG_Visual_Comment_Show_Hide#}</a> {#PLIGG_Visual_Comment_This_Comment#} </span> {/if} 
		<span id="comment-subhead">	  
			{if $Enable_Comment_Voting eq 1}
				{#PLIGG_Visual_Comment_Rating#}: <a id="cvote-{$comment_id}" style='text-decoration: none;'>{$comment_votes}</a> 
				{if $comment_user_vote_count eq 0 && $current_userid neq $comment_author}
					| <span id="ratetext-{$comment_id}">{#PLIGG_Visual_Comment_Rate_Comment#}:</span> 
					<span id="ratebuttons-{$comment_id}">	  
						<a class="ratemey" href="javascript:{$link_shakebox_javascript_votey}" style='text-decoration:none;'><span class="rateme">+</span></a> 
						<a class="ratemen" href="javascript:{$link_shakebox_javascript_voten}" style='text-decoration:none;'><span class="rateme">-</span></a> 
					</span>
				{/if}
			{/if}
		</span>
	</div>

	<div class="comment-body" id="wholecomment{$comment_id}"> 
		{if $comment_votes gte 0} 
			<span id = "comment_content-{$comment_id}"> <br />{$comment_content}</span> 
		{else}
			<span id = "comment_content-{$comment_id}" style="display:none"> <br />{$comment_content}</span>
		{/if}
	</div>	  
	  
	{* display comment form if replying to a comment *}
	<div class="comment-info"> 
		{if $comment_parent eq 0 && $current_userid neq 0} 
			<a href = "javascript://" onClick="var replydisplay=document.getElementById('reply-{$comment_id}').style.display ? '' : 'none'; document.getElementById('reply-{$comment_id}').style.display = replydisplay;">{#PLIGG_Visual_Comment_Reply#}</a>
			<div id="reply-{$comment_id}" style="display:none;" align="left"> 
				<fieldset><legend>{#PLIGG_Visual_Comment_Send#}</legend>
					<form action="" method="POST" id="thisform" style="display:inline;">
						<label>{#PLIGG_Visual_Comment_NoHTML#}</label>
						<textarea name="reply_comment_content-{$comment_id}" id="reply_comment_content-{$comment_id}" rows="3" cols="55"/>{$TheComment}</textarea><br/>			  
						{if $Spell_Checker eq 1}<input type="button" name="spelling" value="{#PLIGG_Visual_Check_Spelling#}" onClick="openSpellChecker('reply_comment_content-{$comment_id}');" class="log2"/>{/if}
						<input type="submit" name="submit" value="{#PLIGG_Visual_Comment_Submit#}" class="log2" />
						<input type="hidden" name="process" value="newcomment" />
						<input type="hidden" name="randkey" value="{$rand}" />
						<input type="hidden" name="link_id" value="{$comment_link}" />
						<input type="hidden" name="comment_parent_id" value="{$comment_id}" />
						<input type="hidden" name="user_id" value="{$current_userid}" />
					</form>	
				</fieldset>
			</div>
		{/if}	
	  
	    {if $hide_comment_edit neq 'yes'}
			{if $isadmin eq 1}
				| <a href="{$edit_comment_url}">{#PLIGG_Visual_Comment_Edit#}</a>
			{else}	  
				{if $user_username eq 'you'}
					| <a href="{$edit_comment_url}">{#PLIGG_Visual_Comment_Edit#}</a> 
				{/if}
			{/if}
		{/if} 
	</div>
	
</div>

<br />
