<div id="filter" >
		

<span>{#PLIGG_Visual_Pligg_Sort_News_By#}</span>
			
			
			{if $setmeka eq "" || $setmeka eq "recent"} <a href="{$index_url_recent}" class="navbut4">{#PLIGG_Visual_Recently_Pop#}</a>{else}  <a href="{$index_url_recent}">{#PLIGG_Visual_Recently_Pop#}</a>{/if} 
			{if $setmeka eq "today"} <a href="{$index_url_today}" class="navbut4">{#PLIGG_Visual_Top_Today#}</a>{else}  <a href="{$index_url_today}">{#PLIGG_Visual_Top_Today#}</a>{/if} 
			{if $setmeka eq "yesterday"}<a href="{$index_url_yesterday}" class="navbut4">{#PLIGG_Visual_Yesterday#} </a>{else}  <a href="{$index_url_yesterday}">{#PLIGG_Visual_Yesterday#}</a>{/if} 
			{if $setmeka eq "week"}<a href="{$index_url_week}" class="navbut4">{#PLIGG_Visual_This_Week#} </a>{else}  <a href="{$index_url_week}">{#PLIGG_Visual_This_Week#}</a>{/if} 
			{if $setmeka eq "month"} <a href="{$index_url_month}" class="navbut4">{#PLIGG_Visual_This_Month#}</a> {else}  <a href="{$index_url_month}">{#PLIGG_Visual_This_Month#}</a>{/if} 
			{if $setmeka eq "year"}<a href="{$index_url_year}" class="navbut4">{#PLIGG_Visual_This_Year#}</a> {else}  <a href="{$index_url_year}">{#PLIGG_Visual_This_Year#}</a>{/if} 			

</div>	

{$link_summary_output}
<br /><br />
{$link_pagination}
