<div class="tlb">
        <h2>{#PLIGG_Visual_Category_Title#}</h2>
</div>


<div id="cats" style="padding-bottom:1px;margin-left:4px;">
        <ul id="nav-secondary">
                        {section name=thecat loop=$cat_array start=1}
                                {if $lastspacer eq ""}
                                        {assign var=lastspacer value=$cat_array[thecat].spacercount}
                                {/if}

                                {if $cat_array[thecat].spacercount lt $lastspacer}{$cat_array[thecat].spacerdiff|repeat_count:'</ul>'}{/if}
                                {if $cat_array[thecat].spacercount gt $lastspacer}<ul style="padding-left:12px">{/if}

                                <a href="{$URL_rsscategory, $cat_array[thecat].auto_id}" target="_blank" style="border:none;">
              <img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" border="0" style="float:right;padding-right:10px;" alt="RSS" /></a>

                                {if $pagename eq "published"}
                                        <a href="{$URL_maincategory, $cat_array[thecat].safename}" style="padding-bottom:5px;">{$cat_array[thecat].name}</a>
                                {else}
                                        <a href="{$URL_queuedcategory, $cat_array[thecat].safename}" style="padding-bottom:5px;">{$cat_array[thecat].name}</a>
                                {/if}

                                {assign var=lastspacer value=$cat_array[thecat].spacercount}
                        {/section}
        </ul>
</div>