{literal}
        <style type="text/css">
                /* allow room for 3 columns */
                div#idwhovotedwrapper ol {width: 35em; list-style-type: none; }
                div#idwhovotedwrapper ol li {float: left; width: 10em; }
                div#idwhovotedwrapper br { clear: left; }
                div#idwhovotedwrapper div.whovotedwrapper { margin-bottom: 1em; }
        </style>
{/literal}

{if $enable_show_last_visit neq 0}
        {if $user_id neq 0}
                {if $last_visit neq '0'}
                        {#PLIGG_Visual_Story_LastViewed_A#}{$last_visit}{#PLIGG_Visual_Story_LastViewed_B#}<br />
                {else}
                        {#PLIGG_Visual_Story_FirstView#}<br />
                {/if}
        {/if}
{/if}

{$the_story}

<br/>
<div id="story_tabs" class="cab">
        <span class="selected"><a href="#" rel="comments">{#PLIGG_Visual_Story_Comments#}</a></span>
        <span><a href="#" rel="who_voted">{#PLIGG_Visual_Story_Who_Voted#}</a></span>
        <span><a href="#" rel="related">{#PLIGG_Visual_Story_RelatedStory#}</a></span>
</div>
<div id="story-navbar" style="margin-left:0px;margin-right:0px"></div>

<div id="comments" style="display:none">
        <h2>{#PLIGG_Visual_Story_Comments#}</h2>

        {$the_comments}

        {if $user_authenticated neq ""}
                {include file=$the_template."/comment_form.tpl"}
        {else}
                <br/>
                <div align="center" style="clear:both;margin-left:auto;font-weight:bold;margin-right:auto;border-color:#ccc; border-style:solid; border-width:1px;width:400px;text-align:center; padding-bottom: 8px;">
                        <a href="{$login_url}">{#PLIGG_Visual_Story_LoginToComment#}</a> {#PLIGG_Visual_Story_Register#} <a href="{$register_url}">{#PLIGG_Visual_Story_RegisterHere#}</a>.
                </div>
        {/if}
</div>

<div id="who_voted" style="display:none">
        <h2>{#PLIGG_Visual_Story_WhoVoted#}</h2>
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
        <h2>{#PLIGG_Visual_Story_RelatedStory#}</h2>
        {if count($related_story) neq 0}
                <ol style="margin-left:25px;">
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