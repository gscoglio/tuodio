<div id="filter">
<span>{#PLIGG_Visual_Tags_Tags#}</span>
		
		{section name=i start=0 loop=$count_range_values step=1}
			{if $templatelite.section.i.index eq $current_range}
			<a href="#" class="navbut4">{$range_names[i]}</a>
			{else}	
			<a href="{$URL_tagcloud_range, $templatelite.section.i.index}">{$range_names[i]}</a>
			{/if}
		{/section}
	 
</div>

<div style="margin: 20px 0 20px 0; line-height: {$tags_max_pts}pt; margin-left: 100px;">
	{section name=customer loop=$tag_number}
		<span style="font-size: {$tag_size[customer]}pt"><a href="{$tag_url[customer]}">{$tag_name[customer]}</a></span>&nbsp;&nbsp;
	{/section}
</div>