<div id="filter">
		
		<span>{#PLIGG_Visual_Comments#}</span>
		<a href="{$URL_comments}" class="navbut4">{#PLIGG_Visual_Breadcrumb_Comments#}</a>
		<a href="{$URL_unpublished}">{#PLIGG_Visual_Breadcrumb_Unpublished_Tab#}</a>
		<a href="{$URL_published}">{#PLIGG_Visual_Breadcrumb_Published_Tab#}</a>
	  	<a href="{$URL_live}">{#PLIGG_Visual_Breadcrumb_All#}</a>	
	
</div>

<div class="live2-item">
	<div class="live2-ts" style="width:42%"><strong>{#PLIGG_Visual_Comments_Comment#}</strong></div>
	<div class="live2-type"><strong>{#PLIGG_Visual_Comments_Author#}</strong></div>
	<div class="live2-votes"><strong>{#PLIGG_Visual_Comments_Date#}</strong></div>
	<div class="live2-story"><strong>{#PLIGG_Visual_Comments_Link#}</strong></div>
</div>

{section name=live_item loop=$live_items}

	<div class="live2-item">
		<div class="live2-ts" style="width:42%; padding:3px 3px 3px 3px">{$live_items[live_item].comment_content}</div>
		<div class="live2-type"><a href="{$URL_user, $live_items[live_item].comment_author}">{$live_items[live_item].comment_author}</a></div>
		<div class="live2-votes">{$live_items[live_item].comment_date}</div>
		<div class="live2-story"><a href="{$URL_storytitle, $live_items[live_item].comment_link_url}">{$live_items[live_item].comment_link_title}</a></div>
	</div>

{/section}

<br />
{$live_pagination}

