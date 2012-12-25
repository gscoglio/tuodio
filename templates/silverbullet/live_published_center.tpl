<div id="filter">

	<span>{#PLIGG_Visual_Breadcrumb_Published#}</span>
	<a href="{$URL_comments}">{#PLIGG_Visual_Breadcrumb_Comments#}</a>
	<a href="{$URL_unpublished}">{#PLIGG_Visual_Breadcrumb_Unpublished_Tab#}</a>
	<a href="{$URL_published}" class="navbut4">{#PLIGG_Visual_Breadcrumb_Published_Tab#}</a>
	<a href="{$URL_live}">{#PLIGG_Visual_Breadcrumb_All#}</a>

</div>

<div class="live2-item">
 	<div class="live2-votes" style="width:15%"><strong>{#PLIGG_Visual_Comments_Date#}</strong></div>
	<div class="live2-ts"><strong>{#PLIGG_Visual_Breadcrumb_Vote#}</strong></div>
	<div class="live2-story" style="width:50%"><strong>{#PLIGG_Visual_Comments_Link#}</strong></div>
	<div class="live2-ts"><strong>{#PLIGG_Visual_Breadcrumb_Category#}</strong></div> 
	<div class="live2-ts"><strong>{#PLIGG_Visual_Comments_Author#}</strong></div>   
</div>

{section name=live_item loop=$live_items}

		<div class="live2-item">
			<div class="live2-votes" style="width:15%">{$live_items[live_item].link_date}</div>
			<div class="live2-ts">{$live_items[live_item].link_votes}</div>
			<div class="live2-ts" style="width:50%"><a href="{$URL_storytitle, $live_items[live_item].link_url}">{$live_items[live_item].link_title}</a></div>
			<div class="live2-ts"><a href="{$URL_maincategory, $live_items[live_item].link_category}">{$live_items[live_item].link_category}</a></div>
			<div class="live2-ts"><a href="{$URL_user, $live_items[live_item].link_username}">{$live_items[live_item].link_username}</a></div>
		</div>

{/section}

<br />
{$live_pagination}

