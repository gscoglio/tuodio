{php}
	include_once(mnminclude.'tags.php');
	global $main_smarty;
	
	$cloud=new TagCloud();
	$cloud->smarty_variable = $main_smarty; // pass smarty to the function so we can set some variables
	$cloud->word_limit = tags_words_limit_s;
	$cloud->min_points = tags_min_pts_s; // the size of the smallest tag
	$cloud->max_points = tags_max_pts_s; // the size of the largest tag
	
	$cloud->show();
	$main_smarty = $cloud->smarty_variable; // get the updated smarty back from the function
{/php}


<div class="tlb">{php}
	echo "<span><a onclick=\"new Effect.toggle('s2','blind', {queue: 'end'}); \">  <img src=\"".my_pligg_base."/templates/".The_Template."/images/expand.png\"></a></span>";
{/php}<a href="{$URL_tagcloud}">{#PLIGG_Visual_Top_5_Tags#}</a>

</div>
<div id="s2" style="margin: 5px 0 0 0; line-height: {php} echo tags_max_pts_s; {/php}pt;">
	{section name=customer loop=$tag_number}
	
		{* --- to change the way the words are displayed, change this part --- *}
			<span style="font-size: {$tag_size[customer]}pt">
				<a href="{$tag_url[customer]}">{$tag_name[customer]}</a>
			</span>
		{* ---		--- *}
		
	{/section}
	 <li class="rmore"><a href="{$URL_tagcloud}">{#PLIGG_Visual_What_Is_Pligg_Read_More#}</a></li>
</div>
