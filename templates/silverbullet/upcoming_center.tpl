<div id="filter">
			
			<span>{#PLIGG_Visual_Pligg_Sort_News_By#}</span>
			{if $paorder eq "" || $paorder eq "newest"}
			<a href="{$upcoming_url_newest}" class="navbut4">{#PLIGG_Visual_Pligg_Newest_St#} </a>     {else}<a href="{$upcoming_url_newest}">{#PLIGG_Visual_Pligg_Newest_St#}</a>{/if} 
			{if $paorder eq "oldest"}
			<a href="{$upcoming_url_oldest}" class="navbut4">{#PLIGG_Visual_Pligg_Oldest_St#}</a>       {else}<a href="{$upcoming_url_oldest}">{#PLIGG_Visual_Pligg_Oldest_St#}</a>{/if} 
			{if $paorder eq "mostpopular"}
			<a href="{$upcoming_url_mostpopular}" class="navbut4">{#PLIGG_Visual_Pligg_Most_Pop#}</a>      {else}<a href="{$upcoming_url_mostpopular}">{#PLIGG_Visual_Pligg_Most_Pop#}</a>   {/if} 
			{if $paorder eq "leastpopular"}
			<a href="{$upcoming_url_leastpopular}" class="navbut4">{#PLIGG_Visual_Pligg_Least_Pop#}</a>      {else}<a href="{$upcoming_url_leastpopular}">{#PLIGG_Visual_Pligg_Least_Pop#}</a>{/if}

</div>



{$link_summary_output}
<br /><br />
{$link_pagination}
