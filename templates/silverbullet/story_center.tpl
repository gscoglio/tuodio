
{$the_story}

<br/>
<div id="story_tabs" class="cab">
	<span class="selected"><a href="#" rel="comments">{#PLIGG_Visual_Story_Comments#}</a></span>
	<span><a href="#" rel="who_voted">{#PLIGG_Visual_Story_Who_Voted#}</a></span>
	<span><a href="#" rel="related">{#PLIGG_Visual_Story_RelatedStory#}</a></span>
</div><br/><br/>
<div id="comments" style="display:none">

	{$the_comments}

	{if $user_authenticated neq ""}
		{include file=$the_template."/comment_form.tpl"}
	{else}
		<br/>
		<div align="center" style="clear:both;margin-left:auto;font-weight:bold;margin-right:auto;border-color:#ccc; border-style:solid; border-width:1px;width:400px;text-align:center; padding: 20px;">
			<a href="{$login_url}">{#PLIGG_Visual_Story_LoginToComment#}</a> {#PLIGG_Visual_Story_Register#} <a href="{$register_url}">{#PLIGG_Visual_Story_RegisterHere#}</a>.
		</div>
	{/if}
</div>

<div id="who_voted" style="display:none">
	<div class="whovotedwrapper" id="idwhovotedwrapper">
		<ol>
			{section name=nr loop=$voter}
				<li>
					{if $UseAvatars neq "0"}<img src="{$voter[nr].Avatar_ImgSrc}" alt="Avatar" align="top" />{/if} 
					<a href = "{$URL_user, $voter[nr].user_login}">{$voter[nr].user_login}</a><br/>
				</li>
			{/section}
		</ol>
	</div>
</div>

<div id="related" style="display:none">
	{if count($related_story) neq 0}
		<ol>
			{section name=nr loop=$related_story}
				<li><a href = "{$related_title_url}{$related_story[nr].link_title_url}">{$related_story[nr].link_title}</a><br/></li>
			{/section}
		</ol>
	{/if}
</div>

{literal}
<script type="text/javascript">
initializetabcontent("story_tabs")
</script>
{/literal}
