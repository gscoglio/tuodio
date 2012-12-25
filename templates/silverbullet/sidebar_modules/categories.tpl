
	<h2>{#PLIGG_Visual_Category_Title#}</h2>


	<ul class="lists">
		
			{section name=thecat loop=$cat_array start=1}
				{if $lastspacer eq ""}
					{assign var=lastspacer value=$cat_array[thecat].spacercount}
				{/if}

				{if $cat_array[thecat].spacercount lt $lastspacer}{$cat_array[thecat].spacerdiff|repeat_count:''}{/if}
				{if $cat_array[thecat].spacercount gt $lastspacer}{/if}

		
				{if $cat_array[thecat].spacercount gt 1}
		
				{if $pagename eq "published"}
					<li>
					<a href="{$URL_rsscategory, $cat_array[thecat].auto_id}" target="_blank"> 	
					<img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" border="0" alt="RSS" /></a>
					<a href="{$URL_maincategory, $cat_array[thecat].safename}">&#8212; {$cat_array[thecat].name}</a>
					</li>
				{else}
						<li>
						<a href="{$URL_rsscategory, $cat_array[thecat].auto_id}" target="_blank"> 	
						<img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" border="0" alt="RSS" /></a>
						<a href="{$URL_queuedcategory, $cat_array[thecat].safename}">&#8212; {$cat_array[thecat].name}</a>
						</li>
				{/if}
				
				
				
				{else}
								{if $pagename eq "published"}

					<li>
					<a href="{$URL_rsscategory, $cat_array[thecat].auto_id}" target="_blank"> 	
					<img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" border="0" alt="RSS" /></a>
					<a href="{$URL_maincategory, $cat_array[thecat].safename}">{$cat_array[thecat].name}</a>
					</li>
				{else}
						<li>
						<a href="{$URL_rsscategory, $cat_array[thecat].auto_id}" target="_blank"> 	
						<img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" border="0" alt="RSS" /></a>
						<a href="{$URL_queuedcategory, $cat_array[thecat].safename}">{$cat_array[thecat].name}</a>
						</li>
				{/if}
				{/if}
				
				
				{assign var=lastspacer value=$cat_array[thecat].spacercount}
			{/section}
	
	</ul>
