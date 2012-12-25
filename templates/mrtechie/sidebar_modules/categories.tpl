<div class="tlb">
	{php}
		echo "<span><a onclick=\"new Effect.toggle('cats','blind', {queue: 'end'}); \"> <img src=\"".my_pligg_base."/templates/".The_Template."/images/expand.png\"></a></span>";
	{/php}
	<a href="#">{#PLIGG_Visual_Category_Title#}</a>
</div>

<div id="cats" style="padding-bottom:1px">
	<ul id="nav-secondary">
		{section name=thecat loop=$cat_array start=1}

			{if $cat_array[thecat].spacercount lt $lastspacer}{$cat_array[thecat].spacerdiff|repeat_count:'</ul>'}{/if}
			{if $cat_array[thecat].spacercount gt $lastspacer}<ul style="padding-left:12px">{/if}

			<a href="{$URL_rsscategory, $cat_array[thecat].auto_id}" target="_blank" style="border:none;"> 	 
	        <img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" border="0" style="float:right;padding-right:10px;"></a>
			
					{if $pagename eq "published"}
						<a href="{$URL_maincategory, $cat_array[thecat].safename}" style="padding-bottom:5px;">{$cat_array[thecat].name}</a>
					{else}
						<a href="{$URL_queuedcategory, $cat_array[thecat].safename}" style="padding-bottom:5px;">{$cat_array[thecat].name}</a>
					{/if}
					</li>

			{assign var=lastspacer value=$cat_array[thecat].spacercount}
		{/section}
	</ul>
</div>