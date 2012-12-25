<div id="sorts">
                        {if $pagename eq "upcoming"}
                                <strong>
                                {if !isset($templatelite.get.category)}
                                        Sort:
                                {else}
                                        {#PLIGG_Visual_Pligg_Queued_Sort#} {$category} {#PLIGG_Visual_Pligg_Queued_Sort_By#}:
                                {/if}
                                </strong>
                                {if !isset($paorder)}
                                        { assign var="paorder" value=""" }
                                {/if}
                                {if $paorder eq "" || $paorder eq "newest"}<span class="sort">{#PLIGG_Visual_Pligg_Newest_St#}</span>{else}<a href="{$upcoming_url_newest}">{#PLIGG_Visual_Pligg_Newest_St#}</a>{/if} |
                                {if $paorder eq "oldest"}<span class="sort">{#PLIGG_Visual_Pligg_Oldest_St#}</span>{else}<a href="{$upcoming_url_oldest}">{#PLIGG_Visual_Pligg_Oldest_St#}</a>{/if} |
                                {if $paorder eq "mostpopular"}<span class="sort">{#PLIGG_Visual_Pligg_Most_Pop#}</span>{else}<a href="{$upcoming_url_mostpopular}">{#PLIGG_Visual_Pligg_Most_Pop#}</a>{/if} |
                                {if $paorder eq "leastpopular"}<span class="sort">{#PLIGG_Visual_Pligg_Least_Pop#}</span>{else}<a href="{$upcoming_url_leastpopular}">{#PLIGG_Visual_Pligg_Least_Pop#}</a>{/if} |
                                <a href="{$URL_rssqueued}" target="_blank"><img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" align="top" alt="RSS" /></a>
                        {elseif $pagename neq "story"}
                                {if $Voting_Method eq 1}
                                <strong>
                                {if !isset($templatelite.get.category)}
                                        Sort:
                                {else}
                                        {#PLIGG_Visual_Pligg_Queued_Sort#} {$category} {#PLIGG_Visual_Pligg_Queued_Sort_By#}:
                                {/if}
                                </strong>
                                {if !isset($setmeka)}
                                        { assign var="setmeka" value=""" }
                                {/if}
                                {if $setmeka eq "" || $setmeka eq "recent"}<span class="sort">{#PLIGG_Visual_Recently_Pop#}</span>{else}<a href="{$index_url_recent}">{#PLIGG_Visual_Recently_Pop#}</a>{/if} |
                                {if $setmeka eq "today"}<span class="sort">{#PLIGG_Visual_Top_Today#}</span>{else}<a href="{$index_url_today}">{#PLIGG_Visual_Top_Today#}</a>{/if} |
                                {if $setmeka eq "yesterday"}<span class="sort">{#PLIGG_Visual_Yesterday#}</span>{else}<a href="{$index_url_yesterday}">{#PLIGG_Visual_Yesterday#}</a>{/if} |
                                {if $setmeka eq "week"}<span class="sort">{#PLIGG_Visual_This_Week#}</span>{else}<a href="{$index_url_week}">{#PLIGG_Visual_This_Week#}</a>{/if} |
                                {if $setmeka eq "month"}<span class="sort">{#PLIGG_Visual_This_Month#}</span>{else}<a href="{$index_url_month}">{#PLIGG_Visual_This_Month#}</a>{/if} |
                                {if $setmeka eq "year"}<span class="sort">{#PLIGG_Visual_This_Year#}</span>{else}<a href="{$index_url_year}">{#PLIGG_Visual_This_Year#}</a>{/if} |
                        {/if}
                                <a href="{$URL_rss}" target="_blank"><img src="{$my_pligg_base}/templates/{$the_template}/images/rss.gif" align="top" alt="RSS" /></a>
                        {/if}
</div>